<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://crm-admin-dashboard-template.multipurposethemes.com/images/favicon.ico">

    <title>CRMi - Dashboard Form Wizard </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('modalasset/src/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('modalasset/src/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('modalasset/src/css/skin_color.css') }}">
    <style>
        .wizard-content .wizard>.steps>ul>li {
            display: inline-block;
            width: auto;
            text-align: center;
            position: relative;
            padding: 0.5rem 2.5rem;
            border-radius: 5px;
            margin: 0 10px;
            background-color: green;
            border: 2px solid green;
        }

        .wizard-content .wizard>.actions>ul>li>a[href="#previous"] {
            background-color: green;
            color: white;
            border: 1px solid #f3f6f9;
        }

        .wizard-content .wizard>.actions>ul>li>a {
            color: white;
            background-color: green;
            display: block;
            padding: 7px 12px;
            border-radius: 5px;
            border: 1px solid transparent;
        }
    </style>
</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" data-backdrop="static"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myExtraLargeModalLabel">Student Registration</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body wizard-content">
                        <form action="#" class="tab-wizard wizard-circle">
                            <!-- Step 1 -->
                            <h6>Bio Data</h6>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="SurnameName5" class="form-label">Surname Name :</label>
                                            <input type="text" class="form-control" name="" id="SurnameName5">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstName5" class="form-label">First Name :</label>
                                            <input type="text" class="form-control" id="firstName5">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="middleName5" class="form-label">Middle Name :</label>
                                            <input type="text" class="form-control" id="middleName5">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sex" class="form-label">Sex:</label>
                                            <select class="form-select" id="sex" name="sex">
                                                <option value="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="emailAddress1" class="form-label">Marital Status :</label>
                                            <select class="form-select" id="marital_status" name="marital_status">
                                                <option value="">Select Marital Status</option>
                                                <option value="single">Single</option>
                                                <option value="married">Married</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date1" class="form-label">Date of Birth :</label>
                                            <input type="date" class="form-control" id="date1">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="addressline1" class="form-label">Religion :</label>
                                            <select class="form-select" id="location3" name="location">
                                                <option value="">Select Religion</option>
                                                <option value="Christian">Christian</option>
                                                <option value="Muslim">Muslim</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="addressline2" class="form-label">Nationality :</label>
                                            <select class="form-select" id="location3" name="nationality">
                                                <option value="">Select Nationality</option>
                                                <option value="Amsterdam">Nigeria</option>
                                                <option value="Berlin">USA</option>
                                                <option value="Frankfurt">Dubai</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location3" class="form-label">State of Origin :</label>
                                            <select class="form-select" id="location3" name="location">
                                                <option value="">State of Origin</option>
                                                <option value="Amsterdam">Kwara</option>
                                                <option value="Berlin">Lagos</option>
                                                <option value="Frankfurt">Ogun State</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date1" class="form-label">Phone Number :</label>
                                            <input type="phone" class="form-control" maxlength="11" id="phone_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date1" class="form-label">Other Phone Number :</label>
                                            <input type="phone" class="form-control" maxlength="11"
                                                id="otherphone_number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date1" class="form-label">Email :</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="alternativeemail" class="form-label">Alternative Email :</label>
                                            <input type="aemail" class="form-control" id="email">
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Step 2. -->
                            <h6>Contact Address</h6>
                            <section>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="url123" class="form-label">POBox/PMB/Postal Code :</label>
                                            <input type="text" class="form-control" id="url123" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="username123" class="form-label">Country :</label>
                                            <select class="form-select" id="Location1" name="country">
                                                <option value="">Select COuntry</option>
                                                <option value="India">India</option>
                                                <option value="USA">USA</option>
                                                <option value="Dubai">Dubai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="password123" class="form-label">State :</label>
                                            <select class="form-select" id="Location1" name="state">
                                                <option value="">Select State</option>
                                                <option value="India">Ogun State</option>
                                                <option value="USA">Lagos</option>
                                                <option value="Dubai">Kwara</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="city" class="form-label">City :</label>
                                            <select class="form-select" id="Location1" name="city">
                                                <option value="">Select City</option>
                                                <option value="India">Abeokuta</option>
                                                <option value="USA">Ilorin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="c/o" class="form-label">C/O :</label>
                                            <input type="text" class="form-control" id="city">
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <h6>Home Address</h6>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="int123" class="form-label">Country :</label>
                                            <select class="form-select" id="Location1" name="country">
                                                <option value="">Select Country</option>
                                                <option value="India">India</option>
                                                <option value="USA">USA</option>
                                                <option value="Dubai">Dubai</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="int234" class="form-label">State :</label>
                                            <select class="form-select" id="Location1" name="state">
                                                <option value="">Select State</option>
                                                <option value="India">Lagos</option>
                                                <option value="USA">Ogun</option>
                                                <option value="Dubai">Kwara</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="town" class="form-label">Town :</label>
                                            <input type="text" class="form-control" id="town">
                                        </div>

                                        <div class="form-group">
                                            <label for="addressline13" class="form-label">Street :</label>
                                            <input type="text" class="form-control" id="street">
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="c-inputs-stacked">
                                            <input type="checkbox" id="checkbox_1">
                                            <label for="checkbox_1" class="d-block">Click here to indicate that you
                                                have filled the right information requested before you submit</label>
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </form>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="{{ asset('modalasset/src/js/vendors.min.js') }}"></script>
<script src="{{ asset('modalasset/src/js/pages/chat-popup.js') }}"></script>
<script src="{{ asset('modalasset/assets/icons/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('modalasset/assets/vendor_components/jquery-steps-master/build/jquery.steps.js') }}"></script>
<script src="{{ asset('modalasset/assets/vendor_components/jquery-validation-1.17.0/dist/jquery.validate.min.js') }}">
</script>
<script src="{{ asset('modalasset/assets/vendor_components/sweetalert/sweetalert.min.js') }}"></script>

<!-- CRMi App -->
<script src="{{ asset('modalasset/src/js/template.js') }}"></script>

<script src="{{ asset('modalasset/src/js/pages/steps.js') }}"></script>

</html>