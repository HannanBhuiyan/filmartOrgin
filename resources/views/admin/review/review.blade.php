@extends('layouts.admin.admin-master')
@section('reviewOrder') active @endsection()
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
                            <li class="breadcrumb-item"><a href="#">Report </a></li>
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
                    <div class="col-md-12 m-auto">
                        <table class="table table-bordered text-center" id="table_id">
                            <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Product Name</th>
                                <th>Review</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($datas as $item)
                                <tr>
                                    <td>{{ $item->user->name }}</td>
                                    <td>
                                        <img width="100px"  src="{{ asset( $item->product->product_thumbnail ) }}" alt="">
                                    </td>
                                    <td>{{ $item->comment }}</td>
                                    <td>{{ $item->rating }}</td>
                                    <td>
                                        <span class="badge badge-success" >{{ $item->status }}</span>
                                    </td>

                                    <td>
                                        @if( $item->status == 'pending' )
                                            <a href="{{ route('review.approved', $item->id )}}" class="btn btn-info">Approved</a>
                                        @else
                                            <a href="{{ route('review.pending', $item->id )}}" class="btn btn-warning">Pending</a>
                                        @endif
                                        <a href="" class="btn btn-danger">Delete</a>
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



