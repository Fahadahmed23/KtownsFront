@extends('layouts.default')
@section('title', "Hotels in Shorgan | Guest House In Shorgan | Ktown Rooms") 
@section('description', "Book a hotels in Shogran, get the best hotels and guest house deals in Shogran with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/shorgan-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">SHORGAN TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Shogran
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">In the north of Pakistan, Shogran is one of the famous hill stations with lush greenery at 2,362 meters (7,749 ft) above ocean level. It is 34 kilometers away from Balakot which is also a must visit place. This hill station is opened for guests in summers and winters; however, in winters the number of hotels in Shogran opened is quite low because snow covers the valley fully. This issue is eliminated by Ktown Rooms as it offers hotels in Shogran even in winters with complete services as well as central heater. Due to this issue June – August are the peak season, and the weather is quite pleasant during this period in addition to this, the rainy season of Hunza is something everyone should experience. <span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Makra</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">The Makra is a beautiful peak in northern Himalayas of Pakistan. It is just 200 kms from Islamabad. There is a resort with severalhotels in Shogran, the track begins from Siri Lake and finishes at Paye, from this point, the trek of four hours starts to get to the highest point of the Makra. Climbing on the Makra is quite adventurous because of snow and the slope of the mountainsides.</p>
                            <p class="fspx-12 m-0 p-0">Along with this adventurous experience, Makra offers the stunning views of Hazara and Azad Kashmir. This must visit attractionknown as Makra Peak by residents as the snow on the hills looks like a spider which is called Makra in Urdu.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Payee Lake</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Payee Lake is the beautiful lake in Shogran which is surrounded by must visit attractions of Shogran like Makra, Malika Parbat and Musa ka Musala. Tourists are found taking pictures, enjoying hot cup of tea, relaxing near this lake.</p>
                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Siri Lake</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Siri Lake is also found close to Shogran in Siri, while in transit to Payee in Kaghan Valley. It is situated at the height of 8,500 ft. Tourist love this lake because of its peacefulness and breath taking view
                                There are various hotels and guest houses in Shogran that are available at low rate and Ktown Rooms is one of them. This spot also provides the facility of phone services as signals are available. Above mentioned must visit places in Shogra attract families and friends from different parts of the country. Ktown Rooms has constructed their 3 star hotels in Shogran to accommodate increasing number of tourists with standardized services.
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