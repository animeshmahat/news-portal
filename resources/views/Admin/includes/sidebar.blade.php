<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="d-f nav">
                <a class="nav-link {{request()->is('admin')?'nav-active':''}}" href="{{ route('admin') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>Dashboard
                </a>
                <a class="nav-link {{request()->is('category*')?'nav-active':''}}" href="{{ route('category.index') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-arrows-to-dot"></i></div>Category
                </a>
            </div>
        </div>
    </nav>
</div>