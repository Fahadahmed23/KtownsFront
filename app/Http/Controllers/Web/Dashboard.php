<?php

namespace App\Http\Controllers\Web;
// use Storage;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use DB;

class Dashboard extends UserController {

    function __construct() {
        $this->data['User'] = DB::table('users')->where('UserID', \Session::get("UserID"))->first();
        parent::__construct();
    }

    public function index() {
        $this->data['User'] = DB::table('users')->where('UserID', \Session::get("UserID"))->first();
        $this->data['bookings']  = DB::table('bookings')
                ->select('booking_hotels.RoomQty', 'bookings.FirstName', 'bookings.cell', 'booking_hotels.HotelName', 'booking_hotels.CheckInDate', 'booking_hotels.CheckOutDate', 'booking_hotels.Adults', 'booking_hotels.Children', 'bookings.Status')
                ->join('booking_hotels', 'bookings.BookingID', '=', 'booking_hotels.BookingID')
                ->where('bookings.UserID', '=', \Session::get("UserID"))
                ->orderby('booking_hotels.BookingHotelID', 'desc')
                ->paginate(10);
        return view('dashboard', $this->data);
    }
    
    public function user_profile() {
        $this->data['User'] = DB::table('users')->where('UserID', \Session::get("UserID"))->first();
        return view('user-profile', $this->data);
    }

    public function update_user_profile() {

        $valid["FirstName"] = 'required|max:255';
        $valid_name["FirstName"] = "First Name";
        $valid["LastName"] = 'required|max:255';
        $valid_name["LastName"] = "Last Name";

//        $valid["EmailAddress"] = 'required|email|max:50|unique:users,EmailAddress,' . \Session::get("UserID") . ',UserID';
//        $valid_name["EmailAddress"] = "Email Address";
//        $valid["Cell"] = 'required|max:20';
//        $valid_name["Cell"] = "Cell";

        if (Input::has('Password') && Input::get('Password') != "") {
            $valid["Password"] = 'min:8|max:30';
            $valid_name["Password"] = "Password";

            $valid["CPassword"] = 'required|same:Password';
            $valid_name["CPassword"] = "Confirm Password";
        }
        $messages = [
            'required' => 'Please enter :attribute.',
//            'EmailAddress.email' => 'Please enter valid :attribute.'
        ];

        $v = Validator::make(Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            $Data['FirstName'] = Input::get('FirstName');
            $Data['LastName'] = Input::get('LastName');
            // $Data['profileImg'] = Input::get('profileImg');

            //  $this->validate($request, 
            // [
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ]);

            // $image = $request->file('image');
            // $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            // $destinationPath = public_path('/images');
            // $image->move($destinationPath, $input['imagename']);


            // $this->postImage->add($input);


//            $Data['EmailAddress'] = Input::get('EmailAddress');
//            $Data['Cell'] = Input::get('Cell');
            if (Input::has('Password') && Input::get('Password') != "") {
                $Data['Password'] = sha1(Input::get('Password'));
            }
            $Data['DateModified'] = new \DateTime;

            DB::table('users')->where('UserID', \Session::get("UserID"))->update($Data);

            return redirect("dashboard")->with("success_msg", "Profile updated successfully");
        }

        \Session::set('FirstName', Input::get('FirstName'));
        \Session::set('LastName', Input::get('LastName'));
//        \Session::set('Cell', Input::get('Cell'));
//        \Session::set('EmailAddress', Input::get('EmailAddress'));
        return redirect('dashboard');
    }

    public function my_payment() {
        $this->data['User'] = DB::table('users')->where('UserID', \Session::get("UserID"))->first();
        return view('user-payment', $this->data);
    }

    public function update_my_payment() {

        $valid["NameOnCard"] = 'max:255';
        $valid_name["NameOnCard"] = "Name On Card";
        $valid["CardNumber"] = 'max:30';
        $valid_name["CardNumber"] = "Card Number";
        $valid["ExpiryMonth"] = 'numeric|min:1|max:12';
        $valid_name["ExpiryMonth"] = "Month";
        $valid["ExpiryYear"] = 'numeric|min:2017|max:3017';
        $valid_name["ExpiryYear"] = "Year";
        $valid["CCV"] = 'numeric|min:1|max:999';
        $valid_name["CCV"] = "CCV";

        $v = Validator::make(Input::all(), $valid);
        $v->setAttributeNames($valid_name);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            $Data['NameOnCard'] = Input::get('NameOnCard');
            $Data['CardNumber'] = Input::get('CardNumber');
            if (Input::has('ExpiryMonth') && Input::get('ExpiryMonth') != "") {
                $Data['ExpiryMonth'] = Input::get('ExpiryMonth');
            }
            if (Input::has('ExpiryYear') && Input::get('ExpiryYear') != "") {
                $Data['ExpiryYear'] = Input::get('ExpiryYear');
            }
            if (Input::has('CCV') && Input::get('CCV') != "") {
                $Data['CCV'] = Input::get('CCV');
            }

            DB::table('users')->where('UserID', \Session::get("UserID"))->update($Data);

            return redirect("my-payments")->with("success_msg", "Payment details updated successfully");
        }
        return redirect('dashboard');
    }

    function logout() {
        \Session::flush();
        return redirect('login');
    }

}
