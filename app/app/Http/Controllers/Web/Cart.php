<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', 'Web\Home@index');
Route::get('/home', function() {
    return redirect('/');
});

Route::get('/hotels', 'Web\Hotels@index');
Route::post('/hotels', 'Web\Hotels@index');
//Route::get('/details/{HotelID}', 'Web\Hotels@room_details')->where(['HotelID' => '[0-9]+']);
Route::get('/details/{PageSlug}', 'Web\Hotels@room_details')->where(['PageSlug' => '[-A-Za-z0-9]+']);
//Route::post('/details/{HotelID}', 'Web\Hotels@add_to_cart')->where(['HotelID' => '[0-9]+']);
Route::post('/details/{PageSlug}', 'Web\Hotels@add_to_cart')->where(['PageSlug' => '[-A-Za-z0-9]+']);
Route::post('/apply_promo', 'Web\Hotels@apply_promo');

Route::get('/hotels-in-karachi', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-lahore', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-islamabad', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-murree', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-swat', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-naran', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-gwadar', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-multan', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-hyderabad', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-sukkur', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-ziarat', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-larkana', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-muzaffarabad', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-neelum-valley', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-peshawar', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-quetta', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-malam-jabba', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-rawalpindi', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-hunza', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-skardu', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-kalam', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-abbottabad', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-aliabad', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-arang-kel', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-nathia-gali', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-shogran', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-gilgit', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-chitral', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-attock', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-mansehra', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-bagh', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-rawalakot', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-bahawalpur', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-balakot', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-gujranwala', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-ayubia', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-kotli', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-mirpur', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-sargodha', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-sialkot', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-faisalabad', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-saidu-sharif', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-mingora', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-chilas', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-dera-ismail-khan', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-gorakh-hill', 'Web\Hotels@hotelsinpakistan');
Route::get('/hotels-in-kalash-valley', 'Web\Hotels@hotelsinpakistan');

Route::get('/cart', 'Web\Cart@index');
Route::get('/remove-item/{HotelID}', 'Web\Cart@remove_item')->where(['HotelID' => '[0-9]+']);
Route::get('/payment', 'Web\Cart@payment');
Route::post('/book', 'Web\Cart@book_now');
Route::get('/summary/{BookingID}', 'Web\Cart@summary')->where(['BookingID' => '[0-9]+']);
Route::get('/invoice/{BookingID}', 'Web\Cart@invoice')->where(['BookingID' => '[0-9]+']);

Route::get('/feedback/{Token}', 'Web\Feedback@index')->where(['Token' => '[-A-Za-z0-9]+']);
Route::post('/feedback/{Token}', 'Web\Feedback@submit')->where(['Token' => '[-A-Za-z0-9]+']);

//Experiences frontend

Route::get('/experiences', 'Web\Experiences@index');
Route::post('/experiences', 'Web\Experiences@index');
Route::get('/experiences/{PageSlug}', 'Web\Experiences@experience_details')->where(['PageSlug' => '[-A-Za-z0-9]+']);
Route::post('/experiences/{PageSlug}', 'Web\Experiences@add_to_cart')->where(['PageSlug' => '[-A-Za-z0-9]+']);
Route::post('/experiences/apply_promo', 'Web\Experiences@apply_promo');
Route::get('/experiences-cart', 'Web\ExperiencesCart@index');
Route::get('/experiences/remove-item/{ExperiencesID}', 'Web\ExperiencesCart@remove_item')->where(['ExperiencesID' => '[0-9]+']);

Route::get('/experiences-payment', 'Web\ExperiencesCart@payment');
Route::post('/experiences-book', 'Web\ExperiencesCart@book_now');
Route::get('/experiences-summary/{ExperiencesID}', 'Web\ExperiencesCart@summary')->where(['ExperiencesID' => '[0-9]+']);
Route::get('/experiences-invoice/{ExperiencesID}', 'Web\ExperiencesCart@invoice')->where(['ExperiencesID' => '[0-9]+']);


// Login
Route::get('/login', 'Web\Login@index');
Route::post('/login', 'Web\Login@validate_login');

Route::get('/dashboard', 'Web\Dashboard@index');
Route::post('/dashboard', 'Web\Dashboard@update_user_profile');

Route::get('/my-payments', 'Web\Dashboard@my_payment');
Route::post('/my-payments', 'Web\Dashboard@update_my_payment');

Route::get('/user-profile', 'Web\Dashboard@user_profile');
Route::post('/user-profile', 'Web\Dashboard@update_user_profile');

Route::get('/my-bookings', 'Web\MyBookings@index');
Route::post('/my-bookings', 'Web\MyBookings@bookings_list');
Route::get('/my-bookings/{BookingID}', 'Web\MyBookings@view')->where(['BookingID' => '[0-9]+']);
Route::get('/cancel-booking/{BookingID}', 'Web\MyBookings@cancel_booking')->where(['BookingID' => '[0-9]+']);
Route::get('/logout', 'Web\Dashboard@logout');

// Register
Route::get('/signup', 'Web\Signup@index');
Route::post('/signup', 'Web\Signup@submit');

Route::get('/account-activation', 'Web\Signup@account_activation');
Route::post('/activate-account', 'Web\Signup@vlidate_activate_code');
Route::get('/activate-account', 'Web\Signup@vlidate_activate_code');
Route::get('/verify-account/{VerifyCode}', 'Web\Signup@vlidate_verification_link')->where(['VerifyCode' => '[a-zA-Z0-9_]+']);

Route::get('/register', 'Web\Signup@index');
Route::post('/register', 'Web\Signup@validate');
Route::get('/forgot-password', 'Web\Signup@forgot_password');
Route::post('/forgot-password', 'Web\Signup@validate_email');
Route::get('/reset-password/{ResetCode}', 'Web\Signup@reset_password')->where(['ResetCode' => '[a-zA-Z0-9]+']);
Route::post('/reset-password/{ResetCode}', 'Web\Signup@change_password')->where(['ResetCode' => '[a-zA-Z0-9]+']);

// CMS
Route::get('/page/{PageSlug}', 'Web\Pages@index')->where(['PageSlug' => '[-A-Za-z0-9]+']);
Route::get('/blog/{PageSlug}', 'Web\Blog@index')->where(['PageSlug' => '[-A-Za-z0-9]+']);

Route::get('/about-us', 'Web\Home@about');
Route::get('/terms-conditions', 'Web\Home@termsconditions');
Route::get('/web-privacy-policy', 'Web\Home@webprivacypolicy');
Route::get('/guest-policy', 'Web\Home@guestpolicy');
Route::get('/blog', 'Web\Home@blog');

// Contact
Route::get('/contact', 'Web\Contact@index');
Route::post('/contact', 'Web\Contact@submit');

Route::get('/careers', 'Web\Careers@index');
Route::post('/careers', 'Web\Careers@submit');

Route::get('/partner', 'Web\RequestForms@partner');
Route::post('/partner', 'Web\RequestForms@partner_submit');

Route::get('/corporate-clients', 'Web\RequestForms@corporate_clients');
Route::post('/corporate-clients', 'Web\RequestForms@corporate_clients_submit');

Route::get('/travel-agent', 'Web\RequestForms@travel_agent');
Route::post('/travel-agent', 'Web\RequestForms@travel_agent_submit');

Route::group(['prefix' => 'admin'], function() {

    // Login
    Route::get('/', 'Admin\Login@index');
    Route::get('/login', 'Admin\Login@index');
    Route::post('/login', 'Admin\Login@validatelogin');
    Route::get('/logout', 'Admin\Dashboard@logout');

    // Error
    Route::get('/err403', 'Admin\Err403@index');

    // Dashboard
    Route::get('/dashboard', 'Admin\Dashboard@index');

    // Profile
    Route::get('/profile', 'Admin\Profile@index');
    Route::post('/profile', 'Admin\Profile@update');

    // Configuration
    Route::get('/configuration', 'Admin\Configuration@index');
    Route::post('/configuration', 'Admin\Configuration@update');

    // Configuration
    Route::get('/emails', 'Admin\Emails@index');
    Route::post('/emails', 'Admin\Emails@update');

    // Services
    Route::get('/services', 'Admin\Services@index');
    Route::post('/services', 'Admin\Services@services_list');
    Route::get('/services/add', 'Admin\Services@add');
    Route::post('/services/add', 'Admin\Services@save');
    Route::get('/services/{ServiceID}', 'Admin\Services@edit')->where(['ServiceID' => '[0-9]+']);
    Route::post('/services/{ServiceID}', 'Admin\Services@update')->where(['ServiceID' => '[0-9]+']);
    Route::post('/services/delete', 'Admin\Services@delete');

    // Cities
    Route::get('/cities', 'Admin\Cities@index');
    Route::post('/cities', 'Admin\Cities@cities_list');
    Route::get('/cities/add', 'Admin\Cities@add');
    Route::post('/cities/add', 'Admin\Cities@save');
    Route::get('/cities/{CityID}', 'Admin\Cities@edit')->where(['CityID' => '[0-9]+']);
    Route::post('/cities/{CityID}', 'Admin\Cities@update')->where(['CityID' => '[0-9]+']);
    Route::post('/cities/delete', 'Admin\Cities@delete');

    // Hotel Types
    Route::get('/hotel-types', 'Admin\HotelTypes@index');
    Route::post('/hotel-types', 'Admin\HotelTypes@hotel_types_list');
    Route::get('/hotel-types/add', 'Admin\HotelTypes@add');
    Route::post('/hotel-types/add', 'Admin\HotelTypes@save');
    Route::get('/hotel-types/{HotelTypeID}', 'Admin\HotelTypes@edit')->where(['HotelTypeID' => '[0-9]+']);
    Route::post('/hotel-types/{HotelTypeID}', 'Admin\HotelTypes@update')->where(['HotelTypeID' => '[0-9]+']);
    Route::post('/hotel-types/delete', 'Admin\HotelTypes@delete');

    // Hotels
    Route::get('/hotels', 'Admin\Hotels@index');
    Route::post('/hotels', 'Admin\Hotels@hotels_list');
    Route::get('/hotels/add', 'Admin\Hotels@add');
    Route::post('/hotels/add', 'Admin\Hotels@save');
    Route::get('/hotels/{HotelID}', 'Admin\Hotels@edit')->where(['HotelID' => '[0-9]+']);
    Route::post('/hotels/{HotelID}', 'Admin\Hotels@update')->where(['HotelID' => '[0-9]+']);
    Route::post('/hotels/delete', 'Admin\Hotels@delete');
    
    // Experiences
    Route::get('/experiences', 'Admin\Experiences@index');
    Route::post('/experiences', 'Admin\Experiences@experiences_list');
    Route::get('/experiences/add', 'Admin\Experiences@add');
    Route::post('/experiences/add', 'Admin\Experiences@save');
    Route::get('/experiences/{ExperiencesID}', 'Admin\Experiences@edit')->where(['ExperiencesID' => '[0-9]+']);
    Route::post('/experiences/{ExperiencesID}', 'Admin\Experiences@update')->where(['ExperiencesID' => '[0-9]+']);
    Route::post('/experiences/delete', 'Admin\Experiences@delete');
    
    // Experiences Options
    Route::get('/experiences-options/{ExperiencesID}', 'Admin\Experiences@options')->where(['ExperiencesID' => '[0-9]+']);
    Route::post('/experiences-options/{ExperiencesID}', 'Admin\Experiences@options_list')->where(['ExperiencesID' => '[0-9]+']);
    Route::get('/experiences-options/add/{ExperiencesID}', 'Admin\Experiences@add_option')->where(['ExperiencesID' => '[0-9]+']);
    Route::post('/experiences-options/add/{ExperiencesID}', 'Admin\Experiences@save_option')->where(['ExperiencesID' => '[0-9]+']);
    Route::get('/experiences-options/{ExperiencesID}/{OptionID}', 'Admin\Experiences@edit_option')->where(['ExperiencesID' => '[0-9]+'])->where(['OptionID' => '[0-9]+']);
    Route::post('/experiences-options/{ExperiencesID}/{OptionID}', 'Admin\Experiences@update_option')->where(['ExperiencesID' => '[0-9]+'])->where(['OptionID' => '[0-9]+']);
    Route::post('/experiences-options/delete/{ExperiencesID}', 'Admin\Experiences@delete_option')->where(['ExperiencesID' => '[0-9]+']);
    
    // Experiences Images
    Route::get('/experiences-images/{ExperiencesID}', 'Admin\Experiences@images')->where(['ExperiencesID' => '[0-9]+']);
    Route::post('/experiences-images/{ExperiencesID}', 'Admin\Experiences@images_list')->where(['ExperiencesID' => '[0-9]+']);
    Route::get('/experiences-images/add/{ExperiencesID}', 'Admin\Experiences@add_image')->where(['ExperiencesID' => '[0-9]+']);
    Route::post('/experiences-images/add/{ExperiencesID}', 'Admin\Experiences@save_image')->where(['ExperiencesID' => '[0-9]+']);
    Route::get('/experiences-images/{ExperiencesID}/{ImageID}', 'Admin\Experiences@edit_image')->where(['ExperiencesID' => '[0-9]+'])->where(['ImageID' => '[0-9]+']);
    Route::post('/experiences-images/{ExperiencesID}/{ImageID}', 'Admin\Experiences@update_image')->where(['ExperiencesID' => '[0-9]+'])->where(['ImageID' => '[0-9]+']);
    Route::post('/experiences-images/delete/{ExperiencesID}', 'Admin\Experiences@delete_images')->where(['ExperiencesID' => '[0-9]+']);

    // Promo
    Route::get('/promo', 'Admin\Promo@index');
    Route::post('/promo', 'Admin\Promo@promo_list');
    Route::get('/promo/add', 'Admin\Promo@add');
    Route::post('/promo/add', 'Admin\Promo@save');
    Route::get('/promo/{PromoID}', 'Admin\Promo@edit')->where(['PromoID' => '[0-9]+']);
    Route::post('/promo/{PromoID}', 'Admin\Promo@update')->where(['PromoID' => '[0-9]+']);
    Route::post('/promo/delete', 'Admin\Promo@delete');

    Route::get('/hotel-images/{HotelID}', 'Admin\Hotels@images')->where(['HotelID' => '[0-9]+']);
    Route::post('/hotel-images/{HotelID}', 'Admin\Hotels@images_list')->where(['HotelID' => '[0-9]+']);
    Route::get('/hotel-images/add/{HotelID}', 'Admin\Hotels@add_image')->where(['HotelID' => '[0-9]+']);
    Route::post('/hotel-images/add/{HotelID}', 'Admin\Hotels@save_image')->where(['HotelID' => '[0-9]+']);
    Route::get('/hotel-images/{HotelID}/{ImageID}', 'Admin\Hotels@edit_image')->where(['HotelID' => '[0-9]+'])->where(['ImageID' => '[0-9]+']);
    Route::post('/hotel-images/{HotelID}/{ImageID}', 'Admin\Hotels@update_image')->where(['HotelID' => '[0-9]+'])->where(['ImageID' => '[0-9]+']);
    Route::post('/hotel-images/delete/{HotelID}', 'Admin\Hotels@delete_images')->where(['HotelID' => '[0-9]+']);

    // Testimonials
    Route::get('/testimonials', 'Admin\Testimonials@index');
    Route::post('/testimonials', 'Admin\Testimonials@testimonials_list');
    Route::get('/testimonials/add', 'Admin\Testimonials@add');
    Route::post('/testimonials/add', 'Admin\Testimonials@save');
    Route::get('/testimonials/{TestimonialID}', 'Admin\Testimonials@edit')->where(['TestimonialID' => '[0-9]+']);
    Route::post('/testimonials/edit', 'Admin\Testimonials@update');
    Route::post('/testimonials/delete', 'Admin\Testimonials@delete');

    // Experiences Bookings
    Route::get('/experiences-bookings', 'Admin\ExperiencesBookings@index');
    Route::post('/experiences-bookings', 'Admin\ExperiencesBookings@bookings_list');
    Route::get('/experiences-bookings/{ExperiencesBookingID}', 'Admin\ExperiencesBookings@edit')->where(['ExperiencesBookingID' => '[0-9]+']);
    Route::post('/experiences-bookings/{ExperiencesBookingID}', 'Admin\ExperiencesBookings@update')->where(['ExperiencesBookingID' => '[0-9]+']);
    Route::post('/experiences-bookings/delete', 'Admin\ExperiencesBookings@delete');
    
    // Bookings
    Route::get('/bookings', 'Admin\Bookings@index');
    Route::post('/bookings', 'Admin\Bookings@bookings_list');
    Route::get('/bookings/{BookingID}', 'Admin\Bookings@edit')->where(['BookingID' => '[0-9]+']);
    Route::post('/bookings/{BookingID}', 'Admin\Bookings@update')->where(['BookingID' => '[0-9]+']);
    Route::post('/bookings/delete', 'Admin\Bookings@delete');

    // Feedbacks
    Route::get('/feedbacks', 'Admin\Feedbacks@index');
    Route::post('/feedbacks', 'Admin\Feedbacks@feedbacks_list');
    Route::get('/feedbacks/{FeedbackID}', 'Admin\Feedbacks@edit')->where(['FeedbackID' => '[0-9]+']);
    Route::post('/feedbacks/{FeedbackID}', 'Admin\Feedbacks@update')->where(['FeedbackID' => '[0-9]+']);
    Route::post('/feedbacks/delete', 'Admin\Feedbacks@delete');
    
    // DHA Reservation
    Route::get('/dha/reservation/add', 'Admin\Reservation@dha_add');
    Route::post('/dha/reservation/add', 'Admin\Reservation@dha_save');
    Route::get('/dha/reservation', 'Admin\Reservation@dha_index');
    Route::post('/dha/reservation', 'Admin\Reservation@dha_reservation_list');
    Route::get('/dha/reservation/{BookingID}', 'Admin\Reservation@dha_edit');
    Route::post('/dha/reservation/{BookingID}', 'Admin\Reservation@dha_update');
    Route::get('/dha/reservation/misc/{BookingID}', 'Admin\Reservation@dha_misc_add');
    Route::post('/dha/reservation/misc/{BookingID}', 'Admin\Reservation@dha_misc_save');
    Route::get('/dha/reservation/misc/edit/{BookingID}', 'Admin\Reservation@dha_misc_edit');
    Route::post('/dha/reservation/misc/edit/{BookingID}', 'Admin\Reservation@dha_misc_update');
    Route::get('/dha/reservation/booking/{BookingID}', 'Admin\Reservation@dha_create_pdf');
    Route::get('/dha/reservation/miscellaneous/{BookingID}', 'Admin\Reservation@dha_miscellaneous_create_pdf');
    Route::get('/dha/nightaudit', 'Admin\Reservation@dha_nightaudit_create_pdf');
    Route::get('/dha/reservation/checkoutpayment/{BookingID}', 'Admin\Reservation@dha_checkout_payment');
    Route::post('/dha/reservation/checkoutpayment/{BookingID}', 'Admin\Reservation@dha_checkoutpayment_update');
    Route::get('/dha/dashboard', 'Admin\Reservation@dha_dashboard');
    Route::post('/dha/dashboard', 'Admin\Reservation@dha_search_dashboard');
    
    
    //DHA Rooms Booking
    Route::get('/dha', 'Admin\Rooms@dha');
    Route::get('/dha/roomlist', 'Admin\Rooms@dha_rooms_list');
    Route::get('/dha/roombookinglist', 'Admin\Rooms@dha_rooms_booking_list');
    Route::get('/dha/backendmove', 'Admin\Rooms@dha_backendmove');
    
    // millenium Reservation
    Route::get('/millenium/reservation/add', 'Admin\MReservation@millenium_add');
    Route::post('/millenium/reservation/add', 'Admin\MReservation@millenium_save');
    Route::get('/millenium/reservation', 'Admin\MReservation@millenium_index');
    Route::post('/millenium/reservation', 'Admin\MReservation@millenium_reservation_list');
    Route::get('/millenium/reservation/{BookingID}', 'Admin\MReservation@millenium_edit');
    Route::post('/millenium/reservation/{BookingID}', 'Admin\MReservation@millenium_update');
    Route::get('/millenium/reservation/misc/{BookingID}', 'Admin\MReservation@millenium_misc_add');
    Route::post('/millenium/reservation/misc/{BookingID}', 'Admin\MReservation@millenium_misc_save');
    Route::get('/millenium/reservation/misc/edit/{BookingID}', 'Admin\MReservation@millenium_misc_edit');
    Route::post('/millenium/reservation/misc/edit/{BookingID}', 'Admin\MReservation@millenium_misc_update');
    Route::get('/millenium/reservation/booking/{BookingID}', 'Admin\MReservation@millenium_create_pdf');
    Route::get('/millenium/reservation/miscellaneous/{BookingID}', 'Admin\MReservation@millenium_miscellaneous_create_pdf');
    Route::get('/millenium/nightaudit', 'Admin\MReservation@millenium_nightaudit_create_pdf');
    Route::get('/millenium/reservation/checkoutpayment/{BookingID}', 'Admin\MReservation@millenium_checkout_payment');
    Route::post('/millenium/reservation/checkoutpayment/{BookingID}', 'Admin\MReservation@millenium_checkoutpayment_update');
    Route::get('/millenium/dashboard', 'Admin\MReservation@millenium_dashboard');
    Route::post('/millenium/dashboard', 'Admin\MReservation@millenium_search_dashboard');
    
    //millenium Rooms Booking
    Route::get('/millenium', 'Admin\Rooms@millenium');
    Route::get('/millenium/roomlist', 'Admin\Rooms@millenium_rooms_list');
    Route::get('/millenium/roombookinglist', 'Admin\Rooms@millenium_rooms_booking_list');
    Route::get('/millenium/backendmove', 'Admin\Rooms@millenium_backendmove');
    
    
    
    
    

    // Report
    Route::get('/report', 'Admin\Report@index');
    Route::post('/report', 'Admin\Report@report_list');

    // Pages
    Route::get('/pages', 'Admin\Pages@index');
    Route::post('/pages', 'Admin\Pages@pages_list');
    Route::get('/pages/add', 'Admin\Pages@add');
    Route::post('/pages/add', 'Admin\Pages@save');
    Route::get('/pages/{PageID}', 'Admin\Pages@edit')->where(['PageID' => '[0-9]+']);
    Route::post('/pages/edit', 'Admin\Pages@update');
    Route::post('/pages/delete', 'Admin\Pages@delete');
    
    // Blog
    Route::get('/blog', 'Admin\Blog@index');
    Route::post('/blog', 'Admin\Blog@pages_list');
    Route::get('/blog/add', 'Admin\Blog@add');
    Route::post('/blog/add', 'Admin\Blog@save');
    Route::get('/blog/{PageID}', 'Admin\Blog@edit')->where(['PageID' => '[0-9]+']);
    Route::post('/blog/edit', 'Admin\Blog@update');
    Route::post('/blog/delete', 'Admin\Blog@delete');

    // Sliders
    Route::get('/sliders', 'Admin\Sliders@index');
    Route::post('/sliders', 'Admin\Sliders@slides_list');
    Route::get('/sliders/add', 'Admin\Sliders@add');
    Route::post('/sliders/add', 'Admin\Sliders@save');
    Route::get('/sliders/{SliderID}', 'Admin\Sliders@edit')->where(['SliderID' => '[0-9]+']);
    Route::post('/sliders/edit', 'Admin\Sliders@update');
    Route::post('/sliders/delete', 'Admin\Sliders@delete');

    // Clients
    Route::get('/clients', 'Admin\Clients@index');
    Route::post('/clients', 'Admin\Clients@clients_list');
    Route::get('/clients/add', 'Admin\Clients@add');
    Route::post('/clients/add', 'Admin\Clients@save');
    Route::get('/clients/{ClientID}', 'Admin\Clients@edit')->where(['ClientID' => '[0-9]+']);
    Route::post('/clients/{ClientID}', 'Admin\Clients@update')->where(['ClientID' => '[0-9]+']);
    Route::post('/clients/delete', 'Admin\Clients@delete');

    // Users
    Route::get('/users', 'Admin\Users@index');
    Route::post('/users', 'Admin\Users@users_list');
    Route::get('/users/add', 'Admin\Users@add');
    Route::post('/users/add', 'Admin\Users@save');
    Route::get('/users/{UserID}', 'Admin\Users@edit')->where(['UserID' => '[0-9]+']);
    Route::post('/users/{UserID}', 'Admin\Users@update')->where(['UserID' => '[0-9]+']);
    Route::post('/users/delete', 'Admin\Users@delete');

    // Partner Requests
    Route::get('/partner-requests', 'Admin\PartnerRequests@index');
    Route::post('/partner-requests', 'Admin\PartnerRequests@partners_list');
    Route::get('/partner-requests/{RequestID}', 'Admin\PartnerRequests@details')->where(['RequestID' => '[0-9]+']);
    Route::post('/partner-requests/delete', 'Admin\PartnerRequests@delete');

    // Corporate client Requests
    Route::get('/corporate-clients', 'Admin\CorporateClients@index');
    Route::post('/corporate-clients', 'Admin\CorporateClients@partners_list');
    Route::get('/corporate-clients/{RequestID}', 'Admin\CorporateClients@details')->where(['RequestID' => '[0-9]+']);
    Route::post('/corporate-clients/delete', 'Admin\CorporateClients@delete');

    // Agent Requests
    Route::get('/agent-requests', 'Admin\AgentRequests@index');
    Route::post('/agent-requests', 'Admin\AgentRequests@agents_list');
    Route::get('/agent-requests/{RequestID}', 'Admin\AgentRequests@details')->where(['RequestID' => '[0-9]+']);
    Route::post('/agent-requests/delete', 'Admin\AgentRequests@delete');
});
