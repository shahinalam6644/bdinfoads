@extends('admin.layouts.master')

@section('content')
       <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800">User Profile</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <table class="table">
                                <tbody>
                                    <tr>
                                    <th scope="row">Name:</th>
                                    <td>
                                        @auth()
                                        Profile ({{ optional(auth()->user())->name}})
                                        @endauth
                                    </td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Password:</th>
                                    <td>**********</td>
                                    </tr>
                                     
                                    <tr>
                                    <th scope="row">Permission:</th>
                                    <td>
                                        <!-- {{ optional(auth()->user())->role == 111 ? 'Administrator':'Editor' }} -->
                                        @if(optional(auth()->user())->role == 111)
                                            Administrator
                                        @elseif(optional(auth()->user())->role == 1)
                                            Editor
                                        @else
                                            Pendding
                                        @endif

                                    </td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Profile Photo:</th>
                                    <td><img src="" width="100"/></td>
                                    </tr>
                                </tbody>
                                </table>
                        </div>
                       
                    </div>
@endsection