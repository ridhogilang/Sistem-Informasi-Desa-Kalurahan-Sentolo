<?php

namespace App\Http\Controllers\bo\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class LoginController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('bo.page.login.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            //mengecek verifikasi email
            $user = User::where('email', $credentials['email'])->first();
            if($user->email_verified_at == null){
                Auth::logout();
                return redirect()->route('login')->with('error', config('error','mohon verifikasi email terlebih dahulu')); 
            }
            //mengecek aktivasi user
            if($user->is_active == '0'){
                Auth::logout();
                return redirect()->route('login')->with('error', config('error','Akun anda sedang dinonaktifkan oleh admin'));
            }
            //jika user telah dihapus
            if($user->is_delete == '1'){
                Auth::logout();
                return redirect()->route('login')->with('error', config('error','nama pengguna atau password tidak sesuai'));
            }
            //proses login
            $request->session()->regenerate();
            return redirect()->route('bo.home')->with('success', 'Halo selamat datang '.auth()->user()->username);
        }
        
        return back()->with('error', config('error','nama pengguna atau password tidak sesuai'));
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

}
