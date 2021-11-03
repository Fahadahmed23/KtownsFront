@extends('layouts.default')
@section('title', "KTown Rooms | Activate Account") 
@section('content')
<section id="hero" class="d-flex login-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/banners/login-bg.jpg);">

 <div id="hero" class="container align-self-center">
   <div class="row justify-content-center">
     <div class="col-lg-5 ">
      <div class="login-box" id="login">
          @include('includes/front_alerts')
        <h3 class="ban-heading">Activate Account</h3>
          {!! Form::open([ 'class'=>'login-form', 'id' => 'frmLogin', 'url' => 'activate-account']) !!}
          {!! Form::text('ActivationCode', null, ['id' => 'ActivationCode', 'placeholder' => 'Activation Code']) !!}
          <label>{!! $my_msg !!}</label>
          <button type="submit" class="login-submit btn_full">Activate</button>
        {!! FORM::close() !!}
      </div>       
     </div>
   </div>
 </div> 
</section>
<div id="toTop"></div>
@stop
@section('myjsfile')
<script src="{{ url('resources/assets/web') }}/js/jquery-1.11.2.min.js"></script>
<script src="{{ url('resources/assets/web') }}/js/common_scripts_min.js"></script>

@stop