<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Input;
use Validator,
    DB;

class Signup extends WebController {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        return view('register', $this->data);
    }

    public function checkCodeAvail($code) {
        $CheckCodeAvail = DB::table('users')->where('ActivationCode', $code)->get();
        if (count($CheckCodeAvail) > 0) {
            $CellActivationCode = sprintf("%04d", mt_rand(1, 9999));
            $this->checkCodeAvail($CellActivationCode);
        } else {
            return $code;
        }
    }

    public function submit() {
//        dd(Input::all());
        $merror = false;
        if (trim(Input::get('FirstName')) == "") {
            $merror = true;
        } else if (trim(Input::get('LastName')) == "") {
            $merror = true;
        } else if (trim(Input::get('Cell')) == "") {
            $merror = true;
        } else if (trim(Input::get('EmailAddress')) == "") {
            $merror = true;
        } else if (trim(Input::get('Password')) == "") {
            $merror = true;
        } else if (trim(Input::get('ConfirmPassword')) == "") {
            $merror = true;
        }

        if (!$merror) {
            $valid["FirstName"] = 'max:255';
            $valid_name["FirstName"] = "First Name";
            $valid["LastName"] = 'max:255';
            $valid_name["LastName"] = "Last Name";
            $valid["Cell"] = 'max:20|unique:users';
            $valid_name["Cell"] = "Cell";
            $valid["EmailAddress"] = 'email|max:50|unique:users';
            $valid_name["EmailAddress"] = "Email Address";
            $valid["Password"] = 'max:30';
            $valid_name["Password"] = "Password";
            $valid["ConfirmPassword"] = 'same:Password';
            $valid_name["ConfirmPassword"] = "Confirm Password";
        } else {
            echo json_encode(['error' => true, 'message' => "Please insert all fields."]);
            die;
        }

        $messages = [
            'required' => 'Please enter :attribute.',
            'EmailAddress.email' => 'Please enter valid :attribute.',
            'EmailAddress.unique' => 'Email Address already registered.',
            'Cell.unique' => 'The Cell no. has already registered.',
        ];

        $v = Validator::make(Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);
        if ($v->fails()) {
            $errorMsg = "";
            foreach ($v->errors()->messages() as $err) {
                $errorMsg .= ($errorMsg == "" ? $err[0] : "<br>" . $err[0]);
            }
            echo json_encode(['error' => true, 'message' => $errorMsg]);
//            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            $Password = Input::get('Password');
            $CellActivationCode = sprintf("%04d", mt_rand(1, 9999));
            $code = $this->checkCodeAvail($CellActivationCode);
            $UserData = [
                'UserType' => 1,
                'FirstName' => Input::get('FirstName'),
                'LastName' => Input::get('LastName'),
                'Cell' => Input::get('Cell'),
                'EmailAddress' => Input::get('EmailAddress'),
                'Password' => sha1($Password),
                'ActivationCode' => $code,
                'Status' => 1,
                'IsActivated' => 1,
                "DateAdded" => new \DateTime
            ];

            DB::table('users')->insert($UserData);
            $UserID = DB::getPdo()->lastInsertId();

            $ActivationCode = sprintf("%06d", mt_rand(1, 999999)) . '_' . $UserID;
            //$smsUsername = 'ktownsmsaccount';
            //$smsPassword = 'ktownsmsaccount';
            //$smsFrom = 'Brand';
            
            // send sms
            $to = Input::get('Cell');
            $message = 'Your activation code is: ' . $code . ', '
                    . 'Thanks, '
                    . 'KTown Rooms';
            $url = "http://Lifetimesms.com/plain?username=" . $this->data['smsUsername'] . "&password=" . $this->data['smsPassword'] . "&to=" . $to . "&from=" . urlencode($this->data['smsFrom']) . "&message=" . urlencode($message) . "";
            //$url = "http://Lifetimesms.com/plain?username=" . $smsUsername . "&password=" . $smsPassword . "&to=" . $to . "&from=" . urlencode($smsFrom) . "&message=" . urlencode($message) . "";
            $ch = curl_init();
            $timeout = 30;
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            $response = curl_exec($ch);
            curl_close($ch);
            // send sms end

            DB::table("users")
                    ->where("UserID", $UserID)
                    ->update(["VerificationCode" => $ActivationCode]);

            $mailFrom = $this->data['emails']->SignupEmail;

            \Mail::send('includes.emails.register', [
                "FirstName" => Input::get('FirstName'),
                "LastName" => Input::get('LastName'),
                "VerificationLink" => url('verify-account/' . $ActivationCode)
                    ]
                    , function($message) use ($mailFrom) {
                $message->to(Input::get('EmailAddress'))->from($mailFrom, 'K Town Rooms')->subject('K Town Rooms - Email Verification');
            });

            $AdminMailFrom = "info@ktownrooms.com";
            $AdminEmail = $this->data['AdminEmail'];

            \Mail::send('admin.includes.emails.signup', [
                "FirstName" => Input::get('FirstName'),
                "LastName" => Input::get('LastName'),
                "Cell" => Input::get('Cell'),
                "EmailAddress" => Input::get('EmailAddress')
                    ]
                    , function($message) use ($AdminMailFrom, $AdminEmail) {
                $message->to($AdminEmail)->from($AdminMailFrom, 'K Town Rooms')->subject('K Town Rooms - New User');
            });

            echo json_encode(['error' => false, 'message' => "We have sent an account activation code to your Email Address, please click that link in the email or enter the activation code below."]);
//            return redirect("account-activation")->with("success_msg", "We have sent an account activation code to your Email Address, please click that link in the email or enter the activation code below.");
        }
    }

    function account_activation() {
        $this->data['my_msg'] = "";
        if (\Request::has('m')) {
            $this->data['my_msg'] = "<br>Note: We have sent you a message of activation code. Please insert to proceed it.";
//            \Session::flash('success_msg', 'We have sent an account activation code to your Email Address, please click that link in the email or enter the activation code below.');
        }
        return view('activate-account', $this->data);
    }

    function vlidate_activate_code() {
        if (empty(Input::get("ActivationCode"))) {
            return redirect("account-activation")->withErrors(["errors" => "Invalid activation code."]);
        } else {
            $user = DB::table("users")->select("UserID")
                            ->where("ActivationCode", Input::get("ActivationCode"))
                            ->where("IsActivated", 0)->first();

            if (empty($user)) {
                return redirect("account-activation")->with(["warning_msg" => "Invalid account activation code, or your account is already activated."]);
            } else {
                DB::table("users")
                        ->where("UserID", $user->UserID)
                        ->update(["VerificationCode" => '', 'IsVerified' => 1, "ActivationCode" => '', 'IsActivated' => 1]);
                return redirect("login")->with("success_msg", "Your account has been successfully activated.");
            }
        }
    }

    function vlidate_verification_link($VerifyCode) {
        if ($VerifyCode == "") {
            return redirect("login")->withErrors(["errors" => "Invalid verification link"]);
        } else {
            $user = DB::table("users")->select("UserID")
                            ->where("VerificationCode", $VerifyCode)
                            ->where("IsVerified", 0)->first();

            if (count($user) == 0) {
                return redirect("login")->with(["warning_msg" => "Invalid verification link, or your account is already verified."]);
            } else {
                DB::table("users")
                        ->where("UserID", $user->UserID)
                        ->update(["VerificationCode" => '', 'IsVerified' => 1 , "ActivationCode" => '', 'IsActivated' => 1 ]);
                return redirect("login?m=true");
            }
        }
    }

    function forgot_password() {
        return view('forgot-password', $this->data);
    }

    function validate_email() {
        $valid["EmailAddress"] = 'required|email|max:255';
        $valid_name["EmailAddress"] = "Email Address";

        $messages = [
            'required' => 'Please enter :attribute.',
            'EmailAddress.email' => 'Please enter valid :attribute.',
        ];

        $v = Validator::make(Input::all(), $valid, $messages);
        $v->setAttributeNames($valid_name);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            $check_user = DB::table("users")->select("UserID", "FirstName", "LastName", "EmailAddress")
                    ->where("EmailAddress", Input::get("EmailAddress"))
                    ->first();

                   
            if (count((array)$check_user) == 0) {
                return redirect("forgot-password")->withErrors(["errors" => "Your Email Address do not match in our Database, please try again."])->withInput();
            } else {
                $ResetCode = $this->generate_code(10) . $check_user->UserID;
                DB::table("users")
                        ->where("UserID", $check_user->UserID)
                        ->update(["ResetCode" => $ResetCode]);

                $mailFrom = $this->data['emails']->ResetPassword;

                \Mail::send('includes.emails.password_reset', ["FirstName" => $check_user->FirstName, "LastName" => $check_user->LastName, "ResetCode" => $ResetCode], function($message) use ($check_user, $mailFrom) {
                    $message->to($check_user->EmailAddress)->from($mailFrom, 'KTown')->subject('KTown - Password Reset');
                });

                return redirect('forgot-password')->with('success_msg', "Password reset link has been sent to your Email Address.");
            }
        }
    }

    function reset_password($ResetCode) {
        $check_user = DB::table("users")->select("UserID", "EmailAddress")
                        ->where("ResetCode", $ResetCode)->first();
        if (count((array)$check_user) == 0) {
            return redirect("forgot-password")->withErrors(["errors" => "Invalid password reset code."])->withInput();
        } else {
            $this->data["ResetCode"] = $ResetCode;
            return view('reset-password', $this->data);
        }
    }

    function change_password($ResetCode) {
        $valid["NewPassword"] = 'required|max:30';
        $valid_name["NewPassword"] = "New Password";

        $valid["ConfirmPassword"] = 'required|same:NewPassword';
        $valid_name["ConfirmPassword"] = "Confirm Password";

        $v = Validator::make(Input::all(), $valid);
        $v->setAttributeNames($valid_name);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            $check_user = DB::table("users")->select("UserID", "EmailAddress")
                    ->where("ResetCode", $ResetCode)
                    ->first();
            if (count((array)$check_user) == 0) {
                return redirect("forgot-password")->withErrors(["errors" => "Invalid password reset code."])->withInput();
            } else {
                DB::table("users")
                        ->where("UserID", $check_user->UserID)
                        ->update(["ResetCode" => "", "Password" => sha1(Input::get("NewPassword"))]);

                return redirect("login")->with("success", "Password has been changed");
            }
        }
    }

    function generate_code($length = 8) {
        $pass = "";
        $salt = "ABCDEFGHIJKLMNOPQRSTUVWXWZ0123456789abchefghjkmnpqrstuvwxyz";
        srand((double) microtime() * 1000000);
        $i = 0;
        while ($i <= $length) {
            $num = rand() % 33;
            $tmp = substr($salt, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }

        return $pass;
    }

}
