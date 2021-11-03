<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebController;
use DB;

class Cart extends WebController {

    function __construct() {
        parent::__construct();
    }

    public function index() {
//        echo '<pre>'.print_r(\Session::get('RoomsCart'), true).'</pre>'; die;
        return view('cart', $this->data);
    }

    public function remove_item($HotelID) {
        $session = [];
        if (\Session::has('RoomsCart') && !empty(\Session::get('RoomsCart'))) {
            foreach (\Session::get('RoomsCart') as $s) {
                if ($s['HotelID'] != $HotelID) {
                    $session[] = [
                        'HotelID' => $s['HotelID'],
                        'Slug' => $s['Slug'],
                        'AutoApprove' => $s['AutoApprove'],
                        'HotelName' => $s['HotelName'],
                        'OriginalHotelName' => $s['OriginalHotelName'],
                        'OwnerName' => $s['OwnerName'],
                        'Address' => $s['Address'],
                        'Address2' => $s['Address2'],
                        'HotelImage' => $s['HotelImage'],
                        'Thumbnail' => $s['Thumbnail'],
                        'HotelClass' => $s['HotelClass'],
                        'CheckIn' => $s['CheckIn'],
                        'CheckOut' => $s['CheckOut'],
                        'HotelCheckInDate' => $s['HotelCheckInDate'],
                        'HotelCheckOutDate' => $s['HotelCheckOutDate'],
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
        \Session::forget('RoomsCart');
        \Session::set('RoomsCart', $session);
        return redirect('hotels');
    }

    public function payment() {
        if (\Session::has('CustomerLogin') && \Session::get('CustomerLogin')) {
            if (\Session::has('RoomsCart') && !empty(\Session::get('RoomsCart'))) {
                return view('payment', $this->data);
            } else {
                return redirect('cart');
            }
        } else {
            return redirect('login');
        }
    }

    public function book_now() {
        $BookingStatus = 0;
        // PrivacyCheckbox
//        echo '<pre>'.print_r(\Session::get('RoomsCart'), true).'</pre>'; die;
//        echo '<pre>'.print_r(\Input::all(), true).'</pre>'; die;
        if (\Session::has('CustomerLogin') && \Session::get('CustomerLogin')) {
            if (\Session::has('RoomsCart') && !empty(\Session::get('RoomsCart'))) {
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
                    foreach (\Session::get('RoomsCart') as $session) {
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

                    \DB::table('bookings')->insert($data);
                    $BookingID = \DB::getPdo()->lastInsertId();

                    $HotelName = "";
                    $RoomsQty = 1;

                    foreach (\Session::get('RoomsCart') as $s) {
                        if ($s['AutoApprove'] == 1) {
                            $BookingStatus = 1;
                        }
                        $HotelName = $s['HotelName'];
                        $RoomsQty = $s['Rooms'];
                        $rooms_data = [
                            'BookingID' => $BookingID,
                            'CheckInDate' => $s['HotelCheckInDate'],
                            'CheckOutDate' => $s['HotelCheckOutDate'],
                            'HotelID' => $s['HotelID'],
                            'HotelName' => $s['HotelName'],
                            'OriginalHotelName' => $s['OriginalHotelName'],
                            'OwnerName' => $s['OwnerName'],
                            'Address' => $s['Address'],
                            'Address2' => $s['Address2'],
                            'Image' => $s['HotelImage'],
                            'HotelClass' => $s['HotelClass'],
                            'RoomQty' => $s['Rooms'],
                            'Adults' => $s['Adults'],
                            'Children' => $s['Children'],
                            'Discount' => 0,
                            'PartnerPrice' => $s['PartnerPrice'],
                            'SellingPrice' => $s['SellingPrice'],
                            'AdultPrice' => $s['AdultCharges'],
                            'Total' => $s['Total']
                        ];
                        \DB::table('booking_hotels')->insert($rooms_data);
                    }

                    \DB::table('bookings')->where('BookingID', $BookingID)->update(['Status' => $BookingStatus]);

                    $mailFrom = $this->data['emails']->BookingEmail;

                    $this->data['Booking'] = DB::table('bookings')
                            ->select(DB::raw('bookings.*, DATE_FORMAT(DateAdded, "%d/%m/%Y") as DateAdded, DATE_FORMAT(DateModified, "%d/%m/%Y") as DateModified'))
                            ->where('UserID', \Session::get('UserID'))
                            ->where('BookingID', $BookingID)
                            ->first();
                    if (!empty($this->data['Booking'])) {
                        $this->data['hotel'] = DB::table('booking_hotels')
                                        ->select(DB::raw('booking_hotels.*, DATE_FORMAT(CheckInDate, "%d/%m/%Y") as CheckInDate, DATE_FORMAT(CheckOutDate, "%d/%m/%Y") as CheckOutDate'))
                                        ->where('BookingID', $this->data['Booking']->BookingID)->first();
                    }

                    $pdf = \PDF::loadView('includes.booking.invoice', $this->data);
                    $pdf->save(public_path('uploads') . '/booking-number-' . $BookingID . '.pdf');

                    if ($BookingStatus == 1) {
                        $MsgContent = "Dear " . $UserFName . ", Guest House " . $HotelName . " for " . $RoomsQty . " rooms. Your booking has confirmed & Booking ID is " . $BookingID . ". Thanks, KTown Rooms";
                        $EmailContent = "Dear " . $UserFName . ", <br>
Guest House " . $HotelName . " for " . $RoomsQty . " rooms.
Your booking has confirmed & Booking ID is " . $BookingID;
//                        \Mail::send('includes.emails.booking', [
//                            "EmailContent" => $EmailContent,
//                            "BookingID" => $BookingID
//                                ]
//                                , function($message) use ($mailFrom, $BookingID, $ToEmailAddress) {
//                            $message->to($ToEmailAddress)
//                                    ->from($mailFrom, 'K Town Rooms')
//                                    ->subject('K Town Rooms - Booking Confirmation');
////                                    ->attach(realpath('public/uploads/booking-number-' . $BookingID . '.pdf'), ['mime' => 'application/pdf']);
//                        });
                    } else {
                        $MsgContent = "Hello " . $UserFName . ", request for " . $HotelName . ", has been placed with booking id " . $BookingID . ", we'll confirm your availability soon. Call us 0311 1222 418, 0213 468 8335";
                        $EmailContent = "Hello " . $UserFName . ", <br>
Request for " . $HotelName . ", has been placed with booking id " . $BookingID . ", we'll confirm your availability soon.<br>Call us 0311 1222 418, 0213 468 8335";
                    }

                    \Mail::send('includes.emails.booking', [
                        "EmailContent" => $EmailContent,
                        "BookingID" => $BookingID
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
                    if (\File::exists(public_path('uploads') . '/booking-number-' . $BookingID . '.pdf')) {
                        \File::delete(public_path('uploads') . '/booking-number-' . $BookingID . '.pdf');
                    }

                    $AdminMailFrom = "info@ktownrooms.com";
                    $AdminEmail = $this->data['AdminEmail'];

                    \Mail::send('admin.includes.emails.booking', [
                        "FirstName" => "KTown"
                            ]
                            , function($message) use ($AdminMailFrom, $AdminEmail) {
                        $message->to($AdminEmail)->from($AdminMailFrom, 'K Town Rooms')->subject('K Town Rooms - New Booking');
                    });

                    \Session::forget('PromoApplied');
                    \Session::forget('PromoCode');
                    \Session::forget('PromoDiscount');
                    \Session::forget('RoomsCart');
                    return redirect('summary/' . $BookingID);
                }
            } else {
                return redirect('cart');
            }
        } else {
            return redirect('login');
        }
    }

    public function summary($booking_id) {
        if (\Session::has('CustomerLogin') && \Session::get('CustomerLogin')) {
            $this->data['Booking'] = DB::table('bookings')
                    ->where('UserID', \Session::get('UserID'))
                    ->where('BookingID', $booking_id)
                    ->first();
            if (!empty($this->data['Booking'])) {
                $this->data['BookingHotels'] = DB::table('booking_hotels')
                                ->select(DB::raw('booking_hotels.*, DATE_FORMAT(CheckInDate, "%d/%m/%Y") as CheckInDate, DATE_FORMAT(CheckOutDate, "%d/%m/%Y") as CheckOutDate'))
                                ->where('BookingID', $this->data['Booking']->BookingID)->get();
                return view('summary', $this->data);
            } else {
                return redirect('hotels');
            }
        } else {
            return redirect('login');
        }
    }

    public function invoice($booking_id) {
        if (\Session::has('CustomerLogin') && \Session::get('CustomerLogin')) {
            $this->data['Booking'] = DB::table('bookings')
                    ->select(DB::raw('bookings.*, DATE_FORMAT(DateAdded, "%d/%m/%Y") as DateAdded, DATE_FORMAT(DateModified, "%d/%m/%Y") as DateModified'))
                    ->where('UserID', \Session::get('UserID'))
                    ->where('BookingID', $booking_id)
                    ->first();
            if (!empty($this->data['Booking'])) {
                $this->data['hotel'] = DB::table('booking_hotels')
                                ->select(DB::raw('booking_hotels.*, DATE_FORMAT(booking_hotels.CheckInDate, "%d/%m/%Y") as CheckInDate, DATE_FORMAT(booking_hotels.CheckOutDate, "%d/%m/%Y") as CheckOutDate'))
                                ->where('BookingID', $this->data['Booking']->BookingID)->first();
                return view('includes/booking/invoice', $this->data);
//                return view('invoice', $this->data);
            } else {
                return redirect('hotels');
            }
        } else {
            return redirect('login');
        }
    }

}
//4193