<section class="news__section">
    <div class="custom-container">
        <div class="row">
            <!-- updates-section  -->
            <div class="col-xl-8">
                <div class="section__title">
                    <div class="inline__title">
                        <h2 class="category__title">
                            <span>
                                <b>
                                    Featured Updates
                                </b>
                            </span>
                        </h2>
                        <div class="view__all">
                            <a href="{{route('site.featured_update')}}" class="view__all-btn">
                                <span class="custom__icon"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="updates__grid">
                    @if(isset($data['featured_post']))
                    <div class="grid__left">
                        <div class="grid__card">
                            <div class="card__img">
                                <a href="{{route('site.single_post', $data['featured_post']->slug)}}">
                                    <img src="{{asset('/uploads/post/' . $data['featured_post']->thumbnail)}}" alt="{{$data['featured_post']->title}}">
                                </a>
                            </div>
                            <div class="card__details">
                                <h3 class="card__title line-clamp-3">
                                    <a href="{{route('site.single_post', $data['featured_post']->slug)}}">
                                        {{$data['featured_post']->title}}
                                    </a>
                                </h3>
                                <div class="post__meta">
                                    <p class="meta author">
                                        <a href="{{route('site.single_post', $data['featured_post']->slug)}}" tabindex="0">
                                            {{$data['featured_post']->user->name}}
                                        </a>
                                    </p>
                                    <p class="meta post__date">
                                        {{$data['featured_post']->created_at->format('D-d-M-Y')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="grid__right">
                        @if(isset($data['post']))
                        @foreach($data['post'] as $post)
                        @if($loop->index < 4) <div class="grid__card">
                            <div class="card__img">
                                <a href="{{route('site.single_post', $post->slug)}}" class="image-size-70">
                                    <img src="{{asset('/uploads/post/' . $post->thumbnail)}}" alt="">
                                </a>
                            </div>
                            <div class="card__details">
                                <div class="post__meta">
                                    <p class="meta post__date">
                                        {{$post->created_at->format('D-d-M-Y')}}
                                    </p>
                                </div>
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
        </div>
        <!-- liked-section  -->
        <div class="col-xl-4">
            <div class="section__title">
                <div class="inline__title">
                    <h2 class="category__title">
                        <span>
                            <b>
                                Most Read
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
            <div class="read__grid">
                @if(isset($data['liked_post']))
                @foreach($data['liked_post']->reverse() as $post)
                @if($loop->index < 4) <div class="grid__card">
                    <div class="card__img">
                        <a href="{{route('site.single_post', $post->slug)}}">
                            <img src="{{asset('/uploads/post/' . $post->thumbnail)}}">
                        </a>
                    </div>
                    <div class="card__details">
                        <div class="post__meta">
                            <p class="meta author">
                                <a href="{{route('site.single_post', $post->slug)}}" tabindex="0">
                                    {{$post->user->name}}
                                </a>
                            </p>
                            <p class="meta post__date">
                                {{$post->created_at->format('D-d-M-Y')}}
                            </p>
                            <!-- <p class="meta post__date">
                                <i class="ph ph-eye"></i>
                                {{$post->visitor}} Views
                            </p> -->
                        </div>
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
    </div>
    </div>
</section>