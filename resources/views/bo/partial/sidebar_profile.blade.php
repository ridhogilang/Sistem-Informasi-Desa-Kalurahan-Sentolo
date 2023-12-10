<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ $title == 'Presensi' ? '' : 'collapsed' }}" href="/admin/presensi/daftar-hadir">
                <i class="bi bi-grid"></i>
                <span>Daftar Hadir</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $title == 'Perizinan Absensi' ? '' : 'collapsed' }}" href="{{ route('absen.perizinan-show') }}">
                <i class="bi bi-grid"></i>
                <span>Perizinan Absensi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ ($dropdown1 == "Rekapitulasi") ? '' : 'collapsed' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Rekapitulasi Absen</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse {{ $dropdown1 == 'Rekapitulasi' ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/admin/presensi/rekap-harian" class="{{ $title == 'Rekap Harian' ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Absen Harian</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="/admin/presensi/rekap-bulanan" class="{{ $title == 'Rekap Bulanan' ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Absen Bulanan</span>
                    </a>
                </li> --}}
            </ul>
        </li>
    </ul>
</aside>
