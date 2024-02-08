<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Portal</title>
    @yield('meta')
    <meta name="description" content=" Nepal's ICT News, Startup and AwarenessPlatform ">
    <meta name="keywords" content="internet in nepal, technology in nepal, tech news nepal, ict in nepal, telecom in nepal, Latest Nepali Tech News, smartphone news nepal, tech nepal, nepal tech news, nepal gadget, tech websites in nepal, laptops, smartphone,">
    <link rel="icon" type="image/x-icon" href="{{asset($all_view['setting']->favicon)}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/stylee759.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/slick.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/slick-theme.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">
    @yield('css')
</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="../connect.facebook.net/en_US/sdk.js#xfbml=1&version=v15.0" nonce="iMgMSN6H"></script>
    <!-- header section -->
    <!-- header -->
    <header class="ict__header">
        <style>
            @media (max-width: 600px) {
                .ict_header-nav-middle .bigyapan_banner {
                    display: none !important;
                }
            }

            @media(max-width:575px) {
                .ict_header .bigyapan_banner {
                    display: none !important;
                }

                .ict_header-nav-middle .header_logo {
                    min-width: 180px !important;
                }
            }
        </style>
        <div class="ict__header-nav">
            <div class="custom-container">
                @include('site.includes.top-header')

                @include('site.includes.middle-header')
                <!--new mobile advertisment-->
                <div class="ict__header-bigyapan d-block d-sm-none">
                    <div class="bigyapan">
                        <div class="adalyticsblock" campaign="ZQ3wPu7wu8InaHTHLOHZwM62dM80m4yia9anjL1sGmyPCeTQjA" width="100%"></div>
                    </div>
                </div>
            </div>
        </div>
        @include('site.includes.bottom-header')
        <!-- search overlay -->
        @include('site.includes.search-header')
        <!-- sidebar menu overlay -->
        @include('site.includes.sidebar')
    </header>

    <main>
        @yield('content')
    </main>

    <!-- footer  -->
    @include('site.includes.footer')

    <script src="{{asset('assets/site/js/app1fdf.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/site/js/adalyticsaca5.js')}}"></script>
    <script src="{{asset('assets/site/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/site/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/site/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/site/js/slick.min.js')}}"></script>
    <script src="{{asset('assets/site/js/jquery.fancybox.min.css')}}"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <!-- <script src="https://www.youtube.com/iframe_api"></script> -->
    <script>
        $(document).ready(function() {
            $("#breakingSlider").slick({
                infinite: true,
                slidesToShow: 3,
                autoplay: true,
                slidesToScroll: 1,
                prevArrow: ".arrow_vertical-prev1",
                nextArrow: ".arrow_vertical-next1",
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                        },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                        },
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                        },
                    },
                ],
            });

            $("#videoSlider").slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                prevArrow: ".arrow_vertical-prev2",
                nextArrow: ".arrow_vertical-next2",
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                        },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                        },
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                        },
                    },
                ],
            });
        })
    </script>
    <script>
        function setDropdownPosition() {
            $('.nav__list .nav__link').each(function() {
                var positionTop = $(this).get(0).getBoundingClientRect().top;
                var positionLeft = $(this).get(0).getBoundingClientRect().left;
                var dropdownPositionTop = positionTop + 30;
                var dropdownPositionLeft = positionLeft;

                $(this).parents(".nav__list").find(".dropdown__menu").css({
                    'left': dropdownPositionLeft,
                    'top': dropdownPositionTop
                });
            });
        }

        $('.nav__link').mouseover(function() {
            setDropdownPosition();
        });

        $(window).resize(function() {
            setDropdownPosition();
        });

        $(document).ready(function() {
            setDropdownPosition();
        });
    </script>
    <script>
        let contentBlack = document.querySelector('#contentBlack');

        if (contentBlack) {
            window.addEventListener('load', () => {
                contentBlack.classList.add('active');
                document.body.append(overlayDiv);
                document.body.style.overflow = "hidden";

                setTimeout(() => {
                    hideModal();
                }, 10000)
            });

            function hideModal() {
                contentBlack.classList.remove('active');
                overlayDiv.remove();
                document.body.style.overflow = "visible";
            }
        }
    </script>
    @yield('js')
</body>

</html>