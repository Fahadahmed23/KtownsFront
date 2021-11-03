<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebController;
use DB;
use Session;
date_default_timezone_set('asia/karachi');

class Hotels extends WebController {

    function __construct() {
        parent::__construct();
        $this->data['services'] = DB::table('services')->where('Status', 1)->get();
        $this->data['hotel_types'] = DB::table('hotel_types')->where('Status', 1)->get();
        $this->data['cities'] = DB::table('cities')->where('Status', 1)->get();
        $this->data['max_rating'] = \Config::get('rating');
    }
    
    public function index() {

       // dd(\Request::get('c'));
        
          $adults = \Request::get('adults');
          $rooms = \Request::get('rooms');
          $children = \Request::get('children');
          $cityname = \Request::get('Cityname') != null ? \Request::get('Cityname') : \Request::get('c');
          $daterange = \Request::get('daterange');

        //  dd($cityname);


          if($adults != null)
          {
            Session::set('adults', $adults);
          }
          else
          {
            $adults = Session::get('adults');
          }

          if($rooms != null)
          {
            Session::set('rooms', $rooms);
          }
          else
          {
            $rooms = Session::get('rooms');
          }

          if($cityname != null)
          {
            Session::set('cityname', $cityname);
          }
          else
          {
            $cityname = Session::get('cityname');
          }
          
          if($daterange != null)
          {
            Session::set('daterange', $daterange);
          }
          else
          {
            $daterange = Session::get('daterange');
          }

          


          //dd(Session::set('adults', $adults));

         
            if (\Request::has('daterange') || $daterange) 
            {
           

                
          $daterangearr = explode(" - ",$daterange);
          $fromDate = date('Y-m-d',strtotime($daterangearr[0]));
          $toDate =date('Y-m-d',strtotime($daterangearr[1]));

          Session::set('toDate', $toDate);
          Session::set('fromDate', $fromDate);


         // dd($toDate,$fromDate);          
        

          $this->data['toDate']=$toDate;
          $this->data['fromDate']=$fromDate;    
          $this->data['adults']=$adults;
          $this->data['rooms']=$rooms;
          $this->data['children']=$children;
            }      

        $pricingfilter= "";
         if (\Request::has('my_range')) {
            $range = \Request::get('my_range');
            // dd($range);
            $rangearr = explode(";",$range);

            $toPrice = $rangearr[0];
            $fromPrice = $rangearr[1];
            \Session::put('toPrice', $toPrice);
            \Session::put('fromPrice', $fromPrice);
            $pricingfilter = DB::table('hotels')->whereBetween('SellingPrice', [$toPrice , $fromPrice]);
        }
        else{
             $pricingfilter =  DB::table('hotels');
        }

        $keyword = "";
        if (\Request::has('q')) {
            $keyword = \Request::get('q');
        }

        if ((\Input::has('CheckinDate') && \Input::get('CheckinDate') != "") && (\Input::has('CheckoutDate') && \Input::get('CheckoutDate') != "")) 
        {
            
            \Session::set('mCheckinDate', \Input::get('CheckinDate'));
            \Session::set('mCheckoutDate', \Input::get('CheckoutDate'));
        }
        $this->data['hotels'] = [];
        

        
        $hotels_query = $pricingfilter
                ->select('hotels.HotelID', 'hotels.HotelName', 'hotels.Slug', 'hotels.HotelTypeID', 'hotel_types.HotelTypeName', 'hotel_types.Color', 'hotel_types.Border', 'hotels.Description', 'hotels.Rating', 'hotels.Image', 'hotels.Thumbnail', 'hotels.SellingPrice')
                ->leftjoin('hotel_types', 'hotels.HotelTypeID', '=', 'hotel_types.HotelTypeID')
                ->where('hotels.Status', 1);
        if ($keyword != "") {
            $keyword = strtolower(trim($keyword));
            $hotels_query->whereRaw('(HotelName LIKE "%' . $keyword . '%" OR Address LIKE "%' . $keyword . '%")');
        }
        // if (\Request::has('c')) {            
        //     $city = \Request::get('c');
        //     //$city = strtolower(\Input::get('Cityname'));
        //     $city = str_replace(' ',' ',$city);
        //     $cityid = DB::table('cities')->select('cities.*')->where('cities.CityName', $city)->get();
        //     $hotels_query->where('hotels.CityID', $cityid[0]->CityID);
        // }
        if (\Request::has('Cityname') || $cityname !=null) {           
            //dd($cityname);
            $city = \Request::get('Cityname') != null ? \Request::get('Cityname') : $cityname ;
            //$city = strtolower(\Input::get('Cityname'));
            $city = str_replace(' ',' ',$city);
            Session::set('city', $city);
           // dd(Session::get('city'));  
            $cityid = DB::table('cities')->select('cities.*')->where('cities.CityName', $city)->get();
            $hotels_query->where('hotels.CityID', $cityid[0]->CityID);
        }

        if (\Request::has('t')) {
            $h_type = \Request::get('t');
            //$city = strtolower(\Input::get('Cityname'));
            $h_type = str_replace(' ',' ',$h_type);
            $hoteltypeid = DB::table('hotel_types')->select('hotel_types.*')->where('hotel_types.HotelTypeName', $h_type)->get();
            $hotels_query->where('hotels.HotelTypeID', $hoteltypeid[0]->HotelTypeID);
        }


        
        if (\Request::has('s')) {
            $sort = \Request::get('s');
            //$city = strtolower(\Input::get('Cityname'));
            $sort = str_replace(' ',' ',$sort);
            
            $hotels_query->orderByRaw("hotels.SellingPrice $sort");
        }
        $hotels = $hotels_query->get();

        





        
//        echo '<pre>'.print_r($hotels, true).'</pre>'; die;
        if (!empty($hotels)) {
            foreach ($hotels as $hotel) {
                $services = DB::table('hotel_type_services')
                        ->select('hotel_type_services.ServiceID', 'ServiceName', 'Icon')
                        ->leftjoin('services', 'services.ServiceID', '=', 'hotel_type_services.ServiceID')
                        ->where('hotel_type_services.HotelTypeID', $hotel->HotelTypeID)
                        ->get();

                $hotelImages = DB::table('hotel_images')
                               ->select('hotel_images.image')
                               ->where('hotel_images.HotelID', $hotel->HotelID)->get();

                $this->data['hotels'][] = [
                    'HotelID' => $hotel->HotelID,
                    'Slug' => $hotel->Slug,
                    'HotelName' => $hotel->HotelName,
                    'Color' => $hotel->Color,
                    'Border' => $hotel->Border,
                    'HotelTypeName' => $hotel->HotelTypeName,
                    'Description' => $hotel->Description,
                    'Rating' => $hotel->Rating,
                    'Image' => $hotel->Image,
                    'Thumbnail' => $hotel->Thumbnail,
                    'SellingPrice' => $hotel->SellingPrice,
                    'Services' => $services,
                    'hotelImages' => $hotelImages
                ];
            }
            // $this->data['min']= $toPrice;
            // $this->data['max']= $fromPrice;
        }
        // if (\Input::get('Cityname') != "") {
        //     $city = strtolower(\Input::get('Cityname'));
        //     $city = str_replace(' ','-',$city);
        //     $url = "hotels-in-$city";
        //     return redirect($url);
        //  } 
         // else {

            //dd($this->data);

            return view('listing', $this->data );
        // }
         
         
         
//        echo '<!--<pre>'.print_r($this->data['hotels'], true).'</pre>-->';
        //return view('listing', $this->data);
    }


    public function get_detail($id)
        {
                  $data= DB::table('hotels')->where('HotelID','=',$id)->first();
                  // $dataPostalCode= SlotsPostalCode::whereNull('slots_postal_code.deleted_at')->where('slot_id','=',$id)->get();
                   $d=['data'=>$data];
                  return json_encode($d);
              
        }



    public function get_hotel_details($Slug) {
        $details = DB::table('hotels')
                ->select('hotels.HotelID', 'hotels.SlugId' ,'hotels.Slug', 'hotels.OriginalHotelName', 'hotels.OwnerName', 'hotels.Address', 'hotels.Address2', 'hotels.HotelName', 'Color', 'Border', 'NoOfGuests', 'AdultCharges', 'NoOfRooms', 'hotels.Description', 'hotels.MetaTitle', 'hotels.MetaDescription', 'hotels.MetaKeywords', 'hotels.Address', 'hotels.HotelTypeID', 'HotelTypeName', 'hotels.Image', 'hotels.Thumbnail', 'hotels.Rating', 'hotels.PartnerPrice', 'hotels.SellingPrice', 'hotels.AutoApprove', 'hotel_room_types.name as room_type_name', 'hotel_room_types.description as room_type_description', 'hotel_room_types.beds_information', 'hotel_room_types.beds_image', 'hotel_room_types.adults_sleep', 'hotel_room_types.children_sleep')
                ->leftjoin('hotel_types', 'hotels.HotelTypeID', '=', 'hotel_types.HotelTypeID')
                ->leftjoin('hotel_room_types', 'hotels.hotel_room_type_id', '=', 'hotel_room_types.id')
                ->where('hotels.Slug', $Slug)
                ->where('hotels.Status', 1)
                ->get();
        return $details;
    }
    public function get_hotel_detailsChild($SlugId) {
        $details = DB::table('hotels')
                ->select('hotels.HotelID', 'hotels.Slug', 'hotels.OriginalHotelName', 'hotels.OwnerName', 'hotels.Address', 'hotels.Address2', 'hotels.HotelName', 'Color', 'Border', 'NoOfGuests', 'AdultCharges', 'NoOfRooms', 'hotels.Description', 'hotels.MetaTitle', 'hotels.MetaDescription', 'hotels.MetaKeywords', 'hotels.Address', 'hotels.HotelTypeID', 'HotelTypeName', 'hotels.Image', 'hotels.Thumbnail', 'hotels.Rating', 'hotels.PartnerPrice', 'hotels.SellingPrice', 'hotels.AutoApprove', 'hotel_room_types.name as room_type_name', 'hotel_room_types.description as room_type_description', 'hotel_room_types.beds_information', 'hotel_room_types.beds_image', 'hotel_room_types.adults_sleep', 'hotel_room_types.children_sleep')
                ->leftjoin('hotel_types', 'hotels.HotelTypeID', '=', 'hotel_types.HotelTypeID')
                ->leftjoin('hotel_room_types', 'hotels.hotel_room_type_id', '=', 'hotel_room_types.id')
                ->where('hotels.SlugId', $SlugId)
                ->where('hotels.Status', 1)
                ->get();
        return $details;
    }

    public function room_details($Slug) {

//        \Session::forget('PromoApplied');
//        \Session::forget('PromoCode');
//        \Session::forget('PromoDiscount');
//        \Session::forget('RoomsCart');
        $this->data['details'] = $this->get_hotel_details($Slug);
        
        $this->data['detailsChild'] ="";
        if($this->data['details'][0]->SlugId == null)
        $this->data['detailsChild'] =$this->data['details'];
        else
        $this->data['detailsChild'] = $this->get_hotel_detailsChild($this->data['details'][0]->SlugId);
        
        //dd($this->data['detailsChild']);
       
        //dd($this->data['details']);
       // \Session::forget('SelectedRoom');


        $this->data['mCheckIn'] = "";
        $this->data['mCheckOut'] = "";
        $this->data['mAdults'] = "";
        $this->data['mChildren'] = 0;
        $this->data['mRooms'] = "";

        if ((\Session::has('mCheckinDate') && \Session::get('mCheckinDate') != "") && (\Session::has('mCheckoutDate') && \Session::get('mCheckoutDate') != "")) {
            $this->data['mCheckIn'] = \Session::get('mCheckinDate');
            $this->data['mCheckOut'] = \Session::get('mCheckoutDate');
        }      
//echo  '<pre>'.print_r(\Session::get('RoomsCart'), true).'</pre>'; die;
        if (\Session::has('RoomsCart') && !empty(\Session::get('RoomsCart'))) {
          //  dd('test');
            foreach (\Session::get('RoomsCart') as $s) {
                if ($s['HotelID'] == $this->data['details'][0]->HotelID) {
                    $this->data['mCheckIn'] = $s['CheckIn'];
                    $this->data['mCheckOut'] = $s['CheckOut'];
                    $this->data['mAdults'] = $s['Adults'];
                    $this->data['mChildren'] = $s['Children'];
                    $this->data['mRooms'] = $s['Rooms'];
                }
            }
        }

        if (!empty($this->data['details'])) {

            
            $cki = strtotime(Session::get('fromDate'));
            // dd( Session::get('fromDate'));
            // $ckidate = date_create($cki[2] . "-" . $cki[1] . "-" . $cki[0]);
            // $HotelCheckInDate = date_format($ckidate, "Y-m-d");

            $cko = strtotime(Session::get('toDate'));
            // $ckodate = date_create($cko[2] . "-" . $cko[1] . "-" . $cko[0]);
            // $HotelCheckOutDate = date_format($ckodate, "Y-m-d");
            
            // dd($cko, $cki);
            $diff = $cko - $cki;
            // dd(abs($diff / (60 * 60 * 24)));
            // $diff = date_diff($cko, $cki);
            // $myDiff = $diff->format("%R%a");

            $this->data['nights'] = abs($diff / (60 * 60 * 24));
            // dd($this->data);

           

            $this->data['Services'] = DB::table('hotel_type_services')
                    ->select('hotel_type_services.ServiceID', 'ServiceName', 'Icon')
                    ->leftjoin('services', 'services.ServiceID', '=', 'hotel_type_services.ServiceID')
                    ->where('hotel_type_services.HotelTypeID', $this->data['details'][0]->HotelTypeID)
                    ->get();
                
            $this->data['Images'] = DB::table('hotel_images')->where('HotelID', $this->data['details'][0]->HotelID)->get();
           
           
           
           
            $this->data['hotel'] = DB::table('hotels')->where('HotelID', $this->data['details'][0]->HotelID)->get();
            $currentDate = date("Y-m-d");
            
            $booked_rooms = DB::table('booking_hotels')
                        ->select(DB::raw('COALESCE(SUM(RoomQty), 0) as RoomQty'))
                        ->leftjoin('bookings', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                        ->where('booking_hotels.HotelID', $this->data['details'][0]->HotelID)
                        ->where('bookings.Status', 1)
                        ->whereRAW("((DATE(CheckInDate) >= '" . $currentDate . "' AND DATE(CheckOutDate) <= '" . $currentDate . "') OR (DATE(CheckInDate) <= '" . $currentDate . "' AND DATE(CheckOutDate) >= '" . $currentDate . "'))")
                        ->first();
            $this->data['BookedRoom'] = 0;
           
            $this->data['hotels'] = DB::table('hotels')
                ->select('HotelID', 'Slug', 'HotelName', 'Color', 'Border', 'hotels.HotelTypeID', 'HotelTypeName', 'hotels.Description', 'Rating', 'hotels.Image', 'hotels.Thumbnail', 'hotels.SellingPrice')
                ->leftjoin('hotel_types', 'hotels.HotelTypeID', '=', 'hotel_types.HotelTypeID')
                ->where('hotels.Status', 1)
                ->limit(3)
                ->inRandomOrder()
                ->get();
            if (!empty($booked_rooms)) {
                $this->data['BookedRoom'] = $booked_rooms->RoomQty;
            }

            // $this->data['hotel_room_type'] = DB::table('hotel_room_type')->where();
            // dd($this->data);
            return view('room-details', $this->data);
        } else {
            return redirect('/');
        }
    }




    public function add_to_cart($Slug) {
         //dd(\Input::all());
         
        //        echo '<pre>'.print_r(\Input::all(), true).'</pre>'; die;
        $details = $this->get_hotel_details($Slug);

        

        if (!empty($details)) {

            $merror = false;
            if (trim(\Input::get('CheckIn')) == "") {
                $merror = true;
            } else if (trim(\Input::get('CheckOut')) == "") {
                $merror = true;
            }

            if (!$merror) {
                $valid["CheckIn"] = 'date_format:d/m/Y';
                $valid["CheckOut"] = 'date_format:d/m/Y';
                $valid["Adults"] = 'required|integer|min:1';
                $valid["Children"] = 'required|integer|min:0';
                $valid["Rooms"] = 'required|integer|min:1';

                $valid_name["CheckIn"] = 'Check In';
                $valid_name["CheckOut"] = 'Check Out';
                $valid_name["Adults"] = 'Adults';
                $valid_name["Children"] = 'Children';
                $valid_name["Rooms"] = 'Rooms';
            }

             else {
                echo json_encode(['error' => true, 'message' => "Please select checkin &amp; checkout date."]);
                die;
            }

            $messages['required'] = 'Please enter :attribute.';
            $messages['CheckIn.required'] = 'Please select checkin date.';
            $messages['CheckOut.required'] = 'Please select checkout date.';
            $messages['min'] = 'Please select :attribute.';



            $v = \Validator::make(\Input::all(), $valid, $messages);
            $v->setAttributeNames($valid_name);

            if ($v->fails()) {
                $errorMsg = "";
                foreach ($v->errors()->messages() as $err) {
                   $err[0]=str_replace("an integer","a no",$err[0]);
                    $errorMsg .= ($errorMsg == "" ? $err[0] : "<br>" . $err[0]);
                }
                echo json_encode(['error' => true, 'message' => $errorMsg]);
                //d($errorMsg);
//                return redirect()->back()->withErrors($v->errors())->withInput();
            } else {
                $Adults = (int) \Input::get('Adults');
                $Children = (int) \Input::get('Children');
                $TotalRooms = \Input::get('Rooms');
                // dd('in');
//                $TotalGuests = ($Children > $TotalRooms ? $Adults + $Children : $Adults);
               
                
                $TotalGuests = $Adults + $Children;
                $TotalMaxGuests = $TotalRooms * $details[0]->NoOfGuests;
                $TotalExtraGuests = 0;
                $TotalExtraCharges = 0;
                if ($Adults > $TotalRooms) {
                    $TotalExtraGuests += $Adults - $TotalRooms;
                }
                if ($Children > $TotalRooms) {
                    $TotalExtraGuests += $Children - $TotalRooms;
                }

                $TotalExtraCharges = $TotalExtraGuests * $details[0]->AdultCharges;

                $cki = explode("/", \Input::get('CheckIn'));
                $ckidate = date_create($cki[2] . "-" . $cki[1] . "-" . $cki[0]);
                $HotelCheckInDate = date_format($ckidate, "Y-m-d");

                $cko = explode("/", \Input::get('CheckOut'));
                $ckodate = date_create($cko[2] . "-" . $cko[1] . "-" . $cko[0]);
                $HotelCheckOutDate = date_format($ckodate, "Y-m-d");

                $diff = date_diff($ckidate, $ckodate);
                $myDiff = $diff->format("%R%a");
                if ($myDiff > 0) {
                    $myDiff = (int) $myDiff;
                } else {
                    echo json_encode(['error' => true, 'message' => "Checkin date must be less than checkout date"]);
//                    return redirect()->back()->withInput()->with('error', 'Checkin date must be less than checkout date');
                }

                $booked_rooms = DB::table('booking_hotels')
                        ->select(DB::raw('COALESCE(SUM(RoomQty), 0) as RoomQty'))
                        ->leftjoin('bookings', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                        ->where('booking_hotels.HotelID', $details[0]->HotelID)
                        ->where('bookings.Status', 1)
                        ->whereRAW("((DATE(CheckInDate) >= '" . $HotelCheckInDate . "' AND DATE(CheckOutDate) <= '" . $HotelCheckOutDate . "') OR (DATE(CheckInDate) <= '" . $HotelCheckOutDate . "' AND DATE(CheckOutDate) >= '" . $HotelCheckInDate . "'))")
                        ->first();
                
                $BookedRoom = 0;
                if(!empty($booked_rooms)) {
                    $BookedRoom = $booked_rooms->RoomQty;
                }
//                echo $BookedRoom; die;

                if ($TotalGuests > $TotalMaxGuests) {
                    echo json_encode(['error' => true, 'message' => 'Maximum ' . $details[0]->NoOfGuests . ' persons are allowed in each room']);
//                    return redirect()->back()->withInput()->with('error', 'Maximum ' . $details->NoOfGuests . ' persons are allowed in each room');
                } else if ($TotalRooms > $details[0]->NoOfRooms) {
                    echo json_encode(['error' => true, 'message' => 'There is no sufficient rooms in this guest house. Please select another guest house. Thanks']);
                } else if ($TotalRooms > ($details[0]->NoOfRooms - $BookedRoom)) {
                    echo json_encode(['error' => true, 'message' => 'There is no sufficient rooms in this guest house. Please select another guest house. Thanks']);
                } else {
                    // add to cart goes here
                    $session = [];
                    $session[] = [
                        'HotelID' => $details[0]->HotelID,
                        'Slug' => $details[0]->Slug,
                        'AutoApprove' => $details[0]->AutoApprove,
                        'HotelName' => $details[0]->HotelName,
                        'OriginalHotelName' => $details[0]->OriginalHotelName,
                        'OwnerName' => $details[0]->OwnerName,
                        'Address' => $details[0]->Address,
                        'Address2' => $details[0]->Address2,
                        'HotelImage' => $details[0]->Image,
                        'Thumbnail' => $details[0]->Thumbnail,
                        'HotelClass' => $details[0]->HotelTypeName,
                        'CheckIn' => \Input::get('CheckIn'),
                        'CheckOut' => \Input::get('CheckOut'),
                        'HotelCheckInDate' => $HotelCheckInDate,
                        'HotelCheckOutDate' => $HotelCheckOutDate,
                        'TotalNights' => $myDiff,
                        'Adults' => \Input::get('Adults'),
                        'Children' => \Input::get('Children'),
                        'Rooms' => \Input::get('Rooms'),
                        'PartnerPrice' => $details[0]->PartnerPrice,
                        'SellingPrice' => $details[0]->SellingPrice,
                        'AdultCharges' => $details[0]->AdultCharges,
                        'Total' => ($myDiff * (($details[0]->SellingPrice * \Input::get('Rooms')) + $TotalExtraCharges))
                    ];
//                    if (\Session::has('RoomsCart') && count(\Session::get('RoomsCart') > 0)) {
//                        foreach (\Session::get('RoomsCart') as $s) {
//                            if ($s['HotelID'] != $HotelID) {
//                                $session[] = [
//                                    'HotelID' => $s['HotelID'],
//                                    'AutoApprove' => $s['AutoApprove'],
//                                    'HotelName' => $s['HotelName'],
//                                    'HotelImage' => $s['HotelImage'],
//                                    'HotelClass' => $s['HotelClass'],
//                                    'CheckIn' => $s['CheckIn'],
//                                    'CheckOut' => $s['CheckOut'],
//                                    'HotelCheckInDate' => $s['HotelCheckInDate'],
//                                    'HotelCheckOutDate' => $s['HotelCheckOutDate'],
//                                    'Adults' => $s['Adults'],
//                                    'Children' => $s['Children'],
//                                    'Rooms' => $s['Rooms'],
//                                    'SellingPrice' => $s['SellingPrice'],
//                                    'AdultCharges' => $s['AdultCharges'],
//                                    'Total' => $s['Total']
//                                ];
//                            }
//                        }
//                    }
                    \Session::forget('RoomsCart');
                    \Session::set('RoomsCart', $session);
                    echo json_encode(['error' => false, 'message' => "Added in cart",'data'=>$session]);
//                    return redirect('cart');
                }
            }
        } else {
            echo json_encode(['error' => true, 'message' => "Invalid Response"]);
//            return redirect('/');
        }
    }


    public function apply_promo() {
        if (\Input::has('PromoCode') && \Input::get('PromoCode') != "") {
            $Promo = DB::table('promo_codes')
                            ->select('PromoCode', 'Discount')
                            ->where('Status', 1)
                            ->where('PromoCode', \Input::get('PromoCode'))
                            ->whereRaw('(DATE_FORMAT(NOW(), "%Y-%m-%d") BETWEEN StartDate AND EndDate)')->first();
            if (empty($Promo)) {
                echo json_encode(['error' => true, 'message' => "Invalid code"]);
            } else {
                \Session::set('PromoApplied', true);
                \Session::set('PromoCode', $Promo->PromoCode);
                \Session::set('PromoDiscount', $Promo->Discount);
                echo json_encode(['error' => false, 'message' => $Promo->Discount . '% Discount applied']);
            }
        } else {
            echo json_encode(['error' => true, 'message' => "Please enter code"]);
        }
    }
    
    public function hotelsinpakistan() {
        // $adults = \Request::get('adults');
        // dd($adults);
        // $rooms = \Request::get('rooms');
        // $children = \Request::get('children');




        $url = $_SERVER['REQUEST_URI'];
        $array = explode("-", $url);
        $cityname = '';
        if(isset($array[2],$array[3]) == 'nathiagali') {
            $cityname = "Nathia Gali"; 
        }
        else if(isset($array[2],$array[3]) == 'kalashvalley') {
            $cityname = "Kalash Valley"; 
        }
        else if(isset($array[2],$array[3]) == 'neelumvalley') {
            $cityname = "Neelum Valley"; 
        }
        else if(isset($array[2],$array[3]) == 'malamjabba') {
            $cityname = "Malam Jabba"; 
        }
        else if(isset($array[2],$array[3]) == 'arangkel') {
            $cityname = "Arang Kel"; 
        }
        else if(isset($array[2],$array[3]) == 'saidusharif') {
            $cityname = "Saidu Sharif"; 
        }
        else if(isset($array[2],$array[3]) == 'gorakhhill') {
            $cityname = "Gorakh Hill"; 
        }
        else if(isset($array[2],$array[3],$array[4]) == 'deraismailkhan') {
            $cityname = "Dera Ismail Khan"; 
        }
        /*else if (isset($array[3])) {
            $cityname = ucfirst($array[2]) . " " . ucfirst($array[3]);
        }
        else if (isset($array[4])) {
            $cityname = ucfirst($array[2]) . " " . ucfirst($array[3]) . " " . ucfirst($array[4]);
        }*/ else {
            $cityname = ucfirst($array[2]);
        }
        //echo $cityname;
        $city_id = DB::table('cities')->where('CityName', $cityname)->where('Status', 1)->first();
        
        if (!empty($city_id)) {
            $keyword = "";
            if (\Request::has('q')) {
                $keyword = \Request::get('q');
            }
            if (\Input::has('CheckinDate') && \Input::get('CheckinDate') != "") {
                $cki = explode("/", \Input::get('CheckinDate'));
                $ckidate = date_create($cki[2] . "-" . $cki[0] . "-" . $cki[1]);
                $CheckInDate = date_format($ckidate, "d/m/Y");
                \Session::set('mCheckinDate', $CheckInDate);
            }
            $this->data['hotels'] = [];
            $hotels_query = DB::table('hotels')
                    ->select('HotelID', 'HotelName', 'Slug', 'hotels.HotelTypeID', 'HotelTypeName', 'Color', 'Border', 'hotels.Description', 'Rating', 'hotels.Image', 'hotels.Thumbnail', 'hotels.SellingPrice')
                    ->leftjoin('hotel_types', 'hotels.HotelTypeID', '=', 'hotel_types.HotelTypeID')
                    ->where('hotels.Status', 1)
                    ->where('hotels.CityID', $city_id->CityID);
            if ($keyword != "") {
                $keyword = strtolower(trim($keyword));
                $hotels_query->whereRaw('(HotelName LIKE "%' . $keyword . '%" OR Address LIKE "%' . $keyword . '%")');
            }
            $hotels = $hotels_query->get();
            //echo '<pre>'.print_r($hotels, true).'</pre>'; die;
            if (!empty($hotels)) {
                foreach ($hotels as $hotel) {
                    $services = DB::table('hotel_type_services')
                            ->select('hotel_type_services.ServiceID', 'ServiceName', 'Icon')
                            ->leftjoin('services', 'services.ServiceID', '=', 'hotel_type_services.ServiceID')
                            ->where('hotel_type_services.HotelTypeID', $hotel->HotelTypeID)
                            ->get();
                    $this->data['hotels'][] = [
                        'HotelID' => $hotel->HotelID,
                        'Slug' => $hotel->Slug,
                        'HotelName' => $hotel->HotelName,
                        'Color' => $hotel->Color,
                        'Border' => $hotel->Border,
                        'HotelTypeName' => $hotel->HotelTypeName,
                        'Description' => $hotel->Description,
                        'Rating' => $hotel->Rating,
                        'Image' => $hotel->Image,
                        'Thumbnail' => $hotel->Thumbnail,
                        'SellingPrice' => $hotel->SellingPrice,
                        'Services' => $services
                    ];
                }
            }
        }
        return view('hotelsinpakistan.' . $url, $this->data);
    }

}
