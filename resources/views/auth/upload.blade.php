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
								<h2 class="text-primary">Upload Evidence Of Payment</h2>
								<p class="mb-0">You Will Be Emailed After Successfully Confirmation</p>							
							</div>
							<div class="p-40">
								<form id="fileUpload" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
											<input type="text" name="application_id" id="transaction" required class="form-control ps-15 bg-transparent" placeholder="Please enter transaction id">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											<input type="file" name="receipt" required id="files"  accept="application/pdf, image/*" class="form-control ps-15 bg-transparent" placeholder="">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											<textarea type="text" name="description" id="description"  class="form-control ps-15 bg-transparent" placeholder="Description related to transaction(Optional)"></textarea>
										</div>
									</div>
									  <div class="row">
										<!-- /.col -->
										<div class="col-12 text-center">
										  <button type="submit" class="btn btn-info margin-top-10">UPLOAD</button>
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

            $("#fileUpload").on('submit',async function(e) {
                e.preventDefault();
                preLoader.show();
                // Swal.fire('Assigning contract, please wait...')
                var file = $('#files')[0].files;
                var description = $("#description").val();
                var transaction = $("#transaction").val();
                var fd = new FormData;
                fd.append('application_id', transaction);
                fd.append('description', description);
                if(file !== undefined) {
                    fd.append('file', file[0]);
                }
                $.ajax({
                    type: 'POST',
                    url: "{{route('upload-receipt-file')}}",
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function($data) {
                        preLoader.hide();
                        new swal("Good Job","Upload Successfully! You will be reached via email when payment confirmation is completed.","success");
                        $('#fileUpload').trigger("reset");
                    },
                    error: function(data) {
                        console.log(data)
                        // new swal(data.responseJSON.message);
                        new swal("Opss",data.responseJSON.message,"error");
                        preLoader.hide();
                    }
                })
            });
        });
        </script>
	
</body>

</html>
