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
                    <a href="/admin/header" class="{{ ($title == "Header") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Header</span>
                    </a>
                </li>
                <li>
                    <a href="/menu" class="{{ ($title == "Menu") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Menu</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/komponen" class="{{ ($title == "Komponen Halaman Utama") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Komponen Halaman Utama</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/pamong" class="{{ ($title == "Poster Pamong") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Poster Pamong</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/bagan" class="{{ ($title == "Bagan") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Bagan</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/galeri" class="{{ ($title == "Gambar Galeri") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Galeri</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/apbdes" class="{{ ($title == "APBDes") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>APBDes</span>
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
                    <a href="/admin/berita" class="{{ ($title == "Berita") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Tambah Berita</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/berita/komentar" class="{{ ($title == "Komentar Berita") ? 'active' : '' }}">
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
                    <a href="/admin/artikel" class="{{ ($title == "Artikel") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Tambah Artikel</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/artikel/komentar" class="{{ ($title == "Komentar Artikel") ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Komentar Artikel</span>
                    </a>
                </li>
            </ul>
        </li>
        </li><!-- End Nav -->
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
