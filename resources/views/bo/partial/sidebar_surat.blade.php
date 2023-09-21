<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ ($title == "Dashboard") ? '' : 'collapsed' }}" href="/admin/e-surat/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        @canany(['surat KTM', 'surat Ket Duda / Janda', 'surat Pernyataan Belum Menikah', 'surat Keterangan Belum Menikah', 'surat Pengantar Nikah', 'surat Pengantar SKCK', 'surat Pengantar E-KTP', 'surat Keterangan Kematian', 'surat keterangan Domisili', 'surat keterangan Kelahiran', 'surat Keterangan Tidak Bekerja', 'surat Pengantar Kependudukan', 'surat Pernyataan Belum Bekerja', 'surat Keterangan Penghasilan',])
        <li class="nav-item">
            <a class="nav-link {{ ($dropdown1 == "Surat Keluar") ? '' : 'collapsed' }}" data-bs-target="#surat-nav" data-bs-toggle="collapse" href="#">
                <i class="fa-regular fa-envelope"></i><span>Surat Keluar</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <ul id="surat-nav" class="nav-content collapse {{ ($dropdown1 == "Surat Keluar") ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                @canany(['surat KTM', 'surat Pernyataan Belum Menikah', 'surat Keterangan Belum Menikah', 'surat Keterangan Belum Menikah', 'surat Pengantar Nikah', 'surat Pengantar E-KTP', 'surat Pengantar E-KTP', 'surat Pengantar SKCK', 'surat Pengantar SKCK', 'surat Pernyataan Belum Bekerja', 'surat Keterangan Penghasilan'])
                <li class="nav-item">
                    <a class="nav-link {{ ($dropdown2 == "Kemasyarakatan") ? '' : 'collapsed' }}" data-bs-target="#kemasyarakatan-nav" data-bs-toggle="collapse" href="#">
                        <span>Kemasyarakatan</span><i class="bi bi-chevron-down ms-auto dropdown-dua"></i>
                    </a>
                    <ul id="kemasyarakatan-nav" class="nav-content collapse {{ ($dropdown2 == "Kemasyarakatan" && $dropdown1 == "Surat Keluar") ? 'show' : '' }}" data-bs-parent="#surat-nav">
                        @can('surat KTM')
                        <li>
                            <a href="/admin/e-surat/surat-ktm" class="{{ ($title == "Surat Keterangan Tidak Mampu") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Keterangan Tidak Mampu</span>
                            </a>
                        </li>
                        @endcan
                        @can('surat Pernyataan Belum Menikah')
                        <li>
                            <a href="/admin/e-surat/surat-pbm" class="{{ ($title == "Surat Pernyataan Belum Menikah") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Pernyataan Belum Menikah</span>
                            </a>
                        </li>
                        @endcan
                        @can('surat Keterangan Belum Menikah')
                        <li>
                            <a href="/admin/e-surat/surat-kbm" class="{{ ($title == "Surat Keterangan Belum Menikah") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Keterangan  Belum Menikah</span>
                            </a>
                        </li>
                        @endcan
                        @can('surat Pengantar Nikah')
                        <li>
                            <a href="/admin/e-surat/surat-pn" class="{{ ($title == "Surat Pengantar Nikah") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Pengantar Nikah</span>
                            </a>
                        </li>
                        @endcan
                        @can('surat Pengantar E-KTP')
                        <li>
                            <a href="/admin/e-surat/surat-pektp" class="{{ ($title == "Surat Pengantar E-KTP") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Pengantar E-KTP</span>
                            </a>
                        </li>
                        @endcan
                        @can('surat Pengantar SKCK')
                        <li>
                            <a href="/admin/e-surat/surat-pskck" class="{{ ($title == "Surat Pengantar SKCK") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Pengantar SKCK</span>
                            </a>
                        </li>
                        @endcan
                        @can('surat Pernyataan Belum Bekerja')
                        <li>
                            <a href="/admin/e-surat/surat-belum-bekerja" class="{{ ($title == "Surat Pernyataan Belum Bekerja") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Pernyataan Belum Bekerja</span>
                            </a>
                        </li>
                        @endcan
                        @can('surat Keterangan Penghasilan')
                        <li>
                            <a href="/admin/e-surat/surat-ket-hasil" class="{{ ($title == "Surat Keterangan Penghasilan") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Keterangan Penghasilan</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @canany(['surat keterangan Domisili', 'surat keterangan Kelahiran', 'surat Ket Duda / Janda', 'surat Keterangan Tidak Bekerja', 'surat Keterangan Kematian', 'surat Pengantar Kependudukan', 'surat Pengantar Kependudukan'])
                <li class="nav-item">
                    <a class="nav-link {{ ($dropdown2 == "Pemerintahan") ? '' : 'collapsed' }}" data-bs-target="#pemerintahan-nav" data-bs-toggle="collapse" href="#">
                        <span>Pemerintahan</span><i class="bi bi-chevron-down ms-auto dropdown-dua"></i>
                    </a>
                    <ul id="pemerintahan-nav" class="nav-content collapse {{ ($dropdown2 == "Pemerintahan" && $dropdown1 == "Surat Keluar") ? 'show' : '' }}" data-bs-parent="#surat-nav">
                        @can('surat keterangan Domisili')
                        <li>
                            <a href="/admin/e-surat/surat-kdomisili" class="{{ ($title == "Surat Keterangan Domisili") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Keterangan Domisili</span>
                            </a>
                        </li>
                        @endcan
                        @can('surat keterangan Kelahiran')
                        <li>
                            <a href="/admin/e-surat/surat-kkelahiran" class="{{ ($title == "Surat Keterangan Kelahiran") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Keterangan Kelahiran</span>
                            </a>
                        </li>
                        @endcan
                        @can('surat Ket Duda / Janda')
                        <li>
                        <a href="/admin/e-surat/surat-kduda" class="{{ ($title == "Surat Keterangan Duda / Janda") ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Keterangan Duda / Janda</span>
                        </a>
                        </li>
                        @endcan
                        @can('surat Keterangan Tidak Bekerja')
                        <li>
                            <a href="/admin/e-surat/surat-ktbekerja" class="{{ ($title == "Surat Keterangan Tidak Bekerja") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Keterangan Tidak Bekerja</span>
                            </a>
                        </li>
                        @endcan
                        @can('surat Keterangan Kematian')
                        <li>
                            <a href="/admin/e-surat/surat-kkematian" class="{{ ($title == "Surat Keterangan Kematian") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Keterangan Kematian</span>
                            </a>
                        </li>
                        @endcan
                        @can('surat Pengantar Kependudukan')
                        <li>
                            <a href="/admin/e-surat/surat-pk" class="{{ ($title == "Surat Pengantar Kependudukan") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Pengantar Kependudukan</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
            </ul>
        </li><!-- End Nav -->
        @endcanany
        <li class="nav-item">
            <a class="nav-link {{ ($title == "Surat Masuk") ? '' : 'collapsed' }}" href="/admin/e-surat/surat-masuk">
                <i class="fa-regular fa-envelope-open"></i>
                <span>Surat Masuk</span>
            </a>
        </li><!-- End Surat Masuk Nav -->

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
