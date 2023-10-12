<?php

namespace App\Http\Controllers\bo\Surat\keluar;

use Illuminate\Routing\Controller;
use App\Models\SktmDua;
use App\Models\SktmSatu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Barryvdh\DomPDF\Facade\Pdf;
//tanda tangan dan verifikasi(paraf)
use App\Models\User;
use App\Models\MengetahuiVerifikasiSurat;
use App\Models\TandaTanganSurat;
//arsip surat
use App\Models\ArsipSurat;


class SktmDuaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:surat KTM');
    }
    public function store(Request $request)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                'unique:sktm_dua,nomor_surat', // Pastikan nomor surat unik di tabel sktm_dua
                Rule::unique('sktm_satu', 'nomor_surat'), // Pastikan nomor surat unik di tabel sktm_satu
            ],
            'nama' => 'required',
            'nik' => 'required|min:16',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'hubungan' => 'required',
            'nama_dua' => 'required',
            'nik_dua' => 'required',
            'tempat_lahir_dua' => 'required',
            'tanggal_lahir_dua' => 'required',
            'agama_dua' => 'required',
            'pekerjaan_dua' => 'required',
            'alamat_dua' => 'required',
            'deskripsi' => 'required',
            'tanda_tangan' => 'required',
            'mengetahui' => 'required'
        ], [
            'min' => 'Masukkan 16 Digit NIK.',
            'unique' => 'Nomor Surat sudah digunakan.',
        ]);
        $record['jenis_surat'] = 'Surat Keterangan Tidak Mampu 2';
        $record['status_surat'] = '1';
        $record['id'] = 'SKTM-2-'. date('YmdHis') . '-' . rand(100, 999);
        //proses tanda tangan
        foreach ($record['tanda_tangan'] as $ttd) {
            list($id_user, $nama_user, $jabatan_user) = explode("/", $ttd);
    
            $tandatanganData[] = [
                'id' => 'TTD-' . date('YmdHis') . '-' . rand(100, 999),
                'id_user' => $id_user,
                'nama_user' => $nama_user,
                'jabatan_user' => $jabatan_user,
                'id_surat' => $record['id'],
                'nomor_surat' => $record['nomor_surat'],
                'jenis_surat' => $record['jenis_surat'],
            ];
        }
        
        TandaTanganSurat::insert($tandatanganData);
        unset($record['tanda_tangan']);

        //proses paraf / verifikasi
        foreach ($record['mengetahui'] as $ttd) {
            if($ttd != null){
                list($id_user, $nama_user, $jabatan_user) = explode("/", $ttd);
        
                $mengetahuiData[] = [
                    'id' => 'MGTH-' . date('YmdHis') . '-' . rand(100, 999),
                    'id_user' => $id_user,
                    'nama_user' => $nama_user,
                    'jabatan_user' => $jabatan_user,
                    'id_surat' => $record['id'],
                    'nomor_surat' => $record['nomor_surat'],
                    'jenis_surat' => $record['jenis_surat'],
                    'status' => $record['status_surat'],
                    'is_arsip' => '0',
                ];
            }
        }
        
        MengetahuiVerifikasiSurat::insert($mengetahuiData);
        unset($record['mengetahui']);

        //membuat surat
        SktmDua::create($record);

        return redirect()->back()->with('toast_success', 'Data Terkirim!');
    }
    public function update(Request $request, $id)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                function ($attribute, $value, $fail) use ($id) {
                    // Menggunakan closure untuk memeriksa keunikan nomor_surat
                    $existingRecordSktmSatu = SktmSatu::where('nomor_surat', $value)->first();
                    $existingRecordSktmDua = SktmDua::where('id', '!=', $id)->where('nomor_surat', $value)->first();

                    if ($existingRecordSktmSatu || $existingRecordSktmDua) {
                        $fail("Nomor Surat sudah digunakan.");
                    }
                },
            ],
            'nama' => 'required',
            'nik' => 'required|min:16',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'hubungan' => 'required',
            'nama_dua' => 'required',
            'nik_dua' => 'required',
            'tempat_lahir_dua' => 'required',
            'tanggal_lahir_dua' => 'required',
            'agama_dua' => 'required',
            'pekerjaan_dua' => 'required',
            'alamat_dua' => 'required',
            'deskripsi' => 'required',
            'tanda_tangan' => 'required',
            'mengetahui' => 'required'
        ], [
            'min' => 'Masukkan 16 Digit NIK.',
            'unique' => 'Nomor Surat sudah digunakan.',
        ]);

        $record['status_surat'] = '1';
        $record['jenis_surat'] = 'Surat Keterangan Tidak Mampu 2';

        //proses tanda tangan
        foreach ($record['tanda_tangan'] as $ttd) {
            list($id_record, $id_user, $nama_user, $jabatan_user) = explode("/", $ttd);
    
            $tandatanganData = [
                'id_user' => $id_user,
                'nama_user' => $nama_user,
                'id_surat' => $id,
                'jabatan_user' => $jabatan_user,
                'nomor_surat' => $record['nomor_surat'],
                'jenis_surat' => $record['jenis_surat'],
            ];

            $id_record = isset($id_record) ? $id_record : 'TTD-' . date('YmdHis') . '-' . rand(100, 999);

            $condition = [
                'id' => $id_record,
            ];

            TandaTanganSurat::updateOrInsert($condition, $tandatanganData);
        }
        unset($record['tanda_tangan']);

        //proses paraf / verifikasi
        foreach ($record['mengetahui'] as $ttd) {
            if($ttd != null){
                list($id_record, $id_user, $nama_user, $jabatan_user) = explode("/", $ttd);
        
                $mengetahuiData = [
                    'id_user' => $id_user,
                    'id_surat' => $id,
                    'nama_user' => $nama_user,
                    'jabatan_user' => $jabatan_user,
                    'nomor_surat' => $record['nomor_surat'],
                    'jenis_surat' => $record['jenis_surat'],
                    'status' => '1',
                    'is_arsip' => '0',
                ];

                $id_record = ($id_record != '-') ? $id_record : 'MGTH-' . date('YmdHis') . '-' . rand(100, 999);

                $condition = [
                    'id' => $id_record,
                ];

                MengetahuiVerifikasiSurat::updateOrInsert($condition, $mengetahuiData);
            }
        }
        unset($record['mengetahui']);

        //update surat
        SktmDua::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Data Diubah!');
    }
    public function show($id) {
        $sktm = SktmDua::with('tandatangan')->findOrFail($id);

        if($sktm->status_surat != '2'){
            return redirect()->back()->with('toast_warning', 'Data Tidak Terverifikasi!');
        }
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('bo.template.surat-ktm-dua', compact('sktm'))->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }
    public function contoh() {
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('bo.template.contoh-surat-ktm-dua')->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }
    public function destroy($id, $status)
    {
        $surat = SktmDua::findOrFail($id);
        // if($status == '1' || $status == '3'){
        //     MengetahuiVerifikasiSurat::where('id_surat', $id)->delete();
        //     TandaTanganSurat::where('id_surat', $id)->delete();
        //     $surat->delete();

        //     return redirect()->back()->with('toast_success', 'Data Dihapus!');
        // }
        if($status == '2' || $status == '3'){ 
            MengetahuiVerifikasiSurat::where('id_surat', $id)->update(['is_arsip' => '1']);
            ArsipSurat::create([
                'id' => 'ARSIP-' . date('YmdHis') . '-' . rand(100, 999),
                'id_surat' => $id,
                'nomor_surat' => $surat->nomor_surat,
                'jenis_surat' => 'Surat Keterangan Tidak Mampu 2',
                'jenis_surat_2' => 'Surat Keluar',
                'status_riwayat_surat' => $status,
                'surat_penghapusan' => null,
                'is_delete' => '0',
            ]);
            $surat->update(['is_arsip' => '1']);

            return redirect()->back()->with('toast_success', 'Data Telah Diarsipkan!');
        }
        return redirect()->back()->with('toast_warning', 'Data menunggu verifikasi');   
    }
}
