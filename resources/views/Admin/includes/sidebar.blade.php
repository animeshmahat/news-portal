<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="d-f nav">
                <a class="nav-link {{request()->is('admin/users*')?'nav-active':''}}" href="{{ route('admin.users.index') }}">
                    <span class="material-symbols-outlined">
                        group
                    </span>&nbsp;&nbsp;Users
                </a>
                <a class="nav-link collapsed {{request()->is('admin')?'nav-active':''}}" href="{{ route('admin.index') }}">
                    <span class="material-symbols-outlined">
                        dashboard
                    </span>&nbsp;&nbsp;Dashboard
                </a>
                <a class="nav-link collapsed {{request()->is('admin/category*')?'nav-active':''}}" href="{{ route('admin.category.index') }}">
                    <span class="material-symbols-outlined">
                        category
                    </span>&nbsp;&nbsp;Category
                </a>
                <a class="nav-link collapsed {{request()->is('admin/post*')?'nav-active':''}}" href="{{ route('admin.post.index') }}">
                    <span class="material-symbols-outlined">
                        post
                    </span>&nbsp;&nbsp;Posts
                </a>
                <a class="nav-link collapsed {{request()->is('admin/gallery*', 'admin/album*')?'nav-active':''}}" href="#" data-bs-toggle="collapse" data-bs-target="#galleryCollapse" aria-expanded="false" aria-controls="galleryCollapse">
                    <span class="material-symbols-outlined">
                        browse_gallery
                    </span>&nbsp;&nbsp;Gallery
                    <div class="sb-sidenav-collapse-arrow {{request()->is('admin/gallery*', 'admin.album*')?'nav-active':''}}"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="galleryCollapse" aria-labelledby="headingGallery" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion">
                        <a class="nav-link {{request()->is('admin/gallery*')?'nav-active':''}}" href="{{ route('admin.gallery.index') }}"><span class="material-symbols-outlined">
                                gallery_thumbnail
                            </span>&nbsp;&nbsp;Thumbnails</a>
                        <a class="nav-link {{request()->is('admin/album*')?'nav-active':''}}" href="{{ route('admin.album.index') }}"><span class="material-symbols-outlined">
                                photo_library
                            </span>&nbsp;&nbsp;Albums</a>
                    </nav>
                </div>
                <a class="nav-link collapsed {{request()->is('admin/video*')?'nav-active':''}}" href="{{ route('admin.video.index') }}">
                    <span class="material-symbols-outlined">
                        video_library
                    </span>&nbsp;&nbsp;Videos
                </a>
                <a class="nav-link collapsed {{request()->is('admin/setting*')?'nav-active':''}}" href="{{ route('admin.setting.index') }}">
                    <span class="material-symbols-outlined">
                        settings
                    </span>&nbsp;&nbsp;Settings
                </a>
            </div>
        </div>
    </nav>
</div>