@extends('admin.layouts.master')

@section('content')
  <!-- Nested Row within Card Body -->
  <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Edit an Account!</h1>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session()->has('message'))
                    <div class="alert alert-{{ session('type') }}">
                        {{session('message')}}
                    </div>
                @endif

                <form action="{{ url('/dashboard/user/') }}/{{ $user->id }}" method="post" class="user">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="text" name="name" class="form-control form-control-user" id="exampleFirstName"
                                placeholder="First Name" value='{{ $user->name }}'>
                     </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                            placeholder="Email Address" value="{{ $user->email }}">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" name="password" class="form-control form-control-user"
                                id="exampleInputPassword" placeholder="Password">
                        </div>
                        <div class="col-sm-6">
                            <input type="password" name="password_confirmation" class="form-control form-control-user"
                                id="exampleRepeatPassword" placeholder="Repeat Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <select class="form-control" class="form-select form-select-sm" aria-label=".form-select-sm example" name="role">
                            <option value="111" {{ $user->role == 111 ? 'selected':'' }}>Administrator</option>
                            <option value="1" {{ $user->role == 1 ? 'selected':'' }}>Editor</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Update</button>
                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                </div>
                <div class="text-center">
                    <a class="small" href="{{ url('/login') }}">Already have an account? Login!</a>
                </div>
            </div>
        </div>
    </div>
@endsection