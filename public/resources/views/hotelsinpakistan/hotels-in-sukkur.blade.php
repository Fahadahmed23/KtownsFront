@extends('layouts.default')
@section('title', "Hotels in Sukkur | Guest House In Sukkur | Ktown Rooms") 
@section('description', "Book a hotels in Sukkur, get the best hotels and guest house deals in Sukkur with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/sukkur-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">SUKKUR TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Sukkur
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Sukkur is the third biggest city in Sindh. The cultural places and markets in Sukkur show how rich it is in Sindhi culture, and they are the must visit attractions of the city. Residents of Sukkur are pleased with their city and demonstrate their pride by being kind and hospitable to the travelers. Their hospitable skill is extended to the hotel industry in Sukkur, offering you more amazing experiences to love this city.</p>
                <p class="fspx-12 m-0 p-0">Sukkur is decent yet delightful; the weather of Sukkur is generally hot, and dry. The city is delightfully constructed so that tourists can't quit traveling to Sukkur and exploring the wonderfulness of this city. To make your stay comfortable, book your room in hotels near to airport, or a guest house in Sukkur.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Sadh Belo</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Sadh Belo is an island on Indus River near the city of Sukkur. There is a Hindu shrine on the island which was established in 1823 by Swami Bakhandi Maharaj Udasi; it is one of the must visit attractions. The way to the shrine is through the stream on a boat, which gives the traveler a beautiful traveling experience and a beautiful view of River Indus.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Sukkur Barrage</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Sukkur barrage (flyover) is situated close to Sukkur city. There are around 66 parts of the barrage and they all have a gateway (weight 50 tons), to control the water stream for cultivation, harvesting and floods.</p>
                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Lab-e–Mehran</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Lab-e-Mehran is a attractive garden situated in Sukkur. Garden is attractive and nearby Indus River. The garden has various facilities, for instance, separate family hall, hotel, boating and more.</p>
                            <p class="fspx-12 m-0 p-0">There are several restaurants and hotels in Sukkur at reasonable rates. The nourishment is from Sindhi Kitchen, dishes that no tourists miss out on are Sai Bhaji, Sindhi Biryani, Taryal Patata and Pallo Machi served with drinks like Thadal, Khirni and sherbet. Sukkur is popular for handmade work and weaving. The local bazaar of Sukkur is filled with these items, for instance, Aplic work dresses and conventional Sindhi Ajarak, Khais and Chaddars. You can properly experience what Sindhi culture actually is by visiting Sukkur.</p>
                            <p class="fspx-12 m-0 p-0">If you are visitng Sukkur you definitely a room to stay, Ktown Rooms has constructed cheap hotels and guest houses in Sukkur at affordable rates with standardized hospitality services. Along with accommodation in hotels it provides Air conditioner, Wifi, breakfast, 32” LED, 24/7 front desk and a lot more.</p>
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