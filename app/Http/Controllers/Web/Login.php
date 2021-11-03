<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Input;
use Validator,
    DB,
    Socialite;

class Login extends WebController {

    function __construct(Socialite $socialite) {
        parent::__construct();
        $this->socialite = $socialite;
    }

    public function index() {
        $this->data['my_msg'] = "";
        if (\Request::has('m')) {
            $this->data['my_msg'] = "<br>Note: Your account has been successfully verified.";
//            \Session::flash('success_msg', 'We have sent an account activation code to your Email Address, please click that link in the email or enter the activation code below.');
        }
        if (\Session::has('CustomerLogin') && \Session::get('CustomerLogin')) {
            return redirect('dashboard');
        }
        return view('login', $this->data);
    }

    public function validate_login() {

        $merror = false;
        if (trim(Input::get('EmailAddress')) == "") {
            $merror = true;
        } else if (trim(Input::get('Password')) == "") {
            $merror = true;
        }

        if ($merror) {
            echo json_encode(['error' => true, 'message' => "Please insert email and password."]);
            die;
        } else {
            $user = \DB::table('users')
                    ->whereRaw(("EmailAddress = '".\Input::get('EmailAddress')."' OR Cell = '".\Input::get('EmailAddress')."'"))
                    ->where('Status', 1)
                    ->first();
            if (!empty($user)) {
                if (sha1(\Input::get('Password')) == $user->Password) {
//                    if ($user->IsVerified == 0) {
//                        echo json_encode(['error' => true, 'message' => "Your account is not verified yet."]);
//                    } 
//                    else
                        if ($user->IsActivated == 0) {
                        echo json_encode(['error' => true, 'message' => "Your account is not activated yet."]);
//                        return redirect()->back()->withErrors("Your account is not activated yet.")->withInput();
                    } else {
                        \Session::set('CustomerLogin', true);
                        \Session::set('UserType', $user->UserType);
                        \Session::set("UserID", $user->UserID);
                        \Session::set('FirstName', $user->FirstName);
                        \Session::set('LastName', $user->LastName);
                        \Session::set('Cell', $user->Cell);
                        \Session::set('EmailAddress', $user->EmailAddress);
                        \Session::set('IsAdminCorporate', $user->IsAdminCorporate);
//                        return redirect('dashboard');
                        if (\Session::has('RoomsCart') && count(\Session::get('RoomsCart')) > 0) {
                            echo json_encode(['error' => false, 'type' => "cart"]);
//                            return redirect('/cart');
                        } else if (\Session::has('ExperiencesCart') && count(\Session::get('ExperiencesCart')) > 0) {
                            return url()->previous();
                            //echo json_encode(['error' => false, 'type' => "experiences-cart"]);
                            
                        } else {
                            echo json_encode(['error' => false, 'type' => "dashboard"]);
//                            return redirect('/dashboard');
                        }
                    }
                } else {
                    echo json_encode(['error' => true, 'message' => "Invalid Email Address / Password."]);
//                    return redirect()->back()->withErrors("Invalid Email Address / Password")->withInput();
                }
            } else {
                echo json_encode(['error' => true, 'message' => "Invalid Email Address / Password."]);
//                return redirect()->back()->withErrors("Invalid Email Address / Password")->withInput();
            }
        }
    }

}
