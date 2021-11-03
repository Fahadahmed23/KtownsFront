<?php

namespace App\Http\Controllers;

class UserController extends WebController {

    function __construct() {
        parent::__construct();
        if (!\Session::has('CustomerLogin')) {
            \Redirect::to('/login')->send();
            exit();
        }
    }

}
