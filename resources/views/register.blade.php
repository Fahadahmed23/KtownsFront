@extends('layouts.default')
@section('title', 'KTown Rooms | Register') 
@section('description', '')
@section('content')

<section class="d-flex login-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/banners/login-bg.jpg);">
    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="login-box">
                    <h3 class="ban-heading">REGISTER</h3>
                    <form class="reg-form">
                        {!! Form::text('FirstName', null, ['id' => 'FirstName', 'class' => 'alphafield', 'placeholder' => 'First Name']) !!}
                        {!! Form::text('LastName', null, ['id' => 'LastName', 'class' => 'alphafield' ,'placeholder' => 'Last Name']) !!}
                        {!! Form::text('Cell', null, ['id' => 'Cell', 'maxlength' =>'11', 'placeholder' => 'Cell (03001234567)']) !!}
                        {!! Form::text('EmailAddress', null, ['id' => 'EmailAddress', 'placeholder' => 'Email Address']) !!}
                        <input name="Password" type="password" id="Password" placeholder="Password">
                        <input name="ConfirmPassword" type="password" id="ConfirmPassword" placeholder="Confirm password">
                        <p>Are you new to Ktown Rooms? <a href="{{ url('login') }}">Login</a></p>
                        <button type="button" class="login-submit submitBtn" id="submit-contact">Create an account</button>
                    </form>
                </div>       
            </div>
        </div>
    </div> 
</section>
@stop
@section('myjsfile')
<script src="{{ url('resources/assets/web') }}/js/jquery-1.11.2.min.js"></script>
<script src="{{ url('resources/assets/web') }}/js/common_scripts_min.js"></script>
<script src="{{ url('resources/assets/web') }}/js/jquery.mask.js"></script>


<script>
//Masking Code
// $(document).ready(function()   
// {
//     $('#Cell').mask('(0000) 000-0000');
// })



$(document).ready(function () {
    $('.submitBtn').click(function () {
        $('.submitBtn').attr('disabled', 'disabled');
        $.ajax({
            type: "POST",
            url: "{{ url('signup') }}",
            'headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: "JSON",
            data: {'FirstName': $('#FirstName').val(), 'LastName': $('#LastName').val(), 'Cell': $('#Cell').val(), 'EmailAddress': $('#EmailAddress').val(), 'Password': $('#Password').val(), 'ConfirmPassword': $('#ConfirmPassword').val()},
        
            success: function (data) {
                // console.log(data);
                if (data.error) {
                    $('#message-modal').html(data.message);
                    $('#myModal').modal();
                    //alert(data.message);
                } else {
                    $('#message-modal').html(data.message);
                    $('.modal-header h4').html("Success");
                    $('#FirstName').val("");
                    $('#LastName').val("");
                    $('#Cell').val("");
                    $('#EmailAddress').val("");
                    $('#Password').val("");
                    $('#ConfirmPassword').val("");
//                           $('#myModal').modal();
                    window.location.href = '{{ url("account-activation?m=true") }}';
                }
            },
            complete: function (data){
                if(data.statusText == 'Internal Server Error')
                $('#message-modal').html(data.statusText);
               $('#myModal').modal();


                $('.submitBtn').removeAttr('disabled');
            }
        });
    });
});

$(document).ready(function(){
    $('#Cell').keypress(validateNumber);
    $('.alphafield').keypress(function (e) {
            var regex = new RegExp("^[a-zA-Z]+$");
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
@stop