<?php

// h{pe@d2-DXT}

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use DB;

class Report extends AdminController {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $Q = \DB::table('bookings');
        $this->data['recordsTotal'] = count($Q->get());

        return view('admin.report.index', $this->data);
    }

    public function report_list() {
        $UserType = ["", "Customer", "Corporate", "Travel Agent"];
        $start = (isset($_POST["start"]) ? (int) $_POST["start"] : 0);
        $length = (isset($_POST["length"]) ? (int) $_POST["length"] : 25);

        $columns = array("UserType", "HotelName", "HotelClass", "RoomQty", "RoomQty", "Status", "TotalAmount", "DateAdded", "DateModified");

        $query = \DB::table('bookings')->select(['bookings.BookingID', 'UserType', 'HotelName', 'HotelClass', 'RoomQty', 'bookings.Discount', 'PromoDiscount', 'TotalAmount', "booking_hotels.CheckInDate", "booking_hotels.CheckOutDate", "booking_hotels.PartnerPrice",
                    DB::raw("CONCAT('<small class=\"label bg-', IF(bookings.Status = 1, 'green', IF(bookings.Status = 2, 'red', 'yellow')), '\" ><i class=\"fa ', IF(bookings.Status = 1, 'fa-check', 'fa-times'), '\"></i> ', IF(bookings.Status = 1, 'Approved', IF(bookings.Status = 2, 'Declined', 'Pending')), '</small>') AS Status")])
                ->leftjoin('users', 'bookings.UserID', '=', 'users.UserID')
                ->leftjoin('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID');

        $recordsTotal = count($query->get());

        if (!empty($_POST['search']["value"])) {
            $input = strtolower(trim($_POST['search']["value"]));
            $query->whereRaw("(HotelName LIKE '%" . $input . "%' OR HotelClass LIKE '%" . $input . "%' OR UserType LIKE '%" . $input . "%')");
        }

        $query->orderBy($columns[(int) $_POST["order"][0]["column"]], strtoupper($_POST["order"][0]["dir"]));
        $query->orderBy("bookings.BookingID", "DESC");

        // limit acc to start and length
        $recordsFiltered = count($query->get());
        $result = $query->skip($start)->take($length)->get();
        // $maxRow = count($result);
        $data = [];
        foreach ($result as $Rs) {

            $ckidate = date_create($Rs->CheckInDate);
            $ckodate = date_create($Rs->CheckOutDate);
            $diff = date_diff($ckidate, $ckodate);
            $myDiff = $diff->format("%R%a");
            $data[] = array(
                $UserType[$Rs->UserType],
                $Rs->HotelName,
                $Rs->HotelClass,
                $Rs->RoomQty,
                (int) $myDiff,
                $Rs->Status,
                "PKR " . number_format($Rs->TotalAmount, 0),
                "PKR " . number_format(($myDiff * $Rs->PartnerPrice), 0),
                "PKR " . number_format(($Rs->TotalAmount - ($myDiff * $Rs->PartnerPrice)), 0),
            );
        }

        echo json_encode(array("draw" => (int) $_POST["draw"], "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, "data" => $data));
        exit(0);
    }

}
