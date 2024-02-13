<footer class="ict__footer theme-500">
    <div class="custom-container">
        <nav class="ict__footer-nav">
            <div class="footer__content">
                <div class="footer__content-info">
                    <div class="footer__logo">
                        <a href="index.html">
                            <img src="{{asset($all_view['setting']->logo)}}" alt="">
                        </a>
                    </div>

                    <div class="about__content">
                        <p class="about__content-info">
                            {{$all_view['setting']->site_name}}
                        </p>

                        <div class="ict__info">
                            <ul>
                                <li>
                                    <p>सूचना विभागको दर्ता नम्बर: <span>२०८९/०७७-७८</span></p>
                                </li>

                                <li>
                                    <p>प्रबन्ध निर्देशक: <span>राजन लम्साल</span></p>
                                </li>

                                <li>
                                    <p>सह-सम्पादक: <span>कमल केसी</span></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer__content">
                <h3 class="footer__content-title">
                    <span>
                        Contact Address
                    </span>
                </h3>

                <div class="footer__content-info">
                    <div class="about__content">
                        <p class="about__content-info">
                            {{$all_view['setting']->site_first_address}}
                        </p>

                        <div class="ict__info">
                            <ul>
                                <li>
                                    <p class="ict__info__inside">
                                        Email:
                                        <span>
                                            <a href="{{$all_view['setting']->site_email}}">
                                                <span class="__cf_email__">{{$all_view['setting']->site_email}}</span>
                                            </a>
                                        </span>
                                        <!-- <span>
                                            <a href="cdn-cgi/l/email-protection.html#5e7e373038311e373d2a2d3f333f3d363f2c703d3133">
                                                <span class="__cf_email__" data-cfemail="f0999e969fb099938483919d9193989182de939f9d">[email&#160;protected]</span>
                                            </a>
                                        </span> -->
                                    </p>
                                </li>

                                <li>
                                    <p>Phone:
                                        <span>
                                            <a href="{{$all_view['setting']->site_phone}}">{{$all_view['setting']->site_phone}}</a>
                                            <a href="{{$all_view['setting']->site_mobile}}">{{$all_view['setting']->site_mobile}}</a>
                                        </span>
                                    </p>
                                </li>
                            </ul>

                            <ul class="social__menu">
                                <li>
                                    <a href="{{$all_view['setting']->social_profile_fb}}" target="_blank" class="footer__social">
                                        <i class="ph ph-facebook-logo"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{$all_view['setting']->social_profile_insta}}" target="_blank" class="footer__social">
                                        <i class="ph ph-instagram-logo"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{$all_view['setting']->social_profile_youtube}}" target="_blank" class="footer__social">
                                        <i class="ph ph-youtube-logo"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{$all_view['setting']->social_profile_twitter}}" target="_blank" class="footer__social">
                                        <i class="ph ph-twitter-logo"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{$all_view['setting']->social_profile_linkedin}}" target="_blank" class="footer__social">
                                        <i class="ph ph-linkedin-logo"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer__content">
                <h3 class="footer__content-title">
                    <span>
                        Information
                    </span>
                </h3>

                <div class="footer__content-info">
                    <ul class="ict__impLinks">
                        <li>
                            <a href="{{ route('site.about-us') }}">
                                <span>
                                    About Us
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="our-team/index.html">
                                <span>
                                    हाम्रो टिम
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="pages/privacy-policy.html">
                                <span>
                                    गोपनीयता नीति
                                </span>
                            </a>
                        </li>


                        <li>
                            <a href="pages/advertisement.html" target="_blank">
                                <span>
                                    विज्ञापन
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</footer>
<!-- Snowberry Footer -->
<script data-cfasync="false" src="{{asset('assets/site/js/email-decode.min.js')}}"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-P85DS3GQ70"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-P85DS3GQ70');
</script>
<iframe id="prixaFooter" style="width: 100%; height:60px; display:block; border:none;" frameborder="0" src="https://snowberry.prixa.net/saas-manager/footer/embed-code" scrolling="no"></iframe />
<!-- End Snowberry Footer-->