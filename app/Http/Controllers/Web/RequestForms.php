<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Input;
use Validator,
    DB;

class RequestForms extends WebController {

    function __construct() {
        parent::__construct();
    }
    
    private function notifyAdmin($msg) {
        $to2 = $this->data['smsAdminTo'];
        $message2 = $msg;
        $url = "http://Lifetimesms.com/plain?username=" . $this->data['smsUsername'] . "&password=" . $this->data['smsPassword'] . "&to=" . $to2 . "&from=" . urlencode($this->data['smsFrom']) . "&message=" . urlencode($message2) . "";

        $ch2 = curl_init();
        $timeout2 = 30;
        curl_setopt($ch2, CURLOPT_URL, $url);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_CONNECTTIMEOUT, $timeout2);
        $response2 = curl_exec($ch2);
        curl_close($ch2);
    }

    public function partner() {
        return view('partner', $this->data);
    }

    public function partner_submit() {
        $valid["FullName"] = 'required|max:255';
        $valid_name["FullName"] = "Full Name";
        $valid["HotelName"] = 'max:255';
        $valid_name["HotelName"] = "Hotel Name";
        $valid["EmailAddress"] = 'required|email|max:50';
        $valid_name["EmailAddress"] = "Email Address";
        $valid["ContactNo"] = 'required|max:20';
        $valid_name["ContactNo"] = "Contact No";
        $valid["Location"] = 'required|max:255';
        $valid_name["Location"] = "Location";
        $valid["NoOfRooms"] = 'required|integer|min:1';
        $valid_name["NoOfRooms"] = "No. of Rooms";

        $messages = [
            'required' => 'Please enter :attribute.',
            'EmailAddress.email' => 'Please enter valid :attribute.',
            'NoOfRooms.min' => 'Please enter :attribute.'
        ];

        $v = Validator::make(Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);
        if ($v->fails()) {
            $errorMsg = "";
            foreach ($v->errors()->messages() as $err) {
                $errorMsg .= ($errorMsg == "" ? $err[0] : "<br>" . $err[0]);
            }
            echo json_encode(['error' => true, 'message' => $errorMsg]);
        } else {
            $Data = [
                'FullName' => Input::get('FullName'),
                'HotelName' => Input::get('HotelName'),
                'EmailAddress' => Input::get('EmailAddress'),
                'ContactNo' => Input::get('ContactNo'),
                'Location' => Input::get('Location'),
                'NoOfRooms' => Input::get('NoOfRooms'),
                'Description' => Input::get('Description'),
                "DateAdded" => new \DateTime
            ];

            DB::table('partner_request')->insert($Data);
            
            // send sms to admin
            $this->notifyAdmin('A new hotel partner request received.');

            $mailFrom = "info@ktownrooms.com";
            $AdminEmail = $this->data['AdminEmail'];

            \Mail::send('admin.includes.emails.hotel_partner', [
                "FullName" => Input::get('FullName'),
                "HotelName" => Input::get('HotelName'),
                "EmailAddress" => Input::get('EmailAddress'),
                "ContactNo" => Input::get('ContactNo'),
                "Location" => Input::get('Location'),
                "NoOfRooms" => Input::get('NoOfRooms'),
                "Description" => Input::get('Description')
                    ]
                    , function($message) use ($mailFrom, $AdminEmail) {
                $message->to($AdminEmail)->from($mailFrom, 'K Town Rooms')->subject('K Town Rooms - Hotel Partner Request Form');
            });

            echo json_encode(['error' => false, 'message' => "Details submitted successfully"]);
            //return redirect("partner")->with("success_msg", "Details submitted successfully");
        }
    }

    public function corporate_clients() {
        return view('corporate-clients', $this->data);
    }

    public function corporate_clients_submit() {
        $valid["FullName"] = 'required|max:255';
        $valid_name["FullName"] = "Full Name";
        $valid["EmailAddress"] = 'required|email|max:50';
        $valid_name["EmailAddress"] = "Email Address";
        $valid["ContactNo"] = 'required|max:20';
        $valid_name["ContactNo"] = "Contact No";
//        $valid["NoOfRooms"] = 'required|integer|min:1';
//        $valid_name["NoOfRooms"] = "No of Rooms";
        $valid["Location"] = 'required|max:255';
        $valid_name["Location"] = "Location";

        $messages = [
            'required' => 'Please enter :attribute.',
            'EmailAddress.email' => 'Please enter valid :attribute.',
            'NoOfRooms.min' => 'Please enter :attribute.'
        ];

        $v = Validator::make(Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);
        if ($v->fails()) {
            $errorMsg = "";
            foreach ($v->errors()->messages() as $err) {
                $errorMsg .= ($errorMsg == "" ? $err[0] : "<br>" . $err[0]);
            }
            echo json_encode(['error' => true, 'message' => $errorMsg]);
//            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            $Data = [
                'FullName' => Input::get('FullName'),
                'EmailAddress' => Input::get('EmailAddress'),
                'ContactNo' => Input::get('ContactNo'),
                'NoOfRooms' => Input::get('NoOfRooms'),
                'Location' => Input::get('Location'),
                'Description' => Input::get('Description'),
                "DateAdded" => new \DateTime
            ];

            DB::table('corporate_clients')->insert($Data);
            
            // send sms to admin
            $this->notifyAdmin('A new corporate client request received.');

            $mailFrom = "info@ktownrooms.com";
            $AdminEmail = $this->data['AdminEmail'];

            \Mail::send('admin.includes.emails.corporate_partner', [
                "FullName" => Input::get('FullName'),
                "EmailAddress" => Input::get('EmailAddress'),
                "ContactNo" => Input::get('ContactNo'),
                "NoOfRooms" => Input::get('NoOfRooms'),
                "Location" => Input::get('Location'),
                "Description" => Input::get('Description')
                    ]
                    , function($message) use ($mailFrom, $AdminEmail) {
                $message->to($AdminEmail)->from($mailFrom, 'K Town Rooms')->subject('K Town Rooms - Corporate Partner Request Form');
            });

            echo json_encode(['error' => false, 'message' => "Details submitted successfully"]);
//            return redirect("corporate-clients")->with("success_msg", "Details submitted successfully");
        }
    }

    public function travel_agent() {
        return view('travel-agent', $this->data);
    }

    public function travel_agent_submit() {
        $valid["FullName"] = 'required|max:255';
        $valid_name["FullName"] = "Full Name";
        $valid["Email"] = 'required|email|max:50';
        $valid_name["Email"] = "Email Address";
        $valid["Cell"] = 'required|max:20';
        $valid_name["Cell"] = "Cell";
        $valid["City"] = 'required|max:50';
        $valid_name["City"] = "City";
        $valid["Address"] = 'required|max:255';
        $valid_name["Address"] = "Address";

        $messages = [
            'required' => 'Please enter :attribute.',
            'Email.email' => 'Please enter valid :attribute.'
        ];

        $v = Validator::make(Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);
        if ($v->fails()) {
            $errorMsg = "";
            foreach ($v->errors()->messages() as $err) {
                $errorMsg .= ($errorMsg == "" ? $err[0] : "<br>" . $err[0]);
            }
            echo json_encode(['error' => true, 'message' => $errorMsg]);
//            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            $Data = [
                'FullName' => Input::get('FullName'),
                'Address' => Input::get('Address'),
                'City' => Input::get('City'),
                'Email' => Input::get('Email'),
                'Cell' => Input::get('Cell'),
                "DateAdded" => new \DateTime
            ];

            DB::table('agent_requests')->insert($Data);
            
            // send sms to admin
            $this->notifyAdmin('A new travel agent request received.');

            $mailFrom = "info@ktownrooms.com";
            $AdminEmail = $this->data['AdminEmail'];

            \Mail::send('admin.includes.emails.travel_agent', [
                "FullName" => Input::get('FullName'),
                "Address" => Input::get('Address'),
                "City" => Input::get('City'),
                "Email" => Input::get('Email'),
                "Cell" => Input::get('Cell')
                    ]
                    , function($message) use ($mailFrom, $AdminEmail) {
                $message->to($AdminEmail)->from($mailFrom, 'K Town Rooms')->subject('K Town Rooms - Travel Agent Request Form');
            });

            echo json_encode(['error' => false, 'message' => "Details submitted successfully"]);
//            return redirect("travel-agent")->with("success_msg", "Details submitted successfully");
        }
    }

}
