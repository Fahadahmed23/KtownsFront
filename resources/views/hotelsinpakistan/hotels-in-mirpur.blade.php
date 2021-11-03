@extends('layouts.default')
@section('title', "Hotels in Mirpur | Guest House In Mirpur | Ktown Rooms") 
@section('description', "Book a hotels in Mirpur, get the best hotels and guest house deals in Mirpur with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/mirpur-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">MIRPUR TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Mirpur
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Mirpur is located in Azad Kashmir, this city is the largest city of Azad Kashmir. The city has huge beautiful and modern structured buildings as huge investment has been spent on this city from expats. There are numerous restaurants, shopping malls, and hotels in Mirpur. The climate of Mirpur is quite pleasant that adds more value to the trip of the travelers.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Ramkot Fort</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Ramkot Fort is situated alongside the Mangla dam. This place is considered to be must visit attraction as love the idea of taking a boat to get to this destination. When travelers visit this fort, they can easily get to Dadyal town and explore it, as it is 30 minutes walk. The Ramkot fortification is constructed over an old Hindu Temple; moreover this fort is surrounded by the River Jhelum.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Mangla Fort</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Mangla Fort is situated on a hill. This is also a must visit attraction for the breath taking view, it is the most peaceful part of this city. Tourits love to visit this place and enjoy a cup of tea while watching the flow of water.</p>
                            <p class="fspx-12 m-0 p-0">Mirpur has numerous food courts and restaurants as well as food stalls. The recipes and dishes of  Mirpuri are similar to Punjabi dishes along witht that in Chowk Shaheed, there is a huge shopping area that consists of stores, plazas, and local shops where traditional and cultural items are available. To accommodate tourists, there are several hotels in Mirpur as well as 3 star hotels in Mirpur. Ktown Rooms comes under the category of cheap hotels in Mirpur with standardized services.</p>
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