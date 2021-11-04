<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="B7yIaUV72XaRbRwP1syZaXouPYPcoss4eN_MigRITTo" />
        <title>KTown Rooms | Corporate partners & clients</title>
        <meta name="description" content="Collaborate with us to make your business trips affordable and convenient. Ktown Rooms would make you efficient in cost reduction and in increasing productivity.">

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
                    <h1>Corporate Client</h1>
                </div>
            </div>
        </section>-->

        <section id="search_container" class="corporate-main-banner right-forms">
            <div class="main-form-area">
                <div class="row">
                    <div class="col-lg-8 col-md-6">

                        <div id="left-page-content">
                            <h2>Corporate Partners</h2>
                            <div class="forms_content">
                                <p style="    font-size: 20px;
    line-height: 40px;">When reputed companies collaborate with us, their business witness two changes i-e cost reduction & increased in productivity. </p>
<!--                                <p>Due to corporate travels, you are staying at hotels pretty often? </p>
                                <p>In this case we offer you several reasons why you should choose K-town rooms, e.g Modern hotel facilities, trained friendly staff, and attractive rates especially for corporate clients, etc.</p>
                                <p>We built our rooms for companies big and small.</p>
                                <p>Our Categories suits every rank in your company</p>
                                <ul style="padding-top: 0;
                                    padding-bottom: 10px;">
                                    <li><strong>Budget</strong></li>
                                    <li><strong>Premium</strong></li>
                                    <li><strong>Elite</strong></li>
                                </ul>
                                <p>K-Town’s peace of mind will help you focus on your business meetings without worrying about your accommodation.</p>
                                <p>Trusted accommodation partner, which is always available for you within time.</p>-->
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-6">

                        <div class="tab-content">
                            <div class="tab-pane active" id="tours">
                                <h3>Become Our Corporate Partner</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            {!! Form::text('FullName', null, ['class' => 'form-control', 'id' => 'FullName', 'placeholder' => 'Full Name']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            {!! Form::text('EmailAddress', null, ['class' => 'form-control', 'id' => 'EmailAddress', 'placeholder' => 'Email Address']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact No</label>
                                            {!! Form::text('ContactNo', null, ['class' => 'form-control', 'id' => 'ContactNo', 'placeholder' => 'Contact No']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Location</label>
                                            {!! Form::text('Location', null, ['class' => 'form-control', 'id' => 'Location', 'placeholder' => 'Location']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            {!! Form::textarea('Description', null, ['class' => 'form-control', 'id' => 'Description', 'placeholder' => 'Description', 'rows' => 8]) !!}
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

        <div class="container margin_60">
            <div class="row custom_feature_home">

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.2s">
                    <div class="feature_home">
                        <!--<i class="icon_set_1_icon-41"></i>-->
                        <img src="{{ url('resources/assets/web/img/icons/cp6.png') }}" class="img-responsive" />
                        <h3>Track &amp; Maintain</h3>
                    </div>
                </div>

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.4s">
                    <div class="feature_home">
                        <img src="{{ url('resources/assets/web/img/icons/cp1.png') }}" class="img-responsive" />
                        <h3>Best Rates</h3>

                    </div>
                </div>

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="feature_home">
                        <img src="{{ url('resources/assets/web/img/icons/cp2.png') }}" class="img-responsive" />
                        <h3>High Employee Satisfaction</h3>
                    </div>
                </div>

            </div>

        </div>
        <div class="container">
            <div class="row custom_feature_home">

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.2s">
                    <div class="feature_home">
                        <img src="{{ url('resources/assets/web/img/icons/cp3.png') }}" class="img-responsive" />
                        <h3>Dedicated Account Manager</h3>
                    </div>
                </div>

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.4s">
                    <div class="feature_home">
                        <img src="{{ url('resources/assets/web/img/icons/cp4.png') }}" class="img-responsive" />
                        <h3>Easy Cancellations</h3>

                    </div>
                </div>

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="feature_home">
                        <img src="{{ url('resources/assets/web/img/icons/cp5.png') }}" class="img-responsive" />
                        <h3>24/7 Support</h3>
                    </div>
                </div>

            </div>

        </div>

        <section class="corporate-partner-bottom-section">
            <div class="promo_full_wp magnific">
                <div></div>
            </div>
        </section>

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
            url: "{{ url('corporate-clients') }}",
            'headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: "JSON",
            data: {'FullName': $('#FullName').val(), 'EmailAddress': $('#EmailAddress').val(), 'ContactNo': $('#ContactNo').val(), 'Location': $('#Location').val(), 'Description': $('#Description').val(), },
            success: function (data) {
                if (data.error) {
                    $('#message-modal').html(data.message);
                    $('#myModal').modal();
                    //alert(data.message);
                } else {
                    $('#FullName').val("");
                    $('#EmailAddress').val("");
                    $('#ContactNo').val("");
                    $('#Location').val("");
                    $('#Description').val("");
                    
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