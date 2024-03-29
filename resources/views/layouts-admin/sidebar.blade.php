<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Nama Web</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/dashboard" class="d-block">Nama Kamu</a>
            </div>
        </div>

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


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Blog
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/blog" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Blog</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/blog/category" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/admin/code" class="nav-link">
                        <i class="nav-icon fa fa-code"></i>
                        <p>
                            Source Code
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/project" class="nav-link">
                        <i class="nav-icon fa fa-cubes"></i>
                        <p>
                            Project
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/about" class="nav-link">
                        <i class="nav-icon fa fa-address-card"></i>
                        <p>
                            About Me
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/setting" class="nav-link">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>
                            Setting
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Home page </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>