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
                    <a href="#" class="nav__link">
                        {{$category->title}}
                        <i class="ph ph-caret-down"></i>
                    </a>
                    <div class="dropdown__menu">
                        <ul class="dropdown__menu-list">
                            <li>
                                <a href="category/information/index.html" class="dropdown__link">
                                    सूचना
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endforeach
                @endif
            </ul>
        </nav>
    </div>
</div>