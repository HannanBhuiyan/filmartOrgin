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
                            <li class="breadcrumb-item"><a href="#">Coupon</a></li>
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
                                <th>Coupon Name</th>
                                <th>Coupon Discount</th>
                                <th>Coupon Validate</th>
                                <th>Coupon Validity Status</th>
                                <th>Coupon Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coupons as $item)
                                <tr>
                                    <td>{{ $item->coupon_name }}</td>
                                    <td>{{ $item->coupon_discount }}</td>
                                    <td>{{ $item->coupon_validity }}</td>
                                    <td>
                                        @if( $item->coupon_validity >=\Carbon\Carbon::now()->format('Y-m-d'))
                                            <span class="badge badge-fill badge-success">Valid</span>
                                        @else
                                            <span class="badge badge-fill badge-danger">Invalid</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if( $item->status == 1 )
                                            <a href="{{ route('coupon.active', ['id' => $item->id]) }}" class="btn btn-warning">Active</a>
                                        @else
                                            <a href="{{ route('coupon.inactive', ['id' => $item->id]) }}"  class="btn btn-success">Inactive</a>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="d-flex justify-content-around">
                                        <a href=" {{ route('coupon.edit', $item->id) }} " class="btn btn-info">Edit</a>
                                        <form action="{{ route('coupon.destroy', $item->id) }}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are u sure to delete this item?')" class="btn btn-danger">Delete</button>
                                        </form>
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

