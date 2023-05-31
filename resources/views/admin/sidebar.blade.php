 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background:black!important;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('public/template/admin/dist/img/iconadmin.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" style="color:#3399FF; font-weight:bold!important;font-size:20px;">Chào mừng: Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('public/template/images/icons/icon_ad.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="http://xedichvu.com" class="d-block">T3DK</a>
        </div>
      </div>

{{--      <!-- SidebarSearch Form -->--}}
{{--      <div class="form-inline">--}}
{{--        <div class="input-group" data-widget="sidebar-search">--}}
{{--          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">--}}
{{--          <div class="input-group-append">--}}
{{--            <button class="btn btn-sidebar">--}}
{{--              <i class="fas fa-search fa-fw"></i>--}}
{{--            </button>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
              <i class="nav-icon fa fa-bars" aria-hidden="true"></i>
              <p>
                Quản lý Danh mục
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/menus/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm danh mục  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/menus/list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách danh mục</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fa fa-car" aria-hidden="true"></i>
              <p>
                Quản lý Sản phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/products/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm sản phẩm </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/products/list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách sản phẩm</p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item">
            <a href="#" class="nav-link">
             <i class="nav-icon fa fa-archive" aria-hidden="true"></i>
              <p>
                Quản lý Slider
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/sliders/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Slider </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/sliders/list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách  Slider</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa fa-cart-plus" aria-hidden="true"></i>
              <p>
                Quản lý Giỏ hàng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="/admin/customers" class="nav-link">
                    <i class="fa fa-street-view" aria-hidden="true"></i>
                  <p>Danh sách giỏ hàng</p>
                </a>
              </li>

            </ul>
          </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <p>
                        Quản lý Dịch vụ
                        <i class="right fas fa-angle-left" aria-hidden="true"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/services/add" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Thêm dịch vụ </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/services/list" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách Dịch vụ </p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa fa-tablet" aria-hidden="true"></i>
                    <p>
                        Quản lý Tin tức
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/news/add" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Thêm Tin Tức </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/news/list" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách tin tức</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa fa-tablet" aria-hidden="true"></i>
                    <p>
                        Thống kê doanh thu
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="/admin/statist/list" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Thống kê theo năm</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
