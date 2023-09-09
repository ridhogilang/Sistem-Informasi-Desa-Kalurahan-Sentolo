<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pengantarskck;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;
// use Illuminate\Http\Client\Request;
use Illuminate\Http\Request;


class PengantarskckController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }
    public function index()
    {
        $pskck= Pengantarskck::all();
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
        $TemplateNoSurat = "000/KBM/{$bulanRomawi}/" . date('Y');

        return view('page.pengantar_skck', [
            'dropdown1' => 'Surat',
            'dropdown2' => 'Kemasyarakatan',
            'title' => 'PengantarSKCK',
            'TemplateNoSurat' => $TemplateNoSurat
        ])->with('pskck',$pskck);
    }

    
    public function store_pskck(Request $request)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                'unique:pskck,nomor_surat', // Pastikan nomor surat unik di tabel 
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
            // 'jenis_skck' => 'required',
            'status_surat' => 'required',
        ]);
        $record['jenis_skck'] = '1';
        $nomor = str_replace("/", "-", $record['nomor_surat']);
        $record['id'] = 'SPKCK-1-'.$nomor;
        // Menggunakan metode create untuk membuat dan menyimpan data
        Pengantarskck::create($record);

        return redirect()->back()->with('toast_success', 'Data Terkirim!');
    }
    public function show_pskck($id)
    {
        $pskck = Pengantarskck::findOrFail($id);
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('template.surat-pengantarskck-satu', compact('pskck'))->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengantarskck $pengantarskck)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request);
        $record=$request->validate( [
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

        ]);
        Pengantarskck::where('id')->update($record);
        return redirect()->back()->with('toast_sukses','data diubah!');
    }
    public function destroy(Pengantarskck $pengantarskck)
    {
        //
    }
}
