<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Input;
use Validator,
    DB;

class Careers extends WebController {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        return view('careers', $this->data);
    }

    public function submit() {

        if (Input::hasFile('cv')) {
            if (\File::exists(public_path('uploads/administrators') . '/' . Input::get('ImgName'))) {
                \File::delete(public_path('uploads/administrators') . '/' . Input::get('ImgName'));
            }

            $uploadExt = ['doc', 'docx', 'pdf'];
            $file = Input::file('cv');
            if (!in_array($file->getClientOriginalExtension(), $uploadExt)) {
                return redirect()->back()->withErrors("Invalid File, only " . implode(", ", $uploadExt) . ' are allowed');
            } else {
                $filename = sprintf("%06d", mt_rand(1, 999999)) . '_' . time() . '.' . $file->getClientOriginalExtension();
                $path = public_path('uploads/website/cv');

                $file->move($path, $filename);
                \DB::table('careers')
                        ->insert(['CV' => $filename, 'DateAdded' => new \DateTime]);
                return redirect()->back()->with("success", "Uploaded");
            }
        } else {
            return redirect()->back()->withErrors("Please select your CV");
        }
    }

}