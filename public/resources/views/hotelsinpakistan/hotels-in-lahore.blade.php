@extends('layouts.default')
@section('title', "Hotels in Lahore| Guest House In Lahore| Ktown Rooms") 
@section('description', "Book a hotels in Lahore, get the best hotels and guest house deals in Lahore with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/lahore-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">LAHORE TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In LAHORE
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">All over Pakistan, Lahore has brought a strong cultural influence. Lahore is famous for cultural activities, artifact and desi food, it has so many must-visit places to offer that you completely forget about traffic and become captivated by the fun and excitement you can enjoy. Pakistan’s major centre for publishing and literary is Lahore; moreover, this city has some leading universities. It also hosts the tourists with some must-visit attractions like Badshahi Mosque, Minar e Pakistan, Wagha Boarder, Sheesh Mahal, Wazir Khan Mosque, and a lot more.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Badshahi Mosque</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">The Badshahi Mosque is a Mughal era mosque in Lahore, It is the capital of Punjab (Pakistani province). The mosque is located in the west of Shahi Qila along the borders of the Walled City of Lahore, and is generally considered as a prominent attraction of Lahore.</p>
                            <p class="fspx-12 m-0 p-0">The Badshahi Mosque is a significant example of Mughal architecture, with an exterior that is embellished with red sandstone with marble trim. It remains the biggest grand mosque of the Mughal-era, and is the second-biggest mosque in Pakistan.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Minar-e-Pakistan</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Minar-e-Pakistan is a milestone, this milestone is located in the eminent Iqbal Park of Lahore which is one of the country's greatest urban parks. Worked in the midst of the 1960s, it holds a great importance for the country as on this site the Lahore Resolution was passed by the All-India Muslim League on 23rd of March, 1940. This place is most popular among the tourists.</p>
                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Wagha Boarder</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">A trip to Lahore would not be done without a night at the Wagah Boarder. This location denotes the border among Pakistan and its neighbor, India. Every tourists must visit this place to observe the Wagah Boarder performance, which is a military practice/parade performed by both Pakistan and India since 1959. The audience on both sides is something which every visitor should experience before leaving the city.</p>
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
                                                <a href="{{ url('details/'.$hotel['Slug']) }}"><h3 class="fw-bold mbpx-10"><?php echo $hotel['HotelName']; ?></h3></a>
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