<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;
date_default_timezone_set('asia/karachi');
class Clients extends AdminController {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $Q = \DB::table('clients');
        $this->data['recordsTotal'] = count($Q->get());

        return view('admin.clients.index', $this->data);
    }

    public function clients_list() {
        $start = (isset($_POST["start"]) ? (int) $_POST["start"] : 0);
        $length = (isset($_POST["length"]) ? (int) $_POST["length"] : 25);

        $columns = array("", "ClientID", "Title", "Image", "Status", "DateAdded", "DateModified");

        $query = \DB::table('clients')->select(['ClientID', 'Title', 'Image',
            DB::raw("CONCAT('<small class=\"label bg-', IF(Status = 0, 'red', 'green'), '\" ><i class=\"fa ', IF(Status = 0, 'fa-times', 'fa-check'), '\"></i> ', IF(Status = 1, 'Active', 'Deactive'), '</small>') AS Status"),
            DB::raw("DATE_FORMAT(DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
            DB::raw("DATE_FORMAT(DateModified, \"%d-%b-%Y<br>%r\") as DateModified")]);

        $recordsTotal = count($query->get());

        if (!empty($_POST['search']["value"])) {
            $input = strtolower(trim($_POST['search']["value"]));
            $query->whereRaw("(Title LIKE '%" . $input . "%')");
        }

        $query->orderBy($columns[(int) $_POST["order"][0]["column"]], strtoupper($_POST["order"][0]["dir"]));
        $query->orderBy("ClientID", "DESC");

        // limit acc to start and length
        $recordsFiltered = count($query->get());
        $result = $query->skip($start)->take($length)->get();
        // $maxRow = count($result);
        $data = [];
        foreach ($result as $Rs) {
            $data[] = array(
                "<input type=\"checkbox\" class=\"check\" name=\"ids[]\" value=\"" . $Rs->ClientID . "\" />",
                $Rs->ClientID,
                $Rs->Title,
                '<img src="' . url('public/uploads/website/clients/' . $Rs->Image) . '" />',
                $Rs->Status,
                $Rs->DateAdded,
                $Rs->DateModified,
                '<button type="button" class="btn btn-success btn-sm" onClick="location.href=\'clients/' . $Rs->ClientID . '\'"><i class="fa fa-edit"></i> Edit</button>'
            );
        }

        echo json_encode(array("draw" => (int) $_POST["draw"], "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, "data" => $data));
        exit(0);
    }

    public function add() {
        return view('admin.clients.add', $this->data);
    }

    public function save() {
        $error = false;
        $valid["Status"] = 'required|integer|min:0|max:1';
        $valid["Title"] = 'required|max:255';

        $valid_name["Title"] = "Title";
        $valid_name["Status"] = "Status";

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

        $v = Validator::make(Input::all(), $valid);
        $v->setAttributeNames($valid_name);
        if ($v->fails() || $error) {
            if ($error) {
                return redirect()->back()->withErrors($v->errors())->withInput()->with('warning_msg', $msg);
            } else {
                return redirect()->back()->withErrors($v->errors())->withInput();
            }
        } else {
            $ClientData = array(
                'Title' => Input::get('Title'),
                'Status' => Input::get('Status'),
                "DateAdded" => new \DateTime
            );
            \DB::table('clients')->insert($ClientData);
            $ClientID = \DB::getPdo()->lastInsertId();

            if (Input::hasFile('Image')) {
                $fl = Input::file('Image');
                if (!empty($fl)) {
                    $filename = $ClientID . '_' . str_random(5) . '_' . str_random(5) . '.' . $fl->getClientOriginalExtension();

                    $path = public_path('uploads/website/clients') . '/' . $filename;

                    \Image::make($fl->getRealPath())->save($path);
                    \DB::table('clients')->where('ClientID', $ClientID)->update(['Image' => $filename]);
                }
            }

            return redirect('admin/clients')->with(['success' => "Client Added Successfully"]);
        }
    }

    public function edit($id) {
        $query = \DB::table('clients');
        $query->where('ClientID', $id);

        $this->data['client'] = $query->first();

        if (empty($this->data['client'])) {
            return redirect('admin/clients')->with('warning_msg', "Invalid Client ID");
        } else {
            return view('admin.clients.edit', $this->data);
        }
    }

    public function update($id) {
        $error = false;
        $valid["Status"] = 'required|integer|min:0|max:1';
        $valid["Title"] = 'required|max:255';

        $valid_name["Title"] = "Title";
        $valid_name["Status"] = "Status";

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

        $v = Validator::make(Input::all(), $valid);
        $v->setAttributeNames($valid_name);
        if ($v->fails() || $error) {
            if ($error) {
                return redirect()->back()->withErrors($v->errors())->withInput()->with('warning_msg', $msg);
            } else {
                return redirect()->back()->withErrors($v->errors())->withInput();
            }
        } else {
            DB::table('clients')
                    ->where('ClientID', $id)
                    ->update([
                        'Title' => Input::get('Title'),
                        'Status' => Input::get('Status'),
                        'DateModified' => new \DateTime
            ]);

            if (Input::hasFile('Image')) {
                $fl = Input::file('Image');
                if (!empty($fl)) {
                    $filename = $id . '_' . str_random(5) . '_' . str_random(5) . '.' . $fl->getClientOriginalExtension();

                    $path = public_path('uploads/website/clients') . '/' . $filename;

                    \Image::make($fl->getRealPath())->save($path);
                    \DB::table('clients')->where('ClientID', $id)->update(['Image' => $filename]);
                }
            }

            return redirect('admin/clients')->with(['success' => "Client Updated Successfully"]);
        }
    }

    public function delete() {
        if (count(Input::get('ids')) > 0) {
            DB::table('clients')
                    ->whereIn('ClientID', Input::get('ids'))
                    ->delete();
        }
        return redirect('admin/clients')->with('success', "Selected Client Deleted Successfully");
    }

}
