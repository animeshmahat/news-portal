@extends('admin.layouts.app')

@section('title', 'Edit Category')

@section('css')
<style>
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
            <h2>Edit {{$_panel}}</h2>
            <div class="container mt-4" style="border: 1px solid #c1c1c1;">
                <form action="{{route('admin.category.update', ['id' =>$data['row']->id] )}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('POST') }}
                    <div class="mb-4 mt-2">
                        <label for="title" class="form-label"><strong>Category Title :</strong></label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter New Category Title" value="{{ $data['row']->title }}">
                        @error('title')
                        <p class="validate m-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="description" class="form-label"><strong>Category Description :</strong></label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="9" style="resize: none;" placeholder="Enter Category Description">{{ $data['row']->description }}</textarea>
                        @error('description')
                        <p class="validate m-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="d-flex flex-row">
                        <div class="mb-4">
                            <p><strong>Status :</strong></p>
                        </div>
                        <div class="form-check mb-4">
                            <input type="checkbox" id="status" name="status" value="1" {{ $data['row']-> status ? 'checked' : '' }}>
                        </div>
                    </div>
                    <a href="{{ route('admin.category.index') }}" class="btn btn-sm btn-success mb-4"><i class="fa fa-ban" aria-hidden="true"></i> CANCEL</a>
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