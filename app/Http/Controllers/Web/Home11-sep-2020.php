<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebController;
use DB;

class Home extends WebController {

    function __construct() {
        parent::__construct();
    }

    public function comingsoon() {
        return view('comingsoon', $this->data);
    }

    public function index() {
        $this->data['max_rating'] = \Config::get('rating');
        $this->data['cities'] = DB::table('cities')->where('Status', 1)->get();
        $this->data['clients'] = DB::table('clients')->where('Status', 1)->get();
        $this->data['hotels'] = [];
        $hotels = DB::table('hotels')
                ->select('HotelID', 'Slug', 'HotelName', 'Color', 'Border', 'hotels.HotelTypeID', 'HotelTypeName', 'hotels.Description', 'Rating', 'hotels.Image', 'hotels.Thumbnail', 'hotels.SellingPrice')
                ->leftjoin('hotel_types', 'hotels.HotelTypeID', '=', 'hotel_types.HotelTypeID')
                ->where('hotels.Status', 1)
                ->limit(6)
                ->inRandomOrder()
                ->get();
        if (count($hotels) > 0) {
            foreach ($hotels as $hotel) {
                $services = DB::table('hotel_type_services')
                        ->select('hotel_type_services.ServiceID', 'ServiceName', 'Icon')
                        ->leftjoin('services', 'services.ServiceID', '=', 'hotel_type_services.ServiceID')
                        ->where('hotel_type_services.HotelTypeID', $hotel->HotelTypeID)
                        ->get();
                $this->data['hotels'][] = [
                    'HotelID' => $hotel->HotelID,
                    'Slug' => $hotel->Slug,
                    'HotelName' => $hotel->HotelName,
                    'Color' => $hotel->Color,
                    'Border' => $hotel->Border,
                    'HotelTypeName' => $hotel->HotelTypeName,
                    'Description' => $hotel->Description,
                    'Rating' => $hotel->Rating,
                    'Image' => $hotel->Image,
                    'Thumbnail' => $hotel->Thumbnail,
                    'SellingPrice' => $hotel->SellingPrice,
                    'Services' => $services
                ];
            }
        }
        $this->data['experiences'] = DB::table('experiences')
                ->select('ExperiencesID', 'Slug', 'ExperiencesName', 'Description', 'Rating', 'Image', 'Thumbnail', 'SellingPrice')
                ->where('Status', 1)
                ->limit(6)
                ->inRandomOrder()
                ->get();
        
//        echo '<pre>'.print_r($this->data['hotels'], true).'</pre>'; die;
        return view('home', $this->data);
    }

    public function about() {
        return view('about-us', $this->data);
//        return view('includes/booking/invoice', $this->data);
    }
    
   public function blog() {
        $blogs = DB::table('blog')->where('Status', 1)->orderBy('PageID', 'desc')->get();
        $randomsblogs = DB::table('blog')->where('Status', 1)->limit(6)->inRandomOrder()->get();
        return view('blog', $this->data,["blogs"=>$blogs,"randomsblogs"=>$randomsblogs]);
    }
    
    public function termsconditions() {
        return view('terms-conditions', $this->data);

    }
    
    public function webprivacypolicy() {
        return view('web-privacy-policy', $this->data);

    }
    
    public function guestpolicy() {
        return view('guest-policy', $this->data);

    }

}
