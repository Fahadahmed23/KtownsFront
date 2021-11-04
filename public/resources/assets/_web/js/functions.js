$(window).load(function() {
 $('#status').fadeOut();
 $('#preloader').delay(350).fadeOut('slow');
 $('body').delay(350).css({
  'overflow': 'visible'
 });
 $(window).scroll()
})
$(window).scroll(function() {
 'use strict';
 if ($(this).scrollTop() > 1) {
  $('header').addClass("sticky")
 } else {
  $('header').removeClass("sticky")
 }
});
$('a.open_close').on("click", function() {
 $('.main-menu').toggleClass('show');
 $('.layer').toggleClass('layer-is-visible')
});
$('a.show-submenu').on("click", function() {
 $(this).next().toggleClass("show_normal")
});
$('a.show-submenu-mega').on("click", function() {
 $(this).next().toggleClass("show_mega")
});
if ($(window).width() <= 480) {
 $('a.open_close').on("click", function() {
  $('.cmn-toggle-switch').removeClass('active')
 })
}
$(window).bind('resize load', function() {
 if ($(this).width() < 991) {
  $('.collapse#collapseFilters').removeClass('in');
  $('.collapse#collapseFilters').addClass('out')
 } else {
  $('.collapse#collapseFilters').removeClass('out');
  $('.collapse#collapseFilters').addClass('in')
 }
});
$('.expose').on("click", function(e) {
 "use strict";
 $(this).css('z-index', '2');
 $('#overlay').fadeIn(300)
});
$('#overlay').click(function(e) {
 "use strict";
 $('#overlay').fadeOut(300, function() {
  $('.expose').css('z-index', '1')
 })
});
$('.tooltip-1').tooltip({
 html: !0
});

function toggleChevron(e) {
 $(e.target).prev('.panel-heading').find("i.indicator").toggleClass('icon-plus icon-minus')
}
$('.panel-group').on('hidden.bs.collapse shown.bs.collapse', toggleChevron);
$(".btn_map").on("click", function() {
 var el = $(this);
 el.text() == el.data("text-swap") ? el.text(el.data("text-original")) : el.text(el.data("text-swap"))
});
new WOW().init();
$(function() {
 'use strict';
 $('.video').magnificPopup({
  type: 'iframe'
 });
 $('.parallax-window').parallax({});
 $('.magnific-gallery').each(function() {
  $(this).magnificPopup({
   delegate: 'a',
   type: 'image',
   gallery: {
    enabled: !0
   }
  })
 });
 $('.dropdown-menu').on("click", function(e) {
  e.stopPropagation()
 });
 $('ul#top_tools li .dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(!0, !0).delay(50).fadeIn(50)
 }, function() {
  $(this).find('.dropdown-menu').stop(!0, !0).delay(50).fadeOut(50)
 });
 var toggles = document.querySelectorAll(".cmn-toggle-switch");
 for (var i = toggles.length - 1; i >= 0; i--) {
  var toggle = toggles[i];
  toggleHandler(toggle)
 };

 function toggleHandler(toggle) {
  toggle.addEventListener("click", function(e) {
   e.preventDefault();
   (this.classList.contains("active") === !0) ? this.classList.remove("active"): this.classList.add("active")
  })
 };
 $(window).scroll(function() {
  if ($(this).scrollTop() != 0) {
   $('#toTop').fadeIn()
  } else {
   $('#toTop').fadeOut()
  }
 });
 $('#toTop').on("click", function() {
  $('body,html').animate({
   scrollTop: 0
  }, 500)
 });
 var max = 10, min = 1;
$(".numbers-row").append('<div class="inc button_inc">+</div><div class="dec button_inc">-</div>');
	$(".button_inc").on("click", function() {
		var $button = $(this);
		var valuex = $button.parent().find("input").val();
    
		if ($button.text() == "+") {
    	if(parseFloat(valuex) < max) {
    		valuex = parseFloat(valuex) + 1;
      }
		} else {
    	if (parseFloat(valuex) > min) {
      	valuex = parseFloat(valuex) - 1;
      }
		}
	$button.parent().find("input").val(valuex);
  guests_rooms_set_values();
});

function guests_rooms_set_values() {
	var guests_qty = parseFloat($("#Adults").val()) | 0;
  var rooms_qty = parseFloat($("#Rooms").val()) | 0;
  /* $("#log").html(rooms_qty) */;
  if (rooms_qty < (guests_qty/2)) {
  	rooms_qty = Math.ceil(guests_qty/2);
  }
  if (rooms_qty > guests_qty) {
  	rooms_qty = guests_qty;
  }
  $("#Rooms").val(rooms_qty);
}
});
$('ul#cat_nav li a').on('click', function() {
 $('ul#cat_nav li a.active').removeClass('active');
 $(this).addClass('active')
});
$('#map_filter ul li a').on('click', function() {
 $('#map_filter ul li a.active').removeClass('active');
 $(this).addClass('active')
});
$(function() {
 'use strict';
 $("#range").ionRangeSlider({
  hide_min_max: !0,
  keyboard: !0,
  min: 500,
  max: 50000,
  from: 1000,
  to: 20000,
  type: 'double',
  step: 1,
  prefix: "PKR ",
  grid: !0
 })
})