<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebController;
use DB;

class Experiences extends WebController {

    function __construct() {
        parent::__construct();
        $this->data['services'] = DB::table('services')->where('Status', 1)->get();
        $this->data['hotel_types'] = DB::table('hotel_types')->where('Status', 1)->get();
        $this->data['cities'] = DB::table('cities')->where('Status', 1)->get();
        $this->data['max_rating'] = \Config::get('rating');
    }

    public function index() {
//        echo $_SERVER['DOCUMENT_ROOT']; die;
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
        $this->data['experiences'] = [];
        $experiences_query = DB::table('experiences')
                ->select('ExperiencesID', 'ExperiencesName', 'Slug', 'experiences.Description', 'Rating', 'experiences.Image', 'experiences.Thumbnail', 'experiences.SellingPrice')
                ->where('experiences.Status', 1);
        if ($keyword != "") {
            $keyword = strtolower(trim($keyword));
            $experiences_query->where('(ExperiencesName LIKE "%' . $keyword . '%" OR Address LIKE "%' . $keyword . '%")');
        }
        if (\Request::has('c')) {
            $city = \Request::get('c');
            //$city = strtolower(\Input::get('Cityname'));
            $city = str_replace(' ',' ',$city);
            $cityid = DB::table('cities')->select('cities.*')->where('cities.CityName', $city)->get();
            $experiences_query->where('experiences.CityID', $cityid[0]->CityID);
        }
        $experiences = $experiences_query->get();
//        echo '<pre>'.print_r($hotels, true).'</pre>'; die;
        if (!empty($experiences)) {
            foreach ($experiences as $experience) {
                /*$services = DB::table('hotel_type_services')
                        ->select('hotel_type_services.ServiceID', 'ServiceName', 'Icon')
                        ->leftjoin('services', 'services.ServiceID', '=', 'hotel_type_services.ServiceID')
                        ->where('hotel_type_services.HotelTypeID', $hotel->HotelTypeID)
                        ->get();*/
                $this->data['experiences'][] = [
                    'ExperiencesID' => $experience->ExperiencesID,
                    'Slug' => $experience->Slug,
                    'ExperiencesName' => $experience->ExperiencesName,
                    'Description' => $experience->Description,
                    'Rating' => $experience->Rating,
                    'Image' => $experience->Image,
                    'Thumbnail' => $experience->Thumbnail,
                    'SellingPrice' => $experience->SellingPrice
                    //'Services' => $services
                ];
            }
        }
        
        /*if (\Input::get('Cityname') != "") {
            $city = strtolower(\Input::get('Cityname'));
            $city = str_replace(' ','-',$city);
            $url = "hotels-in-$city";
            return redirect($url);
        } else {*/
            return view('experiences-listing', $this->data);
        //}
        
//        echo '<!--<pre>'.print_r($this->data['hotels'], true).'</pre>-->';
        
        //return redirect()->route('hotels-in-karachi',$this->data);
    }

    public function get_experience_details($Slug) {
        $details = DB::table('experiences')
                ->select('experiences.ExperiencesID', 'experiences.Slug', 'experiences.OriginalExperiencesName', 'experiences.OwnerName', 'experiences.Address', 'experiences.Address2', 'experiences.ExperiencesName', 'experiences.NoOfGuests', 'experiences.AdultCharges', 'experiences.NoOfRooms', 'experiences.Description', 'experiences.ActiveDates', 'experiences.MetaTitle', 'experiences.MetaDescription', 'experiences.MetaKeywords', 'experiences.Address', 'experiences.Image', 'experiences.Thumbnail', 'experiences.Rating', 'experiences.PartnerPrice', 'experiences.SellingPrice', 'experiences.AutoApprove', 'experiences.HostImage', 'experiences.HostDescription')
                //->leftjoin('hotel_types', 'hotels.HotelTypeID', '=', 'hotel_types.HotelTypeID')
                ->where('experiences.Slug', $Slug)
                ->where('experiences.Status', 1)
                ->first();
        return $details;
    }

    public function experience_details($Slug) {
//        \Session::forget('PromoApplied');
//        \Session::forget('PromoCode');
//        \Session::forget('PromoDiscount');
//        \Session::forget('RoomsCart');
        $this->data['details'] = $this->get_experience_details($Slug);
        $this->data['mCheckIn'] = "";
        $this->data['mCheckOut'] = "";
        $this->data['mAdults'] = 1;
        $this->data['mChildren'] = 0;
        $this->data['mRooms'] = 1;

        if (\Session::has('mCheckinDate') && \Session::get('mCheckinDate') != "") {
            $this->data['mCheckIn'] = \Session::get('mCheckinDate');
        }
//echo  '<pre>'.print_r(\Session::get('ExperiencesCart'), true).'</pre>'; die;
        if (\Session::has('ExperiencesCart') && !empty(\Session::get('ExperiencesCart'))) {
            
            foreach (\Session::get('ExperiencesCart') as $s) {
                if ($s['ExperiencesID'] == $this->data['details']->ExperiencesID) {
                    $this->data['mCheckIn'] = $s['CheckIn'];
                    $this->data['mCheckOut'] = $s['CheckOut'];
                    $this->data['mAdults'] = $s['Adults'];
                    $this->data['mChildren'] = $s['Children'];
                    $this->data['mRooms'] = $s['Rooms'];
                }
            }
        }

        if (!empty($this->data['details'])) {
            $this->data['Options'] = DB::table('experiences_options')
                    ->select('experiences_options.Title', 'experiences_options.Options')
                    ->where('experiences_options.ExperiencesID', $this->data['details']->ExperiencesID)
                    ->get();
            $this->data['Images'] = DB::table('experiences_images')->where('ExperiencesID', $this->data['details']->ExperiencesID)->get();
            $avaiableDates = DB::table('experiences')->where('ExperiencesID', $this->data['details']->ExperiencesID)->get();
            $datesArray = array();
            $avaiableDates = explode(',',$avaiableDates[0]->ActiveDates);
            foreach($avaiableDates as $avaiableDate){
                $datesArray[] = "{date: $avaiableDate}";
            }
            $this->data['dateArray'] = implode(",",$datesArray);
            return view('experience-details', $this->data);
        } else {
            return redirect('/');
        }
    }

    public function add_to_cart($Slug) {
//        echo '<pre>'.print_r(\Input::all(), true).'</pre>'; die;
        
        $details = $this->get_experience_details($Slug);
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
                //$valid["Children"] = 'required|integer|min:0';
                $valid["Rooms"] = 'required|integer|min:1';

                $valid_name["CheckIn"] = 'Check In';
                $valid_name["CheckOut"] = 'Check Out';
                $valid_name["Adults"] = 'Adults';
                //$valid_name["Children"] = 'Children';
                $valid_name["Rooms"] = 'Rooms';
            } else {
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
                    $errorMsg .= ($errorMsg == "" ? $err[0] : "<br>" . $err[0]);
                }
                echo json_encode(['error' => true, 'message' => $errorMsg]);
//                return redirect()->back()->withErrors($v->errors())->withInput();
            } else {
                $Adults = (int) \Input::get('Adults');
                $Children = (int) \Input::get('Children');
                $TotalRooms = \Input::get('Rooms');

//                $TotalGuests = ($Children > $TotalRooms ? $Adults + $Children : $Adults);
                $TotalGuests = $Adults + $Children;
                $TotalMaxGuests = $TotalRooms * $details->NoOfGuests;
                $TotalExtraGuests = 0;
                $TotalExtraCharges = 0;
                if ($Adults > $TotalRooms) {
                    $TotalExtraGuests += $Adults - $TotalRooms;
                }
                if ($Children > $TotalRooms) {
                    $TotalExtraGuests += $Children - $TotalRooms;
                }

                $TotalExtraCharges = $TotalExtraGuests * $details->AdultCharges;

                $cki = explode("/", \Input::get('CheckIn'));
                $ckidate = date_create($cki[2] . "-" . $cki[1] . "-" . $cki[0]);
                $ExperiencesCheckInDate = date_format($ckidate, "Y-m-d");

                $cko = explode("/", \Input::get('CheckOut'));
                $ckodate = date_create($cko[2] . "-" . $cko[1] . "-" . $cko[0]);
                $ExperiencesCheckOutDate = date_format($ckodate, "Y-m-d");

                $diff = date_diff($ckidate, $ckodate);
                $myDiff = $diff->format("%R%a");
                if ($myDiff > 0) {
                    $myDiff = (int) $myDiff;
                } else {
                    echo json_encode(['error' => true, 'message' => "Checkin date must be less than checkout date"]);
//                    return redirect()->back()->withInput()->with('error', 'Checkin date must be less than checkout date');
                }

                $booked_rooms = DB::table('experiences_booking_tours')
                        ->select(DB::raw('COALESCE(SUM(Adults), 0) as Adults'))
                        ->leftjoin('experiences_booking', 'experiences_booking.ExperiencesBookingID', '=', 'experiences_booking_tours.ExperiencesBookingID')
                        ->where('experiences_booking_tours.ExperiencesID', $details->ExperiencesID)
                        ->where('experiences_booking.Status', 1)
                        ->whereRAW("((DATE(CheckInDate) >= '" . $ExperiencesCheckInDate . "' AND DATE(CheckOutDate) <= '" . $ExperiencesCheckOutDate . "') OR (DATE(CheckInDate) <= '" . $ExperiencesCheckOutDate . "' AND DATE(CheckOutDate) >= '" . $ExperiencesCheckInDate . "'))")
                        ->first();

                $BookedRoom = 0;
                if (!empty($booked_rooms)) {
                    $BookedRoom = $booked_rooms->Adults;
                }
//                echo $BookedRoom; die;

                if ($TotalGuests > $TotalMaxGuests) {
                    echo json_encode(['error' => true, 'message' => 'Maximum ' . $details->NoOfGuests . ' persons are allowed in each room']);
//                    return redirect()->back()->withInput()->with('error', 'Maximum ' . $details->NoOfGuests . ' persons are allowed in each room');
                } else if ($TotalRooms > $details->NoOfGuests) {
                    echo json_encode(['error' => true, 'message' => 'There is no sufficient guests in this experience. Please select another experiences. Thanks']);
                } else if ($TotalRooms > ($details->NoOfGuests - $BookedRoom)) {
                    echo json_encode(['error' => true, 'message' => 'There is no sufficient guests in this experience. Please select another experiences. Thanks']);
                } else {
                    // add to cart goes here
                    $session = [];
                    $session[] = [
                        'ExperiencesID' => $details->ExperiencesID,
                        'Slug' => $details->Slug,
                        'AutoApprove' => $details->AutoApprove,
                        'ExperiencesName' => $details->ExperiencesName,
                        'OriginalExperiencesName' => $details->OriginalExperiencesName,
                        'OwnerName' => $details->OwnerName,
                        'Address' => $details->Address,
                        'Address2' => $details->Address2,
                        'ExperiencesImage' => $details->Image,
                        'Thumbnail' => $details->Thumbnail,
                        //'HotelClass' => $details->HotelTypeName,
                        'CheckIn' => \Input::get('CheckIn'),
                        'CheckOut' => \Input::get('CheckOut'),
                        'ExperiencesCheckInDate' => $ExperiencesCheckInDate,
                        'ExperiencesCheckOutDate' => $ExperiencesCheckOutDate,
                        'TotalNights' => $myDiff,
                        'Adults' => \Input::get('Adults'),
                        'Children' => \Input::get('Children'),
                        'Rooms' => \Input::get('Rooms'),
                        'PartnerPrice' => $details->PartnerPrice,
                        'SellingPrice' => $details->SellingPrice,
                        'AdultCharges' => $details->AdultCharges,
                        'Total' => ($myDiff * (($details->SellingPrice * \Input::get('Rooms')) + $TotalExtraCharges))
                    ];
                    
                    \Session::forget('ExperiencesCart');
                    \Session::set('ExperiencesCart', $session);
                    echo json_encode(['error' => false, 'message' => "Added in cart"]);
//                    return redirect('cart');
                }
            }
        } else {
            echo json_encode(['error' => true, 'message' => "Invalid Response"]);
//            return redirect('/');
        }
    }

    public function apply_promo() {
        if (\Input::has('ExperiencesPromoCode') && \Input::get('ExperiencesPromoCode') != "") {
            $Promo = DB::table('experiences_promo_codes')
                            ->select('PromoCode', 'Discount')
                            ->where('Status', 1)
                            ->where('PromoCode', \Input::get('ExperiencesPromoCode'))
                            ->whereRaw('(DATE_FORMAT(NOW(), "%Y-%m-%d") BETWEEN StartDate AND EndDate)')->first();
            if (empty($Promo)) {
                echo json_encode(['error' => true, 'message' => "Invalid code"]);
            } else {
                \Session::set('ExperiencesPromoApplied', true);
                \Session::set('ExperiencesPromoCode', $Promo->PromoCode);
                \Session::set('ExperiencesPromoDiscount', $Promo->Discount);
                echo json_encode(['error' => false, 'message' => $Promo->Discount . '% Discount applied']);
            }
        } else {
            echo json_encode(['error' => true, 'message' => "Please enter code"]);
        }
    }
    
}
