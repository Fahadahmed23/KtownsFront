@extends('layouts.default')
@section('title', "Contact Us | KTown Rooms | Pakistan's Top Hotel's Services") 
@section('description', "Ktown rooms is Pakistan's best budgeted hotel network, provides you accommodation in cheap rates. Stay at Ktown Rooms & get AC, Wifi, Complimentary breakfast, cleaned washroom, cable tv & hygienic bed/linen.Lowest Price Guaranteed. Book now and pay later search cheap hotel near you and you will find Ktown.")
@section('content') 
<section class="d-flex contact-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/banners/contact-bg.jpg);">
    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-4 align-self-center mtpx-94">
                <div class="ad-box">
                    <h3>Address</h3>
                    <p>{{ $configuration->Address }}</p>
                </div>
                <div class="ad-box">
                    <h3>Phone</h3>
                    <p><a href="tel:{{ $configuration->Contact1 }}">{{ $configuration->Contact1 }}</a></p>
                    <p><a href="tel:{{ $configuration->Contact1 }}">{{ $configuration->Contact2 }}</a></p>
                </div>
                <div class="ad-box">
                    <h3>Email</h3>
                    <p><a href="mailto:{{ $emails->SupportEmail }}">{{ $emails->SupportEmail }}</a></p>
                </div>
                <div class="d-flex ad-box">
                    <p>
                        <a href="{{ $configuration->Facebook }}" target="_blank"><span class="icon-facebook" style="color:#fff;"></span></a>
                        <a href="{{ $configuration->Instagram }}" target="_blank"><span class="icon-instagram" style="color:#fff;"></span></a>
                        <a href="{{ $configuration->Twitter }}" target="_blank"><span class="icon-twitter" style="color:#fff;"></span></a>
                        <a href="{{ $configuration->LinkedIn }}" target="_blank"><span class="icon-linkedin" style="color:#fff;"></span></a>
                    </p>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="contact-box">
                     <div id="message-contact"></div>
                        @include('includes/front_alerts')
                    <h3 class="ban-heading">Fill the form below</h3>
                    {!! Form::open([ 'id' => 'frmLogin', 'url' => 'contact', 'class' => 'reg-form alphafield ']) !!}
                    {!! Form::text('FirstName', null, ['id' => 'FirstName','class' => 'alphafield', 'placeholder' => 'First Name']) !!}  
                    {!! Form::text('LastName', null, ['id' => 'LastName','class' => 'alphafield', 'placeholder' => 'Last Name']) !!}
                    {!! Form::text('Email', null, ['id' => 'Email', 'placeholder' => 'Email Address']) !!}
                    {!! Form::text('Phone', null, ['id' => 'Phone','maxlength' =>'11', 'placeholder' => 'Contact']) !!}
                    {!! Form::textarea('Message', null, ['id' => 'Message', 'placeholder' => 'Message']) !!}
                    <button type="submit" class="con-submit" id="submit-contact">Submit</button>
                    {!! FORM::close() !!}
                </div>       
            </div>
        </div>
    </div> 
</section>
<section class="contact-slider-area">
    <img src="{{ url('resources/assets/web') }}/img/con-txt.png" alt="*" class="cont-txt hidden-sm-down wow fadeInLeft animated">
    <div class="container align-self-center">
        <!--<div class="row justify-content-center con-slider mtpx-94">
            <div class="col-lg-6">
                <p>From a very long time, the budgeted hotel industry of Pakistan was missing a brand that would be reliable and efficient for both hotels and accommodation seekers, Ktown Rooms is a technology driven startup, which aims to cater all the needs budgeted hotel industry.</p>
            </div>
            <div class="col-lg-6">
                <p>From a very long time, the budgeted hotel industry of Pakistan was missing a brand that would be reliable and efficient for both hotels and accommodation seekers, Ktown Rooms is a technology driven startup, which aims to cater all the needs budgeted hotel industry.</p>
            </div>
            <div class="col-lg-6">
                <p>From a very long time, the budgeted hotel industry of Pakistan was missing a brand that would be reliable and efficient for both hotels and accommodation seekers, Ktown Rooms is a technology driven startup, which aims to cater all the needs budgeted hotel industry.</p>
            </div>
        </div>-->
    </div>
</section>
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d57947.09749561283!2d67.09736625205076!3d24.80594348388076!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb4df337c27e857c8!2sKtown+Rooms+DHA%2C+Phase+VII!5e0!3m2!1sen!2s!4v1557558731234!5m2!1sen!2s" width="100%" height="428" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<style>
/*.con-submit {
    cursor: pointer;
    display: block;
    text-align: center !important;
    border: none !important;
    color: #fff !important;
    font-size: 18px !important;
    padding: 13px 25px !important;
    border-radius: 50px !important;
    background: #e79339 !important;
    width: 96% !important;
    font-weight: 600 !important;
    margin: 15px auto auto !important;
}*/
</style>



<script type="text/javascript">
    $(document).ready(function(){
    $('#Phone').keypress(validateNumber);
    $('.alphafield').keypress(function (e) {
            var regex = new RegExp("^[a-zA-Z]+$");
            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(str)) {
                return true;
            }
            else
            {
            e.preventDefault();
            return false;
            }
        });
});

function validateNumber(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if ( key < 48 || key > 57 ) {
        return false;
    } else {
        return true;
    }
}
</script>
@stop
@section('myjsfile')
<script src="{{ url('resources/assets/web') }}/js/common_scripts_min.js"></script>
<script src="{{ url('resources/assets/web') }}/js/functions.js"></script>

<!-- Specific scripts -->
<script src="{{ url('resources/assets/web') }}/assets/validate.js"></script>
@stop