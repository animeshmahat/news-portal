@extends('admin/layouts/app')

@section('title', 'Create Gallery')

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
            <h2>Add {{$_panel}}</h2>
            <div class="card mt-3 p-3">
                <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- name  -->
                    <div class="mb-4 mt-2">
                        <label for="name" class="form-label"><strong>Gallery Name</strong></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter New Gallery Name" value="{{ old('name') }}" autofocus>
                        @error('name')
                        <p class="validate m-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- thumbnail -->
                    <div class="mb-4">
                        <label for="thumbnail" class="form-label"><strong>Thumbnail</strong></label>
                        <input type="file" class="form-control" id="thumbnail" name="thumbnail" placeholder="Upload thumbnail" accept="image/png, image/gif, image/jpeg">
                        @error('images')
                        <div class="validate m-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- images -->
                    <!-- <div class="mb-4">
                        <label for="images" class="form-label"><strong>Images</strong></label>
                        <input type="file" class="form-control" id="images" name="images[]" multiple placeholder="Upload Images" accept="image/png, image/gif, image/jpeg">
                        @error('images')
                        <div class="validate m-1">{{ $message }}</div>
                        @enderror
                    </div> -->

                    <!-- status -->
                    <div class="d-flex flex-row">
                        <div class="mb-4">
                            <label for="status"><strong>Status</strong> </label>
                        </div>
                        <div class="form-check mb-4">
                            <input type="checkbox" id="status" name="status" value="1" {{ old('status') ? 'checked' : '' }}>
                        </div>
                    </div>

                    <!-- buttons -->
                    <div class="mt-2">
                        <a href="{{ route('admin.gallery.index') }}" class="btn btn-sm btn-danger mb-4"><i class="fa fa-ban" aria-hidden="true"></i> CANCEL</a>
                        <button type="reset" class="btn btn-sm btn-secondary mb-4"><i class="fa fa-refresh" aria-hidden="true"></i> RESET</button>
                        <button type="submit" class="btn btn-sm btn-success mb-4"><i class="fa fa-paper-plane" aria-hidden="true"></i> SUBMIT</button>
                    </div>

                    <!-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif -->

                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
@endsection