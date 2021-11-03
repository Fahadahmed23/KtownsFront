<!DOCTYPE html>
<html lang="en">
    @include('includes/head')
    @include('includes/header')
    <body class="main">
        <div class="web-loader" style="display: none;"><i class="fa fa-circle-o-notch fa-spin" style="font-size: 100px;color: #ea4e1bb8;"></i></div>
        <div class="book-loader" style="display: none;"><i class="fa fa-circle-o-notch fa-spin" style="font-size: 100px;color: #ea4e1bb8;"></i></div>
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
  <!-- MR OPTIMIST --> 
  <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
          {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
          n.callMethod.apply(n,arguments):n.queue.push(arguments)};
          if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
          n.queue=[];t=b.createElement(e);t.async=!0;
          t.src=v;s=b.getElementsByTagName(e)[0];
          s.parentNode.insertBefore(t,s)}(window, document,'script',
          'https://connect.facebook.net/en_US/fbevents.js');
          fbq('init', '408775447605793');
          fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=408775447605793&ev=PageView&noscript=1"
    /></noscript>
<!-- End Facebook Pixel Code -->
</html>
