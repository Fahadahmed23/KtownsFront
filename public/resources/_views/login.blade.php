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
        <title>{{ $configuration->WebsiteTitle }} | Login</title>

        <!-- Favicons-->
        <link rel="shortcut icon" href="{{ url('resources/assets/web') }}/img/favicon.png" type="image/x-icon">
        <link rel="apple-touch-icon" type="image/x-icon" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-57x57-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-144x144-precomposed.png">

        <!-- CSS -->
        <link href="{{ url('resources/assets/web') }}/css/base.css" rel="stylesheet">

        <!-- CSS -->
        <!--<link href="{{ url('resources/assets/web') }}/css/flickity.css" rel="stylesheet">-->

        <!-- Google web fonts -->
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
        <style>
            html { height:100%; }
            body, section { position:absolute !important; top:0; bottom:0; right:0; left:0; }
        </style>
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

        <section id="hero" class="login">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                        <div id="login">
                            <div class="text-center">
                                <h3>Login</h3>
                                <!--<img src="{{ url('resources/assets/web') }}/img/logo_sticky.png" alt="Image" data-retina="true" >-->
                            </div>
                            <hr>
                            @include('includes/front_alerts')
                            <!--                                <div class="row">
                                                                <div class="col-md-6 col-sm-6 login_social">
                                                                    <a href="#" class="btn btn-primary btn-block"><i class="icon-facebook"></i> Facebook</a>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 login_social">
                                                                    <a href="#" class="btn btn-info btn-block "><i class="icon-twitter"></i>Twitter</a>
                                                                </div>
                                                            </div>
                                                            <div class="login-or"><hr class="hr-or"><span class="span-or">or</span></div>-->

                            <div class="form-group">
                                <!--<label>Email</label>-->
                                {!! Form::text('EmailAddress', null, ['class' => 'form-control', 'id' => 'EmailAddress', 'placeholder' => 'Email Address / Cell']) !!}
                            </div>
                            <div class="form-group" style="margin-bottom: 5px;">
                                <!--<label>Password</label>-->
                                <input name="Password" id="Password" type="password" class=" form-control" placeholder="Password">
                                <label>{!! $my_msg !!}</label>
                            </div>
                            <p class="">
                                <a href="{{ url('forgot-password') }}" class="mLink">Forgot Password?</a>
                            </p>
                            <button type="button" class="btn_full submitBtn" id="submit-contact">Sign in</button>
                            <p>Don't you have an account? <a href="{{ url('signup') }}" class="mLink">Sign up</a></p>

                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div id="toTop"></div>
        
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myReviewLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Error</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <div id="message-modal">
                </div>
                <div class="text-center">
                    <button type="button" class="btn_1" data-dismiss="modal" aria-label="Close">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>

        <script src="{{ url('resources/assets/web') }}/js/jquery-1.11.2.min.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/common_scripts_min.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/functions.js"></script>

        
        <script>
$(document).ready(function () {
    $('.submitBtn').click(function () {
        $('.submitBtn').attr('disabled', 'disabled');
        $.ajax({
            type: "POST",
            url: "{{ url('login') }}",
            'headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: "JSON",
            data: {'EmailAddress': $('#EmailAddress').val(), 'Password': $('#Password').val()},
            success: function (data) {
                if (data.error) {
                    $('#message-modal').html(data.message);
                    $('#myModal').modal();
                    //alert(data.message);
                } else {
                    if (data.type == "cart") {
                        window.location.href = '{{ url("cart") }}';
                    } else {
                        window.location.href = '{{ url("dashboard") }}';
                    }
//                    $('#message-modal').html(data.message);
//                    $('.modal-header h4').html("Success");
//                    $('#myModal').modal();
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