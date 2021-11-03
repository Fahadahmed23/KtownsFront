<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;

class ExperiencesBookings extends AdminController {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $Q = \DB::table('bookings');
        $this->data['recordsTotal'] = count($Q->get());

        return view('admin.experiences-bookings.index', $this->data);
    }

    public function bookings_list() {
        $status = -1;
        if (\Request::has('status')) {
            $status = (int) \Request::get('status');
        }
        $start = (isset($_POST["start"]) ? (int) $_POST["start"] : 0);
        $length = (isset($_POST["length"]) ? (int) $_POST["length"] : 25);

        $columns = array("", "experiences_booking.ExperiencesBookingID", "experiences_booking.FirstName", "experiences_booking.BookingTotal", "experiences_booking.Discount", "experiences_booking.PromoDiscount", "experiences_booking.TotalAmount", "experiences_booking.Status", "experiences_booking.DateAdded", "experiences_booking.DateModified");

        $query = \DB::table('experiences_booking')->select(['experiences_booking.ExperiencesBookingID', 'experiences_booking.FirstName', 'experiences_booking.BookingTotal', 'experiences_booking.Discount', 'experiences_booking.PromoDiscount', 'experiences_booking.TotalAmount',
                    DB::raw("CONCAT('<small class=\"label bg-', IF(experiences_booking.Status = 1, 'green', IF(experiences_booking.Status = 2, 'red', IF(experiences_booking.Status = 3, 'blue', 'yellow'))), '\" ><i class=\"fa ', IF(experiences_booking.Status = 1, 'fa-check', IF(experiences_booking.Status = 2, 'fa-times', IF(experiences_booking.Status = 3, 'fa-times', 'fa-clock-o'))), '\"></i> ', IF(experiences_booking.Status = 1, 'Approved', IF(experiences_booking.Status = 2, 'Declined', IF(experiences_booking.Status = 3, 'Cancel', 'Pending'))), '</small>') AS Status"),
                    DB::raw("DATE_FORMAT(experiences_booking.DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
                    DB::raw("DATE_FORMAT(experiences_booking.DateModified, \"%d-%b-%Y<br>%r\") as DateModified")])
                ->leftjoin('experiences_booking_tours', 'experiences_booking.ExperiencesBookingID', '=', 'experiences_booking_tours.ExperiencesBookingID');

        if ($status != -1) {
            $query->where('experiences_booking.Status', $status);
        }

        $recordsTotal = count($query->get());

        if (!empty($_POST['search']["value"])) {
            $input = strtolower(trim($_POST['search']["value"]));
            $query->whereRaw("(experiences_booking.BookingID LIKE '%" . $input . "%' OR experiences_booking.FirstName LIKE '%" . $input . "%' OR DATE_FORMAT(experiences_booking_tours.CheckInDate, \"%d/%b/%Y\") LIKE '%" . $input . "%' OR DATE_FORMAT(experiences_booking_tours.CheckOutDate, \"%d/%b/%Y\") LIKE '%" . $input . "%' OR DATE_FORMAT(experiences_booking_tours.CheckInDate, \"%d-%b-%Y\") LIKE '%" . $input . "%' OR DATE_FORMAT(experiences_booking_tours.CheckOutDate, \"%d-%b-%Y\") LIKE '%" . $input . "%')");
        }

        $query->orderBy($columns[(int) $_POST["order"][0]["column"]], strtoupper($_POST["order"][0]["dir"]));
        $query->orderBy("experiences_booking.ExperiencesBookingID", "DESC");

        // limit acc to start and length
        $recordsFiltered = count($query->get());
        $result = $query->skip($start)->take($length)->get();
        // $maxRow = count($result);
        $data = [];
        foreach ($result as $Rs) {
            $data[] = array(
                "<input type=\"checkbox\" class=\"check\" name=\"ids[]\" value=\"" . $Rs->ExperiencesBookingID . "\" />",
                $Rs->ExperiencesBookingID,
                $Rs->FirstName,
                "PKR " . number_format($Rs->BookingTotal, 0),
                "PKR " . number_format($Rs->Discount, 0),
                "PKR " . number_format($Rs->PromoDiscount, 0),
                "PKR " . number_format($Rs->TotalAmount, 0),
                $Rs->Status,
                $Rs->DateAdded,
                $Rs->DateModified,
                '<button type="button" class="btn btn-success btn-sm" onClick="location.href=\'experiences-bookings/' . $Rs->ExperiencesBookingID . '\'"><i class="fa fa-eye"></i> View</button>'
            );
        }

        echo json_encode(array("draw" => (int) $_POST["draw"], "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, "data" => $data));
        exit(0);
    }

    public function edit($id) {
        $query = \DB::table('experiences_booking');
        $query->where('ExperiencesBookingID', $id);

        $this->data['booking'] = $query->first();

        if (empty($this->data['booking'])) {
            return redirect('admin/experiences-bookings')->with('warning_msg', "Invalid Booking ID");
        } else {
            $query2 = \DB::table('experiences_booking_tours')->select(DB::raw('experiences_booking_tours.*, DATE_FORMAT(CheckInDate, "%d/%m/%Y") as CheckInDate, DATE_FORMAT(CheckOutDate, "%d/%m/%Y") as CheckOutDate'));
            $query2->where('ExperiencesBookingID', $id);
            $booking_hotels = $query2->get();
            $this->data['booking_hotels'] = $booking_hotels;
            return view('admin.experiences-bookings.view', $this->data);
        }
    }

    public function update($id) {
        
        $BookingDetail = DB::table('experiences_booking')
                ->select('experiences_booking.Status', 'experiences_booking.PaymentStatus', 'experiences_booking.FirstName', 'experiences_booking.Email', 'experiences_booking.TotalAmount', 'experiences_booking.Cell', 'experiences_booking_tours.ExperiencesName', 'experiences_booking_tours.RoomQty')
                ->leftjoin('experiences_booking_tours', 'experiences_booking.ExperiencesBookingID', '=', 'experiences_booking_tours.ExperiencesBookingID')
                ->where('experiences_booking_tours.ExperiencesBookingID', $id)
                ->first();

        $UserFName = $BookingDetail->FirstName;
        $HotelName = $BookingDetail->ExperiencesName;
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

        DB::table('experiences_booking')
                ->where('ExperiencesBookingID', $id)
                ->update(['Status' => \Input::get('Status'), 'PaymentStatus' => \Input::get('PaymentStatus'), 'DateModified' => new \DateTime]);
        

        $this->data['Booking'] = DB::table('experiences_booking')
                ->select(DB::raw('experiences_booking.*, DATE_FORMAT(DateAdded, "%d/%m/%Y") as DateAdded, DATE_FORMAT(DateModified, "%d/%m/%Y") as DateModified'))
                ->where('ExperiencesBookingID', $id)
                ->first();
        if (!empty($this->data['Booking'])) {
            $this->data['hotel'] = DB::table('experiences_booking_tours')
                            ->select(DB::raw('experiences_booking_tours.*, DATE_FORMAT(CheckInDate, "%d/%m/%Y") as CheckInDate, DATE_FORMAT(CheckOutDate, "%d/%m/%Y") as CheckOutDate'))
                            ->where('ExperiencesBookingID', $this->data['Booking']->ExperiencesBookingID)->first();
        }
        /*
        // status 1 = approve
        if ($HasStatusChanged && \Input::get('Status') == 1) {
            $pdf = \PDF::loadView('includes.booking.experiences-invoice', $this->data);
            $pdf->save(public_path('uploads') . '/booking-number-' . $id . '.pdf');

            $MsgContent = "Dear " . $UserFName . ", Experiences " . $HotelName . " for " . $RoomsQty . " Guests. Your booking has confirmed & Experiences Booking ID is " . $id . ". Thanks, KTown Rooms for Contact ";

            $EmailContent = "Dear " . $UserFName . ",<br> 
Experiences " . $HotelName . " for " . $RoomsQty . " Guests.
Your experiences booking has confirmed & Experiences Booking ID is " . $id;

            \Mail::send('includes.emails.booking', [
                "EmailContent" => $EmailContent,
                "BookingID" => $id
                    ]
                    , function($message) use ($mailFrom, $id, $ToEmailAddress) {
                $message->to($ToEmailAddress)
                        ->from($mailFrom, 'K Town Rooms')
                        ->subject('K Town Rooms - Experiences Booking Confirmation')
                        ->attach(realpath('public/uploads/experiences-number-' . $id . '.pdf'), ['mime' => 'application/pdf']);
            });

            if (\File::exists(public_path('uploads') . '/experiences-number-' . $id . '.pdf')) {
                \File::delete(public_path('uploads') . '/experiences-number-' . $id . '.pdf');
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
            $pdf = \PDF::loadView('includes.booking.experiences-invoice', $this->data);
            $pdf->save(public_path('uploads') . '/experiences-number-' . $id . '.pdf');

            $MsgContent = "Dear " . $UserFName . ", Experiences Name " . $HotelName . " for " . $RoomsQty . " rooms. Your booking has cancelled. KTown Rooms";

            $EmailContent = "Dear " . $UserFName . ",<br> 
Experiences " . $HotelName . " for " . $RoomsQty . " guests.
Your experiences has cancelled";

            \Mail::send('includes.emails.booking', [
                "EmailContent" => $EmailContent,
                "BookingID" => $id
                    ]
                    , function($message) use ($mailFrom, $id, $ToEmailAddress) {
                $message->to($ToEmailAddress)
                        ->from($mailFrom, 'K Town Rooms')
                        ->subject('K Town Rooms - Experiences Booking Confirmation')
                        ->attach(realpath('public/uploads/experiences-number-' . $id . '.pdf'), ['mime' => 'application/pdf']);
            });

            if (\File::exists(public_path('uploads') . '/experiences-number-' . $id . '.pdf')) {
                \File::delete(public_path('uploads') . '/experiences-number-' . $id . '.pdf');
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

            $pdf = \PDF::loadView('includes.booking.experiences-invoice', $this->data);
            $pdf->save(public_path('uploads') . '/experiences-number-' . $id . '.pdf');

            $MsgContent = "Dear " . $UserFName . ", Successfully Paid. Total amount of your " . $HotelName . " booking is PKR " . $TotalAmount . ". Thanks, KTown Rooms";

            $EmailContent = "Dear " . $UserFName . ",<br>Successfully Paid. Total amount of your " . $HotelName . " booking is PKR " . $TotalAmount . ".";

            \Mail::send('includes.emails.booking', [
                "EmailContent" => $EmailContent,
                "BookingID" => $id
                    ]
                    , function($message) use ($mailFrom, $id, $ToEmailAddress) {
                $message->to($ToEmailAddress)
                        ->from($mailFrom, 'K Town Rooms')
                        ->subject('K Town Rooms - Payment Received')
                        ->attach(realpath('public/uploads/experiences-number-' . $id . '.pdf'), ['mime' => 'application/pdf']);
            });

            if (\File::exists(public_path('uploads') . '/experiences-number-' . $id . '.pdf')) {
                \File::delete(public_path('uploads') . '/experiences-number-' . $id . '.pdf');
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
        */
        return redirect('admin/experiences-bookings/' . $id)->with('success', "Status updated successfully");
    }

    public function delete() {
        if (count(\Input::get('ids')) > 0) {
            DB::table('experiences_booking')
                    ->whereIn('ExperiencesBookingID', \Input::get('ids'))
                    ->delete();
        }
        return redirect('admin/experiences-bookings')->with('success', "Selected Experiences Bookings Deleted Successfully");
    }

}
