@extends('layouts.studentmaster')
@section('contents')
<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h3>Registration</h3>
        </div>
    </div>

    <div class="row layout-top-spacing">

        <div id="tabsSimple" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Student Registration</h4>
                        </div>
                    </div>
                    @include('includes.js')
                </div>
                @include('includes.js')
                <div class="widget-content widget-content-area simple-tab">
                    <ul class="nav nav-tabs  mb-3 mt-3" id="simpletab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Biodata</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="course-tab" data-toggle="tab" href="#course" role="tab"
                                aria-controls="course" aria-selected="false">Course/Degree</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="true" aria-expanded="false">Result/Certificate <svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-chevron-down">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">SSCE (O Level Results)</a>
                                <a class="dropdown-item" id="profile-tab2" data-toggle="tab" href="#profile2" role="tab"
                                    aria-controls="profile2" aria-selected="false">Other Certificate</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="prizes" data-toggle="tab" href="#contact" role="tab"
                                aria-controls="contact" aria-selected="false">Prizes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab"
                                aria-controls="profile2" aria-selected="false">Publication</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="appointment-tab" data-toggle="tab" href="#appointment" role="tab"
                                aria-controls="appointment" aria-selected="false">Appointment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="referee-tab" data-toggle="tab" href="#referee" role="tab"
                                aria-controls="referee" aria-selected="false">Referees</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="simpletabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <p class="mb-4">
                                @include('layouts.studentmodal.biodatacontent')
                            </p>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <p class="">
                                @include('layouts.studentmodal.olevelcontent')
                            </p>
                        </div>
                        <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                            <p class="">
                                @include('layouts.studentmodal.publicationcontent')
                            </p>
                        </div>
                        <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
                            <p class="">
                                @include('layouts.studentmodal.certificatecontent')
                            </p>
                        </div>
                        <div class="tab-pane fade" id="course" role="tabpanel" aria-labelledby="course-tab">
                            <p class="mb-4">
                                @include('layouts.studentmodal.coursecontent')
                            </p>
                        </div>
                        <div class="tab-pane fade" id="referee" role="tabpanel" aria-labelledby="referee-tab">
                            <p class="">
                                @include('layouts.studentmodal.refereecontent')
                            </p>
                        </div>
                        <div class="tab-pane fade" id="appointment" role="tabpanel" aria-labelledby="appointment-tab">
                            @include('layouts.studentmodal.appointmentcontent')
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="prizes">
                            @include('layouts.studentmodal.prizecontent')
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <p class="">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection