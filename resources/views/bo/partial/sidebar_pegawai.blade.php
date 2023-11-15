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
                <span>Pegawai</span>
            </a>
        </li>
        @endcanany
        <!-- End Surat Masuk Nav -->
        @canany(['role_list', 'role_create', 'role_edit', 'role_delete'])
        <li class="nav-item">
            <a class="nav-link  {{ request()->is('admin/pegawai/role_management*') ? '' : 'collapsed' }}" href="{{ route('bo.pegawai.role_management.index') }}">
                <i class="bx bx-lock"></i>
                <span>Role</span>
            </a>
        </li>
        @endcanany
        <!-- End Surat Masuk Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link {{ ($title == "Profile") ? '' : 'collapsed' }}" href="/profile">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ ($title == "Register") ? '' : 'collapsed' }}" href="/register">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ ($title == "Login") ? '' : 'collapsed' }}" href="/login">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li><!-- End Login Page Nav -->

    </ul>

</aside>
