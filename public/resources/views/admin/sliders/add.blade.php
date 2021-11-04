<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $configuration->WebsiteTitle }} | Add New Slide</title>
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
                    <h1>Sliders</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="{{ url('admin/sliders') }}">Sliders</a></li>
                        <li class="active">Add New</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    {!! Form::open([ 'url' => 'admin/sliders/add', 'files'=>true]) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Add New</h3>
                                    <div class="box-tools pull-right">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="location.href = '{{ url('admin/sliders') }}'"><i class="fa fa-times"></i> Cancel</button>
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
                                                    <div class="form-group">
                                                        <label for="Title">Title: <span class="mandatory">*</span></label>
                                                        {!! Form::text('Title', null, ['placeholder' => 'Enter Title', 'class' => 'form-control', 'id' => 'Title']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Description">Description: </label>
                                                        {!! Form::textarea('Description', null, ['placeholder' => 'Enter Description', 'class' => 'form-control', 'id' => 'Description', 'rows' => '3']) !!}
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
                                                        <label for="Status">Status</label><br>
                                                        <label>
                                                            {!! FORM::radio('Status', 1, 1) !!}
                                                            Active
                                                        </label>
                                                        <label>
                                                            {!! FORM::radio('Status', 0, null) !!}
                                                            Deactive
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                            <!--<label>Images:</label>-->
                                                <label for="Image">Image: <span class="mandatory">*</span> (best width = 1356px, height = 450px)</label>
                                                            </div>
                                                        </div>
                                                        <div class="row image_container">
                                                            <span id="befor"></span>
                                                            <div class="col-md-4 add_new_image" onclick="addNewImage()">
                                                                {!! \Html::image('/public/placeholder.jpg', 'Image 1', ['class' => 'img-responsive placeholder', 'style' => 'border:1px dashed #000;']) !!}
                                                            </div>
                                                            <input type="file" accept="image/jpg,image/JPG,image/PNG,image/GIF,image/JPEG,image/png,image/jpeg,image/gif" onchange="imgFunc(this)" name="Img" id="Img" style="display: none;" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <div class="box-tools pull-right">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="location.href = '{{ url('admin/sliders') }}'"><i class="fa fa-times"></i> Cancel</button>
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
        <script src="{{ url('resources/assets/admin/') }}/plugins/ckeditor/ckeditor.js"></script>

        <script>
                                            CKEDITOR.replace('Description');
                                            $('input[type="checkbox"], input[type="radio"]').iCheck({
                                            checkboxClass: 'icheckbox_minimal-blue',
                                                    radioClass: 'iradio_minimal-blue'
                                            });
                                            function btn_delete(a) {
                                            $(a).parent().remove();
                                            count = $(".image_container > div").length;
                                            if (count < 2) {
                                            $('.add_new_image').attr('style', 'display:block;');
                                            }

                                            }

                                            function addNewImage() {
                                            var count;
                                            var m = 0;
                                            count = $(".image_container > div").length;
                                            if (count > 0) {
                                            $('.add_new_image').attr('style', 'display:none;');
                                            }
                                            var input = $("#Img");
                                            input.trigger("click");
                                            }

                                            function imgFunc(img) {
                                            var count;
                                            count = $(".image_container > div").length;
                                            var fileName = $(img).val().split('/').pop().split('\\').pop();
                                            var ext = fileName.split('.').pop();
                                            if (fileName != "" && (ext == "jpg" || ext == "jpeg" || ext == "png" || ext == "PNG" || ext == "JPG" || ext == "JPEG" || ext == "gif" || ext == "GIF")) {
                                            if (img.files && img.files[0]) {
                                            var reader = new FileReader();
                                            reader.onload = function (e) {
                                            image_div = '';
                                            image_div += '<div class="col-md-4 thumb">';
                                            image_div += '<button type="button" onClick="btn_delete(this)" class="btn btn-danger btn-flat btn-xs btn-delete"><i class="fa fa-times-circle"></i></button>';
                                            image_div += '<img src="' + e.target.result + '" class="img-responsive img_tooltip" />';
                                            image_div += '<input onChange="imgFunc(this)" style="display:none;" accept="image/jpg,image/JPG,image/PNG,image/GIF,image/JPEG,image/png,image/jpeg,image/gif" type="file" name="Img[]" id="Img' + (count + 1) + '" />';
                                            image_div += '</div>';
                                            $('#befor').before(image_div);
                                            $('.img_tooltip').imageTooltip();
                                            }
                                            reader.readAsDataURL(img.files[0]);
                                            }
                                            }
                                            }
        </script>
    </body>
</html>
