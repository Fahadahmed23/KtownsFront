@extends('layouts.default')
@section('title', 'K Town Rooms | | Careers') 
@section('description', 'K Town Rooms')
@section('content')
<style>
    
section.d-flex.vancies-banner.bg-norepeat.bg-center.bg-cover.parallax-window {
    background: url(https://www.ktownrooms.com/resources/assets/web/img/covers/career-cover-image.jpg) !important;
}    
</style>
<section data-parallax="scroll" class="d-flex vancies-banner bg-norepeat bg-center bg-cover parallax-window" style="background:url(https://www.ktownrooms.com/resources/assets/web/img/covers/career-cover-image.jpg);">
    <div class="container align-self-center parallax-content-1">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading">Join the fastest growing Tech Startup of Pakistan
                    <span><button type="button" class="btn_1 join-us-btn">Join Us</button></span>
                </h2>  
            </div>
        </div>
    </div> 
</section>

<div class="modal fade" id="JoinUsModal" tabindex="-1" role="dialog" aria-labelledby="myReviewLabel" aria-hidden="true" style="padding: 178px 10px 0px 0px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="main_title">
                    <h2 style="color:#fff; display: inline;">Become our <span>Part</span></h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

            </div>
            <div class="modal-body">
                {!! Form::open([ 'url' => 'careers', 'files' => true]) !!}
                <div class="row">
                    <div class="col-md-12">
                        @include('includes/front_alerts')
                        <p>Please upload your CV here...</p>
                        <input type="file" name="cv" /><br>

                    </div>
                </div>
                <div class="text-center">
                    <input class="btn_1" type="submit" />
                    <button type="button" class="btn_1" data-dismiss="modal" aria-label="Close">Close</button>
                </div>
                {!! FORM::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
@section('myjsfile')
<!-- Common scripts -->
<script src="{{ url('resources/assets/web') }}/js/jquery-1.11.2.min.js"></script>
<script src="{{ url('resources/assets/web') }}/js/common_scripts_min.js"></script>
<!--<script src="{{ url('resources/assets/web') }}/js/functions.js"></script>-->

<!-- Specific scripts -->
<!--<script src="{{ url('resources/assets/web') }}/assets/validate.js"></script>-->
<style>
    .modal-header .close {
        padding: 1rem !important;
        margin: -1rem -16rem -1rem auto !important;
}
</style>

<script>
$(document).ready(function () {
<?php
if ((\Session::has('errors') && count(\Session::get('errors')) > 0) || (\Session::has('success') && \Session::get('success') != "")) {
    ?>
        $('#JoinUsModal').modal();
    <?php
}
?>
    $('.join-us-btn').click(function () {
        $('#JoinUsModal').modal();
    });
});
</script>
@stop