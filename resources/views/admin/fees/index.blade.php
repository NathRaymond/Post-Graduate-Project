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
                            <li class="breadcrumb-item active" aria-current="page">Fees</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row float-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-center">
                    Add New Fee
                </button>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">


            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Fees</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped" >
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Programme</th>
                                        <th>Type</th>
                                        <th>Fee</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="feeTable">
                                    @foreach ($fees as $fee)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $fee->programmes->description }}</td>
                                            <td>{{ $fee->types->description }}</td>
                                            <td class="text-right">{{ number_format($fee->amount,2) }}</td>
                                            <td>
                                                <div>
                                                    <button type="button" class="btn btn-info btn-sm"
                                                        data-bs-toggle="modal" data-bs-target="#modal-default">
                                                        Edit
                                                    </button>

                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-bs-toggle="modal" data-bs-target="#modal-info">
                                                        Delete
                                                    </button>
                                                </div>
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
     <div class="modal center-modal fade" id="modal-center" tabindex="-1">
        <div class="modal-dialog">
            <form class="form" id="feeForm" method="POST" onsubmit="$('#loaderg').show()">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Declare New Fee</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="form-group">
                            <label class="form-label">Programmes</label>
                            <select class="form-select" required name="programme">
                                <option value="">Select Programme</option>
                                @foreach ($programmes as $program)
                                    <option value="{{ $program->id }}">{{ $program->description }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Types</label>
                            <select class="form-select" required name="type">
                                <option value="">Select Type</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->description }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Amount</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="ti-phone"></i></span>
                                <input type="number" min="1" step="0.01" required class="form-control"
                                    name="amount" placeholder="Amount">
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

          $("#feeForm").on('submit', async function(e){
            e.preventDefault();
            const serializedData = $("#feeForm").serializeArray();

            try {
              $(".table").DataTable().clear().destroy();
              const tbodyEl = $('.feeTable');
              tbodyEl.empty()
                const postRequest = await request("/admin/fees/create", processFormInputs(serializedData), 'post');
                console.log('postRequest.message', postRequest.message);
                swal("Good Job","Fee declared successfully!.","success");
                $('#feeForm').trigger("reset");
                $("#feeForm .close").click();
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
                        <td > ${records?.programmes?.description}</td>
                        <td > ${records?.types?.description}</td>
                        <td > ${records.amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}</td>
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
                $('#loaderg').hide()
                // window.location.reload();
            } catch (e) {
                if ('message' in e) {
                    // console.log('e.message', e.message);
                    swal("Opss",e.message,"error");
                    $('#loaderg').hide()
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
