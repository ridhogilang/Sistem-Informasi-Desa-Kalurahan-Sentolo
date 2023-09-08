<?php

<<<<<<< HEAD
use App\Http\Controllers\SbmController;
use App\Http\Controllers\SktmController;
use App\Http\Controllers\SpbmController;
=======
use App\Http\Controllers\PektpController;
use App\Http\Controllers\SktmController;
use App\Models\Pektp;
>>>>>>> yosia
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

Route::get('/surat-ktm', [SktmController::class, 'index']);
Route::post('/surat-ktm-satu', [SktmController::class, 'store_sktm_satu']);
Route::post('/surat-ktm-dua', [SktmController::class, 'store_sktm_dua']);
Route::put('/surat-ktm-satu/{id}', [SktmController::class, 'update_sktm_satu']);
Route::put('/surat-ktm-dua/{id}', [SktmController::class, 'update_sktm_dua']);
Route::get('/surat-ktm-satu/{id}/view', [SktmController::class, 'show_sktm_satu']);
Route::get('/surat-ktm-dua/{id}/view', [SktmController::class, 'show_sktm_dua']);

Route::get('/surat-domisili', function () {
    return view('page.accordion',[
        'dropdown1' => 'Surat',
        'dropdown2' => 'Pemerintahan',
        'title' => 'Surat Keterangan Domisili',
    ]);
});

<<<<<<< HEAD
Route::get('/surat-kbm', [SbmController::class, 'index']);
Route::post('/surat-kbm', [SbmController::class, 'store']);
Route::get('/surat-kbm/{id}/view', [SbmController::class, 'show_skbm']);
Route::put('/surat-kbm/{id}/edit', [SbmController::class, 'update_skbm']);

Route::get('/surat-pbm', [SpbmController::class, 'index']);
=======
Route::get('/p-ektp', [PektpController::class, 'index']);
Route::post('/surat-pektp', [PektpController::class, 'store_pektp']);
Route::put('/surat-pektp{id}', [PektpController::class, 'update_pektp']);
Route::get('/surat-pektp/{id}/view', [SktmController::class, 'show_pektp']);


>>>>>>> yosia
