@include('layouts.studentmodal.appointmentmodal')
<div class="text-right">
    <button type="button" class="btn btn-success mb-2 mr-2" data-toggle="modal" data-target="#tabsModal">
        &plus; Add Appointment
    </button>
</div>
</p>
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title" style="color: green">Appointment</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi
                                        mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page" style="color: green">Appointment
                                Informations</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="">
                <div class="box">
                    <div class="box-body">
                        @foreach ($appointments as $appointment)
                        <div class="row">
                            {{-- <h3 style="color: green">Course/Degree Details</h3> --}}
                            <div class="col-md-6 border-end"> <strong>Employer</strong>
                                <br>
                                <p class="text-muted">{{ $appointment->employer }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Post</strong>
                                <br>
                                <p class="text-muted">{{ $appointment->post }}</p>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 border-end">
                                <strong>Duration</strong>
                                <br>
                                <p class="text-muted">{{ $appointment->duration }}</p>
                            </div>
                        </div>
                        <hr style="border:solid 2px;">
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
