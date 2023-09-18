<?php

namespace App\Http\Controllers\bo\Surat\keluar;

use App\Http\Controllers\Controller;
use App\Models\Skkematian;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Spektp;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;

class SkkematianController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:surat Keterangan Kematian');
        Carbon::setLocale('id');
    }
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
     // Gabungkan hasil dari kedua query menjadi satu array
    $kkematian = Skkematian::all();
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

    return view('bo.page.surat.keluar.surat-kkematian', [
        'dropdown1' => 'Surat Keluar',
        'dropdown2' => 'Pemerintahan',
        'title' => 'Surat Keterangan Kematian',
        'TemplateNoSurat' => $TemplateNoSurat
    ])->with('kkematian', $kkematian);
    }


    public function store(Request $request)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                'unique:kkematian,nomor_surat', // Pastikan nomor surat unik di tabel sktm_satu
            ],
            'nama' => 'required',
            'nik' => 'required|min:16',
            'jenis_kelamin' => 'required',
            'umur' => 'required',
            'pekerjaan' => 'required',
            'agama' => 'required',
            'kewarganegaraan' => 'required',
            'status_perkawinan' => 'required',
            'deskripsi' => 'required',
            'jenis_kkematian' => 'required',
            'status_surat' => 'required',
        ], [
            'unique' => 'Nomor Surat sudah digunakan.',
            'min' => 'Masukkan 16 Digit NIK.',
        ]);
        // $nomor = str_replace("/", "-", $record['nomor_surat']);
        $record['id'] = 'SKK-'. date('YmdHis') . '-' . rand(100, 999);
        // Menggunakan metode create untuk membuat dan menyimpan data
        Skkematian::create($record);

        return redirect()->back()->with('toast_success', 'Data Terkirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kkematian = Skkematian::findOrFail($id);
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('bo.template.surat-kkematian', compact('kkematian'))->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }
    public function contoh() {
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('bo.template.contoh-surat-kkematian')->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                Rule::unique('kkematian', 'nomor_surat')->ignore($id), // Pastikan nomor surat unik di tabel pektp, kecuali untuk catatan dengan ID yang sama
            ],
            'nama' => 'required',
            'nik' => 'required|min:16',
            'jenis_kelamin' => 'required',
            'umur' => 'required',
            'pekerjaan' => 'required',
            'agama' => 'required',
            'kewarganegaraan' => 'required',
            'status_perkawinan' => 'required',
            'deskripsi' => 'required',
            'jenis_kkematian' => 'required',
            'status_surat' => 'required',
        ], [
            'unique' => 'Nomor Surat sudah digunakan.',
            'min' => 'Masukkan 16 Digit NIK.',
        ]);

        Skkematian::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Data Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skkematian $kkematian)
    {
        //
    }
}
