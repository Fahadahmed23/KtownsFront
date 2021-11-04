@extends('layouts.default')
@section('title', "Hotels in Hunza | Guest House In Hunza | Ktown Rooms") 
@section('description', "Book a hotels in Hunza, get the best hotels and guest house deals in Hunza with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/karachi-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">HUNZA TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Hunza
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Hunza Valley is situated in Gilgit, this valley is famous for its beauty, and residents of Hunza are also famous for their hospitality nature and kindness. Tourists usually visit this city between May and October as the roads are usually blocked by the snow. Famous foods in Hunza are Sharbat, diram-fete, davado, muleda; however, all these things are prepared on special occasion. It is also known for traditional dishes that are served at the restaurants in Karimabad market where people eat after shopping, there are like more than 50 shops. One of the must visit attractions in this area is the minerals and gemstones, those who love to collect things they must visit this place. Ktown Rooms has gathered all the must visit attractions at one place.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Baltit Fort</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Baltit Fort is an old fort in the Hunza valley. This valley has been reconstructed again over the 700 years.  It is situated at a height, people who like climbing they love to trek here otherwise facility of jeep is also provided to reach the top.  From the top point you have an amazing experience, as you can watch the clear view and peacefulness of the valley.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Borith Lake</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Borith Lake is a lake situated close to Gulmit, Gojal, in the upper Hunza. The lake is reachable from Husseini town, and if people love trekking then it is 2-3 hours trek for there. This place is a must visit attraction for all the nature lovers. Chirping of birds in the morning is something that is loved here, tourist enjoy the sound of birds and cold breeze. This spot is the most favorite spots of the tourists.</p>
                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Trekking</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Hunza valley is popular for its trekking; moreover, the most popular peak K2, is also situated in the Gilgit-Baldistan. There are different trekking spots which travelers must visit when they plan for Hunza Valley.</p>
                            <p class="fspx-12 m-0 p-0">There are several hotels in Hunza Valley with different ranges to accommodate people. It is a safe place to visit which is why it has the highest rate of tourism. It is mostly crowded in the summers because of it pleasant weather than all other parts of the country. Ktown Rooms offers cheap hotels and safe & secure guest houses in Hunza Valley to accommodate people at low rates with standardized services.</p>
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