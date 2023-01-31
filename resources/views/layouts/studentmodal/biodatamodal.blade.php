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
                    <div class="box-body wizard-content">
                        <form method="post" action="{{ route('register-student') }}" class="tab-wizard wizard-circle"
                            onsubmit="showloader8()">
                            @csrf
                            <strong>
                                <h3>Bio Data</h3>
                            </strong>
                            <section>
                                {{-- <input type="hidden" id="studentId" name="id"> --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="SurnameName5" class="form-label">Surname Name :</label>
                                            <input type="text" class="form-control" id="bioSurname"
                                                value="{{ $biodatas->surname ?? ''}}" name="surname" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstName5" class="form-label">First Name :</label>
                                            <input type="text" name="firstname" value="{{ $biodatas->firstname ?? ''}}"
                                                id="bioFirstname" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="middleName5" class="form-label">Middle Name :</label>
                                            <input type="text" name="middlename"
                                                value="{{ $biodatas->middlename ?? ''}}" id="biomiddlename"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sex" class="form-label">Sex:</label>
                                            <select class="form-select" id="biosex" name="sex" required>
                                                <option value="{{ $biodatas->sex ?? ''}}">{{ $biodatas->sex ?? ''}}
                                                </option>
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
                                            <select class="form-select" id="biomarital_status" name="marital_status"
                                                required>
                                                <option value="{{ $biodatas->marital_status ?? ''}}">{{
                                                    $biodatas->marital_status ?? ''}}</option>
                                                    <option disabled>Choose Marital Status</option>
                                                <option value="single">Single</option>
                                                <option value="married">Married</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date1" class="form-label">Date of Birth :</label>
                                            <input type="date" class="form-control" value="{{ $biodatas->dob ?? ''}}"
                                                name="dob" id="biodob" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="addressline1" class="form-label">Religion :</label>
                                            <select class="form-select" id="bioreligion" name="religion" required>
                                                <option value="{{ $biodatas->religion ?? ''}}">{{ $biodatas->religion ??
                                                    ''}}</option>
                                                <option value="Christian">Christian</option>
                                                <option value="Islam">Islam</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="addressline2" class="form-label">Country :</label>
                                            <select class="form-select" id="country" name="country"
                                                required>
                                                @foreach ($countries as $country )
                                                <option disabled>Choose Country</option>
                                                <option value="{{ $country->id }}" {{$studcontacts->cont_country_id ?? ''
                                                    ==$country->id ? 'selected': ' '}}>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location3" class="form-label">State of Origin :</label>
                                            <select class="form-select" id="biostate_of_origin" name="state_of_origin"
                                                required>
                                                @foreach ($states as $state )
                                                <option disabled>Choose State</option>
                                                <option value="{{ $state->id_no }}" {{$biodatas->state_of_origin ?? ''
                                                    ==$state->id_no ? 'selected': ' '}}>{{$state->state}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date1" class="form-label">Phone Number :</label>
                                            <input type="phone" value="{{ $biodatas->phone_number ?? ''}}"
                                                class="form-control" maxlength="11" name="phone_number"
                                                id="biophone_number" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date1" class="form-label">Other Phone Number :</label>
                                            <input type="phone" class="form-control" name="alt_phone_number"
                                                maxlength="11" value="{{ $biodatas->alt_phone_number ?? ''}}"
                                                id="bioalt_phone_number" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date1" class="form-label">Email :</label>
                                            <input type="email" value="{{ $biodatas->email ?? ''}}" id="bioemail"
                                                class="form-control" name="email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="alternativeemail" class="form-label">Alternative Email :</label>
                                            <input type="aemail" id="bioalt_email"
                                                value="{{ $biodatas->alt_email ?? ''}}" class="form-control"
                                                name="alt_email" required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <strong>
                                    <h3>Contact Address</h3>
                                </strong>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="State" class="form-label">Country :</label>
                                            <select class="form-select" id="biocont_country_id" name="cont_country_id"
                                                required>
                                                @foreach ($countries as $country)
                                                <option disabled>Choose Country</option>
                                                <option value="{{ $country->id }}" {{$studcontacts->cont_country_id ?? ''
                                                    ==$country->id ? 'selected': ' '}}>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="State" class="form-label">State :</label>
                                            <select class="form-select" id="biocont_state" name="cont_state" required>
                                                @foreach ($states as $state )
                                                <option disabled>Choose State</option>
                                                <option value="{{ $state->id_no }}" {{$studcontacts->cont_state ?? ''
                                                    ==$state->id_no ? 'selected': ' '}}>{{$state->state}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="city" class="form-label">City :</label>
                                            <input type="text" value="{{ $studcontacts->cont_city ?? '' }}"
                                                class="form-control" id="biocont_city" name="cont_city" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="c/o" class="form-label">C/O :</label>
                                            <input type="text" value="{{ $studcontacts->cont_c_o ?? '' }}"
                                                class="form-control" id="" name="cont_c_o" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Email:</label>
                                            <input type="email" value="{{ $studcontacts->cont_email ?? '' }}"
                                                class="form-control" id="email" name="cont_email" required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <strong>
                                    <h3>Home Address</h3>
                                </strong>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="int234" class="form-label">State :</label>
                                            <select class="form-select" id="biohom_state" name="hom_state" required>
                                                @foreach ($states as $state )
                                                <option disabled>Choose State</option>
                                                <option value="{{ $state->id_no }}" {{$homeaddress->hom_state ?? ''
                                                    ==$state->id_no ? 'selected': ' '}}>{{$state->state}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="State" class="form-label">Country :</label>
                                            <select class="form-select" name="hom_country_id" required>
                                                @foreach ($countries as $country )
                                                <option disabled>Choose Country</option>
                                                <option value="{{ $country->id }}" {{$homeaddress->hom_country_id ?? ''
                                                    ==$country->id ? 'selected': ' '}}>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="town" class="form-label">Town :</label>
                                            <input type="text" value="{{ $homeaddress->hom_town ?? ''}}"
                                                class="form-control" name="hom_town" id="biohom_town" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="addressline13" class="form-label">Street :</label>
                                            <input type="text" value="{{ $homeaddress->hom_street ?? ''}}"
                                                class="form-control" id="biohom_street" name="hom_street" required>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="modal-footer" style="float: right">
                                <button class="btn btn-danger " data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                    Close</button>
                                <button type="submit" class="btn btn-success">Save &nbsp;<span
                                        class="spinner-border loader spinner-border-sm" id="thisLoader8" role="status"
                                        aria-hidden="true" style="display:none"></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>



<script src="{{ asset('js\requestController.js') }}"></script>
<script src="{{ asset('js\formController.js') }}"></script>
<script src="{{ asset('js/sweetalert/dist/sweetalert.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#frm_main").on('submit', async function(e) {
            e.preventDefault();

            const serializedData = $("#frm_main").serializeArray();

            var loader = $("#loader1");
            loader.show();

            try {

                const willUpdate = await new swal({
                    title: "Confirm User Action",
                    text: `Are you sure you want to submit?`,
                    icon: "warning",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                    buttons: ["Cancel", "Yes, Submit"]
                });
                if (willUpdate) {
                    const postRequest = await request("/student/register_student",
                        processFormInputs(
                            serializedData), 'post');
                    console.log('postRequest.message', postRequest.message);
                    new swal("Good Job", postRequest.message, "success");
                    $('#frm_main').trigger("reset");
                    $("#frm_main .close").click();
                    window.location.reload();
                } else {
                    var loader = $("#loader1");
                    loader.hide();
                    new swal("Process aborted  :)");

                }
                } catch (e) {
                    if ('message' in e) {
                        console.log('e.message', e.message);
                        var loader = $("#loader1");
                        loader.hide();
                        new swal("Opss", e.message, "error");
                    }
                }
            })
        })
</script>

<script>
    function showloader8() {
        var loader = document.getElementById('thisLoader8');
        loader.style.display = "inline-block";
    }
</script>

</html>