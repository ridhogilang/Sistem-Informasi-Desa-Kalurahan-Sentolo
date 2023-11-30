<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ ($title == "Dashboard") ? '' : 'collapsed' }}" href="/admin/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
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
