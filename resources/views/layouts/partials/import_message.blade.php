@if (session('import_success_message'))
	<div class="alert alert-danger alert-dismissible fade show" role="alert" style="max-height:200px; overflow:auto">
		<div class="alert-icon"><i class="fa fa-check"></i></div>
		<div class="alert-content">
			<h4 class="alert-heading">Import Success : {{ session('import_success_message') }}</h4>
		</div>
	</div>
@endif
@if (session('import_error_message'))
	<div class="alert alert-danger alert-dismissible fade show" role="alert" style="max-height:200px; overflow:auto">
		<div class="alert-icon"><i class="fa fa-ban"></i></div>
		<div class="alert-content">
			<h4 class="alert-heading">Import Failed : {{ count(session('import_error_message')) }}</h4>
			@foreach (session('import_error_message') as $error_message)
				<p>{{ $error_message }}</p>
			@endforeach
		</div>
	</div>
@endif