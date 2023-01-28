@include('layouts.studentmodal.biodatamodal')
@include('includes.js')
<div class="text-right">
    <button type="button" class="btn btn-success mb-2 mr-2" data-toggle="modal" data-target=".bd-example-modal-xl"
        id="edit-student" data-id="{{$biodatas->id ?? ''}}">Update Biodata</button>
</div>
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title">Student Bio data</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi
                                        mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Student
                                Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="box">
                    <center>
                        <div class="user-bg" style="padding: 10px 10px;">
                            <img width="70%" alt="user" src="{{ asset('studentassets/assets/img/avatar.png') }}">
                        </div>
                    </center>
                    <div class="box-body">
                        <div class="row text-center mt-10">
                            <div class="col-md-6 border-end">
                                <strong>Name</strong>
                                <p>{{ $biodatas->surname ?? ''}} {{ $biodatas->firstname ?? ''}} {{ $biodatas->middlename ?? ''}}</p>
                            </div>
                            <div class="col-md-6"><strong>Degree/Programme</strong>
                                <p> {{ $stdcourses->dProgramme->description ?? $stdcourses->prog_id ?? ''}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center mt-10">
                            <div class="col-md-6 border-end"><strong>Email</strong>
                                <p>{{ $biodatas->email ?? ''}}</p>
                            </div>
                            <div class="col-md-6"><strong>Phone</strong>
                                <p>{{ $biodatas->phone_number ?? ''}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center mt-10">
                            <div class="col-md-12"><strong>Address</strong>
                                <p>{{ $homeaddress->hom_state}} {{ $homeaddress->hom_street}} {{ $homeaddress->hom_town}} </p>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <h3 style="color: green">Bio data</h3>
                            <div class="col-md-3 col-xs-6 border-end"> <strong>Full
                                    Name</strong>
                                <br>
                                <p class="text-muted">{{ $biodatas->surname ?? ''}} {{ $biodatas->firstname ?? ''}} {{ $biodatas->middlename ?? ''}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 border-end">
                                <strong>Sex</strong>
                                <br>
                                <p class="text-muted">{{ $biodatas->sex ?? ''}} </p>
                            </div>
                            <div class="col-md-3 col-xs-6 border-end">
                                <strong>Marital Status</strong>
                                <br>
                                <p class="text-muted"> {{ $biodatas->marital_status ?? ''}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Date of Birth</strong>
                                <br>
                                <p class="text-muted">{{ $biodatas->dob ?? ''}} </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-6 border-end">
                                <strong>Religion</strong>
                                <br>
                                <p class="text-muted"> {{ $biodatas->religion ?? ''}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 border-end">
                                <strong>Nationality</strong>
                                <br>
                                <p class="text-muted"> {{ $biodatas->nationality ?? ''}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>State of Origin</strong>
                                <br>
                                <p class="text-muted"> {{ $biodatas->state_of_origin ?? ''}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 border-end"> <strong>Phone
                                    Number</strong>
                                <br>
                                <p class="text-muted">{{ $biodatas->phone_number ?? ''}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-6 border-end">
                                <strong>Email</strong>
                                <br>
                                <p class="text-muted">{{ $biodatas->email ?? ''}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <h3 style="color: green">CONTACT ADDRESS (Mailing Address)</h3>
                            <hr>
                            <div class="col-md-3 col-xs-6 border-end">
                                <strong>POBox/PMB/Postal Code</strong>
                                <br>
                                <p class="text-muted"> </p>
                            </div>
                            <div class="col-md-3 col-xs-6 border-end">
                                <strong>Country</strong>
                                <br>
                                <p class="text-muted">{{ $studcontacts->Scount->name ??  $studcontacts->cont_country_id ?? ''}} </p>
                            </div>
                            <div class="col-md-3 col-xs-6 border-end">
                                <strong>State</strong>
                                <br>
                                <p class="text-muted">{{ $studcontacts->cont_state ?? ''}} </p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>City</strong>
                                <br>
                                <p class="text-muted"> {{ $studcontacts->cont_city ?? ''}}</p>
                            </div>
                            <hr>
                            <div class="col-md-3 col-xs-6 border-end">
                                <strong>C/O</strong>
                                <br>
                                <p class="text-muted"> {{ $studcontacts->cont_c_o ?? ''}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <h3 style="color: green">HOME ADDRESS (Mailing Address)</h3>
                            <hr>
                            <div class="col-md-3 col-xs-6 border-end">
                                <strong>Country</strong>
                                <br>
                                <p class="text-muted">{{ $homeaddress->Hcount->name ?? $homeaddress->hom_country_id ?? ''}} </p>
                            </div>
                            <div class="col-md-3 col-xs-6 border-end">
                                <strong>State</strong>
                                <br>
                                <p class="text-muted"> {{ $homeaddress->state ?? $homeaddress->hom_state ?? ''}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 border-end">
                                <strong>Town</strong>
                                <br>
                                <p class="text-muted"> {{ $homeaddress->hom_town ?? ''}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Street</strong>
                                <br>
                                <p class="text-muted"> {{ $homeaddress->hom_street ?? ''}}</p>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>