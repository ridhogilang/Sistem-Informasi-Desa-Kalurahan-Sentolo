<?php

namespace App\Http\Controllers;

use App\Models\Sbm;
use App\Models\Spbm;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreSpbmRequest;
use App\Http\Requests\UpdateSpbmRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SpbmController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }
    public function index()
    {

        $spbm = Spbm::all();
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
        $TemplateNoSurat = "000/SPBM/{$bulanRomawi}/" . date('Y');

        return view('page.surat-pbm', [
            'dropdown1' => 'Surat',
            'dropdown2' => 'Kemasyarakatan',
            'title' => 'Surat Pernyataan Belum Menikah',
            'TemplateNoSurat' => $TemplateNoSurat
        ])->with('spbm', $spbm);
    }


    public function store(Request $request)
    
    {   
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                'unique:spbm,nomor_surat', // Pastikan nomor surat unik di tabel sktm_satu
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
            'jenis_spbm' => 'required',
            'status_surat' => 'required',
        ]);
        $nomor = str_replace("/", "-", $record['nomor_surat']);
        $record['id'] = 'SPBM'.$nomor;
        // Menggunakan metode create untuk membuat dan menyimpan data
        Spbm::create($record);
        return redirect()->back()->with('toast_success', 'Data Terkirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show_spbm($id)
    {
        $spbm = Spbm::findOrFail($id);
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('template.surat-pbm', compact('spbm'))->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }

   
    public function update_spbm(Request $request,$id)
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
            'jenis_spbm' => 'required',
            'status_surat' => 'required',
        ]);
        
        Spbm::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Data Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spbm $spbm)
    {
        //
    }
}
