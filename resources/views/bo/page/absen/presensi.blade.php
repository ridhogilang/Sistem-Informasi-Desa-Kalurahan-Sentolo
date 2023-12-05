<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sentolo | Absen Pamong</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('home/img/kulonprogo.png') }}" rel="icon">
    <link href="{{ asset('home/img/kulonprogo.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">

    <style>
        body,
        html {
            /* background-image: url('/home/img/batikloading.png'); */
            background: #FF416C;
            background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
            background: linear-gradient(to right, #FF4B2B, #FF416C);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0 0;
        }

        .card-body {
            width: 300px;
            /* Ganti dengan lebar yang diinginkan */
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;

        }
    </style>

</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-1">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-1 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-5">
                                <a href="/" class="logo d-flex align-items-center w-auto">
                                    <img src="{{ asset('template/img/kulonprogo.png') }}" alt="">
                                    <span class="text-center">Aplikasi Absen Pamong Kalurahan Sentolo</span>
                                </a>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show"
                                    role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                                    role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="card mb-1">
                                <div class="card-body">
                                    @if ($libur)
                                        <div class="text-center">
                                            <p>Absen Libur (Hari Libur Nasional {{ $holiday }})</p>
                                        </div>
                                    @else
                                        @if (date('l') == 'Saturday' || date('l') == 'Sunday')
                                            <div class="text-center">
                                                <p>Absen Libur</p>
                                            </div>
                                        @else
                                            @if ($present)
                                                @if ($present->keterangan == 'Alpha')
                                                    <div class="text-center">
                                                        @if (strtotime(date('H:i:s')) >= strtotime(config('absensi.jam_masuk') . ' -1 hours') &&
                                                                strtotime(date('H:i:s')) <= strtotime(config('absensi.jam_pulang')))
                                                            <p>Silahkan Check-in</p>
                                                            <form action="{{ route('kehadiran.check-in') }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="user_id"
                                                                    value="{{ auth()->user()->id }}">
                                                                <button class="btn btn-primary"
                                                                    type="submit">Check-in</button>
                                                            </form>
                                                        @else
                                                            <p>Check-in Belum Tersedia</p>
                                                        @endif
                                                    </div>
                                                @elseif($present->keterangan == 'Cuti')
                                                    <div class="text-center">
                                                        <p>Anda Sedang Cuti</p>
                                                    </div>
                                                @else
                                                    <div class="text-center">
                                                        <p>
                                                            Check-in hari ini pukul : ({{ $present->jam_masuk }})
                                                        </p>
                                                        @if ($present->jam_keluar)
                                                            <p>Check-out hari ini pukul : ({{ $present->jam_keluar }})
                                                            </p>
                                                        @else
                                                            @if (strtotime('now') >= strtotime(config('absensi.jam_pulang')))
                                                                <p>Jika pekerjaan telah selesai silahkan check-out</p>
                                                                <form
                                                                    action="{{ route('kehadiran.check-out', ['kehadiran' => $present]) }}"
                                                                    method="post">
                                                                    @csrf @method('patch')
                                                                    <button class="btn btn-primary"
                                                                        type="submit">Check-out</button>
                                                                </form>
                                                            @else
                                                                <p>Check-out Belum Tersedia</p>
                                                            @endif
                                                        @endif
                                                    </div>
                                                @endif
                                            @else
                                                <div class="text-center">
                                                    @if (strtotime(date('H:i:s')) >= strtotime(config('absensi.jam_masuk') . ' -1 hours') &&
                                                            strtotime(date('H:i:s')) <= strtotime(config('absensi.jam_pulang')))
                                                        <p>Silahkan Check-in</p>
                                                        <form action="{{ route('kehadiran.check-in') }}"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" name="user_id"
                                                                value="{{ auth()->user()->id }}">
                                                            <button class="btn btn-primary"
                                                                type="submit">Check-in</button>
                                                        </form>
                                                    @else
                                                        <p>Check-in Belum Tersedia</p>
                                                    @endif
                                                </div>
                                            @endif
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <br><br>
                            <div class="credits text-center">
                                <div>
                                    <a href="/admin/presensi/daftar-hadir" class="btn btn-warning ">Rekap Kehadiran</a>
                                    <a href="/" class="btn btn-secondary">Kembali</a>
                                </div><br><br>
                                <div>Made by <a href="#">PKKM UJB</a></div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('template/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('template/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('template/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('template/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('template/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('template/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('template/js/main.js') }}"></script>

    <!-- sweet allert-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('sweetalert::alert')

    <script>
        @if (session('toast_success'))
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            Toast.fire({
                icon: 'success',
                title: '{{ session('toast_success') }}'
            });
        @endif
    </script>

</body>

</html>
