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

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('bo.home')->with('success', 'Halo selamat datang '.auth()->user()->username);
        }
        
        return back()->with('error', config('error','nama pengguna atau password tidak sesuai'));
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('admin/login');
    }

}
