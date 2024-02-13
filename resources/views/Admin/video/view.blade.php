@extends('admin.layouts.app')

@section('title', 'Video View')
@section('css')
@endsection

@section('content')
<div class="container mt-2 p-3">
    <div class="row">
        <div class="col px-3">
            <div>
                <h2 style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">{{$data['row']->title}}</h2 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">
                <hr>
            </div>
            <div class="d-flex flex-row">
                <iframe src="https://www.youtube.com/embed/{{$data['row']->video_id}}" frameborder="0" width="700px" height="380px"></iframe>
                <div class="ml-4" style="border: 1px solid #c1c1c1;"></div>
                <div class="ml-4">
                    <p>
                        <strong>Status</strong>&nbsp;
                        @if($data['row']->status == "1")
                        <span class="badge rounded-pill badge-success">ACTIVE</span>
                        @elseif($data['row']->status == "0")
                        <span class="badge rounded-pill badge-danger">INACTIVE</span>
                        @endif
                    </p>
                    <hr>
                    <p>
                        <strong>Featured</strong>&nbsp;
                        @if($data['row']->featured == "1")
                        <span class="badge rounded-pill badge-success">ACTIVE</span>
                        @elseif($data['row']->featured == "0")
                        <span class="badge rounded-pill badge-danger">INACTIVE</span>
                        @endif
                    </p>
                    <hr>
                    <a href="{{ route('admin.video.index') }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-backward"></i> RETURN</a>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection