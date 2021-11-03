<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;

class AgentRequests extends AdminController {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $Q = \DB::table('agent_requests');
        $this->data['recordsTotal'] = count($Q->get());

        return view('admin.agent-requests.index', $this->data);
    }

    public function agents_list() {
        $start = (isset($_POST["start"]) ? (int) $_POST["start"] : 0);
        $length = (isset($_POST["length"]) ? (int) $_POST["length"] : 25);

        $columns = array("", "AgentRequestID", "FullName", "Cell", "Email", "City", "DateAdded");

        $query = \DB::table('agent_requests')->select(['AgentRequestID', 'FullName', 'Cell', 'Email', 'City',
            DB::raw("CONCAT('<small class=\"label bg-', IF(Status = 0, 'red', 'green'), '\" ><i class=\"fa ', IF(Status = 0, 'fa-times', 'fa-check'), '\"></i> ', IF(Status = 1, 'Active', 'Deactive'), '</small>') AS Status"),
            DB::raw("DATE_FORMAT(DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
            DB::raw("DATE_FORMAT(DateModified, \"%d-%b-%Y<br>%r\") as DateModified")]);

        $recordsTotal = count($query->get());

        if (!empty($_POST['search']["value"])) {
            $input = strtolower(trim($_POST['search']["value"]));
            $query->whereRaw("(FullName LIKE '%" . $input . "%')");
        }

        $query->orderBy($columns[(int) $_POST["order"][0]["column"]], strtoupper($_POST["order"][0]["dir"]));
        $query->orderBy("AgentRequestID", "DESC");

        // limit acc to start and length
        $recordsFiltered = count($query->get());
        $result = $query->skip($start)->take($length)->get();
        // $maxRow = count($result);
        $data = [];
        foreach ($result as $Rs) {
            $data[] = array(
                "<input type=\"checkbox\" class=\"check\" name=\"ids[]\" value=\"" . $Rs->AgentRequestID . "\" />",
                $Rs->AgentRequestID,
                $Rs->FullName,
                $Rs->Cell,
                $Rs->Email,
                $Rs->City,
                $Rs->DateAdded,
                '<button type="button" class="btn btn-success btn-sm" onClick="location.href=\'agent-requests/' . $Rs->AgentRequestID . '\'"><i class="fa fa-eye"></i> View</button>'
            );
        }

        echo json_encode(array("draw" => (int) $_POST["draw"], "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, "data" => $data));
        exit(0);
    }
    
    public function details($id) {
        $this->data['Details'] = DB::table('agent_requests')->where('AgentRequestID', $id)->first();
        if(!empty($this->data['Details'])) {
            return view('admin.agent-requests.view', $this->data);
        } else {
            return redirect('admin/agent-requests')->with('error', "Invalid ID");
        }
    }
    
    public function delete() {
        if (count(\Input::get('ids')) > 0) {
            DB::table('agent_requests')
                    ->whereIn('AgentRequestID', \Input::get('ids'))
                    ->delete();
        }
        return redirect('admin/agent-requests')->with('success', "Selected Requests Deleted Successfully");
    }

}
