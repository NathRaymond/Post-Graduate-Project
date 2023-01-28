@include('layouts.studentmodal.coursemodal')
@include('includes.js')
<div class="text-right">
    <button type="button" class="btn btn-success mb-2 mr-2 add-btn" data-toggle="modal"
        data-target=".bd-example-modal-lg">Update Course/Degree</button>
</div>
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title" style="color: green">Course/Degree</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi
                                        mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Course/Degree Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="row">
                    {{-- <h3 style="color: green">Course/Degree Details</h3> --}}
                    <div class="col-md-6 border-end"> <strong>Department</strong>
                        <br>
                        <p class="text-muted">{{ $stdcourses->descrip->description ?? $stdcourses->dept_id ?? ''}}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <strong>Degree/Programme</strong>
                        <br>
                        <p class="text-muted">{{ $stdcourses->prog->description ?? $stdcourses->prog_id ?? ''}}
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 border-end">
                        <strong>Field of Interest</strong>
                        <br>
                        <p class="text-muted">{{ $stdcourses->cour->description ?? $stdcourses->course_id ?? ''}}
                        </p>
                    </div>
                    <div class="col-md-6"> <strong>Mode of Study</strong>
                        <br>
                        <p class="text-muted">{{ $stdcourses->mode_of_study ?? ''}}</p>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </section>
</div>