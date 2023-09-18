<?php

use App\Http\Controllers\PermisiionController;
use App\Http\Controllers\bo\Auth\LoginController;
use App\Http\Controllers\bo\Pegawai\UserManagementController;
use App\Http\Controllers\bo\Pegawai\roleManagementController;
use App\Http\Controllers\bo\Surat\SktmSatuController;
use App\Http\Controllers\bo\Surat\SktmDuaController;
use App\Http\Controllers\bo\Surat\SkbmController;
use App\Http\Controllers\bo\Surat\SkkematianController;
use App\Http\Controllers\bo\Surat\SpbmController;
use App\Http\Controllers\bo\Surat\SpektpController;
use App\Http\Controllers\bo\Surat\SpskckController;
use App\Http\Controllers\bo\Surat\SpnController;
use App\Http\Controllers\bo\Surat\SpkController;
use App\Http\Controllers\bo\Surat\SktbekerjaController;
use App\Http\Controllers\bo\Surat\SkdudaController;
use App\Http\Controllers\bo\Surat\SkdController;
use App\Http\Controllers\bo\Surat\SklController;
use App\Http\Controllers\bo\Surat\SkpenghasilanController;
use App\Http\Controllers\bo\Surat\SpbbekerjaController;



use Illuminate\Support\Facades\Route;

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


Route::prefix('admin')->group(function () {
    //untuk login
    Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
    Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
    //logout
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['web', 'auth']], function () {
        //dashboard
        Route::get('/', function () {
            return view('bo.page.dashboard',[
                'dropdown1' => '',
                'dropdown2' => '',
                'title' => 'Dashboard',
            ]);
        })->name('bo.home');
    
        //untuk kepegawaian yaitu kebutuhan user dan role tak dewekno marakno riskan
        Route::prefix('pegawai')->middleware('can:enter_kepegawaian')->group(function () {
            Route::get('/dashboard', function () {
                return view('bo.page.dashboard',[
                    'dropdown1' => '',
                    'dropdown2' => '',
                    'title' => 'Dashboard',
                ]);
            })->name('bo.pegawai.dashboard');

                Route::resource('/user_management', UserManagementController::class, ['as' => 'bo.pegawai'])->except(['show']);
                Route::resource('/role_management', roleManagementController::class, ['as' => 'bo.pegawai'])->except(['show']);
         });

        //untuk tim PU dan Arsip (e-surat)
        Route::prefix('e-surat')->middleware('can:enter_e-surat')->group(function () {
            Route::get('/dashboard', function () {
                return view('bo.page.dashboard',[
                    'dropdown1' => '',
                    'dropdown2' => '',
                    'title' => 'Dashboard',
                ]);
            })->name('bo.e-surat.dashboard');
            // SKTM Satu Orang
            Route::get('/surat-ktm', [SktmSatuController::class, 'index'])->middleware('can:list surat');
            Route::post('/surat-ktm-satu', [SktmSatuController::class, 'store'])->middleware('can:input surat');
            Route::put('/surat-ktm-satu/{id}', [SktmSatuController::class, 'update'])->middleware('can:edit surat');
            Route::get('/surat-ktm-satu/{id}/view', [SktmSatuController::class, 'show'])->middleware('can:lihat surat');
            Route::get('/contoh-surat-ktm-satu/view', [SktmSatuController::class, 'contoh'])->middleware('can:lihat contoh surat');
            // SKTM Dua Orang
            Route::post('/surat-ktm-dua', [SktmDuaController::class, 'store'])->middleware('can:input surat');
            Route::put('/surat-ktm-dua/{id}', [SktmDuaController::class, 'update'])->middleware('can:edit surat');
            Route::get('/surat-ktm-dua/{id}/view', [SktmDuaController::class, 'show'])->middleware('can:lihat surat');
            Route::get('/contoh-surat-ktm-dua/view', [SktmDuaController::class, 'contoh'])->middleware('can:lihat contoh surat');
            // SK Duda / Janda
            Route::get('/surat-kduda', [SkdudaController::class, 'index'])->middleware('can:list surat');
            Route::post('/surat-kduda', [SkdudaController::class, 'store'])->middleware('can:input surat');
            Route::get('/surat-kduda/{id}/view', [SkdudaController::class, 'show'])->middleware('can:lihat surat');
            Route::put('/surat-kduda/{id}', [SkdudaController::class, 'update'])->middleware('can:edit surat');
            Route::get('/contoh-surat-kduda/view', [SkdudaController::class, 'contoh'])->middleware('can:lihat contoh surat');
            // Pernyataan Belum Menikah
            Route::get('/surat-pbm', [SpbmController::class, 'index'])->middleware('can:list surat');
            Route::post('/surat-spbm', [SpbmController::class, 'store'])->middleware('can:input surat');
            Route::get('/surat-pbm/{id}/view', [SpbmController::class, 'show'])->middleware('can:lihat surat');
            Route::put('/surat-pbm/{id}', [SpbmController::class, 'update'])->middleware('can:edit surat');
            Route::get('/contoh-surat-pbm/view', [SpbmController::class, 'contoh'])->middleware('can:lihat contoh surat');
            // Keterangan Belum Menikah
            Route::get('/surat-kbm', [SkbmController::class, 'index'])->middleware('can:list surat');
            Route::post('/surat-kbm', [SkbmController::class, 'store'])->middleware('can:input surat');
            Route::get('/surat-kbm/{id}/view', [SkbmController::class, 'show'])->middleware('can:lihat surat');
            Route::put('/surat-kbm/{id}', [SkbmController::class, 'update'])->middleware('can:edit surat');
            Route::get('/contoh-surat-kbm/view', [SkbmController::class, 'contoh'])->middleware('can:lihat contoh surat');
            // Pengantar Nikah
            Route::get('/surat-pn', [SpnController::class, 'index'])->middleware('can:list surat');
            Route::post('/surat-pn', [SpnController::class, 'store'])->middleware('can:input surat');
            Route::get('/surat-pn/{id}/view', [SpnController::class, 'show'])->middleware('can:lihat surat');
            Route::put('/surat-pn/{id}', [SpnController::class, 'update'])->middleware('can:edit surat');
            Route::get('/contoh-surat-pn/view', [SpnController::class, 'contoh'])->middleware('can:lihat contoh surat');
            // Surat Pengantar SKCK
            Route::get('/surat-pskck', [SpskckController::class, 'index'])->middleware('can:list surat');
            Route::post('/surat-pskck', [SpskckController::class, 'store'])->middleware('can:input surat');
            Route::get('/surat-pskck/{id}/view', [SpskckController::class, 'show'])->middleware('can:lihat surat');
            Route::put('/surat-pskck/{id}', [SpskckController::class, 'update'])->middleware('can:edit surat');
            Route::get('/contoh-surat-pskck/view', [SpskckController::class, 'contoh'])->middleware('can:lihat contoh surat');
            // Surat Pengantar E-KTP
            Route::get('/surat-pektp', [SpektpController::class, 'index'])->middleware('can:list surat');
            Route::post('/surat-pektp', [SpektpController::class, 'store'])->middleware('can:input surat');
            Route::put('/surat-pektp/{id}/edit', [SpektpController::class, 'update'])->middleware('can:edit surat');
            Route::get('/surat-pektp/{id}/view', [SpektpController::class, 'show'])->middleware('can:lihat surat');
            Route::get('/contoh-surat-pektp/view', [SpektpController::class, 'contoh'])->middleware('can:lihat contoh surat');
            // Surat Keterangan Kematian
            Route::get('/surat-kkematian', [SkkematianController::class, 'index'])->middleware('can:list surat');
            Route::post('/surat-kkematian', [SkkematianController::class, 'store'])->middleware('can:input surat');
            Route::put('/surat-kkematian/{id}/edit', [SkkematianController::class, 'update'])->middleware('can:edit surat');
            Route::get('/surat-kkematian/{id}/view', [SkkematianController::class, 'show'])->middleware('can:lihat surat');
            Route::get('/contoh-surat-kkematian/view', [SkkematianController::class, 'contoh'])->middleware('can:lihat contoh surat');
            // Surat keterangan Domisili
            Route::get('/surat-kdomisili', [SkdController::class, 'index'])->middleware('can:list surat');
            Route::post('/surat-kdomisili', [SkdController::class, 'store'])->middleware('can:input surat');
            Route::put('/surat-kdomisili/{id}', [SkdController::class, 'update'])->middleware('can:edit surat');
            Route::get('/surat-kdomisili/{id}/view', [SkdController::class, 'show'])->middleware('can:lihat surat');
            Route::get('/contoh-surat-kdomisili/view', [SkdController::class, 'contoh'])->middleware('can:lihat contoh surat');
            // Surat keterangan Kelahiran
            Route::get('/surat-kkelahiran', [SklController::class, 'index'])->middleware('can:list surat');
            Route::post('/surat-kkelahiran', [SklController::class, 'store'])->middleware('can:input surat');
            Route::put('/surat-kkelahiran/{id}', [SklController::class, 'update'])->middleware('can:edit surat');
            Route::get('/surat-kkelahiran/{id}/view', [SklController::class, 'show'])->middleware('can:lihat surat');
            Route::get('/contoh-surat-kkelahiran/view', [SklController::class, 'contoh'])->middleware('can:lihat contoh surat');
            // Surat Keterangan Tidak Bekerja
            Route::get('/surat-ktbekerja', [SktbekerjaController::class, 'index'])->middleware('can:list surat');
            Route::post('/surat-ktbekerja', [SktbekerjaController::class, 'store'])->middleware('can:input surat');
            Route::put('/surat-ktbekerja/{id}/edit', [SktbekerjaController::class, 'update'])->middleware('can:edit surat');
            Route::get('/surat-ktbekerja/{id}/view', [SktbekerjaController::class, 'show'])->middleware('can:lihat surat');
            Route::get('/contoh-surat-ktbekerja/view', [SktbekerjaController::class, 'contoh'])->middleware('can:lihat contoh surat');
            // Surat Pengantar Kependudukan
            Route::get('/surat-pk', [SpkController::class, 'index'])->middleware('can:list surat');
            Route::post('/surat-pk', [SpkController::class, 'store'])->middleware('can:input surat');
            Route::put('/surat-pk/{id}/edit', [SpkController::class, 'update'])->middleware('can:edit surat');
            Route::get('/surat-pk/{id}/view', [SpkController::class, 'show'])->middleware('can:lihat surat');
            Route::get('/contoh-surat-pk/view', [SpkController::class, 'contoh'])->middleware('can:lihat contoh surat');
            // Surat Pernyataan Belum Bekerja
            Route::get('/surat-belum-bekerja', [SpbbekerjaController::class, 'index'])->middleware('can:list surat');
            Route::post('/surat-belum-bekerja', [SpbbekerjaController::class, 'store'])->middleware('can:input surat');
            Route::put('/surat-belum-bekerja/{id}', [SpbbekerjaController::class, 'update'])->middleware('can:edit surat');
            Route::get('/surat-belum-bekerja/{id}/view', [SpbbekerjaController::class, 'show'])->middleware('can:lihat surat');
            Route::get('/contoh-surat-belum-bekerja/view', [SpbbekerjaController::class, 'contoh'])->middleware('can:lihat contoh surat');
            // Surat Keterangan Penghasilan
            Route::get('/surat-ket-hasil', [SkpenghasilanController::class, 'index'])->middleware('can:list surat');
            Route::post('/surat-ket-hasil', [SkpenghasilanController::class, 'store'])->middleware('can:input surat');
            Route::put('/surat-ket-hasil/{id}', [SkpenghasilanController::class, 'update'])->middleware('can:edit surat');
            Route::get('/surat-ket-hasil/{id}/view', [SkpenghasilanController::class, 'show'])->middleware('can:lihat surat');
            Route::get('/contoh-surat-ket-hasil/view', [SkpenghasilanController::class, 'contoh'])->middleware('can:lihat contoh surat');
        });
        //untuk tim sistem informasi
        Route::prefix('sistem-informasi')->group(function () {
        
        });
    });
});
Route::get('/profile', function () {
    return view('page.profile',[
        'dropdown1' => '',
        'dropdown2' => '',
        'title' => 'Profile',
    ]);
});
Route::get('/register', function () {
    return view('page.register',[
        'dropdown1' => '',
        'dropdown2' => '',
        'title' => 'Register',
    ]);
});