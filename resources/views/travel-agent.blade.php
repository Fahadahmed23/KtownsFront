@extends('layouts.default')
@section('title', 'Agents refer travelers to Ktown Rooms for best hospitality services') 
@section('description', 'Be our hospitality partners and refer our hotels and guest houses to your travelers for standard accommodation across Pakistan at low prices and enjoy commission on bookings.')
@section('content')

<section class="d-flex cp-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/covers/travel-agent.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-7 align-self-center">
                <h2 class="ban-heading bhm wow fadeInUp animated"><strong>Travel </strong> Agent
                    <span class="">Be our hospitality partners and refer our hotels and guest houses to your travelers for standard accommodation across Pakistan at low prices and enjoy commission on bookings.</span>
                </h2>
            </div>
            <div class="col-lg-5 ">
                <div class="login-box">
                    <h3 class="ban-heading">Become Our Travel Agent</h3>
                    <form class="reg-form">
                        {!! Form::text('FullName', null, ['id' => 'FullName', 'class' => 'alphafield', 'placeholder' => 'Full Name']) !!}
                        {!! Form::text('EmailAddress', null, ['id' => 'Email', 'placeholder' => 'Email Address', 'type' => 'email']) !!}
                        {!! Form::text('ContactNo', null, ['id' => 'Cell', 'maxlength' =>'11', 'placeholder' => 'Contact No']) !!}
                        {!! Form::text('City', null, ['id' => 'City', 'class' => 'alphafield', 'maxlength' =>'15', 'placeholder' => 'City']) !!}
                        {!! Form::text('Address', null, ['id' => 'Address', 'placeholder' => 'Address']) !!}
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
                    <h3 class="wow fadeInUp animated">High <strong>Commission</strong>
                        <span>Travel agents earn enough money through availing high commission.</span>
                    </h3>
                </div>
                <div class="custom-heading mb-50">
                    <h3 class="wow fadeInUp animated">Dedicated <strong>Team</strong>
                        <span>Our team will be available round the clock to support you.</span>
                    </h3>
                </div>
                <div class="custom-heading mb-50">
                    <h3 class="wow fadeInUp animated">Transparency
                        <span>Invoices are directly provided from us without any delay or intervention.</span>
                    </h3>
                </div>
                <div class="custom-heading mb-50">
                    <h3 class="wow fadeInUp animated">Free <strong>Cancellation (Non-peak season)</strong>
                        <span>Facility of free cancellation in case of any emergency.</span>
                    </h3>
                </div>
                <div class="custom-heading mb-50">
                    <h3 class="wow fadeInUp animated">Fixed <strong>Rates</strong>
                        <!--<span>Facility of free cancellation in case of any emergency.</span>-->
                    </h3>
                </div>
                <div class="custom-heading mb-50">
                    <h3 class="wow fadeInUp animated">Incentives<strong> and Rewards</strong>
                        <span>Special discounts and cashbacks will be provided.</span>
                    </h3>
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
            url: "{{ url('travel-agent') }}",
            'headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: "JSON",
            data: {'FullName': $('#FullName').val(), 'Email': $('#Email').val(), 'Cell': $('#Cell').val(), 'City': $('#City').val(), 'Address': $('#Address').val(), },
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
                    $('#Email').val("");
                    $('#Cell').val("");
                    $('#City').val("");
                    $('#Address').val("");

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
    
$(document).ready(function(){
    $('#Cell').keypress(validateNumber);
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


    jQuery(function($){
        $("#Cell").mask("9999-9999999"); // use the class!
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
