@extends('layouts.default')
@section('title', 'Ktown Rooms | Web Privacy Policy') 
@section('description', 'Ktown rooms is Pakistans best budgeted hotel network, provides you accommodation in cheap rates. Stay at Ktown Rooms & get AC, Wifi, Complimentary breakfast, cleaned washroom, cable tv & hygienic bed/linen.Lowest Price Guaranteed. Book now and pay later search cheap hotel near you and you will find Ktown.')
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/banners/vacancies-bg.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading wow fadeInDown animated">WEB PRIVACY POLICY
                    <span class="mb-50">Borem ipsum dolor sit amet </span>
                </h2>  
            </div>
        </div>
    </div> 
</section> 

<section class="vac-main ptpx-0 pbpx-30">
    <div class="container align-self-center">

        <div class="col-md-12">
            <p>The following outlines are our Web Privacy Policy.</p>

            <p>As a customer/User, you are bound/agree with the terms and conditions of our privacy policy. By using the site and/ or by providing your information, you agree to the collection and use of the information you disclose on the site in accordance with this privacy policy.</p>

            <p>We use “cookies” on certain pages of our website to collect data which helps us to analyze our web page flow, users’ interest and to promote trust and safety. “Cookies” are small files placed on user’s hard drive to assist us in providing better services to customers.</p>

            <p>Please note that our privacy policy is subject to change at any time without prior notice. To remain aware with our policies you can visit our website policy section to avoid any inconvenience. As a customer, you confirm that the information provided by you is correct as per law, and KTown Rooms shall not be liable for the same.&nbsp;&nbsp;&nbsp;</p>

            <p>You can contact us 24/7, if you have any concerns regarding our privacy policy.</p>

        </div>

    </div> 
</section>
@stop

@section('myjsfile')
<script src="{{ url('resources/assets/web') }}/js/custom.js"></script>
@stop