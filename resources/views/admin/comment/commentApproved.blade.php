@extends('layouts.admin.admin-master')
@section('comment') menu-is-opening menu-open @endsection()
@section('commentApproved') active @endsection()
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
                            <li class="breadcrumb-item"><a href="#">Approved Comment</a></li>
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
                        <table class="table table-bordered text-center" id="table_id">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Product Thumbnail</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($comments as $item)

                                @php
                                    $commentsCount= App\Models\CommentReply::where('reply_id', $item->id)->count();
                                @endphp


                                <tr>
                                    <td>{{ $item->name }} ||
                                        @if($commentsCount > 0)
                                            <span class="text-info font-weight-bold" >( {{ $commentsCount }} Replay)</span>
                                        @else
                                            <span class="text-danger font-weight-bold" >( {{ $commentsCount }} Replay)</span>
                                        @endif


                                    </td>
                                    <td>
                                        <img width="100px"  src="{{ asset( $item->product->product_thumbnail ) }}" alt="">
                                    </td>

                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <span class="badge badge-success" >{{ $item->status }}</span>
                                    </td>
                                    <td>
                                        <button data-id="{{$item->id }}" class="btn btn-danger commentsDeleteButton">Delete</button>
                                        <a href="{{ route('adminComments.replay',$item->id) }}" class="btn btn-info">Replay</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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

        $(document).ready( function () {
            $('#table_id').DataTable();
        } );

    </script>


@endsection()

