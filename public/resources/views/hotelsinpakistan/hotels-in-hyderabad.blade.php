@extends('layouts.default')
@section('title', "Hotels in Hyderabad | Guest House In Hyderabad | Ktown Rooms") 
@section('description', "Book a hotels in Hyderabad, get the best hotels and guest house deals in Hyderabad with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/hyderabad-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">HYDERABAD TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Hyderabad
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">In Sindh, second largest city is Hyderabad after Karachi.  This city has several must-visit places and vacation spots to offer to the tourists.  The climate of Hyderabad is relatively hot; the best time to visit Hyderabad is winters as the weather is quite pleasant. It’s around 25 C during day time and below 11 C during nights. Hyderabad is rich in culture and traditions; it is surrounded by traditional shops, markets, desi food streets, events, and games. The most important factor that this country serves is a passage between rural and urban. When you are in Hyderabad you cannot miss all the cultural activities, to make your trip comfortable, safe and secure this city offers best guest houses in Hyderabad, 3 star hotels, and cheap hotels.</p>
                <p class="fspx-12 m-0 p-0">If you are wondering what are the must-visit attractions in Hyderabad or which places to visit in Hyderabad, You have landed on the accurate page, as Ktown Rooms has list down all the must-visit places to make your plan simpler and easier.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Sindh Museum</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Sindh Museum has collected cultural religious and historical importance objects and materials, and they have preserved and presented them to the public for education, study and enjoyment purposes.</p>
                            <p class="fspx-12 m-0 p-0">This museum was established in 1971 to preserve all the record of cultural history, it was created in the public interest. They connect with their guests or tourists; encourage further understanding, entertainment and sharing of historical and cultural heritage.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Kotri Barrage</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">The Kotri Barrage also called Ghulam Muhammad Barrage, was started in 1955. It is close to Hyderabad and is almost 3,000 feet (900 meters). The right-bank channel gives excess to extra water to the city of Karachi, and controls the pressure of water to protect from floods.</p>
                            <p class="fspx-12 m-0 p-0">Tourists stop by the Kotri Barrage to enjoy the peacefulness and cold breeze around the river. There is no entry fee if you are looking for a peaceful place then must visit Kotri Barrage.</p>
                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Rani Baagh</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Rani Bagh (Hyderabad Zoo) is a garden situated in Hyderabad. It was built up as a garden in 1861 by the Agro-horticultural Society and later animals were brought. It is spread over 53 acres land, divided into four. It was named after Queen Victoria of England of that time - Rani signifies "Ruler" and Bagh implies garden.</p>
                            <p class="fspx-12 m-0 p-0">Rani Bagh is a well known must visit spot for the tourists of Hyderabad. The bagh is partitioned into four that includes Eidgah (an outside mosque with delightful pink minarets to perform prayers), Abbas Bhai Park, zoo and yards, youngsters’ parks, running tracks with numerous nourishment stalls.</p>
                        </li>
                    </ul>
                    <p class="fspx-12 m-0 p-0">There are several guest houses and cheap hotels in Hyderabad but a security issue has been raised by the tourist that is being resolved by Ktown Rooms. It is a well-known brand in Hyderabad that offers best cheap and safe hotels with complete packages at guaranteed low prices. 
                        In addition to this it offers free Wifi, free breakfast, Air conditioners, 32” LED to fulfill all the needs of the customers and make them feel comfortable.
                    </p>
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