<div id="fadeinModal" class="modal animated fadeInDown" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Prizes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
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
                        <div class="modal-footer" style="float: right">
                            <div class="text-right">
                                <button class="btn btn-danger " data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                    Close</button>
                                <button type="submit" class="btn btn-success">Save &nbsp;<span
                                        class="spinner-border loader spinner-border-sm" id="thisLoader5" role="status"
                                        aria-hidden="true" style="display:none"></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script src="{{ asset('js/sweetalert/dist/sweetalert.min.js') }}"></script> --}}

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
