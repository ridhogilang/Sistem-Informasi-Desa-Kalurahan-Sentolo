<?php

namespace App\Http\Controllers\bo\Surat\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardSuratController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }
    public function index(){
         $currentYear = Carbon::now()->year;
        //sql_atas
        $data_graf['jum_penduduk'] = DB::table('penduduk')->count();

        $data_graf['jum_surat_masuk'] = DB::table('s_masuk')
                        ->whereYear('updated_at', $currentYear)
                        ->count();

        $data_graf['jum_surat_keluar'] = DB::table('mengetahui_verifikasi_surats')
                            ->whereYear('updated_at', $currentYear)
                            ->groupBy('id_surat')
                            ->count();
        //grafik
        $data_graf['graf_surat_keluar'] = DB::table('mengetahui_verifikasi_surats')
                            ->select('jenis_surat', DB::raw('COUNT(DISTINCT id_surat) as jumlah'))
                            ->whereYear('updated_at', $currentYear)
                            ->groupBy('jenis_surat')
                            ->get();

        $data_graf['graf_surat_masuk'] = DB::table('s_masuk')
                            ->select('status_surat',
                                 DB::raw('CASE 
                                    WHEN status_surat = 1 THEN "menunggu tindakan"
                                    WHEN status_surat = 2 THEN "diteruskan"
                                    WHEN status_surat = 3 THEN "dikembalikan"
                                    WHEN status_surat = 4 THEN "menunggu pelaksanaan"
                                    WHEN status_surat = 5 THEN "terlaksana"
                                    WHEN status_surat = 6 THEN "gagal dilaksanakan"
                                    WHEN status_surat = 7 THEN "terlambat dilaksanakan"
                                    ELSE "Status Lainnya"
                                END as status_text'),
                                 DB::raw('COUNT(*) as jumlah'))
                            ->whereYear('created_at', $currentYear)
                            ->groupBy('status_surat')
                            ->get();

        $data_graf['graf_penduduk']  = DB::table('penduduk')
                            ->select('jenis_kelamin', DB::raw('COUNT(*) as jumlah'))
                            ->groupBy('jenis_kelamin')
                            ->get();

        $data_graf['graf_arsip'] = DB::table('arsip_surats')
                        ->select('jenis_surat_2', DB::raw('COUNT(*) as jumlah'))
                        ->where('is_delete', 0)
                        ->whereYear('created_at', $currentYear)
                        ->groupBy('jenis_surat_2')
                        ->get();

        return view('bo.page.surat.dashboard.index',[
            'dropdown1' => '',
            'dropdown2' => '',
            'title' => 'Dashboard',
            'data_graf' => $data_graf,
            'thn_ini' => $currentYear,
        ]);
    }
}
