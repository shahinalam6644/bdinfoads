@extends('admin.layouts.master')

@section('content')
       <!-- Page Heading -->
       <h5 class="h5 mb-2 text-gray-800">Add New Post type <button class="btn btn-primary btn-user"><a href="{{ url('/dashboard/posttypes/create') }}" class="text-white">Add New</a></button></h5>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Post type</h6>
                            
                            @if(session()->has('message'))
                            <br/>
                            <div class="alert alert-success" role="alert">
                                {{session('message')}}
                            </div>
                            @endif

                            @if(session()->has('messageDestroy'))<br/>
                            <div class="alert alert-danger" role="alert">
                                {{session('messageDestroy')}}
                            </div>
                            @endif
                           
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Post type</th> 
                                            <th>Slug</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Post type</th> 
                                            <th>Slug</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php
                                        $sl = 0;
                                        @endphp
                                        @foreach($posttypes as $posttype)
                                        <tr>
                                            <td>{{ ++$sl }}</td>
                                            <td>{{ $posttype->name }}</td> 
                                            <td>{{ $posttype->slug }}</td>
                                            <td>{{ $posttype->status == 0 ? 'Unpublish' : 'Publish' }}</td>

                                            <td><a href="{{ url('dashboard/posttypes/'.$posttype->id) }}" class="btn btn-success">Show</a> <a href="{{ url('dashboard/posttypes/'.$posttype->id.'/edit') }}" class="btn btn-primary">Edit</a> <a  class="btn btn-danger bbtn">                                            
                                            {!! Form::open(['url' => 'dashboard/posttypes/'.$posttype->id, 'method'=>'delete']) !!}
                                            {!! Form::submit('Delete') !!}
                                            {!! Form::close() !!}</a>                                            
                                            </td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection