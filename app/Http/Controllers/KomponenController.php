<?php

namespace App\Http\Controllers;

use App\Models\Runningtext;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class KomponenController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }

    public function index()
    {
        $text = Runningtext::all();

        return view('admin.komponen', [
            "title" => "Komponen Halaman Utama",
            "dropdown1" => "Komponen Website",
            "text" => $text,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'textrunning' => 'required',
        ]);

        $text = Runningtext::find($id);
        $text->textrunning = $request->input('textrunning');

        // Simpan perubahan
        $text->save();

        return redirect()->back()->with('toast_success', 'Berita Berhasil di!');
    }

    public function create(Request $request)
    {
    }

}
