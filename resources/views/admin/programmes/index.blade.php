@extends('layouts.adminmaster')

@section('content')
<section class="content">
    <div class="row">
        
  
      <div class="col-12">

       <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Programmes</h3>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-center">
                Add Programme
              </button>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="table-responsive">
                <table id="example5" class="table table-bordered table-striped" style="width:100%">
                  <thead>
                      <tr>
                          <th>Name</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($programmes as $programme)
                        <tr>
                            <td>{{$programme->description}}</td>
                            <td>
                                <div>
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modal-default">
                                    Edit
                                    </button>              
            
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-info">
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

    <!-- Modal -->
	<div class="modal center-modal fade" id="modal-center" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modal title</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<p>Your content comes here</p>
			</div>
			<div class="modal-footer modal-footer-uniform">
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary float-end">Save changes</button>
			</div>
			</div>
		</div>
	</div>
	<!-- /.modal -->
    <!-- /.row -->
  </section>
@endsection

@section('scripts')
<script src="{{asset('adminassets/vendor_components/datatable/datatables.min.js')}}"></script>
	
<!-- CRMi App -->
<script src="{{asset('adminassets/src/js/template.js')}}"></script>

<script src="{{asset('adminassets/src/js/pages/data-table.js')}}"></script>
@endsection