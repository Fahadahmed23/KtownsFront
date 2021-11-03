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
                        {!! Form::text('FullName', null, ['id' => 'FullName', 'placeholder' => 'Full Name']) !!}
                        {!! Form::text('EmailAddress', null, ['id' => 'Email', 'placeholder' => 'Email Address']) !!}
                        {!! Form::text('ContactNo', null, ['id' => 'Cell', 'placeholder' => 'Contact No']) !!}
                        {!! Form::text('City', null, ['id' => 'City', 'placeholder' => 'City']) !!}
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
<script src="{{ url('resources/assets/web') }}/js/custom.js"></script>
<script>
$(document).ready(function () {
    $('.submitBtn').click(function () {
        $('.submitBtn').attr('disabled', 'disabled');
        $.ajax({
            type: "POST",
            url: "{{ url('travel-agent') }}",
            'headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: "JSON",
            data: {'FullName': $('#FullName').val(), 'Email': $('#Email').val(), 'Cell': $('#Cell').val(), 'City': $('#City').val(), 'Address': $('#Address').val(), },
            success: function (data) {
                if (data.error) {
                    $('#message-modal').html(data.message);
                    $('#myModal').modal();
                    //alert(data.message);
                } else {
                    $('#FullName').val("");
                    $('#Email').val("");
                    $('#Cell').val("");
                    $('#City').val("");
                    $('#Address').val("");

                    $('#message-modal').html(data.message);
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
@stop
