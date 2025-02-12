<?php

namespace App\Http\Controllers\bo\Surat\keluar;
use Carbon\Carbon;
use App\Models\Spn;
use Illuminate\Routing\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
//tanda tangan dan verifikasi(paraf)
use App\Models\User;
use App\Models\MengetahuiVerifikasiSurat;
use App\Models\TandaTanganSurat;
//arsip surat
use App\Models\ArsipSurat;

class SpnController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }
    public function index()
    {
        $spn = Spn::with('tandatangan')
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
        $TemplateNoSurat = "000/KMS/{$bulanRomawi}/" . date('Y');
        //badge
        $badge_status = [
            '0' => '<span class="badge bg-info"> blanko </span>', 
            '1' => '<span class="badge bg-secondary"> menunggu verifikasi </span>', 
            '2' => '<span class="badge bg-success"> terverifikasi </span>', 
            '3' => '<span class="badge bg-danger"> verifikasi ditolak </span>', 
            '4' => '<span class="badge bg-primary"> arsip </span>', 
        ];

        return view('bo.page.surat.keluar.surat-pn', [
            'dropdown1' => 'Surat Keluar',
            'dropdown2' => 'Kemasyarakatan',
            'title' => 'Surat Pengantar Nikah',
            'TemplateNoSurat' => $TemplateNoSurat,
            'pejabat' => $pejabat,
            'badge_status' => $badge_status,
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
                'unique:spn,nomor_surat', // Pastikan nomor surat unik di tabel sktm_satu
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
            'tanda_tangan' => 'required',
            'mengetahui' => 'required'
        ], [
            'unique' => 'Nomor Surat sudah digunakan.',
            'min' => 'Masukkan 16 Digit NIK.',
        ]);
        $record['jenis_surat'] = 'Surat Pengantar Nikah';
        $record['status_surat'] = '1';
        $record['id'] = 'SPN-'. date('YmdHis') . '-' . rand(100, 999);
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
        Spn::create($record);
        return redirect()->back()->with('toast_success', 'Data Terkirim!');
    }
    public function show($id)
    {
        $spn = Spn::with('tandatangan')->findOrFail($id);

        if($spn->status_surat != '2'){
            return redirect()->back()->with('toast_warning', 'Data Tidak Terverifikasi!');
        }
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('bo.template.surat-pn', compact('spn'))->render();
        // Membuat instance DomPDF
        $pdf = Pdf::loadHTML($data);
        // Menghasilkan file PDF dan mengirimkannya sebagai respons stream
        return $pdf->stream();
    }
    public function contoh() {
        // Menggunakan view untuk mengambil HTML dari template surat-ktm
        $data = view('bo.template.contoh-surat-pn')->render();
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
            'tanda_tangan' => 'required',
            'mengetahui' => 'required'
        ], [
            'min' => 'Masukkan 16 Digit NIK.',
            'unique' => 'Nomor Surat sudah digunakan.',
        ]);

        $record['jenis_surat'] = 'Surat Pengantar Nikah';
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
        Spn::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Data Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, $status)
    {
        $surat = Spn::findOrFail($id);
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
                'jenis_surat' => 'Surat Pengantar Nikah',
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
