<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
        <div class="d-flex align-items-center logo-box justify-content-start d-md-block d-none">
            <!-- Logo -->
            <a href="index.html" class="logo">
                <!-- logo-->
                <div class="logo-mini">
                    <span class="light-logo"><img src="{{ asset('funaab-logo.jpg') }}"
                            alt="logo"></span>
                </div>
                <div class="logo-lg">
                    <span class="light-logo fs-36 fw-700 text-success">CEADESE<span class="text-primary"></span></span>
                </div>
            </a>
        </div>
        <div class="user-profile my-15 px-20 py-10 b-1 rounded10 mx-15">
            <div class="d-flex align-items-center justify-content-between">
                <div class="image d-flex align-items-center">
                    <img src="{{ asset('adminassets/images/avatar/avatar-13.png') }}" class="rounded-0 me-10"
                        alt="User Image">
                    <div>
                        <h4 class="mb-0 fw-600">{{ Auth::user()->name }}</h4>
                        <p class="mb-0">Super Admin</p>
                    </div>
                </div>
                <div class="info">
                    <a class="dropdown-toggle p-15 d-grid" data-bs-toggle="dropdown" href="#"></a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="extra_profile.html"><i class="ti-user"></i> Profile</a>
                        <a class="dropdown-item" href="mailbox.html"><i class="ti-email"></i> Inbox</a>
                        <a class="dropdown-item" href="contact_app_chat.html"><i class="ti-link"></i> Conversation</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout"><i class="ti-lock"></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="multinav">
            <div class="multinav-scroll" style="height: 97%;">
                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Main Menu</li>
                    <li>
                        <a href="{{ route('admin_dashboard') }}">
                            <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-Address-card"></i>
                            <span>Configuration</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('users_home') }}"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Manage Users</a></li>
                            <li><a href="{{ route('roles_home') }}"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Roles and Permission</a></li>
                            <li><a href="{{ route('academic_session_home') }}"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Academic Session</a></li>
                            <li><a href="{{route('programmes_home')}}"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Programmes</a></li>
                            <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Courses</a></li>
                            <li><a href="{{route('fees_home')}}"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Fees</a></li>
                            <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Special Control</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
                            <span>Students</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>New Registration</a></li>
                            <li><a href=""><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Registered Student</a></li>
                            <li><a href=""><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>All students</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="departments.html">
                            <i class="icon-Ticket"></i>
                            <span>Departments</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-Address-card"></i>
                            <span>Lecturers</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Lecturer List</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-Address-card"></i>
                            <span>Manage Payment</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Payment </a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-Address-card"></i>
                            <span>Report</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Payment Report</a></li>
                            <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Registration Report</a></li>
                            <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Other Report</a></li>
                        </ul>
                    </li>
                </ul>

                <div class="sidebar-widgets">

                    <div class="copyright text-center m-25">
                        <p><strong class="d-block">FUNAAB</strong> ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> All Rights Reserved
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</aside>
