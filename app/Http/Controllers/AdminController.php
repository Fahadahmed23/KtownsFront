<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class AdminController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public $data = [];

    function __construct() {
        if (!\Session::has('SuperAdminLogin')) {
            \Redirect::to('admin/login')->send();
            exit();
        }

        $this->data['upload_url'] = url('public/uploads/website') . "/";
        $this->data['upload_url_controller'] = public_path('uploads/website') . "/";

        $this->data['configuration'] = \DB::table('configuration')->first();

        $this->data['emails'] = \DB::table('emails')->first();

        // sms integration
        $this->data['smsUsername'] = "ktownsmsaccount";
        $this->data['smsPassword'] = "ktownsmsaccount";
        $this->data['smsFrom'] = "8584";
        $this->data['smsAdminTo'] = "8584";
        // sms integration end
    }

}
