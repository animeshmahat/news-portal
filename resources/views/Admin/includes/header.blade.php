<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ route('admin.index') }}">Admin Panel</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- site  -->
    <a href="{{ route('site.index') }}" target="_site" class="btn btn-outline-light btn-sm"><i class="fa-solid fa-arrow-right-from-bracket"></i> Go to site</a>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto me-3">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle bg-dark" style="color: #ffffff;" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span> @if(Auth::user()->image)
                    <img style="border-radius: 50%; object-fit:cover;" src="{{ asset('uploads/user_image/' . Auth::user()->image) }}" alt="User Image" width="30px" height="30px">
                    @else
                    <i class="fa fa-circle-user"></i>
                    @endif
                </span> {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                @if(isset($data['row']))
                <li><a class="dropdown-item" href="{{route('admin.profile.edit' , ['id' => Auth::user()->id])}}">Settings</a></li>
                @endif
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </li>
    </ul>
</nav>