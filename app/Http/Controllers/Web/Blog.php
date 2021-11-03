<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebController;
use DB;

class Blog extends WebController {

    function __construct() {
        parent::__construct();
    }

    public function index($slug) {
        $this->data['details'] = DB::table('blog')->where('Slug', $slug)->where('Status', 1)->first();
        if (!empty($this->data['details'])) {
            return view('blogpage', $this->data);
        } else {
            return redirect('/');
        }
    }

}
