@extends('layouts.default')
@section('title', "Hotels in Ziarat | Guest House In Ziarat | Ktown Rooms") 
@section('description', "Book a hotels in Ziarat, get the best hotels and guest house deals in Ziarat with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/ziarat-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">ZIARAT TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Ziarat
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Ziarat is a hill station and a vacation resort around 130 km away from Quetta. It's the ideal summer trip due its pleasant temperature during summers. Tourism is at its peak in Eid festivals as it usually comes in summers. Ziarat is mainly popular for Quaid-e-Azam Residency, the place where Muhammad Ali Jinnah spent his last months, however it offers several more must visit attractions for tourist in Ziarat. By observing increasing rate of tourism, Pakistan Tourism Development Corporation has a Hotel in Ziarat with 18 rooms. There are other hotels in Ziarat which are relatively cheap hotels in the town.</p>
                <p class="fspx-12 m-0 p-0">The best time to visit Ziarat is from May to September. Other than these months the temperature in Ziarat is cold and dry, and not a best option to be considered for vacations or tour if you do not have equipment’s for the cold weather. Ktown Rooms has eliminated these issues, it provides you with all the equipment’s in the hotels of Ziarat needed for winters. Ktown Rooms offers heaters, breakfast, wifi and more at low rates to increase tourism in winters.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Quaid-e-Azam Residency</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">It is the most popular milestone in the city, a residency where Quaid-e-Azam spent his last few months before he passed away. The structure was initially built in 1892, and is entirely made out of wood. The structure was renovated in 2014 after the attack.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Prospect Point</strong></h3><br>
                            <p>The view from Prospect Point is beautiful. It is at the height of 2713 meters above ocean level and is 6 kms away from Ziarat. At the top, whistling wind through the forest one can see the valley extended in sloped in front. From a cliff, tourists can enjoy watching the hills known as Khalefat, at a height of 3487 meters. There is a small guest house close to prospect point.</p>
                            <p>Ktown Rooms has offered best cheap hotels and guest houses in Ziarat to provide tourist standardized services to make their stay comfortable and memorable even in winters. Book your room in our hotel without any tension.</p>
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