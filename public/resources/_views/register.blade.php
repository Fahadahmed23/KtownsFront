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
        <title>{{ $configuration->WebsiteTitle }} | Register</title>

        <!-- Favicons-->
        <link rel="shortcut icon" href="{{ url('resources/assets/web') }}/img/favicon.png" type="image/x-icon">
        <link rel="apple-touch-icon" type="image/x-icon" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-57x57-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-144x144-precomposed.png">

        <!-- CSS -->
        <link href="{{ url('resources/assets/web') }}/css/base.css" rel="stylesheet">

        <!-- CSS -->
        <link href="{{ url('resources/assets/web') }}/css/flickity.css" rel="stylesheet">

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

        <section id="hero" class="login">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-sm-12">
                        <div id="login">
                            <div class="text-center">
                                <h3>Register</h3>
                                <!--<img src="{{ url('resources/assets/web') }}/img/logo_sticky.png" alt="Image" data-retina="true" >-->
                            </div>
                            <hr>
                            @include('includes/front_alerts')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!--<label>First name</label>-->
                                        {!! Form::text('FirstName', null, ['class' => 'form-control', 'id' => 'FirstName', 'placeholder' => 'First Name']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!--<label>Last name</label>-->
                                        {!! Form::text('LastName', null, ['class' => 'form-control', 'id' => 'LastName', 'placeholder' => 'Last Name']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!--<label>Cell</label>-->
                                        {!! Form::text('Cell', null, ['class' => 'form-control', 'id' => 'Cell', 'placeholder' => 'Cell (03001234567)']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!--<label>Email</label>-->
                                        {!! Form::text('EmailAddress', null, ['class' => 'form-control', 'id' => 'EmailAddress', 'placeholder' => 'Email Address']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!--<label>Password</label>-->
                                        <input name="Password" type="password" class="form-control" id="Password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!--<label>Confirm password</label>-->
                                        <input name="ConfirmPassword" type="password" class="form-control" id="ConfirmPassword" placeholder="Confirm password">
                                    </div>
                                </div>
                            </div>
                            <div id="pass-info" class="clearfix"></div>
                            <button type="button" class="btn_full submitBtn" id="submit-contact">Create an account</button>
                            <p>Do you have an account? <a href="{{ url('login') }}" class="mLink">Sign in</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('includes/footer')

        <div id="toTop"></div>

        <!-- Common scripts -->
        <script src="{{ url('resources/assets/web') }}/js/jquery-1.11.2.min.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/common_scripts_min.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/functions.js"></script>

        <!-- Specific scripts -->
        <script src="{{ url('resources/assets/web') }}/js/pw_strenght.js"></script>
        
        <script>
       $(document).ready(function () {
           $('.submitBtn').click(function () {
               $('.submitBtn').attr('disabled', 'disabled');
               $.ajax({
                   type: "POST",
                   url: "{{ url('signup') }}",
                   'headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                   dataType: "JSON",
                   data: {'FirstName': $('#FirstName').val(), 'LastName': $('#LastName').val(), 'Cell': $('#Cell').val(), 'EmailAddress': $('#EmailAddress').val(), 'Password': $('#Password').val(), 'ConfirmPassword': $('#ConfirmPassword').val()},
                   success: function (data) {
                       if (data.error) {
                           $('#message-modal').html(data.message);
                           $('#myModal').modal();
                           //alert(data.message);
                       } else {
                           $('#message-modal').html(data.message);
                           $('.modal-header h4').html("Success");
                           $('#FirstName').val("");
                           $('#LastName').val("");
                           $('#Cell').val("");
                           $('#EmailAddress').val("");
                           $('#Password').val("");
                           $('#ConfirmPassword').val("");
//                           $('#myModal').modal();
                           window.location.href='{{ url("account-activation?m=true") }}';
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