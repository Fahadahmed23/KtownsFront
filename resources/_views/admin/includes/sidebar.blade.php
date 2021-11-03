<?php
$segment = Request::segment(2);
$segment2 = Request::segment(3);

$cms = ["sliders", "pages", "testimonials", "blog"];
$system_setup = ["services", "hotel-types", "hotels", "hotel-images", "experiences"];
$booking_setup = ["bookings", "feedbacks", "experiences-bookings"];
$partners = ["partner-requests", "corporate-clients", "agent-requests"];
$hotels = ["hotels"];
$hotel_rooms_booking = ["dha","shahrah-e-faisal","millenium"];

$configuration = ["configuration"];
$users = ["users"];
$profile = ["profile"];
$cities = ["cities"];
$clients = ["clients"];
$promo = ["promo"];
$emails = ["emails"];
$partner_request = ["partner-requests"];
$agent_request = ["agent-requests"];
$report = ["report"];
?>

<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <?php if (\Session::get('AdminProfilePicture') != "" && \Session::get('AdminProfilePicture') != null) { ?>
                    {!! \Html::image('/public/uploads/administrators/' . \Session::get('AdminProfilePicture'), \Session::get('AdminProfilePicture'), ['class' => 'img-circle' ]) !!}
                <?php } else { ?>
                    <img src="{{ url('resources/assets/admin/') }}/dist/img/avatar.png" class="img-circle" alt="User Image">
                <?php } ?>
            </div>
            <div class="pull-left info">
                <p><?php echo \Session::get('AdminFullName'); ?></p>
            </div>
        </div>
        <ul class="sidebar-menu">
           <?php if(\Session::get('AdminID') == 1 ) { ?>
            <li class="treeview<?php echo ($segment == " dashboard" ? 'active' : '') ?>"> <a href="<?php if(\Session::get('AdminID') == 1 ) { ?> {{ url('admin/dashboard') }} <?php } else { echo "javascript:void(0);"; }?>"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a> </li>
            <li class="treeview <?php echo (in_array($segment, $partners) ? 'active' : ''); ?>">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Partners</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo ($segment == "partner-requests" ? 'class="active"' : ''); ?>> <a href="<?php if(\Session::get('AdminID') == 1 ) { ?> {{ url('admin/partner-requests') }} <?php } else { echo "javascript:void(0);"; }?>"> <i class="fa fa-circle-o"></i> <span>Partner Requests</span> </a> </li>
                    <li <?php echo ($segment == "corporate-clients" ? 'class="active"' : ''); ?>> <a href="<?php if(\Session::get('AdminID') == 1 ) { ?> {{ url('admin/corporate-clients') }} <?php } else { echo "javascript:void(0);"; }?>"> <i class="fa fa-circle-o"></i> <span>Corporate Requests</span> </a> </li>
                    <li <?php echo ($segment == "agent-requests" ? 'class="active"' : ''); ?>><a href="<?php if(\Session::get('AdminID') == 1 ) { ?> {{ url('admin/agent-requests') }} <?php } else { echo "javascript:void(0);"; }?>"><i class="fa fa-circle-o"></i> Agent Requests</a></li>
                </ul>
            </li>
            <li class="treeview<?php echo (in_array($segment, $users) ? ' active' : '') ?>"> <a href="<?php if(\Session::get('AdminID') == 1 ) { ?> {{ url('admin/users') }} <?php } else { echo "javascript:void(0);"; }?>"> <i class="fa fa-users"></i> <span>Users</span> </a> </li>

            <li class="treeview<?php echo (in_array($segment, $booking_setup) ? 'active' : ''); ?>">
                <a href="#">
                    <i class="fa fa-edit"></i>
                    <span>Booking Management</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo ($segment == "bookings" ? 'class="active"' : ''); ?>><a href="<?php if(\Session::get('AdminID') == 1 ) { ?> {{ url('admin/bookings') }} <?php } else { echo "javascript:void(0);"; }?>"><i class="fa fa-circle-o"></i> Bookings</a></li>
                    <li <?php echo ($segment == "feedbacks" ? 'class="active"' : ''); ?>><a href="<?php if(\Session::get('AdminID') == 1 ) { ?> {{ url('admin/feedbacks') }} <?php } else { echo "javascript:void(0);"; }?>"><i class="fa fa-circle-o"></i> Feedbacks</a></li>
                    <li <?php echo ($segment == "experiences-bookings" ? 'class="active"' : ''); ?>><a href="<?php if(\Session::get('AdminID') == 1 ) { ?> {{ url('admin/experiences-bookings') }} <?php } else { echo "javascript:void(0);"; }?>"><i class="fa fa-circle-o"></i>Experiences Bookings</a></li>
                </ul>
            </li>
            
            <li class="treeview <?php echo (in_array($segment, $hotel_rooms_booking) ? 'active' : ''); ?>">
                <a href="{{ url('admin/dha') }}">
                    <i class="fa fa-edit"></i>
                    <span>Hotel Rooms Booking</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo ($segment == "dha" ? 'class="active"' : ''); ?>><a href="<?php if(\Session::get('AdminID') == 1 || \Session::get('AdminID') == 3) { ?> {{ url('admin/dha') }} <?php } else { echo "javascript:void(0);"; }?>"><i class="fa fa-circle-o"></i>DHA</a></li>
                    <li <?php echo ($segment == "millenium" ? 'class="active"' : ''); ?>><a href="<?php if(\Session::get('AdminID') == 1 || \Session::get('AdminID') == 4) { ?> {{ url('admin/millenium') }} <?php } else { echo "javascript:void(0);"; }?>"><i class="fa fa-circle-o"></i> Millenium Mall</a></li>
                    <!--<li <?php echo ($segment == "shahrah-e-faisal" ? 'class="active"' : ''); ?>><a href="<?php if(\Session::get('AdminID') == 1 || \Session::get('AdminID') == 4) { ?> {{ url('admin/shahrah-e-faisal') }} <?php } else { echo "javascript:void(0);"; }?>"><i class="fa fa-circle-o"></i> Shara-E-Faisal</a></li>
                    -->
                </ul>
            </li>
            
            <li class="treeview <?php echo (in_array($segment, $system_setup) ? 'active' : ''); ?>">
                <a href="#">
                    <i class="fa fa-cogs"></i>
                    <span>Hotels Management</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo ($segment == "services" ? 'class="active"' : ''); ?>><a href="<?php if(\Session::get('AdminID') == 1 ) { ?> {{ url('admin/services') }} <?php } else { echo "javascript:void(0);"; }?>"><i class="fa fa-circle-o"></i> Services</a></li>
                    <li <?php echo ($segment == "hotel-types" ? 'class="active"' : ''); ?>><a href="<?php if(\Session::get('AdminID') == 1 ) { ?> {{ url('admin/hotel-types') }} <?php } else { echo "javascript:void(0);"; }?>"><i class="fa fa-circle-o"></i> Hotel Types</a></li>
                    <li <?php echo ($segment == "hotels" ? 'class="active"' : ''); ?>><a href="<?php if(\Session::get('AdminID') == 1 ) { ?> {{ url('admin/hotels') }} <?php } else { echo "javascript:void(0);"; }?>"><i class="fa fa-circle-o"></i> Hotels</a></li>
                    <li <?php echo ($segment == "experiences" ? 'class="active"' : ''); ?>><a href="<?php if(\Session::get('AdminID') == 1 ) { ?> {{ url('admin/experiences') }} <?php } else { echo "javascript:void(0);"; }?>"><i class="fa fa-circle-o"></i> Experiences</a></li>
                </ul>
            </li>

            <li class="treeview <?php echo (in_array($segment, $cms) ? 'active' : ''); ?>">
                <a href="#">
                    <i class="fa fa-cogs"></i>
                    <span>CMS</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo ($segment == "sliders" ? 'class="active"' : ''); ?>><a href="<?php if(\Session::get('AdminID') == 1 ) { ?> {{ url('admin/sliders') }} <?php } else { echo "javascript:void(0);"; }?>"><i class="fa fa-circle-o"></i> Sliders</a></li>
                    <li <?php echo ($segment == "testimonials" ? 'class="active"' : ''); ?>><a href="<?php if(\Session::get('AdminID') == 1 ) { ?> {{ url('admin/testimonials') }} <?php } else { echo "javascript:void(0);"; }?>"><i class="fa fa-circle-o"></i> Testimonials</a></li>
                    <li <?php echo ($segment == "pages" ? 'class="active"' : ''); ?>><a href="<?php if(\Session::get('AdminID') == 1 ) { ?> {{ url('admin/pages') }} <?php } else { echo "javascript:void(0);"; }?>"><i class="fa fa-circle-o"></i> Pages</a></li>
                    <li <?php echo ($segment == "blog" ? 'class="active"' : ''); ?>><a href="<?php if(\Session::get('AdminID') == 1 ) { ?> {{ url('admin/blog') }} <?php } else { echo "javascript:void(0);"; }?>"><i class="fa fa-circle-o"></i> Blog</a></li>
                </ul>
            </li>
            <li class="treeview<?php echo (in_array($segment, $cities) ? ' active' : '') ?>"> <a href="<?php if(\Session::get('AdminID') == 1 ) { ?> {{ url('admin/cities') }} <?php } else { echo "javascript:void(0);"; }?>"> <i class="fa fa-globe"></i> <span>Cities</span> </a> </li>
            <li class="treeview<?php echo (in_array($segment, $clients) ? ' active' : '') ?>"> <a href="<?php if(\Session::get('AdminID') == 1 ) { ?> {{ url('admin/clients') }} <?php } else { echo "javascript:void(0);"; }?>"> <i class="fa fa-image"></i> <span>Clients</span> </a> </li>
            <li class="treeview<?php echo (in_array($segment, $promo) ? ' active' : '') ?>"> <a href="<?php if(\Session::get('AdminID') == 1 ) { ?> {{ url('admin/promo') }} <?php } else { echo "javascript:void(0);"; }?>"> <i class="fa fa-check-circle"></i> <span>Promo Codes</span> </a> </li>
            <li class="treeview<?php echo (in_array($segment, $emails) ? ' active' : '') ?>"> <a href="<?php if(\Session::get('AdminID') == 1 ) { ?> {{ url('admin/emails') }} <?php } else { echo "javascript:void(0);"; }?>"> <i class="fa fa-envelope"></i> <span>Emails</span> </a> </li>
            <li class="treeview<?php echo (in_array($segment, $configuration) ? ' active' : '') ?>"> <a href="<?php if(\Session::get('AdminID') == 1 ) { ?> {{ url('admin/configuration') }} <?php } else { echo "javascript:void(0);"; }?>"> <i class="fa fa-cog"></i> <span>Configuration</span> </a> </li>
            <li class="treeview<?php echo (in_array($segment, $profile) ? ' active' : '') ?>"> <a href="<?php if(\Session::get('AdminID') == 1 ) { ?> {{ url('admin/profile') }} <?php } else { echo "javascript:void(0);"; }?>"> <i class="fa fa-user"></i> <span>Profile</span> </a> </li>
            <li class="treeview<?php echo (in_array($segment, $report) ? ' active' : '') ?>"> <a href="<?php if(\Session::get('AdminID') == 1 ) { ?> {{ url('admin/report') }} <?php } else { echo "javascript:void(0);"; }?>"> <i class="fa fa-table"></i> <span>Report</span> </a> </li>
            <?php } ?>
            <li> <a href="{{ url('admin/logout') }}"> <i class="fa fa-power-off"></i> <span>Sign Out</span> </a> </li>
        </ul>
    </section>
</aside>