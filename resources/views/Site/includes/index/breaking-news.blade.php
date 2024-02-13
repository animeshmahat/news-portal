<section class="news__section">
    <div class="custom-container">
        <div class="breaking__news">
            @if(isset($data['featured_post']))
            <div class="single__col-big">
                <div class="grid__card">
                    <div class="card__top">
                        <h1 class="card__title">
                            <a href="{{ route('site.single_post', $data['featured_post']->slug)}}">
                                {{$data['featured_post']->title}}
                            </a>
                        </h1>
                        <div class="post__meta">
                            <p class="meta author">
                                <a href="">
                                    {{$data['featured_post']->user->name}}
                                </a>
                            </p>
                            <p class="meta post__date">
                                {{$data['featured_post']->created_at->format('D-d-M-Y')}}
                            </p>
                        </div>
                    </div>
                    <div class="card__img">
                        <a href="{{route('site.single_post', $data['featured_post']->slug)}}">
                            <img src="{{asset('/uploads/post/' . $data['featured_post']->thumbnail)}}" alt="Thumbnail">
                        </a>
                    </div>
                </div>
            </div>
            <!-- slider -->
            <div class=" breaking__slider">
                <div class="triple__col-card" id="breakingSlider">
                    @foreach($data['post'] as $post)
                    <div class="grid__card">
                        <div class="card__img">
                            <a href="{{route('site.single_post', $post->slug)}}" class="image-size-60">
                                <img src="{{asset('/uploads/post/' . $post->thumbnail)}}" alt="slider-image">
                            </a>
                        </div>
                        <div class="card__details">
                            <div class="post__meta">
                                <p class="meta author">
                                    <a href="author/3/index.html">
                                        {{$post->user->name}}
                                    </a>
                                </p>
                                <p class="meta post__date">
                                    {{$post->updated_at->format('D-d-M-Y')}}
                                </p>
                            </div>
                            <h2 class="card__title">
                                <a href="{{ route('site.single_post', $post->slug)}}">
                                    {{$post->title}}
                                </a>
                            </h2>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="slider__controls">
                    <a href="javascript:void(0)" class="arrow_vertical arrow_vertical-prev1 slick-arrow">
                        <span class="custom__icon"></span>
                    </a>
                    <a href="javascript:void(0)" class="arrow_vertical arrow_vertical-next1 slick-arrow">
                        <span class="custom__icon"></span>
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>