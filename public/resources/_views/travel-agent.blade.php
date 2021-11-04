<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="B7yIaUV72XaRbRwP1syZaXouPYPcoss4eN_MigRITTo" />
        <meta name="author" content="K Town Rooms">
        <title>Agents refer travelers to Ktown Rooms for best hospitality services</title>
        <meta name="description" content="Be our hospitality partners and refer our hotels and guest houses to your travelers for standard accommodation across Pakistan at low prices and enjoy commission on bookings.">

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

<!--        <section class="parallax-window" data-parallax="scroll" data-image-src="{{ url('resources/assets/web') }}/img/contact.jpg" data-natural-width="1400" data-natural-height="470">
            <div class="parallax-content-1">
                <div class="animated fadeInDown">
                    <h1>Travel Agent</h1>
                </div>
            </div>
        </section>-->

        <section id="search_container" class="travel-agent-main-banner right-forms">
            <div class="main-form-area">
                <div class="row">
                    <div class="col-lg-8 col-md-6">

                        <div id="left-page-content">
                            <h2>Travel Agent</h2>
                            <p style="    font-size: 20px;
                               line-height: 40px;">When your clients often asked you for affordable hotels with good standards, confidently refer them to us, and enjoy best commission on each booking.</p>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-6">

                        <div class="tab-content">
                            <div class="tab-pane active" id="tours">
                                <h3>Become Our Travel Agent</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            {!! Form::text('FullName', null, ['class' => 'form-control', 'id' => 'FullName', 'placeholder' => 'Full Name']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            {!! Form::text('Email', null, ['class' => 'form-control', 'id' => 'Email', 'placeholder' => 'Email Address']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Cell</label>
                                            {!! Form::text('Cell', null, ['class' => 'form-control', 'id' => 'Cell', 'placeholder' => 'Cell']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            {!! Form::text('City', null, ['class' => 'form-control', 'id' => 'City', 'placeholder' => 'City']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            {!! Form::text('Address', null, ['class' => 'form-control', 'id' => 'Address', 'placeholder' => 'Address']) !!}
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn_1 submitBtn" id="submit-contact">Submit</button>
    <!--                            <button onclick="location.href ='{{ url('listing') }}'" class="btn_1 green"><i class="icon-search"></i>Search now</button>
                            </div>-->
                            </div>
                        </div>

                    </div>
                </div>
                <div id="search">


                </div>

        </section>

        <div class="white_bg">
            <div class="container margin_60">
                <div class="row">

                    <div class="col-md-12">
                        <h3>Travel <span>Agent</span></h3>
                        <p>When your clients often asked you for affordable hotels with good standards, confidently refer them to us, and enjoy best commission on each booking.</p>
                    </div>

                </div>

            </div>
        </div>


        <!--        <div class="container margin_60">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form_title">
                                <h3><strong><i class="icon-pencil"></i></strong>Become Travel Agent</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
        
                            <div class="step">
        
                                <div id="message-contact"></div>
        
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            {!! Form::text('FullName', null, ['class' => 'form-control', 'id' => 'FullName', 'placeholder' => 'Full Name']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            {!! Form::text('Email', null, ['class' => 'form-control', 'id' => 'EmailAddress', 'placeholder' => 'Email Address']) !!}
                                        </div>
                                    </div>
                                </div>
                                 End row 
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Cell</label>
                                            {!! Form::text('Cell', null, ['class' => 'form-control', 'id' => 'Cell', 'placeholder' => 'Cell']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            {!! Form::text('City', null, ['class' => 'form-control', 'id' => 'City', 'placeholder' => 'City']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            {!! Form::text('Address', null, ['class' => 'form-control', 'id' => 'Address', 'placeholder' => 'Address']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="submit" value="Submit" class="btn_1" id="submit-contact">
                                    </div>
                                </div>
                                {!! FORM::close() !!}
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div id="filters_col" class="forms_content">
        
                            </div>
                        </div>
                    </div>
                </div>-->



        <!--        <div class="container margin_60">
        
                    <div class="main_title">
                        <h2>We can <span>Help</span> us</h2>
                    </div>
        
                    <div class="row">
        
                        <div class="col-md-4 wow zoomIn" data-wow-delay="0.2s">
                            <div class="feature_home">
                                <i class="icon_set_1_icon-41"></i>
                                <h3>Hotel Partner</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset.
                                </p>
                                <a href="{{ url('partner') }}" class="btn_1 outline">Join us</a>
                            </div>
                        </div>
        
                        <div class="col-md-4 wow zoomIn" data-wow-delay="0.4s">
                            <div class="feature_home">
                                <i class="icon_set_1_icon-30"></i>
                                <h3>Corporate Partner</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset.
                                </p>
                                <a href="{{ url('corporate-clients') }}" class="btn_1 outline">Join us</a>
                            </div>
                        </div>
        
                        <div class="col-md-4 wow zoomIn" data-wow-delay="0.6s">
                            <div class="feature_home">
                                <i class="icon_set_1_icon-57"></i>
                                <h3>Travel Agent</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset.
                                </p>
                                <a href="{{ url('travel-agent') }}" class="btn_1 outline">Join us</a>
                            </div>
                        </div>
        
                    </div>
        
                </div>-->

<!--        <section class="promo_full">
            <div class="promo_full_wp magnific">
                <div>
                    <h3>BELONG ANYWHERE</h3>
                    <p>
                        Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex.
                    </p>
                    <a href="https://www.youtube.com/watch?v=Zz5cu72Gv5Y" class="video"><i class="icon-play-circled2-1"></i></a>
                </div>
            </div>
        </section>-->
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
    $('.submitBtn').click(function () {
        $('.submitBtn').attr('disabled', 'disabled');
        $.ajax({
            type: "POST",
            url: "{{ url('travel-agent') }}",
            'headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: "JSON",
            data: {'FullName': $('#FullName').val(), 'Email': $('#Email').val(), 'Cell': $('#Cell').val(), 'City': $('#City').val(), 'Address': $('#Address').val(), },
            success: function (data) {
                if (data.error) {
                    $('#message-modal').html(data.message);
                    $('#myModal').modal();
                    //alert(data.message);
                } else {
                    $('#FullName').val("");
                    $('#Email').val("");
                    $('#Cell').val("");
                    $('#City').val("");
                    $('#Address').val("");

                    $('#message-modal').html(data.message);
                    $('.modal-header h4').html("Success");
                    $('#myModal').modal();
                }
            },
            complete: function () {
                $('.submitBtn').removeAttr('disabled');
            }
        });
    });
});
        </script>
    </body>
</html>