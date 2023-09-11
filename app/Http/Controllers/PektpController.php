<?php

namespace App\Http\Controllers;

use App\Models\Pektp;
use App\Http\Requests\StorePektpRequest;
use App\Http\Requests\UpdatePektpRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PektpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     // Gabungkan hasil dari kedua query menjadi satu array
    $pektp = Pektp::all();
    $bulanSekarang = date('n');
    $angkaRomawi = [
        1 => 'I',
        2 => 'II',
        3 => 'III',
        4 => 'IV',
        5 => 'V',
        6 => 'VI',
        7 => 'VII',
        8 => 'VIII',
        9 => 'IX',
        10 => 'X',
        11 => 'XI',
        12 => 'XII',
    ];
    $bulanRomawi = $angkaRomawi[$bulanSekarang];
    $TemplateNoSurat = "000/KMS/{$bulanRomawi}/" . date('Y');

    return view('page.surat-pektp', [
        'dropdown1' => 'Surat Keluar',
        'dropdown2' => 'Kemasyarakatan',
        'title' => 'Surat Pengantar E-KTP',
        'TemplateNoSurat' => $TemplateNoSurat
    ])->with('pektp', $pektp);
    }


    public function store(Request $request)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                'unique:pektp,nomor_surat', // Pastikan nomor surat unik di tabel sktm_satu
            ],
            'nama' => 'required',
            'nik' => 'required|min:16',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'jenis_pektp' => 'required',
            'status_surat' => 'required',
        ], [
            'unique' => 'Nomor Surat sudah digunakan.',
            'min' => 'Masukkan 16 Digit NIK.',
        ]);
        $nomor = str_replace("/", "-", $record['nomor_surat']);
        $record['id'] = 'PEKTP-'.$nomor;
        // Menggunakan metode create untuk membuat dan menyimpan data
        Pektp::create($record);

        return redirect()->back()->with('toast_success', 'Data Terkirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pektp = Pektp::findOrFail($id);
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('template.surat-pektp', compact('pektp'))->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }
    public function contoh() {
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('template.contoh-surat-pektp')->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                Rule::unique('pektp', 'nomor_surat')->ignore($id), // Pastikan nomor surat unik di tabel pektp, kecuali untuk catatan dengan ID yang sama
            ],
            'nama' => 'required',
            'nik' => 'required|min:16',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'jenis_pektp' => 'required',
            'status_surat' => 'required',
        ], [
            'unique' => 'Nomor Surat sudah digunakan.',
            'min' => 'Masukkan 16 Digit NIK.',
        ]);

        Pektp::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Data Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pektp $pektp)
    {
        //
    }
}
