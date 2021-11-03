<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;
date_default_timezone_set('asia/karachi');
class Bookings extends AdminController {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $Q = \DB::table('bookings');
        $this->data['recordsTotal'] = count($Q->get());

        return view('admin.bookings.index', $this->data);
    }

    public function bookings_list() {
        $status = -1;
        if (\Request::has('status')) {
            $status = (int) \Request::get('status');
        }
        $start = (isset($_POST["start"]) ? (int) $_POST["start"] : 0);
        $length = (isset($_POST["length"]) ? (int) $_POST["length"] : 25);

        $columns = array("", "bookings.BookingID", "bookings.FirstName", "bookings.BookingTotal", "bookings.Discount", "bookings.PromoDiscount", "bookings.TotalAmount", "bookings.Status", "bookings.DateAdded", "bookings.DateModified");

        $query = \DB::table('bookings')->select(['bookings.BookingID', 'bookings.FirstName', 'bookings.BookingTotal', 'bookings.Discount', 'bookings.PromoDiscount', 'bookings.TotalAmount',
                    DB::raw("CONCAT('<small class=\"label bg-', IF(bookings.Status = 1, 'green', IF(bookings.Status = 2, 'red', IF(bookings.Status = 3, 'blue', 'yellow'))), '\" ><i class=\"fa ', IF(bookings.Status = 1, 'fa-check', IF(bookings.Status = 2, 'fa-times', IF(bookings.Status = 3, 'fa-times', 'fa-clock-o'))), '\"></i> ', IF(bookings.Status = 1, 'Approved', IF(bookings.Status = 2, 'Declined', IF(bookings.Status = 3, 'Cancel', 'Pending'))), '</small>') AS Status"),
                    DB::raw("DATE_FORMAT(bookings.DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
                    DB::raw("DATE_FORMAT(bookings.DateModified, \"%d-%b-%Y<br>%r\") as DateModified")])
                ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID');

        if ($status != -1) {
            $query->where('bookings.Status', $status);
        }

        $recordsTotal = count($query->get());

        if (!empty($_POST['search']["value"])) {
            $input = strtolower(trim($_POST['search']["value"]));
            $query->whereRaw("(bookings.BookingID LIKE '%" . $input . "%' OR bookings.FirstName LIKE '%" . $input . "%' OR DATE_FORMAT(booking_hotels.CheckInDate, \"%d/%b/%Y\") LIKE '%" . $input . "%' OR DATE_FORMAT(booking_hotels.CheckOutDate, \"%d/%b/%Y\") LIKE '%" . $input . "%' OR DATE_FORMAT(booking_hotels.CheckInDate, \"%d-%b-%Y\") LIKE '%" . $input . "%' OR DATE_FORMAT(booking_hotels.CheckOutDate, \"%d-%b-%Y\") LIKE '%" . $input . "%')");
        }

        $query->orderBy($columns[(int) $_POST["order"][0]["column"]], strtoupper($_POST["order"][0]["dir"]));
        $query->orderBy("bookings.BookingID", "DESC");

        // limit acc to start and length
        $recordsFiltered = count($query->get());
        $result = $query->skip($start)->take($length)->get();
        // $maxRow = count($result);
        $data = [];
        foreach ($result as $Rs) {
            $data[] = array(
                "<input type=\"checkbox\" class=\"check\" name=\"ids[]\" value=\"" . $Rs->BookingID . "\" />",
                $Rs->BookingID,
                $Rs->FirstName,
                "PKR " . number_format($Rs->BookingTotal, 0),
                "PKR " . number_format($Rs->Discount, 0),
                "PKR " . number_format($Rs->PromoDiscount, 0),
                "PKR " . number_format($Rs->TotalAmount, 0),
                $Rs->Status,
                $Rs->DateAdded,
                $Rs->DateModified,
                '<button type="button" class="btn btn-success btn-sm" onClick="location.href=\'bookings/' . $Rs->BookingID . '\'"><i class="fa fa-eye"></i> View</button>'
            );
        }

        echo json_encode(array("draw" => (int) $_POST["draw"], "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, "data" => $data));
        exit(0);
    }

    public function edit($id) {
        $query = \DB::table('bookings');
        $query->where('BookingID', $id);

        $this->data['booking'] = $query->first();

        if (empty($this->data['booking'])) {
            return redirect('admin/bookings')->with('warning_msg', "Invalid Booking ID");
        } else {
            $query2 = \DB::table('booking_hotels')->select(DB::raw('booking_hotels.*, DATE_FORMAT(CheckInDate, "%d/%m/%Y") as CheckInDate, DATE_FORMAT(CheckOutDate, "%d/%m/%Y") as CheckOutDate'));
            $query2->where('BookingID', $id);

            $this->data['booking_hotels'] = $query2->get();
            return view('admin.bookings.view', $this->data);
        }
    }

    public function update($id) {
        $BookingDetail = DB::table('bookings')
                ->select('bookings.Status', 'bookings.PaymentStatus', 'bookings.FirstName', 'bookings.Email', 'bookings.TotalAmount', 'bookings.Cell', 'booking_hotels.HotelName', 'booking_hotels.RoomQty')
                ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                ->where('bookings.BookingID', $id)
                ->first();

        $UserFName = $BookingDetail->FirstName;
        $HotelName = $BookingDetail->HotelName;
        $RoomsQty = $BookingDetail->RoomQty;
        $ToEmailAddress = $BookingDetail->Email;
        $UserCellNo = $BookingDetail->Cell;
        $TotalAmount = $BookingDetail->TotalAmount;

        $mailFrom = $this->data['emails']->BookingEmail;

        $HasStatusChanged = false;
        $HasPaymentChanged = false;

        if ($BookingDetail->Status != \Input::get('Status')) {
            $HasStatusChanged = true;
        }
        if ($BookingDetail->PaymentStatus != \Input::get('PaymentStatus')) {
            $HasPaymentChanged = true;
        }

        DB::table('bookings')
                ->where('BookingID', $id)
                ->update(['Status' => \Input::get('Status'), 'PaymentStatus' => \Input::get('PaymentStatus'), 'DateModified' => new \DateTime]);

        $this->data['Booking'] = DB::table('bookings')
                ->select(DB::raw('bookings.*, DATE_FORMAT(DateAdded, "%d/%m/%Y") as DateAdded, DATE_FORMAT(DateModified, "%d/%m/%Y") as DateModified'))
                ->where('BookingID', $id)
                ->first();
        if (!empty($this->data['Booking'])) {
            $this->data['hotel'] = DB::table('booking_hotels')
                            ->select(DB::raw('booking_hotels.*, DATE_FORMAT(CheckInDate, "%d/%m/%Y") as CheckInDate, DATE_FORMAT(CheckOutDate, "%d/%m/%Y") as CheckOutDate'))
                            ->where('BookingID', $this->data['Booking']->BookingID)->first();
        }

        // status 1 = approve
        if ($HasStatusChanged && \Input::get('Status') == 1) {
            // $pdf = \PDF::loadView('includes.booking.invoice', $this->data);
            // $pdf->save(public_path('uploads') . '/booking-number-' . $id . '.pdf');

            $MsgContent = "Dear " . $UserFName . ", Hotel " . $HotelName . " for " . $RoomsQty . " rooms. Your booking has confirmed & Booking ID is " . $id . ". Thanks, KTown Rooms Contact us 021 34688335";

            $EmailContent = "Dear " . $UserFName . ",<br> 
            We can confirm that your reservation at KTown Rooms & Homes at <strong>".$this->data['hotel']->Address2."</strong> has been approved. You don’t need to take further action, but if you have any queries for the property, call at +92 311 1222418.<br><br>Regards,<br>KTown Rooms";

            $subject = "Booking Approved for KTown Rooms & Homes (Booking No. ".$this->data['Booking']->BookingCode.")";

            \Mail::send('includes.emails.booking', [
                "EmailContent" => $EmailContent,
                "BookingID" => $id
                    ]
                    , function($message) use ($mailFrom, $id, $ToEmailAddress,$subject) {
                $message->to($ToEmailAddress)
                        ->from($mailFrom, 'K Town Rooms')
                        ->subject($subject);
                        // ->attach(realpath('public/uploads/booking-number-' . $id . '.pdf'), ['mime' => 'application/pdf']);
            });

            if (\File::exists(public_path('uploads') . '/booking-number-' . $id . '.pdf')) {
                \File::delete(public_path('uploads') . '/booking-number-' . $id . '.pdf');
            }

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
        }

        // status 3 = cancel
        if ($HasStatusChanged && \Input::get('Status') == 3) {
            // $pdf = \PDF::loadView('includes.booking.invoice', $this->data);
            // $pdf->save(public_path('uploads') . '/booking-number-' . $id . '.pdf');

            $MsgContent = "Dear " . $UserFName . ", Hotel " . $HotelName . " for " . $RoomsQty . " rooms. Your booking has cancelled. KTown Rooms Contact us 021 34688335";

            $EmailContent = "Dear " . $UserFName . ",<br> 
            We can confirm that your reservation at KTown Rooms & Homes at <strong>".$this->data['hotel']->Address2."</strong> has been cancelled. You don’t need to take further action, but if you have any queries for the property, call at +92 311 1222418.<br><br>Regards,<br>KTown Rooms";

            $subject = "Booking Cancelled for KTown Rooms & Homes (Booking No. ".$this->data['Booking']->BookingCode.")";

            \Mail::send('includes.emails.booking', [
                "EmailContent" => $EmailContent,
                "BookingID" => $id
                    ]
                    , function($message) use ($mailFrom, $id, $ToEmailAddress,$subject) {
                $message->to($ToEmailAddress)
                        ->from($mailFrom, 'K Town Rooms')
                        ->subject($subject);
                        // ->attach(realpath('public/uploads/booking-number-' . $id . '.pdf'), ['mime' => 'application/pdf']);
            });

            if (\File::exists(public_path('uploads') . '/booking-number-' . $id . '.pdf')) {
                \File::delete(public_path('uploads') . '/booking-number-' . $id . '.pdf');
            }

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
        }

        if ($HasPaymentChanged && \Input::get('PaymentStatus') == 1) {

            $pdf = \PDF::loadView('includes.booking.invoice', $this->data);
            $pdf->save(public_path('uploads') . '/booking-number-' . $id . '.pdf');

            $MsgContent = "Dear " . $UserFName . ", Successfully Paid. Total amount of your " . $HotelName . " booking is PKR " . $TotalAmount . ". Thanks, KTown Rooms Contact us 021 34688335";

            $EmailContent = "Dear " . $UserFName . ",<br>Successfully Paid. Total amount of your " . $HotelName . " booking is PKR " . $TotalAmount . ".";

            \Mail::send('includes.emails.booking', [
                "EmailContent" => $EmailContent,
                "BookingID" => $id
                    ]
                    , function($message) use ($mailFrom, $id, $ToEmailAddress) {
                $message->to($ToEmailAddress)
                        ->from($mailFrom, 'K Town Rooms')
                        ->subject('K Town Rooms - Payment Received')
                        ->attach(realpath('public/uploads/booking-number-' . $id . '.pdf'), ['mime' => 'application/pdf']);
            });

            if (\File::exists(public_path('uploads') . '/booking-number-' . $id . '.pdf')) {
                \File::delete(public_path('uploads') . '/booking-number-' . $id . '.pdf');
            }

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
        }

        return redirect('admin/bookings/' . $id)->with('success', "Status updated successfully");
    }

    public function delete() {
        if (count(\Input::get('ids')) > 0) {
            DB::table('bookings')
                    ->whereIn('BookingID', \Input::get('ids'))
                    ->delete();
        }
        return redirect('admin/bookings')->with('success', "Selected Bookings Deleted Successfully");
    }

}
