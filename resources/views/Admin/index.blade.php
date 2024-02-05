@extends('admin.layouts.app')
@section('title','Dashboard')
@section('css')
@endsection
@section('content')
<div class="container-fluid px-4">
    <h2 class="mt-4">News Dashboard</h2>
    <p id="date"></p>
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
                <h4 class="p-2 text-light" style="background-color: #353535; border-radius: 5px 5px 0px 0px;">CATEGORY</h4>
                <h5 class="px-2">Total : {{ $category['row']->count() }}</h5>
                <span style="border-bottom: 1px solid #c1c1c1;"></span>
                @foreach($category['row'] as $category)
                <p class="px-2 mt-2">
                    {{ $category->title }}
                </p>
                <span style="border-bottom: 1px solid #c1c1c1;"></span>
                @endforeach
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card shadow mb-4">
                <h4 class="p-2 text-light" style="background-color: #353535; border-radius: 5px 5px 0px 0px;">POST</h4>
                <h5 class="px-2">Total : {{ $post['row']->count() }}</h5>
                <span style="border-bottom: 1px solid #c1c1c1;"></span>
                @foreach($post['row'] as $post)
                <p class="px-2 mt-2">
                    {{ $post->title}}
                </p>
                <span style="border-bottom: 1px solid #c1c1c1;"></span>
                @endforeach
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card shadow mb-4">
                <h4 class="p-2 text-light" style="background-color: #353535; border-radius: 5px 5px 0px 0px;">GALLERY</h4>
                <h5 class="px-2">Total : {{ $gallery['row']->count() }}</h5>
                <span style="border-bottom: 1px solid #c1c1c1;"></span>
                @foreach($gallery['row'] as $gallery)
                <p class="px-2 mt-2">
                    {{ $gallery->name }}
                </p>
                <span style="border-bottom: 1px solid #c1c1c1;"></span>
                @endforeach
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card shadow mb-4">
                <h4 class="p-2 text-light" style="background-color: #353535; border-radius: 5px 5px 0px 0px;">VIDEO</h4>
                <h5 class="px-2">Total : {{ $video['row']->count() }}</h5>
                <span style="border-bottom: 1px solid #c1c1c1;"></span>
                @foreach($video['row'] as $video)
                <p class="px-2 mt-2">
                    {{ $video->title }}
                </p>
                <span style="border-bottom: 1px solid #c1c1c1;"></span>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    const date = new Date();
    const options = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: 'numeric',
        minute: 'numeric',
        hour12: true
    };
    document.getElementById("date").innerHTML = date.toLocaleString('en-UK', options);
</script>
@endsection