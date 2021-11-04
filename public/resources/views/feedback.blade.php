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
        <title>Feedback | KTown Rooms | Pakistan's Top Hotel’s Services
        </title>
        <meta name="description" content="Ktown rooms is Pakistan's best budgeted hotel network, provides you accommodation in cheap rates. Stay at Ktown Rooms & get AC, Wifi, Complimentary breakfast, cleaned washroom, cable tv & hygienic bed/linen.Lowest Price Guaranteed. Book now and pay later search cheap hotel near you and you will find Ktown." />

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

        <section class="parallax-window" data-parallax="scroll" data-image-src="{{ url('resources/assets/web') }}/img/covers/contact-us-cover.jpg" data-natural-width="1400" data-natural-height="470">
            <div class="parallax-content-1">
                <div class="animated fadeInDown">
                    <h1>Feedback</h1>
                </div>
            </div>
        </section>

        <div class="container margin_60">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <div class="form_title">
                        <h3><strong><i class="icon-pencil"></i></strong>Fill the form below</h3>
                    </div>
                    <div class="step">

                        <div id="message-contact"></div>
                        @include('includes/front_alerts')
                        {!! Form::open([ 'id' => 'frmLogin', 'url' => 'feedback/'.$token]) !!}
                        
                        <div class="form-group">
                            <label>Rate Us</label>
                            {!! Form::select('Rate', $rate, null, ['class' => 'form-control', 'id' => 'Rate']) !!}
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Feedback</label>
                                    {!! Form::textarea('Feedback', null, ['class' => 'form-control', 'id' => 'Feedback', 'placeholder' => 'Write your Feedback here']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!--<laMessagebel>Human verification</label>-->
                                <!--<input type="text" id="verify_contact" class=" form-control add_bottom_30" placeholder="Are you human? 3 + 1 =">-->
                                <input type="submit" value="Submit" class="btn_1" id="submit-contact">
                            </div>
                        </div>
                        {!! FORM::close() !!}
                    </div>
                </div><!-- End col-md-8 -->

<!--                <div class="col-md-4 col-sm-4">
                    <div class="box_style_1">
                        <span class="tape"></span>
                        <h4>Address <span><i class="icon-pin pull-right"></i></span></h4>
                        <p>{{ $configuration->Address }}</p>
                        <hr>
                        <h4>Help center <span><i class="icon-help pull-right"></i></span></h4>
                        <ul id="contact-info">
                            <li>{{ $configuration->Contact1. ($configuration->Contact2 != "" ? ' / '.$configuration->Contact2 : '') }}</li>
                            <li><a href="mailto:{{ $emails->SupportEmail }}">{{ $emails->SupportEmail }}</a></li>
                        </ul>
                    </div>
                    <div class="box_style_4 custom_need_help">
                        <img src="{{ url('resources/assets/web/img/need-help-section.png') }}" />
                        <h4>Need <span>Help?</span></h4>
                        <a href="#" class="phone">{{ $configuration->Contact1 }}</a>
                    </div>
                </div>-->
            </div><!-- End row -->
        </div><!-- End container -->

        @include('includes/footer')<!-- End footer -->

        <div id="toTop"></div><!-- Back to top button -->

        <!-- Common scripts -->
        <script src="{{ url('resources/assets/web') }}/js/jquery-1.11.2.min.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/common_scripts_min.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/functions.js"></script>

        <!-- Specific scripts -->
        <script src="{{ url('resources/assets/web') }}/assets/validate.js"></script>

        @include('includes/scripts')
    </body>
</html>