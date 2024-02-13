@extends('admin.layouts.app')
@section('title', 'View Gallery')
@section('css')
<style>
    .img-thumbnail {
        max-width: 220px;
        max-height: 200px;
        border: 1px solid #c1c1c1;
        object-fit: cover;
        transition: transform 0.2s ease-in-out;
        padding: auto;
    }

    .img-thumbnail:hover {
        transform: scale(1.1) !important;
    }

    .img-images {
        max-width: 250px;
        max-height: 200px;
        object-fit: cover;
        transition: transform 0.2s ease-in-out;
        padding: auto;
    }

    .img-images:hover {
        transform: scale(1.1) !important;
    }

    .v1 {
        border-left: 1px solid #c1c1c1;
        height: inherit;
    }

    .h1 {
        border-bottom: 1px solid #c1c1c1;
        width: inherit;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-4">
            <h2>{{ $_panel }} View</h2>
            <div class="container my-4 p-3" style="border: 1px solid #c1c1c1; border-radius:10px;">
                <div class="d-flex flex-row">
                    <div class="d-flex flex-column">
                        <div class="h1"></div>
                        <h3 class="mt-auto mx-auto" style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">{!! $data['row']->name !!}</h3>
                        <div class="h1"></div>
                        <img src="{{ asset('/uploads/gallery/' . $data['row']->thumbnail) }}" alt="thumbnail" class="img-thumbnail mb-auto">
                    </div>
                    <div class="v1 mx-3"></div>
                    <div class="d-flex flex-column">
                        <div class="col mt-2 mb-4">
                            <button type="button" class="btn btn-dark mx-2" disabled><i class="fa-solid fa-images"></i> IMAGES</button>
                            <hr>
                            <div id="carousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @if(is_array($data['row']->images) && count($data['row']->images) > 0)
                                    @foreach($data['row']->images as $key => $image)
                                    <div class="carousel-item active {{$key == 0 ? 'active' : ''}}">
                                        <img class="d-block w-50" src="{{ asset($image) }}" alt="images">
                                    </div>
                                    @endforeach
                                    @else
                                    <p class="alert" role="alert">No images found</p>
                                    @endif
                                </div>
                                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <a href="{{ route('admin.gallery.index') }}" class="btn btn-primary btn-sm mt-2 mb-4"><i class="fa-solid fa-backward"></i> RETURN</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection