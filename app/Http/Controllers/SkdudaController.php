<?php

namespace App\Http\Controllers;

use App\Models\Skduda;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SkdudaController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }
    public function index()
    {
        $skduda = Skduda::all();
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
        $TemplateNoSurat = "000/KET/PEM/{$bulanRomawi}/" . date('Y');

        return view('page.surat-kduda', [
            'dropdown1' => 'Surat Keluar',
            'dropdown2' => 'Pemerintahan',
            'title' => 'Surat Keterangan Duda / Janda',
            'TemplateNoSurat' => $TemplateNoSurat
        ])->with('skduda', $skduda);
    }
    public function store(Request $request)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                'unique:skduda,nomor_surat', // Pastikan nomor surat unik di tabel sktm_satu
            ],
            'nama' => 'required',
            'nik' => 'required|min:16',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'jenis_skduda' => 'required',
            'status_surat' => 'required',
        ], [
            'unique' => 'Nomor Surat sudah digunakan.',
            'min' => 'Masukkan 16 Digit NIK.',
        ]);
        $nomor = str_replace("/", "-", $record['nomor_surat']);
        $record['id'] = 'SK-DJ-'.$nomor;
        // Menggunakan metode create untuk membuat dan menyimpan data
        Skduda::create($record);
        return redirect()->back()->with('toast_success', 'Data Terkirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $skduda = Skduda::findOrFail($id);
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('template.surat-kduda', compact('skduda'))->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }
    public function contoh() {
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('template.contoh-surat-kduda')->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }
    public function update(Request $request,$id)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                Rule::unique('skduda', 'nomor_surat')->ignore($id), // Pastikan nomor surat unik di tabel skduda, kecuali untuk catatan dengan ID yang sama
            ],
            'nama' => 'required',
            'nik' => 'required|min:16',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'jenis_skduda' => 'required',
            'status_surat' => 'required',
        ], [
            'min' => 'Masukkan 16 Digit NIK.',
            'unique' => 'Nomor Surat sudah digunakan.',
        ]);

        Skduda::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Data Diubah!');
    }
}
