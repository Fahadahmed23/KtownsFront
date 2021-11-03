@extends('layouts.default')
@section('title', 'KTown Rooms | Pakistan Best Budget Hotels, Lowest Price Guaranteed')
@section('description', 'Book budget hotels in Pakistan Starting PKR 2500+ Offering cheap hotels in 50+ cities across Pakistan, 1000 + AC rooms with breakfast, wifi, etc ✓pay at hotel')
@section('content')
<style type="text/css">

.mid-slide{
    width:100%;
    left:0px;
    top: 40% !important;
}
.slider-heading{
    color: #fff;
    font-size: 32px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
}
/*plusminubtncss*/

.qty {
    width: 80%;
    float: left;
    text-align: right;
}
.qty .plusmiusbtns {
    border: none;
    width: 20%;
    padding-left: 15px !IMPORTANT;
    color: #000;
    display: inline-block;
    vertical-align: top;
    font-size: 18px;
    line-height: 26px;
    min-width: 35px;
    padding: 0;
    text-align: center;
}
span.bg-dark {
    cursor: pointer;
    font-size: 18px !important;
    width: 30px;
    font-weight: 500 !important;
    height: 22px;
    display: inline-block;
    text-align: center;
    padding: 0 !important;
    margin: 0 !important;
    line-height: 20px !important;
    background: #fff !important;
     border: 1px solid;
}


/*.dropdown-menu.show {
    top: 12px !important;
    will-change: transform;
    width: 340px;
    padding: 23px 15px 25px 15px !important;

}*/
/*.dropdown-menu.show .form-group label {
    width: 20%;
    font-size: 15px !important;
    float: left;
    text-align: left;
}*/

.showfilter {
    top: 48px !important;
    will-change: transform;
    width: 340px;
    background-color: #e79339 !important;
    border: 2px solid #fff;
    padding: 23px 15px 25px 15px !important;

}
.showfilter .form-group {
    width: 100%;
    float: left;
}
.showfilter .form-group label {
    width: 20%;
    font-size: 15px !important;
    float: left;
    text-align: left;
    
}
button#dropdownMenu2 {
    text-align: left;
    border-bottom: 2px solid !important;
    width: 100%;
    background: transparent;
    border: 0;
    border-bottom: 2px solid #000;
    font-size: 16px;
    padding: 5px 5px;
    color: #000 !important;
    font-weight: 700;
}
.dropdown-toggle::after {
    position: absolute;
    right: 0;
    top: 15px;}
button#dropdownMenu2 span:nth-child(1) {
    margin-left: 0;
}
button#dropdownMenu2 span {
    font-size: 19px;
    /*margin: 0 10px; */
    margin: 2px;
}
/*plusminubtncss*/


    .slider-assets .eco-rooms 
    {
    background: none;
    }
    .eco-rooms .eco-budget-rooms
    {
    text-align: left;
    }
    .slider-assets  .eco-rooms .eco-budget-rooms .ratings
    {
        margin:20px 0;
    }

    .collaborated{
    background: #f7f7f7;
    }

    .testimonials .testimonials-slider{
        min-height: 270px;
    }
    .hslider .slider-assets img.facilitiy-slider-image {
    left: 0;
    }
    .boxHotelDescrp p {
    font-size: 12px !important;
    color: #000 !important;
    }

        .slider-assets-feature-hotel {
            box-shadow: 0 0 20px 5px #00000038;
            background: #00000057;
        }
        .hslider .slider-assets h2 {
            color: #fff;
            font-size: 50px;
            font-weight: 400;
            line-height: 60px;
            display: inline-block;
        }

        .hslider .bookEasyContnt {
            position: absolute;
            z-index: 991;
            top: 40%;
            transform: translateY(-50%);
            width: 100%;
            right: 0;
            left: 0;
            text-align: center;
        }
        .slider-assets.bookEasyContnt .row img {
            width: auto ;
            margin: 0 auto;
        }

        .slider-assets.bookEasyContnt .row {
            position: relative;
            top: 60px;
        }
        .bokEsyBoxSec {
            width: 100%;
        }
        .bokEsyBoxSec p {
            margin: 0 auto !important;
            font-size: 16px !important;
        }

.whatsapp.btn {
    left: 40px;
    z-index: 9999;
    font-size: 45px;
    position: fixed;
    color: #ffffff;
    bottom: 15px;
    background: #00e676;
    width: 70px;
    height: 70px;
    border-radius: 100%;
    line-height: 55px;
    border: 2px solid;
}
.dcheck label{
    font-size: 16px !important;
}
.dcheck input {
    font-size: 19px;
}
#myForm select{
    font-size: 19px!important;
    width: 100%;
    background: transparent;
    border: 0;
    border-bottom: 2px solid #000;
    font-size: 14px;
    padding: 6px 5px;
    color: #000 !important;
    font-weight: 700;
}
.banner-form {
    background: #e79339;
    padding: 10px 50px !important;
    height: auto;
}
.nav-area-full 
{
    height: 65px;
    overflow: hidden;
}
.chkboxfilter label {
    margin: 1px 0;
    font-size: 12px;
}
.chkboxfilter input {
    width: 30px;
    line-height: 20px;
    min-height: 20px;
    cursor: pointer;
    padding-left: 8px;
}
.chkboxfilter {
    margin: 20px 0;
}

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

@media only screen and (max-width: 767px){
.banner-form {
    padding: 10px 10px !important;
}
    .showfilter {
    width: 100%;}
}

body.main.modal-open {
overflow: hidden !important;
}

@media only screen and (max-width: 767px) {
    div#bannerModal .modal-dialog {
    top: 15% !important;
    }
}
</style>

<div class="modal fade" id="bannerModal" tabindex="-1" role="dialog" aria-labelledby="bannerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" style="top: 0">
    <div class="modal-content">
        <div class="modal-header bg-light">
        <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img style="width:100%" src="{{url('public/uploads/website/welcome_ad.jpg')}}">
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>

<section class="banner-form">
            <div class="container">
            {!! Form::open([ 'url' => 'hotels', 'id' => 'myForm']) !!}
            <div class="row">
            <div class="col-lg-3">
                <div class="dcheck">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <!-- <label>Check-In Check-Out Dates </label> -->
                    <input onkeydown="javascript: return false;" id='dt-range' type="text" name="daterange" autocomplete="off" value="" required=true />
                    <!-- <input type="text" name="saad"> -->
                </div>  
            </div>  
           <!--  <div class="col-lg-3">
                <div class="dcheck">
                <label>CHECK IN</label>
                <input class="date" type="date" name="CheckinDate" id="check_in" placeholder="Select Checkin date"  >
                </div>
            </div>
            <div class="col-lg-3">
                <div class="dcheck">
                <label>CHECK OUT</label>
                <input class="date" type="date" name="CheckoutDate" id="check_out" placeholder="Select Checkout date">
                </div>
            </div> -->
            <div class="col-lg-3">
                <div class="dcheck">
                <!-- <label>CITY</label> -->
                <select name="Cityname" class="">
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
                <div class="dcheck">
                    <!-- <input type="" name="saad"> -->
                    <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"  aria-haspopup="true" aria-expanded="false">
                        <span> <span id="spNum">2</span>
                        
                         <span id="spnOcup">  Occupants </span>
                        
                        </span> <!--.<span>0 Children</span> -->. <span> <span id="sprRm">1</span>
                        
                       <span id="spnRm"> Room </span>
                    
                    </span>
                      </button>

                       <div class="dropdown-menu showfilter">
                          <!-- <form class="px-4 py-3"> -->
                            <div class="form-group">
                              <label id="lblOccup" for="">Occupants</label>
                                    <div class="qty">
                                        <span class="minusadult bg-dark">-</span>
                                        <input type="number" class="countadult plusmiusbtns" name="adults" value="2" min=1 readonly>
                                        <span class="plusadult bg-dark">+</span>
                                    </div>
                            </div>

                            <!--<div class="form-group">
                              <label for="">Children</label>
                                    <div class="qty">
                                        <span class="minuschild bg-dark">-</span>
                                        <input type="number" class="countchild plusmiusbtns " name="children" value="0">
                                        <span class="pluschild bg-dark">+</span>
                                    </div>
                            </div> 
                                    -->
                            <div class="form-group">
                              <label id="lblRoom" for="">Room</label>
                                    <div class="qty">
                                        <span class="minusroom bg-dark">-</span>
                                        <input readonly type="number" class="countroom plusmiusbtns " name="rooms" value="1" min=1>
                                        <span class="plusroom bg-dark">+</span>
                                    </div>
                            </div> 
                            
                                   
                            <p class="para" style="font-size: 1.1rem;font-weight: bold;">An additional amount of PKR 500* will be charged for additional room occupant</p>
                            
                       
                          <div class="dropdown-divider"></div>
                          
                        </div>
                     
                    </div>
                </div>
            </div>


            <div class="col-lg-3">
                     <button id="btn_submit" type="button" class="btn-black m-auto d-table search-btn"><i class="icon-search"></i>Search now</a></button>
            </div>
            
           <div class="col-lg-6">
                 <div class="chkboxfilter">
                  <!--  <input type="checkbox" name=""><label>I'm travelling from work</label>-->
                </div> 
            </div> 

            </div>
            {!! FORM::close() !!}
            </div>
</section>

<div class="hslider hslider-home">
<div class="main-slides">
<div class="slide">
    <img  src="https://www.ktownrooms.com/resources/assets/web/img/slides/slide-01.jpg" style="height: 450px;"  alt=""/>
    <div class="slide-assets">
    <div class="container">
    <div class="slider-assets">
   
    <section class="eco-rooms">
        <div class="container align-self-center">
            <div class="eco-rooms-bg">
            <div class="row justify-content-center">
                <div class="col-md-7 align-self-center">
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
                <div class="col-md-5 align-self-center">
                <div class="price-start wow fadeInRight animated">
                <div class="z1">
                <h3 class="quicksand">Pocket <br><span>Stays</span></h3>
                </div>
                <div class="z2">
                <div class="absloute">
                <h4 class="quicksand">Starting</h4>
                <h5 class="quicksand">from</h5>
                <h2 class="quicksand">RS: 2500*</h2>
                <div class="per-night">Per Night</div>
                </div>
                </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    </div>


    </div>
    </div>
</div>

<div class="slide">
    <img  src="https://www.ktownrooms.com/resources/assets/web/img/slides/slide-03.jpg" style="height: 450px;"  alt=""/>

<div class="slide-assets">
        <div class="container p-5">
            <div class="slider-assets mid-slide">
                <div class="col-md-4">
                    <h3 class="wow fadeInUp animated slider-heading">Refine</h3></div>
                <div class="col-md-4">
                    <h3 class="wow fadeInUp animated slider-heading">Redefine</h3></div>
                <div class="col-md-4">
                    <h3 class="wow fadeInUp animated slider-heading">Reinventing</h3></div>
                <div class="col-md-12 text-center">
                    <h1 class="wow fadeIn animated" style="color: #ff7a23;"><strong>THE HOSPITALITY IN PAKISTAN</strong></h1>
                    <p class="fontlato wow fadeInUp animated text-dark" style="color: #fff !important;"><strong>Affordability. Standardization. Predictability. Classification.</strong></p>
                      


                </div>
                
            </div>
        </div>
    </div>
    <!--<div class="slide-assets">
    <div class="container">
    <div class="slider-assets slider-assets-feature-hotel">
        <!--<div class="col-md-6">-->
        <!--    <h1 class="wow fadeIn animated"><strong>Ktown's</strong> Featured <strong>Hotels.</strong></h1>-->
        <!--    <p class="fontlato wow fadeInUp animated">Affordability. Standardization. Predictability. Classification.</p>-->
              


        <!--</div>-->
        <!--<div class="col-md-3">-->
        <!--    <div class="boxHotel">-->
        <!--                <a href="https://www.ktownrooms.com/details/ktr-021-penthouse-islamabad-expressway-islamabad">-->
        <!--                <img title="https://www.ktownrooms.com/details/ktr-021-penthouse-islamabad-expressway-islamabad" src="https://www.ktownrooms.com/public/uploads/website/hotels/thumb/17_V57Xt.jpg">-->
        <!--                <div class="boxHotelDescrp">-->
        <!--                <h3>KTR 021 Penthouse, Isl..</h3>-->
        <!--                <p>This hotel is located near business hub of Karachi which is idol for business trips. It is surrounded by social and cultural activit...</p>-->
        <!--                </div>-->
        <!--                <div class="hotelprice">-->
        <!--                <h5>PKR : 15,000* /night</h5>-->
        <!--                </div>-->
        <!--                </a>-->
        <!--    </div>-->
        <!--</div>-->
        <!--<div class="col-md-3">-->
        <!--    <div class="boxHotel">-->
        <!--                <a href="https://www.ktownrooms.com/details/ktr-031-jhika-gali-murree">-->
        <!--                <img title="" src="https://www.ktownrooms.com/public/uploads/website/hotels/thumb/16_1m9gu.jpg">-->
        <!--                <div class="boxHotelDescrp">-->
        <!--                <h3>KTR 031 Jhika Gali, Murree</h3>-->
        <!--                <p>This hotel is located near business hub of Karachi which is idol for business trips. It is surrounded by social and cultural activit...</p>-->
        <!--                </div>-->
        <!--                <div class="hotelprice">-->
        <!--                <h5>PKR : 4,000* /night</h5>-->
        <!--                </div>-->
        <!--                </a>-->
        <!--    </div>-->
        <!--</div>-->
        
    <!--</div>-->



    <!--</div>-->
    <!--</div>-->
</div>

<div class="slide mbl-hide">
    <img  src="https://www.ktownrooms.com/resources/assets/web/img/slides/slide-3.jpg" style="height: 450px;"  alt=""/>


    <div class="slide-assets">
    <div class="container">
    <div class="slide-assets">
    <div class="container">
    <div class="slider-assets bookEasyContnt">
         <h2 class="wow fadeIn animated"><strong>Book Easy</strong></h2>
         <p class="fontlato wow fadeInUp animated">Follow Few Simple Steps</p>
        <div class="row">
            <ul class="book-ban-list unstyled hidden-sm-down bokEsyBoxSec">
                <li>
                    <img src="https://www.ktownrooms.com/resources/assets/web/img/bb-icon1.png" alt="*" class="">
                    <h3>Do your Research</h3>
                    <p>Research which property is the most suitable and convenient option for you</p>
                </li>
                <li>
                    <img src="https://www.ktownrooms.com/resources/assets/web/img/bb-icon2.png" alt="*" class="">
                    <h3>Choose your Room</h3>
                    <p>Pick up the room you want to stay at.</p>
                </li>
                <li>
                    <img src="https://www.ktownrooms.com/resources/assets/web/img/bb-icon3.png" alt="*" class="">
                    <h3>Book your Room</h3>
                    <p>Enter the details and reserve your room for the stay at hotels.</p>
                </li>
            </ul>
        </div>     
    </div>
    

    </div>
    </div>
    

    </div>
    </div>
</div>

</div>
<!-- <div class="slide-assets">
<div class="container">
<div class="slider-assets">
<h1 class="wow fadeIn animated"><strong>Pakistan‘s</strong> best <br>budget <strong>hotels.</strong></h1>
<p class="fontlato wow fadeInUp animated">Affordability. Standardization. Predictability. Classification.</p>
<img class="facilitiy-slider-image lozad" data-src="{{ url('resources/assets/web/img/slides/facilities-slider.png') }}">
</div>


</div>
</div> -->

<!-- <div class="slide-assets">
<div class="container">
<div class="slider-assets">
<h1 class="wow fadeIn animated"><strong>Pakistan‘s</strong> best <br>budget <strong>hotels.</strong></h1>
<p class="fontlato wow fadeInUp animated">Affordability. Standardization. Predictability. Classification.</p>
<img class="facilitiy-slider-image lozad" data-src="{{ url('resources/assets/web/img/slides/facilities-slider.png') }}">




</div>
</div>
</div> -->

</div>



<section class="hotel-list headingstyle">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="headingstyle1">
<h2 class="wow fadeInUp animated"><strong>Our</strong> Hotels</h2>
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
<h5>PKR : <?php echo number_format($hotel['SellingPrice'], 0); ?>*Rs /night</h5>
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
<section class="topdestinations hidden-sm-down hide">
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
<section class="eco-rooms hide">
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
<section class="testimonials hide">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="headingstyle1">
<h2 class="wow fadeInUp animated"><strong>Customer </strong>Reviews</h2>
</div>
</div>
</div>
<!-- <div class="row d-flex"> -->
<div class="row ">
<div class="col-md-6">
<div class="testi-tagline">
<h2 class="wow bounceInLeft animated">EVERY GREAT <strong>BUSINESS</strong> IS BUILT ON <span>FRIENDSHIP</span></h2>
</div>
</div>
<div class="col-md-6">
<div class="testimonials-slider">
 <?php
 foreach ($testimonials as $testimonial) {
                    echo "<div class='sliderBox'>";
                    echo "<h3>".$testimonial->Name."</h3>";
                    echo "<ul>
                            <li><i class='fa fa-star'></i></li>
                            <li><i class='fa fa-star'></i></li>
                            <li><i class='fa fa-star'></i></li>
                            <li><i class='fa fa-star'></i></li>
                            <li><i class='fa fa-star'></i></li>
                          </ul>";
                    // echo "<h3>...</h3>";
                    echo "<p>".$testimonial->Testimonial."</p>";
            
           
        echo "</div>";
            }
?>        

</div>
</div>
</div>
</div>
</section>
<section class="client-list headingstyle">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="headingstyle1" style="margin-bottom: 0;">
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


<script src="{{ url('resources/assets/web') }}/js/custom.js?rnd=<?php echo uniqid() ?>"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js?rnd=<?php echo uniqid() ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js?rnd=<?php echo uniqid() ?>"></script>
 <script src="{{ url('resources/assets/admin/') }}/plugins/datepicker/bootstrap-datepicker.js?rnd=<?php echo uniqid() ?>"></script>
<!-- <script src="{{ url('resources/assets/web') }}/js/jquery-1.11.2.min.js"></script> -->
<script src="{{ url('resources/assets/web') }}/js/jquery.mask.js?rnd=<?php echo uniqid() ?>"></script>

<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js?rnd=<?php echo uniqid() ?>"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js?rnd=<?php echo uniqid() ?>"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css?rnd=<?php echo uniqid() ?>" />





<style>

.ui-datepicker{width:26em}.form-control{height:33px!important;background:transparent!important;border-bottom:2px solid #000!important;font-size:14px!important;font-weight:700!important;border:1px solid #e79339!important}</style>
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
<script>

    // umer
    var counter = 1;

$(document).ready(function () {
$('#bannerModal').modal();
 var startDate;
 var endDate;
  $('input[name="daterange"]').daterangepicker({
     minDate:new Date(),
    opens: 'left'
  },

   function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            startDate = start;
            endDate = end;
            
    // console.log(startDate.format('D MMMM YYYY'));
  });
  
  $('.drp-selected').addClass('ml-auto');

   $('input[name="daterange"]').val('');
   $('input[name="daterange"]').attr("placeholder","Check-In - Check-Out");



    $('.search-btn').click(function () {
        // umer
        var v = $('#dt-range').val();

        if (v.split('-').length < 2) {
            $('#message-modal').html("Please select checkin & checkout date.");
            $('#myModal').modal();
            return;
        }

        var date1 = startDate;
        var date2 = endDate;

        var timeDiff = date2 - date1;

        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
        //  alert(diffDays);
        if (date1 == "" || date2 == "") {
            $('#message-modal').html("Please select checkin & checkout date.");
            $('#myModal').modal();
        } else if (diffDays < 1) {
            $('#message-modal').html("Please select valid checkout date.");
            $('#myModal').modal();
        }  else {

            localStorage.setItem("startDate", startDate);
            localStorage.setItem("endDate", endDate);
            localStorage.setItem("occupants", parseInt($(".countadult").val()));
            localStorage.setItem("room", parseInt($(".countroom").val()));


            $('#myForm').submit();
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

    // $('#myForm input').blur(function(){
    //     if((this).val()==""){
    //         $('.search-btn').attr('disabled',true);
    //     } else{
    //        $('.search-btn').removeAttr('disabled',false);
    //     }
    // });




        // $('.date').mask('mm/dd/yyyy');
        // $("#check_out").change(function ()
        //     {
        //         // alert("saad");
        //         var strtDate = document.getElementById("check_in").value;
        //         // console.log(strtDate);
        //         var endDate = document.getElementById("check_out").value;

        //         if ((Date.parse(strtDate) >= Date.parse(endDate))) 
        //         {
        //             alert("End date should be greater than Start date");
        //             document.getElementById("check_out").value = "";
        //         } 

        //     });

        // $("#check_in").change(function ()
        //     {
        //         // alert("saad");
        //         var strtDate = document.getElementById("check_in").value;
        //         // console.log(strtDate);
        //         var endDate = document.getElementById("check_out").value;

        //         if ((Date.parse(strtDate) >= Date.parse(endDate))) 
        //         {
        //             alert("End date should be greater than Start date");
        //             document.getElementById("check_out").value = "";
        //         } 
                       
        //     });

    // $('.search-btn').click(function () {
    //     var date1 = new Date($('#check_in').val());
    //     var date2 = new Date($('#check_out').val());
    //     var timeDiff = date2.getTime() - date1.getTime();
    //     var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
    //     alert(diffDays);
    //     if ($('#check_in').val() == "" || $('#check_out').val() == "") {
    //         $('#message-modal').html("Please select checkin & checkout date.");
    //         $('#myModal').modal();
    //     } else if (diffDays < 1) {
    //         $('#message-modal').html("Please select valid checkout date.");
    //         $('#myModal').modal();
    //     } /*else if ($('#check_in').val() >= $('#check_out').val()) {
    //         $('#message-modal').html("Please select valid Checkin & checkout date.");
    //         $('#myModal').modal();
    //     } */ else {
    //         $('#myForm').submit();
    //     }
    // });



});

$(document).ready(function(){
            $('.cancelBtn').removeClass('btn-default').addClass('btn-primary ml-0')
            // $('.count').prop('disabled', true);


            $(document).on('click','.applyBtn ',function(){
               
               // $('.showfilter').toggle();
            });



            $(document).on('click','.plusadult',function(){
                $('.countadult').val(parseInt($('.countadult').val()) + 1 );
                $("#spNum").html(parseInt($("#spNum").text()) +1);
                if(parseInt($("#spNum").text()) >1)
                {
                    $("#spnOcup").text('Occupants');
                    $("#lblOccup").text('Occupants')
                }
                else
                {
                    $("#spnOcup").text('Occupant');
                    $("#lblOccup").text('Occupant')
                }

                $("#sprRm").text(calculateRooms($("#spNum").text()));
                $(".countroom ").val(calculateRooms($("#spNum").text()));




              /*  working fine   var num = parseFloat($("#spNum").text()) / 5;
                var num2 = (parseInt($("#spNum").text()) / 5).toString().split('.')[0];
                
                debugger;
                if(parseInt($("#spNum").text()) > 5  &&  num.toString().indexOf(".") == 1 )
                {  
                    if(parseInt($("#spNum").text()) % 5 > 0 && parseInt(num2) == counter )
                    {
                        $('.countroom').val(parseInt($('.countroom').val()) + 1 );
                        $("#sprRm").html(parseInt($("#sprRm").text()) +1);
                        counter++;
                    }
                    
                }
                */

            });
            $(document).on('click','.minusadult',function(){
                $('.countadult').val(parseInt($('.countadult').val()) - 1 );

                if(parseInt($("#spNum").text()) >1)
                {
                $("#spNum").html(parseInt($("#spNum").text()) -1);
                $("#spnOcup").text('Occupants');
                $("#lblOccup").text('Occupants')
                }
                if(parseInt($("#spNum").text()) == 1)
                {
                    $("#spnOcup").text('Occupant');
                    $("#lblOccup").text('Occupant')
                }


                $("#sprRm").text(calculateRooms($("#spNum").text()));
                $(".countroom ").val(calculateRooms($("#spNum").text()));



                    if ($('.countadult').val() == 0) {
                        $('.countadult').val(1);
                    }
                });




            $(document).on('click','.pluschild',function(){
                $('.countchild').val(parseInt($('.countchild').val()) + 1 );
            });
            $(document).on('click','.minuschild',function(){
                $('.countchild').val(parseInt($('.countchild').val()) - 1 );

                    if ($('.countchild').val() == 0) {
                        $('.countchild').val(1);
                    }
                });



            $(document).on('click','.plusroom',function(){
                $('.countroom').val(parseInt($('.countroom').val()) + 1 );
                $("#sprRm").html(parseInt($("#sprRm").text()) +1);
                 
                if(parseInt($("#sprRm").text()) >1)
                {
                    $("#spnRm").text('Rooms');
                    $("#lblRoom").text('Rooms')
                }
                else
                {
                    $("#spnRm").text('Room');
                    $("#lblRoom").text('Room')
                }
            });
            
            $(document).on('click','.minusroom',function(){
                $('.countroom').val(parseInt($('.countroom').val()) - 1 );
                if(parseInt($("#sprRm").text()) >1)
                {
                $("#sprRm").html(parseInt($("#sprRm").text()) -1);

                $("#spnRm").text('Rooms');
                $("#lblRoom").text('Rooms')

                }
                $("#sprRm").text(calculateRooms($("#spNum").text()));
                $(".countroom ").val(calculateRooms($("#spNum").text()));

                if(parseInt($("#sprRm").text()) == 1)
                {
                    $("#spnRm").text('Room');
                    $("#lblRoom").text('Room')
                }

                    if ($('.countroom').val() == 0) {
                        $('.countroom').val(1);
                    }
                });

        });


$(document).ready(function(){
  $("#dropdownMenu2").click(function(){
    $(".showfilter").toggle();
  });

  $(document).click(function (e) {
        if (!$(e.target).closest('#dropdownMenu2, .showfilter').length) {
           $('.showfilter').hide();
        }
    });
});


function calculateRooms(occupants)
{  
    debugger;
    var rooms = 1;
    var num = parseInt(occupants)
   
        if (num< 6)
         return rooms = 1;
         

        if (num > 5 && num <11)
        return room =2;
        

         if ( num >10 &&  num < 16)
         return room = 3;
         

         if (num >15 &&  num < 21)
         return room = 4;
         


         if( num >20 &&   num < 26)
            return room = 5;
         

          if( num>25 &&  num < 31)
            return room = 6;
         

            if( num>30 &&  num< 36)
            return room = 7;
         

            if(  num> 35 &&   num< 41)
            return room = 8;
         

            if( num>40 &&  num< 46)
            return room = 9;
         


            if( num>45 && num< 51)
            return room = 10;
         
   
    return  rooms;

}

</script>

<script src="{{ url('resources/assets/web') }}/js/bootstrap-timepicker.js?rnd=<?php echo uniqid() ?>"></script>
<!-- <script>$(function(){$("#check_in").datepicker({minDate:0,dateFormat:"dd/mm/yy"});$("#check_out").datepicker({minDate:+1,dateFormat:"dd/mm/yy"})});$("input.date-pick").datepicker();$("input.time-pick").timepicker({minuteStep:15,showInpunts:false});var incrementPlus;var incrementMinus;var buttonPlus=$(".cart-qty-plus");var buttonMinus=$(".cart-qty-minus");var incrementPlus=buttonPlus.click(function(){var b=$(this).parent(".button-container").parent(".idcrement").find(".qty");b.val(Number(b.val())+1)});var incrementMinus=buttonMinus.click(function(){var c=$(this).parent(".button-container").parent(".idcrement").find(".qty");var d=Number(c.val());if(d>0){c.val(d-1)}});new WOW().init();</script> -->
@stop