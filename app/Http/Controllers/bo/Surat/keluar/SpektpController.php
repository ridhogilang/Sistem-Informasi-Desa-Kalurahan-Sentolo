<?php

namespace App\Http\Controllers\bo\Surat\keluar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Spektp;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;

class SpektpController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:surat Pengantar E-KTP');
        Carbon::setLocale('id');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     // Gabungkan hasil dari kedua query menjadi satu array
    $pektp = Spektp::all();
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

    return view('bo.page.surat.keluar.surat-pektp', [
        'dropdown1' => 'Surat Keluar',
        'dropdown2' => 'Kemasyarakatan',
        'title' => 'Surat Pengantar E-KTP',
        'TemplateNoSurat' => $TemplateNoSurat
    ])->with('pektp', $pektp);
    }


    public function store(Request $request)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                'unique:pektp,nomor_surat', // Pastikan nomor surat unik di tabel sktm_satu
            ],
            'nama' => 'required',
            'nik' => 'required|min:16',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'jenis_pektp' => 'required',
            'status_surat' => 'required',
        ], [
            'unique' => 'Nomor Surat sudah digunakan.',
            'min' => 'Masukkan 16 Digit NIK.',
        ]);
        // $nomor = str_replace("/", "-", $record['nomor_surat']);
        $record['id'] = 'SP-EKTP-'. date('YmdHis') . '-' . rand(100, 999);
        // Menggunakan metode create untuk membuat dan menyimpan data
        Spektp::create($record);

        return redirect()->back()->with('toast_success', 'Data Terkirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pektp = Spektp::findOrFail($id);
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('bo.template.surat-pektp', compact('pektp'))->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }
    public function contoh() {
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('bo.template.contoh-surat-pektp')->render();
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
                Rule::unique('pektp', 'nomor_surat')->ignore($id), // Pastikan nomor surat unik di tabel pektp, kecuali untuk catatan dengan ID yang sama
            ],
            'nama' => 'required',
            'nik' => 'required|min:16',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'jenis_pektp' => 'required',
            'status_surat' => 'required',
        ], [
            'unique' => 'Nomor Surat sudah digunakan.',
            'min' => 'Masukkan 16 Digit NIK.',
        ]);

        Spektp::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Data Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spektp $pektp)
    {
        //
    }
}