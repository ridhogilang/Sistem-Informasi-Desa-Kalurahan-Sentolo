<?php

namespace App\Http\Controllers;

use App\Models\SktmDua;
use App\Models\SktmSatu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Barryvdh\DomPDF\Facade\Pdf;

class SktmController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }
    public function index()
    {
        $sktmSatu = SktmSatu::orderBy('created_at')->get();
        $sktmDua = SktmDua::orderBy('created_at')->get();

        // Gabungkan hasil dari kedua query menjadi satu array
        $sktm = $sktmSatu->concat($sktmDua)->sortBy('created_at');

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

        return view('page.surat-ktm', [
            'dropdown1' => 'Surat',
            'dropdown2' => 'Kemasyarakatan',
            'title' => 'Surat Keterangan Tidak Mampu',
            'TemplateNoSurat' => $TemplateNoSurat
        ])->with('sktm', $sktm);
    }
    public function store_sktm_satu(Request $request)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                'unique:sktm_satu,nomor_surat', // Pastikan nomor surat unik di tabel sktm_satu
                Rule::unique('sktm_dua', 'nomor_surat'), // Pastikan nomor surat unik di tabel sktm_dua
            ],
            'nama' => 'required',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'jenis_sktm' => 'required',
            'status_surat' => 'required',
        ]);
        $nomor = str_replace("/", "-", $record['nomor_surat']);
        $record['id'] = 'SKTM-1-'.$nomor;
        // Menggunakan metode create untuk membuat dan menyimpan data
        SktmSatu::create($record);

        return redirect()->back()->with('toast_success', 'Data Terkirim!');
    }
    public function store_sktm_dua(Request $request)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                'unique:sktm_dua,nomor_surat', // Pastikan nomor surat unik di tabel sktm_dua
                Rule::unique('sktm_satu', 'nomor_surat'), // Pastikan nomor surat unik di tabel sktm_satu
            ],
            'nama' => 'required',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'hubungan' => 'required',
            'nama_dua' => 'required',
            'nik_dua' => 'required',
            'tempat_lahir_dua' => 'required',
            'tanggal_lahir_dua' => 'required',
            'agama_dua' => 'required',
            'pekerjaan_dua' => 'required',
            'alamat_dua' => 'required',
            'deskripsi' => 'required',
            'jenis_sktm' => 'required',
            'status_surat' => 'required',
        ]);

        $nomor = str_replace("/", "-", $record['nomor_surat']);
        $record['id'] = 'SKTM-2-'.$nomor;
        // Menggunakan metode create untuk membuat dan menyimpan data
        SktmDua::create($record);

        return redirect()->back()->with('toast_success', 'Data Terkirim!');
    }
    public function update_sktm_satu(Request $request, $id)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                function ($attribute, $value, $fail) use ($id) {
                    // Menggunakan closure untuk memeriksa keunikan nomor_surat
                    $existingRecordSktmSatu = SktmSatu::where('id', '!=', $id)->where('nomor_surat', $value)->first();
                    $existingRecordSktmDua = SktmDua::where('nomor_surat', $value)->first();

                    if ($existingRecordSktmSatu || $existingRecordSktmDua) {
                        $fail("Nomor Surat sudah digunakan.");
                    }
                },
            ],
            'nama' => 'required',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'jenis_sktm' => 'required',
            'status_surat' => 'required',
        ]);

        SktmSatu::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Data Diubah!');
    }
    public function update_sktm_dua(Request $request, $id)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                function ($attribute, $value, $fail) use ($id) {
                    // Menggunakan closure untuk memeriksa keunikan nomor_surat
                    $existingRecordSktmSatu = SktmSatu::where('nomor_surat', $value)->first();
                    $existingRecordSktmDua = SktmDua::where('id', '!=', $id)->where('nomor_surat', $value)->first();

                    if ($existingRecordSktmSatu || $existingRecordSktmDua) {
                        $fail("Nomor Surat sudah digunakan.");
                    }
                },
            ],
            'nama' => 'required',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'hubungan' => 'required',
            'nama_dua' => 'required',
            'nik_dua' => 'required',
            'tempat_lahir_dua' => 'required',
            'tanggal_lahir_dua' => 'required',
            'agama_dua' => 'required',
            'pekerjaan_dua' => 'required',
            'alamat_dua' => 'required',
            'deskripsi' => 'required',
            'jenis_sktm' => 'required',
            'status_surat' => 'required',
        ]);

        SktmDua::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Data Diubah!');
    }
    public function show_sktm_satu($id) {
        $sktm = SktmSatu::findOrFail($id);
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('template.surat-ktm-satu', compact('sktm'))->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }
    public function show_sktm_dua($id) {
        $sktm = SktmDua::findOrFail($id);
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('template.surat-ktm-dua', compact('sktm'))->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }
}
