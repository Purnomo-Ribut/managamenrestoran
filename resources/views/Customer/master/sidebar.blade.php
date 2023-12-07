<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link d-flex align-items-center">
              <span class="material-symbols-outlined nav-menu">menu_book</span>
              <p>
                Daftar Makanan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{route('makanan.index')}}" class="nav-link d-flex align-items-center">
                    <span class="material-symbols-outlined nav-menu">lunch_dining</span>
                  <p>Makanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('minuman.index')}}" class="nav-link d-flex align-items-center">
                    <span class="material-symbols-outlined nav-menu">coffee</span>
                  <p>Minuman</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link d-flex align-items-center">
                    <span class="material-symbols-outlined nav-menu">cookie</span>
                  <p>Dessert</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center" data-toggle="modal" data-target="#modalAdd">
                <span class="material-symbols-outlined nav-menu">receipt_long</span>
              <p>
                Total Pesanan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
