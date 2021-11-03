<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;
date_default_timezone_set('asia/karachi');

class Reservation extends AdminController {

    function __construct() {
        parent::__construct();

        $users = DB::table('partner_request')->where('Status', 1)->lists('FullName', 'PartnerRequestID');
        $this->data['partners'] = ['Select Partner'];
        $this->data['partners'] += $users;

        $hotel_types = DB::table('hotel_types')->where('Status', 1)->lists('HotelTypeName', 'HotelTypeID');
        $this->data['hotel_types'] = ['Select Hotel Type'];
        $this->data['hotel_types'] += $hotel_types;

        $city_names = DB::table('cities')->where('Status', 1)->lists('CityName', 'CityID');
        $this->data['city_name'] = ['Select City Name'];
        $this->data['city_name'] += $city_names;

        $this->data['rating'] = \Config::get('rating');
    }

    public function dha_index() {
        $Q = \DB::table('bookings');
        $this->data['recordsTotal'] = count($Q->get());
        return view('admin.reservation.dha-index', $this->data);
    }

    public function dha_reservation_list() {
        $status = -1;
        
        if (\Request::has('status')) {
            $status = (int) \Request::get('status');
        }

        $start = (isset($_POST["start"]) ? (int) $_POST["start"] : 0);
        $length = (isset($_POST["length"]) ? (int) $_POST["length"] : 25);

        $columns = array("booking_hotels.RoomNumber", "bookings.BookingID", "bookings.FirstName", "booking_hotels.CheckInDate", "booking_hotels.CheckOutDate", "bookings.CheckingStatus", "booking_hotels.Days", "booking_hotels.SellingPrice", "bookings.TotalAmount", "bookings.Status", "bookings.DateAdded", "bookings.DateModified");

        $query = \DB::table('bookings')->select(['booking_hotels.RoomNumber', 'bookings.BookingID', 'bookings.FirstName', 'bookings.LastName', 'booking_hotels.SellingPrice', 'bookings.Discount', 'bookings.PromoDiscount', 'bookings.TotalAmount', 'miscellaneous.BookingID AS MBookingID', 'bookings.TotalAmount', 'bookings.CheckingStatus AS Checking', 'bookings.Discount', 'hotels.SellingPrice AS Actual',
                    DB::raw("CONCAT('<small class=\"label bg-', IF(bookings.Status = 1, 'green', IF(bookings.Status = 2, 'red', IF(bookings.Status = 3, 'blue', 'yellow'))), '\" ><i class=\"fa ', IF(bookings.Status = 1, 'fa-check', IF(bookings.Status = 2, 'fa-times', IF(bookings.Status = 3, 'fa-times', 'fa-clock-o'))), '\"></i> ', IF(bookings.Status = 1, 'Approved', IF(bookings.Status = 2, 'Declined', IF(bookings.Status = 3, 'Cancel', 'Pending'))), '</small>') AS Status"),
                    DB::raw("CONCAT('<small class=\"label bg-', IF(bookings.CheckingStatus = 1, 'green', IF(bookings.CheckingStatus = 0, 'red', IF(bookings.CheckingStatus = 3, 'yellow', 'yellow'))), '\" ><i class=\"fa ', IF(bookings.CheckingStatus = 1, 'fa-check', IF(bookings.CheckingStatus = 2, 'fa-times', IF(bookings.CheckingStatus = 0, 'fa-times', 'fa-clock-o'))), '\"></i> ', IF(bookings.CheckingStatus = 1, 'CheckIn', IF(bookings.CheckingStatus = 2, 'CheckOut', IF(bookings.CheckingStatus = 0, 'Not CheckIn', 'Not CheckIn'))), '</small>') AS CheckingStatus"),
                    DB::raw("CONCAT(IF(bookings.Referal = 0, 'Walk In', IF(bookings.Referal = 1, 'Phone Call', IF(bookings.Referal = 2, 'Website', 'OTA')))) AS Referal"),
                    DB::raw("DATEDIFF(booking_hotels.CheckOutDate, booking_hotels.CheckInDate) as Days"),
                    DB::raw("DATE_FORMAT(booking_hotels.CheckInDate, \"%d-%b-%Y\") as CheckInDate"),
                    DB::raw("DATE_FORMAT(booking_hotels.CheckOutDate, \"%d-%b-%Y\") as CheckOutDate"),
                    DB::raw("DATE_FORMAT(bookings.DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
                    DB::raw("DATE_FORMAT(bookings.DateModified, \"%d-%b-%Y<br>%r\") as DateModified")])
                ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                ->leftjoin('miscellaneous', 'miscellaneous.BookingID', '=', 'booking_hotels.BookingID')
                ->leftjoin('hotels', 'hotels.HotelID', '=', 'booking_hotels.HotelID')
                ->where('booking_hotels.HotelID', '10')
                ->groupby('booking_hotels.BookingID');

        if ($status != -1) {
            $query->where('bookings.CheckingStatus', $status);
        }

        $recordsTotal = count($query->get());

        if (!empty($_POST['search']["value"])) {
            $input = strtolower(trim($_POST['search']["value"]));
            
            //$query->whereRaw("(bookings.BookingID LIKE '%" . $input . "%' OR bookings.FirstName LIKE '%" . $input . "%' OR DATE_FORMAT(booking_hotels.CheckInDate, \"%d/%b/%Y\") LIKE '%" . $input . "%' OR DATE_FORMAT(booking_hotels.CheckOutDate, \"%d/%b/%Y\") LIKE '%" . $input . "%' OR DATE_FORMAT(booking_hotels.CheckInDate, \"%d-%b-%Y\") LIKE '%" . $input . "%' OR DATE_FORMAT(booking_hotels.CheckOutDate, \"%d-%b-%Y\") LIKE '%" . $input . "%')");
            $query->whereRaw("(bookings.BookingID LIKE '%" . $input . "%' OR bookings.FirstName LIKE '%" . $input . "%' OR (DATE(booking_hotels.CheckInDate) >= '" . $input . "' AND DATE(booking_hotels.CheckOutDate) <= '" . $input . "') OR (DATE(booking_hotels.CheckInDate) <= '" . $input . "' AND DATE(booking_hotels.CheckOutDate) >= '" . $input . "'))");
            //$query->whereRaw("((DATE(booking_hotels.CheckInDate) >= '" . $input . "' OR DATE(booking_hotels.CheckOutDate) <= '" . $input . "' OR DATE(booking_hotels.CheckInDate) <= '" . $input . "' OR DATE(booking_hotels.CheckOutDate) >= '" . $input . "'))");
        }

        $query->orderBy($columns[(int) $_POST["order"][0]["column"]], strtoupper($_POST["order"][0]["dir"]));
        $query->orderBy("bookings.BookingID", "DESC");
        //dd($query->tosql());
        // limit acc to start and length
        $recordsFiltered = count($query->get());
        $result = $query->skip($start)->take($length)->get();
        // $maxRow = count($result);

        $data = [];
        foreach ($result as $Rs) {
            $transaction = \DB::table('transational_records')->select(DB::raw('Sum(transational_records.Credit) as Credit, Sum(transational_records.Debit) as Debit, Sum(transational_records.Debit*0.13) as Debittax'))->where('BookingID', $Rs->BookingID)->where('Status', '<>', '1')->get();
            $miscellaneous = \DB::table('miscellaneous')->select(DB::raw('Sum(miscellaneous.Amount) as Amount,miscellaneous.BookingID AS MBookingID'))->where('BookingID', $Rs->BookingID)->get();
            $finalsettlement = DB::table('transational_records')->select(DB::raw('Sum(transational_records.Debit) AS Debit,Sum(transational_records.Credit) AS Credit,transational_records.Status'))->where('BookingID', $Rs->BookingID)->where('Status', '1')->get();
            if ($miscellaneous[0]->MBookingID == NULL) {
                $MisID = '<button type="button" class="btn btn-success btn-sm" onClick="location.href=\'reservation/misc/' . $Rs->BookingID . '\'"><i class="fa fa-edit"></i> Misc ADD</button>';
            } else {
                $MisID = '<button type="button" class="btn btn-success btn-sm" onClick="location.href=\'reservation/misc/edit/' . $Rs->MBookingID . '\'"><i class="fa fa-edit"></i> Misc Edit</button>';
            }
            $pdf = '';
            if ($Rs->Checking == 1 || $Rs->Checking == 2) {
                $pdf = '<button type="button" class="btn btn-success btn-sm" onClick="window.open(\'reservation/booking/' . $Rs->BookingID . '\')"><i class="fa fa-file-pdf-o"></i>Invoice</button>';
            }
            $generateRoom = $transaction[0]->Debit;
            $totalRevenue = $transaction[0]->Debit + $miscellaneous[0]->Amount;
            $salesTax =  (($transaction[0]->Debit + $miscellaneous[0]->Amount)* 13 / 100);
            $refundable = (($transaction[0]->Debit - $transaction[0]->Debittax) + $salesTax + $miscellaneous[0]->Amount) - $transaction[0]->Credit;
            $receivable = (($transaction[0]->Debit - $transaction[0]->Debittax)+ $salesTax + $miscellaneous[0]->Amount) - $transaction[0]->Credit;
            if ($receivable < 0 || isset($finalsettlement[0]->Status) == 1) {
                $receivable = '0';
            }
            if($refundable > 0 || isset($finalsettlement[0]->Status) == 1) {
                $refundable = '0';    
            }
            $data[] = array(
                //"<input type=\"checkbox\" class=\"check\" name=\"ids[]\" value=\"" . $Rs->BookingID . "\" />",
                $Rs->BookingID,
                $Rs->FirstName . " " . $Rs->LastName,
                $Rs->RoomNumber,
                $Rs->CheckInDate,
                $Rs->CheckOutDate,
                $Rs->CheckingStatus,
                $Rs->Days,
                "PKR " . number_format($Rs->SellingPrice, 0),
                $Rs->Referal,
                "PKR " . number_format($Rs->PromoDiscount, 0),
                "PKR ". $Rs->Actual,
                /* "PKR " . number_format($Rs->Discount, 0),
                  "PKR " . number_format($Rs->PromoDiscount, 0), */
                "PKR " . number_format($generateRoom, 0),
                "PKR " . number_format($miscellaneous[0]->Amount, 0),
                "PKR " . number_format($totalRevenue, 0),
                "PKR " . number_format($transaction[0]->Credit, 0),
                "PKR " . number_format($receivable, 0),
                "PKR " . number_format($refundable, 0),
                $Rs->Status,
                $Rs->DateAdded,
                $Rs->DateModified,
                '<button type="button" class="btn btn-success btn-sm" onClick="location.href=\'reservation/' . $Rs->BookingID . '\'"><i class="fa fa-edit"></i> Edit</button>',
                $MisID,
                $pdf,
            );
        }

        echo json_encode(array("draw" => (int) $_POST["draw"], "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, "data" => $data));
        exit(0);
    }

    public function dha_add() {
        $room_number = \DB::table('rooms')->select(DB::raw('rooms.*'))->where('HotelID', 10)->where('Status', 1)->get();

        $allocate_rooms = \DB::table('rooms')->select(DB::raw('rooms.*'))
                        ->leftjoin('booking_hotels', 'booking_hotels.RoomNumber', '=', 'rooms.RoomNumber')
                        ->where('rooms.HotelID', 10)->where('rooms.Status', 1)->whereRaw('CURDATE() between booking_hotels.CheckInDate and booking_hotels.CheckOutDate')->get();
        $rooms = array();
        foreach ($allocate_rooms as $allocate_room) {
            $rooms[] = $allocate_room->RoomNumber;
        }
        $this->data['rooms'] = $rooms;
        $this->data['rooms_number'] = $room_number;
        $this->data['mAdults'] = 1;
        $this->data['mChildren'] = 0;
        $this->data['mRooms'] = 1;
        return view('admin.reservation.dha-add', $this->data);
    }

    public function get_hotel_details($id) {
        $details = DB::table('hotels')
                ->select('hotels.HotelID', 'hotels.Slug', 'hotels.OriginalHotelName', 'hotels.OwnerName', 'hotels.Address', 'hotels.Address2', 'hotels.HotelName', 'Color', 'Border', 'NoOfGuests', 'AdultCharges', 'NoOfRooms', 'hotels.Description', 'hotels.MetaTitle', 'hotels.MetaDescription', 'hotels.MetaKeywords', 'hotels.Address', 'hotels.HotelTypeID', 'HotelTypeName', 'hotels.Image', 'hotels.Thumbnail', 'hotels.Rating', 'hotels.PartnerPrice', 'hotels.SellingPrice', 'hotels.AutoApprove')
                ->leftjoin('hotel_types', 'hotels.HotelTypeID', '=', 'hotel_types.HotelTypeID')
                ->where('hotels.HotelID', $id)
                ->where('hotels.Status', 1)
                ->first();
        return $details;
    }

    public function dha_save() {
        $details = $this->get_hotel_details(10);
        $messages['required'] = 'Please enter :attribute.';
        $messages['min'] = 'Please select :attribute.';
        $error = false;
        $msg = "";

        $valid["FirstName"] = 'required|max:255';
        $valid["LastName"] = 'required|max:50';
        $valid["Referal"] = 'required|numeric';
        $valid["FullAddress"] = 'required|max:255';
        $valid["Identity"] = 'required';
        $valid["CheckInDate"] = 'required|date|date_format:Y-m-d';
        $valid["CheckOutDate"] = 'required|date|date_format:Y-m-d';
        $valid["SellingPrice"] = 'required|numeric';
        $valid["NoOfAdults"] = 'required|integer|min:1';
        $valid["RoomQty"] = 'required|integer|min:1';
        //$valid["RoomNumber"] = 'required|numeric';
        $valid["PaymentStatus"] = 'required';
        $valid["CheckingStatus"] = 'required';

        $valid_name["FirstName"] = 'First Name';
        $valid_name["LastName"] = 'Last Name';
        $valid_name["Referal"] = 'Referal ';
        $valid_name["FullAddress"] = 'Address';
        $valid_name["Identity"] = 'Identity';
        $valid_name["CheckInDate"] = 'Check In Date';
        $valid_name["CheckOutDate"] = 'Check Out Date';
        $valid_name["SellingPrice"] = 'Booking Price';
        $valid_name["NoOfAdults"] = 'No. of Adults';
        $valid_name["RoomQty"] = 'Qty of Rooms';
        //$valid_name["RoomNumber"] = 'Room Number';
        $valid_name["PaymentStatus"] = 'Payment Status';
        $valid_name["CheckingStatus"] = 'Guest Hotel Status';

        if (\Input::get('PaymentStatus') == 1) {
            $valid["AdvanceAmount"] = 'required';
            $valid_name["AdvanceAmount"] = 'Advance Amount';
        }

        $v = Validator::make(\Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);

        if ($v->fails() || $error) {
            if ($error) {
                return redirect()->back()->withErrors($v->errors())->withInput()->with('warning_msg', $msg);
            } else {
                return redirect()->back()->withErrors($v->errors())->withInput();
            }
        } else {

            $Adults = (int) \Input::get('NoOfAdults');
            $Children = (int) \Input::get('NoOfChildren');
            $TotalRooms = \Input::get('RoomQty');
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

            $cki = explode("-", \Input::get('CheckInDate'));
            $ckidate = date_create($cki[2] . "-" . $cki[1] . "-" . $cki[0]);
            //$HotelCheckInDate = date_format($ckidate, "Y-m-d");

            $cko = explode("-", \Input::get('CheckOutDate'));
            $ckodate = date_create($cko[2] . "-" . $cko[1] . "-" . $cko[0]);
            //$HotelCheckOutDate = date_format($ckodate, "Y-m-d");

            $diff = date_diff($ckidate, $ckodate);
            $myDiff = $diff->format("%R%a");
            if ($myDiff > 0) {
                $myDiff = (int) $myDiff;
            } else {
                echo json_encode(['error' => true, 'message' => "Checkin date must be less than checkout date"]);
//                    return redirect()->back()->withInput()->with('error', 'Checkin date must be less than checkout date');
            }
            if (\Session::get('AdminID') == 3) {
                $Admin = 118;
            } elseif (\Session::get('AdminID') == 6) {
                $Admin = 50;
            } elseif (\Session::get('AdminID') == 1) {
                $Admin = 50;
            }
            $Email = \Input::get('Email');
            $SellingPrice = \Input::get('SellingPrice');
            if (\Input::get('CheckingStatus') == 1) {
                $currentDate = date('Y-m-d');
                $checkInDate = \Input::get('CheckInDate');

                if ($currentDate == $checkInDate) {
                    $booking_data = [
                        'UserID' => $Admin,
                        'FirstName' => \Input::get('FirstName'),
                        'LastName' => \Input::get('LastName'),
                        'CompanyName' => \Input::get('CompanyName'),
                        'Email' => $Email,
                        'Cell' => \Input::get('Cell'),
                        'Identity' => \Input::get('Identity'),
                        'Referal' => \Input::get('Referal'),
                        'FullAddress' => \Input::get('FullAddress'),
                        'Description' => \Input::get('Description'),
                        'BookingTotal' => ($myDiff * (($SellingPrice * \Input::get('RoomQty')) + $TotalExtraCharges)),
                        'Discount' => \Input::get('Discount'),
                        'PromoDiscount' => 0,
                        'TotalAmount' => ($myDiff * (($SellingPrice * \Input::get('RoomQty')) + $TotalExtraCharges)),
                        'PaymentStatus' => \Input::get('PaymentStatus'),
                        'Status' => \Input::get('Status'),
                        'CheckingStatus' => \Input::get('CheckingStatus'),
                        'DateAdded' => new \DateTime
                    ];

                    DB::table('bookings')->insert($booking_data);

                    $BookingID = \DB::getPdo()->lastInsertId();

                    $booking_hotel_data = [
                        'BookingID' => $BookingID,
                        'CheckInDate' => \Input::get('CheckInDate'),
                        'CheckOutDate' => \Input::get('CheckOutDate'),
                        'HotelID' => $details->HotelID,
                        'RoomNumber' => \Input::get('RoomNumber'),
                        'HotelName' => $details->HotelName,
                        'OriginalHotelName' => $details->OriginalHotelName,
                        'OwnerName' => $details->OwnerName,
                        'Image' => $details->Image,
                        'HotelClass' => $details->HotelTypeName,
                        'RoomQty' => \Input::get('RoomQty'),
                        'Adults' => \Input::get('NoOfAdults'),
                        'Children' => \Input::get('NoOfChildren'),
                        'Discount' => \Input::get('Discount'),
                        'PartnerPrice' => $details->PartnerPrice,
                        'SellingPrice' => $SellingPrice,
                        'AdultPrice' => $details->AdultCharges,
                        'Total' => ($myDiff * (($SellingPrice * \Input::get('RoomQty')) + $TotalExtraCharges))
                    ];

                    DB::table('booking_hotels')->insert($booking_hotel_data);

                    if (\Input::get('PaymentStatus') == 1) {
                        $transational_reords = [
                            'BookingID' => $BookingID,
                            'TransactionDate' => new \DateTime,
                            'TransactionDescription' => "Advance Received from Customer",
                            'Debit' => 0,
                            'Credit' => \Input::get('AdvanceAmount'),
                            'Balance' => \Input::get('AdvanceAmount'),
                            'DateAdded' => new \DateTime
                        ];

                        DB::table('transational_records')->insert($transational_reords);
                    }

                    if (\Input::get('CheckingStatus') == 1) {
                        $transational_records_room_rent = [
                            'BookingID' => $BookingID,
                            'TransactionDate' => new \DateTime,
                            'TransactionDescription' => "Room Rent",
                            'Debit' => $SellingPrice,
                            'Credit' => 0,
                            'Balance' => $SellingPrice,
                            'DateAdded' => new \DateTime
                        ];

                        DB::table('transational_records')->insert($transational_records_room_rent);
                    }

                    $log_data = [
                        'UserID' => $Admin,
                        'Action' => "Make reservation",
                        'DateAdded' => new \DateTime
                    ];

                    DB::table('logs')->insert($log_data);
                    
                    $UserFName = \Input::get('FirstName');
                    $HotelName = $details->HotelName;
                    $RoomsQty = \Input::get('RoomQty');

                    $MsgContent = "Dear " . $UserFName . ", Hotel " . $HotelName . " for " . $RoomsQty . " rooms. Your booking has confirmed & Booking ID is " . $BookingID . ". Thanks, KTown Rooms for Contact ";
                    // send sms
                    $to = \Input::get('Cell');
                    $message = $MsgContent;
                    
                    $url = "http://Lifetimesms.com/plain?username=" . $this->data['smsUsername'] . "&password=" . $this->data['smsPassword'] . "&to=" . $to . "&from=" . urlencode($this->data['smsFrom']) . "&message=" . urlencode($message) . "";

                    $ch = curl_init();
                    $timeout = 30;
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                    $response = curl_exec($ch);
                    curl_close($ch);

                    return redirect('admin/dha/reservation')->with('success', "Reservation Added Successfully");
                } else {
                    return redirect('admin/dha/reservation')->with('success', "Checkin date and System date doesn't match");
                }
            } else {

                $booking_data = [
                    'UserID' => $Admin,
                    'FirstName' => \Input::get('FirstName'),
                    'LastName' => \Input::get('LastName'),
                    'CompanyName' => \Input::get('CompanyName'),
                    'Email' => $Email,
                    'Cell' => \Input::get('Cell'),
                    'Identity' => \Input::get('Identity'),
                    'Referal' => \Input::get('Referal'),
                    'FullAddress' => \Input::get('FullAddress'),
                    'Description' => \Input::get('Description'),
                    'BookingTotal' => ($myDiff * (($SellingPrice * \Input::get('RoomQty')) + $TotalExtraCharges)),
                    'Discount' => \Input::get('Discount'),
                    'PromoDiscount' => 0,
                    'TotalAmount' => ($myDiff * (($SellingPrice * \Input::get('RoomQty')) + $TotalExtraCharges)),
                    'PaymentStatus' => \Input::get('PaymentStatus'),
                    'Status' => \Input::get('Status'),
                    'CheckingStatus' => \Input::get('CheckingStatus'),
                    'DateAdded' => new \DateTime
                ];

                DB::table('bookings')->insert($booking_data);

                $BookingID = \DB::getPdo()->lastInsertId();

                $booking_hotel_data = [
                    'BookingID' => $BookingID,
                    'CheckInDate' => \Input::get('CheckInDate'),
                    'CheckOutDate' => \Input::get('CheckOutDate'),
                    'HotelID' => $details->HotelID,
                    'RoomNumber' => \Input::get('RoomNumber'),
                    'HotelName' => $details->HotelName,
                    'OriginalHotelName' => $details->OriginalHotelName,
                    'OwnerName' => $details->OwnerName,
                    'Image' => $details->Image,
                    'HotelClass' => $details->HotelTypeName,
                    'RoomQty' => \Input::get('RoomQty'),
                    'Adults' => \Input::get('NoOfAdults'),
                    'Children' => \Input::get('NoOfChildren'),
                    'Discount' => \Input::get('Discount'),
                    'PartnerPrice' => $details->PartnerPrice,
                    'SellingPrice' => $SellingPrice,
                    'AdultPrice' => $details->AdultCharges,
                    'Total' => ($myDiff * (($SellingPrice * \Input::get('RoomQty')) + $TotalExtraCharges))
                ];

                DB::table('booking_hotels')->insert($booking_hotel_data);

                if (\Input::get('PaymentStatus') == 1) {
                    $transational_reords = [
                        'BookingID' => $BookingID,
                        'TransactionDate' => new \DateTime,
                        'TransactionDescription' => "Advance Received from Customer",
                        'Debit' => 0,
                        'Credit' => \Input::get('AdvanceAmount'),
                        'Balance' => \Input::get('AdvanceAmount'),
                        'DateAdded' => new \DateTime
                    ];

                    DB::table('transational_records')->insert($transational_reords);
                }

                if (\Input::get('CheckingStatus') == 1) {
                    $transational_records_room_rent = [
                        'BookingID' => $BookingID,
                        'TransactionDate' => new \DateTime,
                        'TransactionDescription' => "Room Rent",
                        'Debit' => $SellingPrice,
                        'Credit' => 0,
                        'Balance' => $SellingPrice,
                        'DateAdded' => new \DateTime
                    ];

                    DB::table('transational_records')->insert($transational_records_room_rent);
                }

                $log_data = [
                    'UserID' => $Admin,
                    'Action' => "Make reservation",
                    'DateAdded' => new \DateTime
                ];

                DB::table('logs')->insert($log_data);
                
                $UserFName = \Input::get('FirstName');
                    $HotelName = $details->HotelName;
                    $RoomsQty = \Input::get('RoomQty');

                    $MsgContent = "Dear " . $UserFName . ", Hotel " . $HotelName . " for " . $RoomsQty . " rooms. Your booking has confirmed & Booking ID is " . $BookingID . ". Thanks, KTown Rooms for Contact ";
                    // send sms
                    $to = \Input::get('Cell');
                    $message = $MsgContent;
                    
                    $url = "http://Lifetimesms.com/plain?username=" . $this->data['smsUsername'] . "&password=" . $this->data['smsPassword'] . "&to=" . $to . "&from=" . urlencode($this->data['smsFrom']) . "&message=" . urlencode($message) . "";

                    $ch = curl_init();
                    $timeout = 30;
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                    $response = curl_exec($ch);
                    curl_close($ch);

                return redirect('admin/dha/reservation')->with('success', "Reservation Added Successfully");
            }
        }
    }

    public function dha_edit($id) {
        $room_number = \DB::table('rooms')->select(DB::raw('rooms.*'))->where('HotelID', 10)->where('Status', 1)->get();
        $this->data['rooms_number'] = $room_number;

        $transationals = \DB::table('transational_records')->select(DB::raw('transational_records.Credit,DATE_FORMAT(TransactionDate, "%d-%b-%Y") as TransactionDate'))->where('BookingID', $id)->where('TransactionDescription', 'Advance Received from Customer')->get();
        $this->data['transationals'] = $transationals;

        $this->data['miscellaneous'] = \DB::table('miscellaneous')->select(DB::raw('Sum(miscellaneous.Amount) AS TotalAmount'))->where('BookingID', $id)->get();

        $allocate_rooms = \DB::table('rooms')->select(DB::raw('rooms.*'))
                        ->leftjoin('booking_hotels', 'booking_hotels.RoomNumber', '=', 'rooms.RoomNumber')
                        ->where('rooms.HotelID', 10)->where('rooms.Status', 1)->whereRaw('CURDATE() between booking_hotels.CheckInDate and booking_hotels.CheckOutDate')->get();
        $rooms = array();
        foreach ($allocate_rooms as $allocate_room) {
            $rooms[] = $allocate_room->RoomNumber;
        }
        $this->data['rooms'] = $rooms;

        $single_room = \DB::table('rooms')->select(DB::raw('rooms.*'))
                        ->leftjoin('booking_hotels', 'booking_hotels.RoomNumber', '=', 'rooms.RoomNumber')
                        ->where('rooms.HotelID', 10)->where('rooms.Status', 1)->where('booking_hotels.BookingID', $id)->get();
        $this->data['single_room'] = $single_room;

        $BookingDetail = DB::table('bookings')
                ->select('bookings.*', 'booking_hotels.*')
                ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                ->where('bookings.BookingID', $id)
                ->first();
        
        
        $this->data['mAdults'] = $BookingDetail->Adults;
        $this->data['mChildren'] = $BookingDetail->Children;
        $this->data['mRooms'] = $BookingDetail->RoomQty;
        $this->data['BookingDetail'] = $BookingDetail;

        return view('admin.reservation.dha-edit', $this->data);
    }

    public function dha_update($id) {
        $details = $this->get_hotel_details(10);
        $messages['required'] = 'Please enter :attribute.';
        $messages['min'] = 'Please select :attribute.';
        $error = false;
        $msg = "";

        $valid["FirstName"] = 'required|max:255';
        $valid["LastName"] = 'required|max:50';
        $valid["Referal"] = 'required|max:255';
        $valid["FullAddress"] = 'required|max:255';
        $valid["Identity"] = 'required';
        $valid["CheckInDate"] = 'required|date|date_format:Y-m-d';
        $valid["CheckOutDate"] = 'required|date|date_format:Y-m-d';
        $valid["SellingPrice"] = 'required|numeric';
        $valid["NoOfAdults"] = 'required|integer|min:1';
        $valid["RoomQty"] = 'required|integer|min:1';
        $valid["RoomNumber"] = 'required|numeric';
        $valid["PaymentStatus"] = 'required';
        $valid["CheckingStatus"] = 'required';

        $valid_name["FirstName"] = 'First Name';
        $valid_name["LastName"] = 'Last Name';
        $valid_name["Referal"] = 'Referal';
        $valid_name["FullAddress"] = 'Address';
        $valid_name["Identity"] = 'Identity';
        $valid_name["CheckInDate"] = 'Check In Date';
        $valid_name["CheckOutDate"] = 'Check Out Date';
        $valid_name["SellingPrice"] = 'Booking Price';
        $valid_name["NoOfAdults"] = 'No. of Adults';
        $valid_name["RoomQty"] = 'Qty of Rooms';
        $valid_name["RoomNumber"] = 'Room Number';
        $valid_name["PaymentStatus"] = 'Payment Status';
        $valid_name["CheckingStatus"] = 'Guest Hotel Status';

        $v = Validator::make(\Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);

        if ($v->fails() || $error) {
            if ($error) {
                return redirect()->back()->withErrors($v->errors())->withInput()->with('warning_msg', $msg);
            } else {
                return redirect()->back()->withErrors($v->errors())->withInput();
            }
        } else {
            $Adults = (int) \Input::get('NoOfAdults');
            $Children = (int) \Input::get('NoOfChildren');
            $TotalRooms = \Input::get('RoomQty');
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

            $cki = explode("-", \Input::get('CheckInDate'));
            $ckidate = date_create($cki[2] . "-" . $cki[1] . "-" . $cki[0]);
            //$HotelCheckInDate = date_format($ckidate, "Y-m-d");

            $cko = explode("-", \Input::get('CheckOutDate'));
            $ckodate = date_create($cko[2] . "-" . $cko[1] . "-" . $cko[0]);
            //$HotelCheckOutDate = date_format($ckodate, "Y-m-d");

            $diff = date_diff($ckidate, $ckodate);
            $myDiff = $diff->format("%R%a");
            if ($myDiff > 0) {
                $myDiff = (int) $myDiff;
            } else {
                //echo json_encode(['error' => true, 'message' => "Checkin date must be less than checkout date"]);
                return redirect('admin/dha/reservation/'.$id)->with('success', "Checkin date must be less than Checkout date");
//                    return redirect()->back()->withInput()->with('error', 'Checkin date must be less than checkout date');
            }
            if (\Session::get('AdminID') == 3) {
                $Admin = 118;
            } elseif (\Session::get('AdminID') == 6) {
                $Admin = 50;
            } elseif (\Session::get('AdminID') == 1) {
                $Admin = 50;
            }
            $Email = \Input::get('Email');
            $SellingPrice = \Input::get('SellingPrice');
            if(\Input::get('CheckingStatus') == 0) {
                $booking_hotel_data = [
                    'RoomNumber' => \Input::get('RoomNumber')
                    ];
                DB::table('booking_hotels')->where('BookingID', $id)->update($booking_hotel_data);
                
                $booking_data = [
                    'Identity' => \Input::get('Identity'),
                    'FullAddress' => \Input::get('FullAddress'),
                    'Description' => \Input::get('Description'),
                    'Status' => \Input::get('Status')
                ];
                DB::table('bookings')->where('BookingID', $id)->update($booking_data);
                
                return redirect('admin/dha/reservation')->with('success', "Reservation Updated Successfully");
            }  else if (\Input::get('CheckingStatus') == 1) {
                $currentDate = date('Y-m-d');
                $checkInDate = \Input::get('CheckInDate');
                $checkOutDate = \Input::get('CheckOutDate');
                
                /*$bookings = \DB::table('bookings')->select(DB::raw('bookings.CheckingStatus,booking_hotels.CheckOutDate'))
                        ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                        ->where('bookings.BookingID', $id)->get();*/
                
                $bookings = \DB::table('bookings')->select(DB::raw('bookings.CheckingStatus, booking_hotels.CheckOutDate, CURDATE() AS currentDate'))
                                ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                                ->where('bookings.BookingID', $id)
                                ->whereRAW("CURDATE() between booking_hotels.CheckInDate and booking_hotels.CheckOutDate")
                                ->get();        
                
                if ($currentDate == $checkInDate) {
                    
                    $transaction = \DB::table('transational_records')->select(DB::raw('transational_records.ID, transational_records.TransactionDate'))
                                   ->where('transational_records.BookingID', $id)
                                   ->where('transational_records.TransactionDate', "$currentDate")
                                   ->where('transational_records.TransactionDescription', "Room Rent")
                                   ->get();
                    if ($currentDate == isset($transaction[0]->TransactionDate)) {
                        $transational_records_room_rent = [
                            'Debit' => $SellingPrice,
                            'Credit' => 0,
                            'Balance' => $SellingPrice,
                            'DateModified' => new \DateTime
                        ];
                        
                        DB::table('transational_records')->where('ID', $transaction[0]->ID)->update($transational_records_room_rent);
                        
                    } else if ($bookings[0]->CheckingStatus == 0 && \Input::get('CheckingStatus') == 1) {
                        $transational_records_room_rent = [
                            'BookingID' => $id,
                            'TransactionDate' => new \DateTime,
                            'TransactionDescription' => "Room Rent",
                            'Debit' => $SellingPrice,
                            'Credit' => 0,
                            'Balance' => $SellingPrice,
                            'DateAdded' => new \DateTime
                        ];
                        DB::table('transational_records')->insert($transational_records_room_rent);
                    }
                    
                    $booking_data = [
                        'UserID' => $Admin,
                        'FirstName' => \Input::get('FirstName'),
                        'LastName' => \Input::get('LastName'),
                        'CompanyName' => \Input::get('CompanyName'),
                        'Email' => $Email,
                        'Cell' => \Input::get('Cell'),
                        'Identity' => \Input::get('Identity'),
                        'Referal' => \Input::get('Referal'),
                        'FullAddress' => \Input::get('FullAddress'),
                        'Description' => \Input::get('Description'),
                        'BookingTotal' => ($myDiff * (($SellingPrice * \Input::get('RoomQty')) + $TotalExtraCharges)),
                        'Discount' => \Input::get('Discount'),
                        'PromoDiscount' => 0,
                        'TotalAmount' => ($myDiff * (($SellingPrice * \Input::get('RoomQty')) + $TotalExtraCharges)),
                        'PaymentStatus' => \Input::get('PaymentStatus'),
                        'Status' => \Input::get('Status'),
                        'CheckingStatus' => \Input::get('CheckingStatus'),
                        'DateModified' => new \DateTime
                    ];

                    DB::table('bookings')->where('BookingID', $id)->update($booking_data);

                    $booking_hotel_data = [
                        'CheckInDate' => \Input::get('CheckInDate'),
                        'CheckOutDate' => \Input::get('CheckOutDate'),
                        'HotelID' => $details->HotelID,
                        'RoomNumber' => \Input::get('RoomNumber'),
                        'HotelName' => $details->HotelName,
                        'OriginalHotelName' => $details->OriginalHotelName,
                        'OwnerName' => $details->OwnerName,
                        'Image' => $details->Image,
                        'HotelClass' => $details->HotelTypeName,
                        'RoomQty' => \Input::get('RoomQty'),
                        'Adults' => \Input::get('NoOfAdults'),
                        'Children' => \Input::get('NoOfChildren'),
                        'Discount' => \Input::get('Discount'),
                        'PartnerPrice' => $details->PartnerPrice,
                        'SellingPrice' => $SellingPrice,
                        'AdultPrice' => $details->AdultCharges,
                        'Total' => ($myDiff * (($SellingPrice * \Input::get('RoomQty')) + $TotalExtraCharges))
                    ];

                    DB::table('booking_hotels')->where('BookingID', $id)->update($booking_hotel_data);

                    if (\Input::get('PaymentStatus') == 1 && \Input::get('AdvanceAmount') > 0 && \Input::get('AdvanceAmount') != '') {
                        $transational_reords = [
                            'BookingID' => $id,
                            'TransactionDate' => new \DateTime,
                            'TransactionDescription' => "Advance Received from Customer",
                            'Debit' => 0,
                            'Credit' => \Input::get('AdvanceAmount'),
                            'Balance' => \Input::get('AdvanceAmount'),
                            'DateAdded' => new \DateTime
                        ];

                        DB::table('transational_records')->insert($transational_reords);
                    }

                    $log_data = [
                        'UserID' => $Admin,
                        'Action' => "Edit reservation",
                        'DateAdded' => new \DateTime
                    ];
                    
                    DB::table('logs')->insert($log_data);
                    
                    $UserFName = \Input::get('FirstName');
                    $HotelName = $details->HotelName;
                    $RoomsQty = \Input::get('RoomQty');

                    $MsgContent = "Dear " . $UserFName . ", Hotel " . $HotelName . " for " . $RoomsQty . " rooms. Your booking has confirmed & Booking ID is " . $BookingID . ". Thanks, KTown Rooms for Contact ";
                    // send sms
                    $to = \Input::get('Cell');
                    $message = $MsgContent;
                    
                    $url = "http://Lifetimesms.com/plain?username=" . $this->data['smsUsername'] . "&password=" . $this->data['smsPassword'] . "&to=" . $to . "&from=" . urlencode($this->data['smsFrom']) . "&message=" . urlencode($message) . "";

                    $ch = curl_init();
                    $timeout = 30;
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                    $response = curl_exec($ch);
                    curl_close($ch);
                    
                    return redirect('admin/dha/reservation')->with('success', "Reservation Updated Successfully");
                    
                } elseif($checkOutDate < $currentDate){
                    return redirect('admin/dha/reservation/'.$id)->with('success', "Checkout date and System date are same not update checkout date.");
                } elseif (($bookings[0]->CheckOutDate <= $checkOutDate) || ($checkOutDate <= $bookings[0]->CheckOutDate)) {
                    $booking_data = [
                        'BookingTotal' => ($myDiff * (($SellingPrice * \Input::get('RoomQty')) + $TotalExtraCharges)),
                        'TotalAmount' => ($myDiff * (($SellingPrice * \Input::get('RoomQty')) + $TotalExtraCharges)),
                        'DateModified' => new \DateTime
                    ];
                    DB::table('bookings')->where('BookingID', $id)->update($booking_data);
                    
                    $booking_hotel_data = [
                        'CheckOutDate' => \Input::get('CheckOutDate'),
                        'Total' => ($myDiff * (($SellingPrice * \Input::get('RoomQty')) + $TotalExtraCharges))
                    ];
                    DB::table('booking_hotels')->where('BookingID', $id)->update($booking_hotel_data);
                    
                    return redirect('admin/dha/reservation')->with('success', "Checkout Date Updated Successfully");
                    
                } else {
                    return redirect('admin/dha/reservation/'.$id)->with('success', "Checkin date and System date doesn't match");
                }
            } else {
                return redirect('admin/dha/reservation')->with('success', "Can't Update Because guest is checkout");
            }
        }
    }

    public function dha_misc_add($id) {
        $this->data['miscid'] = $id;
        return view('admin.reservation.dha-misc-add', $this->data);
    }

    public function dha_misc_save($id) {
        $count = count(\Input::get('Description'));
        $misc = array();
        for ($i = 1; $i <= $count; $i++) {
            if (!empty(\Input::get('Description')[$i])) {
                array_push($misc, array(
                    'BookingID' => $id,
                    'Description' => \Input::get('Description')[$i],
                    'Category' => \Input::get('Category')[$i],
                    'Amount' => \Input::get('Amount')[$i],
                    'DateAdded' => new \DateTime
                ));
            }
        }
        DB::table('miscellaneous')->insert($misc);
        if (\Session::get('AdminID') == 3) {
            $Admin = 118;
        } elseif (\Session::get('AdminID') == 6) {
            $Admin = 50;
        } elseif (\Session::get('AdminID') == 1) {
            $Admin = 50;
        }
        $log_data = [
            'UserID' => $Admin,
            'Action' => "Add miscellaneous",
            'DateAdded' => new \DateTime
        ];

        DB::table('logs')->insert($log_data);
        return redirect('admin/dha/reservation')->with('success', "Reservation Added Successfully");
    }

    public function dha_misc_edit($id) {
        $this->data['miscid'] = $id;
        $this->data['miscellaneous'] = \DB::table('miscellaneous')->select(DB::raw('miscellaneous.*'))->where('BookingID', $id)->get();
        return view('admin.reservation.dha-misc-edit', $this->data);
    }

    public function dha_misc_update($id) {
        
        $bookings = \DB::table('bookings')->select(DB::raw('bookings.*'))->where('BookingID', $id)->get();
        if($bookings[0]->CheckingStatus == 1) {
            $count = count(\Input::get('Description'));
            $misc = array();
            for ($i = 1; $i <= $count; $i++) {
                if (!empty(\Input::get('miscid')[$i])) {
                    $misc_data = [
                        'ID' => \Input::get('miscid')[$i],
                        'Description' => \Input::get('Description')[$i],
                        'Category' => \Input::get('Category')[$i],
                        'Amount' => \Input::get('Amount')[$i],
                        'DateModified' => new \DateTime
                    ];
                    DB::table('miscellaneous')->where('ID', \Input::get('miscid')[$i])->update($misc_data);
                }

                if (empty(\Input::get("miscid")[$i]) && !empty(\Input::get('Description')[$i])) {
                    array_push($misc, array(
                        'BookingID' => $id,
                        'Description' => \Input::get('Description')[$i],
                        'Category' => \Input::get('Category')[$i],
                        'Amount' => \Input::get('Amount')[$i],
                        'DateAdded' => new \DateTime
                    ));
                }
            }
            DB::table('miscellaneous')->insert($misc);
            if (\Session::get('AdminID') == 3) {
                $Admin = 118;
            } elseif (\Session::get('AdminID') == 6) {
                $Admin = 50;
            } elseif (\Session::get('AdminID') == 1) {
                $Admin = 50;
            }
            $log_data = [
                'UserID' => $Admin,
                'Action' => "Edit miscellaneous",
                'DateAdded' => new \DateTime
            ];

            DB::table('logs')->insert($log_data);

            return redirect('admin/dha/reservation')->with('success', "Miscellaneous Added Successfully");
        } else {
            return redirect('admin/dha/reservation')->with('success', "Can't Update Because guest is checkout");
        }
    }

    public function dha_create_pdf($id) {
        $this->data['Booking'] = DB::table('bookings')
                ->select(DB::raw('bookings.*, DATE_FORMAT(DateAdded, "%d/%m/%Y") as DateAdded, DATE_FORMAT(DateModified, "%d/%m/%Y") as DateModified'))
                ->where('BookingID', $id)
                ->first();
        if (!empty($this->data['Booking'])) {
            $this->data['hotel'] = DB::table('booking_hotels')
                            ->select(DB::raw('booking_hotels.*, DATE_FORMAT(CheckInDate, "%d-%b-%Y") as CheckInDate, DATE_FORMAT(CheckOutDate, "%d-%b-%Y") as CheckOutDate'))
                            ->where('BookingID', $this->data['Booking']->BookingID)->first();
        }
        $this->data['Miscellaneous'] = DB::table('miscellaneous')->select(DB::raw('Sum(miscellaneous.Amount) AS TotalAmount'))->where('BookingID', $id)->get();
        $this->data['Transationals'] = DB::table('transational_records')->select(DB::raw('transational_records.*,DATE_FORMAT(TransactionDate, "%d %b %Y") as TransactionDate'))->where('BookingID', $id)->where('Status', '<>', '1')->get();
        $this->data['Transationalamount'] = DB::table('transational_records')->select(DB::raw('Sum(transational_records.Debit) AS Debit,Sum(transational_records.Debit*0.13) AS Debittax,Sum(transational_records.Credit) AS Credit'))->where('BookingID', $id)->where('Status', '<>', '1')->get();
        $this->data['FinalSettlement'] = DB::table('transational_records')->select(DB::raw('Sum(transational_records.Debit) AS Debit,Sum(transational_records.Credit) AS Credit,transational_records.Status'))->where('BookingID', $id)->where('Status', '1')->get();
        $this->data['Govtsalestax'] = '0.13';
        $this->data['percent'] = '13%';
        
        //$pdf = \PDF::loadView('includes.booking.invoice', $this->data);
        //$pdf->save(public_path('uploads') . '/booking-number-' . $id . '.pdf');

        /* if (\File::exists(public_path('uploads') . '/booking-number-' . $id . '.pdf')) {
          \File::delete(public_path('uploads') . '/booking-number-' . $id . '.pdf');
          } */
        return view('includes.booking.expences_invoice', $this->data);
    }

    public function dha_miscellaneous_create_pdf($id) {

        $this->data['Booking'] = DB::table('bookings')
                ->select(DB::raw('bookings.*, DATE_FORMAT(DateAdded, "%d/%m/%Y") as DateAdded, DATE_FORMAT(DateModified, "%d/%m/%Y") as DateModified'))
                ->where('BookingID', $id)
                ->first();
        if (!empty($this->data['Booking'])) {
            $this->data['hotel'] = DB::table('booking_hotels')
                            ->select(DB::raw('booking_hotels.*, DATE_FORMAT(CheckInDate, "%d-%b-%Y") as CheckInDate, DATE_FORMAT(CheckOutDate, "%d-%b-%Y") as CheckOutDate'))
                            ->where('BookingID', $this->data['Booking']->BookingID)->first();
        }
        $this->data['Amount'] = DB::table('miscellaneous')->select(DB::raw('Sum(miscellaneous.Amount) AS TotalAmount'))->where('BookingID', $id)->get();
        $this->data['miscellaneous'] = DB::table('miscellaneous')->select(DB::raw('miscellaneous.*,DATE_FORMAT(DateAdded, "%d %b %Y") as Date'))->where('BookingID', $id)->get();
        $this->data['Govtsalestax'] = '0.13';
        $this->data['percent'] = '13%';
        //$pdf = \PDF::loadView('includes.booking.invoice', $this->data);
        //$pdf->save(public_path('uploads') . '/booking-number-' . $id . '.pdf');

        /* if (\File::exists(public_path('uploads') . '/booking-number-' . $id . '.pdf')) {
          \File::delete(public_path('uploads') . '/booking-number-' . $id . '.pdf');
          } */
        return view('includes.booking.miscellaneous_invoice', $this->data);
    }
    /*
    public function dha_nightaudit_create_pdf() {
        $this->data['Bookings'] = \DB::table('bookings')->select(['booking_hotels.RoomNumber', 'bookings.BookingID', 'bookings.FirstName', 'bookings.LastName', 'booking_hotels.SellingPrice', 'bookings.Discount', 'bookings.PromoDiscount', 'bookings.TotalAmount', 'miscellaneous.BookingID AS MBookingID', 'bookings.TotalAmount', 'bookings.CheckingStatus AS Checking', 'hotels.SellingPrice AS FixHotelPrice',
                            DB::raw("CONCAT('<small class=\"label bg-', IF(bookings.Status = 1, 'green', IF(bookings.Status = 2, 'red', IF(bookings.Status = 3, 'blue', 'yellow'))), '\" ><i class=\"fa ', IF(bookings.Status = 1, 'fa-check', IF(bookings.Status = 2, 'fa-times', IF(bookings.Status = 3, 'fa-times', 'fa-clock-o'))), '\"></i> ', IF(bookings.Status = 1, 'Approved', IF(bookings.Status = 2, 'Declined', IF(bookings.Status = 3, 'Cancel', 'Pending'))), '</small>') AS Status"),
                            DB::raw("CONCAT('<small class=\"label bg-', IF(bookings.CheckingStatus = 1, 'green', IF(bookings.CheckingStatus = 0, 'red', IF(bookings.CheckingStatus = 3, 'blue', 'yellow'))), '\" ><i class=\"fa ', IF(bookings.CheckingStatus = 1, 'fa-check', IF(bookings.CheckingStatus = 2, 'fa-times', IF(bookings.CheckingStatus = 0, 'fa-times', 'fa-clock-o'))), '\"></i> ', IF(bookings.CheckingStatus = 1, 'CheckIn', IF(bookings.CheckingStatus = 2, 'CheckOut', IF(bookings.CheckingStatus = 0, 'Not CheckIn', 'Not CheckIn'))), '</small>') AS CheckingStatus"),
                            DB::raw("DATE_FORMAT(booking_hotels.CheckInDate, \"%d-%b-%Y\") as CheckInDate"),
                            DB::raw("DATE_FORMAT(booking_hotels.CheckOutDate, \"%d-%b-%Y\") as CheckOutDate"),
                            DB::raw("DATE_FORMAT(bookings.DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
                            DB::raw("DATE_FORMAT(bookings.DateModified, \"%d-%b-%Y<br>%r\") as DateModified")])
                        ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                        ->leftjoin('miscellaneous', 'miscellaneous.BookingID', '=', 'booking_hotels.BookingID')
                        ->leftjoin('hotels', 'hotels.HotelID', '=', 'booking_hotels.HotelID')
                        ->where('booking_hotels.HotelID', '10')
                        ->where('bookings.CheckingStatus', '1')
                        ->ORwhere('bookings.CheckingStatus', '2')
                        ->whereRaw('CURDATE() between booking_hotels.CheckInDate and booking_hotels.CheckOutDate')
                        ->groupby('booking_hotels.BookingID')->get();
        //print_r($this->data['Bookings']); die();
        
        $night_audits = \DB::table('bookings')->select(['bookings.*', 'booking_hotels.*', 'transational_records.ID', 'transational_records.TransactionDate','transational_records.TransactionDescription'])
                        ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                        ->leftjoin('transational_records', 'transational_records.BookingID', '=', 'booking_hotels.BookingID')
                        ->where('booking_hotels.HotelID', '10')
                        ->where('transational_records.TransactionDescription', 'Room Rent')
                        ->where('bookings.CheckingStatus', '1')
                        ->orderBy('transational_records.ID', 'desc')->get();
                        
        foreach($night_audits as $night_audit) {
            $curr_date = date("Y-m-d");
            //echo $night_audit->BookingID."    ".$night_audit->TransactionDate."    ".$curr_date."<br/>";
            if($night_audit->TransactionDate != $curr_date) {
                $transational_records = [
                    'BookingID' => $night_audit->BookingID,
                    'TransactionDate' => new \DateTime,
                    'TransactionDescription' => "Room Rent",
                    'Debit' => $night_audit->SellingPrice,
                    'Credit' => 0,
                    'Balance' => $night_audit->SellingPrice,
                    'DateAdded' => new \DateTime
                ];
                DB::table('transational_records')->insert($transational_records);
            }
        }
        
        return view('includes.booking.night_audit_report', $this->data);
    } */
    
    public function dha_nightaudit_create_pdf() {
        $currentDate = date("Y-m-d");
        $this->data['Bookings'] = \DB::table('bookings')->select(['booking_hotels.RoomNumber', 'bookings.BookingID', 'bookings.FirstName', 'bookings.LastName', 'booking_hotels.SellingPrice', 'bookings.Discount', 'bookings.PromoDiscount', 'bookings.TotalAmount', 'bookings.TotalAmount', 'bookings.CheckingStatus AS Checking', 'hotels.SellingPrice AS FixHotelPrice',
                            DB::raw("CONCAT('<small class=\"label bg-', IF(bookings.Status = 1, 'green', IF(bookings.Status = 2, 'red', IF(bookings.Status = 3, 'blue', 'yellow'))), '\" ><i class=\"fa ', IF(bookings.Status = 1, 'fa-check', IF(bookings.Status = 2, 'fa-times', IF(bookings.Status = 3, 'fa-times', 'fa-clock-o'))), '\"></i> ', IF(bookings.Status = 1, 'Approved', IF(bookings.Status = 2, 'Declined', IF(bookings.Status = 3, 'Cancel', 'Pending'))), '</small>') AS Status"),
                            DB::raw("CONCAT('<small class=\"label bg-', IF(bookings.CheckingStatus = 1, 'green', IF(bookings.CheckingStatus = 0, 'red', IF(bookings.CheckingStatus = 3, 'blue', 'yellow'))), '\" ><i class=\"fa ', IF(bookings.CheckingStatus = 1, 'fa-check', IF(bookings.CheckingStatus = 2, 'fa-times', IF(bookings.CheckingStatus = 0, 'fa-times', 'fa-clock-o'))), '\"></i> ', IF(bookings.CheckingStatus = 1, 'CheckIn', IF(bookings.CheckingStatus = 2, 'CheckOut', IF(bookings.CheckingStatus = 0, 'Not CheckIn', 'Not CheckIn'))), '</small>') AS CheckingStatus"),
                            DB::raw("DATE_FORMAT(booking_hotels.CheckInDate, \"%d-%b-%Y\") as CheckInDate"),
                            DB::raw("DATE_FORMAT(booking_hotels.CheckOutDate, \"%d-%b-%Y\") as CheckOutDate"),
                            DB::raw("DATE_FORMAT(bookings.DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
                            DB::raw("DATE_FORMAT(bookings.DateModified, \"%d-%b-%Y<br>%r\") as DateModified")])
                        ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                        ->leftjoin('hotels', 'hotels.HotelID', '=', 'booking_hotels.HotelID')
                        ->where('booking_hotels.HotelID', '10')
                        ->where('bookings.CheckingStatus', '1')
                        ->whereRAW("((DATE(CheckInDate) >= '" . $currentDate . "' AND DATE(CheckOutDate) <= '" . $currentDate . "') OR (DATE(CheckInDate) <= '" . $currentDate . "' AND DATE(CheckOutDate) >= '" . $currentDate . "'))")
                        ->groupby('booking_hotels.BookingID')->get();
        //print_r($this->data['Bookings']); die();
        
        $night_audits = \DB::table('bookings')->select(['bookings.*', 'booking_hotels.*'])
                        ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                        ->where('booking_hotels.HotelID', '10')
                        ->where('bookings.CheckingStatus', '1')
                        ->whereRAW("((DATE(CheckInDate) >= '" . $currentDate . "' AND DATE(CheckOutDate) <= '" . $currentDate . "') OR (DATE(CheckInDate) <= '" . $currentDate . "' AND DATE(CheckOutDate) >= '" . $currentDate . "'))")
                        ->get();
        
        foreach ($night_audits as $night_audit) {
            $transacation = DB::table('transational_records')
                ->select(DB::raw('transational_records.*'))
                ->where('transational_records.BookingID', $night_audit->BookingID)
                ->where('transational_records.TransactionDate', $currentDate)    
                ->first();
            
            $curr_date = date("Y-m-d");
            if($transacation == NULL || $transacation == '') {
                $transational_records = [
                    'BookingID' => $night_audit->BookingID,
                    'TransactionDate' => new \DateTime,
                    'TransactionDescription' => "Room Rent",
                    'Debit' => $night_audit->SellingPrice,
                    'Credit' => 0,
                    'Balance' => $night_audit->SellingPrice,
                    'DateAdded' => new \DateTime
                ];
                DB::table('transational_records')->insert($transational_records);
            }
            
        }

        return view('includes.booking.night_audit_report', $this->data);
    }
    

    public function dha_checkout_payment($id) {
        $this->data['miscid'] = $id;
        $this->data['transationals'] = \DB::table('transational_records')->select(DB::raw('transational_records.*'))->where('BookingID', $id)->get();
        $this->data['creditAmount'] = \DB::table('transational_records')->select(DB::raw('Sum(transational_records.Credit) AS CreditAmount'))->where('BookingID', $id)->get();
        $this->data['debitAmount'] = \DB::table('transational_records')->select(DB::raw('Sum(transational_records.Debit) AS DebitAmount,Sum(transational_records.Debit*0.13) AS DebittaxAmount'))->where('BookingID', $id)->get();
        $this->data['miscellaneous'] = DB::table('miscellaneous')->select(DB::raw('Sum(miscellaneous.Amount) AS TotalAmount'))->where('BookingID', $id)->get();
        return view('admin.reservation.dha-checkout-payment', $this->data);
    }

    public function dha_checkoutpayment_update($id) {
        /*$messages['required'] = 'Please enter :attribute.';
        $messages['min'] = 'Please select :attribute.';
        $error = false;
        $msg = "";
        $valid["Credit"] = 'required';
        $valid_name["Credit"] = 'Credit';

        $v = Validator::make(\Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);

        if ($v->fails() || $error) {
            if ($error) {
                return redirect()->back()->withErrors($v->errors())->withInput()->with('warning_msg', $msg);
            } else {
                return redirect()->back()->withErrors($v->errors())->withInput();
            }
        } else { */
            $cki = explode("-", \Input::get('Date'));
            $trandate = date_create($cki[2] . "-" . $cki[1] . "-" . $cki[0]);
            $transational_data = [
                'BookingID' => $id,
                'TransactionDate' => $trandate,
                'TransactionDescription' => \Input::get('Description'),
                'Debit' => \Input::get('Debit'),
                'Credit' => \Input::get('Credit'),
                'Status' => 1,
                'DateAdded' => new \DateTime
            ];
            DB::table('transational_records')->insert($transational_data);

            $booking_data = [
                'CheckingStatus' => '2',
                'DateModified' => new \DateTime
            ];
            DB::table('bookings')->where('BookingID', $id)->update($booking_data);

            $booking_hotels_data = [
                'CheckOutDate' => new \DateTime
            ];
            DB::table('booking_hotels')->where('BookingID', $id)->update($booking_hotels_data);

            return redirect('admin/dha/reservation')->with('success', "Checkout Added Successfully");
        //}
    }
    
    public function dha_dashboard() {
        $currentDate = date("Y-m-d");
        $this->data['approved_bookings'] = \DB::table('bookings')->select(['bookings.*', 'booking_hotels.*'])
                        ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                        ->where('booking_hotels.HotelID', '10')
                        ->where('bookings.CheckingStatus', '1')
                        ->whereRAW("((DATE(CheckInDate) >= '" . $currentDate . "' AND DATE(CheckOutDate) <= '" . $currentDate . "') OR (DATE(CheckInDate) <= '" . $currentDate . "' AND DATE(CheckOutDate) >= '" . $currentDate . "'))")
                        ->count();
        
        $this->data['bookings'] = DB::table('bookings')->select(['bookings.*', 'booking_hotels.*'])
                                  ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                                  ->where('booking_hotels.HotelID', 10)
                                  ->whereRAW("((DATE(CheckInDate) >= '" . $currentDate . "' AND DATE(CheckOutDate) <= '" . $currentDate . "') OR (DATE(CheckInDate) <= '" . $currentDate . "' AND DATE(CheckOutDate) >= '" . $currentDate . "'))")
                                  ->count();
        $this->data['pending_bookings'] = DB::table('bookings')->select(['bookings.*', 'booking_hotels.*'])
                        ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                        ->where('bookings.Status', 0)
                        ->where('booking_hotels.HotelID', 10)
                        ->whereRAW("((DATE(CheckInDate) >= '" . $currentDate . "' AND DATE(CheckOutDate) <= '" . $currentDate . "') OR (DATE(CheckInDate) <= '" . $currentDate . "' AND DATE(CheckOutDate) >= '" . $currentDate . "'))")
                        ->count();
        
        $transaction = \DB::table('transational_records')->select(DB::raw('Sum(transational_records.Credit) as Credit, Sum(transational_records.Debit) as Debit, Sum(transational_records.Debit*0.13) as Debittax'))
                        ->leftjoin('booking_hotels', 'transational_records.BookingID', '=', 'booking_hotels.BookingID')
                        ->where('booking_hotels.HotelID', 10)
                        ->where('transational_records.Status', '<>', '1')
                        ->whereRAW("((DATE(transational_records.TransactionDate) >= '" . $currentDate . "' AND DATE(transational_records.TransactionDate) <= '" . $currentDate . "') OR (DATE(transational_records.TransactionDate) <= '" . $currentDate . "' AND DATE(transational_records.TransactionDate) >= '" . $currentDate . "'))")
                        ->get();
        
        $miscellaneous = \DB::table('miscellaneous')->select(DB::raw('Sum(miscellaneous.Amount) as Amount'))
                         ->leftjoin('booking_hotels', 'miscellaneous.BookingID', '=', 'booking_hotels.BookingID')
                         ->where('booking_hotels.HotelID', 10)
                         ->whereRAW("((DATE(DateAdded) >= '" . $currentDate . "' AND DATE(DateAdded) <= '" . $currentDate . "') OR (DATE(DateAdded) <= '" . $currentDate . "' AND DATE(DateAdded) >= '" . $currentDate . "'))")
                         ->get();
        
        $charts = \DB::table('booking_hotels')->select(DB::raw('CONCAT (MONTHNAME(transational_records.TransactionDate)," ",YEAR(transational_records.TransactionDate)) AS Month, SUM(transational_records.Debit) AS Debit, SUM(transational_records.Credit) AS Credit, SUM(miscellaneous.Amount) AS MAmount'))
                        ->leftjoin('transational_records', 'transational_records.BookingID', '=', 'booking_hotels.BookingID')
                        ->leftjoin('miscellaneous', 'miscellaneous.BookingID', '=', 'booking_hotels.BookingID')
                        ->where('booking_hotels.HotelID', 10)
                        ->where('transational_records.Status', '<>', '1')
                        ->groupby(\DB::raw("MONTH(transational_records.TransactionDate),YEAR(transational_records.TransactionDate)"))
                        ->get();
        
        $months = array();
        $sales = array();
        foreach ($charts as $chart) {
            $months[] = '"'.$chart->Month.'"';
            $sales[] = $chart->Debit + $chart->MAmount;
        }
        $this->data['month'] =  implode(',', $months);
        $this->data['sale'] =  implode(',', $sales);
        
        
        $this->data['total_revenue'] = $transaction[0]->Debit + $miscellaneous[0]->Amount;
        
        $this->data['checkin'] = DB::table('bookings')->select(['bookings.*', 'booking_hotels.*'])
                                  ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                                  ->where('booking_hotels.HotelID', 10)
                                  ->where('bookings.CheckingStatus', 1)
                                  ->whereRAW("((DATE(CheckInDate) >= '" . $currentDate . "' AND DATE(CheckOutDate) <= '" . $currentDate . "') OR (DATE(CheckInDate) <= '" . $currentDate . "' AND DATE(CheckOutDate) >= '" . $currentDate . "'))")
                                  ->count();
        
        
        $this->data['no_of_rooms_occupied'] = DB::table('bookings')->select(['bookings.*', 'booking_hotels.*'])
                                  ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                                  ->where('booking_hotels.HotelID', 10)
                                  ->where('bookings.CheckingStatus', 1)
                                  ->whereRAW("((DATE(CheckInDate) >= '" . $currentDate . "' AND DATE(CheckOutDate) <= '" . $currentDate . "') OR (DATE(CheckInDate) <= '" . $currentDate . "' AND DATE(CheckOutDate) >= '" . $currentDate . "'))")
                                  ->count();
        
        
        $this->data['no_room'] = DB::table('rooms')->where('rooms.HotelID', 10)->count();
        
        $this->data['travel_agents'] = DB::table('agent_requests')->count();
        
        
        $this->data['canceled_bookings'] = DB::table('bookings')->select(['bookings.*', 'booking_hotels.*'])
                        ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                        ->where('bookings.Status', 3)
                        ->where('booking_hotels.HotelID', 10)
                        ->whereRAW("((DATE(CheckInDate) >= '" . $currentDate . "' AND DATE(CheckOutDate) <= '" . $currentDate . "') OR (DATE(CheckInDate) <= '" . $currentDate . "' AND DATE(CheckOutDate) >= '" . $currentDate . "'))")
                        ->count();
        
        
        
        
        
        
        
        return view('admin.reservation.dha-dashboard', $this->data);
        
    }
    
    public function dha_search_dashboard() {
        $startDate = \Input::get('StartDate');
        $endDate = \Input::get('EndDate');
        $this->data['approved_bookings'] = \DB::table('bookings')->select(['bookings.*', 'booking_hotels.*'])
                        ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                        ->where('booking_hotels.HotelID', '10')
                        ->where('bookings.CheckingStatus', '1')
                        ->whereRAW("((DATE(CheckInDate) >= '" . $startDate . "' AND DATE(CheckOutDate) <= '" . $endDate . "') OR (DATE(CheckInDate) <= '" . $startDate . "' AND DATE(CheckOutDate) >= '" . $endDate . "'))")
                        ->count();
        
        $this->data['bookings'] = DB::table('bookings')->select(['bookings.*', 'booking_hotels.*'])
                                  ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                                  ->where('booking_hotels.HotelID', 10)
                                  ->whereRAW("((DATE(CheckInDate) >= '" . $startDate . "' AND DATE(CheckOutDate) <= '" . $endDate . "') OR (DATE(CheckInDate) <= '" . $startDate . "' AND DATE(CheckOutDate) >= '" . $endDate . "'))")
                                  ->count();
        $this->data['pending_bookings'] = DB::table('bookings')->select(['bookings.*', 'booking_hotels.*'])
                        ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                        ->where('bookings.Status', 0)
                        ->where('booking_hotels.HotelID', 10)
                        ->whereRAW("((DATE(CheckInDate) >= '" . $startDate . "' AND DATE(CheckOutDate) <= '" . $endDate . "') OR (DATE(CheckInDate) <= '" . $startDate . "' AND DATE(CheckOutDate) >= '" . $endDate . "'))")
                        ->count();
        
        $transaction = \DB::table('transational_records')->select(DB::raw('Sum(transational_records.Credit) as Credit, Sum(transational_records.Debit) as Debit, Sum(transational_records.Debit*0.13) as Debittax'))
                        ->leftjoin('booking_hotels', 'transational_records.BookingID', '=', 'booking_hotels.BookingID')
                        ->where('booking_hotels.HotelID', 10)
                        ->where('transational_records.Status', '<>', '1')
                        ->whereRAW("((DATE(transational_records.TransactionDate) >= '" . $currentDate . "' AND DATE(transational_records.TransactionDate) <= '" . $currentDate . "') OR (DATE(transational_records.TransactionDate) <= '" . $currentDate . "' AND DATE(transational_records.TransactionDate) >= '" . $currentDate . "'))")
                        ->get();
        
        $miscellaneous = \DB::table('miscellaneous')->select(DB::raw('Sum(miscellaneous.Amount) as Amount'))
                         ->leftjoin('booking_hotels', 'miscellaneous.BookingID', '=', 'booking_hotels.BookingID')
                         ->where('booking_hotels.HotelID', 10)
                         ->whereRAW("((DATE(DateAdded) >= '" . $currentDate . "' AND DATE(DateAdded) <= '" . $currentDate . "') OR (DATE(DateAdded) <= '" . $currentDate . "' AND DATE(DateAdded) >= '" . $currentDate . "'))")
                         ->get();
        
        $this->data['total_revenue'] = $transaction[0]->Debit + $miscellaneous[0]->Amount;
        
        $this->data['checkin'] = DB::table('bookings')->select(['bookings.*', 'booking_hotels.*'])
                                  ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                                  ->where('booking_hotels.HotelID', 10)
                                  ->where('bookings.CheckingStatus', 1)
                                  ->whereRAW("((DATE(CheckInDate) >= '" . $startDate . "' AND DATE(CheckOutDate) <= '" . $endDate . "') OR (DATE(CheckInDate) <= '" . $startDate . "' AND DATE(CheckOutDate) >= '" . $endDate . "'))")
                                  ->count();
        
        
        $this->data['no_of_rooms_occupied'] = DB::table('bookings')->select(['bookings.*', 'booking_hotels.*'])
                                  ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                                  ->where('booking_hotels.HotelID', 10)
                                  ->where('bookings.CheckingStatus', 1)
                                  ->whereRAW("((DATE(CheckInDate) >= '" . $startDate . "' AND DATE(CheckOutDate) <= '" . $endDate . "') OR (DATE(CheckInDate) <= '" . $startDate . "' AND DATE(CheckOutDate) >= '" . $endDate . "'))")
                                  ->count();
        
        $charts = \DB::table('booking_hotels')->select(DB::raw('CONCAT (MONTHNAME(transational_records.TransactionDate)," ",YEAR(transational_records.TransactionDate)) AS Month, SUM(transational_records.Debit) AS Debit, SUM(transational_records.Credit) AS Credit, SUM(miscellaneous.Amount) AS MAmount'))
                        ->leftjoin('transational_records', 'transational_records.BookingID', '=', 'booking_hotels.BookingID')
                        ->leftjoin('miscellaneous', 'miscellaneous.BookingID', '=', 'booking_hotels.BookingID')
                        ->where('booking_hotels.HotelID', 10)
                        ->where('transational_records.Status', '<>', '1')
                        ->groupby(\DB::raw("MONTH(transational_records.TransactionDate),YEAR(transational_records.TransactionDate)"))
                        ->get();
        
        $months = array();
        $sales = array();
        foreach ($charts as $chart) {
            $months[] = '"'.$chart->Month.'"';
            $sales[] = $chart->Debit + $chart->MAmount;
        }
        $this->data['month'] =  implode(',', $months);
        $this->data['sale'] =  implode(',', $sales);
        
        
        $this->data['no_room'] = DB::table('rooms')->where('rooms.HotelID', 10)->count();
        
        $this->data['travel_agents'] = DB::table('agent_requests')->count();
        
        
        $this->data['canceled_bookings'] = DB::table('bookings')->select(['bookings.*', 'booking_hotels.*'])
                        ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                        ->where('bookings.Status', 3)
                        ->where('booking_hotels.HotelID', 10)
                        ->whereRAW("((DATE(CheckInDate) >= '" . $startDate . "' AND DATE(CheckOutDate) <= '" . $endDate . "') OR (DATE(CheckInDate) <= '" . $startDate . "' AND DATE(CheckOutDate) >= '" . $endDate . "'))")
                        ->count();
        return view('admin.reservation.dha-dashboard', $this->data);
        
    }
    
    

}
