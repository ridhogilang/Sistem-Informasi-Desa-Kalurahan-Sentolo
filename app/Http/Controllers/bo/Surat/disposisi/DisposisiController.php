<?php

namespace App\Http\Controllers\bo\Surat\disposisi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yaza\LaravelGoogleDriveStorage\Gdrive;
use Storage;
use Carbon\Carbon;
//model
use App\Models\User;
use App\Models\DisposisiSurat;
use App\Models\DetailDisposisiSurat;
use App\Models\ArsipSurat;
use App\Models\SMasuk;

class DisposisiController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatan = auth()->user()->jabatan;
        $id_usr = auth()->user()->id;
        //dikelompokkan dari disposisi
        $surat = DisposisiSurat::where('id_user','=', $id_usr)
            ->where('jabatan_user', '=', $jabatan)
            ->where('is_arsip', '=', null)
            ->with('detilDisposisi.pamongDPSS')
            ->get();

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

        //untuk mengetahui perorangan;
        $pejabat = User::where('jabatan', '<>', null)
                    ->where('is_active', '=', '1')
                    ->where('is_delete', '=', '0')
                    ->get(['id', 'nama', 'jabatan'])
                    ->toArray();

        return view('bo.page.surat.disposisi.index',[
            'dropdown1' => '',
            'dropdown2' => '',
            'title' => 'Disposisi Surat Masuk',
            'pejabat' => $pejabat,
            'badge_disposisi_status' => $badge_disposisi_status,
            'surat' => $surat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //kone mrene
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $smasuk = SMasuk::findOrFail($id);
        if (!$smasuk) {
            abort(404);
        }
        $filePath = storage_path("app/public/surat_masuk/{$smasuk->dokumen}");
        if (!file_exists($filePath)) {
            abort(404);
        }
        return response()->file($filePath);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dtldpss = DetailDisposisiSurat::findOrFail($id);
        $id_surat = $dtldpss->id_surat;

        if($dtldpss->jenis_disposisi == 'PLK')
        {
            return redirect()->back()->with('toast_warning', 'Anda tidak bisa meneruskan surat ini');
        }

        $record = $request->validate([
            'kepada' => 'required',
            'jenis_disposisi' => 'required',
            'catatan' => 'nullable',
        ]);
        //kepada disposisi surat
        list($record['id_user'], $record['jabatan_user']) = explode("/", $record['kepada']);
        unset($record['kepada']);
        //record tambahan
        $record['id'] = 'DTL-DISPOSISI-'. date('YmdHis') . '-' . rand(100, 999);
        $record['id_surat'] = $id_surat;
        $record['diterima_dari_disposisi'] = $id;
        $record['tgl_diterima_dari_disposisi'] = Carbon::now();
        $record['status_disposisi'] = '1';
        //update detail disposisi lama
        DetailDisposisiSurat::where('id', $id)
            ->update([
                'dilanjutkan_ke_disposisi' =>  $record['id'],
                'tgl_dilanjutkan_ke_disposisi' => Carbon::now(),
                'catatan' => $record['catatan'],
                'status_disposisi' => '2'
            ]);

        unset($record['catatan']);
        //menambahkan disposisi surat yang baru
        DetailDisposisiSurat::create($record);
        //mengupdate posisi disposisi
        DisposisiSurat::where('id_surat', '=', $id_surat)
            ->update([
                'id_user' => $record['id_user'],
                'jabatan_user' => $record['jabatan_user']
            ]);
        //mengupdate status surat masuk
        SMasuk::where('id', '=', $id_surat)->update(['status_surat' => '2']);

        return redirect()->back()->with('toast_success', 'Surat Berhasil di teruskan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {

        $dtldpss = DetailDisposisiSurat::findOrFail($id);
        $id_surat = $dtldpss->id_surat;

        $record = $request->validate([
            'catatan' => 'required',
        ]);

        $record['id'] = 'DTL-DISPOSISI-'. date('YmdHis') . '-' . rand(100, 999);
        $record['id_surat'] = $id_surat;
        $record['tgl_diterima_dari_disposisi'] = Carbon::now();
        $record['jenis_disposisi'] = 'KMB';
        $record['status_disposisi'] = '1';

        //if jika dia disposisi pertama
        if($dtldpss->id_surat == $dtldpss->diterima_dari_disposisi)
        {
            DisposisiSurat::where('id_surat', '=', $id_surat)
                ->update(['is_arsip' => '1']);

            SMasuk::where('id', '=', $id_surat)->update(['status_surat' => '3']);

            $record['id_user'] = 'PU';
            $record['jabatan_user'] = 'Pelayanan Umum';
            $record['diterima_dari_disposisi'] = 'Surat Kembali Ke Pelayanan Umum';
        }
        else
        {
            $dpssSblm = DetailDisposisiSurat::findOrFail($dtldpss->diterima_dari_disposisi);
            $record['id_user'] = $dpssSblm->id_user;
            $record['jabatan_user'] = $dpssSblm->jabatan_user;
            $record['diterima_dari_disposisi'] = $dpssSblm->diterima_dari_disposisi;
            DisposisiSurat::where('id_surat', '=', $id_surat)
                ->update([
                    'id_user' => $record['id_user'],
                    'jabatan_user' => $record['jabatan_user']
                ]);
        }

        //mengupdat disposisi surat lama
        DetailDisposisiSurat::where('id', $id)
            ->update([
                'dilanjutkan_ke_disposisi' =>  $dtldpss->diterima_dari_disposisi,
                'tgl_dilanjutkan_ke_disposisi' => Carbon::now(),
                'catatan' => $record['catatan'],
                'status_disposisi' => '3'
            ]);
        unset($record['catatan']);
        //membuat disposisi surat yang baru
        DetailDisposisiSurat::create($record);



        return redirect()->back()->with('toast_success', 'Surat Berhasil di Kembalikan');
    }

    public function executor_imp(Request $request, string $id)
    {
        $dtldpss = DetailDisposisiSurat::findOrFail($id);
        $id_surat = $dtldpss->id_surat;

        $record = $request->validate([
            'catatan' => 'required',
        ]);


        $surat = SMasuk::find($id_surat);

        $record['tgl_dilanjutkan_ke_disposisi'] = Carbon::now();
        $record['dilanjutkan_ke_disposisi'] = 'ARSIP';


        //mengecek apakah surat sudah terlambat atau belum
        if(Carbon::now() > $surat->tanggal_kegiatan)
            {
                $record['status_disposisi'] = '7';
            }
        else
            {
                $record['status_disposisi'] = '5';
            }
        //jika pelaksana hanya update
        if($dtldpss->jenis_disposisi == 'PLK')
        {
            //update disposisi
            $dtldpss->update($record);
            //proses pengarsipan surat masuk
            DisposisiSurat::where('id_surat', '=', $id_surat)
                ->update(['is_arsip' => '1']);

           $surat->update([
                    'is_arsip' => '1',
                    'status_surat' => $record['status_disposisi'],
                ]);

            ArsipSurat::create([
                'id' => 'ARSIP-' . date('YmdHis') . '-' . rand(100, 999),
                'id_surat' => $id_surat,
                'nomor_surat' => $surat->nomor_surat,
                'jenis_surat' => $surat->keperluan,
                'jenis_surat_2' => 'Surat Masuk',
                'status_riwayat_surat' => $record['status_disposisi'],
                'surat_penghapusan' => null,
                'is_delete' => '0',
            ]);
            return redirect()->back()->with('toast_success', 'Surat Berhasil di Laksanakan');
        }
        else
        {
            $record['id'] = 'DTL-DISPOSISI-'. date('YmdHis') . '-' . rand(100, 999);
            $record['id_surat'] = $id_surat;
            $record['id_user'] = auth()->user()->id;
            $record['jabatan_user'] = auth()->user()->roles[0]['name'];
            $record['jenis_disposisi'] = 'PLK';
            $record['tgl_diterima_dari_disposisi'] = $record['tgl_dilanjutkan_ke_disposisi'];
            $record['diterima_dari_disposisi'] = $id;


            //diupdate dulu
            $dtldpss->update([
                'tgl_dilanjutkan_ke_disposisi' => $record['tgl_dilanjutkan_ke_disposisi'],
                'dilanjutkan_ke_disposisi' => $record['id'],
                'status_disposisi' => '2',
            ]);

            //buat baru
            DetailDisposisiSurat::create($record);

            //proses pengarsipan surat masuk
            DisposisiSurat::where('id_surat', '=', $id_surat)
                ->update(['is_arsip' => '1']);

            $surat->update([
                    'is_arsip' => '1',
                    'status_surat' => $record['status_disposisi'],
                ]);

            ArsipSurat::create([
                'id' => 'ARSIP-' . date('YmdHis') . '-' . rand(100, 999),
                'id_surat' => $id_surat,
                'nomor_surat' => $surat->nomor_surat,
                'jenis_surat' => $surat->keperluan,
                'status_riwayat_surat' => $record['status_disposisi'],
                'jenis_surat_2' => 'Surat Masuk',
                'surat_penghapusan' => null,
                'is_delete' => '0',
            ]);

            return redirect()->back()->with('toast_success', 'Surat Berhasil di Laksanakan');
        }
    }

}
