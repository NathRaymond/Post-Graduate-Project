@include('layouts.studentmodal.olevelmodal')
@include('includes.js')
<div class="text-right">
    <button type="button" class="btn btn-success mb-2 mr-2" data-toggle="modal" data-target=".bd-example-modal-sm">Add
        O'level Result</button>
</div>
</p>
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title" style="color: green">Exam Type</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi
                                        mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">O'level Result(s)</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    @foreach ( $olevels as $olevel )
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 border-end"> <strong>Exam Type</strong>
                        <br>
                        <p class="text-muted">{{ $olevel->exam_type ?? ''}}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Subject</strong>
                        <br>
                        <p class="text-muted">{{ $olevel->sub->subject ?? $olevel->subject_id ?? ''}} - <text>{{
                                $olevel->grade }}</text></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 border-end"> <strong>Year</strong>
                        <br>
                        <p class="text-muted">{{ $olevel->year ?? ''}}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Registration number</strong>
                        <br>
                        <p class="text-muted">{{ $olevel->reg_number ?? ''}}</text></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
</div>