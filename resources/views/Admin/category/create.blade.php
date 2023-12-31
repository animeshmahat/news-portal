@extends('admin.layouts.app')

@section('title', 'Create Category')

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
            <h2>Add {{$_panel}}</h2>
            <div class="container mt-4" style="border: 1px solid #c1c1c1;">
                <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4 mt-2">
                        <label for="title" class="form-label"><strong>Category Title :</strong></label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter New Category Title" value="{{ old('title') }}" autofocus>
                        @error('title')
                        <p class="validate m-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="description" class="form-label"><strong>Category Description :</strong></label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="9" style="resize: none;" placeholder="Enter Category Description">{{old('description')}}</textarea>
                        @error('description')
                        <p class="validate m-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="d-flex flex-row">
                        <div class="mb-4">
                            <p><strong>Status :</strong></p>
                        </div>
                        <div class="form-check mb-4">
                            <input type="checkbox" id="status" name="status" value="1" {{ old('status') ? 'checked' : '' }}>
                        </div>
                    </div>
                    <a href="{{ route('category.index') }}" class="btn btn-sm btn-danger mb-4"><i class="fa fa-ban" aria-hidden="true"></i> CANCEL</a>
                    <button type="reset" class="btn btn-sm btn-secondary mb-4"><i class="fa fa-refresh" aria-hidden="true"></i> RESET</button>
                    <button type="submit" class="btn btn-sm btn-success mb-4"><i class="fa fa-paper-plane" aria-hidden="true"></i> SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        })
</script>
@endsection