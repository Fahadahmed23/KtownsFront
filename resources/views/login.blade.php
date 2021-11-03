@extends('layouts.default')
@section('title', "KTown Rooms | Login") 
@section('content')
<!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>-->
<section id="hero" class="d-flex login-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/banners/login-bg.jpg);">

 <div id="hero" class="container align-self-center">
   <div class="row justify-content-center">
     <div class="col-lg-5 ">
      <div class="login-box" id="login">
        <h3 class="ban-heading">LOGIN</h3>
        <form class="login-form">
          {!! Form::text('EmailAddress', null, ['id' => 'EmailAddress', 'placeholder' => 'Email Address / Cell']) !!}  
          <input name="Password" id="Password" type="password" placeholder="Password">
          <label>{!! $my_msg !!}</label>
          <p><a href="{{ url('forgot-password') }}">Forgot Password?</a></p>
          <p>Are you new to Ktown Rooms? <a href="{{ url('signup') }}">Register here</a></p>
          <button type="submit" class="login-submit submitBtn" id="submit-contact">Sign in</button>
        </form>
      </div>       
     </div>
   </div>
 </div> 
</section>
<div id="toTop"></div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myReviewLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Error</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <div id="message-modal">
                </div>
                <div class="text-center">
                    <button type="button" class="btn_1" data-dismiss="modal" aria-label="Close">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('myjsfile')
<script src="{{ url('resources/assets/web') }}/js/jquery-1.11.2.min.js"></script>
<script src="{{ url('resources/assets/web') }}/js/common_scripts_min.js"></script>
<script>
$(document).ready(function () {
    $('.submitBtn').click(function () {
        $('.submitBtn').attr('disabled', 'disabled');
        // alert("sssaad");
        $.ajax({
            type: "POST",
            url: "{{ url('login') }}",
            'headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: "JSON",
            data: {'EmailAddress': $('#EmailAddress').val(), 'Password': $('#Password').val()},
        
            success: function (data) {
                if (data.error) {
                    $('#message-modal').html(data.message);
                    $('#myModal').modal();
                    //alert(data.message);
                } else {
                    if (data.type == "cart") {
                        window.location.href = '{{ url("cart") }}';
                    } else {

                      setTimeout(function(){  window.location.href = '{{ url("dashboard") }}'; }, 1000);

                       

                    }
                  
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