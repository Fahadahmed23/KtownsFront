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
        <title>Hotel partners | Ktown Rooms helps in expanding your business</title>
        <meta name="description" content="Partner with Ktown room to list your apartments, guest houses with them. We assure you the solution for marketing, furnishing and clients.">

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
                    <h1>Partner</h1>
                </div>
            </div>
        </section>-->

        <section id="search_container" class="partner-main-banner right-forms">
            <div class="main-form-area">
                <div class="row">
                    <div class="col-lg-8 col-md-6">

                        <div id="left-page-content">
                            <h2>Become Partners</h2>
                            <p style="    font-size: 20px;
    line-height: 40px;">If you match our standard, we predict you will never have a problem of marketing or shortage of accommodation seekers. </p>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-6">

                        <div class="tab-content">
                            <div class="tab-pane active" id="tours">
                                <h3>Become Our Hotel Partner</h3>
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
                                            <label>Hotel Name</label>
                                            {!! Form::text('HotelName', null, ['class' => 'form-control', 'id' => 'HotelName', 'placeholder' => 'Hotel Name']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Contact No</label>
                                            {!! Form::text('ContactNo', null, ['class' => 'form-control', 'id' => 'ContactNo', 'placeholder' => 'Contact No']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            {!! Form::text('EmailAddress', null, ['class' => 'form-control', 'id' => 'EmailAddress', 'placeholder' => 'Email Address']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Location</label>
                                            {!! Form::text('Location', null, ['class' => 'form-control', 'id' => 'Location', 'placeholder' => 'Location']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>No. of Rooms</label>
                                            {!! Form::number('NoOfRooms', null, ['class' => 'form-control', 'id' => 'NoOfRooms', 'placeholder' => 'No. of Rooms']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            {!! Form::textarea('Description', null, ['class' => 'form-control', 'id' => 'Description', 'placeholder' => 'Description', 'rows' => 4]) !!}
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

        <!--        <div class="container margin_60">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form_title">
                                <h3><strong><i class="icon-pencil"></i></strong>Become Partner</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
        
                            <div class="step">
        
                                <div id="message-contact"></div>
                                @include('includes/front_alerts')
                                
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
                                            {!! Form::text('EmailAddress', null, ['class' => 'form-control', 'id' => 'EmailAddress', 'placeholder' => 'Email Address']) !!}
                                        </div>
                                    </div>
                                </div>
                                 End row 
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Contact No</label>
                                            {!! Form::text('ContactNo', null, ['class' => 'form-control', 'id' => 'ContactNo', 'placeholder' => 'Contact No']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>No of Rooms</label>
                                            {!! Form::text('NoOfRooms', null, ['class' => 'form-control', 'id' => 'NoOfRooms', 'placeholder' => 'No of Rooms']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
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
                                            {!! Form::textarea('Description', null, ['class' => 'form-control', 'id' => 'Description', 'placeholder' => 'Description']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="submit" value="Submit" class="btn_1" id="submit-contact">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div id="filters_col" class="forms_content">
                                <ul>
                                    <li>Extensive marketing: Exposing you to the highest possible numbers of potential customers.</li>
                                    <li>Technological Advancements: Providing your hotel advancements like i.e Online booking, online payment, online feedback, and 24/7 helpline.</li>
                                    <li>Staff training: High quality training initiatives.</li>
                                    <li>Trusted Brand: Empowers you to sell under the shade of our brand</li>
                                    <li>Guaranteed returns: we raise your Occupancy and value with business support</li>
                                    <li>Procurement Assistance: Provides you assistance in arranging stuff for cost efficiency.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>-->



        <div class="container margin_60">
            <div class="row custom_feature_home">

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.2s">
                    <div class="feature_home">
                        <!--<i class="icon_set_1_icon-41"></i>-->
                        <img src="{{ url('resources/assets/web/img/icons/hp2.png') }}" class="img-responsive" />
                        <h3>Extensive Marketing</h3>
                        <p>Exposing you to the highest possible numbers of potential customers.<br>&nbsp;</p>
                    </div>
                </div>

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.4s">
                    <div class="feature_home">
                        <img src="{{ url('resources/assets/web/img/icons/hp1.png') }}" class="img-responsive" />
                        <h3>Technological Advancements</h3>
                        <p>Providing your hotel advancements like i.e Online booking, online payment, online feedback, and 24/7 helpline.</p>

                    </div>
                </div>

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="feature_home">
                        <img src="{{ url('resources/assets/web/img/icons/hp3.png') }}" class="img-responsive" />
                        <h3>Staff Training</h3>
                        <p>High quality training initiatives.<br>&nbsp;<br>&nbsp;</p>
                    </div>
                </div>

            </div>

        </div>
        <div class="container">
            <div class="row custom_feature_home">

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.2s">
                    <div class="feature_home">
                        <img src="{{ url('resources/assets/web/img/icons/hp4.png') }}" class="img-responsive" />
                        <h3>Trusted Brand</h3>
                        <p>Empowers you to sell under the shade of our brand.<br>&nbsp;</p>
                    </div>
                </div>

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.4s">
                    <div class="feature_home">
                        <img src="{{ url('resources/assets/web/img/icons/hp5.png') }}" class="img-responsive" />
                        <h3>Guaranteed Returns</h3>
                        <p>we raise your Occupancy and value with business support</p>

                    </div>
                </div>

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="feature_home">
                        <img src="{{ url('resources/assets/web/img/icons/hp6.png') }}" class="img-responsive" />
                        <h3>Procurement Assistance</h3>
                        <p>Provides you assistance in arranging stuff for cost efficiency.</p>
                    </div>
                </div>

            </div>

        </div>

        <section class="hotel-partner-bottom-section">
            <div class="promo_full_wp magnific">
                <div>
                </div>
            </div>
        </section>

        <!--<div id="map"></div>-->
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
            url: "{{ url('partner') }}",
            'headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: "JSON",
            data: {'FullName': $('#FullName').val(), 'HotelName': $('#HotelName').val(), 'NoOfRooms': $('#NoOfRooms').val(), 'EmailAddress': $('#EmailAddress').val(), 'ContactNo': $('#ContactNo').val(), 'Location': $('#Location').val(), 'Description': $('#Description').val(),},
            success: function (data) {
                if (data.error) {
                    $('#message-modal').html(data.message);
                    $('#myModal').modal();
                    //alert(data.message);
                } else {
                    $('#FullName').val("");
                    $('#HotelName').val("");
                    $('#EmailAddress').val("");
                    $('#ContactNo').val("");
                    $('#Location').val("");
                    $('#NoOfRooms').val("");
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