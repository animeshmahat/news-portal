@extends('admin/layouts/app')

@section('title', 'Post')
@section('css')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 p-4">
            <h2>Posts</h2>
            <hr>
            <div class="table-container">
                <a href="#" class="btn btn-sm btn-success"><i class="fa-solid fa-plus"></i> Add Post</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>User_ID</th>
                            <th>Title</th>
                            <th>Thumbnail</th>
                            <th>Content</th>
                            <th>Status</th>
                            <th>Featured</th>
                            <th>Visitor</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn btn-primary btn-sm m-1"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;View</a>
                                    <a href="#" class="btn btn-warning btn-sm m-1"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm m-1" onclick="return confirm('Permanently delete this record?')"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection