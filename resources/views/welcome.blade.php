<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>CEADESE HOME</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assetslanding/images/favicon.ico">

    <!-- App css -->
    <link href="assetslanding/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assetslanding/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assetslanding/css/theme.min.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu vertical-menu-dark">

                <img src="assetslanding/images/sidebanner.jpg" alt="" width="100%" height="100%" style="position: relative;">
                <!-- <h2 style="text-align: center; color: white; position: absolute;" >Welcome</h2> -->

        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content" style="margin-top: 0;">

            <div class="page-content" style="padding: 0;">
                <div class="container-fluid">

                  <!-- start page title -->

                <div class="row">
                    <div class="col-12">
                        <img src="assetslanding/images/banner.jpg" alt="" width="100%">
                        <h4 style="margin-bottom: 30px; text-align: center;">Centre of Excellence in Agricultural Development and Sustainable Environment</h4>
                    </div>
                </div>

                  <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18" style="color:green;"></h4>

                            <!-- <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Opatix</a></li>
                                    <li class="breadcrumb-item active">Dark Sidenav</li>
                                </ol>
                            </div> -->

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="card card-animate">
                            <a href="{{ route('login') }}">
                            <div class="card-body">
                                <div class="avatar-sm float-right">
                                    <span class="avatar-title bg-soft-primary rounded-circle">
                                        <!-- <i class="bx bx-layer m-0 h3 text-primary"></i>
                                        <i class="fa fa-sign-in text-success"></i> -->
                                        <i class="fa-solid fa-arrow-right-to-bracket" style="color: green;"></i>
                                    </span>
                                </div>
                                <!-- <h6 class="text-muted text-uppercase mt-0">Project Income</h6> -->
                                <h3 class="my-3"  style="color:green;">Login</h3>
                                <!-- <span class="badge badge-soft-primary mr-1"> +11% </span> <span class="text-muted">From previous period</span> -->
                            </div>
                        </a>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6">
                        <div class="card card-animate">
                            <a href="{{ route('register_page') }}">
                            <div class="card-body">
                                <div class="avatar-sm float-right">
                                    <span class="avatar-title bg-soft-primary rounded-circle">
                                        <!-- <i class="bx bx-dollar-circle m-0 h3 text-primary"></i> -->
                                        <!-- <i class="fa-regular fa-user-plus"></i> -->
                                        <i class="fa-solid fa-user-plus" style="color: green;"></i>
                                    </span>
                                </div>
                                <!-- <h6 class="text-muted text-uppercase mt-0">Net Revenue</h6> -->
                                <h3 class="my-3"  style="color:green;">Register</h3>
                                <!-- <span class="badge badge-soft-primary mr-1"> -29% </span> <span class="text-muted">This Month</span> -->
                            </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6">
                        <div class="card card-animate">
                            <a href="{{ route('upload-receipt') }}">
                            <div class="card-body">
                                <div class="avatar-sm float-right">
                                    <span class="avatar-title bg-soft-primary rounded-circle" style="background-color: green;">
                                        <!-- <i class="bx bx-analyse m-0 h3 text-primary"></i> -->
                                        <!-- <i class="fa-regular fa-receipt"></i> -->
                                        <i class="fa-solid fa-receipt" style="color: green;"></i>
                                    </span>
                                </div>
                                <!-- <h6 class="text-muted text-uppercase mt-0">New Leads</h6> -->
                                <h3 class="my-3"><span data-plugin="counterup"  style="color:green;">Verify <br>Receipt</span></h3>
                                <!-- <span class="badge badge-soft-primary mr-1"> 0% </span> <span class="text-muted">This Month</span> -->
                            </div>
                        </a>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6">
                        <div class="card card-animate">
                            <a href="{{route('returning-student-home')}}">
                                <div class="card-body">
                                    <div class="avatar-sm float-right">
                                        <span class="avatar-title bg-soft-primary rounded-circle">
                                            <!-- <i class="bx bx-basket m-0 h3 text-primary"></i> -->
                                            <i class="fa-solid fa-arrow-rotate-left" style="color: green;"></i>
                                        </span>
                                    </div>
                                    <!-- <h6 class="text-muted text-uppercase mt-0">Quoted </h6> -->
                                    <h3 class="my-3" data-plugin="counterup"  style="color:green;">Returning <br> Students</h3>
                                    <!-- <span class="badge badge-soft-primary mr-1"> +89% </span> <span class="text-muted">This Month</span> -->
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end row -->


        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Overlay-->
    <div class="menu-overlay"></div>


    <!-- jQuery  -->
    <script src="assetslanding/js/jquery.min.js"></script>
    <script src="assetslanding/js/bootstrap.bundle.min.js"></script>
    <script src="assetslanding/js/metismenu.min.js"></script>
    <script src="assetslanding/js/waves.js"></script>
    <script src="assetslanding/js/simplebar.min.js"></script>

    <!-- Morris Js-->

    <!-- App js -->
    <script src="assetslanding/js/theme.js"></script>

</body>


</html>
