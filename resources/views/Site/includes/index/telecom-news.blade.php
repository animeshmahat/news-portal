<section class="news__section theme-200">
    <div class="custom-container">
        <div class="section__title">
            <div class="inline__title">
                <h2 class="category__title">
                    <span>
                        <b>
                            Telecom
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

        <div class="telecom__grid">
            <div class="row">
                <div class="col-lg-4">
                    @if(isset($data['telecom_posts']))
                    @foreach($data['telecom_posts'] as $post)
                    @if($post->featured == "0")
                    <div class="grid__card">
                        <div class="card__details">
                            <h3 class="card__title">
                                <a href="{{ route('site.single_post', $post->slug)}}">
                                    {{$post->title}}
                                </a>
                            </h3>

                            <div class="post__meta">
                                <p class="meta post__date">
                                    {{$post->user->name}}
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

                <div class="col-lg-8">
                    @if(isset($data['telecom_featured']))
                    <div class="grid__card">
                        <div class="card__img">
                            <a href="{{ route('site.single_post', $data['telecom_featured']->slug)}}" class="image-size-60">
                                <img src="{{asset('/uploads/post/' . $data['telecom_featured']->thumbnail)}}" alt="{{$data['telecom_featured']->title}}">
                            </a>
                        </div>

                        <div class="card__details">
                            <div class="post__meta">
                                <p class="meta post__date">
                                    {{$data['telecom_featured']->user->name}}
                                </p>

                                <p class="meta post__date">
                                    {{$data['telecom_featured']->created_at->format('D-d-M-Y')}}
                                </p>
                            </div>

                            <h3 class="card__title">
                                <a href="{{ route('site.single_post', $data['telecom_featured']->slug)}}">
                                    {{$data['telecom_featured']->title}}
                                </a>
                            </h3>

                            <div class="card__desc line-clamp-3">
                                <p>
                                <p style="text-align:justify">{!!html_entity_decode($data['telecom_featured']->detail, 0,20)!!}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>