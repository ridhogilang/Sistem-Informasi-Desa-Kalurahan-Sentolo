@extends('layout.main')

@push('header')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js"></script>
    <script>
        src = "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
@endpush

@section('main')
    <main class="container px-3 max-w-container mx-auto space-y-5 my-5">
        <div class="newsticker rounded-none text-sm" style="overflow: hidden; min-height: 1px;">
            <h3 class="newsticker-heading py-1"><i class="fa-solid fa-bullhorn text-lg"></i> <span
                    class="newsticker-title">Sekilas Info</span></h3>
            <ul class="newsticker-list py-1"style="padding: 0px; margin: 0px; position: relative; list-style-type: none;">
                <li class="newsticker-item" style="left: 50%; white-space: nowrap;">
                    <marquee behavior="" direction="">{!! $text->textrunning !!}</marquee><a class="newsticker-link"></a>
                </li>

            </ul>
        </div>
        <section class="content-wrapper my-5">
            <div class="card w-full rounded overflow-hidden">

                <script type="text/javascript"></script>


                <div class="py-4 px-5">
                    <a href="/daftarhadir-pamong">
                        <span class="button button-secondary text-white py-1 px-3 rounded inline-block">Kembali</span>
                    </a>
                    <center>
                        <h1
                            class="text-heading text-lg lg:text-2xl border-b border-dotted border-primary dark:border-white pb-2 title">
                            {{ $pamong->nama }}</h1>
                        <br>
                        <img width="280" src="{{ Storage::url($pamong->foto_resmi) }}">

                    </center>


                    <div class="table-responsive">
                        <table width="100%">

                            <tr>
                                <td width="10%">
                                    Nama
                                </td>
                                <td width="1%">
                                    :
                                </td>
                                <td>
                                    {{ $pamong->nama }} </td>
                            </tr>

                            <tr>
                                <td width="10%">
                                    Jabatan
                                </td>
                                <td width="1%">
                                    :
                                </td>
                                <td>
                                    {{ $pamong->jabatan }} </td>
                            </tr>

                        </table>
                    </div>
                    <br />



                    <span
                        class="text-heading text-lg lg:text-2xl border-b border-dotted border-primary dark:border-white pb-2"></span>

                    <h2
                        class="text-heading text-lg lg:text-2xl border-b border-dotted border-primary dark:border-white pb-2">
                        <i data-feather="pie-chart" class="inline-block mr-1"></i> Kehadiran
                    </h2><br>
                    <div class="table-responsive">
                        <style>
                            #customers {
                                font-family: Arial, Helvetica, sans-serif;
                                border-collapse: collapse;
                                width: 100%;

                            }

                            #customers td,
                            #customers th {
                                border: 1px solid #ddd;
                                padding: 8px;
                            }

                            #customers tr:nth-child(even) {
                                background-color: #f2f2f2;
                            }

                            #customers tr:hover {
                                background-color: #ddd;
                            }

                            #customers th {
                                padding-top: 12px;
                                padding-bottom: 12px;
                                text-align: left;
                                background-color: #04AA6D;
                                color: white;
                            }


                            .table-container {
                                width: 100% !important;
                                overflow-x: scroll;
                            }
                        </style>


                        <table class="text-sm">

                            <tr>
                                <td align="left"  style="padding-right: 30px;">
                                    Nama
                                </td>
                                <td align="left" >
                                    <b>: {{ $pamong->nama }} </b>
                                </td>
                            </tr>
                            
                            <tr>
                                <td align="left"  style="padding-right: 30px;">
                                    Bulan
                                </td>
                                <td align="left" >
                                    <b>: {{ $bulan }}</b>
                                </td>
                            </tr>



                        </table>
                        <br />



                        <div class="table-container">
                            <table class="w-full text-sm" id="customers">

                                <thead>
                                    <tr>
                                        <td>No.</td>

                                        <td>Hari / Tanggal</td>
                                        <td>Jam Datang</td>
                                        <td>Jam Pulang</td>


                                        <td rowspan="2">
                                            Keterlambatan </td>
                                        <td rowspan="2">
                                            Keterangan Masuk </td>

                                        <td>Keterangan Pulang</td>
                                    </tr>


                                </thead>
                                <tbody>
                                    @foreach ($present as $key => $present)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td align="left">{{ date('j F Y', strtotime($present->tanggal)) }}</td>
                                            @if (strtotime($present->tanggal) <= strtotime(Carbon\Carbon::now()->toDateString()))
                                                <td>{{ $present->jam_masuk }}</td>
                                                <td>{{ $present->jam_keluar }}</td>

                                                <!-- Sisipkan bagian lainnya sesuai kebutuhan Anda -->
                                                @php
                                                    $jamMasuk = strtotime($present->jam_masuk);
                                                    $jamMasukConfig = strtotime(config('absensi.jam_masuk'));
                                                    $keterlambatan = max(0, $jamMasuk - $jamMasukConfig);

                                                    $jam = floor($keterlambatan / 3600);
                                                    $menit = floor(($keterlambatan % 3600) / 60);

                                                    $formattedKeterlambatan = ($jam > 0 ? "terlambat $jam jam " : '') . ($menit > 0 ? "$menit menit" : '0 menit');
                                                @endphp
                                                <td>{{ $formattedKeterlambatan }}</td>
                                                <td>{{ $present->keterangan }}</td>
                                                @if ($present->jam_keluar)
                                                    <td>Sudah Absen Pulang</td>
                                                @else
                                                    <td>Belum Absen Pulang</td>
                                                @endif
                                            @else
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <br />
                        <br />






                    </div>





                </div>

            </div>
        </section>
    </main>
@endsection

@push('footer')
    {{-- <script src=" {{ asset('home/js/exporting.min.js') }}"></script> --}}
    <script src=" {{ asset('home/js/jquery.fancybox.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.customer-logos').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 3
                    }
                }]
            });
        });
    </script>
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
@endpush
