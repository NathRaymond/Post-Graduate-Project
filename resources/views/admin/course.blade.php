@extends('layouts.adminmaster')

@section('content')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title">Configuration</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Programmes</li>
                        </ol>
                    </nav>
                </div>
            </div>
            @can('add-course')
            <div class="row float-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-center">
                    Add New Course
                </button>
            </div>
            @endcan
        </div>
    </div>
    <section class="content">
        <div class="row">


            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Courses</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped" >
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Programme</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="programTable">
                                    @foreach ($courses as $course)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $course->description }}</td>
                                            <td>{{ $course->programme->description }}</td>
                                            <td>
                                                @can('delete-course')
                                                <div>
                                                    <button class="btn btn-info flex-end m-1 btn-sm" id="edit-record"  data-id="{{ $course->id }}" data-bs-toggle="modal" data-bs-target="#modal-edit">Edit</button>
                                                    <button class="btn btn-danger  btn-sm" id="deleteRecord" data-id="{{ $course->id }}" >Delete</button>
                                                </div>
                                                @endcan
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
      <!-- Modal -->
      @can('add-course')
      <div class="modal center-modal fade" id="modal-center" tabindex="-1">
        <div class="modal-dialog">
          <form id="programForm" method="POST" onsubmit="$('#loaderg').show()" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Course Name</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="ti-calendar"></i></span>
                            <input type="text" class="form-control" name="description" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Programme</label>
                        <select class="form-select" required name="program_id">
                            <option value="">Select program</option>
                            @foreach ($programmes as $programme)
                                <option value="{{ $programme->id }}">{{ $programme->description }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
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
    @endcan
    <!-- /.modal -->
@endsection

@section('scripts')
    <script src="{{ asset('adminassets/vendor_components/datatable/datatables.min.js') }}"></script>

    <!-- CRMi App -->
    {{-- <script src="{{ asset('adminassets/src/js/template.js') }}"></script> --}}

    <script src="{{ asset('adminassets/src/js/pages/data-table.js') }}"></script>
    <script src="{{ asset('js/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js\request.js') }}"></script>
<script src="{{ asset('js\form.js') }}"></script>
    <script>
      $(document).ready(function() {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $("#programForm").on('submit', async function(e){
            e.preventDefault();
            const serializedData = $("#programForm").serializeArray();

            try {
              $(".table").DataTable().clear().destroy();
              const tbodyEl = $('.programTable');
              tbodyEl.empty()
                const postRequest = await request("{{ route('add_new_course')}}", processFormInputs(serializedData), 'post');
                console.log('postRequest.message', postRequest.message);
                swal("Good Job","New Course added successfully!.","success");
                $('#programForm').trigger("reset");
                $("#programForm .close").click();
                postRequest.data.forEach((records, index) => {
                        status = `
                        <button type="button" class="btn btn-info btn-sm"
                              data-bs-toggle="modal" data-id="${records.id}" data-bs-target="#modal-default">
                              Edit
                          </button>

                          <button type="button" class="btn btn-danger btn-sm"
                              data-bs-toggle="modal" data-id="${records.id}" data-bs-target="#modal-info">
                              Delete
                          </button>
                          ` ;

                    tbodyEl.append(
                        `<tr>
                        <td > ${index+1}</td>
                        <td > ${records.description}</td>
                        <td > ${records.programme.description?? ' '}</td>
                        <td> <div >
                            ${status}
                        </div></td>
                    </tr>`
                    );

                });
                if ($.fn.dataTable.isDataTable('.table')) {
                    table = $('.table').DataTable();
                } else {
                    table = $('.table').DataTable({
                        // paging: false
                    });
                }
                // window.location.reload();
            } catch (e) {
                if ('message' in e) {
                    // console.log('e.message', e.message);
                    swal("Opss",e.message,"error");
                }
            }
        })

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
