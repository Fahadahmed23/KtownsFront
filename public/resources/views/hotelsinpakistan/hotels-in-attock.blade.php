@extends('layouts.default')
@section('title', "Hotels in Attock | Guest House In Attock | Ktown Rooms") 
@section('description', "Book a hotels in Attock, get the best hotels and guest house deals in Attock with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/attock-cover.png);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">ATTOCK TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Attock
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">It is always awake and the people in the city never seem to sleep. A vivid and vibrant symphony of colors, old architecture, new architecture and one of the most diverse populations in the entire country, it is hard to resist the temptation to visit Attock.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Lake View Park</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">If you searching for a peaceful spot with your family, Lake View Park is the best option for you. It is also called the Rawal Lake View Point. It is a must visit attraction by the tourists infact residents of Attock are mostly found here to enjoy their weekends and special occasions. It also offers leisure activities that entertain the visitors. Various events are held in Lake View Park make your trips and occasions, there are various activities to entertain tourists motor sports, wall climbing, aviary, street trains, paintball battle zone, drifting and fishing as well as pools.</p>
                            
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Pakistan Monument</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">One of the must visit attractions is a Pakistan Monument. This national landmark was initiated in 2007. The dimensions of this milestone make it popular metropolitan stretch between Islamabad and Rawalpindi. You will be amazed to see the gigantic structure of this monument expands over 2.8 hectares of land. Its flower-shaped structure adds more value to this building that attracts more number of tourists. The four major petals of this flower display the four provinces of Pakistan; and the three inward petals display three regions.</p>
                            
                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Khandampur</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Khanpur Dam Viewpoint has a splendid view. It does not only give a beautiful view of Khanpur Dam,but also view of a fast flow of water that is quite refreshing. The beautiful scene adds even more value to the trip of tourists. Beautiful green trees on one side of the beach, the magnificent electric blue waters streams peacefully in the center, and the mountains shield the basin from the opposite side. You can see the dam in the middle of the flowing water. A must visit attraction to spend your time and make memories; this place is famous among travelers and residents of this city.</p>
                            <p class="fspx-12 m-0 p-0">Ktown Rooms has listed all must visit attractions that free to visit in Attock .Handpicked attractions, day treks in Attock will make your visit amazing and memorable. Ktown Rooms’ 24 front desk would also guide you about the timings of these must visit attractions. This will assist you having a smooth trip. There are several guest houses and hotels in Attock like Hotel Grand Ambassador, Grace Crown Hotel, National City Hotel and Al Waqqas Hotel that accommodate tourists. Ktown Rooms offers 3 star hotels and best cheap hotels in Attock with standardized services to make your stay comfortable and to make spend lesser amount on your trip.</p>
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