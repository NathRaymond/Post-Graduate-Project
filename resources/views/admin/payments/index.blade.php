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
                            <li class="breadcrumb-item active" aria-current="page">Transactions</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="row">


          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"> Payments</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>SN</th>
                              <th>Payer Name</th>
                              <th>Reference NO</th>
                              <th>Transaction ID</th>
                              <th>Amount</th>
                              <th>Payment Date</th>
                              <th>Approved By</th>
                              <th>Approved Date</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($payments as $payment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $payment->payer_name }}</td>
                            <td>{{ $payment->applicationRefNo }}</td>
                            <td>{{ $payment->teller_no }}</td>
                            <td>{{ number_format($payment->amount,2) }}</td>
                            <td>{{ $payment->payment_date }}</td>
                            <td>{{ $payment->user->name }}</td>
                            <td>{{ $payment->approved_date }}</td>
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


@endsection



@section('scripts')

<script src="{{ asset('adminassets/vendor_components/datatable/datatables.min.js')}}"></script>
<script src="{{ asset('adminassets/src/js/pages/data-table.js')}}"></script>
@endsection
