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
                    <div class="col-md-8 m-auto">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h4>Add new Slider</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('sliders.update', $datas->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>SubTitle Eng</label>
                                        <input type="text" class="form-control" value="{{ $datas->subTitle_en }}" name="subTitle_en" placeholder="Top Brands">
                                    </div>
                                    <div class="form-group">
                                        <label>SubTitle Bn</label>
                                        <input type="text" class="form-control" value="{{ $datas->subTitle_bn }}" name="subTitle_bn" placeholder="শীর্ষ ব্র্যান্ড">
                                    </div>
                                    <div class="form-group">
                                        <label>Title En</label>
                                        <input type="text" class="form-control" value="{{  $datas->title_en }}" name="title_en" placeholder="New Collections">
                                    </div>
                                    <div class="form-group">
                                        <label>Title Bn</label>
                                        <input type="text" class="form-control" value="{{ $datas->title_bn }}" name="title_bn" placeholder="নতুন সংগ্রহ">
                                    </div>

                                    <div class="form-group">
                                        <label>Description En</label>
                                        <textarea name="description_en" class="form-control" cols="30" rows="5" placeholder="Write Something...">{{ $datas->description_en }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Description Bn</label>
                                        <textarea name="description_bn" class="form-control" cols="30" rows="5" placeholder="কিছু লিখুন">{{ $datas->description_bn }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Slider Image: (870px 370px)</label>
                                        <input type="file" onchange="document.getElementById('img_id').src=window.URL.createObjectURL(this.files[0])" name="sliderImage" class="mb-3">
                                        <img id="img_id" width="500px" height="300px" src="{{ asset($datas->sliderImage) }}" alt="">

                                        @error('sliderImage')
                                            <p class="text-danger font-weight-bold">{{ $message }}</p>
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


