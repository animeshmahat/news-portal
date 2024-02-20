@extends('admin.layouts.app')
@section('title', 'Create Album')
@section('css')
<link type="text/css" rel="stylesheet" href="http://example.com/image-uploader.min.css">
@endsection
@section('content')
<div class="container p-4">
    <h3 class="mb-4">Add Photos to Gallery</h3>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.album.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group mt-2">
                    <label for="galleries" class="form-label"><strong>Gallery</strong></label>
                </div>
                <div class="input-group mb-4">
                    <select class="form-select" id="galleries" name="gallery_id" autofocus>
                        <option value="" selected>Select One</option>
                        @if(isset($data['row']))
                        @foreach($data['row'] as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                        @else
                        <p>Data not found</p>
                        @endif
                    </select>
                </div>
                @error('gallery_id')
                <div class="alert alert-danger m-1">{{$message}}</div>
                @enderror

                <!-- <div class="mb-4">
                    <label for="images" class="form-label"><strong>Images</strong></label>
                    <input type="file" class="form-control" id="images" name="images[]" onchange="loadFile(event)" multiple placeholder="Upload Images" accept="image/png, image/gif, image/jpeg">
                    <br>
                    <strong>Preview</strong><br>
                    <div id="output"></div>
                    @error('images')
                    <div class="validate m-1">{{ $message }}</div>
                    @enderror
                </div> -->

                <div class="input-field">
                    <label class="active">Photos</label>
                    <div class="input-images" style="padding-top: .5rem;" name="images[]"></div>
                </div>
                <hr>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!-- buttons -->
                <div class="mt-2">
                    <a href="{{ route('admin.album.index') }}" class="btn btn-sm btn-danger mb-4"><i class="fa fa-ban" aria-hidden="true"></i> CANCEL</a>
                    <button type="reset" class="btn btn-sm btn-secondary mb-4"><i class="fa fa-refresh" aria-hidden="true"></i> RESET</button>
                    <button type="submit" class="btn btn-sm btn-success mb-4"><i class="fa fa-paper-plane" aria-hidden="true"></i> SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="http://example.com/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript" src="http://example.com/image-uploader.min.js"></script>
<script>
    $(document).ready(function() {
        $('.input-images').imageUploader();
    });
</script>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.innerHTML = '';
        var files = event.target.files;
        for (var i = 0; i < files.length; i++) {
            var img = document.createElement('img');
            img.src = URL.createObjectURL(files[i]);
            img.style.maxWidth = '300px';
            img.style.maxHeight = '180px';
            output.appendChild(img);
        }
        output.onload = function() {
            URL.revokeObjectURL(output.src);
        }
    };
</script>
@endsection