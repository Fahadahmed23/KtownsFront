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
use DateTime;
//use Illuminate\Support\Facades\Request;

date_default_timezone_set('asia/karachi');

class CustomerVerificationController extends BaseController
{
    //use AuthorizesRequests;
    //use AuthorizesResources;
    //use DispatchesJobs;
    //use ValidatesRequests;
    
    
    /*
     function __construct() {
        echo json_encode(['error' => true, 'message' => "Please insert all fields."]);
            die;
    }
    **/
    
    public function inner_user_creation(Request $request) {


        // FirstName
        // LastName
        // EmailAddress | Email 
         
        //echo json_encode(['error' => true, 'message' => "Please insert all fields.",'all request' => $request->all()]);
        //die;

        if(isset($request->Email) && !empty($request->Email)) {

            
            $invoiceData = [
                "FirstName" => isset($request->FirstName) ? $request->FirstName:'',
                "LastName" => isset($request->LastName) ? $request->LastName:'',
                "EmailAddress" => $request->Email,
                
            ];

            
            //echo json_encode(['error' => true, 'message' => "Please insert all fields.",'all request' => $invoiceData]);
            //die;
            
            // Mr Optimist  14 Dec 2021 
             $valid_email["EmailAddress"] = 'email|max:50|unique:users';
             $message_email = [
                 'EmailAddress.unique' => 'Email Address already registered.',
             ];

             //$validation_email = Validator::make(\Input::all(), $valid_email, $message_email);
            $validation_email = Validator::make($invoiceData, $valid_email, $message_email);
            if(!$validation_email->fails()) {


                $UserData = [
                    'UserType' => 1,
                    'FirstName' => isset($request->FirstName) ? $request->FirstName:'',
                    'LastName' => isset($request->LastName) ? $request->LastName:'',
                    'Cell' => isset($request->Phone) ? $request->Phone:'',
                    'EmailAddress' => $request->Email,
                    'Password' => sha1('ktownuser123'),
                    'Status' => 1,
                    'IsActivated' => 1,
                    "DateAdded" => new DateTime
                ];

                DB::table('users')->insert($UserData);

                $UserID = DB::getPdo()->lastInsertId();

                $message_account = "Ktown has generated your customer portal.You may logged into the account Url : https://www.ktownrooms.com/login, Your email :".$request->Email." & password : ktownuser123";
                $this->send_customer_message($request->Phone,$message_account);

                return response()->json([
                    'success' => true,
                    'message' => 'Customer has been created',
                    'user_id' => $UserID,
                ]);

            }
            else {
                $message_account = "Ktown has generated your customer portal.You may logged into the account Url : https://www.ktownrooms.com/login, Your email address :".$request->Email;
                $this->send_customer_message($request->Phone,$message_account);
            }             
        }

    }

    protected function formatCellNumber($no) {
        return str_replace(['-', '(', ')'], '', $no);
    }
    public function send_customer_message($to,$message_account){


        $curl = curl_init();                   
        $url_account = "http://pk.eocean.us/APIManagement/API/RequestAPI?user=ktown_rooms&pwd=ANxjeLj%2fFx8uVWXJyKXkiT2M0T3ash8y5r0Q9B%2bSn8qvwYdqmCiM6xFhs2rIV9X3MQ%3d%3d&sender=KTOWN%20ROOMS&reciever=".$to."&msg-data=" . \urlencode($message_account) . "&response=json";
        $url_account = str_replace('%C2%A0', '+', $url_account);
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url_account,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
    }
    
}


