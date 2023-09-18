<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ ($title == "Dashboard") ? '' : 'collapsed' }}" href="/">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        @can('enter_kepegawaian')
            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/pegawai/dashboard">
                    <i class="fa-regular fa-envelope-open"></i>
                    <span>Kepegawaian</span>
                </a>
            </li><!-- End Surat Masuk Nav -->
        @endcan
        @can('enter_e-surat')
            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/e-surat/dashboard">
                    <i class="fa-regular fa-envelope-open"></i>
                    <span>E-surat</span>
                </a>
            </li><!-- End Surat Masuk Nav -->
        @endcan
        @can('enter_sistem informasi')
            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/sistem-informasi/dashboard">
                    <i class="fa-regular fa-envelope-open"></i>
                    <span>Sistem Informasi</span>
                </a>
            </li><!-- End Surat Masuk Nav -->
        @endcan
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
