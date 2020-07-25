<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>SRH FIRST</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="SRH FIRST" name="description" />
        <meta content="Coderthemes" name="Christopher" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!-- jvectormap -->
        <link href="{{ asset('assets/libs/jqvmap/jqvmap.min.css') }}" rel="stylesheet" />

        <!-- DataTables -->
        <link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
        @yield('css')

        <!-- App css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />


    </head>
    <body>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Topbar Start -->
            @include('includes.topBar')
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('includes.sideBar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        @yield('chemin')
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

        <!-- KNOB JS -->
        <script src="{{ asset('assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>
        <!-- Chart JS -->
        <script src="{{ asset('assets/libs/chart-js/Chart.bundle.min.js') }}"></script>

        <!-- Jvector map -->
        <script src="{{ asset('assets/libs/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('assets/libs/jqvmap/jquery.vmap.usa.js') }}"></script>

        <!-- Datatable js -->
        <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>

        @yield('datatable')

        <!-- Dashboard Init JS -->
        <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>
        @yield('js')
    </body>
</html>
