@extends('admin.layouts.master')

@section('content')
   <!-- Nested Row within Card Body -->
   <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Edit a slider!</h1>
            </div>
            <form class="user" action="{{ url('/dashboard/sliders/') }}/{{ $sliders->id }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PATCH')
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="text" name='title' class="form-control form-control-user" id="exampleFirstName"
                            placeholder="Title" value='{{ $sliders->title }}'>
                    </div> 
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="hidden" name='user_id' class="form-control form-control-user" id="exampleFirstName"
                            placeholder="user" value="@auth(){{ optional(auth()->user())->id}}@endauth">
                    </div> 
                </div>

                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="text" name='sub_title' class="form-control form-control-user" id="exampleFirstName"
                            placeholder="Sub Title" value='{{ $sliders->sub_title }}'>
                    </div> 
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="text" name='short_des' class="form-control form-control-user" id="exampleFirstName"
                            placeholder="Short Description" value='{{ $sliders->short_des }}'>
                    </div> 
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="hidden" id="type" name='thamb_path' placeholder="Image Url" class="form-control" value="{{ $sliders->thamb_path }}">
                        <img id="myImg" src="{{ $sliders->thamb_path }}" width="107" height="98" data-toggle="modal" data-target="#exampleModalCenter" class="border border-info">

                    </div> 
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                    <select class="form-control" class="form-select form-select-sm" aria-label=".form-select-sm example" name="status">
                     <option value="0" {{ $sliders->status == 0 ? 'selected' : '' }}  >Unpublish</option>
                    <option value="1" {{ $sliders->status == 1 ? 'selected' : '' }}  >Publish</option>
                    </select>
                    </div> 
                </div>

                <br />
                <br />

                <button type="submit" class="btn btn-primary btn-user btn-block"> Create</button>
                @foreach ($errors->all() as $message)
                {{ $message }}
                @endforeach
            </form>
            <hr>
        </div>
    </div>
</div> 
<!-- Insert Image from library -->
@include('admin.media.mediamodal')
<!-- Modal -->
@endsection