@extends('layouts.default')
@section('title', "Hotels in Bagh | Guest House In Bagh | Ktown Rooms") 
@section('description', "Book a hotels in Bagh, get the best hotels and guest house deals in Bagh with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/bagh-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">BAGH TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Bagh
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">The Bagh is a greenest zone due to which it is named as Bagh (Garden). This was set up by the landowner, where the premises of the Forest Department are found now. Resultantly, this area is headquarters now. The area is a mountainous area, it falls in the Himalayas Zone. These ranges are called Pir-Panjal which is at height of 3421 meters above ocean level. Mountains are commonly covered with trees. Two main streams of Bagh are Mahl Nala and Betar Nala.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Sudhan Gali</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Sudhan Gali situated at a height of 2134m above ocean level and few kms away from Bagh. This beautiful spot is famous for camping and it is also famous among those who like climbing/trekking on the Ganga Choti (3045m high mountain).</p>
                            <p class="fspx-12 m-0 p-0">It takes few hours to reach Sudhan Gali from Muzzaffrabad on a jeep. There are two guest houses in Sudhan Gali for accommodations of the tourists that are maintained by by AJK Tourism office and Public Works Department (PWD) individually. Booking of a room is done through their office in Muzaffarabad, strong reference is needed to book a room. Ktown Rooms has planned to construct cheap hotels and gust houses in Sudhan Gali to eliminate this issue, the hotel would accommodate numerous guests and no strong reference would be needed. Booking would be done through website or application; tourists would not have to come to the office to book a room.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Dheerkot</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Dheerkot is wonderful and enchanting spot found 24Km from Kohala. Dhirkot has an incredibly amazing weather. The place is amust visit attraction in Bagh among tourists as it is easily accessible,reasonable elevation and beautiful scenery with Deodar and kail woods.</p>
                            <p class="fspx-12 m-0 p-0">In Deodar, there is an elegant Forest guest house, Tourist Huts and a Log Hut, which are enormously booked by travelers in summer.</p>
                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Neela Butt</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">This must visit place is located at a height of 2000 meters. This place is not only famous for its beauty but also for historical background. There are numerous travelers who visit this place for its historical background and natural beauty. To accommodate those there are several guest houses in Neela Butt.
                            Ktown Rooms is a well known brand in Bagh for cheap hotels and guest houses as it offers best services to the tourists. It provides comfortable stay to the people with free wifi, free breakfast, 32” LED, heater and a lot more.
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