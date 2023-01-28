<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://crm-admin-dashboard-template.multipurposethemes.com/images/favicon.ico">
    {{--
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        --}}
    </script>
</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
    <div id="fadeinModal" class="modal animated fadeInDown" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Prizes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="box-body wizard-content">
                        <form method="post" action="{{ route('create_regprize') }}" id="createCourse"
                            class="tab-wizard wizard-circle" onsubmit="showloader5()">
                            @csrf
                            <section>
                                <div class="row">
                                    <div class="">
                                        <div class="form-group">
                                            <label for="firstName5" class="form-label">Prize :</label>
                                            <input type="text" class="form-control" name="description" required>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="modal-footer"  style="float: right">
                                <div class="text-right">
                                    <button class="btn btn-danger " data-dismiss="modal"><i
                                            class="flaticon-cancel-12"></i>
                                        Close</button>
                                    <button type="submit" class="btn btn-success">Save &nbsp;<span
                                            class="spinner-border loader spinner-border-sm" id="thisLoader5"
                                            role="status" aria-hidden="true" style="display:none"></span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#rowAdder").click(function () {
                newRowAdd =
                '<div id="row"> 
                    <div class="col-md-6">' +
                        '<div class="input-group-prepend">' +
                            '<button class="btn btn-danger" id="DeleteRow" type="button">' +
                                '<i class="bi bi-trash"></i> Delete
                            </button> 
                        </div>' +
                        '<label for="name" class="form-label">Name:</label>
                        '<input type="name" class="form-control">
                        '<label for="pst" class="form-label">Post:</label>
                        '<input type="pst" class="form-control">
                        '<label for="address" class="form-label">Address:</label>
                        '<input type="address" class="form-control">
                        '<label for="email" class="form-label">Email:</label>
                        '<input type="email" class="form-control">
                        '<label for="phone" class="form-label">Phone:</label>
                        '<input type="phone" class="form-control">
                    </div> 
                </div>';
    
                $('#newinput').append(newRowAdd);
            });
    
            $("body").on("click", "#DeleteRow", function () {
                $(this).parents("#row").remove();
            })
    </script>
</body>
<script src="{{ asset('js\requestController.js') }}"></script>
<script src="{{ asset('js\formController.js') }}"></script>
<script src="{{ asset('js/sweetalert/dist/sweetalert.min.js') }}"></script>

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
                    $("#createCourse").submit();
                } else {
                    swal("Prize will not be save  :)");
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
    function showloader5() {
        var loader = document.getElementById('thisLoader5');
        loader.style.display = "inline-block";
    }
</script>

</html>