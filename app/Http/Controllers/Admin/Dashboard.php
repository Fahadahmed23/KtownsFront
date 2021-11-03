<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use DB;

class Dashboard extends AdminController {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['users'] = DB::table('users')->where('Status', 1)->count();
        $this->data['hotels'] = DB::table('hotels')->count();
        $this->data['corporate_clients'] = DB::table('corporate_clients')->count();
        $this->data['travel_agents'] = DB::table('agent_requests')->count();
        $this->data['bookings'] = DB::table('bookings')->count();
        $this->data['approved_bookings'] = DB::table('bookings')->where('Status', 1)->count();
        $this->data['pending_bookings'] = DB::table('bookings')->where('Status', 0)->count();
        $this->data['canceled_bookings'] = DB::table('bookings')->where('Status', 3)->count();
        return view('admin.dashboard', $this->data);
    }

    public function logout() {
        \Session::forget("SuperAdminLogin");
        \Session::forget('AdminID');
        \Session::forget('AdminFirstName');
        \Session::forget('AdminLastName');
        \Session::forget('AdminEmail');
        \Session::forget('AdminContact');
        \Session::forget('AdminProfilePicture');
        \Session::forget('AdminFullName');
        return view('admin.login');
    }

}
