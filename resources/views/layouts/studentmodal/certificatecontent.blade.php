@include('layouts.studentmodal.certificatemodal')
<div class="text-right">
    <button type="button" class="btn btn-success mb-2 mr-2" data-toggle="modal" data-target="#fadeleftModal">&plus; Add
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
                            <li class="breadcrumb-item"><a href="#"><i
                                        class="mdi
                                        mdi-home-outline"></i></a>
                            </li>
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
                <h3 style="color: green">My Certificates</h3>
                <hr>
                @foreach ($certificates as $certificate)
                <div class="row">
                    <div class="col-md-3 col-xs-6 border-end"> <strong>School</strong>
                        <br>
                        <p class="text-muted">{{ $certificate->school ?? '' }}</p>
                    </div>
                    <div class="col-md-3 col-xs-6 border-end">
                        <strong>Matric Number</strong>
                        <br>
                        <p class="text-muted">{{ $certificate->matric_number ?? '' }}</p>
                    </div>
                    <div class="col-md-3 col-xs-6 border-end">
                        <strong>Country</strong>
                        <br>
                        <p class="text-muted">{{ $certificate->studcount->name ?? ($certificate->country ?? '') }}</p>
                    </div>
                    <div class="col-md-3 col-xs-6"> <strong>Town</strong>
                        <br>
                        <p class="text-muted">{{ $certificate->town ?? '' }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 col-xs-6 border-end">
                        <strong>Year</strong>
                        <br>
                        <p class="text-muted">{{ $certificate->year ?? '' }}</p>
                    </div>
                    <div class="col-md-3 col-xs-6 border-end">
                        <strong>Date Obtained</strong>
                        <br>
                        <p class="text-muted">{{ $certificate->date_obtained ?? '' }}</p>
                    </div>
                    <div class="col-md-3 col-xs-6 border-end"> <strong>Class of Degree</strong>
                        <br>
                        <p class="text-muted">{{ $certificate->class_of_degree ?? '' }}</p>
                    </div>
                    <div class="col-md-3 col-xs-6 border-end"> <strong>Certificate</strong>
                        <br>
                        <p class="text-muted"><a
                                href="{{ asset('student_uploaded_document') }}/{{ $certificate->certificate ?? '' }}"
                                target="_blank" style="color:red">View Certificate</a></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 col-xs-6 border-end">
                        <strong>CGPA</strong>
                        <br>
                        <p class="text-muted">{{ $certificate->cgpa ?? '' }}</p>
                    </div>
                </div>
                <hr style="border: solid 2px">
                @endforeach
            </div>
        </div>
    </section>
</div>
