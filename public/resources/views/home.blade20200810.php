@extends('layouts.default')
@section('title', 'KTown Rooms | Pakistan Best Budget Hotels, Lowest Price Guaranteed')
@section('description', 'Book budget hotels in Pakistan Starting PKR 2500+ Offering cheap hotels in 50+ cities across Pakistan, 1000 + AC rooms with breakfast, wifi, etc ✓pay at hotel')
@section('content')
<div class="hslider hslider-home">
<div class="main-slides">
<div class="slide">
<img src="{{ url('resources/assets/web/img/slides/slide-02.jpg') }}" alt=""/>
</div>
</div>
<div class="slide-assets">
<div class="container">
<div class="slider-assets">
<h1 class="wow fadeIn animated"><strong>Pakistan‘s</strong> best <br>budget <strong>hotels.</strong></h1>
<p class="fontlato wow fadeInUp animated">Affordability. Standardization. Predictability. Classification.</p>
<img class="facilitiy-slider-image lozad" data-src="{{ url('resources/assets/web/img/slides/facilities-slider.png') }}">
</div>
</div>
</div>
</div>
<section class="banner-form">
<div class="container">
{!! Form::open([ 'url' => 'hotels', 'id' => 'myForm']) !!}
<div class="row">
<div class="col-lg-3">
<div class="dcheck">
<label>CHECK IN</label>
<input type="text" name="CheckinDate" id="check_in" placeholder="Select Checkin date" data-date-format="dd/mm/yyyy" autocomplete="off" value="<?php echo date("d/m/Y"); ?>">
</div>
</div>
<div class="col-lg-3">
<div class="dcheck">
<label>CHECK OUT</label>
<input type="text" name="CheckoutDate" id="check_out" placeholder="Select Checkout date" data-date-format="dd/mm/yyyy" autocomplete="off" value="<?php echo date('d/m/Y', strtotime("+1 day"));?>">
</div>
</div>
<div class="col-lg-3">
<div class="dcheck">
<label>CITY</label>
<select name="Cityname" class="form-control">
<?php
                        foreach ($cities as $city) {
                            ?>
<option class="item" value="{{$city->CityName}}">{{ $city->CityName }}</option>
<?php
                        }
                        ?>
</select>
</div>
</div>
<div class="col-lg-3">
<button type="button" class="btn-black mtpx-12 m-auto d-table search-btn"><i class="icon-search"></i>Search now</a></button>
</div>
</div>
{!! FORM::close() !!}
</div>
</section>
<section class="hotel-list headingstyle">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="headingstyle1">
<h2 class="wow fadeInUp animated"><strong>Our top</strong> Hotels</h2>
</div>
</div>
</div>
</div>
<div class="container">
<div class="padding15">
<div class="row hotel-slider">
<?php
                if (count($hotels) > 0) {
                    foreach ($hotels as $hotel) {
                        ?>
<div class="col-lg-4">
<div class="boxHotel">
<a href="{{ url('details/'.$hotel['Slug']) }}">
<img title="{{$hotel['HotelName']}}" src="{{ url('public/uploads/website/hotels/thumb/'.$hotel['Thumbnail']) }}">
<div class="boxHotelDescrp">
<h3>{{str_limit($hotel['HotelName'], $limit = 25, $end = '...')}}</h3>
<p>This hotel is located near business hub of Karachi which is idol for business trips. It is surrounded by social and cultural activit...</p>
</div>
<div class="hotelprice">
<h5>PKR : <?php echo number_format($hotel['SellingPrice'], 0); ?>Rs /night</h5>
</div>
</a>
</div>
</div>
<?php
                    }
                }
                ?>
</div>
</div>
</div>
</section>
<section class="topdestinations hidden-sm-down">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="headingstyle1">
<h2 class="wow fadeInUp animated"><strong>Top</strong> Destination</h2>
</div>
</div>
</div>
</div>
<div class="con">
<div class="row">
<div class="col-md-2 p-0">
<a href="javascript:"><img class="wow zoomIn animated mrgboth onhover img-fluid td-1 lozad" data-src="{{ url('resources/assets/web/img/destination-1.jpg') }}"></a>
<a href="javascript:"><img class="wow zoomIn animated mrgboth onhover img-fluid td-6 lozad" data-src="{{ url('resources/assets/web/img/destination-6.jpg') }}"></a>
</div>
<div class="col-md-8 p-0">
<div class="row">
<div class="col-md-6 p-0">
<a href="javascript:"><img class="wow zoomIn animated mrgboth onhover img-fluid td-2 lozad" data-src="{{ url('resources/assets/web/img/destination-2.jpg') }}"> </a>
</div>
<div class="col-md-6 p-0">
<a href="javascript:"><img class="wow zoomIn animated mrgboth onhover img-fluid td-3 lozad" data-src="{{ url('resources/assets/web/img/destination-3.jpg') }}"></a>
<a href="javascript:"><img class="wow zoomIn animated mrgboth onhover img-fluid td-4 lozad" data-src="{{ url('resources/assets/web/img/destination-4.jpg') }}"></a>
<div class="destiCont">
<h2><strong>Karachi,</strong> Pakistan</h2>
<p>City Of Lights</p>
<a href="{{url('hotels-in-karachi')}}">Lean More</a>
</div>
</div>
</div>
<div class="col-md-12 p-0">
<div class="desti-bottom">
<a href="javascript:"><img class="wow zoomIn animated mrgboth onhover td-7 lozad" data-src="{{ url('resources/assets/web/img/destination-7.jpg') }}"></a>
<a href="javascript:"><img class="wow zoomIn animated mrgboth onhover td-8 lozad" data-src="{{ url('resources/assets/web/img/destination-8.jpg') }}"></a>
<a href="javascript:"><img class="wow zoomIn animated mrgboth onhover td-9 lozad" data-src="{{ url('resources/assets/web/img/destination-9.jpg') }}"></a>
</div>
</div>
</div>
<div class="col-md-2 prpx-0">
<a href="javascript:"><img class="wow zoomIn animated mrgboth onhover td-5 lozad" data-src="{{ url('resources/assets/web/img/destination-5.jpg') }}"></a>
<a href="javascript:"><img class="wow zoomIn animated mrgboth onhover td-10 lozad" data-src="{{ url('resources/assets/web/img/destination-10.jpg') }}"></a>
</div>
</div>
</div>
</section>
<section class="cp-content-area1">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="custom-heading mb-50">
<h3 class="wow fadeInUp animated">Our <strong>values</strong>
</h3>
</div>
</div>
</div>
<div class="row our-values sliderxs">
<div class="col-md-4">
<div class="valueBox">
<img src="{{ url('resources/assets/web') }}/img/value-1.png">
<h3><strong>Clean &amp; </strong>Fresh Rooms</h3>
<p>Hygienic and fresh linens along with clean bathrooms in all Ktown hotels</p>
</div>
</div>
<div class="col-md-4">
<div class="valueBox">
<img src="{{ url('resources/assets/web') }}/img/value-2.png">
<h3>Trained <strong>Friendly </strong>Staff</h3>
<p>Our well mannered staff is ready to serve you from front desk to your doorstep</p>
</div>
</div>
<div class="col-md-4">
<div class="valueBox">
<img src="{{ url('resources/assets/web') }}/img/value-3.png">
<h3>Assured <strong>Essentials</strong></h3>
<p>Enjoy Free WiFi, branded toiletries, 32 inches LED, AC rooms and free breakfast in all Ktown hotels</p>
</div>
</div>
</div>
</div>
</section>
<section class="eco-rooms">
<div class="container align-self-center">
<div class="eco-rooms-bg">
<div class="row justify-content-center">
<div class="col-md-6 align-self-center">
<div class="eco-budget-rooms">
<div class="ratings">
<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
</div>
<div class="heading">
<h1 class="wow fadeInUp animated">Economy <br><strong>Budget Rooms</strong></h1>
</div>
<div class="facilities">
<div class="faci-icon-1">
<div class="facilateBox"><i></i></div>
<h5>air <br>conditioner</h5>
</div>
<div class="faci-icon-2">
<div class="facilateBox"><i></i></div>
<h5>free <br>breakfast</h5>
</div>
<div class="faci-icon-3">
<div class="facilateBox"><i></i></div>
<h5>hygienic linen <br>/bedding</h5>
</div>
<div class="faci-icon-4">
<div class="facilateBox"><i></i></div>
<h5>cable <br>television</h5>
</div>
<div class="faci-icon-5">
<div class="facilateBox"><i></i></div>
<h5>cleaned <br>washrooms</h5>
</div>
<div class="faci-icon-6">
<div class="facilateBox"><i></i></div>
<h5>free <br>wifi</h5>
</div>
</div>
</div>
</div>
<div class="col-md-6 align-self-center">
<div class="price-start wow fadeInRight animated">
<div class="z1">
<h3 class="quicksand">Pocket <br><span>Stays</span></h3>
</div>
<div class="z2">
<div class="absloute">
<h4 class="quicksand">Starting</h4>
<h5 class="quicksand">from</h5>
<h2 class="quicksand">RS: 2500</h2>
<div class="per-night">Per Night</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="collaborated hidden-sm-down">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="headingstyle1">
<h2 class="wow fadeInUp animated">Let‘s <strong>Collaborate</strong></h2>
</div>
</div>
</div>
</div>
<div class="row m-0">
<div class="col-md-4 p-0">
<div class="collaBox imgBox">
<img class="lozad" data-src="{{ url('resources/assets/web/img/collab-1.jpg') }}">
</div>
</div>
<div class="col-md-4 p-0 bg-themecolor">
<div class="collaBox logoBox">
<img class="lozad" data-src="{{ url('resources/assets/web/img/collablogo-1.png') }}" class="wow bounceIn animated">
</div>
</div>
<div class="col-md-4 p-0">
<div class="collaBox contentBox">
<h3 class="wow fadeInRight animated"><strong>Hotel</strong> Partner</h3>
<p>Register with KTown rooms to list your apartments or hotels with us and grow your business. If you own a property register with us and make us manage your property. We assure you an increase in revenue, frequent occupancy and corporate customers.</p>
<a href="{{ url('partner') }}">Learn More</a>
</div>
</div>
<div class="col-md-4 p-0">
<div class="collaBox contentBox">
<h3 class="wow fadeInLeft animated"><strong>Corporate </strong> Partner</h3>
<p>Collaborate with us to make your business trips affordable and convenient. Ktown Rooms would make you efficient in cost reduction and in increasing productivity.</p>
<a href="{{ url('corporate-clients') }}">Learn More</a>
</div>
</div>
<div class="col-md-4 p-0">
<div class="collaBox imgBox">
<img class="lozad" data-src="{{ url('resources/assets/web/img/collab-2.jpg') }}">
</div>
</div>
<div class="col-md-4 p-0 bg-black">
<div class="collaBox logoBox">
<img class="lozad" data-src="{{ url('resources/assets/web/img/collablogo-2.png') }}" class="wow bounceIn animated">
</div>
</div>
<div class="col-md-4 p-0 bg-themecolor">
<div class="collaBox logoBox">
<img class="lozad" data-src="{{ url('resources/assets/web/img/collablogo-3.png') }}" class="wow bounceIn animated">
</div>
</div>
<div class="col-md-4 p-0">
<div class="collaBox contentBox">
<h3 class="wow bounceInUp animated"><strong>Travel </strong> Agent</h3>
<p>Be our hospitality partners and refer our hotels and guest houses to your travelers for standard accommodation across Pakistan at low prices and enjoy commission on bookings.</p>
<a href="{{ url('travel-agent') }}">Learn More</a>
</div>
</div>
<div class="col-md-4 p-0">
<div class="collaBox imgBox">
<img class="lozad" data-src="{{ url('resources/assets/web/img/collab-3.jpg') }}">
</div>
</div>
</div>
</section>
<section class="testimonials">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="headingstyle1">
<h2 class="wow fadeInUp animated"><strong>Customer </strong>Reviews</h2>
</div>
</div>
</div>
<div class="row d-flex">
<div class="col-md-6">
<div class="testi-tagline">
<h2 class="wow bounceInLeft animated">EVERY GREAT <strong>BUSINESS</strong> IS BUILT ON <span>FRIENDSHIP</span></h2>
</div>
</div>
<div class="col-md-6">
<div class="testimonials-slider">
<div class="sliderBox">
<h3>Abdullah Khan</h3>
<ul>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
</ul>
<h6>Best experience ever !!!</h6>
<p>This hotel offers extremely decent, comfortable and tidy bedrooms at a very ideal for vacations! Surrounding of the hotel is calm and safe. The staff is really cooperative; moreover the process of check in was quite smooth! Delicious breakfast is served every morning. I highly recommend this hotel.</p>
</div>
<div class="sliderBox">
<h3>Mohsin Ahmed</h3>
<ul>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
</ul>
<h6>Best experience ever !!!</h6>
<p>It is an amazing spot in the central area. All the basic requirements and needs are few meters away. In addition to this, best cafés, and restaurants are close-by. Hotel is beautifully decorated, and perfect. I would highly recommend this hotel to everyone.</p>
</div>
<div class="sliderBox">
<h3>Syed Khurram</h3>
<ul>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
</ul>
<h6>Best experience ever !!!</h6>
<p>Hotel was extremely charming and the rooms are quite stylish and clean. In case of any problem, they fix it in few minutes. Next time when I’ll visit this place, I will surely stay at Ktown Rooms as my experience was quite amazing there.</p>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="client-list headingstyle">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="headingstyle1">
<h2 class="wow fadeInUp animated">Our <strong>Clients</strong></h2>
</div>
</div>
</div>
<div class="container sliderxs">
<div class="padding15">
<div class="row hotel-slider">
<?php
                    if (count($hotels) > 0) {
                        foreach ($clients as $client) {
                            ?>
<div class="col-lg-4">
<div class="">
<img title="{{ $client->Title }}" src="{{ url('public/uploads/website/clients/'.$client->Image) }}">
</div>
</div>
<?php
                        }
                    }
                    ?>
</div>
</div>
</div>
</div>
</section>
@stop
@section('myjsfile')
<script src="{{ url('resources/assets/web') }}/js/custom.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<style>.ui-datepicker{width:26em}.form-control{height:33px!important;background:transparent!important;border-bottom:2px solid #000!important;font-size:14px!important;font-weight:700!important;border:1px solid #e79339!important}</style>
<script>
$(document).ready(function () {
    $('.search-btn').click(function () {
        var date1 = new Date($('#check_in').val());
        var date2 = new Date($('#check_out').val());
        var timeDiff = date2.getTime() - date1.getTime();
        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
//alert(diffDays);
        if ($('#check_in').val() == "" || $('#check_out').val() == "") {
            $('#message-modal').html("Please select checkin & checkout date.");
            $('#myModal').modal();
        } else if (diffDays < 1) {
            $('#message-modal').html("Please select valid checkout date.");
            $('#myModal').modal();
        } /*else if ($('#check_in').val() >= $('#check_out').val()) {
            $('#message-modal').html("Please select valid Checkin & checkout date.");
            $('#myModal').modal();
        } */ else {
            $('#myForm').submit();
        }
    });
});
</script>
<script src="{{ url('resources/assets/web') }}/js/bootstrap-timepicker.js"></script>
<script>$(function(){$("#check_in").datepicker({minDate:0,dateFormat:"dd/mm/yy"});$("#check_out").datepicker({minDate:+1,dateFormat:"dd/mm/yy"})});$("input.date-pick").datepicker();$("input.time-pick").timepicker({minuteStep:15,showInpunts:false});var incrementPlus;var incrementMinus;var buttonPlus=$(".cart-qty-plus");var buttonMinus=$(".cart-qty-minus");var incrementPlus=buttonPlus.click(function(){var b=$(this).parent(".button-container").parent(".idcrement").find(".qty");b.val(Number(b.val())+1)});var incrementMinus=buttonMinus.click(function(){var c=$(this).parent(".button-container").parent(".idcrement").find(".qty");var d=Number(c.val());if(d>0){c.val(d-1)}});new WOW().init();</script>
@stop