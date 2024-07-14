<?php

namespace App\Http\Controllers\bo\Surat\arsip;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Yaza\LaravelGoogleDriveStorage\Gdrive;
use Barryvdh\DomPDF\Facade\Pdf;
use Storage;
//model arsip
use App\Models\ArsipSurat;
use App\Models\PenghapusanArsip;
//model surat keluar
use App\Models\Skbm;
use App\Models\Skd;
use App\Models\Skduda;
use App\Models\Skkematian;
use App\Models\Skl;
use App\Models\Skpenghasilan;
use App\Models\Sktbekerja;
use App\Models\SktmSatu;
use App\Models\SktmDua;
use App\Models\Spbbekerja;
use App\Models\Spbm;
use App\Models\Spektp;
use App\Models\Spk;
use App\Models\Spn;
use App\Models\Spskck;
//model surat masuk
use App\Models\SMasuk;

class ArsipController extends Controller
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
        $arsip = ArsipSurat::with('detilDisposisi')
                ->with('dtlSuratMasuk')
                ->with('dtlVerifikasiKeluar')
                ->where('is_delete', '=', '0')
                ->get();

        $badge_status_mengetahui = [
            '0' => '<span class="badge bg-info"> blanko </span>', 
            '1' => '<span class="badge bg-secondary"> menunggu verifikasi </span>', 
            '2' => '<span class="badge bg-success"> terverifikasi </span>', 
            '3' => '<span class="badge bg-danger"> verifikasi ditolak </span>', 
            '4' => '<span class="badge bg-primary"> arsip </span>', 
        ];

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

        return view('bo.page.surat.arsip.arsip',[
            'dropdown1' => '',
            'dropdown2' => '',
            'title' => 'Arsip Desa',
            'badge_status_mengetahui' => $badge_status_mengetahui,
            'badge_disposisi_status' => $badge_disposisi_status,
            'arsip_surat' => $arsip
        ]);
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $arsip_surat = ArsipSurat::findOrFail($id);
        //ini bagian penampilan surat 

        //memilih surat masuk apakah surat keluar
        if($arsip_surat->jenis_surat_2 == 'Surat Masuk')
        {
            $smasuk = SMasuk::find($arsip_surat->id_surat);
            if (!$smasuk) {
                abort(404);
            }
            $filePath = storage_path("app/public/public/surat-masuk/{$smasuk->dokumen}");
            if (!file_exists($filePath)) {
                abort(404);
            }
            return response()->file($filePath);
        }

        if($arsip_surat->jenis_surat_2 == 'Surat Keluar')
        {
            if($arsip_surat->jenis_surat == 'Surat Keterangan Belum Menikah')
            {
                $skbm = Skbm::with('tandatangan')->findOrFail($arsip_surat->id_surat);
                $data = view('bo.template.surat-kbm', compact('skbm'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();    
            }
            if($arsip_surat->jenis_surat == 'Surat Keterangan Domisili')
            {
                $skd = Skd::with('tandatangan')->findOrFail($arsip_surat->id_surat);
                $data = view('bo.template.surat-kdomisili', compact('skd'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();   
            }
            if($arsip_surat->jenis_surat == 'Surat Keterangan Duda / Janda')
            {
                $skduda = Skduda::with('tandatangan')->findOrFail($arsip_surat->id_surat);
                $data = view('bo.template.surat-kduda', compact('skduda'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
            if($arsip_surat->jenis_surat == 'Surat Keterangan Kematian')
            {
                $kkematian = Skkematian::with('tandatangan')->findOrFail($arsip_surat->id_surat);
                $data = view('bo.template.surat-kkematian', compact('kkematian'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
            if($arsip_surat->jenis_surat == 'Surat Keterangan Kelahiran')
            {
                $skl = Skl::with('tandatangan')->findOrFail($arsip_surat->id_surat);
                $data = view('bo.template.surat-kkelahiran', compact('skl'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
            if($arsip_surat->jenis_surat == 'Surat Keterangan Penghasilan')
            {
                $skpenghasilan = Skpenghasilan::with('tandatangan')->findOrFail($arsip_surat->id_surat);
                $data = view('bo.template.surat-kpenghasilan', compact('skpenghasilan'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
            if($arsip_surat->jenis_surat == 'Surat Keterangan Tidak Bekerja')
            {
                $ktbekerja = Sktbekerja::with('tandatangan')->findOrFail($arsip_surat->id_surat);
                $data = view('bo.template.surat-ktbekerja', compact('ktbekerja'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
            if($arsip_surat->jenis_surat == 'Surat Keterangan Tidak Mampu 2')
            {
                $sktm = SktmDua::with('tandatangan')->findOrFail($arsip_surat->id_surat);
                $data = view('bo.template.surat-ktm-dua', compact('sktm'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
            if($arsip_surat->jenis_surat == 'Surat Keterangan Tidak Mampu 1')
            {
                $sktm = SktmSatu::with('tandatangan')->findOrFail($arsip_surat->id_surat);
                $data = view('bo.template.surat-ktm-satu', compact('sktm'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
            if($arsip_surat->jenis_surat == 'Surat Pernyataan Belum Bekerja')
            {
                $spbbekerja = Spbbekerja::with('tandatangan')->findOrFail($arsip_surat->id_surat);
                $data = view('bo.template.surat-pbbekerja', compact('spbbekerja'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
            if($arsip_surat->jenis_surat == 'Surat Pernyataan Belum Menikah')
            {
                $spbm = Spbm::with('tandatangan')->findOrFail($arsip_surat->id_surat);
                $data = view('bo.template.surat-pbm', compact('spbm'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
            if($arsip_surat->jenis_surat == 'Surat Pengantar E-KTP')
            {
                $pektp = Spektp::with('tandatangan')->findOrFail($arsip_surat->id_surat);
                $data = view('bo.template.surat-pektp', compact('pektp'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
            if($arsip_surat->jenis_surat == 'Surat Pengantar Kependudukan')
            {
                $spk = Spk::with('tandatangan')->findOrFail($arsip_surat->id_surat);
                $data = view('bo.template.surat-pk', compact('spk'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
            if($arsip_surat->jenis_surat == 'Surat Pengantar Nikah')
            {
                $spn = Spn::with('tandatangan')->findOrFail($arsip_surat->id_surat);
                $data = view('bo.template.surat-pn', compact('spn'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
            if($arsip_surat->jenis_surat == 'Surat Pengantar SKCK')
            {
                $pskck = Spskck::with('tandatangan')->findOrFail($arsip_surat->id_surat);
                $data = view('bo.template.surat-pskck', compact('pskck'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
        }

        return redirect()->back()->with('toast_warning', 'Surat tidak dapat ditemukan');

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function destroy_arsip(Request $request)
    {
        $record = $request->validate([
            'sampai' => 'required',
            'dari' => 'required',
            'surat_penghapusan' => [
                'required',
                'mimes:doc,docx,pdf,xls,xlsx,ppt,pptx',
            ],
        ], [
            'required' => 'data ada yang kosong',
            'mimes' => 'File tidak valid.',
        ]);

        $file = $request->file('surat_penghapusan');
        $fileName = 'ARSIP-HPS-' . date('YmdHis') . '-' . rand(100, 999) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/penghapusan_arsip_surat', $fileName);

        // Storage::disk('google')->put('Penghapusan Arsip/' .$fileName, file_get_contents($file));
        // $phps_arsip['link'] = Storage::disk('google')->url('Penghapusan Arsip/' . $fileName);

        $phps_arsip['id']           = 'ARSIP-HPS-'. date('YmdHis') . '-' . rand(100, 999);
        $phps_arsip['delete_by']    = auth()->user()->id;
        $phps_arsip['waktu_penghapusan'] = Carbon::now();
        $phps_arsip['document'] = $fileName;
        

        ArsipSurat::whereBetween('created_at', [$record['dari'], $record['sampai']])
            ->where('is_delete', '=', '0')
            ->update([
                'is_delete' => '1',
                'surat_penghapusan' => $phps_arsip['id'],
            ]);

        PenghapusanArsip::create($phps_arsip);
        return redirect()->back()->with('toast_success', 'Arsip Berhasil Dihapus');
    }
}
