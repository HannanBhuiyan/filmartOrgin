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
                    <div class="col-md-10 m-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4>Update Category</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('category.update', $categoryDatas->id ) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Category Name Bn</label>
                                        <input type="text" class="form-control" name="category_name_bn" value="{{ $categoryDatas->category_name_bn }}">
                                        @error('category_name_bn')
                                            <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Category Name En</label>
                                        <input type="text" class="form-control" name="category_name_en" value="{{ $categoryDatas->category_name_en }}">
                                        @error('category_name_en')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Category Icon</label>
                                        <input type="text" class="form-control" name="category_icon"   value="{{ $categoryDatas->category_icon}}">
                                        @error('category_icon')
                                            <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="submit"  name="submit" value="Update" class="btn btn-success btn-lg">
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


