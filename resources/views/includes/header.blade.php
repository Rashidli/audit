<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Audit Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- jquery.vectormap css -->
    <link href="{{asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{asset('assets/css/select2.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body data-topbar="dark">

<!-- <body data-layout="horizontal" data-topbar="dark"> -->

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="{{route('home')}}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset('assets/images/logo-sm.png')}}" alt="logo-sm" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="{{asset('assets/images/logo-dark.png')}}" alt="logo-dark" height="20">
                                </span>
                    </a>

                    <a href="{{route('home')}}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset('assets/images/logo-sm.png')}}" alt="logo-sm-light" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="{{asset('assets/images/logo-light.png')}}" alt="logo-light" height="20">
                                </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                    <i class="ri-menu-2-line align-middle"></i>
                </button>

                <!-- App Search-->
                <form class="app-search d-none d-lg-block">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="ri-search-line"></span>
                    </div>
                </form>

            </div>

            <div class="d-flex">

                <div class="dropdown d-inline-block d-lg-none ms-2">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ri-search-line"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                         aria-labelledby="page-header-search-dropdown">
X
                        <form class="p-3">
                            <div class="mb-3 m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="search ...">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="ri-fullscreen-line"></i>
                    </button>
                </div>

                <div class="dropdown d-inline-block user-dropdown">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-none d-xl-inline-block ms-1">{{Auth::user()->name}}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="javascript: void(0)"><i class="ri-user-line align-middle me-1"></i> profile</a>
                        <a class="dropdown-item d-block" href="javascript: void(0)"><span class="badge bg-success float-end mt-1">11</span><i class="ri-settings-2-line align-middle me-1"></i> settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{route('logout')}}"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> çıxış</a>
                    </div>
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
                    <li class="menu-title">Menu</li>

                    <li>
                        <a href="{{route('home')}}" class="waves-effect">

                            <span>Admin panel</span>

                        </a>
                    </li>


                    @if(Auth::user()->hasRole('admin'))
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-layout-3-line"></i>
                                <span>İstifadəçilər</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('users.create')}}">İstifadəçi yarat</a></li>
                                <li><a href="{{route('users.index')}}">İstifadəçilər</a></li>
                                <li><a href="{{route('roles.index')}}">Roles</a></li>
                                <li><a href="{{route('permissions.index')}}">Permissions</a></li>
                            </ul>
                        </li>
                    @endif

                    @if(Auth::user()->hasRole('admin'))
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-layout-3-line"></i>
                                <span>Sifarişlər</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('orders.create')}}">Sifariş yarat</a></li>
                                <li><a href="{{route('orders.index')}}">Sifarişlər</a></li>
                            </ul>
                        </li>
                    @endif

                    @if(Auth::user()->hasRole('admin') or Auth::user()->hasRole('auditor'))
                            <li>
                                <a href="{{route('groups.index')}}"><i class="ri-layout-3-line"></i><span>Qruplar</span></a>
                            </li>
                    @endif

                    @if(Auth::user()->hasRole('admin'))
                        <li>
                            <a href="{{route('auditors.index')}}"><i class="ri-layout-3-line"></i><span>Auditorlar</span></a>
                        </li>
                    @endif

                    @if(Auth::user()->hasRole('admin'))
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-layout-3-line"></i>
                                <span>İşlənmiş sifarişlər</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('order_status','1')}}">Yüngül</a></li>
                                <li><a href="{{route('order_status','2')}}">Orta</a></li>
                                <li><a href="{{route('order_status','3')}}">Ağır</a></li>
                                <li><a href="{{route('order_status')}}">Açıqlar</a></li>
                                <li><a href="{{route('satisfied_customers')}}">Müştəri razı</a></li>
                            </ul>
                        </li>
                    @endif

                    @if(Auth::user()->hasRole('admin'))
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-layout-3-line"></i>
                                <span>Tənzimləmələr</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('operators.index')}}">Operatorlar</a></li>
                                <li><a href="{{route('masters.index')}}">Ustalar</a></li>
                                <li><a href="{{route('workers.index')}}">Köməkçilər</a></li>
                                <li><a href="{{route('drivers.index')}}">Sürücülər</a></li>
                                <li><a href="{{route('question_cats.index')}}">Sual kateqoriyaları</a></li>
                                <li><a href="{{route('questions.index')}}">Suallar</a></li>
                                <li><a href="{{route('plan_questions.index')}}">Proseslərin Sualları</a></li>
                            </ul>
                        </li>
                    @endif

                    @if(Auth::user()->hasRole('admin'))
                        <li>
                            <a href="{{route('report')}}"><i class="ri-layout-3-line"></i><span>Hesabatlar</span></a>
                        </li>
                    @endif

                    @if(Auth::user()->hasRole('admin') or Auth::user()->hasRole('auditor'))
                        <li>
                            <a href="{{route('plan_orders.index')}}"><i class="ri-layout-3-line"></i><span>Planlı yoxlama</span></a>
                        </li>
                    @endif

                    @if(Auth::user()->hasRole('admin'))
                        <li>
                            <a href="{{route('plan_reports.index')}}"><i class="ri-layout-3-line"></i><span>Planlı hesabat</span></a>
                        </li>
                    @endif

                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->
