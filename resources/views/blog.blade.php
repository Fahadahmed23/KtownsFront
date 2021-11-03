@extends('layouts.default')
@section('title', 'Blog KTown Rooms | Reinventing The Hospitality-Pakistan') 
@section('description', 'Ktown rooms is Pakistans best budgeted hotel network, provides you accommodation in cheap rates. Stay at Ktown Rooms & get AC, Wifi, Complimentary breakfast, cleaned washroom, cable tv & hygienic bed/linen.Lowest Price Guaranteed. Book now and pay later search cheap hotel near you and you will find Ktown.')
@section('content')
<section class="d-flex vancies-banner bg-norepeat bg-center bg-cover" style="background:url({{ url('resources/assets/web') }}/img/banners/vacancies-bg.jpg);">

    <div class="container align-self-center">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="ban-heading wow fadeInDown animated">Blog
                    <span class="mb-50">Join Our Team! </span>
                </h2>  
            </div>
        </div>
    </div> 
</section> 

<section class="blog-info-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="blog-left-content">
                    <div class="row blog-content">
                        <div class="col-lg-12">
                            <div class="custom-heading mbpx-50">
                                <h3 class="fspx-35 wow fadeInUp  animated"> <strong>Latest</strong> Blogs
                                    <span>Choose from variety of styles</span>
                                </h3>
                            </div>
                        </div>

                    </div>
                    
                    <div class="row mbpx-40 p-0 pagina">
                        <?php
                        if (count($blogs) > 0) {
                            foreach ($blogs as $blog) {
                                $foo = $blog->Content;
                                $array = array();
                                preg_match('/src="([^"]*)"/i', $foo, $array);
                                $image = $array[1];
                                ?>
                                <div class="col-lg-4 pagin">
                                    <div class="f-box">
                                        <a href="{{ url('blog/'.$blog->Slug) }}"><img src="<?php echo $image; ?>" alt="*" Class="img-fluid" style="width:254.98px; height:237.78px;"></a>
                                        <div class="f-box-cntent">
                                            <a href="{{ url('blog/'.$blog->Slug) }}"><h4>{{str_limit($blog->Title, $limit = 25, $end = '...')}}</h4></a>
                                            <small><?php echo date("F j, Y", strtotime($blog->DateAdded)); ?></small>
                                            <p><?php
                                                $content = preg_replace("/<img[^>]+\>/i", " ", $blog->Content);
                                                echo str_limit($content, $limit = 135, $end = '...');
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                        
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="blog-right-box-main">
                    <h4 class="mbpx-10"><strong>Latest</strong> Posts</h4>
                    <ul class="lp-list mbpx-40">
                        <?php
                        if (count($randomsblogs) > 0) {
                            foreach ($randomsblogs as $blog) {
                                $foo = $blog->Content;
                                $array = array();
                                preg_match('/src="([^"]*)"/i', $foo, $array);
                                $image = $array[1];
                                ?>
                                <li>
                                    <a href="{{ url('blog/'.$blog->Slug) }}"><img src="<?php echo $image; ?>" alt="*" style="width:61px; height:61px;"></a>
                                    <div>
                                        <h4>{{str_limit($blog->Title, $limit = 25, $end = '...')}}</h4>
                                        <p><?php echo date("F j, Y", strtotime($blog->DateAdded)); ?></p>
                                    </div>
                                </li>
                                <?php
                            }
                        }
                        ?> 
                    </ul>

                </div>
            </div>
        </div>
    </div> 
</section>
@stop

@section('myjsfile')
<script src="{{ url('resources/assets/web') }}/js/custom.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
@stop