@extends('layouts.default')
@section('title', "Hotels in Chilas | Guest House In Chilas | Ktown Rooms") 
@section('description', "Book a hotels in Chilas, get the best hotels and guest house deals in Chilas with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/chilas-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">CHILAS TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Chilas
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0"><p>Chilas goes under Gilgit-Baltistan, it is a small town. It is a portion of the Silk Road connected by the highway Karakoram which joins it to Islamabad in the south by means of Dassu, Besham, Battagram, Mansehra, Abbottabad, Haripur, and Hasan Abdal. In the north, Chilas is associated with the Chinese cities of Tashkurgan and Kashgar through Gilgit, Aliabad, Sust, and the Khunjerab Pass.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <p class="fspx-12 m-0 p-0">The climate is dry and warm in the summers and cold in the winter. It is reachable from Kaghan valley as well. Chilas is an hour away from Babusar Pass, which is hotter than Naran. Things that are important is to drink enough water to prevent sickness, and dress coolly! Tourism is on its peak in winters as they usually visit in winter vacations due to hot weather in summers.</p>
                    <p class="fspx-12 m-0 p-0">There are just two hotels in Chilas that are permitted for foreigners: Shangrila Hotel and Panorama Hotel in Chilas. These hotels are lavish, and are charged accordingly; however they also offer discounts. Keep enough money, as there is no ATM facility. Ktown Rooms has solved this issue, they offer best hotels in Chilas as well as cheap guest houses in Chilas with full security for all the tourists coming from different part of countries. It provides tourist free Wifi, free breakfast, Air conditioners, and a lot more in affordable prices.</p>
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