<?php

namespace App\Http\Controllers\bo\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardPenggunaController extends Controller
{
    public function index()
    {
        $count['penduduk'] = User::where('is_delete', '<>', '1')
            ->where('is_pamong', '=', '0')
            ->where('email', '<>', 'admin@mail.com')
            ->where('email', '<>', 'example@mail.com')
            ->where('jabatan', '=', null)
            ->count();

        $count['kontributor'] = User::where("is_delete","<>", '1')
                ->where("is_pamong","=", "0")
                ->where('email', '<>', 'admin@mail.com')
                ->where('email', '<>', 'example@mail.com')
                ->where('jabatan', '<>', null)
                ->count();
        $count['pamong'] = User::where("is_delete","<>", '1')
                ->where("is_pamong","=", "1")
                ->where('email', '<>', 'admin@mail.com')
                ->where('email', '<>', 'example@mail.com')
                ->count();

        return view('bo.page.pengguna.dashboard.index',[
            'dropdown1' => '',
            'dropdown2' => '',
            'akun' => $count,
            'title' => 'Dashboard',
        ]);
    }
}
