<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ ($title == "Dashboard") ? '' : 'collapsed' }}" href="/admin/kependudukan/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link {{ ($title == "Data Penduduk") ? '' : 'collapsed' }}" href="/admin/kependudukan/penduduk">
                <i class="fa-solid fa-users"></i>
                <span>Penduduk</span>
            </a>
        </li><!-- End Penduduk Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ ($title == "Data Penduduk Migrasi") ? '' : 'collapsed' }}" href="/admin/kependudukan/penduduk-migrasi">
                <i class="fa-solid fa-users-slash"></i>
                <span>Penduduk Migrasi</span>
            </a>
        </li><!-- End Penduduk Migrasi Page Nav -->

    </ul>

</aside>
