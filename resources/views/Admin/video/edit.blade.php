@extends('admin.layouts.app')

@section('title' ,'Edit Video')
@section('css')
@endsection

@section('content')
<div class="container px-4">
    <div class="row">
        <div class="col">
            <h2 class="mt-4">Edit {{$_panel}}</h2>
            <div class="card p-3 mt-3">
                <form action="{{ route('admin.video.update', ['id' => $data['row']->id ]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="mb-2">
                        <label for="title" class="form-label"><strong>VIDEO TITLE</strong></label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Enter Video Title" value="{{ $data['row']->title }}">
                        @error('title')
                        <p class="alert alert-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mt-2 mb-2">
                        <label for="url" class="form-label"><strong>URL</strong></label>
                        <input type="text" name="url" id="url" class="form-control" placeholder="Enter Video URL" value="{{ $data['row']->url }}">
                    </div>
                    <div class="d-flex flex-column">
                        <strong class="mb-2">CURRENT VIDEO PREVIEW</strong>
                        <iframe src="https://www.youtube.com/embed/{{$data['row']->video_id}}" frameborder="0" width="300px" height="160px"></iframe>
                    </div>
                    <hr>
                    <div class="mt-2 mb-2 d-flex flex-row">
                        <label for="status" class="form-label mr-4"><strong>STATUS</strong></label>
                        <div class="form-check form-switch">
                            <input type="checkbox" name="status" id="status" class="form-check-input" role="switch" value="1" {{ $data['row']->status ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="mt-2 mb-2 d-flex flex-row">
                        <label for="featured" class="form-label mr-4"><strong>FEATURED</strong></label>
                        <div class="form-check form-switch">
                            <input type="checkbox" name="featured" id="featured" class="form-check-input" role="switch" value="1" {{ $data['row']->featured ? 'checked' : '' }}>
                        </div>
                    </div>
                    <hr>
                    <div class="mt-2 mb-2">
                        <a href="{{ route('admin.video.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-ban"></i> CANCEL</a>
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-paper-plane"></i> UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection