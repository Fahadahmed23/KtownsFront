<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $configuration->WebsiteTitle }} | Edit Profile</title>
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
                    <h1>My Account</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">My Account</a></li>
                        <li class="active">Update Profile</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    {!! Form::open([ 'url' => 'admin/profile', 'files'=>true]) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Profile</h3>
                                    <div class="box-tools pull-right">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <!-- general form elements -->
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Edit</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="FirstName">First Name <span class="mandatory">*</span></label>
                                                        {!! Form::text('FirstName', $admin->FirstName, ['class' => 'form-control', 'id' => 'FirstName']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="LastName">Last Name <span class="mandatory">*</span></label>
                                                        {!! Form::text('LastName', $admin->LastName, ['class' => 'form-control', 'id' => 'LastName']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Contact">Contact <span class="mandatory">*</span></label>
                                                        {!! Form::text('Contact', $admin->Contact, ['class' => 'form-control', 'id' => 'Contact']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Email">Email <span class="mandatory">*</span></label>
                                                        {!! Form::email('Email', $admin->Email, ['class' => 'form-control', 'id' => 'Email']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Username">Username <span class="mandatory">*</span></label>
                                                        {!! Form::text('Username', $admin->Username, ['class' => 'form-control', 'id' => 'Username']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Password">Password <span class="mandatory">(Leave blank if you do not want to change)</span></label>
                                                        {!! Form::password('Password', ['class' => 'form-control', 'id' => 'Password', 'placeholder' => "Enter new password"]) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="ProfilePicture">Profile Picture</label>
                                                        <input type="file" name="ProfilePicture" />
                                                    </div>
                                                    <?php
                                                    if(\Session::get('AdminProfilePicture') != "" && \Session::get('AdminProfilePicture') != null) {
                                                    ?>
                                                    <div class="form-group">
                                                        <label for="CurrentPicture">Current Picture</label><br>
                                                        {!! \Html::image('/public/uploads/administrators/' . \Session::get('AdminProfilePicture'), \Session::get('AdminProfilePicture'), ['class' => 'user-image' ]) !!}
                                                        <input type="hidden" name="ImgName" value="<?php echo \Session::get('AdminProfilePicture'); ?>" />
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <div class="box-tools pull-right">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    {!! FORM::close() !!}
                </section>
            </div>
            @include('admin/includes/footer')
        </div>
        <script src="{{ url('resources/assets/admin/') }}/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="{{ url('resources/assets/admin/') }}/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{ url('resources/assets/admin/') }}/plugins/fastclick/fastclick.js"></script>
        <script src="{{ url('resources/assets/admin/') }}/dist/js/app.min.js"></script>
    </body>
</html>
