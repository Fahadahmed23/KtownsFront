@extends('layouts.default')
@section('title', "Hotels in Multan | Guest House In Multan | Ktown Rooms") 
@section('description', "Book a hotels in Multan, get the best hotels and guest house deals in Multan with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/multan-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">MULTAN TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Multan
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Multan is Pakistan's third biggest city by land and it is fifth largest population. The city is situated on the banks of the Chenab River of the country. Multan is known as the City of Sufis due to the substantial number of Sufi holy people from the city. The city is covered with bazaars, mosques, holy places, cultural places and lavish tombs. It is the origin of Fariduddin Ganjshakar famously known as Baba Farid, perceived as the primary significant poet of the Punjabi language. The Sutlej River isolates it from Bahawalpur and the Chenab River from Muzaffar Garh. The city has developed to turn into a persuasive political and efficient community for the country, with a port and amazing transport links. The culture of Multan has some important components that structure its personality.</p>
                <p class="fspx-12 m-0 p-0">Ktown Rooms has put together all the must-visit attractions at one place to help you out from not missing any amazing place with accommodation in cheap hotel rooms and best guest house in Multan.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Shrines & Monuments</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Just the wholehearted fan of Islamic architecture could completely enjoy all of the Multan's tombs, shrines and mosques in a short-lived. Some are hidden in the old township; north of Pak Gate (Circular Rd) is Wali Muhammad Mosque (1758) and Phulhattan Mosque (1720), toward the northwest is the wonderfully tiled Tomb of Yusuf Gardezi and at the south there is Tomb of Musa Pak Shahid. There are also few destroyed Hindu temples in the city. Usually travelers who are crazy for architecture must visit this place.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Qasim Bagh Fort</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Multan's most famous milestone is Qasim Bagh Fort close to Hussain Agahi and Chowk Bazaars. In the fort is the Qasim Bagh Stadium that once in a while has cricket matches.</p>
                            <p class="fspx-12 m-0 p-0">Aside from the shrines, Qasim Bagh’s beautiful greenery after which it is named as Baagh, and the huge Qasim Bagh Stadium lies toward the south. In spite of the fact that you can in any case walk almost the entire way around the demolished walls, the most amazing part remains entrance from Kutchery Rd, a major hub of Multan.</p>
                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Eidgah Mosque</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">The grand Eidgah Mosque, covering a land of some 73m by 16m, was developed in 1735 and was later utilized by the Sikhs as a military army. Thusly, the British utilized it as a court, but it was reestablished to its original purpose in 1891 and today has probably the best blue tilework in Multan. The mosque is around 1km north of Qasim Bagh Fort.</p>
                            <p class="fspx-12 m-0 p-0">If you are planning your trip, your main concern would be to save money as much as you can. For that purpose Ktown Rooms offers cheap hotels, 3 star hotels, and best guest houses in Multan; moreover, it is impossible for you to visit them all in a day. You definitely need a place where you can rest after a busy day in Multan. If you are searching for a cheap hotel room in Karachi, then you have come to the accurate place.</p>
                            <p class="fspx-12 m-0 p-0">We at Ktown Rooms, ensure that your trip and your stay in Multan is a comfortable one. We provide you with the best hotel options from the cheap hotel industry of Multan. We take care of all your needs like air-conditioning, Wi-Fi, breakfast and can even find you a hotel near all the major attractions.</p>
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