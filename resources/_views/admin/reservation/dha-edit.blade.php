<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $configuration->WebsiteTitle }} | Edit DHA Reservation</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        
        <!-- Favicons-->
        <link rel="shortcut icon" href="{{ url('resources/assets/web') }}/img/favicon.png" type="image/x-icon" />
        <link rel="apple-touch-icon" type="image/x-icon" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-57x57-precomposed.png" />
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-72x72-precomposed.png" />
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-114x114-precomposed.png" />
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-144x144-precomposed.png" />
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
                    <h1>Services</h1>
                    <ol class="breadcrumb">
                        <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="javascript:void(0);">DHA Reservation</a></li>
                        <li class="active">Edit New Reservation</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    {!! Form::open([ 'url' => 'admin/dha/reservation/'.$BookingDetail->BookingID, 'files' => true]) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Edit DHA Reservation</h3>
                                    <div class="box-tools pull-right">
                                        <?php if($BookingDetail->CheckingStatus != 2) { ?>
                                            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                        <?php } ?>
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
                                                                {!! Form::text('FirstName', $BookingDetail->FirstName, ['placeholder' => 'Enter First Name', 'class' => 'form-control', 'id' => 'FirstName']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="LastName">Last Name: <span class="mandatory">*</span></label>
                                                                {!! Form::text('LastName', $BookingDetail->LastName, ['placeholder' => 'Enter Last Name', 'class' => 'form-control', 'id' => 'LastName']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="CompanyName">Company Name:</label>
                                                                {!! Form::text('CompanyName', $BookingDetail->CompanyName, ['placeholder' => 'Enter Company Name', 'class' => 'form-control', 'id' => 'CompanyName']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Cell">Cell: <span class="mandatory">*</span></label>
                                                                {!! Form::text('Cell', $BookingDetail->Cell, ['placeholder' => 'Enter Cell', 'class' => 'form-control', 'id' => 'Cell']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Email">Email Address:</label>
                                                                {!! Form::text('Email', $BookingDetail->Email, ['placeholder' => 'Enter Email Address', 'class' => 'form-control', 'id' => 'Email']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Identity">Identity:<span class="mandatory">*</span></label>
                                                                {!! Form::text('Identity', $BookingDetail->Identity, ['placeholder' => 'Enter Identity', 'class' => 'form-control', 'id' => 'Identity']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="Referal">Referal: <span class="mandatory">*</span></label>
                                                                <select name="Referal" class="form-control">
                                                                    <option value="">--Please Select Referal--</option>
                                                                    <option <?php if ($BookingDetail->Referal == 0) echo "Selected"; ?> value="0">Walk-In</option>
                                                                    <option <?php if ($BookingDetail->Referal == 1) echo "Selected"; ?> value="1">Phone-Call</option>
                                                                    <option <?php if ($BookingDetail->Referal == 2) echo "Selected"; ?> value="2">Website</option>
                                                                    <option <?php if ($BookingDetail->Referal == 3) echo "Selected"; ?> value="3">OTA</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="FullAddress">Full Address: <span class="mandatory">*</span></label>
                                                                {!! Form::text('FullAddress', $BookingDetail->FullAddress, ['placeholder' => 'Enter Full Address', 'class' => 'form-control', 'id' => 'FullAddress']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="Description">Description:</label>
                                                                {!! Form::textarea('Description',$BookingDetail->Description,['class'=>'form-control', 'rows' => 5, 'cols' => 40]) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=CheckInDate">Check In Date: <span class="mandatory">*</span></label>
                                                                {!! Form::text('CheckInDate', $BookingDetail->CheckInDate, ['placeholder' => 'Enter Check In Date', 'class' => 'form-control', 'id' => 'CheckInDate']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="CheckOutDate">Check End Date: <span class="mandatory">*</span></label>
                                                                {!! Form::text('CheckOutDate', $BookingDetail->CheckOutDate, ['placeholder' => 'Enter Check Out Date', 'class' => 'form-control', 'id' => 'CheckOutDate']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="SellingPrice">Basic Price: <span class="mandatory">*</span></label>
                                                                {!! Form::text('SellingPrice', $BookingDetail->SellingPrice, ['placeholder' => 'Enter Basic Price', 'class' => 'form-control', 'id' => 'SellingPrice']) !!}
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
                                                        <label for="RoomNumber">Room Number: <span class="mandatory">*</span></label>
                                                        <select name="RoomNumber" class="form-control">
                                                            <option value="">--Please select Room No--</option>
                                                            <?php
                                                            foreach ($rooms_number as $room_number) {
                                                                if (is_array($rooms)) {
                                                                    if (!in_array($room_number->RoomNumber, $rooms)) {
                                                                        ?>
                                                                        <option value="{{$room_number->RoomNumber}}">{{$room_number->RoomNumber}}</option>
                                                                        <?php
                                                                    }
                                                                }
                                                            } if (isset($single_room[0]->RoomNumber) && $single_room[0]->RoomNumber == $BookingDetail->RoomNumber) {
                                                                ?>
                                                                <option <?php if ($single_room[0]->RoomNumber == $BookingDetail->RoomNumber) echo "Selected"; ?> value="{{$BookingDetail->RoomNumber}}">{{$BookingDetail->RoomNumber}}</option>
                                                            <?php }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Status">Status</label><br>
                                                        <?php if ($BookingDetail->Status != 1) { ?>
                                                            <label>
                                                                {!! FORM::radio('Status', 0, ($BookingDetail->Status == 0 ? true : null)) !!} Pending
                                                            </label>
                                                            <br>
                                                            <label>
                                                                {!! FORM::radio('Status', 3, ($BookingDetail->Status == 3 ? true : null)) !!} Cancel
                                                            </label>
                                                            <br>
                                                            <label>
                                                                {!! FORM::radio('Status', 2, ($BookingDetail->Status == 2 ? true : null)) !!} Decline
                                                            </label>
                                                            <br>
                                                        <?php } ?>
                                                        <?php if($BookingDetail->Status != 3) { ?>    
                                                        <label>
                                                            {!! FORM::radio('Status', 1, ($BookingDetail->Status == 1 ? true : null)) !!} Approve
                                                        </label>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="PaymentStatus">Payment Status</label><br>
                                                        <?php if ($BookingDetail->PaymentStatus != 1) { ?>
                                                            <label>
                                                                {!! FORM::radio('PaymentStatus', 0, ($BookingDetail->PaymentStatus == 0 ? true : null)) !!}
                                                                Not Paid
                                                            </label>
                                                        <?php } ?>
                                                        <label>
                                                            {!! FORM::radio('PaymentStatus', 1, ($BookingDetail->PaymentStatus == 1 ? true : null)) !!}
                                                            Paid
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="AdvanceAmount">Advance Amount: <span class="mandatory">*</span></label><br>
                                                        <?php if (isset($transationals)) {
                                                            foreach($transationals as $transational) { ?>
                                                            {!! Form::text('', $transational->TransactionDate."       Rs. ".$transational->Credit, ['class' => 'form-control', 'id' => '','disabled'=>'disabled']) !!}
                                                        <br/>
                                                        <?php } 
                                                        } if($BookingDetail->CheckingStatus != 2) { ?>
                                                            {!! Form::text('AdvanceAmount', null, ['placeholder' => 'Enter Advance Amount', 'class' => 'form-control', 'id' => 'AdvanceAmount']) !!}
                                                      <?php } ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="CheckingStatus">Guest Hotel Status</label><br>
                                                        <?php if ($BookingDetail->CheckingStatus != 1 && $BookingDetail->CheckingStatus != 2) { ?>
                                                            <label>
                                                                {!! FORM::radio('CheckingStatus', 0, ($BookingDetail->CheckingStatus == 0 ? true : null)) !!}  Not Check-In
                                                            </label>
                                                            <br>
                                                        <?php } ?>
                                                        <?php if($BookingDetail->Status != 3) { ?>    
                                                        <?php if($BookingDetail->CheckingStatus != 2) { ?>
                                                        <label>
                                                            {!! FORM::radio('CheckingStatus', 1, ($BookingDetail->CheckingStatus == 1 ? true : null)) !!} Check-In
                                                        </label>
                                                        <br>
                                                        <?php } if($BookingDetail->CheckingStatus == 1) {?>
                                                        <label>
                                                            <?php if($BookingDetail->CheckingStatus != 2) { ?><button type="button" class="btn btn-sm btn-warning" onclick="location.href = '{{ url('admin/dha/reservation/checkoutpayment/'.$BookingDetail->BookingID) }}'"><?php } ?>{!! FORM::radio('CheckingStatus', 2, ($BookingDetail->CheckingStatus == 2 ? true : null)) !!} 
                                                            Check Out</button>
                                                        </label>
                                                        <?php } else { ?>
                                                            <label>
                                                                {!! FORM::radio('CheckingStatus', 2, ($BookingDetail->CheckingStatus == 2 ? true : null)) !!} Check Out
                                                        </label>
                                                        <?php }
                                                        } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <div class="box-tools pull-right">
                                         <?php if($BookingDetail->CheckingStatus != 2) { ?>
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                        <?php } ?>
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
            $("#checkbox_id").on('ifChecked', function(e) {
                $(e.target).trigger('change');
            });
            $('#checkbox_id').on('ifChecked', function(event){
                alert('Please check the file');
            });
        </script>
        <script>
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-grey',
                radioClass: 'iradio_square-grey'
            });
        </script>
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
            });
        </script>
    </body>
</html>