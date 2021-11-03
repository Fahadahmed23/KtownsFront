@extends('layouts.default')
@section('title', "Hotels in Faisalabad | Guest House In Faisalabad | Ktown Rooms") 
@section('description', "Book a hotels in Faisalabad, get the best hotels and guest house deals in Faisalabad with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/faisalabad-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">FAISALABAD TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Faisalabad
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Faisalabad is a beautiful city to visit and once there, there are various must visit attractions to visit while you are on a trip. One of the first and must visit attraction in Faisalabad is clock tower. The tower, built at the season of the British Raj; however it is still in its original development state. For the travelers who love architecture, Faisalabad is a magnificent place for that purpose.</p>
                <p class="fspx-12 m-0 p-0">Accordingly to a report of 2010, Faisalabad is well known for being a best place to establish your business. It is home to a several ventures like colleges, must visit attractions for tourists and amusement parks. Faisalabad is also popular for eminent production of cotton, wheat, sugarcane and fruits. Faisalabad is also famous for its affiliation with famous celebrities like, Arfa Karim,Rameez Raja and Nusrat Fateh Ali Khan.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Clock Tower</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">The Faisalabad Clock Tower is called Ghanta Ghar - is an old building in the city. It was constructed in 1903 by the British, and has been well maintained making it a best and most beautiful, monuments in Faisalabad. The clock tower is a gigantic red block structure at the centre of local market of the town. From the highest point of the tower, you can see the beauty of the whole city – it is totally charming.</p>
                            
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Lyall Monument</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">The Lyall Monument is situated in the Jinnah Garden in Faisalabad. The milestone was constructed in memory of Sir James Lyall, who established the city. It is a white structure building that looks like the church tower.</p>
                            
                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Gatwala Wildlife Park</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">The Gatwala Wildlife Park is a massive wildlife park located in the Gatwala town in Faisalabad. The must see attractions in the park are the green fields, rides for youngsters, canals, bamboo, forest, cafeteria and two lakes. These lakes are popular for being home to crocodiles and boating experience.
                                Being a business center, huge numberof visitors and tourists in the area are businessmen searching for the best hotels in Faisalabad and fortunately Faisalabad has several hotels in Faisalabad. Ktown Rooms also offer hotels in Faisalabad, Ktown Rooms fills the gap between luxury hotels in Faisalabad like Garvaish Luxury inn and Hotel One Faisalabad and Local hotels in Faisalabad. It provides you with the best hotel options from the cheap hotel industry of Faisalabad. We take care of all your needs like air-conditioning, Wi-Fi, breakfast and can even find you a hotel near all the major attractions.
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