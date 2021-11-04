@extends('layouts.default')
@section('title', "Hotels in Ayubia | Guest House In Ayubia | Ktown Rooms") 
@section('description', "Book a hotels in Ayubia, get the best hotels and guest house deals in Ayubia with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/ayubia-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">AYUBIA TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Ayubia
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">In Ayubia, there are four hill stations, specifically, Khaira Gali, Changla Gali, Khanaspur and Gora Dhaka. These hills are spread over 26 kms and have been transformed into resort named as "Ayubia" and now these hills are considered as the must visit attractions of Ayubia. This place is named after President of Pakistan of that time, late Field Marshal Mohammad Ayub Khan. There are a lot of entertainment facilities that are offered by the Tourism Department to entertain tourists in Ayubia.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <p class="fspx-12 m-0 p-0">The chairlifts at Ayubia has made it a must visit place in the tourists’ list. It takes you to the highest point of Forest Hills. Top point is known as "Neelam View" since River Neelam of Kashmir can be seen from here. At this spot, Ayubia offers luxuries hotels, restaurants and sports facilities. To accommodate huge number of tourists at affordable prices, Ktown Rooms also offers cheap hotels and 3 star hotels in Ayubia with best services.</p>
                    <p class="fspx-12 m-0 p-0">Secondly, National Park in Ayubia is situated with the beautiful Murree Hills. There are huge number of leopards and black bear found in this Park; moreover, it is also a best place to watch birds. The Park is for different species, and has the biggest Koklass and Kalij bird that is found very rarely in Pakistan. There are other various flying creatures found in the forests, for example, the Golden bird, Honey buzzard, griffon vulture, Indian sparrow hawk, Peregrine falcon, Kestrel, pigeons and birds.
                        Lastly, there is another must visit attraction in Ayubia, close to Ayubia Chair Lifts, known as "Baander Point". Huge numbers of monkeys are found here, Tourists stop by to feed them. They are friendly enough that they come on the road and take nourishment and other food items from the tourists. They do not hurt the tourists.
                    </p>
                    <p class="fspx-12 m-0 p-0">If you are visiting a place that is far away from your home, you would definitely need a place to stay. Ktown Rooms offers best budget hotels in Ayubia to accommodate tourists and provide them best hospitality services so that they have a comfortable stay at affordable prices.</p>
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