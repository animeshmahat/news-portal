@extends('admin.layouts.app')

@section('title', 'View Gallery')

@section('css')
<style>
    .img-images {
        float: left;
        max-width: 450px;
        max-height: 250px;
        border: 1px solid #c1c1c1;
        transition: transform 0.2s ease-in-out;
        border-radius: 10px;
    }

    .img-images:hover {
        transform: scale(1.1) !important;
    }

    .section {
        border: 1px solid #c1c1c1;
        border-radius: 10px;
    }

    #title {
        max-width: fit-content;
        text-align: center;
        border: 1px solid #c1c1c1;
        padding: 2vh;
        border-radius: 10px;
    }
</style>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mt-4">
            <h2>{{ $_panel }} View ({{$data['row']->gallery->name}})</h2>

            <div class="section mt-4 p-3">

                <div class="d-flex flex-column p-2">

                    <div class="container" id="title">
                        @if($data['row']->gallery)
                        <img src="{{ asset('/uploads/gallery/' . $data['row']->gallery->thumbnail) }}" alt="Thumbnail" width="150px;" class="mb-2">
                        <br>
                        @else
                        Not found
                        @endif
                    </div>
                    <hr>
                    <div class="section mt-2 mb-2">
                        <h2 style="text-align: center;"><i class="fa-solid fa-image mt-4" aria-hidden="true"></i>
                            IMAGES</h2>
                        <hr>
                        @if(is_array($data['row']->images) && count($data['row']->images) > 0)
                        @foreach($data['row']->images as $image)
                        <img src="{{ asset($image) }}" alt="images" class="img-images m-3 p-2">
                        @endforeach
                        @else
                        <p>No images found</p>
                        @endif
                    </div>
                </div>
                <a href="{{ route('admin.album.index') }}" class="btn btn-outline-primary ml-2"><i class="fa-solid fa-backward"></i> RETURN</a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
@endsection