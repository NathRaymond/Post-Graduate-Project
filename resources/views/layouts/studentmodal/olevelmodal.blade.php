<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mySmallModalLabel">Add O'level Result</h5>
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
                    <form method="post" action="{{ route('create_regolevel') }}" id="createCourse"
                        class="tab-wizard wizard-circle" onsubmit="showloader()">
                        @csrf
                        <section>
                            <div class="row">
                                <div class="">
                                    <div class="form-group">
                                        <label for="SurnameName5" class="form-label">Exam :</label>
                                        <select class="form-select" name="exam_type" required>
                                            <option value="" disabled selected>Select O'level</option>
                                            <option value="Waec">SSCE</option>
                                            <option value="Waec">Waec</option>
                                            <option value="Neco">Neco</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName5" class="form-label">Registration Number :</label>
                                        <input type="text" class="form-control" name="reg_number" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName5" class="form-label">Year :</label>
                                        <input type="text" class="form-control" name="year" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select class="form-select" id="Grade" name="subject[]" required>
                                            <option value="" selected disabled>Select Subject</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input type="text" name="" required class="form-control" placeholder="code"> --}}
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" name="grade[]" required class="form-control"
                                            placeholder="grade">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 mt-3">
                                        <button type="button" class="btn btn-success btn-add-row btn-add-rows">Add
                                            More</button>
                                    </div>
                                </div>
                                <div id="myElementIDs">
                                </div>
                            </div>
                        </section>
                        <div class="modal-footer" style="float: right">
                            <div class="text-right">
                                <button class="btn btn-danger " data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                    Close</button>
                                <button type="submit" class="btn btn-success">Save &nbsp;<span
                                        class="spinner-border loader spinner-border-sm" id="thisLoader" role="status"
                                        aria-hidden="true" style="display:none"></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
