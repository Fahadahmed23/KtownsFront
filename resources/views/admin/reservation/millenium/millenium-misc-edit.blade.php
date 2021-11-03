<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $configuration->WebsiteTitle }} | Add New Service</title>
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
                    <h1>Miscellaneous Services</h1>
                    <ol class="breadcrumb">
                        <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="javascript:void(0);">Miscellaneous Services</a></li>
                        <li class="active">Edit Miscellaneous</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    {!! Form::open([ 'url' => 'admin/millenium/reservation/misc/edit/'.$miscid, 'files' => true]) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Edit Miscellaneous</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-success btn-sm"  onClick="doMiscReport(<?php echo $miscid ?>)"><i class="fa fa-file-pdf-o"></i>Mis Invoice</button>
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="location.href = '{{ url('admin/millenium/reservation') }}'"><i class="fa fa-times"></i> Cancel</button>
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
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Description">Description: <span class="mandatory">*</span></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Category">Category: <span class="mandatory">*</span></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Amount">Amount: <span class="mandatory">*</span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <?php if (!empty($miscellaneous)) { ?>
                                                            <?php foreach ($miscellaneous as $key => $misc) { ?>
                                                                <input type="hidden" name="miscid[{{$key+1}}]" class="col-md-4 control-label" value="{{$misc->ID}}">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <input placeholder="Enter Description" class="form-control" id="Description[{{$key+1}}]" name="Description[{{$key+1}}]" type="text" value="{{$misc->Description}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <select name="Category[{{$key+1}}]" class="form-control">
                                                                            <option value="0">--Please Select Category--</option>
                                                                            <option <?php if ($misc->Category == 1) echo "selected"; ?> value="1">Room Service</option>
                                                                            <option <?php if ($misc->Category == 2) echo "selected"; ?> value="2">Laundary</option>
                                                                            <option <?php if ($misc->Category == 3) echo "selected"; ?> value="3">Miscellaneous</option>
                                                                            <option <?php if ($misc->Category == 4) echo "selected"; ?> value="4">Extra Bed</option>
                                                                            <option <?php if ($misc->Category == 5) echo "selected"; ?> value="5">Service Charges</option>
                                                                            <option <?php if ($misc->Category == 6) echo "selected"; ?> value="6">Half Night</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <input placeholder="Enter Amount" class="form-control" id="Amount[{{$key+1}}]" name="Amount[{{$key+1}}]" type="number" value="{{$misc->Amount}}">
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                        <?php for ($i = count($miscellaneous); $i < 10; $i++) { ?>
                                                            <input type="hidden" name="miscid[{{$i+1}}]" class="col-md-4 control-label" value="">    
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <input placeholder="Enter Description" class="form-control" id="Description[{{$i+1}}]" name="Description[{{$i+1}}]" type="text" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <select name="Category[{{$i+1}}]" class="form-control">
                                                                        <option value="">--Please Select Category--</option>
                                                                        <option value="1">Room Service</option>
                                                                        <option value="2">Laundary</option>
                                                                        <option value="3">Miscellaneous</option>
                                                                        <option value="4">Extra Bed</option>
                                                                        <option value="5">Service Charges</option>
                                                                        <option value="6">Half Night</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <input placeholder="Enter Amount" class="form-control" id="Amount[{{$i+1}}]" name="Amount[{{$i+1}}]" type="number" value="">
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <div class="box-tools pull-right">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="location.href = '{{ url('admin/millenium/reservation') }}'"><i class="fa fa-times"></i> Cancel</button>
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
        <!-- AdminLTE App -->
        <script src="{{ url('resources/assets/admin/') }}/dist/js/app.min.js"></script>
        <script src="{{ url('resources/assets/admin/') }}/dist/js/demo.js"></script>
        <script src="{{ url('resources/assets/admin/') }}/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <script>
                                                    function doMiscReport(id)
                                                    {
                                                    ok = function () {
                                                    window.open(
                                                            '/admin/millenium/reservation/miscellaneous/' + id,
                                                            '_blank' // <- This is what makes it open in a new window.
                                                            );
                                                    };
                                                            message_box("Confirm", "Are you print the miscellaneous invoice.<br>Are you sure?", "confirm", ok, null);
                                                    }
        </script>
        <script>
            $('input[type="checkbox"], input[type="radio"]').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
            });
        </script>
    </body>
</html>
