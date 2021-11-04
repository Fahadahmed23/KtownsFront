@extends('layouts.default')
@section('title', 'Hotels in Abbottabad | Guest House In Abbottabad | Ktown Rooms') 
@section('description', "Book a hotels in Hunza, get the best hotels and guest house deals in Hunza with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/abbottabad-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">ABBOTTABAD TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Abbottabad
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Abbottabad city is a portion of the Hazara area in Khyber Pakhtunkhwa. The city is equal distance away from Islamabad, Rawalpindi and Peshawar. It is a hill station with dazzling climate, standard institutes and it is famous on account of the Pakistan Military Academy-Kakul. Abbottabad is known to be home for literate people moreover the literacy rate is high. The language spoken in Abbottabad is Hindko, which is like Punjabi, alongside Urdu and Pashto. The city is modernizing constantly.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Shimla Peak</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Abbottabad is encircled by hills.  Shimla Peak is in the north and Sarban Peak is in the south. Shimla's cold weather, pine-clad add more value to the beauty of Shimla. Those who love to trek can do trekking and those who do not like to trek could use a traveler jeep from upper Pine View Road to Shimla Peak, commonly called Shimla Pahari in the layman language.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Ilyasi Masjid</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Ilyasi Masjid is an old and well known mosque constructed over the river in Nawanshehr. Nearby the mosque is a lake where individuals can experience paddle-driven boats. In addition to this there is a hill nearby the mosque which is popular among tourists as a must visit attraction in the city.</p>
                            
                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Haripur</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Haripur is a city which is situated towards the south of Abbottabad. Haripur was constructed as a fortress in 1822 by Hari Singh. This place is now used for police station and for government workplace. British cemetery is also present there.</p>
                            <p class="fspx-12 m-0 p-0">The people living in Abbottabad like eating maize, wheat and rice. In this city, desi ghee and lassi are consumed largely. Residents of Abbottabad love hoteling and are very fond of eating. Some of the must visit restaurants are Red Onion and Kaghan Café.</p>
                            <p class="fspx-12 m-0 p-0">Abbottabad is rich in culture, all the markets in Abbottabad are surrounded by traditional items such as Turban, Kraquli, Patti tops and chaddars. Shopping centers and arcades in Abbottabad include Roshan, Deemas, City Center and some more. As Abbottabad is famous for tourist spots, they have several hotels in Abbottabad as well as guest houses in Abbottabad to make the stay comfortable. Ktown Rooms offers best cheap hotels in Abbotabad with high quality services to satisfy the customer and make them spend less on his/her accommodation.</p>
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
                                                <a href="{{ url('details/'.$hotel['Slug']) }}"><img src="{{ url('public/uploads/website/hotels/thumb/'.$hotel['Thumbnail']) }}" alt="<?php echo $hotel['HotelName']; ?>" class="list-img img-fluid"></a>
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
                                                <a href="{{ url('details/'.$hotel['Slug']) }}"><h3 class="fw-bold mbpx-10" style="color:#000;"><?php echo $hotel['HotelName']; ?></h3></a>
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