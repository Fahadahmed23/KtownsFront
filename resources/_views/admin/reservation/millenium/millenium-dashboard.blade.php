<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $configuration->WebsiteTitle }} | Dashboard</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="{{ url('resources/assets/admin/') }}/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ url('resources/assets/admin/') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="{{ url('resources/assets/admin/') }}/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="{{ url('resources/assets/admin/') }}/dist/css/skins/_all-skins.min.css">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper"> @include('admin/includes/header')
            @include('admin/includes/sidebar')
            <div class="content-wrapper">
                <section class="content-header">
                    <h1> Dashboard </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('admin/millenium') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                    {!! Form::open([ 'url' => 'admin/millenium/dashboard', 'id' => 'frm_list' ]) !!}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=CheckInDate">Start Date: <span class="mandatory">*</span></label>
                                {!! Form::text('StartDate', null, ['placeholder' => 'Start Date', 'class' => 'form-control', 'id' => 'CheckInDate']) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="CheckOutDate">End Date <span class="mandatory">*</span></label>
                                {!! Form::text('EndDate', null, ['placeholder' => 'End Date', 'class' => 'form-control', 'id' => 'CheckOutDate']) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=CheckInDate"><span class="mandatory"></span></label>
                                <input type="submit" value="Submit" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    {!! FORM::close() !!}
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box"> <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                                <div class="info-box-content"> <span class="info-box-text">CheckIn Guest</span> <span class="info-box-number">{{ $checkin }}</span> </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box"> <span class="info-box-icon bg-green"><i class="fa fa-building-o"></i></span>
                                <div class="info-box-content"> <span class="info-box-text">Total Revenue</span> <span class="info-box-number">{{ $total_revenue }}</span> </div>
                            </div>
                        </div>
                        <div class="clearfix visible-sm-block"></div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box"> <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>
                                <div class="info-box-content"> <span class="info-box-text">No of Rooms Occupied / Left </span> <span class="info-box-number">{{ $no_of_rooms_occupied }} / {{ $no_room - $no_of_rooms_occupied }}</span> </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box"> <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>
                                <div class="info-box-content"> <span class="info-box-text">Occupancy</span> <span class="info-box-number">{{  $no_of_rooms_occupied * 100 / $no_room }}%</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box"> <span class="info-box-icon bg-yellow"><i class="fa fa-edit"></i></span>
                                <div class="info-box-content"> <span class="info-box-text">Total Bookings</span> <span class="info-box-number">{{ $bookings }}</span> </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box"> <span class="info-box-icon bg-red"><i class="fa fa-check"></i></span>
                                <div class="info-box-content"> <span class="info-box-text">Approved Bookings</span> <span class="info-box-number">{{ $approved_bookings }}</span> </div>
                            </div>
                        </div>
                        <div class="clearfix visible-sm-block"></div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box"> <span class="info-box-icon bg-green"><i class="fa fa-clock-o"></i></span>
                                <div class="info-box-content"> <span class="info-box-text">Pending Bookings</span> <span class="info-box-number">{{ $pending_bookings }}</span> </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box"> <span class="info-box-icon bg-aqua"><i class="fa fa-close"></i></span>
                                <div class="info-box-content"> <span class="info-box-text">Cancel Booking</span> <span class="info-box-number">{{ $canceled_bookings }}</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Monthly Recap Report</h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-center"> <strong>Sales: 1 Jun, 2017 - 30 Nov, 2017</strong> </p>
                                            <canvas id="myChart" height="80"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </section>
            </div>
            @include('admin/includes/footer')
        </div>
                    <script src="{{ url('resources/assets/admin/') }}/plugins/jQuery/jquery-2.2.3.min.js"></script>
                            <script src="{{ url('resources/assets/admin/') }}/bootstrap/js/bootstrap.min.js"></script>
                                <script src="{{ url('resources/assets/admin/') }}/plugins/fastclick/fastclick.js"></script>
                                <script src="{{ url('resources/assets/admin/') }}/plugins/sparkline/jquery.sparkline.min.js"></script>
                                <script src="{{ url('resources/assets/admin/') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
                                <script src="{{ url('resources/assets/admin/') }}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="{{ url('resources/assets/admin/') }}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!--<script src="{{ url('resources/assets/admin/') }}/plugins/chartjs/Chart.min.js"></script>-->
                        <script src="{{ url('resources/assets/admin/') }}/dist/js/app.min.js"></script>
                            <script src="{{ url('resources/assets/admin/') }}/plugins/Chart.bundle.min.js"></script>
                                <script src="{{ url('resources/assets/admin/') }}/plugins/Chart.min.js"></script>
                                <script src="{{ url('resources/assets/admin/') }}/plugins/datepicker/bootstrap-datepicker.js"></script>
        <script>
                                                    $('input[type="checkbox"], input[type="radio"]').iCheck({
                                            checkboxClass: 'icheckbox_minimal-blue',
                                                    radioClass: 'iradio_minimal-blue'
                                            });
                                                    var start_date = new Date();
                                                    start_date.setDate(start_date.getDate());
                                                    $('#CheckInDate, #CheckOutDate').datepicker({
                                            autoclose: true,
                                                    format: 'yyyy-mm-dd',
                                                    todayHighlight: true
                                            });</script>
        <script>
                                var ctx = document.getElementById("myChart").getContext('2d');
                                var myChart = new Chart(ctx, {
    type: 'line',
                                data: {
                            labels: [<?php echo $month; ?>],
        datasets: [{
                                label: '',
                                data: [<?php echo $sale; ?>],
                                backgroundColor: [
                                'rgba(37, 115, 212, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                                ],
                                    borderColor: [
                                'rgba(37,115,212,1)',
                    'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }
            
        ]
    },
    options: {
        scales: {
            yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
        }
    }
});
        </script>
    </body>
</html>
