@extends('layouts.default')
@section('title', "Hotels in Mansehra | Guest House In Mansehra | Ktown Rooms") 
@section('description', "Book a hotels in Mansehra, get the best hotels and guest house deals in Mansehra with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/mansehra-cover.png);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">MANSEHRA TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Mansehra
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <br>
                <p class="fspx-12 m-0 p-0">Mansehra is a city that belongs to Khyber Pakhtunkhwa. The word Mansehra is a Hindi word "Mahaan Sehra" meaning 'flowers in abundance'. It is considered to the most beautiful cities in Pakistan and is known as Paradise on Earth with beautiful scenery and greenery. The place was considered International tourism spot before but due to some security issues ratio of international tourism has decreased.<span id="dots">...</span></p>
                <div id="more">
                    <p class="fspx-12 m-0 p-0">Makra crest is a Himalayan mountain that is situated at a distance of around 70 km from Mansehra. It is covered with snow in a spider web pattern, after which it is named as Makra. Travelers trek for 5 hours and reach the highest point of the mountain, Makra top. The travelers can enjoy the enchanting view from the Kaghan Valley on one side and exciting Kashmir on another from the top.</p>
                    <p class="fspx-12 m-0 p-0">Mansehra is a beautiful place with natural beauty. Everyone knows about Naran, Kaghan, Lala Zar, Shogran, Balakot and so on, however there are more must visit places like Kund Bangla, Darband, Siri, Siran Valley, Pakhal Valley, Konsh valley.
                        When travelers reach Mansehra, as  they all are aware of the famous spot that is lake Saif-ul-Muluk, but they don't know about another beautiful lake that is Lake Dudipat, This is one the most stunning lakes of the world. This lake isn't easily accessible. The guest needs to head out on jeep to Jilkhad and after that a walk of 6 hours to reach the spot.</p>
                    <p class="fspx-12 m-0 p-0">There are various historical places in Mansehra. Kaghan is popular for its lovely weather in summer, travelers come to watch its delightful views. The other popular villages and must visit places in Mansehra are Baffa, Shinkiari, Dhodial, Battal, Bhogarmang, Phulra, Oghi, Shergarh, Darband, Gulibagh, Ichrian, Ghari, Habibullah, Jabori, Chutter, Dadar, Khaki and Kaladhaka.</p>
                    <p class="fspx-12 m-0 p-0">Ktown Rooms resolves security issues to increase tourism offers a wide variety of safe, and cheap hotels in Manshera. They give best services at affordable prices when you book your room. It is a well known hotel in Manshera for low rates; moreover, it is also known for best cheap hotel and best cheap guest houses in Manshera.</p>
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