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
                <figure class="d-table m-auto mbpx-40" ><img src="{{ url('resources/assets/web') }}/img/dashboard/content-top-img.jpg" alt="*" /></figure>
                <hr>
                <div class="con-head prpx-10 plpx-10">
                    <img src="{{ url('resources/assets/web') }}/img/dashboard/booking-icon.jpg" alt="*" class="float-left" />
                    <h3 class=" p-0 fspx-22 fc-dark lh-xlarge"> My Bookings</h3>
                    <!-- <p class="fspx-12">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p> -->
                </div>

                <table class="table mtpx-20 mbpx-20">
                    <thead>
                        <tr>
                            <th scope="col">No of Rooms</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Hotel Name</th>
                            <th scope="col">Arrival</th>
                            <th scope="col">Departure</th>
                            <th scope="col">Member</th>
                            <th scope="col">Payment</th>
                        </tr>
                    </thead>
                    <tbody><?php
                        if (count($bookings) > 0) {
                            foreach ($bookings as $booking) {
                                ?>
                                <tr>
                                    <th scope="row">{{$booking->RoomQty}}</th>
                                    <td>{{$booking->FirstName}}</td>
                                    <td>{{$booking->cell}}</td>
                                    <td>{{$booking->HotelName}}</td>
                                    <td>{{date('d-m-Y', strtotime($booking->CheckInDate))}}</td>
                                    <td>{{date('d-m-Y', strtotime($booking->CheckOutDate))}}</td>
                                    <td>{{$booking->Adults + $booking->Children}}</td>
                                    <td>
                                        @if($booking->Status == 1)
                                        <button type="button" class="btn btn-success">Approved</button>
                                        @elseif($booking->Status == 2)
                                        <button type="button" class="btn btn-red">Declined</button>
                                        @elseif($booking->Status == 3)
                                        <button type="button" class="btn btn-primary">Cancel</button>
                                        @else
                                        <button type="button" class="btn btn-yellow">Pending</button>
                                        @endif
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <div style="float:right;">
                    <?php echo $bookings->render();  ?>
                </div>
            </div>
        </div>
        @include('includes/dashboard-right-sidebar')
    </div>
</section>
@stop