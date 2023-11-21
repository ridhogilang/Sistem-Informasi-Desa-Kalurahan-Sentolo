<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ ($title == "Dashboard") ? '' : 'collapsed' }}" href="/">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        @canany(['user_list', 'user_create', 'user_edit', 'user_delete'])
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/pegawai/user_management*') ? '' : 'collapsed' }}" href="{{ route('bo.pegawai.user_management.index') }}">
                <i class="fa-regular fa-envelope-open"></i>
                <span>Akun Penduduk</span>
            </a>
        </li>
        @endcanany
        @canany(['user_list', 'user_create', 'user_edit', 'user_delete'])
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/pegawai/user_management*') ? '' : 'collapsed' }}" href="{{ route('bo.pegawai.user_management.index') }}">
                <i class="fa-regular fa-envelope-open"></i>
                <span>Akun Pamong</span>
            </a>
        </li>
        @endcanany
        <!-- End Surat Masuk Nav -->
        @canany(['role_list', 'role_create', 'role_edit', 'role_delete'])
        <li class="nav-item">
            <a class="nav-link  {{ request()->is('admin/pegawai/role_management*') ? '' : 'collapsed' }}" href="{{ route('bo.pegawai.role_management.index') }}">
                <i class="bx bx-lock"></i>
                <span>Hak Akses Pamong</span>
            </a>
        </li>
        @endcanany
        <!-- End Surat Masuk Nav -->

    </ul>

</aside>
