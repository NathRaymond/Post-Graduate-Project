@extends('layouts.adminmaster')


@section('content')
<style>
    .table>thead>tr>td,
    .table>thead>tr>th {
        padding: 0.5rem;

    }

    .table>tbody>tr>td,
    .table>tbody>tr>th {
        padding: 0.5rem;
        vertical-align: middle;
    }
</style>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title">Configuration</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Referee Questions</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row float-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-center">
                    Add New Question
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
                        <h3 class="box-title">Referee Questions</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" data-pagelength="50" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Questions</th>
                                        <th>Added on</th>
                                        <th class="nowrap">Added By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($questions as $question)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $question->question }}</td>
                                            <td nowrap>{{ $question->created_at }}</td>
                                            <td nowrap>{{ $question->addeby->title . ' ' . $question->addeby->name }}</td>

                                            <td>
                                                <button class="btn btn-info flex-end m-1" id="edit-user"  data-id="{{ $question->id }}" data-bs-toggle="modal" data-bs-target="#modal-edit">Edit</button>
                                                <button class="btn btn-danger" id="deleteRecord" data-id="{{ $question->id }}" >Delete</button>

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


    <!-- Modal -->
    <div class="modal center-modal fade" id="modal-center" tabindex="-1">
        <div class="modal-dialog">
            <form class="form" action="{{ route('addNewQuestion') }}" method="POST" onsubmit="$('#loaderg').show()"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Question</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="form-label">Question</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="ti-calendar"></i></span>
                                <textarea rows="6" class="form-control" name="question" placeholder="" required ></textarea>
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

    <!-- Modal -->
    <div class="modal center-modal fade" id="modal-edit" tabindex="-1">
        <div class="modal-dialog">
            <form class="form" action="{{ route('updateQuestion') }}" method="POST" onsubmit="$('#loaderk').show()"
                enctype="multipart/form-data" id="editform">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Question</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="form-label">Question</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="ti-calendar"></i></span>
                                <textarea rows="6" class="form-control" name="question" placeholder="" required id="rquestion"></textarea>
                            </div>
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
    <script src="{{ asset('adminassets/vendor_components/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('adminassets/src/js/pages/data-table.js') }}"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '#edit-user', function() {

                    var user_id = $(this).data('id');

                    $.get('{{ route('edit_question') }}?id=' + user_id, function(data) {


                        var dataID = `<input name="id" value="${data.id}" id="userid" type="hidden" class="form-control">`;

                        $('#editform').append(dataID);
                        // $('#userid').val(data.id);
                        console.log(data.question)
                        $('#rquestion').val(data.question)


                    })
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
                    title: "Confirm Record Delete",
                    text: `Are you sure you want to delete this record?`,
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
                    swal("Record will not be deleted  :)");
                }
            }


            function performDelete(el, user_id) {
                //alert(user_id);
                try {
                    $.get('{{ route('deleteRefereeQuestion') }}?id=' + user_id,
                        function(data, status) {

                            console.table(data);
                            if (status === "success") {
                                let alert = swal("Record successfully deleted!.");
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
