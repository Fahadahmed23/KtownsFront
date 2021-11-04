<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>K Town Rooms</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Favicons-->
        <link rel="shortcut icon" href="{{ url('resources/assets/site_launch') }}/img/favicon.png" type="image/x-icon"/>
        <link rel="apple-touch-icon" type="image/x-icon" href="{{ url('resources/assets/site_launch') }}/img/apple-touch-icon-57x57-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ url('resources/assets/site_launch') }}/img/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ url('resources/assets/site_launch') }}/img/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ url('resources/assets/site_launch') }}/img/apple-touch-icon-144x144-precomposed.png">

        <!-- CSS -->
        <link href="{{ url('resources/assets/site_launch') }}/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ url('resources/assets/site_launch') }}/css/style.css" rel="stylesheet">
        <link href="{{ url('resources/assets/site_launch') }}/fontello/css/fontello.css" rel="stylesheet" > 
        <link href="{{ url('resources/assets/site_launch') }}/fontello/css/animation.css" rel="stylesheet" > 

        <!--[if lt IE 9]>
          <script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="http://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>

        <div id="wrapper">
            <div id="main">
                <div class="container">

                    <div class="row countdown">
                        <div class="col-md-12">
                            <div id="logo"><img src="{{ url('resources/assets/site_launch') }}/img/logo.png" alt="City tours"></div>
                            <h1>ktown rooms will be coming soon</h1>
                            <h2>Email: <a href="mailto:info@ktownrooms.com">info@ktownrooms.com</a></h2>
                            <!--<h2>Meanwhile, you can make leave your email. We will advice when we will be online!</h2>-->
                        </div>
                        <div id="countdown_wp">
                            <div class="container_count"><div id="days">00</div>days</div>
                            <div class="container_count"><div id="hours">00</div>hours</div>
                            <div class="container_count"><div id="minutes">00</div>minutes</div>
                            <div class="container_count last"><div id="seconds">00</div>seconds</div>
                        </div>
                    </div>
<!--                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div id="newsletter_wp" >
                                <form method="post" id="newsletter" name="newsletter"  autocomplete="off">
                                    <div class="row">
                                        <div class="col-md-9 first-nogutter">
                                            <input name="email_newsletter" id="email_newsletter" type="email" placeholder="Your Email" class="form-control">
                                        </div>
                                        <div class="col-md-3 nogutter">
                                            <button type="submit" class="btn-check" id="submit-newsletter">Subscribe</button>
                                        </div>
                                    </div>                            	
                                </form>
                                <div id="message-newsletter"></div>

                            </div> End newsletter_wp 	
                        </div> End row 			
                    </div> End container -->


<!--                    <div id="social_footer">
                        <ul>
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-google"></i></a></li>
                            <li><a href="#"><i class="icon-instagram"></i></a></li>
                            <li><a href="#"><i class="icon-pinterest"></i></a></li>
                            <li><a href="#"><i class="icon-vimeo"></i></a></li>
                            <li><a href="#"><i class="icon-youtube-play"></i></a></li>
                            <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        </ul>
                        <p>© Citytours 2015</p>
                    </div>-->


                </div><!-- End container -->


            </div><!-- End main -->

        </div><!-- End wrapper -->


        <div id="slides">
            <ul class="slides-container">
                <li><img src="{{ url('resources/assets/site_launch') }}/img/slide_1.jpg" alt="Image"></li>
                <li><img src="{{ url('resources/assets/site_launch') }}/img/slide_2.jpg" alt="Image"></li>
                <li><img src="{{ url('resources/assets/site_launch') }}/img/slide_3.jpg" alt="Image"></li>
            </ul>
        </div><!-- End background slider -->

        <!-- JQUERY -->
        <script src="{{ url('resources/assets/site_launch') }}/js/jquery-1.11.2.min.js"></script>
        <script src="{{ url('resources/assets/site_launch') }}/js/jquery.easing.1.3.min.js"></script>
        <script src="{{ url('resources/assets/site_launch') }}/js/jquery.animate-enhanced.min.js"></script>
        <script src="{{ url('resources/assets/site_launch') }}/js/jquery.superslides.min.js"></script>
        <script  type="text/javascript">
        $('#slides').superslides({
            play: 6000,
            pagination: false,
            animation_speed: 800,
            animation: 'fade'
        });
        </script>
        <!-- OTHER JS --> 
        <script src="{{ url('resources/assets/site_launch') }}/js/retina.min.js"></script>
        <script  src="{{ url('resources/assets/site_launch') }}/js/functions.js"></script>
        <script src="{{ url('resources/assets/site_launch') }}/assets/validate.js"></script>
    </body>
</html>