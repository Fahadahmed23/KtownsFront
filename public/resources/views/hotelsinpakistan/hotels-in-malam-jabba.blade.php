@extends('layouts.default')
@section('title', "Hotels in Malam Jabba | Guest House In Malam Jabba | Ktown Rooms") 
@section('description', "Book a hotels in Malam Jabba, get the best hotels and guest house deals in Malam Jabba with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/mallam-jabba-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">MALAM JABBA TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Malam Jabba
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Malam Jabba is a Hill Station found 8700 feet above ocean level, on the Karokaram mountain. It was initially a skiing resort made by Pakistan Tourism and Development Corporation, however it was destroyed couple of years ago. Malam Jabba is a skiing spot, and there are numerous hotels in Larkana where one can relax on his/her trips as tourists would definitely need a place to stay if they are visiting Malam Jabba away from his/her home.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Skiing</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Malam Jabba has a ski slope of around 800 m with the highest peak of slope. The hotel was constructed with the help of Austria, yet it was destroyed couple of years ago; however it was again constructed in 2014 by Samson Group of Companies to increase tourism.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Ice skating and Trekking</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Tourists enjoy roller and ice skating on the ski hills of Malam Jabba. In case, some travelers do not like skiing they can entertain themselves with different activities. There are two trekking trails situated in Malam Jabba . The first one goes through the Ghorband Valley and Shangla Top and begins around 18 km from where the hotel in Malam Jabba was located. The other trail goes through the Sabonev Valley and is around 17 km from where the hotel was.</p>
                            <p class="fspx-12 m-0 p-0">There are several hotels in Malam Jabba. There are varieties of Pakistani dishes accessible, Chicken Chargha being a most popular dish in Malam Jabba. There are number of luxury hotels as well as cheap hotels in Malam Jabba. Malam Jabba is Safe and secure which is why it is usually crowded with tourists. This Hill station is considered a must visit place by all the travelers in Pakistan. Ktown Rooms also offers their cheap hotels and safe guest houses in Malam Jabba to provide travelers a comfortable stay with standardized services.</p>
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