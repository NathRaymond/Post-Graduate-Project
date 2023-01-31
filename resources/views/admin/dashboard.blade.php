@extends('layouts.adminmaster')


@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xl-3 col-md-6 col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="text-fade">Total Students</h4>
                                <h4 class="fw-600">1,542</h4>
                                <p class="mb-0"><span class="text-success">12%</span> Increase</p>
                            </div>
                            <div>
                                <img src="{{ asset('adminassets/icons/svg-icons/custom-24.svg') }}" class="w-100"
                                    alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="text-fade">New Students</h4>
                                <h4 class="fw-600">742</h4>
                                <p class="mb-0"><span class="text-success">09%</span> Increase</p>
                            </div>
                            <div>
                                <img src="{{ asset('adminassets/icons/svg-icons/custom-25.svg') }}" class="w-100"
                                    alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="text-fade">Fees Collection</h4>
                                <h4 class="fw-600">₦542</h4>
                                <p class="mb-0"><span class="text-success">49%</span> Total</p>
                            </div>
                            <div>
                                <img src="{{ asset('adminassets/icons/svg-icons/custom-26.svg') }}" class="w-100"
                                    alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="text-fade">Fees Pending</h4>
                                <h4 class="fw-600">₦785</h4>
                                <p class="mb-0"><span class="text-danger">-51%</span> Total</p>
                            </div>
                            <div>
                                <img src="{{ asset('adminassets/icons/svg-icons/custom-27.svg') }}" class="w-100"
                                    alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">
                            Revenue Report
                        </h4>
                    </div>
                    <div class="box-body">
                        <div id="chart-report"></div>
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="fs-14 flexbox align-items-center">
                                    <span>Fees</span>
                                    <span>35%</span>
                                </div>
                                <div class="progress progress-xxs my-5">
                                    <div class="progress-bar progress-bar-primary" role="progressbar"
                                        style="width: 35%; height: 5px;" aria-valuenow="35" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                                <small class="fs-10 fw-400 mb-5 text-uppercase">Compared to Last year</small>
                            </div>

                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="fs-14 flexbox align-items-center">
                                    <span>Income</span>
                                    <span>87%</span>
                                </div>
                                <div class="progress progress-xxs my-5">
                                    <div class="progress-bar progress-bar-success" role="progressbar"
                                        style="width: 87%; height: 5px;" aria-valuenow="87" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                                <small class="fs-10 fw-400 mb-5 text-uppercase">Compared to Last year</small>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="fs-14 flexbox align-items-center">
                                    <span>Expense</span>
                                    <span>42%</span>
                                </div>
                                <div class="progress progress-xxs my-5">
                                    <div class="progress-bar progress-bar-danger" role="progressbar"
                                        style="width: 42%; height: 5px;" aria-valuenow="42" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                                <small class="fs-10 fw-400 mb-5 text-uppercase">Compared to Last year</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">User List</h4>
                        <div class="box-controls pull-right">
                            <div class="lookup lookup-circle lookup-right">
                                <input type="text" name="s">
                            </div>
                        </div>
                    </div>
                    <div class="box-body  pt-0">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th class="min-w-80">Img</th>
                                        <th>Title</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Created at</th>
                                        <th>Role</th>

                                    </tr>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td><img src="{{ asset('adminassets/images/avatar/avatar-1.png') }}"
                                                    class="avatar avatar-lg rounded10 bg-primary-light" alt=""></td>
                                            <td class="text-nowrap">{{ $user->title }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td class="text-nowrap">{{ $user->phone_number }}</td>
                                            <td class="text-nowrap">{{ date('d-M-Y', strtotime($user->created_at)) }}</td>

                                            <td>
                                                @if (!empty($user->getRoleNames()))
                                                    @foreach ($user->getRoleNames() as $v)
                                                        <span class="badge badge-danger-light"> {{ $v }}</span>
                                                    @endforeach
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">
                            Upcoming Events
                        </h4>
                    </div>
                    <div class="box-body p-0">
                        <div class="event-bx">
                            <ul class="media-list event-widget list-unstyled">
                                <li class="media">
                                    <div class="media-left">
                                        <div class="panel panel-primary text-center date">
                                            <div class="panel-heading month">
                                                <span class="strong">
                                                    Mar
                                                </span>
                                            </div>
                                            <div class="panel-body day text-primary">
                                                23
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-heading fw-500 fs-16 hover-primary"
                                            data-bs-toggle="modal" data-bs-target="#evemt-view">
                                            Sport Events
                                        </a>
                                        <p class="text-mute">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                                            molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                                            numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                                            optio, eaque rerum!
                                        </p>
                                        <address class="text-fade fs-12"><i class="mdi mdi-map-marker"></i> CEADESE Hall</address>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-left">
                                        <div class="panel panel-primary text-center date">
                                            <div class="panel-heading month">
                                                <span class="strong">
                                                    Jan
                                                </span>
                                            </div>
                                            <div class="panel-body text-primary day">
                                                16
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-heading fw-500 fs-16 hover-primary"
                                            data-bs-toggle="modal" data-bs-target="#evemt-view">
                                            Conference
                                        </a>
                                        <p class="text-mute">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                                            molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                                            numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                                            optio, eaque rerum!
                                        </p>
                                        <address class="text-fade fs-12"><i class="mdi mdi-map-marker"></i> CEADESE Hall</address>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-left">
                                        <div class="panel panel-primary text-center date">
                                            <div class="panel-heading month">
                                                <span class="strong all-caps">
                                                    Dec
                                                </span>
                                            </div>
                                            <div class="panel-body text-primary day">
                                                8
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-heading fw-500 fs-16 hover-primary"
                                            data-bs-toggle="modal" data-bs-target="#evemt-view">
                                            Annual Celebration
                                        </a>
                                        <p class="text-mute">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                                            molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                                            numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                                            optio, eaque rerum!
                                        </p>
                                        <address class="text-fade fs-12"><i class="mdi mdi-map-marker"></i> CEADESE Hall</address>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-left">
                                        <div class="panel panel-primary text-center date">
                                            <div class="panel-heading month">
                                                <span class="strong">
                                                    Mar
                                                </span>
                                            </div>
                                            <div class="panel-body day text-primary">
                                                23
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-heading fw-500 fs-16 hover-primary"
                                            data-bs-toggle="modal" data-bs-target="#evemt-view">
                                            Sport Events
                                        </a>
                                        <p class="text-mute">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                                            molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                                            numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                                            optio, eaque rerum!
                                        </p>
                                        <address class="text-fade fs-12"><i class="mdi mdi-map-marker"></i> CEADESE Hall</address>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-left">
                                        <div class="panel panel-primary text-center date">
                                            <div class="panel-heading month">
                                                <span class="strong">
                                                    Jan
                                                </span>
                                            </div>
                                            <div class="panel-body text-primary day">
                                                16
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-heading fw-500 fs-16 hover-primary"
                                            data-bs-toggle="modal" data-bs-target="#evemt-view">
                                            Conference
                                        </a>
                                        <p class="text-mute">
                                            Curabitur vel malesuada tortor, sit amet ultricies mauris. Aenean consectetur
                                            ultricies luctus.
                                        </p>
                                        <address class="text-fade fs-12"><i class="mdi mdi-map-marker"></i> 123 6th St.
                                            Melbourne, FL 32904</address>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-left">
                                        <div class="panel panel-primary text-center date">
                                            <div class="panel-heading month">
                                                <span class="strong all-caps">
                                                    Dec
                                                </span>
                                            </div>
                                            <div class="panel-body text-primary day">
                                                8
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-heading fw-500 fs-16 hover-primary"
                                            data-bs-toggle="modal" data-bs-target="#evemt-view">
                                            Annual Celebration
                                        </a>
                                        <p class="text-mute">
                                            Sed convallis dignissim magna et dignissim. Praesent tincidunt sapien eu gravida
                                            dignissim.
                                        </p>
                                        <address class="text-fade fs-12"><i class="mdi mdi-map-marker"></i> 123 6th St.
                                            Melbourne, FL 32904</address>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="box-footer p-0 no-border">
                        <a href="#" class="btn btn-primary-light w-p100">More Events »</a>
                    </div>
                </div>

                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">New Admission Report</h4>
                    </div>
                    <div class="box-body">
                        <div class="d-flex align-items-center">
                            <div class="me-50">
                                <p class="mb-5">Today</p>
                                <h4 class="fw-500">118 <i class="fa fa-arrow-up text-success"></i></h4>
                            </div>
                            <div class="me-50">
                                <p class="mb-5">This Week</p>
                                <h4 class="fw-500">189 <i class="fa fa-arrow-down text-danger"></i></h4>
                            </div>
                            <div>
                                <p class="mb-5">This Month</p>
                                <h4 class="fw-500">425 <i class="fa fa-arrow-up text-success"></i></h4>
                            </div>
                        </div>
                        <div class="progress mt-15">
                            <div class="progress-bar progress-bar-success" role="progressbar" style="width: 35%;"
                                aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Fees Collection Report</h4>
                    </div>
                    <div class="box-body">
                        <div class="d-flex align-items-center">
                            <div class="me-50">
                                <p class="mb-5">Today</p>
                                <h4 class="fw-500">₦12k <i class="fa fa-arrow-up text-success"></i></h4>
                            </div>
                            <div class="me-50">
                                <p class="mb-5">This Week</p>
                                <h4 class="fw-500">₦22k <i class="fa fa-arrow-down text-danger"></i></h4>
                            </div>
                            <div>
                                <p class="mb-5">This Month</p>
                                <h4 class="fw-500">₦95k <i class="fa fa-arrow-up text-success"></i></h4>
                            </div>
                        </div>
                        <div class="progress mt-15">
                            <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 75%;"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('adminassets/src/js/pages/dashboard.js') }}"></script>
@endsection
