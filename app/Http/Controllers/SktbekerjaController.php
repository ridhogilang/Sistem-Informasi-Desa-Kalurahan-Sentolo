<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Sktbekerja;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;

class SktbekerjaController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }
    public function index()
    {
        $Sktbekerja= Sktbekerja::all();
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
        $TemplateNoSurat = "000/KET/TB/{$bulanRomawi}/" . date('Y');

        return view('page.surat-ktbekerja', [
            'dropdown1' => 'Surat Keluar',
            'dropdown2' => 'Pemerintahan',
            'title' => 'Surat Keterangan Tidak Bekerja',
            'TemplateNoSurat' => $TemplateNoSurat
        ])->with('ktbekerja',$Sktbekerja);
    }


    public function store(Request $request)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                'unique:ktbekerja,nomor_surat', // Pastikan nomor surat unik di tabel
            ],
            'nama' => 'required',
            'nik' => 'required|min:16',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'warga_negara' => 'required',
            'alamat' => 'required',
            'jenis_ktbekerja' => 'required',
            'status_surat' => 'required',
        ], [
            'unique' => 'Nomor Surat sudah digunakan.',
            'min' => 'Masukkan 16 Digit NIK.',
        ]);
        $nomor = str_replace("/", "-", $record['nomor_surat']);
        $record['id'] = 'SKTB-'.$nomor;
        // Menggunakan metode create untuk membuat dan menyimpan data
        Sktbekerja::create($record);

        return redirect()->back()->with('toast_success', 'Data Terkirim!');
    }
    public function show($id)
    {
        $ktbekerja = Sktbekerja::findOrFail($id);
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('template.surat-ktbekerja', compact('ktbekerja'))->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }

    public function contoh() {
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('template.contoh-surat-ktbekerja')->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sktbekerja $sktbekerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                Rule::unique('ktbekerja', 'nomor_surat')->ignore($id), // Pastikan nomor surat unik di tabel pskck, kecuali untuk catatan dengan ID yang sama
            ],
            'nama' => 'required',
            'nik' => 'required|min:16',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'warga_negara' => 'required',
            'alamat' => 'required',
            'jenis_ktbekerja' => 'required',
            'status_surat' => 'required',
        ], [
            'min' => 'Masukkan 16 Digit NIK.',
            'unique' => 'Nomor Surat sudah digunakan.',
        ]);
        Sktbekerja::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Data Diubah!');
        // Spskck::where('id')->update($record);
        // return redirect()->back()->with('toast_sukses','data diubah!');
    }
    public function destroy(Sktbekerja $sktbekerja)
    {
        //
    }
}
