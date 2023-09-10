<?php

namespace App\Http\Controllers;

use App\Models\Sbm;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSbmRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SbmController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }
    public function index()
    {

        $skbm = Sbm::all();
        $tanggalSekarang = date('d');
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
        $TemplateNoSurat = "000/SBM/{$bulanRomawi}/" . date('Y');

        return view('page.surat-kbm', [
            'dropdown1' => 'Surat',
            'dropdown2' => 'Kemasyarakatan',
            'title' => 'Surat Keterangan Belum Menikah',
            'TemplateNoSurat' => $TemplateNoSurat
        ])->with('skbm', $skbm);
    }


    public function store(Request $request)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                'unique:skbm,nomor_surat', // Pastikan nomor surat unik di tabel sktm_satu
            ],
            'nama' => 'required',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'jenis_skbm' => 'required',
            'status_surat' => 'required',
        ]);
        $nomor = str_replace("/", "-", $record['nomor_surat']);
        $record['id'] = 'KMS'.$nomor;
        // Menggunakan metode create untuk membuat dan menyimpan data
        Sbm::create($record);

        return redirect()->back()->with('toast_success', 'Data Terkirim!');
    
    }
    /**
     * Display the specified resource.
     */
    public function show_skbm($id)
    {
        $skbm = Sbm::findOrFail($id);
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('template.surat-kbm', compact('skbm'))->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update_skbm(Request $request, $id)
    {
        
        $record = $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'jenis_skbm' => 'required',
            'status_surat' => 'required',
        ]);
        
        Sbm::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Data Diubah!');
    }


    public function destroy(Sbm $sbm)
    {
        //
    }
}
