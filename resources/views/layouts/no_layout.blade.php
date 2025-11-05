@php
use App\Models\Config;
@endphp
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
	{{-- <link href="{{ asset('assets/themes/panely/assets/images/logo/icon_farmapos.png') }}" rel="shortcut icon" type="image/x-icon" /> --}}
	<link href="{{ asset('assets/plugins/jquery.growl/css/jquery.growl.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/themes/panely/assets/build/styles/admin.style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style-responsive.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/invoice-print.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/sweetalert/dist/sweetalert.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/sweetalert/themes/google/google.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/DataTables/extensions/Select/css/select.bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/treetable/css/jquery.treetable.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/treetable/css/jquery.treetable.theme.default.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/jquery-ui.custom/jquery-ui.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>
    @stack('css')
    @if (isset($judul))
        <title>{{ $judul }}></title>
    @elseif (!isset($title))
        <title>{{ Config::item('application_name') }}</title>
    @else
        <title>{{ ucwords($title) }}</title>
    @endif
	<style>
		.bg-color-dark-grey{
			background: #E5E5E5;
		}
		.bg-color-grey{
			background: #867979;
		}
		.dark-grey-imp{
			background: #E5E5E5 !important;
		}
		.grey-imp{
			background: #EEEEEE !important;
		}
		.btn-square-xs {
			width: 32.5px;
			max-width: 100% !important;
			max-height: 100% !important;
			height: 32.5px;
			text-align: center;
			padding: 0px;
		}
        
		.close {
			position: absolute;
			right: 10px;
		}
		.sticky{
			width: auto !important; position: fixed; top: 0px; z-index: auto;
		}
		
		.bg-purple {
			background: #5C3FA5 !important;
			color: #fff !important;
		}

		.bg-orange {
			background: #FC9A07;
			color: #fff;
		}

		.bg-young-purple {
			background: #835AEB !important;
			color: #fff !important
		}

		.bg-purple-hover {
			background: #5C3FA5;
		}

		body{
			padding:0.8px;
			margin:0.8px;
		}
	</style>
</head>

<body class="theme-light preload-active" id="fullscreen">
    <div class="preload">
		<div class="preload-dialog">
			<!-- BEGIN Spinner -->
			<div class="spinner-border text-primary preload-spinner"></div>
			<!-- END Spinner -->
		</div>
	</div>
    <div class="holder">
        <div class="wrapper">
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/themes/panely/assets/build/scripts/mandatory.js') }}"></script>
	<script src="{{ asset('assets/themes/panely/assets/build/scripts/core.js') }} "></script>
	<script src="{{ asset('assets/themes/panely/assets/build/scripts/vendor.js') }}"></script>
	<script src="{{ asset('assets/plugins/bootbox/bootbox.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/jquery.growl/js/jquery.growl.js') }}"></script>
	<script src="{{ asset('assets/themes/panely/assets/app/form/select2.js') }}"></script>
	<script src="{{ asset('assets/plugins/jquery-ui.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/blockui/blockui.js') }}"></script>
    <script src="{{ asset('assets/plugins/chart-js/Chart2.js') }}"></script>
	<script src="{{ asset('assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-number/jquery.number.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/inputmask/dist/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('assets/js/apps.min.js') }}"></script>
    @stack('script')
	<script src="{{ asset('assets/js/localization.js') }}"></script>
	<script src="{{ asset('assets/js/locale.js') }}"></script>
	<script src="{{ asset('assets/themes/panely/assets/build/scripts/build.js') }}"></script>
    @stack('page_script')
</body>

</html>
