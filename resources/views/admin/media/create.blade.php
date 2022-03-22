@extends('admin.layouts.master')

@section('content')
   <!-- Nested Row within Card Body -->
   <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create a Media!</h1>
            </div>
            <form class="user" action="{{ url('/dashboard/media') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                        <label class=newbtn>
                            <img id="blah" src="{{ asset('public/admin/img/dummy-image-square.jpg') }}" >
                            <input name='img_name' id="pic" class='pis form-control' onchange="readURL(this);" type="file" >
                        </label>
                        <!-- <input type="file" name='img_name' class="form-control" id="exampleFirstName"> -->
                    </div> 
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block"> Create</button>
                @foreach ($errors->all() as $message)
                {{ $message }}
                @endforeach
            </form>
        </div>
    </div>
</div> 

<script>
 $('.newbtn').bind("click" , function () {
        $('#pic').click();
 });
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<style>
#pic{display: none;}
.newbtn{cursor: pointer;}
#blah{
  max-width:30%;
  height:auto;
  margin-top:20px;
}
</style>
@endsection