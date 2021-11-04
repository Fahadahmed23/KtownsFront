@extends('layouts.default')
@section('title', "Hotels in Gujranwala | Guest House In Gujranwala | Ktown Rooms") 
@section('description', "Book a hotels in Gujranwala, get the best hotels and guest house deals in Gujranwala with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/gujranwala-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">GUJRANWALA TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Gujranwala
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Gujranwala is also called the city of wrestlers (pehelwaano da shehr) for giving best wrestlers to the nation. It is a city situated in Punjab and is the seventh most populated city of Pakistan. It is one of the fastest developing cities and it is one of the essential industrial city. The languages spoken here are simply Punjabi with Urdu. Gujranwala is hot in summers; however, the temperature is quite pleasant in winters. Gujranwala is rich in agriculture of sugarcane, melons and grains which is also exported internationally.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Gurdwara Rori Sahib</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Gurdwara Rori Sahib is 2 kilometers away from Eminabad in south-east, it is between Lahore and Gujranwala. It is a must visit attraction as Guru Nanak had lived here for sometime after the ruin of the town. It is surrounded by beautiful lake in its area and buildings, making the surroundings more appealing.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Nishan-e-Manzil</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">It is a landmark which was made in the memory of soldiers who were martyred in the war of 1965 and 1971. Numerous tourists must visit this place to remember martyrs. The finishing of Nishan-e-Manzil is wonderfully done. There is a boating activity in the lake nearby Nishan-e-Manzil for the travelers to enjoy and entertain themselves.</p>

                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Ghanta Ghar</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">This is the well known clock tower located in Gujranwala. It is the focal point of the city and is commonly populated by the tourists. If you want to travel this city, this is a must visit attraction of this city.
                                There are several Shopping centers like PACE and Aleena shopping centers where you can discover anything you would need to purchase. There is easy access to international food chains along with that there are Desi Cuisines that tourists must visit in Gujranwala are Bundoo Khan, Shahbaz Tikka and Royal Garden that have great ambience and delicious food.
                            </p>
                            <p class="fspx-12 m-0 p-0">Lords hotel and Hotel Tower in Gujranwala are the most popular hotels in Gujranwala. There are several luxury hotels in Gujranwala but very few cheap hotels in Gujranwala. Ktown Rooms has filled this gap by offering best cheap hotels in Gujranwala with standardized services and complete amenities, free breakfast, free wifi, 32” LED and a lot more.</p>
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