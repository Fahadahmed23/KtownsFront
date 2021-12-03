<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $configuration->WebsiteTitle }} | Hotels</title>
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
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
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
        <style>
            #dataList_length {
                display: inline-block;
            }
            #dataList_filter {
                float: right;
            }
            .dt-buttons {
                display: none;
            }            
            /* .dt-buttons {
                display: block;
                width: 100%;
            } */
            /* .buttons-excel {
                float:right;
            } */
        </style>
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
                    <h1><i class="fa fa-edit"></i> Hotels</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Hotels</li>
                    </ol>
                </section>
                <!-- Main content -->
                {!! Form::open([ 'url' => 'admin/hotels/delete', 'id' => 'frm_list' ]) !!}
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Hotels</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-sm btn-primary" onClick="location.href = '{{ url('admin/hotels/add') }}'"><i class="fa fa-plus"></i> Add New</button>
                                        <button type="button" class="btn btn-sm btn-danger btnTools" onClick="doDelete()" id="btnDelete"><i class="fa fa-trash-o"></i> Delete</button>
                                        <button type="button" class="btn btn-sm btn-success btnTools" style="margin-left: 1px" onClick="doDownload()" id="btnDownload"><i class="fa fa-download"></i> Download</button>
                                    </div>
                                </div>
                                <div class="box-body table-responsive">
                                    <table id="dataList" class="display table table-bordered table-striped table-hover" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="checkAllNone" class="all" /></th>
                                                <th>Hotel ID</th>
                                                <th>Hotel Name</th>
                                                <th>City Name</th>
                                                <th>Rating</th>
                                                <th>Status</th>
                                                <th>Added</th>
                                                <th>Modified</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                    </table>
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
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
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
        $(document).ready(
            function() {
                let searchParams = new URLSearchParams(window.location.search);

                if(searchParams.has('success')) {
                    $('#success_msg').removeClass('hidden');
                    $('#success_msg .msg').append('Hotel Successfully Saved');
                }
            }
        );
                                            var checkAll;
                                            var checkboxes;

                                            $(function () {

                                                var data_list = $('#dataList').dataTable({
                                                    "dom": "lfBrtip",
                                                    "buttons": ["excelHtml5", "pdfHtml5"],
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
                                                            aTargets: [0, 7]
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

                                                $('#dataList_filter input').attr('placeholder', 'Search...');
                                            });

                                            function doDelete()
                                            {
                                                if (checkboxes.filter(':checked').length > 0)
                                                {
                                                    ok = function () {
                                                        $("#frm_list").submit();
                                                    };
                                                    message_box("Confirm", "This will delete all selected Hotels.<br>Are you sure?", "confirm", ok, null);
                                                } else
                                                {
                                                    message_box("Alert", "Please select Hotel to delete", "alert", null, null);
                                                }
                                            }

                                            function doDownload() {
                                                $('.buttons-excel').click();
                                            }
        </script>
    </body>
</html>