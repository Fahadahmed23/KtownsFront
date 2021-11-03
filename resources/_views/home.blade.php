<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="B7yIaUV72XaRbRwP1syZaXouPYPcoss4eN_MigRITTo" />
        <meta name="author" content="K Town Rooms">
        <title>KTown Rooms | Pakistan's Best Budget Hotels, Lowest Price Guaranteed</title>
        <meta name="description" content="Book budget hotels in Pakistan Starting PKR 2500+ Offering cheap hotels in 50+ cities across Pakistan, 1000 + AC rooms with breakfast, wifi, etc ✓pay at hotel">

        <!-- Favicons-->
        <link rel="shortcut icon" href="{{ url('resources/assets/web') }}/img/favicon.png" type="image/x-icon">
        <link rel="apple-touch-icon" type="image/x-icon" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-57x57-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-144x144-precomposed.png">

        
        <!--[if lt IE 9]>
          <script src="js/html5shiv.min.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136415631-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-136415631-1');
        </script>
        
    </head>
    <body>

        <!--[if lte IE 8]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
        <![endif]-->

        <div id="preloader">
            <div class="sk-spinner sk-spinner-wave">
                <div class="sk-rect1"></div>
                <div class="sk-rect2"></div>
                <div class="sk-rect3"></div>
                <div class="sk-rect4"></div>
                <div class="sk-rect5"></div>
            </div>
        </div>

        <div class="layer"></div>

        @include('includes/header')

        <section id="search_container" class="homepage-form">
            <div  class="container">
                <div id="search">

                    <div class="tab-content">
                        <div class="tab-pane active" id="tours">
                            <!--                        <h3>Search Hotels</h3>
                                                    <div class="form-group">
                                                        <label>Search terms</label>
                                                        <input type="text" class="form-control" id="firstname_booking" name="firstname_booking" placeholder="Type your search terms">
                                                    </div>-->
                            <div class="row">
                                <h1>Pakistan's Best Budget Hotels</h1>
                                <p>Affordability.  Standardization.  Predictability.  Superior Customer Service.</p>
                            </div>
                            <div class="row">
                                {!! Form::open([ 'url' => 'hotels', 'id' => 'myForm']) !!}
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <input id="CheckinDate" name="CheckinDate" class="date-pick form-control" placeholder="Checkin date" data-date-format="m/d/yyyy" type="text" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <input id="CheckoutDate" name="CheckoutDate" class="date-pick form-control" placeholder="Checkout date" data-date-format="m/d/yyyy" type="text" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <select name="Cityname" class="form-control">
                                            <?php
                                            foreach ($cities as $city) {
                                                ?>
                                            <option class="item" value="{{$city->CityName}}">{{ $city->CityName }}</option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <button type="button" class="btn btn-default form-control search-btn"><i class="icon-search"></i>Search now</button>
                                </div>
                                {!! FORM::close() !!}
                            </div>
                            <div class="row promise-icons">
                                <div class="col-sm-2 col-xs-4"><img class="img-responsive" src="{{ url('resources/assets/web/img/promise-icon-1.png') }}" /></div>
                                <div class="col-sm-2 col-xs-4"><img class="img-responsive" src="{{ url('resources/assets/web/img/promise-icon-2.png') }}" /></div>
                                <div class="col-sm-2 col-xs-4"><img class="img-responsive" src="{{ url('resources/assets/web/img/promise-icon-3.png') }}" /></div>
                                <div class="col-sm-2 col-xs-4"><img class="img-responsive" src="{{ url('resources/assets/web/img/promise-icon-4.png') }}" /></div>
                                <div class="col-sm-2 col-xs-4"><img class="img-responsive" src="{{ url('resources/assets/web/img/promise-icon-5.png') }}" /></div>
                                <div class="col-sm-2 col-xs-4"><img class="img-responsive" src="{{ url('resources/assets/web/img/promise-icon-6.png') }}" /></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container margin_60">

            <div class="main_title">
                <h2>KTOWN <span>TOP</span> HOTELS</h2>
            </div>

            <div class="row">
                
                <?php
                if (count($hotels) > 0) {
                    
                    foreach ($hotels as $hotel) {
                        ?>
                        <div class="col-md-4 col-sm-6 wow zoomIn" data-wow-delay="0.1s">
                            <div class="ribbon_3 popular"><span style="--my-color-var: <?php echo $hotel['Border']; ?>; background:<?php echo $hotel['Color'] ?>"><?php echo $hotel['HotelTypeName'] ?></span></div>
                            <div class="tour_container">
                                <div class="img_container">
                                    <a href="{{ url('details/'.$hotel['Slug']) }}">
                                        <img title="{{$hotel['HotelName']}}" src="{{ url('public/uploads/website/hotels/thumb/'.$hotel['Thumbnail']) }}" class="img-responsive" alt="Image">
                                        <div class="short_info">
                                            <!--<i class="icon_set_1_icon-44"></i>Historic Buildings-->
                                            <span class="price"><sup>PKR </sup><?php echo number_format($hotel['SellingPrice'], 0); ?></span>
                                        </div>
                                    </a>
                                </div>
                                <div class="tour_title">
                                    <h3 title="{{$hotel['HotelName']}}"><strong>{{str_limit($hotel['HotelName'], $limit = 25, $end = '...')}}</strong></h3>
                                    <div class="rating">
                                        <img src="{{ url('resources/assets/web/img/ranking'.$hotel['Rating'].'.png') }}" />
                                        <?php
//                                        $k = 1;
//                                        foreach ($max_rating as $key => $max) {
//                                            if ($key != 0) {
//                                                
                                        ?>
                                                <!--<i class="icon-smile //<?php // echo ($hotel['Rating'] >= $k ? 'voted' : '')                     ?>"></i>-->
                                        <?php
//                                                $k++;
//                                            }
//                                        }
                                        ?>
                                    </div>
                                    <!--                                    <div class="wishlist">
                                                                            <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
                                                                        </div>-->
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <p class="text-center nopadding">
                <a href="{{ url('hotels') }}" class="btn_1 medium"><i class="icon-eye-7"></i>View all Rooms </a>
            </p>
        </div>
        
        <div class="container margin_60">
            <?php if (count($experiences) > 0) { ?>
            <div class="main_title">
                <h2>KTOWN <span>TOP</span> Experiences</h2>
            </div>

            <div class="row">
                <?php
                    foreach ($experiences as $experience) {
                        ?>
                        <div class="col-md-4 col-sm-6 wow zoomIn" data-wow-delay="0.1s">
                            <div class="ribbon_3 popular"></div>
                            <div class="tour_container">
                                <div class="img_container">
                                    <a href="{{ url('experiences/'.$experience->Slug) }}">
                                        <img src="{{ url('public/uploads/website/experiences/thumb/'.$experience->Thumbnail) }}" class="img-responsive" alt="Image">
                                        <div class="short_info">
                                            <!--<i class="icon_set_1_icon-44"></i>Historic Buildings-->
                                            <span class="price"><sup>PKR </sup><?php echo number_format($experience->SellingPrice, 0); ?></span>
                                        </div>
                                    </a>
                                </div>
                                <div class="tour_title">
                                    <h3><strong><?php echo $experience->ExperiencesName ?></h3>
                                    <div class="rating">
                                        <img src="{{ url('resources/assets/web/img/ranking'.$experience->Rating.'.png') }}" />

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    } ?>
                
            </div>
            <p class="text-center nopadding">
                <a href="{{ url('experiences') }}" class="btn_1 medium"><i class="icon-eye-7"></i>View all Experiences </a>
            </p>
            <?php } ?>
        </div>

        <?php
        if (count($cities) > 0) {
            ?>

            <div class="white_bg">

                <div class="container margin_60">

                    <!--                <div class="banner colored add_bottom_30">
                                        <h4>Discover our best packages</h4>
                                        <a href="{{ url('hotels') }}" class="btn_1 white">Explore</a>
                                    </div>-->

                    <div class="main_title">
                        <h2>TOP <span>DESTINATIONS</span></h2>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="owl-carousel owl-theme">
                                <?php
                                foreach ($cities as $city) {
                                    ?>
                                    <div class="item">
                                        <a href="<?php if($city->CityName == "Karachi"){?>{{url('hotels-in-karachi')}}<?php } else { echo "javascript:void(0)";}  ?>"><img title="{{ $city->CityName }}" src="{{ url('public/uploads/website/cities/'.$city->Image) }}" class="img-responsive" /></a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

        <div class="container margin_60">
            <div class="main_title">
                <h2>Our <span>Values</span></h2>
            </div>
            <div class="row custom_feature_home">
                <div class="col-md-4 col-sm-6 text-center">
                    <p>
                        <a href="#"><img style="margin:0 auto;" src="{{ url('resources/assets/web') }}/img/clean-fresh rooms-home.png" alt="Pic" class="img-responsive"></a>
                    </p>
                    <h4><span>Clean & Fresh</span> Rooms</h4>
                    <p>Hygienic and fresh linens along with clean bathrooms in all Ktown hotels across the country.</p>
                </div>
                <div class="col-md-4 col-sm-6 text-center">
                    <p>
                        <a href="#"><img style="margin:0 auto;" src="{{ url('resources/assets/web') }}/img/staff-training-home.png" alt="Pic" class="img-responsive"></a>
                    </p>
                    <h4><span>Trained Friendly</span> Staff</h4>
                    <p>Our well mannered staff is ready to serve you through from the front desk and from your doorstep.</p>
                </div>
                <div class="col-md-4 col-sm-6 text-center">
                    <p>
                        <a href="#"><img style="margin:0 auto;" src="{{ url('resources/assets/web') }}/img/procurement-home.png" alt="Pic" class="img-responsive"></a>
                    </p>
                    <h4><span>Assured</span> Essentials</h4>
                    <p>Enjoy Free WiFi, branded toiletries, AC rooms and free breakfast at all Ktown hotels across Pakistan.</p>
                </div>
                <!--                    <div class="col-md-3 col-sm-6 text-center">
                                        <p>
                                            <a href="#"><img src="{{ url('resources/assets/web') }}/img/hotel-booking.jpg" alt="Pic" class="img-responsive"></a>
                                        </p>
                                        <h4><span>Hotel</span> booking</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex.
                                        </p>
                                    </div>-->
            </div>
        </div>

        <section class="home-bottom-section">
            <div class="promo_full_wp magnific">
                <div>
                    <h4>Come as a Guest and Become Our Family</h4>
                    <p style="font-size:20px; line-height: 35px; text-align:center;">Enjoy the best and hospitable experience that budgeted accommodations have to offer.</p>
                    <!--<a href="#" class="video"><i class="icon-play-circled2-1"></i></a>-->
                </div>
            </div>
        </section>

        <div class="container margin_60">

            <div class="main_title">
                <h2>Let's <span>Collaborated</span></h2>
            </div>

            <div class="row custom_feature_home">

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.2s">
                    <div class="feature_home">
                        <img src="{{ url('resources/assets/web/img/hotel-partner.png') }}" class="img-responsive" />
                        <h3>Hotel Partner</h3>
                        <p>
                            You will never have to worry about a shortage of accommodation seekers due to our extensive marketing reach.
                        </p>
                        <a href="{{ url('partner') }}" class="btn_1 outline">Join us</a>
                    </div>
                </div>

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.4s">
                    <div class="feature_home">
                        <img src="{{ url('resources/assets/web/img/corporate-partner.png') }}" class="img-responsive" />
                        <h3>Corporate Partner</h3>
                        <p>Your business will experience reduction in cost and an increase in productivity by partnering with us.</p>
                        <a href="{{ url('corporate-clients') }}" class="btn_1 outline">Join us</a>
                    </div>
                </div>

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="feature_home">
                        <img src="{{ url('resources/assets/web/img/travel-agent.png') }}" class="img-responsive" />
                        <h3>Travel Agent</h3>
                        <p>Confidently refer your clients to us and enjoy amazing commissions on bookings with any Ktown hotels.</p>
                        <a href="{{ url('travel-agent') }}" class="btn_1 outline">Join us</a>
                    </div>
                </div>

            </div>

            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="headingstyle1">
                        <h2 class="wow fadeInUp animated"><strong><span>CUSTOMER</span></strong> REVIEWS</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="testi-tagline">
                        <h2 class="wow bounceInLeft animated">EVERY GREAT <strong>BUSINESS</strong> IS BUILT ON <span>FRIENDSHIP</span></h2>  
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="slider">
                        <div class="sliderBox">
                            <h3>Abdullah Khan</h3>
                            <ul>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <h6>Best  experience ever !!!</h6>
                            <p>This hotel offers extremely decent, comfortable and tidy bedrooms at a very ideal for vacations! Surrounding of the hotel is calm and safe. The staff is really cooperative; moreover the process of check in was quite smooth! Delicious breakfast is served every morning. I highly recommend this hotel.</p>
                        </div>
                        
                        <div class="sliderBox">
                            <h3>Mohsin Ahmed</h3>
                            <ul>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <h6>Best  experience ever !!!</h6>
                            <p>It is an amazing spot in the central area. All the basic requirements and needs are few meters away. In addition to this, best cafés, and restaurants are close-by. Hotel is beautifully decorated, and perfect. I would highly recommend this hotel to everyone.</p>
                        </div>
                        
                        <div class="sliderBox">
                            <h3>Syed Khurram</h3>
                            <ul>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <h6>Best  experience ever !!!</h6>
                            <p>This place is a stunning spot to stay as it offers standardized services at reasonable rates. Hotel is as beautiful as it looks in the photographs. Staff was exceptionally cooperative and professional this made my visit as smooth as silk.</p>
                        </div>
                        
                        <div class="sliderBox">
                            <h3>Ali Azam</h3>
                            <ul>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <h6>Best  experience ever !!!</h6>
                            <p>Hotel was extremely charming and the rooms are quite stylish and clean. In case of any problem, they fix it in few minutes. Next time when I’ll visit this place, I will surely stay at Ktown Rooms as my experience was quite amazing there.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="row">
                <div class="col-md-8 col-sm-6">
                    <div class="slider">
                        <div><img src="{{ url('resources/assets/web') }}/img/carousel/mobile-ktown-11.png" alt="Laptop" class="img-responsive laptop"></div>
                        <div><img src="{{ url('resources/assets/web') }}/img/carousel/mobile-ktown-22.png" alt="Laptop" class="img-responsive laptop"></div>
                        <div><img src="{{ url('resources/assets/web') }}/img/carousel/mobile-ktown-33.png" alt="Laptop" class="img-responsive laptop"></div>
                        <div><img src="{{ url('resources/assets/web') }}/img/carousel/mobile-ktown-44.png" alt="Laptop" class="img-responsive laptop"></div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <h3>Get started with <span>KTown Rooms</span></h3>
                    <p>Start the best and most seamless room booking experience ever.</p>
                    <ul class="list_order">
                        <li><span>1</span>Sign up</li>
                        <li><span>2</span>Select room upto your budget</li>
                        <li><span>3</span>Pay now or at hotel</li>
                    </ul>
                    <a href="{{ url('signup') }}" class="btn_1">Start now</a>
                </div>
            </div>-->
        </div>
        <?php
        if (count($clients) > 0) {
            ?>
            <div class="white_bg">
                <div class="container margin_60">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>OUR <span>CLIENTS</span></h2>
                            <section class="customer-logos slider1">
                                <?php
                                foreach ($clients as $client) {
                                    ?>

                                    <div class="slide"><img title="{{ $client->Title }}" src="{{ url('public/uploads/website/clients/'.$client->Image) }}"></div>
                                    <?php
                                }
                                ?>
                            </section>

                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>


        @include('includes/footer')

        <div id="toTop"></div>
        <style>
            .sliderBox ul {
               margin-bottom: 20px;
            }
            dl, ol, ul {
            margin-top: 0;
                margin-bottom: 1rem;
            }
            .fa-star:before {
               content: "\f005";
            }
            *, ::after, ::before {
                box-sizing: border-box;
            }
            .sliderBox ul li i {
                color: #e7903a;
            }
            .sliderBox ul li {
                display: inline-block;
            }
            ul li {
                list-style: none;
            }
            ul {
                margin-bottom: 0;
                padding-left: 0;
            }
            .sliderBox p {
                font-size: 16px;
                color: #1e1e1e;
                margin: 0;
                font-weight: 500;
            }
            .testi-tagline h2 {
                margin: 0;
                color: #636568;
                font-size: 43px;
                padding: 125px 0px 0px 0px;
            }
            
        </style>
        <style>
            .ribbon_3.popular span::before {
                border-left: 3px solid var(--my-color-var);
                border-top: 3px solid var(--my-color-var);
            }
            .ribbon_3.popular span::after {
                border-right: 3px solid var(--my-color-var);
                border-top: 3px solid var(--my-color-var);
            }

            h2{
                text-align:center;
                padding: 20px;
            }
            /* Slider */

            .slick-slide {
                margin: 0px 20px;
            }

            .slick-slide img {
                width: 100%;
            }

            .slick-slider
            {
                position: relative;
                display: block;
                box-sizing: border-box;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                -webkit-touch-callout: none;
                -khtml-user-select: none;
                -ms-touch-action: pan-y;
                touch-action: pan-y;
                -webkit-tap-highlight-color: transparent;
            }

            .slick-list
            {
                position: relative;
                display: block;
                overflow: hidden;
                margin: 0;
                padding: 0;
            }
            .slick-list:focus
            {
                outline: none;
            }
            .slick-list.dragging
            {
                cursor: pointer;
                cursor: hand;
            }

            .slick-slider .slick-track,
            .slick-slider .slick-list
            {
                -webkit-transform: translate3d(0, 0, 0);
                -moz-transform: translate3d(0, 0, 0);
                -ms-transform: translate3d(0, 0, 0);
                -o-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
            }

            .slick-track
            {
                position: relative;
                top: 0;
                left: 0;
                display: block;
            }
            .slick-track:before,
            .slick-track:after
            {
                display: table;
                content: '';
            }
            .slick-track:after
            {
                clear: both;
            }
            .slick-loading .slick-track
            {
                visibility: hidden;
            }

            .slick-slide
            {
                display: none;
                float: left;
                height: 100%;
                min-height: 1px;
            }
            [dir='rtl'] .slick-slide
            {
                float: right;
            }
            .slick-slide img
            {
                display: block;
            }
            .slick-slide.slick-loading img
            {
                display: none;
            }
            .slick-slide.dragging img
            {
                pointer-events: none;
            }
            .slick-initialized .slick-slide
            {
                display: block;
            }
            .slick-loading .slick-slide
            {
                visibility: hidden;
            }
            .slick-vertical .slick-slide
            {
                display: block;
                height: auto;
                border: 1px solid transparent;
            }
            .slick-arrow.slick-hidden {
                display: none;
            }
        </style>
        
        <!-- Owl Stylesheets -->
        <link rel="stylesheet" href="{{ url('resources/assets/web') }}/owlcarousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ url('resources/assets/web') }}/owlcarousel/assets/owl.theme.default.min.css">

        <!-- CSS -->
        <link href="{{ url('resources/assets/web') }}/css/base.css" rel="stylesheet">

        <!-- SPECIFIC CSS -->
        <link href="{{ url('resources/assets/web') }}/css/skins/square/grey.css" rel="stylesheet">
        <link href="{{ url('resources/assets/web') }}/css/date_time_picker.css" rel="stylesheet">

        <!-- Google web fonts -->
        <!--<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>-->
        <link rel="stylesheet" href="{{ url('resources/assets/web') }}/css/jquery.bxslider.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        

        <script src="{{ url('resources/assets/web') }}/js/jquery-1.11.2.min.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/common_scripts_min.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/functions.js"></script>

        <script src="{{ url('resources/assets/web') }}/js/icheck.js"></script>
        <script>
$('input').iCheck({
    checkboxClass: 'icheckbox_square-grey',
    radioClass: 'iradio_square-grey'
});
        </script>
        <script src="{{ url('resources/assets/web') }}/js/bootstrap-datepicker.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/bootstrap-timepicker.js"></script>
        <script>
//                                        $('input.date-pick').datepicker('setDate', 'today');
$('input.date-pick').datepicker();
$('input.time-pick').timepicker({
    minuteStep: 15,
    showInpunts: false
})
        </script>
        <script src="{{ url('resources/assets/web') }}/js/jquery.ddslick.js"></script>
        <script>
$("select.ddslick").each(function () {
    $(this).ddslick({
        showSelectedHTML: true
    });
});
        </script>

        <script src="{{ url('resources/assets/web') }}/js/jquery.bxslider.min.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/slick.js"></script>
        <script>
$(document).ready(function () {
    $('.slider').bxSlider({
        auto: true,
        infiniteLoop: true,
        speed: 300
    });
    $('.search-btn').click(function () {
        var date1 = new Date($('#CheckinDate').val());
        var date2 = new Date($('#CheckoutDate').val());
        var timeDiff = date2.getTime() - date1.getTime();
        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
//alert(diffDays);
        if ($('#CheckinDate').val() == "" || $('#CheckoutDate').val() == "") {
            $('#message-modal').html("Please select checkin & checkout date.");
            $('#myModal').modal();
        } else if (diffDays < 1) {
            $('#message-modal').html("Please select valid checkout date.");
            $('#myModal').modal();
        } else {
            $('#myForm').submit();
        }
//        $('.search-btn').attr('disabled', 'disabled');
//        $.ajax({
//            type: "POST",
//            url: "{{ url(Request::path()) }}",
//            'headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
//            dataType: "JSON",
//            data: {'CheckIn': $('#check_in').val(), 'CheckOut': $('#check_out').val(), 'Adults': $('#Adults').val(), 'Children': $('#Children').val(), 'Rooms': $('#Rooms').val()},
//            success: function (data) {
//                if (data.error) {
//                    $('#message-modal').html(data.message);
//                    $('#myModal').modal();
//                    //alert(data.message);
//                } else {
//                    window.location.href = '{{ url("cart") }}';
//                    $('.promo_msg').text(data.message);
//                    $('.promo_container').remove();
//                }
//            },
//            complete: function () {
//                $('.book-now-btn').removeAttr('disabled');
//            }
//        });
    });
});
        </script>
        <script type="application/ld+json">

{

  "@context": "https://schema.org",

  "@type": "LocalBusiness",

  "name": "Ktown Rooms Head Office",

  "image": "https://www.ktownrooms.com/resources/assets/web/img/ktown_logo.png",

  "@id": "",

  "url": "https://www.ktownrooms.com/",

  "telephone": "O3111222418",

  "address": {

    "@type": "PostalAddress",

    "streetAddress": "",

    "addressLocality": "Karachi",

    "postalCode": "",

    "addressCountry": "PK"

  },

  "openingHoursSpecification": {

    "@type": "OpeningHoursSpecification",

    "dayOfWeek": [

      "Monday",

      "Tuesday",

      "Wednesday",

      "Thursday",

      "Friday",

      "Saturday",

      "Sunday"

    ],

    "opens": "00:00",

    "closes": "23:59"

  },

  "sameAs": [

    "https://www.facebook.com/Ktownrooms/",

    "https://twitter.com/KtownRooms",

    "https://www.instagram.com/ktownrooms/"

  ]

}

</script>
        <script src="{{ url('resources/assets/web') }}/owlcarousel/owl.carousel.js"></script>
        <script>
$(document).ready(function () {
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: 3,
        loop: true,
        margin: 30,
        autoplay: true,
        autoplayTimeout: 7000,
        autoplayHoverPause: true
    });
    $('.play').on('click', function () {
        owl.trigger('play.owl.autoplay', [1000])
    });
    $('.stop').on('click', function () {
        owl.trigger('stop.owl.autoplay')
    });

    $('.customer-logos').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 2
                }
            }]
    });
})
        </script>
        
    </body>
</html>