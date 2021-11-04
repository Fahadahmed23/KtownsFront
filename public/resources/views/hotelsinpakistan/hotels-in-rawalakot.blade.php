@extends('layouts.default')
@section('title', "Hotels in Rawalakot | Guest House In Rawalakot | Ktown Rooms") 
@section('description', "Book a hotels in Rawalakot, get the best hotels and guest house deals in Rawalakot with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/karachi-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">RAWALAKOT TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Rawalakot
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Rawalakot is a valley located in Azad Jammu and Kashmir. It is 3 hours drive away from Islamabad. The climate of Rawalakot mostly remain cold however, it drops down to 20°C in summers. It is a stunning valley with beautiful waterfalls alongside and a peaceful place to enjoy. There are several educational institutions such as Agriculture University and few different schools and colleges. This city is considered as the must visit attraction because of trekking, climbing, paragliding and different water activities. The rate of tourism in Rawalakot is high during winters.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Toli Peer</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Toli peer is the top point of the mountaineous area and the must visit attraction in Rawalakot valley. It is considered to be one of the must visit place by the tourists. Entire view of the hill is viewed from here which is the best part of the Toli Peer hills. It is surrounded by greenry, mountains and with peaceful environment.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Poonch River</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Poonch River is situated on Kotli street, 35 km far from the Rawalakot City. The waterway is wide and long and is 886 m above ocean level. Heading to the river, you will come across beautiful views alongside. People who love beaches, rain, natural beauty and are fond of water.</p>
                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Banjosa Lake</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">This lake is located at distance of 20 km from Rawalakot. This is one of the top must visit attractions in the city because of its natural beauty. It is surrounded by beautiful forest whose reflection on the water that gives an amazing view. Tourists are usually found having tea and chit chat with their family and friend.</p>
                            <p class="fspx-12 m-0 p-0">Rawalakot bazaar is the place must visited by the tourist, it is also a busiest market. From grocery to electronic everything is available here in this market. The sale of handicraft, wood cravings and fruits are the highest, these are the things mostly purchased by the tourists. The most popular restaurants in Rawalakot are Rawalakot International Hotel and Dhara restaurant. If you want to enjoy Kashmiri dishes in Kashmir then this place is amazing for this purpose.</p>
                            <p class="fspx-12 m-0 p-0">In Kashmir, the rate of tourism is high due to which travel industry of the city has constructed several guest houses as well as hotels in Kashmir with numerous facilities. You can discover number of cheap hotels in Kashmir,   guest houses or government cabins for accommodation. For best lowest rate yet standardized hospitality services Ktown Rooms  is the best choice for the tourists visiting Kashmir. It provides free breakfast, free wifi, 32” LED and fully air conditioned rooms or a central heater in winters.</p>
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