<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Admin - Respaldo Homie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon icon
    <link rel="shortcut icon" href="dashboard/assets/images/hills.svg">

    <!-- Bootstrap Css -->
    <link href="{{ asset('dashboard/assets/css/bootstrap.min.css?ver=1.0.10') }}" id="bootstrap-style"
        rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('dashboard/assets/css/icons.min.css?ver=1.0.10') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('dashboard/assets/css/app.min.css?ver=1.0.10') }}" id="app-style" rel="stylesheet"
        type="text/css" />

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" media="all">
    <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap4.min.css" rel="stylesheet" media="all">
    <style>
        .hidden-input>input {
            display: none !important;
        }

    </style>

    <!--Morris Chart-->
    <script src="{{ asset('dashboard/assets/libs/morris.js/morris.min.js?ver=1.0.10') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/raphael/raphael.min.js?ver=1.0.10') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <!-- chars -->
    <script src="https://cdn.plot.ly/plotly-latest.min.js" charset="utf-8"></script>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles

</head>

<body data-sidebar="dark">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box" style="display: block; text-align: center;">
                        <a href="{{ route('admin-inicio') }}" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('dashboard/assets/images/favicon.png') }}" class="mt-3"
                                    alt="" width="30">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('dashboard/assets/images/logo_blanco.svg') }}"
                                    class="mt-23" alt="" width="120">
                            </span>
                        </a>


                        <a href="{{ route('admin-inicio') }}" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('dashboard/assets/images/favicon.png') }}" class="mt-3"
                                    alt="" width="30">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('dashboard/assets/images/logo_blanco.svg') }}"
                                    class="mt-3" alt="" width="120">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <div class="d-none d-sm-block ml-2">
                        <h4 class="page-title font-size-18">Dashboard</h4>
                    </div>

                </div>


                <div class="d-flex">
                    <div class="dropdown d-none d-lg-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                            <i class="mdi mdi-fullscreen"></i>
                        </button>
                    </div>
                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="dashboard/assets/images/google.svg"
                                alt="Header Avatar" style="background: none;">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a class="dropdown-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                    class="dripicons-exit font-size-16 align-middle mr-2"></i>Cerrar sesión</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf </form>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="mdi mdi-spin mdi-cog"></i>
                        </button>
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Main</li>

                        <li>
                            <a href="{{ route('admin-inicio') }}" class="waves-effect">
                                <i class="dripicons-device-desktop"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin-usuarios') }}" class="waves-effect">
                                <i class="fas fa-users"></i>
                                <span>usuarios</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin-transacciones') }}" class="waves-effect">
                                <i class="far fa-folder-open"></i>
                                <span>Transacciones</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin-referidos') }}" class="waves-effect">
                                <i class="far fa-folder-open"></i>
                                <span>Referidos</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">

                <div class="container-fluid">
                    @yield('content')


                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> <span class="d-none d-sm-inline-block"> Respaldo Homie todos los derechos
                                reservados.</span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title px-3 py-4">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>

            <!-- Settings -->
            <hr class="mt-0" />
            <h6 class="text-center mb-0">Choose Demo</h6>

            <div class="p-4">
                <div class="mb-2">
                    <img src="dashboard/assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                    <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="dashboard/assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch"
                        data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css" />
                    <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="dashboard/assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-5">
                    <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch"
                        data-appStyle="dashboard/assets/css/app-rtl.min.css" />
                    <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                </div>

            </div>

        </div>
        <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    @livewireScripts


    <!-- JAVASCRIPT -->
    <script src="{{ asset('dashboard/assets/libs/jquery/jquery.min.js?ver=1.0.10') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/bootstrap/js/bootstrap.bundle.min.js?ver=1.0.10') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/metismenu/metisMenu.min.js?ver=1.0.10') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/simplebar/simplebar.min.js?ver=1.0.10') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/node-waves/waves.min.js?ver=1.0.10') }}"></script>

    <!-- DATATABLE -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">
    </script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>


    <script src="{{ asset('dashboard/assets/js/pages/dashboard.init.js?ver=1.0.10') }}"></script>


    <script src="{{ asset('dashboard/assets/js/app.js?ver=1.0.10') }}"></script>
    @stack('script')

</body>

</html>
