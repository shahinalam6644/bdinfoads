@extends('admin.layouts.master')

@section('content')
       <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800">Page Show</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <table class="table">
                                <tbody>
                                    <tr>
                                    <th scope="row">Title:</th>
                                    <td>{{ $page->title }}</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Content:</th>
                                    <td>{!! $page->content !!}</td>
                                    </tr>
                                    
                                    <tr>
                                    <th scope="row">Image:</th>
                                    <td><img src="{{$page->thumbnail_path}}" width="100"/></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Status:</th>
                                    <td>{{ $page->status == 0 ? 'Unpublish' : 'Publish' }}</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Last Modified:</th>
                                    <td>
                                    @foreach($users as $user)
                                    {{ $page->user_id == $user->id ? $user->name : '' }}
                                    @endforeach

                                    </td>
                                    </tr>
                                </tbody>
                                </table>
                        </div>
                       
                    </div>
@endsection