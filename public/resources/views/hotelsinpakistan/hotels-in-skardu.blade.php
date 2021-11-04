@extends('layouts.default')
@section('title', "Hotels in Skardu | Guest House In Skardu | Ktown Rooms") 
@section('description', "Book a hotels in Skardu, get the best hotels and guest house deals in Skardu with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/skardu-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">SKARDU TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Skardu
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Situated in Gilgit-Baltistan, it is on the intersection of River Indus and Shigar, Skardu is a passage way for the world's highest peak that lies in Karakoram Range, for instance, K2, the Gasherbrums, Broad Peak, and the Trango Towers. Every year a great number of trekkers visit Skardu to climb and achieve the highest point of these peaks. The attractiveness of the town is remarkable; it is enhanced with grey-brown shaded mountains. Number of travelers are numerous in Skardu and for them there are several cheap hotels and guesthouses in Skardu</p>
                <p class="fspx-12 m-0 p-0">The weather of Skardu is moderate and pleasant; however, the winters are terrible, as the transport is affected.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>Satpara Lake</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Satpara Lake is a beautiful and lake of Skardu. It is situated at a rise of 2,636 meters (8,650 ft.) over the sea level. The water is fresh and cold, travelers can go for fishing and boating on the lake. In 2002, the government of Azad Kashmir decided to construct a dam on the Satpara Lake which is still under development.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>Skardu Fort</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Skardu Fort,  also called Kharphocho Fort, is situated over the town towards the east. It is a huge milestone including a seven-story building. Skardu fort is a must visit attraction that gives a stunning view of Skardu town, the beautiful green fields of the valley and the River Indus.</p>
                        </li>
                        <br>
                        <li>
                            <h3><strong>Deosai national park</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">The Deosai National Park is situated in Skardu at the border of the Karakoram. It is situated 4,114m over the ocean level. It was set up in 1993 to make sure the habitat of Himalayan brown bears are protected and now it is home for several habitant, for example, Himalayan ibex, , fox,  wolf, the snow panther, and more than 124 resident and birds. Summers and spring are usually preferred by the tourists I to visit Deosai when it is filled with brilliant wildflowers, variety of flora and fauna and butterflies.</p>
                            <p class="fspx-12 m-0 p-0">Experiencing all of these attractions Skardu is not something you can do in just one day. So if you are here to explore and enjoy the beauty, you will definitely need a guest house or cheap hotels to relax. KTown Rooms provides best hotels in Skardu, it allows travelers to avail services of cheap hotels in Skardu.</p>
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