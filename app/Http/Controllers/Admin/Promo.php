<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;
date_default_timezone_set('asia/karachi');

class Promo extends AdminController {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $Q = \DB::table('promo_codes');
        $this->data['recordsTotal'] = count($Q->get());
        return view('admin.promo.index', $this->data);
    }

    public function promo_list() {

        $start = (isset($_POST["start"]) ? (int) $_POST["start"] : 0);
        $length = (isset($_POST["length"]) ? (int) $_POST["length"] : 25);

        $columns = array("", "PromoCodeID", "PromoCode", "StartDate", "EndDate", "Discount", "Status", "DateAdded", "DateModified");

        $query = \DB::table('promo_codes')->select(['PromoCodeID', 'PromoCode', 'Discount',
            DB::raw("CONCAT('<small class=\"label bg-', IF(Status = 0, 'red', 'green'), '\" ><i class=\"fa ', IF(Status = 0, 'fa-times', 'fa-check'), '\"></i> ', IF(Status = 1, 'Active', 'Deactive'), '</small>') AS Status"),
            DB::raw("DATE_FORMAT(StartDate, \"%d-%b-%Y\") as StartDate"),
            DB::raw("DATE_FORMAT(EndDate, \"%d-%b-%Y\") as EndDate"),
            DB::raw("DATE_FORMAT(DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
            DB::raw("DATE_FORMAT(DateModified, \"%d-%b-%Y<br>%r\") as DateModified")]);

        $recordsTotal = count($query->get());

        if (!empty($_POST['search']["value"])) {
            $input = strtolower(trim($_POST['search']["value"]));
            $query->whereRaw("(PromoCode LIKE '%" . $input . "%')");
        }

        $query->orderBy($columns[(int) $_POST["order"][0]["column"]], strtoupper($_POST["order"][0]["dir"]));
        $query->orderBy("PromoCodeID", "DESC");

        // limit acc to start and length
        $recordsFiltered = count($query->get());
        $result = $query->skip($start)->take($length)->get();
        // $maxRow = count($result);
        $data = [];
        foreach ($result as $Rs) {
            $data[] = array(
                "<input type=\"checkbox\" class=\"check\" name=\"ids[]\" value=\"" . $Rs->PromoCodeID . "\" />",
                $Rs->PromoCodeID,
                $Rs->PromoCode,
                $Rs->StartDate,
                $Rs->EndDate,
                $Rs->Discount,
                $Rs->Status,
                $Rs->DateAdded,
                $Rs->DateModified,
                '<button type="button" class="btn btn-success btn-sm" onClick="location.href=\'promo/' . $Rs->PromoCodeID . '\'"><i class="fa fa-edit"></i> Edit</button>'
            );
        }

        echo json_encode(array("draw" => (int) $_POST["draw"], "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, "data" => $data));
        exit(0);
    }

    public function add() {
        return view('admin.promo.add', $this->data);
    }

    public function save() {

        $messages['required'] = 'Please enter :attribute.';
        $messages['min'] = 'Please select :attribute.';

        $valid["PromoCode"] = 'required|max:20';
        $valid["StartDate"] = 'required|date|date_format:Y-m-d';
        $valid["EndDate"] = 'required|date|date_format:Y-m-d';
        $valid["Discount"] = 'required|numeric|min:0';
        $valid["Status"] = 'required|integer|min:0|max:1';

        $valid_name["PromoCode"] = 'Promo Code';
        $valid_name["StartDate"] = 'Start Date';
        $valid_name["EndDate"] = 'End Date';
        $valid_name["Discount"] = 'Discount';
        $valid_name["Status"] = 'Status';

        $v = Validator::make(\Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {

            $promo_data = [
                'PromoCode' => Input::get('PromoCode'),
                'StartDate' => Input::get('StartDate'),
                'EndDate' => Input::get('EndDate'),
                'Discount' => Input::get('Discount'),
                'Status' => Input::get('Status'),
                'DateAdded' => new \DateTime
            ];

            DB::table('promo_codes')->insert($promo_data);
            return redirect('admin/promo')->with('success', "Promo Code Added Successfully");
        }
    }

    public function edit($id) {
        $query = \DB::table('promo_codes');
        $query->where('PromoCodeID', $id);

        $this->data['promo'] = $query->first();

        if (empty($this->data['promo'])) {
            return redirect('admin/promo')->with('warning_msg', "Invalid Promo Code ID");
        } else {
            return view('admin.promo.edit', $this->data);
        }
    }

    public function update($promo_id) {
        $messages['required'] = 'Please enter :attribute.';
        $messages['min'] = 'Please select :attribute.';

        $valid["PromoCode"] = 'required|max:20';
        $valid["StartDate"] = 'required|date|date_format:Y-m-d';
        $valid["EndDate"] = 'required|date|date_format:Y-m-d';
        $valid["Discount"] = 'required|numeric|min:0';
        $valid["Status"] = 'required|integer|min:0|max:1';

        $valid_name["PromoCode"] = 'Promo Code';
        $valid_name["StartDate"] = 'Start Date';
        $valid_name["EndDate"] = 'End Date';
        $valid_name["Discount"] = 'Discount';
        $valid_name["Status"] = 'Status';

        $v = Validator::make(\Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            $promo_data = [
                'PromoCode' => Input::get('PromoCode'),
                'StartDate' => Input::get('StartDate'),
                'EndDate' => Input::get('EndDate'),
                'Discount' => Input::get('Discount'),
                'Status' => Input::get('Status'),
                'DateModified' => new \DateTime
            ];

            DB::table('promo_codes')->where('PromoCodeID', $promo_id)->update($promo_data);

            return redirect('admin/promo/' . $promo_id)->with('success', "Promo Code Updated Successfully");
        }
    }

    public function delete() {
        if (count(\Input::get('ids')) > 0) {
            DB::table('promo_codes')
                    ->whereIn('PromoCodeID', \Input::get('ids'))
                    ->delete();
        }
        return redirect('admin/promo')->with('success', "Selected Promo Codes Deleted Successfully");
    }

}
