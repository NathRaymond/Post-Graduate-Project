@include('layouts.studentmodal.certificatemodal')
@include('includes.js')
<div class="text-right">
    <button type="button" class="btn btn-success mb-2 mr-2" data-toggle="modal" data-target="#fadeleftModal">Add
        Certificate</button>
</div>
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title" style="color: green">Certificate</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi
                                        mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Certificates</li>
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
                    <h3 style="color: green">Certificates Information</h3>
                    <div class="col-md-3 col-xs-6 border-end"> <strong>School</strong>
                        <br>
                        <p class="text-muted">{{ $certificates->school ?? '' }}</p>
                    </div>
                    <div class="col-md-3 col-xs-6 border-end">
                        <strong>Matric Number</strong>
                        <br>
                        <p class="text-muted">{{ $certificates->matric_number ?? ''}}</p>
                    </div>
                    <div class="col-md-3 col-xs-6 border-end">
                        <strong>Country</strong>
                        <br>
                        <p class="text-muted">{{ $certificates->studcount->name ?? $certificates->country ?? ''}}</p>
                    </div>
                    <div class="col-md-3 col-xs-6"> <strong>Town</strong>
                        <br>
                        <p class="text-muted">{{ $certificates->town ?? ''}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 col-xs-6 border-end">
                        <strong>Year</strong>
                        <br>
                        <p class="text-muted">{{ $certificates->year ?? ''}}</p>
                    </div>
                    <div class="col-md-3 col-xs-6 border-end">
                        <strong>Date Obtained</strong>
                        <br>
                        <p class="text-muted">{{ $certificates->date_obtained ?? ''}}</p>
                    </div>
                    <div class="col-md-3 col-xs-6 border-end"> <strong>Class of Degree</strong>
                        <br>
                        <p class="text-muted">{{ $certificates->class_of_degree ?? ''}}</p>
                    </div>
                    <div class="col-md-3 col-xs-6 border-end"> <strong>Certificate</strong>
                        <br>
                        <p class="text-muted">{{ $certificates->certificate ?? ''}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 col-xs-6 border-end">
                        <strong>CGPA</strong>
                        <br>
                        <p class="text-muted">{{ $certificates->cgpa ?? ''}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>