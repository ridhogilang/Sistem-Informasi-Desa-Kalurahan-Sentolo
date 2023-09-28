<?php

namespace App\Http\Controllers\bo\Surat\keluar;

use Illuminate\Routing\Controller;
use App\Models\SktmSatu;
use App\Models\SktmDua;
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

class SktmSatuController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:surat KTM');
        Carbon::setLocale('id');
    }
    public function index()
    {
        $sktmSatu = SktmSatu::with('tandatangan')
                ->with('MengetahuiVerifikasiSurat')
                ->where('status_surat', '>=', 1)
                ->where('status_surat', '<=', 3)
                ->orderBy('created_at')
                ->get();
        $sktmDua = SktmDua::with('tandatangan')
                ->with('MengetahuiVerifikasiSurat')
                ->where('status_surat', '>=', 1)
                ->where('status_surat', '<=', 3)
                ->orderBy('created_at')
                ->get();

        // Gabungkan hasil dari kedua query menjadi satu array
        $sktm = $sktmSatu->concat($sktmDua)->sortBy('created_at');
        // dd($sktmSatu->first()->tandatangan);

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
        $TemplateNoSurat = "000/KMS/{$bulanRomawi}/" . date('Y');
        //badge
        $badge_status = [
            '0' => '<span class="badge bg-info"> blanko </span>', 
            '1' => '<span class="badge bg-secondary"> menunggu verifikasi </span>', 
            '2' => '<span class="badge bg-success"> terverifikasi </span>', 
            '3' => '<span class="badge bg-danger"> verifikasi ditolak </span>', 
            '4' => '<span class="badge bg-primary"> arsip </span>', 
        ];

        return view('bo.page.surat.keluar.surat-ktm', [
            'dropdown1' => 'Surat Keluar',
            'dropdown2' => 'Kemasyarakatan',
            'title' => 'Surat Keterangan Tidak Mampu',
            'TemplateNoSurat' => $TemplateNoSurat,
            'pejabat' => $pejabat,
            'badge_status' => $badge_status,
        ])->with('sktm', $sktm);
    }
    public function store(Request $request)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                'unique:sktm_satu,nomor_surat', // Pastikan nomor surat unik di tabel sktm_satu
                Rule::unique('sktm_dua', 'nomor_surat'), // Pastikan nomor surat unik di tabel sktm_dua

            ],
            'nama' => 'required',
            'nik' => 'required|min:16',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'tanda_tangan' => 'required',
            'mengetahui' => 'required'
        ], [
            'unique' => 'Nomor Surat sudah digunakan.',
            'min' => 'Masukkan 16 Digit NIK.',
        ]);
        $record['jenis_surat'] = 'Surat Keterangan Tidak Mampu 1';
        $record['status_surat'] = '1';
        $record['id'] = 'SKTM-1-'. date('YmdHis') . '-' . rand(100, 999);
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

        // Menggunakan metode create untuk membuat dan menyimpan data
        SktmSatu::create($record);

        return redirect()->back()->with('toast_success', 'Data Terkirim!');
    }
    public function update(Request $request, $id)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                function ($attribute, $value, $fail) use ($id) {
                    // Menggunakan closure untuk memeriksa keunikan nomor_surat
                    $existingRecordSktmSatu = SktmSatu::where('id', '!=', $id)->where('nomor_surat', $value)->first();
                    $existingRecordSktmDua = SktmDua::where('nomor_surat', $value)->first();

                    if ($existingRecordSktmSatu || $existingRecordSktmDua) {
                        $fail("Nomor Surat sudah digunakan.");
                    }
                },
            ],
            'nama' => 'required',
            'nik' => 'required|min:16',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'tanda_tangan' => 'required',
            'mengetahui' => 'required',
        ], [
            'min' => 'Masukkan 16 Digit NIK.',
        ]);
        $record['jenis_surat'] = 'Surat Keterangan Tidak Mampu 1';
        $record['status_surat'] = '1';
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
        SktmSatu::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Data Diubah!');
    }
    public function show($id) {
        $sktm = SktmSatu::with('tandatangan')->findOrFail($id);
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('bo.template.surat-ktm-satu', compact('sktm'))->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }
    public function contoh() {
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('bo.template.contoh-surat-ktm-satu')->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }
    
    public function destroy($id, $status)
    {
        $surat = SktmSatu::findOrFail($id);
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
