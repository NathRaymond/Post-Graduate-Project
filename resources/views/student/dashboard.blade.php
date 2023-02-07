@extends('layouts.studentmaster')
@section('contents')
    <div class="layout-px-spacing">

        <div class="page-header">
            <div class="page-title">
                <h3>Dashboard</h3>
            </div>
        </div>

        <div class="row layout-top-spacing">
            <marquee style="color: green">Welcome!!! {{ Auth::user()->name }}</marquee>
            <div class="">

                <!-- start page title -->

                <div class="row">
                    <div class="col-12">
                        <img src="{{ asset('profile_picture/banner.jpg') }}" alt="" width="100%">
                        <h4 style="margin-bottom: 30px; text-align: center;">Centre of Excellence in Agricultural
                            Development and Sustainable Environment</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18" style="color:green;"></h4>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-xl-4 col-md-4">
                        <div class="card card-animate">
                            <div class="card-body" style="text-align: center;">
                                <a href="{{ asset('student_uploaded_document') }}/{{ $applicant->profile_picture ?? '' }}"><img src="{{ asset('student_uploaded_document') }}/{{ $applicant->profile_picture ?? '' }}" alt=""
                                    style="width: 35%; height:130px; border: 1px solid grey; border-radius: 50%; margin: 10px;"></a>
                                <h3 class="my-3" style="color:green;">{{ Auth::user()->name }}</h3>
                                <h5>{{ $applicant->applicantRefNo ?? '' }}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-4">
                        <div class="col-xl-12 col-md-4">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="avatar-sm float-right">
                                        <span class="avatar-title bg-soft-primary rounded-circle">
                                            <i class="fa-solid fa-book" style="color: green;"></i>
                                        </span>
                                    </div>
                                    <p style="font-weight: Bold; color:green;">Course</p>
                                    <h5 class="my-3">{{ $stdcourses->cour->description ?? $stdcourses->course_id ?? ''}}</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-md-4">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="avatar-sm float-right">
                                        <span class="avatar-title bg-soft-primary rounded-circle">
                                            <i class="fa-solid fa-graduation-cap" style="color: green;"></i>
                                        </span>
                                    </div>
                                    <p style="font-weight: Bold; color:green;">Programme</p>
                                    <h5 class="my-3">{{ $stdcourses->prog->description ?? $stdcourses->prog_id ?? ''}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-4" style="margin-left: -15px;">
                        <div class="col-xl-12 col-md-4">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="avatar-sm float-right">
                                        <span class="avatar-title bg-soft-primary rounded-circle"
                                            style="background-color: green;">
                                            <i class="fa-solid fa-receipt" style="color: green;"></i>
                                        </span>
                                    </div>
                                    <p style="font-weight: Bold; color:green;">Department</p>
                                    <h5 class="my-3">{{ $stdcourses->descrip->name ?? $stdcourses->dept_id ?? ''}}</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-md-4">
                            <div class="card card-animate">
                                <div class="card-body" style="align-items: center; justify-contents:center;">
                                    <div class="avatar-sm float-right">
                                        <span class="avatar-title bg-soft-primary rounded-circle">

                                            <i class="fa-solid fa-calendar-days" style="color: green;"></i>
                                        </span>
                                    </div>
                                    <p style="font-weight: Bold; color:green;">Academic year</p>
                                    <h5 class="my-3">2022 / 23</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
