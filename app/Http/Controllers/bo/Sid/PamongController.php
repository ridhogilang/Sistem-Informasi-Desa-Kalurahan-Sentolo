<?php

namespace App\Http\Controllers\bo\Sid;

use App\Http\Controllers\Controller;
use App\Models\Pamong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PamongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pamong = Pamong::all();

        return view('bo.page.sid.pamong', [
            "title" => "Poster Pamong",
            "dropdown1" => "Komponen Website",
            "pamong" => $pamong,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'gambar' => 'required|image|mimes:png,jpg,jpeg', // Mengizinkan format PNG, JPG, dan JPEG
        ], [
            'gambar.mimes' => 'Gambar hanya boleh dalam format PNG, JPG, atau JPEG.',
        ]);
        
        // Upload dan simpan file gambar
        $gambar = $request->file('gambar');
        $gambarPath = $gambar->store('public/gambar-pamong'); // Ganti 'folder-tujuan' dengan direktori penyimpanan yang sesuai

        $validateData['gambar'] = $gambarPath;

        Pamong::create($validateData);

        return redirect()->back()->with('toast_success', 'Poster Pamong Berhasil Di tambahkan');
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
            'jabatan' => 'required',
            'gambar' => 'image|mimes:png,jpg,jpeg', // Mengizinkan format PNG, JPG, dan JPEG
        ], [
            'gambar.mimes' => 'Gambar hanya boleh dalam format PNG, JPG, atau JPEG.',
        ]);

        $pamong = Pamong::find($id);

        if (!$pamong) {
            return redirect()->back()->with('toast_error', 'Data Pamong tidak ditemukan.');
        }
    
        // Periksa apakah ada pembaruan pada gambar
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if (Storage::exists($pamong->gambar)) {
                Storage::delete($pamong->gambar);
            }
    
            // Upload gambar baru
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('public/gambar-pamong');
    
            // Update kolom 'gambar' dengan path gambar baru
            $pamong->gambar = $gambarPath;
        } else {
            // Jika tidak ada pembaruan pada gambar, gunakan gambar yang sudah ada
            $pamong->gambar = $request->input('gambar_existing');
        }

        $pamong->nama = $request->input('nama');
        $pamong->jabatan = $request->input('jabatan');
        $pamong->save();

        return redirect()->back()->with('toast_success', 'Data Pamong Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pamong = Pamong::find($id);

        if (!$pamong) {
            return redirect()->back()->with('toast_success', 'Data Menu Tidak Ditemukan!');
        }

        // Hapus gambar terlebih dahulu jika ada
        if (Storage::exists($pamong->gambar)) {
            Storage::delete($pamong->gambar);
        }

        // Hapus data dari database
        $pamong->delete();

        return redirect()->back()->with('toast_success', 'Data Pamong Berhasil dihapus!');
    }
}
