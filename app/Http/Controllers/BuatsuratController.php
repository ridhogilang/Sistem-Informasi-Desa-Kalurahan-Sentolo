<?php

namespace App\Http\Controllers;

use App\Models\Buatsurat;
use Illuminate\Http\Request;
use Carbon\Carbon;
// use Carbon\CarbonInterface;

class BuatsuratController extends Controller
{
    public function index()
    {
        $buatsurat = Buatsurat::all();
        return view('bo.page.mandiri.buat-surat', [
            'title' => 'Buat Surat Mandiri'
        ])->with('buatsurat',$buatsurat);
    }
    public function store(Request $request)
    {
        $record = $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'foto_ktp' => [
                'required',
                'mimes:jpg,jpeg,png',
            ],
            'foto_kk' => [
                'required',
                'mimes:jpg,jpeg,png',
            ],
            'foto_akta_lahir' => [
                'nullable',
                'mimes:jpg,jpeg,png',
            ],
            'foto_surat_keterangan_dokter' => [
                'nullable',
                'mimes:jpg,jpeg,png',
            ],
            'jenis_surat' => 'required',
        ], [
            'mimes' => 'File tidak valid.',
        ]);

        // Simpan file di storage lokal
        $file = $request->file('foto_ktp');
        $foto_ktp = 'FOTO-KTP-' . $request->nik . '-' . date('YmdHis') . '-' . rand(100, 999) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/syarat-mandiri/foto-ktp', $foto_ktp);
        $record['foto_ktp'] = $foto_ktp;

        $file = $request->file('foto_kk');
        $foto_kk = 'FOTO-KK-' . $request->nik . '-' . date('YmdHis') . '-' . rand(100, 999) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/syarat-mandiri/foto-kk', $foto_kk);
        $record['foto_kk'] = $foto_kk;

        if ($request->hasFile('foto_akta_lahir')) {
            $file = $request->file('foto_akta_lahir');
            $foto_akta_lahir = 'FOTO-AL-' . $request->nik . '-' . date('YmdHis') . '-' . rand(100, 999) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/syarat-mandiri/foto-akta-lahir', $foto_akta_lahir);
            $record['foto_akta_lahir'] = $foto_akta_lahir;
        }
        if ($request->hasFile('foto_surat_keterangan_dokter')) {
            $file = $request->file('foto_surat_keterangan_dokter');
            $foto_surat_keterangan_dokter = 'FOTO-SKD-' . $request->nik . '-' . date('YmdHis') . '-' . rand(100, 999) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/syarat-mandiri/foto-surat-ket-dokter', $foto_surat_keterangan_dokter);
            $record['foto_surat_keterangan_dokter'] = $foto_surat_keterangan_dokter;
        }

        $record['id'] = 'BSM-'. date('YmdHis') . '-' . rand(100, 999);
        $date = Carbon::now();
        $tanggal_blanko = $date->locale('id')->isoFormat('dddd, D MMMM YYYY [\P\u\k\u\l] HH:mm:ss');
        $record['tanggal_blanko'] = $tanggal_blanko;
        $record['status_blanko'] = 'Pending';

        Buatsurat::create($record);
        return redirect()->back()->with('success', 'Permintaan Surat sedang diproses. Tunggu sampai mendapatkan balasan!');
    }
    public function show($id)
    {
        $smandiri = Buatsurat::find($id);
        if (!$smandiri) {
            abort(404);
        }
        $filePath = storage_path("app/public/surat-mandiri/{$smandiri->dokumen}");
        if (!file_exists($filePath)) {
            abort(404);
        }
        return response()->file($filePath);
    }
}
