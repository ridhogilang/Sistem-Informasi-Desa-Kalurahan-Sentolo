<?php

use App\Http\Controllers\SkdudaController;
use App\Http\Controllers\SktmSatuController;
use App\Http\Controllers\SktmDuaController;
use App\Http\Controllers\SkbmController;
use App\Http\Controllers\SkkematianController;
use App\Http\Controllers\SpbmController;
use App\Http\Controllers\SpektpController;
use App\Http\Controllers\SpskckController;
use App\Http\Controllers\SktbekerjaController;
<<<<<<< HEAD
use App\Http\Controllers\SpnController;
=======
use App\Http\Controllers\SpkController;
>>>>>>> 3cafc65b35fda682275c31fc63b256e19e7e6180
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

Route::get('/', function () {
    return view('page.dashboard',[
        'dropdown1' => '',
        'dropdown2' => '',
        'title' => 'Dashboard',
    ]);
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
Route::get('/login', function () {
    return view('page.login',[
        'dropdown1' => '',
        'dropdown2' => '',
        'title' => 'Login',
    ]);
});

Route::get('/surat-domisili', function () {
    return view('page.accordion',[
        'dropdown1' => 'Surat Keluar',
        'dropdown2' => 'Pemerintahan',
        'title' => 'Surat Keterangan Domisili',
    ]);
});

// SKTM Satu Orang
Route::get('/surat-ktm', [SktmSatuController::class, 'index']);
Route::post('/surat-ktm-satu', [SktmSatuController::class, 'store']);
Route::put('/surat-ktm-satu/{id}', [SktmSatuController::class, 'update']);
Route::get('/surat-ktm-satu/{id}/view', [SktmSatuController::class, 'show']);
Route::get('/contoh-surat-ktm-satu/view', [SktmSatuController::class, 'contoh']);
// SKTM Dua Orang
Route::post('/surat-ktm-dua', [SktmDuaController::class, 'store']);
Route::put('/surat-ktm-dua/{id}', [SktmDuaController::class, 'update']);
Route::get('/surat-ktm-dua/{id}/view', [SktmDuaController::class, 'show']);
Route::get('/contoh-surat-ktm-dua/view', [SktmDuaController::class, 'contoh']);
// SK Duda / Janda
Route::get('/surat-kduda', [SkdudaController::class, 'index']);
Route::post('/surat-kduda', [SkdudaController::class, 'store']);
Route::get('/surat-kduda/{id}/view', [SkdudaController::class, 'show']);
Route::put('/surat-kduda/{id}', [SkdudaController::class, 'update']);
Route::get('/contoh-surat-kduda/view', [SkdudaController::class, 'contoh']);
// Pernyataan Belum Menikah
Route::get('/surat-pbm', [SpbmController::class, 'index']);
Route::post('/surat-spbm', [SpbmController::class, 'store']);
Route::get('/surat-pbm/{id}/view', [SpbmController::class, 'show']);
Route::put('/surat-pbm/{id}', [SpbmController::class, 'update']);
Route::get('/contoh-surat-pbm/view', [SpbmController::class, 'contoh']);
// Keterangan Belum Menikah
Route::get('/surat-kbm', [SkbmController::class, 'index']);
Route::post('/surat-kbm', [SkbmController::class, 'store']);
Route::get('/surat-kbm/{id}/view', [SkbmController::class, 'show']);
Route::put('/surat-kbm/{id}', [SkbmController::class, 'update']);
Route::get('/contoh-surat-kbm/view', [SkbmController::class, 'contoh']);
// Pengantar Nikah
Route::get('/surat-pn', [SpnController::class, 'index']);
Route::post('/surat-pn', [SpnController::class, 'store']);
Route::get('/surat-pn/{id}/view', [SpnController::class, 'show']);
Route::put('/surat-pn/{id}', [SpnController::class, 'update']);
Route::get('/contoh-surat-pn/view', [SpnController::class, 'contoh']);
// Surat Pengantar SKCK
Route::get('/surat-pskck', [SpskckController::class, 'index']);
Route::post('/surat-pskck', [SpskckController::class, 'store']);
Route::get('/surat-pskck/{id}/view', [SpskckController::class, 'show']);
Route::put('/surat-pskck/{id}', [SpskckController::class, 'update']);
Route::get('/contoh-surat-pskck/view', [SpskckController::class, 'contoh']);
// Surat Pengantar E-KTP
Route::get('/surat-pektp', [SpektpController::class, 'index']);
Route::post('/surat-pektp', [SpektpController::class, 'store']);
Route::put('/surat-pektp/{id}/edit', [SpektpController::class, 'update']);
Route::get('/surat-pektp/{id}/view', [SpektpController::class, 'show']);
Route::get('/contoh-surat-pektp/view', [SpektpController::class, 'contoh']);
// Surat Keterangan Kematian
Route::get('/surat-kkematian', [SkkematianController::class, 'index']);
Route::post('/surat-kkematian', [SkkematianController::class, 'store']);
Route::put('/surat-kkematian/{id}/edit', [SkkematianController::class, 'update']);
Route::get('/surat-kkematian/{id}/view', [SkkematianController::class, 'show']);
Route::get('/contoh-surat-kkematian/view', [SkkematianController::class, 'contoh']);
// Surat Keterangan Tidak Bekerja
Route::get('/surat-ktbekerja', [SktbekerjaController::class, 'index']);
Route::post('/surat-ktbekerja', [SktbekerjaController::class, 'store']);
Route::put('/surat-ktbekerja/{id}/edit', [SktbekerjaController::class, 'update']);
Route::get('/surat-ktbekerja/{id}/view', [SktbekerjaController::class, 'show']);
Route::get('/contoh-surat-ktbekerja/view', [SktbekerjaController::class, 'contoh']);
// Surat Pengantar Kependudukan
Route::get('/surat-pk', [SpkController::class, 'index']);
Route::post('/surat-pk', [SpkController::class, 'store']);
Route::put('/surat-pk/{id}/edit', [SpkController::class, 'update']);
Route::get('/surat-pk/{id}/view', [SpkController::class, 'show']);
Route::get('/contoh-surat-pk/view', [SpkController::class, 'contoh']);
