<?php
//bantuan (FAQ)
use App\Http\Controllers\bo\Bantuan\BantuanController;
//login dan user
use App\Http\Controllers\bo\Auth\LoginController;
use App\Http\Controllers\bo\Auth\VerifikasiEmailController;
use App\Http\Controllers\bo\Auth\ForgetPasswordController;
use App\Http\Controllers\bo\Pengguna\UserManagementController;
use App\Http\Controllers\bo\Pengguna\roleManagementController;
use App\Http\Controllers\bo\Pengguna\AkunPendudukController;

//e-surat
use App\Http\Controllers\bo\Surat\dashboard\DashboardSuratController;
//surat masuk
use App\Http\Controllers\bo\Surat\masuk\SMasukController;
//surat keluar
use App\Http\Controllers\bo\Surat\keluar\SktmSatuController;
use App\Http\Controllers\bo\Surat\keluar\SktmDuaController;
use App\Http\Controllers\bo\Surat\keluar\SkbmController;
use App\Http\Controllers\bo\Surat\keluar\SkkematianController;
use App\Http\Controllers\bo\Surat\keluar\SpbmController;
use App\Http\Controllers\bo\Surat\keluar\SpektpController;
use App\Http\Controllers\bo\Surat\keluar\SpskckController;
use App\Http\Controllers\bo\Surat\keluar\SpnController;
use App\Http\Controllers\bo\Surat\keluar\SpkController;
use App\Http\Controllers\bo\Surat\keluar\SktbekerjaController;
use App\Http\Controllers\bo\Surat\keluar\SkdudaController;
use App\Http\Controllers\bo\Surat\keluar\SkdController;
use App\Http\Controllers\bo\Surat\keluar\SklController;
use App\Http\Controllers\bo\Surat\keluar\SkpenghasilanController;
use App\Http\Controllers\bo\Surat\keluar\SpbbekerjaController;
use App\Http\Controllers\ScstmController;
//validasi surat keluar
use App\Http\Controllers\bo\Surat\validasi\ValidasiController;
//disposisi surat masuk
use App\Http\Controllers\bo\Surat\disposisi\DisposisiController;
// use App\Http\Controllers\bo\Surat\disposisi\AcaraController;
//arsip
use App\Http\Controllers\bo\Surat\arsip\ArsipController;
use App\Http\Controllers\bo\Surat\arsip\OldArsipController;
//penduduk
use App\Http\Controllers\PendudukController;

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\bo\Sid\MenuController;
use App\Http\Controllers\bo\Sid\AdminController;
use App\Http\Controllers\bo\Sid\AgendaBalaiController;
use App\Http\Controllers\bo\Sid\AgendaGORController;
use App\Http\Controllers\bo\Sid\ApbdesController;
use App\Http\Controllers\bo\Sid\BaganController;
use App\Http\Controllers\bo\Sid\BeritaController;
use App\Http\Controllers\bo\Sid\GaleriController;
use App\Http\Controllers\bo\Sid\HeaderController;
use App\Http\Controllers\bo\Sid\KomentarController;
use App\Http\Controllers\bo\Sid\KomponenController;
use App\Http\Controllers\bo\Sid\PamongController;
use App\Models\AgendaBalai;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//front office (halaman depan)
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/captcha', 'captcha');
    Route::get('/captcha/reload', 'reloadCaptcha');
    Route::get('/berita/{year}/{month}/{day}/{slug}', 'berita');
    Route::get('/artikel/{year}/{month}/{day}/{slug}', 'artikel');
    Route::get('/get-highlight', 'beritautama');
    Route::get('/get-pamong', 'datapamong');
    Route::get('/berita/kategori/semua-berita', 'semuaberita');
    Route::get('/berita/kategori/berita-desa', 'beritadesa');
    Route::get('/berita/kategori/berita-lokal', 'beritalokal');
    Route::get('/berita/kategori/program-kerja', 'programkerja');
    Route::get('/berita/kategori/cari-berita', 'cariberita');
    Route::get('/galeri-sentolo', 'galeri');
    Route::get('/galeri/{year}/{month}/{day}/{nama}', 'show_galeri');
    Route::get('/booking_gor', 'hlmnbooking');
    Route::post('/booking-gor', 'booking_gor');

});


//untuk login
Route::prefix('sitemin-sentolo')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
    Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
    Route::get('/verifymail/{id}', [VerifikasiEmailController::class, 'mailverify'])->name('verifymail');
    Route::resource('/forget_password', ForgetPasswordController::class)->except(['create', 'show', 'destroy']);
});

//komentar iki no ngendi index e approve e
Route::controller(KomentarController::class)->group(function () {
    Route::post('/komentar', 'store');
    Route::put('/approvecomment/{id}', 'approveComment');
    Route::get('/hapus-komentar/{id}', 'destroy');
});



// //APBDes
// //iki crud e pie pak
// Route::controller(ApbdesController::class)->group(function () {
//     Route::get('/admin/apbdes', 'index');
//     //Tambah
//     Route::post('/tambah-apbdes', 'create');

//     //Edit
//     Route::put('/edit-apbdes-pelaksanaan/{id}', 'updatepelaksanaan');
//     Route::put('/edit-apbdes-pendapatan/{id}', 'updatependapatan');
//     Route::put('/edit-apbdes-pembelanjaan/{id}', 'updatepembelanjaan');

//     //Hapus
//     Route::get('/hapus-apbdes/{id}', 'destroy');

// });

// Route::controller(BeritaController::class)->group(function () {
//     //berita
//     Route::get('/admin/berita', 'index');
//     Route::get('/admin/berita/komentar', 'indexkomentar');
//     Route::post('/berita', 'store');
//     Route::put('/berita/{id}', 'update');
//     Route::get('/showberita/{id}', 'show');
//     Route::get('/deleteberita/{id}', 'destroy');
//     Route::put('/update-status/{id}', 'updateStatus');
//     Route::put('/update-sideberita/{id}', 'updateSideBerita');

//     //Artikel
//     Route::get('/admin/artikel', 'artikel');
//     Route::get('/admin/artikel/komentar', 'komentarartikel');
//     Route::post('/artikel', 'tambah_artikel');
//     Route::get('/showartikel/{id}', 'show_artikel');
//     Route::put('/updateartikel/{id}', 'update_artikel');
//     Route::get('/deleteartikel/{id}', 'destroy_artikel');
// });

// Route::controller(MenuController::class)->group(function () {
//     Route::get('/menu', 'index');
//     Route::post('/menu', 'store');
//     Route::put('/menu/{id}', 'update');
//     Route::get('/deletemenu/{id}', 'destroy');
// });

// Route::controller(HeaderController::class)->group(function () {
//     Route::get('/admin/header', 'index');
//     Route::post('/header', 'create');
//     Route::post('/subheader', 'createsub');
//     Route::put('/header/{id}', 'update');
//     Route::put('/subheader/{id}', 'updatesub');
//     Route::get('/deleteheader/{id}', 'hapus');
//     Route::get('/deletesubheader/{id}', 'destroysub');
//     Route::get('/checkSubheaders/{id}', 'checkSubheaders');
// });

//back office (halaman admin)
Route::prefix('admin')->group(function () {
    Route::group(['middleware' => ['web', 'auth']], function () {
        //logout
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
        //dashboard
        Route::get('/dashboard', function () {
            return view('bo.page.dashboard', [
                'dropdown1' => '',
                'dropdown2' => '',
                'title' => 'Dashboard',
            ]);
        })->name('bo.home');

        //halaman bantuan
        Route::controller(BantuanController::class)->prefix('bantuan')->group(function () {
            Route::get('/', 'index');
            Route::get('/e-surat', 'esurat');
            Route::get('/kepegawaian', 'kepegawaian');
            Route::get('/sistem_informasi', 'sistem_informasi');
        });


        //untuk kepegawaian yaitu kebutuhan user dan role tak dewekno marakno riskan
        Route::prefix('pengguna')->middleware('can:Menejemen Pengguna')->group(function () {
            Route::get('/dashboard', function () {
                return view('bo.page.dashboard', [
                    'dropdown1' => '',
                    'dropdown2' => '',
                    'title' => 'Dashboard',
                ]);
            })->name('bo.pegawai.dashboard');
            //akun penduduk untuk pelayanan umum
            //bo.pengguna.akun_penduduk_management
            Route::resource('/akun_penduduk_management', AkunPendudukController::class, ['as' => 'bo.pengguna'])
                ->except(['show', 'edit', 'update'])
                ->middleware('can:Kelola Akun Penduduk');
            Route::get('/akun_penduduk_management_data', [AkunPendudukController::class, 'datas'])
                ->name('bo.pengguna.data.akun_penduduk')
                ->middleware('can:Kelola Akun Penduduk');
            Route::get('/dapatkan_data_penduduk', [AkunPendudukController::class, 'penduduk'])
                ->name('bo.pengguna.data.kependudukan');

            //akun pamong untuk mengelola website
            Route::resource('/user_management', UserManagementController::class, ['as' => 'bo.pegawai'])
                ->except(['show'])
                ->middleware('can:Kelola Akun Pamong');
            Route::get('/user_management_data', [UserManagementController::class, 'datas'])->name('bo.pengguna.data.akun_pamong');

            //hak akses pamong
            Route::resource('/role_management', roleManagementController::class, ['as' => 'bo.pegawai'])
                ->except(['show'])
                ->middleware('can:Kelola Hak Akses Pamong');
        });

        //untuk tim PU dan Arsip (e-surat)
        Route::prefix('e-surat')->middleware('can:Menejemen E-Surat')->group(function () {
            Route::get('/dashboard', [DashboardSuratController::class, 'index'])->name('bo.e-surat.dashboard');

            //validasi surat keluar
            Route::resource('/validasi', ValidasiController::class, ['as' => 'bo.surat'])->only(['index', 'show', 'update', 'destroy']);

            //disposisi surat masuk
            Route::resource('/disposisi', DisposisiController::class, ['as' => 'bo.surat'])->only(['index', 'show', 'update', 'destroy']);
            Route::put('/disposisi/laksana/{id}', [DisposisiController::class, 'executor_imp'])->name('bo.surat.disposisi.executor_imp');

            //arsip
            Route::resource('/arsip', ArsipController::class, ['as' => 'bo.surat'])->only(['index', 'show'])
                ->middleware('can:Arsip Surat');
            Route::delete('/arsip/delete', [ArsipController::class, 'destroy_arsip'])->name('bo.surat.arsip.delete')
                ->middleware('can:Menghapus Arsip');
            Route::resource('/arsip_dihapus', OldArsipController::class, ['as' => 'bo.surat'])->only(['index', 'show'])
                ->middleware('can:Arsip Dihapus');
            Route::get('/arsip_dihapus/doc/{id}', [OldArsipController::class, 'document_hps'])->name('bo.surat.arsip.doc')
                ->middleware('can:Arsip Dihapus');

            Route::middleware('can:Surat Keluar')->group(function () {
                // SKTM Satu Orang
                Route::get('/surat-ktm', [SktmSatuController::class, 'index'])->middleware('can:list surat');
                Route::post('/surat-ktm-satu', [SktmSatuController::class, 'store'])->middleware('can:input surat');
                Route::put('/surat-ktm-satu/{id}', [SktmSatuController::class, 'update'])->middleware('can:edit surat');
                Route::get('/surat-ktm-satu/{id}/view', [SktmSatuController::class, 'show'])->middleware('can:lihat surat');
                Route::delete('/surat-ktm-satu/{id}/{status}', [SktmSatuController::class, 'destroy'])->middleware('can:hapus surat');
                Route::get('/contoh-surat-ktm-satu/view', [SktmSatuController::class, 'contoh'])->middleware('can:lihat contoh surat');
                // SKTM Dua Orang
                Route::post('/surat-ktm-dua', [SktmDuaController::class, 'store'])->middleware('can:input surat');
                Route::put('/surat-ktm-dua/{id}', [SktmDuaController::class, 'update'])->middleware('can:edit surat');
                Route::get('/surat-ktm-dua/{id}/view', [SktmDuaController::class, 'show'])->middleware('can:lihat surat');
                Route::delete('/surat-ktm-dua/{id}/{status}', [SktmDuaController::class, 'destroy'])->middleware('can:hapus surat');
                Route::get('/contoh-surat-ktm-dua/view', [SktmDuaController::class, 'contoh'])->middleware('can:lihat contoh surat');
                // SK Duda / Janda
                Route::get('/surat-kduda', [SkdudaController::class, 'index'])->middleware('can:list surat');
                Route::post('/surat-kduda', [SkdudaController::class, 'store'])->middleware('can:input surat');
                Route::get('/surat-kduda/{id}/view', [SkdudaController::class, 'show'])->middleware('can:lihat surat');
                Route::put('/surat-kduda/{id}', [SkdudaController::class, 'update'])->middleware('can:edit surat');
                Route::delete('/surat-kduda/{id}/{status}', [SkdudaController::class, 'destroy'])->middleware('can:hapus surat');
                Route::get('/contoh-surat-kduda/view', [SkdudaController::class, 'contoh'])->middleware('can:lihat contoh surat');
                // Pernyataan Belum Menikah
                Route::get('/surat-pbm', [SpbmController::class, 'index'])->middleware('can:list surat');
                Route::post('/surat-spbm', [SpbmController::class, 'store'])->middleware('can:input surat');
                Route::get('/surat-pbm/{id}/view', [SpbmController::class, 'show'])->middleware('can:lihat surat');
                Route::put('/surat-pbm/{id}', [SpbmController::class, 'update'])->middleware('can:edit surat');
                Route::delete('/surat-pbm/{id}/{status}', [SpbmController::class, 'destroy'])->middleware('can:hapus surat');
                Route::get('/contoh-surat-pbm/view', [SpbmController::class, 'contoh'])->middleware('can:lihat contoh surat');
                // Keterangan Belum Menikah
                Route::get('/surat-kbm', [SkbmController::class, 'index'])->middleware('can:list surat');
                Route::post('/surat-kbm', [SkbmController::class, 'store'])->middleware('can:input surat');
                Route::get('/surat-kbm/{id}/view', [SkbmController::class, 'show'])->middleware('can:lihat surat');
                Route::put('/surat-kbm/{id}', [SkbmController::class, 'update'])->middleware('can:edit surat');
                Route::delete('/surat-kbm/{id}/{status}', [SkbmController::class, 'destroy'])->middleware('can:hapus surat');
                Route::get('/contoh-surat-kbm/view', [SkbmController::class, 'contoh'])->middleware('can:lihat contoh surat');
                // Pengantar Nikah
                Route::get('/surat-pn', [SpnController::class, 'index'])->middleware('can:list surat');
                Route::post('/surat-pn', [SpnController::class, 'store'])->middleware('can:input surat');
                Route::get('/surat-pn/{id}/view', [SpnController::class, 'show'])->middleware('can:lihat surat');
                Route::put('/surat-pn/{id}', [SpnController::class, 'update'])->middleware('can:edit surat');
                Route::delete('/surat-pn/{id}/{status}', [SpnController::class, 'destroy'])->middleware('can:hapus surat');
                Route::get('/contoh-surat-pn/view', [SpnController::class, 'contoh'])->middleware('can:lihat contoh surat');
                // Surat Pengantar SKCK
                Route::get('/surat-pskck', [SpskckController::class, 'index'])->middleware('can:list surat');
                Route::post('/surat-pskck', [SpskckController::class, 'store'])->middleware('can:input surat');
                Route::get('/surat-pskck/{id}/view', [SpskckController::class, 'show'])->middleware('can:lihat surat');
                Route::put('/surat-pskck/{id}', [SpskckController::class, 'update'])->middleware('can:edit surat');
                Route::delete('/surat-pskck/{id}/{status}', [SpskckController::class, 'destroy'])->middleware('can:hapus surat');
                Route::get('/contoh-surat-pskck/view', [SpskckController::class, 'contoh'])->middleware('can:lihat contoh surat');
                // Surat Pengantar E-KTP
                Route::get('/surat-pektp', [SpektpController::class, 'index'])->middleware('can:list surat');
                Route::post('/surat-pektp', [SpektpController::class, 'store'])->middleware('can:input surat');
                Route::put('/surat-pektp/{id}/edit', [SpektpController::class, 'update'])->middleware('can:edit surat');
                Route::get('/surat-pektp/{id}/view', [SpektpController::class, 'show'])->middleware('can:lihat surat');
                Route::delete('/surat-pektp/{id}/{status}', [SpektpController::class, 'destroy'])->middleware('can:hapus surat');
                Route::get('/contoh-surat-pektp/view', [SpektpController::class, 'contoh'])->middleware('can:lihat contoh surat');
                // Surat Keterangan Kematian
                Route::get('/surat-kkematian', [SkkematianController::class, 'index'])->middleware('can:list surat');
                Route::post('/surat-kkematian', [SkkematianController::class, 'store'])->middleware('can:input surat');
                Route::put('/surat-kkematian/{id}/edit', [SkkematianController::class, 'update'])->middleware('can:edit surat');
                Route::delete('/surat-kkematian/{id}/{status}', [SkkematianController::class, 'destroy'])->middleware('can:hapus surat');
                Route::get('/surat-kkematian/{id}/view', [SkkematianController::class, 'show'])->middleware('can:lihat surat');
                Route::get('/contoh-surat-kkematian/view', [SkkematianController::class, 'contoh'])->middleware('can:lihat contoh surat');
                // Surat keterangan Domisili
                Route::get('/surat-kdomisili', [SkdController::class, 'index'])->middleware('can:list surat');
                Route::post('/surat-kdomisili', [SkdController::class, 'store'])->middleware('can:input surat');
                Route::put('/surat-kdomisili/{id}', [SkdController::class, 'update'])->middleware('can:edit surat');
                Route::delete('/surat-kdomisili/{id}/{status}', [SkdController::class, 'destroy'])->middleware('can:hapus surat');
                Route::get('/surat-kdomisili/{id}/view', [SkdController::class, 'show'])->middleware('can:lihat surat');
                Route::get('/contoh-surat-kdomisili/view', [SkdController::class, 'contoh'])->middleware('can:lihat contoh surat');
                // Surat keterangan Kelahiran
                Route::get('/surat-kkelahiran', [SklController::class, 'index'])->middleware('can:list surat');
                Route::post('/surat-kkelahiran', [SklController::class, 'store'])->middleware('can:input surat');
                Route::put('/surat-kkelahiran/{id}', [SklController::class, 'update'])->middleware('can:edit surat');
                Route::delete('/surat-kkelahiran/{id}/{status}', [SklController::class, 'destroy'])->middleware('can:hapus surat');
                Route::get('/surat-kkelahiran/{id}/view', [SklController::class, 'show'])->middleware('can:lihat surat');
                Route::get('/contoh-surat-kkelahiran/view', [SklController::class, 'contoh'])->middleware('can:lihat contoh surat');
                // Surat Keterangan Tidak Bekerja
                Route::get('/surat-ktbekerja', [SktbekerjaController::class, 'index'])->middleware('can:list surat');
                Route::post('/surat-ktbekerja', [SktbekerjaController::class, 'store'])->middleware('can:input surat');
                Route::put('/surat-ktbekerja/{id}/edit', [SktbekerjaController::class, 'update'])->middleware('can:edit surat');
                Route::delete('/surat-ktbekerja/{id}/{status}', [SktbekerjaController::class, 'destroy'])->middleware('can:hapus surat');
                Route::get('/surat-ktbekerja/{id}/view', [SktbekerjaController::class, 'show'])->middleware('can:lihat surat');
                Route::get('/contoh-surat-ktbekerja/view', [SktbekerjaController::class, 'contoh'])->middleware('can:lihat contoh surat');
                // Surat Pengantar Kependudukan
                Route::get('/surat-pk', [SpkController::class, 'index'])->middleware('can:list surat');
                Route::post('/surat-pk', [SpkController::class, 'store'])->middleware('can:input surat');
                Route::put('/surat-pk/{id}/edit', [SpkController::class, 'update'])->middleware('can:edit surat');
                Route::get('/surat-pk/{id}/view', [SpkController::class, 'show'])->middleware('can:lihat surat');
                Route::delete('/surat-pk/{id}/{status}', [SpkController::class, 'destroy'])->middleware('can:hapus surat');
                Route::get('/contoh-surat-pk/view', [SpkController::class, 'contoh'])->middleware('can:lihat contoh surat');
                // Surat Pernyataan Belum Bekerja
                Route::get('/surat-belum-bekerja', [SpbbekerjaController::class, 'index'])->middleware('can:list surat');
                Route::post('/surat-belum-bekerja', [SpbbekerjaController::class, 'store'])->middleware('can:input surat');
                Route::put('/surat-belum-bekerja/{id}', [SpbbekerjaController::class, 'update'])->middleware('can:edit surat');
                Route::delete('/surat-belum-bekerja/{id}/{status}', [SpbbekerjaController::class, 'destroy'])->middleware('can:hapus surat');
                Route::get('/surat-belum-bekerja/{id}/view', [SpbbekerjaController::class, 'show'])->middleware('can:lihat surat');
                Route::get('/contoh-surat-belum-bekerja/view', [SpbbekerjaController::class, 'contoh'])->middleware('can:lihat contoh surat');
                // Surat Keterangan Penghasilan
                Route::get('/surat-ket-hasil', [SkpenghasilanController::class, 'index'])->middleware('can:list surat');
                Route::post('/surat-ket-hasil', [SkpenghasilanController::class, 'store'])->middleware('can:input surat');
                Route::put('/surat-ket-hasil/{id}', [SkpenghasilanController::class, 'update'])->middleware('can:edit surat');
                Route::delete('/surat-ket-hasil/{id}/{status}', [SkpenghasilanController::class, 'destroy'])->middleware('can:hapus surat');
                Route::get('/surat-ket-hasil/{id}/view', [SkpenghasilanController::class, 'show'])->middleware('can:lihat surat');
                Route::get('/contoh-surat-ket-hasil/view', [SkpenghasilanController::class, 'contoh'])->middleware('can:lihat contoh surat');
                // Surat Custom
                Route::get('/surat-cstm', [ScstmController::class, 'index']);
                Route::post('/surat-scstm', [ScstmController::class, 'store']);
                Route::put('/surat-cstm/{id}', [ScstmController::class, 'update']);
                Route::get('/surat-cstm/{id}/view', [ScstmController::class, 'show']);
                Route::get('/contoh-surat-cstm/view', [ScstmController::class, 'contoh']);
            });

            // Surat Masuk
            Route::get('/surat-masuk', [SMasukController::class, 'index'])->middleware('can:Surat Masuk');
            Route::post('/surat-masuk', [SMasukController::class, 'store'])->middleware('can:Surat Masuk');
            Route::put('/surat-masuk/{id}', [SMasukController::class, 'update'])->middleware('can:Surat Masuk');
            Route::get('/surat-masuk/{id}/view', [SMasukController::class, 'show'])->middleware('can:Surat Masuk');
            Route::get('/surat-masuk/{id}/document', [SMasukController::class, 'document'])->middleware('can:Surat Masuk');
            Route::delete('/surat-masuk/{id}/delete', [SMasukController::class, 'destroy'])->middleware('can:Surat Masuk');
        });
        //untuk tim sistem informasi
        Route::prefix('sistem-informasi')->middleware('can:Menejemen Sistem Informasi')->group(function () {
            Route::controller(AdminController::class)->group(function () {
                Route::get('/dashboard', 'index')->name('bo.sid.dashboard');
            });
            //running text
            Route::controller(KomponenController::class)->group(function () {
                Route::get('/komponen', 'index');
                Route::put('/edit-text/{id}', 'update');
            });
            //Poster Pamong
            //iki njupuk sko user ae pie??
            Route::controller(PamongController::class)->group(function () {
                Route::get('/pamong', 'index');
                Route::get('/hapus-pamong/{id}', 'destroy');
                Route::post('/tambah-pamong', 'create');
                Route::put('/edit-pamong/{id}', 'update');
            });
            //Galeri
            Route::controller(GaleriController::class)->group(function () {
                Route::get('/galeri', 'index');
                Route::get('/hapus-galeri/{id}', 'destroy');
                Route::post('/tambah-galeri', 'create');
                Route::put('/edit-galeri/{id}', 'update');
            });
            //menu
            Route::controller(MenuController::class)->group(function () {
                Route::get('/menu', 'index');
                Route::post('/menu', 'store');
                Route::put('/menu/{id}', 'update');
                Route::get('/deletemenu/{id}', 'destroy');
            });
            //header
            Route::controller(HeaderController::class)->group(function () {
                Route::get('/header', 'index');
                Route::post('/header', 'create');
                Route::post('/subheader', 'createsub');
                Route::put('/header/{id}', 'update');
                Route::put('/subheader/{id}', 'updatesub');
                Route::get('/deleteheader/{id}', 'hapus');
                Route::get('/deletesubheader/{id}', 'destroysub');
                Route::get('/checkSubheaders/{id}', 'checkSubheaders');
            });
            //Bagan
            Route::controller(BaganController::class)->group(function () {
                Route::get('/bagan', 'index');
                //Tambah
                Route::post('/tambah-agenda', 'createagenda');
                Route::post('/tambah-jadwal', 'createjadwal');
                Route::post('/tambah-sinergi', 'createsinergi');
                Route::post('/tambah-statistik', 'createstatistik');
                //Edit
                Route::put('/edit-agenda/{id}', 'updateagenda');
                Route::put('/edit-jadwal/{id}', 'updatejadwal');
                Route::put('/edit-sinergi/{id}', 'updatesinergi');
                Route::put('/edit-statistik/{id}', 'updatestatistik');
                //Hapus
                Route::get('/hapus-jadwal/{id}', 'destroyjadwal');
                Route::get('/hapus-agenda/{id}', 'destroyagenda');
                Route::get('/hapus-sinergi/{id}', 'destroysinergi');
                Route::get('/hapus-statistiki/{id}', 'destroystatistik');
            });
            //APBDes
            //iki crud e pie pak
            Route::controller(ApbdesController::class)->group(function () {
                Route::get('/apbdes', 'index');
                //Tambah
                Route::post('/tambah-apbdes', 'create');

                //Edit
                Route::put('/edit-apbdes-pelaksanaan/{id}', 'updatepelaksanaan');
                Route::put('/edit-apbdes-pendapatan/{id}', 'updatependapatan');
                Route::put('/edit-apbdes-pembelanjaan/{id}', 'updatepembelanjaan');

                //Hapus
                Route::get('/hapus-apbdes/{id}', 'destroy');
            });
            //Agenda GOR
            Route::controller(AgendaGORController::class)->group(function () {
                Route::get('/agendagor', 'index');
                //Tambah
                Route::post('/tambah-agendagor', 'create');

                //Edit
                Route::put('/edit-agendagor/{id}', 'edit');

                //Hapus
                Route::get('/hapus-agendagor/{id}', 'destroy');
            });
            //Agenda Balai
            Route::controller(AgendaBalaiController::class)->group(function () {
                //Tambah
                Route::post('/tambah-agendabalai', 'create');

                //Edit
                Route::put('/edit-agendabalai/{id}', 'edit');

                //Hapus
                Route::get('/hapus-agendabalai/{id}', 'destroy');
            });
            //berita dan artikel
            Route::controller(BeritaController::class)->group(function () {
                //berita
                Route::get('/berita', 'index')->middleware('can:list surat');
                Route::get('/berita/komentar', 'indexkomentar');
                Route::post('/berita', 'store');
                Route::put('/berita/{id}', 'update');
                Route::get('/showberita/{id}', 'show');
                Route::get('/deleteberita/{id}', 'destroy');
                Route::put('/update-status/{id}', 'updateStatus');
                Route::put('/update-sideberita/{id}', 'updateSideBerita');

                //Artikel
                Route::get('/artikel', 'artikel');
                Route::get('/artikel/komentar', 'komentarartikel');
                Route::post('/artikel', 'tambah_artikel');
                Route::get('/showartikel/{id}', 'show_artikel');
                Route::put('/updateartikel/{id}', 'update_artikel');
                Route::get('/deleteartikel/{id}', 'destroy_artikel');
            });
        });
    });
});

// Get data penduduk
Route::get('/get-penduduk/{nik}', [PendudukController::class, 'info']);
// Crud data penduduk
Route::get('/penduduk', [PendudukController::class, 'index']);
Route::get('/data-penduduk', [PendudukController::class, 'datasaktif'])->name('bo.penduduk.data.aktif');
Route::get('/penduduk-migrasi', [PendudukController::class, 'migrasi']);
Route::get('/data-penduduk-migrasi', [PendudukController::class, 'datasnonaktif'])->name('bo.penduduk.data.migrasi');
Route::get('/penduduk/tambah-data', [PendudukController::class, 'create'])->defaults('action', 'Tambah');
Route::post('/penduduk', [PendudukController::class, 'store']);
Route::get('/penduduk/{id}/edit', [PendudukController::class, 'edit'])->defaults('action', 'Edit');
Route::put('/penduduk/{id}', [PendudukController::class, 'update']);
Route::delete('/penduduk/{id}/delete', [PendudukController::class, 'destroy']);
Route::delete('/penduduk-migrasi/{id}/delete', [PendudukController::class, 'destroymigrasi']);
// Import / Export Penduduk
Route::get('/penduduk-export', [PendudukController::class, 'pendudukexport']);
Route::post('/penduduk-import', [PendudukController::class, 'pendudukimport']);


// Mandiri
Route::get('/profile-penduduk', [MandiriController::class, 'index']);
Route::get('/buat-surat', [MandiriController::class, 'surat']);
Route::get('/buat-pesan', [MandiriController::class, 'pesan']);
Route::get('/bantuan', [MandiriController::class, 'bantuan']);

Route::get('/profile', function () {
    return view('bo.page.profile', [
        'dropdown1' => '',
        'dropdown2' => '',
        'title' => 'Profile',
    ]);
});
Route::get('/register', function () {
    return view('page.register', [
        'dropdown1' => '',
        'dropdown2' => '',
        'title' => 'Register',
    ]);
});
