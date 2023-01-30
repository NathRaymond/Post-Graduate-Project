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
                                        <th>Description</th>
                                        <th>Programme</th>
                                        <th>Type</th>
                                        <th>Fee</th>
                                        <th>Late Fee</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="feeTable">
                                    @foreach ($fees as $fee)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $fee->description }}</td>
                                            <td>{{ $fee->programmes->description }}</td>
                                            <td>{{ $fee->types->description }}</td>
                                            <td class="text-right">{{ number_format($fee->amount,2) }}</td>
                                            <td class="text-right">{{ number_format($fee->late_fee,2) }}</td>
                                            <td>
                                                @if($fee->status == 1)
                                                <span class="badge badge-pill badge-danger">Late </span>
                                                @else
                                                <span class="badge badge-pill badge-primary">Normal </span>
                                                @endif
                                            </td>
                                            <td>
                                                <div>
                                                    @if($fee->status == 1)
                                                    <button type="button" class="btn btn-info btn-sm" id="edit-fee"
                                                        data-bs-toggle="modal" data-id="{{$fee->id }}" data-bs-target="#modal-default">
                                                        Edit
                                                    </button>

                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        id="makeNormal" data-id="{{$fee->id }}" >
                                                        Make Normal
                                                    </button>
                                                    @else
                                                    <button type="button" class="btn btn-info btn-sm" id="edit-fee"
                                                        data-bs-toggle="modal" data-id="{{$fee->id }}" data-bs-target="#modal-default">
                                                        Edit
                                                    </button>

                                                    <button type="button" class="btn btn-danger btn-sm"
                                                         id="makeLate" data-id="{{$fee->id }}" >
                                                        Make Late
                                                    </button>
                                                    @endif
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
                            <label class="form-label">Description</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="ti-phone"></i></span>
                                <input type="text" required class="form-control"
                                    name="description" placeholder="Description">
                            </div>
                        </div>
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
                        <div class="form-group">
                            <label class="form-label">Late Registration Fee</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="ti-phone"></i></span>
                                <input type="number" min="1" step="0.01" required class="form-control"
                                    name="late_fee" placeholder="Late registration fee">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="modal-footer modal-footer-uniform">
                        <button type="button" class="btn btn-danger close" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary float-end"><span id="loaderg"
                                class="spinner-border spinner-border-sm me-2" role="status"
                                style="display: none"></span>Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.modal -->
    <!-- Modal -->
    <div class="modal center-modal fade" id="modal-default" tabindex="-1">
        <div class="modal-dialog">
            <form class="form" id="updateFeeForm" method="POST" onsubmit="$('#loaderg').show()">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Fee Value</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <input type="hidden" name="id" id="Fid">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="ti-phone"></i></span>
                                <input type="text" required class="form-control"
                                    name="description" id="Fdescription" placeholder="Description">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Programmes</label>
                            <select class="form-select" required name="programme" id="Fprogramme">
                                <option value="">Select Programme</option>
                                @foreach ($programmes as $program)
                                    <option value="{{ $program->id }}">{{ $program->description }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Types</label>
                            <select class="form-select" required name="type" id="Ftype">
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
                                    name="amount" placeholder="Amount" id="Famount">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Late Registration Fee</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="ti-phone"></i></span>
                                <input type="number" min="1" step="0.01" required class="form-control"
                                    name="late_fee" placeholder="Late registration fee" id="Flate">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="modal-footer modal-footer-uniform">
                        <button type="button" class="btn btn-danger close" data-bs-dismiss="modal">Close</button>
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

          function allFee() {
            const tbodyEl = $('.feeTable');
              tbodyEl.empty()
              //alert(user_id);
              try {
                  $.get('{{ route('all-fees-data') }}',
                      function(data, status) {
                                // console.log(data);
                                data.data.forEach((records, index) => {
                                status = `
                                <button type="button" class="btn btn-info btn-sm"
                                    data-bs-toggle="modal" id="edit-fee" data-id="${records.id}" data-bs-target="#modal-default">
                                    Edit
                                </button>

                                <button type="button" class="btn btn-danger btn-sm"
                                    data-bs-toggle="modal" data-id="${records.id}" data-bs-target="#modal-info">
                                    Delete
                                </button>
                                ` ;
                                if(records.status == 1){
                                    start = `<span class="badge badge-pill badge-danger">Late </span>`;
                                    status = `
                                        <button type="button" class="btn btn-info btn-sm"
                                            data-bs-toggle="modal" id="edit-fee" data-id="${records.id}" data-bs-target="#modal-default">
                                            Edit
                                        </button>

                                        <button type="button" class="btn btn-primary btn-sm"
                                            data-bs-toggle="modal" id="makeNormal" data-id="${records.id}" data-bs-target="#modal-info">
                                            Make Normal
                                        </button>
                                        ` ;
                                }else{
                                    start = `<span class="badge badge-pill badge-primary">Normal </span>`;
                                    status = `
                                        <button type="button" class="btn btn-info btn-sm"
                                            data-bs-toggle="modal" id="edit-fee" data-id="${records.id}" data-bs-target="#modal-default">
                                            Edit
                                        </button>

                                        <button type="button" class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal" id="makeLate" data-id="${records.id}" data-bs-target="#modal-info">
                                            Make Late
                                        </button>
                                        ` ;
                                }

                            tbodyEl.append(
                                `<tr>
                                    <td > ${index+1}</td>
                                    <td > ${records.description}</td>
                                    <td > ${records?.programmes?.description}</td>
                                    <td > ${records?.types?.description}</td>
                                    <td class="text-right"> ${records.amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}</td>
                                    <td class="text-right"> ${records.late_fee.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}</td>
                                <td>${start}</td>
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
                      }
                  );
              } catch (e) {
                  let alert = swal(e.message);
              }
          }

          $('body').on('click', '#edit-fee', function() {
            var id = $(this).data('id');
            $.get("{{ route('get-fee-info') }}?id=" + id, function(data) {
                $('#Fdescription').val(data.description);
                $('#Flate').val(data.late_fee);
                $('#Famount').val(data.amount);
                $('#Ftype').val(data.type);
                $('#Fprogramme').val(data.programme);
                $('#Fid').val(data.id);
            })
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
                allFee()
                
                $('#loaderg').hide()
                // window.location.reload();
            } catch (e) {
                if ('message' in e) {
                    // console.log('e.message', e.message);
                    swal("Opss",e.message,"error");
                    $('#loaderg').hide()
                    allFee()
                }
            }
        })
        $("#updateFeeForm").on('submit', async function(e){
            e.preventDefault();
            const serializedData = $("#updateFeeForm").serializeArray();

            try {
              $(".table").DataTable().clear().destroy();
              const tbodyEl = $('.feeTable');
              tbodyEl.empty()
                const postRequest = await request("/admin/fees/update", processFormInputs(serializedData), 'post');
                console.log('postRequest.message', postRequest.message);
                swal("Good Job","Fee record update successful!.","success");
                $('#updateFeeForm').trigger("reset");
                $("#updateFeeForm .close").click();
                allFee()
                $('#loaderg').hide()
                // window.location.reload();
            } catch (e) {
                if ('message' in e) {
                    // console.log('e.message', e.message);
                    swal("Opss",e.message,"error");
                    $('#loaderg').hide()
                    allFee()
                }
            }
        })

        /* When click delete button */
        $('body').on('click', '#makeLate', function() {
                var fee_id = $(this).data('id');
              var token = $("meta[name='csrf-token']").attr("content");
              var el = this;
              resetAccount(el, fee_id);
          });


          async function resetAccount(el, fee_id) {
              const willUpdate = await swal({
                  title: "Confirm Change Of Fee To Late",
                  text: `Are you sure you want to perform this action?`,
                  icon: "warning",
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Yes!",
                  showCancelButton: true,
                  buttons: ["Cancel", "Yes, Proceed"]
              });
              if (willUpdate) {
                  //performReset()
                  performDelete(el, fee_id);
              } else {
                  swal("Action will not be performed  :)");
              }
          }


          function performDelete(el, fee_id) {
              $(".table").DataTable().clear().destroy();
              try {
                  $.get('{{ route('update-fee-status') }}?id=' + fee_id,
                  function(data, status) {
                      allFee();
                      swal("Operation Successful!.");
                       
                    }
                  );
              } catch (e) {
                  if ('message' in e) {
                        // console.log('e.message', e.message);
                        swal("Opss",e.message,"error");
                        $('#loaderg').hide()
                        allFee()
                }
              }
          }

        $('body').on('click', '#makeNormal', function() {
                var fee_id = $(this).data('id');
              var token = $("meta[name='csrf-token']").attr("content");
              var el = this;
              updateFee(el, fee_id);
          });


          async function updateFee(el, fee_id) {
              const willUpdate = await swal({
                  title: "Confirm Fee To Normal",
                  text: `Are you sure you want to perform this action?`,
                  icon: "warning",
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Yes!",
                  showCancelButton: true,
                  buttons: ["Cancel", "Yes, Proceed"]
              });
              if (willUpdate) {
                  //performReset()
                  performUpdate(el, fee_id);
              } else {
                  swal("Action will not be performed:)");
              }
          }


          function performUpdate(el, fee_id) {
              $(".table").DataTable().clear().destroy();
              try {
                  $.get('{{ route('update-fee-status') }}?id=' + fee_id,
                  function(data, status) {
                      allFee();
                      swal("Operation Successful!.");
                }
                  );
              } catch (e) {
                 if ('message' in e) {
                    // console.log('e.message', e.message);
                        swal("Opss",e.message,"error");
                        $('#loaderg').hide()
                        allFee()
                }
            }
          }


      })
</script>
@endsection
