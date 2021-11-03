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
        <title>{{ $configuration->WebsiteTitle }} | Payment</title>

        <link rel="shortcut icon" href="{{ url('resources/assets/web') }}/img/favicon.png" type="image/x-icon">
        <link rel="apple-touch-icon" type="image/x-icon" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-57x57-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-144x144-precomposed.png">

        <link href="{{ url('resources/assets/web') }}/css/base.css" rel="stylesheet">
        <link href="{{ url('resources/assets/web') }}/css/skins/square/grey.css" rel="stylesheet">
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

        <div class="layer"></div>

        <!-- Header================================================== -->
        @include('includes/header')

        <section id="hero_2" class="cart-main-banner">
            <div class="intro_title animated fadeInDown">
                <h1>Book your room</h1>
                <div class="bs-wizard">

                    <div class="col-xs-4 bs-wizard-step complete">
                        <div class="text-center bs-wizard-stepnum">Your cart</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="{{ url('cart') }}" class="bs-wizard-dot"></a>
                    </div>

                    <div class="col-xs-4 bs-wizard-step active">
                        <div class="text-center bs-wizard-stepnum">Your details</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="#" class="bs-wizard-dot"></a>
                    </div>

                    <div class="col-xs-4 bs-wizard-step disabled">
                        <div class="text-center bs-wizard-stepnum">Finish!</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="{{ url('confirmation') }}" class="bs-wizard-dot"></a>
                    </div>  

                </div>  
            </div>  
        </section>

        <div id="position">
            <div class="container">
                <ul>
                    <li><a href="{{ url('home') }}">Home</a></li>
                    <li><a href="{{ url('listing') }}">Manage Booking</a></li>
                    <li>Payment</li>
                </ul>
            </div>
        </div>
        {!! Form::open([ 'url' => 'book']) !!}
        <div class="container margin_60">
            <div class="row">
                <div class="col-md-12">
                    @include('includes/front_alerts')
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 add_bottom_15">
                    <div class="form_title">
                        <h3><strong>1</strong>Your Details</h3>
                    </div>
                    <?php
                    if (\Session::has('IsAdminCorporate') && \Session::get('IsAdminCorporate') == 1) {
                        ?>
                        <div class="step">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>First name</label>
                                        {!! Form::text('FirstName', \Session::get('FirstName'), ['class' => 'form-control', 'id' => 'FirstName']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Last name</label>
                                        {!! Form::text('LastName', \Session::get('LastName'), ['class' => 'form-control', 'id' => 'LastName']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        {!! Form::text('EmailAddress', \Session::get('EmailAddress'), ['class' => 'form-control', 'id' => 'EmailAddress']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Cell</label>
                                        {!! Form::text('Cell', \Session::get('Cell'), ['class' => 'form-control', 'id' => 'Cell']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="step">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>First name</label>
                                        {!! Form::text('FirstName', \Session::get('FirstName'), ['class' => 'form-control', 'id' => 'FirstName', 'readonly' => 'readonly']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Last name</label>
                                        {!! Form::text('LastName', \Session::get('LastName'), ['class' => 'form-control', 'id' => 'LastName', 'readonly' => 'readonly']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        {!! Form::text('EmailAddress', \Session::get('EmailAddress'), ['class' => 'form-control', 'id' => 'EmailAddress', 'readonly' => 'readonly']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Cell</label>
                                        {!! Form::text('Cell', \Session::get('Cell'), ['class' => 'form-control', 'id' => 'Cell', 'readonly' => 'readonly']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

<!--                    <div class="step">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>First name</label>
                                    {!! Form::text('FirstName', \Session::get('FirstName'), ['class' => 'form-control', 'id' => 'FirstName', 'readonly' => 'readonly']) !!}
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Last name</label>
                                    {!! Form::text('LastName', \Session::get('LastName'), ['class' => 'form-control', 'id' => 'LastName', 'readonly' => 'readonly']) !!}
                                </div>
                            </div>
                        </div>
                    </div>-->

                    <!--                    <div class="form_title">
                                            <h3><strong>2</strong>Payment Information</h3>
                                        </div>
                                        <div class="step">
                                            <div class="form-group">
                                                <label>Name on card</label>
                                                <input type="text" class="form-control" id="name_card_bookign" name="name_card_bookign">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Card number</label>
                                                        <input type="text" id="card_number" name="card_number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <img src="{{ url('resources/assets/web') }}/img/cards.png" width="207" height="43" alt="Cards" class="cards">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Expiration date</label>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" id="expire_month" name="expire_month" class="form-control" placeholder="MM">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" id="expire_year" name="expire_year" class="form-control" placeholder="Year">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Security code</label>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <input type="text" id="ccv" name="ccv" class="form-control" placeholder="CCV">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <img src="{{ url('resources/assets/web') }}/img/icon_ccv.gif" width="50" height="29" alt="ccv"><small>Last 3 digits</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                    
                                           
                                        </div>-->

                    <!--                        <hr>
                       
                                               <h4>Or checkout with Paypal</h4>
                                               <p>
                                                   Lorem ipsum dolor sit amet, vim id accusata sensibus, id ridens quaeque qui. Ne qui vocent ornatus molestie, reque fierent dissentiunt mel ea.
                                               </p>
                                               <p>
                                                   <img src="{{ url('resources/assets/web') }}/img/paypal_bt.png" alt="Image">
                                               </p>-->

                    <!--                    <div class="form_title">
                                            <h3><strong>3</strong>Billing Address</h3>
                                        </div>
                                        <div class="step">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Country</label>
                                                        <select class="form-control" name="country" id="country">
                                                            <option value="" selected>Select your country</option>
                                                            <option value="Europe">Europe</option>
                                                            <option value="United states">United states</option>
                                                            <option value="Asia">Asia</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Street line 1</label>
                                                        <input type="text" id="street_1" name="street_1" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Street line 2</label>
                                                        <input type="text" id="street_2" name="street_2" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <input type="text" id="city_booking" name="city_booking" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>State</label>
                                                        <input type="text" id="state_booking" name="state_booking" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Postal code</label>
                                                        <input type="text" id="postal_code" name="postal_code" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->

                    <div id="policy">
                        <h4>Cancellation policy</h4>
                        <div class="form-group">
                            <label>
                                {!! Form::checkbox('PrivacyCheckbox', 1, null, ['id' => 'policy_terms']) !!}
                                I accept terms and conditions and general policy.
                            </label>
                        </div>
                        <button type="submit" class="btn_1 medium">Book now</button>
                    </div>
                </div>
                <?php
                $Adults = 0;
                $Children = 0;
                $TotalGuests = 0;
                $TotalRooms = 0;
                $TotalNights = 0;
                $TotalCost = 0;
                if (\Session::has('RoomsCart') && count(\Session::get('RoomsCart')) > 0) {
                    foreach (\Session::get('RoomsCart') as $session) {
                        $Adults += $session['Adults'];
                        $Children += $session['Children'];
                        $TotalGuests += ($session['Adults'] + $session['Children']);
                        $TotalRooms += $session['Rooms'];
                        $TotalNights += $session['TotalNights'];
                        $TotalCost += $session['Total'];
                    }
                }
                ?>

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
                        <button type="submit" class="btn_full">Book now</button>
                        <!--<a class="btn_full_outline" href="{{ url('hotels') }}"><i class="icon-right"></i> Book another hotel</a>-->
                    </div>
                    <div class="box_style_4 custom_need_help">
                        <img src="{{ url('resources/assets/web/img/need-help-section.png') }}" />
                        <h4>Need <span>Help?</span></h4>
                        <a href="tel://<?php echo "+92(311) 1222 418" ?>" class="phone"><?php echo "+92(311) 1222 418" ?></a>
                        <a href="tel://<?php echo $configuration->Contact1; ?>" class="phone"><?php echo $configuration->Contact1; ?></a>
                    </div>
                </aside>

            </div>
        </div>
        {!! FORM::close() !!}
        @include('includes/footer')

        <div id="toTop"></div>
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