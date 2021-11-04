<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Ansonika">
        <title>Hotels in Neelum Valley | Guest House In Neelum Valley | Ktown Rooms</title>
        <meta name="description" content="Book a hotels in Neelum Valley, get the best hotels and guest house deals in Neelum Valley with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.">
        <meta name="google-site-verification" content="B7yIaUV72XaRbRwP1syZaXouPYPcoss4eN_MigRITTo" />
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


        <section class="parallax-window" data-parallax="scroll" data-image-src="{{ url('resources/assets/web') }}/img/covers/neelum-valley-cover.jpg" data-natural-width="1400" data-natural-height="470">
            <div class="parallax-content-1">
                <div class="animated fadeInDown">
                    <h1>Neelum Valley Top Hotels</h1>
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
                        <h1 style="margin-top:0px;">HOTELS IN NEELUM VALLEY</h1>
                        <p>Neelum Valley is around 200 kilometers in length and located in the North and North East of Muzaffarabad beside Kaghan Valley. Phenomenal attractiveness, and beautiful view, stunning hills on the two sides of the Neelum River, forests, charming and attracting streams make the valley even more stunning.</p>
                        <p>This place is best for trekking. Transportation is available on this route and hotels and guest houses in Neelum Valley for the accommodation of tourists to make the tourist attractions easily accessible to the travelers; however, in order to make special dishes by yourself, these hotels lack in providing facilities to cook.<span id="dots">...</span></p>
                           <div id="more">
                               <ul style="list-style: none;">
                                   <li>
                                       <strong>1. Kutton</strong><br>
                                        <p>The peaceful attractiveness of Kutton, It is located 16 kilometers away from Kundal Shahi. It is accessible by a smooth road. As this is the place that is mostly visited and considered to be the must visit attraction for this purpose, the tourism department has constructed huts near Kutton to accommodate the tourists.</p>
                                        
                                   </li>
                                   <li>
                                    <strong>2. Authmuqam</strong><br>
                                    <p>Authmuqam is located 10 kilometers away from Kundal Shahi at a height of 1371 meters. It is the sub-divisional headquarter of the area and tourist point attracted because of climbing and exploring the valley. It is a must visit place known for its richness in natural products. All the necessity facilities like local markets, banks, clinics, telephone and hospitals are easily accessible by this spot.</p>
                                    
                                   </li>
                                   <li>
                                       <strong>3. Neelum</strong><br>
                                        <p>Neelum is located on the right bank of the Neelum river. It is populated with one thousand people, It has several bazaars and several guest houses and hotels located nearby Neelum river for the tourists to give them a beautiful view and atmosphere.</p>
                                        <p>The flourishing green valley, fresh fruits, stunning view and wildlife attract the tourists from every part of the country. This place is in the radar of the Tourism Department in order to construct several huts cafeteria, guest houses, and hotels in Neelum Valley.</p>
                                        
                                   </li>
                                   <li>
                                       <strong>4. Sharda</strong><br>
                                        <p>It is a must visit attraction at a height of 1981 meters. Shardi and Nardi are two mountain tops in the valley, this valley is named after legendry princess Sharda, it has attractive and lush green scenery, covered with hills and trees.</p>
                                        <p>The travel industry is working on developing this spot for the tourists; it has been constructing several guest houses, hotels in Neelum Valley to increase tourism. Ktown Rooms also opened its hotels and huts in Neelum Valley to add more value in this valley and to increase tourism. It offers a quality services all the tourists to make them feel comfortable.</p>
                                        
                                   </li>
                               </ul>
                           </div>
                            <button style="margin: 0 0 14px;" onclick="myFunction()" class="btn_1" id="myBtn">Read more</button>
                    </div>
                    <?php
                    if (isset($hotels)) {
                    if (count($hotels) > 0) {
                        foreach ($hotels as $hotel) {
                            ?>
                            <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="ribbon_3 popular"><span style="--my-color-var: <?php echo $hotel['Border']; ?>; background:<?php echo $hotel['Color'] ?>"><?php echo $hotel['HotelTypeName'] ?></span></div>
                                        <div class="img_list">
                                            <a href="{{ url('details/'.$hotel['Slug']) }}">
                                                <img src="{{ url('public/uploads/website/hotels/thumb/'.$hotel['Thumbnail']) }}" alt="<?php echo $hotel['HotelName']; ?>">
                                                <div class="short_info">
                                                    <!--<i class="icon_set_1_icon-4"></i>Museums--> 
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="clearfix visible-xs-block"></div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="tour_list_desc">
                                            <div class="rating">
                                                <img src="{{ url('resources/assets/web/img/ranking'.$hotel['Rating'].'.png') }}" />
                                            </div>
                                            <h3><strong><?php echo $hotel['HotelName']; ?></strong></h3>
                                            <p><?php echo str_limit($hotel['Description'], 140); ?></p>
                                            <ul class="add_info">
                                                <?php
                                                if (count($hotel['Services']) > 0) {
                                                    foreach ($hotel['Services'] as $ser) {
                                                        ?>
                                                        <li>
                                                            <div class="tooltip_styled tooltip-effect-4">
                                                                <span class="tooltip-item"><img style="width:31px;" src="<?php echo url('public/uploads/website/services/' . $ser->Icon); ?>" /></span>
                                                                <div class="tooltip-content"><h4><?php echo $ser->ServiceName ?></h4></div>
                                                            </div>
                                                        </li>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2">
                                        <div class="price_list"><div><sup>PKR </sup><?php echo number_format($hotel['SellingPrice'], 0); ?>*<small><br>*Per night</small>
                                                <p><a href="{{ url('details/'.$hotel['Slug']) }}" class="btn_1">Details</a></p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    }
                    ?>
                    <hr>
                    <!--<img src="{{ url('public/uploads/website/hotels/hotels-in-neelum-valley/kutton-jagran.png') }}">
                    <hr>
                    <img src="{{ url('public/uploads/website/hotels/hotels-in-neelum-valley/kel-sari.png') }}">
                    <hr>
                    <img src="{{ url('public/uploads/website/hotels/hotels-in-neelum-valley/neelum-valley.png') }}">-->
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