<?php

namespace App\Http\Controllers\admin;

use Calendar;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;

class Rooms extends AdminController {

    function __construct() {
        parent::__construct();
    }

    public function dha() {
        $this->data['rooms_number'] = \DB::table('rooms')->select(DB::raw('rooms.*'))->where('HotelID', 10)->get();
        $booking_hotels = \DB::table('booking_hotels')->select(DB::raw('booking_hotels.*'))->where('HotelID', 10)->get();
        return view('admin.rooms.dha', $this->data, compact('booking_hotels'));

        //return view('admin.rooms.dha', $this->data);
    }

    public function dha_rooms_list() {
        $rooms_number = \DB::table('rooms')->select(DB::raw('rooms.RoomID,rooms.RoomNumber'))->where('HotelID', 10)->where('Status', 1)->get();
        $result = array();
        //print_r($rooms_number);
        foreach ($rooms_number as $room_number) {
            $roomid = $room_number->RoomID;
            $roomname = $room_number->RoomNumber;
            $result[] = array("id" => "$roomname", "name" => "Room $roomname");
        }
        //print_r($result);

        /* $result = array(
          array("id"=>"1","name"=>"Room 101","capacity"=>"0","status"=>"Ready"),
          array("id"=>"2","name"=>"Room 102","capacity"=>"0","status"=>"Ready"),
          array("id"=>"3","name"=>"Room 103","capacity"=>"0","status"=>"Ready"),
          array("id"=>"4","name"=>"Room 104","capacity"=>"0","status"=>"Ready"),
          array("id"=>"5","name"=>"Room 105","capacity"=>"0","status"=>"Ready"),

          );
         */
        header('Content-Type: application/json');
        echo json_encode($result);
        exit(0);
    }

    public function dha_backendmove() {
        $id = $_GET['id'];
        $start_date = $_GET['newStart'];
        $end_date = $_GET['newEnd'];
        $room_number = $_GET['newResource'];

        $move_data = [
            'CheckInDate' => $start_date,
            'CheckOutDate' => $end_date,
            'RoomNumber' => $room_number
        ];
        $booking_hotels = \DB::table('bookings')->select(DB::raw('booking_hotels.BookingHotelID'))
                        ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                        ->where('bookings.BookingID', $id)->get();
        
        DB::table('booking_hotels')->where('BookingID', $booking_hotels[0]->BookingHotelID)->update($move_data);
        if (\Session::get('AdminID') == 3) {
            $Admin = 118;
        } elseif (\Session::get('AdminID') == 6) {
            $Admin = 50;
        } elseif (\Session::get('AdminID') == 1) {
            $Admin = 50;
        }
        $log_data = [
            'UserID' => $Admin,
            'Action' => "Room# $room_number Move from backend",
            'DateAdded' => new \DateTime
        ];

        DB::table('logs')->insert($log_data);
        exit(0);
    }

    public function dha_rooms_booking_list() {
        $booking_hotels = \DB::table('bookings')->select(DB::raw('bookings.FirstName,bookings.BookingID,booking_hotels.CheckInDate,booking_hotels.CheckOutDate,booking_hotels.CheckOutDate,booking_hotels.RoomNumber,booking_hotels.Total,bookings.Status,bookings.CheckingStatus'))
                        ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                        ->where('HotelID', 10)->get();
        $result = array();
        //print_r($rooms_number);
        foreach ($booking_hotels as $booking_hotel) {
            $bookinghotelid = $booking_hotel->BookingID;
            $checkindate = $booking_hotel->CheckInDate;
            $checkoutdate = $booking_hotel->CheckOutDate;
            $roomnumber = $booking_hotel->RoomNumber;
            $firstname = $booking_hotel->FirstName;
            $total = $booking_hotel->Total;
            if ($booking_hotel->CheckingStatus == 0) {
                $status = 'NotCheckin';
            } elseif ($booking_hotel->CheckingStatus == 1) {
                $status = 'Checkin';
            } elseif ($booking_hotel->CheckingStatus == 2) {
                $status = "Checkout";
            }
            $result[] = array("id" => "$bookinghotelid", "text" => "$firstname", "start" => $checkindate . "T12:00:00", "end" => $checkoutdate . "T00:00:00", "resource" => "$roomnumber", "bubbleHtml" => "Reservation details: <br\/>$checkindate<br\/> $checkoutdate", "status" => "$status", "paid" => "$total");
        }
        //IF(bookings.Status = 1, 'Approved', IF(bookings.Status = 2, 'Declined', IF(bookings.Status = 3, 'Cancel', 'Pending')
        /*
          $result = array(
          array("id"=>"10","text"=>"Mr. Gray","start"=>"2019-05-02T12:00:00","end"=>"2019-05-05T00:00:00","resource"=>"1","bubbleHtml"=>"Reservation details: <br\/>Mr. Gray","status"=>"New","paid"=>"0"),
          array("id"=>"13","text"=>"Mrs. Garc","start"=>"2019-05-06T00:00:00","end"=>"2019-05-10T00:00:00","resource"=>"2","bubbleHtml"=>"Reservation details: <br\/>Mrs. Garc\u00eda","status"=>"Arrived","paid"=>"0"),
          array("id"=>"14","text"=>"Mr. Jones","start"=>"2019-05-11T00:00:00","end"=>"2019-05-12T00:00:00","resource"=>"3","bubbleHtml"=>"Reservation details: <br\/>Mr. Jones","status"=>"CheckedOut","paid"=>"100"),
          array("id"=>"17","text"=>"Mr. Gray","start"=>"2019-05-12T00:00:00","end"=>"2019-05-18T12:00:00","resource"=>"2","bubbleHtml"=>"Reservation details: <br\/>Mrs. Garc\u00eda","status"=>"Arrived","paid"=>"0"),
          array("id"=>"20","text"=>"Mr. Jones","start"=>"2019-05-11T00:00:00","end"=>"2019-05-12T00:00:00","resource"=>"4","bubbleHtml"=>"Reservation details: <br\/>Mr. Jones","status"=>"CheckedOut","paid"=>"100"),
          );
         */
        header('Content-Type: application/json');
        echo json_encode($result);
        exit(0);
        //echo json_decode($result, true);
    }

    //millenium
    
    public function millenium() {
        $this->data['rooms_number'] = \DB::table('rooms')->select(DB::raw('rooms.*'))->where('HotelID', 14)->get();
        $booking_hotels = \DB::table('booking_hotels')->select(DB::raw('booking_hotels.*'))->where('HotelID', 14)->get();
        return view('admin.rooms.millenium', $this->data, compact('booking_hotels'));

        //return view('admin.rooms.dha', $this->data);
    }

    public function millenium_rooms_list() {
        $rooms_number = \DB::table('rooms')->select(DB::raw('rooms.RoomID,rooms.RoomNumber'))->where('HotelID', 14)->where('Status', 1)->get();
        $result = array();
        //print_r($rooms_number);
        foreach ($rooms_number as $room_number) {
            $roomid = $room_number->RoomID;
            $roomname = $room_number->RoomNumber;
            $result[] = array("id" => "$roomname", "name" => "Room $roomname");
        }
        //print_r($result);

        /* $result = array(
          array("id"=>"1","name"=>"Room 101","capacity"=>"0","status"=>"Ready"),
          array("id"=>"2","name"=>"Room 102","capacity"=>"0","status"=>"Ready"),
          array("id"=>"3","name"=>"Room 103","capacity"=>"0","status"=>"Ready"),
          array("id"=>"4","name"=>"Room 104","capacity"=>"0","status"=>"Ready"),
          array("id"=>"5","name"=>"Room 105","capacity"=>"0","status"=>"Ready"),

          );
         */
        header('Content-Type: application/json');
        echo json_encode($result);
        exit(0);
    }

    public function millenium_backendmove() {
        $id = $_GET['id'];
        $start_date = $_GET['newStart'];
        $end_date = $_GET['newEnd'];
        $room_number = $_GET['newResource'];

        $move_data = [
            'CheckInDate' => $start_date,
            'CheckOutDate' => $end_date,
            'RoomNumber' => $room_number
        ];
        $booking_hotels = \DB::table('bookings')->select(DB::raw('booking_hotels.BookingHotelID'))
                        ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                        ->where('bookings.BookingID', $id)->get();
        
        DB::table('booking_hotels')->where('BookingID', $booking_hotels[0]->BookingHotelID)->update($move_data);
        if (\Session::get('AdminID') == 4) {
            $Admin = 127;
        } elseif (\Session::get('AdminID') == 6) {
            $Admin = 50;
        } elseif (\Session::get('AdminID') == 1) {
            $Admin = 50;
        }
        $log_data = [
            'UserID' => $Admin,
            'Action' => "Room# $room_number Move from backend",
            'DateAdded' => new \DateTime
        ];

        DB::table('logs')->insert($log_data);
        exit(0);
    }

    public function millenium_rooms_booking_list() {
        $booking_hotels = \DB::table('bookings')->select(DB::raw('bookings.FirstName,bookings.BookingID,booking_hotels.CheckInDate,booking_hotels.CheckOutDate,booking_hotels.CheckOutDate,booking_hotels.RoomNumber,booking_hotels.Total,bookings.Status,bookings.CheckingStatus'))
                        ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                        ->where('HotelID', 14)->get();
        $result = array();
        //print_r($rooms_number);
        foreach ($booking_hotels as $booking_hotel) {
            $bookinghotelid = $booking_hotel->BookingID;
            $checkindate = $booking_hotel->CheckInDate;
            $checkoutdate = $booking_hotel->CheckOutDate;
            $roomnumber = $booking_hotel->RoomNumber;
            $firstname = $booking_hotel->FirstName;
            $total = $booking_hotel->Total;
            if ($booking_hotel->CheckingStatus == 0) {
                $status = 'NotCheckin';
            } elseif ($booking_hotel->CheckingStatus == 1) {
                $status = 'Checkin';
            } elseif ($booking_hotel->CheckingStatus == 2) {
                $status = "Checkout";
            }
            $result[] = array("id" => "$bookinghotelid", "text" => "$firstname", "start" => $checkindate . "T12:00:00", "end" => $checkoutdate . "T00:00:00", "resource" => "$roomnumber", "bubbleHtml" => "Reservation details: <br\/>$checkindate<br\/> $checkoutdate", "status" => "$status", "paid" => "$total");
        }
        //IF(bookings.Status = 1, 'Approved', IF(bookings.Status = 2, 'Declined', IF(bookings.Status = 3, 'Cancel', 'Pending')
        /*
          $result = array(
          array("id"=>"10","text"=>"Mr. Gray","start"=>"2019-05-02T12:00:00","end"=>"2019-05-05T00:00:00","resource"=>"1","bubbleHtml"=>"Reservation details: <br\/>Mr. Gray","status"=>"New","paid"=>"0"),
          array("id"=>"13","text"=>"Mrs. Garc","start"=>"2019-05-06T00:00:00","end"=>"2019-05-10T00:00:00","resource"=>"2","bubbleHtml"=>"Reservation details: <br\/>Mrs. Garc\u00eda","status"=>"Arrived","paid"=>"0"),
          array("id"=>"14","text"=>"Mr. Jones","start"=>"2019-05-11T00:00:00","end"=>"2019-05-12T00:00:00","resource"=>"3","bubbleHtml"=>"Reservation details: <br\/>Mr. Jones","status"=>"CheckedOut","paid"=>"100"),
          array("id"=>"17","text"=>"Mr. Gray","start"=>"2019-05-12T00:00:00","end"=>"2019-05-18T12:00:00","resource"=>"2","bubbleHtml"=>"Reservation details: <br\/>Mrs. Garc\u00eda","status"=>"Arrived","paid"=>"0"),
          array("id"=>"20","text"=>"Mr. Jones","start"=>"2019-05-11T00:00:00","end"=>"2019-05-12T00:00:00","resource"=>"4","bubbleHtml"=>"Reservation details: <br\/>Mr. Jones","status"=>"CheckedOut","paid"=>"100"),
          );
         */
        header('Content-Type: application/json');
        echo json_encode($result);
        exit(0);
        //echo json_decode($result, true);
    }

}
