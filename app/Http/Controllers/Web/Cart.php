<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebController;
use DB;
use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;
date_default_timezone_set('asia/karachi');

class Cart extends WebController {

    function __construct() {
        parent::__construct();
    }

    protected $token;

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

    public function makeAuthentication(){
        
        $client_id = 'ligqexD4gC2oCqR';

        $secret_id = 'LIbudKrmkN8oQNl';
        
        $data = '{"ClientID": "'.$client_id.'","ClientSecret": "'.$secret_id.'"}';
        // dd($data);
            
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.blinq.pk/api/Auth/");
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        //get only headers
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER,array(
                            "Content-Type:application/json" )
                );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);
        curl_close($ch);
        $headers = [];
        $output = rtrim($output);
        $data = explode("\n",$output);
        $headers['status'] = $data[0];
        array_shift($data);
        foreach($data as $part){
        
            //some headers will contain ":" character (Location for example), and the part after ":" will be lost, Thanks to @Emanuele
            $middle = explode(":",$part,2);
            if($middle[0] == 'token'){
                $middle[1] = str_replace("\r", '', $middle[1]);
                $middle[1] = str_replace(" ", '', $middle[1]);
                $token = $middle[1];
                // dd($middle[1] = str_replace("\r", '', $middle[1]));
            }
        }
        if(isset($token)){
            // dd($token);
            $this->token = $token;
            return true;
            // dd($token, 'create Invoice');
        } else {
            return false;
        }
            
            
    }
    
    public function createInvoice($token, $booking){
        $data = '[{"InvoiceNumber":"'.$booking->BookingCode.'", "InvoiceAmount": "'.intval($booking->TotalAmount).'", "InvoiceDueDate":"'.date('Y-m-d').'", "InvoiceType":"Booking", "IssueDate":"'.date('Y-m-d').'", "CustomerName":"'.$booking->FirstName.'"}]';
        // dd($data);
         //dd($booking,$data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.blinq.pk/invoice/create/");
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER,array(
                            "Content-Type:application/json",
                            "token:".$token)
                );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);
        curl_close($ch);
        //dd($output,$data);
        if(empty($output)) return false;
        else
        {
            $result = json_decode($output);
            //dd($result);
            if(isset($result->Status)){
                if($result->Status == '00'){
                    $response = $result->ResponseDetail;
                    
                    $blinqIntegrationData = [
                      'InvoiceNumber' => $response[0]->InvoiceNumber,
                      'PaymentCode' => $response[0]->PaymentCode,
                      'InvoiceAmount' => $response[0]->InvoiceAmount,
                      'TranFee' => $response[0]->TranFee,
                      'ResponseDetail' => json_encode($response[0]),
                    ];
                    // dd(json_encode($response[0]), $blinqIntegrationData);
                    \DB::table('booking_blinq_integrations')->insert($blinqIntegrationData);
                    
                    return[
                                    'success' => true,
                                ];
                                dd(1);
                } else if ($result->Status == '03'){
                    return['success' => false,
                                    'message' => $result->Message
                                ];
                }
                // dd($result);
            } else{
                 return [
                                    'success' => false,
                                    'message' => 'Invoice creation failed due to something went wrong'
                                ];
                // return false;
            }
            // dd($result->Message);
            // if(isset($result))
            // dd($paypal_order);
        }
    }

    public function book_now() {
            // dd(\Session::get('RoomsCart')[0]);
        try {
        $payWith = \Input::get('payWith');
        // dd(request()->path(), \Session::get('RoomsCart')[0]['Slug']);
        $IsArchive = 0;
        // dd($payWith);
        if($payWith != 'Cash'){
            $IsArchive = 1;
            $authorize = $this->makeAuthentication();
            // dd($authorize);
            if(!$authorize){
                return response()->json([
                    'success' => false,
                    'message' => 'Authentication Failed'
                ]);
                // return redirect()->back()->withErrors(['Error'=> 'Authentication Failed'])->withInput();
            }
        }
        // dd(\Input::all());
        // if($this->token){
        //     $invoice = $this->createInvoice($this->token, $bookingCode);
        // }
        // dd($this->token);
        
        // dd($IsArchive);
        // dd('(92)-' . \Input::get('Cell'));
        $BookingStatus = 0;
        $o = \Input::get('occupants');
                    
        // dd(json_encode(\Input::all()), \Input::all(), json_encode(\Session::get('RoomsCart')[0]), DB::table('hotels')->where('HotelID', \Session::get('RoomsCart')[0]['HotelID'])->first()->SlugId);
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
                $messages['PrivacyCheckbox.required'] = 'Please read and accept our terms and conditions';


               


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
                 
                    return response()->json([
                        'success' => false,
                        'message' => $v->errors()->first()
                    ]);

                    // return redirect()->back()->withErrors($v->errors())->withInput();
                }

                if ($v->fails() ) {
                    return response()->json([
                        'success' => false,
                        'message' => $v->errors()->first()
                    ]);
                    // return redirect()->back()->withErrors($v->errors())->withInput();
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
                    $data['IsArchive'] = $IsArchive;
                    $data['PaymentMode'] = $payWith;
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
                        $data['Cell'] = '(92)-' . \Input::get('Cell');
                    } else {
                        // dd('here');
                        $UserCellNo = \Session::get('Cell');
                        $data['FirstName'] = \Session::get('FirstName') ?? \Input::get('FirstName');
                        $data['LastName'] = \Session::get('LastName') ?? \Input::get('LastName');
                        $data['Email'] = \Session::get('EmailAddress') ?? \Input::get('EmailAddress');
                        $data['Cell'] = '(92)-' . \Input::get('Cell');
                    }
                    $BookingID=0;
                    if($noOfRooms == null || $noOfRooms == '' || $noOfRooms < 1 )
                    {
                    $data['Referal'] = 2;
                    $data['BookingTotal'] = $TotalCost;
                    $data['Discount'] = 0;
                    $data['PromoDiscount'] = $PromoDiscount;
                    // $data['TotalAmount'] = $TotalAmount;
                    $data['TotalAmount'] = \Input::get('hdnTotalRoom');
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
                    // $data['TotalAmount'] = $hdnTotalCost;
                    $data['TotalAmount'] = \Input::get('hdnTotalRoom');
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
                    foreach (\Session::get('RoomsCart') as $key => $s) {
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
                            // 'Adults' => $s['Adults'],
                            'Adults' => $o[$key+1],
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
                     foreach (\Session::get('RoomsCart') as $key => $s) {
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
                            // 'Adults' => $s['Adults'],
                            'Adults' => $o[$i],
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
                            ->select(DB::raw('bookings.*, DATE_FORMAT(DateAdded, "%d/%m/%Y") as DateAdded, DATE_FORMAT(DateModified, "%d/%m/%Y") as DateModified, 0 As TotalAmountInWords,getMapImage(bookings.bookingid) as map_image, getMapUrl(bookings.bookingid) as map_url'))
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
                    // dd(public_path('uploads') . '/booking-number-' . $BookingID . '.pdf');
                    // $pdf = \PDF::loadView('includes.booking.invoice', $this->data);
                    // $pdf->save(public_path('uploads') . '/booking-number-' . $BookingID . '.pdf');
                    
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
                    $this->data['email'] = true;
                    \Mail::send('includes.booking.invoice', $this->data
                            , function($message) use ($mailFrom, $ToEmailAddress) {
                        $message->to($ToEmailAddress)
                                ->from($mailFrom, 'K Town Rooms')
                                ->subject('Thank you for your Booking at Ktown Rooms & Homes(Booking No. ' . $this->data['Booking'][0]->BookingCode . ')');
                    });
                    
                    // Admin Email
                    $AdminMailFrom = "info@ktownrooms.com";
                    $AdminEmail = $this->data['AdminEmail'];
                    // $AdminEmail = "mumerhasan@live.co.uk";
                    
                    \Mail::send('includes.booking.invoice', $this->data
                            , function($message) use ($AdminMailFrom, $AdminEmail) {
                        $message->to($AdminEmail)
                                ->from($AdminMailFrom, 'K Town Rooms')
                                ->subject('K Town Rooms - New Booking');
                    });

                    // \Mail::send('admin.includes.emails.booking', [
                    //     "FirstName" => "KTown"
                    //         ]
                    //         , function($message) use ($AdminMailFrom, $AdminEmail) {
                    //     $message->to($AdminEmail)->from($AdminMailFrom, 'K Town Rooms')->subject('K Town Rooms - New Booking');
                    // });
                    // End Email By Umer

                    // send sms
                    // $to = $UserCellNo;
                    
                    // umer 
                    $to = \Input::get('Cell');
                    
                    // dd($this->formatCellNumber($to));
                    
                    // $message = $MsgContent;
                    // $message = "Thank you for choosing Ktown Rooms and Homes. We have received your reservation request No is " . $BookingCode->BookingCode . " . Our representative will contact you within 24 hours. Please call our help line at 03 111 222 418 in case of last minute reservation. Kindly note that your booking will be confirmed subject to local compliance.";
                    $message = "Ktown has received your request for accommodation. Our agent will contact you for your booking confirmation. Please Call 03111222418 for any queries.";
                    
                    // $url = "http://Lifetimesms.com/plain?username=" . $this->data['smsUsername'] . "&password=" . $this->data['smsPassword'] . "&to=" . $this->formatCellNumber($to) . "&from=" . urlencode($this->data['smsFrom']) . "&message=" . urlencode($message) . "";
                    
                    
                    $curl = curl_init();
                    
                    $url = "http://pk.eocean.us/APIManagement/API/RequestAPI?user=ktown_rooms&pwd=ANxjeLj%2fFx8uVWXJyKXkiT2M0T3ash8y5r0Q9B%2bSn8qvwYdqmCiM6xFhs2rIV9X3MQ%3d%3d&sender=KTOWN%20ROOMS&reciever=" . $this->formatCellNumber($to) . "&msg-data=" . \urlencode($message) . "&response=json";
                    
                    $url = str_replace('%C2%A0', '+', $url);

                    curl_setopt_array($curl, array(
                    CURLOPT_URL => $url,
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
                    
                    // Mr Optimist  09 Dec 2021 

                    
                    $UserData = [
                        'UserType' => 1,
                        'FirstName' => \Input::get('FirstName'),
                        'LastName' => \Input::get('LastName'),
                        'Cell' => \Input::get('Cell'),
                        'EmailAddress' => \Input::get('EmailAddress'),
                        'Password' => sha1('ktownuser123'),
                        'Status' => 1,
                        'IsActivated' => 1,
                        "DateAdded" => new \DateTime
                   ];

                   DB::table('users')->insert($UserData);

                   
                   $message_account = "Ktown has generated your customer portal.You may logged into the account Url : https://www.ktownrooms.com/login, Your email :".\Input::get('EmailAddress')." & password : ktownuser123";
                   $curl = curl_init();
                   
                   $url_account = "http://pk.eocean.us/APIManagement/API/RequestAPI?user=ktown_rooms&pwd=ANxjeLj%2fFx8uVWXJyKXkiT2M0T3ash8y5r0Q9B%2bSn8qvwYdqmCiM6xFhs2rIV9X3MQ%3d%3d&sender=KTOWN%20ROOMS&reciever=" . $this->formatCellNumber($to) . "&msg-data=" . \urlencode($message_account) . "&response=json";
                   
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

                      // Mr Optimist  09 Dec 2021 Ends
                
                    // $ch = curl_init();
                    // $timeout = 30;
                    // curl_setopt($ch, CURLOPT_URL, $url);
                    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                    // $response = curl_exec($ch);
                    // curl_close($ch);
                    
                    // dd($url);
                    
                    // send sms end
                    // sinding sms to admin
                    // send sms
                    $to2 = $this->data['smsAdminTo'];
                    // $message2 = "New Booking Received";
                    // $message2 = $message;
                    $triggerOn = date('Y-m-d H:i:s');
                    $user_tz = 'Asia/Karachi';


                    $schedule_date = new DateTime($triggerOn, new DateTimeZone($user_tz) );
                    $schedule_date->setTimeZone(new DateTimeZone('UTC'));
                    $triggerOn =  $schedule_date->format('Y-m-d h:i a');
                    $message2 = $UserFName ." has requested for accommodation on ".$HotelName ." at " .$triggerOn;

                    $curl = curl_init();

                    $url = "http://pk.eocean.us/APIManagement/API/RequestAPI?user=ktown_rooms&pwd=ANxjeLj%2fFx8uVWXJyKXkiT2M0T3ash8y5r0Q9B%2bSn8qvwYdqmCiM6xFhs2rIV9X3MQ%3d%3d&sender=KTOWN%20ROOMS&reciever=" . $this->formatCellNumber($to2) . "&msg-data=" . \urlencode($message2) . "&response=json";
                    
                    $url = str_replace('%C2%A0', '+', $url);
                    
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => $url,
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
                    // $url = "http://Lifetimesms.com/plain?username=" . $this->data['smsUsername'] . "&password=" . $this->data['smsPassword'] . "&to=" . $to2 . "&from=" . urlencode($this->data['smsFrom']) . "&message=" . urlencode($message2) . "";
                    
                    // $url = str_replace('%C2%A0', '+', $url);

                    // $ch2 = curl_init();
                    // $timeout2 = 30;
                    // curl_setopt($ch2, CURLOPT_URL, $url);
                    // curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
                    // curl_setopt($ch2, CURLOPT_CONNECTTIMEOUT, $timeout2);
                    // $response2 = curl_exec($ch2);
                    // curl_close($ch2);
                    
                    // Taha API work
                    if($payWith == 'Cash'){
                        $bookingData = [
                            "BookingID" => $BookingID,
                            "BookingCode" =>$BookingCode->BookingCode,
                        ];
                        $hotelData = [
                            "SlugId" => DB::table('hotels')->where('HotelID', \Session::get('RoomsCart')[0]['HotelID'])->first()->SlugId,
                        ];
                        
                        $this->callThirdPartyBooking(\Input::all(),$hotelData,$bookingData);
                    } else {
                        \Session::set('InputRequest', \Input::all());
                    }
                    
                    
                    // send sms end
                    if (\File::exists(public_path('uploads') . '/booking-number-' . $BookingID . '.pdf')) {
                        \File::delete(public_path('uploads') . '/booking-number-' . $BookingID . '.pdf');
                    }

                    $AdminMailFrom = "info@ktownrooms.com";
                    $AdminEmail = $this->data['AdminEmail'];

                    // \Mail::send('admin.includes.emails.booking', [
                    //     "FirstName" => "KTown"
                    //         ]
                    //         , function($message) use ($AdminMailFrom, $AdminEmail) {
                    //     $message->to($AdminEmail)->from($AdminMailFrom, 'K Town Rooms')->subject('K Town Rooms - New Booking');
                    // });

                    // \Session::forget('PromoApplied');
                    // \Session::forget('PromoCode');
                    // \Session::forget('PromoDiscount');
                    // \Session::forget('RoomsCart');
                    // \Session::flush();
                    // \Session::put('booked', true);
                    if($payWith != 'Cash'){
                        if($this->token){
                            $invoice = $this->createInvoice($this->token, $BookingCode);
                            // dd($invoice);
                             //dd($array['success']);
                            if(!$invoice['success']){
                                // $this->clearSession();
                                return response()->json([
                                    'success' => false,
                                    'message' => $invoice['message']
                                ]);
                                // return redirect()->back()->withErrors(['Error'=> 'Invoice Creation Failed'])->withInput();
                            } else {
                                // $url = 'blinq_payment/' . $BookingCode->BookingCode;
                                $url = null;
                                $blinq_integration = \DB::table('booking_blinq_integrations')->where('InvoiceNumber', $BookingCode->BookingCode)->first();

                                $ClientID = 'ligqexD4gC2oCqR';
                                $PaymentCode = $blinq_integration->PaymentCode;
                                $OrderID = $blinq_integration->InvoiceNumber;
                                $ReturnURL = 'https://ktownrooms.com/order-confirmation/'.$OrderID;
                                $ClientSecret = 'LIbudKrmkN8oQNl';
                                
                                // $userDataPattern = 'yKiKwABdhRsdDb000582125600006RGP0010821831https://www.staging.ktownrooms.com/order-confirmationNnvmdf5mEadZZZU';
                                $userDataPattern = $ClientID . $PaymentCode. $OrderID. $ReturnURL. $ClientSecret;
                                $sha = hash('sha256', $userDataPattern);
                                $mda = md5($sha);
                                // dd($url, $blinq_integration, $mda);
                                return response()->json([
                                    'success' => true,
                                    'redirect' => $url,
                                    'blinq_integration' => $blinq_integration, 
                                    'encrypted_form_data' => $mda
                                ]);
                                // return redirect('blinq_payment/' . $BookingCode->BookingCode);
                            }
                        } else {
                            // $this->clearSession();
                            return response()->json([
                                'success' => false,
                                'message' => 'Token authentication failed'
                            ]);
                            // return redirect()->back()->withErrors(['Error'=> 'Token authentication failed'])->withInput();
                        }
                    } else {
                        
                        $this->clearSession();
                        \Session::put('booked', true);
                        // dd($result);
                        $url = '/summary/' . $BookingID;
                        return response()->json([
                            'success' => true,
                            'redirect' => $url
                        ]);
                    }
                    
                    // return redirect('summary/' . $BookingID);
                }
            } else {
                $url = '/cart';
                return response()->json([
                    'success' => true,
                    'redirect' => $url
                ]);
                // return redirect('cart');
            }
        // } else {
        //     return redirect('login');
        // }
        } catch(\Exception $e) {
            \DB::table('bookings')->where('IsArchive', 1)->delete();
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
            ]);
        }
    }
    
    public function callThirdPartyBooking ($input, $hotelData,$bookingData,$invoiceData = ["paymentMode" => 'Cash']) {
        // dd($invoiceData);
        $data = array(
            'bookingRequest' => $input, 
            'sessionRequest' => \Session::get('RoomsCart')[0],
            'hotelData' => $hotelData,
            'bookingData' => $bookingData,
            'invoiceData' => $invoiceData,

        );       
        
        $data_string = json_encode($data); 
                    // dd($data);
        
        $ch3 = curl_init('https://partners.ktownrooms.com/third_party_booking');   // where to post                                                                   
        curl_setopt($ch3, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($ch3, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch3, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                            
            // 'Content-Length: ' . strlen($data_string)
            )                                                                       
        );                                                                                                                   
        
        $result = curl_exec($ch3);
        if(empty($result)) return false;
        else
        {
            $response = json_decode($result);
            // dd($response);
            if($response->success){
                return true;
            }
            return false;
        }
        // dd($result);
        
        curl_close($ch3);
    }
    
    public function clearSession () {
        \Session::forget('PromoApplied');
        \Session::forget('PromoCode');
        \Session::forget('PromoDiscount');
        \Session::forget('RoomsCart');
        \Session::forget('InputRequest');
        \Session::flush();
    }
    public function order_confirmation($invoice_number, Request $request){
        // dd($request->all());
        $booking_blinq_integrations = \DB::table('booking_blinq_integrations')
                    ->where('InvoiceNumber', $invoice_number)
                    ->update(['PaymentResponse'=>json_encode($request->all())]);
        if($request->status == 'success'){
            // dd($request->all());
            $booking = \DB::table('bookings')->where('BookingCode', $request->ordId)->first();
            if($booking){
                \DB::table('bookings')->where('BookingCode', $request->ordId)->update(['IsArchive'=> 0, 'PaymentStatus'=> 1]);
                // dd(\Session::get('InputRequest'));
                $bookingData = [
                    "BookingID" => $booking->BookingID,
                    "BookingCode" =>$booking->BookingCode,
                ];
                // dd(\Session::get('RoomsCart'));
                if(\Session::get('RoomsCart')){
                    $hotelData = [
                        "SlugId" => DB::table('hotels')->where('HotelID', \Session::get('RoomsCart')[0]['HotelID'])->first()->SlugId,
                    ];
                } else {
                    $hotelData = [
                        "SlugId" => null,
                    ];
                }
                $invoiceData = [
                    "paymentMode" => $booking->PaymentMode,
                    "paymentCode" => $request->paymentCode,
                    "booking" => $booking,
                    
                ];
                // dd(\Session::get('InputRequest'),$hotelData,$bookingData,$invoiceData);
                $tpb = $this->callThirdPartyBooking(\Session::get('InputRequest'),$hotelData,$bookingData,$invoiceData);
                
                // dd($tpb);
                $this->clearSession();
                \Session::put('booked', true);
                return redirect('/summary/' . $booking->BookingID);
            } else {
                
                // dd('must delete is archive`s booking');
                \DB::table('bookings')->where('IsArchive', 1)->delete();
                return redirect()->back()->withErrors(['Error'=> 'Booking not found, Payment Failed'])->withInput();
            }
            // dd($request->all());
        } else {
            // dd('delete is archive`s booking', $request->all());
            // dd($this->slug);
            \DB::table('bookings')->where('IsArchive', 1)->delete();
            if(\Session::get('RoomsCart')){
                
                $slug = \Session::get('RoomsCart')[0]['Slug'];
                return redirect("/details/$slug")->withErrors(['Error'=> "Payment Failed - Due to: $request->message"])->withInput();
            } else {
                return redirect("/")->withErrors(['Error'=> "Payment Failed - Due to: $request->message"])->withInput();
                
            }
            // $slug = \Session::get('RoomsCart')[0]['Slug'];
            // return redirect("/details/$slug")->withErrors(['Error'=> "Payment Failed - Due to: $request->message"])->withInput();
        }
    }
    
    protected function formatCellNumber($no) {
        return str_replace(['-', '(', ')'], '', $no);
    }
    
    public function blinq_payment($booking_code) {
        $this->data['Blinq_Payment'] = \DB::table('booking_blinq_integrations')
                    ->where('InvoiceNumber', $booking_code)
                    ->first();
                    // dd($booking_code, $this->data, empty($this->data['Blinq_Payment']));
            if (!empty($this->data['Blinq_Payment'])) {
                // $this->data['BookingHotels'] = DB::table('booking_hotels')
                //                 ->select(DB::raw('booking_hotels.*, DATE_FORMAT(CheckInDate, "%d/%m/%Y") as CheckInDate, DATE_FORMAT(CheckOutDate, "%d/%m/%Y") as CheckOutDate'))
                //                 ->where('BookingID', $this->data['Booking']->BookingID)->get();
                return view('blinq-payment', $this->data);
            } else {
                return redirect('hotels');
            }
        
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
                    ->select(DB::raw('bookings.*, DATE_FORMAT(DateAdded, "%d/%m/%Y") as DateAdded, DATE_FORMAT(DateModified, "%d/%m/%Y") as DateModified, 0 As TotalAmountInWords,getMapImage(bookings.bookingid) as map_image,getMapUrl(bookings.bookingid) as map_url'))
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
        " . $change_words[$amount_after_decimal % 10]) . ' ' : '';
        return ($implode_to_Rupees ? $implode_to_Rupees . ' ' : '') . $get_paise;
    }

}
//4193