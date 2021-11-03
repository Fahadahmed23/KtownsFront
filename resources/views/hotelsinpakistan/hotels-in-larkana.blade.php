@extends('layouts.default')
@section('title', "Hotels in Larkana | Guest House In Larkana | Ktown Rooms") 
@section('description', "Book a hotels in Larkana, get the best hotels and guest house deals in Larkana with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/larkana-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">LARKANA TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Larkana
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Larkana is located in the north-west of Sindh. Larkana is mostly surrounded by Sindhis. The Sindhies exceed all other tribes who spak different languages such as Urdu, Baluchi, Brohi, Punjabi, Pashto and Seraiki. Sindhies are usually found wearing Ajrak and Sindhi topi, Ajrak is the identity of sindhies. When you are visiting Larkana, you should keep weather of Larkana in consideration – Larkana encounters the highest temperature in summer and incredibly low in winter, 53.5 °C to - 2 °C separately.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Mohenjo Daro</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Mohenjo Daro is a must visit attraction alongside the decrease of the Indus valley civilization. It was discovered again after 3700 years and some worthy ancients found were priest-ruler, necklace, Buddhist stupa, and significantly more, that speak of its history.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Garhi Khuda Buksh</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Garhi Khuda Buksh is a village situated in Larkana and it is a home to the Mausoleum of Bhutto family. It is a must visit attraction among all the visitors who  are coming from different parts, they must visit their graves.  Graved of Shah Nawaz Bhutto, Zulfiqar Ali Bhutto, Murtaza Bhutto and Benazir Bhutto are buried in Garhi Khuda Baksh.</p>
                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Shahnawaz Bhutto Public Library</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">This library was established in 1984 and it is values to the great extent as it gives knowledge and education to the people in general. This library has more than 8000 books of authors, it also offers a complimentary service of internet café in the library which gives a peaceful environment to the book readers. The library intends to set up a historical museum later on. Book worms never miss out on this library whenever they visit Larkana.</p>
                            <p class="fspx-12 m-0 p-0">Larkana is blessed with agriculture crops and fruits. Tourists love to eat outside as the restaurants in Larkana are crowded with tourists. The popular hotels in Larkana are Mehran Restaurant and Al Mansoor Hotel. Larkana has different local shops, markets and shopping centers. Clothing based on Ajrak Patterns are also found here. Being one of the must visit cities and must visit attractions, Travel industry of Larkana has constructed several hotels in Larkana. Ktown Rooms adds up more guest houses in Larkana and best cheap hotels in Larkana to increase tourism in Larkana by providing standardized services. Ktown Rooms also provides breakfast, 32” LED, fully air conditioned rooms, Wifi and a lot more.</p>
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