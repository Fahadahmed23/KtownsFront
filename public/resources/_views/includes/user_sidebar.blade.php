<?php
$segment = Request::segment(1);
?>
<div id="filters_col">
    <h3> <?php echo \Session::get('FirstName')." ".\Session::get('LastName'); ?></h3>
    <div>
        <ul id="user-dashboard-sidebar">
            <li <?php echo ($segment == "dashboard" ? 'class="active"' : ''); ?>><a href="{{ url('dashboard') }}"><i class="fa fa-user"></i> My Account</a></li>
            <li <?php echo ($segment == "my-bookings" ? 'class="active"' : ''); ?>><a href="{{ url('my-bookings') }}"><i class="fa fa-table"></i> My Bookings</a></li>
            <li <?php echo ($segment == "my-payments" ? 'class="active"' : ''); ?>><a href="{{ url('my-payments') }}"><i class="fa fa-money"></i> My Payments</a></li>
            <li><a href="{{ url('logout') }}"><i class="fa fa-power-off"></i> Sign Out</a></li>
        </ul>
    </div>
</div>