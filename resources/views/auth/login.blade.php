<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&amp;family=Roboto+Mono&amp;display=swap" rel="stylesheet">
	<link href="{{ asset('assets/themes/panely/assets/build/styles/ltr-core.css') }}"  rel="stylesheet" />
	<link href="{{ asset('assets/themes/panely/assets/build/styles/ltr-vendor.css') }}" rel="stylesheet" />
	<title>CMS | Login</title>
	@vite('resources/css/app.css')
    <style>
        .content {
            background-image: url("{{ asset('assets') }}/template/images/login-background.jpg");
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            top: 0;
            background-size: cover;
            background-repeat: no-repeat;
            background-position-x: 20%;
            background-position-y: center;
        }
    </style>
</head>
<body class="theme-light preload-active" id="fullscreen">
	<!-- BEGIN Preload -->
	<div class="preload">
		<div class="preload-dialog">
			<div class="spinner-border text-primary preload-spinner"></div>
		</div>
	</div>
	<!-- END Preload -->

	<div class="holder">
        <div class="wrapper">
            <div class="content">
                <div class="container-fluid">
                    <div class="row no-gutters align-items-center justify-content-center h-100">
                        <div class="col-sm-8 col-md-6 col-lg-4 col-xl-3">
                            <div class="portlet">
                                <div class="portlet-body">
                                    <div class="text-center mb-4">
                                        <div class="avatar avatar-label-primary avatar-circle widget12">
                                            <div class="avatar-display">
                                                <i class="fa fa-user-alt"></i>
                                            </div>
                                        </div>
                                    </div>

                                    @include('layouts.partials.message')
                                    @include('layouts.partials.formRequestErrors')

                                    <form action="{{ route('login.process') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <div class="float-label float-label-lg">
                                                <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="Masukkan Email" required>
                                                <label for="email">Email <small class="text-danger">*</small></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="float-label float-label-lg">
                                                <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Masukkan Password" required>
                                                <label for="password">Password <small class="text-danger">*</small></label>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between">
                                            <span>&nbsp;</span>
                                            <button type="submit" class="btn btn-label-primary btn-lg btn-widest">Login</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>

	<script src="{{ asset('assets/themes/panely/assets/build/scripts/mandatory.js') }}"></script>
	<script src="{{ asset('assets/themes/panely/assets/build/scripts/core.js') }}"></script>
	<script src="{{ asset('assets/themes/panely/assets/build/scripts/vendor.js') }}"></script>
</body>
</html>
