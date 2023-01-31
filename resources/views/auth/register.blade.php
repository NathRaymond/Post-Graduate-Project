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
								<h2 class="text-primary">Get started with Us</h2>
								<p class="mb-0">Register as new student</p>							
							</div>
							<div class="p-40">
								<form id="studentRegistration" method="post">
                                    @csrf
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											<input type="text" name="first_name" required class="form-control ps-15 bg-transparent" placeholder="First Name">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											<input type="text" name="last_name" required class="form-control ps-15 bg-transparent" placeholder="Last Name">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
											<input type="email" name="email" required class="form-control ps-15 bg-transparent" placeholder="Email">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
                                            <select class="form-select" required name="programme" id="programme">
                                                <option value="">Select Programme</option>
                                                @foreach ($programmes as $program)
                                                <option value="{{$program->id}}">{{$program->description}}</option>
                                                @endforeach
                                            </select>
											{{-- <input type="email" class="form-control ps-15 bg-transparent" placeholder="Email"> --}}
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
                                            <select class="form-select" required name="type" id="type">
                                                <option value="">Select Type</option>
                                                @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->description}}</option>
                                                @endforeach
                                            </select>
											{{-- <input type="email" class="form-control ps-15 bg-transparent" placeholder="Email"> --}}
										</div>
									</div>
                                    <div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
											<input type="text" disabled name="amount" id="amount" class="form-control ps-15 bg-transparent" placeholder="Amount">
										</div>
									</div>
									  <div class="row">
										<div class="col-12">
										  <div class="checkbox">
											<input type="checkbox" id="basic_checkbox_1" >
											<label for="basic_checkbox_1">I agree to the <a href="#" class="text-warning"><b>Terms</b></a></label>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-12 text-center">
										  <button type="submit" class="btn btn-info margin-top-10">REGISTER</button>
										</div>
										<!-- /.col -->
									  </div>
								</form>				
								<div class="text-center">
									<p class="mt-15 mb-0">Already have an account?<a href="/logout" class="text-danger ms-5"> Register</a></p>
								</div>
							</div>
						</div>								

						<div class="text-center">
						  <p class="mt-20 text-white">- Register With -</p>
						  <p class="gap-items-2 mb-20">
							  <a class="btn btn-social-icon btn-round btn-facebook" href="#"><i class="fa fa-facebook"></i></a>
							  <a class="btn btn-social-icon btn-round btn-twitter" href="#"><i class="fa fa-twitter"></i></a>
							  <a class="btn btn-social-icon btn-round btn-instagram" href="#"><i class="fa fa-instagram"></i></a>
							</p>	
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

			$("#studentRegistration").on('submit', async function(e){
                e.preventDefault();
                const serializedData = $("#studentRegistration").serializeArray();
                preLoader.show();
                try {
                    const postRequest = await request("/temporary-registration", processFormInputs(serializedData), 'post');
                    console.log('postRequest.message', postRequest.message);
                    new swal("Good Job","Registration Successfully! Kindly visit designated banks to make payment.","success");
                    $('#studentRegistration').trigger("reset"); 
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

            $("#programme").on("change", function(e) {
                    
                var programme = $(this).val();//$(this).data('id');
                var type =$('#type').val();
                if(programme == "" || type == ""){
                    $("#amount").val("");
                }else{
                    $.get('{{ route('get_fee_by_type') }}?type=' + type + "&programme="+programme, function (data) {
                        if(data.status == 1){
							$("#amount").val(data.late_fee);
						}else{
							$("#amount").val(data.amount);
						}
                    })
                }
                
                
                  
            });

            $("#type").on("change", function(e) {
                    
                var type = $(this).val();//$(this).data('id');
                var programme =$('#programme').val();
                if(programme == "" || type == ""){
                    $("#amount").val("");
                }else{
                    $.get('{{ route('get_fee_by_type') }}?type=' + type + "&programme="+programme, function (data) {
                        if(data.status == 1){
							$("#amount").val(data.late_fee);
						}else{
							$("#amount").val(data.amount);
						}
                    })
                }
                  
            });
        });
        </script>
	
</body>

</html>
