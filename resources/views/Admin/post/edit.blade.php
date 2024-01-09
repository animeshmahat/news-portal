@extends('admin.layouts.app')

@section('title', 'Edit Post')

@section('css')
<style>
    .validate {
        color: red;
    }
</style>
@endsection

@section('content')

<div class="container p-4">
    <div class="row">
        <div class="col-12">
            <h2>Edit {{$_panel}}</h2>
            <div class="container mt-4" style="border: 1px solid #c1c1c1;">
                <form action="{{route('post.update' , ['id' => $data['row']->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('POST') }}

                    <!-- categories -->
                    <div class="input-group mb-4 mt-2">
                        <label class="input-group-text" for="category"><strong>Category</strong></label>
                        <select class="form-select" id="category" name="category_id" autofocus>

                            @if(isset($category['categories']))
                            @foreach($category['categories'] as $category)
                            @if($category->status == '1')
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @elseif($category->status == '0')
                            <option value="{{ $category->id }}" class="text-danger" disabled>{{ $category->title }} (unavialable)</option>
                            @endif
                            @endforeach
                            @endif

                        </select>
                    </div>

                    <!-- title -->
                    <div class="mb-4 mt-2">
                        <label for="title" class="form-label"><strong>Title</strong></label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Post Title" value="{{ $data['row']->title }}">
                        @error('title')
                        <div class="validate m-1">{{$message}}</div>
                        @enderror
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

                    <!-- content -->
                    <div class="mb-4">
                        <label for="content" class="form-label"><strong>Content</strong></label>
                        <textarea class="form-control" id="content" name="content" placeholder="Content goes here...." cols="30" rows="9" style="resize: none;">{{ $data['row']->content }}</textarea>
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

                    <a href="{{ route('post.index') }}" class="btn btn-sm btn-danger mb-4"><i class="fa fa-ban" aria-hidden="true"></i> CANCEL</a>
                    <button type="submit" class="btn btn-sm btn-warning mb-4"><i class="fa-solid fa-pen-nib" aria-hidden="true"></i> UPDATE</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        })
</script>
@endsection