@extends('admin.layouts.master')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">General</h1>
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
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3"> 
            <div class="row">
            @php $settingN = 0; @endphp
            @foreach($settings as $setting)
                <div class="col-8">
                    <div class="p-2 bg-primary text-white">Theme Name: {{ $setting->home_url}}</div>
                </div>
                <div class="col-4">
                    <a href="{{ url('dashboard/settings/'.$setting->id.'/edit') }}" class="btn btn-primary">Edit</a> <a  class="btn btn-danger bbtn">                                            
                    {!! Form::open(['url' => 'dashboard/settings/'.$setting->id, 'method'=>'delete']) !!}
                    {!! Form::submit('Delete') !!}
                    {!! Form::close() !!}</a> 
                </div>
            @php $settingN = 1; @endphp
            @endforeach
            </div>  
            
        
            @if($settingN == 0)
            <a class="collapse-item btn btn-primary" href="{{ url('/dashboard/settings/create') }}">Add New</a>
            @endif  
        </div>
    </div>
@endsection