@extends('layouts.default')
@section('title', "Hotels in Naran | Guest House In Naran | Ktown Rooms") 
@section('description', "Book a hotels in Naran, get the best hotels and guest house deals in Naran with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/karachi-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">NARAN TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Naran
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Naran is a medium-sized town, it is also a most popular vacations spot in Pakistan. People from all over the country come to visit Naran as the weather of Naran is quite chilly even in peak summers when all other cities in country are boiling. To accelerate tourism, Naran offers best guest houses and cheap hotels at low rates. They have plenty of hotels in Naran with spacious rooms, beautiful view and central heater to make you feel comfortable.</p>
                <p class="fspx-12 m-0 p-0">Tourists enjoy the cold breeze of Naran and eye catching greenery, if you pass by the road you come across several stores for everyday necessities goods and groceries. At nights, tourists are usually busy having a bonfire with a cup of tea or with a cup of coffee to enjoy cold breeze. These facilities are provided by the best hotels in Naran.</p>
                <p class="fspx-12 m-0 p-0">This town has various attractions to offer to visitors that keep you mesmerized with those attractions. Places that are most popular in Naran are Saif ul malook and Kunhar river. Tourists never miss out on these two locations.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Lake Saif-ul-Malook</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Saiful Malook lies between mountains, it is easily accessible in summers as roads are clear but it is quite difficult to cover the distance in winters. Situated in the Northern region of Kaghan, near Naran, Lake Saif-ul-Malook is one of the most beautiful lake Saif-ul-Malook of Pakistan, 10,578 feet about ocean level. The lake holds a wide range of fishes, yet the trout fish is generally well known. Saif-ul-Malook is ideal to visit after June, when glaciers open. The best way to achieve the lake is either on a donkey or a jeep since it's situated on the highest point of a hill.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Kunhar River</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Kunhar River is situated around 30 minutes from Naran Valley. The river courses through  Naran, Kaghan, alhad, Balakot, Garhi, Habibullah and Dalola valley and it joins with Jhelum River directly outside Muzaffarabad. Kunhar River is acclaimed for its hydro power generation potential.</p>
                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Babusar Top</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Babusar Top is utilized as a transit between Chilas and Kaghan Valley. It is the top point of Naran and Kaghan valleys with a rise of 13690 feet from the ocean shore. It is snowy in winters and pleasant for the travelers in summers with a normal temperature of around seven degree Celsius. The top gives sky vision to the guests of Kaghan Naran Valley on one hand and high lands of Chilas on the other. It is additionally the most elevated point on N-15 roadway that has south end at Mansehra and north end at Chilas. On the tour packages or tour bundles of Naran Kaghan Valley, Babusar Top is a basic must-visit place, find or follow. For tracking through Naran Kaghan Valley, a traveler can't afford to skip Babusar Top on his/her trip. This top is truly amazing to experience; moreover it is best view from the hotels in Naran.</p>
                            <p class="fspx-12 m-0 p-0">Ktown Rooms offers a wide variety of safe, and budget hotels in Naran. They give best service at affordable prices when you book your room. It is a well known hotel in Naran for low rates; moreover, it is also known for best cheap hotel and best cheap guest houses in Naran.</p>
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