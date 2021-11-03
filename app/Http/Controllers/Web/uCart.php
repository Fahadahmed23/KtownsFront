<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebController;
use DB;
date_default_timezone_set('asia/karachi');

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
                // dd($this->data);
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
       // dd(\Input::all());
      //  dd("test");
        // PrivacyCheckbox
//        echo '<pre>'.print_r(\Session::get('RoomsCart'), true).'</pre>'; die;
//        echo '<pre>'.print_r(\Input::all(), true).'</pre>'; die;
// $data['UserID'] = \Session::get('UserID');
// $data['Email'] = \Session::get('EmailAddress') ?? \Input::get('EmailAddress');
// dd(\Session::get('CustomerLogin'));
        // if (\Session::has('CustomerLogin') && \Session::get('CustomerLogin')) {
            
            if (!\Session::has('CustomerLogin') && !\Session::get('CustomerLogin')) {
               // dd(\Input::get('NoOfRooms'));
                $noOfRooms = count(\Input::get('NoOfRooms'));
               // \Session::forget('SelectedRoom');
                \Session::set('SelectedRoom', \Input::get('NoOfRooms'));

                $hdnTotalCost =0;
                $hdnTotalRoom =0;
                for($i=0; $i<$noOfRooms; $i++)
                {
                    $hdnTotalRoom += \Input::get('NoOfRooms')[$i];
                    $hdnTotalCost += \Input::get('costOfRoom')[$i] * \Input::get('NoOfRooms')[$i];
                } 

                // $messages['required'] = 'Please enter :attribute.';
                $valid["FirstName"] = 'required|max:50';
                $valid["LastName"] = 'required|max:50';
                $valid["EmailAddress"] = 'required|email|max:50';
                $valid["Cell"] = 'required|max:20';

                $valid_name["FirstName"] = 'First Name';
                $valid_name["LastName"] = 'Last Name';
                $valid_name["EmailAddress"] = 'Email Address';
                $valid_name["Cell"] = 'Cell';
            }
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
                
                if($hdnTotalRoom == 0 || $hdnTotalCost==0 )
                {
                    $valid["NoOfRooms[]"] = 'required';
                    $valid_name["NoOfRooms[]"] = 'No of Rooms';
                }
                $v = \Validator::make(\Input::all(), $valid, $messages);
              //  dd('here');
                $v->setAttributeNames($valid_name);

                if($hdnTotalRoom == 0 || $hdnTotalCost==0 )
                { 
                    $messages['required'] = 'Please select :attribute.';
                    $messages['NoOfRooms[].required'] = 'Please select room below';
                 
                    return redirect()->back()->withErrors($v->errors())->withInput();
                }

                if ($v->fails() ) {
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

                    $data['UserID'] = \Session::get('UserID') ?? null;
                    $ToEmailAddress = \Session::get('EmailAddress') ?? \Input::get('EmailAddress');
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
                        $data['FirstName'] = \Session::get('FirstName') ?? \Input::get('FirstName');
                        $data['LastName'] = \Session::get('LastName') ?? \Input::get('LastName');
                        $data['Email'] = \Session::get('EmailAddress') ?? \Input::get('EmailAddress');
                        $data['Cell'] = \Session::get('Cell') ?? \Input::get('Cell');
                    }
                    $BookingID=0;
                    if($noOfRooms == null || $noOfRooms == '' || $noOfRooms < 1 )
                    {
                    $data['Referal'] = 2;
                    $data['BookingTotal'] = $TotalCost;
                    $data['Discount'] = 0;
                    $data['PromoDiscount'] = $PromoDiscount;
                    $data['TotalAmount'] = $TotalAmount;
                    $data['Status'] = 0;
                    $data['DateAdded'] = new \DateTime;

                    \DB::table('bookings')->insert($data);
                    $BookingID = \DB::getPdo()->lastInsertId();
                  
                    }
                    else
                    {
                    $data['Referal'] = 2;
                    $data['BookingTotal'] = $hdnTotalCost;
                    $data['Discount'] = 0;
                    $data['PromoDiscount'] = $PromoDiscount;
                    $data['TotalAmount'] = $hdnTotalCost;
                    $data['Status'] = 0;
                    $data['DateAdded'] = new \DateTime;

                    \DB::table('bookings')->insert($data);
                    $BookingID = \DB::getPdo()->lastInsertId();
                    
                    }

                    $HotelName = "";
                    
                    $RoomsQty = 1;
                    //my work
                    if($noOfRooms == null || $noOfRooms == '' || $noOfRooms < 1 )
                    {
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
                            //room_type_name will add here
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
                }
                else
                { 
                    for($i=0; $i<$noOfRooms; $i++)
                    {
                      if(\Input::get('NoOfRooms')[$i] != 0 )
                       {
                     foreach (\Session::get('RoomsCart') as $s) {
                        if ($s['AutoApprove'] == 1) {
                            $BookingStatus = 1;
                        }
                        $HotelName = $s['HotelName'];
                        $RoomsQty += (\Input::get('NoOfRooms')[$i]);
                        $rooms_data = [
                            'BookingID' => $BookingID,
                            'CheckInDate' => $s['HotelCheckInDate'],
                            'CheckOutDate' => $s['HotelCheckOutDate'],
                            'HotelID' => (\Input::get('HotelID')[$i]),
                            'HotelName' =>(\Input::get('HotelName')[$i]),
                            //room_type_name will add here
                            'OriginalHotelName' => $s['OriginalHotelName'],
                            'OwnerName' => $s['OwnerName'],
                            'Address' => $s['Address'],
                            'Address2' => $s['Address2'],
                            'Image' => $s['HotelImage'],
                            'HotelClass' => $s['HotelClass'],
                            'RoomQty' => (\Input::get('NoOfRooms')[$i]),
                            'Adults' => $s['Adults'],
                            'Children' => $s['Children'],
                            'Discount' => 0,
                            'PartnerPrice' => (\Input::get('PartnerPrice')[$i]),
                            'SellingPrice' => (\Input::get('SellingPrice')[$i]),
                            'AdultPrice' => $s['AdultCharges'],
                            'Total' => (\Input::get('costOfRoom')[$i] ) * (\Input::get('NoOfRooms')[$i])
                        ];
                        \DB::table('booking_hotels')->insert($rooms_data);
                     }
                    }
                   }
                }

                    \DB::table('bookings')->where('BookingID', $BookingID)->update(['Status' => $BookingStatus]);

                   $mailFrom = $this->data['emails']->BookingEmail;

                    $this->data['Booking'] = DB::table('bookings')
                            ->select(DB::raw('bookings.*, DATE_FORMAT(DateAdded, "%d/%m/%Y") as DateAdded, DATE_FORMAT(DateModified, "%d/%m/%Y") as DateModified, 0 As TotalAmountInWords'))
                            ->where('UserID', \Session::get('UserID'))
                            ->where('BookingID', $BookingID)
                            ->get();


                   

                    if (!empty($this->data['Booking'])) {
                        $this->data['hotel'] = DB::table('booking_hotels')
                                        ->select(DB::raw('booking_hotels.*, DATE_FORMAT(CheckInDate, "%d/%m/%Y") as CheckInDate, DATE_FORMAT(CheckOutDate, "%d/%m/%Y") as CheckOutDate, 0 As TotalInWords'))
                                        ->where('BookingID', $this->data['Booking'][0]->BookingID)->get();
                    }
                    
                    foreach ($this->data['hotel'] as $hotel) {
                        $hotel->TotalInWords = $this->numberTowords($hotel->Total);
                    }
    
                    foreach ($this->data['Booking'] as $b) {
                        $b->TotalAmountInWords = $this->numberTowords($b->TotalAmount);
                    }
                    
                    // dd($BookingID);
                    $pdf = \PDF::loadView('includes.booking.invoice', $this->data);
                    $pdf->save(public_path('uploads') . '/booking-number-' . $BookingID . '.pdf');
                    
                    $BookingCode = \DB::table('bookings')->where('BookingId', $BookingID)->first();
                    
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
// //                                    ->attach(realpath('public/uploads/booking-number-' . $BookingID . '.pdf'), ['mime' => 'application/pdf']);
//                        });
                    } else {
                        $MsgContent = "Hello " . $UserFName . ", request for " . $HotelName . ", has been placed with booking id " . $BookingID . ", we'll confirm you our availability soon. Call us 0311 1222 418, 0213 468 8335";
                        $EmailContent = "Hello " . $UserFName . ", <br>
Request for " . $HotelName . ", has been placed with booking id " . $BookingID . ", we'll confirm you our availability soon.<br>Call us 0311 1222 418, 0213 468 8335";
                    }
                    
                    // $EmailContent = $this->invoice($BookingID);
                    // $EmailContent = "";
                    
                    // \Mail::send('includes.emails.booking', [
                    //     "EmailContent" => $EmailContent,
                    //     "BookingID" => $BookingID
                    //         ]
                    //         , function($message) use ($mailFrom, $ToEmailAddress) {
                    //     $message->to($ToEmailAddress)
                    //             ->from($mailFrom, 'K Town Rooms')
                    //             ->subject('K Town Rooms - Booking Confirmation');
                    // });
                    
                    // Email by Umer
                    \Mail::send('includes.booking.invoice', $this->data
                            , function($message) use ($mailFrom, $ToEmailAddress) {
                        $message->to($ToEmailAddress)
                                ->from($mailFrom, 'K Town Rooms')
                                ->subject('K Town Rooms - Booking Confirmation');
                    });
                    // End Email By Umer

                    // send sms
                    // $to = $UserCellNo;
                    
                    // umer 
                    $to = \Input::get('Cell');
                    
                    // dd($this->formatCellNumber($to));
                    
                    // $message = $MsgContent;
                    $message = "Thank you for choosing Ktown Rooms and Homes. We have received your reservation request No is " . $BookingCode->BookingCode . " . Our representative will contact you within 24 hours. Please call our help line at 03 111 222 418 in case of last minute reservation. Kindly note that your booking will be confirmed subject to local compliance.";
                    $url = "http://Lifetimesms.com/plain?username=" . $this->data['smsUsername'] . "&password=" . $this->data['smsPassword'] . "&to=" . $this->formatCellNumber($to) . "&from=" . urlencode($this->data['smsFrom']) . "&message=" . urlencode($message) . "";
                    
                    $url = str_replace('%C2%A0', '+', $url);
                    
                    

                    $ch = curl_init();
                    $timeout = 30;
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                    $response = curl_exec($ch);
                    curl_close($ch);
                    
                    // dd($url);
                    
                    // send sms end
                    // sinding sms to admin
                    // send sms
                    $to2 = $this->data['smsAdminTo'];
                    // $message2 = "New Booking Received";
                    $message2 = $message;
                    $url = "http://Lifetimesms.com/plain?username=" . $this->data['smsUsername'] . "&password=" . $this->data['smsPassword'] . "&to=" . $to2 . "&from=" . urlencode($this->data['smsFrom']) . "&message=" . urlencode($message2) . "";
                    
                    $url = str_replace('%C2%A0', '+', $url);

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
        // } else {
        //     return redirect('login');
        // }
    }
    
    protected function formatCellNumber($no) {
        return str_replace(['-', '(', ')'], '', $no);
    }

    public function summary($booking_id) {
        // if (\Session::has('CustomerLogin') && \Session::get('CustomerLogin')) {
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
        // } else {
        //     return redirect('login');
        // }
    }

    /*public function invoice($booking_id) {
        // if (\Session::has('CustomerLogin') && \Session::get('CustomerLogin')) {
            $this->data['Booking'] = DB::table('bookings')
                    ->select(DB::raw('bookings.*, DATE_FORMAT(DateAdded, "%d/%m/%Y") as DateAdded, DATE_FORMAT(DateModified, "%d/%m/%Y") as DateModified, 0 As TotalInWords'))
                   // ->where('UserID', \Session::get('UserID'))
                    ->where('BookingID', $booking_id)
                    ->get();
            if (!empty($this->data['Booking'])) {
                $this->data['hotel'] = DB::table('booking_hotels')
                                ->select(DB::raw('booking_hotels.*, DATE_FORMAT(booking_hotels.CheckInDate, "%d/%m/%Y") as CheckInDate, DATE_FORMAT(booking_hotels.CheckOutDate, "%d/%m/%Y") as CheckOutDate, 0 As TotalAmountInWords'))
                                ->where('BookingID', $this->data['Booking'][0]->BookingID)->get();
                                
                            //   $this->data['BookingTotal'] = (new \NumberFormatter("en", NumberFormatter::SPELLOUT))->format($this->data['Booking'][0]->TotalAmount);
                foreach ($this->data['hotel'] as $hotel) {
                    $hotel->TotalInWords = $this->numberTowords($hotel->Total);
                }

                foreach ($this->data['Booking'] as $b) {
                    $b->TotalAmountInWords = $this->numberTowords($b->TotalAmount);
                }
                return view('includes/booking/invoice', $this->data);
//                return view('invoice', $this->data);
            } else {
                return redirect('hotels');
            }
        // } else {
        //     return redirect('login');
        // }
    }*/

    public function invoice($booking_id) {
        // if (\Session::has('CustomerLogin') && \Session::get('CustomerLogin')) {
            $this->data['Booking'] = DB::table('bookings')
                    ->select(DB::raw('bookings.*, DATE_FORMAT(DateAdded, "%d/%m/%Y") as DateAdded, DATE_FORMAT(DateModified, "%d/%m/%Y") as DateModified, 0 As TotalAmountInWords'))
                   // ->where('UserID', \Session::get('UserID'))
                    ->where('BookingID', $booking_id)
                    ->get();
            if (!empty($this->data['Booking'])) {
                $this->data['hotel'] = DB::table('booking_hotels')
                                ->select(DB::raw('booking_hotels.*, DATE_FORMAT(booking_hotels.CheckInDate, "%d/%m/%Y") as CheckInDate, DATE_FORMAT(booking_hotels.CheckOutDate, "%d/%m/%Y") as CheckOutDate, 0 As TotalInWords'))
                                ->where('BookingID', $this->data['Booking'][0]->BookingID)->get();
                               
                // $this->data['Total'] = $this->number2Words($this->data['Booking'][0]->TotalAmount);
                // $this->data['BookingTotal'] = (new \NumberFormatter("en", NumberFormatter::SPELLOUT))->format($this->data['Booking'][0]->TotalAmount);
                
                foreach ($this->data['hotel'] as $hotel) {
                    $hotel->TotalInWords = $this->numberTowords($hotel->Total);
                }

                foreach ($this->data['Booking'] as $b) {
                    $b->TotalAmountInWords = $this->numberTowords($b->TotalAmount);
                }
                return view('includes/booking/invoice', $this->data);
//                return view('invoice', $this->data);
            } else {
                return redirect('hotels');
            }
        // } else {
        //     return redirect('login');
        // }
    }
    
    function numberTowords(float $amount)
    {
        $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
        // Check if there is any number after decimal
        $amt_hundred = null;
        $count_length = strlen($num);
        $x = 0;
        $string = array();
        $change_words = array(0 => '', 1 => 'One', 2 => 'Two',
            3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
            7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
            10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
            13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
            16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
            19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
            40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
            70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
        $here_digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
        while( $x < $count_length ) {
            $get_divider = ($x == 2) ? 10 : 100;
            $amount = floor($num % $get_divider);
            $num = floor($num / $get_divider);
            $x += $get_divider == 10 ? 1 : 2;
            if ($amount) {
                $add_plural = (($counter = count($string)) && $amount > 9) ? 's' : null;
                $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
                $string [] = ($amount < 21) ? $change_words[$amount].' '. $here_digits[$counter]. $add_plural.' 
                '.$amt_hundred:$change_words[floor($amount / 10) * 10].' '.$change_words[$amount % 10]. ' 
                '.$here_digits[$counter].$add_plural.' '.$amt_hundred;
            } else $string[] = null;
        }

        $implode_to_Rupees = implode('', array_reverse($string));
        $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . " 
        " . $change_words[$amount_after_decimal % 10]) . ' Paise' : '';
        return ($implode_to_Rupees ? $implode_to_Rupees . 'Rupees ' : '') . $get_paise;
    }

}
//4193