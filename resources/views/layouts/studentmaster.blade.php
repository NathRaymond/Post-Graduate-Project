<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>CEADESE STUDENT PORTAL </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('profile_picture/logo.jpeg') }}" />

    <link rel="shortcut icon" href="{{ asset('studentassets/assets/images/favicon.ico') }}">
    <link href="{{ asset('studentassets/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('studentassets/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('studentassets/assets/css/theme.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <link href="{{ asset('studentassets/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('studentassets/assets/js/loader.js') }}"></script>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('studentassets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('studentassets/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('studentassets/assets/css/structure.css') }}" rel="stylesheet" type="text/css"
        class="structure" />
    <link href="{{ asset('studentassets/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('studentassets/assets/css/dashboard/dash_2.css') }}">
    {{-- <link rel="icon" href="https://crm-admin-dashboard-template.multipurposethemes.com/images/favicon.ico"> --}}

    <link rel="stylesheet" href="{{ asset('modalasset/src/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('modalasset/src/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('modalasset/src/css/skin_color.css') }}">
    <style>
        .wizard-content .wizard>.steps>ul>li {
            display: inline-block;
            width: auto;
            text-align: center;
            position: relative;
            padding: 0.5rem 2.5rem;
            border-radius: 5px;
            margin: 0 10px;
            background-color: green;
            border: 2px solid green;
        }

        .wizard-content .wizard>.actions>ul>li>a[href="#previous"] {
            background-color: green;
            color: white;
            border: 1px solid #f3f6f9;
        }

        .wizard-content .wizard>.actions>ul>li>a {
            color: white;
            background-color: green;
            display: block;
            padding: 7px 12px;
            border-radius: 5px;
            border: 1px solid transparent;
        }

        .sidebar-theme #compactSidebar {
            background: green !important;
        }

        .page-title:before {
            background: green;
        }

        .wizard-content .wizard>.steps>ul>li.disabled a {
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



        <div id="content" class="main-content">
            @yield('contents')
            @include('layouts.components.student_footer')
        </div>
    </div>


    <div id="zoomupModal" class="modal
        animated zoomInUp custo-zoomInUp" role="dialog"
            data-backdrop="static">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload Profile Picture</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24
                            24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather
                            feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('upload_picture') }}" id="uploadPicture"
                            class="tab-wizard wizard-circle" enctype="multipart/form-data" onsubmit="showloaderspin()">
                            @csrf
                            <div class="row">
                                <div class="">
                                    <div class="form-group">
                                        <label class="form-label">Upload Profile Picture:</label>
                                        <input type="file" class="form-control" name="profile_picture" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer md-button" style="float: right">
                                <button class="btn btn-danger" data-dismiss="modal"><i
                                        class="flaticon-cancel-12"></i>
                                    Close</button>
                                <button type="submit" class="btn btn-success">Upload&nbsp;<span
                                    class="spinner-border loader spinner-border-sm" id="thisLoaderspin" role="status"
                                    aria-hidden="true" style="display:none"></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <script src="{{ asset('studentassets/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('studentassets/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('studentassets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('studentassets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('studentassets/assets/js/app.js') }}"></script>
    {{-- <script src="{{ asset('js/sweetalert/dist/sweetalert.min.js') }}"></script> --}}
    @include('includes.js')
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('studentassets/assets/js/custom.js') }}"></script>
    <script src="{{ asset('studentassets/assets/js/dashboard/dash_2.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#add-btn").on('click', async function(e) {
                e.preventDefault();
                try {
                    const willUpdate = await new swal({
                        title: "Confirm Form submit",
                        text: `Are you sure you want to submit this form?`,
                        icon: "warning",
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes!",
                        showCancelButton: true,
                        buttons: ["Cancel", "Yes, Submit"]
                    });
                    if (willUpdate.isConfirmed == true) {
                        $("#uploadPicture").submit();
                    } else {
                        swal("Picture will not be uloaded  :)");
                    }
                } catch (e) {
                    if ('message' in e) {
                        console.log('e.message', e.message);
                        swal("Opss", e.message, "error");
                        loader.hide();
                    }
                }
            })
        })
    </script>

<script>
    function showloaderspin() {
        var loader = document.getElementById('thisLoaderspin');
        loader.style.display = "inline-block";
    }
</script>
    @yield('scripts')
</body>


</html>
