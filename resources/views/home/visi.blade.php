@extends('layout.main')

@push('header')
@endpush

@section('main')
    <main class="container px-3 max-w-container mx-auto space-y-5 my-5">
        <div class="newsticker rounded-none text-sm" style="overflow: hidden; min-height: 1px;">
            <h3 class="newsticker-heading py-1"><i class="ti ti-speakerphone text-lg"></i> <span
                    class="newsticker-title">Sekilas Info</span></h3>
            <ul class="newsticker-list py-1" style="padding: 0px; margin: 0px; position: relative; list-style-type: none;">
                <li class="newsticker-item" style="position: absolute; white-space: nowrap; left: -654px;">
                    Selamat Datang di Website unOfficial Desa Sukaraya, Kecamatan Bone-Bone, Kabupaten Luwu Utara <a
                        href="https://preview.silirdev.com/artikel/2020/6/8/profil-desa" class="newsticker-link"><i
                            class=" ti ti-link icon icon-sm mr-2"></i> ...Selengkapnya</a>
                </li>
            </ul>
        </div>
        <section class="content-wrapper my-5">
            <article class="card content">
                <div class="main-content print space-y-4">
                    <h1
                        class="text-heading text-lg lg:text-2xl border-b dark:border-slate-800 border-dotted border-primary dark:border-white pb-2 title">
                        Visi Misi </h1>
                    <div class="flex flex-wrap gap-2 text-sm">
                        <div class="inline-flex items-center mr-2.5 mb-1">
                            <span class="icon text-secondary mr-2 ti ti-calendar"></span>
                            <span>26 Juni 2020</span>
                        </div>
                        <div class="inline-flex items-center mr-2.5 mb-1">
                            <span class="icon text-secondary mr-2 ti ti-user"></span>
                            <span>Administrator</span>
                        </div>
                        <div class="inline-flex items-center">
                            <span class="icon text-secondary mr-2 ti ti-book"></span>
                            <span>Dibaca 2.147 Kali</span>
                        </div>
                    </div>
                    <h3>Visi</h3>
                    <p style="text-align: center;">“MEWUJUDKAN DESA SUKARAYA YANG &nbsp;MANDIRI DAN SEJAHTERA,YANG BERTUMPU
                        PADA
                        SEKTOR PERTANIAN, PEKEBUNAN DAN PETERNAKAN”</p>
                    <h3 style="text-align: left;">Misi</h3>
                    <ol>
                        <li style="text-align: left;">Memberikan pelayanan yang baik dan mudah kepada masyarakat kapanpun
                            dan
                            dimanapun tanpa didasari perbedaan suku, agama ataupun golongan serta tidak memposisikan
                            Pemerintah Desa
                            sebagai penguasa akan tetapi merupakan pelayan bagi semua masyarakat.</li>
                        <li style="text-align: left;">Meningkatkan kapasitas, Citra, Harkat dan Martabat Pemerintah Desa
                            serta
                            menjaga dan meningkatkan tolenrasi antar umat beragama.</li>
                        <li style="text-align: left;">Mengupayakan terwujudnya Sarana dan Prasarana untuk kegiatan generasi
                            muda
                            dalam menyalurkan bakat olah raga.</li>
                        <li style="text-align: left;">Melanjutkan beberapa program yang belum terealisasi yang termuat dalam
                            RPJMDes
                            2013-2019.</li>
                        <li style="text-align: left;">Menciptakan pemerintah yang transparan, jujur, dan adil.</li>
                    </ol>
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
                            '<p>Baca artikel online: <a href="https://preview.silirdev.com/artikel/2020/6/26/visi-misi" class="text-link">https://preview.silirdev.com/artikel/2020/6/26/visi-misi</a></p>'
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
                    data-mdb-ripple-color="dark" onclick="printArticle()"><i class="ti ti-printer text-lg mr-1"></i> Cetak
                    Artikel</button>
                <span class="block font-bold">Bagikan artikel ini:</span>
                <div class="flex space-x-2">
                    <a href="http://www.facebook.com/sharer.php?u=https://preview.silirdev.com/artikel/2020/6/26/visi-misi"
                        target="_blank" rel="noopener"
                        class="inline-flex items-center justify-center w-10 h-10 bg-facebook text-white rounded-full hover:ring-2 hover:ring-tertiary hover:ring-offset-2 transition duration-100">
                        <i class="ti ti-brand-facebook text-xl"></i>
                    </a>
                    <a href="http://twitter.com/share?url=https://preview.silirdev.com/artikel/2020/6/26/visi-misi"
                        target="_blank" rel="noopener"
                        class="inline-flex items-center justify-center w-10 h-10 bg-twitter text-white rounded-full hover:ring-2 hover:ring-tertiary hover:ring-offset-2 transition duration-100">
                        <i class="ti ti-brand-twitter text-xl"></i>
                    </a>
                    <a href="https://telegram.me/share/url?url=https://preview.silirdev.com/artikel/2020/6/26/visi-misi"
                        target="_blank" rel="noopener"
                        class="inline-flex items-center justify-center w-10 h-10 bg-telegram text-white rounded-full hover:ring-2 hover:ring-tertiary hover:ring-offset-2 transition duration-100">
                        <i class="ti ti-brand-telegram text-xl"></i>
                    </a>
                    <a href="https://api.whatsapp.com/send?text=https://preview.silirdev.com/artikel/2020/6/26/visi-misi"
                        target="_blank" rel="noopener"
                        class="inline-flex items-center justify-center w-10 h-10 bg-whatsapp text-white rounded-full hover:ring-2 hover:ring-tertiary hover:ring-offset-2 transition duration-100">
                        <i class="ti ti-brand-whatsapp text-xl"></i>
                    </a>
                </div>
                <hr>
                <span class="block text-heading text-lg lg:text-xl comment">Kirim Komentar</span>
                <div class="bg-slate-200 dark:bg-dark-primary py-3 px-5 border-l-4 border-secondary comment">
                    <p class="text-sm">Komentar baru terbit setelah disetujui Admin</p>
                </div>
                <form action="https://preview.silirdev.com/add_comment/105" method="POST" class="space-y-3"
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
                                src="./Visi Misi - Desa Sukaraya_files/securimage_show.php" alt="CAPTCHA Image"
                                class="w-full lg:w-11/12">
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
                    <input type="hidden" name="sidcsrf" value="0f98e52ac015e6947367802e39d8e317">
                </form>
            </article>
            <aside class="sidebar">
                <form action="https://preview.silirdev.com/layanan-mandiri/cek" method="post"
                    class="shadow rounded-lg bg-primary dark:bg-dark-secondary overflow-hidden relative">
                    <h3
                        class="py-4 text-center bg-secondary text-white font-bold font-heading text-lg absolute top-0 left-0 w-full">
                        Layanan Mandiri</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1040 320" class="mt-4">
                        <path class="fill-current text-secondary"
                            d="M0,192L60,176C120,160,240,128,360,133.3C480,139,600,181,720,186.7C840,192,960,160,1080,154.7C1200,149,1320,171,1380,181.3L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
                        </path>
                    </svg>
                    <div class="p-5 -mt-10 space-y-4 pb-8">
                        <div
                            class="bg-slate-200 dark:bg-dark-primary py-2 px-4 border-l-4 border-secondary text-secondary">
                            <p class="text-xs"><i class="ti ti-info-circle mr-1"></i> Hubungi operator desa untuk
                                memperoleh PIN</p>
                        </div>
                        <div class="space-y-2 flex flex-col">
                            <label for="nik" class="text-white text-sm font-bold">NIK / No. KTP</label>
                            <input type="text" class="form-input" id="nik" name="nik">
                        </div>
                        <div class="space-y-2 flex flex-col">
                            <label for="pin" class="text-white text-sm font-bold">Kode PIN</label>
                            <input type="password" class="form-input" id="pin" name="pin">
                        </div>
                        <button type="submit" class="button button-tertiary w-full mt-10 hover:ring-offset-primary"
                            data-mdb-ripple="true" data-md-ripple-color="light">Masuk</button>
                    </div>
                    <input type="hidden" name="sidcsrf" value="0f98e52ac015e6947367802e39d8e317">
                </form>
                <div class="sidebar-item">
                    <section class="relative overflow-hidden shadow-lg rounded-lg ">
                        <div class="product-header">
                            <h3 class="text-heading product-ribbon">Aparatur</h3>
                        </div>
                        <div
                            class="owl-carousel flex space-x-4 bg-primary dark:bg-dark-primary p-4 one-carousel owl-loaded owl-drag">







                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                    style="transform: translate3d(-1566px, 0px, 0px); transition: all 0.25s ease 0s; width: 5875px;">
                                    <div class="owl-item cloned" style="width: 375.617px; margin-right: 16px;">
                                        <div class="card p-4 flex flex-col justify-between space-y-4 product-item">
                                            <div class="space-y-3">
                                                <img loading="lazy"
                                                    src="./Visi Misi - Desa Sukaraya_files/Po1W4O_desa6.png"
                                                    alt="Supardi Rustam "
                                                    class="w-full object-cover object-center bg-slate-300 dark:bg-slate-600 mx-auto rounded-lg"
                                                    style="width: 65%">
                                                <div class="space-y-1 text-sm text-center">
                                                    <span class="text-heading">Supardi Rustam </span>
                                                    <span class="block">Kaur Umum </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 375.617px; margin-right: 16px;">
                                        <div class="card p-4 flex flex-col justify-between space-y-4 product-item">
                                            <div class="space-y-3">
                                                <img loading="lazy"
                                                    src="./Visi Misi - Desa Sukaraya_files/G3dTS6_desa4.png"
                                                    alt="Mardiana "
                                                    class="w-full object-cover object-center bg-slate-300 dark:bg-slate-600 mx-auto rounded-lg"
                                                    style="width: 65%">
                                                <div class="space-y-1 text-sm text-center">
                                                    <span class="text-heading">Mardiana </span>
                                                    <span class="block">Kaur Keuangan</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 375.617px; margin-right: 16px;">
                                        <div class="card p-4 flex flex-col justify-between space-y-4 product-item">
                                            <div class="space-y-3">
                                                <img loading="lazy"
                                                    src="./Visi Misi - Desa Sukaraya_files/dWE41F_desa5.png"
                                                    alt="Syafi-i. SE "
                                                    class="w-full object-cover object-center bg-slate-300 dark:bg-slate-600 mx-auto rounded-lg"
                                                    style="width: 65%">
                                                <div class="space-y-1 text-sm text-center">
                                                    <span class="text-heading">Syafi-i. SE </span>
                                                    <span class="block">Kaur Pembangunan </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 375.617px; margin-right: 16px;">
                                        <div class="card p-4 flex flex-col justify-between space-y-4 product-item">
                                            <div class="space-y-3">
                                                <img loading="lazy"
                                                    src="./Visi Misi - Desa Sukaraya_files/pamong_1679789709550134.png"
                                                    alt="Mahrup "
                                                    class="w-full object-cover object-center bg-slate-300 dark:bg-slate-600 mx-auto rounded-lg"
                                                    style="width: 65%">
                                                <div class="space-y-1 text-sm text-center">
                                                    <span class="text-heading">Mahrup </span>
                                                    <span class="block">Kaur Keamanan dan Ketertiban</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 375.617px; margin-right: 16px;">
                                        <div class="card p-4 flex flex-col justify-between space-y-4 product-item">
                                            <div class="space-y-3">
                                                <img loading="lazy"
                                                    src="./Visi Misi - Desa Sukaraya_files/pamong_1679789709775315.png"
                                                    alt="Muhammad Ilham "
                                                    class="w-full object-cover object-center bg-slate-300 dark:bg-slate-600 mx-auto rounded-lg"
                                                    style="width: 65%">
                                                <div class="space-y-1 text-sm text-center">
                                                    <span class="text-heading">Muhammad Ilham </span>
                                                    <span class="block">Kepala Desa</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 375.617px; margin-right: 16px;">
                                        <div class="card p-4 flex flex-col justify-between space-y-4 product-item">
                                            <div class="space-y-3">
                                                <img loading="lazy"
                                                    src="./Visi Misi - Desa Sukaraya_files/gOY8ci_desa2.png"
                                                    alt="Mustahiq S.Adm"
                                                    class="w-full object-cover object-center bg-slate-300 dark:bg-slate-600 mx-auto rounded-lg"
                                                    style="width: 65%">
                                                <div class="space-y-1 text-sm text-center">
                                                    <span class="text-heading">Mustahiq S.Adm</span>
                                                    <span class="block">Sekretaris Desa</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 375.617px; margin-right: 16px;">
                                        <div class="card p-4 flex flex-col justify-between space-y-4 product-item">
                                            <div class="space-y-3">
                                                <img loading="lazy"
                                                    src="./Visi Misi - Desa Sukaraya_files/MZqNyF_desa3.png"
                                                    alt="Syafruddin "
                                                    class="w-full object-cover object-center bg-slate-300 dark:bg-slate-600 mx-auto rounded-lg"
                                                    style="width: 65%">
                                                <div class="space-y-1 text-sm text-center">
                                                    <span class="text-heading">Syafruddin </span>
                                                    <span class="block">Kaur Pemerintahan </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 375.617px; margin-right: 16px;">
                                        <div class="card p-4 flex flex-col justify-between space-y-4 product-item">
                                            <div class="space-y-3">
                                                <img loading="lazy"
                                                    src="./Visi Misi - Desa Sukaraya_files/Po1W4O_desa6.png"
                                                    alt="Supardi Rustam "
                                                    class="w-full object-cover object-center bg-slate-300 dark:bg-slate-600 mx-auto rounded-lg"
                                                    style="width: 65%">
                                                <div class="space-y-1 text-sm text-center">
                                                    <span class="text-heading">Supardi Rustam </span>
                                                    <span class="block">Kaur Umum </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 375.617px; margin-right: 16px;">
                                        <div class="card p-4 flex flex-col justify-between space-y-4 product-item">
                                            <div class="space-y-3">
                                                <img loading="lazy"
                                                    src="./Visi Misi - Desa Sukaraya_files/G3dTS6_desa4.png"
                                                    alt="Mardiana "
                                                    class="w-full object-cover object-center bg-slate-300 dark:bg-slate-600 mx-auto rounded-lg"
                                                    style="width: 65%">
                                                <div class="space-y-1 text-sm text-center">
                                                    <span class="text-heading">Mardiana </span>
                                                    <span class="block">Kaur Keuangan</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 375.617px; margin-right: 16px;">
                                        <div class="card p-4 flex flex-col justify-between space-y-4 product-item">
                                            <div class="space-y-3">
                                                <img loading="lazy"
                                                    src="./Visi Misi - Desa Sukaraya_files/dWE41F_desa5.png"
                                                    alt="Syafi-i. SE "
                                                    class="w-full object-cover object-center bg-slate-300 dark:bg-slate-600 mx-auto rounded-lg"
                                                    style="width: 65%">
                                                <div class="space-y-1 text-sm text-center">
                                                    <span class="text-heading">Syafi-i. SE </span>
                                                    <span class="block">Kaur Pembangunan </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 375.617px; margin-right: 16px;">
                                        <div class="card p-4 flex flex-col justify-between space-y-4 product-item">
                                            <div class="space-y-3">
                                                <img loading="lazy"
                                                    src="./Visi Misi - Desa Sukaraya_files/pamong_1679789709550134.png"
                                                    alt="Mahrup "
                                                    class="w-full object-cover object-center bg-slate-300 dark:bg-slate-600 mx-auto rounded-lg"
                                                    style="width: 65%">
                                                <div class="space-y-1 text-sm text-center">
                                                    <span class="text-heading">Mahrup </span>
                                                    <span class="block">Kaur Keamanan dan Ketertiban</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 375.617px; margin-right: 16px;">
                                        <div class="card p-4 flex flex-col justify-between space-y-4 product-item">
                                            <div class="space-y-3">
                                                <img loading="lazy"
                                                    src="./Visi Misi - Desa Sukaraya_files/pamong_1679789709775315.png"
                                                    alt="Muhammad Ilham "
                                                    class="w-full object-cover object-center bg-slate-300 dark:bg-slate-600 mx-auto rounded-lg"
                                                    style="width: 65%">
                                                <div class="space-y-1 text-sm text-center">
                                                    <span class="text-heading">Muhammad Ilham </span>
                                                    <span class="block">Kepala Desa</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 375.617px; margin-right: 16px;">
                                        <div class="card p-4 flex flex-col justify-between space-y-4 product-item">
                                            <div class="space-y-3">
                                                <img loading="lazy"
                                                    src="./Visi Misi - Desa Sukaraya_files/gOY8ci_desa2.png"
                                                    alt="Mustahiq S.Adm"
                                                    class="w-full object-cover object-center bg-slate-300 dark:bg-slate-600 mx-auto rounded-lg"
                                                    style="width: 65%">
                                                <div class="space-y-1 text-sm text-center">
                                                    <span class="text-heading">Mustahiq S.Adm</span>
                                                    <span class="block">Sekretaris Desa</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 375.617px; margin-right: 16px;">
                                        <div class="card p-4 flex flex-col justify-between space-y-4 product-item">
                                            <div class="space-y-3">
                                                <img loading="lazy"
                                                    src="./Visi Misi - Desa Sukaraya_files/MZqNyF_desa3.png"
                                                    alt="Syafruddin "
                                                    class="w-full object-cover object-center bg-slate-300 dark:bg-slate-600 mx-auto rounded-lg"
                                                    style="width: 65%">
                                                <div class="space-y-1 text-sm text-center">
                                                    <span class="text-heading">Syafruddin </span>
                                                    <span class="block">Kaur Pemerintahan </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 375.617px; margin-right: 16px;">
                                        <div class="card p-4 flex flex-col justify-between space-y-4 product-item">
                                            <div class="space-y-3">
                                                <img loading="lazy"
                                                    src="./Visi Misi - Desa Sukaraya_files/Po1W4O_desa6.png"
                                                    alt="Supardi Rustam "
                                                    class="w-full object-cover object-center bg-slate-300 dark:bg-slate-600 mx-auto rounded-lg"
                                                    style="width: 65%">
                                                <div class="space-y-1 text-sm text-center">
                                                    <span class="text-heading">Supardi Rustam </span>
                                                    <span class="block">Kaur Umum </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-nav disabled"><button type="button" role="presentation"
                                    class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button"
                                    role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
                            <div class="owl-dots disabled"></div>
                        </div>
                    </section>
                </div>
                <div class="sidebar-item">
                    <style>
                        #sinergi_program {
                            text-align: center
                        }

                        #sinergi_program table {
                            margin: auto
                        }

                        #sinergi_program img {
                            max-width: 100%;
                            max-height: 100%;
                            transition: all .5s;
                            -o-transition: all .5s;
                            -moz-transition: all .5s;
                            -webkit-transition: all .5s
                        }

                        #sinergi_program img:hover {
                            transition: all .3s;
                            -o-transition: all .3s;
                            -moz-transition: all .3s;
                            -webkit-transition: all .3s;
                            transform: scale(1.5);
                            -moz-transform: scale(1.5);
                            -o-transform: scale(1.5);
                            -webkit-transform: scale(1.5);
                            box-shadow: 2px 2px 6px rgba(0, 0, 0, .5)
                        }
                    </style>
                    <div class="box box-primary box-solid">
                        <div class="box-header">
                            <h3 class="box-title"><i class="ti ti-external-link mr-1"></i> Sinergi Program</h3>
                        </div>
                        <div id="sinergi_program" class="box-body">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span style="display: inline-block; width: 30.333333333333%">
                                                <a href="https://www.kemendesa.go.id/" target="_blank"><img
                                                        loading="lazy"
                                                        src="./Visi Misi - Desa Sukaraya_files/1612529135_Kemendes_Logo.png"
                                                        alt="Kemendes"></a>
                                            </span>
                                            <span style="display: inline-block; width: 30.333333333333%">
                                                <a href="https://kemendagri.go.id/" target="_blank"><img loading="lazy"
                                                        src="./Visi Misi - Desa Sukaraya_files/1612531718_images.png"
                                                        alt="Kemendagri"></a>
                                            </span>
                                            <span style="display: inline-block; width: 30.333333333333%">
                                                <a href="https://sulselprov.go.id/" target="_blank"><img loading="lazy"
                                                        src="./Visi Misi - Desa Sukaraya_files/1612568861_1200px-Coat_of_arms_of_South_Sulawesi.svg.png"
                                                        alt="Provinsi Sulawesi Selatan"></a>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="sidebar-item">
                    <style type="text/css">
                        .highcharts-xaxis-labels tspan {
                            font-size: 8px
                        }
                    </style>
                    <div class="box box-primary box-solid">
                        <div class="box-header">
                            <h3 class="box-title"><a href="https://preview.silirdev.com/first/statistik/4"><i
                                        class="ti ti-chart-histogram mr-1"></i> Statistik Desa Sukaraya</a></h3>
                        </div>
                        <div class="box-body">
                            <script type="text/javascript">
                                $(function() {
                                    var chart_widget;
                                    $(document).ready(function() {
                                        chart_widget = new Highcharts.Chart({
                                            chart: {
                                                renderTo: 'container_widget',
                                                plotBackgroundColor: null,
                                                plotBorderWidth: null,
                                                plotShadow: false
                                            },
                                            title: {
                                                text: 'Jumlah Penduduk'
                                            },
                                            yAxis: {
                                                title: {
                                                    text: 'Jumlah'
                                                }
                                            },
                                            xAxis: {
                                                categories: [
                                                    ['46 <br> LAKI-LAKI'],
                                                    ['51 <br> PEREMPUAN'],
                                                    ['97 <br> TOTAL'],
                                                ]
                                            },
                                            legend: {
                                                enabled: false
                                            },
                                            plotOptions: {
                                                series: {
                                                    colorByPoint: true
                                                },
                                                column: {
                                                    pointPadding: 0,
                                                    borderWidth: 0
                                                }
                                            },
                                            series: [{
                                                type: 'column',
                                                name: 'Populasi',
                                                data: [
                                                    ['LAKI-LAKI', 46],
                                                    ['PEREMPUAN', 51],
                                                    ['TOTAL', 97],
                                                ]
                                            }]
                                        });
                                    });
                                });
                            </script>
                            <div id="container_widget"
                                style="width: 100%; height: 300px; margin: 0px auto; overflow: hidden;"
                                data-highcharts-chart="0" role="region"
                                aria-label="Jumlah Penduduk. Highcharts interactive chart." aria-hidden="false">
                                <div id="highcharts-screen-reader-region-before-0"
                                    aria-label="Chart screen reader information." role="region" aria-hidden="false"
                                    style="position: relative;">
                                    <div style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;"
                                        aria-hidden="false">
                                        <h5>Jumlah Penduduk</h5>
                                        <div>Bar chart with 3 bars.</div>
                                        <div>The chart has 1 X axis displaying categories. </div>
                                        <div>The chart has 1 Y axis displaying Jumlah. Range: 0 to 125.</div>
                                    </div>
                                </div>
                                <div aria-hidden="false" aria-live="assertive"
                                    style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;">
                                </div>
                                <div aria-hidden="false" aria-live="polite"
                                    style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;">
                                </div>
                                <div id="highcharts-98vaw84-0" dir="ltr" class="highcharts-container "
                                    style="position: relative; overflow: hidden; width: 367px; height: 300px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none;"
                                    tabindex="0" aria-hidden="false"><svg version="1.1" class="highcharts-root"
                                        style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;"
                                        xmlns="http://www.w3.org/2000/svg" width="367" height="300"
                                        viewBox="0 0 367 300" aria-label="Interactive chart" aria-hidden="false">
                                        <desc aria-hidden="true">Created with Highcharts 8.2.0</desc>
                                        <defs aria-hidden="true">
                                            <clippath id="highcharts-98vaw84-1-">
                                                <rect x="0" y="0" width="282" height="197"
                                                    fill="none"></rect>
                                            </clippath>
                                        </defs>
                                        <rect fill="#ffffff" class="highcharts-background" x="0" y="0"
                                            width="367" height="300" rx="0" ry="0"
                                            aria-hidden="true"></rect>
                                        <rect fill="none" class="highcharts-plot-background" x="75"
                                            y="53" width="282" height="197" aria-hidden="true"></rect>
                                        <g class="highcharts-pane-group" data-z-index="0" aria-hidden="true"></g>
                                        <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1"
                                            aria-hidden="true">
                                            <path fill="none" data-z-index="1" class="highcharts-grid-line"
                                                d="M 168.5 53 L 168.5 250" opacity="1"></path>
                                            <path fill="none" data-z-index="1" class="highcharts-grid-line"
                                                d="M 262.5 53 L 262.5 250" opacity="1"></path>
                                            <path fill="none" data-z-index="1" class="highcharts-grid-line"
                                                d="M 356.5 53 L 356.5 250" opacity="1"></path>
                                            <path fill="none" data-z-index="1" class="highcharts-grid-line"
                                                d="M 74.5 53 L 74.5 250" opacity="1"></path>
                                        </g>
                                        <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1"
                                            aria-hidden="true">
                                            <path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1"
                                                class="highcharts-grid-line" d="M 75 250.5 L 357 250.5" opacity="1">
                                            </path>
                                            <path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1"
                                                class="highcharts-grid-line" d="M 75 211.5 L 357 211.5" opacity="1">
                                            </path>
                                            <path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1"
                                                class="highcharts-grid-line" d="M 75 171.5 L 357 171.5" opacity="1">
                                            </path>
                                            <path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1"
                                                class="highcharts-grid-line" d="M 75 132.5 L 357 132.5" opacity="1">
                                            </path>
                                            <path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1"
                                                class="highcharts-grid-line" d="M 75 92.5 L 357 92.5" opacity="1">
                                            </path>
                                            <path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1"
                                                class="highcharts-grid-line" d="M 75 52.5 L 357 52.5" opacity="1">
                                            </path>
                                        </g>
                                        <rect fill="none" class="highcharts-plot-border" data-z-index="1"
                                            x="75" y="53" width="282" height="197"
                                            aria-hidden="true"></rect>
                                        <g class="highcharts-axis highcharts-xaxis" data-z-index="2" aria-hidden="true">
                                            <path fill="none" class="highcharts-axis-line" stroke="#ccd6eb"
                                                stroke-width="1" data-z-index="7" d="M 75 250.5 L 357 250.5"></path>
                                        </g>
                                        <g class="highcharts-axis highcharts-yaxis" data-z-index="2" aria-hidden="true">
                                            <text x="25.853843688964844" data-z-index="7" text-anchor="middle"
                                                transform="translate(0,0) rotate(270 25.853843688964844 151.5)"
                                                class="highcharts-axis-title" style="color:#666666;fill:#666666;"
                                                y="151.5">
                                                <tspan>Jumlah</tspan>
                                            </text>
                                            <path fill="none" class="highcharts-axis-line" data-z-index="7"
                                                d="M 75 53 L 75 250"></path>
                                        </g>
                                        <g class="highcharts-series-group" data-z-index="3" aria-hidden="false">
                                            <g class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-tracker"
                                                data-z-index="0.1" opacity="1" transform="translate(75,53) scale(1 1)"
                                                clip-path="url(#highcharts-98vaw84-1-)" aria-hidden="false"
                                                aria-label="">
                                                <rect x="19" y="126" width="56" height="72"
                                                    fill="#7cb5ec" opacity="1"
                                                    class="highcharts-point highcharts-color-0" tabindex="-1"
                                                    role="img" aria-label="1. LAKI-LAKI, 46." style="outline: 0px;">
                                                </rect>
                                                <rect x="113" y="118" width="56" height="80"
                                                    fill="#434348" opacity="1"
                                                    class="highcharts-point highcharts-color-1" tabindex="-1"
                                                    role="img" aria-label="2. PEREMPUAN, 51." style="outline: 0px;">
                                                </rect>
                                                <rect x="207" y="45" width="56" height="153"
                                                    fill="#90ed7d" opacity="1"
                                                    class="highcharts-point highcharts-color-2" tabindex="-1"
                                                    role="img" aria-label="3. TOTAL, 97." style="outline: 0px;">
                                                </rect>
                                            </g>
                                            <g class="highcharts-markers highcharts-series-0 highcharts-column-series"
                                                data-z-index="0.1" opacity="1" transform="translate(75,53) scale(1 1)"
                                                aria-hidden="true" clip-path="none"></g>
                                        </g>
                                        <g class="highcharts-exporting-group" data-z-index="3" aria-hidden="true">
                                            <g class="highcharts-button highcharts-contextbutton" stroke-linecap="round"
                                                transform="translate(333,10)">
                                                <rect fill="#ffffff" class="highcharts-button-box" x="0.5"
                                                    y="0.5" width="24" height="22" rx="2"
                                                    ry="2" stroke="none" stroke-width="1"></rect>
                                                <title>Chart context menu</title>
                                                <path fill="#666666"
                                                    d="M 6 6.5 L 20 6.5 M 6 11.5 L 20 11.5 M 6 16.5 L 20 16.5"
                                                    class="highcharts-button-symbol" data-z-index="1" stroke="#666666"
                                                    stroke-width="3"></path>
                                                <text x="0" data-z-index="1" y="12"
                                                    style="color:#333333;cursor:pointer;font-weight:normal;fill:#333333;"></text>
                                            </g>
                                        </g><text x="184" text-anchor="middle" class="highcharts-title"
                                            data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;"
                                            y="24" aria-hidden="true">
                                            <tspan>Jumlah Penduduk</tspan>
                                        </text><text x="184" text-anchor="middle" class="highcharts-subtitle"
                                            data-z-index="4" style="color:#666666;fill:#666666;" y="52"
                                            aria-hidden="true"></text><text x="10" text-anchor="start"
                                            class="highcharts-caption" data-z-index="4"
                                            style="color:#666666;fill:#666666;" y="297" aria-hidden="true"></text>
                                        <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"
                                            aria-hidden="true"><text x="122"
                                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                                text-anchor="middle" transform="translate(0,0)" y="269"
                                                opacity="1">
                                                <tspan>46</tspan>
                                                <tspan x="122" dy="14">LAKI-LAKI</tspan>
                                            </text><text x="216"
                                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                                text-anchor="middle" transform="translate(0,0)" y="269"
                                                opacity="1">
                                                <tspan>51</tspan>
                                                <tspan x="216" dy="14">PEREMPUAN</tspan>
                                            </text><text x="310"
                                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                                text-anchor="middle" transform="translate(0,0)" y="269"
                                                opacity="1">
                                                <tspan>97</tspan>
                                                <tspan x="310" dy="14">TOTAL</tspan>
                                            </text></g>
                                        <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"
                                            aria-hidden="true"><text x="60"
                                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                                text-anchor="end" transform="translate(0,0)" y="252"
                                                opacity="1">0</text><text x="60"
                                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                                text-anchor="end" transform="translate(0,0)" y="213"
                                                opacity="1">25</text><text x="60"
                                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                                text-anchor="end" transform="translate(0,0)" y="173"
                                                opacity="1">50</text><text x="60"
                                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                                text-anchor="end" transform="translate(0,0)" y="134"
                                                opacity="1">75</text><text x="60"
                                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                                text-anchor="end" transform="translate(0,0)" y="95"
                                                opacity="1">100</text><text x="60"
                                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                                text-anchor="end" transform="translate(0,0)" y="55"
                                                opacity="1">125</text></g><text x="357"
                                            class="highcharts-credits" text-anchor="end" data-z-index="8"
                                            style="cursor:pointer;color:#999999;font-size:9px;fill:#999999;"
                                            y="295" aria-label="Chart credits: Highcharts.com"
                                            aria-hidden="false">Highcharts.com</text>
                                    </svg>
                                    <div class="highcharts-a11y-proxy-container" aria-hidden="false">
                                        <div aria-label="Chart menu" role="region" aria-hidden="false"><button
                                                aria-label="View chart menu" aria-expanded="false"
                                                class="highcharts-a11y-proxy-button" aria-hidden="false"
                                                style="border-width: 0px; background-color: transparent; cursor: pointer; outline: none; opacity: 0.001; z-index: 999; overflow: hidden; padding: 0px; margin: 0px; display: block; position: absolute; width: 23.9995px; height: 21.9995px; left: 333.493px; top: 10.5029px;"></button>
                                        </div>
                                    </div>
                                </div>
                                <div id="highcharts-screen-reader-region-after-0" aria-label="" aria-hidden="false"
                                    style="position: relative;">
                                    <div style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;"
                                        aria-hidden="false">
                                        <div id="highcharts-end-of-chart-marker-0">End of interactive chart.</div>
                                    </div>
                                </div>
                                <div class="highcharts-exit-anchor" tabindex="0" aria-hidden="false"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-item">
                    <style type="text/css">
                        button.btn {
                            margin-left: 0
                        }

                        #collapse2 {
                            margin-top: 5px
                        }

                        .tabel-info {
                            width: 100%
                        }

                        .tabel-info,
                        tr {
                            border-bottom: 1px;
                            border: 0 solid
                        }

                        .tabel-info,
                        td {
                            border: 0 solid;
                            height: 30px;
                            padding: 5px
                        }
                    </style>
                    <div class="box box-primary box-solid">
                        <div class="box-header">
                            <h3 class="box-title">
                                <i class="ti ti-map-pin mr-1"></i>Lokasi Kantor Desa
                            </h3>
                        </div>
                        <div class="box-body space-y-3">
                            <div id="map_canvas" style="height: 200px; position: relative;"
                                class="leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom"
                                tabindex="0">
                                <div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(0px, 0px, 0px);">
                                    <div class="leaflet-pane leaflet-tile-pane">
                                        <div class="leaflet-layer " style="z-index: 1; opacity: 1;">
                                            <div class="leaflet-tile-container leaflet-zoom-animated"
                                                style="z-index: 19; transform: translate3d(0px, 0px, 0px) scale(1);"><img
                                                    alt="" role="presentation"
                                                    src="./Visi Misi - Desa Sukaraya_files/8579.png"
                                                    class="leaflet-tile leaflet-tile-loaded"
                                                    style="width: 256px; height: 256px; transform: translate3d(-115px, -35px, 0px); opacity: 1;"><img
                                                    alt="" role="presentation"
                                                    src="./Visi Misi - Desa Sukaraya_files/8579(1).png"
                                                    class="leaflet-tile leaflet-tile-loaded"
                                                    style="width: 256px; height: 256px; transform: translate3d(141px, -35px, 0px); opacity: 1;">
                                            </div>
                                        </div>
                                        <div class="leaflet-layer " style="z-index: 3; opacity: 1;">
                                            <div class="leaflet-tile-container leaflet-zoom-animated"
                                                style="z-index: 19; transform: translate3d(0px, 0px, 0px) scale(1);"><img
                                                    alt="" role="presentation"
                                                    src="./Visi Misi - Desa Sukaraya_files/8579.png"
                                                    class="leaflet-tile leaflet-tile-loaded"
                                                    style="width: 256px; height: 256px; transform: translate3d(-115px, -35px, 0px); opacity: 1;"><img
                                                    alt="" role="presentation"
                                                    src="./Visi Misi - Desa Sukaraya_files/8579(1).png"
                                                    class="leaflet-tile leaflet-tile-loaded"
                                                    style="width: 256px; height: 256px; transform: translate3d(141px, -35px, 0px); opacity: 1;">
                                            </div>
                                        </div>
                                        <div class="leaflet-layer " style="z-index: 4; opacity: 1;">
                                            <div class="leaflet-tile-container leaflet-zoom-animated"
                                                style="z-index: 19; transform: translate3d(0px, 0px, 0px) scale(1);"><img
                                                    alt="" role="presentation"
                                                    src="./Visi Misi - Desa Sukaraya_files/8579.png"
                                                    class="leaflet-tile leaflet-tile-loaded"
                                                    style="width: 256px; height: 256px; transform: translate3d(-115px, -35px, 0px); opacity: 1;"><img
                                                    alt="" role="presentation"
                                                    src="./Visi Misi - Desa Sukaraya_files/8579(1).png"
                                                    class="leaflet-tile leaflet-tile-loaded"
                                                    style="width: 256px; height: 256px; transform: translate3d(141px, -35px, 0px); opacity: 1;">
                                            </div>
                                        </div>
                                        <div class="leaflet-layer " style="z-index: 5; opacity: 1;">
                                            <div class="leaflet-tile-container leaflet-zoom-animated"
                                                style="z-index: 19; transform: translate3d(0px, 0px, 0px) scale(1);"><img
                                                    alt="" role="presentation"
                                                    src="./Visi Misi - Desa Sukaraya_files/8579.png"
                                                    class="leaflet-tile leaflet-tile-loaded"
                                                    style="width: 256px; height: 256px; transform: translate3d(-115px, -35px, 0px); opacity: 1;"><img
                                                    alt="" role="presentation"
                                                    src="./Visi Misi - Desa Sukaraya_files/8579(1).png"
                                                    class="leaflet-tile leaflet-tile-loaded"
                                                    style="width: 256px; height: 256px; transform: translate3d(141px, -35px, 0px); opacity: 1;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="leaflet-pane leaflet-shadow-pane"><img
                                            src="./Visi Misi - Desa Sukaraya_files/marker-shadow.png"
                                            class="leaflet-marker-shadow leaflet-zoom-animated" alt=""
                                            style="margin-left: -12px; margin-top: -41px; width: 41px; height: 41px; transform: translate3d(184px, 100px, 0px);">
                                    </div>
                                    <div class="leaflet-pane leaflet-overlay-pane"></div>
                                    <div class="leaflet-pane leaflet-marker-pane"><img
                                            src="./Visi Misi - Desa Sukaraya_files/marker-icon.png"
                                            class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive"
                                            tabindex="0"
                                            style="margin-left: -12px; margin-top: -41px; width: 25px; height: 41px; transform: translate3d(184px, 100px, 0px); z-index: 100;">
                                    </div>
                                    <div class="leaflet-pane leaflet-tooltip-pane"></div>
                                    <div class="leaflet-pane leaflet-popup-pane"></div>
                                    <div class="leaflet-proxy leaflet-zoom-animated"
                                        style="transform: translate3d(3.44964e+06px, 2.19636e+06px, 0px) scale(8192);">
                                    </div>
                                </div>
                                <div class="leaflet-control-container">
                                    <div class="leaflet-top leaflet-left">
                                        <div class="leaflet-control-zoom leaflet-bar leaflet-control"><a
                                                class="leaflet-control-zoom-in"
                                                href="https://preview.silirdev.com/artikel/2020/6/26/visi-misi#"
                                                title="Zoom in" role="button" aria-label="Zoom in">+</a><a
                                                class="leaflet-control-zoom-out"
                                                href="https://preview.silirdev.com/artikel/2020/6/26/visi-misi#"
                                                title="Zoom out" role="button" aria-label="Zoom out">−</a></div>
                                    </div>
                                    <div class="leaflet-top leaflet-right">
                                        <div class="leaflet-control-layers leaflet-control" aria-haspopup="true"><a
                                                class="leaflet-control-layers-toggle"
                                                href="https://preview.silirdev.com/artikel/2020/6/26/visi-misi#"
                                                title="Layers"></a>
                                            <form class="leaflet-control-layers-list">
                                                <div class="leaflet-control-layers-base"><label>
                                                        <div class="active"><input type="radio"
                                                                class="leaflet-control-layers-selector"
                                                                name="leaflet-base-layers" checked="checked"><span>
                                                                OpenStreetMap</span></div>
                                                    </label><label>
                                                        <div><input type="radio" class="leaflet-control-layers-selector"
                                                                name="leaflet-base-layers"><span> OpenStreetMap
                                                                H.O.T.</span></div>
                                                    </label><label>
                                                        <div class="active"><input type="radio"
                                                                class="leaflet-control-layers-selector"
                                                                name="leaflet-base-layers" checked="checked"><span> Mapbox
                                                                Streets</span></div>
                                                    </label><label>
                                                        <div class="active"><input type="radio"
                                                                class="leaflet-control-layers-selector"
                                                                name="leaflet-base-layers" checked="checked"><span> Mapbox
                                                                Satellite</span></div>
                                                    </label><label>
                                                        <div class="active"><input type="radio"
                                                                class="leaflet-control-layers-selector"
                                                                name="leaflet-base-layers" checked="checked"><span> Mapbox
                                                                Satellite-Street</span></div>
                                                    </label></div>
                                                <div class="leaflet-control-layers-separator" style="display: none;">
                                                </div>
                                                <div class="leaflet-control-layers-overlays"></div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="leaflet-bottom leaflet-left"></div>
                                    <div class="leaflet-bottom leaflet-right">
                                        <div class="leaflet-control-attribution leaflet-control"><a
                                                href="http://leafletjs.com/"
                                                title="A JS library for interactive maps">Leaflet</a> | <a
                                                href="https://openstreetmap.org/copyright">© OpenStreetMap</a> | <a
                                                href="https://github.com/OpenSID/OpenSID">OpenSID</a></div>
                                    </div>
                                </div>
                            </div>
                            <a class="button button-tertiary block w-full text-center"
                                href="https://www.openstreetmap.org/#map=15/-8.483832804795249/116.08523368835449"
                                style="color:#fff;" target="_blank" data-mdb-ripple="true"
                                data-md-ripple-color="light">Buka Peta</a>
                            <button class="button button-tertiary block w-full z-50 relative btn"
                                data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false"
                                data-mdb-ripple="true" data-md-ripple-color="light">
                                Detail
                            </button>
                            <div id="collapse2" class="collapse">
                                <div class="info-desa">
                                    <table class="table-info text-sm">
                                        <tbody>
                                            <tr>
                                                <td width="25%">Alamat</td>
                                                <td>:</td>
                                                <td width="70%">Jl. Andi Makassau, No. 12, Dusun Sidodadi</td>
                                            </tr>
                                            <tr>
                                                <td width="25%">Desa </td>
                                                <td>:</td>
                                                <td width="70%">Sukaraya</td>
                                            </tr>
                                            <tr>
                                                <td width="25%">Kecamatan</td>
                                                <td>:</td>
                                                <td width="70%">Bone-Bone</td>
                                            </tr>
                                            <tr>
                                                <td width="25%">Kabupaten</td>
                                                <td>:</td>
                                                <td width="70%">Luwu Utara</td>
                                            </tr>
                                            <tr>
                                                <td width="25%">Kodepos</td>
                                                <td>:</td>
                                                <td width="70%">92966</td>
                                            </tr>
                                            <tr>
                                                <td width="25%">Telepon</td>
                                                <td>:</td>
                                                <td width="70%">0471563410</td>
                                            </tr>
                                            <tr>
                                                <td width="25%">Email</td>
                                                <td>:</td>
                                                <td width="70%">pengaduan@sukaraya.luwuutarakab.go.id</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        var posisi = [-8.483832804795249, 116.08523368835449];
                        var zoom = 14;
                        var lokasi_kantor = L.map('map_canvas').setView(posisi, zoom);
                        var baseLayers = getBaseLayers(lokasi_kantor, '');
                        L.control.layers(baseLayers, null, {
                            position: 'topright',
                            collapsed: true
                        }).addTo(lokasi_kantor);
                        var kantor_desa = L.marker(posisi).addTo(lokasi_kantor);
                    </script>
                </div>
                <div class="sidebar-item">
                    <div class="box box-primary box-solid">
                        <div class="box-header">
                            <h3 class="box-title"><i class="ti ti-chart-bar mr-1"></i> Statistik Pengunjung</h3>
                        </div>
                        <div class="box-body">
                            <table cellpadding="0" cellspacing="0" class="table w-full">
                                <tbody>
                                    <tr>
                                        <td class="description">Hari ini</td>
                                        <td class="dot">:</td>
                                        <td class="case">30</td>
                                    </tr>
                                    <tr>
                                        <td class="description">Kemarin</td>
                                        <td class="dot">:</td>
                                        <td class="case">44</td>
                                    </tr>
                                    <tr>
                                        <td class="description">Total Pengunjung</td>
                                        <td class="dot">:</td>
                                        <td class="case">37.434</td>
                                    </tr>
                                    <tr>
                                        <td class="description">Sistem Operasi</td>
                                        <td class="dot">:</td>
                                        <td class="case">Windows 10</td>
                                    </tr>
                                    <tr>
                                        <td class="description">IP Address</td>
                                        <td class="dot">:</td>
                                        <td class="case">103.40.122.118</td>
                                    </tr>
                                    <tr>
                                        <td class="description">Browser</td>
                                        <td class="dot">:</td>
                                        <td class="case">Chrome 116.0.0.0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </aside>
        </section>
        <section class="grid gap-4 lg:gap-5 grid-cols-3 md:grid-cols-3 lg:grid-cols-9 my-5" id="shortcut-link">
            <a href="https://preview.silirdev.com/peta" target="" rel="noopener"
                class="card shadow-lg px-3 py-2 lg:p-3 space-y-2 group shortcut-card dark:border dark:border-gray-500 aos-init"
                data-aos="zoom-in" data-aos-delay="0">
                <img loading="lazy" src="./Visi Misi - Desa Sukaraya_files/map.png" alt="Peta Desa"
                    class="w-auto mx-auto py-2 h-12 group-hover:scale-125 transition duration-200">
                <span class="text-center text-xs block break-words">Peta Desa</span>
            </a>
            <a href="https://preview.silirdev.com/peraturan_desa" target="" rel="noopener"
                class="card shadow-lg px-3 py-2 lg:p-3 space-y-2 group shortcut-card dark:border dark:border-gray-500 aos-init"
                data-aos="zoom-in" data-aos-delay="50">
                <img loading="lazy" src="./Visi Misi - Desa Sukaraya_files/compliant.png" alt="Produk Hukum"
                    class="w-auto mx-auto py-2 h-12 group-hover:scale-125 transition duration-200">
                <span class="text-center text-xs block break-words">Produk Hukum</span>
            </a>
            <a href="https://preview.silirdev.com/informasi_publik" target="" rel="noopener"
                class="card shadow-lg px-3 py-2 lg:p-3 space-y-2 group shortcut-card dark:border dark:border-gray-500 aos-init"
                data-aos="zoom-in" data-aos-delay="100">
                <img loading="lazy" src="./Visi Misi - Desa Sukaraya_files/document.png" alt="Informasi Publik"
                    class="w-auto mx-auto py-2 h-12 group-hover:scale-125 transition duration-200">
                <span class="text-center text-xs block break-words">Informasi Publik</span>
            </a>
            <a href="https://preview.silirdev.com/lapak" target="" rel="noopener"
                class="card shadow-lg px-3 py-2 lg:p-3 space-y-2 group shortcut-card dark:border dark:border-gray-500 aos-init"
                data-aos="zoom-in" data-aos-delay="150">
                <img loading="lazy" src="./Visi Misi - Desa Sukaraya_files/trolley.png" alt="Lapak"
                    class="w-auto mx-auto py-2 h-12 group-hover:scale-125 transition duration-200">
                <span class="text-center text-xs block break-words">Lapak</span>
            </a>
            <a href="https://preview.silirdev.com/arsip" target="" rel="noopener"
                class="card shadow-lg px-3 py-2 lg:p-3 space-y-2 group shortcut-card dark:border dark:border-gray-500 aos-init"
                data-aos="zoom-in" data-aos-delay="200">
                <img loading="lazy" src="./Visi Misi - Desa Sukaraya_files/archive.png" alt="Arsip Berita"
                    class="w-auto mx-auto py-2 h-12 group-hover:scale-125 transition duration-200">
                <span class="text-center text-xs block break-words">Arsip Berita</span>
            </a>
            <a href="https://preview.silirdev.com/galeri" target="" rel="noopener"
                class="card shadow-lg px-3 py-2 lg:p-3 space-y-2 group shortcut-card dark:border dark:border-gray-500 aos-init"
                data-aos="zoom-in" data-aos-delay="250">
                <img loading="lazy" src="./Visi Misi - Desa Sukaraya_files/image-gallery.png" alt="Album Galeri"
                    class="w-auto mx-auto py-2 h-12 group-hover:scale-125 transition duration-200">
                <span class="text-center text-xs block break-words">Album Galeri</span>
            </a>
            <a href="https://preview.silirdev.com/pengaduan" target="" rel="noopener"
                class="card shadow-lg px-3 py-2 lg:p-3 space-y-2 group shortcut-card dark:border dark:border-gray-500 aos-init"
                data-aos="zoom-in" data-aos-delay="300">
                <img loading="lazy" src="./Visi Misi - Desa Sukaraya_files/announcement.png" alt="Pengaduan"
                    class="w-auto mx-auto py-2 h-12 group-hover:scale-125 transition duration-200">
                <span class="text-center text-xs block break-words">Pengaduan</span>
            </a>
            <a href="https://preview.silirdev.com/pembangunan" target="" rel="noopener"
                class="card shadow-lg px-3 py-2 lg:p-3 space-y-2 group shortcut-card dark:border dark:border-gray-500 aos-init"
                data-aos="zoom-in" data-aos-delay="350">
                <img loading="lazy" src="./Visi Misi - Desa Sukaraya_files/architect.png" alt="Pembangunan"
                    class="w-auto mx-auto py-2 h-12 group-hover:scale-125 transition duration-200">
                <span class="text-center text-xs block break-words">Pembangunan</span>
            </a>
            <a href="https://preview.silirdev.com/status-idm/2023" target="" rel="noopener"
                class="card shadow-lg px-3 py-2 lg:p-3 space-y-2 group shortcut-card dark:border dark:border-gray-500 aos-init"
                data-aos="zoom-in" data-aos-delay="400">
                <img loading="lazy" src="./Visi Misi - Desa Sukaraya_files/pie-chart.png" alt="Status IDM"
                    class="w-auto mx-auto py-2 h-12 group-hover:scale-125 transition duration-200">
                <span class="text-center text-xs block break-words">Status IDM</span>
            </a>
        </section>
    </main>
    <div class="container px-3 max-w-container mx-auto space-y-5 my-5">
        <section class="flex lg:space-x-4 mt-1 mb-5 space-y-4 lg:space-y-0 flex-col lg:flex-row">
            <div class="card w-full apbdesa">
                <h3 class="card-heading is-bordered">APBDes 2019 Pelaksanaan</h3>
                <div class="card-content space-y-2">
                    <div class="group">
                        <span class="text-sm font-bold">Pendapatan Desa</span>
                        <div class="text-sm flex justify-between">
                            <span>Rp 1.657.327.899,00</span>
                            <span>Rp 1.944.356.000,00</span>
                        </div>
                        <div class="progress">
                            <div class="progress-item" style="width:85.24%">
                                <span class="progress-value">85.24%</span>
                            </div>
                        </div>
                    </div>
                    <div class="group">
                        <span class="text-sm font-bold">Belanja Desa</span>
                        <div class="text-sm flex justify-between">
                            <span>Rp 725.450.000,00</span>
                            <span>Rp 763.950.000,00</span>
                        </div>
                        <div class="progress">
                            <div class="progress-item" style="width:94.96%">
                                <span class="progress-value">94.96%</span>
                            </div>
                        </div>
                    </div>
                    <div class="group">
                        <span class="text-sm font-bold">Pembiayaan Desa</span>
                        <div class="text-sm flex justify-between">
                            <span>Rp 12.435.000,00</span>
                            <span>Rp -48.766.000,00</span>
                        </div>
                        <div class="progress">
                            <div class="progress-item" style="width:-25.5%">
                                <span class="progress-value">-25.5%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card w-full apbdesa">
                <h3 class="card-heading is-bordered">APBDes 2019 Pendapatan</h3>
                <div class="card-content space-y-2">
                    <div class="group">
                        <span class="text-sm font-bold">Hasil Usaha Desa</span>
                        <div class="text-sm flex justify-between">
                            <span>Rp 10.567.899,00</span>
                            <span>Rp 12.678.000,00</span>
                        </div>
                        <div class="progress">
                            <div class="progress-item" style="width:83.36%">
                                <span class="progress-value">83.36%</span>
                            </div>
                        </div>
                    </div>
                    <div class="group">
                        <span class="text-sm font-bold">Hasil Aset Desa</span>
                        <div class="text-sm flex justify-between">
                            <span>Rp 78.960.000,00</span>
                            <span>Rp 150.678.000,00</span>
                        </div>
                        <div class="progress">
                            <div class="progress-item" style="width:52.4%">
                                <span class="progress-value">52.4%</span>
                            </div>
                        </div>
                    </div>
                    <div class="group">
                        <span class="text-sm font-bold">Bagi Hasil Pajak Dan Retribusi Desa</span>
                        <div class="text-sm flex justify-between">
                            <span>Rp 0,00</span>
                            <span>Rp 1.000.000,00</span>
                        </div>
                        <div class="progress">
                            <div class="progress-item" style="width:0%">
                                <span class="progress-value">0%</span>
                            </div>
                        </div>
                    </div>
                    <div class="group">
                        <span class="text-sm font-bold">Alokasi Dana Desa</span>
                        <div class="text-sm flex justify-between">
                            <span>Rp 1.567.800.000,00</span>
                            <span>Rp 1.780.000.000,00</span>
                        </div>
                        <div class="progress">
                            <div class="progress-item" style="width:88.08%">
                                <span class="progress-value">88.08%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card w-full apbdesa">
                <h3 class="card-heading is-bordered">APBDes 2019 Pembelanjaan</h3>
                <div class="card-content space-y-2">
                    <div class="group">
                        <span class="text-sm font-bold">Bidang Penyelenggaran Pemerintahan Desa</span>
                        <div class="text-sm flex justify-between">
                            <span>Rp 560.000.000,00</span>
                            <span>Rp 560.000.000,00</span>
                        </div>
                        <div class="progress">
                            <div class="progress-item" style="width:100%">
                                <span class="progress-value">100%</span>
                            </div>
                        </div>
                    </div>
                    <div class="group">
                        <span class="text-sm font-bold">Bidang Pemberdayaan Masyarakat Desa</span>
                        <div class="text-sm flex justify-between">
                            <span>Rp 115.000.000,00</span>
                            <span>Rp 125.000.000,00</span>
                        </div>
                        <div class="progress">
                            <div class="progress-item" style="width:92%">
                                <span class="progress-value">92%</span>
                            </div>
                        </div>
                    </div>
                    <div class="group">
                        <span class="text-sm font-bold">Bidang Penanggulangan Bencana, Darurat Dan Mendesak Desa</span>
                        <div class="text-sm flex justify-between">
                            <span>Rp 50.450.000,00</span>
                            <span>Rp 78.950.000,00</span>
                        </div>
                        <div class="progress">
                            <div class="progress-item" style="width:63.9%">
                                <span class="progress-value">63.9%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section
        class="fixed inset-x-0 bottom-0 left-0 max-w-screen right-0 z-40 bg-white dark:bg-dark-secondary shadow-xl lg:hidden lg:invisible bottom-nav">
        <div class="flex justify-between">
            <a href="https://preview.silirdev.com/"
                class="flex flex-col items-center w-full pt-2 pb-1 active:text-secondary " data-mdb-ripple="true"
                data-mdb-ripple-color="light">
                <i class="ti ti-home text-lg"></i>
                <span class="text-xs">Beranda</span>
            </a>
            <a href="https://preview.silirdev.com/peta"
                class="flex flex-col items-center w-full pt-2 pb-1 active:text-secondary " data-mdb-ripple="true"
                data-mdb-ripple-color="light">
                <i class="ti ti-map-pin text-lg"></i>
                <span class="text-xs">Peta</span>
            </a>
            <a href="https://preview.silirdev.com/artikel/2020/6/26/visi-misi#"
                class="flex flex-col items-center w-full pt-2 pb-1 active:text-secondary bg-primary text-white"
                data-mdb-ripple="true" data-mdb-ripple-color="light" @click="drawer = !drawer">
                <i class="ti ti-category-2 text-lg"></i>
                <span class="text-xs">Menu</span>
            </a>
            <a href="https://preview.silirdev.com/artikel/2020/6/26/visi-misi#"
                class="flex flex-col items-center w-full pt-2 pb-1 active:text-secondary " data-mdb-ripple="true"
                data-mdb-ripple-color="light" data-bs-target="#modal-login" data-bs-toggle="modal"
                @click="drawer = false">
                <i class="ti ti-login text-lg"></i>
                <span class="text-xs">Login</span>
            </a>
            <a href="https://preview.silirdev.com/galeri"
                class="flex flex-col items-center w-full pt-2 pb-1 active:text-secondary " data-mdb-ripple="true"
                data-mdb-ripple-color="light">
                <i class="ti ti-photo-heart text-lg"></i>
                <span class="text-xs">Galeri</span>
            </a>
        </div>
    </section>
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        role="dialog" id="modal-login" tabindex="-1" aria-labelledby="modal-login-label" aria-hidden="true">
        <div class="modal-dialog bg-white rounded relative w-auto">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div
                    class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-heading font-medium leading-normal text-gray-800" id="exampleModalLabel">
                        Menu Login
                    </h5>
                    <button type="button"
                        class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body relative p-4 flex flex-col space-y-3">
                    <a href="https://preview.silirdev.com/layanan-mandiri"
                        class="button button-primary text-center px-5 py-3 text-sm" data-mdb-ripple="true"
                        data-md-ripple-color="light">Login Layanan Mandiri</a>
                    <a href="https://preview.silirdev.com/siteman"
                        class="button button-secondary text-center px-5 py-3 text-sm" data-mdb-ripple="true"
                        data-md-ripple-color="light">Login Admin</a>
                    <a href="https://preview.silirdev.com/kehadiran/masuk"
                        class="button button-tertiary text-center px-5 py-3 text-sm" data-mdb-ripple="true"
                        data-md-ripple-color="light">Login Kehadiran Perangkat</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer')
@endpush
