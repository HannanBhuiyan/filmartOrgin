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
                <!-- Small boxes (Stat box) -->
                {{--admiin profile section start here --}}
                <div class="profile_section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-inner text-center" >
                                    <div class="user-profile-image">
                                        <div class="overlay"></div>
                                        <form action="">
                                            <img id="img_id" src="{{ asset(Auth::user()->image) }}" alt="img">
                                            <input type="file" id="imageInput" class="profile_file">
                                        </form>
                                    </div>
                                    <div class="profile_name">
                                        <label class="nameLabel">Admin Name: </label>
                                        <input class="profileInput" type="text" value="{{  Auth::user()->name  }}" name="name">
                                        <a href="{{ route('admin.NameShow' , [ 'id' => Auth::user()->id])}}" class="nameEdit" ><i class="fas fa-pencil-alt"></i></a>
                                    </div>
                                    <div class="profile_email">
                                        <label class="nameLabel">Admin Email: </label>
                                        <input class="profileInput" type="text" value="{{ Auth::user()->email }}">
                                        <a  href="{{ route('adminEmailShow' , [ 'id' => Auth::user()->id])}}" class="nameEdit"><i class="fas fa-pencil-alt"></i></a>
                                    </div>
                                    <div class="profile_password mt-3">
                                        <a class="btn btn-primary" href="{{ route('admin.passwordShow')}}" >Update Password</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8"></div>
                        </div>
                    </div>
                </div>
                {{-- admin profile section ending here --}}
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection()

{{--script section start here --}}
@section('scripts')
    <script type="text/javascript">
        $('#imageInput').change(function (){
            let Reader = new FileReader();
            Reader.readAsDataURL(this.files[0]);
            Reader.onload=function(event){
                let imgSrc = event.target.result;
                $("#img_id").attr('src', imgSrc);
            }
            // img settings
            let photoFile = $("#imageInput").prop('files')[0];
            let formData = new FormData();
            formData.append('photo',photoFile);
            photoUpload: '{{route("file.Upload")}}';
            axios.post("photoUpload", formData)
                .then(function(response){
                    if(response.status===200){
                        toastr.success('Image Update Success');
                    }else{
                        toastr.error('Image Update Fail');
                    }
                })
                .catch(function(error){
                    toastr.error('Image Update Fail');
                })
        })
    </script>
@endsection
{{--script section ending here --}}








