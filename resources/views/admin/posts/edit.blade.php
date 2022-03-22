@extends('admin.layouts.master')

@section('content')
   <!-- Nested Row within Card Body -->
   <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Edit a Post!</h1>
            </div>
            <form class="user" action="{{ url('/dashboard/posts/') }}/{{ $posts->id }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PATCH')
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="text" name='title' class="form-control form-control-user" id="exampleFirstName"
                            placeholder="Title" value='{{ $posts->title }}'>
                    </div> 
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="hidden" name='user_id' class="form-control form-control-user" id="exampleFirstName"
                            placeholder="user" value="@auth(){{ optional(auth()->user())->id}}@endauth">
                    </div> 
                </div>

                <link rel="stylesheet" href="{{ asset('public/admin/editor/rte_theme_default.css')}}" />
                <script type="text/javascript" src="{{ asset('public/admin/editor/rte.js')}}"></script>
                <script type="text/javascript" src="{{ asset('public/admin/editor/plugins/all_plugins.js')}}"></script>

                <textarea id="inp_editor1" name="content" value='{{ $posts->content }}'>{{ $posts->content }}
                </textarea>  

                <script>
                    var editor1 = new RichTextEditor("#inp_editor1");
                </script>

                <br />
                <br />

                <div class="form-group row"> 
                    <div class="col-sm-9 mb-3 mb-sm-0">
                        <div class="form-group">
                            <textarea type="text" name='excerpt' class="form-control">{{ $posts->excerpt }}</textarea>
                        </div>
                        <div class="form-group">
                            <select class="form-control" class="form-select form-select-sm" aria-label=".form-select-sm example" name="category_id">
                                <option value="0">No Categories</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $posts->category_id == $category->id ? 'selected' : '' }} >{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>  
                        <div class="form-group">
                            <select class="form-control" class="form-select form-select-sm" aria-label=".form-select-sm example" name="post_type">
                                <option value="post">Post</option>
                                @foreach($posttypes as $posttype)
                                <option value="{{ $posttype->slug }}" {{ $posts->post_type == $posttype->slug ? 'selected' : '' }}>{{ $posttype->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" class="form-select form-select-sm" aria-label=".form-select-sm example" name="status">
                                <option value="0" {{ $posts->status == 0 ? 'selected' : '' }}  >Unpublish</option>
                                <option value="1" {{ $posts->status == 1 ? 'selected' : '' }}  >Publish</option>
                            </select>
                        </div> 
                    </div> 
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <div class="form-group">
                            <input type="hidden" id="type" name='thumbnail_path' placeholder="Image Url" class="form-control" value="{{ $posts->thumbnail_path }}">
                            <img id="myImg" src="{{ $posts->thumbnail_path == null ? asset('public/admin/img/dummy-image-square.jpg') : $posts->thumbnail_path }}" width="100%" height="auto" data-toggle="modal" data-target="#exampleModalCenter" class="border border-info">
                        </div> 
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