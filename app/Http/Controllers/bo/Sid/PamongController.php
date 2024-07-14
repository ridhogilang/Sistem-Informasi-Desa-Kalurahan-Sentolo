<?php

namespace App\Http\Controllers\bo\Sid;

use App\Http\Controllers\Controller;
use App\Models\Pamong;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PamongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pamong = User::where("is_delete","<>", '1')->where("is_pamong","=", "1")->get();

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
            'foto_resmi' => 'required|image|mimes:png,jpg,jpeg', // Mengizinkan format PNG, JPG, dan JPEG
        ], [
            'foto_resmi.mimes' => 'foto_resmi hanya boleh dalam format PNG, JPG, atau JPEG.',
        ]);
        
        // Upload dan simpan file foto_resmi
        $foto_resmi = $request->file('foto_resmi');
        $foto_resmiPath = $foto_resmi->store('foto_resmi-pamong'); // Ganti 'folder-tujuan' dengan direktori penyimpanan yang sesuai

        $validateData['foto_resmi'] = $foto_resmiPath;

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
            // 'nama' => 'required',
            // 'jabatan' => 'required',
            'foto_resmi' => 'image|mimes:png,jpg,jpeg', // Mengizinkan format PNG, JPG, dan JPEG
        ], [
            'foto_resmi.mimes' => 'foto_resmi hanya boleh dalam format PNG, JPG, atau JPEG.',
        ]);

        $pamong = User::find($id);

        if ($request->hasFile('foto_resmi')) {
            // Hapus file lama sebelum mengunggah yang baru
            Storage::delete('public' . $pamong->foto_resmi);

            $file = $request->file('foto_resmi');
            $fileName = 'Pamong-'. date('YmdHis') . '-' . rand(100, 999) . '.' . $file->getClientOriginalExtension();

            // Simpan file baru
            $file->storeAs('public/gambar-pamong', $fileName);

            // Update path gambar di database
            $pamong->update(['foto_resmi' => '/gambar-pamong/'.$fileName]);
        }

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

        // Hapus foto_resmi terlebih dahulu jika ada
        if (Storage::exists($pamong->foto_resmi)) {
            Storage::delete($pamong->foto_resmi);
        }

        // Hapus data dari database
        $pamong->delete();

        return redirect()->back()->with('toast_success', 'Data Pamong Berhasil dihapus!');
    }
}
