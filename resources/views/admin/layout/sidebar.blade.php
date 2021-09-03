<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="{{ asset('img/logo.png') }}" alt="VRL CZ" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">ADMIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/avatars') }}/{{ auth()->user()->user_detail->image }}"  style="width: 30px; height: 30px;" class="img-circle" alt="avatar">
            </div>
            <div class="info">
                <a href="#" class="d-block"><strong>{{ auth()->user()->name }}</strong></a>
            </div>
        </div>
<!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('/admin') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Nástěnka

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/pages') }}" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Stránky
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/races') }}" class="nav-link">
                        <i class="nav-icon fas fa-route"></i>
                        <p>
                            Závody
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/championship') }}" class="nav-link">
                        <i class="nav-icon fas fa-trophy"></i>
                        <p>
                            Šampionáty
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-flag-checkered"></i>
                        <p>
                            Výsledky
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/users') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Uživatelé
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/circuits') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle-notch"></i>
                        <p>
                            Okruhy
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/posts') }}" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Články
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/teams') }}" class="nav-link">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>
                            Týmy
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
