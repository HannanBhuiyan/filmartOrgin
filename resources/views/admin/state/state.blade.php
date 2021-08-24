
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
                    <div class="col-md-8 ">
                        <table class="table table-bordered text-center" id="table_id">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Division Name</th>
                                <th>District Name</th>
                                <th>State Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($states as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->division->division_name }}</td>
                                    <td> {{$item->district->district_name }}
                                    </td>
                                    <td>{{ $item->state_name }}</td>
                                    <td>
                                        @if( $item->status == 1 )
                                            <a href="{{ route('state.active', ['id' => $item->id]) }}" class="btn btn-warning">Active</a>
                                        @else
                                            <a href="{{ route('state.inactive', ['id' => $item->id]) }}"  class="btn btn-success">Inactive</a>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="d-flex justify-content-around">
                                        <a href=" {{ route('state.edit', $item->id) }} " class="btn btn-info">Edit</a>
                                        <form action="{{ route('state.destroy', $item->id) }}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are u sure to delete this item?')" class="btn btn-danger">Delete</button>
                                        </form>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div class="col-md-4 ">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h4>Add New State</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('state.store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Select Division</label>
                                        <select name="division_id" class="form-control">
                                            <option value>--Select--</option>
                                            @foreach($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->division_name }}</option>
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
                                        <input type="text" class="form-control @error('state_name') is-invalid @enderror" value="{{ old('state_name') }}" name="state_name" placeholder="State Name">
                                        @error('state_name')
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
                            $('select[name="district_id"]').append('<option value="'+ value.id +'">'+ value.district_name+'</option>')
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
