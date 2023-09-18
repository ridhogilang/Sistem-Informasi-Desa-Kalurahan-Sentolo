<?php

namespace App\Http\Controllers\bo\Surat\keluar;

use Illuminate\Routing\Controller;
use App\Models\SktmDua;
use App\Models\SktmSatu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Barryvdh\DomPDF\Facade\Pdf;

class SktmDuaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:surat KTM');
    }
    public function store(Request $request)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                'unique:sktm_dua,nomor_surat', // Pastikan nomor surat unik di tabel sktm_dua
                Rule::unique('sktm_satu', 'nomor_surat'), // Pastikan nomor surat unik di tabel sktm_satu
            ],
            'nama' => 'required',
            'nik' => 'required|min:16',
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
        ], [
            'unique' => 'Nomor Surat sudah digunakan.',
            'min' => 'Masukkan 16 Digit NIK.',
        ]);

        // $nomor = str_replace("/", "-", $record['nomor_surat']);
        $record['id'] = 'SKTM-2-'. date('YmdHis') . '-' . rand(100, 999);
        // Menggunakan metode create untuk membuat dan menyimpan data
        SktmDua::create($record);

        return redirect()->back()->with('toast_success', 'Data Terkirim!');
    }
    public function update(Request $request, $id)
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
            'nik' => 'required|min:16',
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
        ], [
            'min' => 'Masukkan 16 Digit NIK.',
        ]);

        SktmDua::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Data Diubah!');
    }
    public function show($id) {
        $sktm = SktmDua::findOrFail($id);
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('bo.template.surat-ktm-dua', compact('sktm'))->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }
    public function contoh() {
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('bo.template.contoh-surat-ktm-dua')->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }
}
