@extends('layouts.default')
@section('title', "Hotels in Balakot | Guest House In Balakot | Ktown Rooms") 
@section('description', "Book a hotels in Balakot, get the best hotels and guest house deals in Balakot with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/balakot-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">BALAKOT TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Balakot
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Balakot is the place where there are saints and historical spots. It is an amazing city that is 39 km away from Mansehra. It has been announced as a major Tehsil of District Mansehra. Balakot is a lush green valley of this area; moreover this city is an economical hub because of the tourism.</p>
                <p class="fspx-12 m-0 p-0">While going from Mansehra towards Balakot there is a must visit attraction named Attar Shisha, there are two streets ahead, right one is the ancient and curvy one which leads to Garhi Habibullah; wide forests could be seen on your route. There is street which joins you to the capital of Azad Jamu and Kashmir whereas the left one drives you towards the pretty Balakot. On your route you could enjoy the green fields of the valley along beautiful houses and the Kunhar River. The Kunhar River greets you with its cold breeze and fresh water which originated from Garhi Habibullah and joins with the Jhelum River. Basian is only 11 km away from the Balakot and Lulusar Lake is joined by other lakes. There are must visit attractions and rivers that are located on its bank side.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <p class="fspx-12 m-0 p-0">Tourists come from all over the world and country to enjoy their trip to the fullest. Kunhar River goes through the Balakot city and makes beautiful effects. The "Garlat" wooden flyover was made in 1895. Historically, it was the first flyover which was utilized for the transportation between the Kaghan valley.</p>
                    <p class="fspx-12 m-0 p-0">A battle took place between the Sikhs and Muslims, Syed Ahmed Shaheed and Shah Ismail Shaheed had Shahadat at this spot. There tombs are located on a similar spot which are now must visit place by the tourists.</p>
                    <p class="fspx-12 m-0 p-0">Ktown Rooms wants to make your trip comfortable and your memory amazing. For this purpose, Ktown Rooms provides you with best hotels, cheap hotels and guest houses in Balakot at low rates with high standard services.  It offers complete amenities, heater, 32” LED, wifi and a lot more to make your stay relaxing.</p>
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