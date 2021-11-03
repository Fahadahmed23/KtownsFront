<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
use Hash;
use DB;

class Login extends Controller {

    function __construct() {
        if (\Session::has('SuperAdminLogin')) {
            \Redirect::to('admin/dashboard')->send();
            exit();
        }
    }

    public function index() {
        return view('admin.login');
    }

    public function validatelogin() {
        $v = Validator::make(Input::all(), [
			'Username' => 'required',
			'Password' => 'required'
        ]);
		
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            $user = DB::table('admin')
			->select("AdminID", "FirstName", "LastName", "Email", "ProfilePicture", "Contact", "Password")
			->where('Username', Input::get('Username'))
			->first();
            if ($user) {
                if (Hash::check(Input::get('Password'), $user->Password)) {
                    \Session::set('SuperAdminLogin', true);
                    \Session::set("AdminID", $user->AdminID);
                    \Session::set('AdminFirstName', $user->FirstName);
                    \Session::set('AdminLastName', $user->LastName);
                    \Session::set('AdminFullName', $user->FirstName.' '.$user->LastName);
                    \Session::set('AdminEmail', $user->Email);
                    \Session::set('AdminContact', $user->Contact);
                    \Session::set('AdminProfilePicture', $user->ProfilePicture);
                    if(\Session::get('AdminID') == 1){
                        return redirect('admin/dashboard');
                    } else if(\Session::get('AdminID') == 3 || \Session::get('AdminID') == 6 ) {
                        return redirect('admin/dha');
                    } else if(\Session::get('AdminID') == 4) {
                        return redirect('admin/millenium');
                    }
                } else {
                    return redirect()->back()->withErrors("Invalid Username OR Password");
                }
            } else {
                return redirect()->back()->withErrors("Invalid Username OR Password");
            }
        }
    }

}
