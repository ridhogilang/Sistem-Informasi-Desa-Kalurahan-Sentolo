<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ ($title == "Dashboard") ? '' : 'collapsed' }}" href="/admin/dashboard">
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

        <li class="nav-item">
            <a class="nav-link {{ ($title == "Data Penduduk") ? '' : 'collapsed' }}" href="/penduduk">
                <i class="bi bi-person"></i>
                <span>Penduduk</span>
            </a>
        </li><!-- End Penduduk Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ ($title == "Data Penduduk Migrasi") ? '' : 'collapsed' }}" href="/penduduk-migrasi">
                <i class="bi bi-person"></i>
                <span>Penduduk Migrasi</span>
            </a>
        </li><!-- End Penduduk Migrasi Page Nav -->

    </ul>

</aside>
