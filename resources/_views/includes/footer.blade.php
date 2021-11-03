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
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <h3>Need help?</h3>
                <a href="javascript:void(0);" id="phone">+92(311) 1222 418</a>
                <a href="javascript:void(0);" id="phone">{{ $configuration->Contact1 }}</a>
                <a href="mailto:{{ $emails->SupportEmail }}" id="email_footer">{{ $emails->SupportEmail }}</a>
            </div>
            <div class="col-md-3 col-sm-3">
                <h3>&nbsp;</h3>
                <ul>
                    <li><a href="{{ url('home') }}">Home</a></li>
                    <li><a href="{{ url('about-us') }}">About Us</a></li>
                    <li><a href="{{ url('hotels') }}">Our Hotels</a></li>
                    <li><a href="{{ url('contact') }}">Contact Us</a></li>
                    <li><a href="{{ url('blog') }}">Blog</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3">
                <h3>&nbsp;</h3>
                <ul>
                    <li><a href="{{ url('partner') }}">Become Partners</a></li>
                    <li><a href="{{ url('corporate-clients') }}">Corporate Partners</a></li>
                    <li><a href="{{ url('travel-agent') }}">Travel Agent</a></li>
                    <li><a href="{{ url('careers') }}">Careers</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3">
                <h3>&nbsp;</h3>
                <ul>
                    <?php
                    $k = 0;
                    if (count($pages) > 0) {
                        foreach ($pages as $page) {
                            ?>
                            <li><a href="{{ url('page/'.$page->Slug) }}">{{ $page->Title }}</a></li>
                            <?php
                            $k++;
//                            if ($k % 3 == 0) {
//                                echo '</ul></div><div class="col-md-3 col-sm-3"><h3>&nbsp;</h3><ul>';
//                            }
                        }
                    }
                    ?>
                </ul>
            </div>
        </div><!-- End row -->
        <div class="row">
            <div class="col-md-12">
                <div id="hotel_footer">
                    <h4 style="text-align:center; color:#fff;font-size:28px;"><strong>Hotels in Pakistan</strong></h4>
                    <ul>
                        <li><a href="{{ url('hotels-in-karachi') }}">Hotels in Karachi</a></li> |
                        <li><a href="{{ url('hotels-in-lahore') }}">Hotels in Lahore</a></li>  |
                        <li><a href="{{ url('hotels-in-islamabad') }}">Hotels in Islamabad</a></li> |
                        <li><a href="{{ url('hotels-in-murree') }}">Hotels in Murree</a></li> |
                        <li><a href="{{ url('hotels-in-swat') }}">Hotels in Swat</a></li> |
                        <li><a href="{{ url('hotels-in-naran') }}">Hotels in Naran</a></li> |
                        <li><a href="{{ url('hotels-in-hyderabad') }}">Hotels in Hyderabad</a></li> |
                        <li><a href="{{ url('hotels-in-multan') }}">Hotels in Multan</a></li> |
                        <li><a href="{{ url('hotels-in-gwadar') }}">Hotels in Gwadar</a></li> |
                        <li><a href="{{ url('hotels-in-sukkur') }}">Hotels in Sukkur</a></li> |
                        <li><a href="{{ url('hotels-in-ziarat') }}">Hotels in Ziarat</a></li> |
                        <li><a href="{{ url('hotels-in-larkana') }}">Hotels in Larkana</a></li> |
                        <li><a href="{{ url('hotels-in-muzaffarabad') }}">Hotels in Muzaffarabad</a></li> |
                        <li><a href="{{ url('hotels-in-neelum-valley') }}">Hotels in Neelum Valley</a></li> |
                        <li><a href="{{ url('hotels-in-peshawar') }}">Hotels in Peshawar</a></li> |
                        <li><a href="{{ url('hotels-in-quetta') }}">Hotels in Quetta</a></li> |
                        <li><a href="{{ url('hotels-in-malam-jabba') }}">Hotels in Malam Jabba</a></li> |
                        <li><a href="{{ url('hotels-in-rawalpindi') }}">Hotels in Rawalpindi</a></li> |
                        <li><a href="{{ url('hotels-in-hunza') }}">Hotels in Hunza</a></li> |
                        <li><a href="{{ url('hotels-in-skardu') }}">Hotels in Skardu</a></li> |
                        <li><a href="{{ url('hotels-in-kalam') }}">Hotels in Kalam</a></li> |
                        <li><a href="{{ url('hotels-in-abbottabad') }}">Hotels in Abbottabad</a></li> |
                        <li><a href="{{ url('hotels-in-aliabad') }}">Hotels in Aliabad</a></li> |
                        <li><a href="{{ url('hotels-in-arang-kel') }}">Hotels in Arang Kel</a></li> |
                        <li><a href="{{ url('hotels-in-nathia-gali') }}">Hotels in Nathia Gali</a></li> |
                        <li><a href="{{ url('hotels-in-shogran') }}">Hotels in Shogran</a></li> |
                        <li><a href="{{ url('hotels-in-gilgit') }}">Hotels in Gilgit</a></li> |
                        <li><a href="{{ url('hotels-in-chitral') }}">Hotels in Chitral</a></li> |
                        <li><a href="{{ url('hotels-in-attock') }}">Hotels in Attock</a></li> |
                        <li><a href="{{ url('hotels-in-mansehra') }}">Hotels in Mansehra</a></li> |
                        <li><a href="{{ url('hotels-in-bagh') }}">Hotels in Bagh</a></li> |
                        <li><a href="{{ url('hotels-in-rawalakot') }}">Hotels in Rawalakot</a></li> |
                        <li><a href="{{ url('hotels-in-bahawalpur') }}">Hotels in Bahawalpur</a></li> |
                        <li><a href="{{ url('hotels-in-balakot') }}">Hotels in Balakot</a></li> |
                        <li><a href="{{ url('hotels-in-gujranwala') }}">Hotels in Gujranwala</a></li> |
                        <li><a href="{{ url('hotels-in-ayubia') }}">Hotels in Ayubia</a></li> |
                        <li><a href="{{ url('hotels-in-kotli') }}">Hotels in Kotli</a></li> |
                        <li><a href="{{ url('hotels-in-mirpur') }}">Hotels in Mirpur</a></li> |
                        <li><a href="{{ url('hotels-in-sargodha') }}">Hotels in Sargodha</a></li> |
                        <li><a href="{{ url('hotels-in-sialkot') }}">Hotels in Sialkot</a></li> |
                        <li><a href="{{ url('hotels-in-faisalabad') }}">Hotels in Faisalabad</a></li> |
                        <li><a href="{{ url('hotels-in-saidu-sharif') }}">Hotels in Saidu Sharif</a></li> |
                        <li><a href="{{ url('hotels-in-mingora') }}">Hotels in Mingora</a></li> |
                        <li><a href="{{ url('hotels-in-chilas') }}">Hotels in Chilas</a></li> |
                        <li><a href="{{ url('hotels-in-dera-ismail-khan') }}">Hotels in Dera Ismail Khan</a></li> |
                        <li><a href="{{ url('hotels-in-gorakh-hill') }}">Hotels in Gorakh Hill</a></li> |
                        <li><a href="{{ url('hotels-in-kalash-valley') }}">Hotels in Kalash Valley</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="social_footer">
                    <ul>
                        <li><a href="{{ $configuration->Facebook }}"><i class="icon-facebook"></i></a></li>
                        <li><a href="{{ $configuration->Twitter }}"><i class="icon-twitter"></i></a></li>
                        <li><a href="{{ $configuration->Google }}"><i class="icon-google"></i></a></li>
                        <li><a href="{{ $configuration->Instagram }}"><i class="icon-instagram"></i></a></li>
                        <li><a href="{{ $configuration->LinkedIn }}"><i class="icon-linkedin"></i></a></li>
                    </ul>
                    <p>{{ $configuration->Copyright }}</p>
                </div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
</footer>
<script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>