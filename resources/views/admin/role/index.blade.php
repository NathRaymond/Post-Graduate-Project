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
                      <div class="table-responsive-sm">
                        <table id="example2" class="table table-center table-hover mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Role Name</th>
                                    <th>Created At</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                <tr>
                                    <td>
                                        {{$loop->iteration}}
                                    </td>
                                    <td>
                                        {{$role->name}}
                                    </td>
                                    <td>{{$role->created_at}}</td>
                                    <td class="text-end">

                                                <a href="{{ route('edit_role', $role->id) }}" class="waves-effect waves-light btn btn-sm btn-primary-light btn-circle mx-5">
                                                    <span class="icon-Write">
                                                    <span class="path1"></span><span class="path2"></span></span></a>
                                        <a href="{{ route('edit_role', $role->id) }}" class="btn btn-sm btn-secondary me-2"><i
                                                class="fa fa-edit"></i></a>

                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"
                                                id="deleteRecord" data-bs-toggle="modal"
                                                data-bs-target="#delete_category" data-id="{{ $role->id }}"><i
                                                    class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                      </div>

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
