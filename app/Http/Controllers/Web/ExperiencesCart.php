<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebController;
use DB;

class ExperiencesCart extends WebController {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        //echo '<pre>'.print_r(\Session::get('ExperiencesCart'), true).'</pre>'; die;
        return view('experiences-cart', $this->data);
    }

    public function remove_item($ExperiencesID) {
        $session = [];
        if (\Session::has('ExperiencesCart') && !empty(\Session::get('ExperiencesCart'))) {
            foreach (\Session::get('ExperiencesCart') as $s) {
                if ($s['ExperiencesID'] != $ExperiencesID) {
                    $session[] = [
                        'ExperiencesID' => $s['ExperiencesID'],
                        'Slug' => $s['Slug'],
                        'AutoApprove' => $s['AutoApprove'],
                        'ExperiencesName' => $s['ExperiencesName'],
                        'OriginalExperiencesName' => $s['OriginalExperiencesName'],
                        'OwnerName' => $s['OwnerName'],
                        'Address' => $s['Address'],
                        'Address2' => $s['Address2'],
                        'ExperiencesImage' => $s['ExperiencesImage'],
                        'Thumbnail' => $s['Thumbnail'],
                        //'HotelClass' => $s['HotelClass'],
                        'CheckIn' => $s['CheckIn'],
                        'CheckOut' => $s['CheckOut'],
                        'HotelCheckInDate' => $s['ExperiencesCheckInDate'],
                        'HotelCheckOutDate' => $s['ExperiencesCheckOutDate'],
                        'TotalNights' => $s['TotalNights'],
                        'Adults' => $s['Adults'],
                        'Children' => $s['Children'],
                        'Rooms' => $s['Rooms'],
                        'PartnerPrice' => $s['PartnerPrice'],
                        'SellingPrice' => $s['SellingPrice'],
                        'AdultCharges' => $s['AdultCharges'],
                        'Total' => $s['Total']
                    ];
                }
            }
        }
        \Session::forget('ExperiencesCart');
        \Session::set('ExperiencesCart', $session);
        return redirect('experiences');
    }

    public function payment() {
        if (\Session::has('CustomerLogin') && \Session::get('CustomerLogin')) {
            if (\Session::has('ExperiencesCart') && !empty(\Session::get('ExperiencesCart'))) {
                return view('experiences-payment', $this->data);
            } else {
                return redirect('experiences-cart');
            }
        } else {
            return redirect('login');
        }
    }

    public function book_now() {
        $BookingStatus = 0;
        // PrivacyCheckbox
        //echo '<pre>'.print_r(\Session::get('ExperiencesCart'), true).'</pre>'; die;
//        echo '<pre>'.print_r(\Input::all(), true).'</pre>'; die;
        if (\Session::has('CustomerLogin') && \Session::get('CustomerLogin')) {
            if (\Session::has('ExperiencesCart') && !empty(\Session::get('ExperiencesCart'))) {
                $messages['required'] = 'Please enter :attribute.';
                $messages['PrivacyCheckbox.required'] = 'Please read and check our terms and conditions';

                if (\Session::has('IsAdminCorporate') && \Session::get('IsAdminCorporate') == 1) {

                    $valid["FirstName"] = 'required|max:50';
                    $valid["LastName"] = 'required|max:50';
                    $valid["EmailAddress"] = 'required|email|max:50';
                    $valid["Cell"] = 'required|max:20';

                    $valid_name["FirstName"] = 'First Name';
                    $valid_name["LastName"] = 'Last Name';
                    $valid_name["EmailAddress"] = 'Email Address';
                    $valid_name["Cell"] = 'Cell';
                }

                $valid["PrivacyCheckbox"] = 'required';
                $valid_name["PrivacyCheckbox"] = 'PrivacyCheckbox';

                $v = \Validator::make(\Input::all(), $valid, $messages);
                $v->setAttributeNames($valid_name);

                if ($v->fails()) {
                    return redirect()->back()->withErrors($v->errors())->withInput();
                } else {
                    $TotalCost = 0;
                    $PromoDiscount = 0;
                    $TotalAmount = 0;
                    foreach (\Session::get('ExperiencesCart') as $session) {
                        $TotalCost += $session['Total'];
                    }

                    if (\Session::has('PromoApplied')) {
                        $PromoDiscount = ($TotalCost * \Session::get('PromoDiscount') / 100);
                    }

                    $TotalAmount = $TotalCost - $PromoDiscount;

                    $data['UserID'] = \Session::get('UserID');
                    $ToEmailAddress = \Session::get('EmailAddress');
                    $UserFName = \Session::get('FirstName');
                    $UserCellNo = "";
                    if (\Session::has('IsAdminCorporate') && \Session::get('IsAdminCorporate') == 1) {
                        $UserCellNo = \Input::get('Cell');
                        $ToEmailAddress = \Input::get('EmailAddress');
                        $UserFName = \Input::get('FirstName');
                        $data['FirstName'] = \Input::get('FirstName');
                        $data['LastName'] = \Input::get('LastName');
                        $data['Email'] = \Input::get('EmailAddress');
                        $data['Cell'] = \Input::get('Cell');
                    } else {
                        $UserCellNo = \Session::get('Cell');
                        $data['FirstName'] = \Session::get('FirstName');
                        $data['LastName'] = \Session::get('LastName');
                        $data['Email'] = \Session::get('EmailAddress');
                        $data['Cell'] = \Session::get('Cell');
                    }
                    $data['Referal'] = 2;
                    $data['BookingTotal'] = $TotalCost;
                    $data['Discount'] = 0;
                    $data['PromoDiscount'] = $PromoDiscount;
                    $data['TotalAmount'] = $TotalAmount;
                    $data['Status'] = 0;
                    $data['DateAdded'] = new \DateTime;

                    \DB::table('experiences_booking')->insert($data);
                    $ExperiencesID = \DB::getPdo()->lastInsertId();

                    $ExperiencesName = "";
                    $RoomsQty = 1;

                    foreach (\Session::get('ExperiencesCart') as $s) {
                        if ($s['AutoApprove'] == 1) {
                            $BookingStatus = 1;
                        }
                        $ExperiencesName = $s['ExperiencesName'];
                        $RoomsQty = $s['Rooms'];
                        $experiences_data = [
                            'ExperiencesBookingID' => $ExperiencesID,
                            'CheckInDate' => $s['ExperiencesCheckInDate'],
                            'CheckOutDate' => $s['ExperiencesCheckOutDate'],
                            'ExperiencesID' => $s['ExperiencesID'],
                            'ExperiencesName' => $s['ExperiencesName'],
                            'OriginalExperiencesName' => $s['OriginalExperiencesName'],
                            'OwnerName' => $s['OwnerName'],
                            'Address' => $s['Address'],
                            'Address2' => $s['Address2'],
                            'Image' => $s['ExperiencesImage'],
                            //'HotelClass' => $s['HotelClass'],
                            'RoomQty' => $s['Rooms'],
                            'Adults' => $s['Adults'],
                            'Children' => 0,
                            'Discount' => 0,
                            'PartnerPrice' => $s['PartnerPrice'],
                            'SellingPrice' => $s['SellingPrice'],
                            'AdultPrice' => $s['AdultCharges'],
                            'Total' => $s['Total']
                        ];
                        \DB::table('experiences_booking_tours')->insert($experiences_data);
                    }

                    \DB::table('experiences_booking')->where('ExperiencesBookingID', $ExperiencesID)->update(['Status' => $BookingStatus]);

                    $mailFrom = $this->data['emails']->BookingEmail;

                    $this->data['Booking'] = DB::table('experiences_booking')
                            ->select(DB::raw('experiences_booking.*, DATE_FORMAT(DateAdded, "%d/%m/%Y") as DateAdded, DATE_FORMAT(DateModified, "%d/%m/%Y") as DateModified'))
                            ->where('UserID', \Session::get('UserID'))
                            ->where('ExperiencesBookingID', $ExperiencesID)
                            ->first();
                    if (!empty($this->data['Booking'])) {
                        $this->data['hotel'] = DB::table('experiences_booking_tours')
                                        ->select(DB::raw('experiences_booking_tours.*, DATE_FORMAT(CheckInDate, "%d/%m/%Y") as CheckInDate, DATE_FORMAT(CheckOutDate, "%d/%m/%Y") as CheckOutDate'))
                                        ->where('ExperiencesBookingID', $this->data['Booking']->ExperiencesBookingID)->first();
                    }

                    /*$pdf = \PDF::loadView('includes.booking.invoice', $this->data);
                    $pdf->save(public_path('uploads') . '/experiences-number-' . $ExperiencesID . '.pdf');

                    if ($BookingStatus == 1) {
                        $MsgContent = "Dear " . $UserFName . ", Guest House " . $HotelName . " for " . $RoomsQty . " rooms. Your booking has confirmed & Booking ID is " . $ExperiencesID . ". Thanks, KTown Rooms";
                        $EmailContent = "Dear " . $UserFName . ", <br>
Guest House " . $HotelName . " for " . $RoomsQty . " rooms.
Your booking has confirmed & Booking ID is " . $ExperiencesID;
//                       
                    } else {
                        $MsgContent = "Hey " . $UserFName . ", request for " . $HotelName . ", has been placed with booking id " . $ExperiencesID . ", we'll confirm you availability soon. Call us 021 34688335-7";
                        $EmailContent = "Hey " . $UserFName . ", <br>
Request for " . $HotelName . ", has been placed with experiences id " . $ExperiencesID . ", we'll confirm you availability soon.<br>Call us 0213 468 8335-7";
                    }

                    \Mail::send('includes.emails.booking', [
                        "EmailContent" => $EmailContent,
                        "ExperiencesID" => $ExperiencesID
                            ]
                            , function($message) use ($mailFrom, $ToEmailAddress) {
                        $message->to($ToEmailAddress)
                                ->from($mailFrom, 'K Town Rooms')
                                ->subject('K Town Rooms - Booking Confirmation');
                    });

                    // send sms
                    $to = $UserCellNo;
                    $message = $MsgContent;
                    $url = "http://Lifetimesms.com/plain?username=" . $this->data['smsUsername'] . "&password=" . $this->data['smsPassword'] . "&to=" . $to . "&from=" . urlencode($this->data['smsFrom']) . "&message=" . urlencode($message) . "";

                    $ch = curl_init();
                    $timeout = 30;
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                    $response = curl_exec($ch);
                    curl_close($ch);
                    // send sms end
                    // sinding sms to admin
                    // send sms
                    $to2 = $this->data['smsAdminTo'];
                    $message2 = "New Booking Received";
                    $url = "http://Lifetimesms.com/plain?username=" . $this->data['smsUsername'] . "&password=" . $this->data['smsPassword'] . "&to=" . $to2 . "&from=" . urlencode($this->data['smsFrom']) . "&message=" . urlencode($message2) . "";

                    $ch2 = curl_init();
                    $timeout2 = 30;
                    curl_setopt($ch2, CURLOPT_URL, $url);
                    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch2, CURLOPT_CONNECTTIMEOUT, $timeout2);
                    $response2 = curl_exec($ch2);
                    curl_close($ch2);
                    // send sms end
                    if (\File::exists(public_path('uploads') . '/experiences-number-' . $ExperiencesID . '.pdf')) {
                        \File::delete(public_path('uploads') . '/experiences-number-' . $ExperiencesID . '.pdf');
                    }

                    $AdminMailFrom = "info@ktownrooms.com";
                    $AdminEmail = $this->data['AdminEmail'];

                    \Mail::send('admin.includes.emails.booking', [
                        "FirstName" => "KTown"
                            ]
                            , function($message) use ($AdminMailFrom, $AdminEmail) {
                        $message->to($AdminEmail)->from($AdminMailFrom, 'K Town Rooms')->subject('K Town Rooms - New Booking');
                    });
                    */
                    \Session::forget('PromoApplied');
                    \Session::forget('PromoCode');
                    \Session::forget('PromoDiscount');
                    \Session::forget('ExperiencesCart');
                    return redirect('experiences-summary/' . $ExperiencesID);
                }
            } else {
                return redirect('experiences-cart');
            }
        } else {
            return redirect('login');
        }
    }

    public function summary($ExperiencesID) {
        if (\Session::has('CustomerLogin') && \Session::get('CustomerLogin')) {
            $this->data['Booking'] = DB::table('experiences_booking')
                    ->where('UserID', \Session::get('UserID'))
                    ->where('ExperiencesBookingID', $ExperiencesID)
                    ->first();
            if (!empty($this->data['Booking'])) {
                $this->data['BookingHotels'] = DB::table('experiences_booking_tours')
                                ->select(DB::raw('experiences_booking_tours.*, DATE_FORMAT(CheckInDate, "%d/%m/%Y") as CheckInDate, DATE_FORMAT(CheckOutDate, "%d/%m/%Y") as CheckOutDate'))
                                ->where('ExperiencesBookingID', $this->data['Booking']->ExperiencesBookingID)->get();
                return view('experiences-summary', $this->data);
            } else {
                return redirect('experiences');
            }
        } else {
            return redirect('login');
        }
    }

    public function invoice($ExperiencesID) {
        if (\Session::has('CustomerLogin') && \Session::get('CustomerLogin')) {
            $this->data['Booking'] = DB::table('experiences_booking')
                    ->select(DB::raw('experiences_booking.*, DATE_FORMAT(DateAdded, "%d/%m/%Y") as DateAdded, DATE_FORMAT(DateModified, "%d/%m/%Y") as DateModified'))
                    ->where('UserID', \Session::get('UserID'))
                    ->where('ExperiencesBookingID', $ExperiencesID)
                    ->first();
            if (!empty($this->data['Booking'])) {
                $this->data['hotel'] = DB::table('experiences_booking_tours')
                                ->select(DB::raw('experiences_booking_tours.*, DATE_FORMAT(experiences_booking_tours.CheckInDate, "%d/%m/%Y") as CheckInDate, DATE_FORMAT(experiences_booking_tours.CheckOutDate, "%d/%m/%Y") as CheckOutDate'))
                                ->where('ExperiencesBookingID', $this->data['Booking']->ExperiencesBookingID)->first();
                return view('includes/booking/experiences-invoice', $this->data);
//                return view('invoice', $this->data);
            } else {
                return redirect('experiences');
            }
        } else {
            return redirect('login');
        }
    }

}
//4193