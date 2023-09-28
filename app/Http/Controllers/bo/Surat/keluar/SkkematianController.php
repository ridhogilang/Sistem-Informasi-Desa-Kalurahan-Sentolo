<?php

namespace App\Http\Controllers\bo\Surat\keluar;

use App\Http\Controllers\Controller;
use App\Models\Skkematian;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Spektp;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
//tanda tangan dan verifikasi(paraf)
use App\Models\User;
use App\Models\MengetahuiVerifikasiSurat;
use App\Models\TandaTanganSurat;
//arsip surat
use App\Models\ArsipSurat;

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
        $kkematian = Skkematian::with('tandatangan')
                    ->with('MengetahuiVerifikasiSurat')
                    ->where('status_surat', '>=', 1)
                    ->where('status_surat', '<=', 3)
                    ->get();

        //untuk mengetahui perorangan;
        $pejabat = User::where('jabatan', '<>', null)
                    ->where('is_active', '=', '1')
                    ->where('is_delete', '=', '0')
                    ->get(['id', 'nama', 'jabatan'])
                    ->toArray();
        //untuk romawi
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
        //badge
        $badge_status = [
            '0' => '<span class="badge bg-info"> blanko </span>', 
            '1' => '<span class="badge bg-secondary"> menunggu verifikasi </span>', 
            '2' => '<span class="badge bg-success"> terverifikasi </span>', 
            '3' => '<span class="badge bg-danger"> verifikasi ditolak </span>', 
            '4' => '<span class="badge bg-primary"> arsip </span>', 
        ];

        return view('bo.page.surat.keluar.surat-kkematian', [
            'dropdown1' => 'Surat Keluar',
            'dropdown2' => 'Pemerintahan',
            'title' => 'Surat Keterangan Kematian',
            'TemplateNoSurat' => $TemplateNoSurat,
            'pejabat' => $pejabat,
            'badge_status' => $badge_status,
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
            'tanggal_meninggal' => 'required',
            'waktu' => 'required',
            'tempat_pemakaman' => 'required',
            'alamat' => 'required',
            'tanda_tangan' => 'required',
            'mengetahui' => 'required'
        ], [
            'unique' => 'Nomor Surat sudah digunakan.',
            'min' => 'Masukkan 16 Digit NIK.',
        ]);
        $record['jenis_surat'] = 'Surat Keterangan Kematian';
        $record['status_surat'] = '1';
        $record['id'] = 'SKK-'. date('YmdHis') . '-' . rand(100, 999);

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
        Skkematian::create($record);

        return redirect()->back()->with('toast_success', 'Data Terkirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kkematian = Skkematian::with('tandatangan')->findOrFail($id);
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
            'tanggal_meninggal' => 'required',
            'waktu' => 'required',
            'tempat_pemakaman' => 'required',
            'alamat' => 'required',
            'tanda_tangan' => 'required',
            'mengetahui' => 'required'
        ], [
            'unique' => 'Nomor Surat sudah digunakan.',
            'min' => 'Masukkan 16 Digit NIK.',
        ]);


        $record['status_surat'] = '1';
        $record['jenis_surat'] = 'Surat Keterangan Kematian';

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
        Skkematian::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Data Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, $status)
    {
        $surat = Skkematian::findOrFail($id);
        if($surat->get()[0]['status_surat'] != $status){
           return redirect()->back()->with('toast_warning', 'Terjadi Kesalahan Data dalam pemrosesan'); 
        }
        if($status == '1' || $status == '3'){
            MengetahuiVerifikasiSurat::where('id_surat', $id)->delete();
            TandaTanganSurat::where('id_surat', $id)->delete();
            $surat->delete();

            return redirect()->back()->with('toast_success', 'Data Dihapus!');
        }
        if($status == '2'){ 
            MengetahuiVerifikasiSurat::where('id_surat', $id)->update(['is_arsip' => '1']);
            ArsipSurat::create([
                'id' => 'ARSIP-' . date('YmdHis') . '-' . rand(100, 999),
                'id_surat' => $id,
                'nomor_surat' => $surat->nomor_surat,
                'jenis_surat' => 'Surat Keterangan Duda / Janda',
                'jenis_surat_2' => 'Surat Keluar',
                'surat_penghapusan' => null,
                'is_delete' => '0',
            ]);
            $surat->update(['status_surat' => '4']);

            return redirect()->back()->with('toast_success', 'Data Telah Diarsipkan!');
        }   
    }
}
