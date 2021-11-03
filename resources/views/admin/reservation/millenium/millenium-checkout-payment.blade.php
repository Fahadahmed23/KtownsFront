<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $configuration->WebsiteTitle }} | Check Out</title>
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
                    <h1>Checkout Payment</h1>
                    <ol class="breadcrumb">
                        <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="javascript:void(0);">Checkout Payment</a></li>
                        <li class="active">Edit Checkout Payment</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    {!! Form::open([ 'url' => 'admin/millenium/reservation/checkoutpayment/'.$miscid, 'files' => true]) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Edit Checkout Payment</h3>
                                    <div class="box-tools pull-right">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="location.href = '{{ url('admin/millenium/reservation') }}'"><i class="fa fa-times"></i> Cancel</button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- general form elements -->
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Info</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="Date">Date: <span class="mandatory">*</span></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Description">Description: <span class="mandatory">*</span></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="Debit">Debit: <span class="mandatory">*</span></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="Credit">Credit: <span class="mandatory">*</span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    if (!empty($transationals)) { ?>
                                                        <?php foreach ($transationals as $transational) { ?>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <input class="form-control" id="" name="" type="text" value="{{date('d-m-Y',strtotime($transational->TransactionDate))}}" disabled="disabled">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <input class="form-control" id="" name="" type="text" value="{{$transational->TransactionDescription}}" disabled="disabled">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <input class="form-control" id="" name="" type="number" value="{{$transational->Debit}}" disabled="disabled">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <input class="form-control" id="" name="" type="number" value="{{$transational->Credit}}" disabled="disabled">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <?php if (!empty($miscellaneous)) { ?>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <input class="form-control" id="" name="" type="text" value="{{date('d-m-Y')}}" disabled="disabled">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <input class="form-control" id="" name="" type="text" value="Miscellaneous Expences" disabled="disabled">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <input class="form-control" id="" name="" type="" value="{{$miscellaneous[0]->TotalAmount}}" disabled="disabled">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <input class="form-control" id="" name="" type="number" value="0.00" disabled="disabled">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    ?>
                                                    <?php $salesTax =  ($miscellaneous[0]->TotalAmount + $debitAmount[0]->DebitAmount)* 13 / 100; ?>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <input class="form-control" id="" name="" type="text" value="{{date('d-m-Y')}}" disabled="disabled">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <input class="form-control" id="" name="" type="text" value="Sales Tax" disabled="disabled">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <input class="form-control" id="" name="" type="" value="<?php echo $salesTax; ?>" disabled="disabled">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <input class="form-control" id="" name="" type="number" value="0.00" disabled="disabled">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php $credit = $creditAmount[0]->CreditAmount; ?>
                                                    <?php $debit = ($debitAmount[0]->DebitAmount - $debitAmount[0]->DebittaxAmount)+ $miscellaneous[0]->TotalAmount + $salesTax; ?>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <input class="form-control" id="Date" name="Date" type="text" value="{{date('d-m-Y')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <input class="form-control" id="Description" name="Description" type="text" value="Final Settlement">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <?php if($debit <= $credit) { 
                                                                    $debitamount = $credit - $debit;?>
                                                                        <input class="form-control" id="Credit" name="Debit" type="number" value="<?php echo $debitamount; ?>">
                                                                    <?php } else { ?>
                                                                        <input class="form-control" id="Credit" name="Debit" type="number" value="0.00" disabled="disabled">
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <?php if($credit <= $debit) { 
                                                                    $creditamount = $debit - $credit;?>
                                                                  <input class="form-control" id="Credit" name="Credit" type="number" value="<?php echo $creditamount; ?>">
                                                                <?php } else { ?>
                                                                    <input class="form-control" id="Credit" name="Credit" type="number" value="0.00" disabled="disabled">
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <div class="box-tools pull-right">
                                        <button type="submit" class="btn btn-sm btn-success" onclick="myFunction(<?php echo $credit; ?>,<?php echo $debit; ?>)"><i class="fa fa-save"></i> Save</button>
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
            function myFunction(credit,debit) {
                if(credit > debit) {
                    alert('Please Settlement the Amount');
                }
                //alert(credit+" "+debit);
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
