<?php

namespace App\Http\Controllers\bo\Sid;

use App\Http\Controllers\Controller;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class KomentarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input utama (berita_id, komentar, nama, email, nohp)
        $validatedData = $request->validate([
            'berita_id' => 'required',
            'kategoriberita_id' => 'required',
            'komentar' => 'required|min:5',
            'nama' => 'required',
            'email' => 'required|email',
            'nohp' => 'required',
        ], [
            'required' => 'Lengkapi Data!',
        ]);

        // Ambil num1, num2, dan jawaban CAPTCHA dari input
        $num1 = intval($request->input('num1'));
        $num2 = intval($request->input('num2'));
        $captchaAnswer = intval($request->input('captcha'));

        // Periksa apakah jawaban CAPTCHA benar
        if ($captchaAnswer === ($num1 + $num2)) {
            // Jawaban CAPTCHA benar, lanjutkan dengan penyimpanan data
            Komentar::create($validatedData);

            return redirect()->back()->with('toast_success', 'Komentar Berhasil ditambahkan!');
        } else {
            // Jawaban CAPTCHA salah, tampilkan pesan kesalahan
            return redirect()->back()->with('toast_error', 'Jawaban CAPTCHA salah');
        }
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
    public function approveComment(Request $request, $id)
    {
        $comment = Komentar::findOrFail($id);

        // Set status ke true
        $comment->status = true;
        $comment->save();

        return response()->json(['message' => 'Status komentar berhasil diubah']);
    }
    
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Komentar::find($id);

        if (!$data) {
            return redirect()->back()->with('toast_success', 'Data Komentar Tidak Ditemukan!');
        }

        $data->delete();
        return redirect()->back()->with('toast_success', 'Data Komentar Berhasil dihapus!');
    }
}
