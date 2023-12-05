<div class="container px-3 max-w-container mx-auto space-y-5 my-5">
    <section class="flex lg:space-x-4 mt-1 mb-5 space-y-4 lg:space-y-0 flex-col lg:flex-row">
        <div class="card w-full apbdesa">
            
            <h3 class="card-heading is-bordered">APBDes {{ $apbd->tahun }} Pelaksanaan</h3>
            <div class="card-content space-y-2">
                <div class="group">
                    <span class="text-sm font-bold">Pendapatan Desa</span>
                    <div class="text-sm flex justify-between">
                        <span>Rp. {{ number_format($apbd->pendapatan_desa, 0, ',', '.') }}</span>
                        <span>Rp. {{ number_format($apbd->pendapatan_desa2, 0, ',', '.') }}</span>
                    </div>
                    <div class="progress">
                        <div class="progress-item" style="width:{{ ($apbd->pendapatan_desa / $apbd->pendapatan_desa2) * 100 }}%">
                            <span class="progress-value">{{ number_format(($apbd->pendapatan_desa / $apbd->pendapatan_desa2) * 100, 2) }}%</span>
                        </div>
                    </div>
                </div>
                <div class="group">
                    <span class="text-sm font-bold">Belanja Desa</span>
                    <div class="text-sm flex justify-between">
                        <span>Rp. {{ number_format($apbd->belanja_desa, 0, ',', '.') }}</span>
                        <span>Rp. {{ number_format($apbd->belanja_desa2, 0, ',', '.') }}</span>
                    </div>
                    <div class="progress">
                        <div class="progress-item" style="width:{{ ($apbd->belanja_desa / $apbd->belanja_desa2) * 100 }}%">
                            <span class="progress-value">{{ number_format(($apbd->belanja_desa / $apbd->belanja_desa2) * 100, 2) }}%</span>
                        </div>
                    </div>
                </div>
                <div class="group">
                    <span class="text-sm font-bold">Pembiayaan Desa</span>
                    <div class="text-sm flex justify-between">
                        <span>Rp. {{ number_format($apbd->pembiayaan_desa, 0, ',', '.') }}</span>
                        <span>Rp. {{ number_format($apbd->pembiayaan_desa2, 0, ',', '.') }}</span>
                    </div>
                    <div class="progress">
                        <div class="progress-item" style="width:{{ ($apbd->pembiayaan_desa / $apbd->pembiayaan_desa2) * 100 }}%">
                            <span class="progress-value">{{ number_format(($apbd->pembiayaan_desa / $apbd->pembiayaan_desa2) * 100, 2) }}%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card w-full apbdesa">
            <h3 class="card-heading is-bordered">APBDes {{ $apbd->tahun }} Pendapatan</h3>
            <div class="card-content space-y-2">
                <div class="group">
                    <span class="text-sm font-bold">Hasil Usaha Desa</span>
                    <div class="text-sm flex justify-between">
                        <span>Rp. {{ number_format($apbd->hasil_usaha, 0, ',', '.') }}</span>
                        <span>Rp. {{ number_format($apbd->hasil_usaha2, 0, ',', '.') }}</span>
                    </div>
                    <div class="progress">
                        <div class="progress-item" style="width:{{ ($apbd->hasil_usaha / $apbd->hasil_usaha2) * 100 }}%">
                            <span class="progress-value">{{ number_format(($apbd->hasil_usaha / $apbd->hasil_usaha2) * 100, 2) }}%</span>
                        </div>
                    </div>
                </div>
                <div class="group">
                    <span class="text-sm font-bold">Hasil Aset Desa</span>
                    <div class="text-sm flex justify-between">
                        <span>Rp. {{ number_format($apbd->hasilaset_desa, 0, ',', '.') }}</span>
                        <span>Rp. {{ number_format($apbd->hasilaset_desa2, 0, ',', '.') }}</span>
                    </div>
                    <div class="progress">
                        <div class="progress-item" style="width:{{ ($apbd->hasilaset_desa / $apbd->hasilaset_desa2) * 100 }}%">
                            <span class="progress-value">{{ number_format(($apbd->hasilaset_desa / $apbd->hasilaset_desa2) * 100, 2) }}%</span>
                        </div>
                    </div>
                </div>
                <div class="group">
                    <span class="text-sm font-bold">Dana Desa</span>
                    <div class="text-sm flex justify-between">
                        <span>Rp. {{ number_format($apbd->dana_desa, 0, ',', '.') }}</span>
                        <span>Rp. {{ number_format($apbd->dana_desa2, 0, ',', '.') }}</span>
                    </div>
                    <div class="progress">
                        <div class="progress-item" style="width:{{ ($apbd->dana_desa / $apbd->dana_desa2) * 100 }}%">
                            <span class="progress-value">{{ number_format(($apbd->dana_desa / $apbd->dana_desa2) * 100, 2) }}%</span>
                        </div>
                    </div>
                </div>
                <div class="group">
                    <span class="text-sm font-bold">Bagi Hasil Pajak Dan Retribusi Desa</span>
                    <div class="text-sm flex justify-between">
                        <span>Rp. {{ number_format($apbd->bagihasil_pajak, 0, ',', '.') }}</span>
                        <span>Rp. {{ number_format($apbd->bagihasil_pajak2, 0, ',', '.') }}</span>
                    </div>
                    <div class="progress">
                        <div class="progress-item" style="width:{{ ($apbd->bagihasil_pajak / $apbd->bagihasil_pajak2) * 100 }}%">
                            <span class="progress-value">{{ number_format(($apbd->bagihasil_pajak / $apbd->bagihasil_pajak2) * 100, 2) }}%</span>
                        </div>
                    </div>
                </div>
                <div class="group">
                    <span class="text-sm font-bold">Alokasi Dana Desa</span>
                    <div class="text-sm flex justify-between">
                        <span>Rp. {{ number_format($apbd->alokasidana_desa, 0, ',', '.') }}</span>
                        <span>Rp. {{ number_format($apbd->alokasidana_desa2, 0, ',', '.') }}</span>
                    </div>
                    <div class="progress">
                        <div class="progress-item" style="width:{{ ($apbd->alokasidana_desa / $apbd->alokasidana_desa2) * 100 }}%">
                            <span class="progress-value">{{ number_format(($apbd->alokasidana_desa / $apbd->alokasidana_desa2) * 100, 2) }}%</span>
                        </div>
                    </div>
                </div>
                <div class="group">
                    <span class="text-sm font-bold">Koreksi Kesalahan Belanja Tahun-tahun Sebelumnya</span>
                    <div class="text-sm flex justify-between">
                        <span>Rp. {{ number_format($apbd->koreksi_kesalahan, 0, ',', '.') }}</span>
                        <span>Rp. {{ number_format($apbd->koreksi_kesalahan2, 0, ',', '.') }}</span>
                    </div>
                    <div class="progress">
                        <div class="progress-item" style="width:{{ ($apbd->koreksi_kesalahan / $apbd->koreksi_kesalahan2) * 100 }}%">
                            <span class="progress-value">{{ number_format(($apbd->koreksi_kesalahan / $apbd->koreksi_kesalahan2) * 100, 2) }}%</span>
                        </div>
                    </div>
                </div>
                <div class="group">
                    <span class="text-sm font-bold">Bunga Bank</span>
                    <div class="text-sm flex justify-between">
                        <span>Rp. {{ number_format($apbd->bunga_bank, 0, ',', '.') }}</span>
                        <span>Rp. {{ number_format($apbd->bunga_bank2, 0, ',', '.') }}</span>
                    </div>
                    <div class="progress">
                        <div class="progress-item" style="width:{{ ($apbd->bunga_bank / $apbd->bunga_bank2) * 100 }}%">
                            <span class="progress-value">{{ number_format(($apbd->bunga_bank / $apbd->bunga_bank2) * 100, 2) }}%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card w-full apbdesa">
            <h3 class="card-heading is-bordered">APBDes {{ $apbd->tahun }} Pembelanjaan</h3>
            <div class="card-content space-y-2">
                <div class="group">
                    <span class="text-sm font-bold">Bidang Penyelenggaran Pemerintahan Desa</span>
                    <div class="text-sm flex justify-between">
                        <span>Rp. {{ number_format($apbd->bdng_pp_desa, 0, ',', '.') }}</span>
                        <span>Rp. {{ number_format($apbd->bdng_pp_desa2, 0, ',', '.') }}</span>
                    </div>
                    <div class="progress">
                        <div class="progress-item" style="width:{{ ($apbd->bdng_pp_desa / $apbd->bdng_pp_desa2) * 100 }}%">
                            <span class="progress-value">{{ number_format(($apbd->bdng_pp_desa / $apbd->bdng_pp_desa2) * 100, 2) }}%</span>
                        </div>
                    </div>
                </div>
                <div class="group">
                    <span class="text-sm font-bold">Bidang Pelaksanaan Pembangunan Desa</span>
                    <div class="text-sm flex justify-between">
                        <span>Rp. {{ number_format($apbd->bdng_p_p_desa, 0, ',', '.') }}</span>
                        <span>Rp. {{ number_format($apbd->bdng_p_p_desa2, 0, ',', '.') }}</span>
                    </div>
                    <div class="progress">
                        <div class="progress-item" style="width:{{ ($apbd->bdng_p_p_desa / $apbd->bdng_p_p_desa2) * 100 }}%">
                            <span class="progress-value">{{ number_format(($apbd->bdng_p_p_desa / $apbd->bdng_p_p_desa2) * 100, 2) }}%</span>
                        </div>
                    </div>
                </div>
                <div class="group">
                    <span class="text-sm font-bold">Bidang Pembinaan Kemasyarakatan</span>
                    <div class="text-sm flex justify-between">
                        <span>Rp. {{ number_format($apbd->bdng_p_k_desa, 0, ',', '.') }}</span>
                        <span>Rp. {{ number_format($apbd->bdng_p_k_desa2, 0, ',', '.') }}</span>
                    </div>
                    <div class="progress">
                        <div class="progress-item" style="width:{{ ($apbd->bdng_p_k_desa / $apbd->bdng_p_k_desa2) * 100 }}%">
                            <span class="progress-value">{{ number_format(($apbd->bdng_p_k_desa / $apbd->bdng_p_k_desa2) * 100, 2) }}%</span>
                        </div>
                    </div>
                </div>
                <div class="group">
                    <span class="text-sm font-bold">Bidang Pemberdayaan Masyarakat</span>
                    <div class="text-sm flex justify-between">
                        <span>Rp. {{ number_format($apbd->bdng_pm_desa, 0, ',', '.') }}</span>
                        <span>Rp. {{ number_format($apbd->bdng_pm_desa2, 0, ',', '.') }}</span>
                    </div>
                    <div class="progress">
                        <div class="progress-item" style="width:{{ ($apbd->bdng_pm_desa / $apbd->bdng_pm_desa2) * 100 }}%">
                            <span class="progress-value">{{ number_format(($apbd->bdng_pm_desa / $apbd->bdng_pm_desa2) * 100, 2) }}%</span>
                        </div>
                    </div>
                </div>
                <div class="group">
                    <span class="text-sm font-bold">Bidang Penanggulangan Bencana, Darurat Dan Mendesak Desa</span>
                    <div class="text-sm flex justify-between">
                        <span>Rp. {{ number_format($apbd->bdng_pbdm_desa, 0, ',', '.') }}</span>
                        <span>Rp. {{ number_format($apbd->bdng_pbdm_desa2, 0, ',', '.') }}</span>
                    </div>
                    <div class="progress">
                        <div class="progress-item" style="width:{{ ($apbd->bdng_pbdm_desa / $apbd->bdng_pbdm_desa2) * 100 }}%">
                            <span class="progress-value">{{ number_format(($apbd->bdng_pbdm_desa / $apbd->bdng_pbdm_desa2) * 100, 2) }}%</span>
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
        <a href=""
            class="flex flex-col items-center w-full pt-2 pb-1 active:text-secondary " data-mdb-ripple="true"
            data-mdb-ripple-color="light">
            <i class="fa-solid fa-house text-lg"></i>
            <span class="text-xs">Beranda</span>
        </a>
        <a href=""
            class="flex flex-col items-center w-full pt-2 pb-1 active:text-secondary " data-mdb-ripple="true"
            data-mdb-ripple-color="light">
            <i class="fa-solid fa-location-dot text-lg"></i>
            <span class="text-xs">Peta</span>
        </a>
        <a href=""
            class="flex flex-col items-center w-full pt-2 pb-1 active:text-secondary bg-primary text-white"
            data-mdb-ripple="true" data-mdb-ripple-color="light" @click="drawer = !drawer">
            <i class="fa-solid fa-bars text-lg"></i>
            <span class="text-xs">Menu</span>
        </a>
        <a href=""
            class="flex flex-col items-center w-full pt-2 pb-1 active:text-secondary " data-mdb-ripple="true"
            data-mdb-ripple-color="light" data-bs-target="#modal-login" data-bs-toggle="modal"
            @click="drawer = false">
            <i class="fa-regular fa-user text-lg"></i>
            <span class="text-xs">Login</span>
        </a>
        <a href=""
            class="flex flex-col items-center w-full pt-2 pb-1 active:text-secondary " data-mdb-ripple="true"
            data-mdb-ripple-color="light">
            <i class="fa-solid fa-images text-lg"></i>
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
                    Menu Login</h5>
                <button type="button"
                    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body relative p-4 flex flex-col space-y-3">
                <a href=""
                    class="button button-primary text-center px-5 py-3 text-sm" data-mdb-ripple="true"
                    data-md-ripple-color="light">Login Layanan Mandiri</a>
                <a href="/sitemin-sentolo/login"
                    class="button button-secondary text-center px-5 py-3 text-sm" data-mdb-ripple="true"
                    data-md-ripple-color="light">Login Admin</a>
                <a href="/sitemin-sentolo/login-absen"
                    class="button button-tertiary text-center px-5 py-3 text-sm" data-mdb-ripple="true"
                    data-md-ripple-color="light">Login Kehadiran Perangkat</a>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="footer-inner">
        <div class="footer-widget">
            <div class="footer-column">
                <div class="footer-brand">
                    <img loading="lazy" src="/home/img/kulonprogo.png" alt="Logo Kalurahan Sentolo" class="footer-brand-image">
                    <p class="footer-brand-caption">
                        Kalurahan Sentolo </p>
                </div>
                <p class="footer-info">
                    Website Resmi Pemerintah Kalurahan Sentolo,
                    Kapanewon Sentolo,
                    Kabupaten Kulon Progo </p>
                <ul class="footer-smed">
                    <li title="Facebook" class="mr-2 rounded-full border-2 transition-all duration-200 hover:bg-secondary">
                        <a href="https://www.facebook.com/DsSentolo" target="_blank" class="inline-flex items-center justify-center p-2 w-10 h-10">
                            <i class="fa fa-facebook-square text-2xl"></i>
                        </a>
                    </li>
                    <li title="Twitter" class="mr-2 rounded-full border-2 transition-all duration-200 hover:bg-secondary">
                        <a href="https://twitter.com/" target="_blank" class="inline-flex items-center justify-center p-2 w-10 h-10">
                            <i class="fa fa-twitter text-2xl"></i>
                        </a>
                    </li>
                    <li title="YouTube" class="mr-2 rounded-full border-2 transition-all duration-200 hover:bg-secondary">
                        <a href="https://www.youtube.com/@pemdessentolo8151/videos" target="_blank" class="inline-flex items-center justify-center p-2 w-10 h-10">
                            <i class="fa fa-youtube text-2xl"></i>
                        </a>
                    </li>
                    <li title="Instagram" class="mr-2 rounded-full border-2 transition-all duration-200 hover:bg-secondary">
                        <a href="https://www.instagram.com/kalurahan_sentolo/" target="_blank" class="inline-flex items-center justify-center p-2 w-10 h-10">
                            <i class="fa fa-instagram text-2xl"></i>
                        </a>
                    </li>
                    <li title="WhatsApp" class="mr-2 rounded-full border-2 transition-all duration-200 hover:bg-secondary">
                        <a href="https://api.whatsapp.com/send?phone=6285340620352" target="_blank" class="inline-flex items-center justify-center p-2 w-10 h-10">
                            <i class="fa fa-whatsapp text-2xl"></i>
                        </a>
                    </li>
                    <li title="Telegram" class="mr-2 rounded-full border-2 transition-all duration-200 hover:bg-secondary">
                        <a href="https://t.me/dikisiswanto" target="_blank" class="inline-flex items-center justify-center p-2 w-10 h-10">
                            <i class="fa fa-telegram text-2xl"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer-column">
                <h3 class="footer-heading items-center flex"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mr-2 inline-block text-tertiary">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155"></path>
                    </svg> Hubungi Kami</h3>
                <p class="footer-info">
                Siwalan, Sentolo, 
                Kec. Sentolo, 
                Kabupaten Kulon Progo, 
                Daerah Istimewa Yogyakarta 
                55664
                </p>
                <ul class="footer-contact">
                    <li class="footer-contact-item"><i class="fa fa-phone mr-2 text-secondary"></i><span>Telepon: (0274) 723156</span></li>
                    <li class="footer-contact-item"><i class="fa fa-envelope mr-2 text-secondary"></i><span>Email: baldessentolo@gmail.com</span></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3 class="footer-heading items-center flex"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 inline-block mr-2 text-tertiary">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z"></path>
                    </svg> Album Galeri</h3>
                <div class="footer-album">
                    <a href="/galeri-sentolo" class="footer-album-item">
                        <img loading="lazy" src="{{ asset('/home/img/galeri.png') }}" title="Galery Sentolo" class=""> 
                    </a>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <span>Hak cipta © 2023 - Pemerintah <a href="{{ config('app.url') }}">Kalurahan Sentolo</a>
        </div>
    </div>
</footer>
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="notif-modal" tabindex="-1" role="dialog" aria-labelledby="notif" aria-hidden="true">
    <div class="modal-dialog relative w-auto modal-dialog-centered">
        <div class="modal-content rounded-lg">
            <div class="modal-header px-4 py-3 flex flex-row-reverse items-center text-left text-slate-800 border-b dark:border-slate-800">
                <button type="button" class="btn-close box-content w-4 h-4 p-1 text-inherit border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:no-underline" data-bs-dismiss="modal" aria-label="Tutup"><i class="ti ti-close"></i></button>
                <h4 class="modal-title font-bold text-left w-full dark:text-white"></h4>
            </div>
            <div class="modal-body relative px-4 py-3">
            </div>
        </div>
    </div>
</div>