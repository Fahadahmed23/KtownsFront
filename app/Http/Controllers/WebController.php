<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use DB;

class WebController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public $data = [];

    function __construct() {
        $this->data['configuration'] = \DB::table('configuration')->first();
        $this->data['emails'] = \DB::table('emails')->first();
        $this->data['main_menu'] = \DB::table('pages')->where('Status', 1)->where('MainMenu', 1)->get();
        $this->data['pages'] = \DB::table('pages')->where('Status', 1)->get();
        $this->data['AdminEmail'] = $this->data['emails']->AdminEmail;
        $this->data['BookingEmail'] = $this->data['emails']->BookingEmail;
        
        // sms integration
        $this->data['smsUsername'] = "ktownsmsaccount";
        $this->data['smsPassword'] = "ktownsmsaccount";
        $this->data['smsFrom'] = "8584";
        $this->data['smsAdminTo'] = $this->data['emails']->AdminPhone;
        // sms integration end
    }

}
