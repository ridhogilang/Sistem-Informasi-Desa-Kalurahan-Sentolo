<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ ($title == "Dashboard") ? '' : 'collapsed' }}" href="/">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ ($dropdown1 == "Surat") ? '' : 'collapsed' }}" data-bs-target="#surat-nav" data-bs-toggle="collapse" href="#">
                <i class="fa-regular fa-envelope"></i><span>Surat</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="surat-nav" class="nav-content collapse {{ ($dropdown1 == "Surat") ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ ($dropdown2 == "Kemasyarakatan") ? '' : 'collapsed' }}" data-bs-target="#kemasyarakatan-nav" data-bs-toggle="collapse" href="#">
                        <span>Kemasyarakatan</span><i class="bi bi-chevron-down ms-auto dropdown-dua"></i>
                    </a>
                    <ul id="kemasyarakatan-nav" class="nav-content collapse {{ ($dropdown2 == "Kemasyarakatan" && $dropdown1 == "Surat") ? 'show' : '' }}" data-bs-parent="#surat-nav">
                        <li>
                            <a href="/surat-ktm" class="{{ ($title == "Surat Keterangan Tidak Mampu") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Keterangan Tidak Mampu</span>
                            </a>
                        </li>
                        <li>
                            <a href="/p-ektp" class="{{ ($title == "Pengantar E-KTP") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Pengantar E-KTP</span>
                            </a>
                        </li>
                        <li>
                            <a href="/surat-kematian" class="{{ ($title == "Surat Kematian") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Keterangan Kematian</span>
                            </a>
                        </li>
                        <li>
                            <a href="/surat-kelahiran" class="{{ ($title == "Surat Kelahiran") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Keterangan Kelahiran</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($dropdown2 == "Pemerintahan") ? '' : 'collapsed' }}" data-bs-target="#pemerintahan-nav" data-bs-toggle="collapse" href="#">
                        <span>Pemerintahan</span><i class="bi bi-chevron-down ms-auto dropdown-dua"></i>
                    </a>
                    <ul id="pemerintahan-nav" class="nav-content collapse {{ ($dropdown2 == "Pemerintahan" && $dropdown1 == "Surat") ? 'show' : '' }}" data-bs-parent="#surat-nav">
                        <li>
                            <a href="/surat-domisili" class="{{ ($title == "Surat Keterangan Domisili") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Keterangan Domisili</span>
                            </a>
                        </li>
                        <li>
                            <a href="/surat-duda" class="{{ ($title == "Surat Keterangan Duda") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Keterangan Duda</span>
                            </a>
                        </li>
                        <li>
                            <a href="/surat-tidak-bekerja" class="{{ ($title == "Surat Tidak Bekerja") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Keterangan Tidak Bekerja</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li><!-- End Nav -->

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
