<?php

namespace App\Http\Controllers;

use App\Models\Sbm;
use App\Models\Spbm;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreSpbmRequest;
use App\Http\Requests\UpdateSpbmRequest;
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
        

        return view('page.surat-pbm', [
            'dropdown1' => 'Surat',
            'dropdown2' => 'Kemasyarakatan',
            'title' => 'Surat Pernyataan Belum Menikah',
        ])->with('skbm', $spbm);
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
        $record['id'] = 'SPBM'.$nomor;
        // Menggunakan metode create untuk membuat dan menyimpan data
        Sbm::create($record);

        return redirect()->back()->with('toast_success', 'Data Terkirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Spbm $spbm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Spbm $spbm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpbmRequest $request, Spbm $spbm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spbm $spbm)
    {
        //
    }
}
