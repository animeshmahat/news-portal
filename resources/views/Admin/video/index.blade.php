@extends('admin.layouts.app')

@section('title', 'Video')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="container-fluid px-4">
    <h2 class="mt-4">{{$_panel}} Table</h2>
    <a href="{{ route('admin.video.create') }}" class="btn btn-sm btn-success mb-2"><i class="fa-solid fa-plus"></i> Add {{$_panel}} </a>
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
            {{$_panel}}
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>TITLE</th>
                        <th>VIDEO</th>
                        <th>STATUS</th>
                        <th>FEATURED</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>S.N</th>
                        <th>TITLE</th>
                        <th>VIDEO</th>
                        <th>STATUS</th>
                        <th>FEATURED</th>
                        <th>ACTION</th>
                    </tr>
                </tfoot>
                <tbody>
                    @if(isset($data['row']))
                    @foreach($data['row'] as $key=>$row)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$row->title}}</td>
                        <td>
                            <iframe src="https://www.youtube.com/embed/{{$row->video_id}}" frameborder="0"></iframe>
                        </td>
                        <td>
                            @if($row->status == "1")
                            <span class="badge rounded-pill badge-success">ACTIVE</span>
                            @elseif($row->status == "0")
                            <span class="badge rounded-pill badge-danger">INACTIVE</span>
                            @endif
                        </td>
                        <td>
                            @if($row->featured == "1")
                            <span class="badge rounded-pill badge-success">ACTIVE</span>
                            @elseif($row->featured == "0")
                            <span class="badge rounded-pill badge-danger">INACTIVE</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.video.view', ['id' => $row->id]) }}" class="btn btn-primary btn-sm m-1"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;View</a>
                                <a href="{{ route('admin.video.edit', ['id' => $row->id]) }}" class="btn btn-warning btn-sm m-1"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Edit</a>
                                <a href="{{ route('admin.video.delete', ['id' => $row->id]) }}" class="btn btn-danger btn-sm m-1" onclick="return confirm('Permanently delete this record?')"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete</a>
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

@section('js')
<script src="{{ asset('assets/admin/js/datatables-simple-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
@endsection