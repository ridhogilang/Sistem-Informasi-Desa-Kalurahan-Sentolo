<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sentolo | Booking Balai</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('home/img/kulonprogo.png') }}" rel="icon">
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

    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <main>
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="d-flex justify-content-center py-4">
                        <a href="#" class="logo d-flex align-items-center w-auto">
                            <img src="{{ asset('home/img/kulonprogo.png') }}" alt="">
                            <span class="d-none d-lg-block">Kalurahan Sentolo</span>
                        </a>
                    </div>

                    <section class="section">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="pt-4 pb-2">
                                                <h5 class="card-title text-center pb-0 fs-4">Halaman Booking Balai Desa
                                                    Kalurahan Sentolo</h5>
                                                <p class="text-center small">Silahkan Mengisi Form Di Bawah ini Untuk
                                                    Melakukan Booking Balai</p>
                                                <p class="text-center small">!! Setelah Mengisi Form Di Bawah ini, Maka
                                                    Admin dari kalurahan akan menghubngi anda untuk melakukan konfirmasi
                                                    !!</p>
                                            </div>

                                            <form class="row g-3 needs-validation" action="/booking-balai"
                                                method="POST">
                                                @csrf
                                                @method('post')
                                                <div class="col-12">
                                                    <label for="Kegiatan" class="form-label">Kegiatan</label>
                                                    <input type="text" name="kegiatan" class="form-control"
                                                        id="kegiatan" required value="{{ old('kegiatan') }}">
                                                    <div class="invalid-feedback">Tulis Kegiatan Anda</div>
                                                </div>

                                                <div class="col-12">
                                                    <label for="tanggal" class="form-label">Tanggal</label>
                                                    <input type="date" name="tanggal" class="form-control"
                                                        id="tanggal" value="{{ old('tanggal') }}" required>
                                                    <div class="invalid-feedback">Masukan Tanggal Booking</div>
                                                </div>

                                                <div class="col-6">
                                                    <label for="inputTime" class="form-label">Waktu Mulai</label>
                                                    <div class="input-group has-validation">
                                                        <input type="time" name="waktu" class="form-control"
                                                            id="waktu" value="{{ old('waktu') }}" required>
                                                        <div class="invalid-feedback">Masukan Jam Booking.</div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <label for="inputTime" class="form-label">Waktu Selesai</label>
                                                    <input type="time" name="selesai" class="form-control"
                                                        id="selesai" value="{{ old('selesai') }}" required>
                                                    <div class="invalid-feedback">Masukan Jam Selesai</div>
                                                </div>

                                                <div class="col-6">
                                                    <label for="Penangung Jawab" class="form-label">Penanggung
                                                        Jawab</label>
                                                    <input type="text" name="koordinator" class="form-control"
                                                        id="koordinator" value="{{ old('koordinator') }}" required>
                                                    <div class="invalid-feedback">Masukan Nama Penanggung Jawab</div>
                                                </div>

                                                <div class="col-6">
                                                    <label for="Nomor HP" class="form-label">Nomor HP</label>
                                                    <input type="text" name="nomorhp" class="form-control"
                                                        id="nomorhp" value="{{ old('nomorhp') }}" required>
                                                    <div class="invalid-feedback">Masukan Nomor HP Anda</div>
                                                </div><br><br>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <label for="captcha" class="form-label">Kode Captcha
                                                                <span style="color:red">*</span></label>
                                                            <div id="captcha-container">
                                                                <span id="num1"></span> + <span
                                                                    id="num2"></span> =
                                                                <input type="hidden" name="num1" value="">
                                                                <input type="hidden" name="num2" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <button type="button" class="btn btn-warning text-sm"
                                                                id="change-captcha">[Ganti Captcha]</button>
                                                        </div>
                                                        <div class="col-6">
                                                            <input type="text" class="form-control required"
                                                                name="captcha" id="captcha"
                                                                placeholder="Hasil penambahan dari kode Captcha"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <a href="/" class="btn btn-secondary w-100"
                                                        style="color: white;">Kembali</a>
                                                </div>
                                                <div class="col-6">
                                                    <button class="btn btn-primary w-100"
                                                        type="submit">Booking</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </section>
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

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
            });
        </script>
    @endif
    <script>
        // Fungsi untuk menghasilkan dua angka acak antara 1 dan 10
        function generateRandomNumbers() {
            const num1 = Math.floor(Math.random() * 10) + 1;
            const num2 = Math.floor(Math.random() * 10) + 1;
            return {
                num1,
                num2
            };
        }

        // Fungsi untuk menampilkan operasi penambahan di captcha-container
        function displayCaptcha() {
            const {
                num1,
                num2
            } = generateRandomNumbers();
            document.getElementById("num1").textContent = num1;
            document.getElementById("num2").textContent = num2;

            // Isi nilai num1 dan num2 dalam input tersembunyi
            document.querySelector('input[name="num1"]').value = num1;
            document.querySelector('input[name="num2"]').value = num2;
        }

        // Fungsi untuk menghapus jawaban sebelumnya dari input Captcha
        function clearCaptchaAnswer() {
            document.getElementById("captcha").value = "";
        }

        // Fungsi untuk memeriksa jawaban captcha saat form disubmit
        function validateCaptcha() {
            const num1 = parseInt(document.getElementById("num1").textContent);
            const num2 = parseInt(document.getElementById("num2").textContent);
            const answer = parseInt(document.getElementById("captcha").value);
            const successMessage = document.getElementById("captcha-success-message");
            const errorMessage = document.getElementById("captcha-error-message");

            if (num1 + num2 === answer) {
                // Jawaban captcha benar, tampilkan pesan sukses
                successMessage.innerHTML = 'Komentar sudah terkirim dan akan ditampilkan setelah disetujui.';
                errorMessage.innerHTML = '';
                return true;
            } else {
                // Jawaban captcha salah, tampilkan pesan kesalahan
                successMessage.innerHTML = '';
                errorMessage.innerHTML = 'Jawaban CAPTCHA salah. Silakan coba lagi.';
                return false;
            }
        }

        // Daftarkan event handler untuk tombol "Ganti Pertanyaan Captcha"
        document.getElementById("change-captcha").addEventListener("click", function() {
            displayCaptcha();
            clearCaptchaAnswer();
        });

        // Panggil displayCaptcha saat halaman dimuat
        displayCaptcha();

        // Daftarkan event handler untuk tombol "Ganti Gambar" (reload)
        document.getElementById("reload").addEventListener("click", function() {
            displayCaptcha();
        });
    </script>

</body>

</html>
