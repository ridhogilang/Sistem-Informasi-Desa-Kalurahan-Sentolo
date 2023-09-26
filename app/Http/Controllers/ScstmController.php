<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScstmRequest;
use App\Http\Requests\UpdateScstmRequest;
use App\Models\Scstm;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Svg\Tag\Rect;

class ScstmController extends Controller
{
    
    public function __construct() 
    {
        $this->middleware('permission:surat Custom');
        Carbon::setLocale('id');
    }
    public function index()
    {
        $scstm = Scstm::all();
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

        return view('bo.page.surat.keluar.surat-cstm', [
            'dropdown1' => 'Surat Keluar',
            'dropdown2' => 'Kemasyarakatan',
            'title' => 'Surat Custom',
            'TemplateNoSurat' => $TemplateNoSurat
        ])->with('scstm', $scstm);
    }
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
                'unique:scstm,nomor_surat', // Pastikan nomor surat unik di tabel sktm_satu
            ],
            'judulsurat' => 'nullable',
            'tanggalsurat' => 'nullable',
            // Penerima surat
            'penerimasurat' => 'nullable',
            'jabatanpenerima' => 'nullable',
            'alamatpenerima' => 'nullable',
            'kotapenerima' => 'nullable',
            // Salam Pembuka
            'salampembuka' => 'nullable',
            // Isi Surat
            'paragrafpembuka' => 'nullable',
            'paragraf1' => 'nullable',
            'paragraf2' => 'nullable',
            'nama' => 'nullable|min:16',
            'nik' => 'nullable',
            'jenis_kelamin' => 'nullable',
            'hari' => 'nullable',
            'tanggal' => 'nullable',
            'alamat' => 'nullable',
            'agama' => 'nullable',
            'pekerjaan' => 'nullable',
            'waktu' => 'nullable',
            // Paragraf Penutup
            'paragrafpenutup' => 'nullable',
            'kalimatpenutup' => 'nullable',
            'namattd' =>'nullable',
            'jenis_surat' => 'required',
            'status_surat' => 'required',
        ], [
            'unique' => 'Nomor Surat sudah digunakan.',
            'min' => 'Masukkan 16 Digit NIK.',
        ]);
        // $nomor = str_replace("/", "-", $record['nomor_surat']);
        $record['id'] = 'SCSTM-'. date('YmdHis') . '-' . rand(100, 999);
        // Menggunakan metode create untuk membuat dan menyimpan data
        Scstm::create($record);
        return redirect()->back()->with('toast_success', 'Data Terkirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $scstm = Scstm::findOrFail($id);
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('bo.template.surat-cstm', compact('scstm'))->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function contoh()
    {
    // Menggunakan view untuk mengambil HTML dari template surat-ktm
    $data = view('bo.template.contoh-surat-cstm')->render();
    // Membuat instance DomPDF
    $pdf = Pdf::loadHTML($data);
    // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
    return $pdf->stream();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                Rule::unique('scstm', 'nomor_surat')->ignore($id),// Pastikan nomor surat unik di tabel spbm, kecuali untuk catatan dengan ID yang sama
            ],
            'judulsurat' => 'nullable',
            'tanggalsurat' => 'nullable',
            // Penerima surat
            'penerimasurat' => 'nullable',
            'jabatanpenerima' => 'nullable',
            'alamatpenerima' => 'nullable',
            'kotapenerima' => 'nullable',
            // Salam Pembuka
            'salampembuka' => 'nullable',
            // Isi Surat
            'paragrafpembuka' => 'nullable',
            'paragraf1' => 'nullable',
            'paragraf2' => 'nullable',
            'nama' => 'nullable',
            'nik' => 'nullable',
            'jenis_kelamin' => 'nullable',
            'hari' => 'nullable',
            'tanggal' => 'nullable',
            'alamat' => 'nullable',
            'agama' => 'nullable',
            'pekerjaan' => 'nullable',
            'waktu' => 'nullable',
            'acara' => 'nullable',
            // Paragraf Penutup
            'paragrafpenutup' => 'nullable',
            'kalimatpenutup' => 'nullable',
            'namattd' =>'nullable',
            'jenis_surat' => 'required',
            'status_surat' => 'required',
            
        ], [
            'min' => 'Masukkan 16 Digit NIK.',
            'unique' => 'Nomor Surat sudah digunakan.',
        ]);

        Scstm::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Data Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scstm $scstm)
    {
        //
    }
}
