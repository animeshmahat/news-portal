@extends('admin/layouts/app')

@section('title', 'Users')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="container-fluid px-4">
    <h2 class="mt-4">Users Table</h2>

    <div class="card mb-4 mt-3">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Users
        </div>
        <div class="card-body">
            <table id="datatablesSimple">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Mobile</th>
                        <th>Status</th>
                        <th>Image</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Mobile</th>
                        <th>Status</th>
                        <th>Image</th>
                    </tr>
                </tfoot>

                <tbody>
                    @if(isset($data['row']))
                    @foreach ($data['row'] as $key=>$row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
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
                        <td>{{ $row->image }}</td>
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