
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
                            <li class="breadcrumb-item"><a href="#">State</a></li>
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
                                <h4>Add New State</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('state.update', $datas->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Select Division</label>
                                        <select name="division_id" class="form-control">
                                            <option value>--Select--</option>
                                            @foreach($divisions as $division)
                                                <option value="{{ $division->id }}" {{ $division->id === $datas->division_id ? 'selected' : ' ' }}>{{ $division->division_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('division_name')
                                        <p style="color: red; font-weight:700">{{ $message }}</p>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label>Select District</label>
                                        <select class="form-control" name="district_id">
                                            <option label="--Choose--"></option>
                                        </select>
                                        @error('district_id')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>State Name</label>
                                        <input type="text" class="form-control @error('state_name') is-invalid @enderror" value="{{ $datas->state_name }}" name="state_name" placeholder="State Name">
                                        @error('state_name')
                                        <p style="color: red; font-weight:700">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group text-center mt-4">
                                        <input type="submit"  name="submit" value="Update" class="btn btn-warning btn-lg">
                                        <a href="{{ route('state.index') }}" class="btn btn-primary btn-lg ml-2">Back Home</a>
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


@section('scripts')
    <script type="text/javascript">
        $('select[name="division_id"]').on('change', function(event){
            event.preventDefault();
            let division_id = $(this).val();
            axios.get("/admin/district-get/ajax/"+division_id)
                .then(function(response){
                    if(response.status === 200){
                        $('select[name="district_id"]').empty();
                        $.each(response.data, function(key, value){
                            $('select[name="district_id"]').append( '<option value="'+ value.id +'">'+ value.district_name+'</option>')
                        })
                    }
                })
                .catch(function(error){
                    toastr.error("Somthing Wrong! Please try again");
                });
        })
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
@endsection()
