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
                                <h4>Add new Category</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('SubSubCategory.update', $subsubcategories->id ) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">

                                        <label>Select Category</label>
                                        <select class="form-control" name="category_id">
                                            <option label="--Choose--"></option>
                                            @foreach($categories as $cat)
                                                <option value="{{ $cat->id }}" {{ $subsubcategories->category_id == $cat->id ? 'selected' : " " }} >{{ $cat->category_name_en}}</option>
                                            @endforeach

                                        </select>
                                        @error('category_id')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Select Sub Category</label>
                                        <select class="form-control" name="subcategory_id">
                                            <option label="--Choose--"></option>

                                            @foreach($subcategories as $SubCat)
                                                <option value="{{ $SubCat->id }}" {{ $subsubcategories->subcategory_id == $SubCat->id ? 'selected' : " " }} >{{ $SubCat->subcategory_name_en}}</option>
                                            @endforeach



                                        </select>
                                        @error('subcategory_id')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Sub SubCategory Name Bn</label>
                                        <input type="text" class="form-control" value="{{ $subsubcategories->subsubcategory_name_bn }}" name="subsubcategory_name_bn">
                                        @error('subsubcategory_name_bn')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Sub Category Name En</label>
                                        <input type="text" class="form-control" value="{{ $subsubcategories->subsubcategory_name_en  }}" name="subsubcategory_name_en">
                                        @error('subsubcategory_name_en')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="submit"  name="submit" value="Add" class="btn btn-success btn-lg">
                                        <a href="{{ route('SubSubCategory.index') }}" class="btn btn-primary btn-lg ml-3">Back</a>
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


