@extends('layouts.default')
@section('title', 'Save with KTown | Best Hotels in Pakistan | Budgeted Hotels') 
@section('description', "Ktown rooms is Pakistan's best budgeted hotel network, provides you accommodation in cheap rates. Stay at Ktown Rooms & get AC, Wifi, Complimentary breakfast, cleaned washroom, cable tv & hygienic bed/linen.Lowest Price Guaranteed. Book now and pay later search cheap hotel near you and you will find Ktown.")
@section('content')
<!-- <section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/our-hotels-cover.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">Our Hotels
                    <span class="mb-50">Hotels & Apartments across Pakistan </span>
                </h2>  
            </div>
        </div>
    </div> 
</section> -->

@include('includes/filter-top')
<section class="exp2-main m-0 ptpx-50">
<div class="loader" id="AjaxLoader" style="display:none;">
        <div class="strip-holder">
            <div class="strip-1"></div>
            <div class="strip-2"></div>
            <div class="strip-3"></div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @include('includes/filter-left')
            <div class="col-lg-8">
                <div class="custom-heading mbpx-20">
                    <h3> <strong>Hotels</strong> In <?php
                  if (isset($_GET['Cityname']) ||  Session::get('cityname') !== null ) 
                    { 
                        if(!empty(Session::get('cityname'))  )
                                      {
                                          echo Session::get('cityname');//;
                                      }                
                        else{
                                if(!empty($_GET['Cityname']))
                                  echo $_GET['Cityname'];
                                  else
                                  echo "Pakistan"; 
                         } 
                    
                    }
                    else { 
                        
                        echo "Pakistan"; 
                    }    
                    
                    ?>
                        <!--<span>Choose from variety of styles</span>-->
                    </h3>
                </div>

                <!--<p class="fspx-12 m-0 p-0">KTown Rooms allow travelers to book instantly from 10 hotels in Karachi, as per their choice. If you want an online hotel booking of budget hotels in any specific category, then you have an option of selecting hotels located near Airport or hotels near cant station/railway station in Karachi. KTown rooms offer dedicated elite class budget hotels for business travelers in karachi, however ktown isn’t couple friendly hotel or don’t provide hotels for dates/ or rooms for unmarried couples in karachi</p>
                <a href="javascript:;" class="">Read More</a>
                <h5 class="fspx-14 mtpx-10 fc-lgrey">Price/Room/Night</h5>-->

                <div class="col-lg-12 p-0 pagina">
                    <?php
                    if (count($hotels) > 0) {
                        foreach ($hotels as $hotel) {
                            ?>
                            <div class="rl-box-main pagin mbpx-50">
                                <div class="row mtpx-40">
                                    <div class="col-lg-6 align-self-center">
                                    <div class="">
                                            <div data-si-hover-trigger class="">
                                        <figure class="zoom-limg">
                                           <!-- <a href="{{ url('details/'.$hotel['Slug']) }}"> -->
                                 
                                       
                               <div data-si-mousemove-trigger="999"  class="rooms-slider-for carousel-inner"> 
                                    <?php
                                    if (count($hotel['hotelImages']) > 0) {
                                        foreach ($hotel['hotelImages'] as $hotelimage) {
                                            ?>
                                            
                                                         <img 
                                                         src="{{ url('public/uploads/website/hotels/'. $hotelimage->image) }}" 
                                                         data-src="{{ url('public/uploads/website/hotels/'.$hotelimage->image)}}" 
                                                         data-small="{{ url('public/uploads/website/hotels/'.$hotelimage->image) }}" 
                                                         data-medium="{{ url('public/uploads/website/hotels/'.$hotelimage->image) }}" 
                                                         data-large="{{ url('public/uploads/website/hotels/'.$hotelimage->image) }}" 
                                                         data-retina="{{ url('public/uploads/website/hotels/'.$hotelimage->image)}}"
                                                         alt="<?php echo $hotel['HotelName']; ?>" class="img-fluid list-img">
                                                   
                                         
                                            <?php
                                        }
                                    }
                                    ?>
                                       
                                       </div>
                                        
                                       <!-- </a> -->
                                        </figure>
                                        </div>
                                         </div>
                                    </div>  

                                    <div class="rooms-slider-nav row" style="display:none">
                    <?php
                    if (count($hotel['hotelImages']) > 0) {
                        foreach ($hotel['hotelImages'] as $hotelimage) {
                            ?>
                            <img alt="Image" class="img-fluid" src="{{ url('public/uploads/website/hotels/'.$hotelimage->image) }}">
                            <?php
                        }
                    }
                    ?>
                </div>
                                    <div class="col-lg-6 align-self-center">
                                        <h4>Starting from</h4>
                                        <div class="img-list-content">
                                           <!-- <div class="d-flex mbpx-10">
                                                <?php //for ($i = 1; $i <= $hotel['Rating']; $i++) { ?>
                                                    <span class="fa fa-star fspx-14 fc-org mrpx-2"></span>
                                                <?php //} ?>
                                            </div> --> 
                                            <h4 style="font-size: 20PX;" class=""> PKR <?php echo number_format($hotel['SellingPrice'], 0); ?> <span>/Night </span></h4>
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
                    ?>
                </div>
            </div>

        </div> 
        <hr class="mbpx-0">  
    </div>
</section>

<style>
                /*!
            // 3. Loader
            // --------------------------------------------------*/
                .loader {
                    top: 0;
                    left: 0;
                    position: fixed;
                    opacity: 0.8;
                    z-index: 10000000;
                    background: Black;
                    height: 100%;
                    width: 100%;
                    margin: auto;
                }

                .strip-holder {
                    top: 50%;
                    -webkit-transform: translateY(-50%);
                    -ms-transform: translateY(-50%);
                    transform: translateY(-50%);
                    left: 50%;
                    margin-left: -50px;
                    position: relative;
                }

                .strip-1,
                .strip-2,
                .strip-3 {
                    width: 20px;
                    height: 20px;
                    background: #e79339;
                    position: relative;
                    -webkit-animation: stripMove 2s ease infinite alternate;
                    animation: stripMove 2s ease infinite alternate;
                    -moz-animation: stripMove 2s ease infinite alternate;
                }

                .strip-2 {
                    -webkit-animation-duration: 2.1s;
                    animation-duration: 2.1s;
                    background-color: #eeb477;
                }

                .strip-3 {
                    -webkit-animation-duration: 2.2s;
                    animation-duration: 2.2s;
                    background-color: #f4cda4;
                }

                @-webkit-keyframes stripMove {
                    0% {
                        transform: translate3d(0px, 0px, 0px);
                        -webkit-transform: translate3d(0px, 0px, 0px);
                        -moz-transform: translate3d(0px, 0px, 0px);
                    }

                    50% {
                        transform: translate3d(0px, 0px, 0px);
                        -webkit-transform: translate3d(0px, 0px, 0px);
                        -moz-transform: translate3d(0px, 0px, 0px);
                        transform: scale(4, 1);
                        -webkit-transform: scale(4, 1);
                        -moz-transform: scale(4, 1);
                    }

                    100% {
                        transform: translate3d(-50px, 0px, 0px);
                        -webkit-transform: translate3d(-50px, 0px, 0px);
                        -moz-transform: translate3d(-50px, 0px, 0px);
                    }
                }

                @-moz-keyframes stripMove {
                    0% {
                        transform: translate3d(-50px, 0px, 0px);
                        -webkit-transform: translate3d(-50px, 0px, 0px);
                        -moz-transform: translate3d(-50px, 0px, 0px);
                    }

                    50% {
                        transform: translate3d(0px, 0px, 0px);
                        -webkit-transform: translate3d(0px, 0px, 0px);
                        -moz-transform: translate3d(0px, 0px, 0px);
                        transform: scale(4, 1);
                        -webkit-transform: scale(4, 1);
                        -moz-transform: scale(4, 1);
                    }

                    100% {
                        transform: translate3d(50px, 0px, 0px);
                        -webkit-transform: translate3d(50px, 0px, 0px);
                        -moz-transform: translate3d(50px, 0px, 0px);
                    }
                }

                @keyframes stripMove {
                    0% {
                        transform: translate3d(-50px, 0px, 0px);
                        -webkit-transform: translate3d(-50px, 0px, 0px);
                        -moz-transform: translate3d(-50px, 0px, 0px);
                    }

                    50% {
                        transform: translate3d(0px, 0px, 0px);
                        -webkit-transform: translate3d(0px, 0px, 0px);
                        -moz-transform: translate3d(0px, 0px, 0px);
                        transform: scale(4, 1);
                        -webkit-transform: scale(4, 1);
                        -moz-transform: scale(4, 1);
                    }

                    100% {
                        transform: translate3d(50px, 0px, 0px);
                        -webkit-transform: translate3d(50px, 0px, 0px);
                        -moz-transform: translate3d(50px, 0px, 0px);
                    }
                }
        </style>

<!-- <script type="text/javascript">
    var cityname = ""; 
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
        return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }


    cityname = getParameterByName("c");
    console.log(cityname);

</script> -->


@stop
@section('myjsfile')    
<script src="{{ url('resources/assets/web') }}/js/custom.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
   
$(".page").on( "click", function() {
    $('#AjaxLoader').show();
    $('.slick-next').click();
    
    setTimeout(function() {   //calls click event after a certain time
        $('#AjaxLoader').hide();
}, 5000);
});
    $(document).ready(function(){
       $(".rooms-slider-for").shuffleImages({
         target: ".images > img"
       });
		});

            !function($){
  
  var defaults = {
    trigger: "imageHover",
    triggerTarget: false,
    hoverTrigger: 2500,
    target: "> img"
  };  
  
  
  $.fn.shuffleImages = function(options){
      
    return this.each(function(){
      var settings = $.extend({}, defaults, options),
          el = $(this).children(),
          prevLoc = 0,
          hoverTrigger = settings.hoverTrigger,
          triggerTarget = settings.triggerTarget;
          
          
          el.children().children('img:first-child').addClass("active");
      if (el.attr("data-si-hover-trigger")) hoverTrigger = el.data("si-hover-trigger");
      if (settings.triggerTarget == false) triggerTarget = el;
 
          var triggerTime;
          triggerTarget.mouseover(function(e) {
            triggerTime = setInterval(function(){
                
                var active = el.children().children("img.active");
                    if (active.next().length > 0) {
                        
                        $(el)[2].click();
                        active.next().addClass("active");
                        active.prev().removeClass("active");
              } else {
                el.children().children("img:first-child").addClass("active").show();
                $(el)[1].click();
                active.next().removeClass("active");

              }
              
            }, hoverTrigger);
          }).mouseout(function(e) {
            clearInterval(triggerTime);
          });
      
      
    });
    
  }
  

}(window.jQuery);




    </script>
@stop