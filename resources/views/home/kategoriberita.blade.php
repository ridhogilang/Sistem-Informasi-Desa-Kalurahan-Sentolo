@extends('layout.main')

@push('header')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js"></script>
    <script>
        src = "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    </script>
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
        <section id="article-list" class="space-y-4">
            <ul class="w-full space-x-3" id="button-list">
                <li class="inline-block">
                    <button id="semua-berita-link" class="button button-secondary px-5 button-s-menu"
                        data-url="/berita/kategori/semua-berita">
                        <i class="fa fa-folder-open mr-2"></i>Semua Berita
                    </button>
                </li>
                <li class="inline-block">
                    <button id="berita-desa-button" class="button button-secondary px-5 button-s-menu"
                        data-url="/berita/kategori/berita-desa">
                        <i class="fa fa-list-alt mr-2"></i>Berita Desa
                    </button>
                </li>
                <li class="inline-block">
                    <button id="berita-lokal-button" class="button button-secondary px-5 button-s-menu"
                        data-url="/berita/kategori/berita-lokal">
                        <i class="fa fa-list-alt mr-2"></i>Berita Lokal
                    </button>
                </li>
                <li class="inline-block">
                    <button id="program-kerja-button" class="button button-secondary px-5 button-s-menu"
                        data-url="/berita/kategori/program-kerja">
                        <i class="fa fa-list-alt mr-2"></i>Program Kerja
                    </button>
                </li>
            </ul>
            <div class="grid grid-cols-1 gap-5 lg:grid-cols-3 md:grid-cols-2">
                @if ($berita->count())
                    @foreach ($berita as $item)
                        <div class="card overflow-hidden p-4 article-wrapper">
                            <a href="/berita/{{ date('Y', strtotime($item->tanggal)) }}/{{ date('m', strtotime($item->tanggal)) }}/{{ date('d', strtotime($item->tanggal)) }}/{{ $item->slug }}"
                                class="article-thumbnail ">
                                <img src="{{ Storage::url($item->gambar) }}" alt="{{ $item->judul }}"
                                    class="article-image w-full object-cover object-center mx-auto">
                            </a>
                            <div class="article-caption space-y-3 pt-3">
                                <a href="/berita/{{ date('Y', strtotime($item->tanggal)) }}/{{ date('m', strtotime($item->tanggal)) }}/{{ date('d', strtotime($item->tanggal)) }}/{{ $item->slug }}"
                                    class="text-heading lg:text-lg text-link block">{{ $item->judul }}</a>
                                <ul class="flex flex-wrap text-sm space-x-4">
                                    <li class="inline-flex items-center">
                                        <span data-feather="calendar" class="fa-regular fa-calendar-days mr-2"></span>
                                        <span>{{ $item->tanggal }}</span>
                                    </li>
                                    <li class="inline-flex items-center">
                                        <span data-feather="user" class="fa-regular fa-user mr-2"></span>
                                        <span>{{ $item->penulis }}</span>
                                    </li>
                                </ul>
                                <p class="hidden lg:block">{{ $item->ringkasan }} <a
                                        href="/berita/{{ date('Y', strtotime($item->tanggal)) }}/{{ date('m', strtotime($item->tanggal)) }}/{{ date('d', strtotime($item->tanggal)) }}/{{ $item->slug }}"
                                        class="underline text-secondary">Selengkapnya</a></p>
                            </div>
                        </div>
                    @endforeach

            </div>
            <nav aria-label="nomor halaman">
                <ul class="pagination mt-1 mb-5">
                    @if ($berita->currentPage() > 1)
                        <li>
                            <a href="{{ $berita->previousPageUrl() }}" class="pagination-link">
                                <i class="fa-solid fa-angle-left inline-block"></i>
                            </a>
                        </li>
                    @endif

                    @for ($i = 1; $i <= $berita->lastPage(); $i++)
                        <li>
                            <a href="{{ $berita->url($i) }}"
                                class="pagination-link {{ $i == $berita->currentPage() ? 'active' : '' }}">{{ $i }}</a>
                        </li>
                    @endfor

                    @if ($berita->currentPage() < $berita->lastPage())
                        <li>
                            <a href="{{ $berita->nextPageUrl() }}" class="pagination-link">
                                <i class="fa-solid fa-angle-right inline-block"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
            @else
            <br><br><br><br><br><br><br>
            <p class="text-heading lg:text-lg text-center mt-5" style="font-weight: bold; padding-top: 50px;">No Berita Found.</p>
            <br><br><br><br><br><br><br><br><br><br><br><br>
            @endif
        </section>

    </main>
@endsection

@push('footer')
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
        // Ambil URL saat ini
        var currentURL = window.location.pathname;

        // Cari tombol yang sesuai dengan URL saat ini dan ubah kelasnya
        var buttons = document.querySelectorAll('.button-s-menu');
        buttons.forEach(function(button) {
            var url = button.getAttribute('data-url');

            if (url === currentURL) {
                button.classList.remove('button-secondary');
                button.classList.add('button-primary');

                // Pindahkan tombol yang aktif ke posisi nomor 1 dalam daftar
                var parent = button.parentElement;
                parent.removeChild(button);
                var buttonList = document.getElementById('button-list');
                buttonList.insertBefore(button, buttonList.firstChild);
            }

            // Tambahkan event listener untuk mengarahkan pengguna ke URL saat tombol diklik
            button.addEventListener('click', function() {
                window.location.href = url;
            });
        });
    </script>
@endpush
