<div id="error_msg" class="alert {{ (Session::has('errors')) || (Session::has('error')) ? '' : 'hidden' }} alert-danger fade in alert-dismissible">
	<button type="button" class="close hidden" data-dismiss="alert" aria-hidden="true">×</button>
	<i class="fa-lg fa fa-exclamation-circle"></i>
	<strong>Error(s)!</strong>
	<div class="msg">
		@if (gettype($errors) == 'object')
			{{-- @foreach (array_unique($errors->all()) as $msg) --}}
			@foreach ($errors->all() as $msg) 
				{{ $msg }} <br>
			@endforeach
		@elseif (Session::has('errors'))
			@foreach (Session::get('errors') as $error) 
				{{ $error }}  <br>
			@endforeach
		@endif
                <?php echo Session::get('error') ?>
	</div>
</div>
<div id="warning_msg" class="alert {{ (Session::has('warning_msg')) ? '' : 'hidden' }} alert-warning fade in alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<i class="fa-lg fa fa-warning"></i>
	<strong>Warning!</strong> <div class="msg">
		@if (Session::has('warning_msg'))
		{{ Session::get('warning_msg') }}
		@endif
	</div>
</div>
<div id="success_msg" class="alert {{ (Session::has('success_msg')) ? '' : 'hidden' }} alert-success fade in alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<i class="fa-lg fa fa-success"></i>
	<strong>Success!</strong> <div class="msg">
		@if (Session::has('success_msg'))
		{{ Session::get('success_msg') }}
		@endif
	</div>
</div>
<div id="info_msg" class="alert {{ (Session::has('info_msg')) ? '' : 'hidden' }} alert-info fade in alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<i class="fa-lg fa fa-info"></i>
	<strong>Information!</strong> <div class="msg">
		@if (Session::has('info_msg'))
		{{ Session::get('info_msg') }}
		@endif
	</div>
</div>
<div id="success_msg" class="register-success-message alert {{ (Session::has('success')) ? '' : 'hidden' }} alert-success alert-dismissible">
	<button type="button" class="close register-success-message-close-btn" data-dismiss="alert" aria-hidden="true">×</button>
	<i class="fa-lg fa fa-check"></i>
	<strong>Success :</strong> <div class="msg">
		@if (Session::has('success'))
		{!! Session::get('success') !!}
		@endif
	</div>
</div>

<div id="success_msg" class="alert {{ (Session::has('status')) ? '' : 'hidden' }} alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
		@if (Session::has('status'))
		{!! Session::get('status') !!}
		@endif
	</div>