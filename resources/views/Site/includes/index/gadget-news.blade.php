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
                    @if(isset($data['gadget_posts']))
                    <div class="grid__left">
                        @foreach($data['gadget_posts'] as $post)
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
                    </div>

                    <!-- <div class="grid__right">
                        <div class="grid__card">
                            <div class="card__img">
                                <a href="news/sibesu-s-distribution-to-200-families-affected-by/index.html" class="image-size-60">
                                    <img src="../ictsamacharcdn.prixacdn.net/media/thumbnails/albums/subisu_yuqKAzKnP9_VtzrK8DyOm.jpg.360x240_q75_crop-smart_upscale.jpg" alt="भूकम्पबाट प्रभावित २०० परिवारलाई सुबिसुले वितरण गर्‍यो सोलार">
                                </a>
                            </div>

                            <div class="card__details">
                                <h3 class="card__title line-clamp-4">
                                    <a href="news/sibesu-s-distribution-to-200-families-affected-by/index.html">
                                        भूकम्पबाट प्रभावित २०० परिवारलाई सुबिसुले वितरण गर्‍यो सोलार
                                    </a>
                                </h3>

                                <div class="post__meta">
                                    <p class="meta author">
                                        <a href="author/3/index.html" tabindex="0">
                                            आइसिटी समाचार
                                        </a>
                                    </p>

                                    <p class="meta post__date">
                                        बिहिबार, १९ पुष, २०८०
                                    </p>
                                </div>

                                <div class="card__desc line-clamp-3">
                                    <p>
                                        &nbsp;इन्टरनेट सेवा प्रदायक कम्पनी सुबिसुको टोली आफ्नो २३ औं वार्षिकोत्सव मनाउन भूकम्प प्रभावित क्षेत्र जाजरकोट पुगेको छ । गत १७ कात्तिकमा गएको ६.४ म्याग्निच्युटको…
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    @endif
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