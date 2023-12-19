<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('kasir.dashboard')}}" class="brand-link">
      <img src="{{asset('assets/manager/img/restogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ResToGo</span>
    </a>

    <!-- Sidebar -->
    @auth
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="{{route('profil2')}}" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>
    @endauth

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          {{-- dashbord --}}
          <li class="nav-item">
            <a href="{{route('kasir.dashboard')}}" class="nav-link">
              {{-- <i class="nav-icon fas fa-calendar-alt"></i> --}}
              <i class="nav-icon  fa-solid fa-gauge"></i>
              <p>
               Dashboard
              </p>
            </a>
          </li>

          {{-- transaksi --}}
          <li class="nav-item">
            <a href="{{route('order.list')}}" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
               Transaksi
              </p>
            </a>
          </li>

          {{-- profil --}}
          <li class="nav-item">
            <a href="{{route('profil2')}}" class="nav-link">
              <i class="nav-icon fa-solid fa-user"></i>
              {{-- <i class="nav-icon fas fa-calendar-alt"></i> --}}
              <p>
               Profil
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