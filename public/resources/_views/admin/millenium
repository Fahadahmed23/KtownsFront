<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $configuration->WebsiteTitle }} | Add New Hotel</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!--<link rel="stylesheet" href="{{ url('resources/assets/web/') }}/css/style.css">-->
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
    <style>
        .numbers-row {
            width: 97px;
            overflow: visible;
        }
        .numbers-row, input.qty2 {
            position: relative;
            height: 40px;
        }
        input.qty2 {
            width: 35px;
            text-align: center;
            left: 31px;
            font-size: 12px;
            padding: 5px;
        }
        .numbers-row, input.qty2 {
            position: relative;
            height: 40px;
        }
        .inc {
            background: url(/resources/assets/web/img/plus.png) center center no-repeat #fff;
            right: 0;
            top: 0;
            border: 1px solid #ccc;
            -webkit-border-top-right-radius: 4px;
            -webkit-border-bottom-right-radius: 4px;
            -moz-border-radius-topright: 4px;
            -moz-border-radius-bottomright: 4px;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }
        .button_inc {
            position: absolute;
            width: 33px;
            height: 40px;
            z-index: 9;
        }
        .button_inc, .nav-submit-button {
            text-indent: -9999px;
            cursor: pointer;
        }
        .dec {
            background: url(/resources/assets/web/img/minus.png) center center no-repeat #fff;
            border: 1px solid #ccc;
            left: 0;
            top: 0;
            -webkit-border-top-left-radius: 4px;
            -webkit-border-bottom-left-radius: 4px;
            -moz-border-radius-topleft: 4px;
            -moz-border-radius-bottomleft: 4px;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }
        .button_inc {
            position: absolute;
            width: 33px;
            height: 40px;
            z-index: 9;
        }
        .button_inc, .nav-submit-button {
            text-indent: -9999px;
            cursor: pointer;
        }
    </style>
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
                    <h1>Room Reservation</h1>
                    <ol class="breadcrumb">
                        <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="javascript:void(0);">Hotels</a></li>
                        <li class="active">Add New Reservation</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    {!! Form::open([ 'url' => 'admin/dha/reservation/add', 'files' => true]) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Add New Reservation</h3>
                                    <div class="box-tools pull-right">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="location.href = '{{ url('admin/dha/reservation') }}'"><i class="fa fa-times"></i> Cancel</button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8">

                                            <!-- general form elements -->
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Info</h3>
                                                </div>
                                                <div class="box-body">
                                                    <!--<div class="form-group">
                                                        <label for="HotelName">Hotel Name: <span class="mandatory">*</span></label>
                                                        {!! Form::text('HotelName', null, ['placeholder' => 'Enter Hotel Name', 'class' => 'form-control', 'id' => 'HotelName']) !!}
                                                    </div>-->
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="FirstName">First Name: <span class="mandatory">*</span></label>
                                                                {!! Form::text('FirstName', null, ['placeholder' => 'Enter First Name', 'class' => 'form-control', 'id' => 'FirstName']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="LastName">Last Name: <span class="mandatory">*</span></label>
                                                                {!! Form::text('LastName', null, ['placeholder' => 'Enter Last Name', 'class' => 'form-control', 'id' => 'LastName']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="CompanyName">Company Name:</label>
                                                                {!! Form::text('CompanyName', null, ['placeholder' => 'Enter Company Name', 'class' => 'form-control', 'id' => 'CompanyName']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Cell">Cell: <span class="mandatory">*</span></label>
                                                                {!! Form::text('Cell', null, ['placeholder' => 'Enter Cell', 'class' => 'form-control', 'id' => 'Cell']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Email">Email Address:</label>
                                                                {!! Form::text('Email', null, ['placeholder' => 'Enter Email Address', 'class' => 'form-control', 'id' => 'Email']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Identity">Identity:</label>
                                                                {!! Form::text('Identity', null, ['placeholder' => 'Enter Identity', 'class' => 'form-control', 'id' => 'Identity']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="Referal">Referal: <span class="mandatory">*</span></label><br>
                                                                <select name="Referal" class="form-control">
                                                                    <option value="">--Please Select Referal--</option>
                                                                    <option value="0">Walk-In</option>
                                                                    <option value="1">Phone-Call</option>
                                                                    <option value="2">Website</option>
                                                                    <option value="3">OTA</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="FullAddress">Full Address: <span class="mandatory">*</span></label>
                                                                {!! Form::text('FullAddress', null, ['placeholder' => 'Enter Full Address', 'class' => 'form-control', 'id' => 'FullAddress']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="Description">Description:</label>
                                                                {!! Form::textarea('Description',null,['class'=>'form-control', 'rows' => 5, 'cols' => 40]) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=CheckInDate">Check In Date: <span class="mandatory">*</span></label>
                                                                {!! Form::text('CheckInDate', null, ['placeholder' => 'Enter Check In Date', 'class' => 'form-control', 'id' => 'CheckInDate']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="CheckOutDate">Check End Date: <span class="mandatory">*</span></label>
                                                                {!! Form::text('CheckOutDate', null, ['placeholder' => 'Enter Check Out Date', 'class' => 'form-control', 'id' => 'CheckOutDate']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="SellingPrice">Basic Price: <span class="mandatory">*</span></label>
                                                                {!! Form::text('SellingPrice', null, ['placeholder' => 'Enter Basic Price', 'class' => 'form-control', 'id' => 'SellingPrice']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="NoOfAdults">No. of Adults: <span class="mandatory">*</span></label>
                                                                <div class="numbers-row">
                                                                    {!! Form::text('NoOfAdults', $mAdults, ['class' => 'qty2 form-control', 'id' => 'NoOfAdults']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="NoOfChildren">No. of Children: <span class="mandatory">*</span></label>
                                                                <div class="numbers-row">
                                                                    {!! Form::text('NoOfChildren', $mChildren, ['class' => 'qty2 form-control', 'id' => 'NoOfChildren']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="RoomQty">No. of Rooms: <span class="mandatory">*</span></label>
                                                                <div class="numbers-row">
                                                                    {!! Form::text('RoomQty', $mRooms, ['class' => 'qty2 form-control', 'id' => 'RoomQty']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                        <label for="Discount">Discount (in percent): <span class="mandatory">*</span></label>
                                                        {!! Form::text('Discount', null, ['placeholder' => 'Enter Discount (eg: 20)', 'class' => 'form-control', 'id' => 'Discount']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="RoomNumber">Room Number: </label>
                                                        <select name="RoomNumber" class="form-control">
                                                            <option value="0">--Please select Room No--</option>
                                                            <?php foreach ($rooms_number as $room_number) { ?>
                                                                <?php
                                                                if (is_array($rooms)) {
                                                                    if (!in_array($room_number->RoomNumber, $rooms)) {
                                                                        ?>
                                                                        <option value="{{$room_number->RoomNumber}}">{{$room_number->RoomNumber}}</option>
                                                                        <?php
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <option value="{{$room_number->RoomNumber}}">{{$room_number->RoomNumber}}</option>
                                                                <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Status">Status</label><br>
                                                        <label>
                                                            {!! FORM::radio('Status', 0) !!} Pending
                                                        </label>
                                                        <br>
                                                        <label>
                                                            {!! FORM::radio('Status', 1) !!} Approve
                                                        </label>
                                                        <br>
                                                        <label>
                                                            {!! FORM::radio('Status', 3) !!} Cancel
                                                        </label>
                                                        <br>
                                                        <label>
                                                            {!! FORM::radio('Status', 2) !!} Decline
                                                        </label>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="PaymentStatus">Payment Status: <span class="mandatory">*</span></label><br>
                                                        <label>
                                                            {!! Form::radio('PaymentStatus', '0') !!} Not Paid
                                                        </label>
                                                        <label>
                                                            {!! Form::radio('PaymentStatus', '1') !!} Paid
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="AdvanceAmount">Advance Amount: <span class="mandatory">*</span></label><br>
                                                        {!! Form::text('AdvanceAmount', null, ['placeholder' => 'Enter Advance Amount', 'class' => 'form-control', 'id' => 'AdvanceAmount']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="CheckingStatus">Guest Hotel Status: <span class="mandatory">*</span></label><br>
                                                        <label>
                                                            {!! Form::radio('CheckingStatus', '0') !!} Not Check-In
                                                        </label>
                                                        <br>
                                                        <label>
                                                            {!! Form::radio('CheckingStatus', '1') !!} Check-In
                                                        </label>
                                                        <br>
                                                        <!--<label>
                                                            {!! Form::radio('CheckingStatus', '2') !!} Check-Out
                                                        </label>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <div class="box-tools pull-right">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="location.href = '{{ url('admin/dha/reservation') }}'"><i class="fa fa-times"></i> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- /.col (right) -->
                    </div>
                    <!-- /.row -->
                    {!! FORM::close() !!}
                </section>
                <!-- /.content -->
            </div>

            @include('admin/includes/footer')
        </div>
        <!-- ./wrapper -->

        <script src="{{ url('resources/assets/admin/') }}/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="{{ url('resources/assets/admin/') }}/bootstrap/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="{{ url('resources/assets/admin/') }}/plugins/fastclick/fastclick.js"></script>

        <script src="{{ url('resources/assets/web') }}/js/common_scripts_min.js"></script>
        <script src="{{ url('resources/assets/web') }}/js/functions.js"></script>
        <!-- Specific scripts -->

        <script src="{{ url('resources/assets/web') }}/js/icheck.js"></script>
        <script>
                                                    $('input').iCheck({
                                            checkboxClass: 'icheckbox_square-grey',
                                                    radioClass: 'iradio_square-grey'
                                            });</script>
        <!-- AdminLTE App -->

        <script src="{{ url('resources/assets/admin/') }}/dist/js/app.min.js"></script>
        <script src="{{ url('resources/assets/admin/') }}/dist/js/demo.js"></script>
        <script src="{{ url('resources/assets/admin/') }}/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
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

    </body>
</html>
