@extends('admin.layouts.app')

@section('title', 'Gallery')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
<style>
    #thumbnail {
        max-width: 90px;
        max-height: 70px;
        border: 1px solid #c1c1c1;
        padding: 3px;
        border-radius: 6px;
    }
</style>
@endsection

@section('content')

<div class="container-fluid px-4">

    <h2 class="mt-4">{{$_panel}} Table</h2>

    <a href="{{ route('admin.gallery.create') }}" class="btn btn-sm btn-success mt-2 mb-2"><i class="fa-solid fa-plus"></i> Add Gallery</a>

    <!-- create, edit, and update alerts -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('update_success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('update_success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('delete_success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('delete_success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card mb-4 mt-2">

        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Gallery
        </div>

        <div class="card-body">

            <table id="datatablesSimple">

                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Gallery Name</th>
                        <th>Thumbnail</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>S.N</th>
                        <th>Gallery Name</th>
                        <th>Thumbnail</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>

                <tbody>
                    @forelse($data['row'] as $key => $row)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $row->name }}</td>
                        <td>
                            <img src="{{ asset('/uploads/gallery/' . $row->thumbnail) }}" alt="thumbnail" id="thumbnail">
                        </td>
                        <td>
                            @if ( $row-> status == "1" )
                            <span class="badge rounded-pill bg-success">ACTIVE</span>
                            @elseif ( $row -> status == "0" )
                            <span class="badge rounded-pill bg-danger">INACTIVE</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.gallery.view', ['id' => $row->id]) }}" class="btn btn-primary btn-sm m-1"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;View</a>
                                <a href="{{ route('admin.gallery.edit', ['id' => $row->id]) }}" class="btn btn-warning btn-sm m-1"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Edit</a>
                                <a href="{{ route('admin.gallery.delete', ['id' => $row->id]) }}" class="btn btn-danger btn-sm m-1" onclick="return confirm('Permanently delete this record?')"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete</a>
                            </div>
                        </td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection

@section('js')
<script src="{{ asset('assets/admin/js/datatables-simple-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
@endsection