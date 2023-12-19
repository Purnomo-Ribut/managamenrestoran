<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/manager/img/restogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ResToGo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            
            <div class="info">
                <a href="#" class="d-block">{{ Auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                {{-- dashbord --}}
                <li class="nav-item">
                    <a href="{{ route('chef.dashboard') }}" class="nav-link">
                        {{-- <i class="nav-icon fas fa-calendar-alt"></i> --}}
                        <i class="nav-icon  fa-solid fa-gauge"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profil3') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-user"></i>
                        {{-- <i class="nav-icon fas fa-calendar-alt"></i> --}}
                        <p>
                            Profile
                        </p>
                    </a>
                </li>

                {{-- logout --}}
                {{-- profil --}}
                <li class="nav-item">
                    <a href="{{ route('logout3') }}" class="nav-link">
                        {{-- <i class="nav-icon fa-solid fa-user"></i> --}}
                        <i class="nav-icon fa fa-sign-out"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
