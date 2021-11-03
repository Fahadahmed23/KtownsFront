<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;

class PartnerRequests extends AdminController {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $Q = \DB::table('partner_request');
        $this->data['recordsTotal'] = count($Q->get());

        return view('admin.partner-requests.index', $this->data);
    }

    public function partners_list() {
        $start = (isset($_POST["start"]) ? (int) $_POST["start"] : 0);
        $length = (isset($_POST["length"]) ? (int) $_POST["length"] : 25);

        $columns = array("", "PartnerRequestID", "FullName", "ContactNo", "NoOfRooms", "Location", "DateAdded");

        $query = \DB::table('partner_request')->select(['PartnerRequestID', 'FullName', 'ContactNo', 'NoOfRooms', 'Location',
            DB::raw("CONCAT('<small class=\"label bg-', IF(Status = 0, 'red', 'green'), '\" ><i class=\"fa ', IF(Status = 0, 'fa-times', 'fa-check'), '\"></i> ', IF(Status = 1, 'Active', 'Deactive'), '</small>') AS Status"),
            DB::raw("DATE_FORMAT(DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
            DB::raw("DATE_FORMAT(DateModified, \"%d-%b-%Y<br>%r\") as DateModified")]);

        $recordsTotal = count($query->get());

        if (!empty($_POST['search']["value"])) {
            $input = strtolower(trim($_POST['search']["value"]));
            $query->whereRaw("(FullName LIKE '%" . $input . "%')");
        }

        $query->orderBy($columns[(int) $_POST["order"][0]["column"]], strtoupper($_POST["order"][0]["dir"]));
        $query->orderBy("PartnerRequestID", "DESC");

        // limit acc to start and length
        $recordsFiltered = count($query->get());
        $result = $query->skip($start)->take($length)->get();
        // $maxRow = count($result);
        $data = [];
        foreach ($result as $Rs) {
            $data[] = array(
                "<input type=\"checkbox\" class=\"check\" name=\"ids[]\" value=\"" . $Rs->PartnerRequestID . "\" />",
                $Rs->PartnerRequestID,
                $Rs->FullName,
                $Rs->ContactNo,
                $Rs->NoOfRooms,
                $Rs->Location,
                $Rs->DateAdded,
                '<button type="button" class="btn btn-success btn-sm" onClick="location.href=\'partner-requests/' . $Rs->PartnerRequestID . '\'"><i class="fa fa-eye"></i> View</button>'
            );
        }

        echo json_encode(array("draw" => (int) $_POST["draw"], "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, "data" => $data));
        exit(0);
    }
    
    public function details($id) {
        $this->data['Details'] = DB::table('partner_request')->where('PartnerRequestID', $id)->first();
        if(!empty($this->data['Details'])) {
            return view('admin.partner-requests.view', $this->data);
        } else {
            return redirect('admin/partner-requests')->with('error', "Invalid ID");
        }
    }
    
    public function delete() {
        if (count(\Input::get('ids')) > 0) {
            DB::table('partner_request')
                    ->whereIn('PartnerRequestID', \Input::get('ids'))
                    ->delete();
        }
        return redirect('admin/partner-requests')->with('success', "Selected Requests Deleted Successfully");
    }

}
