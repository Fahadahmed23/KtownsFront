<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;
date_default_timezone_set('asia/karachi');
class Pages extends AdminController {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $Q = \DB::table('pages');
        $this->data['recordsTotal'] = count($Q->get());

        return view('admin.pages.index', $this->data);
    }

    public function pages_list() {
        $start = (isset($_POST["start"]) ? (int) $_POST["start"] : 0);
        $length = (isset($_POST["length"]) ? (int) $_POST["length"] : 25);

        $columns = array("", "PageID", "Title", "Status", "DateAdded", "DateModified");

        $query = \DB::table('pages')->select(['PageID', 'Title',
            DB::raw("CONCAT('<small class=\"label bg-', IF(Status = 0, 'red', 'green'), '\" ><i class=\"fa ', IF(Status = 0, 'fa-times', 'fa-check'), '\"></i> ', IF(Status = 1, 'Active', 'Deactive'), '</small>') AS Status"),
            DB::raw("DATE_FORMAT(DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
            DB::raw("DATE_FORMAT(DateModified, \"%d-%b-%Y<br>%r\") as DateModified")]);

        $recordsTotal = count($query->get());

        if (!empty($_POST['search']["value"])) {
            $input = strtolower(trim($_POST['search']["value"]));
            $query->whereRaw("(Title LIKE '%" . $input . "%')");
        }

        $query->orderBy($columns[(int) $_POST["order"][0]["column"]], strtoupper($_POST["order"][0]["dir"]));
        $query->orderBy("PageID", "DESC");

        // limit acc to start and length
        $recordsFiltered = count($query->get());
        $result = $query->skip($start)->take($length)->get();
        // $maxRow = count($result);
        $data = [];
        foreach ($result as $Rs) {
            $data[] = array(
                "<input type=\"checkbox\" class=\"check\" name=\"ids[]\" value=\"" . $Rs->PageID . "\" />",
                $Rs->PageID,
                $Rs->Title,
                $Rs->Status,
                $Rs->DateAdded,
                $Rs->DateModified,
                '<button type="button" class="btn btn-success btn-sm" onClick="location.href=\'pages/' . $Rs->PageID . '\'"><i class="fa fa-edit"></i> Edit</button>'
            );
        }

        echo json_encode(array("draw" => (int) $_POST["draw"], "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, "data" => $data));
        exit(0);
    }

    public function add() {
        return view('admin.pages.add', $this->data);
    }

    public function save() {
        $valid["Status"] = 'required|integer|min:0|max:1';
        $valid["Title"] = 'required|max:255';

        $valid_name["Title"] = "Title";
        $valid_name["Status"] = "Status";

        $v = Validator::make(\Input::all(), $valid);
        $v->setAttributeNames($valid_name);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            $slug = $this->check_slug(str_slug(Input::get('Title'), '-'), 0);
            $PageData = array(
                'Title' => \Input::get('Title'),
                'Slug' => $slug,
                'Content' => \Input::get('Content'),
                'MetaTitle' => \Input::get('MetaTitle'),
                'MetaKeywords' => \Input::get('MetaKeywords'),
                'MetaDescription' => \Input::get('MetaDescription'),
                'Status' => \Input::get('Status'),
                "DateAdded" => new \DateTime
            );
            \DB::table('pages')->insert($PageData);
            return redirect('admin/pages')->with(['success' => "Page Added Successfully"]);
        }
    }

    public function edit($id) {
        $query = \DB::table('pages');
        $query->where('PageID', $id);

        $this->data['pages'] = $query->first();

        if (empty($this->data['pages'])) {
            return redirect('admin/pages')->with('warning_msg', "Invalid Page ID");
        } else {
            return view('admin.pages.edit', $this->data);
        }
    }

    public function check_slug($slug, $page_id = 0) {
        $hotel = DB::table('pages')->where('Slug', $slug)->where('PageID', '<>', $page_id)->first();
        if (!empty($hotel)) {
            $s = $slug . '-1';
            $slug = $this->check_slug($s, $page_id);
        }
        return $slug;
    }

    public function update() {
        $valid["Status"] = 'required|integer|min:0|max:1';
        $valid["Title"] = 'required|max:255';

        $valid_name["Title"] = "Title";
        $valid_name["Status"] = "Status";

        $v = Validator::make(\Input::all(), $valid);
        $v->setAttributeNames($valid_name);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            $slug = $this->check_slug(str_slug(Input::get('Title'), '-'), \Input::get('ItemID'));
            DB::table('pages')
                    ->where('PageID', \Input::get('ItemID'))
                    ->update([
                        'Title' => \Input::get('Title'),
                        'Slug' => $slug,
                        'Content' => \Input::get('Content'),
                        'MetaTitle' => \Input::get('MetaTitle'),
                        'MetaKeywords' => \Input::get('MetaKeywords'),
                        'MetaDescription' => \Input::get('MetaDescription'),
                        'Status' => \Input::get('Status'),
                        'DateModified' => new \DateTime
            ]);
            return redirect('admin/pages')->with(['success' => "Page Updated Successfully"]);
        }
    }

    public function delete() {
        if (count(\Input::get('ids')) > 0) {
            DB::table('pages')
                    ->whereIn('PageID', \Input::get('ids'))
                    ->delete();
        }
        return redirect('admin/pages')->with('success', "Selected Pages Deleted Successfully");
    }

}
