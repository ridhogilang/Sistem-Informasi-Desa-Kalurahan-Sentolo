<?php

namespace App\Http\Controllers;

use App\Models\Skpenghasilan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Barryvdh\DomPDF\Facade\Pdf;

class SkpenghasilanController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }
    public function index()
    {
        $skpenghasilan = Skpenghasilan::all();
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

        return view('page.surat-kpenghasilan', [
            'dropdown1' => 'Surat Keluar',
            'dropdown2' => 'Kemasyarakatan',
            'title' => 'Surat Keterangan Penghasilan',
            'TemplateNoSurat' => $TemplateNoSurat
        ])->with('skpenghasilan', $skpenghasilan);
    }
    public function store(Request $request)

    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                'unique:spbbekerja,nomor_surat',
            ],
            'nama' => 'required',
            'nik' => 'required|min:16',
            'umur' => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'required',
            'penghasilan' => 'required',
            'kewarganegaraan' => 'required',
            'alamat' => 'required',
            'jenis_surat' => 'required',
            'status_surat' => 'required',
        ], [
            'unique' => 'Nomor Surat sudah digunakan.',
            'min' => 'Masukkan 16 Digit NIK.',
        ]);

        // $nomor = str_replace("/", "-", $record['nomor_surat']);
        $date = new \DateTime();
        $date->setTimezone(new \DateTimeZone('Asia/Jakarta'));
        $dateString = $date->format('YmdHis');

        $record['id'] = 'SK-HASIL-'.$dateString;
        // Menggunakan metode create untuk membuat dan menyimpan data
        Skpenghasilan::create($record);
        return redirect()->back()->with('toast_success', 'Data Terkirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $skpenghasilan = Skpenghasilan::findOrFail($id);
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('template.surat-kpenghasilan', compact('skpenghasilan'))->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }
    public function contoh() {
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('template.contoh-surat-kpenghasilan')->render();
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
                Rule::unique('spbbekerja', 'nomor_surat')->ignore($id),
            ],
            'nama' => 'required',
            'nik' => 'required|min:16',
            'umur' => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'required',
            'penghasilan' => 'required',
            'kewarganegaraan' => 'required',
            'alamat' => 'required',
            'jenis_surat' => 'required',
            'status_surat' => 'required',
        ], [
            'min' => 'Masukkan 16 Digit NIK.',
            'unique' => 'Nomor Surat sudah digunakan.',
        ]);

        Skpenghasilan::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Data Diubah!');
    }
}
