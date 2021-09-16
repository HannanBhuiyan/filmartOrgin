@extends('layouts.admin.admin-master')
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
                            <li class="breadcrumb-item"><a href="#">All User</a></li>
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
                                <th>Name</th>
                                <th>Image</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <img width="100px" height="100px" src="{{ asset($item->image) }}" alt="image">
                                    </td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        <span class="badge badge-success">active</span>
                                    </td>
                                    <td>
                                        <select name="" id="" class="form-control">
                                            <option label="--Change Role--"></option>
                                            <option label="Admin">Admin</option>
                                            <option label="User">User</option>
                                        </select>
                                    </td>
                                    <td>
                                        <span class="d-flex justify-content-around">
                                            <a href=" {{ route('order.view', $item->id) }} " class="btn btn-info"><i class="far fa-eye"></i> View</a>
                                            <a href=" {{ route('orderInvoiceDownload', $item->id) }} " class="btn btn-danger"><i class="fas fa-angle-double-down"></i> Invoice</a>
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

