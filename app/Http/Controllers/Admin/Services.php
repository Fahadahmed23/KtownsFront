<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;
date_default_timezone_set('asia/karachi');

class Services extends AdminController {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $Q = \DB::table('services');
        $this->data['recordsTotal'] = count($Q->get());
        return view('admin.services.index', $this->data);
    }

    public function services_list() {

        $start = (isset($_POST["start"]) ? (int) $_POST["start"] : 0);
        $length = (isset($_POST["length"]) ? (int) $_POST["length"] : 25);

        $columns = array("", "ServiceID", "ServiceName", "Icon", "Status", "DateAdded", "DateModified");

        $query = \DB::table('services')->select(['ServiceID', 'ServiceName', 'Icon',
            DB::raw("CONCAT('<small class=\"label bg-', IF(Status = 0, 'red', 'green'), '\" ><i class=\"fa ', IF(Status = 0, 'fa-times', 'fa-check'), '\"></i> ', IF(Status = 1, 'Active', 'Deactive'), '</small>') AS Status"),
            DB::raw("DATE_FORMAT(DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
            DB::raw("DATE_FORMAT(DateModified, \"%d-%b-%Y<br>%r\") as DateModified")]);

        $recordsTotal = count($query->get());

        if (!empty($_POST['search']["value"])) {
            $input = strtolower(trim($_POST['search']["value"]));
            $query->whereRaw("(ServiceName LIKE '%" . $input . "%')");
        }

        $query->orderBy($columns[(int) $_POST["order"][0]["column"]], strtoupper($_POST["order"][0]["dir"]));
        $query->orderBy("ServiceID", "DESC");

        // limit acc to start and length
        $recordsFiltered = count($query->get());
        $result = $query->skip($start)->take($length)->get();
        // $maxRow = count($result);
        $data = [];
        foreach ($result as $Rs) {
            $data[] = array(
                "<input type=\"checkbox\" class=\"check\" name=\"ids[]\" value=\"" . $Rs->ServiceID . "\" />",
                $Rs->ServiceID,
                $Rs->ServiceName,
                '<img src="' . $this->data['upload_url'] . 'services/' . $Rs->Icon . '" style="width:60px; height: 60px;" />',
                $Rs->Status,
                $Rs->DateAdded,
                $Rs->DateModified,
                '<button type="button" class="btn btn-success btn-sm" onClick="location.href=\'services/' . $Rs->ServiceID . '\'"><i class="fa fa-edit"></i> Edit</button>'
            );
        }

        echo json_encode(array("draw" => (int) $_POST["draw"], "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, "data" => $data));
        exit(0);
    }

    public function add() {
        return view('admin.services.add', $this->data);
    }

    public function save() {

        $messages['required'] = 'Please enter :attribute.';

        $error = false;
        $msg = "";

        $allowed_ext = ['jpg', 'JPG', 'JPEG', 'jpeg', 'png', "PNG", 'gif', 'GIF'];

        if (Input::hasFile('Icon')) {
            $fl = Input::file('Icon');
            if (!empty($fl)) {
                $ext = $fl->getClientOriginalExtension();
                if (!in_array($ext, $allowed_ext)) {
                    $error = true;
                    $msg = "Invalid Icon type";
                }
            }
        } else {
            $error = true;
            $msg = "Please select Icon";
        }

        $valid["ServiceName"] = 'required|max:255';
        $valid["Status"] = 'required|integer|min:0|max:1';

        $valid_name["ServiceName"] = 'Service Name';
        $valid_name["Status"] = 'Status';

        $v = Validator::make(\Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);

        if ($v->fails()) {
            if ($error) {
                return redirect()->back()->withErrors($v->errors())->withInput()->with('warning_msg', $msg);
            } else {
                return redirect()->back()->withErrors($v->errors())->withInput();
            }
        } else {

            $service_data = [
                'ServiceName' => Input::get('ServiceName'),
                'Status' => Input::get('Status'),
                'DateAdded' => new \DateTime
            ];

            DB::table('services')->insert($service_data);

            $ServiceID = \DB::getPdo()->lastInsertId();

            if (Input::hasFile('Icon')) {
                $i = 1;
                $fl = Input::file('Icon');
                if (!empty($fl)) {
                    $filename = $ServiceID . '_' . str_random(5) . '.' . $fl->getClientOriginalExtension();

                    $path = $this->data['upload_url_controller'] . 'services/' . $filename;

                    \Image::make($fl->getRealPath())->save($path);
                    \DB::table('services')->where('ServiceID', $ServiceID)->update(['Icon' => $filename]);
                }
            }
            return redirect('admin/services')->with('success', "Service Added Successfully");
        }
    }

    public function edit($id) {
        $query = \DB::table('services');
        $query->where('ServiceID', $id);

        $this->data['service'] = $query->first();

        if (empty($this->data['service'])) {
            return redirect('admin/services')->with('warning_msg', "Invalid Service ID");
        } else {
            return view('admin.services.edit', $this->data);
        }
    }

    public function update($service_id) {
        $messages['required'] = 'Please enter :attribute.';

        $error = false;
        $msg = "";

        $allowed_ext = ['jpg', 'JPG', 'JPEG', 'jpeg', 'png', "PNG", 'gif', 'GIF'];

        if (Input::hasFile('Icon')) {
            $fl = Input::file('Icon');
            if (!empty($fl)) {
                $ext = $fl->getClientOriginalExtension();
                if (!in_array($ext, $allowed_ext)) {
                    $error = true;
                    $msg = "Invalid Icon type";
                }
            }
        }

        $valid["ServiceName"] = 'required|max:255';
        $valid["Status"] = 'required|integer|min:0|max:1';

        $valid_name["ServiceName"] = 'ServiceName';
        $valid_name["Status"] = 'Status';

        $v = Validator::make(\Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);

        if ($v->fails() || $error == true) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            $service_data = [
                'ServiceName' => Input::get('ServiceName'),
                'Status' => Input::get('Status'),
                'DateModified' => new \DateTime
            ];

            DB::table('services')->where('ServiceID', $service_id)->update($service_data);

            if (Input::hasFile('Icon')) {
                $i = 1;
                $fl = Input::file('Icon');
                if (!empty($fl)) {
                    $Service = DB::table('services')->select('Icon')->where('ServiceID', $service_id)->first();
                    if (\File::exists($this->data['upload_url_controller'] . 'services/' . $Service->Icon)) {
                        \File::delete($this->data['upload_url_controller'] . 'services/' . $Service->Icon);
                    }
                    $filename = $service_id . '_' . str_random(5) . '.' . $fl->getClientOriginalExtension();

                    $path = $this->data['upload_url_controller'] . 'services/' . $filename;

                    \Image::make($fl->getRealPath())->save($path);
                    \DB::table('services')->where('ServiceID', $service_id)->update(['Icon' => $filename]);
                }
            }
            return redirect('admin/services/' . $service_id)->with('success', "Service Updated Successfully");
        }
    }

    public function delete() {
        if (count(\Input::get('ids')) > 0) {
            DB::table('services')
                    ->whereIn('ServiceID', \Input::get('ids'))
                    ->delete();
        }
        return redirect('admin/services')->with('success', "Selected Services Deleted Successfully");
    }

}
