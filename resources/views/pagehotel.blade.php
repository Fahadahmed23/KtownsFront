@extends('layouts.default')
@section('title', '' . e($details->MetaTitle) . '') 
@section('description', '' . e($details->MetaDescription) . '')
@section('keywords', '' . e($details->MetaKeywords) . '')
@section('content')
<?php
$foo = $details->Content;
$array = array();
preg_match('/src="([^"]*)"/i', $foo, $array);
$image = $array[1];
$content = preg_replace('/<img(.*)>/i','',$foo,1);
?>
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url(<?php echo $image; ?>);">
    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading wow fadeInDown animated">{{ $details->Title }}</h2>  
            </div>
        </div>
    </div> 
</section>
<section class="blog-info-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-left-content">
                    <div class="row blog-content">
                        <div class="col-lg-12">
                            <p>{!! $content !!}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> 
</section>
<style>
    .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}
img {
  max-width:100% !important;
  height:auto !important;
}
p{
  text-align: justify;
  text-justify: inter-word;
}
</style>
@stop

@section('myjsfile')

@stop