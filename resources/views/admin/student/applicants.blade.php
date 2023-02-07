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
                            <li class="breadcrumb-item active" aria-current="page">Applicants</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row float-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-center">
                    Upload Applicants
                </button>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="row">


          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Applicants</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped nowrap">
                      <thead>
                          <tr>
                              <th>SN</th>
                              <th>Ref No.</th>
                              <th>Surname</th>
                              <th>Firstname</th>
                              <th>MiddleName</th>
                              <th>Email</th>
                              <th>Phone Number</th>

                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->applicantRefNo }}</td>
                            <td>{{ $student->surname }}</td>
                            <td>{{ $student->firstname }}</td>
                            <td>{{ $student->middlename }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->phone}}</td>
                            <td class="nowrap">
                              <a href="{{ route('view_applicant_details',[$student->id]) }}" class="btn btn-info btn-sm">View </a>
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
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
    <!-- /.content -->

    <div class="modal center-modal fade" id="modal-center" tabindex="-1">
        <div class="modal-dialog">
            <form class="form" action="{{ route('upload_applicants') }}" method="POST" onsubmit="$('#loaderg').show()" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload Applicants (Returning Records)</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="form-label">Records</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="ti-user"></i></span>
                                <input type="file" class="form-control" name="file" >
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
@endsection



@section('scripts')

<script src="{{ asset('adminassets/vendor_components/datatable/datatables.min.js')}}"></script>
<script src="{{ asset('adminassets/src/js/pages/data-table.js')}}"></script>

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


        })
</script>
    @endsection
