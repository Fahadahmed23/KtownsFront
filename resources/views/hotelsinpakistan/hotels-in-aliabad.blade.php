@extends('layouts.default')
@section('title', 'Hotels in Aliabad | Guest House In Aliabad | Ktown Rooms') 
@section('description', "Book a hotels in Aliabad, get the best hotels and guest house deals in Aliabad with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/aliabad-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">ALIABAD TOP HOTELS
                    <!--<span class="mb-50">Borem ipsum dolor sit amet </span>-->
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
                    <h3> <strong>Hotels</strong> In Aliabad
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Aliabad is the administrative, business focus or center point of the Hunza District in Gilgit– Baltistan. The town is situated in the north eastern part of Karakoram Range which is a moderately wide area of the Hunza Valley between two forks of the Hunza River. Like most areas in Hunza– Nagar, Aliabad lies along the Karakoram Highway, which passes through a mountainous area.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <p class="fspx-12 m-0 p-0">Aliabad is an area with no rainfall in the year, it has deserted climate. The normal temperature there is 11.0 °C, driest month of Aliabad is November, while May is the wettest month; however January is the coldest month with average temperature - 3.0 °C because of which it is peak month of tourism. To accommodate huge number of people, tourism department has constructed several cheap hotels and guest house in Aliabad which are safe & secure with best services.</p>
                    <p class="fspx-12 m-0 p-0">Tourists in Aliabad enjoy the natural beauty and cold breeze, they are mostly found chit chatting around the lake with a cup of tea. This place is famous for photography spot as it has a beautiful view. To increase tourism and to entertain travelers they have offered numerous activities in nearby places.</p>
                    <p class="fspx-12 m-0 p-0">Ktown Rooms is a well known brand among tourists for best guest houses, 3 star hotels, and cheap hotels in Aliabad. It provides tourists with best services of free wifi, free breakfast, fully air conditioner room in summers and heater facility in winters.</p>
                </div>
                <button style="margin: 0 0 14px;" onclick="myFunction()" class="btn_1" id="myBtn">Read more</button>
                <h5 class="fspx-14 mtpx-10 fc-lgrey">Price/Room/Night</h5>

                <div class="col-lg-12 p-0 pagina">
                    <?php
                    if (isset($hotels)) {
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
                                                <a href="{{ url('details/'.$hotel['Slug']) }}" style="color:#000;"><h3 class="fw-bold mbpx-10"><?php echo $hotel['HotelName']; ?></h3></a>
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
                    }
                    ?>
                </div>
            </div>
        </div> 
        <hr class="mbpx-0">  
    </div>
</section>
@stop