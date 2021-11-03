@extends('layouts.default')
@section('title', 'About us | Comfortable & stylish budget hotels in Pakistan') 
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
                            <th scope="col">Booking Total</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Promo Discount</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">Status</th>
                            <th scope="col">Booked on</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
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