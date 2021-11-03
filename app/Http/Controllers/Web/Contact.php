<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Input;
use Validator,
    DB;

class Contact extends WebController {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        if (\Request::has('q')) {
//            echo realpath('19.pdf'); die;
            $BookingID = 75;
//            echo url('public/uploads/booking-number-' . $BookingID . '.pdf'); die;
            $mailFrom = "info@ktownrooms.com";
            $ToEmailAddress = "ameenyameen@gmail.com";
            $EmailContent = "Your order has been placed successfully\nCall us +92(312) 4966033\nKTown Rooms.";
//            \Mail::send('includes.emails.booking', [
//                "EmailContent" => $EmailContent,
//                "BookingID" => $BookingID
//            ], function($message) use ($mailFrom, $BookingID, $ToEmailAddress) {
//                $message->to($ToEmailAddress)
//                        ->from($mailFrom, 'K Town Rooms')
//                        ->subject('K Town Rooms - Booking Confirmation');
//            }); die;
            \Mail::send('includes.emails.booking', [
                "EmailContent" => $EmailContent,
                "BookingID" => $BookingID
                    ], function($message) use ($mailFrom, $BookingID, $ToEmailAddress) {
                $message->to($ToEmailAddress)
                        ->from($mailFrom, 'K Town Rooms')
                        ->subject('K Town Rooms - Booking Confirmation')
                        ->attach(realpath('19.pdf'), ['mime' => 'application/pdf']);
            });
            echo "Mail sent"; die;
        } else {
            return view('contact', $this->data);
        }
    }

    public function submit() {
        $valid["FirstName"] = 'required|max:255';
        $valid_name["FirstName"] = "First Name";
        $valid["LastName"] = 'required|max:255';
        $valid_name["LastName"] = "Last Name";
        $valid["Phone"] = 'required|max:20';
        $valid_name["Phone"] = "Phone";
        $valid["Email"] = 'required|email|max:50';
        $valid_name["Email"] = "Email Address";
        $valid["Message"] = 'required|max:1000';
        $valid_name["Message"] = "Message";

        $messages = [
            'required' => 'Please enter :attribute.',
            'Email.email' => 'Please enter valid :attribute.'
        ];

        $v = Validator::make(Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            $UserData = [
                'FirstName' => Input::get('FirstName'),
                'LastName' => Input::get('LastName'),
                'Email' => Input::get('Email'),
                'Phone' => Input::get('Phone'),
                'Message' => Input::get('Message'),
                "DateAdded" => new \DateTime
            ];

            DB::table('contact')->insert($UserData);

            $mailFrom = "contact@ktownrooms.com";
            $AdminEmail = $this->data['AdminEmail'];

            \Mail::send('admin.includes.emails.contact', [
                "FirstName" => Input::get('FirstName'),
                "LastName" => Input::get('LastName'),
                "Email" => Input::get('Email'),
                "Phone" => Input::get('Phone'),
                "Message" => Input::get('Message')
                    ]
                    , function($message) use ($mailFrom, $AdminEmail) {
                $message->to($AdminEmail)->from($mailFrom, 'K Town Rooms')->subject('K Town Rooms - Contact');
            });

            return redirect("contact")->with("success_msg", "Details submitted successfully");
        }
    }

}
