@extends('layouts.default')
@section('title', 'KTown Rooms | Order Summary') 
@section('description', 'Citytours - Premium site template for city tours agencies, transfers and tickets.')
@section('content')
@include('includes/payment-header')

<section class="book-content-main position-relative">
    <figure><img src="{{ url('resources/assets/web/img/k-bg.png') }}" alt="*" class="k-bg hidden-sm-down"></figure>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="booking-left-content">
                    <h3>Your Details</h3>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered <br> alteration in some form</p>
                    <div class="col-lg-11 p-0">
                        <?php
                        if (count($BookingHotels) > 0) {
                            foreach ($BookingHotels as $hotel) {
                                ?>
                                <ul class="your-detail-list unstyled mt-30">
                                    <li>{{ $hotel->HotelName }}</li>
                                    <li><span>Check In</span> {{ $hotel->CheckInDate }}</li>
                                    <li><span>Check Out</span> {{ $hotel->CheckOutDate }}</li>
                                    <li><span>Guests</span>{{ $hotel->Adults + $hotel->Children}}</li>
                                    <li><span>Total Rooms</span> {{ $hotel->RoomQty }}</li>
                                </ul>
                                <?php
                            }
                        }
                        ?>
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="h-auto booking-right-content tk">
                    <h3 class="sp-heading mb-30">Thank You !</h3>
                    <p class="mb-30">Your order submitted successfully,
                        we will confirm you availability soon.</p>

                    <a target="_blank" href="{{ url('invoice/'.$Booking->BookingID) }}" class="btn-org mb-30">View Your Invoice</a>
                    <div class="btn-pay">

                        <a href="javascript:;" alt="*" class="check-icon m-auto d-table">Pay @ Hotel</a>
                    </div>

                </div>
                <div class="info-bx">
                        <p>If you have any question please don‘t hesitate to contact us</p>
                        <p class="ff-sec"><span class="icon-phone mr-1 "></span><?php echo "+92(311) 1222 418" ?></p>
                        <p class="ff-sec"><span class="icon-phone mr-1 "></span><?php echo $configuration->Contact1; ?></p>
                        <p><span class="icon-envelope2 mr-1"></span> {{ $emails->SupportEmail }}</p>
                    </div>
            </div>
        </div>
    </div>
</section>

@stop
@section('myjsfile')

@stop