<?php

namespace App\Http\Controllers\bo\Surat\masuk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Yaza\LaravelGoogleDriveStorage\Gdrive;
use Storage;
//model
use App\Models\SMasuk;
use App\Models\User;
use App\Models\DisposisiSurat;
use App\Models\DetailDisposisiSurat;
use App\Models\ArsipSurat;
//datatable
use DataTables;


class SMasukController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }
    public function index()
    {
        //menyeleksi surat masuk
        $smasuk= SMasuk::with('kepada_detil')
            ->with('detilDisposisi.pamongDPSS')
            ->where('is_arsip', '=', null)
            ->get();

        // dd($smasuk[0]->detilDisposisi);
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

        return view('bo.page.surat.masuk.surat-masuk', [
            'dropdown1' => 'Surat Masuk',
            'dropdown2' => '',
            'title' => 'Surat Masuk',
            'pejabat' => $pejabat,
            'TemplateNoSurat' => $TemplateNoSurat,
        ])->with('smasuk',$smasuk);
    }

    public function datas()
    {
        //menyeleksi surat masuk
        $smasuk= SMasuk::with('kepada_detil')
            ->with('detilDisposisi.pamongDPSS')
            ->where('is_arsip', '=', null)
            ->get();

        return DataTables::of($smasuk)
                ->addIndexColumn()
                ->addColumn('kepada', function($row){
                    $marang_sopo = $row['kepada_detil']['nama'].' ( '.$row['kepada_detil']['jabatan'].' )';
                    return $marang_sopo;
                })
                ->addColumn('status', function($row){
                    $statusBtn = '<a class="btn btn-primary" href="/admin/e-surat/surat-masuk-status/'.$row['id'].'"><i class="bi bi-eye"></i></a>';
                    return $statusBtn;
                })
                ->addColumn('dokumen', function($row){
                    $dokumenBtn = '<a class="btn btn-success" target="blank" type="submit" href="/admin/e-surat/surat-masuk/'.$row["id"].'/document"><i class="fa-solid fa-file-arrow-down"></i></a>';
                    return $dokumenBtn;
                })
                ->addColumn('action', function($row){
                    //tgl hari ini
                    $tgl_hr_ini = date('Y-m-d');
                    $actionBtn = '<div class="d-flex">';
                    if(($row['status_surat'] == '3' || $row['status_surat'] == '1')) {
                         $actionBtn = $actionBtn .'<a class="btn btn-warning mx-1" href="/admin/e-surat/surat-masuk/'.$row['id'].'/edit"><i class="fa-solid fa-pen-to-square"></i></a>';
                    }
                    else{
                         $actionBtn = $actionBtn .'<a class="btn btn-secondary mx-1" href="#"><i class="fa-solid fa-pen-to-square"></i></a>';
                    }

                    if(($tgl_hr_ini > $row['tanggal_kegiatan']) || ($row['status_surat'] == '3')){
                         $actionBtn = $actionBtn .'<button data-bs-toggle="modal" data-bs-target="#arsip_sm_'.$row['id'].'" type="button" class="btn btn-danger mx-1">
                            <i class="fa-solid fa-circle-up"></i>
                        </button>

                        <div class="modal fade" id="arsip_sm_'.$row['id'].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Arsipkan Surat  '.$row['nomor_surat '].'</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="/admin/e-surat/surat-masuk/'.$row['id'].'/delete">
                                    ' . csrf_field() . '
                                    ' . method_field("DELETE") . '
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row mb-3">
                                            <div class="col">
                                                <p>Berikan catatan mengapa Surat  '.$row['nomor_surat '].' gagal dilaksanakan</p>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="catatan" class="col-sm-3 col-form-label">Catatan</label>
                                            <div class="col-sm-9">
                                                <textarea name="catatan" class="form-control" id="catatan" rows="5" required></textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">
                                        Arsipkan
                                    </button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>';
                    }
                    else
                    {
                         $actionBtn = $actionBtn .'<a class="btn btn-secondary mx-1"><i class="fa-solid fa-circle-up"></i></a>';
                    }

                    $actionBtn = $actionBtn .'</div>';
                    return $actionBtn;
                })
                ->rawColumns(['kepada','action', 'status', 'dokumen'])
                ->make(true);

    }

    public function status($id)
    {
        $smasuk= SMasuk::with('kepada_detil')
            ->with('detilDisposisi.pamongDPSS')
            ->where('is_arsip', '=', null)
            ->where('id', '=', $id)
            ->first();

        $badge_disposisi_status = [
            '1' => '<span class="badge bg-secondary"> menunggu tindakan </span>',
            '2' => '<span class="badge bg-success"> diteruskan </span>',
            '3' => '<span class="badge bg-danger"> dikembalikan </span>',
            '4' => '<span class="badge bg-primary"> pelaksana </span>',
            //bagian hasil surat
            '5' => '<span class="badge bg-success"> terlaksana </span>',
            '6' => '<span class="badge bg-danger"> gagal dilaksanakan </span>',
            '7' => '<span class="badge bg-warning"> terlambat dilaksanakan </span>',
        ];

        return view('bo.page.surat.masuk.surat-masuk-status',
            [
                'title' => 'Surat Masuk',
                'dropdown1' => 'Surat Masuk',
                'dropdown2' => '',
                'suratM' => $smasuk,
                'badge_disposisi_status' => $badge_disposisi_status
            ]);
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
        // $file = $request->file('dokumen');
        // $fileName = 'SM-' . $request->judul_surat . '-' . date('YmdHis') . '-' . rand(100, 999) . '.' . $file->getClientOriginalExtension();
        // Storage::disk('google')->put('Surat Masuk/' .$fileName, file_get_contents($file));
        // $record['dokumen'] = $fileName;

        // $publicUrl = Storage::disk('google')->url('Surat Masuk/' . $fileName);
        // $record['link'] = $publicUrl;

        // Simpan file di storage lokal
        $file = $request->file('dokumen');
        $fileName = 'SM-' . $request->judul_surat . '-' . date('YmdHis') . '-' . rand(100, 999) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/surat-masuk', $fileName);
        $record['dokumen'] = $fileName;

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
    // public function show($id)
    // {
    //     // Temukan data surat masuk berdasarkan ID
    //     $smasuk = SMasuk::find($id);
    //     // Tentukan nama file dan jalur lengkapnya
    //     if (!$smasuk) {
    //         // Handle jika data tidak ditemukan
    //         abort(404);
    //     }
    //     // Dapatkan URL publik ke file di Google Drive
    //     $publicUrl = Storage::disk('google')->url('Surat Masuk/' . $smasuk->dokumen);
    //     // Redirect pengguna ke URL file di Google Drive
    //     return redirect($publicUrl);
    // }
    public function show($id)
    {
        $smasuk = SMasuk::find($id);
        if (!$smasuk) {
            abort(404);
        }
        $filePath = storage_path("app/public/public/surat-masuk/{$smasuk->dokumen}");
        if (!file_exists($filePath)) {
            abort(404);
        }
        return response()->file($filePath);
    }

    public function edit($id)
    {
        $smasuk= SMasuk::with('kepada_detil')
            ->with('detilDisposisi.pamongDPSS')
            ->where('is_arsip', '=', null)
            ->where('id', '=', $id)
            ->first();

        //untuk mengetahui perorangan;
        $pejabat = User::where('jabatan', '<>', null)
                    ->where('is_active', '=', '1')
                    ->where('is_delete', '=', '0')
                    ->get(['id', 'nama', 'jabatan'])
                    ->toArray();

        $badge_disposisi_status = [
            '1' => '<span class="badge bg-secondary"> menunggu tindakan </span>',
            '2' => '<span class="badge bg-success"> diteruskan </span>',
            '3' => '<span class="badge bg-danger"> dikembalikan </span>',
            '4' => '<span class="badge bg-primary"> pelaksana </span>',
            //bagian hasil surat
            '5' => '<span class="badge bg-success"> terlaksana </span>',
            '6' => '<span class="badge bg-danger"> gagal dilaksanakan </span>',
            '7' => '<span class="badge bg-warning"> terlambat dilaksanakan </span>',
        ];

        return view('bo.page.surat.masuk.surat-masuk-edit',
            [
                'title' => 'Surat Masuk',
                'dropdown1' => 'Surat Masuk',
                'dropdown2' => '',
                'suratM' => $smasuk,
                'badge_disposisi_status' => $badge_disposisi_status,
                'pejabat' => $pejabat,
            ]);
    }
    public function update(Request $request, $id)
    {
        $smasuk = SMasuk::find($id);
        if(!($smasuk->status_surat == '3' || $smasuk->status_surat == '1'))
        {
            return redirect()->back()->with('toast_warning', 'Anda Tidak Bisa Mengubah Surat Masuk');
        }

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

        // if ($request->hasFile('dokumen')) {
        //     Storage::disk('google')->delete('Surat Masuk/' . $smasuk->dokumen);

        //     $file = $request->file('dokumen');
        //     $fileName = 'SM-' . $request->judul_surat . '-' . date('YmdHis') . '-' . rand(100, 999) . '.' . $file->getClientOriginalExtension();
        //     Storage::disk('google')->put('Surat Masuk/' . $fileName, file_get_contents($file));
        //     $record['dokumen'] = $fileName;
        // }

        if ($request->hasFile('dokumen')) {
            Storage::delete('public/surat-masuk/' . $smasuk->dokumen);
            $file = $request->file('dokumen');
            $fileName = 'SM-' . $request->judul_surat . '-' . date('YmdHis') . '-' . rand(100, 999) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/surat-masuk', $fileName);
            $record['dokumen'] = $fileName;
        }

        $record['jenis_surat'] = 'Surat Masuk';
        list($record['kepada_id_user'], $record['kepada_jabatan']) = explode("/", $record['kepada']);
        unset($record['kepada']);
        $record['status_surat'] = '1';
        //menghapus disposisi
        DisposisiSurat::where('id_surat', '=', $id)->delete();
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
        return redirect()->route('bo.e-surat.suratmasuk.index')->with('toast_success', 'Data Diubah!');
    }
    public function destroy(Request $request, $id)
    {
        $smasuk = SMasuk::find($id);

        $record = $request->validate([
            'catatan' => 'required',
        ]);

        if($smasuk->status_surat = '3' || Carbon::now() > $smasuk->tanggal_kegiatan){
            //membuat detail disposisi dari pu
            $record['tgl_dilanjutkan_ke_disposisi'] = Carbon::now();
            $record['dilanjutkan_ke_disposisi'] = 'ARSIP';
            $record['id'] = 'DTL-DISPOSISI-'. date('YmdHis') . '-' . rand(100, 999);
            $record['id_surat'] = $id;
            $record['id_user'] = auth()->user()->id;
            $record['jabatan_user'] = 'Pelayanan Umum';
            $record['jenis_disposisi'] = 'GGL';
            $record['tgl_diterima_dari_disposisi'] = $record['tgl_dilanjutkan_ke_disposisi'];
            $record['diterima_dari_disposisi'] = 'PU';
            $record['status_disposisi'] = '6';

            DetailDisposisiSurat::create($record);

            //arsip surat
            DisposisiSurat::where('id_surat', '=', $id)
                ->update(['is_arsip' => '1']);

            $smasuk->update([
                    'is_arsip' => '1',
                    'status_surat' => '6',
                ]);

            ArsipSurat::create([
                'id' => 'ARSIP-' . date('YmdHis') . '-' . rand(100, 999),
                'id_surat' => $id,
                'nomor_surat' => $smasuk->nomor_surat,
                'jenis_surat' => $smasuk->keperluan,
                'jenis_surat_2' => 'Surat Masuk',
                'status_riwayat_surat' => '6',
                'surat_penghapusan' => null,
                'is_delete' => '0',
            ]);

            return redirect()->back()->with('toast_success', 'Data Telah Berhasil diarsipkan!');
        }

        return redirect()->back()->with('toast_warning', 'Surat tidak Berada dalam wewenang Pelayanan Umum!');
    }
}
