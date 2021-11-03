<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Input;
use Validator,
    DB;

class Feedback extends WebController {

    function __construct() {
        parent::__construct();
    }

    public function index($token) {
        $booking = DB::table('bookings')->where('FeedbackToken', $token)->first();
        if (!empty($booking)) {

            $user = DB::table('users')->where('UserID', $booking->UserID)->first();
            if (!empty($user)) {
                \Session::set('CustomerLogin', true);
                \Session::set('UserType', $user->UserType);
                \Session::set("UserID", $user->UserID);
                \Session::set('FirstName', $user->FirstName);
                \Session::set('LastName', $user->LastName);
                \Session::set('Cell', $user->Cell);
                \Session::set('EmailAddress', $user->EmailAddress);
                \Session::set('IsAdminCorporate', $user->IsAdminCorporate);

                $this->data['token'] = $token;
                $this->data['rate'] = ['select rate', '1', '2', '3', '4', '5'];
                return view('feedback', $this->data);
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function submit($token) {
        $booking = DB::table('bookings')
                        ->leftjoin('booking_hotels', 'booking_hotels.BookingID', '=', 'bookings.BookingID')
                        ->where('FeedbackToken', $token)->first();
        if (!empty($booking)) {
            if (\Session::has('CustomerLogin') && \Session::get('CustomerLogin')) {
                $valid["Rate"] = 'required|integer|min:1|max:5';
                $valid_name["Rate"] = "Rate";
                $valid["Feedback"] = 'required|max:100';
                $valid_name["Feedback"] = "Feedback";

                $messages = [
                    'Feedback.required' => 'Please enter :attribute.',
                    'Rate.required' => 'Please select :attribute.',
                    'Rate.min' => 'Please select :attribute.',
                    'Rate.max' => 'Please select :attribute.'
                ];

                $v = Validator::make(Input::all(), $valid, $messages);
                $v->setAttributeNames($valid_name);
                if ($v->fails()) {
                    return redirect()->back()->withErrors($v->errors())->withInput();
                } else {
                    $FeedbackData = [
                        'UserID' => $booking->UserID,
                        'BookingID' => $booking->BookingID,
                        'HotelID' => $booking->HotelID,
                        'Rating' => Input::get('Rate'),
                        'Feedback' => Input::get('Feedback'),
                        "DateAdded" => new \DateTime
                    ];
                    DB::table('feedbacks')->insert($FeedbackData);
                    DB::table('bookings')->where('FeedbackToken', $token)->update(['FeedbackToken' => ""]);
                    return redirect("dashboard")->with("success_msg", "Feedback submitted successfully");
                }
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

}
