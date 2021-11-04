<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="K Town Rooms">
        <meta name="author" content="K Town Rooms">
        <title>{{ $configuration->WebsiteTitle }} | Careers</title>

        <!-- Favicons-->
        <link rel="shortcut icon" href="{{ url('resources/assets/web') }}/img/favicon.png" type="image/x-icon">
        <link rel="apple-touch-icon" type="image/x-icon" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-57x57-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-144x144-precomposed.png">

        <!-- CSS -->
        <link href="{{ url('resources/assets/web') }}/css/base.css" rel="stylesheet">

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
    <body class="custom_feature_home_career">

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

        <section class="parallax-window" data-parallax="scroll" data-image-src="{{ url('resources/assets/web') }}/img/covers/career-cover-image.jpg" data-natural-width="1400" data-natural-height="470">
            <div class="parallax-content-1">
                <div class="animated fadeInDown">
                    <h1>Join the fastest growing Tech Startup of Pakistan</h1>
                    <button type="button" class="btn_1 join-us-btn">Join Us</button>
                </div>
            </div>
        </section>

        <div class="modal fade" id="JoinUsModal" tabindex="-1" role="dialog" aria-labelledby="myReviewLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="main_title">
                            <h2 style="color:#fff; display: inline;">Become our <span>Part</span></h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>

                    </div>
                    <div class="modal-body">
                        {!! Form::open([ 'url' => 'careers', 'files' => true]) !!}
                        <div class="row">
                            <div class="col-md-12">

                                @include('includes/front_alerts')
                                <p>Please upload your CV here...</p>
                                <input type="file" name="cv" /><br>

                            </div>
                        </div>
                        <div class="text-center">
                            <input class="btn_1" type="submit" />
                            <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Close</button>
                        </div>
                        {!! FORM::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <!--        <div class="container margin_60">
                    <div class="main_title">
                        <h2>Become our <span>Part</span></h2>
                    </div>
        
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::open([ 'url' => 'careers', 'files' => true]) !!}
                            @include('includes/front_alerts')
                            <p>Please upload your CV here...</p>
                            <input type="file" name="cv" /><br>
                            <input class="btn_1" type="submit" />
                            {!! FORM::close() !!}
                        </div>
                    </div>
                </div>-->

        <div class="container margin_60">
            <div class="main_title">
                <h2>Our <span>Values</span></h2>
            </div>

            <div class="row custom_feature_home">

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.2s">
                    <div class="feature_home">
                        <!--<i class="icon_set_1_icon-41"></i>-->
                        <img src="{{ url('resources/assets/web/img/empowerment.png') }}" class="img-responsive" />
                        <h3>Empowerment</h3>
                        <p>We encourage our employees to take initiative and give the best. We empower them to lead and make decisions.</p>
                    </div>
                </div>

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.4s">
                    <div class="feature_home">
                        <img src="{{ url('resources/assets/web/img/innovation.png') }}" class="img-responsive" />
                        <h3>Innovation</h3>
                        <p>We encourage each employee to think out of the box to create new ideas.<br>&nbsp;</p>

                    </div>
                </div>

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="feature_home">
                        <img src="{{ url('resources/assets/web/img/its-possible.png') }}" class="img-responsive" />
                        <h3>Its Possible</h3>
                        <p>We never abandon our goals and always drive on the theory its possible.<br>&nbsp;</p>
                    </div>
                </div>

            </div>

            <div class="row custom_feature_home">

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.2s">
                    <div class="feature_home">
                        <!--<i class="icon_set_1_icon-41"></i>-->
                        <img src="{{ url('resources/assets/web/img/act-daily.png') }}" class="img-responsive" />
                        <h3>Act Daily</h3>
                        <p>Big dreams consist of small goals, so we act daily and courageously to achieve them.</p>
                    </div>
                </div>

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.4s">
                    <div class="feature_home">
                        <img src="{{ url('resources/assets/web/img/equality.png') }}" class="img-responsive" />
                        <h3>Equality</h3>
                        <p>We believe on gender equality and encourage diversity</p>

                    </div>
                </div>

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="feature_home">
                        <img src="{{ url('resources/assets/web/img/ownership.png') }}" class="img-responsive" />
                        <h3>Ownership</h3>
                        <p>We encourage our employees to take ownership of the operations and enhance reliability.</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="container margin_60">
            <div class="main_title">
                <h2>Out <span>Team</span></h2>
            </div>

            <div class="row custom_feature_home">

                <div class="col-md-3 wow zoomIn" data-wow-delay="0.2s">
                    <div class="feature_home">
                        <!--<i class="icon_set_1_icon-41"></i>-->
                        <img src="{{ url('resources/assets/web/img/it-product.png') }}" class="img-responsive" />
                        <h3>Product Development  (IT)</h3>
                    </div>
                </div>

                <div class="col-md-3 wow zoomIn" data-wow-delay="0.4s">
                    <div class="feature_home">
                        <img src="{{ url('resources/assets/web/img/marketing.png') }}" class="img-responsive" />
                        <h3>Branding &amp; Marketing</h3>

                    </div>
                </div>

                <div class="col-md-3 wow zoomIn" data-wow-delay="0.6s">
                    <div class="feature_home">
                        <img src="{{ url('resources/assets/web/img/business-development.png') }}" class="img-responsive" />
                        <h3>Business Development</h3>
                    </div>
                </div>

                <div class="col-md-3 wow zoomIn" data-wow-delay="0.6s">
                    <div class="feature_home">
                        <img src="{{ url('resources/assets/web/img/city-operation.png') }}" class="img-responsive" />
                        <h3>City<br>Operations</h3>
                    </div>
                </div>

            </div>

            <div class="row custom_feature_home">

                <div class="col-md-3 wow zoomIn" data-wow-delay="0.2s">
                    <div class="feature_home">
                        <!--<i class="icon_set_1_icon-41"></i>-->
                        <img src="{{ url('resources/assets/web/img/Procurement.png') }}" class="img-responsive" />
                        <h3>Demand & Procurement</h3>
                    </div>
                </div>

                <div class="col-md-3 wow zoomIn" data-wow-delay="0.4s">
                    <div class="feature_home">
                        <img src="{{ url('resources/assets/web/img/reservation.png') }}" class="img-responsive" />
                        <h3>Reservations & Customer Experience</h3>

                    </div>
                </div>

                <div class="col-md-3 wow zoomIn" data-wow-delay="0.6s">
                    <div class="feature_home">
                        <img src="{{ url('resources/assets/web/img/finance.png') }}" class="img-responsive" />
                        <h3>Costing &amp;<br>Finance</h3>
                    </div>
                </div>

                <div class="col-md-3 wow zoomIn" data-wow-delay="0.6s">
                    <div class="feature_home">
                        <img src="{{ url('resources/assets/web/img/Corporate-Affairs.png') }}" class="img-responsive" />
                        <h3>Corporate Affairs & HR </h3>
                    </div>
                </div>

            </div>
        </div>

        @include('includes/footer')<!-- End footer -->

        <div id="toTop"></div><!-- Back to top button -->

        <!-- Common scripts -->
        <script src="{{ url('resources/assets/web') }}/js/jquery-1.11.2.min.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/common_scripts_min.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/functions.js"></script>

        <!-- Specific scripts -->
        <script src="{{ url('resources/assets/web') }}/assets/validate.js"></script>

       
        <script>
$(document).ready(function () {
<?php
if ((\Session::has('errors') && count(\Session::get('errors')) > 0) || (\Session::has('success') && \Session::get('success') != "")) {
    ?>
        $('#JoinUsModal').modal();
    <?php
}
?>
    $('.join-us-btn').click(function () {
        $('#JoinUsModal').modal();
    });
});
        </script>
    </body>
</html>