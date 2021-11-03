@extends('layouts.default')
@section('title', "Hotels in Muzaffarabad | Guest House In Muzaffarabad | Ktown Rooms") 
@section('description', "Book a hotels in Muzaffarabad, get the best hotels and guest house deals in Muzaffarabad with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/muzafarabad-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">KARACHI TOP MUZAFFARABAD
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
                    <h3> <strong>Hotels</strong> In Muzaffarabad
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Muzaffarabad is the capital of Azad Kashmir in Pakistan. It lies on the banks of the Jhelum and Neelum rivers. In1999, the population increased to around 750,000. Muzaffarabad was named after its founder, Sultan Muhammad Muzaffar Khan, who was from Bamba Tribe. Residents in Muzaffarabad usually speak Punjabi and Kashmiri. To make the stay of all travelers memorable and comfortable, they have constructed best hotels and best guest houses in Muzaffarabad at low rates.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. The Red Fort</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Sultan Muzaffar Khan, the originator of Muzaffarabad city, completed the development of the Red Fort in 1646. The Dogra rulers further recreated and expanded the political and military tasks. The architecture of the fort shows a smooth design and structure. It is covered on three sides by the Neelum River also known as the Kishan Ganga River with steps leading to the banks of the river.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Pir Chinasi</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Pir Chinasi is found in the east of Muzaffarabad. It offers travelers with a beautiful view of Muzaffarabad and is a top rated choice! The lush green peak is perfect for climbing, trekking and outdoors activities. The travel industry has developed cheap hotels, best guest house at Saran, found 30 kilometers east of Muzaffarabad city on the highest point of a hill.</p>
                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Chikaar</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Chikaar is an amazing summer station or a vacation spot found 46 kilometers from Muzaffarabad. A number of best hotels in Muzzafrabad as well as guest houses in Muzzafrabad are accessible here for travelers to make their stay comfortable and to make their trip memorable.</p>
                            <p class="fspx-12 m-0 p-0">If you are traveling far away from your city to enjoy your vacations you would definitely need a place to stay in Muzzafrabad. For this purpose, Ktown Rooms has developed their cheap hotels and guest houses in Muzzafrabad to serve the needs of the travelers coming for vacations. Along with comfortable accommodation Ktown Rooms offers air conditioners, 32” LED, Wifi, breakfast and a lot more.</p>
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