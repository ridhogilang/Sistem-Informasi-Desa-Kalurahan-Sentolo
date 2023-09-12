<?php

use App\Http\Controllers\SktmSatuController;
use App\Http\Controllers\SktmDuaController;
use App\Http\Controllers\SkbmController;
use App\Http\Controllers\SpbmController;
use App\Http\Controllers\SpektpController;
use App\Http\Controllers\SpskckController;

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
// Surat Pengantar SKCK
Route::get('/surat-pskck', [SpskckController::class, 'index']);
Route::post('/surat-pskck', [SpskckController::class, 'store']);
Route::get('/surat-pskck/{id}/view', [SpskckController::class, 'show']);
Route::put('/surat-pskck/{id}', [SpskckController::class, 'update']);
Route::get('/contoh-surat-pskck/view', [SpskckController::class, 'contoh']);
// Surat Pengantar E-KTP
Route::get('/surat-pektp', [SpektpController::class, 'index']);
Route::post('/surat-pektp', [SpektpController::class, 'store']);
Route::put('/surat-pektp{id}/edit', [SpektpController::class, 'update']);
Route::get('/surat-pektp/{id}/view', [SpektpController::class, 'show']);
Route::get('/contoh-surat-pektp/view', [SpektpController::class, 'contoh']);
