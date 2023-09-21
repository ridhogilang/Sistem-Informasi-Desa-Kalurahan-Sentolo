<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\SMasuk;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class SMasukController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }
    public function index()
    {
        $smasuk= SMasuk::all();
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

        return view('bo.page.surat.keluar.surat-masuk', [
            'dropdown1' => 'Surat Masuk',
            'dropdown2' => '',
            'title' => 'Surat Masuk',
            'TemplateNoSurat' => $TemplateNoSurat
        ])->with('smasuk',$smasuk);
    }
    public function store(Request $request)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                'unique:s_masuk,nomor_surat', // Pastikan nomor surat unik di tabel
            ],
            'tanggal_surat' => 'required',
            'kepada' => 'required',
            'keperluan' => 'required',
            'tanggal_kegiatan' => 'required',
            'catatan' => 'required',
            'lampiran' => 'required',
            'dokumen' => [
                'required',
                'mimes:doc,docx,pdf,xls,xlsx,ppt,pptx',
            ],
            // 'disposisi' => 'required',
            'jenis_surat' => 'required',
        ], [
            'unique' => 'Nomor Surat sudah digunakan.',
            'mimes' => 'File tidak valid.',
        ]);

        // Generate nama unik untuk file dokumen
        $namaDokumen = 'SM-' . time() . '.' . $request->file('dokumen')->getClientOriginalExtension();
        $request->file('dokumen')->move(public_path('dokumen'), $namaDokumen);
        $record['dokumen'] = $namaDokumen;

        // $nomor = str_replace("/", "-", $record['nomor_surat']);
        $record['id'] = 'SM-'. date('YmdHis') . '-' . rand(100, 999);
        // Menggunakan metode create untuk membuat dan menyimpan data
        SMasuk::create($record);
        return redirect()->back()->with('toast_success', 'Data Disimpan!');
    }
    public function document($id)
    {
        // Temukan data surat masuk berdasarkan ID
        $smasuk = SMasuk::find($id);
        if (!$smasuk) {
            // Handle jika data tidak ditemukan
            abort(404);
        }
        // Tentukan nama file dan jalur lengkapnya
        $filePath = public_path('dokumen/' . $smasuk->dokumen);

        if (file_exists($filePath)) {
            // Tampilkan file jika ada
            return response()->file($filePath);
        } else {
            // Handle jika file tidak ditemukan
            abort(404);
        }
    }
    public function update(Request $request, $id)
    {
        $smasuk = SMasuk::find($id);
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                Rule::unique('s_masuk', 'nomor_surat')->ignore($id),
            ],
            'tanggal_surat' => 'required',
            'kepada' => 'required',
            'keperluan' => 'required',
            'tanggal_kegiatan' => 'required',
            'catatan' => 'required',
            'lampiran' => 'required',
            'dokumen' => 'mimes:doc,docx,pdf,xls,xlsx,ppt,pptx',
            // 'disposisi' => 'required',
            'jenis_surat' => 'required',
        ], [
            'unique' => 'Nomor Surat sudah digunakan.',
            'mimes' => 'File tidak valid.',
        ]);

        if ($request->hasFile('dokumen')) {
            // Hapus file dokumen lama jika ada
            File::delete(public_path('dokumen/' . $smasuk->dokumen));

            // Generate nama unik untuk file dokumen baru
            $namaDokumen = 'SM-' . time() . '.' . $request->file('dokumen')->getClientOriginalExtension();
            $request->file('dokumen')->move(public_path('dokumen'), $namaDokumen);
            $record['dokumen'] = $namaDokumen;
        }

        SMasuk::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Data Diubah!');
    }
    public function destroy($id)
    {
        // Temukan data Surat Masuk berdasarkan ID
        $smasuk = SMasuk::find($id);
        if ($smasuk->dokumen) {
            File::delete(public_path('dokumen/' . $smasuk->dokumen));
        }
        $smasuk->delete();
        return redirect()->back()->with('toast_success', 'Data dihapus!');
    }
}
