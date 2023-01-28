<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://crm-admin-dashboard-template.multipurposethemes.com/images/favicon.ico">

    <style>
    </style>
</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
    <div id="fadeupModal" class="modal animated fadeInUp custo-fadeInUp" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Publication</h5>
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
                    <form method="POST" action="{{ route('create_regpublication') }}" class="tab-wizard wizard-circle"
                        id="createCourse" onsubmit="showloader4()">
                        @csrf
                        <section>
                            <div class="row">
                                <div class="">
                                    <div class="form-group">
                                        <label for="SurnameName5" class="form-label">Title :</label>
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-group">
                                        <label for="firstName5" class="form-label">Date Published :</label>
                                        <input type="date" class="form-control" name="date_published" required>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="modal-footer" style="float: right">
                            <button class="btn btn-danger " data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                Close</button>
                            <button type="submit" class="btn btn-success">Save&nbsp;<span
                                    class="spinner-border loader spinner-border-sm" id="thisLoader4" role="status"
                                    aria-hidden="true" style="display:none"></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                    swal("Course will not be save  :)");
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
    function showloader4() {
        var loader = document.getElementById('thisLoader4');
        loader.style.display = "inline-block";
    }
</script>

</html>