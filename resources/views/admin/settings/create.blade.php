@extends('admin.layouts.master')

@section('content')
   <!-- Nested Row within Card Body -->
   <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create a Home Page!</h1>
            </div>
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

            <form class="user" action="{{ url('/dashboard/settings') }}" method="post">
            @csrf
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="text" name='home_url' class="form-control form-control-user" id="exampleFirstName"
                            placeholder="Theme folder Name">
                    </div> 
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block"> Create</button>                            
            </form>            
            <hr>
        </div>
    </div>
</div> 
@endsection