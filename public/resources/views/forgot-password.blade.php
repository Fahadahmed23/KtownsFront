@extends('layouts.default')
@section('title', "KTown Rooms | Forgot Password") 
@section('content')
<section id="hero" class="d-flex login-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/banners/login-bg.jpg);">

    <div id="hero" class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-5 ">
                <div class="login-box" id="login">
                    @include('includes/front_alerts')
                    <h3 class="ban-heading">Reset Password</h3>
                    {!! Form::open([ 'id' => 'frmLogin', 'url' => 'forgot-password', 'class'=>'login-form']) !!}
                    {!! Form::text('EmailAddress', null, ['id' => 'EmailAddress', 'placeholder' => 'Email Address']) !!}  
                    <button type="submit" class="login-submit submitBtn">Submit</button>
                    {!! FORM::close() !!}
                </div>       
            </div>
        </div>
    </div> 
</section>
<div id="toTop"></div>
@stop
@section('myjsfile')

@stop