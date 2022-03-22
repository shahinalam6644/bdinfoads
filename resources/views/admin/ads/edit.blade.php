@extends('admin.layouts.master')

@section('content')
   <!-- Nested Row within Card Body -->
   <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Edit</h1>
            </div>
            {!! Form::open(['url' => '/dashboard/ads/'.$ads->id,'method'=>'patch']) !!}
<!-- 
            <form class="user" action="{{ url('/dashboard/ads') }}" method="post">
            {{ csrf_field() }} -->
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="date" name='date' value='{{ $ads->name }}' class="form-control form-control-user" id="exampleFirstName"
                            placeholder="Ads Name">
                    </div> 
                </div>
                <div class="col-sm-3 mb-3 mb-sm-0">
                        <div class="form-group">
                        <input type="hidden" id="type" name='thumbnail_path' placeholder="Image Url" class="form-control" value="{{ $ads->thumbnail_path }}">
                            <img id="myImg" src="{{ $ads->thumbnail_path == null ? asset('public/admin/img/dummy-image-square.jpg') : $ads->thumbnail_path }}" width="100%" height="auto" data-toggle="modal" data-target="#exampleModalCenter" class="border border-info">
                        </div> 
                    </div>
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="text" name='link' value='{{ $ads->link }}' class="form-control form-control-user" id="exampleFirstName"
                            placeholder="Link">
                    </div> 
                </div> 

                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                    <select class="form-control" class="form-select form-select-sm" aria-label=".form-select-sm example" name="status">
                     <option value="0" {{ $ads->status == 0 ? 'selected' : '' }}  >Unpublish</option>
                    <option value="1" {{ $ads->status == 1 ? 'selected' : '' }}  >Publish</option>
                    </select>
                    </div> 
                </div>
                
                <button type="submit" class="btn btn-primary btn-user btn-block">Update</button>
                @foreach ($errors->all() as $message)
                {{ $message }}
                @endforeach
            <!-- </form> -->
             
            {!! Form::close() !!}

            <hr>
        </div>
    </div>
</div> 
<!-- Insert Image from library -->
@include('admin.media.mediamodal')
<!-- Modal -->
@endsection