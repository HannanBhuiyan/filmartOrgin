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
                            <li class="breadcrumb-item"><a href="#">Brand</a></li>
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
                    @if ($multiImageTrashCount <= 0)
                        <p style="color:red; font-weight:700; font-size:20px">No Data Found</p>
                    @else
                        @foreach($multiImageTrash as $item)
                            <div class="col-md-3">
                                <div class="card p-4">
                                    <img width="100%" height="100%" src="{{ asset($item->photo_name) }}" alt="">
                                    <div class="card-body text-center">
                                        <a onclick="return confirm('are you sure to restore this item?'); " href="{{ route('multiImage.restore', ['id' => $item->id])  }}" class="btn btn-warning mr-3">Re-Store</a>
                                        <a onclick="return confirm('are you sure to permanently delete this item?'); " href="{{ route('multipleImage.premanentDelete', ['id' => $item->id]) }}" class="btn btn-danger">Permanent Delete</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection()





