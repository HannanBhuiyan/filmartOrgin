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
                            <li class="breadcrumb-item"><a href="#">District</a></li>
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
                                <h4>Add New District</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('district.update', $district->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Select Division</label>
                                        <select name="division_id" class="form-control">
                                            <option value>--Select--</option>
                                            @foreach($divisions as $division)
                                                <option value="{{ $division->id }}" {{ $district->division_id == $division->id ? 'selected' : ' '}} >{{ $division->division_name }}</option>
                                            @endforeach

                                        </select>
                                        @error('division_name')
                                        <p style="color: red; font-weight:700">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>District Name</label>
                                        <input type="text" class="form-control @error('district_name') is-invalid @enderror" value="{{$district->district_name}}" name="district_name" placeholder="District Name">
                                        @error('district_name')
                                        <p style="color: red; font-weight:700">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group text-center mt-4">
                                        <input type="submit"  name="submit" value="Update" class="btn btn-warning btn-lg">
                                        <a href="{{ route('district.index')}}" class="btn btn-danger btn-lg">Back Home</a>
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



