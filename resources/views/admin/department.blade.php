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
                            <li class="breadcrumb-item active" aria-current="page">Department</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row float-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-center">
                    Add New Department
                </button>
            </div>
        </div>
    </div>

 	<!-- Main content -->
     <section class="content">
        <div class="row">
          @foreach ($departments as $department )
          <div class="col-md-6 col-lg-3">
              <div class="box overflow-hidden">
                  <img class="img-responsive" alt="user" src='{{ asset("department_images/$department->image") }}'>
                  <div class="box-body">
                      <h4 class="box-title fw-500">{{ $department->name }}</h4>
                      <p>
                          <span><i class="ti-user me-10"></i> Head: {{ $department->users->title. ' '.$department->users->name }}</span>
                      </p>
                      <p>
                          <span><i class="fa fa-graduation-cap me-10"></i> Students: 200+</span>
                      </p>
                      <button class="btn btn-primary waves-effect waves-light mt-10">More Details</button>
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
            <form class="form" action="{{ route('createDepartment') }}" method="POST" onsubmit="$('#loaderg').show()" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Department</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="form-label">Department Name</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="ti"></i></span>
                                <input type="text" class="form-control" name="name" placeholder="Department Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Department Head</label>
                            <select class="form-select" required name="head">
                                <option value="">Select Head</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->title.' '.$user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Image</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="ti-image"></i></span>
                                <input type="file" class="form-control" name="image" placeholder="" accept="image/*" required>
                            </div>
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
                var token = $("meta[name='csrf-token']").attr("content");
                var el = this;
                alert(user_id);
                resetAccount(el, user_id);
            });


            async function resetAccount(el, user_id) {
                const willUpdate = await swal({
                    title: "Confirm User Delete",
                    text: `Are you sure you want to delete this user?`,
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

            /* When click edit user */
            $('body').on('click', '#edit-department', function() {

                var deptID = $(this).data('id');

                $.get('{{ route('departmentInfo') }}?id=' + deptID, function(data) {
                    $('#deptID').val(data.id);
                    $('#deptDescription').val(data.description);


                })
            });

        })
    </script>
@endsection
