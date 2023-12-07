<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MandiriController extends Controller
{
    public function index()
    {
       $detil_pengguna = User::with('detilakun')->findOrFail(auth()->user()->id);
        return view('bo.page.mandiri.dashboard', [
            'title' => 'Profile Penduduk',
            'detil_pengguna' => $detil_pengguna,
        ]);
    }
    public function ubahpass(Request $request)
    {
        $input = $request->validate([
            'password' => 'required|min:6|same:confirm-password'
        ]);

        $input['password'] = Hash::make($input['password']);
        $user = User::where('id', '=', auth()->user()->id)->update($input);
        return redirect()->route('bo.pegawai.user_management.index')
                        ->with('success','Succes mengganti passowrd');
    }

    public function gantipp(Request $request)
    {
        $validatedData = $request->validate([
            'foto_profil' => 'image|mimes:png,jpg,jpeg', // Mengizinkan format PNG, JPG, dan JPEG
        ]);

        $profil = User::find(auth()->user()->id);

        if ($request->hasFile('foto_profil')) {
            // Hapus file lama sebelum mengunggah yang baru
            Storage::delete('public/gambar-profil/' . basename($profil->foto_profil));

            $file = $request->file('foto_profil');
            $fileName = 'profil-' . date('YmdHis') . '-' . rand(100, 999) . '.' . $file->getClientOriginalExtension();

            // Simpan file baru
            $file->storeAs('public/gambar-profil', $fileName);

            // Update path gambar di database
            $profil->update(['foto_profil' => 'gambar-profil/' . $fileName]);
        }

        return redirect()->back()->with('toast_success', 'Foto Profil Berhasil diubah!');
    }


    public function pesan()
    {
        return view('bo.page.mandiri.buat-pesan', [
            'title' => 'Buat Pesan'
        ]);
    }
    public function bantuan()
    {
        return view('bo.page.mandiri.bantuan', [
            'title' => 'Bantuan Penduduk'
        ]);
    }
}
