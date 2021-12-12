<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use Validator,DB;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;

class CustomerVerificationController extends BaseController
{
    //use AuthorizesRequests;
    //use AuthorizesResources;
    //use DispatchesJobs;
    //use ValidatesRequests;
    
    
    /**
     function __construct() {
        echo json_encode(['error' => true, 'message' => "Please insert all fields."]);
            die;
    }
    **/
    
    public function inner_user_creation(Request $request) {
        
        //return 'hahahah';
        
        //dd($request->all());
        
        echo json_encode(['error' => true, 'message' => "Please insert all fields.",'all request' => $request->all()]);
        die;
    }
    
    
    
}


