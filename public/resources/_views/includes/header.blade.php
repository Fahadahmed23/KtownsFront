<?php
$segment = Request::segment(1);
$segment2 = Request::segment(2);
?>
<header>
    <div id="top_line">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-8">
                    <div id="header_contact">
                        <i class="icon-mobile"></i><strong>+92(311) 1222 418</strong>
                    </div>
                    <div id="social_header">
                        <ul>
                            <li><a target="_blank" href="{{ $configuration->Facebook }}"><i class="icon-facebook"></i></a></li>
                            <li><a target="_blank" href="{{ $configuration->Twitter }}"><i class="icon-twitter"></i></a></li>
                            <li><a target="_blank" href="{{ $configuration->Instagram }}"><i class="icon-instagram"></i></a></li>
                            <li><a target="_blank" href="{{ $configuration->LinkedIn }}"><i class="icon-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-4">
                    <ul id="top_links">
                        <?php
                        if (\Session::has('CustomerLogin') && \Session::get('CustomerLogin')) {
                            ?>
                            <li class="custom-dropdown"><a style="font-weight: bold;">Welcome {{ \Session::get('FirstName').' '.\Session::get('LastName') }} <i class="fa fa-chevron-down" style="font-weight: bold;"></i></a>
                                <ul>
                                    <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
                                    <li><a href="{{ url('logout') }}">Logout</a></li>
                                </ul>
                            </li>
                            <!--<li><a href="{{ url('logout') }}" id="access_link">Logout</a></li>-->
                            <?php
                        } else {
                            ?>
                            <li><a href="{{ url('login') }}" id="access_link">Sign in</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div><!-- End row -->
        </div><!-- End container-->
    </div><!-- End top line-->

    <div class="container" style="padding-bottom: 10px;">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-6">
                <a href="https://www.ktownrooms.com/" title="K Town Rooms"><img src="{{ url('resources/assets/web/img/ktown_logo.png') }}" class="img-responsive" /></a>
                <!--                <div id="logo_home">
                                    
                                    <h1><a href="{{ url('home') }}" title="K Town Rooms">K Town Rooms</a></h1>
                                </div>-->
            </div>
            <nav class="col-md-9 col-sm-6 col-xs-6">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                <div class="main-menu">
                    <div id="header_menu">
                        <img src="{{ url('resources/assets/web') }}/img/logo_sticky.png" width="160" height="34" alt="City tours" data-retina="true">
                    </div>
                    <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                    <ul>
                        <li <?php echo ($segment == "about-us" ? 'class="active"' : ''); ?>><a href="{{ url('about-us') }}">About Us</a></li>
                        <li <?php echo ($segment == "hotels" ? 'class="active"' : ''); ?>><a href="{{ url('hotels') }}">Our Hotels</a></li>
                        <?php
                        if (count($main_menu) > 0) {
                            foreach ($main_menu as $page) {
                                ?>
                                <li <?php echo ($segment == "page" && $segment2 == $page->Slug ? 'class="active"' : ''); ?>><a href="{{ url('page/'.$page->Slug) }}">{{ $page->Title }}</a></li>
                                <?php
                            }
                        }
                        ?>
                        <li <?php echo ($segment == "partner" ? 'class="active"' : ''); ?>><a href="{{ url('partner') }}">Hotel Partners</a></li>
                        <li <?php echo ($segment == "corporate-clients" ? 'class="active"' : ''); ?>><a href="{{ url('corporate-clients') }}">Corporate Partners</a></li>

                        <li <?php echo ($segment == "travel-agent" ? 'class="active"' : ''); ?>><a href="{{ url('travel-agent') }}">Travel Agent</a></li>
                        <li <?php echo ($segment == "cart" ? 'class="active"' : ''); ?>><a href="{{ url('cart') }}">My Booking (<?php echo (\Session::has('RoomsCart') ? count(\Session::get('RoomsCart')) : '0') ?>)</a></li>
                        <!--<li <?php // echo ($segment == "contact" ? 'class="active"' : '');   ?>><a href="{{ url('contact') }}">Contact Us</a></li>-->
                        <!--                            <li class="submenu">
                                                        <a href="javascript:void(0);" class="show-submenu">Home <i class="icon-down-open-mini"></i></a><ul>
                                                            <li><a href="index.html">With Hotels and Tours</a></li>
                                                            <li><a href="index_12.html">With Layer slider</a></li>
                                                            <li><a href="index_2.html">With Only tours</a></li>
                                                            <li><a href="index_3.html">Single image</a></li>
                                                            <li><a href="index_4.html">Header video</a></li>
                                                            <li><a href="index_7.html">With search panel</a></li>
                                                            <li><a href="index_13.html">With tabs</a></li>
                                                            <li><a href="index_5.html">With map</a></li>
                                                            <li><a href="index_6.html">With search bar</a></li>
                                                            <li><a href="index_8.html">Search bar + Video</a></li>
                                                            <li><a href="index_9.html">With Text Rotator</a></li>
                                                            <li><a href="index_10.html">With Cookie Bar (EU law)</a></li>
                                                            <li><a href="index_11.html">Popup Advertising</a></li>
                                                        </ul>
                                                    </li>-->
                    </ul>
                </div><!-- End main-menu -->
                <ul id="top_tools">
                    <li>
                        <div class="dropdown dropdown-search">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-search"></i></a>
                            <div class="dropdown-menu">
                                <form method="get" action="hotels">
                                    <div class="input-group">
                                        <input type="text" name="q" class="form-control" placeholder="Search...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit" style="margin-left:0;">
                                                <i class="icon-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </li>
                    <!--<li>-->
                    <!--                        <div class="dropdown dropdown-cart">
                                                <a href="{{ url('cart') }}"><i class=" icon-basket-1"></i>Cart (<?php // echo (\Session::has('RoomsCart') ? count(\Session::get('RoomsCart')) : '0')   ?>) </a>-->
                    <!--                            <ul class="dropdown-menu" id="cart_items">
                                                    <li>
                                                        <div class="image"><img src="img/thumb_cart_1.jpg" alt="image"></div>
                                                        <strong>
                                                            <a href="#">Louvre museum</a>1x $36.00 </strong>
                                                        <a href="#" class="action"><i class="icon-trash"></i></a>
                                                    </li>
                                                    <li>
                                                        <div class="image"><img src="img/thumb_cart_2.jpg" alt="image"></div>
                                                        <strong>
                                                            <a href="#">Versailles tour</a>2x $36.00 </strong>
                                                        <a href="#" class="action"><i class="icon-trash"></i></a>
                                                    </li>
                                                    <li>
                                                        <div class="image"><img src="img/thumb_cart_3.jpg" alt="image"></div>
                                                        <strong>
                                                            <a href="#">Versailles tour</a>1x $36.00 </strong>
                                                        <a href="#" class="action"><i class="icon-trash"></i></a>
                                                    </li>
                                                    <li>
                                                        <div>Total: <span>$120.00</span></div>
                                                        <a href="cart.html" class="button_drop">Go to cart</a>
                                                        <a href="payment.html" class="button_drop outline">Check out</a>
                                                    </li>
                                                </ul>-->
                    <!--</div>-->
                    <!-- End dropdown-cart-->
                    <!--</li>-->
                </ul>
            </nav>
        </div>
    </div><!-- container -->
</header><!-- End Header -->