<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $configuration->WebsiteTitle }} | Bookings</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        
        <!-- Favicons-->
        <link rel="shortcut icon" href="{{ url('resources/assets/web') }}/img/favicon.png" type="image/x-icon" />
        <link rel="apple-touch-icon" type="image/x-icon" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-57x57-precomposed.png" />
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-72x72-precomposed.png" />
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-114x114-precomposed.png" />
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-144x144-precomposed.png" />
        
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="{{ url('resources/assets/admin/') }}/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ url('resources/assets/admin/') }}/plugins/datatables/dataTables.bootstrap.css">
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

            @include('admin/includes/header')
            <!-- Left side column. contains the logo and sidebar -->
            @include('admin/includes/sidebar')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="overflow: auto;">
                <section class="content-alert">
                    <div class="row">
                        <div class="col-xs-12" style="padding: 5px 20px;">
                            @include('admin/includes/front_alerts')
                        </div>                            
                    </div>
                </section>
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1><i class="fa fa-edit"></i> DHA Booking Lists</h1>
                    <ol class="breadcrumb">
                        <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">DHA Booking Lists</li>
                    </ol>
                </section>
                <!-- Main content -->
                {!! Form::open([ 'url' => 'admin/dha/reservation', 'id' => 'frm_list' ]) !!}
                <input type='hidden' name='order' id="order" value='1' />
                <input type='hidden' name='column' id="column" value='' />
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-success" style="width:150%;">
                                <div class="box-header with-border">
                                    <h3 class="box-title">DHA Booking Lists</h3>
                                    <div class="box-tools pull-right">
                                        <?php $today = date("Y-m-d H:i:s");
                                        $currentDate = date("Y-m-d");
                                        $present = "$currentDate 12:30:42";
                                        $future = "$currentDate 12:31:59";
                                        if(\Session::get('AdminID') == 1 ) {  ?>
                                            <a style="margin: 0px 5px 0px 0px;" class="btn btn-primary trial" title="" onClick="doNightAudit()" role="button"><i class="fa fa-file-pdf-o"></i><span class="hidden-md hidden-sm hidden-xs">Night Audit Report</span></a>
                                        <?php } else { 
                                            if($today >= $present && $today <= $future) {
                                        ?>
                                        <a style="margin: 0px 5px 0px 0px;" class="btn btn-primary trial" title="" onClick="doNightAudit()" role="button"><i class="fa fa-file-pdf-o"></i><span class="hidden-md hidden-sm hidden-xs">Night Audit Report</span></a>
                                        <?php } 
                                        } ?>
                                        <a style="margin: 0px 5px 0px 0px;" class="btn btn-primary trial" title="Listing" href="{{url('admin/dha')}}" role="button"><i class="fa fa-list"></i><span class="hidden-md hidden-sm hidden-xs"> DHA Room List</span></a>
                                        <!--<button type="button" class="btn btn-sm btn-danger pull-right btnTools" onClick="doDelete()" id="btnDelete"><i class="fa fa-trash-o"></i> Delete</button>-->
                                        <select style="width:200px; margin-right: 20px;" class="filterDocuments form-control pull-right">
                                            <option value="-1">Guest Hotel Status</option>
                                            <option value="0">Not Check-in</option>
                                            <option value="1">Check-in</option>
                                            <option value="2">Check-out</option>
                                        </select>
                                    </div>
                                    <!--<div class="">
                                        <div class="box-tools pull-left">
                                            <label for=CheckInDate">Check In Date:</label>
                                            {!! Form::text('CheckInDate',null, ['placeholder' => 'Enter Check In Date', 'class' => 'form-control', 'id' => 'CheckInDate']) !!}
                                        </div>
                                        <div class="box-tools pull-left">
                                            <label for="CheckOutDate">Check End Date:</label>
                                            {!! Form::text('CheckOutDate', null, ['placeholder' => 'Enter Check Out Date', 'class' => 'form-control', 'id' => 'CheckOutDate']) !!}
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-submit"></i> Submit</button>
                                    </div>-->
                                </div>
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="dataList" class="display table table-bordered table-striped table-hover" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <!--<th><input type="checkbox" id="checkAllNone" class="all" /></th>-->
                                                    <th>Booking ID</th>
                                                    <th>Name</th>
                                                    <th>Room Number</th>
                                                    <th>Check In Date</th>
                                                    <th>Check Out Date</th>
                                                    <th>Guest Status</th>
                                                    <th>No of Nights</th>
                                                    <th>Basic Price</th>
                                                    <th>Referal</th>
                                                    <th>Promo Discount</th>
                                                    <th>Actual Room Rate</th>
                                                    <th>Revenue generated by Room</th>
                                                    <th>Revenue from Miscellaneous</th>
                                                    <th>Total Revenue Generate</th>
                                                    <th>Cash Received</th>
                                                    <th>Receivable</th>
                                                    <th>Refundable</th>
                                                    <th>Status</th>
                                                    <th>Added</th>
                                                    <th>Modified</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div class="box-footer"></div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                {!! FORM::close() !!}
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            @include('admin/includes/footer')

        </div>
        <!-- jQuery 2.2.3 -->
        <script src="{{ url('resources/assets/admin/') }}/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="{{ url('resources/assets/admin/') }}/bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="{{ url('resources/assets/admin/') }}/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ url('resources/assets/admin/') }}/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <script src="{{ url('resources/assets/admin/') }}/plugins/datatables/extensions/ReloadAjax/fnReloadAjax.js"></script>
        <script src="{{ url('resources/assets/admin/') }}/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- SlimScroll -->
        <script src="{{ url('resources/assets/admin/') }}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="{{ url('resources/assets/admin/') }}/plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="{{ url('resources/assets/admin/') }}/dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ url('resources/assets/admin/') }}/dist/js/demo.js"></script>
        <!-- page script -->
        <script src="{{ url('resources/assets/admin/') }}/plugins/datepicker/bootstrap-datepicker.js"></script>

        <script language="javascript">


                                            var checkAll;
                                            var checkboxes;

                                            $(function () {

                                                var data_list = $('#dataList').dataTable({

                                                    // "scrollX": true
                                                    "processing": true,
                                                    "serverSide": true,
                                                    "ajax": {
                                                        'type': 'POST',
                                                        'url': '{{ url(Request::path()) }}',
                                                        'headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
                                                    },
                                                    "pageLength": 5,
                                                    "aLengthMenu": [[5,10, 25, 50, 100, <?php echo $recordsTotal; ?>], [5,10, 25, 50, 100, "All"]],
                                                    aoColumnDefs: [
                                                        {
                                                            bSortable: false,
                                                            aTargets: [0, 10]
                                                        }
                                                    ],
                                                    "order": [[1, 'desc']],
                                                    "oLanguage": {
                                                        "sSearch": "",
                                                        "sProcessing": "<img src='{{ url('resources/assets/admin') }}/images/loading-spinner-grey.gif'>"
                                                    },
                                                    "fnDrawCallback": function () {
                                                        checkAll = $('input.all');
                                                        checkboxes = $('input.check');

                                                        $('input[type="checkbox"], input[type="radio"]').iCheck({
                                                            checkboxClass: 'icheckbox_minimal-blue',
                                                            radioClass: 'iradio_minimal-blue'
                                                        });
                                                        checkAll.on('ifChecked ifUnchecked', function (event) {
                                                            if (event.type == 'ifChecked') {
                                                                checkboxes.iCheck('check');
                                                            } else {
                                                                checkboxes.iCheck('uncheck');
                                                            }
                                                        });

                                                        checkboxes.on('ifChanged', function (event) {
                                                            if (checkboxes.filter(':checked').length == checkboxes.length) {
                                                                checkAll.prop('checked', 'checked');
                                                            } else {
                                                                checkAll.removeProp('checked');
                                                            }
                                                            checkAll.iCheck('update');
                                                        });

                                                        $(".btnTools").prop("disabled", !(parseInt(data_list.fnGetData().length) > 0));
                                                    }
                                                });

                                                $(".filterDocuments").change(function () {
                                                    data_list.fnReloadAjax("{{ url(Request::path()) }}?status=" + $(this).val());
                                                    data_list.fnClearTable(0);
                                                    data_list.fnDraw();
                                                });

                                                $('#dataList_filter input').attr('placeholder', 'Search...');
                                            });

                                            function doNightAudit()
                                            {
                                                ok = function () {
                                                    window.open(
                                                        'nightaudit',
                                                        '_blank' // <- This is what makes it open in a new window.
                                                      );
                                                };
                                                message_box("Confirm", "Are you process the Night Audit.<br>Are you sure?", "confirm", ok, null);
                                                
                                            }
        </script>
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
