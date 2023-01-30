@extends('layouts.adminmaster')


@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title">Admin</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Users</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row float-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-center">
                    Add New User
                </button>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-sm-12 text-center">
                                    <a href="#"><img src="{{ asset('adminassets/images/avatar/avatar-13.png') }}"
                                            alt="user" class="img-circle img-responsive"></a>
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title mb-0">{{ $user->title }} {{ $user->name }}</h5>
                                    <small>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $v)
                                                <p class="text-info">Role: {{ $v }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                    <p class="mt-15">
                                        <span class="d-block mb-10"
                                            title="{{ $user->email }}">{{ substr($user->email, 0, 20) }}</span>
                                        <abbr title="Phone"><i class="fa fa-phone"></i></abbr> {{ $user->phone_number }}
                                    </p>
                                </div>
                            </div>

                            <div class="row float-end">
                                <div class="d-flex ">

                                    <button class="btn btn-info flex-end m-1" id="edit-user"  data-id="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#modal-edit">Edit</button>
                                    <button class="btn btn-danger-light m-1"  id="deleteRecord" data-id="{{ $user->id }}" data-username="{{ $user->title.' '.$user->name }}">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
    <!-- /.content -->


    <!-- Add Modal -->
    <div class="modal center-modal fade" id="modal-center" tabindex="-1">
        <div class="modal-dialog">
            <form class="form" action="{{ route('create_new_user') }}" method="POST" onsubmit="$('#loaderg').show()">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="form-label">Title</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="ti-user"></i></span>
                                <input type="text" class="form-control" name="title" placeholder="Title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Full Name</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="ti-user"></i></span>
                                <input type="text" class="form-control" name="name" placeholder="Fullname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email address</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="ti-email"></i></span>
                                <input type="email" class="form-control" name="email" required placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone Number</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="ti-phone"></i></span>
                                <input type="text" minlength="11" maxlength="11" required class="form-control"
                                    name="phone_number" placeholder="Phone Number">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Role</label>
                            <select class="form-select" required name="role">
                                <option value="">Select Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->


                    <div class="modal-footer modal-footer-uniform">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary float-end"><span id="loaderg"
                                class="spinner-border spinner-border-sm me-2" role="status"
                                style="display: none"></span>Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal center-modal fade" id="modal-edit" tabindex="-1">
        <div class="modal-dialog">
            <form class="form" action="{{ route('create_new_user') }}" method="POST" onsubmit="$('#loaderk').show()" id="editUserform">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="form-label">Title</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="ti-user"></i></span>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Full Name</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="ti-user"></i></span>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Fullname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email address</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="ti-email"></i></span>
                                <input type="email" class="form-control" name="email" id="email" required placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone Number</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="ti-phone"></i></span>
                                <input type="text" minlength="11" maxlength="11" required class="form-control"
                                    name="phone_number" placeholder="Phone Number" id="phone_number">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Role</label>
                            <select class="form-select" required name="role" id="role">
                                <option value="">Select Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->


                    <div class="modal-footer modal-footer-uniform">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary float-end"><span id="loaderk"
                                class="spinner-border spinner-border-sm me-2" role="status"
                                style="display: none"></span>Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- /.modal -->
@endsection



@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /* When click delete button */
            $('body').on('click', '#deleteRecord', function() {
                var user_id = $(this).data('id');
                var user_name = $(this).data('username');
                var token = $("meta[name='csrf-token']").attr("content");
                var el = this;

                resetAccount(el, user_id, user_name);
            });


            async function resetAccount(el, user_id, user_name) {
                const willUpdate = await swal({
                    title: "Confirm User Delete",
                    text: `Are you sure you want to delete this user (${user_name})?`,
                    icon: "warning",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                    buttons: ["Cancel", "Yes, Delete"]
                });
                if (willUpdate) {
                    //performReset()
                    performDelete(el, user_id);
                } else {
                    swal("User record will not be deleted  :)");
                }
            }


            function performDelete(el, user_id) {
                //alert(user_id);
                try {
                    $.get('{{ route('user.destroy') }}?id=' + user_id,
                        function(data, status) {
                            console.log(status);
                            console.table(data);
                            if (status === "success") {
                                let alert = swal("User successfully deleted!.");
                                location.reload()
                            }
                        }
                    );
                } catch (e) {
                    let alert = swal(e.message);
                }
            }


            $('body').on('click', '#edit-user', function() {

                    var user_id = $(this).data('id');

                    $.get('{{ route('user_edit') }}?id=' + user_id, function(data) {


                        var userID = `<input name="id" value="${data.id}" id="userid" type="hidden" class="form-control">`;

                        $('#editUserform').append(userID);
                        // $('#userid').val(data.id);
                        $('#name').val(data.name)
                        console.log(data)
                        $('#name').val(data.name);
                        $('#title').val(data.title);
                        $('#email').val(data.email);
                        $('#phone_number').val(data.phone_number)
                        $('#role').val(data.roles.length != 0? data.roles[0].id: '')


                    })
                    });

        })
</script>
    @endsection
