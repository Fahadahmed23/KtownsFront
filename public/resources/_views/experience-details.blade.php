<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="{!! $details->MetaDescription !!}">
        <meta name="keywords" content="{!! $details->MetaKeywords !!}">
        <meta name="author" content="K Town Rooms">
        <title>{{ $details->MetaTitle }}</title>

        <!-- Favicons-->
        <link rel="shortcut icon" href="{{ url('resources/assets/web') }}/img/favicon.png" type="image/x-icon">
        <link rel="apple-touch-icon" type="image/x-icon" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-57x57-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-144x144-precomposed.png">

        <!-- CSS -->
        <link href="{{ url('resources/assets/web') }}/css/base.css" rel="stylesheet">

        <!-- CSS -->
        <link href="{{ url('resources/assets/web') }}/css/slider-pro.min.css" rel="stylesheet">
        <link href="{{ url('resources/assets/web') }}/css/date_time_picker.css" rel="stylesheet">
        <link href="{{ url('resources/assets/web') }}/css/owl.carousel.css" rel="stylesheet">
        <link href="{{ url('resources/assets/web') }}/css/owl.theme.css" rel="stylesheet">

        <!-- Google web fonts -->
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>

        <!--[if lt IE 9]>
          <script src="js/html5shiv.min.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>

        <!--[if lte IE 8]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
        <![endif]-->

        <div id="preloader">
            <div class="sk-spinner sk-spinner-wave">
                <div class="sk-rect1"></div>
                <div class="sk-rect2"></div>
                <div class="sk-rect3"></div>
                <div class="sk-rect4"></div>
                <div class="sk-rect5"></div>
            </div>
        </div>
        <!-- End Preload -->

        <div class="layer"></div>
        <!-- Mobile menu overlay mask -->

        <!-- Header================================================== -->
        @include('includes/header')

        <section class="parallax-window" data-parallax="scroll" data-image-src="{{ url('public/uploads/website/experiences/'.$details->Image) }}" data-natural-width="1400" data-natural-height="470">
            <div class="parallax-content-2">
                <div class="container">

                </div>
            </div>
        </section>

        <div id="position">
            <div class="container">
                <ul>
                    <li><a href="{{ url('home') }}">Home</a></li>
                    <li><a href="{{ url('experiences') }}">Manage Booking</a></li>
                    <li>Details</li>
                </ul>
            </div>
        </div>


        <div class="collapse" id="collapseMap">
            <div id="map" class="map"></div>
        </div>

        <div class="container margin_60">
            <div class="row">
                <div class="col-md-12">
                    @include('includes/front_alerts')
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-8">
                        <h1><?php echo $details->ExperiencesName; ?></h1>
                        <span><?php echo $details->Address; ?></span>
                        <span class="rating"><img src="{{ url('resources/assets/web/img/ranking'.$details->Rating.'.png') }}" /></span>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div id="price_single_main" class="hotel">
                        <span><sup>PKR </sup><?php echo number_format($details->SellingPrice, 0); ?></span><p>Includes all Tax</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8" id="single_tour_desc">
                    <div id="single_tour_feat">
                        <ul>
                            <?php
                            if (count($Options) > 0) {
                                foreach ($Options as $Option) {
                                    if ($Option->Options == 1) {
                                        ?>
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $Option->Title; ?></li>
                                        <?php
                                    }
                                    if ($Option->Options == 2) {
                                        ?>
                                        <li><i class="fa fa-road" aria-hidden="true"></i><?php echo $Option->Title; ?></li>
                                        <?php
                                    }
                                    if ($Option->Options == 3) {
                                        ?>
                                        <li><i class="icon-food" aria-hidden="true"></i><?php echo $Option->Title; ?></li>
                                        <?php
                                    }
                                    if ($Option->Options == 4) {
                                        ?>
                                        <li><i class="fa fa-language" aria-hidden="true"></i><?php echo $Option->Title; ?></li>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <p class="visible-sm visible-xs"><a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a></p><!-- Map button for tablets/mobiles -->
                    <div id="Img_carousel" class="slider-pro">
                        <div class="sp-slides">
                            <?php
                            if (count($Images) > 0) {
                                foreach ($Images as $img) {
                                    ?>
                                    <div class="sp-slide">
                                        <img alt="Image" class="sp-image" src="{{ url('public/uploads/website/experiences/'.$img->Image) }}" 
                                             data-src="{{ url('public/uploads/website/experiences/'.$img->Image) }}" 
                                             data-small="{{ url('public/uploads/website/experiences/'.$img->Image) }}" 
                                             data-medium="{{ url('public/uploads/website/experiences/'.$img->Image) }}" 
                                             data-large="{{ url('public/uploads/website/experiences/'.$img->Image) }}" 
                                             data-retina="{{ url('public/uploads/website/experiences/'.$img->Image) }}">
                                        <!--                                        <h3 class="sp-layer sp-black sp-padding" data-horizontal="40" data-vertical="40" data-show-transition="left">
                                                                                    Lorem ipsum dolor sit amet </h3>-->
                                        <?php
                                        if (trim($img->Title) != "") {
                                            ?>
                                            <p class="sp-layer sp-white sp-padding" data-horizontal="40" data-vertical="100" data-show-transition="left" data-show-delay="200"><?php echo $img->Title ?></p>
                                            <?php
                                        }
                                        if (trim($img->Description) != "") {
                                            ?>
                                            <p class="sp-layer sp-black sp-padding" data-horizontal="40" data-vertical="160" data-width="350" data-show-transition="left" data-show-delay="400"><?php echo $img->Description ?></p>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="sp-thumbnails">
                            <?php
                            if (count($Images) > 0) {
                                foreach ($Images as $img2) {
                                    ?>
                                    <img alt="Image" class="sp-thumbnail" src="{{ url('public/uploads/website/experiences/'.$img2->Image) }}">
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <h3>Description</h3>
                        </div>
                        <div class="col-md-9">
                            <?php echo $details->Description; ?>
                        </div>
                    </div>
                    <hr>
                </div>

                <aside class="col-md-4">
                    <!-- {!! Form::open([ 'url' => 'experiences/'.$details->ExperiencesID]) !!} -->
                    <div class="box_style_1 expose">
                        <h3 class="inner">Check Availability</h3>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label><i class="icon-calendar-7"></i> Check in</label>
                                    {!! Form::text('CheckIn', $mCheckIn, ['placeholder' => 'Check in', 'class' => 'form-control', 'id' => 'check_in', 'data-date-format' => 'dd/mm/yyyy']) !!}
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label><i class="icon-calendar-7"></i> Check out</label>
                                    {!! Form::text('CheckOut', $mCheckOut, ['placeholder' => 'Check out', 'class' => 'form-control', 'id' => 'check_out', 'data-date-format' => 'dd/mm/yyyy']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Adults</label>
                                    <div class="numbers-row">
                                        {!! Form::text('Adults', $mAdults, ['class' => 'qty2 form-control', 'id' => 'Adults']) !!}
                                    </div>
                                </div>
                            </div>
                            <?php /* ?>
                              <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                              <label>Children</label>
                              <div class="numbers-row">
                              {!! Form::text('Children', $mChildren, ['class' => 'qty2 form-control', 'id' => 'Children']) !!}
                              </div>
                              </div>
                              </div>
                              <?php */ ?>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Total Guest</label>
                                    <div class="numbers-row">
                                        {!! Form::text('Rooms', $mRooms, ['class' => 'qty2 form-control', 'id' => 'Rooms']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div><p style="color: #85c99d; margin: 0; font-size: 18px;" class="promo_msg"><?php echo (\Session::has('ExperiencesPromoApplied') ? \Session::get('ExperiencesPromoDiscount') . '% discount applied' : '') ?></p></div>
                            </div>
                        </div>
                        <?php
                        if (!\Session::has('ExperiencesPromoApplied')) {
                            ?>
                            <div class="row promo_container">
                                <div class="col-md-7 col-sm-7">
                                    <div class="form-group">
                                        <input type="text" id="ExperiencesPromoCode" class="form-control" placeholder="Promo Code" name="ExperiencesPromoCode">
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <div class="form-group">
                                        <button type="button" class="btn_full apply_promo">Apply</button>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <br>
                        <button type="button" class="btn_full book-now-btn">Book now</button>
                    </div>
                    <!-- {!! FORM::close() !!} -->

                    <div class="box_style_2 custom_privacy_policy">
                        <div class="tour_container">
                            <div class="img_container">
                                <a href="javascript:void(0);">
                                    <img src="{{ url('public/uploads/website/experiences/host/'.$details->HostImage) }}" class="img-responsive blog-img" alt="Image">

                                </a>
                            </div>
                            <div class="tour_title" style="text-align:left;">
                                <h3><strong>About Your Host</strong></h3>
                                <div class="">
                                    <p></p><p> </p>

                                    <?php echo $details->HostDescription; ?>

                                </div>
                            </div>
                            <a href="tel://<?php echo $configuration->Contact1; ?>" class="phone"><?php echo $configuration->Contact1; ?></a>
                        </div>

                    </div>

                    <!--<div class="box_style_4 custom_need_help">
                        <img src="{{ url('resources/assets/web/img/need-help-section.png') }}" />
                        <h4><span>Need</span> Help?</h4>
                        <a href="tel://<?php //echo $configuration->Contact1;   ?>" class="phone"><?php //echo $configuration->Contact1;   ?></a>
                    </div>-->

                </aside>
            </div>
        </div>

        @include('includes/footer')

        <div id="toTop"></div>
        <div id="overlay"></div>

        <script src="{{ url('resources/assets/web') }}/js/jquery-1.11.2.min.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/common_scripts_min.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/functions.js"></script>

        <!-- Specific scripts -->
        <script src="{{ url('resources/assets/web') }}/js/icheck.js"></script>
        <script>
$('input').iCheck({
    checkboxClass: 'icheckbox_square-grey',
    radioClass: 'iradio_square-grey'
});
        </script>
        <!-- Date and time pickers -->
        <script src="{{ url('resources/assets/web') }}/js/jquery.sliderPro.min.js"></script>
        <script type="text/javascript">
$(document).ready(function ($) {
    $('#Img_carousel').sliderPro({
        width: 960,
        height: 600,
        fade: true,
        arrows: true,
        buttons: false,
        fullScreen: false,
        smallSize: 500,
        startSlide: 0,
        mediumSize: 1000,
        largeSize: 3000,
        thumbnailArrows: true,
        autoplay: false
    });
});
        </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Date and time pickers -->
        <script src="{{ url('resources/assets/web') }}/js/bootstrap-datepicker.js"></script>
        <script>
//$('input.date-pick').datepicker('setDate', 'today');
        </script>
        <script>
            //var enableDates = [{date: "07-08-2019"},{date: "10-08-2019"},{date: "12-08-2019"},{date: "14-08-2019"},{date: "17-08-2019"},{date: "19-08-2019"},{date: "21-08-2019"},{date: "24-08-2019"}, {date: "26-09-2019"},{date: "28-09-2019"}];   
var enableDates = [<?php if(isset($dateArray)){echo trim($dateArray);} ?>];   
var enableDatesArray=[];  
var sortDatesArry = [];
       for (var i = 0; i < enableDates.length; i++) {
             var dt = enableDates[i].date.replace('-', '/').replace('-', '/');  
             var dd, mm, yyy;
             if (parseInt(dt.split('/')[0]) <= 9 || parseInt(dt.split('/')[1]) <= 9) {  
                      dd = parseInt(dt.split('/')[0]);  
                      mm = parseInt(dt.split('/')[1]);  
                      yyy = dt.split('/')[2];  
                     enableDatesArray.push(dd + '/' + mm + '/' + yyy);  
                     sortDatesArry.push(new Date(yyy + '/' + dt.split('/')[1] + '/' + dt.split('/')[0]));  
                }  
                else {  
                 enableDatesArray.push(dt);  
                 sortDatesArry.push(new Date(dt.split('/')[2] + '/' + dt.split('/')[1] + '/' + dt.split('/')[0] + '/'));  
           }  
 }  
       var maxDt = new Date(Math.max.apply(null, sortDatesArry));  
       var minDt = new Date(Math.min.apply(null, sortDatesArry));  
  
       $('#check_in').datepicker({
              format: "dd/mm/yyyy",  
              autoclose: true,  
              startDate: minDt,  
              //endDate: maxDt,  
              beforeShowDay: function (date) {  
                var dt_ddmmyyyy = date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();  
                return (enableDatesArray.indexOf(dt_ddmmyyyy) != -1);  
              }
          });
          
           $('#check_out').datepicker({
              format: "dd/mm/yyyy",  
              autoclose: true,  
              startDate: minDt,  
              //endDate: maxDt,  
              beforeShowDay: function (date) {  
                var dt_ddmmyyyy = date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();  
                return (enableDatesArray.indexOf(dt_ddmmyyyy) != -1);  
              }
          });

        </script>
        <style>
        .activeClass{
            background: #ec914d; 
        }
        </style>
        <!-- Map -->
        <script src="http://maps.googleapis.com/maps/api/js"></script>
        <script src="{{ url('resources/assets/web') }}/js/map.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/infobox.js"></script>
        <!-- Carousel -->
        <script src="{{ url('resources/assets/web') }}/js/owl.carousel.min.js"></script>
        <script>
$(document).ready(function () {
    $(".carousel").owlCarousel({
        items: 4,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 3]
    });
});
        </script>

        <!--Review modal validation -->
        <script src="{{ url('resources/assets/web') }}/assets/validate.js"></script>

        <!--<script src="{{ url('resources/assets/web') }}/js/datepicker_advanced.js"></script>-->
        <script>
$(document).ready(function () {
    $('.apply_promo').click(function () {
        $('.apply_promo').attr('disabled', 'disabled');
        $.ajax({
            type: "POST",
            url: "{{ url('experiences/apply_promo') }}",
            'headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: "JSON",
            data: {'PromoCode': $('#ExperiencesPromoCode').val()},
            success: function (data) {
                if (data.error) {
                    $('#message-modal').html(data.message);
                    $('#myModal').modal();
                    //alert(data.message);
                } else {
                    $('.promo_msg').text(data.message);
                    $('.promo_container').remove();
                }
            },
            complete: function () {
                $('.apply_promo').removeAttr('disabled');
            }
        });
    });

    $('.book-now-btn').click(function () {
        $('.book-now-btn').attr('disabled', 'disabled');
        $.ajax({
            type: "POST",
            url: "{{ url(Request::path()) }}",
            'headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: "JSON",
            data: {'CheckIn': $('#check_in').val(), 'CheckOut': $('#check_out').val(), 'Adults': $('#Adults').val(), 'Children': $('#Children').val(), 'Rooms': $('#Rooms').val()},
            success: function (data) {
                if (data.error) {
                    $('#message-modal').html(data.message);
                    $('#myModal').modal();
                    //alert(data.message);
                } else {
                    window.location.href = '{{ url("experiences-cart") }}';
                    $('.promo_msg').text(data.message);
                    $('.promo_container').remove();
                }
            },
            complete: function () {
                $('.book-now-btn').removeAttr('disabled');
            }
        });
    });
});
        </script>
    </body>
</html>