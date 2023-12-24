<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            @if(auth()->user()->jabatana <> null)
            <a class="nav-link {{ ($title == "Dashboard") ? '' : 'collapsed' }}" href="/admin/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
            @else
            <a class="nav-link" href="/profile-penduduk">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
            @endif
        </li><!-- End Dashboard Nav -->
        @can('Menejemen E-Surat')
            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/e-surat/dashboard">
                    <i class="bi bi-envelope"></i>
                    <span>E-surat</span>
                </a>
            </li><!-- End Surat Masuk Nav -->
        @endcan
        @can('Menejemen Sistem Informasi')
            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/sistem-informasi/dashboard">
                    <i class="bi bi-info-lg"></i>
                    <span>Sistem Informasi</span>
                </a>
            </li><!-- End Surat Masuk Nav -->
        @endcan
        @can('Menejemen Pengguna')
            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/pengguna/dashboard">
                    <i class="bi bi-fingerprint"></i>
                    <span>Pengguna</span>
                </a>
            </li><!-- End Surat Masuk Nav -->
        @endcan
        @can('Menejemen Kependudukan')
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('bo.penduduk.dashboard') }}">
                <i class="bi bi-person"></i>
                <span>Kependudukan</span>
            </a>
        </li><!-- End Penduduk Page Nav -->
        @endcan
        @if(auth()->user()->is_pamong == 1)
        <li class="nav-item">
            <a class="nav-link collapsed" href="/admin/presensi/daftar-hadir">
                <i class="bi bi-file-medical"></i>
                <span>Absensi</span>
            </a>
        </li>
        @endif
        @can('Monitoring IOT')
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('bo.monitor_iot') }}">
                <i class="bi bi-display"></i>
                <span>Monitoring IOT</span>
            </a>
        </li><!-- End Penduduk Page Nav -->
        @endcan
    </ul>

</aside>
