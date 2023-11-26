<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ ($title == "Dashboard") ? '' : 'collapsed' }}" href="/">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <!-- ini nanti can kelola akun penduduk, kelola akun pamong, kelola hak akses dahlah itu bisa crud semua dan semuanya bisa aku puuyeng middleware pasang no route mbuh nopo nek pasang kui kudune pie -->
        @can('Kelola Akun Penduduk')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/pengguna/akun_penduduk_management*') ? '' : 'collapsed' }}" href="{{ route('bo.pengguna.akun_penduduk_management.index') }}">
                <i class="fa-regular fa-envelope-open"></i>
                <span>Akun Penduduk</span>
            </a>
        </li>
        @endcan
        @can('Kelola Akun Pamong')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/pengguna/user_management*') ? '' : 'collapsed' }}" href="{{ route('bo.pegawai.user_management.index') }}">
                <i class="fa-regular fa-envelope-open"></i>
                <span>Akun Pamong</span>
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
