
@include('layouts.fontend.inc.header');


{{--user profile section start here --}}

<div class="profile_section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-inner text-center" >
                    <div class="user-profile-image">
                        <div class="overlay"></div>
                        <img id="img_id" src="{{ asset(Auth::user()->image) }}" alt="img">
                        <input type="file" id="imageInput" class="profile_file">

                    </div>
                    <div class="profile_name">
                        <label class="nameLabel">User Name: </label>
                        <input type="text" value="{{  Auth::user()->name  }}" name="name">
                        <a href="{{ route('userUpdate-Id' , [ 'id' => Auth::user()->id])}}"  class="nameEdit"></a>
                    </div>
                    <div class="profile_email">
                        <label class="nameLabel">User Email: </label>
                        <input type="text" value="{{ Auth::user()->email }}">
                        <a  href="{{ route('emailGet-Id' , [ 'id' => Auth::user()->id])}}" class="nameEdit"></a>
                    </div>

                    <div class="profile_email">
                        <a class="btn btn-primary" href="{{ route('updatePassword-Show')}}" >Update Password</a>
                    </div>

                    <div class="profile_item">
                        <h4>Total Buy: <span style="color:green; font-weight:700">4 Items</span></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-8">

            </div>
        </div>
    </div>
</div>



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
{{-- user profile section ending here --}}

@include('layouts.fontend.inc.footer')


