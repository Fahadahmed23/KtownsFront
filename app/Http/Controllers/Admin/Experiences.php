<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;
date_default_timezone_set('asia/karachi');

class Experiences extends AdminController {

    function __construct() {
        parent::__construct();

        /*$users = DB::table('partner_request')->where('Status', 1)->lists('FullName', 'PartnerRequestID');
        $this->data['partners'] = ['Select Partner'];
        $this->data['partners'] += $users;

        $hotel_types = DB::table('experiences_types')->where('Status', 1)->lists('ExperiencesTypeName', 'ExperiencesTypeID');
        $this->data['hotel_types'] = ['Select Experiences Type'];
        $this->data['hotel_types'] += $hotel_types;
        */
        $city_names = DB::table('cities')->where('Status', 1)->lists('CityName', 'CityID');
        $this->data['city_name'] = ['Select City Name'];
        $this->data['city_name'] += $city_names;

        $this->data['rating'] = \Config::get('rating');
    }

    public function index() {
        $Q = \DB::table('experiences');
        $this->data['recordsTotal'] = count($Q->get());
        return view('admin.experiences.index', $this->data);
    }

    public function experiences_list() {

        $start = (isset($_POST["start"]) ? (int) $_POST["start"] : 0);
        $length = (isset($_POST["length"]) ? (int) $_POST["length"] : 25);

        $columns = array("", "ExperiencesID", "ExperiencesName", "CityName", "Rating", "Status", "DateAdded", "DateModified");

        $query = \DB::table('experiences')->select(['experiences.ExperiencesID', 'experiences.ExperiencesName', 'cities.CityName', 'experiences.Rating',
            DB::raw("CONCAT('<small class=\"label bg-', IF(experiences.Status = 0, 'red', 'green'), '\" ><i class=\"fa ', IF(experiences.Status = 0, 'fa-times', 'fa-check'), '\"></i> ', IF(experiences.Status = 1, 'Active', 'Deactive'), '</small>') AS Status"),
            DB::raw("DATE_FORMAT(experiences.DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
            DB::raw("DATE_FORMAT(experiences.DateModified, \"%d-%b-%Y<br>%r\") as DateModified")])
            ->leftjoin('cities', 'experiences.CityID', '=', 'cities.CityID');
        
        $recordsTotal = count($query->get());

        if (!empty($_POST['search']["value"])) {
            $input = strtolower(trim($_POST['search']["value"]));
            $query->whereRaw("(ExperiencesName LIKE '%" . $input . "%')");
        }

        $query->orderBy($columns[(int) $_POST["order"][0]["column"]], strtoupper($_POST["order"][0]["dir"]));
        $query->orderBy("ExperiencesID", "DESC");

        // limit acc to start and length
        $recordsFiltered = count($query->get());
        $result = $query->skip($start)->take($length)->get();
        // $maxRow = count($result);
        $data = [];
        
        foreach ($result as $Rs) {
            $data[] = array(
                "<input type=\"checkbox\" class=\"check\" name=\"ids[]\" value=\"" . $Rs->ExperiencesID . "\" />",
                $Rs->ExperiencesID,
                $Rs->ExperiencesName,
                $Rs->CityName,
                $Rs->Rating,
                $Rs->Status,
                $Rs->DateAdded,
                $Rs->DateModified,
                '<button type="button" class="btn btn-success btn-sm" onClick="location.href=\'experiences/' . $Rs->ExperiencesID . '\'"><i class="fa fa-edit"></i> Edit</button>'
            );
        }

        echo json_encode(array("draw" => (int) $_POST["draw"], "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, "data" => $data));
        exit(0);
    }

    public function add() {
        return view('admin.experiences.add', $this->data);
    }

    public function save() {

        $messages['required'] = 'Please enter :attribute.';
        $messages['min'] = 'Please select :attribute.';

        $error = false;
        $msg = "";

        $allowed_ext = ['jpg', 'JPG', 'JPEG', 'jpeg', 'png', "PNG", 'gif', 'GIF'];

        if (Input::hasFile('Image')) {
            $fl = Input::file('Image');
            if (!empty($fl)) {
                $ext = $fl->getClientOriginalExtension();
                if (!in_array($ext, $allowed_ext)) {
                    $error = true;
                    $msg = "Invalid Image type";
                }
            }
        } else {
            $error = true;
            $msg = "Please select Image";
        }

        if (Input::hasFile('Thumbnail')) {
            $fl2 = Input::file('Thumbnail');
            if (!empty($fl2)) {
                $ext2 = $fl2->getClientOriginalExtension();
                if (!in_array($ext2, $allowed_ext)) {
                    $error = true;
                    $msg = "Invalid Image type";
                }
            }
        } else {
            $error = true;
            $msg = "Please select Image";
        }
        
        if (Input::hasFile('HostImage')) {
            $fl3 = Input::file('HostImage');
            if (!empty($fl3)) {
                $ext3 = $fl3->getClientOriginalExtension();
                if (!in_array($ext3, $allowed_ext)) {
                    $error = true;
                    $msg = "Invalid Host Image type";
                }
            }
        } else {
            $error = true;
            $msg = "Please select Host Image";
        }

        $valid["ExperiencesName"] = 'required|max:255';
        $valid["OriginalExperiencesName"] = 'required|max:255';
        $valid["OwnerName"] = 'required|max:50';
        $valid["Address"] = 'required|max:255';
        $valid["Address2"] = 'required|max:255';
        //$valid["PartnerRequestID"] = 'required|integer|min:1';
        //$valid["HotelTypeID"] = 'required|integer|min:1';
        $valid["CityID"] = 'required|integer|min:1';
        //$valid["AgreementStartDate"] = 'required|date|date_format:Y-m-d';
        //$valid["AgreementEndDate"] = 'required|date|date_format:Y-m-d';
        $valid["PartnerPrice"] = 'required|numeric|min:0';
        $valid["SellingPrice"] = 'required|numeric|min:0';
        $valid["AdultCharges"] = 'required|numeric|min:0';
        $valid["NoOfGuests"] = 'required|integer|min:1';
        //$valid["NoOfRooms"] = 'required|integer|min:1';
        $valid["Description"] = 'required';
        $valid["Rating"] = 'required|integer|min:1';
        $valid["Discount"] = 'required|numeric|min:0';
        $valid["Status"] = 'required|integer|min:0|max:1';
        $valid["AutoApprove"] = 'required|integer|min:0|max:1';
        $valid["HostDescription"] = 'required';

        $valid_name["ExperiencesName"] = 'Experiences Name';
        $valid_name["OriginalExperiencesName"] = 'Original Experiences Name';
        $valid_name["OwnerName"] = 'Owner Name';
        $valid_name["Address"] = 'Short Address';
        $valid_name["Address2"] = 'Full Address';
        //$valid_name["PartnerRequestID"] = 'Partner';
        //$valid_name["HotelTypeID"] = 'Type';
        $valid_name["CityID"] = 'City';
        //$valid_name["AgreementStartDate"] = 'Agreement Start Date';
        //$valid_name["AgreementEndDate"] = 'Agreement End Date';
        $valid_name["PartnerPrice"] = 'Partner Price';
        $valid_name["SellingPrice"] = 'Selling Price';
        $valid_name["AdultCharges"] = 'Adult Charges';
        $valid_name["NoOfGuests"] = 'No. of Guests';
        //$valid_name["NoOfRooms"] = 'No. of Rooms';
        $valid_name["Description"] = 'Description';
        $valid_name["Rating"] = 'Rating';
        $valid_name["Discount"] = 'Discount';
        $valid_name["Status"] = 'Status';
        $valid_name["AutoApprove"] = 'Auto Approve Booking';
        $valid_name["HostDescription"] = 'Host Description';

        $v = Validator::make(\Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);

        if ($v->fails() || $error) {
            if ($error) {
                return redirect()->back()->withErrors($v->errors())->withInput()->with('warning_msg', $msg);
            } else {
                return redirect()->back()->withErrors($v->errors())->withInput();
            }
        } else {
            $slug = $this->check_slug(str_slug(Input::get('ExperiencesName'), '-'), 0);
            $experience_data = [
                'ExperiencesName' => Input::get('ExperiencesName'),
                'Slug' => $slug,
                'OriginalExperiencesName' => Input::get('OriginalExperiencesName'),
                'OwnerName' => Input::get('OwnerName'),
                'Address' => Input::get('Address'),
                'Address2' => Input::get('Address2'),
                //'PartnerRequestID' => Input::get('PartnerRequestID'),
                //'HotelTypeID' => Input::get('HotelTypeID'),
                'CityID' => Input::get('CityID'),
                'AgreementStartDate' => Input::get('AgreementStartDate'),
                'AgreementEndDate' => Input::get('AgreementEndDate'),
                'PartnerPrice' => Input::get('PartnerPrice'),
                'SellingPrice' => Input::get('SellingPrice'),
                'NoOfGuests' => Input::get('NoOfGuests'),
                'NoOfRooms' => 0,
                'AdultCharges' => Input::get('AdultCharges'),
                'Description' => Input::get('Description'),
                'ActiveDates' => trim(Input::get('ActiveDates')),
                'MetaTitle' => Input::get('MetaTitle'),
                'MetaKeywords' => Input::get('MetaKeywords'),
                'MetaDescription' => Input::get('MetaDescription'),
                'Rating' => Input::get('Rating'),
                'Discount' => Input::get('Discount'),
                'Status' => Input::get('Status'),
                'AutoApprove' => Input::get('AutoApprove'),
                'HostDescription' => Input::get('HostDescription'),
                'DateAdded' => new \DateTime
            ];

            DB::table('experiences')->insert($experience_data);

            $ExperiencesID = \DB::getPdo()->lastInsertId();
            

            if (Input::hasFile('Image')) {
                $i = 1;
                $fl = Input::file('Image');
                if (!empty($fl)) {
                    $filename = $ExperiencesID . '_' . str_random(5) . '.' . $fl->getClientOriginalExtension();

                    $path = $this->data['upload_url_controller'] . 'experiences/' . $filename;

                    \Image::make($fl->getRealPath())->save($path);
                    \DB::table('experiences')->where('ExperiencesID', $ExperiencesID)->update(['Image' => $filename]);
                }
            }

            if (Input::hasFile('Thumbnail')) {
                $fl2 = Input::file('Thumbnail');
                if (!empty($fl2)) {
                    $filename2 = $ExperiencesID . '_' . str_random(5) . '.' . $fl2->getClientOriginalExtension();

                    $path2 = $this->data['upload_url_controller'] . 'experiences/thumb/' . $filename2;

                    \Image::make($fl2->getRealPath())->save($path2);
                    \DB::table('experiences')->where('ExperiencesID', $ExperiencesID)->update(['Thumbnail' => $filename2]);
                }
            }
            
            if (Input::hasFile('HostImage')) {
                $fl3 = Input::file('HostImage');
                if (!empty($fl3)) {
                    $filename3 = $ExperiencesID . '_' . str_random(5) . '.' . $fl3->getClientOriginalExtension();

                    $path3 = $this->data['upload_url_controller'] . 'experiences/host/' . $filename3;

                    \Image::make($fl3->getRealPath())->save($path3);
                    \DB::table('experiences')->where('ExperiencesID', $ExperiencesID)->update(['HostImage' => $filename3]);
                }
            }
            
            return redirect('admin/experiences/' . $ExperiencesID)->with('success', "Experiences Added Successfully");
        }
    }

    public function edit($id) {
        $query = \DB::table('experiences');
        $query->where('ExperiencesID', $id);
        $this->data['experiences'] = $query->first();
        
        if (empty($this->data['experiences'])) {
            return redirect('admin/experiences')->with('warning_msg', "Invalid Experiences ID");
        } else {
            return view('admin.experiences.edit', $this->data);
        }
    }

    public function check_slug($slug, $experiences_id = 0) {
        $experiences = DB::table('experiences')->where('Slug', $slug)->where('ExperiencesID', '<>', $experiences_id)->first();
        if (!empty($experiences)) {
            $s = $slug . '-1';
            $slug = $this->check_slug($s, $experiences_id);
        }
        return $slug;
    }

    public function update($experiences_id) {
        $messages['required'] = 'Please enter :attribute.';
        $messages['min'] = 'Please select :attribute.';

        $error = false;
        $msg = "";

        $allowed_ext = ['jpg', 'JPG', 'JPEG', 'jpeg', 'png', "PNG", 'gif', 'GIF'];

        if (Input::hasFile('Image')) {
            $fl = Input::file('Image');
            if (!empty($fl)) {
                $ext = $fl->getClientOriginalExtension();
                if (!in_array($ext, $allowed_ext)) {
                    $error = true;
                    $msg = "Invalid Image type";
                }
            }
        }

        if (Input::hasFile('Thumbnail')) {
            $fl2 = Input::file('Thumbnail');
            if (!empty($fl2)) {
                $ext2 = $fl2->getClientOriginalExtension();
                if (!in_array($ext2, $allowed_ext)) {
                    $error = true;
                    $msg = "Invalid Image type";
                }
            }
        }
        
        if (Input::hasFile('HostImage')) {
            $fl3 = Input::file('HostImage');
            if (!empty($fl3)) {
                $ext3 = $fl3->getClientOriginalExtension();
                if (!in_array($ext3, $allowed_ext)) {
                    $error = true;
                    $msg = "Invalid Host Image type";
                }
            }
        }
        
        $valid["ExperiencesName"] = 'required|max:255';
        $valid["OriginalExperiencesName"] = 'required|max:255';
        $valid["OwnerName"] = 'required|max:50';
        $valid["Address"] = 'required|max:255';
        $valid["Address2"] = 'required|max:255';
        //$valid["PartnerRequestID"] = 'required|integer|min:1';
        //$valid["HotelTypeID"] = 'required|integer|min:1';
        $valid["CityID"] = 'required|integer|min:1';
        //$valid["AgreementStartDate"] = 'required|date|date_format:Y-m-d';
        //$valid["AgreementEndDate"] = 'required|date|date_format:Y-m-d';
        $valid["PartnerPrice"] = 'required|numeric|min:0';
        $valid["SellingPrice"] = 'required|numeric|min:0';
        $valid["AdultCharges"] = 'required|numeric|min:0';
        $valid["NoOfGuests"] = 'required|integer|min:1';
        //$valid["NoOfRooms"] = 'required|integer|min:1';
        $valid["Description"] = 'required';
        $valid["Rating"] = 'required|integer|min:1';
        $valid["Discount"] = 'required|numeric|min:0';
        $valid["Status"] = 'required|integer|min:0|max:1';
        $valid["AutoApprove"] = 'required|integer|min:0|max:1';
        $valid["HostDescription"] = 'required';

        $valid_name["ExperiencesName"] = 'Experiences Name';
        $valid_name["OriginalExperiencesName"] = 'Original Experiences Name';
        $valid_name["OwnerName"] = 'Owner Name';
        $valid_name["Address"] = 'Short Address';
        $valid_name["Address2"] = 'Full Address';
        //$valid_name["PartnerRequestID"] = 'Partner';
        //$valid_name["HotelTypeID"] = 'Type';
        $valid_name["CityID"] = 'City';
        //$valid_name["AgreementStartDate"] = 'Agreement Start Date';
        //$valid_name["AgreementEndDate"] = 'Agreement End Date';
        $valid_name["PartnerPrice"] = 'Partner Price';
        $valid_name["SellingPrice"] = 'Selling Price';
        $valid_name["AdultCharges"] = 'Adult Charges';
        $valid_name["NoOfGuests"] = 'No. of Guests';
        //$valid_name["NoOfRooms"] = 'No. of Rooms';
        $valid_name["Description"] = 'Description';
        $valid_name["Rating"] = 'Rating';
        $valid_name["Discount"] = 'Discount';
        $valid_name["Status"] = 'Status';
        $valid_name["AutoApprove"] = 'Auto Approve Booking';
        $valid_name["HostDescription"] = 'Host Description';
        

        $v = Validator::make(\Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);

        if ($v->fails() || $error) {
            if ($error) {
                return redirect()->back()->withErrors($v->errors())->withInput()->with('warning_msg', $msg);
            } else {
                return redirect()->back()->withErrors($v->errors())->withInput();
            }
        } else {
            $slug = $this->check_slug(str_slug(Input::get('ExperiencesName'), '-'), $experiences_id);
            $experience_data = [
                'ExperiencesName' => Input::get('ExperiencesName'),
                'Slug' => $slug,
                'OriginalExperiencesName' => Input::get('OriginalExperiencesName'),
                'OwnerName' => Input::get('OwnerName'),
                'Address' => Input::get('Address'),
                'Address2' => Input::get('Address2'),
                //'PartnerRequestID' => Input::get('PartnerRequestID'),
                //'HotelTypeID' => Input::get('HotelTypeID'),
                'CityID' => Input::get('CityID'),
                //'AgreementStartDate' => Input::get('AgreementStartDate'),
                //'AgreementEndDate' => Input::get('AgreementEndDate'),
                'PartnerPrice' => Input::get('PartnerPrice'),
                'SellingPrice' => Input::get('SellingPrice'),
                'NoOfGuests' => Input::get('NoOfGuests'),
                //'NoOfRooms' => Input::get('NoOfRooms'),
                'AdultCharges' => Input::get('AdultCharges'),
                'Description' => Input::get('Description'),
                'ActiveDates' => trim(Input::get('ActiveDates')),
                'MetaTitle' => Input::get('MetaTitle'),
                'MetaKeywords' => Input::get('MetaKeywords'),
                'MetaDescription' => Input::get('MetaDescription'),
                'Rating' => Input::get('Rating'),
                'Discount' => Input::get('Discount'),
                'Status' => Input::get('Status'),
                'AutoApprove' => Input::get('AutoApprove'),
                'HostDescription' => Input::get('HostDescription'),
                'DateModified' => new \DateTime
            ];

            DB::table('experiences')->where('ExperiencesID', $experiences_id)->update($experience_data);

            if (Input::hasFile('Image')) {
                $i = 1;
                $fl = Input::file('Image');
                if (!empty($fl)) {
                    $Experiences = DB::table('experiences')->select('Image')->where('ExperiencesID', $experiences_id)->first();
                    if (\File::exists($this->data['upload_url_controller'] . 'experiences/' . $Experiences->Image)) {
                        \File::delete($this->data['upload_url_controller'] . 'experiences/' . $Experiences->Image);
                    }
                    $filename = $experiences_id . '_' . str_random(5) . '.' . $fl->getClientOriginalExtension();

                    $path = $this->data['upload_url_controller'] . 'experiences/' . $filename;

                    \Image::make($fl->getRealPath())->save($path);
                    \DB::table('experiences')->where('ExperiencesID', $experiences_id)->update(['Image' => $filename]);
                }
            }
            
            if (Input::hasFile('Thumbnail')) {
                $fl2 = Input::file('Thumbnail');
                if (!empty($fl2)) {
                    $Experiences = DB::table('experiences')->select('Thumbnail')->where('ExperiencesID', $experiences_id)->first();
                    if (\File::exists($this->data['upload_url_controller'] . 'experiences/thumb/' . $Experiences->Thumbnail)) {
                        \File::delete($this->data['upload_url_controller'] . 'experiences/thumb/' . $Experiences->Thumbnail);
                    }
                    $filename2 = $experiences_id . '_' . str_random(5) . '.' . $fl2->getClientOriginalExtension();

                    $path2 = $this->data['upload_url_controller'] . 'experiences/thumb/' . $filename2;

                    \Image::make($fl2->getRealPath())->save($path2);
                    \DB::table('experiences')->where('ExperiencesID', $experiences_id)->update(['Thumbnail' => $filename2]);
                }
            }
            
            if (Input::hasFile('HostImage')) {
                $fl3 = Input::file('HostImage');
                if (!empty($fl3)) {
                    $Experiences = DB::table('experiences')->select('HostImage')->where('ExperiencesID', $experiences_id)->first();
                    if (\File::exists($this->data['upload_url_controller'] . 'experiences/host/' . $Experiences->HostImage)) {
                        \File::delete($this->data['upload_url_controller'] . 'experiences/host/' . $Experiences->HostImage);
                    }
                    $filename3 = $experiences_id . '_' . str_random(5) . '.' . $fl3->getClientOriginalExtension();

                    $path3 = $this->data['upload_url_controller'] . 'experiences/host/' . $filename3;

                    \Image::make($fl3->getRealPath())->save($path3);
                    \DB::table('experiences')->where('ExperiencesID', $experiences_id)->update(['HostImage' => $filename3]);
                }
            }
            return redirect('admin/experiences/' . $experiences_id)->with('success', "Hotel Updated Successfully");
        }
    }

    public function check_experiences($ExperiencesID) {
        $Experiences = DB::table('experiences')->where('ExperiencesID', $ExperiencesID)->first();
        if (!empty($Experiences)) {
            return true;
        } else {
            return false;
        }
    }

    public function images($ExperiencesID) {
        if (!$this->check_experiences($ExperiencesID)) {
            return redirect('admin/experiences')->with('warning_msg', "Invalid ExperiencesID");
        }
        $Q = \DB::table('experiences_images')->where('ExperiencesID', $ExperiencesID);
        $this->data['recordsTotal'] = count($Q->get());
        $this->data['ExperiencesID'] = $ExperiencesID;
        return view('admin.experiences-images.index', $this->data);
    }

    public function images_list($ExperiencesID) {
        $start = (isset($_POST["start"]) ? (int) $_POST["start"] : 0);
        $length = (isset($_POST["length"]) ? (int) $_POST["length"] : 25);

        $columns = array("", "Title", "Image", "DateAdded", "DateModified");

        $query = \DB::table('experiences_images')->select(['ExperiencesImageID', 'Title', 'Image',
                    DB::raw("DATE_FORMAT(DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
                    DB::raw("DATE_FORMAT(DateModified, \"%d-%b-%Y<br>%r\") as DateModified")])->where('ExperiencesID', $ExperiencesID);

        $recordsTotal = count($query->get());

        if (!empty($_POST['search']["value"])) {
            $input = strtolower(trim($_POST['search']["value"]));
            $query->whereRaw("(Title LIKE '%" . $input . "%')");
        }

        $query->orderBy($columns[(int) $_POST["order"][0]["column"]], strtoupper($_POST["order"][0]["dir"]));
        $query->orderBy("ExperiencesImageID", "DESC");

        // limit acc to start and length
        $recordsFiltered = count($query->get());
        $result = $query->skip($start)->take($length)->get();
        // $maxRow = count($result);
        $data = [];
        foreach ($result as $Rs) {
            $data[] = array(
                "<input type=\"checkbox\" class=\"check\" name=\"ids[]\" value=\"" . $Rs->ExperiencesImageID . "\" />",
                $Rs->Title,
                '<img src="' . $this->data['upload_url'] . 'experiences/' . $Rs->Image . '" style="width:150px; height: auto;" />',
                $Rs->DateAdded,
                $Rs->DateModified,
                '<button type="button" class="btn btn-success btn-sm" onClick="location.href=\'' . url('admin/experiences-images/' . $ExperiencesID . '/' . $Rs->ExperiencesImageID) . '\'"><i class="fa fa-edit"></i> Edit</button>'
            );
        }

        echo json_encode(array("draw" => (int) $_POST["draw"], "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, "data" => $data));
        exit(0);
    }

    public function add_image($ExperiencesID) {
        if (!$this->check_experiences($ExperiencesID)) {
            return redirect('admin/experiences')->with('warning_msg', "Invalid Experiences ID");
        }
        $this->data['ExperiencesID'] = $ExperiencesID;
        return view('admin.experiences-images.add', $this->data);
    }

    public function save_image($ExperiencesID) {
        if (!$this->check_experiences($ExperiencesID)) {
            return redirect('admin/experiences')->with('warning_msg', "Invalid Experiences ID");
        }

        $messages['required'] = 'Please enter :attribute.';

        $error = false;
        $msg = "";

        $allowed_ext = ['jpg', 'JPG', 'JPEG', 'jpeg', 'png', "PNG", 'gif', 'GIF'];

        if (Input::hasFile('Image')) {
            $fl = Input::file('Image');
            if (!empty($fl)) {
                $ext = $fl->getClientOriginalExtension();
                if (!in_array($ext, $allowed_ext)) {
                    $error = true;
                    $msg = "Invalid Image type";
                }
            }
        } else {
            $error = true;
            $msg = "Please select Image";
        }

        $valid["Title"] = 'max:100';
        $valid_name["Title"] = 'Title';

        $v = Validator::make(\Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);

        if ($v->fails()) {
            if ($error) {
                return redirect()->back()->withErrors($v->errors())->withInput()->with('warning_msg', $msg);
            } else {
                return redirect()->back()->withErrors($v->errors())->withInput();
            }
        } else {

            $experiences_data = [
                'ExperiencesID' => $ExperiencesID,
                'Title' => Input::get('Title'),
                'Description' => Input::get('Description'),
                'DateAdded' => new \DateTime
            ];

            DB::table('experiences_images')->insert($experiences_data);

            $ExperiencesImageID = \DB::getPdo()->lastInsertId();

            if (Input::hasFile('Image')) {
                $fl = Input::file('Image');
                if (!empty($fl)) {
                    $filename = $ExperiencesID . '_' . str_random(5) . '_' . $ExperiencesImageID . '_' . str_random(5) . '.' . $fl->getClientOriginalExtension();

                    $path = $this->data['upload_url_controller'] . 'experiences/' . $filename;

                    \Image::make($fl->getRealPath())->save($path);
                    \DB::table('experiences_images')->where('ExperiencesID', $ExperiencesID)->where('ExperiencesImageID', $ExperiencesImageID)->update(['Image' => $filename]);
                }
            }
            return redirect('admin/experiences-images/' . $ExperiencesID)->with('success', "Experiences Image Added Successfully");
        }
    }

    public function edit_image($ExperiencesID, $ImageID) {
        if (!$this->check_experiences($ExperiencesID)) {
            return redirect('admin/experiences')->with('warning_msg', "Invalid Experiences ID");
        }
        $this->data['ExperiencesID'] = $ExperiencesID;

        $query = \DB::table('experiences_images');
        $query->where('ExperiencesID', $ExperiencesID);
        $query->where('ExperiencesImageID', $ImageID);

        $this->data['experiences_images'] = $query->first();

        if (empty($this->data['experiences_images'])) {
            return redirect('admin/experiences-images/' . $ExperiencesID)->with('warning_msg', "Invalid Experiences Image");
        } else {
            return view('admin.experiences-images.edit', $this->data);
        }
    }

    public function update_image($ExperiencesID, $ImageID) {
        if (!$this->check_experiences($ExperiencesID)) {
            return redirect('admin/experiences')->with('warning_msg', "Invalid Experiences ID");
        }

        $messages['required'] = 'Please enter :attribute.';

        $error = false;
        $msg = "";

        $allowed_ext = ['jpg', 'JPG', 'JPEG', 'jpeg', 'png', "PNG", 'gif', 'GIF'];

        if (Input::hasFile('Image')) {
            $fl = Input::file('Image');
            if (!empty($fl)) {
                $ext = $fl->getClientOriginalExtension();
                if (!in_array($ext, $allowed_ext)) {
                    $error = true;
                    $msg = "Invalid Image type";
                }
            }
        }

        $valid["Title"] = 'max:100';
        $valid_name["Title"] = 'Title';

        $v = Validator::make(\Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);

        if ($v->fails()) {
            if ($error) {
                return redirect()->back()->withErrors($v->errors())->withInput()->with('warning_msg', $msg);
            } else {
                return redirect()->back()->withErrors($v->errors())->withInput();
            }
        } else {

            $experiences_data = [
                'ExperiencesID' => $ExperiencesID,
                'Title' => Input::get('Title'),
                'Description' => Input::get('Description'),
                'DateModified' => new \DateTime
            ];

            DB::table('experiences_images')->where('ExperiencesID', $ExperiencesID)->where('ExperiencesImageID', $ImageID)->update($experiences_data);

            if (Input::hasFile('Image')) {
                $fl = Input::file('Image');
                if (!empty($fl)) {
                    $Experiences = DB::table('experiences_images')->select('Image')->where('ExperiencesID', $ExperiencesID)->where('ExperiencesImageID', $ImageID)->first();
                    if (\File::exists($this->data['upload_url_controller'] . 'experiences/' . $Experiences->Image)) {
                        \File::delete($this->data['upload_url_controller'] . 'experiences/' . $Experiences->Image);
                    }
                    $filename = $ExperiencesID . '_' . str_random(5) . '_' . $ImageID . '_' . str_random(5) . '.' . $fl->getClientOriginalExtension();

                    $path = $this->data['upload_url_controller'] . 'experiences/' . $filename;

                    \Image::make($fl->getRealPath())->save($path);
                    \DB::table('experiences_images')->where('ExperiencesID', $ExperiencesID)->where('ExperiencesImageID', $ImageID)->update(['Image' => $filename]);
                }
            }
            return redirect('admin/experiences-images/' . $ExperiencesID . '/' . $ImageID)->with('success', "Experiences Image Updated Successfully");
        }
    }

    public function delete_images($ExperiencesID) {
        if (!$this->check_experiences($ExperiencesID)) {
            return redirect('admin/experiences')->with('warning_msg', "Invalid Experiences ID");
        }
        if (count(\Input::get('ids')) > 0) {
            foreach (Input::get('ids') as $id) {
                $Experiences = DB::table('experiences_images')->select('Image')->where('ExperiencesID', $ExperiencesID)->where('ExperiencesImageID', $id)->first();
                if (\File::exists($this->data['upload_url_controller'] . 'experiences/' . $Experiences->Image)) {
                    \File::delete($this->data['upload_url_controller'] . 'experiences/' . $Experiences->Image);
                }
            }
            DB::table('experiences_images')
                    ->where('ExperiencesID', $ExperiencesID)
                    ->whereIn('ExperiencesImageID', \Input::get('ids'))
                    ->delete();
        }
        return redirect('admin/experiences-images/' . $ExperiencesID)->with('success', "Selected Experiences Images Deleted Successfully");
    }

    public function delete() {
        if (count(\Input::get('ids')) > 0) {
            foreach (Input::get('ids') as $id) {
                $Experiences = DB::table('experiences')->select('Image', 'Thumbnail')->where('ExperiencesID', $id)->first();
                if (\File::exists($this->data['upload_url_controller'] . 'experiences/' . $Experiences->Image)) {
                    \File::delete($this->data['upload_url_controller'] . 'experiences/' . $Experiences->Image);
                }
                if (\File::exists($this->data['upload_url_controller'] . 'experiences/thumb/' . $Experiences->Thumbnail)) {
                    \File::delete($this->data['upload_url_controller'] . 'experiences/thumb/' . $Experiences->Thumbnail);
                }
            }
            DB::table('experiences')
                    ->whereIn('ExperiencesID', \Input::get('ids'))
                    ->delete();
        }
        return redirect('admin/experiences')->with('success', "Selected Experiences Deleted Successfully");
    }
    
    
    public function options($ExperiencesID) {
        if (!$this->check_experiences($ExperiencesID)) {
            return redirect('admin/experiences')->with('warning_msg', "Invalid ExperiencesID");
        }
        $Q = \DB::table('experiences_images')->where('ExperiencesID', $ExperiencesID);
        $this->data['recordsTotal'] = count($Q->get());
        $this->data['ExperiencesID'] = $ExperiencesID;
        return view('admin.experiences-options.index', $this->data);
    }

    public function options_list($ExperiencesID) {
        $start = (isset($_POST["start"]) ? (int) $_POST["start"] : 0);
        $length = (isset($_POST["length"]) ? (int) $_POST["length"] : 25);

        $columns = array("", "Title", "Option", "DateAdded", "DateModified");

        $query = \DB::table('experiences_options')->select(['ExperiencesOptionID', 'Title',
                    DB::raw("DATE_FORMAT(DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
                    DB::raw("DATE_FORMAT(DateModified, \"%d-%b-%Y<br>%r\") as DateModified"),
                    DB::raw("CONCAT(IF(Options = 1, 'Place', IF(Options = 2, 'Distance', IF(Options = 3, 'Food', 'Language')))) AS Options")
                    ])->where('ExperiencesID', $ExperiencesID);

        $recordsTotal = count($query->get());

        if (!empty($_POST['search']["value"])) {
            $input = strtolower(trim($_POST['search']["value"]));
            $query->whereRaw("(Title LIKE '%" . $input . "%')");
        }

        $query->orderBy($columns[(int) $_POST["order"][0]["column"]], strtoupper($_POST["order"][0]["dir"]));
        $query->orderBy("ExperiencesOptionID", "DESC");

        // limit acc to start and length
        $recordsFiltered = count($query->get());
        $result = $query->skip($start)->take($length)->get();
        // $maxRow = count($result);
        $data = [];
        foreach ($result as $Rs) {
            $data[] = array(
                "<input type=\"checkbox\" class=\"check\" name=\"ids[]\" value=\"" . $Rs->ExperiencesOptionID . "\" />",
                $Rs->Title,
                $Rs->Options,
                $Rs->DateAdded,
                $Rs->DateModified,
                '<button type="button" class="btn btn-success btn-sm" onClick="location.href=\'' . url('admin/experiences-options/' . $ExperiencesID . '/' . $Rs->ExperiencesOptionID) . '\'"><i class="fa fa-edit"></i> Edit</button>'
            );
        }

        echo json_encode(array("draw" => (int) $_POST["draw"], "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, "data" => $data));
        exit(0);
    }

    public function add_option($ExperiencesID) {
        if (!$this->check_experiences($ExperiencesID)) {
            return redirect('admin/experiences')->with('warning_msg', "Invalid Experiences ID");
        }
        $this->data['ExperiencesID'] = $ExperiencesID;
        return view('admin.experiences-options.add', $this->data);
    }

    public function save_option($ExperiencesID) {
        if (!$this->check_experiences($ExperiencesID)) {
            return redirect('admin/experiences')->with('warning_msg', "Invalid Experiences ID");
        }

        $messages['required'] = 'Please enter :attribute.';

        $error = false;
        $msg = "";

        $valid["Title"] = 'required|max:255';
        $valid["Options"] = 'required';
        
        $valid_name["Title"] = 'Title';
        $valid_name["Options"] = 'Options';

        $v = Validator::make(\Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);

        if ($v->fails()) {
            if ($error) {
                return redirect()->back()->withErrors($v->errors())->withInput()->with('warning_msg', $msg);
            } else {
                return redirect()->back()->withErrors($v->errors())->withInput();
            }
        } else {

            $experiences_option_data = [
                'ExperiencesID' => $ExperiencesID,
                'Title' => Input::get('Title'),
                'Description' => Input::get('Description'),
                'Options' => Input::get('Options'),
                'DateAdded' => new \DateTime
            ];

            DB::table('experiences_options')->insert($experiences_option_data);
            
            return redirect('admin/experiences-options/' . $ExperiencesID)->with('success', "Experiences Option Added Successfully");
        }
    }

    public function edit_option($ExperiencesID, $ImageID) {
        if (!$this->check_experiences($ExperiencesID)) {
            return redirect('admin/experiences')->with('warning_msg', "Invalid Experiences ID");
        }
        $this->data['ExperiencesID'] = $ExperiencesID;

        $query = \DB::table('experiences_options');
        $query->where('ExperiencesID', $ExperiencesID);
        $query->where('ExperiencesOptionID', $ImageID);

        $this->data['experiences_images'] = $query->first();

        if (empty($this->data['experiences_images'])) {
            return redirect('admin/experiences-options/' . $ExperiencesID)->with('warning_msg', "Invalid Experiences Image");
        } else {
            return view('admin.experiences-options.edit', $this->data);
        }
    }

    public function update_option($ExperiencesID, $ImageID) {
        if (!$this->check_experiences($ExperiencesID)) {
            return redirect('admin/experiences')->with('warning_msg', "Invalid Experiences ID");
        }

        $messages['required'] = 'Please enter :attribute.';

        $error = false;
        $msg = "";

        $allowed_ext = ['jpg', 'JPG', 'JPEG', 'jpeg', 'png', "PNG", 'gif', 'GIF'];

        if (Input::hasFile('Image')) {
            $fl = Input::file('Image');
            if (!empty($fl)) {
                $ext = $fl->getClientOriginalExtension();
                if (!in_array($ext, $allowed_ext)) {
                    $error = true;
                    $msg = "Invalid Image type";
                }
            }
        }

        $valid["Title"] = 'max:100';
        $valid_name["Title"] = 'Title';

        $v = Validator::make(\Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);

        if ($v->fails()) {
            if ($error) {
                return redirect()->back()->withErrors($v->errors())->withInput()->with('warning_msg', $msg);
            } else {
                return redirect()->back()->withErrors($v->errors())->withInput();
            }
        } else {

            $experiences_data = [
                'ExperiencesID' => $ExperiencesID,
                'Title' => Input::get('Title'),
                'Description' => Input::get('Description'),
                'DateModified' => new \DateTime
            ];

            DB::table('experiences_images')->where('ExperiencesID', $ExperiencesID)->where('ExperiencesImageID', $ImageID)->update($experiences_data);

            if (Input::hasFile('Image')) {
                $fl = Input::file('Image');
                if (!empty($fl)) {
                    $Experiences = DB::table('experiences_images')->select('Image')->where('ExperiencesID', $ExperiencesID)->where('ExperiencesImageID', $ImageID)->first();
                    if (\File::exists($this->data['upload_url_controller'] . 'experiences/' . $Experiences->Image)) {
                        \File::delete($this->data['upload_url_controller'] . 'experiences/' . $Experiences->Image);
                    }
                    $filename = $ExperiencesID . '_' . str_random(5) . '_' . $ImageID . '_' . str_random(5) . '.' . $fl->getClientOriginalExtension();

                    $path = $this->data['upload_url_controller'] . 'experiences/' . $filename;

                    \Image::make($fl->getRealPath())->save($path);
                    \DB::table('experiences_images')->where('ExperiencesID', $ExperiencesID)->where('ExperiencesImageID', $ImageID)->update(['Image' => $filename]);
                }
            }
            return redirect('admin/experiences-images/' . $ExperiencesID . '/' . $ImageID)->with('success', "Experiences Image Updated Successfully");
        }
    }

    public function delete_option($ExperiencesID) {
        if (!$this->check_experiences($ExperiencesID)) {
            return redirect('admin/experiences')->with('warning_msg', "Invalid Experiences ID");
        }
        if (count(\Input::get('ids')) > 0) {
            foreach (Input::get('ids') as $id) {
                $Experiences = DB::table('experiences_images')->select('Image')->where('ExperiencesID', $ExperiencesID)->where('ExperiencesImageID', $id)->first();
                if (\File::exists($this->data['upload_url_controller'] . 'experiences/' . $Experiences->Image)) {
                    \File::delete($this->data['upload_url_controller'] . 'experiences/' . $Experiences->Image);
                }
            }
            DB::table('experiences_images')
                    ->where('ExperiencesID', $ExperiencesID)
                    ->whereIn('ExperiencesImageID', \Input::get('ids'))
                    ->delete();
        }
        return redirect('admin/experiences-images/' . $ExperiencesID)->with('success', "Selected Experiences Images Deleted Successfully");
    }

    public function option_delete() {
        if (count(\Input::get('ids')) > 0) {
            foreach (Input::get('ids') as $id) {
                $Experiences = DB::table('experiences')->select('Image', 'Thumbnail')->where('ExperiencesID', $id)->first();
                if (\File::exists($this->data['upload_url_controller'] . 'experiences/' . $Experiences->Image)) {
                    \File::delete($this->data['upload_url_controller'] . 'experiences/' . $Experiences->Image);
                }
                if (\File::exists($this->data['upload_url_controller'] . 'experiences/thumb/' . $Experiences->Thumbnail)) {
                    \File::delete($this->data['upload_url_controller'] . 'experiences/thumb/' . $Experiences->Thumbnail);
                }
            }
            DB::table('experiences')
                    ->whereIn('ExperiencesID', \Input::get('ids'))
                    ->delete();
        }
        return redirect('admin/experiences')->with('success', "Selected Experiences Deleted Successfully");
    }
    
    
    
    
    

}
