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
                                <h4>Update Coupon</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('coupon.update', $coupons->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Coupon Name</label>
                                        <input type="text" class="form-control @error('coupon_name') is-invalid @enderror" value="{{ $coupons->coupon_name  }}" name="coupon_name" placeholder="Coupon Name">

                                        @error('coupon_name')
                                        <p style="color: red; font-weight:700">{{ $message }}</p>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label>Coupon Discount</label>
                                        <input type="number" class="form-control @error('coupon_discount') is-invalid @enderror" value="{{ $coupons->coupon_discount  }}" name="coupon_discount" placeholder="Coupon Discount">

                                        @error('coupon_discount')
                                            <p style="color: red; font-weight:700">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Coupon Discount</label>
                                        <input type="date" class="form-control @error('coupon_validity') is-invalid @enderror " value="{{ $coupons-> coupon_validity}}" name="coupon_validity" min="{{ \Carbon\Carbon::now()->format('Y-m-d')}}">

                                        @error('coupon_validity')
                                        <p style="color: red; font-weight:700">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group text-center mt-4">
                                        <input type="submit"  name="submit" value="Update" class="btn btn-warning btn-lg">
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


