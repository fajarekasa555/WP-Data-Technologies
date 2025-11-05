
<div class="header">
    <div id="sticky-header-desktop-sticky-wrapper" class="sticky-wrapper">
        <div class="header-holder header-holder-desktop sticky-header" id="sticky-header-desktop">
            <div class="row header-container container-fluid" style="padding-right: 0;margin-right: 0;">
                <div class="col-md-7 pr-4" id="col-header-center">
                    <div class="header-wrap justify-content-end">
                        <div class="input-group justify-content-end">
                            <div class="input-group-append">
                                <button type="button" class="btn bg-secondary rounded-left" style="border-top-right-radius: 0;border-bottom-right-radius: 0;">
                                    <span id="live-clock" style="font-size: 15px;padding: 6.5px 12px;"></span>
                                </button>
                            </div>
                            <button type="button" class="btn bg-light rounded-right" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                <span id="live-date" style="font-size: 15px;padding: 6.5px 18px;"></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-5" id="col-header-end">
                    <div class="header-wrap justify-content-end">
                        <div class="ml-2 dropdown">
                            <button class="btn btn-flat-primary widget13 ml-4 bg-young-purple" data-toggle="dropdown">
                                <div class="widget13-text text-left">
                                     Hi <strong>{{ auth()->user()->name }}</strong>
                                </div>
                                <!-- BEGIN Avatar -->
                                @php
                                    $alt_img = '<div class="avatar bg-purple widget13-avatar">
                                                    <div class="avatar-display">
                                                        <i class="fa fa-user-alt"></i>
                                                    </div>
                                                </div>';
                                    if(isset(auth()->user()->photo)){
                                        $path = "assets/upload_file/".auth()->user()->photo;
                                        if(file_exists(public_path($path))){
                                            echo '<img src="'.asset($path).'" alt="" style="max-height: 30px;">';
                                        }else{
                                            echo $alt_img;
                                        }
                                    }else{
                                        echo $alt_img;
                                    }
                                @endphp
                                <!-- END Avatar -->
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
                                <!-- BEGIN Portlet -->
                                <div class="portlet border-0">
                                    <div class="portlet-body rounded-0 p-0">
                                        <!-- BEGIN Rich List Item -->
                                        <div class="rich-list-item w-20 p-0">
                                            <div class="rich-list-content">
                                                <div class="settings">
                                                    {{--<a href="{{ route('profile') }}" tabindex="0" target="_blank" role="menuitem" class="dropdown-item">
                                                        <span class="dropdown-icon"><i data-feather="user"></i></span>
                                                        <span class="dropdown-content">Profil</span>
                                                    </a>--}}
                                                </div>
                                                <div class="logout">
                                                    <a href=""
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                    tabindex="0" role="menuitem" class="dropdown-item">
                                                        <span class="dropdown-icon"><i data-feather="log-out"></i></span>
                                                        <span class="dropdown-content">Keluar</span>
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-holder header-holder-desktop">
        <div class="header-container container-fluid">
            <h4 class="header-title">{{ $judul ?? ( $title ?? config('app.name')) }}</h4><i class="header-divider"></i>
            <div class="header-wrap header-wrap-block justify-content-start">
                <nav class="" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <a href="{{ url('/dashboard') }}" class="breadcrumb-item">
                            <div class="breadcrumb-icon">
                                <i data-feather="home">&nbsp;</i>
                            </div>
                            <div class="breadcrumb-text">Dashboard</div>
                        </a>
                        @php
                            if(Route::currentRouteName() != 'dashboard'){
                                $breadcrumbsConfig = config("breadcrumb");
                                $breadcrumbTrail = [];
                                $currentPath = '';
                                $arr = explode('.', Route::currentRouteName());
                                foreach ($arr as $i => $segment) {
                                    $currentPath .= $segment;
                                    if (isset($breadcrumbsConfig[$currentPath])) {
                                        $route = '#';
                                        if (Route::has($currentPath)) {
                                            $route = route($currentPath, isset($breadcrumbsConfig[$currentPath]['params']) ?  Route::current()->parameters() : []);
                                        }
                                        echo '<a href="'.$route.'" class="breadcrumb-item">
                                                <div class="breadcrumb-text">'.(isset($breadcrumbsConfig[$currentPath]['label']) ? $breadcrumbsConfig[$currentPath]['label'] : $breadcrumbsConfig[$currentPath]).'</div>
                                            </a>';
                                    }
                                    $currentPath .= count($arr) > $i + 1  ? '.' : '';
                                }
                            }
                        @endphp
                    </ol>
                </nav>
            </div>
            <div class="header-wrap">
                <button id="fullscreenTrigger" class="btn btn-icon bg-orange" title="Fullscreen" type="button">
                    <i class="fa fa-expand fa-lg" id="icon-fullscreen"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- END Header -->

    <!-- BEGIN Header Holder -->
    <div class="header-holder header-holder-mobile sticky-header" id="sticky-header-mobile">
        <div class="header-container container-fluid">
            <div class="header-wrap">
                <button class="btn btn-flat-primary btn-icon bg-purple" data-toggle="aside">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="header-wrap header-wrap-block justify-content-start px-3">
                {{-- <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('assets/themes/panely/assets/images/logo/farmapos.png') }}" alt="Logo" class="img-fluid" style="max-height: 6rem;">
                </a> --}}
            </div>
            <div class="header-wrap">
                <div class="ml-2 dropdown">
                    <button class="btn btn-flat-primary widget13 bg-young-purple" data-toggle="dropdown">
                        <div class="widget13-text"> Hi <strong>{{ auth()->user()->name }}</strong>
                        </div>
                        <!-- BEGIN Avatar -->
                        @php
                            $alt_img = '<div class="avatar bg-purple widget13-avatar">
                                            <div class="avatar-display">
                                                <i class="fa fa-user-alt"></i>
                                            </div>
                                        </div>';
                            if(isset(auth()->user()->photo)){
                                $path = "assets/upload_file/".auth()->user()->photo;
                                if(file_exists(public_path($path))){
                                    echo '<img src="'.asset($path).'" alt="" style="max-height: 30px;">';
                                }else{
                                    echo $alt_img;
                                }
                            }else{
                                echo $alt_img;
                            }
                        @endphp
                        <!-- END Avatar -->
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
                        <!-- BEGIN Portlet -->
                        <div class="portlet border-0">
                            <div class="portlet-body rounded-0 p-0">
                                <!-- BEGIN Rich List Item -->
                                <div class="rich-list-item w-20 p-0">
                                    <div class="rich-list-content">
                                        <div class="settings">
                                            {{--<a href="{{ route('profile') }}" tabindex="0" target="_blank" role="menuitem" class="dropdown-item">
                                                <span class="dropdown-icon"><i data-feather="user"></i></span>
                                                <span class="dropdown-content">Profil</span>
                                            </a>--}}
                                        </div>
                                        <div class="logout">
                                            <a href="#" target="_blank" tabindex="0" role="menuitem" class="dropdown-item">
                                                <span class="dropdown-icon"><i data-feather="log-out"></i></span>
                                                <span class="dropdown-content">Keluar</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
