@extends('layouts.default')
@section('title', 'My Bookings | Comfortable & stylish budget hotels in Pakistan') 
@section('description', 'Ktown Rooms is providing reasonable hospitality services across Pakistan. Our customers avail best services of hotels and guest houses at low prices guaranteed')
@section('content')
@include('includes/dashboard-header')
<style type="text/css">
    .cnclbtn{
        background: red;
        color: #fff !Important;
        font-weight: 600;
        font-size: 12px;
        padding: 3px 5px;
    }
    .pndingBtn{
         background: #f39c12;
        color: #fff !Important;
        font-size: 12px;
        padding: 3px 5px;
    }
</style>
<section class="das-content w-100 ofh">
    <div class="row m-0">
        @include('includes/dashboard-left-sidebar')
        <div class="col-lg-6 p-0">
            <div class="das-main-content-area">
              <!-- <figure class="d-table m-auto mbpx-40" ><img src="assets/images/content-top-img.jpg" alt="*" /></figure>
              <hr> -->
                <div class="con-head prpx-10 plpx-10">
                    <img src="{{ url('resources/assets/web') }}/img/booking-icon.jpg" alt="*" class="float-left" />
                    <h3 class=" p-0 fspx-22 fc-dark lh-xlarge"> My Bookings</h3>
                   <!--  <p class="fspx-12">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p> -->
                </div>
                
                <table class="table mtpx-20 mbpx-20  paginated" >
                    <thead>
                        <tr>
                            <th scope="col">Booking No</th>
                            <th scope="col">Guest Name</th>
                            <th scope="col">Hotel Name</th>
                            <th scope="col">Booking From</th>
                            <th scope="col">Status</th>
                            <th scope="col">More Info</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        @if($external_bookings->totalRecords > 0)
                            @foreach($external_bookings->bookings as $external_booking)
                                @if (!empty($external_booking->booking_no)) 
                                    <tr>
                                        <td>{{$external_booking->booking_no}}</td>
                                        <td>{{$external_booking->customer_first_name}}</td>
                                        <td>{{$external_booking->HotelName}}</td>
                                        <td>{{date('d-m-Y H:i A', strtotime($external_booking->BookingFrom))}}</td>
                                        <td>{{$external_booking->status}}</td>
                                        <td><a href="{{ url('my-bookings/'.$external_booking->id) }}" class="btn btn-view btn-sm" ><i class="fa fa-eye"></i>View</a></td>
                                    </tr>
                                @endif
                        
                            @endforeach
                        @endif

                        {{--

                        @if(count($bookings)>0)   
                            @foreach($bookings as $booking)

                            
                        <tr>
                            <td>PKR {{number_format($booking->BookingTotal, 0)}}</td>
                            <td>PKR {{number_format($booking->Discount, 0)}}</td>
                            <td>PKR {{number_format($booking->PromoDiscount, 0)}}</td>
                            <td>PKR {{number_format($booking->TotalAmount, 0)}}</td>
                            <td>
                                @if($booking->Status == 1)
                                    <button type="button" class="btn btn-success">Approved</button>
                                @elseif($booking->Status == 2)
                                    <button type="button" class="btn btn-red">Declined</button>
                                @elseif($booking->Status == 3)
                                    <a class=" cnclbtn">Cancelled</a>
                                @else
                                    <a class="pndingBtn" >Pending</a>
                                @endif
                            </td>
                            <td>{{date('d-m-Y H:i A', strtotime($booking->DateAdded))}}</td>
                            <td><a href="{{ url('my-bookings/'.$booking->BookingID) }}" class="btn btn-view btn-sm" ><i class="fa fa-eye"></i>View</a></td>
                        </tr>
                            @endforeach
                        @endif
                        --}}
                    </tbody>
                </table>
                <div style="float:right;">
                    <?php echo $bookings->render(); ?>
                </div>    
            </div>
        </div>
         @include('includes/dashboard-right-sidebar')
    </div>
</section>
<style>
.btn-sm, .btn-group-sm>.btn {
    padding: 5px 10px;
    font-size: 12px;
    line-height: 1.5;
    border-radius: 3px;
}
.btn-view {
    color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;
}
</style>
@endsection