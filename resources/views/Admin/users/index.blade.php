@extends('admin/layouts/app')

@section('title', 'Users')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
<style>
    .profile:hover {
        transform: scale(1.05);
        transition: 0.25s ease-in-out;
    }
</style>
@endsection

@section('content')
<div class="container-fluid px-4">
    <h2 class="mt-4">Users Table</h2>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @endif
    @if(session('update_success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('update_success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @endif
    @if(session('delete_success'))
    <div class="alert alert-danger alert-dismissible fade-show" role="alert">
        {{ session('delete_success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @endif
    <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-sm"><i class="fa fa-add"></i>Add User</a>
    <div class="card mb-4 mt-3">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Users
        </div>
        <div class="card-body">
            <table id="datatablesSimple">

                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Mobile</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Mobile</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>

                <tbody>
                    @if(isset($data['row']))
                    @foreach ($data['row'] as $key=>$row)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $row->name }}</td>
                        <td>
                            @if($row->image)
                            <img src="{{ asset('/uploads/user_image/' . $row->image) }}" alt="image" id="image" style="width: 100px; height:100px; object-fit:contain" class="profile card">
                            @else
                            <p class="card p-2 text-center"><i class="fa-regular fa-file-image"></i> Not Found
                            </p>
                            @endif
                        </td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->username }}</td>
                        <td>{{ $row->mobile }}</td>
                        <td>
                            @if ( $row-> status == "1" )
                            <span class="badge bg-success">ACTIVE</span>
                            @elseif ( $row -> status == "0" )
                            <span class="badge bg-danger">INACTIVE</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex flex-row">
                                <a href="{{ route('admin.users.edit' , ['id' => $row->id]) }}" class="btn btn-warning btn-sm m-1"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Edit</a>
                                <a href="{{ route('admin.users.delete', ['id' => $row->id]) }}" class="btn btn-danger btn-sm m-1" onclick="return confirm('Delete user permanently?')"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>

            </table>
        </div>
    </div>
</div>

@endsection
<script src="{{ asset('assets/admin/js/datatables-simple-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
@section('js')
@endsection