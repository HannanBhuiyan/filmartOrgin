@extends('layouts.admin.admin-master')
@section('reportActive') active @endsection()
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
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 style="margin-bottom:15px" class="card-title">Report By Date time</h5>
                                <form action="{{ route('reportByDataTime') }}"  method="post" >
                                    @csrf
                                    <input type="date" class="form-control" name="order_date">
                                    <button type="submit" class="btn btn-primary" style="margin-top:20px">Search</button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 style="margin-bottom:15px" class="card-title">Report By Month</h5>
                                <form action="{{ route('reportByMonth') }}"  method="post">
                                    @csrf
                                    <select name="order_month" id="" class="form-control">
                                        <option label="--Choose Month--"></option>
                                        <option value="January">January (31 days)</option>
                                        <option value="February">February (28 days) </option>
                                        <option value="March">March (29 days) </option>
                                        <option value="April">April ( 31 days )</option>
                                        <option value="May">May ( 30 days ) </option>
                                        <option value="June">June (31 days) </option>
                                        <option value="July">July (30 days) </option>
                                        <option value="August">August ( 31 days ) </option>
                                        <option value="September">September (31 days) </option>
                                        <option value="October">October (30 days) </option>
                                        <option value="November">November (31 days) </option>
                                        <option value="December">December (30 days) </option>
                                    </select>
                                    <button type="submit" class="btn btn-primary" style="margin-top:20px">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 style="margin-bottom:15px" class="card-title">Report By Year</h5>
                                <form action="{{ route('reportByYear') }}"  method="post">
                                    @csrf
                                    <select name="order_year" id="" class="form-control">
                                        <option label="--Choose Year--"></option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2022">2022</option>
                                        <option value="2030">2030</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary" style="margin-top:20px">Search</button>
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



