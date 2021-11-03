@extends('layouts.default')
@section('title', 'KTown Rooms | Pakistan Best Budget Hotels, Lowest Price Guaranteed') 
@section('description', 'Book budget hotels in Pakistan Starting PKR 2500+ Offering cheap hotels in 50+ cities across Pakistan, 1000 + AC rooms with breakfast, wifi, etc ✓pay at hotel')
@section('content')
@include('includes/payment-header')

<section class="book-content-main">
    <div class="container">
        {!! Form::open([ 'url' => 'book']) !!}
        <div class="row">
            <div class="col-lg-8">
                @include('includes/front_alerts')
                <div class="booking-left-content">
                    <h3>Your Details</h3>
                   <!--  <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p> -->
                    <div class="col-lg-11 p-0">
                        <?php
                        if (\Session::has('IsAdminCorporate') && \Session::get('IsAdminCorporate') == 1) {
                            ?>
                            <div class="book-easy-form row">
                                <div class="form-group col-lg-6">
                                    <label>First name</label>
                                    {!! Form::text('FirstName', \Session::get('FirstName'), ['class' => 'form-control', 'id' => 'FirstName']) !!}
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Last name</label>
                                    {!! Form::text('LastName', \Session::get('LastName'), ['class' => 'form-control', 'id' => 'LastName']) !!}
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Email</label>
                                    {!! Form::text('EmailAddress', \Session::get('EmailAddress'), ['class' => 'form-control', 'id' => 'EmailAddress']) !!}
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Cell</label>
                                    {!! Form::text('Cell', \Session::get('Cell'), ['class' => 'form-control', 'id' => 'Cell']) !!}
                                </div>
                            </div>
                            <?php } else { ?>
                            <div class="book-easy-form row">
                                <div class="form-group col-lg-6">
                                    <label>First name</label>
                                    {!! Form::text('FirstName', \Session::get('FirstName'), ['class' => 'form-control', 'id' => 'FirstName']) !!}
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Last name</label>
                                    {!! Form::text('LastName', \Session::get('LastName'), ['class' => 'form-control', 'id' => 'LastName']) !!}
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Email</label>
                                    {!! Form::text('EmailAddress', \Session::get('EmailAddress'), ['class' => 'form-control', 'id' => 'EmailAddress']) !!}
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Cell</label>
                                    {!! Form::text('Cell', \Session::get('Cell'), ['class' => 'form-control', 'id' => 'Cell']) !!}
                                </div>
                            </div>
                            <?php } ?>
                            <hr>
                            <h3 class="m-0">Add on to your booking</h3>
                            <p>- for a more comfortable experience:</p>

                            <div class="key-check" id="policy">
                                <label>
                                    <input id="policy_terms" name="PrivacyCheckbox" type="checkbox" value="1" style="position: absolute; opacity: 0;"><span class="label-text"></span>
                                    
                                    <img src="{{ url('resources/assets/web/img/check-pay-icon.png') }}" alt="*" class="cp-icon">
                                </label>
                                <p class="c-txt">I accept terms and conditions and general policy. <br></p>
                            </div>

                            <hr class="mb-50">
                            <button type="submit" class="btn-org d-inline">Book now</button>
                        
                    </div>

                </div>
            </div>
            <?php
                $Adults = 0;
                $Children = 0;
                $TotalGuests = 0;
                $TotalRooms = 0;
                $TotalNights = 0;
                $TotalCost = 0;
                if (\Session::has('RoomsCart') && count(\Session::get('RoomsCart')) > 0) {
                    foreach (\Session::get('RoomsCart') as $session) {
                        $Adults += $session['Adults'];
                        $Children += $session['Children'];
                        $TotalGuests += ($session['Adults'] + $session['Children']);
                        $TotalRooms += $session['Rooms'];
                        $TotalNights += $session['TotalNights'];
                        $TotalCost += $session['Total'];
                    }
                }
                ?>
            <div class="col-lg-4">
                <div class="booking-right-content">
                    <h3 class="sp-heading mb-15"><?php echo $session['HotelName']; ?></h3>
                    <p>Check-in: <?php echo date_format(date_create($session['HotelCheckInDate']), 'd-m-Y'); ?></p>
                    <p>Check-out: <?php echo date_format(date_create($session['HotelCheckOutDate']), 'd-m-Y'); ?></p>
                    <p class="pbpx-15"><?php echo $TotalNights ?> Night</p>

                    <p class="pbpx-15"><?php echo $TotalGuests ?> Guest &nbsp;&nbsp; <?php echo $TotalRooms ?> Room  <span>Rs: 4,600</span></p>

                    <?php
                        $PromoDiscount = 0;
                        if (\Session::has('PromoApplied')) {
                            $PromoDiscount = ($TotalCost * \Session::get('PromoDiscount') / 100);
                            ?>
                            <p class="fc-dark fw-semi-bold">Included</p>
                            <p class="pb-2">Promo Discount... <span>PKR <?php echo number_format($PromoDiscount, 0); ?></span></p>
                            <?php
                        }
                        ?>
                    <hr class="b-hr ">
                    <div class="mt-20">
                        <h3 class="sp-heading mb-15 float-left">Total</h3>
                        <div class="prc-box float-right text-right">
                            <h4><small>PRICE:</small>RS <?php echo number_format($TotalCost - $PromoDiscount, 0); ?></h4>
                            <!-- <span>/NIGHT</span> -->
                            <p>inclusive of all charges and fees</p>
                        </div>
                    </div>
                    <div class="btn-pay">
                        <a href="javascript:;" alt="*" class="check-icon mr-3">Pay With Credit Card</a>
                        <a href="javascript:;" alt="*" class="check-icon">Pay @ Hotel</a>
                    </div>
                    <!-- <a href="javascript:;" class="btn-org">Book Now</a> -->
                </div>
                <div class="info-bx">
                        <p class="ff-sec"><span class="icon-phone mr-1 "></span><?php echo "+92(311) 1222 418" ?></p>
                        <p class="ff-sec"><span class="icon-phone mr-1 "></span><?php echo $configuration->Contact1; ?></p>
                        <p><span class="icon-envelope2 mr-1"></span> {{ $emails->SupportEmail }}</p>
                </div>
            </div>
        </div>
        {!! FORM::close() !!}
    </div>
</section>


@stop
@section('myjsfile')

@stop