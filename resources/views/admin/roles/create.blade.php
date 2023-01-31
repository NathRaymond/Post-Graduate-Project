@extends('layouts.adminmaster')


@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title">Configuration</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Roles and Permission</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row float-end">
                <a href="{{route('create_new_role')}}" class="btn add-button btn-info me-1">
                    <i class="fas fa-plus"></i> Create New Role
                </a>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-12">
                <div class="box">

                  <!-- /.box-header -->
                  <div class="box-body">

                    <form action="{{ route('roles.store') }}" method="post" onsubmit="$('#loaderg').show()">
                        @csrf
                    <div class="row">

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body pt-0">
                                    <div class="card-header mb-4">
                                        <h5 class="card-title">Input Role Permission</h5>
                                    </div>

                                        <div class="form-group">
                                            <label>Role Name</label>

                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block"><span id="loaderg" class="spinner-border spinner-border-sm me-2" role="status" style="display: none"></span>Submit</button>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="box-body">



                            </div>
                            <div class="card">
                                <div class="card-body pt-0">
                                    <div class="card-header mb-4">
                                        <h5 class="card-title">Role Permissions</h5>
                                    </div>
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 demo-checkbox">
                                        @foreach ($permission as $value)
                                        <div class="col mb-3 d-flex">
                                            <div class="card flex-fill">
                                                <div class="card-body p-3 text-center">
                                                    <p class="card-text f-12">{{ $value->name }}</p>
                                                </div>
                                                <div class="card-footer">

                                                        {{-- <input type="checkbox" id="notification_switch{{ $value->id }}" class="filled-in chk-col-info" value="{{ $value->id }}"> --}}
                                                        <span class="toggle-switch-label text-center demo-checkbox">

                                                                <input type="checkbox" id="md_checkbox_{{ $value->id }}" name="permission[]" value="{{ $value->id }}" class="filled-in chk-col-primary">
                                                                <label for="md_checkbox_{{ $value->id }}"></label>
                                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </form>

                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>




        </div>
    </section>
    <!-- /.content -->


    <!-- /.modal -->
@endsection
