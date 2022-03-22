@extends('admin.layouts.master')

@section('content')
       <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800">Post Type Show</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Post Type</h6> <br/>
                            Name: {{ $posttypes->name }} <br/><hr/>
                            Slug: {{ $posttypes->slug }} <br/><hr/>
                            Status: {{ $posttypes->status == 0 ? 'Unpublish' : 'Publish' }}
                        </div>
                       
                    </div>
@endsection