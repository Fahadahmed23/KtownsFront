@extends('layouts.default')
@section('title', 'Hotels in Arang Kel | Guest House In Arang Kel | Ktown Rooms') 
@section('description', "Book a hotels in Arang Kel, get the best hotels and guest house deals in Arang Kel with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/arang-kel-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">ARANG KEL TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Arang Kel
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Across Neelum Valley, small village named as Arang Kel is located. It takes one hour trekking for a normal to reach there from Kel. There are two ways to reach to the highest point of Arang Kel and both tracks are covered with dense forests of pine trees. Trekkers also come across fast flow of water on their way.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <p class="fspx-12 m-0 p-0">In the entire Neelum Valley, Arang Kel is the must visit attraction as it has a magical effect on the tourists. Tourists must book their rooms in hotels of Arang Kel for at least one night as this place offers much more than just the beauty; moreover, the Milky way galaxy at night. When you reach this place, you wouldn’t find a single spot where tourist are not getting their picture captured. Males are usually found awake all night under the open sky to enjoy the cold breeze while playing games, chit chatting and having a cup of coffee.</p>
                    <p class="fspx-12 m-0 p-0">The weather of Arang Kel is pleasant and rainy and sometimes it gets hard for the tourists who do not book a room in the hotels of Arang Kel and decides to spend their night outside because when its rain in Arang Kel, it rains non-stop. The mornings of Arang Kel is quite refreshing as it has a magnificent view.</p>
                    <p class="fspx-12 m-0 p-0">Arang Kel leaves a long lasting impression on travelers’ mind. This village needs to be maintained and kept clean as this place is must visit place because of its long lasting magical effect.  Ktown Rooms wants to accommodate numerous visitors in Arang Kel for that purpose Ktown Rooms has constructed huts and cheap hotels in Arang Kel with best services.</p>
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