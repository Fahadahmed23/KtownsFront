@extends('layouts.default')
@section('title', '' . e($details[0]->MetaTitle) . '') 
@section('description', '' . e($details[0]->MetaDescription) . '')
@section('content')
<?php
use Illuminate\Support\Facades\Input;
?>
<style type="text/css">
.modal-dialog{
    top:20px;
    
}
.modal-dialog .modal-body{
    height:85vh;
    overflow-y:auto;
}

#exampleModal .modal-dialog .modal-body{
    height:auto;
    overflow-y:hidden;
}

.booking-right-content p span {
    float: none;
}
.bkng-tbl tr th:first-child, .bkng-tbl tr td:first-child{
    max-width: 250px;
}
/*.bkng-tbl tr td:nth-child(odd), .bkng-tbl tr th:nth-child(odd){
    background-color: rgb(231 147 57 / 23%);
}
.bkng-tbl tr td:nth-child(even), .bkng-tbl tr th:nth-child(even){
    background-color: rgb(0 123 255 / 14%);
}*/
.r-facilities{
    max-width: 150px;
} 
.pbpx-15 .rooms, .pbpx-15 .guest {
    display: block;
}
.booking-right-content p{
    padding:0 !important;
}
span.total {
    font-size: 25px;
}
.prc-box {
    margin-bottom: 10px;
}
.btn-pay { 
    margin-bottom: 10px;
}

.booking-right-content {
    height: auto;
}
.imgsec {
    width: 100%;
    float: left;
}
.imgsec img{
    width: 100%;
    float: left;
    height: 250px;
}
.textsec {
    width: 100%;
    float: left;
}
.termsNconditons {
    width: 100%;
    height: 200px;
    overflow: scroll;
}
p.c-txt {
    color: #8f8f8f;
    line-height: 1.2;
    display: inline-block;
    position: relative;
    top: 5px;
    left: 5px;
}
.key-check label{
    width: 0;
}
.key-check h4{
    font-size: 20px;
    font-weight: 700;
}
.badge{
    font-size: 100%;
}
</style>



{!! Form::open([ 'url' => 'book']) !!}

<div class="modal fade" id="inputValidation" tabindex="-1" role="dialog" aria-labelledby="myReviewLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Error</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" style="height: 224px;">

                <div id="message">
                @include('includes/front_alerts') 
                </div>
                <div class="text-center">
                    <button type="button" class="btn_1" data-dismiss="modal" aria-label="Close">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModalCheckInCheckOut" tabindex="-1" role="dialog" aria-labelledby="myReviewLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="height:150px;">
            <div class="modal-header">
                <h4>Error</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" style="height: 224px;">
 <p>
                <div id="messageCheckInCheckout">
                </div>
                <p>
                <div class="text-center">
                    <button type="button" class="btn_1" data-dismiss="modal" aria-label="Close">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="exp-info-main rooms-main">
    <div class="container-wrap px-5">
        <div class="row">
            <div class="col-lg-6">
                <!-- @include('includes/front_alerts') -->
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
            <div class="col-lg-6"> 
            
                        <div class="txtcol">
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
                                    {!! Form::text('Cell', \Session::get('Cell'), ['class' => 'form-control', 'id' => 'Cell' , 'placeholder'  => '(92)-3xx-xxxxxxx']) !!}
                                </div>
                                <div>
                                <input type="hidden" name="hdnTotalCost" id="hdnTotalCost">
                                <input type="hidden" name="hdnTotalRoom" id="hdnTotalRoom">
                                </div>
                            </div>   
                        </div>                          
                        <div class="btn-pay">
                            <a href="javascript:;" alt="*" class="check-icon mr-3">Pay With Credit Card</a>
                            <a href="javascript:;" alt="*" class="check-icon">Pay @ Hotel</a>
                        </div>                      
                             <hr class="mb-50" style="margin-bottom: 10px;">
                                <input type="checkbox" name="PrivacyCheckbox" style="float: left;width: 25px;margin: 15px  0 25px 0;">
                               
                                <a href="javascript:;" alt="*"  class="exampleModal check-icon">I accept terms and conditions and general policy.</a>
                                
                        <!-- <button type="submit" class="btn-org d-inline">Book now</button> -->
                        
                        <!-- <a href="{{ url('payment') }}" class="btn-org">Check out</a> -->
                   
           
            </div>          
        </div>
    </div> 
</section> 
<!-- Create a Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $details[0]->HotelName; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img style="width:100%" src="{{url('public/uploads/website/hotels')}}/<?php echo $details[0]->MapImage ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="inf-exp-left">
                <!--   <h5>dAY TRIP</h5> --><h5 class="ratg float-right fspx-10">FlagShip</h5>
                <h3><?php echo $details[0]->HotelName; ?></h3>
                <p><img src="{{ url('resources/assets/web') }}/img/loc-icon.png" alt="*"><a data-toggle="modal" data-target="#exampleModal"><?php echo $details[0]->Address; ?></a></p>
          </div>
        </div>
    </div>
</div>
<section class="exp-main-content">
    <div class="container">
     <div class="row">
     <div class="col-lg-12 pl-0">
                <div class="table-responsive">
                    <table class="table bkng-tbl table-bordered">
                   
                        <thead>
                            <tr>
                                <th style="min-width: 150px;">Room type</th>
                                <td>Customer Detail </td>
                                <th>Sleeps</th>
                                <th>Price for {{ $nights }}  nights</th>
                                <th>Your choices</th>
                                <th>Rooms</th>
                                <th style="min-width: 150px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter =0; $row_no = 0; $NoOfRooms = \Session::get("SelectedRoom");  \Session::forget('SelectedRoom');?>
                           
                            @foreach($detailsChild as $detailChild)
                            <tr>
                                <td>
                                    <h3>{{$detailChild->room_type_name}}</h3>
                                    <span class="badge badge-success">{{$detailChild->room_type_description}} </span>
                                    <input type="hidden" name="roomTypeName[]" value ="{{$detailChild->room_type_name}}" >
                                    <input type="hidden" name="PartnerPrice[]" value ="{{$detailChild->PartnerPrice}}" >
                                    <input type="hidden" name="SellingPrice[]" value ="{{$detailChild->SellingPrice}}" >
                                    <input type="hidden" name="HotelID[]" value ="{{$detailChild->HotelID}}" >
                                    <input type="hidden" name="HotelName[]" value ="{{$detailChild->HotelName}}" >
                                    <input type="hidden" name="room_type_name[]" value ="{{$detailChild->room_type_name}}" >
                                    <p>{{$detailChild->beds_information}} 
                                     <img src="{{url('public/uploads/website/beds/' . $detailChild->beds_image)}}" style="width: 24px;"> 

                                        <!-- <i class="icon-bed2"></i> <i class="icon-bed2"></i> -->
                                    </p>
                                    <div class="col-12 mr-0">
                                        <div class="row">
                                            @foreach($Services as $service)
                                                <div class="col-md-6 my-1 px-0 r-facilities">
                                                    <img src="{{url('public/uploads/website/services/' . $service->Icon)}}" style="width: 24px;"> 
                                                     {{$service->ServiceName}}
                                                </div>
                                            @endforeach
                                            </div>
                                    </div>
                                </td>
                                <td>
                        <div class="txtcol">
                            
                            <p >Check-in: <span class="mChkin"></span> </p>
                            <p >Check-out: <span class="mChkOut"></span></p>
                            
                            </div>
                                </td>
                                <td>
                                    <span class="d-flex">

                                        @for($i = 0; $i < $detailChild->adults_sleep; $i++)
                                        <i class="icon-user" style="font-size:16px;"> </i> 
                                        @endfor
                                        <small class="mr-1 ml-1">+</small>
                                        @for($i = 0; $i < $detailChild->children_sleep; $i++)
                                        <i class="icon-user" style="font-size:12px;"> </i> 
                                        @endfor
                                    </span>
                                </td>
                                <td>
                                    <h3>PKR  <span class="spnPrice">{{number_format($detailChild->SellingPrice * $nights, 0)}}</span></h3>
                                    <input type="hidden" class="hdnPrice" value = "{{number_format($detailChild->SellingPrice * $nights, 0)}}">
                                    <p><strong>Included: </strong>Breakfast</p>
                                    <!-- <p><strong>Excluded: </strong>13 % Tax</p> -->
                                </td>
                                <td>
                                    <p><img src="{{ url('resources/assets/web') }}/img/breakfast.png" style="width: 24px;"> <strong>Good Breakfast</strong> Included</p>
                                    <p><i class="icon-checkmark4"></i> <strong>Total cost to cancel</strong></p>
                                    <p><i class="icon-checkmark4"></i> <strong>NO PREPAYMENT NEEDED </strong>– pay at the property</p>
                                </td>
                                <td>
                                   
                                    <!-- <span class="badge badge-secondary" style="font-size:14px">
                                    {{ Session::has('rooms') ? Session::get('rooms') :$mRooms }}
                                    </span> -->
                                   
                                    <select class="form-group NoOfRooms" name="NoOfRooms[]">
                                    <option value="0">-- Select --</option>
                                    <option value="1" <?php if(!empty($NoOfRooms)) if("1" == $NoOfRooms[$row_no]) echo "selected"; ?>>1 PKR {{number_format($detailChild->SellingPrice * $nights*1, 0)}}</option>
                                    <option value="2" <?php if(!empty($NoOfRooms)) if("2" == $NoOfRooms[$row_no]) echo "selected"; ?>>2 PKR {{number_format($detailChild->SellingPrice * $nights*2, 0)}}</option>
                                    <option value="3" <?php if(!empty($NoOfRooms)) if("3" == $NoOfRooms[$row_no]) echo "selected"; ?>>3 PKR {{number_format($detailChild->SellingPrice * $nights*3, 0)}}</option>
                                    <option value="4" <?php if(!empty($NoOfRooms)) if("4" == $NoOfRooms[$row_no]) echo "selected"; ?>>4 PKR {{number_format($detailChild->SellingPrice * $nights*4, 0)}}</option>
                                    <option value="5" <?php if(!empty($NoOfRooms)) if("5" == $NoOfRooms[$row_no]) echo "selected"; ?>>5 PKR {{number_format($detailChild->SellingPrice * $nights*5, 0)}}</option>
                                    </select>
                               
                                    <input type="hidden" name="costOfRoom[]" value ="{{$detailChild->SellingPrice * $nights}}" >
                                </td>
                                <td>
                                    
                                    <?php if($counter == 0) { 
                                    echo '
                                    
                                    
                                    <ul class="pl-3">
                                        <li><b><h1 id="h1noOfRoom"> </h1></b> rooms for </li>
                                        <li><h1><b><span id="spnPrice"> </span></b></h1></li>                                        
                                        <li>Confirmation is immediate</li>
                                        <li>No registration required</li>
                                        <li>No booking or credit card fees!</li>
                                    </ul>
                                    <button type="submit" class="btn-org d-inline">Book now</button>
                                    ';


                                    }
                                    ?>
                                </td>
                            </tr>

                            <?php $counter++; $row_no++; ?>
                            @endforeach
                            <input type="hidden" id="Adults" value="{{Session::has('adults') ? Session::get('adults') : $mAdults}}">
                                    <input type="hidden" id="Rooms" value="{{Session::has('rooms') ? Session::get('rooms') :$mRooms}}">
                                    <input type="hidden" id="check_in" value="{{Session::has('fromDate') ? date('d/m/Y', strtotime(Session::get('fromDate'))) : $mCheckIn}}">
                                    <input type="hidden" id="check_out" value="{{Session::has('toDate') ? date('d/m/Y', strtotime(Session::get('toDate'))) : $mCheckOut}}">
                                    <input type="hidden" id="children" value="{{$mChildren}}">
                        </tbody>
                    </table>
                </div>                
            </div>
     </div>
    
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
                            <p><?php echo $details[0]->Description;
                                // dd($details->Description);
                             ?></p>

                             
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
                           <?php  ?>
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

               </div>
        </div>
    </div>
</section>
<!-- detail Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body" style="padding:0;">
        <?php
              //dd($details);
        ?> 
          <div class="">
            <div class="">
                <div class="imgsec">
                        <div class="imgcol">
                            <img id="hotalImg" src="">
                        </div>
                </div>
                <div class="textsec">
                    <div class="booking-right-content booking-right-content-modal ">
                        <h3 class="sp-heading mb-15 mHotalName"></h3>
                        
                        

                                 <div class="key-check" id="policy">
                                        <h4>Terms & Conditions</h4>
                                        <p>These terms of service constitute a legally binding agreement (the “Agreement”) between you and “Kaabil Technology Services” or “KTown Rooms” and your use of the website is an acknowledgment that you have reviewed the terms and Conditions and agree to comply with and be legally bound thereby. The expression includes and permitted assigns governing your (user) use of the of the “KTown Rooms platform”. The “KTown Rooms Platform” and all rights therein are and shall remain Kaabil Technology Services property. Neither this Agreement nor your use of the “KTown Rooms Platform” convey or grant to you any rights; to use or reference in any manner Kaabil Technology Services company names, logos, product and service names, trademarks or services.

                                        If you are not agreeable to all the usage terms in their entirety, you must not use this site and should exit/logout immediately. By accessing, viewing, or using this Website/ Application, You acknowledge, declare, confirm and represent & warrant to “KTown Rooms” that you have read and understood the Usage Terms and accept them as an agreement as the binding legal contract equivalent of a duly signed contract binding on You. This agreement is effective immediately upon your accessing, viewing, or using this Website/ Application. You are advised to regularly check for any amendments or updates to the Usage Terms mentioned herein from time to time. KTown Rooms may add to or change, update these Usage Terms from time to time entirely at its sole discretion. Your use of the Website/ Application and any amendment to the Usage Terms shall constitute your acceptance of these Usage Terms and you agree to be bound by any such changes/revisions/amendments.
                                    </p>
                                    <p> 
                                        <b style="color:#000;">Please also read these terms to acquire further clarity in agreement:</b>
                                        <br>
                                        Kaabil Technology Services, a company incorporated under the laws of Pakistan having its registered office at University road, karachi, operates as a budgeted hotel chain model “KTown Rooms” through its website (Ktownrooms.com) for temporary accommodation. Please note ‘KTown Rooms website is an online marketplace where Users can meet and interact with Guest Houses/Hotels (collectively as “Channel Partner”) for their Bookings/transactions. Channel Partners list their Guest Houses, Hotels, properties and other lodgings ("collectively, the “Accommodations") on the Website and User reserves the Accommodation at the prices specified by the Channel partner on the Website. KTown Rooms hereby clarifies and the User agrees and understands that ‘KTown Rooms’ is not the owner of the Accommodations and will not be liable for any services or lack of them at the Accommodations booked by the User. It is hereby further clarified that KTown Rooms and Channel Partners are separate and independent entities and KTown Rooms does not work as representative or agent of the Channel Partner. By making a reservation/booking at the listed Accommodations the User enters into commercial/ contractual terms as offered by and agreed to between Channel Partner and the User alone.
                                        You hereby agree and warrant that you are at least eighteen years of age and are capable of entering, performing and adhering to these usage terms and that you are bound by these usage terms. While those who are under the age of 18 may utilize or browse the site by the involvement, guidance and supervision of their parents/ guardians, under parents/guardians registered account. Furthermore, KTown Rooms has right at its sole discretion to refuse or terminate the access of any user/person whatsoever with or without notice.
                                        KTown Rooms shall not be responsible for unsatisfactory or delayed performance of services or damages or delays as a result of Channel Partner’s act’s or omissions.
                                        The User hereby assumes the sole risk of booking or making use or relying on the information relating to the Services available on this Website/ Application. KTown Rooms does not promote any Accommodations listed on the Website/ Application. It is User’s responsibility to check the details of the Accommodations listed on the Website/ Application at its sole discretion.
                                        Further, KTown Rooms shall not be held responsible for non-availability of the Website/ Application during periodic maintenance operations or any unplanned suspension of access to the Website/ Application that may occur due to technical reasons or for any reasons beyond KTown Rooms’ control.
                                        Guest must use his own credit/debit card for any payments to KTown Rooms website or in KTown Rooms partner hotels. The KTown rooms shall not be liable for any credit/debit card fraud. The liability to use a card fraudulently would be on the guest and the onus to ‘prove otherwise’ shall be exclusively on guest.
                                        The User agrees, acknowledges and confirms that before placing any order, the User shall check the Service description and price carefully and by placing an order for a Service You agree to be bound by the Usage Terms and conditions of sale included in the Services’ description. You shall only place the order after fully satisfying yourself with the price, description, look as has been displayed on KTown Rooms Website/Application.
                                        KTown Rooms shall not be responsible and shall not be required to mediate or resolve any dispute or disagreement between User and Channel Partner. In no event, shall KTown Rooms be made a party to dispute between User(s) and Channel Partner(s).
                                        Your use of the Services shall be deemed that you are fully satisfied with the description, look and design of the accommodation and usage fee of the Accommodation as has been displayed on Ktown Room's Website/ Application.
                                        Ktown Rooms makes the services available to user through the website only if user provide Ktown Rooms required User information through creating an account (“Account”) Via  Ktown Rooms ID and Password or other log-in ID and Password (collectively, the “Account Information”). We only provide you services once you register as a User, and the sole responsibility of maintaining confidentiality of the account information on You (User). We “Ktown Rooms” shall not be liable for any loss or damage done due to lack of confidentiality of Account information.
                                        The Services are provided by Ktown Rooms on an "as is" basis without warranty of any kind, to User.
                                        These terms will be interpreted in accordance with the laws of the Pakistan. You (User) and we (KTown Rooms) agree to submit to the exclusive jurisdiction of a court located in Karachi for any dispute, claim or actions in relation to these terms or the use of services provided through ktownrooms.com
                                    </p>
                                </div>


                               
                           
                             
                        <!-- <a href="{{ url('payment') }}" class="btn-org">Check out</a> -->
                    </div>
                </div> 
                     
            </div>
         

         

          </div>

    </div>
    <?php
       // }
    ?>

    </div>
  </div>
</div>
{!! FORM::close() !!}
@stop
@section('myjsfile')
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" type="text/css" media="all">
<script src="{{ url('resources/assets/web') }}/js/custom.js"></script>
<script src="{{ url('resources/assets/web') }}/js/accounting.js"></script>
<script src="{{ url('resources/assets/web') }}/js/jquery.mask.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src="{{ url('resources/assets/web') }}/assets/validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
<style>
    .ui-datepicker {
        width: 23em;
    }
</style>
<!-- masking code -->
<script type="text/javascript">
      



    $(document).ready(function()
    { 
        $('#Cell').inputmask('(99)-999-9999999');
        
        
        $.formatCurrency = function (amount) {
         return accounting.formatMoney(amount, "", 2, ",", ".");
}

        @if(Session::has('SelectedRoom'))      
        calculateRoomPrice();
        @endif  

        @if(Session::has('errors'))
             calculateRoomPrice();
            $('#inputValidation').modal('show');
        @endif
      
     
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

        $('.NoOfRooms').change(function(){

       
            calculateRoomPrice();

        });

 
        
        $(".mChkin").html($("#check_in").val());  
        $(".mChkOut").html($('#check_out').val());
        

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
                
       
        // wow end
       
       // $('.hasDatepicker').mask('00/00/0000');

       $.ajax({
                 type: "POST",
                 url: "{{ url(Request::path()) }}",
                 'headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                 dataType: "JSON",
                 data: {'CheckIn': $('#check_in').val(), 'CheckOut': $('#check_out').val(), 'Adults': $('#Adults').val(), 'Children': '0', 'Rooms': $('#Rooms').val()},
 
                 success: function (data) {
                     
                     if (data.error) {
                         $('#messageCheckInCheckout').html(data.message);
                         $('#myModalCheckInCheckOut').modal();
                         //alert(data.message);
                     } else 
                     {
                         // alert('in');
                         $(".mHotalName").html(data.data[0].HotelName);
                         $(".mChkin").html(data.data[0].CheckIn);
                         $(".mChkOut").html(data.data[0].CheckOut);
                         $(".sPrice").html(data.data[0].SellingPrice);
                         $(".tNight").html(data.data[0].TotalNights);
                         $(".total").html(data.data[0].Total);
                         $(".rooms").html('Rooms : '+data.data[0].Rooms);
                         $(".guest").html('Guests : '+data.data[0].Adults);
                         //$("#hotalImg").attr('src','../public/uploads/website/hotels/thumb/'+data.data[0].Thumbnail);
                         // $(".mHotalName").html(data.data[0].HotelName);
                         // $(".mHotalName").html(data.data[0].HotelName);
                         // $(".mHotalName").html(data.data[0].HotelName);
 
                        // $('#exampleModal').modal();
                         $('.promo_msg').text(data.message);
                         $('.promo_container').remove();
 
 
                     }
                 },
                 complete: function () {
                     $('.book-now-btn').removeAttr('disabled');
                 }
             });


       $('.exampleModal').click(function () {
           
            $.ajax({
                 type: "POST",
                 url: "{{ url(Request::path()) }}",
                 'headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                 dataType: "JSON",
                 data: {'CheckIn': $('#check_in').val(), 'CheckOut': $('#check_out').val(), 'Adults': $('#Adults').val(), 'Children': '0', 'Rooms': $('#Rooms').val()},
 
                 success: function (data) {
                     
                     if (data.error) {
                         $('#messageCheckInCheckout').html(data.message);
                         $('#myModalCheckInCheckOut').modal();
                         //alert(data.message);
                     } else 
                     {
                         // alert('in');
                         $(".mHotalName").html(data.data[0].HotelName);
                         $(".mChkin").html(data.data[0].CheckIn);
                         $(".mChkOut").html(data.data[0].CheckOut);
                         $(".sPrice").html(data.data[0].SellingPrice);
                         $(".tNight").html(data.data[0].TotalNights);
                         $(".total").html(data.data[0].Total);
                         $(".rooms").html('Rooms : '+data.data[0].Rooms);
                         $(".guest").html('Guests : '+data.data[0].Adults);
                         $("#hotalImg").attr('src','../public/uploads/website/hotels/thumb/'+data.data[0].Thumbnail);
                         // $(".mHotalName").html(data.data[0].HotelName);
                         // $(".mHotalName").html(data.data[0].HotelName);
                         // $(".mHotalName").html(data.data[0].HotelName);
 
                         $('#exampleModal').modal();
                         $('.promo_msg').text(data.message);
                         $('.promo_container').remove();
 
 
                     }
                 },
                 complete: function () {
                     $('.book-now-btn').removeAttr('disabled');
                 }
             });
         });
 
 
 
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
 
    });

    function calculateRoomPrice()
    {
        var sum =0;
         var sumOfRooms = 0;
         for(var i=0; i<$('table tbody tr').length; i++)
         {
             if($('table tbody tr:eq('+i+') td:eq(5) select')[0] != undefined)
             {
                  sum += $('table tbody tr:eq('+i+') td:eq(5) select')[0].selectedIndex;
                  sumOfRooms += parseFloat($('table tbody tr:eq('+i+') td:eq(3) .spnPrice').text().replace(',','')) * $('table tbody tr:eq('+i+') td:eq(5) select')[0].selectedIndex;
             }
         }

         $("#h1noOfRoom").text(sum);
         $("#spnPrice").text($.formatCurrency(sumOfRooms));
         
         $("#hdnTotalCost").val(sum);
         $("#hdnTotalRoom").val(sumOfRooms);
    }

</script>

<script>
    
       
</script>
<!-- <script>
   // $(document).ready(function () {


       
        // $('.book-now-btn').click(function () {
        //     $('.book-now-btn').attr('disabled', 'disabled');
        //     $.ajax({
        //         type: "POST",
        //         url: "{{ url(Request::path()) }}",
        //         'headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
        //         dataType: "JSON",
        //         data: {'CheckIn': $('#check_in').val(), 'CheckOut': $('#check_out').val(), 'Adults': $('#Adults').val(), 'Children': '0', 'Rooms': $('#Rooms').val()},

        //         success: function (data) {
        //             // alert(data);
        //             console.log(data);
        //             if (data.error) {
        //                 $('#message-modal').html(data.message);
        //                 $('#myModal').modal();
        //                 //alert(data.message);
        //             } else 
        //             {
                        
        //                 // window.location.href = '{{ url("cart") }}';
        //                 // $('#exampleModal').modal();
        //                 console.log(data);
        //                 $('.promo_msg').text(data.message);
        //                 $('.promo_container').remove();
        //             }
        //         },
        //         complete: function () {
        //             $('.book-now-btn').removeAttr('disabled');
        //         }
        //     });
        // });
   // });
</script> -->

@stop