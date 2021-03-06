<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
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
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item {{ Route::currentRouteName()==='categories.index' || Route::currentRouteName()==='categories.create' ?'menu-open':'' }}">
                    <a href="#" class="nav-link {{ Route::currentRouteName()==='categories.index' || Route::currentRouteName()==='categories.create' ?'active':'' }}" >
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link {{ Route::currentRouteName()==='categories.index'?'active':'' }}">
                                <i class="fas fa-list nav-icon"></i>
                                <p>List All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories.create') }}" class="nav-link {{ Route::currentRouteName()==='categories.create'?'active':'' }}">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ Route::currentRouteName()==='tags.index' || Route::currentRouteName()==='tags.create' ?'menu-open':'' }}">
                <a href="#" class="nav-link {{ Route::currentRouteName()==='tags.index' || Route::currentRouteName()==='tags.create' ?'active':'' }}" >
                    <i class="nav-icon fas fa-folder"></i>
                    <p>
                        Tags
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('tags.index') }}" class="nav-link {{ Route::currentRouteName()==='tags.index'?'active':'' }}">
                            <i class="fas fa-list nav-icon"></i>
                            <p>List All</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('tags.create') }}" class="nav-link {{ Route::currentRouteName()==='tags.create'?'active':'' }}">
                            <i class="fas fa-plus nav-icon"></i>
                            <p>Add New</p>
                        </a>
                    </li>
                </ul>
                </li>

                <li class="nav-item {{ Route::currentRouteName()==='posts.index' || Route::currentRouteName()==='posts.create' ?'menu-open':'' }}">
                    <a href="#" class="nav-link {{ Route::currentRouteName()==='posts.index' || Route::currentRouteName()==='posts.create' ?'active':'' }}" >
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Posts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('posts.index') }}" class="nav-link {{ Route::currentRouteName()==='posts.index'?'active':'' }}">
                                <i class="fas fa-list nav-icon"></i>
                                <p>List All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('posts.create') }}" class="nav-link {{ Route::currentRouteName()==='posts.create'?'active':'' }}">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ Route::currentRouteName()==='uploads.index' || Route::currentRouteName()==='uploads.create' ?'menu-open':'' }}">
                    <a href="#" class="nav-link {{ Route::currentRouteName()==='uploads.index' || Route::currentRouteName()==='uploads.create' ?'active':'' }}" >
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Images
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('uploads.index') }}" class="nav-link {{ Route::currentRouteName()==='uploads.index'?'active':'' }}">
                                <i class="fas fa-list nav-icon"></i>
                                <p>List All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('uploads.create') }}" class="nav-link {{ Route::currentRouteName()==='uploads.create'?'active':'' }}">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add New</p>
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
