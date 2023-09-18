<?php

namespace App\Http\Controllers\bo\Surat;

use App\Models\Skd;
use App\Http\Requests\StoreSkdRequest;
use App\Http\Requests\UpdateSkdRequest;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SkdController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:surat keterangan Domisili');
        Carbon::setLocale('id');
    }
    public function index()
    {

        $skd = Skd::all();
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

        return view('bo.page.surat.surat-kdom', [
            'dropdown1' => 'Surat Keluar',
            'dropdown2' => 'Pemerintahan',
            'title' => 'Surat Keterangan Domisili',
            'TemplateNoSurat' => $TemplateNoSurat
        ])->with('skd', $skd);
    }
    public function store(Request $request)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                'unique:skd,nomor_surat', // Pastikan nomor surat unik di tabel sktm_satu
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
            'deskripsi' => 'required',
            'jenis_surat' => 'required',
            'status_surat' => 'required',
        ], [
            'min' => 'Masukkan 16 Digit NIK.',
            'unique' => 'Nomor Surat sudah digunakan.',
        ]);
        $nomor = str_replace("/", "-", $record['nomor_surat']);
        $record['id'] = 'SKD-'.$nomor;
        // Menggunakan metode create untuk membuat dan menyimpan data
        Skd::create($record);

        return redirect()->back()->with('toast_success', 'Data Terkirim!');
    }
        /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $skd = Skd::findOrFail($id);
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('bo.template.surat-kdomisili', compact('skd'))->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }
    public function contoh() {
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('bo.template.contoh-surat-kdomisili')->render();
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
                Rule::unique('skd', 'nomor_surat')->ignore($id), // Pastikan nomor surat unik di tabel skduda, kecuali untuk catatan dengan ID yang sama
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
            'deskripsi' => 'required',
            'jenis_surat' => 'required',
            'status_surat' => 'required',
        ], [
            'min' => 'Masukkan 16 Digit NIK.',
            'unique' => 'Nomor Surat sudah digunakan.',
        ]);
        Skd::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Data Diubah!');
     
    }
    
}
