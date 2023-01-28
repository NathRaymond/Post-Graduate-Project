<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://crm-admin-dashboard-template.multipurposethemes.com/images/favicon.ico">

</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        data-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Course/Degree Registration</h5>
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
                        <form method="POST" action="{{route('create_regStock')}}" id="createCourse"
                            onsubmit="showloader1()">
                            @csrf
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="SurnameName5" class="form-label">Department :</label>
                                            <select class="form-select" name="dept_id" required>
                                                <option selected disabled>Select Department</option>
                                                @foreach ($departments as $department )
                                                <option value="{{ $department->id }}" {{$stdcourses->dept_id
                                                    ==$department->id ? 'selected': ' '}}>{{$department->description}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstName5" class="form-label">Degree/Programme :</label>
                                            <select class="form-select" id="degree" name="prog_id" required>
                                                <option selected disabled>Select Degree/Programme</option>
                                                @foreach ($programmes as $programme )
                                                <option value="{{ $programme->id }}" {{$stdcourses->prog_id
                                                    ==$programme->id ? 'selected': ' '}}>{{$programme->description}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="middleName5" class="form-label">Field of Interest :</label>
                                            <select class="form-select" id="filed_of_interest" name="course_id"
                                                required>
                                                <option selected disabled>Select Field of Interest</option>
                                                @foreach ($courses as $course )
                                                <option value="{{ $course->id }}" {{$stdcourses->course_id
                                                    ==$course->id ? 'selected': ' '}}>{{$course->description}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sex" class="form-label">Mode of Study</label>
                                            <select class="form-select" id="Mode of Study" name="mode_of_study"
                                                required>
                                                <option value="{{ $stdcourses->mode_of_study }}">{{ $stdcourses->mode_of_study }}</option>
                                                {{--  <option selected disabled>Mode of Study</option>  --}}
                                                <option value="Full Time">Full Time</option>
                                                <option value="Part Time">Part Time</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="modal-footer" style="float: right">
                                <button class="btn btn-danger " data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                    Close</button>
                                <button type="submit" class="btn btn-success">Save&nbsp;<span
                                        class="spinner-border loader spinner-border-sm" id="thisLoader1" role="status"
                                        aria-hidden="true" style="display:none"></span></button>
                            </div>
                        </form>
                    </div>
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
    function showloader1() {
        var loader = document.getElementById('thisLoader1');
        loader.style.display = "inline-block";
    }
</script>

</html>