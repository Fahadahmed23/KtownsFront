<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $configuration->WebsiteTitle }} | Experiences Bookings</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
                    <h1><i class="fa fa-edit"></i> Experiences Bookings</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Experiences Bookings</li>
                    </ol>
                </section>
                <!-- Main content -->
                {!! Form::open([ 'url' => 'admin/experiences-bookings/delete', 'id' => 'frm_list' ]) !!}
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Experiences Bookings</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-sm btn-danger pull-right btnTools" onClick="doDelete()" id="btnDelete"><i class="fa fa-trash-o"></i> Delete</button>
                                        <select style="width:200px; margin-right: 20px;" class="filterDocuments form-control pull-right">
                                            <option value="-1">All Experiences Bookings</option>
                                            <option value="0">Pending</option>
                                            <option value="1">Approved</option>
                                            <option value="3">Canceled</option>
                                            <option value="2">Declined</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="dataList" class="display table table-bordered table-striped table-hover" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" id="checkAllNone" class="all" /></th>
                                                    <th>Booking ID</th>
                                                    <th>User</th>
                                                    <th>BookingTotal</th>
                                                    <th>Discount</th>
                                                    <th>Promo Discount</th>
                                                    <th>Total Amount</th>
                                                    <th>Status</th>
                                                    <th>Added</th>
                                                    <th>Modified</th>
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

                                            function doDelete()
                                            {
                                                if (checkboxes.filter(':checked').length > 0)
                                                {
                                                    ok = function () {
                                                        $("#frm_list").submit();
                                                    };
                                                    message_box("Confirm", "This will delete all selected Booking.<br>Are you sure?", "confirm", ok, null);
                                                } else
                                                {
                                                    message_box("Alert", "Please select Booking to delete", "alert", null, null);
                                                }
                                            }
        </script>
    </body>
</html>
