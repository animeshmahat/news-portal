@extends('admin.layouts.app')

@section('title' ,'Profile')
@section('css')
<style>
    .validate {
        color: red;
    }
</style>
@endsection

@section('content')
<div class="container d-flex flex-column">
    <h2 class="align-top p-2 mt-3">{{$_panel}} Settings</h2>
    <div class="row">
        <!-- information -->
        <div class="col-6 card shadow mb-auto mx-3 p-4">
            <h4><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;Edit {{$_panel}} Information</h4>
            <hr>
            <form action="{{route('admin.profile.update', ['id' => $data['row']->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}

                <div class="form-group mb-3">
                    <label for="name" class="form-label"><strong>Name</strong></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $data['row']->name }}">
                    @error('name')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3 mb-3">
                    <label for="email" class="form-label"><strong>Email</strong></label>
                    <input type="email" disabled class="form-control" name="email" value="{{ $data['row']->email }}">
                    @error('email')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3 mb-3">
                    <label for="username" class="form-label"><strong>Username</strong></label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ $data['row']->username }}">
                    @error('username')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3 mb-3">
                    <label for="mobile" class="form-label"><strong>Mobile</strong></label>
                    <input type="tel" name="mobile" id="mobile" class="form-control" value="{{ $data['row'] ->mobile}}">
                    @error('mobile')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3 mb-3">
                    <label for="image" class="form-label"><strong>Image</strong></label>
                    <input type="file" name="image" id="image" onchange="loadFile(event)" class="form-control" accept="image/png, image/gif, image/jpeg">
                    <strong>Preview</strong><br>
                    <img id="output" style="max-width: 200px; max-height: 120px;" />
                    @error('image')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3 mb-3">
                    <strong>Current image preview</strong><br>
                    @if($data['row']->image)
                    <img src="{{ asset('/uploads/user_image/' . $data['row']->image) }}" alt="" style="max-width: 200px; max-height:120px;">
                    @else
                    <h4 class="alert alert-warning"><i class="fa-regular fa-file-image"></i> User Image Not Found!!!</h4>
                    @endif
                </div>
                <div class="mt-3 mb-2 d-flex flex-row">
                    <label for="status" class="form-label"><strong>Status</strong></label>
                    <div class="form-check form-switch ml-4">
                        <input class="form-check-input" type="checkbox" role="switch" id="status" name="status" value="1" {{ $data['row']-> status ? 'checked' : '' }}>
                    </div>
                </div>
                <hr>
                <div>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-success btn-sm"><i class="fa fa-ban"></i> CANCEL</a>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> UPDATE</button>
                </div>
            </form>
        </div>
        <!-- password change  -->
        <div class=" col-5 card shadow mb-auto mx-3 p-4">
            <h4><i class="fa fa-key" aria-hidden="true"></i>&nbsp;Change Password
            </h4>
            <hr>
            <form action="{{ route('admin.profile.passwordChange', ['id' => $data['row']->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="form-group mb-3">
                    <label for="current_password" class="form-label"><strong>Current Password</strong></label>
                    <input type="password" class="form-control" id="current_password" name="current_password" value="" placeholder="Enter Your Current Password">
                    @error('current_password')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3 mb-3">
                    <label for="password" class="form-label"><strong>New Password</strong></label>
                    <input type="password" class="form-control" id="password" name="password" value="" placeholder="Enter Your New Password">
                </div>
                @error('password')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
                <div class="form-group mt-3 mb-3">
                    <label for="confirm_password" class="form-label"><strong>Confirm Password</strong></label>
                    <input type="password" class="form-control" id="confirm_password" name="password_confirmation" value="" placeholder="Re-enter Your New Password">
                </div>
                <hr>
                <div>
                    <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> CLEAR</button>
                    <button type="submit" class="btn btn-sm btn-secondary"><i class="fa fa-wrench" aria-hidden="true"></i> CHANGE</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src);
        }
    };
</script>
@endsection