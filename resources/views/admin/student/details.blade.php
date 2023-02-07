@extends('layouts.adminmaster')


@section('content')
    <style>
        .table>thead>tr>td,
        .table>thead>tr>th {
            padding: 0.5rem;

        }

        .table>tbody>tr>td,
        .table>tbody>tr>th {
            padding: 0.5rem;
            vertical-align: middle;
        }
    </style>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title">Configuration</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Students</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row float-end">
                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-center">

                </button> --}}
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="box">
                    <div class="user-bg"> <img width="100%" alt="user"
                            src="{{ asset('adminassets/images/avatar/avatar-13.png') }}"> </div>
                    <div class="box-body">
                        <div class="row text-center mt-10">
                            <div class="col-md-6 border-end">
                                <strong>Name</strong>
                                <p>{{ $student->surname . ' ' . $student->firstname . ' ' . $student->middlename }}</p>
                            </div>
                            <div class="col-md-6"><strong>Programme</strong>
                                <p>{{ $application->programme->description?? '' }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center mt-10" title="{{ $student->email }}">
                            <div class="col-md-6 border-end"><strong>Email</strong>
                                <p>{{ substr($student->email,0,9) }}</p>
                            </div>
                            <div class="col-md-6" title="{{ $student->phone_number }}"><strong>Phone</strong>
                                <p>{{ $student->phone_number }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center mt-10">
                            <div class="col-md-12"><strong>Field of Study</strong>
                                <p>{{ $application->Course->description }}
                                </p>
                            </div>
                        </div>
                        <hr>

                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="box">
                    <div class="box-body">
                        <form class="form">
                            <div class="box-body">
                                <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> Student Info</h4>
                                <br>
                                <br>
                                <!-- Nav tabs -->
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    <li class="nav-item waves-effect waves-light"><a class="nav-link active"
                                            data-toggle="tab" href="#home-1" role="tab"><span
                                                class="d-md-block">Bio-data </span><span class="d-block"><i
                                                    class="mdi mdi-home-variant h5"></i></span></a></li>
                                    <li class="nav-item waves-effect waves-light"><a class="nav-link" data-toggle="tab"
                                            href="#profile-1" role="tab"><span class="d-md-block">Result</span><span
                                                class="d-block"><i class="mdi mdi-account h5"></i></span></a></li>
                                    <li class="nav-item waves-effect waves-light"><a class="nav-link" data-toggle="tab"
                                            href="#messages-1" role="tab"><span class="d-md-block">PPA</span><span
                                                class="d-block"><i class="mdi mdi-email h5"></i></span></a></li>
                                    <li class="nav-item waves-effect waves-light"><a class="nav-link" data-toggle="tab"
                                            href="#settings-1" role="tab"><span class="d-md-block">Referee</span><span
                                                class="d-block"><i class="mdi mdi-settings h5"></i></span></a></li>
                                </ul>
                                <hr>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active p-3" id="home-1" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Surname</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $student->surname }}" name="surname">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $student->firstname }}" name="firstname">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Middle Name</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $student->middlename }}" name="middlename">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Sex</label>
                                                    <select type="text" class="form-select" name="sex">

                                                        <option value="">Select gender</option>
                                                        <option value="M" {{ $student->sex == 'M' ? 'selected' : ' ' }}>
                                                            Male</option>
                                                        <option value="F" {{ $student->sex == 'F' ? 'selected' : ' ' }}>
                                                            Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Marital Status</label>
                                                    <select type="text" class="form-select" name="marital_status">

                                                        <option value="">Select marital status</option>
                                                        <option
                                                            value="Married"{{ $student->marital_status == 'Married' ? 'selected' : ' ' }}>
                                                            Married</option>
                                                        <option value="Single"
                                                            {{ $student->marital_status == 'Single' ? 'selected' : ' ' }}>
                                                            Single</option>
                                                        <option value="Widow"
                                                            {{ $student->marital_status == 'Widow' ? 'selected' : ' ' }}>Widow
                                                        </option>
                                                        <option value="Divorce"
                                                            {{ $student->marital_status == 'Divorce' ? 'selected' : ' ' }}>
                                                            Divorce</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Phone Number 1</label>
                                                    <input type="text" class="form-control" minlength="11"
                                                        maxlength="11" value="{{ $student->phone_number }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Email 1</label>
                                                    <input type="email" class="form-control"
                                                        value="{{ $student->email }}">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Phone Number 2</label>
                                                    <input type="text" class="form-control" minlength="11"
                                                        name="alt_phone_number" maxlength="11"
                                                        value="{{ $student->alt_phone_number }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Alternative Email</label>
                                                    <input type="email" class="form-control" name="alt_email"
                                                        value="{{ $student->alt_email }}">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Date of birth</label>
                                                    <input type="date" class="form-control" name="dob"
                                                        value="{{ $student->dob }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Religion</label>
                                                    <select class="form-select" name="religion">
                                                        <option value="">select religion</option>
                                                        <option value="Islam"
                                                            {{ $student->religion == 'Islam' ? 'selected' : ' ' }}>Islam
                                                        </option>
                                                        <option value="Christianity"
                                                            {{ $student->religion == 'Christianity' ? 'selected' : ' ' }}>
                                                            Christianity</option>
                                                        <option value="Traditional"
                                                            {{ $student->religion == 'Traditional' ? 'selected' : ' ' }}>
                                                            Traditional</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="country">Nationality</label>
                                                    <select class="form-select" name="nationality" id="mycountry"
                                                        aria-label="Default select country">
                                                        <option value="">Choose Country</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}"
                                                                {{ $student->nationality == $country->id ? 'selected' : '' }}>
                                                                {{ $country->name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6" id="hidden-div"
                                                @if ($student->country != 156) style="display:none" @endif>
                                                <div class="form-group">
                                                    <label for="state">State</label>
                                                    <select class="form-select select2-container--below state"
                                                        name="state_id" id="mystate" aria-label="Default select ">
                                                        <option value="">Choose State</option>
                                                        @foreach ($states as $state)
                                                            <option value="{{ $state->id_no }}"
                                                                {{ $state->id_no == ($student->studentHome()->state_of_origin ?? ' ') ? 'selected' : '' }}>
                                                                {{ $state->state }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="hidden-govt"
                                                @if ($student->country != 156) style="display:none" @endif>
                                                <div class="form-group">
                                                    <label for="lga">LGA</label>
                                                    <select class="form-select select2-container--below lgaa"
                                                        name="lga_id" aria-label="Default select example">
                                                        <option value="">Choose LGA</option>
                                                        @foreach ($lgas->where('state_id', $student->state_id) as $lga)
                                                            <option value="{{ $lga->id_no }}"
                                                                {{ $lga->id_no == ($student->studentHome()->lga_id ?? ' ') ? 'selected' : '' }}>
                                                                {{ $lga->local_govt }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <br>
                                        <h4 class="box-title text-info mb-2"><i class="ti-house me-15"></i> Home Address
                                        </h4>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="country">Country</label>
                                                    <select class="form-select" name="country" id="mycountry"
                                                        aria-label="Default select country">
                                                        <option value="">Choose Country</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}"
                                                                {{ ($student->studentHome()->country_id ?? ' ') == $country->id ? 'selected' : '' }}>
                                                                {{ $country->name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6" id="hidden-div"
                                                @if ($student->country != 156) style="display:none" @endif>
                                                <div class="form-group">
                                                    <label for="state">State</label>
                                                    <select class="form-select select2-container--below state"
                                                        name="state_id" id="mystate" aria-label="Default select ">
                                                        <option value="">Choose State</option>
                                                        @foreach ($states as $state)
                                                            <option value="{{ $state->id_no }}"
                                                                {{ $state->id_no == ($student->studentHome()->state ?? ' ') ? 'selected' : '' }}>
                                                                {{ $state->state }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Town</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $student->studentHome()->town ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Street</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $student->studentHome()->street ?? '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <br>
                                        <h4 class="box-title text-info mb-2"><i class="ti-house me-15"></i> Contact
                                            Address
                                        </h4>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">POBox/PMB/Postal Code</label>
                                                    <input type="text" class="form-control" value="{{ $student->studentContact()->pobox?? ' ' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="country">Country</label>
                                                    <select class="form-select" name="country" id="mycountry"
                                                        aria-label="Default select country">
                                                        <option value="">Choose Country</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}"
                                                                {{ ($student->studentContact()->country_id ?? ' ') == $country->id ? 'selected' : '' }}>
                                                                {{ $country->name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">City</label>
                                                    <input type="text" class="form-control" name="s_contact_city"
                                                        value="{{ $student->studentContact()->city ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">c/o</label>
                                                    <input type="text" class="form-control" name="s_c_o"
                                                        value="{{ $student->studentContact()->c_o ?? ' ' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <br>
                                        <h4 class="box-title text-info mb-2"><i class="ti-house me-15"></i> COURSE/DEGREE
                                            IN
                                            VIEW</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Department</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $student->studentCourse()->department->name ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Degree /Programmme</label>
                                                    <select class="form-select" name="programme">
                                                        <option value="">Choose Country</option>
                                                        @foreach ($programmes as $program)
                                                            <option value="{{ $program->id }}"
                                                                {{ ($student->studentCourse()->prog_id ?? '') == $program->id ? 'selected' : '' }}>
                                                                {{ $country->description }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Field of Interest</label>
                                                    <select class="form-select" name="field">
                                                        <option value="">Choose field of interest</option>
                                                        @foreach ($courses as $course)
                                                            <option value="{{ $course->id }}"
                                                                {{ ($student->studentCourse()->course_id ?? '') == $course->id ? 'selected' : '' }}>
                                                                {{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Mode of Study</label>
                                                    <select class="form-select" name="mode">
                                                        <option value="">Choose mode of study</option>
                                                        <option value="pt"
                                                            {{ ($student->studentCourse()->mode_of_study ?? '') == 'pt' ? 'selected' : '' }}>
                                                            Part Time</option>
                                                        <option value="ft"
                                                            {{ ($student->studentCourse()->mode_of_study ?? '') == 'ft' ? 'selected' : '' }}>
                                                            Full Time</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        {{-- <a href="{{ route('admin_student_home') }}" class="btn btn-warning me-1">
                                            <i class="ti-times"></i> Close
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="ti-save-alt"></i> Save
                                        </button> --}}

                                    </div>

                                    <div class="tab-pane p-3" id="profile-1" role="tabpanel">
                                        <h4 class="box-title text-info mb-2"><i class="ti-house me-15"></i> O'Level</h4>

                                        @foreach ($studentOlevels as $exams)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Exam Type</label>
                                                        <select class="form-select">
                                                            <option value="">select Exam type</option>
                                                            <option value="WAEC"
                                                                {{ $exams[0]->exam_type == 'WAEC' ? 'selected' : '' }}>WAEC
                                                            </option>
                                                            <option value="NECO"
                                                                {{ $exams[0]->exam_type == 'NECO' ? 'selected' : '' }}>NECO
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Reg Number</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $exam[0]->exam_type }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <h4>Exam</h4>
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>SN</th>

                                                        <th>Subject</th>
                                                        <th>Grade</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($exams as $exam)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $exam->subject }}</td>
                                                            <td>{{ $exam->grade }}</td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
                                        @endforeach

                                        <h4>Other Certificates</h4>

                                        <h5>First Degree</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">School/Institution name</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Institution name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Reg. Number/Matric Number</label>
                                                    <input type="email" class="form-control" placeholder="Email 1">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Country</label>
                                                    <select class="form-select" name="country" id="mycountry"
                                                        aria-label="Default select country">
                                                        <option value="">Choose Country</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}"
                                                                {{ $student->country == $country->id ? 'selected' : '' }}>
                                                                {{ $country->name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Town</label>
                                                    <input type="email" class="form-control" placeholder="Town">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Year</label>
                                                    <input type="number" min="1970" max="{{ date('Y') }}"
                                                        class="form-control" placeholder="Year">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Date Obtained</label>
                                                    <input type="date" class="form-control"
                                                        placeholder="Date Obtained">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Major Subject</label>
                                                    <input type="date" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Class of Degree</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Class of Degree">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Certificate</label>
                                                    <a href="" class="btn btn-info">View Certificate</a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">CGPA Scale</label>
                                                    <select class="form-select">
                                                        <option value="">Select CGPA Scale</option>
                                                        <option value="5">5</option>
                                                        <option value="4">4</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">CGPA</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>


                                        </div>

                                        <h5>Second (2nd) Degree (PhD Applicants)</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">School/Institution name</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Institution name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Reg. Number/Matric Number</label>
                                                    <input type="email" class="form-control" placeholder="Reg Number">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Country</label>
                                                    <select class="form-select" name="country" id="mycountry"
                                                        aria-label="Default select country">
                                                        <option value="">Choose Country</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}"
                                                                {{ $student->country == $country->id ? 'selected' : '' }}>
                                                                {{ $country->name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Town</label>
                                                    <input type="email" class="form-control" placeholder="Town">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Year</label>
                                                    <input type="number" min="1970" max="{{ date('Y') }}"
                                                        class="form-control" placeholder="Year">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Date Obtained</label>
                                                    <input type="date" class="form-control"
                                                        placeholder="Date Obtained">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Major Subject</label>
                                                    <input type="date" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Class of Degree</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Class of Degree">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Certificate</label>
                                                    <a href="" class="btn btn-info">View Certificate</a>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Weight Average</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>


                                        </div>
                                        {{--
                                        <table class="table table-striped table-review table-bordered dt-responsive nowrap"
                                            id="table_alterations_eva"
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>

                                                    <th>Subject</th>
                                                    <th>Mark</th>
                                                    <th>Grade</th>
                                                    <th style="width: 14px;"><button type="button"
                                                            class="btn-primary btn-add-row-eva"><i
                                                                class="fa fa-plus"></i></button></th>

                                                </tr>
                                            </thead>
                                            <tbody id="table_alterations_eva_tbody">
                                            </tbody>
                                        </table> --}}

                                    </div>
                                    <div class="tab-pane p-3" id="messages-1" role="tabpanel">
                                        <h4 class="box-title text-info mb-0 mt-20"><i class="ti-envelope me-15"></i>
                                            Publication</h4>
                                        <hr class="my-15">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>SN</th>
                                                        <th>Title</th>
                                                        <th class="text-center">
                                                            Date Published
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($publications as $pub)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $pub->title }}</td>
                                                            <td>{{ $pub->date_published }}</td>
                                                        </tr>
                                                    @endforeach


                                            </table>
                                        </div>
                                        <br>
                                        <h4 class="box-title text-info mb-0 mt-20"><i class="ti-envelope me-15"></i>
                                            Prizes</h4>
                                        <hr class="my-15">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>SN</th>
                                                        <th>Prize</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($prizes as $prize)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $prize->prize }}</td>
                                                            <td></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <br>
                                        <h4 class="box-title text-info mb-0 mt-20"><i class="ti-envelope me-15"></i>
                                            Appointment</h4>
                                        <hr class="my-15">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>SN</th>
                                                        <th>Employer</th>
                                                        <th>Post</th>
                                                        <th>Duration</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($appointments as $appoint)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $loop->employer }}</td>
                                                            <td>{{ $loop->post }}</td>
                                                            <td>{{ $loop->duration }}</td>


                                                        </tr>
                                                    @endforeach



                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane p-3" id="settings-1" role="tabpanel">
                                        <div class="table-responsive">
                                            <h4 class="box-title text-info mb-0 mt-20"><i class="ti-envelope me-15"></i>
                                                Referee
                                            </h4>
                                            <hr class="my-15">
                                            @foreach ($referee as $ref)
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Details</th>
                                                            <th class="text-center">

                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th class="text-nowrap" scope="row">Name</th>
                                                            <td>{{ $ref->name }}</td>

                                                        </tr>
                                                        <tr>
                                                            <th class="text-nowrap" scope="row">Post</th>
                                                            <td>{{ $ref->post }}</td>

                                                        </tr>
                                                        <tr>
                                                            <th class="text-nowrap" scope="row">Address</th>
                                                            <td>{{ $ref->address }}</td>

                                                        </tr>
                                                        <tr>
                                                            <th class="text-nowrap" scope="row">Email</th>
                                                            <td>{{ $ref->email }}</td>

                                                        </tr>
                                                        <tr>
                                                            <th class="text-nowrap" scope="row">Phone Number</th>
                                                            <td>{{ $ref->phone_number }}</td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <br>
                                                <h5>Response</h5>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Questions</th>
                                                            <th class="text-center">
                                                                Response
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($refereeresponse->where('refereeId',$ref->id) as  $response)
                                                        <tr>
                                                            <th class="text-nowrap" scope="row">{{ $response->question->description }}</th>

                                                            <td>{{ $response->comment }}</td>

                                                        </tr>

                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>



                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="button" class="btn btn-warning me-1">
                                    <i class="ti-cancel"></i> Cancel
                                </button>
                                <button type="button" class="btn btn-primary" id="approveRecord" data-id="{{ $student->id }}">
                                    <i class="ti-mark-alt"></i> Approve
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection



@section('scripts')
    <script src="{{ asset('adminassets/vendor_components/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('adminassets/src/js/pages/data-table.js') }}"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

                  /* When click delete button */
                  $('body').on('click', '#approveRecord', function() {
                var record_id = $(this).data('id');
                var user_name = $(this).data('username');
                var token = $("meta[name='csrf-token']").attr("content");
                var el = this;

                confirmApproval(el, record_id, user_name);
            });


            async function confirmApproval(el, record_id, user_name) {
                const willUpdate = await swal({
                    title: "Confirm Application Approval",
                    text: `Are you sure you want to approve ${user_name} for this programme?`,
                    icon: "warning",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                    buttons: ["Cancel", "Yes, Approve"]
                });
                if (willUpdate) {
                    //performReset()
                    performApproval(el, record_id);
                } else {
                    swal("No action will be performed :)");
                }
            }


            function performApproval(el, record_id) {
                //alert(record_id);
                try {
                    $.get('{{ route('approve_Application') }}?id=' + record_id,
                        function(data, status) {
                            console.log(status);
                            console.table(data);
                            if (status === "success") {
                                let alert = swal("Application approved successfully!.");
                                location.reload()
                            }
                        }
                    );
                } catch (e) {
                    let alert = swal(e.message);
                }
            }


            $("#mystate").on("change click", function(e) {
                $(".lgaa").empty()
                var id = $(this).val(); // $(this).data('id');
                //    alert(id);
                $.ajax({
                    url: '{{ route('get_state_lga') }}?id=' + id,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        var len = 0;
                        len = response['data'].length;
                        if (len > 0) {
                            for (var i = 0; i < len; i++) {
                                console.log(response);
                                var id = response['data'][i].id_no;
                                var descr = response['data'][i].local_govt;
                                var option = "<option value='" + id + "'>" + descr +
                                    "</option>";
                                $(".lgaa").append(option);
                            }
                        }
                    }
                });
            });
            $("#mycountry").on("change click", function(e) {

                var id = $(this).val(); // $(this).data('id');
                //    alert(id);
                if (id == 156) {

                    $('#hidden-div').show();
                    $('#hidden-govt').show();
                    // $('#main').show();
                } else {
                    $('#hidden-div').hide();
                    $('#hidden-govt').hide();
                    // $('#main').show();
                }
            });

            $(function() {
                $(document).on("click", '.btn-add-row-eva', function() {
                    $('#hidden-div').show();
                    var id = $(this).closest("table.table-review").attr(
                        'id'); // Id of particular table
                    console.log(id);
                    var div = $("<tr />");
                    //   console.log(div);
                    div.html(GetDynamicTextBoxEva(id));
                    $("#" + id + "_tbody").append(div);
                });

                $(document).on("click", "#comments_removeva", function() {
                    // $("#parentDiv").children("div").length
                    var matched = $("#table_alterations_eva_tbody tr");
                    var matcheds = $("#table_alterations_eva_tbody").children("tr").length;
                    // alert(matcheds)
                    var index = (matched.index());
                    if (matcheds == 1) {
                        $('#hidden-div').hide();
                    }
                    // alert(index)
                    $(this).closest("tr").prev().find('td:last-child').html(
                        '<button type="button" class="btn-danger" id="comments_removeva"><i class="fa fa-trash"></i></button>'
                    );
                    $(this).closest("tr").remove();

                });

                function makeid(length) {
                    var result = '';
                    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                    var charactersLength = characters.length;
                    for (var i = 0; i < length; i++) {
                        result += characters.charAt(Math.floor(Math.random() * charactersLength));
                    }
                    return result;
                }

                function GetDynamicTextBoxEva(table_id) {
                    // $('#comments_remove').remove();
                    const randomId = makeid(5);
                    var rowsLength = document.getElementById(table_id).getElementsByTagName("tbody")[0]
                        .getElementsByTagName("tr").length + 1;
                    return `


                        <td ><input style=" height:30px;" id="discount-${randomId} " required onchange="$(this).myFunction(event)"  type="text" name="tax_identification_id[]" class="form-control input " > <span class="form-text text-muted" id="tin_number_error_msg"></span></td>
                        <td ><input style="height:30px;" id="unit-${randomId}" type="datetime" required readonly name="name[]" class="form-control input taPayerName" value=""></td>
                      <td ><input style=" height:30px;" id="amoun-${randomId}" type="email" readonly required name="email[]" class="text-right form-control input taPayerEmail" value=""></td>
                      <td><button type="button" class="btn-danger" id="comments_removeva"><i class="ti ti-trash"></i></button>
                    </td> `
                }


            });

        });
    </script>
@endsection
