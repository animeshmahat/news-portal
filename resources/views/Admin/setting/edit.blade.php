@extends('admin/layouts/app')
@section('title', 'Update Settings')
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
            <div class="card mt-3 p-3">
                <form action="{{route('admin.setting.update', ['id' => $data['row']->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="mb-4 mt-2">
                        <label for="site_name" class="form-label"><strong>Name</strong></label>
                        <input type="text" class="form-control" id="site_name" name="site_name" placeholder="Enter Site Name" value="{{ $data['row']->site_name }}">
                    </div>

                    <div class="mb-4 mt-2">
                        <label for="site_email" class="form-label"><strong>Email</strong></label>
                        <input type="text" class="form-control" id="site_email" name="site_email" placeholder="Enter Site Email" value="{{ $data['row']->site_email }}">
                    </div>

                    <div class="mb-4 mt-2">
                        <label for="site_phone" class="form-label"><strong>Phone</strong></label>
                        <input type="text" class="form-control" id="site_phone" name="site_phone" placeholder="Enter Site Title" value="{{ $data['row']->site_phone }}">
                    </div>

                    <div class="mb-4 mt-2">
                        <label for="site_mobile" class="form-label"><strong>Mobile</strong></label>
                        <input type="text" class="form-control" id="site_mobile" name="site_mobile" placeholder="Enter Site Mobile" value="{{ $data['row']->site_mobile }}">
                    </div>

                    <div class="mb-4 mt-2">
                        <label for="site_fax" class="form-label"><strong>Fax</strong></label>
                        <input type="text" class="form-control" id="site_fax" name="site_fax" placeholder="Enter Site Fax" value="{{ $data['row']->site_fax }}">
                    </div>

                    <div class="mb-4 mt-2">
                        <label for="site_first_address" class="form-label"><strong>First Address</strong></label>
                        <input type="text" class="form-control" id="site_first_address" name="site_first_address" placeholder="Enter Site First Address" value="{{ $data['row']->site_first_address }}">
                    </div>

                    <div class="mb-4 mt-2">
                        <label for="site_second_address" class="form-label"><strong>Second Address</strong></label>
                        <input type="text" class="form-control" id="site_second_address" name="site_second_address" placeholder="Enter Site Second Address" value="{{ $data['row']->site_second_address }}">
                    </div>

                    <div class="mb-4">
                        <label for="url" class="form-label"><strong>URL</strong></label>
                        <br>
                        <input type="text" name="url" id="url" value="{{$data['row']->site_url}}" disabled>
                    </div>

                    <div class="mb-4">
                        <label for="site_description" class="form-label"><strong>Description</strong></label>
                        <textarea class="form-control" id="description" name="site_description" placeholder="Description goes here...." cols="30" rows="9" style="resize: none;">{{ $data['row']->site_description }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="seo" class="form-label"><strong>SEO</strong></label>
                        <textarea class="form-control" name="seo" placeholder="Add Keywords...." cols="30" rows="5" style="resize: none;">{{ $data['row']->seo }}</textarea>
                    </div>

                    <!-- buttons -->
                    <div class="mt-2">
                        <a href="{{ route('admin.setting.index') }}" class="btn btn-sm btn-danger mb-4"><i class="fa fa-ban" aria-hidden="true"></i> CANCEL</a>
                        <button type="reset" class="btn btn-sm btn-secondary mb-4"><i class="fa fa-refresh" aria-hidden="true"></i> RESET</button>
                        <button type="submit" class="btn btn-sm btn-success mb-4"><i class="fa fa-paper-plane" aria-hidden="true"></i> UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
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