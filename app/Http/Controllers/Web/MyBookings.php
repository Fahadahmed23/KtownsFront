<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Input;
use Validator,
    DB;

class MyBookings extends UserController {

    function __construct() {
        $this->data['User'] = DB::table('users')->where('UserID', \Session::get("UserID"))->first();
        $this->data['bookings']=DB::table('bookings')
                ->select('BookingID', 'BookingTotal', 'Discount', 'PromoDiscount', 'TotalAmount', 'Status', 'DateAdded')
                ->where('UserID','=',\Session::get("UserID"))
                ->orderby('BookingID','DESC')
                ->paginate(10);
        parent::__construct();
    }

    public function index() {
        $Q = \DB::table('bookings');
        $this->data['recordsTotal'] = count($Q->get());

        return view('my-bookings', $this->data);
    }

    public function bookings_list() {
        $start = (isset($_POST["start"]) ? (int) $_POST["start"] : 0);
        $length = (isset($_POST["length"]) ? (int) $_POST["length"] : 25);

        $query = \DB::table('bookings')->select(['BookingID', 'FirstName', 'BookingTotal', 'Discount', 'PromoDiscount', 'TotalAmount',
                    DB::raw("CONCAT('<small class=\"label bg-', IF(bookings.Status = 1, 'green', IF(bookings.Status = 2, 'red', IF(bookings.Status = 3, 'blue', 'yellow'))), '\" ><i class=\"fa ', IF(bookings.Status = 1, 'fa-check', IF(bookings.Status = 2, 'fa-times', IF(bookings.Status = 3, 'fa-times', 'fa-clock-o'))), '\"></i> ', IF(bookings.Status = 1, 'Approved', IF(bookings.Status = 2, 'Declined', IF(bookings.Status = 3, 'Cancel', 'Pending'))), '</small>') AS Status"),
                    DB::raw("DATE_FORMAT(DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
                    DB::raw("DATE_FORMAT(DateModified, \"%d-%b-%Y<br>%r\") as DateModified")])
                ->where('UserID', \Session::get('UserID'));

        $recordsTotal = count($query->get());
        $query->orderBy("BookingID", "DESC");

        $recordsFiltered = count($query->get());
        $result = $query->skip($start)->take($length)->get();
        $data = [];
        foreach ($result as $Rs) {
            $data[] = array(
                "PKR " . number_format($Rs->BookingTotal, 0),
                "PKR " . number_format($Rs->Discount, 0),
                "PKR " . number_format($Rs->PromoDiscount, 0),
                "PKR " . number_format($Rs->TotalAmount, 0),
                $Rs->Status,
                $Rs->DateAdded,
                '<button type="button" class="btn btn-success btn-sm" onClick="location.href=\'my-bookings/' . $Rs->BookingID . '\'"><i class="fa fa-eye"></i> View</button>'
            );
        }

        echo json_encode(array("draw" => (int) $_POST["draw"], "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, "data" => $data));
        exit(0);
    }

    public function view($id) {
        $this->data['booking'] = \DB::table('bookings')
                        ->where('UserID', \Session::get('UserID'))
                        ->where('BookingID', $id)->first();

        if (empty($this->data['booking'])) {
            return redirect('my-bookings')->with('warning_msg', "Invalid Booking");
        } else {
            $query2 = \DB::table('booking_hotels')->select(DB::raw('booking_hotels.*, DATE_FORMAT(CheckInDate, "%d/%m/%Y") as CheckInDate, DATE_FORMAT(CheckOutDate, "%d/%m/%Y") as CheckOutDate'));
            $query2->where('BookingID', $id);

            $this->data['booking_hotels'] = $query2->get();
            return view('my-booking-details', $this->data);
        }
    }

    public function cancel_booking($id) {
        $booking = \DB::table('bookings')
                        ->where('UserID', \Session::get('UserID'))
                        ->where('BookingID', $id)->first();

        if (empty($booking)) {
            return redirect('my-bookings')->with('warning_msg', "Invalid Booking");
        } else {
            if ($booking->Status == 0 || $booking->Status == 1) {
                \DB::table('bookings')->where('BookingID', $id)->where('UserID', \Session::get('UserID'))->update(['Status' => 3]);

                // sinding sms to admin
                // send sms
                $to2 = $this->data['smsAdminTo'];
                $message2 = "Booking id: " . $id . " has been canceled by user";
                $url = "http://Lifetimesms.com/plain?username=" . $this->data['smsUsername'] . "&password=" . $this->data['smsPassword'] . "&to=" . $to2 . "&from=" . urlencode($this->data['smsFrom']) . "&message=" . urlencode($message2) . "";

                $ch2 = curl_init();
                $timeout2 = 30;
                curl_setopt($ch2, CURLOPT_URL, $url);
                curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch2, CURLOPT_CONNECTTIMEOUT, $timeout2);
                $response2 = curl_exec($ch2);
                curl_close($ch2);

                $AdminMailFrom = "info@ktownrooms.com";
                $AdminEmail = $this->data['AdminEmail'];

                \Mail::send('admin.includes.emails.cancel-booking', [
                    "FirstName" => "KTown",
                    "BookingID" => $id
                        ]
                        , function($message) use ($AdminMailFrom, $AdminEmail) {
                    $message->to($AdminEmail)->from($AdminMailFrom, 'K Town Rooms')->subject('K Town Rooms - Booking canceled by user');
                });

                return redirect('my-bookings/' . $id)->with('success', "Booking canceled successfully");
            } else {
                return redirect()->back()->with('warning_msg', "Booking already canceled or declined");
            }
        }
    }

}
