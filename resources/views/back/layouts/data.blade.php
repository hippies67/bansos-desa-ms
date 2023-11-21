<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Bansos Desa Ms - @yield('title')</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('bansos_desa_ms.png') }}">

    <!-- Favicon icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    @yield('css')
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">

            <a href="{{ route('dashboard.index') }}" class="brand-logo">
                {{-- <img class="logo-abbr" src="{{ asset('tahu.png') }}" style="width: 200px !important;">
                <img class="logo-compact" src="{{ asset('tahu.png') }}" alt=""> --}}
                <i class="bi bi-egg-fill" style="color: #f4cf00; font-size: 35px;"></i>
                <span class="brand-title" style="font-weight: bold; color: rgb(150, 155, 160);">BANSOS DESA MS</span>
            </a>


            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Chat box start
        ***********************************-->

        <!--**********************************
            Chat box End
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                @yield('title_menu')
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            {{-- <li class="nav-item">
								<div class="input-group search-area d-xl-inline-flex d-none">
									<div class="input-group-append">
										<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
									</div>
									<input type="text" class="form-control" placeholder="Search here...">
								</div>
							</li>
						 --}}
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                    @if(!empty(Auth::user()->photo) && Storage::exists(Auth::user()->photo))
                                    <img src="{{ Storage::url(Auth::user()->photo) }}" width="20"
                                        style="object-fit: cover;" alt="" />
                                    @else
                                    <img src="{{ asset('default_profile.png') }}" width="20" style="object-fit: cover;"
                                        alt="" />
                                    @endif
                                    <div class="header-info">
                                        <span class="text-black"><strong>{{ Auth::user()->nama_lengkap }}</strong></span>
                                        <p class="fs-12 mb-0">{{ ucwords(Auth::user()->role) }}</p>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('user-setting') }}" class="dropdown-item ai-icon">
                                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary"
                                        width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="{{ route('admin.logout') }}" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                            width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll mm-active">
                <ul class="metismenu mm-show" id="menu">
                    <li class="{{ Request::routeIs('dashboard.*') ? 'mm-active active-no-child' : '' }}">
                        <a class="ai-icon {{ Request::routeIs('dashboard.*') ? 'mm-active' : '' }}"
                            href="{{ route('dashboard.index') }}" aria-expanded="false">
                            <i class="bi bi-speedometer"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="{{ Request::routeIs('penduduk.*') ? 'mm-active active-no-child' : '' }}">
                        <a href="{{ route('penduduk.index') }}"
                            class="ai-icon {{ Request::routeIs('penduduk.*') ? 'mm-active' : '' }}"
                            aria-expanded="false">
                            <i class="bi bi-journals"></i>
                            <span class="nav-text">Penduduk</span>
                        </a>
                    </li>
                    <li class="{{ Request::routeIs('jenis-bantuan.*') ? 'mm-active active-no-child' : '' }}">
                        <a href="{{ route('jenis-bantuan.index') }}"
                            class="ai-icon {{ Request::routeIs('jenis-bantuan.*') ? 'mm-active' : '' }}"
                            aria-expanded="false">
                            <i class="bi bi-gear-wide-connected"></i>
                            <span class="nav-text">Jenis Bantuan</span>
                        </a>
                    </li>
                    <li class="{{ Request::routeIs('bantuan.*') ? 'mm-active active-no-child' : '' }}">
                        <a href="{{ route('bantuan.index') }}"
                            class="ai-icon {{ Request::routeIs('bantuan.*') ? 'mm-active' : '' }}"
                            aria-expanded="false">
                            <i class="bi bi-inbox"></i>
                            <span class="nav-text">Bantuan</span>
                        </a>
                    </li>
                    <li class="{{ Request::routeIs('penerima-bantuan.*') ? 'mm-active active-no-child' : '' }}">
                        <a href="{{ route('penerima-bantuan.index') }}"
                            class="ai-icon {{ Request::routeIs('penerima-bantuan.*') ? 'mm-active' : '' }}"
                            aria-expanded="false">
                            <i class="bi bi-people"></i>
                            <span class="nav-text">Penerimaan</span>
                        </a>
                    </li>
                    
                    @if(Auth::user()->role == 'admin')
                        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <i class="bi bi-person-lines-fill"></i>
                                <span class="nav-text">Manajemen Akun</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ route('manajemen-akun-user.index') }}">User</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->

        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a><i><b>TEAM INGENIOUS</b></i></a> 2023</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    @include('sweetalert::alert')

    @yield('js')

    @stack('scripts')

</body>

</html>
