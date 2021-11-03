<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;

class CorporateClients extends AdminController {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $Q = \DB::table('corporate_clients');
        $this->data['recordsTotal'] = count($Q->get());

        return view('admin.corporate-clients.index', $this->data);
    }

    public function partners_list() {
        $start = (isset($_POST["start"]) ? (int) $_POST["start"] : 0);
        $length = (isset($_POST["length"]) ? (int) $_POST["length"] : 25);

        $columns = array("", "CorporateClientID", "FullName", "EmailAddress", "ContactNo", "Location", "DateAdded");

        $query = \DB::table('corporate_clients')->select(['CorporateClientID', 'FullName', 'EmailAddress', 'ContactNo', 'Location',
            DB::raw("CONCAT('<small class=\"label bg-', IF(Status = 0, 'red', 'green'), '\" ><i class=\"fa ', IF(Status = 0, 'fa-times', 'fa-check'), '\"></i> ', IF(Status = 1, 'Active', 'Deactive'), '</small>') AS Status"),
            DB::raw("DATE_FORMAT(DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
            DB::raw("DATE_FORMAT(DateModified, \"%d-%b-%Y<br>%r\") as DateModified")]);

        $recordsTotal = count($query->get());

        if (!empty($_POST['search']["value"])) {
            $input = strtolower(trim($_POST['search']["value"]));
            $query->whereRaw("(FullName LIKE '%" . $input . "%')");
        }

        $query->orderBy($columns[(int) $_POST["order"][0]["column"]], strtoupper($_POST["order"][0]["dir"]));
        $query->orderBy("CorporateClientID", "DESC");

        // limit acc to start and length
        $recordsFiltered = count($query->get());
        $result = $query->skip($start)->take($length)->get();
        // $maxRow = count($result);
        $data = [];
        foreach ($result as $Rs) {
            $data[] = array(
                "<input type=\"checkbox\" class=\"check\" name=\"ids[]\" value=\"" . $Rs->CorporateClientID . "\" />",
                $Rs->CorporateClientID,
                $Rs->FullName,
                $Rs->EmailAddress,
                $Rs->ContactNo,
                $Rs->Location,
                $Rs->DateAdded,
                '<button type="button" class="btn btn-success btn-sm" onClick="location.href=\'corporate-clients/' . $Rs->CorporateClientID . '\'"><i class="fa fa-eye"></i> View</button>'
            );
        }

        echo json_encode(array("draw" => (int) $_POST["draw"], "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, "data" => $data));
        exit(0);
    }

    public function details($id) {
        $this->data['Details'] = DB::table('corporate_clients')->where('CorporateClientID', $id)->first();
        if (!empty($this->data['Details'])) {
            return view('admin.corporate-clients.view', $this->data);
        } else {
            return redirect('admin/corporate-clients')->with('error', "Invalid ID");
        }
    }

    public function delete() {
        if (count(\Input::get('ids')) > 0) {
            DB::table('corporate_clients')
                    ->whereIn('CorporateClientID', \Input::get('ids'))
                    ->delete();
        }
        return redirect('admin/corporate-clients')->with('success', "Selected Requests Deleted Successfully");
    }

}
