@extends('admin.layouts.app')
@section('title','Dashboard')
@section('css')
@endsection
@section('content')
<div class="container-fluid px-4">
    <h2 class="mt-4">News Dashboard</h2>
    <!-- date  -->
    <p class="btn btn-secondary disabled text-light"> Date : {{ date('H:i A D-d-m-Y') }}</p>

    @if(session('update_success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('update_success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('password_update'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('password_update') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card shadow mb-4">
                <h4 class="p-2 bg-primary text-light" style="border-radius: 5px 5px 0px 0px;"> <span class="material-symbols-outlined">
                        category
                    </span> CATEGORY</h4>
                <h5 class="px-2">Total : {{ $category['row']->count() }}</h5>

            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card shadow mb-4">
                <h4 class="p-2 bg-success text-light" style="border-radius: 5px 5px 0px 0px;"><span class="material-symbols-outlined">
                        post
                    </span> POST</h4>
                <h5 class="px-2">Total : {{ $post['row']->count() }}</h5>

            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card shadow mb-4">
                <h4 class="p-2 bg-warning text-light" style="border-radius: 5px 5px 0px 0px;"><span class="material-symbols-outlined">
                        browse_gallery
                    </span> GALLERY</h4>
                <h5 class="px-2">Total : {{ $gallery['row']->count() }}</h5>

            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card shadow mb-4">
                <h4 class="p-2 bg-danger text-light" style="border-radius: 5px 5px 0px 0px;"><span class="material-symbols-outlined">
                        video_library
                    </span> VIDEO</h4>
                <h5 class="px-2">Total : {{ $video['row']->count() }}</h5>
            </div>
        </div>
        <!-- <hr>
        <h3 class="ml-3 mb-4">Popular Posts</h3>
        <div class="d-flex flex-row">
            @if(isset($data['popular']))
            @foreach($data['popular'] as $row)
            @if($loop->index < 4) <div class="col-xl-3 col-md-6">
                <div class="card shadow p-2">
                    <img src="{{asset('/uploads/post/'. $row->thumbnail)}}" alt="" style="width: 200px; height: 120px; object-fit:contain;">
                    <hr>
                    <p style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">{{$row->title}}</p>
                    <p><i class="fa fa-eye"></i> {{$row->visitor}} Views</p>
                </div>
        </div>
        @endif
        @endforeach
        @endif
    </div> -->
    </div>
</div>
@endsection

@section('js')
@endsection