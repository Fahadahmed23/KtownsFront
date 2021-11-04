<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $configuration->WebsiteTitle }} | View Booking</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="{{ url('resources/assets/admin/') }}/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ url('resources/assets/admin/') }}/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ url('resources/assets/admin/') }}/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="{{ url('resources/assets/admin/') }}/plugins/iCheck/minimal/blue.css">
        <link rel="stylesheet" href="{{ url('resources/assets/admin/') }}/plugins/datepicker/datepicker3.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">


            <!-- Left side column. contains the logo and sidebar -->
            @include('admin/includes/header')
            <!-- Left side column. contains the logo and sidebar -->
            @include('admin/includes/sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <section class="content-alert">
                    <div class="row">
                        <div class="col-xs-12" style="padding: 5px 20px;">
                            @include('admin/includes/front_alerts')
                        </div>                            
                    </div>
                </section>
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Bookings</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="{{ url('admin/bookings') }}">Bookings</a></li>
                        <li class="active">View</li>
                    </ol>
                </section>

                <!-- Main content -->
                {!! Form::open([ 'url' => 'admin/bookings/'.$booking->BookingID]) !!}
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">View</h3>
                                    <div class="box-tools pull-right">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Update</button>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="location.href = '{{ url('admin/bookings') }}'"><i class="fa fa-times"></i> Cancel</button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8">

                                            <!-- general form elements -->
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title"> User Info</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th style="width:30%;">First Name:</th>
                                                                    <td>{{ $booking->FirstName }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width:30%;">Last Name:</th>
                                                                    <td>{{ $booking->LastName }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width:30%;">Email:</th>
                                                                    <td>{{ $booking->Email }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width:30%;">Cell:</th>
                                                                    <td>{{ $booking->Cell }}</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th style="width:30%;">Booking Total:</th>
                                                                    <td>PKR {{ number_format($booking->BookingTotal, 0) }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width:30%;">Discount:</th>
                                                                    <td>PKR {{ number_format($booking->Discount, 0) }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width:30%;">Promo Discount:</th>
                                                                    <td>PKR {{ number_format($booking->PromoDiscount, 0) }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width:30%;">Total Amount:</th>
                                                                    <td>PKR {{ number_format($booking->TotalAmount, 0) }}</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title"> Booking Info</h3>
                                                </div>
                                                <div class="box-body">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Rooms</th>
                                                                <th>Quantity</th>
                                                                <th>Check in</th>
                                                                <th>Check out</th>
                                                                <th>Adults</th>
                                                                <th>Children</th>
                                                                <th>Discount</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if (count($booking_hotels) > 0) {
                                                                foreach ($booking_hotels as $hotel) {
                                                                    ?>
                                                                    <tr>
                                                                        <td>{{ $hotel->HotelName }}</td>
                                                                        <td>{{ $hotel->RoomQty }}</td>
                                                                        <td>{{ $hotel->CheckInDate }}</td>
                                                                        <td>{{ $hotel->CheckOutDate }}</td>
                                                                        <td>{{ $hotel->Adults }}</td>
                                                                        <td>{{ $hotel->Children }}</td>
                                                                        <td>{{ $hotel->Discount }}</td>
                                                                        <td>PKR {{ number_format($hotel->Total, 0) }}</td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                        <div class="col-md-4">
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Setting</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="Status">Status</label><br>
                                                        <label>
                                                            {!! FORM::radio('Status', 0, ($booking->Status == 0 ? true : null)) !!} Pending
                                                        </label>
                                                        <br>
                                                        <label>
                                                            {!! FORM::radio('Status', 1, ($booking->Status == 1 ? true : null)) !!} Approve
                                                        </label>
                                                        <br>
                                                        <label>
                                                            {!! FORM::radio('Status', 3, ($booking->Status == 3 ? true : null)) !!} Cancel
                                                        </label>
                                                        <br>
                                                        <label>
                                                            {!! FORM::radio('Status', 2, ($booking->Status == 2 ? true : null)) !!} Decline
                                                        </label>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="PaymentStatus">Payment Status</label><br>
                                                        <label>
                                                            {!! FORM::radio('PaymentStatus', 0, ($booking->PaymentStatus == 0 ? true : null)) !!}
                                                            Not Paid
                                                        </label>
                                                        <label>
                                                            {!! FORM::radio('PaymentStatus', 1, ($booking->PaymentStatus == 1 ? true : null)) !!}
                                                            Paid
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <div class="box-tools pull-right">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Update</button>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="location.href = '{{ url('admin/bookings') }}'"><i class="fa fa-times"></i> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {!! FORM::close() !!}
                <!-- /.content -->
            </div>

            @include('admin/includes/footer')
        </div>


        <script src="{{ url('resources/assets/admin/') }}/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="{{ url('resources/assets/admin/') }}/bootstrap/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="{{ url('resources/assets/admin/') }}/plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="{{ url('resources/assets/admin/') }}/dist/js/app.min.js"></script>
        <script src="{{ url('resources/assets/admin/') }}/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <script src="{{ url('resources/assets/admin/') }}/plugins/datepicker/bootstrap-datepicker.js"></script>
        <script src="{{ url('resources/assets/admin/') }}/plugins/ckeditor/ckeditor.js"></script>
        <script>
                                            $('input[type="checkbox"], input[type="radio"]').iCheck({
                                            checkboxClass: 'icheckbox_minimal-blue',
                                                    radioClass: 'iradio_minimal-blue'
                                            });
                                            CKEDITOR.replace('Description');
                                            var start_date = new Date();
                                            start_date.setDate(start_date.getDate());
                                            $('#AgreementStartDate, #AgreementEndDate').datepicker({
                                            autoclose: true,
                                                    format: 'yyyy-mm-dd',
                                                    todayHighlight: true
                                            });
        </script>

    </body>
</html>
