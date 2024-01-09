@extends('admin/layouts/app')

@section('title', 'Create Post')

@section('css')
<style>
    .validate {
        color: red;
    }

    .validate {
        color: red;
    }

    .ck-editor__editable {
        min-height: 150px;
    }
</style>
@endsection

@section('content')

<div class="container p-4">
    <div class="row">
        <div class="col-12">
            <h2>Add {{$_panel}}</h2>
            <div class="container mt-4" style="border: 1px solid #c1c1c1;">
                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- categories -->
                    <div class="input-group mt-2">
                        <label for="category" class="form-label"><strong>Category</strong></label>
                    </div>
                    <div class="input-group">
                        @forelse($data['row'] as $category)
                        <select class="form-select mb-2" id="category" name="category_id" autofocus>
                            @if($category->status == '1')
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endif
                        </select>
                        @empty
                        <p><span class="badge badge-dark bg-danger">Data not found !!!</span></p>
                        @endforelse
                        @error('category_id')
                        <div class="validate mx-2">This field is required.</div>
                        @enderror
                    </div>

                    <!-- title -->
                    <div class="mb-4 mt-2">
                        <label for="title" class="form-label"><strong>Title</strong></label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Post Title" value="{{ old('title') }}">
                        @error('title')
                        <div class="validate m-1">{{$message}}</div>
                        @enderror
                    </div>

                    <!-- status -->
                    <div class="d-flex flex-row">
                        <div class="mb-4">
                            <label for="status"><strong>Status </strong> </label>
                        </div>
                        <div class="form-check mb-4">
                            <input type="checkbox" id="status" name="status" value="1" {{ old('status') ? 'checked' : '' }}>
                        </div>
                    </div>

                    <!-- featured -->
                    <div class="d-flex flex-row">
                        <div class="mb-4">
                            <label for="featured"><strong>Featured </strong></label>
                        </div>
                        <div class="form-check mb-4">
                            <input type="checkbox" id="featured" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
                        </div>
                    </div>

                    <!-- content -->
                    <div class="mb-4">
                        <label for="content" class="form-label"><strong>Content</strong></label>
                        <textarea class="form-control" id="content" name="content" placeholder="Content goes here...." cols="30" rows="9" style="resize: none;">{{ old('content') }}</textarea>
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

                    <div class="mt-2">
                        <a href="{{ route('post.index') }}" class="btn btn-sm btn-danger mb-4"><i class="fa fa-ban" aria-hidden="true"></i> CANCEL</a>
                        <button type="reset" class="btn btn-sm btn-secondary mb-4"><i class="fa fa-refresh" aria-hidden="true"></i> RESET</button>
                        <button type="submit" class="btn btn-sm btn-success mb-4"><i class="fa fa-paper-plane" aria-hidden="true"></i> SUBMIT</button>
                    </div>
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