@extends('site.layouts.app')
@section('title', 'News')
@section('css')
@endsection
@section('content')
<main>
    <section class="news__section">
        <div class="details__page theme-500">
            <div class="custom-container">
                <div class="details__page-top">
                    <div class="details__title-header">
                        <div>
                            <h1 class="details__page-title">
                                {{$data['post']->title}}
                            </h1>
                        </div>
                        <div class="sharable__content">
                            <div class="post__meta">
                                <p class="meta author">
                                    <a href="../../author/3/index.html">
                                        {{$data['post']->user->name}}
                                    </a>
                                </p>
                                <p class="meta post__date">
                                    {{$data['post']->created_at->format('D-d-M-Y')}}
                                </p>
                            </div>
                            <div class="share__widget">
                                <!-- ShareThis BEGIN -->
                                <div class="sharethis-inline-share-buttons"></div>
                                <!-- ShareThis END -->
                            </div>
                            <div class="ms-auto">
                                <p style="font-family :system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
                                    <i class="ph ph-eye"></i> {{$data['post']->visitor}} Views
                                </p>
                            </div>
                        </div>
                        <figure>
                            <img src="{{asset('/uploads/post/' . $data['post']->thumbnail)}}" title="{{$data['post']->title}}">
                        </figure>
                    </div>
                </div>
            </div>
    </section>
    <!-- details description content -->
    <section class="news__section">
        <div class="custom-container">
            <div class="detail__description">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="detail__description-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="details__content-main">
                                        <div class="details__desc">
                                            <p style="text-align:justify !important">{!!html_entity_decode($data['post']->content)!!}</p>
                                        </div>
                                    </div>
                                    <div class="share__widget">
                                        <!-- ShareThis BEGIN -->
                                        <div class="sharethis-inline-share-buttons"></div>
                                        <!-- ShareThis END -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="sidebar__content">
                            <div class="sidebar__content-news">
                                <div class="section__title">
                                    <div class="inline__title">
                                        <h2 class="category__title">
                                            <span>
                                                <b>
                                                    Related Posts
                                                </b>
                                            </span>
                                        </h2>
                                        <div class="view__all">
                                            <a href="#" class="view__all-btn">
                                                <span class="custom__icon"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="read__grid">
                                    @foreach($data['related_posts'] as $data)
                                    @if($loop->index < 5) <div class="grid__card">
                                        <div class="card__img">
                                            <a href="{{route('site.single_post', $data->slug)}}">
                                                <img src="{{asset('/uploads/post/' . $data->thumbnail)}}">
                                            </a>
                                        </div>
                                        <div class="card__details">
                                            <h3 class="card__title line-clamp-2">
                                                <a href="{{route('site.single_post', $data->slug)}}">
                                                    {{$data->title}}
                                                </a>
                                            </h3>
                                        </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>
@endsection
@section('js')
@endsection