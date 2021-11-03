<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;

class Emails extends AdminController {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $query = DB::table('emails');
        $this->data['emails'] = $query->first();
        return view('admin.emails', $this->data);
    }

    public function update() {
        $v = Validator::make(Input::all(), [
                    'SignupEmail' => 'required|max:255',
                    'BookingEmail' => 'required|max:255',
                    'AdminEmail' => 'required|max:255',
                    'AdminPhone'=>'required|digits:11'
        ]);
        $v->setAttributeNames([
            'SignupEmail' => 'Signup Email',
            'BookingEmail' => 'Booking Email',
            'AdminEmail' => 'Booking Email',
            'AdminPhone' => 'Admin Phone No.'
        ]);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            $UserData["SignupEmail"] = Input::get('SignupEmail');
            $UserData["BookingEmail"] = Input::get('BookingEmail');
            $UserData["AdminEmail"] = Input::get('AdminEmail');
            $UserData["AdminPhone"] = Input::get('AdminPhone');
            $UserData["DateModified"] = new \DateTime;

            \DB::table('emails')->update($UserData);
            return redirect('admin/emails')->with('success', "Emails Updated Successfully");
        }
    }
}
