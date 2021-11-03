<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use Validator;
use DB,
    Hash;
date_default_timezone_set('asia/karachi');
class Users extends AdminController {

    function __construct() {
        parent::__construct();
        $this->data['UserTypeDropdown'] = ["Select User Type", "Customer", "Business", "Travel Agents"];
    }

    public function index() {
        $Q = \DB::table('users');
        $this->data['recordsTotal'] = count($Q->get());

        return view('admin.users.index', $this->data);
    }

    public function users_list() {
        $start = (isset($_POST["start"]) ? (int) $_POST["start"] : 0);
        $length = (isset($_POST["length"]) ? (int) $_POST["length"] : 25);

        $columns = array("", "UserID", "UserType", "FirstName", "LastName", "EmailAddress", "Status", "IsVerified", "IsActivated", "DateAdded", "DateModified");

        $query = \DB::table('users')->select(['UserID', 'UserType', 'FirstName', 'LastName', 'EmailAddress',
            DB::raw("CONCAT('<small class=\"label bg-', IF(Status = 0, 'red', 'green'), '\" ><i class=\"fa ', IF(Status = 0, 'fa-times', 'fa-check'), '\"></i> ', IF(Status = 1, 'Active', 'Deactive'), '</small>') AS Status"),
            DB::raw("CONCAT('<small class=\"label bg-', IF(IsVerified = 0, 'red', 'green'), '\" ><i class=\"fa ', IF(IsVerified = 0, 'fa-times', 'fa-check'), '\"></i> ', IF(IsVerified = 1, 'Yes', 'No'), '</small>') AS IsVerified"),
            DB::raw("CONCAT('<small class=\"label bg-', IF(IsActivated = 0, 'red', 'green'), '\" ><i class=\"fa ', IF(IsActivated = 0, 'fa-times', 'fa-check'), '\"></i> ', IF(IsActivated = 1, 'Yes', 'No'), '</small>') AS IsActivated"),
            DB::raw("DATE_FORMAT(DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
            DB::raw("DATE_FORMAT(DateModified, \"%d-%b-%Y<br>%r\") as DateModified")]);

        $recordsTotal = count($query->get());

        if (!empty($_POST['search']["value"])) {
            $input = strtolower(trim($_POST['search']["value"]));
            $query->whereRaw("(FirstName LIKE '%" . $input . "%' OR LastName LIKE '%" . $input . "%' OR EmailAddress LIKE '%" . $input . "%')");
        }

        $query->orderBy($columns[(int) $_POST["order"][0]["column"]], strtoupper($_POST["order"][0]["dir"]));
        $query->orderBy("UserID", "DESC");

        // limit acc to start and length
        $recordsFiltered = count($query->get());
        $result = $query->skip($start)->take($length)->get();
        // $maxRow = count($result);
        $data = [];
        foreach ($result as $Rs) {
            $data[] = array(
                "<input type=\"checkbox\" class=\"check\" name=\"ids[]\" value=\"" . $Rs->UserID . "\" />",
                $Rs->UserID,
                $this->data['UserTypeDropdown'][$Rs->UserType],
                $Rs->FirstName,
                $Rs->LastName,
                $Rs->EmailAddress,
                $Rs->Status,
                $Rs->IsVerified,
                $Rs->IsActivated,
                $Rs->DateAdded,
                $Rs->DateModified,
                '<button type="button" class="btn btn-success btn-sm" onClick="location.href=\'users/' . $Rs->UserID . '\'"><i class="fa fa-edit"></i> Edit</button>'
            );
        }

        echo json_encode(array("draw" => (int) $_POST["draw"], "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, "data" => $data));
        exit(0);
    }

    public function add() {
        return view('admin.users.add', $this->data);
    }

    public function save() {
        $valid["UserType"] = 'required|integer|min:1';
        $valid["FirstName"] = 'required|max:255';
        $valid["LastName"] = 'required|max:255';
        $valid["Cell"] = 'required|max:20';
        $valid["EmailAddress"] = 'required|email|max:50|unique:users';
        $valid["Password"] = 'required|max:20';
        $valid["Status"] = 'required|integer|min:0|max:1';
        $valid["IsVerified"] = 'required|integer|min:0|max:1';
        $valid["IsActivated"] = 'required|integer|min:0|max:1';

        $valid_name["UserType"] = "User Type";
        $valid_name["FirstName"] = "First Name";
        $valid_name["LastName"] = "Last Name";
        $valid_name["Cell"] = "Phone";
        $valid_name["EmailAddress"] = "Email Address";
        $valid_name["Password"] = "Password";
        $valid_name["Status"] = "Status";
        $valid_name["IsVerified"] = "Email Verified";
        $valid_name["IsActivated"] = "Cell Verified";

        $messages = [
            'required' => 'Please enter :attribute.',
            'min' => 'Please select :attribute.'
        ];

        $v = Validator::make(\Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            $UserData['UserType'] = Input::get('UserType');
            $UserData['FirstName'] = Input::get('FirstName');
            $UserData['LastName'] = Input::get('LastName');
            $UserData['Cell'] = Input::get('Cell');
            $UserData['EmailAddress'] = Input::get('EmailAddress');
            $UserData['Password'] = sha1(Input::get('Password'));
            $UserData['Status'] = Input::get('Status');
            $UserData['IsVerified'] = Input::get('IsVerified');
            $UserData['IsActivated'] = Input::get('IsActivated');
            $UserData['DateAdded'] = new \DateTime;

            \DB::table('users')->insert($UserData);
            return redirect('admin/users')->with(['success' => "User Added Successfully"]);
        }
    }

    public function edit($id) {
        $query = \DB::table('users');
        $query->where('UserID', $id);

        $this->data['user'] = $query->first();

        if (empty($this->data['user'])) {
            return redirect('admin/users')->with('warning_msg', "Invalid User ID");
        } else {
            return view('admin.users.edit', $this->data);
        }
    }

    public function update($id) {
        $valid["UserType"] = 'required|integer|min:1';
        $valid["FirstName"] = 'required|max:50';
        $valid["LastName"] = 'required|max:50';
        $valid["Cell"] = 'required|max:20';
        $valid["EmailAddress"] = 'required|email|max:50|unique:users,EmailAddress,' . $id . ',UserID';
        if (Input::has('Password') && Input::get('Password') != "") {
            $valid["Password"] = 'required|max:20';
            $valid_name["Password"] = "EPassword";
        }
        $valid["Status"] = 'required|integer|min:0|max:1';
        $valid["IsVerified"] = 'required|integer|min:0|max:1';
        $valid["IsActivated"] = 'required|integer|min:0|max:1';

        $valid_name["UserType"] = "User Type";
        $valid_name["FirstName"] = "First Name";
        $valid_name["LastName"] = "Last Name";
        $valid_name["Cell"] = "Cell";
        $valid_name["EmailAddress"] = "Email Address";
        $valid_name["Status"] = "Status";
        $valid_name["IsVerified"] = "Email Verified";
        $valid_name["IsActivated"] = "Cell Verified";

        $messages = [
            'required' => 'Please enter :attribute.',
            'min' => 'Please select :attribute.'
        ];

        $v = Validator::make(\Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            $UserData['UserType'] = Input::get('UserType');
            $UserData['FirstName'] = Input::get('FirstName');
            $UserData['LastName'] = Input::get('LastName');
            $UserData['Cell'] = Input::get('Cell');
            $UserData['EmailAddress'] = Input::get('EmailAddress');
            if (Input::has('Password') && Input::get('Password') != "") {
                $UserData['Password'] = sha1(Input::get('Password'));
            }
            $UserData['Status'] = Input::get('Status');
            $UserData['IsVerified'] = Input::get('IsVerified');
            $UserData['IsActivated'] = Input::get('IsActivated');
            $UserData['DateModified'] = new \DateTime;

            DB::table('users')
                    ->where('UserID', $id)
                    ->update($UserData);
            return redirect('admin/users')->with(['success' => "User Updated Successfully"]);
        }
    }

    public function delete() {
        if (count(\Input::get('ids')) > 0) {
            DB::table('users')
                    ->whereIn('UserID', \Input::get('ids'))
                    ->delete();
        }
        return redirect('admin/users')->with('success', "Selected Users Deleted Successfully");
    }

}
