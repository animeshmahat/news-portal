<nav class="ict__header-nav-top">
    <div class="nav__content">
        <ul class="nav__content-menu social__menu">
            <li>
                <a href="{{$all_view['setting']->social_profile_fb}}" target="_blank" class="social__icons" title="Facebook">
                    <i class="ph ph-facebook-logo"></i>
                </a>
            </li>
            <li>
                <a href="{{$all_view['setting']->social_profile_insta}}" target="_blank" class="social__icons" title="Instagram">
                    <i class="ph ph-instagram-logo"></i>
                </a>
            </li>
            <li>
                <a href="{{$all_view['setting']->social_profile_youtube}}" target="_blank" class="social__icons" title="Youtube">
                    <i class="ph ph-youtube-logo"></i>
                </a>
            </li>
            <li>
                <a href="{{$all_view['setting']->social_profile_twitter}}" target="_blank" class="social__icons" title="Twitter">
                    <i class="ph ph-twitter-logo"></i>
                </a>
            </li>
            <li>
                <a href="{{$all_view['setting']->social_profile_linkedin}}" target="_blank" class="social__icons" title="Linkedin">
                    <i class="ph ph-linkedin-logo"></i>
                </a>
            </li>
        </ul>
        <div class="nav__content-menu">
            <div class="current__dateTime">
                <p>{{ date('h:i A l d-M-Y') }}</p>
            </div>
        </div>
    </div>
</nav>