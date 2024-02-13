<div class="ict__header-bottom">
    <div class="custom-container">
        <nav class="nav__menu">
            <ul class="nav__menu-list">
                @if(isset($all_view['category']))
                <li class="nav__list">
                    <a href="{{route('site.index')}}" class="nav__link">Home</a>
                </li>
                @foreach($all_view['category'] as $category)
                <li class="nav__list">
                    <a href="{{route('site.category_page', $category->title)}}" class="nav__link">
                        {{$category->title}}
                    </a>

                </li>
                @endforeach
                <div class="nav__list">
                    <a href="{{route('site.gallery')}}" class="nav__link">
                        Gallery
                    </a>
                </div>
                @endif
            </ul>
        </nav>
    </div>
</div>