<?php

namespace App\Http\Controllers;

use App\Models\Skl;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class SklController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');   
    }
    public function index()
    {

        $skl = Skl::all();
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

        return view('page.surat-ket-kelahiran', [
            'dropdown1' => 'Surat Keluar',
            'dropdown2' => 'Pemerintahan',
            'title' => 'Surat Keterangan Lahir',
            'TemplateNoSurat' => $TemplateNoSurat,
        ])->with('skl', $skl);
    }
    public function store(Request $request)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                'unique:skl,nomor_surat', // Pastikan nomor surat unik di tabel sktm_satu
            ],
            'nama' => 'required',
            'status_hubungan' => 'required', 
            'kalurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'anak_ke' => 'required',
            'agama' => 'required',
            'nama_ayah' => 'required',
            'nik_ayah' => 'required|min:16',
            'tempat_lahir_ayah' => 'required',
            'tanggal_lahir_ayah' => 'required',
            'agama_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'alamat_ayah' => 'required',
            'nama_ibu' => 'required',
            'nik_ibu' => 'required|min:16',
            'tempat_lahir_ibu' => 'required',
            'tanggal_lahir_ibu' => 'required',
            'agama_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'alamat_ibu' => 'required',
        ], [
            'min' => 'Masukkan 16 Digit NIK.',
            'unique' => 'Nomor Surat sudah digunakan.',
        ]);
        $nomor = str_replace("/", "-", $record['nomor_surat']);
        $record['id'] = 'SKL-'.$nomor;
        // $record['status_hubungan'] = 'Anak kandung';
        $record['jenis_surat'] = 'Keterangan Kelahiran';
        $record['status_surat'] = 'Kelahiran';



        // Menggunakan metode create untuk membuat dan menyimpan data
        Skl::create($record);

        return redirect()->back()->with('toast_success', 'Data Terkirim!');
    }
        /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // dd($id);
        $skl = Skl::findOrFail($id);
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('template.surat-kkelahiran', compact('skl'))->render();
        // Membuat instance DomPDFphp
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }
    public function contoh() {
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('template.contoh-surat-kkelahiran')->render();
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
                Rule::unique('skl','nomor_surat')->ignore($id),
                // Pastikan nomor surat unik di tabel skduda, kecuali untuk catatan dengan ID yang sama
            ],
            'nama' => 'required',
            // 'status_hubungan' => 'required', 
            'kalurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'anak_ke' => 'required',
            'agama' => 'required',
            'nama_ayah' => 'required',
            'nik_ayah' => 'required|min:16',
            'tempat_lahir_ayah' => 'required',
            'tanggal_lahir_ayah' => 'required',
            'agama_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'alamat_ayah' => 'required',
            'nama_ibu' => 'required',
            'nik_ibu' => 'required|min:16',
            'tempat_lahir_ibu' => 'required',
            'tanggal_lahir_ibu' => 'required',
            'agama_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'alamat_ibu' => 'required',
        ], [
            'min' => 'Masukkan 16 Digit NIK.',
            'unique' => 'Nomor Surat sudah digunakan.',
        ]);
        
        Skl::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Data Diubah!');
     
    }
    
}

