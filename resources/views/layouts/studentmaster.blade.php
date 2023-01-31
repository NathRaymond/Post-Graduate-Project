<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Postgraduate Student Portal </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('studentassets/assets/img/favicon.ico') }}" />
    <link href="{{ asset('studentassets/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('studentassets/assets/js/loader.js') }}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('studentassets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('studentassets/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('studentassets/assets/css/structure.css') }}" rel="stylesheet" type="text/css"
        class="structure" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('studentassets/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('studentassets/assets/css/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css"
        class="dashboard-sales" />
        <style>
            .sidebar-theme #compactSidebar {
                background: green !important;
            }

            .page-title:before {
                background: green;
            }

            .wizard-content .wizard > .steps > ul > li.disabled a {
                color: red !important;
            }

            .header-container .sidebarCollapse {
                color: green !important;
            }

            .swal2-styled.swal2-confirm {
                background-color: green !important;
            }
        </style>
        @yield('headlinks')
</head>

<body class="sidebar-noneoverflow dashboard-sales">
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center" style="background-color: green !important"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        @include('layouts.components.student_header')
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">
            @include('layouts.components.student_sidebar')
        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            @yield('contents')
            @include('layouts.components.student_footer')
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('studentassets/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('studentassets/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('studentassets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('studentassets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('studentassets/assets/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('studentassets/assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('studentassets/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('studentassets/assets/js/dashboard/dash_2.js') }}"></script>
    @yield('scripts')
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>

<!-- Mirrored from designreset.com/cork/ltr/demo15/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Aug 2022 15:18:14 GMT -->

</html>