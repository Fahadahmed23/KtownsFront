@extends('layouts.default')
@section('title', 'KTown Rooms | Pakistan Best Budget Hotels, Lowest Price Guaranteed') 
@section('description', 'Book budget hotels in Pakistan Starting PKR 2500+ Offering cheap hotels in 50+ cities across Pakistan, 1000 + AC rooms with breakfast, wifi, etc ✓pay at hotel')
@section('content')
@include('includes/payment-header')

<section class="book-content-main">
    <div class="container">
        <?php
        if (\Session::has('RoomsCart') && count(\Session::get('RoomsCart')) > 0) {
            $Adults = 0;
            $Children = 0;
            $TotalGuests = 0;
            $TotalRooms = 0;
            $TotalNights = 0;
            $TotalCost = 0;
            ?>
            <div class="row">
                <div class="col-lg-8">

                    <div class="booking-left-content">
                        <table class="table table-condensed book-detail-tbl">
                            <thead>
                                <tr>
                                    <th>ROOMS</th>
                                    <th>NO. OF ROOMS</th>
                                    <th>NO. OF GUESTS</th>
                                    <th>DIS</th>
                                    <th>TOTAL</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach (\Session::get('RoomsCart') as $session) {
                                    $Adults += $session['Adults'];
                                    $Children += $session['Children'];
                                    $TotalGuests += ($session['Adults'] + $session['Children']);
                                    $TotalRooms += $session['Rooms'];
                                    $TotalNights += $session['TotalNights'];
                                    $TotalCost += $session['Total'];
                                    ?>
                                    <tr>
                                        <td>
                                            <img src="{{ url('public/uploads/website/hotels/thumb/'.$session['Thumbnail']) }}" alt="<?php echo $session['HotelName']; ?>" class="hidden-sm-down float-md-left img-fluid">
                                            <p><?php echo $session['HotelName']; ?><span><?php echo $session['HotelClass']; ?></span><p>
                                        </td>
                                        <td><?php echo $session['Rooms']; ?></td>
                                        <td><?php echo ($session['Adults'] + $session['Children']); ?></td>
                                        <td>0%</td>
                                        <td>PKR <?php echo number_format($session['Total'], 0); ?></td>
                                        <td>
                                            <a href="{{ url('remove-item/'.$session['HotelID']) }}" class="mr-2"> <img src="{{ url('resources/assets/web/img/delete-icon.png') }}" alt="*" class="img-fluid"></a>
                                            <a href="{{ url('details/'.$session['Slug']) }}"><img src="{{ url('resources/assets/web/img/edit-icon.png') }}" alt="*" class="img-fluid"></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>    
                            </tbody>
                        </table>

                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="booking-right-content">
                        <h3 class="sp-heading mb-15"><?php echo $session['HotelName']; ?></h3>
                        <p>Check-in: <?php echo date_format(date_create($session['HotelCheckInDate']), 'd-m-Y'); ?></p>
                        <p>Check-out: <?php echo date_format(date_create($session['HotelCheckOutDate']), 'd-m-Y'); ?></p>
                        <p class="pbpx-15"><?php echo $TotalNights ?> Night</p>

                        <p class="pbpx-15"><?php echo $TotalGuests ?> Guest &nbsp;&nbsp; <?php echo $TotalRooms ?> Room  <span class="ff-sec">Rs: <?php echo number_format($TotalCost, 0) ?></span></p>

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
                                <h4 class="ff-sec"><small>PRICE:</small><?php echo number_format($TotalCost - $PromoDiscount, 0); ?></h4>
                                <span>/NIGHT</span>
                                <p>inclusive of all charges and fees</p>
                            </div>
                        </div>
                        <div class="btn-pay">
                            <a href="javascript:;" alt="*" class="check-icon mr-3">Pay With Credit Card</a>
                            <a href="javascript:;" alt="*" class="check-icon">Pay @ Hotel</a>
                        </div>
                        <a href="{{ url('payment') }}" class="btn-org">Check out</a>
                    </div>
                    <div class="info-bx">
                        <p>If you have any question please don‘t hesitate to contact us</p>
                        <p class="ff-sec"><span class="icon-phone mr-1 "></span><?php echo "+92(311) 1222 418" ?></p>
                        <p class="ff-sec"><span class="icon-phone mr-1 "></span><?php echo $configuration->Contact1; ?></p>
                        <p><span class="icon-envelope2 mr-1"></span> {{ $emails->SupportEmail }}</p>
                    </div>
                </div>
            </div>
            <?php
        } else {
            echo '<center><h3>Cart is empty</h3></center>';
            echo '<center><h5 style="margin-bottom:200px;"><a href="' . url('hotels') . '">Continue Booking</a></h5></center>';
        }
        ?>
    </div>
</section>

@stop
@section('myjsfile')

@stop