<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">

                <!-- Sales Card -->
                <div class="col-xxl-3 col-md-3">
                    <div class="card info-card sales-card {{ ($title == "Profile Penduduk") ? 'active-primary' : '' }}">

                        <div class="card-body">
                            <h5 class="card-title">Profile Penduduk</h5>

                            <div class="d-flex align-items-center">
                                <a class="d-flex align-items-center w-100" href="/profile-penduduk">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Profile</h6>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-3 col-md-3">
                    <div class="card info-card revenue-card {{ ($title == "Buat Surat Mandiri") ? 'active-success' : '' }}">

                        <div class="card-body">
                            <h5 class="card-title">Buat Surat</h5>

                            <div class="d-flex align-items-center">
                                <a class="d-flex align-items-center w-100" href="/buat-surat">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa-regular fa-file"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Surat</h6>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->

                <!-- Sales Card -->
                {{-- <div class="col-xxl-3 col-md-3">
                    <div class="card info-card customers-card {{ ($title == "Buat Pesan") ? 'active-warning' : '' }}">

                        <div class="card-body">
                            <h5 class="card-title">Buat Pesan</h5>

                            <div class="d-flex align-items-center">
                                <a class="d-flex align-items-center w-100" href="/buat-pesan">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa-regular fa-message"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Pesan</h6>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card --> --}}

                <!-- Revenue Card -->
                {{-- <div class="col-xxl-3 col-md-3">
                    <div class="card info-card sales-card {{ ($title == "Bantuan Penduduk") ? 'active-info' : '' }}">

                        <div class="card-body">
                            <h5 class="card-title">Bantuan Penduduk</h5>

                            <div class="d-flex align-items-center">
                                <a class="d-flex align-items-center w-100" href="/bantuan">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa-regular fa-handshake"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Bantuan</h6>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card --> --}}

            </div>
        </div><!-- End Left side columns -->

    </div>
</section>
