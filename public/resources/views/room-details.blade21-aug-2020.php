@extends('layouts.default')
@section('title', '' . e($details->MetaTitle) . '') 
@section('description', '' . e($details->MetaDescription) . '')
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('public/uploads/website/hotels/'.$details->Image) }});">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading wow fadeInDown animated"><?php echo $details->HotelName; ?>
                    <span class="mb-50"><?php echo $details->Address; ?></span>
                </h2>  
            </div>
        </div>
    </div> 
</section> 

<section class="exp-info-main rooms-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @include('includes/front_alerts')
                <div class="rooms-slider-for row">
                    <?php
                    if (count($Images) > 0) {
                        foreach ($Images as $img) {
                            ?>
                            <img alt="Image" class="img-fluid" src="{{ url('public/uploads/website/hotels/'.$img->Image) }}" 
                                 data-src="{{ url('public/uploads/website/hotels/'.$img->Image) }}" 
                                 data-small="{{ url('public/uploads/website/hotels/'.$img->Image) }}" 
                                 data-medium="{{ url('public/uploads/website/hotels/'.$img->Image) }}" 
                                 data-large="{{ url('public/uploads/website/hotels/'.$img->Image) }}" 
                                 data-retina="{{ url('public/uploads/website/hotels/'.$img->Image) }}">
                                 <?php
                                 if (trim($img->Title) != "") {
                                     ?>
                                <p class="sp-layer sp-white sp-padding" data-horizontal="40" data-vertical="100" data-show-transition="left" data-show-delay="200"><?php echo $img->Title ?></p>
                                <?php
                            }
                            if (trim($img->Description) != "") {
                                ?>
                                <p class="sp-layer sp-black sp-padding" data-horizontal="40" data-vertical="160" data-width="350" data-show-transition="left" data-show-delay="400"><?php echo $img->Description ?></p>
                                <?php
                            }
                            ?>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="rooms-slider-nav row">
                    <?php
                    if (count($Images) > 0) {
                        foreach ($Images as $img2) {
                            ?>
                            <img alt="Image" class="img-fluid" src="{{ url('public/uploads/website/hotels/'.$img2->Image) }}">
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="col-lg-4 pl-0">
                <div class="booking-right-content h-404 ptpx-10">
                    <div class="mt-20 h-55 tp-rat">
                        <!-- <h3 class="sp-heading mb-15 float-left">Total</h3> -->
                        <h5 class="ratg">{{$details->Rating}}<?php if($details->Rating == 5)echo ".0";else echo ".".rand(9,0);?></h5>
                        <h4>Very Good<!--<span>180 Reviews</span>--></h4>

                        <div class="prc-box float-right text-right mbpx-0">
                            <h4 class="ff-sec fspx-22"><small>PRICE: </small>Rs <?php echo number_format($details->SellingPrice, 0); ?></h4>
                            <span class="d-block fspx-12">/NIGHT</span>

                        </div>
                    </div>
                    <hr class="mtpx-0">

                    <div class="book-easy-form mtpx-10 mbpx-0 row">
                        <div class="form-group col-lg-6 mlpx-0 prpx-0">
                            {!! Form::text('CheckIn', $mCheckIn, ['placeholder' => 'Check in', 'class' => 'form-control', 'id' => 'check_in', 'data-date-format' => 'dd/mm/yyyy','autocomplete'=>'off']) !!}
                        </div>
                        <div class="form-group col-lg-6 plpx-0">
                            {!! Form::text('CheckOut', $mCheckOut, ['placeholder' => 'Check out', 'class' => 'form-control', 'id' => 'check_out', 'data-date-format' => 'dd/mm/yyyy','autocomplete'=>'off']) !!}
                        </div>
                        <?php if (!\Session::has('PromoApplied')) { ?>
                            <div class="form-group col-lg-6">
                                <div class="d-flex">
                                    <input type="text" id="PromoCode" class="form-control float-left" placeholder="Promo Code" name="PromoCode" autocomplete = "off">
                                    <button type="button" class="br-none fspx-12 btn-org plpx-0 prpx-0 ptpx-10 pbpx-10 fspx-10 w-50 apply_promo">Apply</button>
                                </div>
                            </div>
                        <?php } else {?>
                            <div class="form-group col-lg-6">
                                <div class="d-flex">
                                    
                                </div>
                            </div>
                        <?php } ?>
                        <div class="form-group col-lg-3 plpx-0">
                            {!! Form::text('Adults', $mAdults, ['class' => 'qty2 form-control', 'id' => 'Adults','placeholder' => 'Guest']) !!}
                        </div>
                        <div class="form-group col-lg-3 plpx-0">
                            {!! Form::text('Rooms', $mRooms, ['class' => 'qty2 form-control', 'id' => 'Rooms','placeholder' => 'Rooms']) !!}
                        </div>
                    </div>
                    <hr class="b-hr ">
                    <div class="form-group col-lg-6">
                        <div><p style="color: #e79339; margin: 0; font-size: 14px;" class="promo_msg"><?php echo (\Session::has('PromoApplied') ? \Session::get('PromoDiscount') . '% discount applied' : '') ?></p></div>
                    </div>
                    <div class="mt-10">
                        <!--<h3 class="sp-heading  float-left fspx-22">Total</h3>-->
                        <div class="prc-box float-right text-right mbpx-10">
                            <!--<h4 class="ff-sec fspx-22"><small class="fspx-12">PRICE: </small>RS <?php echo number_format($details->SellingPrice, 0); ?></h4>
                            <span class="fspx-12">/NIGHT</span>-->
                            <p class="fspx-12">including all taxes</p>
                        </div>
                    </div>
                    <button type="button" class="btn-org d-table fspx-12 ptpx-8 pbpx-8 mbpx-12 book-now-btn">Book now</button>
                    <div class="btn-pay">
                        <a href="javascript:;" alt="*" class="check-icon mr-3">Pay With Credit Card</a>
                        <a href="javascript:;" alt="*" class="check-icon">Pay @ Hotel</a>
                    </div>

                </div>
            </div>
        </div>
    </div> 
</section> 

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="inf-exp-left">
                <!--   <h5>dAY TRIP</h5> --><h5 class="ratg float-right fspx-10">Flag Ship</h5>
                <h3><?php echo $details->HotelName; ?></h3>
                <p><img src="{{ url('resources/assets/web') }}/img/loc-icon.png" alt="*"> <?php echo $details->Address; ?></p>
          <!--       <p><img src="assets/images/meal-icon.png" alt="*"> 6.5 hours total</p>
                <p><img src="assets/images/meal-icon.png" alt="*"> 1 meal, Snacks, Drinks and Transportation</p>
                <p><img src="assets/images/lang-icon.png" alt="*"> Offered in English</p> -->
            </div>
        </div>
    </div>
</div>
<section class="exp-main-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ">
                <div class="tbbs">
                    <ul class="tabs-custom-nav tabs-overview-nav unstyled">
                        <li class="current"><a href="#tab1">Details</a></li>
                        <!--<li><a href="#tab2">Reviews</a></li>-->
                        <li><a href="#tab3">Policies</a></li>
                    </ul>
                    <div class="tabs-custom general tabs-overview-content">
                        <div id="tab1" class="selected tab-content-panel">
                            <h3 class="tb-heading w-100"><strong>Available </strong> add-ons</h3>
                            <img src="{{ url('resources/assets/web') }}/img/adon-icon.png" alt="*" class="add-icon float-left mrpx-10 d-inline-block">
                            <p class="fspx-13 ">Free cancellation 2 days before check-in<br>
                                Already included in rate</p>
                            <h3 class="tb-heading"><strong>description</strong></h3>
                            <p><?php echo $details->Description; ?></p>
                             
                            <h3 class="tb-heading w-100"><strong>Room </strong> Features</h3>
                            
                            <ul class="rf-list w-100 mbpx-30 d-inline-block">
                                <?php
                                if (count($Services) > 0) {
                                    foreach ($Services as $ser) {
                                        ?>
                                        <li><img class="mrpx-10 d-inline-block" alt="<?php echo $ser->ServiceName; ?>" src="<?php echo url('public/uploads/website/services/' . $ser->Icon); ?>" /><?php echo $ser->ServiceName; ?></li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                           <?php /* 
                           <h3 class="tb-heading"><strong>Places </strong>of Interest</h3>
                            <ul class="tabs-custom-nav tb-inner-menu tabs-overview-nav  unstyled">
                                <li class="current"><a href="#tabb1">Details</a></li>
                                <li><a href="#tabb2">Reviews</a></li>
                                <li><a href="#tabb3">Policies</a></li>
                                <li class="float-right"><a href="javascript:;">Distance</a></li>
                            </ul>

                            <div class="tabs-custom general tb-inner tabs-overview-content">

                                <div id="tabb1" class="selected tab-content-panel">
                                    <ul>
                                        <li>Lorem Ipsum 1 <span class="float-right prpx-20">3.3 km</span></li>
                                        <li>Lorem Ipsum 1 <span class="float-right prpx-20">3.3 km</span></li>
                                        <li>Lorem Ipsum 1 <span class="float-right prpx-20">3.3 km</span></li>
                                        <li>Lorem Ipsum 1 <span class="float-right prpx-20">3.3 km</span></li>
                                        <li>Lorem Ipsum 1 <span class="float-right prpx-20">3.3 km</span></li>

                                    </ul>
                                </div>

                                <div id="tabb2" class=" tab-content-panel" style="display: none;">
                                    <ul>
                                        <li>Lorem Ipsum 2 <span class="float-right prpx-20">4.3 km</span></li>
                                        <li>Lorem Ipsum 2 <span class="float-right prpx-20">4.3 km</span></li>
                                        <li>Lorem Ipsum 2 <span class="float-right prpx-20">4.3 km</span></li>
                                        <li>Lorem Ipsum 2 <span class="float-right prpx-20">4.3 km</span></li>
                                        <li>Lorem Ipsum 2 <span class="float-right prpx-20">4.3 km</span></li>

                                    </ul>
                                </div>
                                <div id="tabb3" class=" tab-content-panel" style="display: none;">
                                    <ul>
                                        <li>Lorem Ipsum 3 <span class="float-right prpx-20">5.3 km</span></li>
                                        <li>Lorem Ipsum 3 <span class="float-right prpx-20">5.3 km</span></li>
                                        <li>Lorem Ipsum 3 <span class="float-right prpx-20">5.3 km</span></li>
                                        <li>Lorem Ipsum 3 <span class="float-right prpx-20">5.3 km</span></li>
                                        <li>Lorem Ipsum 3 <span class="float-right prpx-20">5.3 km</span></li>

                                    </ul>
                                </div>
                            </div>
                            */ ?>
                        </div>
                        <div id="tab2" class="tab-content-panel" style="display: none;">
                            <h3 class="tb-heading"><strong>Guest</strong> Reviews</h3>
                            <div class="review-area">
                                <input type="text" name="review" class="r-input" placeholder="Write Your Review Here ">

                                <div class="rating-overview">
                                    <h2>8.7<span>/10</span> <img src="{{ url('resources/assets/web') }}/img/rating-stars.png" alt="img-fluid">  <small>Score from 30 reviews</small></h2>
                                </div>
                                <div class="pagina list-wrapper ">
                                    <div class="review-box d-flex pagin">
                                        <div class="review-img">
                                            <img src="{{ url('resources/assets/web') }}/img/rv-img.png" alt="img-fluid">
                                        </div>
                                        <div class="review-content">
                                            <h3>Grace Wright</h3>
                                            <div class="d-flex stars">
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star "></span>
                                                <span class="icon-star "></span>
                                            </div>
                                            <h4>Best  experience ever !!!</h4>
                                            <p class="p-0 lh-med">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry..</p>

                                        </div>
                                    </div>

                                    <div class="review-box d-flex pagin">
                                        <div class="review-img">
                                            <img src="{{ url('resources/assets/web') }}/img/rv-img.png" alt="img-fluid">
                                        </div>
                                        <div class="review-content">
                                            <h3>Grace Wright</h3>
                                            <div class="d-flex stars">
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                            </div>
                                            <h4>Best  experience ever !!!</h4>
                                            <p class="p-0 lh-med">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry..</p>

                                        </div>
                                    </div>

                                    <div class="review-box d-flex pagin">
                                        <div class="review-img">
                                            <img src="{{ url('resources/assets/web') }}/img/rv-img.png" alt="img-fluid">
                                        </div>
                                        <div class="review-content">
                                            <h3>Grace Wright</h3>
                                            <div class="d-flex stars">
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star "></span>
                                            </div>
                                            <h4>Best  experience ever !!!</h4>
                                            <p class="p-0 lh-med">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry..</p>

                                        </div>
                                    </div>


                                    <div class="review-box d-flex pagin">
                                        <div class="review-img">
                                            <img src="{{ url('resources/assets/web') }}/img/rv-img.png" alt="img-fluid">
                                        </div>
                                        <div class="review-content">
                                            <h3>Grace Wright</h3>
                                            <div class="d-flex stars">
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star "></span>
                                            </div>
                                            <h4>Best  experience ever !!!</h4>
                                            <p class="p-0 lh-med">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry..</p>

                                        </div>
                                    </div>


                                    <div class="review-box d-flex pagin">
                                        <div class="review-img">
                                            <img src="{{ url('resources/assets/web') }}/img/rv-img.png" alt="img-fluid">
                                        </div>
                                        <div class="review-content">
                                            <h3>Grace Wright</h3>
                                            <div class="d-flex stars">
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star "></span>
                                            </div>
                                            <h4>Best  experience ever !!!</h4>
                                            <p class="p-0 lh-med">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry..</p>

                                        </div>
                                    </div>

                                    <div class="review-box d-flex pagin">
                                        <div class="review-img">
                                            <img src="{{ url('resources/assets/web') }}/img/rv-img.png" alt="img-fluid">
                                        </div>
                                        <div class="review-content">
                                            <h3>Grace Wright</h3>
                                            <div class="d-flex stars">
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star "></span>
                                            </div>
                                            <h4>Best  experience ever !!!</h4>
                                            <p class="p-0 lh-med">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry..</p>

                                        </div>
                                    </div>

                                    <div class="review-box d-flex pagin">
                                        <div class="review-img">
                                            <img src="{{ url('resources/assets/web') }}/img/rv-img.png" alt="img-fluid">
                                        </div>
                                        <div class="review-content">
                                            <h3>Grace Wright</h3>
                                            <div class="d-flex stars">
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star "></span>
                                            </div>
                                            <h4>Best  experience ever !!!</h4>
                                            <p class="p-0 lh-med">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry..</p>

                                        </div>
                                    </div>

                                    <div class="review-box d-flex pagin">
                                        <div class="review-img">
                                            <img src="{{ url('resources/assets/web') }}/img/rv-img.png" alt="img-fluid">
                                        </div>
                                        <div class="review-content">
                                            <h3>Grace Wright</h3>
                                            <div class="d-flex stars">
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star "></span>
                                            </div>
                                            <h4>Best  experience ever !!!</h4>
                                            <p class="p-0 lh-med">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry..</p>

                                        </div>
                                    </div>

                                    <div class="review-box d-flex pagin">
                                        <div class="review-img">
                                            <img src="{{ url('resources/assets/web') }}/img/rv-img.png" alt="img-fluid">
                                        </div>
                                        <div class="review-content">
                                            <h3>Grace Wright</h3>
                                            <div class="d-flex stars">
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star "></span>
                                            </div>
                                            <h4>Best  experience ever !!!</h4>
                                            <p class="p-0 lh-med">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry..</p>

                                        </div>
                                    </div>

                                    <div class="review-box d-flex pagin">
                                        <div class="review-img">
                                            <img src="{{ url('resources/assets/web') }}/img/rv-img.png" alt="img-fluid">
                                        </div>
                                        <div class="review-content">
                                            <h3>Grace Wright</h3>
                                            <div class="d-flex stars">
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star fc-org"></span>
                                                <span class="icon-star "></span>
                                            </div>
                                            <h4>Best  experience ever !!!</h4>
                                            <p class="p-0 lh-med">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry..</p>

                                        </div>
                                    </div>


                                </div>
                                <p id="pagination-here"></p>
                            </div>


                        </div>
                        <div id="tab3" class="tab-content-panel" style="display: none;">
                            <h3 class="tb-heading"><strong>Hotel</strong> Policies</h3>

                            <p>
                                No variations or violations will be permitted in the following policies; strict actions will be taken against the guests in case of violations.<br><br>
                                Please present valid ID (CNIC or passport) at the time of check-in. (Please note failure to do so may result in cancellation of your reservation)<br><br>
                                Check-in time is from 12 PM until 11 AM. Late check-in is not possible.<br><br>
                                Advance Payment of (50%) will be made at the time of check in.<br><br>
                                There is private parking lot available on the location/There is no private parking lot available on the location (According to the location)<br><br>
                                Free Cancellation for 48 hours.<br><br>
                                Management is not responsible for any loss of valuable items or cash if it is not submitted to the management.<br><br>
                                Guests who are above 18 years are eligible for the reservation.<br>
                                No charges will be applied to children under 5 years; however, charges will be applied for the request of extra mattress.<br><br>
                                Unmarried couples are strictly not allowed. (Please present valid documents e.g. marriage certificate, NIC upon check-in)<br><br>
                                Individuals are not allowed to visit the guests in the room. (Facility of lobby has been provided by the management)<br><br>
                                Pets and smoking are strictly not allowed<br><br>
                                Parties and other gatherings are not allowed within the premises of hotels.

                            </p>
                        </div> 
                    </div>     
                </div>
                <div class="custom-heading mb-50 ">
                    <h3>Similar <strong>Rooms</strong>
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>


                <div class="row box-hotel-main sliderxs">
                    <?php
                    if (count($hotels) > 0) {
                        foreach ($hotels as $hotel) {
                            ?>
                            <div class="col-lg-4">
                                <div class="box-hotel-2">
                                    <a href="{{ url('details/'.$hotel->Slug) }}">
                                        <img src="{{ url('public/uploads/website/hotels/thumb/'.$hotel->Thumbnail) }}" class="imx">
                                        <div class="boxHotelDescrp">
                                            <!--<small>Lorem Ipsum I Muspl Merol</small>-->
                                            <h3>{{str_limit($hotel->HotelName, $limit = 15, $end = '...')}}</h3>
                                            <p class="mb-lg-2"><?php echo str_limit($hotel->Description, $limit = 100, $end = '...'); ?></p>
                                            <p class="rating">{{$hotel->Rating}}<?php if($hotel->Rating == 5)echo ".0";else echo ".".rand(9,0);?> <img src="{{ url('resources/assets/web') }}/img/star-icon.png" alt="*"></p>
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

            <div class="col-lg-4">
                <div class="info-bx mtpx-36">
                    <p>If you have any query please contact us at </p>
                    <a href="tel:{{ $configuration->Contact1 }}"><p class="ff-sec"><span class="icon-phone mr-1"></span>{{ $configuration->Contact1 }}</p></a>
                    <!-- <a href="tel:{{ $configuration->Contact2 }}"><p class="ff-sec"><span class="icon-phone mr-1"></span>{{ $configuration->Contact2 }}</p></a> -->
                    <a href="mailto:{{ $emails->SupportEmail }}"><p><span class="icon-envelope2 mr-1"></span> {{ $emails->SupportEmail }}</p></a>
                </div>

                <!--<div class="info-bx mtpx-30">
                    <p>Keep in Mind</p>
                    <ul>
                        <li>+ Cancellation policy</li>
                        <li>Guests can check in using any local or outstation ID proof (PAN card not accepted).</li>
                        <li>Couples are welcome</li>
                    </ul>
                </div>
                <a href="javascript:;" class="fspx-14 text-uppercase fw-bold fc-org m-auto d-inline-block text-center w-100 mtpx-10">Terms and Conditions</a>-->
            </div>
        </div>
    </div>
</section>

@stop
@section('myjsfile')
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" type="text/css" media="all">
<script src="{{ url('resources/assets/web') }}/js/custom.js"></script>
<script src="{{ url('resources/assets/web') }}/js/jquery.mask.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src="{{ url('resources/assets/web') }}/assets/validate.js"></script>

<style>
    .ui-datepicker {
        width: 23em;
    }
</style>
<!-- masking code -->
<script type="text/javascript">
    $(document).ready(function()
    {
        $('.hasDatepicker').mask('00/00/0000');
    })
</script>

<script>
    
$("#check_in").datepicker(
        {
            minDate: 0,
            dateFormat: "dd/mm/yy"
        }).val();
$("#check_out").datepicker(
        {
            minDate: +1,
            dateFormat: "dd/mm/yy"
        }).val();
        
var incrementPlus;
var incrementMinus;

var buttonPlus = $(".cart-qty-plus");
var buttonMinus = $(".cart-qty-minus");

var incrementPlus = buttonPlus.click(function () {
    var $n = $(this)
            .parent(".button-container")
            .parent(".idcrement")
            .find(".qty");
    $n.val(Number($n.val()) + 1);
});

var incrementMinus = buttonMinus.click(function () {
    var $n = $(this)
            .parent(".button-container")
            .parent(".idcrement")
            .find(".qty");
    var amount = Number($n.val());
    if (amount > 0) {
        $n.val(amount - 1);
    }
});

// wow start
new WOW().init();
// wow end

</script>
<script>
    $(document).ready(function () {
        $('.apply_promo').click(function () {
            $('.apply_promo').attr('disabled', 'disabled');
            $.ajax({
                type: "POST",
                url: "{{ url('apply_promo') }}",
                'headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                dataType: "JSON",
                data: {'PromoCode': $('#PromoCode').val()},
                success: function (data) {
                    if (data.error) {
                        $('#message-modal').html(data.message);
                        $('#myModal').modal();
                        //alert(data.message);
                    } else {
                        $('.promo_msg').text(data.message);
                        $('.promo_container').remove();
                    }
                },
                complete: function () {
                    $('.apply_promo').removeAttr('disabled');
                }
            });
        });

        $('.book-now-btn').click(function () {
            $('.book-now-btn').attr('disabled', 'disabled');
            $.ajax({
                type: "POST",
                url: "{{ url(Request::path()) }}",
                'headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                dataType: "JSON",
                data: {'CheckIn': $('#check_in').val(), 'CheckOut': $('#check_out').val(), 'Adults': $('#Adults').val(), 'Children': '0', 'Rooms': $('#Rooms').val()},
                success: function (data) {
                    if (data.error) {
                        $('#message-modal').html(data.message);
                        $('#myModal').modal();
                        //alert(data.message);
                    } else {
                        
                        window.location.href = '{{ url("cart") }}';
                        $('.promo_msg').text(data.message);
                        $('.promo_container').remove();
                    }
                },
                complete: function () {
                    $('.book-now-btn').removeAttr('disabled');
                }
            });
        });
    });
</script>

@stop