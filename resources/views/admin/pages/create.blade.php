@extends('admin.layouts.master')

@section('content')
   <!-- Nested Row within Card Body -->
   <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create a Page</h1>
            </div>
            <form class="user" action="{{ url('/dashboard/pages') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="text" name='title' class="form-control form-control-user" id="exampleFirstName"
                            placeholder="Title">
                    </div> 
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="hidden" name='user_id' class="form-control form-control-user" id="exampleFirstName"
                            placeholder="user" value="@auth(){{ optional(auth()->user())->id}}@endauth">
                    </div> 
                </div>
                <!-- editor -->
                <link rel="stylesheet" href="{{ asset('public/admin/editor/rte_theme_default.css')}}" />
                <script type="text/javascript" src="{{ asset('public/admin/editor/rte.js')}}"></script>
                <script type="text/javascript" src="{{ asset('public/admin/editor/plugins/all_plugins.js')}}"></script>
 
                <textarea id="inp_editor1" name="content">
                </textarea>  

                <script>
                    var editor1 = new RichTextEditor("#inp_editor1");
                </script>

                <br />
                <br />
                
                <div class="form-group row">
                                   
                    <div class="col-sm-10 mb-3 mb-sm-0">
                        <select class="form-control" class="form-select form-select-sm" aria-label=".form-select-sm example" name="status">
                        <option value="0">Unpublish</option>
                        <option value="1">Publish</option>
                        </select>
                    </div> 
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <input type="hidden" id="type" name='thumbnail_path' placeholder="Image Url" class="form-control" >
                        <img id="myImg" src="{{ asset('public/admin/img/dummy-image-square.jpg') }}" width="100%" height="auto" data-toggle="modal" data-target="#exampleModalCenter" class="border border-info">
                    </div>
                </div> 

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