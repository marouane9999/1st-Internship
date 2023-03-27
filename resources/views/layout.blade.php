<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alpha IT</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="shortcut icon" href="/adminLte/img/A.png" />
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/adminLte/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminLte/css/adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="http://t4t5.github.io/sweetalert/dist/sweetalert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <meta name="csrf_token" content="{{csrf_token()}}">




</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                   aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <!-- Messages Dropdown Menu -->

            <!-- Notifications Dropdown Menu -->

            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="{{route('logout')}}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
                <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation ">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="/adminLte/img/A.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">LPHA IT</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/adminLte/img/user3-128x128.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    {{--          <a href="#" class="d-block">  {{ \Illuminate\Support\Facades\Auth::user()->name }}</a>--}}
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline mb-0">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                           aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="">
                <ul class="nav nav-pills nav-sidebar flex-column  " data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <br><br>
                    <li class="nav-item menu-open mb-4">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open mb-4 ">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Gestion des Participants
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('participants.index')}}" class="nav-link">
                                    <i class="fas fa-edit nav-icon"></i>
                                    <p>Gestion & Consultation</p>

                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item menu-open mb-4">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fa fa-plane"></i>
                            <p>
                                Gestion des Vols
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('vols.index')}}" class="nav-link">
                                    <i class="fas fa-edit nav-icon"></i>
                                    <p>Gestion & Affectation</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index2.html" class="nav-link">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Suivi & Reporting</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index3.html" class="nav-link">
                                    <i class=" fas fa-user-circle    nav-icon"></i>
                                    <p>Contrôle</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open mb-4">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-bed"></i>
                            <p>
                                Gestion d'Hebergement
                            </p>
                            <i class="right fas fa-angle-left"></i>

                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('hebergements.index')}}" class="nav-link">
                                    <i class="fas fa-edit nav-icon"></i>
                                    <p>Gestion & Affectation</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index2.html" class="nav-link">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Suivi & Reporting</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index3.html" class="nav-link">
                                    <i class=" fas fa-user-circle    nav-icon"></i>
                                    <p>Contrôle</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item menu-open mb-4">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-hamburger"></i>
                            <p>
                                Gestion de Restauration
                            </p>
                            <i class="right fas fa-angle-left"></i>

                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('restaurations.index')}}" class="nav-link">
                                    <i class="fas fa-edit nav-icon"></i>
                                    <p>Gestion & Affectation</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index2.html" class="nav-link">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Suivi & Reporting</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index3.html" class="nav-link">
                                    <i class=" fas fa-user-circle    nav-icon"></i>
                                    <p>Contrôle</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item menu-open mb-3">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-tag"></i>
                            <p>
                                Gestion des Volontaires
                            </p>
                            <i class="right fas fa-angle-left"></i>

                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./index.html" class="nav-link">
                                    <i class="fas fa-edit nav-icon"></i>
                                    <p>Gestion & Affectation</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index2.html" class="nav-link">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Suivi & Reporting</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index3.html" class="nav-link">
                                    <i class=" fas fa-user-circle    nav-icon"></i>
                                    <p>Contrôle</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-id-card"></i>
                            <p>
                                Gestion des Utilisateurs
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('header title')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        @if (flash()->message)
            <div class="alert {{ flash()->class }} alert-dismissible fade show m-auto col-9" role="alert">
                <i class="fa fa-check"></i>
                {{ flash()->message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        @endif
        <div class="">
            @yield('content')
        </div>
    </div>
    <!-- /.content content-wrapper -->


    <!-- Control Sidebar -->
{{--  <aside class="control-sidebar control-sidebar-dark">--}}
{{--    <!-- Control sidebar content goes here -->--}}
{{--    <div class="p-3">--}}
{{--      <h5>Title</h5>--}}
{{--      <p>Sidebar content</p>--}}
{{--    </div>--}}
{{--  </aside>--}}
<!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <!-- Default to the left -->
        <strong>Copyright &copy; 2023 <a href="https://adminlte.io">AlphaIT</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/adminLte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminLte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminLte/js/adminlte.min.js"></script>
<link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script>



</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @vite('resources/js/app.js')
</body>
</html>
