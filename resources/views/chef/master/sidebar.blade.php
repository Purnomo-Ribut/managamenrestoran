<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('assets/manager/img/restogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ResToGo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/kasir/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{$profil->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
          <li class="nav-header">Profile</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa-solid fa-gear"></i>
              <p class="ml-2">
                Setting
              </p>
            </a>
          </li>

          {{-- logout --}}
          {{-- profil --}}
          <li class="nav-item">
            <a href="{{route('logout1')}}" class="nav-link">
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

