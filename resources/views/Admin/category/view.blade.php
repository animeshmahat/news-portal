@extends('admin.layouts.app')

@section('title', 'View Category')
@section('css')
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mt-4">
            <h2>{{$_panel}} View</h2>
            <div class="container mt-4 p-2" style="border: 1px solid #c1c1c1;">
                <p><strong>Title :</strong></p>
                <div class="d-inline-flex">{{$data['row']->title}}</div>
                <hr>
                <p><strong>Description :</strong>
                </p>
                <div class="d-inline-flex">{!! html_entity_decode($data['row']->description) !!}</div>
                <hr>
                <p><strong>Status :</strong>
                    @if($data['row']->status == 1)
                    <span class="badge bg-success">ACTIVE</span>
                    @else
                    <span class="badge bg-danger">INACTIVE</span>
                    @endif
                </p>
            </div>
            <a href="{{route('category.index')}}" class="btn btn-sm btn-outline-primary mt-4"><i class="fa-solid fa-arrow-left"></i> RETURN</a>
        </div>
    </div>
</div>

@endsection

@section('js')
@endsection