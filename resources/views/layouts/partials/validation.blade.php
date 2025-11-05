@if(session('validation_message'))
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<div class="alert-icon"><i class="fa fa-ban"></i></div>
		<div class="alert-content">
			<h4 class="alert-heading">Form tidak terisi dengan benar!</h4>
			<ul>
				@foreach (session('validation_message')->all() as $error)
					<li>{{ ucwords($error) }}</li>
				@endforeach
			</ul>
		</div>
		<button type="button" class="btn btn-text-light btn-icon alert-dismiss" data-dismiss="alert">
			<i class="fa fa-times"></i>
		</button>
	</div>
@elseif($errors->any())
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<div class="alert-icon"><i class="fa fa-ban"></i></div>
		<div class="alert-content">
			<h4 class="alert-heading">Form tidak terisi dengan benar!</h4>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ ucwords($error) }}</li>
				@endforeach
			</ul>
		</div>
		<button type="button" class="btn btn-text-light btn-icon alert-dismiss" data-dismiss="alert">
			<i class="fa fa-times"></i>
		</button>
	</div>
@endif
