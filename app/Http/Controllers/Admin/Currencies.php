<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;

class Currencies extends AdminController {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        // getting total number of records
        $Q = \DB::table('currencies');
        $this->data['recordsTotal'] = count($Q->get());

        return view('admin.currencies.index', $this->data);
    }

    public function currencies_list() {
        $start = (isset($_POST["start"]) ? (int) $_POST["start"] : 0);
        $length = (isset($_POST["length"]) ? (int) $_POST["length"] : 25);

        $columns = array("CurrencyID", "CurrencyName", "IsDefault", "Status", "DateAdded", "DateModified");

        $query = \DB::table('currencies')->select(['CurrencyID', 'CurrencyName', 'ExchangeRate',
            DB::raw("IF(IsDefault = 0, '', '<small class=\"label bg-green\"><i class=\"fa fa-check\"></i></small>') AS IsDefault"),
            DB::raw("CONCAT('<small class=\"label bg-', IF(Status = 0, 'red', 'green'), '\" ><i class=\"fa ', IF(Status = 0, 'fa-times', 'fa-check'), '\"></i> ', IF(Status = 1, 'Active', 'Deactive'), '</small>') AS Status"),
            DB::raw("DATE_FORMAT(DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
            DB::raw("DATE_FORMAT(DateModified, \"%d-%b-%Y<br>%r\") as DateModified")]);

        $recordsTotal = count($query->get());

        if (isset($_POST['search']["value"])) {
            $input = strtolower(trim($_POST['search']["value"]));
            $query->whereRaw("CurrencyName LIKE '%" . $input . "%'");
        }

        $query->orderBy($columns[(int) $_POST["order"][0]["column"]], strtoupper($_POST["order"][0]["dir"]));
        $query->orderBy("CurrencyID", "DESC");

        // limit acc to start and length
        $recordsFiltered = count($query->get());
        $result = $query->skip($start)->take($length)->get();
//        $maxRow = count($result);
        $data = [];
        foreach ($result as $Rs) {
            $data[] = array(
                "<input type=\"checkbox\" class=\"check\" name=\"ids[]\" value=\"" . $Rs->CurrencyID . "\" />",
                '<a item_id="' . $Rs->CurrencyID . '" module="Currencies" class="btnEditStyle btnEdit">' . $Rs->CurrencyName . ' <i class="fa"></i></a>',
                $Rs->IsDefault,
                $Rs->Status,
                $Rs->DateAdded,
                $Rs->DateModified,
                '<div class="btn-group"><button type="button" item_id="' . $Rs->CurrencyID . '" module="Currencies" class="btn btn-success btn-sm btnEdit"><i class="fa fa-edit"></i> Edit</button></div>'
            );
        }

        echo json_encode(array("draw" => (int) $_POST["draw"], "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, "data" => $data));
        exit(0);
    }

    public function save() {
        $messages = [
            'required' => 'Please enter :attribute.'
        ];
        $IsDefault = 0;
        if (\Input::get('IsDefault')) {
            $IsDefault = 1;
        }

        $valid["CurrencyName"] = 'required|max:100';
        $valid["CurrencyCode"] = 'required|max:3';
        $valid["CurrencySymbol"] = 'required|max:20';
        $valid["Status"] = 'required|integer|min:0|max:1';

        $valid_name["CurrencyName"] = 'Currency Name';
        $valid_name["CurrencyCode"] = 'Currency Code';
        $valid_name["CurrencySymbol"] = 'Currency Symbol';
        $valid_name["Status"] = 'Status';

        if (\Input::get('ItemID') != "") {
            // ----------------- update -------------------------

            $v = Validator::make(\Input::all(), $valid, $messages);
            $v->setAttributeNames($valid_name);
            if ($v->fails()) {
                return redirect()->back()->withErrors($v->errors())->withInput();
            } else {
                if ($IsDefault == 1) {
                    \DB::table('currencies')->update(array('IsDefault' => 0));
                }

                $CurrencyData = array(
                    'CurrencyName' => \Input::get('CurrencyName'),
                    'CurrencyCode' => \Input::get('CurrencyCode'),
                    'CurrencySymbol' => \Input::get('CurrencySymbol'),
                    'Status' => \Input::get('Status'),
                    'IsDefault' => $IsDefault,
                    "DateModified" => new \DateTime
                );

                $update_currency = \DB::table('currencies')
                        ->where('CurrencyID', \Input::get('ItemID'))
                        ->update($CurrencyData);
                return redirect('admin/currencies')->with(['success' => "Currency Updated Successfully"]);
            }
        } else {
            // ----------------- save -------------------------

            $v = Validator::make(\Input::all(), $valid, $messages);
            $v->setAttributeNames($valid_name);
            if ($v->fails()) {
                return redirect()->back()->withErrors($v->errors())->withInput();
            } else {
                if ($IsDefault == 1) {
                    \DB::table('currencies')->update(array('IsDefault' => 0));
                }
                $CurrencyData = array(
                    'CurrencyName' => \Input::get('CurrencyName'),
                    'CurrencyCode' => \Input::get('CurrencyCode'),
                    'CurrencySymbol' => \Input::get('CurrencySymbol'),
                    'Status' => \Input::get('Status'),
                    'IsDefault' => $IsDefault,
                    "DateAdded" => new \DateTime
                );
                \DB::table('currencies')->insert($CurrencyData);
                return redirect('admin/currencies')->with(['success' => "Currency Added Successfully"]);
            }
        }
    }

    public function edit() {
        $query = \DB::table('currencies')
                ->where('CurrencyID', \Input::get('id'));
        $currencies = $query->first();
        return json_encode(array('permission' => true, 'currencies' => $currencies));
    }

    public function delete() {
        if (\Input::get('delete_single_record')) {
            $Q = DB::table('currencies')
                    ->where('CurrencyID', \Input::get('delete_single_record'))
                    ->delete();
            return redirect('admin/currencies')->with('success', "Currency Deleted Successfully");
        } else {
            $Q = DB::table('currencies')
                    ->whereIn('CurrencyID', \Input::get('ids'));
            $Q->delete();
            return redirect('admin/currencies')->with('success', "Selected Currencies Deleted Successfully");
        }
    }

}
