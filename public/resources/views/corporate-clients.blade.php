@extends('layouts.default')
@section('title', "KTown Rooms For Corporates | KTown's Corporate Partners") 
@section('description', "Ktown rooms is Pakistan's best budgeted hotel network, provides you accommodation in cheap rates. Stay at Ktown Rooms & get AC, Wifi, Complimentary breakfast, cleaned washroom, cable tv & hygienic bed/linen.Lowest Price Guaranteed. Book now and pay later search cheap hotel near you and you will find Ktown.")
@section('content')
<script src="{{ url('resources/assets/web') }}/js/input_fileds_validation.js"></script>
<section class="d-flex cp-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/corporate-partner-final.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-7 align-self-center">
                <h2 class="ban-heading bhm wow fadeInUp animated"><strong>Corporate</strong> Partners
                    <span class="">Collaborate with us to make your business trips affordable and convenient. Ktown Rooms would make you efficient in cost reduction and in increasing productivity.</span>
                </h2>
            </div>
            <div class="col-lg-5 ">
                <div class="login-box">
                    <h3 class="ban-heading">Become Our Corporate Partner</h3>
                    <form class="reg-form">
                        {!! Form::text('FullName', null, ['id' => 'FullName', 'class' => 'alphafield','placeholder' => 'Full Name']) !!}
                        {!! Form::text('EmailAddress', null, ['id' => 'EmailAddress', 'placeholder' => 'Email Address']) !!}
                        {!! Form::text('ContactNo', null, ['id' => 'ContactNo', 'maxlength' =>'11', 'placeholder' => 'Contact No']) !!}
                        {!! Form::text('Location', null, ['id' => 'Location', 'placeholder' => 'Location']) !!}
                        <button type="button" class="submitBtn login-submit" id="submit-contact">Submit</button>
                    </form>
                </div>       
            </div>
        </div>
    </div> 
</section>
<section class="cp-content-area1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="custom-heading mb-50">
                    <h3 class="wow fadeInUp animated">Our <strong>values</strong>
                        <span>Values are maintained in all hotels</span>
                    </h3>
                </div>
            </div>
        </div>
        <div class="row our-values sliderxs">
            <div class="col-md-4">
                <div class="valueBox">
                    <img src="{{ url('resources/assets/web') }}/img/value-1.png">
                    <h3><strong>Clean &amp; </strong>Fresh Rooms</h3>
                    <h6>Fresh Rooms</h6>
                    <p>Hygienic and fresh linens along with clean bathrooms in all Ktown hotels across the country.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="valueBox">
                    <img src="{{ url('resources/assets/web') }}/img/value-2.png">
                    <h3>Trained <strong>Friendly </strong>Staff</h3>
                    <h6>Trained staff will be serving you through front desk</h6>
                    <p>Our well mannered staff is ready to serve you through from the front desk and from your doorstep.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="valueBox">
                    <img src="{{ url('resources/assets/web') }}/img/value-3.png">
                    <h3>Assured <strong>Essentials</strong> Rooms</h3>
                    <h6>Fresh Rooms</h6>
                    <p>Enjoy Free WiFi, branded toiletries, 32 inches LED, AC rooms and free breakfast at all Ktown hotels.</p>
                </div>
            </div>
        </div>
    </div> 
</section>
<section class="cp-content-area2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="custom-heading mb-50">
                    <h3 class="wow fadeInUp animated">Ktown <strong>Services</strong>
                        <span>We serve you the best</span>
                    </h3>
                </div>
            </div>
        </div>

        <div class="row product-tabs">
            <div class="col-lg-9">
                <ul class="tabs-custom-nav tabs-overview-nav tab-nav2 unstyled">
                    <li class="current"><a href="#tab1">Cost reduction</a></li>
                    <li><a href="#tab2">Time Saving  </a></li>
                    <li><a href="#tab3">Transparency  </a></li>
                    <li><a href="#tab4">Free Cancellation (Non-peak season)  </a></li>
                    <li><a href="#tab5">24/7 Front desk support</a></li>
                    <li><a href="#tab6">Hotel Partner Portal</a></li>
                </ul>
                <div class="tabs-custom general tabs-overview-content">
                    <div id="tab1" class="selected tab-content-panel">
                        <h3><strong>Cost</strong> reduction
                            <span>Save cost by collaborating with best budget hotel in the country and have access to several hotels in multiple cities.</span></h3>

                        <p></p>
                    </div>
                    <div id="tab2" class="tab-content-panel" style="display: none;">
                        <h3><strong>Time</strong> Saving
                            <span>By Ktown Room’s portal as well as website, have instant bookings at your properties,</span></h3>

                        <p></p>
                    </div>

                    <div id="tab3" class="tab-content-panel" style="display: none;">
                        <h3><strong>Transparency</strong>
                            <span>Invoices are directly provided from us without any delay or intervention.</span></h3>

                        <p></p>
                    </div>

                    <div id="tab4" class=" tab-content-panel" style="display: none;">
                        <h3><strong>Free</strong> Cancellation (Non-peak season)
                            <span>Facility of free cancellation in case of any emergency.</span></h3>

                        <p></p>
                    </div>

                    <div id="tab5" class="tab-content-panel" style="display: none;">
                        <h3><strong>24/7</strong> Front desk support
                            <span>Desk officer will be available 24/7 to support you. </span></h3>

                        <p></p>
                    </div>
                    
                    <div id="tab6" class="tab-content-panel" style="display: none;">
                        <h3><strong>Hotel</strong> Partner Portal
                            <span>Access will be given on website to hotel partners to track the performance and booking in their properties.</span></h3>

                        <p></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <img src="{{ url('resources/assets/web') }}/img/product-img.png" alt="*" class="p-img hidden-sm-down">
            </div>
        </div>

    </div>
</div> 
</section>
<section class="award-main">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 p-0">
                <div class="row award-box">
                    <div class="col-lg-5 align-self-center">
                        <img src="{{ url('resources/assets/web') }}/img/award-img.jpg" alt="*" class="w-100 wow bounceIn animated" >
                    </div>
                    <div class="col-lg-7 align-self-center" >
                        <div class="custom-heading">
                            <h3>Best <strong>Room Quality</strong>
                                <span>Clean Hotel is one of the most important factors to have consistent customer satisfaction. This factor is our first priority as it creates positive image of the hotel. We have employed highly trained professionals to maintain quality and standard of our hotels.</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</section>
@stop
@section('myjsfile')

<script src="{{ url('resources/assets/web') }}/js/jquery-1.11.2.min.js"></script>
<script src="{{ url('resources/assets/web') }}/js/jquery.mask.js"></script>
<script>
$(document).ready(function () {
    $('.submitBtn').click(function () {
        $('.web-loader').show();
        $('.submitBtn').attr('disabled', 'disabled');
        $.ajax({
            type: "POST",
            url: "{{ url('corporate-clients') }}",
            'headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: "JSON",
            data: {'FullName': $('#FullName').val(), 'EmailAddress': $('#EmailAddress').val(), 'ContactNo': $('#ContactNo').val(), 'Location': $('#Location').val(), 'Description': $('#Description').val(), },
            success: function (data) {
                $('.web-loader').hide();
                if (data.error) {
                    $('#message-modal').html(data.message);
                    $('#myModal').modal();
                    //alert(data.message);
                } else {
                    console.log('submitted');
                    $('#FullName').val("");
                    $('#EmailAddress').val("");
                    $('#ContactNo').val("");
                    $('#Location').val("");
                    $('#Description').val("");

                    $('#message-modal').html("Thanks for taking interest in KTown Rooms. We will contact you shortly");
                    $('.modal-header h4').html("Success");
                    $('#myModal').modal();
                }
            },
            complete: function () {
                $('.submitBtn').removeAttr('disabled');
            }
        });
    });
});



    jQuery(function($){
        $("#ContactNo").mask("9999-9999999"); // use the class!
    }); 

$(document).ready(function(){
    $('#ContactNo').keypress(validateNumber);
    $('.alphafield').keypress(function (e) {
            var regex = new RegExp("^[a-z A-Z]+$");
            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(str)) {
                return true;
            }
            else
            {
            e.preventDefault();
            return false;
            }
        });
});

function validateNumber(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if ( key < 48 || key > 57 ) {
        return false;
    } else {
        return true;
    }
}

</script>
<script src="{{ url('resources/assets/web') }}/js/custom.js"></script>
@stop
