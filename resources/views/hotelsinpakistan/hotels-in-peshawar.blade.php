@extends('layouts.default')
@section('title', "Hotels in Peshawar | Guest House In Peshawar | Ktown Rooms") 
@section('description', "Book a hotels in Peshawar, get the best hotels and guest house deals in Peshawar with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/peshawar-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">PESHAWAR TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Peshawar
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Peshawar is the oldest city of Asia – where the local market has changed over the time and a lot more has changed. The bazaar in Peshawar looks like an American Wild West film costumed as a Bible epic. Pathans tribe walk around the road, their hands covered up inside their shawls and their faces somewhat covered by the ends of their shawls (they are not allowed to walk armed on the roads now). Pathans considered to be the handsomest man on earth. Balahisar Fort still utilized by the military, and the beautiful Mahabat Khan Mosque. Clubs, churches, schools, malls, markets, airport and more must visit attractions are found in modern Peshawar.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Khyber Bazaar</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">You will discover several guest houses and cheap hotels in Peshawar, at night, numerous number of food stalls down the road selling kebabs and samosas. It is like a live cooking show, you can watch them while cooking and enjoy. The main road is full of specialists, counselors and dental specialists. Kabuli Gate, one of the16 gates of the walled city, is towards the end of Khyber Bazaar.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Cunningham Clock Tower</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">If you start from Chowk Yadgar, on the east, you will have vegetable market and on the west you will have hardware shops left before getting to the Cunningham Clock Tower. It was constructed in 1900, and this tower is named after chief of Peshawar of that period. Around the clock tower, Leather and skin market features the skin of the Karakul sheep, and a significant number of the shops have individuals who make astrakhan caps right there.</p>
                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Peshawar Pottery</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">The Peshawar Pottery is on the left road, following the metal shops. The potters work from 10 am to 4pm on weekdays. The wide scope of decorative and ornamental pottery is coated in solid beautiful colors. Tourists enjoy watching it live as it seems so satisfying to the audience.</p>
                            <p class="fspx-12 m-0 p-0">Ktown Rooms offers guest houses and cheap hotels in Peshawar with standardized services as most guests has the problem of clean washrooms, hygienic beds, working air conditioners. Ktown Rooms eliminated these problems, It provides you with hygienic linens/beds and washrooms.</p>
                        </li>
                    </ul>
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