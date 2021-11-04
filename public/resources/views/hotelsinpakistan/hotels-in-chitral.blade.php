@extends('layouts.default')
@section('title', "Hotels in Chitral | Guest House In Chitral | Ktown Rooms") 
@section('description', "Book a hotels in Chitral, get the best hotels and guest house deals in Chitral with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/chitral-cover.png);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">CHITRAL TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Chitral
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Chitral Valley is one of the must visit attractions in Pakistan. Snowy peaks of mountain and rivers everything is found in Chitral. It is considered as Pakistan's tourists’ center point. The valley is popular for hiking, fishing and various must visit attractions. The idol time to plan your trip in Chitral is from July to September, since it gets unbearable in May and June. Residents of Chitral are hospitable people, it is a must visit city by the tourists to stay with Chitrali where they enjoy their Chitrali culture.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Kalash Valley</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">The Kalash Valleys are situated in Chitral. This valley is surrounded by lush green which gives a beautiful view to the tourists. This valley is a must visit attraction of Chitral. The Kalasha have a distinctive culture that has pulled tourists, business travelers and everyone from different parts of the country.</p>
                            
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Chitral Museum</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Chitral is considered a historical city. Chitral Museum is constructed to enhance historical knowledge. The museum contains collectibles, weapons and other antique pieces from the old times that give great information about history and culture of Chitral and Kalash individuals.</p>
                            
                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Chitral Polo Ground</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Most played game in Chitral is Polo. There are numerous Polo grounds in Chitral, but the most popular one is situated in Chitral , If you are a sports lover then it is a must visit place in Chitral, you should visit the ground where you will get interesting details about it. Most of the times, matches are going on in the ground which entertains the tourists.</p>
                            <p class="fspx-12 m-0 p-0">The cusine of Chitral is quite similar to the neighboring city Gilgit-Baltistan. Mantus, an asian dish of steamed meat dumplings famous in Chitral. Different varieties of teas are also very popular like butter, salty, or green tea. Chitral is a safe and secure place and people are quite hospitable. There are several hotels in Chitral and guest house in Chitral to book a room; however the rates of those hotels are quite high. Ktown Rooms provides cheap hotels in Chitral to increase the rate of tourism even more with standardized services at low prices.</p>
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