@extends('layouts.default')
@section('title', "Hotels in Karachi | Guest House In Karachi | Ktown Rooms") 
@section('description', "Book a hotels in Karachi, get the best hotels and guest house deals in Karachi with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/karachi-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">KARACHI TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Karachi
                        <!--<span>Choose from variety of styles</span>-->
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Karachi is known as City of Lights, it is always awake and the people in the city never seem to sleep. A vivid and vibrant symphony of colors, old architecture, new architecture and one of the most diverse populations in the entire country, it is hard to resist the temptation to visit Karachi.</p>
                <p class="fspx-12 m-0 p-0">As busy and chaotic as Karachi is, it has so many attractions to offer that you completely forget about the dizzying and frantic nature of the city and become mesmerized by the fun and excitement you can enjoy, and to visit those attractions you would need an accommodation. There are several guesthouses and cheap hotels in Karachi. If you are wondering what those attractions are, you are in luck. Ktown Rooms has put together this list of places to visit in Karachi before your trip to the City of Lights.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Mohatta Palace</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Culture, art, architecture and history all come together in the most perfect combination to provide you one of the most fantastic experiences you can get in the City of Lights. Built and originally owned by a Hindu prince back in the early 20th century, the Rajasthani design of the Mohatta Palace is a true sight to behold in itself.</p>
                            <p class="fspx-12 m-0 p-0">Now used as a museum and an art gallery, the Mohatta Palace houses historical relics of the region. You also get to enjoy some of the most thought-provoking works of art in the gallery like the permanent display of one of Pakistan’s greatest artists ever, Imran Mir.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Churna Island and Water Sports</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">There is no point in coming to a coastal city on vacation if you do not get to enjoy the vibrant beauty that the sea life has to offer. That is why one of the must-visit attractions in Karachi is the Churna Island. Just a couple of hours drive and a small boat ride away from the city, Churna Island is where you can swim, snorkel, cliff dive and even scuba dive around the beautiful reef of the island.</p>
                            <p class="fspx-12 m-0 p-0">Gaze at the sea life from various colorful fishes to sea snakes and even the famed sea turtles that inhabit the waters around the Churna Island. This is something you cannot miss out on when you’re visiting Karachi.</p>
                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Quaid-e-Azam House Museum</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">You can also get to know a little more about the founder of the nation of Pakistan, Quaid-e-Azam Muhammad Ali Jinnah whose personal history is completely immersed with the history of the country itself. Embark on the quest to get an insight on the founding leader of our country through a visit to the Quaid-e-Azam House Museum.</p>
                            <p class="fspx-12 m-0 p-0">This place was Fatimah Jinnah’s residence and presently serves as a museum, which will provide you a guided tour and you won’t even have to worry about the entrance fee either. It is completely free for you to visit. Bask in the glory and admire the beauty of this colonial era building and the peaceful gardens around it next time you visit Karachi.</p>
                            <p class="fspx-12 m-0 p-0">Experiencing all of these must-visit attractions in Karachi is not something you can do in a day. So if you are here in the City of Lights to explore and enjoy the sights and sounds of this chaotic and beautifully paradoxical city, you will definitely need a guest house or cheap hotels to stay. KTown Rooms provides services of best hotels in Karachi, it allows travelers to book instantly from cheap hotels in Karachi. It is located in multiple locations like hotels near airport, hotels near Shahre Faisal, hotels near PECHS and a lot more.</p>
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
                                                <a href="{{ url('details/'.$hotel['Slug']) }}"><h3 class="fw-bold mbpx-10" style="color:#000;"><?php echo $hotel['HotelName']; ?></h3></a>
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