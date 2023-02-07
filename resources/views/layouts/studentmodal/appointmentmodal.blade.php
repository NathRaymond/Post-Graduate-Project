
    <div class="modal fade" id="tabsModal" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tabsModalLabel">Add Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="box-body wizard-content">
                        <form method="POST" action="{{ route('create_regappointment') }}"
                            class="tab-wizard wizard-circle" id="createCourse" onsubmit="showloader3()">
                            @csrf
                            <section>
                                <div class="row">
                                    <div class="">
                                        <div class="form-group">
                                            <label class="form-label">Employer :</label>
                                            <input type="text" name="employer" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="form-group">
                                            <label for="firstName5" class="form-label">Post :</label>
                                            <input type="text" class="form-control" name="post" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <div class="form-group">
                                            <label for="middleName5" class="form-label">Duration :</label>
                                            <input type="text" class="form-control" name="duration" required>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="modal-footer" style="float: right">
                                <button class="btn btn-danger " data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                    Close</button>
                                <button type="submit" class="btn btn-success">Save &nbsp;<span
                                        class="spinner-border loader spinner-border-sm" id="thisLoader3" role="status"
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
    function showloader3() {
        var loader = document.getElementById('thisLoader3');
        loader.style.display = "inline-block";
    }
</script>

