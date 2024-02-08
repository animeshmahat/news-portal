@extends('site.layouts.app')
@section('css')
@endsection
@section('content')
<div class="custom-container mt-4 mb-4" style="text-align: justify;">
    <h1>About Us</h1>
    <p class="mt-2">{!! html_entity_decode($all_view['setting']->site_description) !!}</p>
</div>
@endsection
@section('js')
@endsection