<?php

namespace App\Exports;

use App\Models\Present;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Fromview;
use Carbon\Carbon;


class BulananPresentExport implements Fromview
{
    protected $absensi;

    public function __construct($absensi)
    {
        $this->absensi = $absensi;
    }

    public function view(): View
    {
        $userIds = $this->absensi->pluck('user_id')->unique();

        // Ambil data user berdasarkan user_ids dari data absensi
        $users = User::whereIn('id', $userIds)->get();
        // dd($users);

        $dates = $this->absensi->pluck('tanggal')->unique();

        return view('bo.page.absen.excel_bulanan', [
            'users' => $users,
            'dates' => $dates,
        ]);
    }
}
