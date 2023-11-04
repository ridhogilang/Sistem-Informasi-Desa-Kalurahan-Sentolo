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
                    <marquee behavior="" direction="">Selamat Datang di Website Informasi Kalurahan Sentolo, Untuk
                        Keluhan dan Informasi bisa menghubungi pamong dan apabila kurang jelas dapat di infokan langsung ke
                        kelurahan apakah samapai sini sudah paham</marquee><a
                        href="https://preview.silirdev.com/artikel/2020/6/8/profil-desa" class="newsticker-link"></a>
                </li>

            </ul>
        </div>
        {{-- <section class="content-wrapper my-5">
            <article class="card content">
                <div class="main-content print space-y-4">
                    <h1
                        class="text-heading text-lg lg:text-2xl border-b dark:border-slate-800 border-dotted border-primary dark:border-white pb-2 title">
                        {{ $galeri->nama }} </h1>
                </div>
                
                <style>
                    /* Gaya untuk Kolom Footer */
                    .footer-column {
                        display: flex;
                        flex-wrap: wrap;
                    }
            
                    /* Gaya untuk Judul Album */
                    .footer-heading {
                        font-size: 18px;
                        font-weight: bold;
                        margin-bottom: 10px;
                    }
            
                    /* Gaya untuk Kontainer Album */
                    .footer-album {
                        display: flex;
                        flex-wrap: wrap;
                        gap: 10px; /* Sesuaikan jarak antar gambar sesuai kebutuhan */
                    }
            
                    /* Gaya untuk Item Album */
                    .footer-album-item {
                        flex: 0 0 calc(33.33% - 20px); /* Sesuaikan lebar setiap item (3 item per baris) */
                        position: relative;
                        overflow: hidden;
                        border: 1px solid #ccc;
                        border-radius: 5px;
                    }
            
                    /* Gaya untuk Gambar dalam Item Album */
                    .footer-album-item img {
                        width: 100%;
                        height: auto;
                        display: block;
                    }
            
                    /* Tambahkan efek hover jika diinginkan */
                    .footer-album-item:hover {
                        transform: scale(1.1);
                        transition: transform 0.3s ease;
                    }
                </style>
            </head>
            <body>
                <div class="footer-column">
                    <h3 class="footer-heading"></h3>
                    <div class="footer-album">
                    </div>
                    {!! $galeri->galeri !!}
                </div>  
                <div id="print">
                    <style media="print">
                        @page {
                            size: A4;
                            orientation: portrait
                        }

                        body {
                            font-family: 'Inter', sans-serif;
                            font-size: 12pt;
                            color: #000 !important
                        }

                        .loading,
                        .header,
                        .main-nav,
                        #sidenav,
                        .apbdesa,
                        #comment,
                        .comment,
                        #kolom-komentar,
                        #shortcut-link,
                        .newsticker,
                        .sidebar,
                        .modal,
                        .footer,
                        .bottom-nav,
                        #main-css,
                        #scroll-to-top,
                        .print-button {
                            display: none
                        }

                        .title {
                            font-size: 180%;
                            font-family: 'Poppins', sans-serif;
                            color: #000 !important;
                            margin-bottom: 8px
                        }

                        .flex {
                            display: flex;
                            gap: 10px;
                            font-size: 90%
                        }

                        .icon {
                            color: teal
                        }

                        img {
                            margin-top: 10px;
                            margin-bottom: 10px;
                            width: 100%
                        }

                        table {
                            display: block
                        }

                        table td {
                            border: 1px solid #ccc;
                            border-collapse: collapse
                        }

                        .text-link {
                            color: #00f;
                            text-decoration: underline
                        }
                    </style>
                </div>
                <script>
                    function printArticle() {
                        console.log('printing...')
                        const iframe = document.createElement("iframe");
                        iframe.style.display = "none";
                        document.body.appendChild(iframe);
                        const pri = iframe.contentWindow;
                        pri.document.open();
                        pri.document.write(
                            '<link rel="stylesheet" media="print" href="https://preview.silirdev.com/cloudme.fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Inter:wght@400;500;600;700&display=swap">'
                        );
                        pri.document.write(
                            '<link rel="stylesheet" media="print" href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css">'
                        );
                        pri.document.write(document.querySelector('#print').innerHTML);
                        pri.document.write(document.querySelector('.print').innerHTML);
                        pri.document.write(
                            '<p>Baca artikel online: <a href="" class="text-link">Disini</a></p>'
                        )
                        pri.document.close();
                        setTimeout(() => {
                            pri.focus();
                            pri.print();
                        }, 1500);
                        pri.onafterprint = () => {
                            document.body.removeChild(iframe);
                        }
                    }
                </script>
                <button class="button text-xs py-1 inline-flex items-center print-button" data-mdb-ripple="true"
                    data-mdb-ripple-color="dark" onclick="printArticle()"><i class="fa-solid fa-print text-lg mr-1"></i> Cetak
                    Artikel</button>
                <span class="block font-bold">Bagikan artikel ini:</span>
                <div class="flex space-x-2">
                    <a href="http://www.facebook.com/sharer.php?u=https://preview.silirdev.com/artikel/2021/12/26/polres-luwu-utara-siapkan-3-pos-pengamanan-nataru-ini-lokasinya"
                        target="_blank" rel="noopener"
                        class="inline-flex items-center justify-center w-10 h-10 bg-facebook text-white rounded-full hover:ring-2 hover:ring-tertiary hover:ring-offset-2 transition duration-100">
                        <i class="fa mx-1 text-lg fa-brands fa-facebook" style="color: #ffffff;"></i>
                    </a>
                    <a href="http://twitter.com/share?url=https://preview.silirdev.com/artikel/2021/12/26/polres-luwu-utara-siapkan-3-pos-pengamanan-nataru-ini-lokasinya"
                        target="_blank" rel="noopener"
                        class="inline-flex items-center justify-center w-10 h-10 bg-twitter text-white rounded-full hover:ring-2 hover:ring-tertiary hover:ring-offset-2 transition duration-100">
                        <i class="fa mx-1 text-lg fa-brands fa-twitter" style="color: #ffffff;"></i>
                    </a>
                    <a href="https://telegram.me/share/url?url=https://preview.silirdev.com/artikel/2021/12/26/polres-luwu-utara-siapkan-3-pos-pengamanan-nataru-ini-lokasinya"
                        target="_blank" rel="noopener"
                        class="inline-flex items-center justify-center w-10 h-10 bg-telegram text-white rounded-full hover:ring-2 hover:ring-tertiary hover:ring-offset-2 transition duration-100">
                        <i class="fa mx-1 text-lg fa-brands fa-telegram" style="color: #ffffff;"></i>
                    </a>
                    <a href="https://api.whatsapp.com/send?text=https://preview.silirdev.com/artikel/2021/12/26/polres-luwu-utara-siapkan-3-pos-pengamanan-nataru-ini-lokasinya"
                        target="_blank" rel="noopener"
                        class="inline-flex items-center justify-center w-10 h-10 bg-whatsapp text-white rounded-full hover:ring-2 hover:ring-tertiary hover:ring-offset-2 transition duration-100">
                        <i class="fa mx-1 text-lg fa-brands fa-whatsapp" style="color: #ffffff;"></i>
                    </a>
                </div>
                <hr>
                <div class="py-3 divide-y" id="comment">
                    <div class="flex space-x-3 py-3">
                        <img loading="lazy"
                            src="./Polres Luwu Utara Siapkan 3 Pos Pengamanan Nataru, Ini Lokasinya - Desa Sukaraya_files/user.png"
                            alt="user" class="w-12 h-12 rounded-full">
                        <div class="space-y-1 flex flex-col">
                            <span class="font-bold">Perferendis totam pr</span>
                            <span class="inline-flex items-center text-sm text-slate-500 dark:text-slate-300"><i
                                    class="icon icon-sm mr-1 inline-block ti ti-calendar"></i> 2022-05-22 15:17:32</span>
                            <span>"Dolores modi adipisi"</span>
                        </div>
                    </div>
                </div>
                <span class="block text-heading text-lg lg:text-xl comment">Kirim Komentar</span>
                <div class="bg-slate-200 dark:bg-dark-primary py-3 px-5 border-l-4 border-secondary comment">
                    <p class="text-sm">Komentar baru terbit setelah disetujui Admin</p>
                </div>
                <form action="https://preview.silirdev.com/add_comment/123" method="POST" class="space-y-3"
                    id="kolom-komentar">
                    <div class="flex flex-col space-y-1">
                        <label for="komentar" class="form-label">Komentar <span style="color:red">*</span></label>
                        <textarea class="form-textarea" name="komentar" id="komentar" cols="30" rows="4" required=""></textarea>
                    </div>
                    <div class="grid gap-2 lg:grid-cols-3 grid-cols-1">
                        <div class="flex flex-col space-y-1">
                            <label for="owner" class="form-label">Nama <span style="color:red">*</span></label>
                            <input type="text" class="form-input" id="owner" name="owner" value=""
                                required="">
                        </div>
                        <div class="flex flex-col space-y-1">
                            <label for="email" class="form-label">Alamat Email </label>
                            <input type="text" class="form-input" id="email" name="email" value="">
                        </div>
                        <div class="flex flex-col space-y-1">
                            <label for="no_hp" class="form-label">No. HP <span style="color:red">*</span></label>
                            <input type="text" class="form-input" id="no_hp" name="no_hp" value=""
                                required="">
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row">
                        <div class="w-full lg:w-5/12 overflow-hidden">
                            <img loading="lazy" id="captcha"
                                src="./Polres Luwu Utara Siapkan 3 Pos Pengamanan Nataru, Ini Lokasinya - Desa Sukaraya_files/securimage_show.php"
                                alt="CAPTCHA Image" class="w-full lg:w-11/12">
                            <button type="button" class="button button-transparent text-sm"
                                onclick="document.getElementById(&#39;captcha&#39;).src = &#39;https://preview.silirdev.com/securimage/securimage_show.php?&#39;+Math.random(); return false"
                                ata-mdb-ripple="true" data-mdb-ripple-color="light">[Ganti Gambar]</button>
                        </div>
                        <div class="w-full lg:w-7/12">
                            <input type="text" class="form-input required" name="captcha_code" maxlength="6"
                                value="" placeholder="Isikan sesuai kode captcha">
                        </div>
                    </div>
                    <button type="submit" class="button button-secondary" data-mdb-ripple="true"
                        data-mdb-ripple-color="light">Kirim Komentar <span class="ti ti-send ml-2"></span></button>
                    <input type="hidden" name="sidcsrf" value="52923cd05b6360b94ec243c5e81a071e">
                </form>
            </article>
            @include('partials.aside')
        </section> --}}
        <section class="content-wrapper my-5">
            <article class="card content">
                <a href="/berita/kategori/berita-lokal" class="rounded-full bg-tertiary text-white px-3 py-1 text-sm">
                    Galeri
                </a>
                <br>
                {{-- @switch($berita->kategori->kategori)
                    @case('Berita Lokal')
                        <a href="/berita/kategori/berita-lokal" class="rounded-full bg-tertiary text-white px-3 py-1 text-sm">
                            {{ $berita->kategori->kategori }}
                        </a>
                    @break

                    @case('Berita Desa')
                        <a href="/berita/kategori/berita-desa" class="rounded-full bg-tertiary text-white px-3 py-1 text-sm">
                            {{ $berita->kategori->kategori }}
                        </a>
                    @break

                    @case('Program Kerja')
                        <a href="/berita/kategori/program-kerja" class="rounded-full bg-tertiary text-white px-3 py-1 text-sm">
                            {{ $berita->kategori->kategori }}
                        </a>
                    @break

                    @default
                        <a href="#" class="rounded-full bg-tertiary text-white px-3 py-1 text-sm">
                            {{ $berita->kategori->kategori }}
                        </a>
                @endswitch --}}

                <div class="main-content print space-y-4">
                    <h1
                        class="text-heading text-lg lg:text-2xl border-b dark:border-slate-800 border-dotted border-primary dark:border-white pb-2 title">
                        {{ $galeri->nama }} </h1>
                    {!! $galeri->galeri !!}
                </div><br><br>
                {{-- <div id="print">
                    <style media="print">
                        @page {
                            size: A4;
                            orientation: portrait
                        }

                        body {
                            font-family: 'Inter', sans-serif;
                            font-size: 12pt;
                            color: #000 !important
                        }

                        .loading,
                        .header,
                        .main-nav,
                        #sidenav,
                        .apbdesa,
                        #comment,
                        .comment,
                        #kolom-komentar,
                        #shortcut-link,
                        .newsticker,
                        .sidebar,
                        .modal,
                        .footer,
                        .bottom-nav,
                        #main-css,
                        #scroll-to-top,
                        .print-button {
                            display: none
                        }

                        .title {
                            font-size: 180%;
                            font-family: 'Poppins', sans-serif;
                            color: #000 !important;
                            margin-bottom: 8px
                        }

                        .flex {
                            display: flex;
                            gap: 10px;
                            font-size: 90%
                        }

                        .icon {
                            color: teal
                        }

                        img {
                            margin-top: 10px;
                            margin-bottom: 10px;
                            width: 100%
                        }

                        table {
                            display: block
                        }

                        table td {
                            border: 1px solid #ccc;
                            border-collapse: collapse
                        }

                        .text-link {
                            color: #00f;
                            text-decoration: underline
                        }
                    </style>
                </div>
                <script>
                    function printArticle() {
                        console.log('printing...')
                        const iframe = document.createElement("iframe");
                        iframe.style.display = "none";
                        document.body.appendChild(iframe);
                        const pri = iframe.contentWindow;
                        pri.document.open();
                        pri.document.write(
                            '<link rel="stylesheet" media="print" href="https://preview.silirdev.com/cloudme.fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Inter:wght@400;500;600;700&display=swap">'
                        );
                        pri.document.write(
                            '<link rel="stylesheet" media="print" href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css">'
                        );
                        pri.document.write(document.querySelector('#print').innerHTML);
                        pri.document.write(document.querySelector('.print').innerHTML);
                        pri.document.write(
                            '<p>Baca artikel online: <a href="" class="text-link">Disini</a></p>'
                        )
                        pri.document.close();
                        setTimeout(() => {
                            pri.focus();
                            pri.print();
                        }, 1500);
                        pri.onafterprint = () => {
                            document.body.removeChild(iframe);
                        }
                    }
                </script>
                <button class="button text-xs py-1 inline-flex items-center print-button" data-mdb-ripple="true"
                    data-mdb-ripple-color="dark" onclick="printArticle()"><i class="fa-solid fa-print text-lg mr-1"></i>
                    Cetak
                    Artikel</button> --}}
                {{-- <span class="block font-bold">Bagikan artikel ini:</span>
                <div class="flex space-x-2">
                    <a href="http://www.facebook.com/sharer.php?u={{ config('app.url') }}/berita/{{ date('Y', strtotime($berita->tanggal)) }}/{{ date('m', strtotime($berita->tanggal)) }}/{{ date('d', strtotime($berita->tanggal)) }}/{{ $berita->slug }}"
                        target="_blank" rel="noopener"
                        class="inline-flex items-center justify-center w-10 h-10 bg-facebook text-white rounded-full hover:ring-2 hover:ring-tertiary hover:ring-offset-2 transition duration-100">
                        <i class="fa mx-1 text-lg fa-brands fa-facebook" style="color: #ffffff;"></i>
                    </a>
                    <a href="https://twitter.com/share?url={{ config('app.url') }}/artikel/{{ date('Y', strtotime($berita->tanggal)) }}/{{ date('m', strtotime($berita->tanggal)) }}/{{ date('d', strtotime($berita->tanggal)) }}/{{ $berita->slug }}"
                        target="_blank" rel="noopener"
                        class="inline-flex items-center justify-center w-10 h-10 bg-twitter text-white rounded-full hover:ring-2 hover:ring-tertiary hover:ring-offset-2 transition duration-100">
                        <i class="fa mx-1 text-lg fa-brands fa-twitter" style="color: #ffffff;"></i>
                    </a>
                    <a href="https://telegram.me/share/url?url={{ config('app.url') }}/artikel/{{ date('Y', strtotime($berita->tanggal)) }}/{{ date('m', strtotime($berita->tanggal)) }}/{{ date('d', strtotime($berita->tanggal)) }}/{{ $berita->slug }}"
                        target="_blank" rel="noopener"
                        class="inline-flex items-center justify-center w-10 h-10 bg-telegram text-white rounded-full hover:ring-2 hover:ring-tertiary hover:ring-offset-2 transition duration-100">
                        <i class="fa mx-1 text-lg fa-brands fa-telegram" style="color: #ffffff;"></i>
                    </a>
                    <a href="https://api.whatsapp.com/send?text={{ config('app.url') }}/artikel/{{ date('Y', strtotime($berita->tanggal)) }}/{{ date('m', strtotime($berita->tanggal)) }}/{{ date('d', strtotime($berita->tanggal)) }}/{{ $berita->slug }}"
                        target="_blank" rel="noopener"
                        class="inline-flex items-center justify-center w-10 h-10 bg-whatsapp text-white rounded-full hover:ring-2 hover:ring-tertiary hover:ring-offset-2 transition duration-100">
                        <i class="fa mx-1 text-lg fa-brands fa-whatsapp" style="color: #ffffff;"></i>
                    </a>
                </div>
                <hr> --}}
                {{-- <div class="py-3 divide-y" id="comment">
                    @foreach ($komentar as $item)  
                    <div class="flex space-x-3 py-3">
                        <img loading="lazy"
                            src="{{ asset('home/img/user.png') }}"
                            alt="user" class="w-12 h-12 rounded-full">
                        <div class="space-y-1 flex flex-col">
                            <span class="font-bold">{{ $item->nama }}</span>
                            <span class="inline-flex items-center text-sm text-slate-500 dark:text-slate-300"><i
                                    class="icon icon-sm mr-1 inline-block fa-regular fa-calendar"></i>{{ $item->created_at->format('Y-m-d H:i:s') }}
                                </span>
                            <span>{{ $item->komentar }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
                <span class="block text-heading text-lg lg:text-xl comment">Kirim Komentar</span>
                <div class="bg-slate-200 dark:bg-dark-primary py-3 px-5 border-l-4 border-secondary comment">
                    @if(session('toast_error'))
                        <p class="text-sm text-red-500">{{ session('toast_error') }}</p>
                    @elseif(session('toast_success'))
                        <p class="text-sm text-green-500">{{ session('toast_success') }}</p>
                    @else
                        <p class="text-sm">Komentar baru terbit setelah disetujui Admin</p>
                    @endif
                </div>                                       
                <form action="/komentar" method="POST" class="space-y-3">
                    @csrf
                    <div class="flex flex-col space-y-1">
                        <input type="text" class="form-input" id="berita_id" name="berita_id"
                            value="{{ $berita->id }}" style="display: none">
                        <input type="text" class="form-input" id="kategoriberita_id" name="kategoriberita_id"
                            value="{{ $berita->kategoriberita_id }}" style="display: none">
                        <label for="komentar" class="form-label">Komentar <span style="color:red">*</span></label>
                        <textarea class="form-textarea" name="komentar" id="komentar" cols="30" rows="4" required="">{{ old('komentar') }}</textarea>
                    </div>
                    <div class="grid gap-2 lg:grid-cols-3 grid-cols-1">
                        <div class="flex flex-col space-y-1">
                            <label for="nama" class="form-label">Nama <span style="color:red">*</span></label>
                            <input type="text" class="form-input" id="nama" name="nama" value=""
                                required="">
                        </div>
                        <div class="flex flex-col space-y-1">
                            <label for="email" class="form-label">Alamat Email <span
                                    style="color:red">*</span></label>
                            <input type="email" class="form-input" id="email" name="email" value="">
                        </div>
                        <div class="flex flex-col space-y-1">
                            <label for="nohp" class="form-label">No. HP <span style="color:red">*</span></label>
                            <input type="number" class="form-input" id="nohp" name="nohp" value=""
                                required="">
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row">
                        <div class="w-full lg:w-5/12 overflow-hidden">
                            <label for="captcha" class="form-label">Kode Captcha <span
                                    style="color:red">*</span></label>
                            <div id="captcha-container">
                                <span id="num1"></span> + <span id="num2"></span> =
                                <input type="hidden" name="num1" value="">
                                <input type="hidden" name="num2" value="">
                            </div>
                            <button type="button" class="button button-transparent text-sm" id="change-captcha">[Ganti
                                Captcha]</button>
                        </div>
                        <div class="w-full lg:w-7/12">
                            <input type="text" class="form-input required" name="captcha" id="captcha"
                                placeholder="Hasil penambahan" required>
                        </div>
                    </div>

                    <button type="submit" class="button button-secondary" data-mdb-ripple="true"
                        data-mdb-ripple-color="light">Kirim Komentar <span class="fa-regular fa-paper-plane ml-2"></span></button>
                </form> --}}
            </article>
            @include('partials.aside')
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
@endpush
