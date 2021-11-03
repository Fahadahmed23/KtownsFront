<style type="text/css">
    
    
    .left-sidebar ul li:active {
    background: #fa9654;
}
.active{
     background: #fa9654;
}
</style>
<div class="col-lg-3 p-0">
    <div class="left-sidebar" style="background-image: url('{{ url('resources/assets/web') }}/img/dashboard/left-sidebar-bg.jpg');">
        <ul class="unstyled" id="unstyled">

            <li class="bdr-btm bdr-rgt btnn {{ (request()->is('dashboard')) ? 'active' : '' }}"><a href="{{ url('dashboard') }}"><img src="{{ url('resources/assets/web') }}/img/dashboard/icon/all-icon.png" alt="*" /> All</a></li>
            <li class="bdr-btm btnn {{ (request()->is('my-bookings')) ? 'active' : '' }}"><a href="{{ url('my-bookings') }}"><img src="{{ url('resources/assets/web') }}/img/dashboard/icon/booking-icon.png" alt="*" /> My Bookings</a></li>
            <li class="bdr-btm bdr-rgt btnn"><a href="javascript:;"><img src="{{ url('resources/assets/web') }}/img/dashboard/icon/payment-icon.png" alt="*" /> Payment History</a></li>
            <li class="bdr-btm btnn {{ (request()->is('user-profile')) ? 'active' : '' }}"><a href="{{ url('user-profile') }}"><img src="{{ url('resources/assets/web') }}/img/dashboard/icon/profile-icon.png" alt="*" /> Profile</a></li>
            <li class="bdr-rgt btnn {{ (request()->is('my-payments')) ? 'active' : '' }}"><a href="{{ url('my-payments') }}"><img src="{{ url('resources/assets/web') }}/img/dashboard/icon/payment-icon.png" alt="*" /> Payments</a></li>
            <li class=""><a href="{{ url('logout') }}"><img src="{{ url('resources/assets/web') }}/img/dashboard/icon/logout-icon.png" alt="*" /> Logout</a></li>
        </ul>
    </div>

</div>