@extends('admin/layouts/app')

@section('title', 'View Post')
@section('css')
<style>
    .img-thumbnail {
        max-width: 200px;
        border: 1px solid #000000;
        transition: transform 0.05s ease-in-out;
    }

    .img-thumbnail:hover {
        margin-left: 40px;
        transform: scale(1.5) !important;
    }
</style>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mt-4">
            <h2>{{ $_panel }} View</h2>

            <div class="container mt-4 p-3" style="border: 1px solid #c1c1c1;">

                <div class="mt-2 mb-4">
                    <p><strong>Thumbnail :</strong></p>
                    <img src="{{ asset('uploads/' . $data['row']->thumbnail) }}" alt="thumbnail" class="img-thumbnail">
                    <hr>
                </div>

                <div class="mt-2 mb-4">
                    <p><strong>Title :</strong></p>
                    <div class="d-inline-flex">{{ $data['row']->title }}</div>
                    <hr>
                </div>

                <div class="mt-2 mb-4">
                    <p><strong>Slug :</strong></p>
                    <div class="d-inline-flex">{{ $data['row']->slug }}</div>
                    <hr>
                </div>

                <div class="mt-2 mb-4">
                    <p><strong>Content :</strong></p>
                    <div class="d-inline-flex">{!! html_entity_decode($data['row']->content) !!}</div>
                    <hr>
                </div>

                <div class="mt-2 mb-4">
                    <p><strong>Status :</strong>
                        @if($data['row']->status == '1')
                        <span class="badge rounded-pill bg-success">ACTIVE</span>
                        @elseif($data['row']->status == '0')
                        <span class="badge rounded-pill bg-danger">INACTIVE</span>
                        @endif
                    </p>
                    <hr>
                </div>

                <div class="mt-2 mb-4">
                    <p><strong>Featured :</strong>
                        @if($data['row']->status == '1')
                        <span class="badge rounded-pill bg-success">ACTIVE</span>
                        @elseif($data['row']->status == '0')
                        <span class="badge rounded-pill bg-danger">INACTIVE</span>
                        @endif
                    </p>
                    <hr>
                </div>

                <div class="mt-2 mb-4">
                    <p><strong>Visitors :</strong></p>
                    <div class="d-inline-flex">{{ $data['row']->visitor }}</div>
                </div>
            </div>
            <a href="{{route('post.index')}}" class="btn btn-outline-secondary mt-2 mb-4"><i class="fa-solid fa-backward"></i> RETURN</a>

        </div>
    </div>
</div>
@endsection

@section('js')
@endsection