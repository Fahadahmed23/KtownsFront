@extends('layouts.default')
@section('title', "Hotels in Kalam | Guest House In Kalam | Ktown Rooms") 
@section('description', "Book a hotels in Kalam, get the best hotels and guest house deals in Kalam with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/kalam-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">KALAM TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Kalam
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Kalam is a valley situated at a distance of 99 kilometers from Mingora in the north of Swat valley along the bank of Swat River in Khyber Pakhtunkhwa area of Pakistan. Kalam is covered by beautiful green hills, thick forests, waterfalls and stunning lakes which are worth watching the scenery. Weather of Kalam valley is pleasant, warm and calm weather, the normal temperature in Kalam is 13.4 °C. April is the damp month while July is the peak month of summers of the year with a temperature of 24.1 °C. January is the coldest month of Kalam which is why the number of guests are numerous in the hotels of Kalam that increases tourism in April and July.</p>
                <p class="fspx-12 m-0 p-0">Travelers who are coming from different parts of cities wouldn’t want to miss out on the must-visit attractions. Ktown Roomshas listed together all the must-visit attractions here to help you plan your trip perfectly.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Matiltan</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Matiltan is a perfect spot for photography comes after Usho and situated at around 11 km far from Kalam. It is popular for glaciers, timberlands and mountain covered snow. Best part of this place is that you can see tallest peak of Falaksair mountain.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Utror</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Utror hill station is another beautiful spot in Kalam valley which is found 16 km far from Kalam. It is one of the wonderful valleys in the area, mountain covered with snow and a beautiful lake Kundol alongside that adds value to it.</p>
                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Gabral</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Gabral is hill station, comes at a dsitance of 20 km far from Kalam. It is well known for dark colored swati trout fish, rich green forest, springs, snow and delightful lakes, among them Shahi Bagh lake situated in the north west of Sazgul district at around three hours of hikinh/trekking which is very beautiful and and worth watching.</p>
                            <p class="fspx-12 m-0 p-0">As Kalam is the most visited place, problem of guest houses in Kalam, hotels in Kalam so they can easily visit the tourist spots.Ktown Rooms has resolved this issue by constructing huge number of guest houses in Kalam, hotels in Kalam for the tourists. Along with accommodations Ktown Rooms offers free breakfast, free Wifi, fully air conditioned rooms with 32” LED. In addition to this Ktown Rooms’ provides secured guest houses in Kalam as well as hotels in Kalam.</p>
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