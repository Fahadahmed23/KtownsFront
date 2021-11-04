@extends('layouts.default')
@section('title', "Hotels in Gwadar | Guest House In Gwadar | Ktown Rooms") 
@section('description', "Book a hotels in Gwadar, get the best hotels and guest house deals in Gwadar with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/gwadar-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">GWADAR TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Gwadar
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Being a port of Pakistan's city, over the years, Gwadar has begun to be acknowledged for its beauty, magnificence and economic value; moreover, being recognized as one of the significant cities of Pakistan.</p>
                <p class="fspx-12 m-0 p-0">Since decades, when tourists think of planning a trip locally, they usually consider northern zones, and the valleys on the upper side; however, making other urban areas in the south unworthy for the magnificence and beauty they have, isn't right. 
                    Recently Gwadar has drastically risen and has increased much importance than it is visible. With its must-visit attractions coming into notice, it has attracted a lot of visitors, which is increasing consistently.<span id="dots">...</span></p>
                <div id="more">
                    <p class="fspx-12 m-0 p-0">On the Arabian Sea, warm water sea port is located in the region of Balochistan, Gwadar port is located on the oil rich Middle East, central Asian country and Pakistan. It associates Pakistan to all main trading spots, giving it a significant importance.
                        Offering most delightful view on the Arabian Sea with crystal clear water, it is currently pulling in visitors from everywhere throughout the world also the potential business deals that are increasing the development of the port. For example the CPEC project. Gwadar is a noteworthy center point of CPEC, and investment of Chinese in the area so there ought to be much improvement in the coming years.</p>
                    <p class="fspx-12 m-0 p-0">In addition to this there are more places to visit in Gwadar like Hammerhead, Ormara, The sphinx, Princess of hope, Buzzi Pass, Desert, Baba chadrakup, Astola Island, Gwadar Beach and a lot more</p>
                    <p class="fspx-12 m-0 p-0">Along with tourist this city has frequent business travelers as well. They definitely need a place to stay for which Gwadar provides several hotels in Gwadar like Zaver Pearl Continental, Sadaf Resort Gwadar, Marjan Hotel with some best places to eat in Gwadar like Hot box fast food, Super Salatien Resturant. Ktown Rooms offers best cheap hotel in Gwadar with high standard services for business travelers as well as tourists. It is located in the middle of the city that keeps all destinations near to your stay.</p>
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