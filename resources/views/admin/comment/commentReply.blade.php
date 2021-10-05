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
                            <li class="breadcrumb-item"><a href="#">Comment Reply</a></li>
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
                        <form action="{{ route('comments.replay.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="reply_id" value="{{ $data->id }}">
                            <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                            <div class="form-group">
                                <label>Comment Reply</label>
                                <textarea name="description" rows="7" class="form-control" placeholder="Write here..."></textarea>
                            </div>
                            <button class="btn btn-primary mt-3">Comment</button>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection()


