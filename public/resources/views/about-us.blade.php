@extends('layouts.default')
@section('title', 'About us | Comfortable & stylish budget hotels in Pakistan')
@section('description', 'Ktown Rooms is providing reasonable hospitality services across Pakistan. Our customers avail best services of hotels and guest houses at low prices guaranteed')
@section('content')
<<!--section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{url('resources/assets/web')}}/img/covers/about-us-cover.jpg)">
<div class="container align-self-center">
<div class="row justify-content-center">
<div class="col-lg-12">
<h2 class="ban-heading wow fadeInDown animated">About Us
</h2>
</div>
</div>
</div>
</section> -->
<section class="vac-main ptpx-0 pbpx-30">
<div class="container align-self-center">
<div class="row justify-content-center">
<div class="col-lg-6">
<img src="{{ url('resources/assets/web') }}/img/mob-img.jpg" alt="*" class="mob-imgg hidden-sm-down wow fadeIn animated">
</div>
<div class="col-lg-6 align-self-center">
<div class="mob-right">
<h2 class="wow fadeInRight animated">EVERY GREAT <strong>BUSINESS</strong><br> IS BUILT ON <span class="">CREDIBILITY</span></h2>
<h3 class="wow fadeInRight animated">Vision</h3>
<p>Our vision is to become the leading hospitality brand in Pakistan by operational supremacy, management efficiency and influx of umberalla hotels.<p>
<h3 class="wow fadeInRight animated">Mission</h3>
<p>Our mission is to gain leadership and recognition in the hospitality sector by providing budget friendly and high quality standardized, which creates values for money to millennial travellers.
</p>
</div>
</div>
</div>
</div>
</section>
<section class="abt-gal-main hidden-sm-down">
<div class="row m-0">
<div class="col-lg-12 p-0">
<ul class="abt-gal-list">
<li><img class="lozad" data-src="{{ url('resources/assets/web') }}/img/abt-img1.jpg" alt="*"></li>
<li><img class="lozad" data-src="{{ url('resources/assets/web') }}/img/abt-img2.jpg" alt="*"></li>
<li><img class="lozad" data-src="{{ url('resources/assets/web') }}/img/abt-img3.jpg" alt="*"></li>
<li><img class="lozad" data-src="{{ url('resources/assets/web') }}/img/abt-img4.jpg" alt="*"></li>
<li><img class="lozad" data-src="{{ url('resources/assets/web') }}/img/abt-img5.jpg" alt="*"></li>
<li><img class="lozad" data-src="{{ url('resources/assets/web') }}/img/abt-img6.jpg" alt="*"></li>
<li><img class="lozad" data-src="{{ url('resources/assets/web') }}/img/abt-img7.jpg" alt="*"></li>
<li><img class="lozad" data-src="{{ url('resources/assets/web') }}/img/abt-img8.jpg" alt="*"></li>
<li><img class="lozad" data-src="{{ url('resources/assets/web') }}/img/abt-img9.jpg" alt="*"></li>
<li><img class="lozad" data-src="{{ url('resources/assets/web') }}/img/abt-img10.jpg" alt="*"></li>
<li><img class="lozad" data-src="{{ url('resources/assets/web') }}/img/abt-img11.jpg" alt="*"></li>
<li><img class="lozad" data-src="{{ url('resources/assets/web') }}/img/abt-img12.jpg" alt="*"></li>
</ul>
</div>
</div>
</section>
<section>
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="headingstyle1 knm">
<h2 class="wow fadeInDown animated"> <strong>About</strong>Ktown Rooms</h2>
<p>Know us better</p>
</div>
</div>
</div>
</div>
<div class="row m-0 abt-sld">
<div class="col-lg-6 p-0">
<img data-src="{{ url('resources/assets/web') }}/img/abt-slide-img.jpg" alt="*" class="abt-simg m-w lozad">
</div>
<div class="col-lg-6 align-self-center">
<div class="about-slider">
<div class="abt-slide-bx">
<h3>About</h3>
<p>Since very long, Pakistan has been missing out on economical yet delightful hotels industry. Ktown Rooms is a technology driven startup which is filling the gap through offering economical hotel chain.
<br><br>
Ktown Rooms focuses on delivering standard hospitality services at low prices to maximize customer satisfaction. We provide our customers beautiful ambience, well decorated rooms and complete amenities at reasonable prices. In a nutshell, it is "Re-inventing the Hospitality".
<br><br>
Along with accommodation in hotels, we also manage local independent apartments in the cities.
<p style="text-align:center">Come to Ktown and experience hospitality beyond borders!</p>
</p>
</div>
</div>
</div>
</div>
</section>
<section class="abt-btm">
<div class="row m-0">
<div class="col-lg-12 p-0">
<img data-src="{{ url('resources/assets/web') }}/img/jus.png" alt="*" class="hidden-sm-down jus wow fadeInRight animated lozad">
</div>
</div>
<div class="row justify-content-center btm m-0">
<div class="col-lg-11 align-self-center">
<h4 class="wow fadeIn animated">We are looking for talented, devoted people to join our team</h4>
<a href="{{ url('careers') }}" class="btn-blck">View Open Positions</a>
</div>
</div>
</section>
@stop
@section('myjsfile')
<script src="{{ url('resources/assets/web') }}/js/custom.js"></script>
@stop