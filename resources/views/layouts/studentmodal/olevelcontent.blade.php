@include('layouts.studentmodal.olevelmodal')
<div class="text-right">
    <button type="button" class="btn btn-success mb-2 mr-2" data-toggle="modal" data-target=".bd-example-modal-sm">&plus; Add
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
                            <li class="breadcrumb-item"><a href="#"><i
                                        class="mdi
                                        mdi-home-outline"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">O'level Result(s)</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            @foreach ($olevels as $level)
                <div class="box-body">

                    <div class="row">
                        <div class="col-md-6 border-end"> <strong>Exam Type</strong>
                            <br>
                            <p class="text-muted">{{ $level->exam_type }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Subject</strong>
                            <br>
                            @foreach ($level->subject() as $subject)
                                <p class="text-muted">{{ $subject->sub->subject }} - {{ $subject->grade }}
                            @endforeach
                            {{-- <p class="text-muted">English - F --}}
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 border-end"> <strong>Year</strong>
                            <br>
                            <p class="text-muted">{{ $level->year }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Registration number</strong>
                            <br>
                            <p class="text-muted">{{ $level->reg_number }}</p>
                        </div>
                    </div>
                    <hr>
                </div>
                <hr style="border: 2px solid">
            @endforeach
        </div>
    </section>
</div>
