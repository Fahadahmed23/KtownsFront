<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $configuration->WebsiteTitle }} | Add New Hotel</title>
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
                    <h1>Hotels</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="{{ url('admin/hotels') }}">Hotels</a></li>
                        <li class="active">Add New</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    {!! Form::open([ 'url' => 'admin/hotels/addh', 'files' => true]) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Add New</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" id="btnSubmit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="location.href = '{{ url('admin/hotels') }}'"><i class="fa fa-times"></i> Cancel</button>
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
                                                        <label for="HotelName">Hotel Name: <span class="mandatory">*</span></label>
                                                        {!! Form::text('HotelName', null, ['placeholder' => 'Enter Hotel Name', 'class' => 'form-control alphafield', 'id' => 'HotelName']) !!}
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="OriginalHotelName">Original Hotel Name: <span class="mandatory">*</span></label>
                                                                {!! Form::text('OriginalHotelName', null, ['placeholder' => 'Enter Original Hotel Name', 'class' => 'form-control alphafield', 'id' => 'OriginalHotelName']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="OwnerName">Owner Name: <span class="mandatory">*</span></label>
                                                                {!! Form::text('OwnerName', null, ['placeholder' => 'Enter Owner Name', 'class' => 'form-control', 'id' => 'OwnerName alphafield']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="Address">Short Address: <span class="mandatory">*</span></label>
                                                                {!! Form::text('Address', null, ['placeholder' => 'Enter Short Address', 'class' => 'form-control', 'id' => 'Address']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="Address2">Full Address: <span class="mandatory">*</span></label>
                                                                {!! Form::text('Address2', null, ['placeholder' => 'Enter Full Address', 'class' => 'form-control', 'id' => 'Address2']) !!}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="AgreementStartDate">Agreement Start Date: <span class="mandatory">*</span></label>
                                                                {!! Form::Date('AgreementStartDate', null, ['placeholder' => 'Enter Agreement Start Date', 'class' => 'form-control date', 'id' => 'AgreementStartDate']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="AgreementEndDate">Agreement End Date: <span class="mandatory">*</span></label>
                                                                {!! Form::Date('AgreementEndDate', null, ['placeholder' => 'Enter Agreement End Date', 'class' => 'form-control date', 'id' => 'AgreementEndDate']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="PartnerPrice">Partner Price: <span class="mandatory">*</span></label>
                                                                {!! Form::text('PartnerPrice', null, ['placeholder' => 'Enter Partner Price', 'class' => 'form-control number', 'id' => 'PartnerPrice']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="SellingPrice">Selling Price: <span class="mandatory">*</span></label>
                                                                {!! Form::text('SellingPrice', null, ['placeholder' => 'Enter Selling Price', 'class' => 'form-control number', 'id' => 'SellingPrice']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="NoOfGuests">No. of Guests: <span class="mandatory">*</span></label>
                                                                {!! Form::text('NoOfGuests', null, ['placeholder' => 'Enter No. of Guests', 'class' => 'form-control number', 'id' => 'NoOfGuests']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="NoOfRooms">No. of Rooms: <span class="mandatory">*</span></label>
                                                                {!! Form::text('NoOfRooms', null, ['placeholder' => 'Enter No. of Rooms', 'class' => 'form-control number', 'id' => 'NoOfRooms']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="AdultCharges">Adult Charges: <span class="mandatory">*</span></label>
                                                                {!! Form::text('AdultCharges', null, ['placeholder' => 'Enter Adult Charges', 'class' => 'form-control number', 'id' => 'AdultCharges']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Description">Description: <span class="mandatory">*</span></label>
                                                        {!! Form::textarea('Description', null, ['placeholder' => 'Enter Description', 'class' => 'form-control', 'id' => 'Description']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="MetaTitle">Meta Title:</label>
                                                        {!! Form::text('MetaTitle', null, ['placeholder' => 'Enter Meta Title', 'class' => 'form-control', 'id' => 'MetaTitle']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="MetaKeywords">Meta Keywords:</label>
                                                        {!! Form::textarea('MetaKeywords', null, ['placeholder' => 'Enter Meta Keywords', 'class' => 'form-control', 'id' => 'MetaKeywords', 'rows' => '3']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="MetaDescription">Meta Description: </label>
                                                        {!! Form::textarea('MetaDescription', null, ['placeholder' => 'Enter Meta Description', 'class' => 'form-control', 'id' => 'MetaDescription', 'rows' => '3']) !!}
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
                                                        <label for="SlugId">Belongs To: <span class="mandatory">*</span></label>
                                                        {!! Form::select('SlugId', $slugid, null, ['class' => 'form-control', 'id' => 'SlugId']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="HotelRoomType">Hotel Room Type: <span class="mandatory">*</span></label>
                                                        {!! Form::select('HotelRoomType', $hotelRoomtype, null, ['class' => 'form-control', 'id' => 'HotelRoomType']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="PartnerRequestID">Partner: <span class="mandatory">*</span></label>
                                                        {!! Form::select('PartnerRequestID', $partners, null, ['class' => 'form-control', 'id' => 'PartnerRequestID']) !!}
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="HotelTypeID">Type: <span class="mandatory">*</span></label>
                                                        {!! Form::select('HotelTypeID', $hotel_types, null, ['class' => 'form-control', 'id' => 'HotelTypeID']) !!}
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="CityID">City: <span class="mandatory">*</span></label>
                                                        {!! Form::select('CityID', $city_name, null, ['class' => 'form-control', 'id' => 'CityID']) !!}
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Rating">Rating: <span class="mandatory">*</span></label>
                                                        {!! Form::select('Rating', $rating, null, ['class' => 'form-control', 'id' => 'Rating']) !!}
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Discount">Discount (in percent): <span class="mandatory">*</span></label>
                                                        {!! Form::text('Discount', null, ['placeholder' => 'Enter Discount (eg: 20)', 'class' => 'form-control', 'id' => 'Discount']) !!}
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Image">Image: <span class="mandatory">*</span> (best width = 815px, height = 450px)</label>
                                                        {!! Form::file('Image') !!}
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Thumbnail">Thumbnail: <span class="mandatory">*</span> (best width = 400px, height = 300px)</label>
                                                        {!! Form::file('Thumbnail') !!}
                                                    </div>

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
                                                        <label for="AutoApprove">Auto Approve Booking</label><br>
                                                        <label>
                                                            {!! FORM::radio('AutoApprove', 1, null) !!}
                                                            Approve
                                                        </label>
                                                        <label>
                                                            {!! FORM::radio('AutoApprove', 0, 1) !!}
                                                            Not Approve
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <div class="box-tools pull-right">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="location.href = '{{ url('admin/hotels') }}'"><i class="fa fa-times"></i> Cancel</button>
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
        <script src="{{ url('resources/assets/admin/') }}/plugins/ckeditor/ckeditor.js"></script>
        <script src="{{ url('resources/assets/admin/') }}/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <script src="{{ url('resources/assets/admin/') }}/plugins/datepicker/bootstrap-datepicker.js"></script>

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

        $("#AgreementEndDate").change(function ()
            {
                var strtDate = document.getElementById("AgreementStartDate").value;
                var endDate = document.getElementById("AgreementEndDate").value;

                if ((Date.parse(strtDate) >= Date.parse(endDate))) 
                {
                    alert("End date should be greater than Start date");
                    document.getElementById("AgreementEndDate").value = "";
                }
            });
        </script>
<script src="{{ url('resources/assets/web') }}/js/jquery-1.11.2.min.js"></script>
<script src="{{ url('resources/assets/web') }}/js/jquery.mask.js"></script>
<script type="text/javascript">
    //Masking Code
    $(document).ready(function()   
    {
        // $('#Cell').mask('(0000) 000-0000');
        $('.date').mask('mm/dd/yyyy');
    })

    $(document).ready(function()
    {
        $('#btnSubmit').on('click', function(e) {
            $('form').submit();
            e.preventDefault();
        })
        $('.number').keypress(validateNumber);
        $('.alphafield').keypress(function (e) {
                var regex = new RegExp("^[a-zA-Z]+$");
                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                if (regex.test(str)) {
                    return true;
                }
                else
                {
                e.preventDefault();
                return false;
                }
            });
    });

    function validateNumber(event) {
        var key = window.event ? event.keyCode : event.which;
        if (event.keyCode === 8 || event.keyCode === 46) {
            return true;
        } else if ( key < 48 || key > 57 ) {
            return false;
        } else {
            return true;
        }
    }

            

</script>
    </body>
</html>
