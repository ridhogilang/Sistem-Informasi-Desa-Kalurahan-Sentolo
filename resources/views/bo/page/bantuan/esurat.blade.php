@extends('bo.layout.master')

@section('content')
<div class="pagetitle">
        <h1>Bantuan </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Bantuan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>ini adalah halaman bantuan</h2>
                </div>
            </div>
            <div class="row">
                <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">

                  <div class="accordion-item  px-3">
                    <h3 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                        <span class="num">1.</span>
                          <strong style="margin-left: 10px;">
                          Apa itu sistem informasi E-Surat Kalurahan Sentolo?
                          </strong>
                      </button>
                    </h3>
                    <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                      <div class="accordion-body">
                      Sistem informasi E-Surat Kalurahan Sentolo adalah platform yang digunakan untuk mengelola surat-menyurat secara elektronik di dalam proses pemerintahan Kalurahan Sentolo
                      </div>
                    </div>
                  </div><!-- # Faq item-->

                  <div class="accordion-item  px-3">
                    <h3 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                        <span class="num">2. </span>
                          <strong style="margin-left: 10px;">
                          Apa manfaat menggunakan sistem informasi E-Surat?
                          </strong>
                      </button>
                    </h3>
                    <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                      <div class="accordion-body">
                        Manfaat utama menggunakan sistem e-surat adalah efisiensi, kecepatan, dan transparansi dalam pengelolaan surat-menyurat. Ini juga membantu dan memudahkan akses terhadap arsip surat.
                      </div>
                    </div>
                  </div><!-- # Faq item-->

                  <div class="accordion-item  px-3">
                    <h3 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                        <span class="num">3.</span>
                          <strong style="margin-left: 10px;">
                          Bagaimana sistem informasi E-Surat membantu produktivitas?
                          </strong>
                      </button>
                    </h3>
                    <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                      <div class="accordion-body">
                        E-surat memungkinkan akses cepat ke surat-menyurat, pencarian mudah, tindak lanjut yang efisien, dan kolaborasi yang lebih baik antara pengguna.
                      </div>
                    </div>
                  </div><!-- # Faq item-->

                  <div class="accordion-item  px-3">
                    <h3 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                        <span class="num">4.</span>
                          <strong style="margin-left: 10px;">
                          Bagaimana cara membuat sebuah surat pada sistem informasi E-Surat?
                          </strong>
                      </button>
                    </h3>
                    <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                      <div class="accordion-body">
                        <ul>
                          <li>Proses pembuatan surat hanya dapat dilakukan oleh staf pelayanan umum, hal ini dikarenakan pembuatan dan input surat masuk merupakan tugas dari Staf Pelayanan Umum.</li>
                          <li>Buka browser dan kunjungi alamat berikut: …………………………………</li>
                          <li>Login, masukkan email dan password
                              <br><img src="/template/img/login.jpg" height="400">
                          </li>
                          <li>Setelah Anda berhasil login, maka akan masuk ke halaman dashboard sistem informasi Kalurahan Sentolo</li>
                          <li>Lihat pada sidebar (sisi kiri), kemudian pilih <b>E-Surat</b></li>
                              <br><img src="/template/img/sidebar.jpg" height="300">
                          <li>Pilih E-Surat, maka Anda akan diarahkan ke halaman Dashboard E-Surat</li>
                          <li>Untuk membuat surat baru, pilih menu <b>Surat Keluar</b></li>
                          <li>Maka akan muncul 2 pilihan kategori surat yaitu <b>Kemasyarakatan</b> dan <b>Pemerintahan</b></li>
                          <li>Saat Anda pilih salah satu dari kategori tersebut maka akan muncul beberapa jenis surat di dalamnya</li>
                              <br><img src="/template/img/side_surat.jpg" height="450">
                          <li>Pilih salah satu surat yang akan Anda buat</li>
                          <li>Untuk memastikan surat sesuai dengan yang dibutuhkan, Anda dapat melakukan pengecekan terlebih dahulu dengan melihat contoh surat menggunakan tombol <img src="/template/img/contoh.jpg" height="30"></li>
                          <li>Untuk membuat surat baru, tekan tombol <img src="/template/img/baru.jpg" height="30"></li>
                          <li>Masukkan nomor surat sesuai dengan urutan nomor surat yang ada</li>
                          <li>Masukkan NIK pemohon, apabila NIK sudah terdaftar maka identitas akan terisi secara otomatis, apabila belum terdaftar maka staf perlu memasukkan data secara manual</li>
                          <li>Pilih pamong dan atau dukuh untuk melakukan verifikasi data</li>
                          <li>Pilih pamong untuk melakukan tanda tangan pengesahan pada surat yang dibuat</li>
                          <li>Tekan tombol <img src="/template/img/simpan.jpg" height="30"> , maka data akan tersimpan dan terkirim ke dukuh dan atau pamong yang dipilih untuk melakukan verifikasi</li>
                          <li>Sampai pada langkah ini draf surat sudah jadi, menunggu hasil verifkikasi dari dukuh dan atau pamong terkait</li>
                        </ul>
                      </div>
                    </div>
                  </div><!-- # Faq item-->

                  <div class="accordion-item  px-3">
                    <h3 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                        <span class="num">5.</span>
                          <strong style="margin-left: 10px;">
                          Bagaimana cara menggunakan E-Surat untuk membuat sebuah surat?
                          </strong>
                      </button>
                    </h3>
                    <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                      <div class="accordion-body">
                        <ul>
                          <li>Setelah Anda berhasil masuk ke halaman E-Surat, pilih surat yang akan dibuat</li>
                          <li>Anda dapat melihat terlebih dahulu contoh surat yang anda buat dengan menekan tombol berikut</li>
                          <li>Untuk membuat surat baru pilih (tombol) buat surat baru</li>
                        </ul>
                      </div>
                    </div>
                  </div><!-- # Faq item-->
                </div>
            </div>
            <div class="row">
                <div class="col">
                    list aplikasi
                    <li><a href="/admin/bantuan/kepegawaian">Kepegawaian</a></li>
                    <li><a href="/admin/bantuan/e-surat">e-surat</a></li>
                    <li><a href="/admin/bantuan/sistem_informasi">sistem informasi</a></li>
                </div>
            </div>
        </div>
    </section>
@endsection