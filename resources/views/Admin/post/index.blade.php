@extends('admin/layouts/app')
@section('title', 'Posts')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<style>
    #thumbnail {
        width: 90px;
        height: 60px;
        object-fit: contain;
        border: 1px solid #c1c1c1;
        border-radius: 5px;
    }
</style>
@endsection
@section('content')
<div class="container-fluid px-4">
    <h2 class="mt-4">{{$_panel}} Table</h2>
    <a href="{{ route('admin.post.create') }}" class="btn btn-sm btn-success mt-2 mb-2"><i class="fa-solid fa-plus"></i> Add Posts </a>
    <!-- create, edit and update alerts -->
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
            Posts
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>User</th>
                        <th>Category</th>
                        <th>Thumbnail</th>
                        <th>Visitors</th>
                        <th>Status</th>
                        <th>Featured</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>User</th>
                        <th>Category</th>
                        <th>Thumbnail</th>
                        <th>Visitors</th>
                        <th>Status</th>
                        <th>Featured</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @if(isset($data['row']))
                    @foreach($data['row'] as $key=>$row)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->user->name ?? 'not found' }}</td>
                        <td>{{ $row->category->title ?? 'not found' }}</td>
                        <td>
                            <img src="{{ asset('/uploads/post/' . $row->thumbnail) }}" alt="thumbnail" id="thumbnail">
                        </td>
                        <td>{{ $row->visitor }}</td>
                        <td>
                            <input data-id="{{ $row->id }}" class="status-toggle" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="ACTIVE" data-off="INACTIVE" data-size="xs" {{ $row->status ? 'checked' : '' }}>
                        </td>
                        <td>
                            <input data-id="{{ $row->id }}" class="featured-toggle" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="ACTIVE" data-off="INACTIVE" data-size="xs" {{ $row->featured ? 'checked' : '' }}>
                        </td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.post.view', ['id' => $row->id]) }}" class="btn btn-primary btn-sm m-1"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;View</a>
                                <a href="{{ route('admin.post.edit', ['id' => $row->id]) }}" class="btn btn-warning btn-sm m-1"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Edit</a>
                                <a href="{{ route('admin.post.delete', ['id' => $row->id]) }}" class="btn btn-danger btn-sm m-1" onclick="return confirm('Permanently delete this record?')"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete</a>
                            </div>
                        </td>
                        @endforeach
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="{{ asset('assets/admin/js/datatables-simple-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('.status-toggle').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var post_id = $(this).data('id');

            $.ajax({
                url: '/post/updateStatus/' + post_id,
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'status': status,
                    'post_id': post_id
                },
                dataType: 'json',

                success: function(response) {
                    console.log('Status Changed')
                },
                error: function(error) {
                    console.error('Status Not Changed')
                }
            });
        });

    });
    $(document).ready(function() {
        $('.featured-toggle').change(function() {
            var featured = $(this).prop('checked') == true ? 1 : 0;
            var post_id = $(this).data('id');

            $.ajax({
                url: '/post/updateFeatured/' + post_id,
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'featured': featured,
                    'post_id': post_id
                },
                dataType: 'json',

                success: function(response) {
                    console.log('Featured Changed')
                },
                error: function(error) {
                    console.error('Featured Not Changed')
                }
            });
        });

    });
</script>
@endsection