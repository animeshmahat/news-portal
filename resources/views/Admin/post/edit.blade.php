@extends('admin.layouts.app')

@section('title', 'Edit Post')

@section('css')
<style>
    .validate {
        color: red;
    }

    .v1 {
        border-left: 1px dashed #c1c1c1;
        height: inherit;
    }
</style>
@endsection

@section('content')

<div class="container p-4">
    <div class="row">
        <div class="col-12">
            <h2>Edit {{$_panel}}</h2>
            <div class="card mt-3 p-3">
                <form action="{{route('admin.post.update' , ['id' => $data['row']->id])}}" method="POST" enctype="multipart/form-data">

                    @csrf
                    {{ method_field('PUT') }}

                    <!-- categories -->
                    <div class="input-group mt-2">
                        <label for="category" class="form-label"><strong>Category</strong></label>
                    </div>
                    <div class="input-group">
                        <select class="form-select" id="category" name="category_id" autofocus>
                            <option value="" selected>Select One</option>
                            @if(isset($data['category']))
                            @foreach($data['category'] as $row)
                            <option value="{{ $row->id }}" {{ $row->id == $data['row']->category_id ? 'selected' : '' }}>{{ $row->title }}</option>
                            @endforeach
                            @else
                            <p>Data not found</p>
                            @endif
                        </select>
                    </div>
                    @error('category_id')
                    <div class="validate mx-1 mb-4">Please select a category.</div>
                    @enderror

                    <!-- title -->
                    <div class="mb-4 mt-2">
                        <label for="title" class="form-label"><strong>Title</strong></label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Post Title" value="{{ $data['row']->title }}">
                        @error('title')
                        <div class="validate m-1">{{$message}}</div>
                        @enderror
                    </div>

                    <!-- URL -->
                    <div class="mb-4">
                        <label for="url" class="form-label"><strong>URL</strong></label>
                        <input type="url" class="form-control" id="url" name="url" placeholder="Enter URL" value="{{ $data['row']->url }}">
                        @error('url')
                        <div class="validate m-1">{{$$message}}</div>
                        @enderror
                    </div>

                    <!-- content -->
                    <div class="mb-4">
                        <label for="content" class="form-label"><strong>Content</strong></label>
                        <textarea class="form-control" id="description" name="content" placeholder="Content goes here...." cols="30" rows="9" style="resize: none;">{{ $data['row']->content }}</textarea>
                        @error('content')
                        <div class="validate m-1">{{$message}}</div>
                        @enderror
                    </div>

                    <!-- thumbnail -->
                    <div class="mb-4">
                        <label for="thumbnail" class="form-label"><strong>Thumbnail</strong></label>
                        <input type="file" class="form-control" id="thumbnail" name="thumbnail" placeholder="Enter Post Thumbnail" accept="image/png, image/gif, image/jpeg">
                        @error('thumbnail')
                        <div class="validate m-1">{{$message}}</div>
                        @enderror
                    </div>

                    <!-- Current image preview -->
                    <div class="mb-4 d-flex justify-content-center" style="max-width:fit-content;">
                        @if( $data['row']->thumbnail )
                        <strong class="mt-auto mb-auto">Current Thumbnail</strong>
                        <div class="v1 mx-3"></div>
                        <img id="image" src="{{ asset('/uploads/post/' . $data['row']->thumbnail) }}" alt="" class="img img-responsive p-1" style="border: 1px solid #c1c1c1; border-radius:10px; max-width:250px; max-height:180px;">
                        @else
                        <p>Thumbnail Not Found!!!</p>
                        @endif
                        <div class="v1 mx-3"></div>
                    </div>

                    <!-- status -->
                    <div class="d-flex flex-row">
                        <div class="mb-2">
                            <p><strong>Status</strong> </p>
                        </div>
                        <div class="form-check mb-2">
                            <input type="checkbox" id="status" name="status" value="1" {{ $data['row']-> status ? 'checked' : '' }}>
                        </div>
                    </div>

                    <!-- featured -->
                    <div class="d-flex flex-row">
                        <div class="mb-2">
                            <p><strong>Featured </strong></p>
                        </div>
                        <div class="form-check mb-2">
                            <input type="checkbox" id="featured" name="featured" value="1" {{ $data['row']-> featured ? 'checked' : '' }}>
                        </div>
                    </div>

                    <!-- buttons -->
                    <a href="{{ route('admin.post.index') }}" class="btn btn-sm btn-danger mb-4"><i class="fa fa-ban" aria-hidden="true"></i> CANCEL</a>
                    <button type="submit" class="btn btn-sm btn-warning mb-4"><i class="fa-solid fa-pen-nib" aria-hidden="true"></i> UPDATE</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description', options);
    CKEDITOR.replace('description', options);
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
</script>
@endsection