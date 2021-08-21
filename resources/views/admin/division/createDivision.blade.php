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
                            <li class="breadcrumb-item"><a href="#">Division</a></li>
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
                    <div class="col-md-8 m-auto">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h4>Add New Division</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('division.store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Division Name</label>
                                        <input type="text" class="form-control @error('division_name') is-invalid @enderror" value="{{ old('division_name') }}" name="division_name" placeholder="Division Name">

                                        @error('division_name')
                                        <p style="color: red; font-weight:700">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group text-center mt-4">
                                        <input type="submit"  name="submit" value="Add" class="btn btn-warning btn-lg">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection()



