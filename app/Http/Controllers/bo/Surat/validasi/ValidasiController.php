<?php

namespace App\Http\Controllers\bo\Surat\validasi;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
//pdf
use Barryvdh\DomPDF\Facade\Pdf;
//model validasi
use App\Models\MengetahuiVerifikasiSurat;
//model surat
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

class ValidasiController extends Controller
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
        $surat = MengetahuiVerifikasiSurat::where('id_user','=', $id_usr)
            ->where('jabatan_user', '=', $jabatan)
            ->where('is_arsip', '=', '0')
            ->orderBy('status', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        $badge_status = [
            '0' => '<span class="badge bg-info"> blanko </span>', 
            '1' => '<span class="badge bg-secondary"> menunggu verifikasi </span>', 
            '2' => '<span class="badge bg-success"> terverifikasi </span>', 
            '3' => '<span class="badge bg-danger"> verifikasi ditolak </span>', 
            '4' => '<span class="badge bg-primary"> arsip </span>', 
        ];
        return view('bo.page.surat.validasi.index',[
            'dropdown1' => '',
            'dropdown2' => '',
            'title' => 'Verifikasi Surat Keluar',
            'badge_status' => $badge_status,
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $surat_ver = MengetahuiVerifikasiSurat::findOrFail($id);
        $jenis_surat = $surat_ver->jenis_surat;
        $id_surat = $surat_ver->id_surat;
        //memilih dan menampilkan pdf
            if($jenis_surat == 'Surat Keterangan Belum Menikah')
            {
                $skbm = Skbm::with('tandatangan')->findOrFail($id_surat);
                $data = view('bo.template.surat-kbm', compact('skbm'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();    
            }
            if($jenis_surat == 'Surat Keterangan Domisili')
            {
                $skd = Skd::with('tandatangan')->findOrFail($id_surat);
                $data = view('bo.template.surat-kdomisili', compact('skd'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();   
            }
            if($jenis_surat == 'Surat Keterangan Duda / Janda')
            {
                $skduda = Skduda::with('tandatangan')->findOrFail($id_surat);
                $data = view('bo.template.surat-kduda', compact('skduda'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
            if($jenis_surat == 'Surat Keterangan Kematian')
            {
                $kkematian = Skkematian::with('tandatangan')->findOrFail($id_surat);
                $data = view('bo.template.surat-kkematian', compact('kkematian'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
            if($jenis_surat == 'Surat Keterangan Kelahiran')
            {
                $skl = Skl::with('tandatangan')->findOrFail($id_surat);
                $data = view('bo.template.surat-kkelahiran', compact('skl'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
            if($jenis_surat == 'Surat Keterangan Penghasilan')
            {
                $skpenghasilan = Skpenghasilan::with('tandatangan')->findOrFail($id_surat);
                $data = view('bo.template.surat-kpenghasilan', compact('skpenghasilan'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
            if($jenis_surat == 'Surat Keterangan Tidak Bekerja')
            {
                $ktbekerja = Sktbekerja::with('tandatangan')->findOrFail($id_surat);
                $data = view('bo.template.surat-ktbekerja', compact('ktbekerja'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
            if($jenis_surat == 'Surat Keterangan Tidak Mampu 2')
            {
                $sktm = SktmDua::with('tandatangan')->findOrFail($id_surat);
                $data = view('bo.template.surat-ktm-dua', compact('sktm'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
            if($jenis_surat == 'Surat Keterangan Tidak Mampu 1')
            {
                $sktm = SktmSatu::with('tandatangan')->findOrFail($id_surat);
                $data = view('bo.template.surat-ktm-satu', compact('sktm'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
            if($jenis_surat == 'Surat Pernyataan Belum Bekerja')
            {
                $spbbekerja = Spbbekerja::with('tandatangan')->findOrFail($id_surat);
                $data = view('bo.template.surat-pbbekerja', compact('spbbekerja'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
            if($jenis_surat == 'Surat Pernyataan Belum Menikah')
            {
                $spbm = Spbm::with('tandatangan')->findOrFail($id_surat);
                $data = view('bo.template.surat-pbm', compact('spbm'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
            if($jenis_surat == 'Surat Pengantar E-KTP')
            {
                $pektp = Spektp::with('tandatangan')->findOrFail($id_surat);
                $data = view('bo.template.surat-pektp', compact('pektp'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
            if($jenis_surat == 'Surat Pengantar Kependudukan')
            {
                $spk = Spk::with('tandatangan')->findOrFail($id_surat);
                $data = view('bo.template.surat-pk', compact('spk'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
            if($jenis_surat == 'Surat Pengantar Nikah')
            {
                $spn = Spn::with('tandatangan')->findOrFail($id_surat);
                $data = view('bo.template.surat-pn', compact('spn'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }
            if($jenis_surat == 'Surat Pengantar SKCK')
            {
                $pskck = Spskck::with('tandatangan')->findOrFail($id_surat);
                $data = view('bo.template.surat-pskck', compact('pskck'))->render();
                $pdf = Pdf::loadHTML($data);
                return $pdf->stream();
            }

        return redirect()->back()->with('toast_warning', 'Terjadi Kesalahan Tidak Dapat Menemukan Surat');
        
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
        $surat_ver = MengetahuiVerifikasiSurat::findOrFail($id);
        $surat_ver->update(['status' => '2']);
        $jenis_surat = $surat_ver->jenis_surat;
        $id_surat = $surat_ver->id_surat;

        //mengecek apakah surat sudah disetujui semua
        $total_setuju = MengetahuiVerifikasiSurat::where('id_surat', $id_surat)->where('status', '=', '2')->count();
        $total_surat = MengetahuiVerifikasiSurat::where('id_surat', $id_surat)->count();

        if($total_surat == $total_setuju){
            //memilih jenis surat
            if($jenis_surat == 'Surat Keterangan Belum Menikah')
            {
                Skbm::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '2']);
            }
            if($jenis_surat == 'Surat Keterangan Domisili')
            {
                Skd::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '2']);  
            }
            if($jenis_surat == 'Surat Keterangan Duda / Janda')
            {
                Skduda::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '2']);
            }
            if($jenis_surat == 'Surat Keterangan Kematian')
            {
                Skkematian::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '2']);
            }
            if($jenis_surat == 'Surat Keterangan Kelahiran')
            {
                Skl::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '2']);
            }
            if($jenis_surat == 'Surat Keterangan Penghasilan')
            {
                Skpenghasilan::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '2']);
            }
            if($jenis_surat == 'Surat Keterangan Tidak Bekerja')
            {
                Sktbekerja::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '2']);
            }
            if($jenis_surat == 'Surat Keterangan Tidak Mampu 2')
            {
                SktmDua::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '2']);
            }
            if($jenis_surat == 'Surat Keterangan Tidak Mampu 1')
            {
                SktmSatu::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '2']);
            }
            if($jenis_surat == 'Surat Pernyataan Belum Bekerja')
            {
                Spbbekerja::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '2']);
            }
            if($jenis_surat == 'Surat Pernyataan Belum Menikah')
            {
                Spbm::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '2']);
            }
            if($jenis_surat == 'Surat Pengantar E-KTP')
            {
                Spektp::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '2']);
            }
            if($jenis_surat == 'Surat Pengantar Kependudukan')
            {
                Spk::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '2']);
            }
            if($jenis_surat == 'Surat Pengantar Nikah')
            {
                Spn::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '2']);
            }
            if($jenis_surat == 'Surat Pengantar SKCK')
            {
                Spskck::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '2']);
            }
        }

        //memilih surat untuk verifikasi
        return redirect()->back()->with('toast_success', 'Berhasil Memverifikasi Surat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $surat_ver = MengetahuiVerifikasiSurat::findOrFail($id);
        $surat_ver->update(['status' => '3']);
        $jenis_surat = $surat_ver->jenis_surat;
        $id_surat = $surat_ver->id_surat;
        //memilih jenis surat
            if($jenis_surat == 'Surat Keterangan Belum Menikah')
            {
                Skbm::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '3']);
            }
            if($jenis_surat == 'Surat Keterangan Domisili')
            {
                Skd::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '3']);  
            }
            if($jenis_surat == 'Surat Keterangan Duda / Janda')
            {
                Skduda::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '3']);
            }
            if($jenis_surat == 'Surat Keterangan Kematian')
            {
                Skkematian::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '3']);
            }
            if($jenis_surat == 'Surat Keterangan Kelahiran')
            {
                Skl::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '3']);
            }
            if($jenis_surat == 'Surat Keterangan Penghasilan')
            {
                Skpenghasilan::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '3']);
            }
            if($jenis_surat == 'Surat Keterangan Tidak Bekerja')
            {
                Sktbekerja::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '3']);
            }
            if($jenis_surat == 'Surat Keterangan Tidak Mampu 2')
            {
                SktmDua::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '3']);
            }
            if($jenis_surat == 'Surat Keterangan Tidak Mampu 1')
            {
                SktmSatu::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '3']);
            }
            if($jenis_surat == 'Surat Pernyataan Belum Bekerja')
            {
                Spbbekerja::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '3']);
            }
            if($jenis_surat == 'Surat Pernyataan Belum Menikah')
            {
                Spbm::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '3']);
            }
            if($jenis_surat == 'Surat Pengantar E-KTP')
            {
                Spektp::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '3']);
            }
            if($jenis_surat == 'Surat Pengantar Kependudukan')
            {
                Spk::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '3']);
            }
            if($jenis_surat == 'Surat Pengantar Nikah')
            {
                Spn::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '3']);
            }
            if($jenis_surat == 'Surat Pengantar SKCK')
            {
                Spskck::with('tandatangan')->where('id', '=', $id_surat)->update(['status_surat' => '3']);
            }

        return redirect()->back()->with('toast_success', 'Berhasil Memverifikasi Surat');
    }
}
