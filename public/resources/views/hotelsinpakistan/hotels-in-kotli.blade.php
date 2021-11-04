@extends('layouts.default')
@section('title', "Hotels in Kotli | Guest House In Kotli | Ktown Rooms") 
@section('description', "Book a hotels in Kotli, get the best hotels and guest house deals in Kotli with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/karachi-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">KOTLI TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Kotli
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Kotli is a mountainous area with narrow valleys and turns into high mountains as you walk upwards, they are commonly covered with coniferous trees. There are comfortable vans heading to Kotli, it is a 3 hours drive from islamabad. The entire drive is adventurous and loaded with fun and thrill as the crisscross street is moving along the high mountaineous chain.The weather of Kotli is more moderate than that of Mirpur because of the topography. The river Poonch goes through Kotli and gets connected with Baan River at Brahli. It has a natural beauty with numerous mosques.</p>
                <p class="fspx-12 m-0 p-0">The must visit attractions in Kotli are the three structures Khan-Wali fortifications: Khan-Wali House, Khan-Wali Palace and Khan-Wali Towers. This city is also popular for its mosques and it is often known as Madina-tul-Masajid. In Kotli, the town of Gulhar Sharif is place known for a great spiritualism.  Ktown Rooms has put together more must visit attractions in Kotli here.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Teenda</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Teenda is known for its magnificent viewpoint connected with Metalloid Street, 6 kilometers from Kotli. Tourists enjoy the beautiful view on Kotli City of river Poonch and surrounding of this place. To make it a must visit attraction, Tourism Department has constructed several guest houses and hotels in Kotli to accommodate huge number of tourists in the hotels.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>3. Koi</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Koi is a little town in Kotli. Fresh water flowing through Koi Village giving a wonderful view to the tourists. This place is also famous because it is close to where Dabrian battle took place in which vigorously armed Dogra fighters figured out how to escape to Jammu by following Mhool River
                                Kotli provides hotels, restaurants, and all the basic needs of life in addition to this, it has all the essential facilities like bazaars, banks, clinic, universities, phone and internet cafe. There are numerous hotels in Koi like PWD Rest House, Tourist Rest House at Sarda, one at Teenda;moreover, Ktown Rooms offers 3 star hotels and best cheap hotels in Kotli with best services that makes the trip even more  comfortable. It provides free breakfast, free Wifi, 32” LED, central heater and a lot more.
                            </p>
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