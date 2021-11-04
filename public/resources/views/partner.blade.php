@extends('layouts.default')
@section('title', 'KTown Affliate Program | Become our Partner | KTown Hotel Partner') 
@section('description', '')
@section('content')
<section class="d-flex cp-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/hotel-partner-final-image.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-7 align-self-center">
                <h2 class="ban-heading bhm wow fadeInUp animated"><strong>Hotel</strong> Partners
                    <span class="">Register with KTown rooms to list your apartments or hotels with us and grow your business. If you own a property register with us and make us manage your property. We assure you an increase in revenue, frequent occupancy and corporate customers.</span>
                </h2>
            </div>
            <div class="col-lg-5 ">
                <div class="login-box">
                    <h3 class="ban-heading">Become Our Hotel Partner</h3>
                    <form class="reg-form">
                        {!! Form::text('FullName', null, ['id' => 'FullName', 'class' => 'alphafield', 'placeholder' => 'Full Name']) !!}
                        {!! Form::text('HotelName', null, ['id' => 'HotelName', 'class' => 'alphafield', 'placeholder' => 'Hotel Name']) !!}
                        {!! Form::text('ContactNo', null, ['id' => 'ContactNo', 'placeholder' => 'Contact No']) !!}
                        {!! Form::text('EmailAddress', null, ['id' => 'EmailAddress', 'placeholder' => 'Email Address']) !!}
                        {!! Form::text('Location', null, ['id' => 'Location', 'placeholder' => 'Location']) !!}
                        {!! Form::number('NoOfRooms', null, ['id' => 'NoOfRooms', 'placeholder' => 'No. of Rooms', 'min'=>'1']) !!}
                        {!! Form::textarea('Description', null, ['id' => 'Description', 'class' => 'alphafield', 'placeholder' => 'Description']) !!}
                        <button type="submit" class="login-submit submitBtn">Submit</button>
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


<section class="cp-content-area2 ht">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="custom-heading mb-50">
                    <h3>Ktown <strong>Product</strong>
                        <!--<span>Choose from variety of styles</span>-->
                    </h3>
                </div>
            </div>
        </div>

        <div class="row product-tabs hotels">
            <div class="col-lg-9">
                <ul class="tabs-custom-nav tabs-overview-nav tab-nav2 unstyled">
                    <li class="current"><a href="#tab1">Expand Your Business</a></li>
                    <li><a href="#tab2">Assistance of Property Makeover   </a></li>
                    <li><a href="#tab3">Smooth Operations   </a></li>
                </ul>
                <div class="tabs-custom general tabs-overview-content">
                    <div id="tab1" class="selected tab-content-panel">
                        <h3><strong>Expand</strong> Your Business
                            <span>Our mission is to expand and increase occupancy as well as income by developing quality rooms for billion individuals</span></h3>

                        <p>We make it possible by using an application, a site, customer support service and corporate deals, to ensure your property does successful business consistently, every month, and every week. Before making a deal, our management team survey the whole property. 
                            <br><br>
                            Our team will monitor your performance and will be discussing issues and feedback with you to improve it even more.
                        </p>
                    </div>
                    <div id="tab2" class="tab-content-panel" style="display: none;">
                        <h3><strong>Assistance</strong> of Property Makeover
                            <span>We can make amendment to your property and renovate it if needed. We’ll manage basic changes and minor stylish makeovers. </span></h3>

                        <p>We renovate your property to give an amazing experience to the visitors because when your customer is satisfied, everyone is satisfied. </p>
                    </div>

                    <div id="tab3" class="tab-content-panel" style="display: none;">
                        <h3><strong>Smooth</strong>Operations 
                            <span>To spare you from all the problems, we can run the property for you. </span></h3>

                        <p>Our tremendous system of hotels has guaranteed access to the absolute best staff in the hospitality industry all trained in our own training institutes. This helps you from saving time and hiring staff.</p>
                        <p>More Benefits (ICONS)<br>
                            •	Extensive Marketing<br>
                            •	Technology Advancement<br>
                            •	Staff Training<br> 
                            •	Low Percentage of Commission<br>
                            •	Procurement Assistance<br>
                            •	Influx of customers
                        </p>
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
<div id="toTop"></div>

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
            url: "{{ url('partner') }}",
            'headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: "JSON",
            data: {'FullName': $('#FullName').val(), 'HotelName': $('#HotelName').val(), 'NoOfRooms': $('#NoOfRooms').val(), 'EmailAddress': $('#EmailAddress').val(), 'ContactNo': $('#ContactNo').val(), 'Location': $('#Location').val(), 'Description': $('#Description').val(), },
            success: function (data) {
                $('.web-loader').hide();
                if (data.error) {
                    $('#message-modal').html(data.message);
                    $('#myModal').modal();
                    //alert(data.message);
                } else {
                    // alert('details submitted successfully');
                    // console.log('submitted');
                    $('#FullName').val("");
                    $('#HotelName').val("");
                    $('#EmailAddress').val("");
                    $('#ContactNo').val("");
                    $('#Location').val("");
                    $('#NoOfRooms').val("");
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
</script>

<script type="text/javascript">
    
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