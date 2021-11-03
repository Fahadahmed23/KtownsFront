<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;
date_default_timezone_set('asia/karachi');

class Cities extends AdminController {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $Q = \DB::table('cities');
        $this->data['recordsTotal'] = count($Q->get());
        return view('admin.cities.index', $this->data);
    }

    public function cities_list() {

        $start = (isset($_POST["start"]) ? (int) $_POST["start"] : 0);
        $length = (isset($_POST["length"]) ? (int) $_POST["length"] : 25);

        $columns = array("", "CityID", "CityName", "Image", "Status", "DateAdded", "DateModified");

        $query = \DB::table('cities')->select(['CityID', 'CityName', 'Image',
            DB::raw("CONCAT('<small class=\"label bg-', IF(Status = 0, 'red', 'green'), '\" ><i class=\"fa ', IF(Status = 0, 'fa-times', 'fa-check'), '\"></i> ', IF(Status = 1, 'Active', 'Deactive'), '</small>') AS Status"),
            DB::raw("DATE_FORMAT(DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
            DB::raw("DATE_FORMAT(DateModified, \"%d-%b-%Y<br>%r\") as DateModified")]);

        $recordsTotal = count($query->get());

        if (!empty($_POST['search']["value"])) {
            $input = strtolower(trim($_POST['search']["value"]));
            $query->whereRaw("(CityName LIKE '%" . $input . "%')");
        }

        $query->orderBy($columns[(int) $_POST["order"][0]["column"]], strtoupper($_POST["order"][0]["dir"]));
        $query->orderBy("CityID", "DESC");

        // limit acc to start and length
        $recordsFiltered = count($query->get());
        $result = $query->skip($start)->take($length)->get();
        // $maxRow = count($result);
        $data = [];
        foreach ($result as $Rs) {
            $data[] = array(
                "<input type=\"checkbox\" class=\"check\" name=\"ids[]\" value=\"" . $Rs->CityID . "\" />",
                $Rs->CityID,
                $Rs->CityName,
                '<img src="' . $this->data['upload_url'] . 'cities/' . $Rs->Image . '" style="width:60px; height: 60px;" />',
                $Rs->Status,
                $Rs->DateAdded,
                $Rs->DateModified,
                '<button type="button" class="btn btn-success btn-sm" onClick="location.href=\'cities/' . $Rs->CityID . '\'"><i class="fa fa-edit"></i> Edit</button>'
            );
        }

        echo json_encode(array("draw" => (int) $_POST["draw"], "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, "data" => $data));
        exit(0);
    }

    public function add() {
        return view('admin.cities.add', $this->data);
    }

    public function save() {

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

        $valid["CityName"] = 'required|max:255';
        $valid["Status"] = 'required|integer|min:0|max:1';

        $valid_name["CityName"] = 'City Name';
        $valid_name["Status"] = 'Status';

        $v = Validator::make(\Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);

        if ($v->fails() || $error) {
            if ($error) {
                return redirect()->back()->withErrors($v->errors())->withInput()->with('warning_msg', $msg);
            } else {
                return redirect()->back()->withErrors($v->errors())->withInput();
            }
        } else {

            $city_data = [
                'CityName' => Input::get('CityName'),
                'Status' => Input::get('Status'),
                'DateAdded' => new \DateTime
            ];

            DB::table('cities')->insert($city_data);

            $CityID = \DB::getPdo()->lastInsertId();

            if (Input::hasFile('Image')) {
                $i = 1;
                $fl = Input::file('Image');
                if (!empty($fl)) {
                    $filename = $CityID . '_' . str_random(5) . '.' . $fl->getClientOriginalExtension();

                    $path = $this->data['upload_url_controller'] . 'cities/' . $filename;

                    \Image::make($fl->getRealPath())->save($path);
                    \DB::table('cities')->where('CityID', $CityID)->update(['Image' => $filename]);
                }
            }
            return redirect('admin/cities')->with('success', "City Added Successfully");
        }
    }

    public function edit($id) {
        $query = \DB::table('cities');
        $query->where('CityID', $id);

        $this->data['city'] = $query->first();

        if (empty($this->data['city'])) {
            return redirect('admin/cities')->with('warning_msg', "Invalid City ID");
        } else {
            return view('admin.cities.edit', $this->data);
        }
    }

    public function update($city_id) {
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

        $valid["CityName"] = 'required|max:255';
        $valid["Status"] = 'required|integer|min:0|max:1';

        $valid_name["CityName"] = 'City Name';
        $valid_name["Status"] = 'Status';

        $v = Validator::make(\Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);

        if ($v->fails() || $error == true) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            $city_data = [
                'CityName' => Input::get('CityName'),
                'Status' => Input::get('Status'),
                'DateModified' => new \DateTime
            ];

            DB::table('cities')->where('CityID', $city_id)->update($city_data);

            if (Input::hasFile('Image')) {
                $i = 1;
                $fl = Input::file('Image');
                if (!empty($fl)) {
                    $City = DB::table('cities')->select('Image')->where('CityID', $city_id)->first();
                    if (\File::exists($this->data['upload_url_controller'] . 'cities/' . $City->Image)) {
                        \File::delete($this->data['upload_url_controller'] . 'cities/' . $City->Image);
                    }
                    $filename = $city_id . '_' . str_random(5) . '.' . $fl->getClientOriginalExtension();

                    $path = $this->data['upload_url_controller'] . 'cities/' . $filename;

                    \Image::make($fl->getRealPath())->save($path);
                    \DB::table('cities')->where('CityID', $city_id)->update(['Image' => $filename]);
                }
            }
            return redirect('admin/cities/' . $city_id)->with('success', "City Updated Successfully");
        }
    }

    public function delete() {
        if (count(\Input::get('ids')) > 0) {
            DB::table('cities')
                    ->whereIn('CityID', \Input::get('ids'))
                    ->delete();
        }
        return redirect('admin/cities')->with('success', "Selected Cities Deleted Successfully");
    }

}
