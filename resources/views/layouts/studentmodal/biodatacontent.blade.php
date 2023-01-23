@include('layouts.studentmodal.biodatamodal')

<div class="text-right">
    <button type="button" class="btn btn-success mb-2 mr-2" data-toggle="modal"
        data-target=".bd-example-modal-xl">Add Biodata</button>
</div>
</p>
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
                    <center><div class="user-bg"  style="padding: 0px 10px;">
                         <img width="70%" alt="user"
                            src="{{ asset('studentassets/assets/img/profile-32.jpg') }}">
                    </div></center>
                    <div class="box-body">
                        <div class="row text-center mt-10">
                            <div class="col-md-6 border-end">
                                <strong>Name</strong>
                                <p>Adebayo Nathaniel</p>
                            </div>
                            <div class="col-md-6"><strong>Degree/Programme</strong>
                                <p>PhD.AgSE</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center mt-10">
                            <div class="col-md-6 border-end"><strong>Email ID</strong>
                                <p>nath@gmail.com</p>
                            </div>
                            <div class="col-md-6"><strong>Phone</strong>
                                <p>08148009197</p>
                                <p>07032066789</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center mt-10">
                            <div class="col-md-12"><strong>Address</strong>
                                <p>No 2, Ganiyat Estate, Oke-ilewo
                                    <br> Abeokuta, Ogun State.
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
                        <div class="row">
                            <h3 style="color: green">Bio data</h3>
                            <div class="col-md-3 col-xs-6 border-end"> <strong>Full
                                    Name</strong>
                                <br>
                                <p class="text-muted">Adebayo Nathaniel Raymond</p>
                            </div>
                            <div class="col-md-3 col-xs-6 border-end">
                                <strong>Sex</strong>
                                <br>
                                <p class="text-muted">Male</p>
                            </div>
                            <div class="col-md-3 col-xs-6 border-end">
                                <strong>Marital Status</strong>
                                <br>
                                <p class="text-muted">Married</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Date of Birth</strong>
                                <br>
                                <p class="text-muted">01/02/1996</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-6 border-end">
                                <strong>Religion</strong>
                                <br>
                                <p class="text-muted">Christian</p>
                            </div>
                            <div class="col-md-3 col-xs-6 border-end">
                                <strong>Nationality</strong>
                                <br>
                                <p class="text-muted">Nigerian</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>State of Origin</strong>
                                <br>
                                <p class="text-muted">Kwara State</p>
                            </div>
                            <div class="col-md-3 col-xs-6 border-end"> <strong>Phone
                                    Number</strong>
                                <br>
                                <p class="text-muted">08148009197</p>
                                <p class="text-muted">07032066789</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-6 border-end">
                                <strong>Email</strong>
                                <br>
                                <p class="text-muted">nath@gmail.com</p>
                                <p class="text-muted">raymond@gmail.com</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <h3 style="color: green">CONTACT ADDRESS (Mailing Address)</h3>
                            <hr>
                            <div class="col-md-3 col-xs-6 border-end">
                                <strong>POBox/PMB/Postal Code</strong>
                                <br>
                                <p class="text-muted">PoBox 123980</p>
                            </div>
                            <div class="col-md-3 col-xs-6 border-end">
                                <strong>Country</strong>
                                <br>
                                <p class="text-muted">Nigeria</p>
                            </div>
                            <div class="col-md-3 col-xs-6 border-end">
                                <strong>State</strong>
                                <br>
                                <p class="text-muted">Kwara State</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>City</strong>
                                <br>
                                <p class="text-muted">Ilorin</p>
                            </div>
                            <hr>
                            <div class="col-md-3 col-xs-6 border-end">
                                <strong>C/O</strong>
                                <br>
                                <p class="text-muted">Null</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <h3 style="color: green">HOME ADDRESS (Mailing Address)</h3>
                            <hr>
                            <div class="col-md-3 col-xs-6 border-end">
                                <strong>Country</strong>
                                <br>
                                <p class="text-muted">Nigeria</p>
                            </div>
                            <div class="col-md-3 col-xs-6 border-end">
                                <strong>State</strong>
                                <br>
                                <p class="text-muted">Kwara</p>
                            </div>
                            <div class="col-md-3 col-xs-6 border-end">
                                <strong>Town</strong>
                                <br>
                                <p class="text-muted">Ilorin</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Street</strong>
                                <br>
                                <p class="text-muted">No 2, Elite Street</p>
                            </div>
                        </div>
                        <hr>
                        {{-- <h4 class="box-title my-20 fw-500 py-20 border-bottom d-block">
                            Education</h4>
                        <div class="d-flex no-block fa fa-check-circle text-success">
                            <h6 class="ms-10 text-dark">Primary education from XYZ
                                school</h6>
                        </div>
                        <div class="d-flex no-block fa fa-check-circle text-success">
                            <h6 class="ms-10 text-dark">SSC from ABC School</h6>
                        </div>
                        <div class="d-flex no-block fa fa-check-circle text-success">
                            <h6 class="ms-10 text-dark">HSC from ABC School</h6>
                        </div>

                        <h4 class="box-title my-20 fw-500 py-20 border-bottom d-block">
                            Certification</h4>
                        <div class="d-flex no-block fa fa-check-circle text-success">
                            <h6 class="ms-10 text-dark">Lorem ipsum dolor sit amet,
                                consectetur
                                adipiscing elit.</h6>
                        </div>
                        <div class="d-flex no-block fa fa-check-circle text-success">
                            <h6 class="ms-10 text-dark">Excepteur sint occaecat
                                cupidatat non
                                proident.</h6>
                        </div>
                        <div class="d-flex no-block fa fa-check-circle text-success">
                            <h6 class="ms-10 text-dark">Lorem ipsum dolor sit amet,
                                consectetur
                                adipiscing elit.</h6>
                        </div>
                        <div class="d-flex no-block fa fa-check-circle text-success">
                            <h6 class="ms-10 text-dark">Excepteur sint occaecat
                                cupidatat non
                                proident.</h6>
                        </div>
                        <div class="d-flex no-block fa fa-check-circle text-success">
                            <h6 class="ms-10 text-dark">Lorem ipsum dolor sit amet,
                                consectetur
                                adipiscing elit.</h6>
                        </div>
                        <div class="d-flex no-block fa fa-check-circle text-success">
                            <h6 class="ms-10 text-dark">Excepteur sint occaecat
                                cupidatat non
                                proident.</h6>
                        </div>

                        <h4 class="box-title my-20 fw-500 py-20 border-bottom d-block">
                            Subjects</h4>
                        <div class="d-flex no-block fa fa-check-circle text-success">
                            <h6 class="ms-10 text-dark">Lorem ipsum dolor sit amet,
                                consectetur
                                adipiscing elit.</h6>
                        </div>
                        <div class="d-flex no-block fa fa-check-circle text-success">
                            <h6 class="ms-10 text-dark">Excepteur sint occaecat
                                cupidatat non
                                proident.</h6>
                        </div>
                        <div class="d-flex no-block fa fa-check-circle text-success">
                            <h6 class="ms-10 text-dark">Lorem ipsum dolor sit amet,
                                consectetur
                                adipiscing elit.</h6>
                        </div>
                        <div class="d-flex no-block fa fa-check-circle text-success">
                            <h6 class="ms-10 text-dark">Excepteur sint occaecat
                                cupidatat non
                                proident.</h6>
                        </div>
                        <div class="d-flex no-block fa fa-check-circle text-success">
                            <h6 class="ms-10 text-dark">Lorem ipsum dolor sit amet,
                                consectetur
                                adipiscing elit.</h6>
                        </div>
                        <div class="d-flex no-block fa fa-check-circle text-success">
                            <h6 class="ms-10 text-dark">Excepteur sint occaecat
                                cupidatat non
                                proident.</h6>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>