<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="/">
                <img src="/assets/img/slibc.png" class="navbar-brand-img" alt="SLIBC">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('admin/dashboard') ? ' active' : '' }}" href="/admin/dashboard">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('admin/categories') ? ' active' : '' }}" href="{{ route('categories.index') }}">
                            <i class="ni ni-book-bookmark text-blue"></i>
                            <span class="nav-link-text">Kategori</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('admin/articles') ? ' active' : '' }}" href="{{ route('articles.index') }}">
                            <i class="ni ni-book-bookmark text-blue"></i>
                            <span class="nav-link-text">Artikel</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('admin/events') ? ' active' : '' }}" href="{{ route('events.index') }}">
                            <i class="ni ni-square-pin text-blue"></i>
                            <span class="nav-link-text">Event</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('admin/startups') ? ' active' : '' }}" href="#">
                            <i class="ni ni-air-baloon text-blue"></i>
                            <span class="nav-link-text">List Startup</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
