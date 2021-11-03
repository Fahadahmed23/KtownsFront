@extends('layouts.default')
@section('title', "Hotels in Swat| Guest House In Swat | Ktown Rooms") 
@section('description', "Book a hotels in Swat, get the best hotels and guest house deals in Swat with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/sawat-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">SWAT TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Swat
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Situated in KPK, the city of Swat is famous for traveler center point. From Alexander the Great, to Buddhists and now Muslims – Swat is considered as home to all. In this way, in Swat there are a great number of buildings,  and other components which have a place with diverse culture and time zones. Foot prints of Buddha are found in the museum of Swat.</p>
                <p class="fspx-12 m-0 p-0">The valley of Swat is encircled by high mountains, in its north there are Chitral and Ghizer and in its south there are burner district and Malakand zone. Kohistan and Shangla are in the East, and upper Dir areas in the West – it is surrounded by beauty. The area around the Swat valley comprises for the most part of Pashtuns, Gujjar and Kohistani clans with the Pashto language being the most utilized around the area. Towns around the Swat valley incorporate Mingora and Saidu-Sharif (the capital of the Swat area).<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>Swat Museum</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">The Swat Museum is between the towns of Mingora and Saidu. Japan had furnished the museum with help, to enhance and increase the collection. There are accumulations of Gandhara models taken by Buddhist destinations in Swat, illustrating Buddha's biography. Also there are utensils, valuable stones, weapons and so forth from the Gandhara accumulation.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>Saidu Sharif</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Found near the valley, and just 2 km from Mingora, is the well known town of Saidu Sharif. This is a perfect spot for picnics as there is simply greenery all around.  There are spots to remain here, where one can truly appreciate the beautiful magnificence of Swat.</p>
                        </li>
                        <br>
                        <li>
                            <h3><strong>Mahodand Lake</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Mahodand lake is also called the "lake of fish," it is situated in the Usho Valley of Swat. It isn't accessible by vehicle, yet you can get there by a four wheeler, and partake in exercises which the lake is popular for, for instance, boating and sailing.</p>
                            <p class="fspx-12 m-0 p-0"> To increase tourism they have offered several cheap hotels, 3 star hotels and guest houses in Swat. When you are visiting Swat, it is obvious you will need a place to stay. Instead of spending all your money on those expensive hotels, Book your room with Ktown Rooms and avail its budget hospitality services in Swat. Ktown Rooms is well known for best cheap hotels in Swat with standard services. It gives you complete amenities like free Wifi, free breakfast, LED, Air conditioners and more. Ktown Rooms understands your problems and it provides with best solution.</p>
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