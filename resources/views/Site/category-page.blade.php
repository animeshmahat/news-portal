@extends('site.layouts.app')
@section('title', 'Category')
@section('css')
@endsection
@section('content')
<section class="news__section theme-100">
    <div class="custom-container">
        <div class="section__title">
            <div class="inline__title">
                <h2 class="category__title">
                    <span>
                        <b>
                            {{$data['category']->title}}
                        </b>
                    </span>
                </h2>
            </div>
        </div>

        <div class="category__grid">
            <div class="category__grid">
                @if(isset($data['featured_post']))
                <div class="grid__card">
                    <div class="card__img">
                        <a href="{{ route('site.single_post', $data['featured_post']->slug)}}" class="image-size-70">
                            <img src="{{asset('/uploads/post/' . $data['featured_post']->thumbnail)}}" alt="{{$data['featured_post']->title}}">
                        </a>
                    </div>

                    <div class="card__details">
                        <h3 class="card__title line-clamp-3">
                            <a href="{{ route('site.single_post', $data['featured_post']->slug)}}">
                                {{$data['featured_post']->title}}
                            </a>
                        </h3>

                        <div class="post__meta">
                            <p class="meta author">
                                <a href="{{ route('site.single_post', $data['featured_post']->slug)}}">
                                    {{$data['featured_post']->user->name}}
                                </a>
                            </p>

                            <p class="meta post__date">
                                {{$data['featured_post']->created_at->format('D-d-M-Y')}}
                            </p>
                        </div>

                        <div class="card__desc line-clamp-4">
                            <p>
                            <p style="text-align:justify">{!!html_entity_decode($data['featured_post']->content)!!}</p>
                            </p>
                        </div>
                    </div>
                </div>
                @else
                <p class="alert alert-danger">No posts to show</p>
                @endif
            </div>
        </div>
</section>

<!-- more category object_list.0 -->
<section class="news__section">
    <div class="custom-container">
        <div class="browse__more">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="sidebar__content">
                        <div class="sidebar__content-news">
                            <div class="section__title">
                                <div class="inline__title">
                                    <h2 class="category__title">
                                        <span>
                                            <b>
                                                Latest
                                            </b>
                                        </span>
                                    </h2>
                                    <div class="view__all">
                                        <a href="../latest-news/index.html" class="view__all-btn">
                                            <span class="custom__icon"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="read__grid">
                                @if(isset($data['latest']))
                                @foreach($data['latest'] as $post)
                                @if($loop->index < 4) <div class="grid__card">
                                    <div class="card__img">
                                        <a href="{{ route('site.single_post', $post->slug)}}">
                                            <img src="{{asset('/uploads/post/' . $post->thumbnail)}}">
                                        </a>
                                    </div>

                                    <div class="card__details">
                                        <h3 class="card__title line-clamp-2">
                                            <a href="{{ route('site.single_post', $post->slug)}}">
                                                {{$post->title}}
                                            </a>
                                        </h3>
                                    </div>
                            </div>
                            @endif
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="sidebar__content-news">
                        <div class="section__title">
                            <div class="inline__title">
                                <h2 class="category__title">
                                    <span>
                                        <b>
                                            Liked
                                        </b>
                                    </span>
                                </h2>

                                <div class="view__all">
                                    <a href="../most-read/index.html" class="view__all-btn">
                                        <span class="custom__icon"></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="profileNews__grid">
                            @if(isset($data['liked']))
                            @foreach($data['liked'] as $post)
                            @if($loop->index < 4) <div class="grid__card">
                                <div class="card__img">
                                    <a href="{{ route('site.single_post', $post->slug)}}" class="image-size-70">
                                        <img src="{{asset('/uploads/post/' . $post->thumbnail)}}" alt="{{$post->title}}">
                                    </a>
                                </div>

                                <div class="card__details">
                                    <h3 class="card__title line-clamp-2">
                                        <a href="{{ route('site.single_post', $post->slug)}}">
                                            {{$post->title}}
                                        </a>
                                    </h3>

                                    <div class="post__meta">
                                        <p class="meta post__date">
                                            {{$post->created_at->format('D-d-M-Y')}}
                                        </p>
                                    </div>
                                </div>
                        </div>
                        @endif
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9 order-1 order-lg-2">
            <div class="browse__more-grid">
                <div class="section__title">
                    <div class="inline__title">
                        <h2 class="category__title">
                            <span>
                                <b>
                                    {{$data['category']->title}}
                                </b>
                            </span>
                        </h2>
                    </div>
                </div>

                <div class="profileNews__grid">
                    @if(isset($data['post']))
                    @foreach($data['post'] as $post)
                    <div class="grid__card">
                        <div class="card__img">
                            <a href="{{ route('site.single_post', $post->slug)}}" class="image-size-70">
                                <img src="{{asset('/uploads/post/' . $post->thumbnail)}}" alt="{{$post->title}}">
                            </a>
                        </div>

                        <div class="card__details">
                            <h3 class="card__title line-clamp-2">
                                <a href="{{ route('site.single_post', $post->slug)}}">
                                    {{$post->title}}
                                </a>
                            </h3>

                            <div class="post__meta">
                                <p class="meta post__date">
                                    {{$post->created_at->format('D-d-M-Y')}}
                                </p>
                            </div>

                            <div class="card__desc line-clamp-3">
                                <p>

                                <p style="text-align:justify">&nbsp;{!!html_entity_decode($post->content, 0, 20)!!}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p class="alert alert-danger">No Posts To Show</p>
                    @endif
                </div>
            </div>

            <!--pagination-section-start-->
            <!-- pagination -->
            <div class="ict__pagination">
                <div class="custom-container">
                    <nav class="ict__pagination-nav">
                        <ul class="ict__pagination-nav-menu">

                            <li class="">
                                <a class="pagination number  active " href="index2679.html?page=1">1</a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
@endsection
@section('js')
@endsection