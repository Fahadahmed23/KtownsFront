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
        <title>My Booking | Book best and economical hotels & apartments now</title>
        <meta name="description" content="Add booking to your cart through 3 taps/clicks only. Book rooms with free breakfast, AC, clean washrooms and beautiful interior and check its details on our website.">

        <!-- Favicons-->
        <link rel="shortcut icon" href="{{ url('resources/assets/web') }}/img/favicon.png" type="image/x-icon">
        <link rel="apple-touch-icon" type="image/x-icon" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-57x57-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-144x144-precomposed.png">

        <!-- CSS -->
        <link href="{{ url('resources/assets/web') }}/css/base.css" rel="stylesheet">

        <!-- CSS -->
        <link href="{{ url('resources/assets/web') }}/css/jquery.switch.css" rel="stylesheet">

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

                    <div class="col-xs-4 bs-wizard-step active">
                        <div class="text-center bs-wizard-stepnum">Your cart</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="{{ url('cart') }}" class="bs-wizard-dot"></a>
                    </div>

                    <div class="col-xs-4 bs-wizard-step disabled">
                        <div class="text-center bs-wizard-stepnum">Your details</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="{{ url('payment') }}" class="bs-wizard-dot"></a>
                    </div>

                    <div class="col-xs-4 bs-wizard-step disabled">
                        <div class="text-center bs-wizard-stepnum">Finish!</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="javascript:void(0);" class="bs-wizard-dot"></a><?php /*{{ url('confirmation') }}*/ ?>
                    </div>  

                </div>  <!-- End bs-wizard --> 
            </div>   <!-- End intro-title --> 
        </section><!-- End Section hero_2 -->

        <div id="position">
            <div class="container">
                <ul>
                    <li><a href="{{ url('home') }}">Home</a></li>
                    <li><a href="javascript:void(0);">Manage Booking</a></li><?php /*{{ url('listing') }} */?>
                    <li>Cart</li>
                </ul>
            </div>
        </div><!-- End position -->

        <div class="container margin_60">
            <?php
            if (\Session::has('RoomsCart') && count(\Session::get('RoomsCart')) > 0) {
                $Adults = 0;
                $Children = 0;
                $TotalGuests = 0;
                $TotalRooms = 0;
                $TotalNights = 0;
                $TotalCost = 0;
                ?>
                <div class="row">
                    <div class="col-md-8">

                        <table class="table table-striped cart-list add_bottom_30">
                            <thead>
                                <tr>
                                    <th>Rooms</th>
                                    <th>No. of rooms</th>
                                    <th>No. of guests</th>
                                    <th>Dis.</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach (\Session::get('RoomsCart') as $session) {
                                    $Adults += $session['Adults'];
                                    $Children += $session['Children'];
                                    $TotalGuests += ($session['Adults'] + $session['Children']);
                                    $TotalRooms += $session['Rooms'];
                                    $TotalNights += $session['TotalNights'];
                                    $TotalCost += $session['Total'];
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="thumb_cart">
                                                <img src="{{ url('public/uploads/website/hotels/thumb/'.$session['Thumbnail']) }}" alt="<?php echo $session['HotelName']; ?>" style="height:100%;">
                                            </div>
                                            <span class="item_cart"><?php echo $session['HotelName']; ?><br><small>(<?php echo $session['HotelClass']; ?>)</small></span>
                                        </td>
                                        <td><?php echo $session['Rooms']; ?></td>
                                        <td><?php echo ($session['Adults'] + $session['Children']); ?></td>
                                        <td>0%</td>
                                        <td><strong>PKR <?php echo number_format($session['Total'], 0); ?></strong></td>
                                        <td class="options">
                                            <a href="{{ url('remove-item/'.$session['HotelID']) }}"><i class=" icon-trash"></i></a>
                                            <a href="{{ url('details/'.$session['Slug']) }}"><i class="icon-edit"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>

            <!--<div class="add_bottom_15"><small>* Prices for person.</small></div>-->
                    </div><!-- End col-md-8 -->

                    <aside class="col-md-4">
                        <div class="box_style_1">
                            <h3 class="inner">- Summary -</h3>
                            <table class="table table_summary">
                                <tbody>
                                    <tr>
                                        <td>Adults</td>
                                        <td class="text-right"><?php echo $Adults ?></td>
                                    </tr>
                                    <tr>
                                        <td>Children</td>
                                        <td class="text-right"><?php echo $Children ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total Guests</td>
                                        <td class="text-right"><?php echo $TotalGuests ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total Rooms</td>
                                        <td class="text-right"><?php echo $TotalRooms ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total Nights</td>
                                        <td class="text-right"><?php echo $TotalNights ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td class="text-right">PKR <?php echo number_format($TotalCost, 0) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Discount</td>
                                        <td class="text-right">PKR 0</td>
                                    </tr>
                                    <?php
                                    $PromoDiscount = 0;
                                    if (\Session::has('PromoApplied')) {
                                        $PromoDiscount = ($TotalCost * \Session::get('PromoDiscount') / 100);
                                        ?>
                                        <tr>
                                            <td>Promo Discount</td>
                                            <td class="text-right">PKR <?php echo number_format($PromoDiscount, 0); ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr class="total">
                                        <td>Total cost</td>
                                        <td class="text-right">PKR <?php echo number_format($TotalCost - $PromoDiscount, 0); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <a class="btn_full" href="{{ url('payment') }}">Check out</a>
                            <!--<a class="btn_full_outline" href="{{ url('hotels') }}"><i class="icon-right"></i> Book another room</a>-->
                        </div>
                        <div class="box_style_4 custom_need_help">
                            <img src="{{ url('resources/assets/web/img/need-help-section.png') }}" />
                            <h4>Need <span>Help?</span></h4>
                            <a href="tel://<?php echo "+92(311) 1222 418" ?>" class="phone"><?php echo "+92(311) 1222 418" ?></a>
                            <a href="tel://<?php echo $configuration->Contact1; ?>" class="phone"><?php echo $configuration->Contact1; ?></a>
                        </div>
                    </aside><!-- End aside -->

                </div><!--End row -->
                <?php
            } else {
                echo '<center><h3>Cart is empty</h3></center>';
                echo '<center><h5 style="margin-bottom:200px;"><a href="' . url('hotels') . '">Continue Booking</a></h5></center>';
            }
            ?>
        </div><!--End container -->

        @include('includes/footer')

        <div id="toTop"></div><!-- Back to top button -->

        <!-- Jquery -->
        <script src="{{ url('resources/assets/web') }}/js/jquery-1.11.2.min.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/common_scripts_min.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/functions.js"></script>

    </body>
</html>