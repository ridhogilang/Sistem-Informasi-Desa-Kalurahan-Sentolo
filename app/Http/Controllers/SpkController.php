<?php

namespace App\Http\Controllers;

use App\Models\Spk;
use App\Http\Requests\StoreSpkRequest;
use App\Http\Requests\UpdateSpkRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class SpkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spk= Spk::all();
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
        $TemplateNoSurat = "000/KET/SPK/{$bulanRomawi}/" . date('Y');

        return view('page.surat-pk', [
            'dropdown1' => 'Surat Keluar',
            'dropdown2' => 'Pemerintahan',
            'title' => 'Surat Pengantar Kependudukan',
            'TemplateNoSurat' => $TemplateNoSurat
        ])->with('spk',$spk);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                'unique:spk,nomor_surat', // Pastikan nomor surat unik di tabel
            ],
            'nama' => 'required',
            'nik' => 'required|min:16',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'alamat' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required',
            'jenis_pk' => 'required',
            'status_surat' => 'required',
        ], [
            'unique' => 'Nomor Surat sudah digunakan.',
            'min' => 'Masukkan 16 Digit NIK.',
        ]);
        $nomor = str_replace("/", "-", $record['nomor_surat']);
        $record['id'] = 'SPK-'.$nomor;
        // Menggunakan metode create untuk membuat dan menyimpan data
        Spk::create($record);

        return redirect()->back()->with('toast_success', 'Data Terkirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $spk = Spk::findOrFail($id);
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('template.surat-pk', compact('spk'))->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }

    public function contoh() {
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('template.contoh-surat-pk')->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                Rule::unique('spk', 'nomor_surat')->ignore($id), // Pastikan nomor surat unik di tabel pskck, kecuali untuk catatan dengan ID yang sama
            ],
            'nama' => 'required',
            'nik' => 'required|min:16',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'alamat' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required',
            'jenis_pk' => 'required',
            'status_surat' => 'required',
        ], [
            'min' => 'Masukkan 16 Digit NIK.',
            'unique' => 'Nomor Surat sudah digunakan.',
        ]);
        Spk::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Data Diubah!');
        // Spskck::where('id')->update($record);
        // return redirect()->back()->with('toast_sukses','data diubah!');
    }
    public function destroy(Spk $spk)
    {
        //
    }
}
