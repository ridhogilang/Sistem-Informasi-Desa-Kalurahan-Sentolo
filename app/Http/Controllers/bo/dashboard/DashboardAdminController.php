<?php

namespace App\Http\Controllers\bo\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\User;
use App\Models\Komentar;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardAdminController extends Controller
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


        //sid

        $berita = Berita::whereIn('kategoriberita_id', [1, 2, 3])
        ->where('tampil', false)
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();
    

        $totalberita = Berita::whereIn('kategoriberita_id', [1, 2, 3])
        ->where('tampil', false)
        ->count();

        $komentar = Komentar::whereIn('kategoriberita_id', [1, 2, 3])
        ->where('status', false)
        ->orderBy('created_at', 'desc')
        ->limit('3')
        ->get();

        $totalkomentar = Komentar::whereIn('kategoriberita_id', [1, 2, 3])
        ->where('status', false)
        ->count();

        //pengguna
        $count['penduduk'] = User::where('is_delete', '<>', '1')
            ->where('is_pamong', '=', '0')
            ->where('jabatan', '=', null)
            ->count();

        $count['kontributor'] = User::where("is_delete","<>", '1')
                ->where("is_pamong","=", "0")
                ->where('jabatan', '<>', null)
                ->count();
        $count['pamong'] = User::where("is_delete","<>", '1')
                ->where("is_pamong","=", "1")
                ->count();


        if(auth()->user()->jabatan == null){
            return redirect('/profile-penduduk');
        }
        
        return view('bo.page.dashboard.index',[
            'dropdown1' => '',
            'dropdown2' => '',
            'title' => 'Dashboard',
            "berita" => $berita,
            "totalberita" => $totalberita,
            "komentar" => $komentar,
            'akun' => $count,
            "totalkomentar" => $totalkomentar,
            'data_graf' => $data_graf,
            'thn_ini' => $currentYear,
        ]);
    }
}
