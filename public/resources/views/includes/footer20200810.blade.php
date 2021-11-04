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
<footer>
<div class="container">
<div class="row ft-paddingbottom20">
<div class="col-md-3">
<div class="ft ft-1">
<div class="footer-logo">
<img class="lozad" data-src="{{ url('resources/assets/web/img/footer-logo.png') }}">
</div>
<div class="ft1-content">
<h3 class="fontlato">Need Help ?</h3>
<a class="fontlato" href="tel:{{ $configuration->Contact1 }}">{{ $configuration->Contact1 }}</a>
<a class="fontlato" href="tel:{{ $configuration->Contact2 }}">{{ $configuration->Contact2 }}</a>
<a class="fontlato" href="{{ $emails->SupportEmail }}">{{ $emails->SupportEmail }}</a>
<img class="lozad" data-src="{{ url('resources/assets/web/img/payment.png') }}" class="payment-img">
</div>
</div>
</div>
<div class="col-md-3">
<div class="ft ft-2">
<h3>Support & Help</h3>
<ul>
<li><a href="{{ url('about-us') }}">About Us</a></li>
<li><a href="{{ url('contact') }}">Contact Us</a></li>
<li><a href="{{ url('blog') }}">Blogs</a></li>
</ul>
<ul>
<li><a href="{{ url('corporate-clients') }}">Corporate Partners</a></li>
<li><a href="{{ url('partner') }}">Hotel Partners</a></li>
<li><a href="{{ url('travel-agent') }}">Travel Agent</a></li>
</ul>
</div>
</div>
<div class="col-md-3">
<div class="ft ft-3">
<h3>Popular Services</h3>
<ul>
<li><a href="{{ url('hotels') }}">Our Hotels</a></li>
<li><a href="javascript:void(0);">Privacy Policy</a></li>
<li><a href="{{ url('guest-policy') }}">Guest Policy</a></li>
</ul>
<ul>
<li><a href="{{ url('terms-conditions') }}">Terms & Conditions</a></li>
<li><a href="{{ url('web-privacy-policy') }}">Web Privacy Policy</a></li>
<li><a href="javascript:"></a></li>
</ul>
<h2 class="hidden-sm-down">Want to Join Us ?</h2>
<a class="linkurl hidden-sm-down" href="{{ url('careers') }}">View Open Positions</a>
</div>
</div>
<div class="col-md-3">
<div class="ft ft-4">
<h3>Address</h3>
<p>{{ $configuration->Address }}</p>
<h3>Follow Us</h3>
<div class="social-icons">
<a href="{{ $configuration->Facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
<a href="{{ $configuration->Instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>
<a href="{{ $configuration->Twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
<a href="{{ $configuration->LinkedIn }}" target="_blank"><i class="fa fa-linkedin"></i></a>
<a href="https://wa.me/923453382192?text=I'm%20interested%20in%20your%20Ktownrooms%20for%20Booking"><i class="fa fa-whatsapp"></i></a>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="hotel-locations hidden-sm-down">
<a href="{{ url('hotels-in-karachi') }}">Hotels in Karachi</a></li> |
<a href="{{ url('hotels-in-lahore') }}">Hotels in Lahore</a></li> |
<a href="{{ url('hotels-in-islamabad') }}">Hotels in Islamabad</a></li> |
<a href="{{ url('hotels-in-murree') }}">Hotels in Murree</a></li> |
<a href="{{ url('hotels-in-swat') }}">Hotels in Swat</a></li> |
<a href="{{ url('hotels-in-naran') }}">Hotels in Naran</a></li> |
<a href="{{ url('hotels-in-hyderabad') }}">Hotels in Hyderabad</a>
<a href="{{ url('hotels-in-multan') }}">Hotels in Multan</a>
<a href="{{ url('hotels-in-gwadar') }}">Hotels in Gwadar</a>
<a href="{{ url('hotels-in-sukkur') }}">Hotels in Sukkur</a>
<a href="{{ url('hotels-in-ziarat') }}">Hotels in Ziarat</a>
<a href="{{ url('hotels-in-larkana') }}">Hotels in Larkana</a>
<a href="{{ url('hotels-in-muzaffarabad') }}">Hotels in Muzaffarabad</a>
<a href="{{ url('hotels-in-neelum-valley') }}">Hotels in Neelum Valley</a>
<a href="{{ url('hotels-in-peshawar') }}">Hotels in Peshawar</a>
<a href="{{ url('hotels-in-quetta') }}">Hotels in Quetta</a>
<a href="{{ url('hotels-in-malam-jabba') }}">Hotels in Malam Jabba</a>
<a href="{{ url('hotels-in-rawalpindi') }}">Hotels in Rawalpindi</a>
<a href="{{ url('hotels-in-hunza') }}">Hotels in Hunza</a>
<a href="{{ url('hotels-in-skardu') }}">Hotels in Skardu</a>
<a href="{{ url('hotels-in-kalam') }}">Hotels in Kalam</a>
<a href="{{ url('hotels-in-abbottabad') }}">Hotels in Abbottabad</a>
<a href="{{ url('hotels-in-aliabad') }}">Hotels in Aliabad</a>
<a href="{{ url('hotels-in-arang-kel') }}">Hotels in Arang Kel</a>
<a href="{{ url('hotels-in-nathia-gali') }}">Hotels in Nathia Gali</a>
<a href="{{ url('hotels-in-shogran') }}">Hotels in Shogran</a>
<a href="{{ url('hotels-in-gilgit') }}">Hotels in Gilgit</a>
<a href="{{ url('hotels-in-chitral') }}">Hotels in Chitral</a>
<a href="{{ url('hotels-in-attock') }}">Hotels in Attock</a>
<a href="{{ url('hotels-in-mansehra') }}">Hotels in Mansehra</a>
<a href="{{ url('hotels-in-bagh') }}">Hotels in Bagh</a>
<a href="{{ url('hotels-in-rawalakot') }}">Hotels in Rawalakot</a>
<a href="{{ url('hotels-in-bahawalpur') }}">Hotels in Bahawalpur</a>
<a href="{{ url('hotels-in-balakot') }}">Hotels in Balakot</a>
<a href="{{ url('hotels-in-gujranwala') }}">Hotels in Gujranwala</a>
<a href="{{ url('hotels-in-ayubia') }}">Hotels in Ayubia</a>
<a href="{{ url('hotels-in-kotli') }}">Hotels in Kotli</a>
<a href="{{ url('hotels-in-mirpur') }}">Hotels in Mirpur</a>
<a href="{{ url('hotels-in-sargodha') }}">Hotels in Sargodha</a>
<a href="{{ url('hotels-in-sialkot') }}">Hotels in Sialkot</a>
<a href="{{ url('hotels-in-faisalabad') }}">Hotels in Faisalabad</a>
<a href="{{ url('hotels-in-saidu-sharif') }}">Hotels in Saidu Sharif</a>
<a href="{{ url('hotels-in-mingora') }}">Hotels in Mingora</a>
<a href="{{ url('hotels-in-chilas') }}">Hotels in Chilas</a>
<a href="{{ url('hotels-in-dera-ismail-khan') }}">Hotels in Dera Ismail Khan</a>
<a href="{{ url('hotels-in-gorakh-hill') }}">Hotels in Gorakh Hill</a>
<a href="{{ url('hotels-in-kalash-valley') }}">Hotels in Kalash Valley</a>
</div>
</div>
</div>
<div class="row">
<div class="copyrights">
<p>{{ $configuration->Copyright }}</p>
</div>
</div>
</div>
@include('includes/scripts')
</footer>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" type="text/css" media="all">
<script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
<script>const observer=lozad();observer.observe();</script>
<style>#more{display:none}</style>
<script>function myFunction(){var c=document.getElementById("dots");var a=document.getElementById("more");var b=document.getElementById("myBtn");if(c.style.display==="none"){c.style.display="inline";b.innerHTML="Read more";a.style.display="none"}else{c.style.display="none";b.innerHTML="Read less";a.style.display="inline"}};</script>