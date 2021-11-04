<?php
$segment = Request::segment(1);
$segment2 = Request::segment(2);

use Illuminate\Support\Facades\Auth;
?>

<style type="text/css">
.tp-mid {
    z-index: 1;
}
.main-menu>ul{
    float: left;
}
.right-ul {
    float: right !important;
}
.right-ul .icon-block {
    display: inline-block;
    margin-right: 4px;
}

ul.right-ul li {
    padding-right: 0;
}
ul.right-ul li a {
    background: #000;
    border-radius: 5px;
    padding: 5px 18px;
    color: #fff;
    font-size: 12px !important;
}
ul.right-ul li a:before{
    display: none;
}
</style>
<div class="mobile-nav"> <a href="/" class="logo-main"> <img class="lozad" data-src="{{ url('resources/assets/web/img/logo.png') }}" alt="logo"></a>
    <nav>
        <ul class="unstyled mainnav pbpx-15">

            <li <?php echo ($segment == "home" ? 'class="active"' : ''); ?>><a href="{{ url('home') }}" class="">Home</a></li>
            <li <?php echo ($segment == "about-us" ? 'class="active"' : ''); ?>><a href="{{ url('about-us') }}">About us</a></li>
            <li <?php echo ($segment == "hotels" ? 'class="active"' : ''); ?>><a href="{{ url('hotels') }}">Our Hotels</a></li>
            <li <?php echo ($segment == "partner" ? 'class="active"' : ''); ?>><a href="{{ url('partner') }}">Hotel Partners</a></li>
            <li <?php echo ($segment == "corporate-clients" ? 'class="active"' : ''); ?>><a href="{{ url('corporate-clients') }}">Corporate Partners</a></li>
            <li <?php echo ($segment == "travel-agent" ? 'class="active"' : ''); ?>><a href="{{ url('travel-agent') }}">Travel Agent</a></li>

            <!-- <li><a href="">Check</a></li> -->
           
                                <li>
                                    <?php
                                    if (\Session::has('CustomerLogin') && \Session::get('CustomerLogin')) {
                                        ?>
                                        <a href="{{ url('logout') }}" id="access_link">
                                            <div class="icon-block">
                                                <span class="icon custom-sprite login-icon"></span>
                                            </div>
                                            <span class="txt">logout</span>
                                        </a>
                                    <?php } else {
                                        ?>
                                        <a href="{{ url('login') }}" id="access_link">
                                            <div class="icon-block">
                                                <span class="icon custom-sprite login-icon"></span>
                                            </div>
                                            <span class="txt">login</span>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </li>
                                <li>
                                    <?php
                                    if (\Session::has('CustomerLogin') && \Session::get('CustomerLogin')) {
                                        ?>
                                        <a href="{{ url('dashboard') }}" id="access_link">
                                            <div class="icon-block">
                                                <span class="icon custom-sprite register-icon"></span>
                                            </div>
                                            <span class="txt">Dashb..</span>
                                        </a>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="{{ url('signup') }}" id="access_link">
                                            <div class="icon-block">
                                                <span class="icon custom-sprite register-icon"></span>
                                            </div>
                                            <span class="txt">Register</span>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </li>
            
        </ul>
    </nav>
</div>
<!-- Mobile Navigation Button Start-->
<div class="mobile-nav-btn"> <span class="lines"></span> </div>
<!-- Mobile Navigation Button End-->

<header class="header-section">
    <!-- Top Section -->
    <div class="header-top-block hide">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="top-list top-left">
                        <ul class="tp-right">
                            <li>
                                <div class="icon-block">
                                    <span class="icon custom-sprite phone-icon"></span>
                                </div>
                                <a href="tel:{{ $configuration->Contact1 }}" class="tel"><span class="phoneNumber">{{ $configuration->Contact1 }}</span></a>
                            </li>
                            <li>
                                <div class="icon-block">
                                    <span class="icon custom-sprite email-icon"></span>
                                </div>
                                <a href="mailto:sales@ktownrooms.com" class="mailto"><span class="email">sales@ktownrooms.com</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="d-flex justify-content-end tablet-center top-right">
                        <div class="social-list hidden-sm-down">
                            <ul>
                                <li>
                                    <a href="{{ $configuration->Facebook }}" target="_blank"><span class="icon custom-sprite fb-icon"></span></a>
                                </li>
                                <li>
                                    <a href="{{ $configuration->Instagram }}"><span class="icon custom-sprite insta-icon"></span></a>
                                </li>
                                <li>
                                    <a href="{{ $configuration->Twitter }}"><span class="icon custom-sprite twitter-icon"></span></a>
                                </li>
                                <li>
                                    <a href="{{ $configuration->LinkedIn }}"><span class="icon custom-sprite linkedin-icon"></span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="top-list ml-80 mr-60">
                            <ul class="tp-mid">

                                <li>
                                    <?php
                                    if (\Session::has('CustomerLogin') && \Session::get('CustomerLogin')) {
                                        ?>
                                        <a href="{{ url('logout') }}" id="access_link">
                                            <div class="icon-block">
                                                <span class="icon custom-sprite login-icon"></span>
                                            </div>
                                            <span class="txt">logout</span>
                                        </a>
                                    <?php } else {
                                        ?>
                                        <a href="{{ url('login') }}" id="access_link">
                                            <div class="icon-block">
                                                <span class="icon custom-sprite login-icon"></span>
                                            </div>
                                            <span class="txt">login</span>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </li>
                                <li>
                                    <?php
                                    if (\Session::has('CustomerLogin') && \Session::get('CustomerLogin')) {
                                        ?>
                                        <a href="{{ url('dashboard') }}" id="access_link">
                                            <div class="icon-block">
                                                <span class="icon custom-sprite register-icon"></span>
                                            </div>
                                            <span class="txt">Dashb..</span>
                                        </a>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="{{ url('signup') }}" id="access_link">
                                            <div class="icon-block">
                                                <span class="icon custom-sprite register-icon"></span>
                                            </div>
                                            <span class="txt">Register</span>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </li>
                            </ul>
                        </div>
                        <div class="my-booking-block">
                            <?php 
                            if (\Session::has('CustomerLogin') && \Session::get('CustomerLogin')) {
                                ?> 
                                <!-- <div class="booking-label">
                                    <a href="{{ url('user-profile') }}">{{ \Session::get('FirstName') }}</a>
                                </div> -->
                            <?php } ?>

                             <?php        
                                $id = Session::get('UserID'); 
                                $bookingCount = DB::table('bookings')->where('UserID','=',$id)->count();
                                 //dd($bookingCount);
                             ?> 

                            <div class="booking-label">
                                <a href="{{ url('cart') }}">
                                    My Booking (<?php  echo $bookingCount; ?>)
                                </a>
                            </div>

                            <!-- <div class="booking-label">
                                <a href="{{ url('cart') }}" <?php

                                // echo ($segment == "cart" ? 'class="active"' : ''); ?>>My Booking (<?php //echo (\Session::has('RoomsCart') ? count(\Session::get('RoomsCart')) : '0') ?>)</a>
                            </div> --> 
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Section End -->
        <div class="nav-area-full d-flex">
            <div class="container-fluid align-self-center">
                <div class="row">
                    <div class="col-lg-2 logo-area">
                        <div class="logo"><a href="/"><img class="lozad" data-src="{{ url('resources/assets/web/img/logo.png') }}" alt="logo"></a></div>
                    </div>
                    <div class="col-lg-10">

                        <div class="main-menu ff-secondary d-none d-lg-block">
                            <ul>
                                <li <?php echo ($segment == "home" ? 'class="active"' : ''); ?>><a href="{{ url('home') }}">Home</a></li>
                                 <li <?php echo ($segment == "about-us" ? 'class="active"' : ''); ?>><a href="{{ url('about-us') }}">About us</a></li> 
                                <li <?php echo ($segment == "hotels" ? 'class="active"' : ''); ?>><a href="{{ url('hotels') }}">Our Hotels</a></li>
                                 <li <?php echo ($segment == "partner" ? 'class="active"' : ''); ?>><a href="{{ url('partner') }}">Hotel Partners</a></li>
                                <li <?php echo ($segment == "corporate-clients" ? 'class="active"' : ''); ?>><a href="{{ url('corporate-clients') }}">Corporate Partners</a></li>
                                <li <?php echo ($segment == "travel-agent" ? 'class="active"' : ''); ?>><a href="{{ url('travel-agent') }}">Travel Agent</a></li> 
                            </ul>

                            <ul class="right-ul">
                                <li>
                                    <?php
                                    if (\Session::has('CustomerLogin') && \Session::get('CustomerLogin')) {
                                        ?>
                                        <a href="{{ url('logout') }}" id="access_link">
                                            <div class="icon-block">
                                                <span class="icon custom-sprite login-icon"></span>
                                            </div>
                                            <span class="txt">logout</span>
                                        </a>
                                    <?php } else {
                                        ?>
                                        <a href="{{ url('login') }}" id="access_link">
                                            <div class="icon-block">
                                                <span class="icon custom-sprite login-icon"></span>
                                            </div>
                                            <span class="txt">login</span>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </li>
                                <li>
                                    <?php
                                    if (\Session::has('CustomerLogin') && \Session::get('CustomerLogin')) {
                                        ?>
                                        <a href="{{ url('dashboard') }}" id="access_link">
                                            <div class="icon-block">
                                                <span class="icon custom-sprite register-icon"></span>
                                            </div>
                                            <span class="txt">Dashb..</span>
                                        </a>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="{{ url('signup') }}" id="access_link">
                                            <div class="icon-block">
                                                <span class="icon custom-sprite register-icon"></span>
                                            </div>
                                            <span class="txt">Register</span>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </li>
                            </ul>


                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script src="{{ url('resources/assets/web') }}/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">


    $( document ).ready(function() {
    if($('.main-menu').find('.active').length == 0)
    {
    $('.main-menu ul li:first').addClass('active')
    }
    });
    
    
    $( '.mobile-nav-btn' ).click(function() {
      if($(this).hasClass( "active" )){
        $('.mobile-nav-btn').removeClass('active');
        $('.mobile-nav').removeClass('active');
        
      } else {
        
        $('.mobile-nav').addClass('active');
        $('.mobile-nav-btn').addClass('active');

      }

    });


    
</script>