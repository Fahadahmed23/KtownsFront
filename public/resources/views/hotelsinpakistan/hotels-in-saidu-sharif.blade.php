@extends('layouts.default')
@section('title', "Hotels in Saidu Sharif | Guest House In Saidu Sharif | Ktown Rooms") 
@section('description', "Book a hotels in Saidu Sharif, get the best hotels and guest house deals in Saidu Sharif with the facilities of Free WiFi, free breakfast, AC, 32″ LED in a room.")
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/saidu-sharif-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">SAIDU SHARIF TOP HOTELS
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
                    <h3> <strong>Hotels</strong> In Saidu Sharif
                        <span>Choose from variety of styles</span>
                    </h3>
                </div>
                <p class="fspx-12 m-0 p-0">Saidu Sharif is the capital of Swat and it is the second largest city after Mingora in Swat. It is the hub of the major buildings such as Swat museum, tomb of Saidu Baba, Royal Residential palace, Jahzaib College (Government Degree College) as well as commissioner house. This city was previously known as “Baligram.”  Weather of is quite mild and pleasant which is ideal for any trip. This is a perfect spot for picnics as there is simply greenery all around.  There are spots to remain here, where one can truly appreciate the beautiful magnificence of Swat.</p>
                <p class="fspx-12 m-0 p-0">Ktown Rooms has mentioned must-visit attractions of Saidu Sharif in this description to give you a quick look on two of themust-visit places in Saidu Sharif.<span id="dots">...</span></p>
                <br>       
                <div id="more">
                    <ul style="list-style: none;">
                        <li>
                            <h3><strong>Swat Museum</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">This Swat Museum had been furnished by Japan, to improve and increase the collection. There are collections of Gandhara models taken by Buddhist destinations in Swat, illustrating Buddha's biography. Also there are utensils, valuable stones, weapons and so forth from the Gandhara collection.</p>
                        </li>
                        <br>   
                        <li>
                            <h3><strong>Saidu Sharif Stupa</strong></h3><br>
                            <p class="fspx-12 m-0 p-0">The Saidu Sharif Stupa, uncovered under the name Saidu Sharif, It is a holy territory of Buddhist situated close to the city of Saidu Sharif, at the foot of the mountains that divide the river Saidu from river Jambil in Swat. It is considered to be the must visit place.</p>
                            <p class="fspx-12 m-0 p-0">Ktown Rooms offers its hospitality services in this city to make these must visit attractions near to your hotel in Saidu Sharifwith complete amenities, Air conditioners, 32” LED and a lot more. Their hotels are the cheapest hotels in Saidu Sharif with standardized services.</p>
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