<?php

namespace App\Http\Controllers\bo\Sid;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }

    public function index()
    {
        
        $data = Menu::all();

        return view('bo.page.sid.menu', [
            "title" => "Menu",
            "dropdown1" => "Komponen Website",
            "menu" => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'menu' => 'required',
            'link' => 'required',
            'gambar' => [
                'required',
                'file',
                'mimes:png', // Hanya file PNG yang diizinkan
            ],
            'urutan' => [
                'required',
                'unique:menus,urutan',
            ],
        ], [
            'unique' => 'Nomor Urut Tidak Boleh Sama',
            'mimes' => 'Gambar hanya boleh dalam format PNG.',
        ]);

        // Upload dan simpan file gambar
        $gambar = $request->file('gambar');
        $gambarPath = $gambar->store('public/gambar-menu'); // Ganti 'folder-tujuan' dengan direktori penyimpanan yang sesuai

        $validateData['gambar'] = $gambarPath;

        Menu::create($validateData);

        return redirect()->back()->with('toast_success', 'Menu Berhasil di!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'menu' => 'required',
            'link' => 'required',
            'gambar' => 'mimes:png', // Menggunakan mimes validator untuk format PNG
            'urutan' => [
                'required',
                Rule::unique('menus', 'urutan')->ignore($id),
            ],
        ], [
            'unique' => 'Nomor Urut Tidak Boleh Sama',
            'mimes' => 'Gambar hanya boleh dalam format PNG.',
        ]);

        $menu = Menu::find($id);

        if (!$menu) {
            return redirect()->back()->with('toast_error', 'Data Menu tidak ditemukan.');
        }
    
        // Periksa apakah ada pembaruan pada gambar
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if (Storage::exists($menu->gambar)) {
                Storage::delete($menu->gambar);
            }
    
            // Upload gambar baru
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('gambar-menu');
    
            // Update kolom 'gambar' dengan path gambar baru
            $menu->gambar = $gambarPath;
        } else {
            // Jika tidak ada pembaruan pada gambar, gunakan gambar yang sudah ada
            $menu->gambar = $request->input('gambar_existing');
        }

        $menu->menu = $request->input('menu');
        $menu->link = $request->input('link');
        $menu->urutan = $request->input('urutan');
        $menu->save();

        return redirect()->back()->with('toast_success', 'Data Menu Berhasil diubah!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Menu::find($id);

        if (!$data) {
            return redirect()->back()->with('toast_success', 'Data Menu Tidak Ditemukan!');
        }

        // Hapus gambar terlebih dahulu jika ada
        if (Storage::exists($data->gambar)) {
            Storage::delete($data->gambar);
        }

        // Hapus data dari database
        $data->delete();

        return redirect()->back()->with('toast_success', 'Data Menu Berhasil dihapus!');
    }

}
