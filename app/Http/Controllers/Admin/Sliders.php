<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;
date_default_timezone_set('asia/karachi');

class Sliders extends AdminController {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $Q = \DB::table('sliders');
        $this->data['recordsTotal'] = count($Q->get());

        return view('admin.sliders.index', $this->data);
    }

    public function slides_list() {
        $start = (isset($_POST["start"]) ? (int) $_POST["start"] : 0);
        $length = (isset($_POST["length"]) ? (int) $_POST["length"] : 25);

        $columns = array("", "SlideID", "Title","Image", "Status", "DateAdded", "DateModified");

        $query = \DB::table('sliders')->select(['SlideID', 'Title','Image',
            DB::raw("CONCAT('<small class=\"label bg-', IF(Status = 0, 'red', 'green'), '\" ><i class=\"fa ', IF(Status = 0, 'fa-times', 'fa-check'), '\"></i> ', IF(Status = 1, 'Active', 'Deactive'), '</small>') AS Status"),
            DB::raw("DATE_FORMAT(DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
            DB::raw("DATE_FORMAT(DateModified, \"%d-%b-%Y<br>%r\") as DateModified")]);

        $recordsTotal = count($query->get());

        if (!empty($_POST['search']["value"])) {
            $input = strtolower(trim($_POST['search']["value"]));
            $query->whereRaw("(Title LIKE '%" . $input . "%')");
        }

        $query->orderBy($columns[(int) $_POST["order"][0]["column"]], strtoupper($_POST["order"][0]["dir"]));
        $query->orderBy("SlideID", "DESC");

        // limit acc to start and length
        $recordsFiltered = count($query->get());
        $result = $query->skip($start)->take($length)->get();
        // $maxRow = count($result);
        $data = [];
        foreach ($result as $Rs) {
            $data[] = array(
                "<input type=\"checkbox\" class=\"check\" name=\"ids[]\" value=\"" . $Rs->SlideID . "\" />",
                $Rs->SlideID,
                $Rs->Title,
                '<img src="' . $this->data['upload_url'] . 'sliders/' . $Rs->Image . '" style="width:60px; height: 60px;" />',
                $Rs->Status,
                $Rs->DateAdded,
                $Rs->DateModified,
                '<button type="button" class="btn btn-success btn-sm" onClick="location.href=\'sliders/' . $Rs->SlideID . '\'"><i class="fa fa-edit"></i> Edit</button>'
            );
        }

        echo json_encode(array("draw" => (int) $_POST["draw"], "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, "data" => $data));
        exit(0);
    }

    public function add() {
        // dd($this->data); 
        return view('admin.sliders.add', $this->data);
    }

    public function save() {
        // input::all();
        // dd(input::file('Img'));
        // dd( input::get());

        $error = false;
        $valid["Status"] = 'required|integer|min:0|max:1';
        $valid["Title"] = 'required|max:255';
        $valid["Img"] = 'required|mimes:jpeg,png,jpg|dimensions:max_width=1356px,max_height=450|max:2000';

        $valid_name["Title"] = "Title";
        $valid_name["Status"] = "Status";

        $allowed_ext = ['jpg', 'JPG', 'JPEG', 'jpeg', 'png', "PNG", 'gif', 'GIF'];

        if (\Input::hasFile('Img')) {
            $fl = \Input::file('Img');
            if (!empty($fl)) {
                $ext = $fl->getClientOriginalExtension();
                if (!in_array($ext, $allowed_ext)) {
                    $error = true;
                }
            }
        }
        $imageSizeValidator = Validator::make(\Input::all(),$valid);

        if ($imageSizeValidator->fails() || $error == true) {
            return redirect()->back()->withErrors($imageSizeValidator->errors())->withInput();
        } 

        $v = Validator::make(\Input::all(), $valid);
        $v->setAttributeNames($valid_name);
        if ($v->fails() || $error == true) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            $SliderData = array(
                'Title' => \Input::get('Title'),
                'Description' => \Input::get('Description'),
                'Status' => \Input::get('Status'),
                "DateAdded" => new \DateTime
            );
            \DB::table('sliders')->insert($SliderData);
            $SlideID = \DB::getPdo()->lastInsertId();

            if (\Input::hasFile('Img')) {
                //dd($this->data['upload_url_controller']);
                // dd(public_path());
                // dd(input::file('Img'));
                $fl = \Input::file('Img');
                if (!empty($fl)) {
                    $filename = $SlideID . '_' . str_random(5) . '_' . str_random(5) . '.' . $fl->getClientOriginalExtension();
                   // dd($filename);
                    // $path = public_path('uploads/website/sliders') . '/' . $filename;
                     $path = $this->data['upload_url_controller'] . 'sliders/' . $filename;
                     // dd($path);
                    \Image::make($fl->getRealPath())->save($path);
                    \DB::table('sliders')->where('SlideID', $SlideID)->update(['Image' => $filename]);
                }
            }

            return redirect('admin/sliders')->with(['success' => "Slide Added Successfully"]);
        }
    }

    public function edit($id) {
        $query = \DB::table('sliders');
        $query->where('SlideID', $id);

        $this->data['sliders'] = $query->first();

        if (empty($this->data['sliders'])) {
            return redirect('admin/sliders')->with('warning_msg', "Invalid Slide ID");
        } else {
            return view('admin.sliders.edit', $this->data);
        }
    }

    public function update() {
         // dd(Input::file('Image'));
        $error = false;
        $valid["Status"] = 'required|integer|min:0|max:1';
        $valid["Title"] = 'required|max:255';
        $valid["Img"] = 'required|mimes:jpeg,png,jpg|dimensions:max_width=1356px,max_height=450|max:2000';

        $valid_name["Title"] = "Title";
        $valid_name["Status"] = "Status";

        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];

        if (\Input::hasFile('Image')) {
            $fl = \Input::file('Image');
            if (!empty($fl)) {
                $ext = $fl->getClientOriginalExtension();
                if (!in_array(strtolower($ext), $allowed_ext)) {
                    $error = true;
                }
            }
        }

        $imageSizeValidator = Validator::make(\Input::all(),$valid);

        if ($imageSizeValidator->fails() || $error == true) {
            return redirect()->back()->withErrors($imageSizeValidator->errors())->withInput();
        } 

        $v = Validator::make(\Input::all(), $valid);
        $v->setAttributeNames($valid_name);
        if ($v->fails() || $error == true) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            DB::table('sliders')
                    ->where('SlideID', \Input::get('ItemID'))
                    ->update([
                        'Title' => \Input::get('Title'),
                        'Description' => \Input::get('Description'),
                        'Status' => \Input::get('Status'),
                        'DateModified' => new \DateTime
            ]);

            if (\Input::hasFile('Image')) {
                $fl = \Input::file('Image');
                // dd($fl);
                if (!empty($fl)) {
                    // dd(input::get());
                    $Slider = DB::table('sliders')->select('Image')->where('SlideID', \Input::get('ItemID'))->first();
                    // dd($Slider);
                    if (\File::exists($this->data['upload_url_controller'] . 'sliders/' . $Slider->Image)) {
                        \File::delete($this->data['upload_url_controller'] . 'sliders/' . $Slider->Image);
                    }

                    $filename = \Input::get('ItemID') . '_' . str_random(5) . '_' . str_random(5) . '.' . $fl->getClientOriginalExtension();
                // dd($path);
                    // dd($filename);
                    $path = $this->data['upload_url_controller'] . 'sliders/' . $filename;
                    //$path = public_path('uploads/website/sliders') . '/' . $filename;
                    // dd($path);
                    \Image::make($fl->getRealPath())->save($path);
                    \DB::table('sliders')->where('SlideID', \Input::get('ItemID'))->update(['Image' => $filename]);
                }
            }

            return redirect('admin/sliders')->with(['success' => "Slide Updated Successfully"]);
        }
    }

    public function delete() {
        if (count(\Input::get('ids')) > 0) {
            DB::table('sliders')
                    ->whereIn('SlideID', \Input::get('ids'))
                    ->delete();
        }
        return redirect('admin/sliders')->with('success', "Selected Slides Deleted Successfully");
    }

}
