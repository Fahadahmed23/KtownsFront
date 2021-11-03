<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="B7yIaUV72XaRbRwP1syZaXouPYPcoss4eN_MigRITTo" />
        <meta name="description" content="Citytours - Premium site template for city tours agencies, transfers and tickets.">
        <meta name="author" content="Ansonika">
        <title>KTown Rooms | View Booking</title>

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

        <link rel="stylesheet" href="{{ url('resources/assets/web') }}/font-awesome/css/font-awesome.min.css">

        <!-- Google web fonts -->
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="{{ url('resources/assets/web') }}/plugins/datatables/dataTables.bootstrap.css">

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
        <!-- End Preload -->

        <div class="layer"></div>

        @include('includes/header')

        <div  class="container margin_160">

            <div class="row">
                <aside class="col-lg-3 col-md-3">

                    @include('includes/user_sidebar')

                </aside>
                <div class="col-lg-9 col-md-9">

                    <div id="filters_col" class="user-dashboard">
                        <h3>View My Booking (<?php echo ($booking->Status == 1 ? "Approved" : ($booking->Status == 2 ? "Declined" : ($booking->Status == 3 ? "Canceled" : "Pending"))); ?>)
                            <a href="<?php echo url('invoice/' . $booking->BookingID) ?>" class="btn btn-success btn-sm pull-right" target="_blank"><i class="fa fa-eye"></i> View Invoice</a>
                            <?php
                            if ($booking->Status == 0 || $booking->Status == 1) {
                                ?>
                                <a href="<?php echo url('cancel-booking/' . $booking->BookingID) ?>" class="btn btn-warning btn-sm pull-right" style="margin-right:12px;"><i class="fa fa-times"></i> Cancel Booking</a>
                                <?php
                            }
                            ?>
                        </h3>

                        @include('includes/front_alerts')

                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width:40%;">First Name:</th>
                                        <td>{{ $booking->FirstName }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:40%;">Last Name:</th>
                                        <td>{{ $booking->LastName }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:40%;">Email:</th>
                                        <td>{{ $booking->Email }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:40%;">Cell:</th>
                                        <td>{{ $booking->Cell }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th style="width:40%;">Booking Total:</th>
                                            <td class="text-right">PKR {{ number_format($booking->BookingTotal, 0) }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width:40%;">Discount:</th>
                                            <td class="text-right">PKR {{ number_format($booking->Discount, 0) }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width:40%;">Promo Discount:</th>
                                            <td class="text-right">PKR {{ number_format($booking->PromoDiscount, 0) }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width:40%;">Total Amount:</th>
                                            <td class="text-right">PKR {{ number_format($booking->TotalAmount, 0) }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Rooms</th>
                                            <th>Quantity</th>
                                            <th>Check in</th>
                                            <th>Check out</th>
                                            <th>Adults</th>
                                            <th>Children</th>
                                            <th>Discount</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (count($booking_hotels) > 0) {
                                            foreach ($booking_hotels as $hotel) {
                                                ?>
                                                <tr>
                                                    <td>{{ $hotel->HotelName }}</td>
                                                    <td>{{ $hotel->RoomQty }}</td>
                                                    <td>{{ $hotel->CheckInDate }}</td>
                                                    <td>{{ $hotel->CheckOutDate }}</td>
                                                    <td>{{ $hotel->Adults }}</td>
                                                    <td>{{ $hotel->Children }}</td>
                                                    <td>{{ $hotel->Discount }}</td>
                                                    <td>PKR {{ number_format($hotel->Total, 0) }}</td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        @include('includes/footer')

        <div id="toTop"></div>

        <script src="{{ url('resources/assets/web') }}/js/jquery-1.11.2.min.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/common_scripts_min.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/functions.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/cat_nav_mobile.js"></script>
        <script src="{{ url('resources/assets/web/') }}/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ url('resources/assets/web/') }}/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <script>$('#cat_nav').mobileMenu();</script>
    </body>
</html>