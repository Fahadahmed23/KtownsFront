@extends('layouts.default')
@section('title', 'Save with KTown | Best Hotels in Pakistan | Budgeted Hotels') 
@section('description', "Ktown rooms is Pakistan's best budgeted hotel network, provides you accommodation in cheap rates. Stay at Ktown Rooms & get AC, Wifi, Complimentary breakfast, cleaned washroom, cable tv & hygienic bed/linen.Lowest Price Guaranteed. Book now and pay later search cheap hotel near you and you will find Ktown.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/our-hotels-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">Our Hotels
                    <span class="mb-50">Hotels & Apartments across Pakistan </span>
                </h2>  
            </div>
        </div>
    </div> 
</section>

@include('includes/filter-top')
<section class="exp2-main m-0 ptpx-50">
    <div class="container">
        <div class="row">
            @include('includes/filter-left')
            <div class="col-lg-8">
                <div class="custom-heading mbpx-20">
                    <h3> <strong>Hotels</strong> In <?php if (isset($_GET['c'])) { echo $_GET['c']; } else { echo "Pakistan"; }    ?>
                        <!--<span>Choose from variety of styles</span>-->
                    </h3>
                </div>

                <!--<p class="fspx-12 m-0 p-0">KTown Rooms allow travelers to book instantly from 10 hotels in Karachi, as per their choice. If you want an online hotel booking of budget hotels in any specific category, then you have an option of selecting hotels located near Airport or hotels near cant station/railway station in Karachi. KTown rooms offer dedicated elite class budget hotels for business travelers in karachi, however ktown isn’t couple friendly hotel or don’t provide hotels for dates/ or rooms for unmarried couples in karachi</p>
                <a href="javascript:;" class="">Read More</a>
                <h5 class="fspx-14 mtpx-10 fc-lgrey">Price/Room/Night</h5>-->

                <div class="col-lg-12 p-0 pagina">
                    <?php
                    if (count($hotels) > 0) {
                        foreach ($hotels as $hotel) {
                            ?>
                            <div class="rl-box-main pagin mbpx-50">
                                <div class="row mtpx-40">
                                    <div class="col-lg-6 align-self-center">
                                        <figure class="zoom-limg">
                                            <a href="{{ url('details/'.$hotel['Slug']) }}"><img src="{{ url('public/uploads/website/hotels/thumb/'.$hotel['Thumbnail']) }}" alt="<?php echo $hotel['HotelName']; ?>" class="list-img img-fluid"></a>
                                        </figure>
                                    </div>  
                                    <div class="col-lg-6 align-self-center">
                                        <div class="img-list-content">
                                            <div class="d-flex mbpx-10">
                                                <?php for ($i = 1; $i <= $hotel['Rating']; $i++) { ?>
                                                    <span class="fa fa-star fspx-14 fc-org mrpx-2"></span>
                                                <?php } ?>
                                            </div> 
                                            <h4 class=""> PKR <?php echo number_format($hotel['SellingPrice'], 0); ?> <span>/Night </span></h4>
                                            <a href="{{ url('details/'.$hotel['Slug']) }}"><h3 class="fw-bold mbpx-10" style="color:#000;"><?php echo $hotel['HotelName']; ?></h3></a>
                                            <p class="fspx-13 pbpx-10"><?php echo str_limit($hotel['Description'], 140); ?></p>
                                            <div class="d-flex rlst mbpx-20">
                                                <?php
                                                if (count($hotel['Services']) > 0) {
                                                    foreach ($hotel['Services'] as $ser) {
                                                        ?>
                                                        <img src="<?php echo url('public/uploads/website/services/' . $ser->Icon); ?>" alt="*">
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                            <a href="{{ url('details/'.$hotel['Slug']) }}" class="bn-btn">Book Now</a>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>

        </div> 
        <hr class="mbpx-0">  
    </div>
</section>


<!-- <script type="text/javascript">
    var cityname = ""; 
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
        return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }


    cityname = getParameterByName("c");
    console.log(cityname);

</script> -->
<script type="text/javascript"></script>
@stop
@section('myjsfile')    
<script src="{{ url('resources/assets/web') }}/js/custom.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
@stop