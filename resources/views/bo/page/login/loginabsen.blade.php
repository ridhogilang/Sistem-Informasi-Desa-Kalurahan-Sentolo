<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sentolo | Login Absen Pamong</title>
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
            background-image: url('/home/img/background_login.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center top;
        }
    </style>
</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="/" class="logo d-flex align-items-center w-auto">
                                    <img src="{{ asset('template/img/kulonprogo.png') }}" alt="">
                                    <span class="text-center "  style="color: rgb(255, 193, 7);">Aplikasi Absen Pamong Kalurahan Sentolo</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Untuk Absen Silahkan Login</h5>
                                        <p class="text-center small">Masukkan Email dan password anda untuk login
                                            kedalam aplikasi absen</p>
                                    </div>

                                    <form class="row g-3" action="{{ route('login.absen') }}" method="POST">
                                        @csrf

                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <div class="input-group">
                                                <input type="email" name="email" class="form-control" id="email"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-4">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="yourPassword" required>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>
                                        <div class="col-12 text-end">
                                            <p class="small mb-0"><a href=" {{ route('forget_password.index') }}">Lupa
                                                    Password?</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div><br>

                            <a href="/" class="btn btn-secondary">Kembali</a><br>
                            <div class="credits" style="color: rgb(255, 255, 255);">
                                Made by <a style="color: rgb(255, 193, 7);" href="#">PKKM UJB</a>
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
