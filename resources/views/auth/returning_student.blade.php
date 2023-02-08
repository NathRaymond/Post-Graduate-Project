<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://crm-admin-dashboard-template.multipurposethemes.com/images/favicon.ico">

    <title>CEADESE - Registration </title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('adminassets/src/css/vendors_css.css')}}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('adminassets/src/css/style.css')}}">
	<link rel="stylesheet" href="{{ asset('adminassets/src/css/skin_color.css')}}">	
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<style>
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
		</style>
</head>

<body class="hold-transition theme-primary bg-img" style="background-image: url({{ asset('adminassets/images/auth-bg/bg-1.jpg')}})">
	<div class="preloader" style="display: none">
        <div class="spinner-grow text-info m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        {{-- <img src="spinner.svg" alt="spinner"> --}}
    </div>
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">
			
			<div class="col-12">
				<div class="row justify-content-center g-0">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="bg-white rounded10 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
								<h2 class="text-primary">Returning Student Verification</h2>
								<p class="mb-0">You Will Be Emailed After Successful Verification</p>							
							</div>
							<div class="p-40">
								<form id="verifyStudent" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
											<input type="text" name="application_id"  required class="form-control ps-15 bg-transparent" placeholder="Please enter matric number ">
										</div>
									</div>
									  <div class="row">
										<!-- /.col -->
										<div class="col-12 text-center">
										  <button type="submit" class="btn btn-info margin-top-10">VERIFY</button>
										</div>
										<!-- /.col -->
									  </div>
								</form>				
								<div class="text-center">
									<p class="mt-15 mb-0">Already have an account?<a href="/logout" class="text-danger ms-5"> Sign In</a></p>
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>			
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="{{ asset('adminassets/src/js/vendors.min.js')}}"></script>
	<script src="{{ asset('adminassets/src/js/pages/chat-popup.js')}}"></script>
    <script src="{{ asset('adminassets/icons/feather-icons/feather.min.js')}}"></script>	
	<script src="{{ asset('js/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js\request.js') }}"></script>
	<script src="{{ asset('js\form.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

			var preLoader = $(".preloader")

			$("#verifyStudent").on('submit', async function(e){
                e.preventDefault();
                const serializedData = $("#verifyStudent").serializeArray();
                preLoader.show();
                try {
                    const postRequest = await request("/verify-returning-student", processFormInputs(serializedData), 'post');
                    console.log('postRequest.message', postRequest.message);
                    new swal("Good Job","Vefification Successful! Check your email for credentials to access your portal.","success");
                    $('#verifyStudent').trigger("reset");
                    preLoader.hide();
                    // window.location.reload();
                } catch (e) {
                    if ('message' in e) {
                        // console.log('e.message', e.message);
                        new swal("Opss",e.message,"error");
                        preLoader.hide();
                    }
                }
            })
        });
        </script>
	
</body>

</html>
