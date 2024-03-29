<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="B7yIaUV72XaRbRwP1syZaXouPYPcoss4eN_MigRITTo" />
        <meta name="author" content="Ansonika">
        <title>Hotels in Lahore| Guest House In Lahore| Ktown Rooms</title>
        <meta name="description" content="Book a hotels in Lahore, get the best hotels and guest house deals in Lahore with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.">
        <!-- Favicons-->
        <link rel="shortcut icon" href="{{ url('resources/assets/web') }}/img/favicon.png" type="image/x-icon">
        <link rel="apple-touch-icon" type="image/x-icon" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-57x57-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-144x144-precomposed.png">

        <!-- CSS -->
        <link href="{{ url('resources/assets/web') }}/css/base.css" rel="stylesheet">

        <!-- Radio and check inputs -->
        <link href="{{ url('resources/assets/web') }}/css/skins/square/grey.css" rel="stylesheet">

        <!-- Range slider -->
        <link href="{{ url('resources/assets/web') }}/css/ion.rangeSlider.css" rel="stylesheet" >
        <link href="{{ url('resources/assets/web') }}/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">

        <!-- Google web fonts -->
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>

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
        <style>
            .ribbon_3.popular span::before {
                border-left: 3px solid var(--my-color-var);
                border-top: 3px solid var(--my-color-var);
            }
            .ribbon_3.popular span::after {
                border-right: 3px solid var(--my-color-var);
                border-top: 3px solid var(--my-color-var);
            }
        </style>

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
        <!-- End Preload -->

        <div class="layer"></div>

        @include('includes/header')


        <section class="parallax-window" data-parallax="scroll" data-image-src="{{ url('resources/assets/web') }}/img/covers/lahore-cover.jpg" data-natural-width="1400" data-natural-height="470">
            <div class="parallax-content-1">
                <div class="animated fadeInDown">
                    <h1>Lahore Top Hotels</h1>
                    <!--<p>Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.</p>-->
                </div>
            </div>
        </section><!-- End section -->

        <div id="position">
            <div class="container">
                <ul>
                    <li><a href="{{ url('home') }}">Home</a></li>
                    <li>Manage Bookings</li>
                </ul>
            </div>
        </div><!-- Position -->

        <div class="collapse" id="collapseMap">
            <div id="map" class="map"></div>
        </div><!-- End Map -->

        <div  class="container margin_60">

            <div class="row">
                <aside class="col-lg-3 col-md-3">

                    <div id="filters_col">
                        <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt"><i class="icon_set_1_icon-65"></i>Filters <i class="icon-plus-1 pull-right"></i></a>
                        <div class="collapse" id="collapseFilters">
                            <div class="filter_type">
                                <h6>Cities</h6>
                                <ul>
                                    <?php
                                    if (count($cities) > 0) {
                                        foreach ($cities as $city) {
                                            ?>
                                            <li>
                                                <!--<label><input type="checkbox">-->
                                                <?php echo $city->CityName; ?>
                                                <!--</label>-->
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="filter_type">
                                <h6>Rating</h6>
                                <ul>
                                    <li><img src="{{ url('resources/assets/web/img/ranking5.png') }}" /></li>
                                    <li><img src="{{ url('resources/assets/web/img/ranking4.png') }}" /></li>
                                    <li><img src="{{ url('resources/assets/web/img/ranking3.png') }}" /></li>
                                    <li><img src="{{ url('resources/assets/web/img/ranking2.png') }}" /></li>
                                    <li><img src="{{ url('resources/assets/web/img/ranking1.png') }}" /></li>
                                </ul>
                            </div>
                            <div class="filter_type">
                                <h6>Classes</h6>
                                <ul>
                                    <?php
                                    if (count($hotel_types) > 0) {
                                        foreach ($hotel_types as $hotel_type) {
                                            ?>
                                            <li><label>
                                                    <!--<input type="checkbox">-->
                                                    <?php echo $hotel_type->HotelTypeName; ?></label></li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="filter_type">
                                <h6>Facility</h6>
                                <ul>
                                    <?php
                                    if (count($services) > 0) {
                                        foreach ($services as $service) {
                                            ?>
                                            <li><label>
                                                    <!--<input type="checkbox">-->
                                                    <?php echo $service->ServiceName; ?></label></li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div><!--End collapse -->
                    </div><!--End filters col-->
                    <div class="box_style_2 custom_need_help">
                        <img src="{{ url('resources/assets/web/img/need-help-section.png') }}" />
                        <h4>Need <span>Help</span>?</h4>
                        <a href="tel://<?php echo "+92(311) 1222 418"; ?>" class="phone"><?php echo "+92(311) 1222 418"; ?></a>
                        <a href="tel://<?php echo $configuration->Contact1; ?>" class="phone"><?php echo $configuration->Contact1; ?></a>
                    </div>
                </aside>
                <div class="col-lg-9 col-md-9">
                    <div>
                        <h1 style="margin-top:0px;">HOTELS IN LAHORE</h1>
                        <p>All over Pakistan, Lahore has brought a strong cultural influence. Lahore is famous for cultural activities, artifact and desi food, it has so many must-visit places to offer that you completely forget about traffic and become captivated by the fun and excitement you can enjoy. Pakistan’s major centre for publishing and literary is Lahore; moreover, this city has some leading universities. It also hosts the tourists with some must-visit attractions like Badshahi Mosque, Minar e Pakistan, Wagha Boarder, Sheesh Mahal, Wazir Khan Mosque, and a lot more.<span id="dots">...</span></p>
                        <div id="more">
                            <ul style="list-style: none;">
                                <li>
                                    <strong>1. Badshahi Mosque</strong><br>
                                    <p>The Badshahi Mosque is a Mughal era mosque in Lahore, It is the capital of Punjab (Pakistani province). The mosque is located in the west of Shahi Qila along the borders of the Walled City of Lahore, and is generally considered as a prominent attraction of Lahore.</p>
                                    <p>The Badshahi Mosque is a significant example of Mughal architecture, with an exterior that is embellished with red sandstone with marble trim. It remains the biggest grand mosque of the Mughal-era, and is the second-biggest mosque in Pakistan.</p>
                                </li>
                                <li>
                                    <strong>2. Minar-e-Pakistan</strong><br>
                                    <p>Minar-e-Pakistan is a milestone, this milestone is located in the eminent Iqbal Park of Lahore which is one of the country's greatest urban parks. Worked in the midst of the 1960s, it holds a great importance for the country as on this site the Lahore Resolution was passed by the All-India Muslim League on 23rd of March, 1940. This place is most popular among the tourists.</p>
                                </li>
                                <li>
                                    <strong>3. Wagha Boarder</strong><br>
                                    <p>A trip to Lahore would not be done without a night at the Wagah Boarder. This location denotes the border among Pakistan and its neighbor, India. Every tourists must visit this place to observe the Wagah Boarder performance, which is a military practice/parade performed by both Pakistan and India since 1959. The audience on both sides is something which every visitor should experience before leaving the city.</p>
                                </li>
                            </ul>
                            <p>We believe that if you’re visiting a city, you should be able to enjoy the best of it and stay there at the most reasonable price. KTown Rooms provides an online hotel booking services for all travelers in Lahore, it is basically a family hotel as well as hotel for business trips. Ktown Rooms is known for cheapest hotels with standard services in Lahore, it allows travelers to book instantly from cheap hotel in Lahore. Hotels of Ktown Rooms will be/is located in different places like in gulberg, and near railway station as per their customer’s convenience. If you are looking for 3 stars hotels in Lahore, Ktown Rooms would be a best option as it is a cheap hotel with furnished furniture and complete amenities like fresh linens/bedsheets, clean washrooms, healthy breakfast, Wifi, Air conditioners, LCDs and more.</p>
                            <p>In addition to this, Ktown Rooms offers apartments as well which eliminates the problem of searching apartments for renting purpose. Several numbers of apartments in Lahore come under Ktown Rooms that maintains its profile, hires and trains stuff, prepares annual budget, manages IT infrastructure, provides designed policies, serves food and beverages in every property.</p>
                        </div>
                        <button style="margin: 0 0 14px;" onclick="myFunction()" class="btn_1" id="myBtn">Read more</button>
                    </div>
                
                <img src="{{ url('public/uploads/website/hotels/hotels-in-lahore/modeltown.png') }}">
                <hr>
                <img src="{{ url('public/uploads/website/hotels/hotels-in-lahore/dhaphase.png') }}">
                <hr>
                <img src="{{ url('public/uploads/website/hotels/hotels-in-lahore/johartown.png') }}">
                </div>
            </div>
        </div>
    </div>
    @include('includes/footer')
    <div id="toTop"></div>
    <style>
        #more {display: none;}
        p {margin: 11px 0 20px;text-align: justify;}
    </style>
    <script src="{{ url('resources/assets/web') }}/js/jquery-1.11.2.min.js"></script>
    <script src="{{ url('resources/assets/web') }}/js/common_scripts_min.js"></script>
    <script src="{{ url('resources/assets/web') }}/js/functions.js"></script>

    <!-- Specific scripts -->
    <!-- Cat nav mobile -->
    <script  src="{{ url('resources/assets/web') }}/js/cat_nav_mobile.js"></script>
    <script>$('#cat_nav').mobileMenu();</script>
    <!-- Check and radio inputs -->
    <script src="{{ url('resources/assets/web') }}/js/icheck.js"></script>
    <script>
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-grey',
            radioClass: 'iradio_square-grey'
        });
    </script>
    <!-- Map -->
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDkBQySc6BCRL5QujNr660ZH5u5dTFPDLc"></script>
    <script src="{{ url('resources/assets/web') }}/js/map.js"></script>
    <script src="{{ url('resources/assets/web') }}/js/infobox.js"></script>
</body>
</html>