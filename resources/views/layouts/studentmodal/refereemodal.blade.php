<div class="modal fade modal-notification" id="standardModal" tabindex="-1" role="dialog"
    aria-labelledby="standardModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" id="standardModalLabel">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Add Refree</h5>
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
                    <form method="post" action="{{ route('create_regrefree') }}" class="tab-wizard wizard-circle"
                        id="createRefree" onsubmit="showloader2()">
                        @csrf
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="SurnameName5" class="form-label">Title :</label>
                                        <input type="text" name="title" class="form-control" id=""
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName5" class="form-label">Surname :</label>
                                        <input type="text" name="surname" class="form-control" id=""
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="SurnameName5" class="form-label">Firstname :</label>
                                        <input type="text" name="firstname" class="form-control" id=""
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="SurnameName5" class="form-label">Middlename :</label>
                                        <input type="text" name="middlename" class="form-control" id=""
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Address :</label>
                                        <input type="text" name="address" class="form-control" id=""
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Email :</label>
                                        <input type="text" name="email" class="form-control" id=""
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName5" class="form-label">Post :</label>
                                        <input type="text" name="post" class="form-control" id=""
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sex" class="form-label">Phone Number :</label>
                                        <input type="text" name="phone_number" class="form-control"
                                            id="" required>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="modal-footer" style="float: right">
                            <button class="btn btn-danger " data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                Close</button>
                            <button type="submit" class="btn btn-success">Save&nbsp;<span
                                    class="spinner-border loader spinner-border-sm" id="thisLoader2" role="status"
                                    aria-hidden="true" style="display:none"></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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
                    $("#createRefree").submit();
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
    function showloader2() {
        var loader = document.getElementById('thisLoader2');
        loader.style.display = "inline-block";
    }
</script>
