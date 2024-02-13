@extends('admin.layouts.app')

@section('title', 'View Category')
@section('css')
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mt-4">
            <h2>{{$_panel}} View</h2>

            <div class="container mt-4 p-3" style="border: 1px solid #c1c1c1; border-radius:10px;">

                <p><strong>Title :</strong></p>
                <div class="d-inline-flex">{{$data['row']->title}}</div>
                <hr>
                <p><strong>Description :</strong>
                </p>
                <div class="d-inline-flex">{!! html_entity_decode($data['row']->description) !!}</div>
                <hr>
                <p><strong>Status :</strong>
                    @if($data['row']->status == 1)
                    <button type="button" class="btn btn-sm btn-outline-success position-relative">
                        ACTIVE
                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-success border border-success rounded-circle"> </span>
                    </button>
                    @else
                    <button type="button" class="btn btn-sm btn-outline-danger position-relative" disabled>
                        INACTIVE
                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-danger rounded-circle"> </span>
                    </button>
                    @endif
                </p>

            </div>

            <a href="{{route('admin.category.index')}}" class="btn btn-primary btn-sm mt-2"><i class="fa-solid fa-backward"></i> RETURN</a>
        </div>
    </div>
</div>

@endsection

@section('js')
@endsection