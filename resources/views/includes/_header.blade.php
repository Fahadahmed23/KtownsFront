<?php
$segment = Request::segment(1);
$segment2 = Request::segment(2);
?>
<div class="mobile-nav"> <a href="/" class="logo-main"> <img class="lozad" data-src="{{ url('resources/assets/web/img/logo.png') }}" alt="logo"></a>
<nav>
<ul class="unstyled mainnav pbpx-15">
<li <?php echo ($segment == "home" ? 'class="active"' : ''); ?>><a href="{{ url('home') }}" class="">Home</a></li>
<li <?php echo ($segment == "about-us" ? 'class="active"' : ''); ?>><a href="{{ url('about-us') }}">About us</a></li>
<li <?php echo ($segment == "hotels" ? 'class="active"' : ''); ?>><a href="{{ url('hotels') }}">Our Hotels</a></li>
<li <?php echo ($segment == "partner" ? 'class="active"' : ''); ?>><a href="{{ url('partner') }}">Become Partners</a></li>
<!-- <li <?php //echo ($segment == "corporate-clients" ? 'class="active"' : ''); ?>><a href="{{ url('corporate-clients') }}">Corporate Partners</a></li>
<li <?php //echo ($segment == "travel-agent" ? 'class="active"' : ''); ?>><a href="{{ url('travel-agent') }}">Travel Agent</a></li> -->
</ul>
</nav>
</div>
<div class="mobile-nav-btn"> <span class="lines"></span> </div>
<header class="header-section">
<div class="header-top-block">
<div class="container">
<div class="row">
<div class="col-md-4">
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
<a href="mailto:{{ $emails->SupportEmail }}" class="mailto"><span class="email">{{ $emails->SupportEmail }}</span></a>
</li>
</ul>
</div>
</div>
<div class="col-md-8">
<div class="d-flex justify-content-end tablet-center top-right">
<div class="social-list hidden-sm-down">
<ul>
<li>
<a href="{{ $configuration->Facebook }}" target="_blank"><span class="icon custom-sprite fb-icon"></span></a>
</li>
<li>
<a href="{{ $configuration->Instagram }}" target="_blank"><span class="icon custom-sprite insta-icon"></span></a>
</li>
<li>
<a href="{{ $configuration->Twitter }}" target="_blank"><span class="icon custom-sprite twitter-icon"></span></a>
</li>
<li>
<a href="#"><span class="icon custom-sprite linkedin-icon"></span></a>
</li>
</ul>
</div>
<div class="top-list">
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
<span class="txt">Dashboard</span>
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
<div class="booking-label">
<a href="{{ url('user-profile') }}">{{ \Session::get('FirstName').' '.\Session::get('LastName') }}</a>
</div>
<?php } ?>
<div class="booking-label">
<a href="{{ url('cart') }}" <?php echo ($segment == "cart" ? 'class="active"' : ''); ?>>My Booking (<?php echo (\Session::has('RoomsCart') ? count(\Session::get('RoomsCart')) : '0') ?>)</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="nav-area-full d-flex">
<div class="container align-self-center">
<div class="row">
<div class="col-lg-3 logo-area">
<div class="logo"><a href="/"><img class="lozad" data-src="{{ url('resources/assets/web/img/logo.png') }}" alt="logo"></a></div>
</div>
<div class="col-lg-9">
<div class="main-menu ff-secondary d-none d-lg-block">
<ul>
<li <?php echo ($segment == "home" ? 'class="active"' : ''); ?>><a href="{{ url('home') }}">Home</a></li>
<li <?php echo ($segment == "about-us" ? 'class="active"' : ''); ?>><a href="{{ url('about-us') }}">About us</a></li>
<li <?php echo ($segment == "hotels" ? 'class="active"' : ''); ?>><a href="{{ url('hotels') }}">Our Hotels</a></li>
<li <?php echo ($segment == "partner" ? 'class="active"' : ''); ?>><a href="{{ url('partner') }}">Become Partners</a></li>
<!--<li <?php //echo ($segment == "corporate-clients" ? 'class="active"' : ''); ?>><a href="{{ url('corporate-clients') }}">Corporate Partners</a></li>
<li <?php //echo ($segment == "travel-agent" ? 'class="active"' : ''); ?>><a href="{{ url('travel-agent') }}">Travel Agent</a></li>-->
</ul>
</div>
</div>
</div>
</div>
</div>
</header>