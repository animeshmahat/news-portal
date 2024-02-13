<div class="sidebar__nav">
    <div class="sidebar__nav-nav">
        <div class="close__drawer">
            <i class="ph ph-x"></i>
        </div>

        <div class="mobile__logo">
            <a href="#">
                <img src="{{asset($all_view['setting']->logo)}}" alt="">
            </a>
        </div>
        <div class="sidebar__nav-menu">
            <ul>
                <li>
                    <a href="{{route('site.index')}}" class="nav__link">
                        <span>
                            Home
                        </span>
                    </a>
                </li>
                @if(isset($all_view['category']))
                @foreach($all_view['category'] as $category)
                <li class="has-dropdown">
                    <a href="{{route('site.category_page', $category->title)}}" class="nav__link">
                        <span>
                            {{$category->title}}
                            <!-- <i class="ph ph-caret-right"></i> -->
                        </span>
                    </a>
                    <!-- <div class="dropdown__menu">
                        <ul class="dropdown__menu-list">
                            <li>
                                <a href="#" class="dropdown__link">
                                    सूचना
                                </a>
                            </li>
                        </ul>
                    </div> -->
                </li>
                @endforeach
                @endif
        </div>
        <div class="sidebar__nav-social">
            <ul class="social__menu">
                <li>
                    <a href="{{$all_view['setting']->social_profile_fb}}" class="social__icon">
                        <i class="ph ph-facebook-logo"></i>
                    </a>
                </li>

                <li>
                    <a href="{{$all_view['setting']->social_profile_insta}}" class="social__icon">
                        <i class="ph ph-instagram-logo"></i>
                    </a>
                </li>
                <li>
                    <a href="{{$all_view['setting']->social_profile_youtube}}" class="social__icon">
                        <i class="ph ph-youtube-logo"></i>
                    </a>
                </li>
                <li>
                    <a href="{{$all_view['setting']->social_profile_twitter}}" class="social__icon">
                        <i class="ph ph-twitter-logo"></i>
                    </a>
                </li>
                <li>
                    <a href="{{$all_view['setting']->social_profile_linkedin}}" class="social__icon">
                        <i class="ph ph-linkedin-logo"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>