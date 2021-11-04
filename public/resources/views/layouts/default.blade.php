<!DOCTYPE html>
<html lang="en">
    @include('includes/head')
    @include('includes/header')
    <body class="main">
        <div class="web-loader" style="display: none;"><i class="fa fa-circle-o-notch fa-spin" style="font-size: 100px;color: #ea4e1bb8;"></i></div>
        @yield('content')
        @include('includes/footer')
        @yield('myjsfile')
    </body>
        <script type="text/javascript">
    	$( document ).ready(function() {
    if($('.main-menu').find('.active').length == 0)
    {
    $('.main-menu ul li:first').addClass('active')
    }
    });



    $( '.mobile-nav-btn' ).click(function() {
      if($(this).hasClass( "active" )){
        $('.mobile-nav-btn').removeClass('active');
        $('.mobile-nav').removeClass('active');
        
      } else {
        
        $('.mobile-nav').addClass('active');
        $('.mobile-nav-btn').addClass('active');

      }

    });
    </script>
</html>
