@extends('layouts.default')
@section('title', "Hotels in Quetta | Guest House In Quetta | Ktown Rooms") 
@section('description', "Book a hotels in Quetta, get the best hotels and guest house deals in Quetta with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/karachi-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">QUETTA TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Quetta
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Quetta, is a very beautiful and vital city of Pakistan. The city is full of beautiful river valleys, the word Quetta means fortress in Pashto. The city is rich in dry fruits and the great amount of pistachios, olives and wild almonds originate from that point. It is essential for trade route, connecting Pakistan with Afghanistan; moreover, this city is mostly occupied by Pashtuns. Pashtu is the main language; however Urdu is also broadly spoken. Quetta is rich in history that pulls numerous tourists towards it.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Hanna Lake</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">The dry weather of Quetta makes Hanna Lake a must visit attraction. The lake offers refreshing spot to enjoy cold water to beat the scorching sun. There are numerous hotels in Quetta, for example, the popular Gardenia Resort Hotel in Quetta nearby to make it simpler and easy accessibility for travelers.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Shahrah e Liaquat</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">A large portion of the popular markets are situated here, and it is paradise for those who enjoy traditional as well as city life. The true colours and culture of Quetta can be seen here. Tourists must visit this place in Quetta to enjoy the culture of this city.</p>
                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Hazarganji Chiltan National Park</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Located in the Sulaiman Mountains, this must visit attraction is considered to be the resting spot of a 'thousand treasure’ they have been left behind by the incredible militaries that went through Quetta couple of years ago, making this park a national heritage.</p>
                        </li>
                    </ul>
                    <p class="fspx-12 m-0 p-0">Tourists will effortlessly find best restuarants in Quetta which serve the most appealing kind of popular Pashtun Roash, and varieties of kebabs which adds more value to the trips. Kandhaari and Liaquat Bazaar in Quetta are the popular shopping areas in Quetta. There are large numbers of different handicraft, Afghani rugs, weaved clothes and tradiational Pakhtun shoes, which are also available here
                        There are several cheap hotels and guest houses in Quetta with different price range, but problem of standardized services is raised by the tourists. Ktown Rooms eliminates this problem by providing cheap hotels in Quetta as well as guest houses in Quetta with standardized hospitality services.
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