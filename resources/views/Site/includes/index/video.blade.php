<section class="news__section theme-300">
    <div class="custom-container">
        <div class="section__title">
            <div class="inline__title">
                <h2 class="category__title">
                    <span>
                        <b>
                            Video
                        </b>
                    </span>
                </h2>

                <div class="view__all">
                    <a href="category/video_news/index.html" class="view__all-btn">
                        <span class="custom__icon"></span>
                    </a>
                </div>
            </div>
        </div>

        <div class="video__grid">
            <div class="grid__top">
                @if(isset($data['featured_video']))
                <div class="grid__card">
                    <div class="card__img">
                        <iframe src="https://www.youtube.com/embed/{{$data['featured_video']->video_id}}" frameborder="0" width="700px" height="380px"></iframe>
                    </div>
                    <div class="card__details">
                        <h3 class="card__title line-clamp-2">
                            <a href="{{$data['featured_video']->url}}">
                                {{$data['featured_video']->title}}
                            </a>
                        </h3>
                        <div class="post__meta">
                            <p class="meta author">
                                <a href="#">
                                    News Portal
                                </a>
                            </p>
                            <p class="meta post__date">
                                {{$data['featured_video']->created_at->format('d-M-Y')}}
                            </p>
                        </div>
                        <div class="card__desc line-clamp-3">
                            <p>

                            </p>
                        </div>
                    </div>
                </div>
                @else
                <marquee behavior="scroll" direction="left">No featured video</marquee>
                @endif
            </div>

            <div class="grid__bottom">
                <div class="video__slider" id="videoSlider">
                    @if(isset($data['video']))
                    @foreach($data['video'] as $row)
                    <div class="grid__card">
                        <div class="card__img">
                            <iframe src="https://www.youtube.com/embed/{{$row->video_id}}" frameborder="0"></iframe>
                        </div>

                        <div class="card__details">
                            <h3 class="card__title line-clamp-2">
                                <a href="https://www.youtube.com/watch?v=dFxFHsbj0Hw">
                                    {{$row->title}}
                                </a>
                            </h3>

                            <div class="post__meta">
                                <p class="meta post__date">
                                    {{$row->created_at->format('d-M-Y')}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <marquee behavior="scroll" direction="left">No videos</marquee>
                    @endif
                </div>
                <div class="slider__controls">
                    <a href="javascript:void(0)" class="arrow_vertical arrow_vertical-prev2 slick-arrow">
                        <span class="custom__icon"></span>
                    </a>

                    <a href="javascript:void(0)" class="arrow_vertical arrow_vertical-next2 slick-arrow">
                        <span class="custom__icon"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>