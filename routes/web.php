<?php

<<<<<<< HEAD
use App\Http\Controllers\SktmController;
use App\Http\Controllers\SbmController;
use App\Http\Controllers\SktmDuaController;
use App\Http\Controllers\SktmSatuController;
use App\Http\Controllers\SpbmController;
use App\Http\Controllers\PektpController;
use App\Http\Controllers\PengantarskckController;

=======
use App\Http\Controllers\SbmController;
use App\Http\Controllers\SpbmController;
use App\Http\Controllers\PektpController;
use App\Http\Controllers\SktmController;
>>>>>>> adi
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

<<<<<<< HEAD
<<<<<<< HEAD
=======
// Surat Keterengan Belum Menikah
>>>>>>> adi
=======
// SKTM Satu Orang
Route::get('/surat-ktm', [SktmSatuController::class, 'index']);
Route::post('/surat-ktm-satu', [SktmSatuController::class, 'store']);
Route::put('/surat-ktm-satu/{id}', [SktmSatuController::class, 'update']);
Route::get('/surat-ktm-satu/{id}/view', [SktmSatuController::class, 'show']);
// SKTM Dua Orang
Route::post('/surat-ktm-dua', [SktmDuaController::class, 'store']);
Route::put('/surat-ktm-dua/{id}', [SktmDuaController::class, 'update']);
Route::get('/surat-ktm-dua/{id}/view', [SktmDuaController::class, 'show']);
// Pernyataan Belum Menikah
Route::get('/surat-pbm', [SpbmController::class, 'index']);
Route::post('/surat-spbm', [SpbmController::class, 'store']);
Route::get('/surat-pbm/{id}/view', [SpbmController::class, 'show']);
Route::put('/surat-pbm/{id}/edit', [SpbmController::class, 'update']);
// Keterangan Belum Menikah
>>>>>>> rizki
Route::get('/surat-kbm', [SbmController::class, 'index']);
Route::post('/surat-kbm', [SbmController::class, 'store']);
Route::get('/surat-kbm/{id}/view', [SbmController::class, 'show_skbm']);
Route::put('/surat-kbm/{id}/edit', [SbmController::class, 'update_skbm']);
<<<<<<< HEAD

// Surat Pernyataan Belum Menikah
Route::get('/surat-pbm', [SpbmController::class, 'index']);
<<<<<<< HEAD
Route::get('/p-ektp', [PektpController::class, 'index']);
Route::post('/surat-pektp', [PektpController::class, 'store_pektp']);
Route::put('/surat-pektp{id}', [PektpController::class, 'update_pektp']);
Route::get('/surat-pektp/{id}/view', [SktmController::class, 'show_pektp']);

=======
>>>>>>> adi
Route::post('/surat-spbm', [SpbmController::class, 'store']);
Route::get('/surat-pbm/{id}/view', [SpbmController::class, 'show_spbm']);
Route::put('/surat-pbm/{id}/edit', [SpbmController::class, 'update_spbm']);

<<<<<<< HEAD
=======
// Pengantar E-KTP
Route::get('/p-ektp', [PektpController::class, 'index']);
Route::post('/surat-pektp', [PektpController::class, 'store_pektp']);
Route::put('/surat-pektp{id}', [PektpController::class, 'update_pektp']);
Route::get('/surat-pektp/{id}/view', [PektpController::class, 'show_pektp']);
// Pengantar SKCK
>>>>>>> rizki
Route::get('/surat-pskck', [PengantarskckController::class, 'index']);
Route::post('/surat-pskck', [PengantarskckController::class, 'store_pskck']);
Route::get('/surat-pskck/{id}/view', [PengantarskckController::class, 'show_pskck']);
Route::put('/surat-pskck/{id}', [PengantarskckController::class, 'update']);
=======
// Surat Pengantar SKCK
Route::get('/p-ektp', [PektpController::class, 'index']);
Route::post('/surat-pektp', [PektpController::class, 'store_pektp']);
Route::put('/surat-pektp{id}/edit', [PektpController::class, 'update_pektp']);
Route::get('/surat-pektp/{id}/view', [SktmController::class, 'show_pektp']);
>>>>>>> adi
