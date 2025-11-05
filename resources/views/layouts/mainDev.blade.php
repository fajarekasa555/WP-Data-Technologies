<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&amp;family=Roboto+Mono&amp;display=swap" rel="stylesheet">
	<link href="{{ asset('assets/themes/panely/assets/build/styles/ltr-core.css') }}"  rel="stylesheet" />
	<link href="{{ asset('assets/themes/panely/assets/build/styles/ltr-vendor.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/themes/panely/assets/build/styles/admin.style.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/images/icon.ico') }}" rel="shortcut icon" type="image/x-icon" />
	<link href="{{ asset('assets/plugins/jquery.growl/css/jquery.growl.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/jquery-ui.custom/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/aos-master/dist/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/simple-keyboard-master/build/css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/toggle.css') }}" rel="stylesheet" />
	<title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
	@stack('css')
</head>

<body class="theme-light preload-active aside-active aside-mobile-minimized aside-desktop-maximized" id="fullscreen">
	<div class="preload">
		<div class="preload-dialog">
			<div class="spinner-border text-primary preload-spinner"></div>
		</div>
	</div>
	{{-- <div class="holder"> --}}
		{{-- <div class="scrolltop mb-5">
			<button class="btn btn-info btn-icon btn-lg">
				<i class="fa fa-angle-up"></i>
			</button>
		</div> --}}

		{{-- <div class="wrapper"> --}}
			@include('layouts.partials.header')
			<div class="content">
				<div class="container-fluid">
					@yield('content')
				</div>
			</div>
		{{-- </div> --}}
	{{-- </div> --}}
    <script src="{{ asset('assets/themes/panely/assets/build/scripts/mandatory.js') }}"></script>
	<script src="{{ asset('assets/themes/panely/assets/build/scripts/core.js') }} "></script>
	<script src="{{ asset('assets/themes/panely/assets/build/scripts/vendor.js') }}"></script>
	<script src="{{ asset('assets/themes/panely/assets/build/scripts/toastr.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/jquery-number/jquery.number.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/bootbox/bootbox.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/jquery.growl/js/jquery.growl.js') }}"></script>
	<script src="{{ asset('assets/plugins/aos-master/dist/aos.js') }}"></script>
	<script src="{{ asset('assets/themes/panely/assets/app/form/select2.js') }}"></script>
	<script src="{{ asset('assets/plugins/simple-keyboard-master/build/index.js') }}"></script>
	@stack('script')
	<script src="{{ asset('assets/js/localization.js') }}"></script>
	<script src="{{ asset('assets/js/locale.js') }}"></script>
	<script src="{{ asset('assets/themes/panely/assets/build/scripts/build.js') }}"></script>
	@stack('page_script')
	<script>
		toastr.options = {
			closeButton: true,
			debug: false,
			newestOnTop: false,
			progressBar: false,
			positionClass: "toast-top-right",
			preventDuplicates: false,
			onclick: null,
			showDuration: 300,
			hideDuration: 1000,
			timeOut: 3000,
			extendedTimeOut: 1000,
			showEasing: "swing",
			hideEasing: "linear",
			showMethod: "fadeIn",
			hideMethod: "fadeOut"
		}
	</script>
</body>

</html>
