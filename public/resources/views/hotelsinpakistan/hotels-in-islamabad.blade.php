@extends('layouts.default')
@section('title', "Hotels in Islamabad| Guest House In Islamabad| Ktown Rooms") 
@section('description', "Book a hotels in Islamabad, get the best hotels and guest house deals in Islamabad with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/islamabad-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">ISLAMABAD TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Islamabad
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Islamabad is a peaceful city and famous for its pleasant weather. This city also has various attractions to offer to visitors that keep you engaged with those attractions. It is noted for its safety, high standard of living, cleanliness and greenery. There are several reasons for which you will find people from different parts of the country making their way to Islamabad. Be it a vacation, business trip when you are in Islamabad you cannot miss out on its beauty, to enjoy this beauty there are several guest houses and best cheap hotels in Islamabad that makes your stay comfortable. Places that are well-known in Islamabad or Places to visit in Islamabad are Pakistan Monument, Faisal Mosque, Daman-e-Koh, Margalla Hills and a lot more. Ktown Rooms has put together the list of reasons why one should visit Islamabad.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Traditional Bazars</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">One of the most important reasons why you should visit Islamabad is shopping. You might not know about it much right now but once you get here and see countless markets for everything, you will experience why visiting Islamabad is one of the best plans you can do. If there is one thing people frequently say in Islamabad is “Shopping”.</p>
                            <p class="fspx-12 m-0 p-0">There is just so much that they can purchase in the markets without spending much amount from their account balances; they would be crazy not to go crazy over the shopping experience in Islamabad.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Pleasant Weather and Cleanliness</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Visit Islamabad in the monsoons, raining season of this city adds even more value to its beauty. People of Islamabad enjoy the cleanliness of the city which is indeed an important factor for any city. Islamabad has been declared as the second most beautiful city of capital in the world.</p>
                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Margalla Hills</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">The place is located in the North of Islamabad, It is part of Himalyas Hills. Tourists from all over the country come to visit this place in Islamabad. This area is known as the home of birds, the chirping of birds early in the morning makes it even more beautiful. This place is best for early risers and bird watchers. Large number of birds is found in Margalla Hills like sparrows, robins, eagles, hawk, crows, parrots and more. If you’re a bird lover then this place is a must-visit place for you in Islamabad.</p>
                        </li>
                        <br>
                        <li>
                            <h3><strong>4. Daman-e-koh</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Daman-e-Koh is a top hill garden in the north of Islamabad and situated in the mid of  Margalla Hills. It is about 2400ft from ocean level and practically 500ft from the city of Islamabad. It is a most popular attraction for the visitors and residents in the Islamabad.</p>
                            <p class="fspx-12 m-0 p-0">Daman-e-Koh is a midpoint for travelers on their way to the higher view point Pir Sohawa which is situated at the highest point of Margalla Hills at a rise of about 3600ft.</p>
                        </li>
                        <p class="fspx-12 m-0 p-0">To increase tourism they have offered several cheap hotels, 3 star hotels and guest houses in Islamabad. When you are visiting Islamabad, it is obvious you will need a place to stay. Instead of spending all your money on those expensive hotels, Book your room with Ktown Rooms and avail its budget hospitality services in Islamabad. Ktown Rooms is well known for best cheap hotels in Islamabad with standard services. It gives you complete amenities like free Wifi, free breakfast, LED, Air conditioners and more. Ktown Rooms understands your problems and it provides with best solution.</p>
                        <p class="fspx-12 m-0 p-0">In addition to this, Ktown Rooms offers local apartments for rent in case you are far away from your family working or studying, Ktown Rooms solves this issue of renting, it rents out apartments at low prices guaranteed.</p>
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