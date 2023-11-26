<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ ($title == "Dashboard") ? '' : 'collapsed' }}" href="/admin/e-surat/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        @can('Surat Keluar')
        <li class="nav-item">
            <a class="nav-link {{ ($dropdown1 == "Surat Keluar") ? '' : 'collapsed' }}" data-bs-target="#surat-nav" data-bs-toggle="collapse" href="#">
                <i class="fa-regular fa-envelope"></i><span>Surat Keluar</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <ul id="surat-nav" class="nav-content collapse {{ ($dropdown1 == "Surat Keluar") ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ ($dropdown2 == "Kemasyarakatan") ? '' : 'collapsed' }}" data-bs-target="#kemasyarakatan-nav" data-bs-toggle="collapse" href="#">
                        <span>Kemasyarakatan</span><i class="bi bi-chevron-down ms-auto dropdown-dua"></i>
                    </a>
                    <ul id="kemasyarakatan-nav" class="nav-content collapse {{ ($dropdown2 == "Kemasyarakatan" && $dropdown1 == "Surat Keluar") ? 'show' : '' }}" data-bs-parent="#surat-nav">
                        <li>
                            <a href="/admin/e-surat/surat-ktm" class="{{ ($title == "Surat Keterangan Tidak Mampu") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Keterangan Tidak Mampu</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/e-surat/surat-pbm" class="{{ ($title == "Surat Pernyataan Belum Menikah") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Pernyataan Belum Menikah</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/e-surat/surat-kbm" class="{{ ($title == "Surat Keterangan Belum Menikah") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Keterangan  Belum Menikah</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/e-surat/surat-pn" class="{{ ($title == "Surat Pengantar Nikah") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Pengantar Nikah</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/e-surat/surat-pektp" class="{{ ($title == "Surat Pengantar E-KTP") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Pengantar E-KTP</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/e-surat/surat-pskck" class="{{ ($title == "Surat Pengantar SKCK") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Pengantar SKCK</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/e-surat/surat-belum-bekerja" class="{{ ($title == "Surat Pernyataan Belum Bekerja") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Pernyataan Belum Bekerja</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/e-surat/surat-ket-hasil" class="{{ ($title == "Surat Keterangan Penghasilan") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Keterangan Penghasilan</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/e-surat/surat-cstm" class="{{ ($title == "Surat Custom") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Surat Custom</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($dropdown2 == "Pemerintahan") ? '' : 'collapsed' }}" data-bs-target="#pemerintahan-nav" data-bs-toggle="collapse" href="#">
                        <span>Pemerintahan</span><i class="bi bi-chevron-down ms-auto dropdown-dua"></i>
                    </a>
                    <ul id="pemerintahan-nav" class="nav-content collapse {{ ($dropdown2 == "Pemerintahan" && $dropdown1 == "Surat Keluar") ? 'show' : '' }}" data-bs-parent="#surat-nav">
                        <li>
                            <a href="/admin/e-surat/surat-kdomisili" class="{{ ($title == "Surat Keterangan Domisili") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Keterangan Domisili</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/e-surat/surat-kkelahiran" class="{{ ($title == "Surat Keterangan Kelahiran") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Keterangan Kelahiran</span>
                            </a>
                        </li>
                        <li>
                        <a href="/admin/e-surat/surat-kduda" class="{{ ($title == "Surat Keterangan Duda / Janda") ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Keterangan Duda / Janda</span>
                        </a>
                        </li>
                        <li>
                            <a href="/admin/e-surat/surat-ktbekerja" class="{{ ($title == "Surat Keterangan Tidak Bekerja") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Keterangan Tidak Bekerja</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/e-surat/surat-kkematian" class="{{ ($title == "Surat Keterangan Kematian") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Keterangan Kematian</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/e-surat/surat-pk" class="{{ ($title == "Surat Pengantar Kependudukan") ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Pengantar Kependudukan</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li><!-- End Nav -->
        @endcan
        @can('Surat Masuk')
        <li class="nav-item">
            <a class="nav-link {{ ($title == "Surat Masuk") ? '' : 'collapsed' }}" href="/admin/e-surat/surat-masuk">
                <i class="fa-regular fa-envelope-open"></i>
                <span>Surat Masuk</span>
            </a>
        </li><!-- End Surat Masuk Nav -->
        @endcan
        <li class="nav-item">
            <a class="nav-link {{ ($title == "Verifikasi Surat Keluar") ? '' : 'collapsed' }}" href="/admin/e-surat/validasi">
                <i class="bi bi-file-earmark-check"></i>
                <span>Verifikasi Surat  Pelayanan Mandiri</span>
            </a>
        </li><!-- End Validasi Nav -->
        <li class="nav-item">
            <a class="nav-link {{ ($title == "Verifikasi Surat Keluar") ? '' : 'collapsed' }}" href="/admin/e-surat/validasi">
                <i class="bi bi-file-earmark-check"></i>
                <span>Verifikasi Surat</span>
            </a>
        </li><!-- End Validasi Nav -->
        <li class="nav-item">
            <a class="nav-link {{ ($title == "Disposisi Surat Masuk") ? '' : 'collapsed' }}" href="/admin/e-surat/disposisi">
                <i class="bi bi-mailbox"></i>
                <span>Disposisi Surat</span>
            </a>
        </li><!-- End Disposisi Nav -->
        @can('Arsip Surat')
        <li class="nav-item">
            <a class="nav-link {{ ($title == "Arsip Desa") ? '' : 'collapsed' }}" href="/admin/e-surat/arsip">
                <i class="bi bi-archive"></i>
                <span>Arsip Surat</span>
            </a>
        </li><!-- End Validasi Nav -->
        @endcan
        @can('Arsip Dihapus')
        <li class="nav-item">
            <a class="nav-link {{ ($title == 'Arsip Desa Telah Dihapus') ? '' : 'collapsed' }}" href="/admin/e-surat/arsip_dihapus">
                <i class="bi bi-archive-fill"></i>
                <span>Arsip Sudah Dihapus</span>
            </a>
        </li><!-- End Validasi Nav -->
        @endcan
    </ul>

</aside>
