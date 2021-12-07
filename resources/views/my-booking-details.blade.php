@extends('layouts.default')
@section('title', 'Booking History | Comfortable & stylish budget hotels in Pakistan') 
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
                   
                    <h3 class="p-0 fspx-22 fc-dark lh-xlarge">View My Booking </h3> 
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width:40%;">First Name:</th>
                                    <td>{{ $external_bookings->booking->invoice->customer_first_name}}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Last Name:</th>
                                    <td>{{ $external_bookings->booking->invoice->customer_last_name}}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Email:</th>
                                    <td>{{ $external_bookings->booking->invoice->customer_email}}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Cell:</th>
                                    <td>{{ $external_bookings->booking->invoice->customer_phone}}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Per Night Charges:</th>
                                    <td>{{ $external_bookings->booking->invoice->per_night_charges}}</td>
                                </tr>

                            </table>
                        </div>
                        
                        <div class="col-md-6">
                          
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width:40%;">Booking Total:</th>
                                    <td class="text-right">PKR {{ number_format($external_bookings->booking->invoice->total, 0) }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Discount:</th>
                                    <td class="text-right">PKR {{ number_format($external_bookings->booking->invoice->discount_amount, 0) }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Tax Name:</th>
                                    <td class="text-right">{{$external_bookings->booking->invoice->tax_name}}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Tax Charges:</th>
                                    <td class="text-right">PKR {{ number_format($external_bookings->booking->invoice->tax_charges, 0) }}</td>
                                </tr>

                                <tr>
                                    <th style="width:40%;">Net Total:</th>
                                    <td class="text-right">PKR {{ number_format($external_bookings->booking->invoice->net_total, 0) }}</td>
                                </tr>

                                <tr>
                                    <th style="width:40%;">Payment Amount:</th>
                                    <td class="text-right">PKR {{ number_format($external_bookings->booking->invoice->payment_amount, 0) }}</td>
                                </tr> 
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width:40%;">Hotel Name:</th>
                                    <td>{{ $external_bookings->booking->hotel->HotelName}}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Hotel Address:</th>
                                    <td>{{ $external_bookings->booking->hotel->Address}}</td>
                                </tr>
                   
                            </table>
                        </div>
                    </div>

                    <br>
                    
                   
                    <div class="row">
                        @if(count($external_bookings->booking->rooms) > 0)

                        <div class="col-md-6">
                            <table class="table table-bordered">
                            @foreach($external_bookings->booking->rooms as $external_room)
                                <tr>
                                    <th style="width:40%;">Room Title:</th>
                                    <td>{{ $external_room->room_title}}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Room Number:</th>
                                    <td>{{ $external_room->RoomNumber}}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Room Charges:</th>
                                    <td>{{ $external_room->RoomCharges}}</td>
                                </tr>
                            @endforeach
                            </table>
                        </div>
                        @endif

                        @if(count($external_bookings->booking->services) > 0)
                        <div class="col-md-6">
                            <table class="table table-bordered">
                            @foreach($external_bookings->booking->services as $external_service)
                                @if($external_service->status == 'completed')
                                <tr>
                                    <th style="width:40%;">Service Name:</th>
                                    <td class="text-right">{{ $external_service->service_name}}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Service Charges:</th>
                                    <td class="text-right">{{ $external_service->service_charges}}</td>
                                </tr>
                                
                                @endif
                            @endforeach
                            </table>
                        </div>
                        @endif 
                    </div>
                   
                    <!--
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
                                    /*
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
                                    } **/
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    -->
                </div>
            </div>
        </div>
         @include('includes/dashboard-right-sidebar')
    </div>
</section>
@stop