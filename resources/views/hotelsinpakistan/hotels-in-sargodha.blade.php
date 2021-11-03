@extends('layouts.default')
@section('title', "Hotels in Sargodha | Guest House In Sargodha | Ktown Rooms") 
@section('description', "Book a hotels in Sargodha, get the best hotels and guest house deals in Sargodha with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/sargodha-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">SARGODHA TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Sargodha
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Sargodha is the city of Punjab and was established in 1940. 'Sar' means lake and 'Godha' means Hindu man who lived close to the lake. Sargodha is normally known as the city of eagles because of its strategic defensive area and because of PAF Base Mushaf.</p>
                <p class="fspx-12 m-0 p-0">People of Sarghoda are extremely devoted and support the Pakistani Army and Air Force. Education is considered so important in the country which is why it is widespread in Sargodha as well as in rural area. The city is popular for furit production and it is rich in producing orange.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Kirana hills</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">In Punjab, Kirana hills is the undersized mountain range with extreme temperature of 50°C and as low as 0°C. Highest peak is around 300m. These hills have been utilized as test destinations by the Pakistani Army.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Sargodha Stadium</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Stadium in Sargodha is a national stadium that goes back to the 1950's. It is well known for being the hosting the match of Pakistan v/s Sri Lanka in 1991-92 where won the match. It is also utilized as a place for games or local functions.</p>
                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Anwaar Lake</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Anwaar Lake is situated close to Shaheen Abad, Sargodha. The lake is covered with Sandstone Rocks which gives a beautiful view and peaceful environment. This spot is crowded by travelers as well as residents’ friends and families. If you are planning to visit Sargodha, this place is a must visit place.
                                There are varieties of restaurant and hotels in Sargodha that are surrounded by travelers. It includes Karana Bar Restaurant and Khayam Chowk. Tourists coming from different part of countries must visit this place to try samosas and pakoras from Khayam Chowk. In addition to this there are several local bazaars in the city for the tourists like Kachehri Bazaar and Anarkali Bazaar. Finding a luxury hotel in Sargodha is easily accessible as there are several luxury hotels but number of cheap hotels in Sargodhawith standardized services is quite low. Ktown Rooms identified these issues, and now it offers best cheap hotels in Sargodha as well as guest houses in Sargdha with standardized services that are ideal for comfortable stay. It provides free breakfast, free wifi, fully air conditioned rooms, 32” LED and more at low rates.
                            </p>
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