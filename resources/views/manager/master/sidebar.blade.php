<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('assets/manager/img/restogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ResToGo</span>
    </a>

    <!-- Sidebar -->
    @auth
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/kasir/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>
    @endauth
    
      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('manager_index') }}" class="nav-link">
                    <i class="nav-icon fa fa-dashboard"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('lihat_menu') }}" class="nav-link"> <i class="nav-icon fas fa-box"></i>
                    <p>Daftar menu</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('lihat_kategori') }}" class="nav-link">
                    <i class="nav-icon fa fa-th-list"></i>
                    <p>Daftar Kategori</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('karyawan') }}" class="nav-link">
                    <i class="nav-icon fa fa-briefcase"></i>
                    <p>Data Karyawan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('chef') }}" class="nav-link">
                    <i class="nav-icon fa fa-cutlery"></i>
                    <p>Data Chef</p>
                </a>
            </li>
            <li class="nav-item">
                <form id="logout-form" action="{{route('logout')}}" method="post">
                    @csrf
                </form>
                <a href="javascript:void(0)" class="nav-link" onclick="$('#logout-form').submit();">
                    <i class="nav-icon fa fa-sign-out"></i>
                    <p>Logout</p>
                </a>
            </li>
            {{-- <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fa fa-dashboard"></i>
                    <p>
                        Dashboard
                        <i class="right fa fa-angle-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>Active Page</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>Inactive Page</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-th"></i>
                    <p>
                        Simple Link
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li> --}}
        </ul>
    </nav>
              
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>