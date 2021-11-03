<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;
date_default_timezone_set('asia/karachi');

class Hotels extends AdminController {

    function __construct() {
        parent::__construct();

        $users = DB::table('partner_request')->where('Status', 1)->lists('FullName', 'PartnerRequestID');
        $this->data['partners'] = ['Select Partner'];
        $this->data['partners'] += $users;

        $slugid = DB::table('hotels')->distinct('SlugId')->where('Status', 1)->lists('OriginalHotelName', 'SlugId');
        /*OLD WORK*/
        // $this->data['slugid'] = ['New'];
        // $this->data['slugid'] += $slugid;
        
        /*NEW WORK*/
        $this->data['slugoldid'] = ['New'];
        $this->data['slugoldid'] += $slugid;
        $this->data['slugid'] = [];
        foreach ($this->data['slugoldid'] as $key => $value) {
            $this->data['slugid'][$key] = $value . ' (Id:' .$key.')';
        }

        $hotelRoomtype = DB::table('hotel_room_types')->lists('name', 'id');
        $this->data['hotelRoomtype'] = ['Select Room Type'];
        $this->data['hotelRoomtype'] += $hotelRoomtype;


        $hotel_types = DB::table('hotel_types')->where('Status', 1)->lists('HotelTypeName', 'HotelTypeID');
        $this->data['hotel_types'] = ['Select Hotel Type'];
        $this->data['hotel_types'] += $hotel_types;
        
        $city_names = DB::table('cities')->where('Status', 1)->lists('CityName', 'CityID');
        $this->data['city_name'] = ['Select City Name'];
        $this->data['city_name'] += $city_names;

        $this->data['rating'] = \Config::get('rating');
    }

    public function index() {
        $Q = \DB::table('hotels');
        $this->data['recordsTotal'] = count($Q->get());
        return view('admin.hotels.index', $this->data);
    }

    public function hotels_list() {

        $start = (isset($_POST["start"]) ? (int) $_POST["start"] : 0);
        $length = (isset($_POST["length"]) ? (int) $_POST["length"] : 25);

        $columns = array("", "HotelID", "HotelName", "CityName", "Rating", "Status", "DateAdded", "DateModified");

        $query = \DB::table('hotels')->select(['hotels.HotelID', 'hotels.HotelName', 'cities.CityName', 'hotels.Rating',
            DB::raw("CONCAT('<small class=\"label bg-', IF(hotels.Status = 0, 'red', 'green'), '\" ><i class=\"fa ', IF(hotels.Status = 0, 'fa-times', 'fa-check'), '\"></i> ', IF(hotels.Status = 1, 'Active', 'Deactive'), '</small>') AS Status"),
            DB::raw("DATE_FORMAT(hotels.DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
            DB::raw("DATE_FORMAT(hotels.DateModified, \"%d-%b-%Y<br>%r\") as DateModified")])
            ->leftjoin('cities', 'hotels.CityID', '=', 'cities.CityID');

        $recordsTotal = count($query->get());

        if (!empty($_POST['search']["value"])) {
            $input = strtolower(trim($_POST['search']["value"]));
            $query->whereRaw("(HotelName LIKE '%" . $input . "%')");
        }

        $query->orderBy($columns[(int) $_POST["order"][0]["column"]], strtoupper($_POST["order"][0]["dir"]));
        $query->orderBy("HotelID", "DESC");

        // limit acc to start and length
        $recordsFiltered = count($query->get());
        $result = $query->skip($start)->take($length)->get();
        // $maxRow = count($result);
        $data = [];
        foreach ($result as $Rs) {
            $data[] = array(
                "<input type=\"checkbox\" class=\"check\" name=\"ids[]\" value=\"" . $Rs->HotelID . "\" />",
                $Rs->HotelID,
                $Rs->HotelName,
                $Rs->CityName,
                $Rs->Rating,
                $Rs->Status,
                $Rs->DateAdded,
                $Rs->DateModified,
                '<button type="button" class="btn btn-success btn-sm" onClick="location.href=\'hotels/' . $Rs->HotelID . '\'"><i class="fa fa-edit"></i> Edit</button>'
            );
        }

        echo json_encode(array("draw" => (int) $_POST["draw"], "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, "data" => $data));
        exit(0);
    }

    public function add() {
        return view('admin.hotels.add', $this->data);
    }

    public function save() {
        // dd(request()->all());
        $SlugCount=0;
        if(Input::get('SlugId') == "0")
        {
          $SlugCount = DB::table('hotels')->select('slugid')->orderBy('slugid','Desc')->take(1)->first()->slugid+1;
        }
        else
        {
            $SlugCount = Input::get('SlugId');
        }
        
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

        $valid["HotelName"] = 'required|max:255';
        $valid["OriginalHotelName"] = 'required|max:255';
        $valid["OwnerName"] = 'required|max:50';
        $valid["Address"] = 'required|max:255';
        $valid["Address2"] = 'required|max:255';
        $valid["PartnerRequestID"] = 'required|integer|min:1';
        $valid["HotelTypeID"] = 'required|integer|min:1';        
        $valid["SlugId"] = 'required|integer|min:0';
        $valid["CityID"] = 'required|integer|min:1';
        $valid["AgreementStartDate"] = 'required|date|date_format:Y-m-d';
        $valid["AgreementEndDate"] = 'required|date|date_format:Y-m-d';
        $valid["PartnerPrice"] = 'required|numeric|min:0';
        $valid["SellingPrice"] = 'required|numeric|min:0';
        $valid["AdultCharges"] = 'required|numeric|min:0';
        $valid["NoOfGuests"] = 'required|integer|min:1';
        $valid["NoOfRooms"] = 'required|integer|min:1';
        $valid["Description"] = 'required';
        $valid["Rating"] = 'required|integer|min:1';
        $valid["Discount"] = 'required|numeric|min:0';
        $valid["Status"] = 'required|integer|min:0|max:1';
        $valid["AutoApprove"] = 'required|integer|min:0|max:1';
        $valid["HotelRoomType"] = 'required|integer|min:1';
        $valid["IsVisible"] = 'required|integer';

        $valid_name["HotelName"] = 'Hotel Name';
        $valid_name["OriginalHotelName"] = 'Original Hotel Name';
        $valid_name["OwnerName"] = 'Owner Name';
        $valid_name["Address"] = 'Short Address';
        $valid_name["Address2"] = 'Full Address';
        $valid_name["PartnerRequestID"] = 'Partner';
        $valid_name["HotelTypeID"] = 'Type';
        $valid_name["SlugId"] = 'Slug';
        $valid_name["CityID"] = 'City';
        $valid_name["AgreementStartDate"] = 'Agreement Start Date';
        $valid_name["AgreementEndDate"] = 'Agreement End Date';
        $valid_name["PartnerPrice"] = 'Partner Price';
        $valid_name["SellingPrice"] = 'Selling Price';
        $valid_name["AdultCharges"] = 'Adult Charges';
        $valid_name["NoOfGuests"] = 'No. of Guests';
        $valid_name["NoOfRooms"] = 'No. of Rooms';
        $valid_name["Description"] = 'Description';
        $valid_name["Rating"] = 'Rating';
        $valid_name["Discount"] = 'Discount';
        $valid_name["Status"] = 'Status';
        $valid_name["AutoApprove"] = 'Auto Approve Booking';
        $valid_name["HotelRoomType"] = 'Hotel Room Type';
        $valid_name["IsVisible"] = 'Is Visible';

        // dd(Input::all());

        $v = Validator::make(\Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);

        if ($v->fails() || $error) {
            if ($error) {
                return response()->json([
                    'success' => false,
                    'errors' => $v->errors()
                ]);
                // dd($v->errors());
                // return redirect()->back()->withErrors($v->errors())->withInput()->with('warning_msg', $msg);
            } else {
                return response()->json([
                    'success' => false,
                    'errors' => $v->errors()
                ]);
                // dd('errors');
                // dd($v->errors());
                // return redirect()->back()->withErrors($v->errors())->withInput();
            }
        } else {
            $slug = $this->check_slug(str_slug(Input::get('HotelName'), '-'), 0);
            $hotel_data = [
                'HotelName' => Input::get('HotelName'),
                'Slug' => $slug,
                'OriginalHotelName' => Input::get('OriginalHotelName'),
                'OwnerName' => Input::get('OwnerName'),
                'Address' => Input::get('Address'),
                'Address2' => Input::get('Address2'),
                'PartnerRequestID' => Input::get('PartnerRequestID'),              
                'HotelTypeID' => Input::get('HotelTypeID'),
                'SlugId' => $SlugCount,
                'hotel_room_type_id' => Input::get('HotelRoomType'),
                'CityID' => Input::get('CityID'),
                'AgreementStartDate' => Input::get('AgreementStartDate'),
                'AgreementEndDate' => Input::get('AgreementEndDate'),
                'PartnerPrice' => Input::get('PartnerPrice'),
                'SellingPrice' => Input::get('SellingPrice'),
                'NoOfGuests' => Input::get('NoOfGuests'),
                'NoOfRooms' => Input::get('NoOfRooms'),
                'AdultCharges' => Input::get('AdultCharges'),
                'Description' => Input::get('Description'),
                'MetaTitle' => Input::get('MetaTitle'),
                'MetaKeywords' => Input::get('MetaKeywords'),
                'MetaDescription' => Input::get('MetaDescription'),
                'Rating' => Input::get('Rating'),
                'Discount' => Input::get('Discount'),
                'Status' => Input::get('Status'),
                'AutoApprove' => Input::get('AutoApprove'),
                'DateAdded' => new \DateTime,
                'IsVisible' => Input::get('IsVisible')
            ];

            DB::table('hotels')->insert($hotel_data);

            $HotelID = \DB::getPdo()->lastInsertId();

            if (Input::hasFile('Image')) {
                $i = 1;
                $fl = Input::file('Image');
                if (!empty($fl)) {
                    $filename = $HotelID . '_' . str_random(5) . '.' . $fl->getClientOriginalExtension();

                    $path = $this->data['upload_url_controller'] . 'hotels/' . $filename;

                    \Image::make($fl->getRealPath())->save($path);
                    \DB::table('hotels')->where('HotelID', $HotelID)->update(['Image' => $filename]);
                }
            }

            if (Input::hasFile('Thumbnail')) {
                $fl2 = Input::file('Thumbnail');
                if (!empty($fl2)) {
                    $filename2 = $HotelID . '_' . str_random(5) . '.' . $fl2->getClientOriginalExtension();

                    $path2 = $this->data['upload_url_controller'] . 'hotels/thumb/' . $filename2;

                    \Image::make($fl2->getRealPath())->save($path2);
                    \DB::table('hotels')->where('HotelID', $HotelID)->update(['Thumbnail' => $filename2]);
                }
            }
            return response()->json([
                'success' => true,
                'id' => $HotelID
            ]);
            // return redirect('admin/hotels/' . $HotelID)->with('success', "Hotel Added Successfully");
        }
    }

    public function edit($id) {
        $query = \DB::table('hotels');
        $query->where('HotelID', $id);

        $this->data['hotel'] = $query->first();

        if (empty($this->data['hotel'])) {
            return redirect('admin/hotels')->with('warning_msg', "Invalid Hotel ID");
        } else {
            return view('admin.hotels.edit', $this->data);
        }
    }

    public function check_slug($slug, $hotel_id = 0) {
        $hotel = DB::table('hotels')->where('Slug', $slug)->where('HotelID', '<>', $hotel_id)->first();
        if (!empty($hotel)) {
            $s = $slug . '-1';
            $slug = $this->check_slug($s, $hotel_id);
        }
        return $slug;
    }

    public function update($hotel_id) {
        $messages['required'] = 'Please enter :attribute.';
        $messages['min'] = 'Please select :attribute.';

        $error = false;
        $msg = "";

        $SlugCount=0;
        if(Input::get('SlugId') == "0")
        {
          $SlugCount = DB::table('hotels')->select('slugid')->orderBy('slugid','Desc')->take(1)->first()->slugid+1;
        }
        else
        {
            $SlugCount = Input::get('SlugId');
        }
        
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

        $valid["HotelName"] = 'required|max:255';
        $valid["OriginalHotelName"] = 'required|max:255';
        $valid["OwnerName"] = 'required|max:50';
        $valid["Address"] = 'required|max:255';
        $valid["Address2"] = 'required|max:255';
        $valid["PartnerRequestID"] = 'required|integer|min:1';
        $valid["HotelTypeID"] = 'required|integer|min:1';
        $valid["SlugId"] = 'required|integer|min:0';
        $valid["CityID"] = 'required|integer|min:1';
        $valid["AgreementStartDate"] = 'required|date|date_format:Y-m-d';
        $valid["AgreementEndDate"] = 'required|date|date_format:Y-m-d';
        $valid["PartnerPrice"] = 'required|numeric|min:0';
        $valid["SellingPrice"] = 'required|numeric|min:0';
        $valid["AdultCharges"] = 'required|numeric|min:0';
        $valid["NoOfGuests"] = 'required|integer|min:1';
        $valid["NoOfRooms"] = 'required|integer|min:1';
        $valid["Description"] = 'required';
        $valid["Rating"] = 'required|integer|min:1';
        $valid["Discount"] = 'required|numeric|min:0';
        $valid["Status"] = 'required|integer|min:0|max:1';
        $valid["AutoApprove"] = 'required|integer|min:0|max:1';
        $valid["HotelRoomType"] = 'required|integer|min:1';
        $valid["IsVisible"] = 'required|integer';

        $valid_name["HotelName"] = 'Hotel Name';
        $valid_name["OriginalHotelName"] = 'Original Hotel Name';
        $valid_name["OwnerName"] = 'Owner Name';
        $valid_name["Address"] = 'Short Address';
        $valid_name["Address2"] = 'Full Address';
        $valid_name["PartnerRequestID"] = 'Partner';
        $valid_name["HotelTypeID"] = 'Type';
        $valid_name["SlugId"] = 'Slug';
        $valid_name["CityID"] = 'City';
        $valid_name["AgreementStartDate"] = 'Agreement Start Date';
        $valid_name["AgreementEndDate"] = 'Agreement End Date';
        $valid_name["PartnerPrice"] = 'Partner Price';
        $valid_name["SellingPrice"] = 'Selling Price';
        $valid_name["AdultCharges"] = 'Adult Charges';
        $valid_name["NoOfGuests"] = 'No. of Guests';
        $valid_name["NoOfRooms"] = 'No. of Rooms';
        $valid_name["Description"] = 'Description';
        $valid_name["Rating"] = 'Rating';
        $valid_name["Discount"] = 'Discount';
        $valid_name["Status"] = 'Status';
        $valid_name["AutoApprove"] = 'Auto Approve Booking';
        $valid_name["HotelRoomType"] = 'Hotel Room Type';
        $valid_name["IsVisible"] = 'Is Visible';

        $v = Validator::make(\Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);

        if ($v->fails() || $error) {
            if ($error) {
                return redirect()->back()->withErrors($v->errors())->withInput()->with('warning_msg', $msg);
            } else {
                return redirect()->back()->withErrors($v->errors())->withInput();
            }
        } else {
            $slug = $this->check_slug(str_slug(Input::get('HotelName'), '-'), $hotel_id);
            $hotel_data = [
                'HotelName' => Input::get('HotelName'),
                'Slug' => $slug,
                'OriginalHotelName' => Input::get('OriginalHotelName'),
                'OwnerName' => Input::get('OwnerName'),
                'Address' => Input::get('Address'),
                'Address2' => Input::get('Address2'),
                'PartnerRequestID' => Input::get('PartnerRequestID'),
                'HotelTypeID' => Input::get('HotelTypeID'),
                'SlugId' => $SlugCount,
                'hotel_room_type_id' => Input::get('HotelRoomType'),
                'CityID' => Input::get('CityID'),
                'AgreementStartDate' => Input::get('AgreementStartDate'),
                'AgreementEndDate' => Input::get('AgreementEndDate'),
                'PartnerPrice' => Input::get('PartnerPrice'),
                'SellingPrice' => Input::get('SellingPrice'),
                'NoOfGuests' => Input::get('NoOfGuests'),
                'NoOfRooms' => Input::get('NoOfRooms'),
                'AdultCharges' => Input::get('AdultCharges'),
                'Description' => Input::get('Description'),
                'MetaTitle' => Input::get('MetaTitle'),
                'MetaKeywords' => Input::get('MetaKeywords'),
                'MetaDescription' => Input::get('MetaDescription'),
                'Rating' => Input::get('Rating'),
                'Discount' => Input::get('Discount'),
                'Status' => Input::get('Status'),
                'AutoApprove' => Input::get('AutoApprove'),
                'DateModified' => new \DateTime,
                'IsVisible' => Input::get('IsVisible')
            ];

            DB::table('hotels')->where('HotelID', $hotel_id)->update($hotel_data);

            if (Input::hasFile('Image')) {
                $i = 1;
                $fl = Input::file('Image');
                if (!empty($fl)) {
                    $Hotel = DB::table('hotels')->select('Image')->where('HotelID', $hotel_id)->first();
                    if (\File::exists($this->data['upload_url_controller'] . 'hotels/' . $Hotel->Image)) {
                        \File::delete($this->data['upload_url_controller'] . 'hotels/' . $Hotel->Image);
                    }
                    $filename = $hotel_id . '_' . str_random(5) . '.' . $fl->getClientOriginalExtension();

                    $path = $this->data['upload_url_controller'] . 'hotels/' . $filename;

                    \Image::make($fl->getRealPath())->save($path);
                    \DB::table('hotels')->where('HotelID', $hotel_id)->update(['Image' => $filename]);
                }
            }

            if (Input::hasFile('Thumbnail')) {
                $fl2 = Input::file('Thumbnail');
                if (!empty($fl2)) {
                    $Hotel = DB::table('hotels')->select('Thumbnail')->where('HotelID', $hotel_id)->first();
                    if (\File::exists($this->data['upload_url_controller'] . 'hotels/thumb/' . $Hotel->Thumbnail)) {
                        \File::delete($this->data['upload_url_controller'] . 'hotels/thumb/' . $Hotel->Thumbnail);
                    }
                    $filename2 = $hotel_id . '_' . str_random(5) . '.' . $fl2->getClientOriginalExtension();

                    $path2 = $this->data['upload_url_controller'] . 'hotels/thumb/' . $filename2;

                    \Image::make($fl2->getRealPath())->save($path2);
                    \DB::table('hotels')->where('HotelID', $hotel_id)->update(['Thumbnail' => $filename2]);
                }
            }
            return redirect('admin/hotels/' . $hotel_id)->with('success', "Hotel Updated Successfully");
        }
    }

    public function check_hotel($HotelID) {
        $Hotel = DB::table('hotels')->where('HotelID', $HotelID)->first();
        if (!empty($Hotel)) {
            return true;
        } else {
            return false;
        }
    }

    public function images($HotelID) {
        if (!$this->check_hotel($HotelID)) {
            return redirect('admin/hotels')->with('warning_msg', "Invalid Hotel ID");
        }
        $Q = \DB::table('hotel_images')->where('HotelID', $HotelID);
        $this->data['recordsTotal'] = count($Q->get());
        $this->data['HotelID'] = $HotelID;
        return view('admin.hotel-images.index', $this->data);
    }

    public function images_list($HotelID) {
        $start = (isset($_POST["start"]) ? (int) $_POST["start"] : 0);
        $length = (isset($_POST["length"]) ? (int) $_POST["length"] : 25);

        $columns = array("", "Title", "Image", "DateAdded", "DateModified");

        $query = \DB::table('hotel_images')->select(['HotelImageID', 'Title', 'Image',
                    DB::raw("DATE_FORMAT(DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
                    DB::raw("DATE_FORMAT(DateModified, \"%d-%b-%Y<br>%r\") as DateModified")])->where('HotelID', $HotelID);

        $recordsTotal = count($query->get());

        if (!empty($_POST['search']["value"])) {
            $input = strtolower(trim($_POST['search']["value"]));
            $query->whereRaw("(Title LIKE '%" . $input . "%')");
        }

        $query->orderBy($columns[(int) $_POST["order"][0]["column"]], strtoupper($_POST["order"][0]["dir"]));
        $query->orderBy("HotelImageID", "DESC");

        // limit acc to start and length
        $recordsFiltered = count($query->get());
        $result = $query->skip($start)->take($length)->get();
        // $maxRow = count($result);
        $data = [];
        foreach ($result as $Rs) {
            $data[] = array(
                "<input type=\"checkbox\" class=\"check\" name=\"ids[]\" value=\"" . $Rs->HotelImageID . "\" />",
                $Rs->Title,
                '<img src="' . $this->data['upload_url'] . 'hotels/' . $Rs->Image . '" style="width:150px; height: auto;" />',
                $Rs->DateAdded,
                $Rs->DateModified,
                '<button type="button" class="btn btn-success btn-sm" onClick="location.href=\'' . url('admin/hotel-images/' . $HotelID . '/' . $Rs->HotelImageID) . '\'"><i class="fa fa-edit"></i> Edit</button>'
            );
        }

        echo json_encode(array("draw" => (int) $_POST["draw"], "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, "data" => $data));
        exit(0);
    }

    public function add_image($HotelID) {
        if (!$this->check_hotel($HotelID)) {
            return redirect('admin/hotels')->with('warning_msg', "Invalid Hotel ID");
        }
        $this->data['HotelID'] = $HotelID;
        return view('admin.hotel-images.add', $this->data);
    }

    public function save_image($HotelID) {
        if (!$this->check_hotel($HotelID)) {
            return redirect('admin/hotels')->with('warning_msg', "Invalid Hotel ID");
        }

        $messages['required'] = 'Please enter :attribute.';

        $error = false;
        $msg = "";

        $allowed_ext = ['jpg', 'JPG', 'JPEG', 'jpeg', 'png', "PNG", 'gif', 'GIF'];
        
        if (Input::hasFile('Image')) {
            $images = Input::file('Image');
            
            foreach ($images as $img) {
                if (!empty($img)) {
                    $ext = $img->getClientOriginalExtension();
                    if (!in_array($ext, $allowed_ext)) {
                        $error = true;
                        $msg = "Invalid Image type";
                    }
                }
            }
        }
        else {
            $error = true;
            $msg = "Please select Image";
        }

        // if (Input::hasFile('Image')) {
        //     $fl = Input::file('Image');
        //     if (!empty($fl)) {
        //         $ext = $fl->getClientOriginalExtension();
        //         if (!in_array($ext, $allowed_ext)) {
        //             $error = true;
        //             $msg = "Invalid Image type";
        //         }
        //     }
        // } 

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

            $hotel_data = [
                'HotelID' => $HotelID,
                'Title' => Input::get('Title'),
                'Description' => Input::get('Description'),
                'DateAdded' => new \DateTime
            ];

            DB::table('hotel_images')->insert($hotel_data);

            $HotelImageID = \DB::getPdo()->lastInsertId();
            if(Input::hasFile('Image')){
                $images = Input::file('Image');
                    
                foreach ($images as $img) {
                    if (!empty($img)) {
                        DB::table('hotel_images')->insert($hotel_data);
                        $HotelImageID = \DB::getPdo()->lastInsertId();
                        
                        $filename = $HotelID . '_' . str_random(5) . '_' . $HotelImageID . '_' . str_random(5) . '.' . $img->getClientOriginalExtension();

                        $path = $this->data['upload_url_controller'] . 'hotels/' . $filename;
    
                        \Image::make($img->getRealPath())->save($path);
                        \DB::table('hotel_images')->where('HotelID', $HotelID)->where('HotelImageID', $HotelImageID)->update(['Image' => $filename]);
                        }
                }
            }

            // if (Input::hasFile('Image')) {
            //     $fl = Input::file('Image');
            //     if (!empty($fl)) {
            //         $filename = $HotelID . '_' . str_random(5) . '_' . $HotelImageID . '_' . str_random(5) . '.' . $fl->getClientOriginalExtension();

            //         $path = $this->data['upload_url_controller'] . 'hotels/' . $filename;

            //         \Image::make($fl->getRealPath())->save($path);
            //         \DB::table('hotel_images')->where('HotelID', $HotelID)->where('HotelImageID', $HotelImageID)->update(['Image' => $filename]);
            //     }
            // }
            return redirect('admin/hotel-images/' . $HotelID)->with('success', "Hotel Image Added Successfully");
        }
    }

    public function edit_image($HotelID, $ImageID) {
        if (!$this->check_hotel($HotelID)) {
            return redirect('admin/hotels')->with('warning_msg', "Invalid Hotel ID");
        }
        $this->data['HotelID'] = $HotelID;

        $query = \DB::table('hotel_images');
        $query->where('HotelID', $HotelID);
        $query->where('HotelImageID', $ImageID);

        $this->data['hotel_image'] = $query->first();

        if (empty($this->data['hotel_image'])) {
            return redirect('admin/hotel-images/' . $HotelID)->with('warning_msg', "Invalid Hotel Image");
        } else {
            return view('admin.hotel-images.edit', $this->data);
        }
    }

    public function update_image($HotelID, $ImageID) {
        if (!$this->check_hotel($HotelID)) {
            return redirect('admin/hotels')->with('warning_msg', "Invalid Hotel ID");
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

            $hotel_data = [
                'HotelID' => $HotelID,
                'Title' => Input::get('Title'),
                'Description' => Input::get('Description'),
                'DateModified' => new \DateTime
            ];

            DB::table('hotel_images')->where('HotelID', $HotelID)->where('HotelImageID', $ImageID)->update($hotel_data);

            if (Input::hasFile('Image')) {
                $fl = Input::file('Image');
                if (!empty($fl)) {
                    $Hotel = DB::table('hotel_images')->select('Image')->where('HotelID', $HotelID)->where('HotelImageID', $ImageID)->first();
                    if (\File::exists($this->data['upload_url_controller'] . 'hotels/' . $Hotel->Image)) {
                        \File::delete($this->data['upload_url_controller'] . 'hotels/' . $Hotel->Image);
                    }
                    $filename = $HotelID . '_' . str_random(5) . '_' . $ImageID . '_' . str_random(5) . '.' . $fl->getClientOriginalExtension();

                    $path = $this->data['upload_url_controller'] . 'hotels/' . $filename;

                    \Image::make($fl->getRealPath())->save($path);
                    \DB::table('hotel_images')->where('HotelID', $HotelID)->where('HotelImageID', $ImageID)->update(['Image' => $filename]);
                }
            }
            return redirect('admin/hotel-images/' . $HotelID . '/' . $ImageID)->with('success', "Hotel Image Updated Successfully");
        }
    }

    public function delete_images($HotelID) {
        if (!$this->check_hotel($HotelID)) {
            return redirect('admin/hotels')->with('warning_msg', "Invalid Hotel ID");
        }
        if (count(\Input::get('ids')) > 0) {
            foreach (Input::get('ids') as $id) {
                $Hotel = DB::table('hotel_images')->select('Image')->where('HotelID', $HotelID)->where('HotelImageID', $id)->first();
                if (\File::exists($this->data['upload_url_controller'] . 'hotels/' . $Hotel->Image)) {
                    \File::delete($this->data['upload_url_controller'] . 'hotels/' . $Hotel->Image);
                }
            }
            DB::table('hotel_images')
                    ->where('HotelID', $HotelID)
                    ->whereIn('HotelImageID', \Input::get('ids'))
                    ->delete();
        }
        return redirect('admin/hotel-images/' . $HotelID)->with('success', "Selected Hotel Images Deleted Successfully");
    }

    public function delete() {
        if (count(\Input::get('ids')) > 0) {
            foreach (Input::get('ids') as $id) {
                $Hotel = DB::table('hotels')->select('Image', 'Thumbnail')->where('HotelID', $id)->first();
                if (\File::exists($this->data['upload_url_controller'] . 'hotels/' . $Hotel->Image)) {
                    \File::delete($this->data['upload_url_controller'] . 'hotels/' . $Hotel->Image);
                }
                if (\File::exists($this->data['upload_url_controller'] . 'hotels/thumb/' . $Hotel->Thumbnail)) {
                    \File::delete($this->data['upload_url_controller'] . 'hotels/thumb/' . $Hotel->Thumbnail);
                }
            }
            DB::table('hotels')
                    ->whereIn('HotelID', \Input::get('ids'))
                    ->delete();
        }
        return redirect('admin/hotels')->with('success', "Selected Hotels Deleted Successfully");
    }

}
