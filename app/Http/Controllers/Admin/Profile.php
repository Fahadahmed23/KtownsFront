<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use Validator;
use Hash;
use DB;

class Profile extends AdminController {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $query = \DB::table('admin')
                ->where('AdminID', \Session::get('AdminID'));
        $this->data['admin'] = $query->first();
        if (empty($this->data['admin'])) {
            return redirect('admin/dashboard')->with('warning_msg', "No Admin Found");
        } else {
            return view('admin.profile', $this->data);
        }
    }

    public function update() {
        $v = Validator::make(Input::all(), [
                    'FirstName' => 'required|max:50',
                    'LastName' => 'required|max:50',
                    'Email' => 'required|email|max:50',
                    'Contact' => 'required|max:30',
                    'Username' => 'required|max:100',
                    'Password' => 'min:8|max:16',
        ]);
        $v->setAttributeNames([
            'FirstName' => 'First Name',
            'LastName' => 'Last Name',
            'Email' => 'Email Address',
            'Contact' => 'Contact',
            'Username' => 'Username',
            'Password' => 'Password',
        ]);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            $UserData["FirstName"] = Input::get('FirstName');
            $UserData["LastName"] = Input::get('LastName');
            $UserData["Email"] = Input::get('Email');
            $UserData["Contact"] = Input::get('Contact');
            $UserData["Username"] = Input::get('Username');
            $UserData["DateModified"] = new \DateTime;

            if (Input::get('Password') != "") {
                $UserData["Password"] = Hash::make(Input::get('Password'));
            }

            \DB::table('admin')->where('AdminID', \Session::get('AdminID'))->update($UserData);
            if (Input::hasFile('ProfilePicture')) {
                if (\File::exists(public_path('uploads/administrators') . '/' . Input::get('ImgName'))) {
                    \File::delete(public_path('uploads/administrators') . '/' . Input::get('ImgName'));
                }

                $image = Input::file('ProfilePicture');
                $filename = \Session::get('AdminID') . '_' . time() . '.' . $image->getClientOriginalExtension();
                $path = public_path('uploads/administrators') . '/' . $filename;

                \Image::make($image->getRealPath())->save($path);
                \DB::table('admin')
                        ->where('AdminID', \Session::get('AdminID'))
                        ->update(array('ProfilePicture' => $filename));
                \Session::set('AdminProfilePicture', $filename);
            }

            \Session::set('AdminFirstName', Input::get('FirstName'));
            \Session::set('AdminLastName', Input::get('FirstName'));
            \Session::set('AdminFullName', Input::get('FirstName') . ' ' . Input::get('FirstName'));
            \Session::set('AdminEmail', Input::get('FirstName'));
            \Session::set('AdminContact', Input::get('FirstName'));

            return redirect('admin/profile')->with('success', "Profile Updated Successfully");
        }
    }
}
