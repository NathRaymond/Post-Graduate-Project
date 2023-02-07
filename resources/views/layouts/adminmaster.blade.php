<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>CEADESE</title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('adminassets/src/css/vendors_css.css')}}">

	<!-- Style-->
	<link rel="stylesheet" href="{{ asset('adminassets/src/css/style.css')}}">
	<link rel="stylesheet" href="{{ asset('adminassets/src/css/skin_color.css')}}">
	    <style>
        .table>thead>tr>td,
        .table>thead>tr>th {
            padding: 0.5rem !important;

        }

        .table>tbody>tr>td,
        .table>tbody>tr>th {
            padding: 0.5rem !important;
            vertical-align: middle;
        }
        .preloader {
			align-items: center;
			background: gray;
			display: flex;
			height: 100vh;
			justify-content: center;
			left: 0;
			position: fixed;
			top: 0;
			transition: opacity 0.3s linear;
			width: 100%;
			z-index: 9999;
			opacity: 0.4;
		}

    .text-right{
       text-align: right;
    }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

<div class="wrapper">
	<div id="loader"></div>

  <header class="main-header">
	<div class="d-flex align-items-center logo-box justify-content-start d-md-none d-block">
		<!-- Logo -->
		<a href="#" class="logo">
		  <!-- logo-->
		  <div class="logo-mini w-30">
			  <span class="light-logo"><img src="{{ asset('funaab-logo.jpg')}}" alt="logo"></span>
			  <span class="dark-logo">CEADESE</span>
		  </div>
		  {{-- <div class="logo-lg">
			  <span class="light-logo"><img src="{{ asset('funaab-logo.jpg')}}" alt="logo"></span>
			  <span class="dark-logo">CEADESE</span>
		  </div> --}}
		</a>
	</div>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
	  <div class="app-menu">
		<ul class="header-megamenu nav">
			<li class="btn-group nav-item">
				<a href="#" class="waves-effect waves-light nav-link push-btn btn-primary-light" data-toggle="push-menu" role="button">
					<i class="icon-Menu"><span class="path1"></span><span class="path2"></span></i>
			    </a>
			</li>
			<li class="btn-group d-lg-inline-flex d-none">
				<div class="app-menu">
					<div class="search-bx mx-5">
						<form>
							<div class="input-group">
							  <input type="search" class="form-control" placeholder="Search">
							  <div class="input-group-append">
								<button class="btn" type="submit" id="button-addon3"><i class="icon-Search"><span class="path1"></span><span class="path2"></span></i></button>
							  </div>
							</div>
						</form>
					</div>
				</div>
			</li>
		</ul>
	  </div>

      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
			<li class="dropdown notifications-menu btn-group nav-item">
				<a href="#" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon"  title="Notifications">
					<i class="icon-Notifications"><span class="path1"></span><span class="path2"></span></i>
					<div class="pulse-wave"></div>
			    </a>

			</li>
			<li class="btn-group nav-item">
				<a href="#" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon" title="">
					<i class="icon-Layout-arrange"><span class="path1"></span><span class="path2"></span></i>
			    </a>
			</li>
			<li class="btn-group nav-item d-xl-inline-flex d-none">
				<a href="#" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon" title="">
					<i class="icon-Notification"><span class="path1"></span><span class="path2"></span></i>
			    </a>
			</li>
			<li class="btn-group nav-item d-xl-inline-flex d-none">
				<a href="#" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon" title="">
					<i class="icon-Cart1"><span class="path1"></span><span class="path2"></span></i>
			    </a>
			</li>
			<li class="btn-group nav-item d-xl-inline-flex d-none">
				<a href="#" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon" title="" id="live-chat">
					<i class="icon-Chat"><span class="path1"></span><span class="path2"></span></i>
			    </a>
			</li>


			<li class="btn-group nav-item d-xl-inline-flex d-none">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon" title="Full Screen">
					<i class="icon-Expand-arrows"><span class="path1"></span><span class="path2"></span></i>
			    </a>
			</li>

			<li class="btn-group nav-item">
				<a href="/logout" class="waves-effect waves-light nav-link bg-primary btn-primary w-auto fs-14" title="Full Screen">
					Logout
			    </a>
			</li>

        </ul>
      </div>
    </nav>
  </header>


  @include('layouts.components.admin_sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		@yield('content')
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">

	  &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">CEADESE</a>. All Rights Reserved.
  </footer>
  <!-- Side panel -->
        <!-- Add Modal -->
        <div class="modal center-modal fade" id="modal-changePassword" tabindex="-1">
            <div class="modal-dialog">
                <form class="form" id='changePasswordForm' method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Change Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="form-label">Title</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="ti-user"></i></span>
                                    <input type="text" class="form-control" name="title" readonly
                                        value="{{ auth()->user()->title }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Full Name</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="ti-user"></i></span>
                                    <input type="text" class="form-control" value="{{ auth()->user()->name }}"
                                        readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Current Password</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="ti-phone"></i></span>
                                    <input type="text"required class="form-control" name="current_password"
                                        placeholder="Current password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">New Password</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="ti-phone"></i></span>
                                    <input type="password" required class="form-control" name='new_password'
                                        id="newPASSword" minlength="8">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Confirm Password</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="ti-phone"></i></span>
                                    <input type="password" required class="form-control" id="verifyPAssword"
                                        name='confirm_password' minlength="8">

                                </div>
                                <span class="form-text text-muted" id="passwordtextDis">
                                </span>
                            </div>

                        </div>
                        <!-- /.box-body -->


                        <div class="modal-footer modal-footer-uniform">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="submit_btn" class="btn btn-primary float-end"><span
                                    id="loaderPass" class="spinner-border spinner-border-sm me-2" role="status"
                                    style="display: none"></span>Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


</div>
<!-- ./wrapper -->





	<!-- Page Content overlay -->


	<!-- Vendor JS -->
	<script src="{{ asset('adminassets/src/js/vendors.min.js')}}"></script>
	<script src="{{ asset('adminassets/src/js/pages/chat-popup.js')}}"></script>
    <script src="{{ asset('adminassets/icons/feather-icons/feather.min.js')}}"></script>

	<script src="{{ asset('adminassets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>

	<script src="{{ asset('adminassets/src/js/template.js')}}"></script>
    <script src="{{ asset('js/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('studentassets/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('js/request.js') }}"></script>
    <script src="{{ asset('js/form.js') }}"></script>

    <script>
        @if ($errors->any())
            swal('Oops...', "{!! implode('', $errors->all(':message')) !!}", 'error')
        @endif

        @if (session()->has('success'))
            swal(
            'Success!',
            "{{ session()->get('message') }}",
            'success'
            )
        @endif
        @if (session()->has('message'))
            swal(
            'Success!',
            "{{ session()->get('message') }}",
            'success'
            )
        @endif
    </script>


    <script type="text/javascript">
        $(function() {
            $("#verifyPAssword").keyup(function() {
                var password = $("#newPASSword").val();
                var confirmPassword = $("#verifyPAssword").val();

                if (password != confirmPassword) {
                    $("#passwordtextDis").text("Password does not match");
                    $("#passwordtextDis").attr("style", "color:#F64E60 !important");
                    $("#submit_btn").attr("disabled", true);

                } else {
                    $("#passwordtextDis").text("Password match");

                    $("#passwordtextDis").attr("style", "color:#1BC5BD !important");
                    $("#submit_btn").attr("disabled", false);
                }

            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $("#changePasswordForm").on('submit', async function(e) {

                // alert('here')
                e.preventDefault();
                const serializedData = $("#changePasswordForm").serializeArray();
                $('#loaderPass').show()
                console.log(serializedData)
                try {

                    const postRequest = await request("{{ route('changePassword') }}",
                        processFormInputs(
                            serializedData), 'post');
                    console.log('postRequest.message', postRequest.message);
                    new swal("Good Job", postRequest.message + ', Please login with your new password',
                        "success");
                    $('#changePasswordForm').trigger("reset");
                    $('#loaderPass').hide()
                    $("#modal-changePassword .btn-close").click();
                    window.location.replace('/logout');
                } catch (e) {
                    if ('message' in e) {
                        console.log('e.message', e.message);
                        $('#loaderPass').hide()
                        new swal("Opss", e.message, "error");

                    }
                }
            })
        });
    </script>


	@yield('scripts')
</body>

</html>
