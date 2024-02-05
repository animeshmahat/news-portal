@extends('admin/layouts/app')
@section('title', 'Create User')
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
                <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-2 mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Enter Name">
                        @error('name')
                        <p class="alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-2 mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Enter Email">
                        @error('email')
                        <p class="alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-2 mb-2">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}" placeholder="Enter Username">
                        @error('username')
                        <p class="alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-2 mb-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                        @error('password')
                        <p class="alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-2 mb-2">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm-password" id="confirm_password">
                        @error('password')
                        <p class="alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-2 mb-2">
                        <label for="mobile" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" name="mobile" id="mobile" value="{{ old('mobile') }}" placeholder="Enter Mobile Number">
                        @error('mobile')
                        <p class="alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-2 mb-2">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Enter Image" accept="image/png, image/gif, image/jpeg">
                        @error('image')
                        <p class="alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="d-flex flex-row">
                        <div class="mt-2">
                            <label for="status">Status</label>
                        </div>
                        <div class="form-check mt-2">
                            <input type="checkbox" id="status" name="status" value="1" {{ old('status') ? 'checked' : '' }}>
                        </div>
                    </div>
                    <hr>
                    <div class="mt-2">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-danger mb-4"><i class="fa fa-ban" aria-hidden="true"></i> CANCEL</a>
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
@endsection