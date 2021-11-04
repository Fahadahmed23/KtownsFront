<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="B7yIaUV72XaRbRwP1syZaXouPYPcoss4eN_MigRITTo" />
        <meta name="description" content="Citytours - Premium site template for city tours agencies, transfers and tickets.">
        <meta name="author" content="Ansonika">
        <title>{{ $configuration->WebsiteTitle }} | My Bookings</title>

        <!-- Favicons-->
        <link rel="shortcut icon" href="{{ url('resources/assets/web') }}/img/favicon.png" type="image/x-icon">
        <link rel="apple-touch-icon" type="image/x-icon" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-57x57-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-144x144-precomposed.png">

        <!-- CSS -->
        <link href="{{ url('resources/assets/web') }}/css/base.css" rel="stylesheet">

        <!-- Radio and check inputs -->
        <link href="{{ url('resources/assets/web') }}/css/skins/square/grey.css" rel="stylesheet">

        <!-- Range slider -->
        <link href="{{ url('resources/assets/web') }}/css/ion.rangeSlider.css" rel="stylesheet" >
        <link href="{{ url('resources/assets/web') }}/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">

        <link rel="stylesheet" href="{{ url('resources/assets/web') }}/font-awesome/css/font-awesome.min.css">

        <!-- Google web fonts -->
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
        
        <link rel="stylesheet" href="{{ url('resources/assets/web') }}/plugins/datatables/dataTables.bootstrap.css">

        <!--[if lt IE 9]>
          <script src="js/html5shiv.min.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136415631-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-136415631-1');
        </script>

    </head>
    <body>

        <!--[if lte IE 8]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
        <![endif]-->

        <div id="preloader">
            <div class="sk-spinner sk-spinner-wave">
                <div class="sk-rect1"></div>
                <div class="sk-rect2"></div>
                <div class="sk-rect3"></div>
                <div class="sk-rect4"></div>
                <div class="sk-rect5"></div>
            </div>
        </div>
        <!-- End Preload -->

        <div class="layer"></div>

        @include('includes/header')

        <div  class="container margin_160">

            <div class="row">
                <aside class="col-lg-3 col-md-3">

                    @include('includes/user_sidebar')

                </aside>
                <div class="col-lg-9 col-md-9">

                    <div id="filters_col" class="user-dashboard">
                        <h3>My Bookings</h3>
                        @include('includes/front_alerts')
                        <div class="table-responsive">
                        <table id="dataList" class="display table table-bordered table-striped table-hover" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Booking Total</th>
                                    <th>Discount</th> 
                                    <th>Promo Discount</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Booked on</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @include('includes/footer')

        <div id="toTop"></div>

        <script src="{{ url('resources/assets/web') }}/js/jquery-1.11.2.min.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/common_scripts_min.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/functions.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/cat_nav_mobile.js"></script>
        <script src="{{ url('resources/assets/web/') }}/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ url('resources/assets/web/') }}/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <script>$('#cat_nav').mobileMenu();</script>
        <script language="javascript">
            var checkAll;
            var checkboxes;

            $(function () {

                var data_list = $('#dataList').dataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        'type': 'POST',
                        'url': '{{ url(Request::path()) }}',
                        'headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
                    },
                    "pageLength": 50,
                    "aLengthMenu": [[10, 25, 50, 100, <?php echo $recordsTotal; ?>], [10, 25, 50, 100, "All"]],
                    aoColumnDefs: [
                        {
                            bSortable: false,
                            aTargets: [0,1,2,3,4,5,6]
                        }
                    ],
                    "oLanguage": {
                        "sSearch": "",
                        "sProcessing": "<img src='{{ url('resources/assets/admin') }}/images/loading-spinner-grey.gif'>"
                    }
                });

                $('#dataList_filter input').attr('style', 'display:none');
                $('.dataTables_length').attr('style', 'display:none');
                $('.sorting_asc').addClass('sorting_disabled');
                $('.sorting_disabled').removeClass('sorting_asc');
            });
        </script>
    </body>
</html>