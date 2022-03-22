@extends('admin.layouts.master')

@section('content')
       <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800">Post Show</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <table class="table">
                                <tbody>
                                    <tr>
                                    <th scope="row">Title:</th>
                                    <td>{{ $post->title }}</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Content:</th>
                                    <td>{!! $post->content !!}</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Category:</th>
                                    <td>{{ $post->category_id }} </td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Image:</th>
                                    <td><img src="{{$post->thumbnail_path}}" width="100"/></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Status:</th>
                                    <td>{{ $post->status == 0 ? 'Unpublish' : 'Publish' }}</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Last Modified:</th>
                                    <td>
                                    @foreach($users as $user)
                                    {{ $post->user_id == $user->id ? $user->name : '' }}
                                    @endforeach

                                    </td>
                                    </tr>
                                </tbody>
                                </table>
                        </div>
                       
                    </div>
@endsection