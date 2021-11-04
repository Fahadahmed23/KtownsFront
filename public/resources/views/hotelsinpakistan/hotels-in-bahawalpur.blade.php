@extends('layouts.default')
@section('title', "Hotels in Bahawalpur | Guest House In Bahawalpur | Ktown Rooms") 
@section('description', "Book a hotels in Bahawalpur, get the best hotels and guest house deals in Bahawalpur with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/bahawalpur-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">BAHAWALPUR TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Bahawalpur
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Bhawalpur is a city situated in the Punjab area of Pakistan. Bahawalpur is the twelfth biggest city in Pakistan with a population of 798,509. The city lies close to the Derawar Fort in Cholistan close to the India’s border, and a gateway to Lal Suhanra National Park. The temperature here is like "desert." As there is no rainfall and the normal yearly temperature is 25.7 °C in Bahawalpur.</p>
                <p class="fspx-12 m-0 p-0">Ktown Rooms has put together two must visit attractions in Bahawalpur so that tourists do not miss out these amazing places.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Derawar Fort</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Derawar Fort is found 100 kilometers (62 miles) from Bahawalpur. This fortification is the biggest and most greatly supported stronghold of Cholistan. The entrance of fort is on its southern, this fort or semi desert is viewed from miles around.</p>
                            <p class="fspx-12 m-0 p-0">Inside Derawar Fort various quarters have been given to Nawab's military. Quarters of the regal family standing inside the fortress are changing into dust. There are holy places of four devout Muslims close to Derawar Fort. The Derawar Mosque having four minaretsand dome is an imitation of Moti Mosque at Red Fort Dehli.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Noor Mahal</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Noor Mahal is constructed in 1875 AD, this mahal is almost one hundred and fifty years, and, is the latest landmark in Punjab to be called Antiquities Act. Pakistan Army took liability of this mahal in 1999 and helped to reestablished and save the structure into its original shape. The structure was announced as a "proctected monument."  Department of Archeology is in charge to preserve this mahal and they have opened it for public, students, delegates, guests, and tourists from different countries.</p>
                            <p class="fspx-12 m-0 p-0">As this place is quite hot, Ktown Rooms has established their best hotels in Bhawalpur and guest houses in Bhawalpur with fully air conditioned rooms to make you feel comfortable in a hot weather not only this Ktown Rooms offers free breakfast, free wifi, 32” LED to make your comfortable in Bhawalpur.</p>
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