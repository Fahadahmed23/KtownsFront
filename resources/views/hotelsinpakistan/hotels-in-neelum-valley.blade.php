@extends('layouts.default')
@section('title', "Hotels in Neelum Valley | Guest House In Neelum Valley | Ktown Rooms") 
@section('description', "Book a hotels in Neelum Valley, get the best hotels and guest house deals in Neelum Valley with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/neelum-valley-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">NEELUM VALLEY TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Neelum Valley
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Neelum Valley is around 200 kilometers in length and located in the North and North East of Muzaffarabad beside Kaghan Valley. Phenomenal attractiveness, and beautiful view, stunning hills on the two sides of the Neelum River, forests, charming and attracting streams make the valley even more stunning.</p>
                <p class="fspx-12 m-0 p-0">This place is best for trekking. Transportation is available on this route and hotels and guest houses in Neelum Valley for the accommodation of tourists to make the tourist attractions easily accessible to the travelers; however, in order to make special dishes by yourself, these hotels lack in providing facilities to cook.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Kutton</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">The peaceful attractiveness of Kutton, It is located 16 kilometers away from Kundal Shahi. It is accessible by a smooth road. As this is the place that is mostly visited and considered to be the must visit attraction for this purpose, the tourism department has constructed huts near Kutton to accommodate the tourists.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Authmuqam</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Authmuqam is located 10 kilometers away from Kundal Shahi at a height of 1371 meters. It is the sub-divisional headquarter of the area and tourist point attracted because of climbing and exploring the valley. It is a must visit place known for its richness in natural products. All the necessity facilities like local markets, banks, clinics, telephone and hospitals are easily accessible by this spot.</p>
                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Neelum</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Neelum is located on the right bank of the Neelum river. It is populated with one thousand people, It has several bazaars and several guest houses and hotels located nearby Neelum river for the tourists to give them a beautiful view and atmosphere.</p>
                            <p class="fspx-12 m-0 p-0">The flourishing green valley, fresh fruits, stunning view and wildlife attract the tourists from every part of the country. This place is in the radar of the Tourism Department in order to construct several huts cafeteria, guest houses, and hotels in Neelum Valley.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>4. Sharda</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">It is a must visit attraction at a height of 1981 meters. Shardi and Nardi are two mountain tops in the valley, this valley is named after legendry princess Sharda, it has attractive and lush green scenery, covered with hills and trees.</p>
                            <p class="fspx-12 m-0 p-0">The travel industry is working on developing this spot for the tourists; it has been constructing several guest houses, hotels in Neelum Valley to increase tourism. Ktown Rooms also opened its hotels and huts in Neelum Valley to add more value in this valley and to increase tourism. It offers a quality services all the tourists to make them feel comfortable.</p>
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