<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use DB;

class Feedbacks extends AdminController {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $Q = DB::table('feedbacks');
        $this->data['recordsTotal'] = count($Q->get());
        
        $hotels = DB::table('hotels')->lists('HotelName', 'HotelID');
        $this->data['hotels'] = ['All Hotel'];
        $this->data['hotels'] += $hotels;
        
        $users = DB::table('users')->select('UserID', DB::raw('CONCAT(FirstName, " ", LastName) as UName'))->lists('UName', 'UserID');
        $this->data['users'] = ['All Users'];
        $this->data['users'] += $users;
        
        return view('admin.feedbacks.index', $this->data);
    }

    public function feedbacks_list() {
        $hotel_id = 0;
        $user_id = 0;
        if (\Request::has('hotel_id')) {
            $hotel_id = (int) \Request::get('hotel_id');
        }
        if (\Request::has('user_id')) {
            $user_id = (int) \Request::get('user_id');
        }
        $start = (isset($_POST["start"]) ? (int) $_POST["start"] : 0);
        $length = (isset($_POST["length"]) ? (int) $_POST["length"] : 25);

        $columns = array("", "FeedbackID", "bookings.FirstName", "booking_hotels.HotelName", "Rating", "bookings.Status", "bookings.DateAdded", "bookings.DateModified", "");

        $query = DB::table('feedbacks')->select(['FeedbackID', 'bookings.FirstName', 'booking_hotels.HotelName', 'Rating',
                    DB::raw("CONCAT('<small class=\"label bg-', IF(feedbacks.Status = 0, 'red', 'green'), '\" ><i class=\"fa ', IF(feedbacks.Status = 0, 'fa-times', 'fa-check'), '\"></i> ', IF(feedbacks.Status = 1, 'Active', 'Deactive'), '</small>') AS Status"),
                    DB::raw("DATE_FORMAT(bookings.DateAdded, \"%d-%b-%Y<br>%r\") as DateAdded"),
                    DB::raw("DATE_FORMAT(bookings.DateModified, \"%d-%b-%Y<br>%r\") as DateModified")])
                ->leftjoin('bookings', 'feedbacks.BookingID', '=', 'bookings.BookingID')
                ->leftjoin('booking_hotels', 'feedbacks.BookingID', '=', 'booking_hotels.BookingID');

        if ($hotel_id != 0) {
            $query->where('feedbacks.HotelID', $hotel_id);
        }
        if ($user_id != 0) {
            $query->where('feedbacks.UserID', $user_id);
        }

        $recordsTotal = count($query->get());

        if (!empty($_POST['search']["value"])) {
            $input = strtolower(trim($_POST['search']["value"]));
            $query->whereRaw("(FeedbackID LIKE '%" . $input . "%' OR bookings.FirstName LIKE '%" . $input . "%' OR Rating LIKE '%" . $input . "%' OR booking_hotels.HotelName LIKE '%" . $input . "%' OR DATE_FORMAT(booking_hotels.CheckInDate, \"%d/%b/%Y\") LIKE '%" . $input . "%' OR DATE_FORMAT(booking_hotels.CheckOutDate, \"%d/%b/%Y\") LIKE '%" . $input . "%' OR DATE_FORMAT(booking_hotels.CheckInDate, \"%d-%b-%Y\") LIKE '%" . $input . "%' OR DATE_FORMAT(booking_hotels.CheckOutDate, \"%d-%b-%Y\") LIKE '%" . $input . "%')");
        }

        $query->orderBy($columns[(int) $_POST["order"][0]["column"]], strtoupper($_POST["order"][0]["dir"]));
        $query->orderBy("feedbacks.FeedbackID", "DESC");

        // limit acc to start and length
        $recordsFiltered = count($query->get());
        $result = $query->skip($start)->take($length)->get();
        // $maxRow = count($result);
        $data = [];
        foreach ($result as $Rs) {
            $data[] = array(
                "<input type=\"checkbox\" class=\"check\" name=\"ids[]\" value=\"" . $Rs->FeedbackID . "\" />",
                $Rs->FeedbackID,
                $Rs->FirstName,
                $Rs->HotelName,
                $Rs->Rating,
                $Rs->Status,
                $Rs->DateAdded,
                $Rs->DateModified,
                '<button type="button" class="btn btn-success btn-sm" onClick="location.href=\'feedbacks/' . $Rs->FeedbackID . '\'"><i class="fa fa-eye"></i> View</button>'
            );
        }

        echo json_encode(array("draw" => (int) $_POST["draw"], "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, "data" => $data));
        exit(0);
    }

    public function edit($id) {
        $query = DB::table('feedbacks');
        $query->where('FeedbackID', $id);

        $this->data['feedback'] = $query->first();

        if (empty($this->data['feedback'])) {
            return redirect('admin/feedbacks')->with('warning_msg', "Invalid Feedback ID");
        } else {
            $this->data['ratings'] = ['select rating', '1', '2', '3', '4', '5'];
            return view('admin.feedbacks.edit', $this->data);
        }
    }

    public function update($id) {
        DB::table('feedbacks')
                ->where('FeedbackID', $id)
                ->update([
                    'Rating' => Input::get('Rating'),
                    'Feedback' => Input::get('Feedback'),
                    'Status' => Input::get('Status'),
                    'DateModified' => new \DateTime]);
        return redirect('admin/feedbacks')->with('success', "Feedback updated successfully");
    }

    public function delete() {
        if (count(Input::get('ids')) > 0) {
            DB::table('feedbacks')
                    ->whereIn('FeedbackID', Input::get('ids'))
                    ->delete();
        }
        return redirect('admin/feedbacks')->with('success', "Selected Feedbacks Deleted Successfully");
    }

}
