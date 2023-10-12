<?php

namespace App\Http\Controllers\bo\Surat\keluar;

use App\Http\Controllers\Controller;
use App\Models\Skl;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
//tanda tangan dan verifikasi(paraf)
use App\Models\User;
use App\Models\MengetahuiVerifikasiSurat;
use App\Models\TandaTanganSurat;
//arsip surat
use App\Models\ArsipSurat;

class SklController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Surat Keluar');
        Carbon::setLocale('id');
    }
    public function index()
    {

        $skl = Skl::with('tandatangan')
                ->with('MengetahuiVerifikasiSurat')
                ->where('status_surat', '>=', 1)
                ->where('status_surat', '<=', 3)
                ->where('is_arsip', '=', null)
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

        return view('bo.page.surat.keluar.surat-ket-kelahiran', [
            'dropdown1' => 'Surat Keluar',
            'dropdown2' => 'Pemerintahan',
            'title' => 'Surat Keterangan Kelahiran',
            'TemplateNoSurat' => $TemplateNoSurat,
            'pejabat' => $pejabat,
            'badge_status' => $badge_status,
        ])->with('skl', $skl);
    }
    public function store(Request $request)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                'unique:skl,nomor_surat', // Pastikan nomor surat unik di tabel sktm_satu
            ],
            'nama' => 'required',
            'status_hubungan' => 'required',
            'dusun' => 'required',
            'kalurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'anak_ke' => 'required',
            'agama' => 'required',
            'nama_ayah' => 'required',
            'nik_ayah' => 'required|min:16',
            'tempat_lahir_ayah' => 'required',
            'tanggal_lahir_ayah' => 'required',
            'agama_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'alamat_ayah' => 'required',
            'nama_ibu' => 'required',
            'nik_ibu' => 'required|min:16',
            'tempat_lahir_ibu' => 'required',
            'tanggal_lahir_ibu' => 'required',
            'agama_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'alamat_ibu' => 'required',
            'tanda_tangan' => 'required',
            'mengetahui' => 'required'
        ], [
            'min' => 'Masukkan 16 Digit NIK.',
            'unique' => 'Nomor Surat sudah digunakan.',
        ]);
        $record['jenis_surat'] = 'Surat Keterangan Kelahiran';
        $record['status_surat'] = '1';
        $record['id'] = 'SKL-'. date('YmdHis') . '-' . rand(100, 999);

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
        Skl::create($record);
        return redirect()->back()->with('toast_success', 'Data Terkirim!');
    }
        /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // dd($id);
        $skl = Skl::with('tandatangan')->findOrFail($id);

        if($skl->status_surat != '2'){
            return redirect()->back()->with('toast_warning', 'Data Tidak Terverifikasi!');
        }
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('bo.template.surat-kkelahiran', compact('skl'))->render();
        // Membuat instance DomPDFphp
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }
    public function contoh() {
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('bo.template.contoh-surat-kkelahiran')->render();
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
                Rule::unique('skl','nomor_surat')->ignore($id),
                // Pastikan nomor surat unik di tabel skduda, kecuali untuk catatan dengan ID yang sama
            ],
            'nama' => 'required',
            'status_hubungan' => 'required',
            'dusun' => 'required',
            'kalurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'anak_ke' => 'required',
            'agama' => 'required',
            'nama_ayah' => 'required',
            'nik_ayah' => 'required|min:16',
            'tempat_lahir_ayah' => 'required',
            'tanggal_lahir_ayah' => 'required',
            'agama_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'alamat_ayah' => 'required',
            'nama_ibu' => 'required',
            'nik_ibu' => 'required|min:16',
            'tempat_lahir_ibu' => 'required',
            'tanggal_lahir_ibu' => 'required',
            'agama_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'alamat_ibu' => 'required',
            'tanda_tangan' => 'required',
            'mengetahui' => 'required'
        ], [
            'min' => 'Masukkan 16 Digit NIK.',
            'unique' => 'Nomor Surat sudah digunakan.',
        ]);

        $record['status_surat'] = '1';
        $record['jenis_surat'] = 'Surat Keterangan Kelahiran';

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
        Skl::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Data Diubah!');

    }

    public function destroy($id, $status)
    {
        $surat = Skl::findOrFail($id);
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
                'jenis_surat' => 'Surat Keterangan Kelahiran',
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

