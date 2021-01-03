<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cozy Management</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('css/admins/style.css') }}"> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @yield('link')
    <link rel="icon" href="https://scontent.fdad3-1.fna.fbcdn.net/v/t1.0-9/40018675_276206013108199_5139616706892660736_n.jpg?_nc_cat=106&ccb=2&_nc_sid=09cbfe&_nc_ohc=Gd29B_rfb5cAX_F_T3b&_nc_ht=scontent.fdad3-1.fna&oh=f0e97696f2b715ef134eafb564281ed5&oe=60148E16" type="image/x-icon">
    <!-- <link rel="stylesheet" href="cdn.datatables.net/responsive/2.2.6/css/dataTables.responsive.css"> -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top bg-info">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <div class="image">
                            <img src="{{asset('images/avatar-0.png')}}" class="img-circle elevation-2" id="userAvatarNavbar" alt="User Image" style="height:25px;width:25px">
                            <span class="hidden-xs text-white">{{ Auth::user()->name}}</span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media d-flex justify-content-center">
                                <img src="{{asset('images/avatar-0.png')}}" class="img-circle elevation-2" id="userAvatarNavbar" alt="User Image" style="height:25px;width:25px">
                            </div>
                            <!-- Message End -->
                        </a>
                        <!-- <div class="dropdown-divider"></div>
                        <div class="d-flex justify-content-between py-2">
                            <a href="#" type="button"></a>
                            <a href="#" type="" class="ml-3 text-dark">Followers</a>
                            <a href="#" type="" class="text-dark">Sales</a>
                            <a href="#" type="" class="mr-3 text-dark">Friends</a>
                        </div> -->
                        <div class="dropdown-divider"></div>
                        <div class="d-flex justify-content-between py-2">
                            <!-- <a href="#" type="button"></a> -->
                            <a href="{{ url('/profiles') }}" type="button" class="btn btn-outline-success ml-3">Profile</a>
                            <a href="{{route('logout')}}" type="button" class="btn btn-outline-danger mr-3">Log out</a>

                        </div>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link bg-info">
                <img src="https://scontent.fdad3-1.fna.fbcdn.net/v/t1.0-9/40018675_276206013108199_5139616706892660736_n.jpg?_nc_cat=106&ccb=2&_nc_sid=09cbfe&_nc_ohc=Gd29B_rfb5cAX_F_T3b&_nc_ht=scontent.fdad3-1.fna&oh=f0e97696f2b715ef134eafb564281ed5&oe=60148E16" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Cozy Management</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('historical-criteria.report') }}" class="nav-link">
                                <i class="fa fa-tag nav-icon"></i>
                                <p>Reports</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview menu-close">
                            <a href="#" class="nav-link ">
                                <i class="fa fa-shopping-cart nav-icon"></i>
                                <p>
                                    Users
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('users.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Users</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('users.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Users</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview menu-close">
                            <a href="#" class="nav-link ">
                                <i class="fa fa-shopping-cart nav-icon"></i>
                                <p>
                                    Criteria
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('criteria.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Criteria</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('criteria.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Criteria</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('historical-criteria.index') }}" class="nav-link">
                                <i class="fa fa-tag nav-icon"></i>
                                <p>History</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper   pt-2 mt-5" id="wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    @yield('content-header')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <section class="content">
                <div class="container-fluid bg-white rounded border-color w-100 p-3">
                    @yield('content')



                    <!-- {{-- <div class="modal" id="myModal">--}}
                    {{-- <div class="modal-dialog modal-lg">--}}
                    {{-- <div class="modal-content">--}} -->

                    {{-- <!-- Modal Header -->--}}
                    {{-- <!-- <div class="modal-header">--}}
                    {{-- <h4 class="modal-title">Shops</h4>--}}
                    {{-- <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                    {{-- </div> -->--}}

                    {{-- <!-- Modal body -->--}}
                    {{-- <div class="modal-body d-flex justify-content-center">--}}
                    {{-- <div class="hero-image">--}}
                    {{-- <div class="hero-text">--}}
                    {{-- <label for="upload-photo" class="button-hover"><i class="fa fa-camera" aria-hidden="true"></i>&emsp; Change Avatar</label>--}}
                    {{-- <input type="file" name="photo" id="upload-photo" />--}}
                    {{-- </div>--}}
                    {{-- </div>--}}
                    {{-- </div>--}}
                    {{-- <!-- Modal footer -->--}}
                    {{-- <div class="modal-footer">--}}
                    {{-- <button class="btn btn-success" id="btnOK" data-dismiss="modal">Close</button>--}}
                    {{-- </div>--}}
                    {{-- </div>--}}
                    {{-- </div>--}}
                    {{-- </div>--}}
                </div>
                <div class="container-fluid">
                    @yield('second-content')
                </div>
                @yield('modal')

            </section>
        </div>

        <!-- <footer class="main-footer">
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.2
            </div>
        </footer> -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>

    </div>
    <!-- ./wrapper -->
    @stack('scripts')
    <!-- jQuery -->
    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js')  }}"></script>
    <!-- jQuery UI 1.11.4 -->
    {{--<script src="{{ asset('AdminLTE/plugins/jquery-ui/jquery-ui.min.js')  }}"></script>--}}
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script> -->
    <!-- Bootstrap 4 -->
    <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')  }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('AdminLTE/plugins/chart.js/Chart.min.js')  }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('AdminLTE/plugins/sparklines/sparkline.js')  }}"></script>
    <!-- jQuery Mapael -->
    <script src="{{ asset('AdminLTE/plugins/jquery-mousewheel/jquery.mousewheel.js')  }}"></script>
    <script src="{{ asset('AdminLTE/plugins/raphael/raphael.min.js')  }}"></script>
    <script src="{{ asset('AdminLTE/plugins/jquery-mapael/jquery.mapael.min.js')  }}"></script>
    <script src="{{ asset('AdminLTE/plugins/jquery-mapael/maps/usa_states.min.js')  }}"></script>
    <!-- ChartJS -->
    <!-- PAGE SCRIPTS -->
    <script src="{{ asset('AdminLTE/dist/js/pages/dashboard2.js')  }}"></script>
    <!-- JQVMap -->
    {{--<script src="{{ asset('AdminLTE/plugins/jqvmap/jquery.vmap.min.js')  }}"></script>--}}
    {{--<script src="{{ asset('AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js')  }}"></script>--}}
    <!-- jQuery Knob Chart -->
    {{--<script src="{{ asset('AdminLTE/plugins/jquery-knob/jquery.knob.min.js')  }}"></script>--}}
    <!-- daterangepicker -->
    {{--<script src="{{ asset('AdminLTE/plugins/moment/moment.min.js')  }}"></script>--}}
    {{--<script src="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.js')  }}"></script>--}}
    <!-- Tempusdominus Bootstrap 4 -->
    {{--<script src="{{ asset('AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')  }}"></script>--}}
    <!-- Summernote -->
    {{--<script src="{{ asset('AdminLTE/plugins/summernote/summernote-bs4.min.js')  }}"></script>--}}
    <!-- overlayScrollbars -->
    <script src="{{ asset('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')  }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE/dist/js/adminlte.js')  }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- AdminLTE for demo purposes -->
    {{--<script src="{{ asset('AdminLTE/dist/js/demo.js')  }}"></script>--}}
    {{--<script src="//code.jquery.com/jquery.js"></script>--}}
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap JavaScript -->
    {{--<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>--}}
    <!-- App scripts -->

    <script>
        $(document).ready(function() {
            $("menuUser").click(function() {
                $('#collapseExample').toggle();
            });
        });
    </script>
</body>
@toastr_css
@toastr_js

</html>