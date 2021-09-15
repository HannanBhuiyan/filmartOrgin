@extends('layouts.admin.admin-master')
@section('Order') menu-is-opening menu-open @endsection()
@section('paddingActive') active @endsection()


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Pending Order</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <table class="table table-bordered text-center" id="table_id">
                            <thead>
                            <tr>
                                <th>Data</th>
                                <th>Invoice</th>
                                <th>Amount</th>
                                <th>TNX ID</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $item)
                                <tr>
                                    <td>{{ $item->order_date }}</td>
                                    <td>{{ $item->invoice_no }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ $item->transaction_id }}</td>
                                    <td>
                                        @if( $item->status !==  "Pending" )
                                        @else
                                            <span class="badge badge-success">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="d-flex justify-content-around">
                                        <a href=" {{ route('order.view', $item->id) }} " class="btn btn-info"><i class="far fa-eye"></i> View</a>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection()


@section('scripts')

    <script type="text/javascript">

        $(document).ready( function () {
            $('#table_id').DataTable();
        } );

    </script>


@endsection()

