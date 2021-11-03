@extends('layouts.default')
@section('title', "Hotels in Kalash Valley | Guest House In Kalash Valley | Ktown Rooms") 
@section('description', "Book a hotels in Kalash Valley, get the best hotels and guest house deals in Kalash Valley with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/karachi-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">KALASH VALLEY TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Kalash Valley
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Chitral is located in the northern areas of Pakistan. This district is having several beautiful valleys. Hindu Kush mountain ranges have surrounded those Valleys with its gorgeousness. The people living in valleys are the Kalash individuals, who have an exceptional culture, and language. Kalasha Valleys are the must-visit attractions for Pakistani as well as for International visitors. If you are travelling through public transport, you will pass by Chitral to get to kalash valley. It is also accessible from either Gilgit City or the Swat Valley. It's 2-day long venture from train.<span id="dots">...</span></p>
                <div id="more">
                    <p class="fspx-12 m-0 p-0">There are three gorgeous valleys in Bumburet (Mumuret), accessible from Ayun in the Kunar Valley. Rumbur is a side valleys north of Bumburet. The third famous valley is Biriu in Kunar Valley south of Bumburet. These valleys occupy the tourists with several activities in Bumboret, Rumbur and Birir. Bumburet is known as a commercial village; however, Rumbur has a huge space to keep you engage in entertaining activities.</p>
                    <p class="fspx-12 m-0 p-0">When you touch the base in the Kalash Valley, just two or three kilometers from the Afghan border, you will witness the difference between the Pashtun and Kalash people which is quite interesting. The culture of Kalashi is different from Muslims as their religion claims that there is one God called Dezau ; moreover, they worship and even sacrifice animals, to spirits in temples. There is no Holy Book, individuals will reveal to you various stories about their religion few sources state that they are polytheists.</p>
                    <p class="fspx-12 m-0 p-0">Today, around 5,000 Kalash individuals live across 3 different valleys because of their remoteness, far from the developed areas the Kalash individuals live a struggling life which is quite adventurous for tourists. Frankly, trip to kalash valleys is quite interesting as they have long pleasant weather.</p>
                    <p class="fspx-12 m-0 p-0">The rate of tourism is quite high due to which Tourism corporations has constructed several cheap hotels in Kalash Valleys with standardised services to accommodate all the tourists. Ktown Rooms is the best budget hotel in Kalash Valley which offers clean and tidy rooms with best quality heater and electric cattle, 32” LED, and a lot more.</p>
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