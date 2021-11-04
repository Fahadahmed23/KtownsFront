jQuery(document).ready(function($){
  // window.onclick=function(s){s.target!=e&&s.target!=i&&s.target!=t||$("#viewsample-img,#viewsample-img2,#popupform").modal("hide")}
  window.onload = function (){
    $(".bts-popup").delay(1000).addClass('is-visible');
  }
  
  //open popup
  $('.bts-popup-trigger').on('click', function(event){
    event.preventDefault();
    $('.bts-popup').addClass('is-visible');
  });
  
  //close popup
  $('.bts-popup').on('click', function(event){
    if( $(event.target).is('.bts-popup-close') || $(event.target).is('.bts-popup') ) {
      event.preventDefault();
      $(this).removeClass('is-visible');
    }
  });
  //close popup when clicking the esc keyboard button
  $(document).keyup(function(event){
      if(event.which=='27'){
        $('.bts-popup').removeClass('is-visible');
      }
    });
});



//** Window Sroll Start **//
$(window).scroll(function() {    
// var scroll = $(window).scrollTop();
var width = $(window).width();
//>=, not <=




// sticky header
// if (scroll >= 550 && width >= 991 ) {
// //clearHeader, not clearheader - caps H
// $("header").addClass("stickyheader");
// $(".top-info-list").addClass("");
// } else {
// $("header").removeClass("stickyheader");  
// $(".top-info-list").show();
// }
// // sticky header end

// if (scroll >= 550 && width >= 991) {
// $(".floating-container").addClass("fixed");
// } else {
// $(".floating-container").removeClass("fixed");
// $('.floating-form').removeClass('activesticky');
// $('.overlay-bg').removeClass('active-overlay');
// }
// //console.log(scroll);
// if (scroll >= 550 && width >= 991) {
// $(".sticky-ban-offer").addClass("fixed");
// } else {
// $(".sticky-ban-offer").removeClass("fixed");
// }


});

//** Window Sroll Start **//

var width = $(window).width();
if(width >= 768){
$('.editing-icon-area .items').hide();
$('.editing-icon-area .items').slice(0, 9).show();

$('.tabs-custom.general .portfolio-area .item').hide();
$('.tabs-custom.general .selected .portfolio-area .item').slice(0, 9).show();
}

$('#viewmoreldp').on('click', function (e) {
            e.preventDefault(); 
            var visibleDivs=$(".editing-icon-area .items:visible").length;
            var totalVis=$(".editing-icon-area .items").length;
            var a=totalVis-visibleDivs;

            $('.editing-icon-area .items:hidden').slice(0, 9).slideDown();
            // $("#vitems").text(visibleDivs);
            // $("#titems").text(totalVis);
            // $("#minus").text(a);

            if (a <= 1) {
              
                $("#viewmoreldp").fadeOut('slow');
            }

            //$('.tabs-custom.general .selected .portfolio-area .item').slice(0, 12).show();
});

// $('#viewmoreldp').on('click', function (e) {
//             e.preventDefault(); 
//             var visibleDivs=$(".editing-icon-area .col-lg-4:visible").length;
//             var totalVis=$(".editing-icon-area .col-lg-4").length;
//             var a=totalVis-visibleDivs;

//             $('.editing-icon-area .col-lg-4:hidden').slice(0, 6).slideDown("slow");
           

//             if (a <= 1) {
              
//                 $("#viewmoreldp").fadeOut('slow');
//             }

// });








// ** Counter Number Start ** //

//console.log(scroll);

if (scroll >= 3500) {

$('.count-number').each(function() {
  var $this = $(this),
      countTo = $this.attr('data-count');
  
  $({ countNum: $this.text()}).animate({
    countNum: countTo
  },
  {
    duration: 1000,
    easing:'linear',
    step: function() {
      $this.text(Math.floor(this.countNum));
    },
    complete: function() {
      $this.text(this.countNum);
      //alert('finished');
    }

  });
});

}

//** Counter Number END **//
// wow start
new WOW().init();
// wow end


$(document).ready(function() {


 // if(readCookie("cookie_accepted") == "1"){
 //        $(".cookie-bar").hide();
 //    }
 //    else{
 //        $(".cookie-bar").show();
 //            $('.disclaimer-area').addClass('mbpx-46');
 //            $('.cookie-btn').click(function(){
 //                $('.disclaimer-area').removeClass('mbpx-46');
 //                $('.disclaimer-area').addClass('mbpx-0');

 //            $('.cookie-bar').fadeOut();
 //            createCookie("cookie_accepted", 1, 365);
 //        });     
 //    } 

	
$('.servicelist').on('change', function() {
  $('[name=srvsslct]').val($(this).val());
})

	
 $(function(){

   if (window.location.hash){
      var hash = window.location.hash.substring(1);
      if (hash == "silver"){
alert('Silver');
$("#silver .ad_y").trigger("click");  
 }
	  
   var hash2 = window.location.hash.substring(1);
      if (hash2 == "gold"){
$("#gold .ad_y").trigger("click"); 
	   $("html, body").animate({
            scrollTop: $("#gold").offset().top -  33
        }, 2222)
		
		     }	 
	  
	    var hash2 = window.location.hash.substring(1);
      if (hash2 == "platinum"){
$("#platinum .ad_y").trigger("click");  

	   $("html, body").animate({
            scrollTop: $("#platinum").offset().top - 33
        }, 2222)    }	  
   }
   
   

});

	
 
 // $("form").submit(function(){
  // if($('[name="rd_param_services"]').val()=='-1'){
   // $('[name="rd_param_services"]').addClass('error');
    // return false;
// }
// return true;
// });
  
  
  $("form").submit(function(){ 
     
   var form = $(this);

   
   if( $(form).find('select[name="rd_param_services"]').val()=='-1'){
	  $(form).find('select[name="rd_param_services"]').addClass('error');
	   return false;
   }
   
   });
   
    
 $("select[name=rd_param_services]").change(function(){
	 
	 var ele = $(this).val();
	 
	  if(ele == "-1")
	  {
		  $('select[name="rd_param_services"]').addClass('error');
		  
	  }
	  else
	  {
		  $('select[name="rd_param_services"]').removeClass('error');
		  
	  }
	  
  });
  
  
  
//signupcode = $('[name="signup_through_code"]')

// signup through code for site pages	
// if ($("body").hasClass("homepg")) { signupcode.val('3199'); }

// if ($("body").hasClass("logo-design")) { signupcode.val('3113'); }
// if ($("body").hasClass("logo-design-overview")) { signupcode.val('3161'); }
// if ($("body").hasClass("logo-design-packages")) { signupcode.val('3163'); }
// if ($("body").hasClass("logo-design-portfolio")) { signupcode.val('3165'); }
// if ($("body").hasClass("logo-design-how-it-works")) { signupcode.val('3167'); }
// if ($("body").hasClass("logo-design-why-choose-us")) { signupcode.val('3169'); }
// if ($("body").hasClass("logo-design-testimonials")) { signupcode.val('3171'); }

// if ($("body").hasClass("web-design")) { signupcode.val('3114'); }
// if ($("body").hasClass("web-design-overview")) { signupcode.val('3173'); }
// if ($("body").hasClass("web-design-packages")) { signupcode.val('3175'); }
// if ($("body").hasClass("web-design-portfolio")) { signupcode.val('3177'); }
// if ($("body").hasClass("web-design-how-it-works")) { signupcode.val('3179'); }
// if ($("body").hasClass("web-design-why-choose-us")) { signupcode.val('3181'); }
// if ($("body").hasClass("web-design-testimonials")) { signupcode.val('3183'); }

// if ($("body").hasClass("print-design")) { signupcode.val('3184'); }
// if ($("body").hasClass("print-design-overview")) { signupcode.val('3176'); }
// if ($("body").hasClass("print-design-packages")) { signupcode.val('3180'); }
// if ($("body").hasClass("print-design-portfolio")) { signupcode.val('3182'); }
// if ($("body").hasClass("print-how-it-works")) { signupcode.val('3178'); }
// if ($("body").hasClass("print-why-choose-us")) { signupcode.val('3174'); }
// if ($("body").hasClass("print-design-testimonials")) { signupcode.val('3172'); }

// if ($("body").hasClass("animation")) { signupcode.val('3185'); }
// if ($("body").hasClass("animation-overview")) { signupcode.val('3187'); }
// if ($("body").hasClass("animation-packages")) { signupcode.val('3189'); }
// if ($("body").hasClass("animation-portfolio")) { signupcode.val('3191'); }
// if ($("body").hasClass("animation-how-it-works")) { signupcode.val('3193'); }
// if ($("body").hasClass("animation-why-choose-us")) { signupcode.val('3195'); }
// if ($("body").hasClass("animation-testimonials")) { signupcode.val('3197'); }

// if ($("body").hasClass("packages")) { signupcode.val('3115'); }
// if ($("body").hasClass("combo-packages")) { signupcode.val('3186'); }
// if ($("body").hasClass("portfolio")) { signupcode.val('3116'); }
// if ($("body").hasClass("contact-us")) { signupcode.val('3170'); }
// if ($("body").hasClass("start-your-project")) { signupcode.val('3168'); }
// if ($("body").hasClass("testimonials")) { signupcode.val('3166'); }
// if ($("body").hasClass("custom-quote")) { signupcode.val('3164'); }
// if ($("body").hasClass("aboutus")) { signupcode.val('3162'); }
 
// signup through code for site pages end


 $('.close-btn, .overlay, .popup a.close, .popup-sam a.close, .closebtn').on("click", function(){
     $('.popup, .popup2,  .overlay, .popup-sam, .bxch').fadeOut();
   });
   


    $('.sticky-tag, .open-sideform').click( function(){
        if ( $( '.floating-form' ).hasClass("activesticky") ) {
            $('.floating-form').removeClass('activesticky');
             $('.overlay-bg').removeClass('active-overlay');
        } else {    
            $('.floating-form').addClass('activesticky');
             $('.overlay-bg').addClass('active-overlay');
      }
  });

  $('.overlay-bg').click(function(){
   $('.floating-form').removeClass('activesticky');
  if ( $( '.floating-form' ).hasClass("activesticky") ) {
    $('.overlay-bg').addClass('active-overlay');
  }else {
    $('.overlay-bg').removeClass('active-overlay');
  }
})



//Popup on leave  
// function leaveFromTop(e){
//   if(width >= 768){
//     if( e.clientY < 0 ) {// less than 60px is close enough to the top

//     if ($.cookie('orform') == null)
//       {
//            $("#openloadpopup").fancybox().trigger('click');
//           cokie();
//       }
//     }
//     }
//  } 
//create cookie on form submission
// function cokie(){
//     $.cookie("orform", 1,{
//       expires : 1
//       });
//     var cookieValue = $.cookie("orform");
// }
//   setTimeout(function() {
//     $(document).on('mouseleave', leaveFromTop);
  
// }, 2000);
//Popup on leave end


"use strict";

  $('.close-sticky-banner').click(function(){
       $(".sticky-ban-offer").addClass("close");
    })



// slider form script start
  $(".slider-form-main .moreFull, .home-banner-link").click(function(){
if(width >= 992){
      $(".slider-form-box").slideToggle('fast');
      $(".slider-overlay").fadeToggle('fast');
      //$(".inner-slider-wrapper:before").fadeToggle('fast');
}
  });

  $('.slider-overlay').click( function(){
    if(width >= 992){
    $(this).fadeOut('fast');
    $('.slider-form-box').slideUp('fast');
  }
  });


// slider form script end

// Active Current Page
var str=location.href.toLowerCase();
$(".nav-area-full a, .mainnav a").each(function() {
if (str.indexOf(this.href.toLowerCase()) > -1) {
$(".active").removeClass("active");
$(this).parent().addClass("active");
}
});	

$(".mainnav a").each(function() {
if (str.indexOf(this.href.toLowerCase()) > -1) {
$(".active-mobile").removeClass("active-mobile");
$(this).parent("li").addClass("active-mobile");
}
}); 

// Active Current Page end


   //*****************************
    // Mobile Navigation
    //*****************************
    $('.mobile-nav-btn').click(function() {
        $('.mobile-nav-btn, .mobile-nav, .app-container').toggleClass('active');
    });   

    $('.firstlevel li a').click(function() {
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $(this).siblings('ul').slideUp();
        }else{
            $('.firstlevel li a').removeClass('active');
            $(this).addClass('active');
            $('.dropdown').slideUp();
            $(this).siblings('ul').slideDown();
        }
    });

    $('.mainnav > li > a').click(function() {
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $(this).parents('li').children('.firstlevel').slideUp();
        }else{
            $(this).addClass('active');
            $(this).parents('li').children('.firstlevel').slideDown();
            $(this).parents('li').siblings('li').children('a').removeClass('active');
            $(this).parents('li').siblings('li').children('.firstlevel').slideUp();
        }
    }); 

     //*****************************
    // Match Height Functions
    //*****************************
    $('.matchheight').matchHeight();


 $('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  fade: true,
  asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: false,
  arrows:false,
  centerMode: false,
  focusOnSelect: true
});



$('.center-slider').slick({
  arrows:false,
  dots:false,
  centerMode: true,
  centerPadding: '0px',
  slidesToShow: 3,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});

    
////// main slider
 $(".home-slider").slick({
    dots: true,
    arrows:false,
    infinite: !0,
    speed: 500,
    slidesToShow: 1,
    autoplay: !0,
    autoplaySpeed: 4000,
    adaptiveHeight: !0,
    responsive: [
    {
      breakpoint: 767,
      settings: {
    dots: true,
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
    });
////// main slider end

////// inner slider
 $(".inner-slider").slick({
    dots: true,
    arrows: false,
    infinite: !0,
    speed: 500,
    slidesToShow: 1,
    autoplay: !0,
    autoplaySpeed: 4000,
    adaptiveHeight: !0,
    responsive: [
    {
      breakpoint: 767,
      settings: {
    dots: true,
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
    });
////// inner slider end

$(".case-slider").slick({
  dots: true,
  arrows: false,
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  speed: 500,
  autoplay: true,
  autoplaySpeed: 2000,
  // adaptiveHeight: true
  fade: true,
  //cssEase: 'linear',    
    });

////// award customer slider
$(".award-customer-slider").slick({
  dots: true,
  arrows: false,
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  speed: 500,
  autoplay: true,
  autoplaySpeed: 2000,
  // adaptiveHeight: true
  //fade: true,
  //cssEase: 'linear',    
    });  
////// award customer slider end

////// testimonial slider
$(".testi-slider-main").slick({
  dots: true,
  arrows: false,
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  speed: 500,
  autoplay: true,
  autoplaySpeed: 2000,
  //fade: true,
  //cssEase: 'linear',    
    });  
////// testimonial slider end


 $('.blog-slider').slick({
  centerMode: true,
  centerPadding:'200px',
        dots: false,
        arrows: false,
        infinite: true,
        speed: 300,
        slidesToShow: 2,
        slideToScroll: 2,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 3000,
        lazyLoad: 'ondemand'
    });

////// partners slider
 $(".partners-slider").slick({
  dots: false,
  arrows: true,
  infinite: true,
  slidesToShow: 6,
  slidesToScroll: 1,
  speed: 500,
  autoplay: true,
  autoplaySpeed: 2000,
    responsive: [
    {
      breakpoint: 991,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 767,
      settings: {
        arrows:false,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
    });
////// partners end

////// mob slider
    $(".sliderxs").slick({
        arrows: false,
        dots: true,
        autoplay: true,
    adaptiveHeight: true,
        responsive: [
            {
              breakpoint: 10000,
              settings: "unslick"
            },
            {
              breakpoint: 767,
              settings: {
                unslick: true
              }
            }
        ]
    });
////// mob slider end

////// tabs custom (place nav and tabs anywhere separately)
$('.tabs-custom-nav a').click(function(event){
$(this).closest('li').siblings('li').removeClass('current');
$(this).closest('li').addClass('current');
$(this.hash).closest('.general').children('div.tab-content-panel:not(:hidden)').hide();
$(this.hash).closest('.general').children('div.tab-content-panel').removeClass('selected');
//$(this.hash).closest('.general').children('div.tab-content-panel:not(:hidden)').addClass('selected');
$(this.hash).show();
$(this.hash).addClass('selected');
$(this.hash).find('.item').slice(0, 9).show();
event.preventDefault();
$('.sliderxs').slick('setPosition');
});
////// tabs custom end

$('.tabs-custom-nav a.combo').click(function(event){
  var href = $('.tabs-custom-nav a.combo').attr('href');
      window.location.href = href; //causes the browser to refresh and load the requested url
   });

////// Accordion 
$('.accordion .quest-title.active1').addClass('active');
$('#accordion-1').slideDown(300).addClass('open');
function close_accordion_section() {
jQuery('.accordion .quest-title').removeClass('active');
jQuery('.accordion .quest-content').slideUp(300).removeClass('open');
}
jQuery('.quest-title').click(function(e) {
// Grab current anchor value
var currentAttrValue = jQuery(this).attr('href');
if(jQuery(e.target).is('.active')) {
close_accordion_section();
}else {
close_accordion_section();
// Add active class to section title
jQuery(this).addClass('active');
// Open up the hidden content panel
jQuery('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 
}
e.preventDefault();
});
////// Accordion end 

////// fancybox
$('[data-fancybox="swf-file"]').fancybox({
	iframe : {
		css : {
			width : '336px',
			height : '280px'
		}
	}
});

$('[data-fancybox="video-file"]').fancybox({
	iframe : {
		css : {
			width : '580px',
			height : '340px'
		}
	}
});	
////// fancybox end

// intel Tel Input
 $("[name=pn]").intlTelInput({
     
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: "body",
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
  

  /*geoIpLookup: function(callback) {
  $.ajax({
      url: 'https://telize-v1.p.mashape.com/geoip',
      type: 'GET',
      data: {},
      dataType: 'json',
      success: function (data) {
        var countryCode = (data && data.country_code) ? data.country_code : "";
        
        callback(countryCode);
      },
      error: function (err) {
        //alert("")
      },
      beforeSend: function (xhr) {
        xhr.setRequestHeader("X-Mashape-Authorization", "qKsg8tYMdTmshjZ0eSZznAWBhwOFp1huvy7jsnNg3rhw4x8SGD"); // Enter here your Mashape key
      }
    }); 
     },*/


      // initialCountry: "auto",
      // nationalMode: true,
       //separateDialCode: true,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
     // utilsScript: "/assets/js/utils.js"
    });



// $('body').delegate('.country','click',function(){
// $('input[name="country_p_name"]').val($(this).find('.country-name').text());
//  });



///// form focus effect
$('.fieldset input').blur(function()
{
if($(this).val() != ''){
$(this).closest('.fieldset').find('label').addClass('focus-effect');
} else {
$(this).closest('.fieldset').find('label').removeClass('focus-effect');
}
});

$('.fieldset input').focusin(function()
{
$(this).closest('.fieldset').find('label').addClass('focus-effect');
});
///// form focus effect end


    //Slim Scroller
    // $(window).load(function(){
    //     $.mCustomScrollbar.defaults.theme="light-1"; //set "light-2" as the default theme
    //     $(".list-scroll, .list-scroll-small").mCustomScrollbar({
    //         scrollButtons:{
    //             enable:true
    //         },
    //         callbacks:{
    //             onTotalScroll:function(){ addContent(this) },
    //             onTotalScrollOffset:100,
    //             alwaysTriggerOffsets:false
    //         }
    //     });
        

    // });




/*smooth scrool*/
$(function() {
  $('a.scroll-arrow[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});



//   var pathname = window.location.pathname; 
//   var result = pathname.split('/');
//   var width = $(window).width();

//   if(result[1] == 'packages' && width >= 768){

//     $('.tabs-custom.general #tab1').find('.package-view').eq(4).prependTo("#tab1 .packages-2by3");
//     $('.tabs-custom.general #tab1').find('.package-view').eq(4).prependTo("#tab1 .packages-2by3");

//   }

//   if(result[1] == 'packages' && width >= 768){

//     $('.tabs-custom.general #tab2').find('.package-view').eq(3).prependTo("#tab2 .packages-2by3");
//     $('.tabs-custom.general #tab2').find('.package-view').eq(3).prependTo("#tab2 .packages-2by3");

//   }

  
//   if(result[1] == 'logo-design-packages' && width >= 768 ){
//     $('.packages-2by3').find('.package-view').eq(4).prependTo(".packages-2by3");
//     $('.packages-2by3').find('.package-view').eq(4).prependTo(".packages-2by3");
//   }

//   if(result[1] == 'web-design-packages' && width >= 768 ){
//     $('.packages-2by3').find('.package-view').eq(3).prependTo(".packages-2by3");
//     $('.packages-2by3').find('.package-view').eq(3).prependTo(".packages-2by3");
//   }

  
// if(width >= 768){
// $(".packages-view-limit .package-view:nth-child(n+4)").hide();
// }

  // packages script start
// $(".packages-2by3 .package-view:nth-child(1),.packages-2by3 .package-view:nth-child(2)").removeClass('col-lg-4');
// $(".packages-2by3 .package-view:nth-child(1),.packages-2by3 .package-view:nth-child(2)").addClass('col-lg-6');
// $(".packages-2by2 .package-view").removeClass('col-lg-4');
// $(".packages-2by2 .package-view").addClass('col-lg-6');

// $(".packages-2by3 .package-view:nth-child(1) .packages-cta-list li:first-child,.packages-2by3 .package-view:nth-child(2) .packages-cta-list li:first-child").fadeIn();
// $(".packages-2by2 .package-view .packages-cta-list li:first-child").fadeIn();
// packages script end




// if(width >= 768){
//   $('.testimonial').parent().eq(11).nextAll().hide();

//   $('.view_all').on('click', function(){

//     $('.testimonial').parent().eq(11).nextAll().fadeIn();
//     $(this).parent().fadeOut();
//   });
// }

// $('#viewmore').on('click', function (e) {
//             e.preventDefault(); 
//             var visibleDivs=$(".tabs-custom.general .selected .portfolio-area .item:visible").length;
//             var totalVis=$("#tab1 .portfolio-area .item").length;
//             var a=totalVis-visibleDivs;

//             $('.tabs-custom.general .selected .portfolio-area .item:hidden').slice(0, 9).slideDown();
//             // $("#vitems").text(visibleDivs);
//             // $("#titems").text(totalVis);
//             // $("#minus").text(a);

//             if (a <= 1) {
//               $("#viewmore").fadeOut('slow');
//             }

//             //$('.tabs-custom.general .selected .portfolio-area .item').slice(0, 12).show();
//         });



$(".tabs-custom-nav li a").on('click', function(){

$("#viewmore").show();

});


// $('.scrolltotop').on('click', function(){
//     $(".floating-container").removeClass("fixed");
//     $('.floating-form').removeClass('activesticky');
//     /*$(".sticky-ban-offer").removeClass("fixed");*/

//     $(window).scroll(function() {
//         var scroll = $(window).scrollTop();

//         if (scroll >= 550) {
//             $(".floating-container").addClass("fixed");
//         } else {
//             $(".floating-container").removeClass("fixed");
//             $('.floating-form').removeClass('activesticky');
//         }
//         //console.log(scroll);
//         if (scroll >= 550) {
//             $(".sticky-ban-offer").addClass("fixed");
//         } else {
//             $(".sticky-ban-offer").removeClass("fixed");
            
//         }
        
//     });

// });


// clients box
  $('.oc_box').parent().eq(19).nextAll().hide();

  $('.view_all').on('click', function(){

    $('.oc_box').parent().eq(19).nextAll().fadeIn();
    $(this).parent().fadeOut();
  });
// clients box end


if (typeof $.cookie('CUSTOMERCODE') === 'undefined'){
$('.sign-in').text('Sign In');

} else {
$('.sign-in').text('My Area');
}




}); // document ready end


// Start of Zendesk Chat Script 
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?5UDezdc5sKqCui8C3Tvz9PHNfa3L1VnV";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");

function setButtonURL(){
javascript:$zopim.livechat.window.show();
}
// End of Zendesk Chat Script

// advm code start
function getParameterByName(e,t){t||(t=window.location.href),e=e.replace(/[\[\]]/g,"\\$&");var n=new RegExp("[?&]"+e+"(=([^&#]*)|&|#|$)").exec(t);return n?n[2]?decodeURIComponent(n[2].replace(/\+/g," ")):"":null}function createCookie(e,t,n){var o="";if(n){var a=new Date;a.setTime(a.getTime()+24*n*60*60*1e3),o="; expires="+a.toUTCString()}document.cookie=e+"="+t+o+"; path=/"}function readCookie(e){for(var t=e+"=",n=document.cookie.split(";"),o=0;o<n.length;o++){for(var a=n[o];" "==a.charAt(0);)a=a.substring(1,a.length);if(0==a.indexOf(t))return a.substring(t.length,a.length)}return null}function eraseCookie(e){createCookie(e,"",-1)}$(document).ready(function(){var e=getParameterByName("advm");null!=e?($("input[name=advm]").val(e),createCookie("advm",e,1)):(e=readCookie("advm"),$("input[name=advm]").val(e));var t=document.getElementsByName("ft").length;for(count=0;count<t;count++)document.getElementsByName("ft")[count].value=window.location.href});
// advm code end








/* footer anchor links for about page tabs */
//   var loc = window.location.hash.substr(1);
// $(".ourteam").click(function() {
// $('html,body').animate({scrollTop: $("#web-tab").offset().top -20},'slow');
// $('.about-tabs ul li').removeClass('current');
// $('.about-tabs ul li:nth-child(2)').addClass('current');
// $('.tabs-custom.general div').removeClass('selected');
// $('.tabs-custom.general div:nth-child(2)').addClass('selected');
// $('.tabs-custom.general div').removeAttr("style");
// $('.tabs-custom.general div:nth-child(2)').css('display','block');
// });

// $(".guar").click(function() {
// $('html,body').animate({scrollTop: $("#web-tab").offset().top -20},'slow');
// $('.about-tabs ul li').removeClass('current');
// $('.about-tabs ul li:nth-child(3)').addClass('current');
// $('.tabs-custom.general div').removeClass('selected');
// $('.tabs-custom.general div:nth-child(3)').addClass('selected');
// $('.tabs-custom.general div').removeAttr("style");
// $('.tabs-custom.general div:nth-child(3)').css('display','block');
// });

// $(".qma").click(function() {
// $('html,body').animate({scrollTop: $("#web-tab").offset().top -20},'slow');
// $('.about-tabs ul li').removeClass('current');
// $('.about-tabs ul li:nth-child(4)').addClass('current');
// $('.tabs-custom.general div').removeClass('selected');
// $('.tabs-custom.general div:nth-child(4)').addClass('selected');
// $('.tabs-custom.general div').removeAttr("style");
// $('.tabs-custom.general div:nth-child(4)').css('display','block');
// });


// if(loc == "our_team"){
// $('html,body').animate({scrollTop: $("#web-tab").offset().top -20},'slow');
// $('.about-tabs ul li').removeClass('current');
// $('.about-tabs ul li:nth-child(2)').addClass('current');
// $('.tabs-custom.general div').removeClass('selected');
// $('.tabs-custom.general div:nth-child(2)').addClass('selected');
// }
// if(loc == "guarantees"){
// $('html,body').animate({scrollTop: $("#web-tab").offset().top -20},'slow');
// $('.about-tabs ul li').removeClass('current');
// $('.about-tabs ul li:nth-child(3)').addClass('current');
// $('.tabs-custom.general div').removeClass('selected');
// $('.tabs-custom.general div:nth-child(3)').addClass('selected');
// }
// if(loc == "quality_management"){
// $('html,body').animate({scrollTop: $("#web-tab").offset().top -20},'slow');
// $('.about-tabs ul li').removeClass('current');
// $('.about-tabs ul li:nth-child(4)').addClass('current');
// $('.tabs-custom.general div').removeClass('selected');
// $('.tabs-custom.general div:nth-child(4)').addClass('selected');
//}
/* footer anchor links for about page tabs end */  