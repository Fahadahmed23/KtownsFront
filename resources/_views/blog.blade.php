<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="B7yIaUV72XaRbRwP1syZaXouPYPcoss4eN_MigRITTo" />
        <meta name="description" content="K Town Rooms">
        <meta name="author" content="K Town Rooms">
        <title>Blog KTown Rooms | Reinventing The Hospitality-Pakistan</title>
        <meta name="description" content="Ktown rooms is Pakistan's best budgeted hotel network, provides you accommodation in cheap rates. Stay at Ktown Rooms & get AC, Wifi, Complimentary breakfast, cleaned washroom, cable tv & hygienic bed/linen.Lowest Price Guaranteed. Book now and pay later search cheap hotel near you and you will find Ktown.">
        <!-- Favicons-->
        <link rel="shortcut icon" href="{{ url('resources/assets/web') }}/img/favicon.png" type="image/x-icon">
        <link rel="apple-touch-icon" type="image/x-icon" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-57x57-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-144x144-precomposed.png">

        <!-- CSS -->
        <link href="{{ url('resources/assets/web') }}/css/base.css" rel="stylesheet">

        <!-- SPECIFIC CSS -->
        <link href="{{ url('resources/assets/web') }}/css/skins/square/grey.css" rel="stylesheet">
        <link href="{{ url('resources/assets/web') }}/css/date_time_picker.css" rel="stylesheet">

        <!-- Google web fonts -->
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
        <link href="{{ url('resources/assets/web') }}/css/bootstrap.min.css" rel="stylesheet">
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
            p {
                font-size: 14px;
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

        <div class="layer"></div>

        @include('includes/header')

        <section class="parallax-window" data-parallax="scroll" data-image-src="{{ url('resources/assets/web') }}/img/covers/blog-cover.jpg" data-natural-width="1400" data-natural-height="470">
            <div class="parallax-content-1">
                <div class="animated fadeInDown">
                    <h1>Blog</h1>
                    <!--<p>Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.</p>-->
                </div>
            </div>
        </section>
        <div class="container margin_60" style="padding-top: 60px;">
        <div class="row">
                <?php
                 if (count($blogs) > 0) {
                     foreach ($blogs as $blog) {
                         $foo = $blog->Content;
                        $array = array();
                        preg_match('/src="([^"]*)"/i', $foo, $array);
                        $image = $array[1];
                        ?>
                        <div class="col-md-4 col-sm-6 wow zoomIn" data-wow-delay="0.1s">
                            <div class="ribbon_3 popular"><span style="--my-color-var: <?php //echo $hotel['Border']; ?>; background:<?php //echo $hotel['Color'] ?>"><?php //echo $hotel['HotelTypeName'] ?></span></div>
                            <div class="tour_container">
                                <div class="img_container">
                                    <a href="{{ url('blog/'.$blog->Slug) }}">
                                        <img src="<?php echo $image; ?>" class="img-responsive blog-img" alt="Image">
                                        <div class="short_info">
                                            <!--<i class="icon_set_1_icon-44"></i>Historic Buildings-->
                                            <span class="price"><?php echo date("F j, Y", strtotime($blog->DateAdded)); ?></span>
                                        </div>
                                    </a>
                                </div>
                                <div class="tour_title">
                                    <a href="{{ url('blog/'.$blog->Slug) }}"><h3><strong>{{str_limit($blog->Title, $limit = 25, $end = '...')}}</strong></h3></a>
                                    <div class="rating">
                                        <p><?php
                                            $content = preg_replace("/<img[^>]+\>/i", " ", $blog->Content);
                                            echo str_limit($content, $limit = 135, $end = '...');
                                        ?></p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                
            </div>
            <div style="text-align: right;">
                <?php echo $blogs->render(); ?>
            </div>
        </div>
        @include('includes/footer')

        <div id="toTop"></div>
        <style>
            .blog-img{
                width:400px;
                height:200px;
            }
        </style>
        <!-- Common scripts -->
        <script src="{{ url('resources/assets/web') }}/js/jquery-1.11.2.min.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/common_scripts_min.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/functions.js"></script>

    </body>
</html>