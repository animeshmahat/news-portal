@extends('site.layouts.app')
@section('title', 'Most-Read')
@section('css')
@endsection
@section('content')
<main>
    <section class="news__section theme-100">
        <div class="custom-container">
            <div class="section__title">
                <div class="inline__title">
                    <h2 class="category__title">
                        <span>
                            <b>
                                Most read
                            </b>
                        </span>
                    </h2>
                </div>
            </div>
            <div class="category__grid">
                @if(isset($data['featured_top_viewed']))
                <div class="grid__card">
                    <div class="card__img">
                        <a href="{{route('site.single_post' , $data['featured_top_viewed']->slug)}}" class="image-size-70">
                            <img src="{{asset('/uploads/post/' . $data['featured_top_viewed']->thumbnail)}}" alt="इजरायल–हमास युद्धमा यसरी हुँदैछ क्रिप्टोकरेन्सीको प्रयोग">
                        </a>
                    </div>
                    <div class="card__details">
                        <h3 class="card__title line-clamp-3">
                            <a href="{{route('site.single_post' , $data['featured_top_viewed']->slug)}}">
                                {{$data['featured_top_viewed']->title}}
                            </a>
                        </h3>

                        <div class="post__meta">
                            <p class="meta author">
                                <a href="{{route('site.single_post' , $data['featured_top_viewed']->slug)}}">
                                    {{$data['featured_top_viewed']->user->name}}
                                </a>
                            </p>

                            <p class="meta post__date">
                                {{$data['featured_top_viewed']->created_at->format('D-d-M-Y')}}
                            </p>
                        </div>

                        <div class="card__desc line-clamp-4">
                            <p>
                            <p style='\"text-align:justify\"'>
                                <span style='\"font-size:20px\"'>
                                    {!!html_entity_decode($data['featured_top_viewed']->content)!!}
                                </span>
                            </p>
                            </p>
                        </div>
                    </div>
                    @endif
                </div>
                @if(isset($data['featured_most_viewed']))
                @foreach($data['featured_most_viewed'] as $post)
                @if($loop->index < 3) <div class="grid__card">
                    <div class="card__img">
                        <a href="{{route('site.single_post', $post->slug)}}" class="image-size-70">
                            <img src="{{asset('/uploads/post/' . $post->thumbnail)}}" alt="यातायात कार्यालय एकान्तकुनामा अब लाइसेन्सको राजश्व अनलाईनबाटै तिर्न सकिने">
                        </a>
                    </div>

                    <div class="card__details">
                        <h3 class="card__title line-clamp-2">
                            <a href="{{route('site.single_post', $post->slug)}}">
                                {{$post->title}}
                            </a>
                        </h3>

                        <div class="post__meta">
                            <p class="meta author">
                                <a href="{{route('site.single_post', $post->slug)}}">
                                    {{$post->user->name}}
                                </a>
                            </p>

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
                                    @if(isset($data['post']))
                                    @foreach($data['post'] as $post)
                                    @if($loop->index < 4) <div class="grid__card">
                                        <div class="card__img">
                                            <a href="{{route('site.single_post', $post->slug)}}">
                                                <img src="{{asset('/uploads/post/' . $post->thumbnail)}}" alt="मास्टर्समा साइबर सेक्युरिटी कोर्ष पढाउने पुलचोक क्याम्पसको तयारी">
                                            </a>
                                        </div>

                                        <div class="card__details">
                                            <h3 class="card__title line-clamp-2">
                                                <a href="{{route('site.single_post', $post->slug)}}">
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
                                                Popular
                                            </b>
                                        </span>
                                    </h2>

                                    <div class="view__all">
                                        <a href="index.html" class="view__all-btn">
                                            <span class="custom__icon"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="profileNews__grid">
                                @if(isset($data['other_most_viewed']))
                                @foreach($data['other_most_viewed'] as $post)
                                @if($loop->index < 4) <div class="grid__card">
                                    <div class="card__img">
                                        <a href="{{route('site.single_post' , $data['featured_top_viewed']->slug)}}" class="image-size-70">
                                            <img src="{{asset('/uploads/post/' . $post->thumbnail)}}" alt="इजरायल–हमास युद्धमा यसरी हुँदैछ क्रिप्टोकरेन्सीको प्रयोग">
                                        </a>
                                    </div>

                                    <div class="card__details">
                                        <h3 class="card__title line-clamp-2">
                                            <a href="{{route('site.single_post' , $data['featured_top_viewed']->slug)}}">
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
                                        Most read
                                    </b>
                                </span>
                            </h2>
                        </div>
                    </div>

                    <div class="profileNews__grid">
                        @if(isset($data['other_most_viewed']))
                        @foreach($data['other_most_viewed'] as $post)
                        <div class="grid__card">
                            <div class="card__img">
                                <a href="{{route('site.single_post', $post->slug)}}" class="image-size-70">
                                    <img src="{{asset('/uploads/post/' . $post->thumbnail)}}" alt="घरमा आफै यसरी बनाउनुहोस सेनिटाइजर">
                                </a>
                            </div>

                            <div class="card__details">
                                <h3 class="card__title line-clamp-2">
                                    <a href="{{route('site.single_post', $post->slug)}}">
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
                                        {{{$post->content, 0, 26}}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
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