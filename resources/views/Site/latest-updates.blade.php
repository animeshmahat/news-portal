@extends('site.layouts.app')
@section('title', 'Latest Updates')
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
                            Latest Updates
                        </b>
                    </span>
                </h2>
            </div>
        </div>

        <div class="category__grid">
            @if(isset($data['latest_update']))
            <div class="grid__card">
                <div class="card__img">
                    <a href="{{route('site.single_post' , $data['latest_update']->slug)}}" class="image-size-70">
                        <img src="{{asset('/uploads/post/' . $data['latest_update']->thumbnail)}}" alt="इजरायल–हमास युद्धमा यसरी हुँदैछ क्रिप्टोकरेन्सीको प्रयोग">
                    </a>
                </div>
                <div class="card__details">
                    <h3 class="card__title line-clamp-3">
                        <a href="{{route('site.single_post' , $data['latest_update']->slug)}}">
                            {{$data['latest_update']->title}}
                        </a>
                    </h3>

                    <div class="post__meta">
                        <p class="meta author">
                            <a href="{{route('site.single_post' , $data['latest_update']->slug)}}">
                                {{$data['latest_update']->user->name}}
                            </a>
                        </p>

                        <p class="meta post__date">
                            {{$data['latest_update']->created_at->format('D-d-M-Y')}}
                        </p>
                    </div>

                    <div class="card__desc line-clamp-4">
                        <p>
                        <p style="text-align:justify">
                            <span style="font-size:20px">
                                {!!html_entity_decode($data['latest_update']->content)!!}
                            </span>
                        </p>
                        </p>
                    </div>
                </div>
                @else
                <marquee behavior="" direction="left">No Posts To Show</marquee>
                @endif
            </div>
</section>

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
                                    <a href="{{route('site.most_read')}}" class="view__all-btn">
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
                                    Updates
                                </b>
                            </span>
                        </h2>
                    </div>
                </div>

                <div class="profileNews__grid">
                    @if(isset($data['other_update']))
                    @foreach($data['other_update'] as $post)
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

                                <p style="text-align:justify">&nbsp;{{ strip_tags($post->content) }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <marquee behavior="" direction="left">No Posts To Show</marquee>
                    @endif
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