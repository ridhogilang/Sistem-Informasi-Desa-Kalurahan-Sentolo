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
use Yaza\LaravelGoogleDriveStorage\Gdrive;
use Storage;

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
            'judul_surat' => 'required',
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

        // Upload file ke Google Drive
        $file = $request->file('dokumen');
        $fileName = 'SM-' . $request->judul_surat . '-' . date('d-m-Y') . '-' . rand(100, 999) . '.' . $file->getClientOriginalExtension();
        Storage::disk('google')->put('Surat Masuk/' .$fileName, file_get_contents($file));
        $record['dokumen'] = $fileName;

        $publicUrl = Storage::disk('google')->url('Surat Masuk/' . $fileName);
        $record['link'] = $publicUrl;

        $record['jenis_surat'] = 'Surat Masuk';
        $record['id'] = 'SM-'. date('YmdHis') . '-' . rand(100, 999);

        list($record['kepada_id_user'], $record['kepada_jabatan']) = explode("/", $record['kepada']);
        unset($record['kepada']);
        $record['status_surat'] = '1';
        //disposisi
        $disposisi['id'] =  'DISPOSISI-'. date('YmdHis') . '-' . rand(100, 999);
        $disposisi['id_surat'] = $record['id'];
        $disposisi['id_user'] = $record['kepada_id_user'];
        $disposisi['jabatan_user'] = $record['kepada_jabatan'];
        DisposisiSurat::create($disposisi);
        //detail disposisi
        $dtlDisposisi['id'] = 'DTL-DISPOSISI-'. date('YmdHis') . '-' . rand(100, 999);
        $dtlDisposisi['id_surat'] = $record['id'];
        $dtlDisposisi['id_user'] = $record['kepada_id_user'];
        $dtlDisposisi['jabatan_user'] = $record['kepada_jabatan'];
        $dtlDisposisi['diterima_dari_disposisi'] = $record['id'];
        $dtlDisposisi['tgl_diterima_dari_disposisi'] = Carbon::now();
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
        // Tentukan nama file dan jalur lengkapnya
        if (!$smasuk) {
            // Handle jika data tidak ditemukan
            abort(404);
        }
        // Dapatkan URL publik ke file di Google Drive
        $publicUrl = Storage::disk('google')->url('Surat Masuk/' . $smasuk->dokumen);
        // Redirect pengguna ke URL file di Google Drive
        return redirect($publicUrl);
    }
    public function update(Request $request, $id)
    {
        $smasuk = SMasuk::find($id);
        $record = $request->validate([
            'nomor_surat' => [
                'required',
                Rule::unique('s_masuk', 'nomor_surat')->ignore($id),
            ],
            'judul_surat' => 'required',
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
            // Hapus file dokumen lama di Google Drive jika ada
            Storage::disk('google')->delete('Surat Masuk/' . $smasuk->dokumen);

            $file = $request->file('dokumen');
            $fileName = 'SM-' . $request->judul_surat . '-' . date('d-m-Y') . '-' . rand(100, 999) . '.' . $file->getClientOriginalExtension();
            Storage::disk('google')->put('Surat Masuk/' . $fileName, file_get_contents($file));
            $record['dokumen'] = $fileName;
            // Dapatkan URL publik ke file di Google Drive
            $publicUrl = Storage::disk('google')->url('Surat Masuk/' . $fileName);
            $record['link'] = $publicUrl;
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
        $disposisi['id_surat'] = $id;
        $disposisi['id_user'] = $record['kepada_id_user'];
        $disposisi['jabatan_user'] = $record['kepada_jabatan'];
        DisposisiSurat::create($disposisi);
        //detail disposisi
        $dtlDisposisi['id'] = 'DTL-DISPOSISI-'. date('YmdHis') . '-' . rand(100, 999);
        $dtlDisposisi['id_surat'] = $id;
        $dtlDisposisi['id_user'] = $record['kepada_id_user'];
        $dtlDisposisi['jabatan_user'] = $record['kepada_jabatan'];
        $dtlDisposisi['diterima_dari_disposisi'] = $id;
        $dtlDisposisi['tgl_diterima_dari_disposisi'] = Carbon::now();
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

        // Hapus file dari Google Drive
        $filePath = 'Surat Masuk/' . $smasuk->dokumen;
        // Periksa apakah file ada di Google Drive dan hapus jika ada
        if (Storage::disk('google')->exists($filePath)) {
            Storage::disk('google')->delete($filePath);
        }
        $smasuk->delete();
        return redirect()->back()->with('toast_success', 'Data Dihapus!');
    }
}
