<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="Citytours - Premium site template for city tours agencies, transfers and tickets.">
        <meta name="author" content="Ansonika">
        <title>{{ $configuration->WebsiteTitle }} | Order Summary</title>

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

        <!-- Google web fonts -->
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>

        <!--[if lt IE 9]>
          <script src="js/html5shiv.min.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->

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
        <!-- Mobile menu overlay mask -->

        <!-- Header================================================== -->
        @include('includes/header')
        <section id="hero_2" class="cart-main-banner">
            <div class="intro_title animated fadeInDown">
                <h1>Book your room</h1>
                <div class="bs-wizard">

                    <div class="col-xs-4 bs-wizard-step complete">
                        <div class="text-center bs-wizard-stepnum">Your cart</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="#" class="bs-wizard-dot"></a>
                    </div> 

                    <div class="col-xs-4 bs-wizard-step complete">
                        <div class="text-center bs-wizard-stepnum">Your details</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="#" class="bs-wizard-dot"></a>
                    </div>

                    <div class="col-xs-4 bs-wizard-step complete">
                        <div class="text-center bs-wizard-stepnum">Finish!</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="#" class="bs-wizard-dot"></a>
                    </div>  

                </div>  <!-- End bs-wizard --> 
            </div>   <!-- End intro-title --> 
        </section><!-- End Section hero_2 -->

        <div id="position">
            <div class="container">
                <ul>
                    <li><a href="{{ url('home') }}">Home</a></li>
                    <li><a href="{{ url('listing') }}">Manage Booking</a></li>
                    <li>Summary</li>
                </ul>
            </div>
        </div><!-- End position -->

        <div class="container margin_60">
            <div class="row">
                <div class="col-md-8 add_bottom_15">

<!--                    <div class="form_title">
                        <h3><strong><i class="icon-ok"></i></strong>Thank you!</h3>
                    </div>
                    <div class="step">
                        <p>Your order submitted successfully, we will confirm you availability soon</p>
                    </div>-->

                    <div class="form_title">
                        <h3><strong><i class="icon-tag-1"></i></strong>Booking summary</h3>
                    </div>
                    <div class="step">
                        <?php
                        if (count($BookingHotels) > 0) {
                            foreach ($BookingHotels as $hotel) {
                                ?>
                                <table class="table confirm">
                                    <thead>
                                        <tr>
                                            <th colspan="2">{{ $hotel->ExperiencesName }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Check In</strong></td>
                                            <td>{{ $hotel->CheckInDate }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Check Out</strong></td>
                                            <td>{{ $hotel->CheckOutDate }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Adults</strong></td>
                                            <td>{{ $hotel->Adults }}</td>
                                        </tr>
                                        <!--<tr>
                                            <td><strong>Children</strong></td>
                                            <td>{{ $hotel->Children }}</td>
                                        </tr>-->
                                        <tr>
                                            <td><strong>Total No of Guests</strong></td>
                                            <td>{{ $hotel->RoomQty }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php
                            }
                        }
                        ?>
                    </div><!--End step -->
                </div><!--End col-md-8 -->

                <aside class="col-md-4">
                    <div class="box_style_1">
                        <h3 class="inner">Thank you!</h3>
                        <p style="font-size: 16px;">Your order submitted successfully, we will confirm you availability soon</p>
                        <hr>
                        <a class="btn_full" href="{{ url('experiences-invoice/'.$Booking->ExperiencesBookingID) }}" target="_blank">View your invoice</a>
                    </div>
                    <div class="box_style_4 custom_need_help">
                        <img src="{{ url('resources/assets/web/img/need-help-section.png') }}" />
                        <h4>Have <span>questions?</span></h4>
                        <a href="tel://<?php echo $configuration->Contact1; ?>" class="phone"><?php echo $configuration->Contact1; ?></a>
                    </div>
                </aside>

            </div><!--End row -->
        </div><!--End container -->
        @include('includes/footer')<!-- End footer -->

        <div id="toTop"></div><!-- Back to top button -->

        <div id="toTop"></div>
        <!-- Jquery -->
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





    </body>
</html>