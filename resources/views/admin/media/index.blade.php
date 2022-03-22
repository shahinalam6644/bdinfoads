@extends('admin.layouts.master')

@section('content')
       <!-- Page Heading -->
       <h5 class="h5 mb-2 text-gray-800">Add New Media <button class="btn btn-primary btn-user"><a href="{{ url('/dashboard/media/create') }}" class="text-white">Add New</a></button> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Show Modal</button></h5>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Media</h6>
                            
                            @if(session()->has('message'))
                            <br/>
                            <div class="alert alert-success" role="alert">
                                {{session('message')}}
                            </div>
                            @endif

                            @if(session()->has('messageDestroy'))
                            <br/>
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
                                            <th>Image</th> 
                                            <th>Permalink</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Image</th> 
                                            <th>Permalink</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php
                                        $sl = 0;
                                        @endphp
                                        @foreach($medies as $media)
                                        <tr>
                                            <td>{{ ++$sl }}</td>
                                            <td><img src="{{ asset('public/images/') }}/{{$media->img_name }}" width="100"/></td> 
                                            <td>{{ asset('public/images/') }}/{{$media->img_name }}</td> 

                                            <td>
                                            <a  class="btn btn-danger bbtn">
                                            {!! Form::open(['url' => 'dashboard/media/'.$media->id, 'method'=>'delete']) !!}
                                            {!! Form::submit('Delete') !!}
                                            {!! Form::close() !!}
                                            </a>
                                            </td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<!-- Insert Image from library -->
@include('admin.media.mediamodal')
<!-- Modal -->
@endsection