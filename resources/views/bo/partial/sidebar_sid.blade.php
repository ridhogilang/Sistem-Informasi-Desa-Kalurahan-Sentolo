<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ ($title == "Dashboard") ? '' : 'collapsed' }}" href="/">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link {{ ($dropdown1 == "Komponen Website") ? '' : 'collapsed' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Komponen Website</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse {{ ($dropdown1 == "Komponen Website") ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/admin/sistem-informasi/header" class="{{ ($title == "Header") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Header</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/sistem-informasi/menu" class="{{ ($title == "Menu") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Menu</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/sistem-informasi/komponen" class="{{ ($title == "Komponen Halaman Utama") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Komponen Halaman Utama</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/sistem-informasi/pamong" class="{{ ($title == "Poster Pamong") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Poster Pamong</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/sistem-informasi/bagan" class="{{ ($title == "Bagan") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Bagan</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/sistem-informasi/galeri" class="{{ ($title == "Gambar Galeri") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Galeri</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/sistem-informasi/apbdes" class="{{ ($title == "APBDes") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>APBDes</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/sistem-informasi/agendagor" class="{{ ($title == "Agenda GOR") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Agenda GOR</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link {{ ($dropdown1 == "Komponen Berita") ? '' : 'collapsed' }}" data-bs-target="#berita-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i>
                <span>Berita</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="berita-nav" class="nav-content collapse {{ ($dropdown1 == "Komponen Berita") ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/admin/sistem-informasi/berita" class="{{ ($title == "Berita") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Tambah Berita</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/sistem-informasi/berita/komentar" class="{{ ($title == "Komentar Berita") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Komentar Berita</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ ($dropdown1 == "Komponen Artikel") ? '' : 'collapsed' }}" data-bs-target="#artikel-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i>
                <span>Artikel</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="artikel-nav" class="nav-content collapse {{ ($dropdown1 == "Komponen Artikel") ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/admin/sistem-informasi/artikel" class="{{ ($title == "Artikel") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Tambah Artikel</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/sistem-informasi/artikel/komentar" class="{{ ($title == "Komentar Artikel") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Komentar Artikel</span>
                    </a>
                </li>
            </ul>
        </li>
        </li><!-- End Nav -->
    </ul>

</aside>
