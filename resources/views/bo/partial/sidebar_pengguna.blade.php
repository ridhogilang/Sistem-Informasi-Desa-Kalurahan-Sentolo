<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ ($title == "Dashboard") ? '' : 'collapsed' }}" href="{{ route('bo.pegawai.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <!-- ini nanti can kelola akun penduduk, kelola akun pamong, kelola hak akses dahlah itu bisa crud semua dan semuanya bisa aku puuyeng middleware pasang no route mbuh nopo nek pasang kui kudune pie -->
        @can('Kelola Pengguna')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/pengguna/user_management*') ? '' : 'collapsed' }}" href="{{ route('bo.pegawai.user_management.index') }}">
                <i class="bi bi-people"></i>
                <span>Data Pengguna</span>
            </a>
        </li>
        @endcan
        <!-- End Surat Masuk Nav -->
        @can('Kelola Hak Akses Pamong')
        <li class="nav-item">
            <a class="nav-link  {{ request()->is('admin/pengguna/role_management*') ? '' : 'collapsed' }}" href="{{ route('bo.pegawai.role_management.index') }}">
                <i class="bx bx-lock"></i>
                <span>Hak Akses Pamong</span>
            </a>
        </li>
        @endcan
        <!-- End Surat Masuk Nav -->

    </ul>

</aside>
