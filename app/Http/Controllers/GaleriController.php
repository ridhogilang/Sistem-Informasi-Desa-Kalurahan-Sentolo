<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::all();

        return view('admin.galeri', [
            "title" => "Gambar Galeri",
            "dropdown1" => "Komponen Website"
        ], compact('galeri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'galeri' => 'required',
            'gambar' => 'required|image|mimes:png,jpg,jpeg', // Mengizinkan format PNG, JPG, dan JPEG
        ], [
            'gambar.mimes' => 'Gambar hanya boleh dalam format PNG, JPG, atau JPEG.',
        ]);
        
        // Upload dan simpan file gambar
        $gambar = $request->file('gambar');
        $gambarPath = $gambar->store('gambar-galeri'); // Ganti 'folder-tujuan' dengan direktori penyimpanan yang sesuai

        $validateData['gambar'] = $gambarPath;
        dd($validateData);
        Galeri::create($validateData);

        return redirect()->back()->with('toast_success', 'Gambar Galeri Berhasil Di tambahkan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'galeri' => 'required',
            'gambar' => 'image|mimes:png,jpg,jpeg', // Mengizinkan format PNG, JPG, dan JPEG
        ], [
            'gambar.mimes' => 'Gambar hanya boleh dalam format PNG, JPG, atau JPEG.',
        ]);

        $galeri = Galeri::find($id);

        if (!$galeri) {
            return redirect()->back()->with('toast_error', 'Data galeri tidak ditemukan.');
        }
    
        // Periksa apakah ada pembaruan pada gambar
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if (Storage::exists($galeri->gambar)) {
                Storage::delete($galeri->gambar);
            }
    
            // Upload gambar baru
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('gambar-galeri');
    
            // Update kolom 'gambar' dengan path gambar baru
            $galeri->gambar = $gambarPath;
        } else {
            // Jika tidak ada pembaruan pada gambar, gunakan gambar yang sudah ada
            $galeri->gambar = $request->input('gambar_existing');
        }

        $galeri->nama = $request->input('nama');
        $galeri->galeri = $request->input('galeri');
        $galeri->save();

        return redirect()->back()->with('toast_success', 'Data Galeri Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $galeri = Galeri::find($id);

        if (!$galeri) {
            return redirect()->back()->with('toast_success', 'Data Menu Tidak Ditemukan!');
        }

        // Hapus gambar terlebih dahulu jika ada
        if (Storage::exists($galeri->gambar)) {
            Storage::delete($galeri->gambar);
        }

        // Hapus data dari database
        $galeri->delete();

        return redirect()->back()->with('toast_success', 'Data Galeri Berhasil dihapus!');
    }
}
