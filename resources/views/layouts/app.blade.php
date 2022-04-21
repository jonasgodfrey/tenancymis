<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dashboard | Tenancy Plus') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="assets/css/config/default/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" disabled="disabled" />
    <link href="assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet"
        disabled="disabled" />
    <!-- icons -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

     <!-- third party css -->
     <link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
     <link href="assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
     <link href="assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
     <link href="assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
     <!-- third party css end -->

</head>

<!-- body start -->

<body class="loading" data-layout-mode="horizontal"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>
    <!-- Begin page -->
    <div id="wrapper">
        @include('layouts.nav')
        @include('layouts.menu')

        <div class="content-page">
            <!-- content -->
            @yield('content')

            @include('layouts.footer');
        </div>
        <!-- End Page content -->
    </div>
    <!-- END wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- knob plugin -->
    <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>

    <!--Morris Chart-->
    <script src="assets/libs/morris.js06/morris.min.js"></script>
    <script src="assets/libs/raphael/raphael.min.js"></script>

    <!-- Dashboar init js-->
    <script src="assets/js/pages/dashboard.init.js"></script>

    <!-- App js-->
    <script src="assets/js/app.min.js"></script>
     <!-- third party js -->
     <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
     <script src="assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
     <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
     <script src="assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
     <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
     <script src="assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
     <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
     <script src="assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
     <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
     <script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
     <script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
     <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
     <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
     <!-- third party js ends -->
     <!-- Datatables init -->
     <script src="assets/js/pages/datatables.init.js"></script>

     <!-- App js -->
    @yield('js');

</body>

</html>
