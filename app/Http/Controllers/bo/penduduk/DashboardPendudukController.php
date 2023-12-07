<?php

namespace App\Http\Controllers\bo\penduduk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class DashboardPendudukController extends Controller
{
   public function __construct()
    {
        Carbon::setLocale('id');
    }
    public function index(){
         $currentYear = Carbon::now()->year;
        //sql_atas
        $data_graf['jum_penduduk'] = DB::table('penduduk')->count();

        $data_graf['graf_penduduk']  = DB::table('penduduk')
                            ->select('jenis_kelamin', DB::raw('COUNT(*) as jumlah'))
                            ->groupBy('jenis_kelamin')
                            ->get();

        return view('bo.page.penduduk.dashboard',[
            'dropdown1' => '',
            'dropdown2' => '',
            'title' => 'Dashboard',
            'data_graf' => $data_graf,
            'thn_ini' => $currentYear,
        ]);
    }
}
