<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;
date_default_timezone_set('asia/karachi');

class Testimonials extends AdminController {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $Q = \DB::table('testimonials');
        $this->data['recordsTotal'] = count($Q->get());

        return view('admin.testimonials.index', $this->data);
    }

    public function testimonials_list() {
        $start = (isset($_POST["start"]) ? (int) $_POST["start"] : 0);
        $length = (isset($_POST["length"]) ? (int) $_POST["length"] : 25);

        $columns = array("", "TestimonialID", "Name", "Status", "DateAdded", "DateModified");

        $query = \DB::table('testimonials')->select(['TestimonialID', 'Name',
            DB::raw("CONCAT('<small class=\"label bg-', IF(Status = 0, 'red', 'green'), '\" ><i class=\"fa ', IF(Status = 0, 'fa-times', 'fa-check'), '\"></i> ', IF(Status = 1, 'Active', 'Deactive'), '</small>') AS Status"),
            DB::raw("DATE_FORMAT(DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
            DB::raw("DATE_FORMAT(DateModified, \"%d-%b-%Y<br>%r\") as DateModified")]);

        $recordsTotal = count($query->get());

        if (!empty($_POST['search']["value"])) {
            $input = strtolower(trim($_POST['search']["value"]));
            $query->whereRaw("(Name LIKE '%" . $input . "%')");
        }

        $query->orderBy($columns[(int) $_POST["order"][0]["column"]], strtoupper($_POST["order"][0]["dir"]));
        $query->orderBy("TestimonialID", "DESC");

        // limit acc to start and length
        $recordsFiltered = count($query->get());
        $result = $query->skip($start)->take($length)->get();
        // $maxRow = count($result);
        $data = [];
        foreach ($result as $Rs) {
            $data[] = array(
                "<input type=\"checkbox\" class=\"check\" name=\"ids[]\" value=\"" . $Rs->TestimonialID . "\" />",
                $Rs->TestimonialID,
                $Rs->Name,
                $Rs->Status,
                $Rs->DateAdded,
                $Rs->DateModified,
                '<button type="button" class="btn btn-success btn-sm" onClick="location.href=\'testimonials/' . $Rs->TestimonialID . '\'"><i class="fa fa-edit"></i> Edit</button>'
            );
        }

        echo json_encode(array("draw" => (int) $_POST["draw"], "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, "data" => $data));
        exit(0);
    }

    public function add() {
        return view('admin.testimonials.add', $this->data);
    }

    public function save() {
        $valid["Status"] = 'required|integer|min:0|max:1';
        $valid["Name"] = 'required|max:100';
        $valid["Testimonial"] = 'required|max:600';

        $valid_name["Name"] = "Name";
        $valid_name["Testimonial"] = "Testimonial";

        $v = Validator::make(\Input::all(), $valid);
        $v->setAttributeNames($valid_name);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            $TestimonialData = array(
                'Testimonial' => \Input::get('Testimonial'),
                'Name' => \Input::get('Name'),
                'Status' => \Input::get('Status'),
                "DateAdded" => new \DateTime
            );
            \DB::table('testimonials')->insert($TestimonialData);
            return redirect('admin/testimonials')->with(['success' => "Testimonial Added Successfully"]);
        }
    }

    public function edit($id) {
        $query = \DB::table('testimonials');
        $query->where('TestimonialID', $id);

        $this->data['testimonials'] = $query->first();

        if (empty($this->data['testimonials'])) {
            return redirect('admin/testimonials')->with('warning_msg', "Invalid Testimonial ID");
        } else {
            return view('admin.testimonials.edit', $this->data);
        }
    }

    public function update() {
        $valid["Status"] = 'required|integer|min:0|max:1';
        $valid["Name"] = 'required|max:100';
        $valid["Testimonial"] = 'required|max:600';

        $valid_name["Name"] = "Name";
        $valid_name["Testimonial"] = "Testimonial";

        $v = Validator::make(\Input::all(), $valid);
        $v->setAttributeNames($valid_name);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            DB::table('testimonials')
                    ->where('TestimonialID', \Input::get('ItemID'))
                    ->update([
                        'Testimonial' => \Input::get('Testimonial'),
                        'Name' => \Input::get('Name'),
                        'Status' => \Input::get('Status'),
                        'DateModified' => new \DateTime
            ]);
            return redirect('admin/testimonials')->with(['success' => "Testimonial Updated Successfully"]);
        }
    }

    public function delete() {
        if (count(\Input::get('ids')) > 0) {
            DB::table('testimonials')
                    ->whereIn('TestimonialID', \Input::get('ids'))
                    ->delete();
        }
        return redirect('admin/testimonials')->with('success', "Selected Testimonials Deleted Successfully");
    }

}
