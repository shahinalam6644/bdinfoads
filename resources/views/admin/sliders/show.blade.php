@extends('admin.layouts.master')

@section('content')
       <!-- slider Heading -->
       <h1 class="h3 mb-2 text-gray-800">Slider Show</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <table class="table">
                                <tbody>
                                    <tr>
                                    <th scope="row">Title:</th>
                                    <td>{{ $slider->title }}</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Sub:</th>
                                    <td>{{ $slider->sub_title }}</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Image:</th>
                                    <td><img src="{{$slider->thamb_path}}" width="100"/></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Status:</th>
                                    <td>{{ $slider->status == 0 ? 'Unpublish' : 'Publish' }}</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Last Modified:</th>
                                    <td>
                                    @foreach($users as $user)
                                    {{ $slider->user_id == $user->id ? $user->name : '' }}
                                    @endforeach

                                    </td>
                                    </tr>
                                </tbody>
                                </table>
                        </div>
                       
                    </div>
@endsection