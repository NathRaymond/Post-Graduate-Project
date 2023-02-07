<div id="fadeleftModal" class="modal animated fadeInLeft custo-fadeInLeft" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Certificate</h5>
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
                    <form method="post" action="{{ route('create_regcertificate') }}" id="createCourse"
                        class="tab-wizard wizard-circle" enctype="multipart/form-data" onsubmit="showloader7()">
                        @csrf
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="School" class="form-label">School :</label>
                                        <input type="text" class="form-control" name="school" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Matric Number :</label>
                                        <input type="text" class="form-control" name="matric_number" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="State" class="form-label">Country :</label>
                                        <select class="form-select" id="Country" name="country" required>
                                            <option>Select COuntry</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName5" class="form-label">Town :</label>
                                        <input type="text" class="form-control" name="town" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName5" class="form-label">Year :</label>
                                        <input type="text" class="form-control" name="year" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName5" class="form-label">Date Obtained:</label>
                                        <input type="date" class="form-control" name="date_obtained" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName5" class="form-label"> Class of Degree:</label>
                                        <input type="text" class="form-control" name="class_of_degree" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName5" class="form-label">Upload Certificate:</label>
                                        <input type="file" class="form-control" name="certificate" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName5" class="form-label">CGPA:</label>
                                        <input type="text" class="form-control" name="cgpa" required>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="modal-footer" style="float: right">
                            <div class="text-right">
                                <button class="btn btn-danger " data-dismiss="modal"><i
                                        class="flaticon-cancel-12"></i>
                                    Close</button>
                                <button type="submit" class="btn btn-success">Save &nbsp;<span
                                        class="spinner-border loader spinner-border-sm" id="thisLoader7"
                                        role="status" aria-hidden="true" style="display:none"></span></button>
                            </div>
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
                    swal("Certificate will not be save  :)");
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
    function showloader7() {
        var loader = document.getElementById('thisLoader7');
        loader.style.display = "inline-block";
    }
</script>
