<?php

namespace App\Http\Controllers\bo\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;

class LoginController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('bo.page.login.login');
    }

    public function absen()
    {
        return view('bo.page.login.loginabsen');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            //mengecek verifikasi email
            if (auth()->user()->email_verified_at == null) {
                Auth::logout();
                return redirect()->route('login')->with('error', config('error', 'mohon verifikasi email terlebih dahulu'));
            }
            //mengecek aktivasi user
            if (auth()->user()->is_active == '0') {
                Auth::logout();
                return redirect()->route('login')->with('error', config('error', 'Akun anda sedang dinonaktifkan oleh admin'));
            }
            //jika user telah dihapus
            if (auth()->user()->is_delete == '1') {
                Auth::logout();
                return redirect()->route('login')->with('error', config('error', 'nama pengguna atau password tidak sesuai'));
            }
            //proses login
            $request->session()->regenerate();
            return redirect()->route('bo.home')->with('success', 'Halo selamat datang ' . auth()->user()->username);
        }

        return back()->with('error', config('error', 'nama pengguna atau password tidak sesuai'));
    }
    public function loginmandiri(Request $request){
        $credentials = $request->validate([
            'nik' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['nik' => $request->nik, 'password' => $request->password])) {
            //mengecek verifikasi email
            if (auth()->user()->email_verified_at == null) {
                Auth::logout();
                return redirect()->route('login')->with('error', config('error', 'mohon verifikasi email terlebih dahulu'));
            }
            //mengecek aktivasi user
            if (auth()->user()->is_active == '0') {
                Auth::logout();
                return redirect()->route('login')->with('error', config('error', 'Akun anda sedang dinonaktifkan oleh admin'));
            }
            //jika user telah dihapus
            if (auth()->user()->is_delete == '1') {
                Auth::logout();
                return redirect()->route('login')->with('error', config('error', 'nama pengguna atau password tidak sesuai'));
            }
            //proses login
            $request->session()->regenerate();
            return redirect()->route('bo.home')->with('success', 'Halo selamat datang ' . auth()->user()->username);
        }

        return back()->with('error', config('error', 'nama pengguna atau password tidak sesuai'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    public function loginabsen(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            //mengecek verifikasi email
            if (auth()->user()->email_verified_at == null) {
                Auth::logout();
                return redirect()->route('loginabsen')->with('error', config('error', 'mohon verifikasi email terlebih dahulu'));
            }
            //mengecek aktivasi user
            if (auth()->user()->is_active == '0') {
                Auth::logout();
                return redirect()->route('loginabsen')->with('error', config('error', 'Akun anda sedang dinonaktifkan oleh admin'));
            }
            //jika user telah dihapus
            if (auth()->user()->is_delete == '1') {
                Auth::logout();
                return redirect()->route('loginabsen')->with('error', config('error', 'nama pengguna atau password tidak sesuai'));
            }
            //Jika user bukan pamong
            if (auth()->user()->is_pamong == '0') {
                Auth::logout();
                return redirect()->route('loginabsen')->with('error', config('error', 'anda tidak terdaftar sebagai perangkat desa'));
            }
            //proses login
            $request->session()->regenerate();
            return redirect()->route('bo.presensi')->with('success', 'Halo selamat datang ' . auth()->user()->username);
        }

        return back()->with('error', config('error', 'nama pengguna atau password tidak sesuai'));
    }
}
