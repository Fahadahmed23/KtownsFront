<style type="text/css">
span.irs-handle.from {
    border-color: #e79339;
    box-shadow: 0 1px 3px rgb(231 147 57);
}
span.irs-bar {
    background: #e79339 !important;
}
span.irs-from {
    background: #e79339 !important;
}
span.irs-to {
    background: #e79339 !important;
}
.irs--round .irs-from:before, .irs--round .irs-to:before, .irs--round .irs-single:before{
    border-top-color: #e79339 !important;
}
span.irs-handle.to {
    border-color: #e79339;
}
span.irs-handle.to.type_last {
    border-color: #e79339;
}
span.irs-single {
    background: #e79339 !important;
}
.form-group.pricesubmit {
    text-align: right;
    margin: 25px 0 0 0;
}
.form-group.pricesubmit {
    text-align: right;
    margin: 25px 0 0 0;
}
.form-group.pricesubmit .btn {
    background: #e79339;
    color: #fff;
}
.dcheck input {
    float: left;
    width: 65%;
    margin-bottom: 10px;
    height: 25px;
    padding-left: 10px;
}
.dcheck label {
    width: 35%;
    float: left;
}
</style>
<?php 
$toPrice=\Session::get('toPrice');
//dd(\Session::get('toPrice'));
$fromPrice=\Session::get('fromPrice');
if(empty($toPrice))
{
    $toPrice=4000;
}
if(empty($fromPrice))
{
    $fromPrice=15000;
}

?>
<div class="col-lg-4">
    <div class="exp-left-bar-main">
        <!--<div class="lb-head">
            <h4><img src="{{ url('resources/assets/web') }}/img/filter-icon.png" alt="*" class="fl-icon">
                Filters <a href="javascript:;"><img src="{{ url('resources/assets/web') }}/img/plus-icon.png" alt="*" class="plus-icon"></a></h4>

        </div> --> 

      <!--  <div class="exp-left-box h-180">
            <h4 class="mb-15"><img src="{{ url('resources/assets/web') }}/img/sb-icon.png" alt="*" class="fl-icon">
                Budget</h4>

                <form action="hotels" type='GET'>
                <div class="form-group">
                    <input type="text" class="js-range-slider" name="my_range" value="" />
                    <input type="hidden" name="c"  value="<?php echo \Request::get('c')?>" />
                    
                </div>
                <div class="form-group pricesubmit">
                    <button class="btn btx-xs" type="Submit"> Search Hotels  <i class="fa fa-search"></i> </button>
                </div>
                </form>
        </div>
-->

        <div class="exp-left-box h-180">
            <h4 class="mb-15"><img src="{{ url('resources/assets/web') }}/img/sb-icon.png" alt="*" class="fl-icon">
                Filter</h4>
               
                <div class="form-sec">
                    <hr class="mtpx-0">
                    <div class="filterform" >
                        <form action="hotels" type='GET' style="display: inline-block; width: 100%;">
                        <div class="dcheck">
                            <label>Check In <span class="text-danger">*</span></label>
                            <?php if (empty($fromDate)) {
                               $fromDate = "";
                            }  ?>
                            <input class="fromDate date" type="text" name="fromDate" id="fromDate" onchange="selectMin()" min="<?php echo date('Y-m-d'); ?>" value="<?php  echo $fromDate; ?>" required>
                        </div>

                        <div class="dcheck">
                            <label>Check Out <span class="text-danger">*</span></label>
                            <?php if (empty($toDate)) {
                               $toDate = "";
                            }  ?>
                            <input class="toDate date" type="text" name="toDate" id="toDate" min="<?php echo date('Y-m-d'); ?>" value="<?php echo $toDate; ?>" required>
                        </div>

                        <?php if (empty($adults)) {
                               $adults = "";
                            }  ?>
                        <div class="dcheck">
                            <label>Occupant(s) <span class="text-danger">*</span></label>
                            <!-- <input class="adults" type="number" name="adults" id="adults" value="<?php echo $adults ; ?>"> -->
                            <input min="1" class="adults" type="number" name="adults" id="adults" value="{{Session::get('adults')}}" required>
                        </div>
                        <?php if (empty($rooms)) {
                               $rooms = "";
                            }  ?>
                        <div class="dcheck">
                            <label>Room(s) <span class="text-danger">*</span></label>
                            <!--<input class="rooms" type="number" name="rooms" id="rooms" value="<?php echo $rooms ; ?>"> -->
                            <input min="1" class="rooms" type="number" name="rooms" id="rooms" value="{{Session::get('rooms')}}" required>
                        </div>
                            <?php if (empty($children)) {
                               $children = "";
                            }  ?>
                       <!--  <div class="dcheck">
                            <label>Childres</label>
                            <input class="children" type="number" name="children" id="children" value="<?php echo $children ; ?>">
                        </div> -->
                            <input type="submit" style="width:30%; float:right;background-color:#000; text-color:#FFF; border-radius: 0; font-weight:700;text-align:left; color: white" value="Filter">
                        </form>
                    </div>

                </div>
        </div>




        <div class="exp-left-box h-180">
            <h4 class="mb-15"><img src="{{ url('resources/assets/web') }}/img/sb-icon.png" alt="*" class="fl-icon">
                Cities</h4>
            <ul class="list-round" style="display: inline-block;">
                    <?php
                                
                    $keyword = \Request::get('Cityname') != null ? \Request::get('Cityname') : Session::get('cityname') ; 
                     $my_range = \Request::get('my_range');

                    if (count($cities) > 0) 
                    {
                        foreach ($cities as $city) 
                        {
                        ?>
                                     

                        @if ($keyword === $city->CityName)    
                     
                        <li style="width:45%;">
                            <a class="highlight" href="hotels?c=<?php echo $city->CityName.'&my_range='.$my_range; ?>"><?php echo $city->CityName; ?></a>

                        </li>
                        @else
                         <li style="width:45%;">                             
                            <a href="hotels?c=<?php echo $city->CityName.'&my_range='.$my_range; ?>"><?php echo $city->CityName; ?></a>
                        </li>
                        @endif


                        <?php
                        }
                    }


                    ?>
            </ul>
        </div>



        <div class="exp-left-box h-155 hide">
            <h4 class="mb-15"><img src="{{ url('resources/assets/web') }}/img/sb-icon.png" alt="*" class="fl-icon">
                Categories</h4>

                <ul class="list-round">
                    <?php
                     $keywordc = \Request::get('c');
                     $keyword = \Request::get('t');

                        if (count($hotel_types) > 0) {
                            foreach ($hotel_types as $hotel_type) 
                            {
                            ?>  

                        @if ($keyword === $hotel_type->HotelTypeName) 

                        <li>
                            <a class="highlight"  href="hotels?c={{$keywordc}}&t=<?php echo $hotel_type->HotelTypeName; ?>"><?php echo $hotel_type->HotelTypeName; ?></a>
                        </li>
                         @else
                         <li>
                            <a href="hotels?c={{$keywordc}}&t=<?php echo $hotel_type->HotelTypeName; ?>"><?php echo $hotel_type->HotelTypeName; ?></a>
                        </li>
                         @endif

                    <?php    
                            }
                        }
                    ?>
                </ul>
            <!-- <ul class="list-round lst-2">
                <li><a href="javascript:;">Elite</a></li>
                <li><a href="javascript:;">Budget</a></li>
                <li><a href="javascript:;">Flagship</a></li>
                <li><a href="javascript:;">Premium</a></li>
            </ul> -->
        </div>


        <div class="exp-left-box expp h-182">
            <h4 class="mb-15"><img src="{{ url('resources/assets/web') }}/img/sb-icon.png" alt="*" class="fl-icon">
                Ktown Features</h4>
            <ul class="sbr-list">
                <li><img src="{{ url('resources/assets/web') }}/img/sbr-icon1.png" alt="*" class="fl-icon">
                    <p>Air Conditioner</p></li>
                <li><img src="{{ url('resources/assets/web') }}/img/sbr-icon2.png" alt="*" class="fl-icon">
                    <p>Cleaned Washrooms</p></li>
                <li><img src="{{ url('resources/assets/web') }}/img/sbr-icon3.png" alt="*" class="fl-icon">
                    <p>Cable Television</p></li>
                <li><img src="{{ url('resources/assets/web') }}/img/sbr-icon4.png" alt="*" class="fl-icon">
                    <p>Hygienic Linen/Bedding</p></li>
                <li><img src="{{ url('resources/assets/web') }}/img/sbr-icon5.png" alt="*" class="fl-icon">
                    <p>Free Wifi</p></li>
                <li><img src="{{ url('resources/assets/web') }}/img/sbr-icon6.png" alt="*" class="fl-icon">
                    <p>Free Breakfast</p></li>
            </ul>
        </div>
        <!--<div class="exp-left-box">
            <h4 class="mb-15"><img src="{{ url('resources/assets/web') }}/img/kim-icon.png" alt="*" class="fl-icon">
                Keep in Mind</h4>
            <p class="fspx-10">+ Cancellation policy</p>
            <ul class="dot-list">
                <li><span>.</span> Guests can check in using any local or 
                    outstation ID proof (PAN card not accepted).
                </li>
                <li><span>.</span> Couples are welcome</li>
            </ul>
        </div>-->


    </div> 

    <div class="info-bx text-center hidden-sm-down">
        <p class="fspx-12">If you have any question please don‘t hesitate to contact us</p>
        <a href="tel:{{ $configuration->Contact1 }}"><p class="ff-sec fspx-12"><span class="icon-phone mr-1"></span>{{ $configuration->Contact1 }}</p></a>
        <!-- <a href="tel:{{ $configuration->Contact2 }}"><p class="ff-sec fspx-12"><span class="icon-phone mr-1"></span>{{ $configuration->Contact2 }}</p></a> -->
        <a href="mailto:{{ $emails->SupportEmail }}"><p class="fspx-12"><span class="icon-envelope2 mr-1"></span> {{ $emails->SupportEmail }}</p></a>
    </div>
</div>  
<!--Plugin CSS file with desired skin-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
<!--jQuery-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!--Plugin JavaScript file-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>

<script type="text/javascript">
function selectMin() {
    $('#toDate').attr("min", $('#fromDate').val());

    if ($('#toDate').val() < $('#fromDate').val())
        $('#toDate').val($('#fromDate').val());
}


$(".date").attr("type","date");


    $(".js-range-slider").ionRangeSlider({



        skin: "round",
        type: "double",
        min: 0,
        max: 50000,
        from: <?php echo $toPrice?>,
        to: <?php echo $fromPrice?>,
        grid: true,
        prefix: "PKR: ",
        prettify_separator: ","
        // onStart: function (data) {   
        //     console.log(data.min);          // MIN value
        //     console.log(data.max);          // MAX values
        //     console.log(data.from);         // FROM value
        //     console.log(data.to);           // TO value

        //     data.max = 4200 ;
            
        // },


       
    });

</script>
