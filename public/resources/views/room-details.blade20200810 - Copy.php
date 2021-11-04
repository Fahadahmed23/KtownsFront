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
        <title>{{ $configuration->WebsiteTitle }} | Room details</title>

        <!-- Favicons-->
        <link rel="shortcut icon" href="{{ url('resources/assets/web') }}/img/favicon.png" type="image/x-icon">
        <link rel="apple-touch-icon" type="image/x-icon" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-57x57-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-144x144-precomposed.png">

        <!-- CSS -->
        <link href="{{ url('resources/assets/web') }}/css/base.css" rel="stylesheet">

        <!-- CSS -->
        <link href="{{ url('resources/assets/web') }}/css/date_time_picker.css" rel="stylesheet">

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

        <section class="parallax-window" data-parallax="scroll" data-image-src="{{ url('resources/assets/web') }}/img/single_tour_bg_1.jpg" data-natural-width="1400" data-natural-height="470">
            <div class="parallax-content-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <h1>Hotel Name</h1>
                            <span>Gulshan-e-Iqbal, Karachi</span>
                            <span class="rating"><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><small>(75)</small></span>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div id="price_single_main">
                                from/per person <span><sup>PKR </sup>5200</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End section -->

        <div id="position">
            <div class="container">
                <ul>
                    <li><a href="{{ url('home') }}">Home</a></li>
                    <li><a href="{{ url('listing') }}">Manage Booking</a></li>
                    <li>Details</li>
                </ul>
            </div>
        </div><!-- End Position -->

        <div class="collapse" id="collapseMap">
            <div id="map" class="map"></div>
        </div><!-- End Map -->

        <div class="container margin_60">
            <div class="row">
                <div class="col-md-8" id="single_tour_desc">

                    <div id="single_tour_feat">
                        <ul>
                            <li><i class="icon_set_1_icon-4"></i>Museum</li>
                            <li><i class="icon_set_1_icon-83"></i>3 Hours</li>
                            <li><i class="icon_set_1_icon-13"></i>Accessibiliy</li>
                            <li><i class="icon_set_1_icon-82"></i>144 Likes</li>
                            <li><i class="icon_set_1_icon-22"></i>Pet allowed</li>
                            <li><i class="icon_set_1_icon-97"></i>Audio guide</li>
                            <li><i class="icon_set_1_icon-29"></i>Tour guide</li>
                        </ul>
                    </div>

                    <p class="visible-sm visible-xs"><a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a></p><!-- Map button for tablets/mobiles -->

                    <div class="row">
                        <div class="col-md-3">
                            <h3>Description</h3>
                        </div>
                        <div class="col-md-9">
                            <h4>Features</h4>
                            <p>Featuring free WiFi and a year-round outdoor pool, Hotel offers accommodations in Karachi. Guests can enjoy the on-site bar. Free private parking is available on site.</p>

                            <p>Each room is equipped with a flat-screen TV with cable channels. Certain rooms include views of the pool or garden. The rooms have a private bathroom equipped with a bathtub or shower.</p>

                            <p>You will find concierge services at the property.</p>

                            <p>Jinnah International Airport is 22.5 km from the property. </p>

                            <p>Couples in particular like the location – they rated it 8.3 for a two-person trip.</p>

                            <p>You get a good value, according to couples who spent time at the property. They rate it 8.9.</p>

                            <p>We speak your language!</p>
                            
                            <h4>What's include</h4>
                            <p>Features include in this package</p>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <ul class="list_ok">
                                        <li>Free WIFI</li>
                                        <li>Pets Allowed</li>
                                    </ul>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <ul class="list_ok">
                                        <li>Smoking allowed outside</li>
                                    </ul>
                                </div>
                            </div><!-- End row  -->
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-3">
                            <h3>Schedule</h3>
                        </div>
                        <div class="col-md-9">
                            <div class=" table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th colspan="2">
                                                1st March to 31st October
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                Monday
                                            </td>
                                            <td>
                                                10.00 - 17.30
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Tuesday
                                            </td>
                                            <td>
                                                09.00 - 17.30
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Wednesday
                                            </td>
                                            <td>
                                                09.00 - 17.30
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Thursday
                                            </td>
                                            <td>
                                                <span class="label label-danger">Closed</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Friday
                                            </td>
                                            <td>
                                                09.00 - 17.30
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Saturday
                                            </td>
                                            <td>
                                                09.00 - 17.30
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Sunday
                                            </td>
                                            <td>
                                                10.00 - 17.30
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong><em>Last Admission</em></strong>
                                            </td>
                                            <td>
                                                <strong>17.00</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class=" table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th colspan="2">
                                                1st November to 28th February
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                Monday
                                            </td>
                                            <td>
                                                10.00 - 17.30
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Tuesday
                                            </td>
                                            <td>
                                                09.00 - 17.30
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Wednesday
                                            </td>
                                            <td>
                                                09.00 - 17.30
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Thursday
                                            </td>
                                            <td>
                                                <span class="label label-danger">Closed</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Friday
                                            </td>
                                            <td>
                                                09.00 - 17.30
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Saturday
                                            </td>
                                            <td>
                                                09.00 - 17.30
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Sunday
                                            </td>
                                            <td>
                                                10.00 - 17.30
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong><em>Last Admission</em></strong>
                                            </td>
                                            <td>
                                                <strong>17.00</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div><!--End  single_tour_desc-->

                <aside class="col-md-4">
<!--                    <p class="hidden-sm hidden-xs">
                        <a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
                    </p>-->
                    <div class="box_style_1 expose">
                        <h3 class="inner">- Booking -</h3>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label><i class="icon-calendar-7"></i> Select a date</label>
                                    <input class="date-pick form-control" data-date-format="M d, D" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label><i class=" icon-clock"></i> Time</label>
                                    <input class="time-pick form-control" value="12:00 AM" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Adults</label>
                                    <div class="numbers-row">
                                        <input type="text" value="1" id="adults" class="qty2 form-control" name="quantity">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Children</label>
                                    <div class="numbers-row">
                                        <input type="text" value="0" id="children" class="qty2 form-control" name="quantity">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <table class="table table_summary">
                            <tbody>
                                <tr>
                                    <td>
                                        Adults
                                    </td>
                                    <td class="text-right">
                                        2
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Children
                                    </td>
                                    <td class="text-right">
                                        0
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Total amount
                                    </td>
                                    <td class="text-right">
                                        3x PKR 5200
                                    </td>
                                </tr>
                                <tr class="total">
                                    <td>
                                        Total cost
                                    </td>
                                    <td class="text-right">
                                        PKR 15400
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a class="btn_full" href="{{ url('cart') }}">Book now</a>
                        <a class="btn_full_outline" href="#"><i class=" icon-heart"></i> Add to whislist</a>
                    </div><!--/box_style_1 -->

                    <div class="box_style_4">
                        <i class="icon_set_1_icon-90"></i>
                        <h4><span>Book</span> by phone</h4>
                        <a href="tel://004542344599" class="phone">+45 423 445 99</a>
                    </div>

                </aside>
            </div><!--End row -->
        </div><!--End container -->
        @include('includes/footer')<!-- End footer -->

        <div id="toTop"></div><!-- Back to top button -->
        <div id="overlay"></div>
        
        <!-- Common scripts -->
        <script src="{{ url('resources/assets/web') }}/js/jquery-1.11.2.min.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/common_scripts_min.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/functions.js"></script>

        <!-- Specific scripts -->
        <script src="{{ url('resources/assets/web') }}/js/icheck.js"></script>
        <script>
$('input').iCheck({
    checkboxClass: 'icheckbox_square-grey',
    radioClass: 'iradio_square-grey'
});
        </script>

        <!-- Date and time pickers -->
        <script src="{{ url('resources/assets/web') }}/js/bootstrap-datepicker.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/bootstrap-timepicker.js"></script>
        <script>
$('input.date-pick').datepicker('setDate', 'today');
$('input.time-pick').timepicker({
    minuteStep: 15,
    showInpunts: false
})
        </script>

        <!--Review modal validation -->
        <script src="{{ url('resources/assets/web') }}/assets/validate.js"></script>

        <!-- Map -->
        <script src="http://maps.googleapis.com/maps/api/js"></script>
        <script src="{{ url('resources/assets/web') }}/js/map.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/infobox.js"></script>

    </body>
</html>