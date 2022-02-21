<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
    <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    @if (Auth::user())
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block">{{Auth::user()->name;}}</a>
            </div>
        </div>
    @endif
    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
            </button>
        </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item {{Route::is('admin.dashboard') ? 'menu-open' : ''}}">
                <a href="{{route('admin.dashboard')}}" class="nav-link {{Route::is('admin.dashboard') ? 'active' : ''}}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Dashboard
                    <span class="right badge badge-danger">New</span>
                </p>
                </a>
            </li>
            <li class="nav-item {{Route::is('admin.post.*') ? 'menu-open' : ''}}">
                <a href="{{route('admin.post.index')}}" class="nav-link {{Route::is('admin.post.*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    POST
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.post.index')}}" class="nav-link {{Route::is('admin.post.index') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Posts</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.post.add')}}" class="nav-link {{Route::is('admin.post.add') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Post Add</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{Route::is('admin.cate.*') ? 'menu-open' : ''}}">
                <a href="{{route('admin.cate.index')}}" class="nav-link {{Route::is('admin.cate.*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Category
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.cate.index')}}" class="nav-link {{Route::is('admin.cate.index') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Categories</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{Route::is('admin.user.*') ? 'menu-open' : ''}}">
                <a href="{{route('admin.user.index')}}" class="nav-link {{Route::is('admin.user.*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Users
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.user.index')}}" class="nav-link {{Route::is('admin.user.index') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Users List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.user.add')}}" class="nav-link {{Route::is('admin.user.add') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>User Add</p>
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
