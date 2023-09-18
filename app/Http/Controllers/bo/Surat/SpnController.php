<?php

namespace App\Http\Controllers\bo\Surat;

use Carbon\Carbon;
use App\Models\Spn;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreSpnRequest;
use App\Http\Requests\UpdateSpnRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class SpnController extends Controller
{
    public function __construct() 
    {
        $this->middleware('permission:surat Pengantar Nikah');
        Carbon::setLocale('id');
    }
    public function index()
    {
        $spn = Spn::all();
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

        return view('bo.page.surat.surat-pn', [
            'dropdown1' => 'Surat Keluar',
            'dropdown2' => 'Kemasyarakatan',
            'title' => 'Surat Pernyataan Nikah',
            'TemplateNoSurat' => $TemplateNoSurat
        ])->with('spn', $spn);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                'unique:spbm,nomor_surat', // Pastikan nomor surat unik di tabel sktm_satu
            ],
            'deskripsi1' => 'required',
            'nama' => 'required',
            'nik' => 'required|min:16',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            // Ayah
            'namaayah' => 'required',
            'nikayah' => 'required|min:16',
            'tempat_lahirayah' => 'required',
            'tanggal_lahirayah' => 'required',
            'jenis_kelaminayah' => 'required',
            'agamaayah' => 'required',
            'pekerjaanayah' => 'required',
            'alamatayah' => 'required',
            // Ibu
            'namaibu' => 'required',
            'nikibu' => 'required|min:16',
            'tempat_lahiribu' => 'required',
            'tanggal_lahiribu' => 'required',
            'jenis_kelaminibu' => 'required',
            'agamaibu' => 'required',
            'pekerjaanibu' => 'required',
            'alamatibu' => 'required',
            'deskripsi2' => 'required',
            'jenis_spn' => 'required',
            'status_surat' => 'required',
        ], [
            'unique' => 'Nomor Surat sudah digunakan.',
            'min' => 'Masukkan 16 Digit NIK.',
        ]);
        $nomor = str_replace("/", "-", $record['nomor_surat']);
        $record['id'] = 'SPN-'.$nomor;
        // Menggunakan metode create untuk membuat dan menyimpan data
        Spn::create($record);
        return redirect()->back()->with('toast_success', 'Data Terkirim!');
    }

  
    public function show($id)
    {
        $spn = Spn::findOrFail($id);
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('bo.template.surat-pn', compact('spn'))->render();
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
                Rule::unique('spn', 'nomor_surat')->ignore($id),// Pastikan nomor surat unik di tabel spbm, kecuali untuk catatan dengan ID yang sama
            ],
            'deskripsi1' => 'required',
            'nama' => 'required',
            'nik' => 'required|min:16',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            // Ayah
            'namaayah' => 'required',
            'nikayah' => 'required|min:16',
            'tempat_lahirayah' => 'required',
            'tanggal_lahirayah' => 'required',
            'jenis_kelaminayah' => 'required',
            'agamaayah' => 'required',
            'pekerjaanayah' => 'required',
            'alamatayah' => 'required',
            // Ibu
            'namaibu' => 'required',
            'nikibu' => 'required|min:16',
            'tempat_lahiribu' => 'required',
            'tanggal_lahiribu' => 'required',
            'jenis_kelaminibu' => 'required',
            'agamaibu' => 'required',
            'pekerjaanibu' => 'required',
            'alamatibu' => 'required',
            'deskripsi2' => 'required',
            'jenis_spn' => 'required',
            'status_surat' => 'required',
        ], [
            'min' => 'Masukkan 16 Digit NIK.',
            'unique' => 'Nomor Surat sudah digunakan.',
        ]);

        Spn::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Data Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spn $spn)
    {
        //
    }
}
