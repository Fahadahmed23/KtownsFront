<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebController;
use DB;

class Pages extends WebController {

    function __construct() {
        parent::__construct();
    }

    public function index($slug) {
        $this->data['details'] = DB::table('pages')->where('Slug', $slug)->where('Status', 1)->first();
        if (!empty($this->data['details'])) {
            return view('page', $this->data);
        } else {
            return redirect('/');
        }
    }

}
