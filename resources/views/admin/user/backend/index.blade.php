@extends('admin.layouts.master')

@section('content')
       <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800">Users</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
                            
                            @if(session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                {{session('message')}}
                            </div>
                            @endif

                            @if(session()->has('messageDestroy'))
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
                                            <th>User Name</th> 
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SL.</th>
                                            <th>User Name</th> 
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php
                                        $sl = 0;
                                        @endphp
                                        @foreach($user as $users)
                                        <tr>
                                            <td>{{ ++$sl }}</td>
                                            <td>{{ $users->name }}</td> 
                                            <td>{{ $users->email }}</td>
                                            <td>
                                                <!-- {{ $users->role == 111 ? 'Administrator':'Editor' }} -->
                                                @if($users->role == 111)
                                                    Administrator
                                                @elseif($users->role == 1)
                                                    Editor
                                                @else
                                                    Pendding
                                                @endif

                                            </td>
                                            <td>

                                            @if(optional(auth()->user())->role == 111)
                                                <a href="{{ url('dashboard/singleUser/'.$users->id) }}" class="btn btn-success">Show</a> <a href="{{ url('dashboard/user/'.$users->id.'/edit') }}" class="btn btn-primary">Edit</a> <a  class="btn btn-danger bbtn">
                                                {!! Form::open(['url' => 'dashboard/delete/'.$users->id, 'method'=>'delete']) !!}
                                                {!! Form::submit('Delete') !!}
                                                {!! Form::close() !!}
                                                </a>
                                            @elseif(optional(auth()->user())->id == $users->id)
                                                <a href="{{ url('dashboard/singleUser/'.$users->id) }}" class="btn btn-success">Show</a> <a href="{{ url('dashboard/user/'.$users->id.'/edit') }}" class="btn btn-primary">Edit</a> <a  class="btn btn-danger bbtn">
                                                {!! Form::open(['url' => 'dashboard/delete/'.$users->id, 'method'=>'delete']) !!}
                                                {!! Form::submit('Delete') !!}
                                                {!! Form::close() !!}
                                                </a>
                                            @else
                                                Pendding
                                            @endif
                                            </td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection