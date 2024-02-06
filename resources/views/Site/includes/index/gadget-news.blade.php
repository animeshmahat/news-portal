<section class="news__section">
    <div class="custom-container">
        <div class="row">
            <div class="col-lg-9">
                <div class="section__title">
                    <div class="inline__title">
                        <h2 class="category__title">
                            <span>
                                <b>
                                    Gadgets
                                </b>
                            </span>
                        </h2>

                        <div class="view__all">
                            <a href="category/gadgets/index.html" class="view__all-btn">
                                <span class="custom__icon"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="gadgets__grid">
                    <div class="grid__left">
                        @if(isset($data['gadget_featured']))
                        @foreach($data['gadget_featured'] as $post)
                        <div class="grid__card">
                            <div class="card__img">
                                <a href="{{ route('site.single_post', $post->slug)}}" class="image-size-60">
                                    <img src="{{asset('/uploads/post/' . $post->thumbnail)}}">
                                </a>
                            </div>

                            <div class="card__details">
                                <h3 class="card__title line-clamp-3">
                                    <a href="{{ route('site.single_post', $post->slug)}}">
                                        {{$post->title}}
                                    </a>
                                </h3>

                                <div class="post__meta">
                                    <p class="meta author">
                                        <a href="{{ route('site.single_post', $post->slug)}}" tabindex="0">
                                            {{$post->user->name}}
                                        </a>
                                    </p>

                                    <p class="meta post__date">
                                        {{$post->created_at->format('D-d-M-Y')}}
                                    </p>
                                </div>

                                <div class="card__desc line-clamp-3">
                                    <p>
                                        {!!html_entity_decode($post->content, 0, 26,)!!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>

                    <div class="grid__right">
                        @if(isset($data['gadget_posts']))
                        @foreach($data['gadget_posts'] as $post)
                        <div class="grid__card">
                            <div class="card__img">
                                <a href="news/sibesu-s-distribution-to-200-families-affected-by/index.html" class="image-size-60">
                                    <img src="{{asset('/uploads/post/' . $post->thumbnail)}}">
                                </a>
                            </div>

                            <div class="card__details">
                                <h3 class="card__title line-clamp-4">
                                    <a href="news/sibesu-s-distribution-to-200-families-affected-by/index.html">
                                        {{$post->title}}
                                    </a>
                                </h3>

                                <div class="post__meta">
                                    <p class="meta author">
                                        <a href="author/3/index.html" tabindex="0">
                                            {{$post->user->name}}
                                        </a>
                                    </p>

                                    <p class="meta post__date">
                                        {{$post->created_at->format('D-d-M-Y')}}
                                    </p>
                                </div>

                                <div class="card__desc line-clamp-3">
                                    <p>
                                        &nbsp; {!!html_entity_decode($post->content, 0, 26,)!!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-3">

                <div class="sidebar__content">
                    <div class="sidebar__bigyapan">

                        <div class="bigyapan">

                            <div class="adalyticsblock" campaign="Q5UjmtOCn00SPqQSFSkFyUGHCPOxLjQ5Otcyc5QfEMsSSmVghB" width="100%"></div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
</section>