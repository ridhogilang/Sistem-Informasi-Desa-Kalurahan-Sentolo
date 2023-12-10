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

                <div class="py-4 px-5">
                    <h1 class="text-heading text-lg lg:text-2xl border-b border-dotted border-primary dark:border-white pb-2 title">Pemerintah Kalurahan Sentolo</h1>
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-3 lg:gap-5 py-5">
                        @foreach ($pamong as $value)
                        <div class="space-y-3 border p-3">
                            <a href="/daftar-hadir/{{ $value->id }}/{{ now()->format('F') }}">
                                <img loading="lazy" class="w-1/2 mx-auto h-auto shadow-none" src="{{ Storage::url($value->foto_resmi) }}" alt="Foto {{ $value->nama }}" />

                                <div class="space-y-1 text-sm text-center z-10">
                                    <span class="font-bold">{{ $value->nama }}</span>
                                    <span class="block">{{ $value->jabatan }}</span>
                                </div>
                            </a>
                        </div>
                        @endforeach
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
