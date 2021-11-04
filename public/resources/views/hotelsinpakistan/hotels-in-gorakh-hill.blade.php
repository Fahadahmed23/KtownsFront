@extends('layouts.default')
@section('title', "Hotels in Gorah Hill | Guest House In Gorakh Hill | Ktown Rooms") 
@section('description', "Book a hotels in Gorakh Hill, get the best hotels and guest house deals in Gorakh Hill with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/gorakh-hill-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">GORAKH HILL TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Gorakh Hill
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Gorakh is a Sanskrit word, It is a hill stop which is situated at a distance of 406 km from Karachi and 95 km Northwest of Dadu, Sindh. People usually consider it as Murree of Sindh, it is intended to make an amazing memory beginning from a long journey as it takes around 8 to 9 hours to get to Gorakh Hills from Karachi which definitely requires a fine place to rest in a comfortable rooms of Gorakh Hill</p>
                <p class="fspx-12 m-0 p-0">The hill stop is located at a height of more than 5,600 feet in the Kirthar Mountains. The temperature is wonderful in summer generally 20 °C and dropping to zero °C in winter. It even had snowfall once. Although the route to G-Resort at Gorakh Hills is quite hot but the vans are fully air conditioned till Gorakh Base Camp. <span id="dots">...</span></p>
                <div id="more">
                    <p class="fspx-12 m-0 p-0">Travelers usually plan their trip starting early morning and reach Sehwan Restaurant at around 8 in the morning where they have tempting breakfast of ‘anda paratha’. The reason it is called tempting is because tourists end up deep frying omelets that is mouth watering; moreover, Sindh has massive natural beauty, particularly the bird species that you would experience on your way so do not forget to keep your camera.</p>
                    <p class="fspx-12 m-0 p-0">When you reach Gorakh Hill, camps are waiting for you and lunch is served to the people; moreover there is just one cheap hotel in Gorakh Hills that provides bathroom facility otherwise there is one public bathroom. Despite of huge number of people the hill station is kept well maintained and eternal amount of water. Ktown Rooms also provides hotels in Gorakh as well as guest houses in Gorakh.</p>
                    <p class="fspx-12 m-0 p-0">The best point of this spot is the beautiful dusk and stargazing on account of no pollution at all like in the city. Benazir Point which is at a climbing distance of 15 minutes is where wonder happens. Although that place is for hiking but for special cases jeep is arranged as it encourages adventure and do not want to waste because of any medical issue.</p>
                    <p class="fspx-12 m-0 p-0">If you are traveling far away from your city to enjoy your vacations you would definitely need a place to rest in Gorakh Hills. For this purpose, Ktown Rooms has developed their camps in Gorakh Hills as majority of travelers love to do bonfire with camping in addition to this they have developed cheap hotels and guest houses in Gorakh hills to serve the needs of the travelers coming for vacations. Along with comfortable accommodation Ktown Rooms offers air conditioners, 32” LED, Wifi, breakfast and a lot more.</p>
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
                                                <img src="{{ url('public/uploads/website/hotels/thumb/'.$hotel['Thumbnail']) }}" alt="<?php echo $hotel['HotelName']; ?>" class="list-img img-fluid">
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
                                                <h3 class="fw-bold mbpx-10"><?php echo $hotel['HotelName']; ?></h3>
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