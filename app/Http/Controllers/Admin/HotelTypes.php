<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;
date_default_timezone_set('asia/karachi');

class HotelTypes extends AdminController {

    function __construct() {
        parent::__construct();
        
        $this->data['services'] = DB::table('services')->where('Status', 1)->get();
    }

    public function index() {
        $Q = \DB::table('hotel_types');
        $this->data['recordsTotal'] = count($Q->get());
        return view('admin.hotel-types.index', $this->data);
    }

    public function hotel_types_list() {

        $start = (isset($_POST["start"]) ? (int) $_POST["start"] : 0);
        $length = (isset($_POST["length"]) ? (int) $_POST["length"] : 25);

        $columns = array("", "HotelTypeID", "HotelTypeName", "Status", "DateAdded", "DateModified");

        $query = \DB::table('hotel_types')->select(['HotelTypeID', 'HotelTypeName', 'Color', 'Border',
            DB::raw("CONCAT('<small class=\"label bg-', IF(Status = 0, 'red', 'green'), '\" ><i class=\"fa ', IF(Status = 0, 'fa-times', 'fa-check'), '\"></i> ', IF(Status = 1, 'Active', 'Deactive'), '</small>') AS Status"),
            DB::raw("DATE_FORMAT(DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
            DB::raw("DATE_FORMAT(DateModified, \"%d-%b-%Y<br>%r\") as DateModified")]);

        $recordsTotal = count($query->get());

        if (!empty($_POST['search']["value"])) {
            $input = strtolower(trim($_POST['search']["value"]));
            $query->whereRaw("(HotelTypeName LIKE '%" . $input . "%')");
        }

        $query->orderBy($columns[(int) $_POST["order"][0]["column"]], strtoupper($_POST["order"][0]["dir"]));
        $query->orderBy("HotelTypeID", "DESC");

        // limit acc to start and length
        $recordsFiltered = count($query->get());
        $result = $query->skip($start)->take($length)->get();
        // $maxRow = count($result);
        $data = [];
        foreach ($result as $Rs) {
            $data[] = array(
                "<input type=\"checkbox\" class=\"check\" name=\"ids[]\" value=\"" . $Rs->HotelTypeID . "\" />",
                $Rs->HotelTypeID,
                '<span style="border: 3px solid '.$Rs->Border.'; background:'.$Rs->Color.'; color:#fff; padding:4px 10px;">'.$Rs->HotelTypeName.'</span>',
                $Rs->Status,
                $Rs->DateAdded,
                $Rs->DateModified,
                '<button type="button" class="btn btn-success btn-sm" onClick="location.href=\'hotel-types/' . $Rs->HotelTypeID . '\'"><i class="fa fa-edit"></i> Edit</button>'
            );
        }

        echo json_encode(array("draw" => (int) $_POST["draw"], "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, "data" => $data));
        exit(0);
    }

    public function add() {
        return view('admin.hotel-types.add', $this->data);
    }

    public function save() {

        $messages['required'] = 'Please enter :attribute.';
        $messages['ServiceIDs.required'] = 'Please select :attribute.';

        $valid["HotelTypeName"] = 'required|max:255';
        $valid["Color"] = 'required|max:100';
        $valid["Border"] = 'required|max:100';
        $valid['ServiceIDs'] = 'required';
        $valid["Status"] = 'required|integer|min:0|max:1';

        $valid_name["HotelTypeName"] = 'Hotel Type';
        $valid_name["Color"] = 'Color';
        $valid_name["Border"] = 'Border Color';
        $valid_name["ServiceIDs"] = "Services";
        $valid_name["Status"] = 'Status';

        $v = Validator::make(\Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            $hotel_type_data = [
                'HotelTypeName' => Input::get('HotelTypeName'),
                'Description' => Input::get('Description'),
                'Color' => Input::get('Color'),
                'Border' => Input::get('Border'),
                'Status' => Input::get('Status'),
                'DateAdded' => new \DateTime
            ];
            \DB::table('hotel_types')->insert($hotel_type_data);
            $TypeID = \DB::getPdo()->lastInsertId();
            
            if(Input::has('ServiceIDs') && is_array(Input::get('ServiceIDs')) && count(Input::get('ServiceIDs')) > 0) {
                foreach(Input::get('ServiceIDs') as $s_id) {
                    DB::table('hotel_type_services')->insert(['HotelTypeID' => $TypeID, 'ServiceID' => $s_id]);
                }
            }

            DB::table('hotel_types')->insert($hotel_type_data);
            return redirect('admin/hotel-types')->with('success', "Hotel Type Added Successfully");
        }
    }

    public function edit($id) {
        $query = \DB::table('hotel_types');
        $query->where('HotelTypeID', $id);

        $this->data['type'] = $query->first();

        if (empty($this->data['type'])) {
            return redirect('admin/hotel-types')->with('warning_msg', "Invalid Hotel Type");
        } else {
            $this->data['hotel_type_services'] = [];
            $serviceids = DB::table('hotel_type_services')->where('HotelTypeID', $id)->get();
            if(count($serviceids) > 0) {
                foreach($serviceids as $s) {
                    array_push($this->data['hotel_type_services'], $s->ServiceID);
                }
            }
            return view('admin.hotel-types.edit', $this->data);
        }
    }

    public function update($type_id) {
        $messages['required'] = 'Please enter :attribute.';
        $messages['ServiceIDs.required'] = 'Please select :attribute.';

        $valid["HotelTypeName"] = 'required|max:255';
        $valid["Color"] = 'required|max:100';
        $valid["Border"] = 'required|max:100';
        $valid['ServiceIDs'] = 'required';
        $valid["Status"] = 'required|integer|min:0|max:1';

        $valid_name["HotelTypeName"] = 'Hotel Type';
        $valid_name["Color"] = 'Color';
        $valid_name["Border"] = 'Border Color';
        $valid_name["ServiceIDs"] = "Services";
        $valid_name["Status"] = 'Status';

        $v = Validator::make(\Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            $type_data = [
                'HotelTypeName' => Input::get('HotelTypeName'),
                'Description' => Input::get('Description'),
                'Color' => Input::get('Color'),
                'Border' => Input::get('Border'),
                'Status' => Input::get('Status'),
                'DateModified' => new \DateTime
            ];
            
            if(Input::has('ServiceIDs') && is_array(Input::get('ServiceIDs')) && count(Input::get('ServiceIDs')) > 0) {
                DB::table('hotel_type_services')->where('HotelTypeID', $type_id)->delete();
                foreach(Input::get('ServiceIDs') as $s_id) {
                    DB::table('hotel_type_services')->insert(['HotelTypeID' => $type_id, 'ServiceID' => $s_id]);
                }
            }

            DB::table('hotel_types')->where('HotelTypeID', $type_id)->update($type_data);

            return redirect('admin/hotel-types/' . $type_id)->with('success', "Hotel Type Updated Successfully");
        }
    }

    public function delete() {
        if (count(\Input::get('ids')) > 0) {
            DB::table('hotel_types')
                    ->whereIn('HotelTypeID', \Input::get('ids'))
                    ->delete();
        }
        return redirect('admin/hotel-types')->with('success', "Selected Hotel Types Deleted Successfully");
    }

}
