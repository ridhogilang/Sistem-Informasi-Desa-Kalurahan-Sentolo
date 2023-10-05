<?php

namespace App\Http\Controllers\bo\Surat\masuk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
//model 
use App\Models\SMasuk;
use App\Models\User;
use App\Models\DisposisiSurat;
use App\Models\DetailDisposisiSurat;
use App\Models\ArsipSurat;

class SMasukController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }
    public function index()
    {
        //menyeleksi surat masuk
        $smasuk= SMasuk::with('kepada_detil')->get();
        //untuk mengetahui perorangan;
        $pejabat = User::where('jabatan', '<>', null)
                    ->where('is_active', '=', '1')
                    ->where('is_delete', '=', '0')
                    ->get(['id', 'nama', 'jabatan'])
                    ->toArray();
        //romawi
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
        $badge_disposisi = [
            '0' => '<span class="badge bg-info"> Posisi Surat </span>', 
            '1' => '<span class="badge bg-secondary"> menunggu </span>', 
            '2' => '<span class="badge bg-success"> diterima </span>', 
            '3' => '<span class="badge bg-success"> dilanjutkan </span>', 
            '4' => '<span class="badge bg-warning"> dikembalikan </span>', 
            '5' => '<span class="badge bg-primary"> dilaksanakan </span>', 
            '6' => '<span class="badge bg-danger"> terlambat </span>', 
        ];

        return view('bo.page.surat.masuk.surat-masuk', [
            'dropdown1' => 'Surat Masuk',
            'dropdown2' => '',
            'title' => 'Surat Masuk',
            'pejabat' => $pejabat,
            'badge_disposisi' => $badge_disposisi,
            'TemplateNoSurat' => $TemplateNoSurat
        ])->with('smasuk',$smasuk);
    }
    public function store(Request $request)
    {
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                'unique:s_masuk,nomor_surat', // Pastikan nomor surat unik di tabel
            ],
            'tanggal_surat' => 'required',
            'kepada' => 'required',
            'keperluan' => 'required',
            'tanggal_kegiatan' => 'required',
            'catatan' => 'required',
            'lampiran' => 'required',
            'dokumen' => [
                'required',
                'mimes:doc,docx,pdf,xls,xlsx,ppt,pptx',
            ],
            // 'disposisi' => 'required',
        ], [
            'unique' => 'Nomor Surat sudah digunakan.',
            'mimes' => 'File tidak valid.',
        ]);

        // Generate nama unik untuk file dokumen
        $namaDokumen = 'SM-' . time() . '.' . $request->file('dokumen')->getClientOriginalExtension();
        $request->file('dokumen')->move(public_path('dokumen'), $namaDokumen);
        $record['dokumen'] = $namaDokumen;

        // $nomor = str_replace("/", "-", $record['nomor_surat']);
        $record['jenis_surat'] = 'Surat Masuk';
        $record['id'] = 'SM-'. date('YmdHis') . '-' . rand(100, 999);
        list($record['kepada_id_user'], $record['kepada_jabatan']) = explode("/", $record['kepada']);
        unset($record['kepada']);
        $record['status_surat'] = '1';
        //disposisi
        $disposisi['id'] =  'DISPOSISI-'. date('YmdHis') . '-' . rand(100, 999);
        $disposisi['id_surat'] = $record['id'];
        $disposisi['tanggal_kegiatan'] = $record['tanggal_kegiatan'];
        $disposisi['id_user'] = $record['kepada_id_user'];
        $disposisi['jabatan_user'] = $record['kepada_jabatan'];
        DisposisiSurat::create($disposisi);
        //detail disposisi
        $dtlDisposisi['id'] = 'DTL-DISPOSISI-'. date('YmdHis') . '-' . rand(100, 999);
        $dtlDisposisi['id_surat'] = $record['id'];
        $dtlDisposisi['id_user'] = $record['kepada_id_user'];
        $dtlDisposisi['jabatan_user'] = $record['kepada_jabatan'];
        $dtlDisposisi['diterima_dari_disposisi'] = $record['id'];
        $dtlDisposisi['tgl_diterima_dari_disposisi'] = Carbon::now()->timestamp;
        $dtlDisposisi['jenis_disposisi'] = 'PTRM';
        $dtlDisposisi['status_disposisi'] = '1';
        DetailDisposisiSurat::create($dtlDisposisi);
        //menginputkan surat masuk
        SMasuk::create($record);
        return redirect()->back()->with('toast_success', 'Data Disimpan!');
    }
    public function document($id)
    {
        // Temukan data surat masuk berdasarkan ID
        $smasuk = SMasuk::find($id);
        if (!$smasuk) {
            // Handle jika data tidak ditemukan
            abort(404);
        }
        // Tentukan nama file dan jalur lengkapnya
        $filePath = public_path('dokumen/' . $smasuk->dokumen);

        if (file_exists($filePath)) {
            // Tampilkan file jika ada
            return response()->file($filePath);
        } else {
            // Handle jika file tidak ditemukan
            abort(404);
        }
    }
    public function update(Request $request, $id)
    {
        $smasuk = SMasuk::find($id);
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                Rule::unique('s_masuk', 'nomor_surat')->ignore($id),
            ],
            'tanggal_surat' => 'required',
            'kepada' => 'required',
            'keperluan' => 'required',
            'tanggal_kegiatan' => 'required',
            'catatan' => 'required',
            'lampiran' => 'required',
            'dokumen' => 'mimes:doc,docx,pdf,xls,xlsx,ppt,pptx',
        ], [
            'unique' => 'Nomor Surat sudah digunakan.',
            'mimes' => 'File tidak valid.',
        ]);

        if ($request->hasFile('dokumen')) {
            // Hapus file dokumen lama jika ada
            File::delete(public_path('dokumen/' . $smasuk->dokumen));

            // Generate nama unik untuk file dokumen baru
            $namaDokumen = 'SM-' . time() . '.' . $request->file('dokumen')->getClientOriginalExtension();
            $request->file('dokumen')->move(public_path('dokumen'), $namaDokumen);
            $record['dokumen'] = $namaDokumen;
        }


        $record['jenis_surat'] = 'Surat Masuk';
        list($record['kepada_id_user'], $record['kepada_jabatan']) = explode("/", $record['kepada']);
        unset($record['kepada']);
        $record['status_surat'] = '1';
        //menghapus disposisi
        DisposisiSurat::where('id_surat', '=', $id)->delete();
        DetailDisposisiSurat::where('id_surat', '=', $id)->delete();
        //membuat disposisi baru
        $disposisi['id'] =  'DISPOSISI-'. date('YmdHis') . '-' . rand(100, 999);
        $disposisi['id_surat'] = $record['id'];
        $disposisi['tanggal_kegiatan'] = $record['tanggal_kegiatan'];
        $disposisi['id_user'] = $record['kepada_id_user'];
        $disposisi['jabatan_user'] = $record['kepada_jabatan'];
        DisposisiSurat::create($disposisi);
        //detail disposisi
        $dtlDisposisi['id'] = 'DTL-DISPOSISI-'. date('YmdHis') . '-' . rand(100, 999);
        $dtlDisposisi['id_surat'] = $record['id'];
        $dtlDisposisi['id_user'] = $record['kepada_id_user'];
        $dtlDisposisi['jabatan_user'] = $record['kepada_jabatan'];
        $dtlDisposisi['diterima_dari_disposisi'] = $record['id'];
        $dtlDisposisi['tgl_diterima_dari_disposisi'] = Carbon::now()->timestamp;
        $dtlDisposisi['jenis_disposisi'] = 'PTRM';
        $dtlDisposisi['status_disposisi'] = '1';
        DetailDisposisiSurat::create($dtlDisposisi);
        //update surat masuk
        SMasuk::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Data Diubah!');
    }
    public function destroy($id)
    {
        // Temukan data Surat Masuk berdasarkan ID
        $smasuk = SMasuk::find($id);
        //dokumen masuk ntar ndak di delete hanya diarsipkan dan mengendap jadi sudahlah ntar dipikir belakangan jadi bagai
        if ($smasuk->dokumen) {
            File::delete(public_path('dokumen/' . $smasuk->dokumen));
        }
        $smasuk->delete();
        return redirect()->back()->with('toast_success', 'Data dihapus!');
    }
}


