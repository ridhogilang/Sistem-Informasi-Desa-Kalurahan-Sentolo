<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">
            <img src="{{ asset('template/img/kulonprogo.png') }}" alt="">
            <span class="d-none d-lg-block">Kalurahan Sentolo</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                    data-bs-toggle="dropdown">
                    <b class="btn fs-3"><i class="bi bi-grid-3x3-gap-fill"></i></b>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

                    <li class="dropdown-header">
                        <h6>Aplikasi Kalurahan</h6>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('bo.home') }}">
                                <i class="bi bi-house-door"></i>
                                <span>Beranda</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    @can('Menejemen E-Surat')
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('bo.e-surat.dashboard') }}">
                                <i class="bi bi-envelope"></i>
                                <span>E-Surat</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    @endcan
                    @can('Menejemen Sistem Informasi')
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('bo.sid.dashboard') }}">
                                <i class="bi bi-info-lg"></i>
                                <span>Sistem Informasi</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    @endcan
                    @can('Menejemen Pengguna')
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('bo.pegawai.dashboard') }}">
                                <i class="bi bi-fingerprint"></i>
                                <span>Pengguna</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    @endcan
                    @can('Menejemen Kependudukan')
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('bo.penduduk.dashboard') }}">
                                <i class="bi bi-person"></i>
                                <span>Kependudukan</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    @endcan
                    @if(auth()->user()->is_pamong == 1)
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/admin/presensi/daftar-hadir">
                                <i class="bi bi-file-medical"></i>
                                <span>Absensi</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    @endif
                    @can('Monitoring IOT')
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('bo.monitor_iot') }}">
                                <i class="bi bi-display"></i>
                                <span>Monitoring IOT</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    @endcan


                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0 btn" href="#"
                    data-bs-toggle="dropdown">
                    <img src="{{ isset(auth()->user()->foto_profil) ? asset('storage/public/' . auth()->user()->foto_profil) : asset('template/img/akun_kosong.png') }}" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->nama }}</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

                    <li class="dropdown-header">
                        <h6>{{ auth()->user()->nama }}</h6>
                        <span>
                            @if(isset(auth()->user()->roles[0]['name']))
                                {{ auth()->user()->roles[0]['name'] }}
                            @endif
                        </span>

                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('bo.akun.akun') }}">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/admin/bantuan">
                            <i class="bi bi-question-circle"></i>
                            <span>Bantuan</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </button>
                        </form>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header>
