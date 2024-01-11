<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
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
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Dashboard
                        {{-- <span class="right badge badge-danger">New</span> --}}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link ">
                    <i class="nav-icon fas fa-bookmark"></i>
                    <p>
                        Peminjaman
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('peminjaman.index') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Peminjaman Data</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('peminjaman.create') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Peminjaman Baru</p>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Kategori
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kategori.index') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kategori Data</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kategori.create') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kategori Baru</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-newspaper"></i>
                    <p>
                        Penerbit
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('penerbit.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Penerbit Data</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('penerbit.create') }}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Penerbit Baru</p>
                        </a>
                    </li>

                </ul>
            <li class="nav-item">
                <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-book"></i>

                    <p>
                        Buku
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('buku.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Buku Data</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('buku.create') }}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Buku Baru</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-boxes"></i>
                    <p>
                        Rak
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('rak.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Rak Data</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('rak.create') }}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Rak Baru</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Member
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('member.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Member Data</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('member.create') }}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Member Baru</p>
                        </a>
                    </li>

                </ul>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
