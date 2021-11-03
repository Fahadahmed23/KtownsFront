<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;

class Configuration extends AdminController {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $query = DB::table('configuration');
        $this->data['Configuration'] = $query->first();
        return view('admin.configuration', $this->data);
    }

    public function update() {
        $v = Validator::make(Input::all(), [
                    'WebsiteTitle' => 'required|max:100',
                    'Contact1' => 'required|max:20',
                    'Contact2' => 'max:20',
                    'Address' => 'required',
                    'Copyright' => 'required',
                    'Facebook' => 'required|max:50',
                    'Twitter' => 'required|max:50',
                    'Google' => 'required|max:50',
                    'Instagram' => 'required|max:50',
                    'LinkedIn' => 'required|max:50',
                    'WhatsApp' => 'required|digits:11'
        ]);
        $v->setAttributeNames([
            'WebsiteTitle' => 'Website Title',
            'Contact1' => 'Contact 1',
            'Contact2' => 'Contact 2',
            'Address' => 'Address',
            'Copyright' => 'Copyright',
            'Facebook' => 'Facebook',
            'Twitter' => 'Twitter',
            'Google' => 'Google',
            'Instagram' => 'Instagram',
            'LinkedIn' => 'LinkedIn',
            'WhatsApp' => 'WhatsApp'
        ]);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            $UserData["WebsiteTitle"] = Input::get('WebsiteTitle');
            $UserData["Contact1"] = Input::get('Contact1');
            $UserData["Contact2"] = Input::get('Contact2');
            $UserData["Address"] = Input::get('Address');
            $UserData["Copyright"] = Input::get('Copyright');
            $UserData["Facebook"] = Input::get('Facebook');
            $UserData["Twitter"] = Input::get('Twitter');
            $UserData["Google"] = Input::get('Google');
            $UserData["Instagram"] = Input::get('Instagram');
            $UserData["LinkedIn"] = Input::get('LinkedIn');
            $UserData["WhatsApp"] = Input::get('WhatsApp');
            $UserData["DateModified"] = new \DateTime;

            \DB::table('configuration')->update($UserData);
//            if (Input::hasFile('Logo')) {
//                if (\File::exists(public_path('uploads/website') . '/' . Input::get('HiddenLogo'))) {
//                    \File::delete(public_path('uploads/website') . '/' . Input::get('HiddenLogo'));
//                }
//
//                $logoimage = Input::file('Logo');
//                $MainLogo = 'Logo_' . time() . '.' . $logoimage->getClientOriginalExtension();
//                $path = public_path('uploads/website') . '/' . $MainLogo;
//
//                \Image::make($logoimage->getRealPath())->save($path);
//                DB::table('configuration')->update(['Logo' => $MainLogo]);
//            }
            return redirect('admin/configuration')->with('success', "Configuration Updated Successfully");
        }
    }
}
