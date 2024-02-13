@extends('admin/layouts/app')

@section('title', 'Edit Gallery')

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
            <div class="card mt-3 p-3">
                <form action="{{ route('admin.gallery.update', ['id' => $data['row']->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}

                    <!-- name  -->
                    <div class="mb-4 mt-2">
                        <label for="name" class="form-label"><strong>Gallery Name</strong></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter New Gallery name" value="{{ $data['row']->name }}" autofocus>
                        @error('name')
                        <p class="validate m-1">{{ $message }}</p>
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
                    <div class="mb-4" style="max-width:fit-content;">
                        @if( $data['row']->thumbnail )
                        <strong>Current Thumbnail </strong> <img src="{{ asset('/uploads/gallery/' . $data['row']->thumbnail) }}" style="border: 1px solid #c1c1c1; border-radius:10px; max-width:250px; max-height:200px;" alt="" class="img img-responsive p-2">
                        @else
                        <p>Thumbnail Not Found!!!</p>
                        @endif
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
                        <div class="mb-2">
                            <p><strong>Status</strong> </p>
                        </div>
                        <div class="form-check mb-2">
                            <input type="checkbox" id="status" name="status" value="1" {{ $data['row']-> status ? 'checked' : '' }}>
                        </div>
                    </div>

                    <!-- buttons -->
                    <a href="{{ route('admin.gallery.index') }}" class="btn btn-sm btn-danger mb-4"><i class="fa fa-ban" aria-hidden="true"></i> CANCEL</a>
                    <button type="submit" class="btn btn-sm btn-warning mb-4"><i class="fa-solid fa-pen-nib" aria-hidden="true"></i> UPDATE</button>

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