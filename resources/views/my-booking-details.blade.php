@extends('layouts.default')
@section('title', 'About us | Comfortable & stylish budget hotels in Pakistan') 
@section('description', 'Ktown Rooms is providing reasonable hospitality services across Pakistan. Our customers avail best services of hotels and guest houses at low prices guaranteed')
@section('content')
@include('includes/dashboard-header')
<section class="das-content w-100 ofh">
    <div class="row m-0">
        @include('includes/dashboard-left-sidebar')
        <div class="col-lg-6 p-0">
            <div class="das-main-content-area">
              <!-- <figure class="d-table m-auto mbpx-40" ><img src="assets/images/content-top-img.jpg" alt="*" /></figure>
              <hr> -->
                <div class="con-head prpx-10 plpx-10">
                    @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                        @php
                        Session::forget('error');
                        @endphp
                    </div>
                    @endif

                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                        Session::forget('success');
                        @endphp
                    </div>
                    @endif
                    <img src="{{ url('resources/assets/web') }}/img/dashboard/booking-icon.jpg" alt="*" class="float-left" />
                    <h3 class="p-0 fspx-22 fc-dark lh-xlarge">View My Booking (<?php echo ($booking->Status == 1 ? "Approved" : ($booking->Status == 2 ? "Declined" : ($booking->Status == 3 ? "Canceled" : "Pending"))); ?>)
                        <a href="<?php echo url('invoice/' . $booking->BookingID) ?>" class="btn btn-success btn-sm pull-right" target="_blank"><i class="fa fa-eye"></i> View Invoice</a>
                        <?php
                        if ($booking->Status == 0 || $booking->Status == 1) {
                            ?>
                            <a href="<?php echo url('cancel-booking/' . $booking->BookingID) ?>" class="btn btn-warning btn-sm pull-right" style="margin-right:12px;"><i class="fa fa-times"></i> Cancel Booking</a>
                            <?php
                        }
                        ?>
                    </h3>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width:40%;">First Name:</th>
                                    <td>{{ $booking->FirstName }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Last Name:</th>
                                    <td>{{ $booking->LastName }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Email:</th>
                                    <td>{{ $booking->Email }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Cell:</th>
                                    <td>{{ $booking->Cell }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width:40%;">Booking Total:</th>
                                        <td class="text-right">PKR {{ number_format($booking->BookingTotal, 0) }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:40%;">Discount:</th>
                                        <td class="text-right">PKR {{ number_format($booking->Discount, 0) }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:40%;">Promo Discount:</th>
                                        <td class="text-right">PKR {{ number_format($booking->PromoDiscount, 0) }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:40%;">Total Amount:</th>
                                        <td class="text-right">PKR {{ number_format($booking->TotalAmount, 0) }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Rooms</th>
                                        <th>Quantity</th>
                                        <th>Check in</th>
                                        <th>Check out</th>
                                        <th>Adults</th>
                                        <th>Children</th>
                                        <th>Discount</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (count($booking_hotels) > 0) {
                                        foreach ($booking_hotels as $hotel) {
                                            ?>
                                            <tr>
                                                <td>{{ $hotel->HotelName }}</td>
                                                <td>{{ $hotel->RoomQty }}</td>
                                                <td>{{ $hotel->CheckInDate }}</td>
                                                <td>{{ $hotel->CheckOutDate }}</td>
                                                <td>{{ $hotel->Adults }}</td>
                                                <td>{{ $hotel->Children }}</td>
                                                <td>{{ $hotel->Discount }}</td>
                                                <td>PKR {{ number_format($hotel->Total, 0) }}</td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         @include('includes/dashboard-right-sidebar')
    </div>
</section>
@stop