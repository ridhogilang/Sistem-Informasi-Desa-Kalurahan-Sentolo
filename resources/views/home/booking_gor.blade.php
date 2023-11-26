<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sentolo | Login</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('template/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('template/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

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

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <main>
        <div class="container">

            <div class="pagetitle">
                <br><br>
            </div><!-- End Page Title -->

            <section class="section">
                <div class="row">

                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">

                                <div class="card mb-3">

                                    <div class="card-body">
                    
                                      <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Halaman Booking Gedung Olahraha Kalurahan Sentolo</h5>
                                        <p class="text-center small">Silahkan Mengisi Form Di Bawah ini Untuk Melakukan Booking GOR</p>
                                      </div>
                    
                                      <form class="row g-3 needs-validation" action="/booking-gor"
                                      method="POST">
                                      @csrf
                                      @method('post')
                                        <div class="col-12">
                                          <label for="Kegiatan" class="form-label">Kegiatan</label>
                                          <input type="text" name="kegiatan" class="form-control" id="kegiatan" required>
                                          <div class="invalid-feedback">Tulis Kegiatan Anda</div>
                                        </div>
                    
                                        <div class="col-12">
                                          <label for="tanggal" class="form-label">Tanggal</label>
                                          <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                                          <div class="invalid-feedback">Masukan Tanggal Booking</div>
                                        </div>
                    
                                        <div class="col-12">
                                          <label for="inputTime" class="form-label">Waktu</label>
                                          <div class="input-group has-validation">
                                            <input type="time" name="waktu" class="form-control" id="waktu" required>
                                            <div class="invalid-feedback">Masukan Jam Booking.</div>
                                          </div>
                                        </div>
                    
                                        <div class="col-12">
                                          <label for="inputTime" class="form-label">Selesai</label>
                                          <input type="time" name="selesai" class="form-control" id="selesai" required>
                                          <div class="invalid-feedback">Masukan Jam Selesai</div>
                                        </div>

                                        <div class="col-12">
                                          <label for="Penangung Jawab" class="form-label">Penanggung Jawab</label>
                                          <input type="text" name="koordinator" class="form-control" id="koordinator" required>
                                          <div class="invalid-feedback">Masukan Nama Penanggung Jawab</div>
                                        </div>

                                        <div class="col-12">
                                          <label for="Nomor HP" class="form-label">Nomor HP</label>
                                          <input type="text" name="nomorhp" class="form-control" id="nomorhp" required>
                                          <div class="invalid-feedback">Masukan Nomor HP Anda</div>
                                        </div>
                                        <div class="col-12">
                                          <button class="btn btn-primary w-100" type="submit">BOOKING</button>
                                        </div>
                                        <div class="col-12">
                                          <p class="small mb-0"><a href="{{ url()->previous() }}">Kembali</a></p>
                                        </div>
                                      </form>
                    
                                    </div>
                                  </div>
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