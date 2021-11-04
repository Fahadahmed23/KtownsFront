@extends('layouts.default')
@section('title', "Hotels in Murree| Guest House In Murree | Ktown Rooms") 
@section('description', "Book a hotels in Murree, get the best hotels and guest house deals in Murree with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/murree-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">MURREE TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Murree
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Muree is known as mountain resort town, it is the famous place in northern areas of Pakistan for tourism, it has become the most popular tourist spot in Pakistan and it has retained tourism since very long. Tourists mostly plan their vacations in winters and stay at cheap hotels and best guest houses in Muree as the weather is quite captivating during winters. Beautiful videos of Muree have been spread all over the internet due to which it has been placed right at the top on adventure tourism list by British Backpackers Society in Pakistan.</p>
                <p class="fspx-12 m-0 p-0">There are several beautiful places to visit in Muree, most visited places in Muree by the tourists are Nathia Gali and Mall road that keep people engaged with its beauty, and peaceful atmosphere. Another undeniable fact about Muree is that the weather never gets too hot. The coastal climate does wonders for the temperature and the constant breeze is a blessing for visitors. While people in all other cities are bearing heat wave, people in Muree enjoys pleasant weather. The fact that there are so many peaceful places accessible to Muree makes it one of the most important reasons why you should visit Muree. To increase tourism they have offered several cheap hotels, 3 star hotels and guest houses in Muree to make you spend fewer amounts on your accommodation.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>1. Food Street</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Of course, how can we forget to mention about food. We know that another Pakistani city supposedly has a name for being the best food street in the country, but the reality is far from it. There are people from different backgrounds and different cultures who come to visit Muree. It has several places where you can eat classic desi food like biryani, chaat, and tikka. The amount of delicious food you can get in Muree is truly unbelievable.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>2. Numerous Shops</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">Muree is also famous for traditional shops, the most famous market in Muree is Mall road where all kind of stuff is available. We all know how crazy Pakistanies are for shopping and they get even crazier when they visit Mall Road in Muree. It is always crowded with visitors getting gifts for their friends and family from Mall road.</p>
                        </li>
                        <br>
                        <li>
                            <h3><strong>3. Secured Guest houses</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">No doubt how beautiful Muree is and how it is a best option to plan your trip in budget, but some major issues have been raised by the visitors of Muree i.e security, facilities and resources. It has been noticed the main concern of the visitors are security, complete amenities, cheap hotels and infrastructure which is being solved by Ktown Rooms. We understand these issues and our team is addressing to these issues through providing standardized services at guaranteed low prices. Ktown Rooms is a well-known brand of cheap hotels in Muree. When you are visiting Muree, you obviously need a place to stay with your friends and family. Ktown Rooms provide family cheap hotels with beautiful interior and exterior, standard products, healthy breakfast, high speed internet, Air conditioner and a lot more.</p>
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