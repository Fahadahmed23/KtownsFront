@extends('layouts.default')
@section('title', "Hotels in Nathia Gali | Guest House In Nathia Gali | Ktown Rooms") 
@section('description', "Book a hotels in Nathia Gali, get the best hotels and guest house deals in Nathia Gali with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/nathia-gali-cover.png);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">NATHIA GALI TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Nathia Gali
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Nathia Gali is a mountain resort, situated in Hazara, Khyber Pakhtunkhwa. It is around one hour drive away from both Murree and Abbottabad and is one of the famous hill stations.</p>
                <p class="fspx-12 m-0 p-0">Nathia Gali is a must visit place by the tourists who love trekking, because of its amazing view of greenry, forest and snow fall. It is populated with cedar, oak, maple and walnut trees. Tourism in Nathia is at its peak rom May to August because of vacation as well as for honeymoon in Nathia Gali to beat the heat and enjoy summers to the fullest.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Dunga Gali pine lines</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Dunga Gali track also known as Mukshpuri track is a pine lined track. Situated at Mukshpuri Peak; 3 km away Nathia Gali. It is a stunning track that is leading travelers from Dunga Gali to Ayubia. Those who are passionate about travelling and adventure can trek a little longer to climb the highest point of Mukshpuri.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Green spot</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Green spot is a mountainous, found few kms away from Nathia Gali bazaar. It is a must vist attraction that falls under Pakistan Air force, yet it is open for the travel industry. It gives you a wonderful view of Nathia Gali from the top as well as of neighboring places particularly from Summer Retreat Hotel in Nathia Gali.</p>
                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Miranjani trekking</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Miranjani trekking top is situated four hours away from Nathia Gali. It is the highest top of the Khyber Pakhtunkhwa Province. There are different ways to visit here, one being a precipitous track from Nathia Gali and the other one begins from the Governor's House.</p>
                            <p class="fspx-12 m-0 p-0">The majority of the restaurants in Nathia Gali are situated on the main road bazaar. These restaurants offer tempting lunch and dinner and this tourist spot has huge consumption of tea because of its cold weather. Along with Pashtoon dishes, they also serve Desi Pakistani dishes, Bar-B-Q, Chinese and Continental Food. Eating out in open environment with the view of mountain makes the experience even more amazing. There are numerous guest houses and cheap hotels in Nathia Gali. Ktown Rooms is a well-known brand in Nathia Gali that provides best hotels in Nathia Gali with high quality services to the tourists.</p>
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