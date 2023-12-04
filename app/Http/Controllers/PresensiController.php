<?php

namespace App\Http\Controllers;

use App\Exports\UsersPresentExport;
use App\Models\Present;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PresensiController extends Controller
{
    public function index()
    {
        $presents = Present::whereUserId(auth()->user()->id)->whereMonth('tanggal', date('m'))->whereYear('tanggal', date('Y'))->orderBy('tanggal', 'desc')->get();
        $masuk = Present::whereUserId(auth()->user()->id)->whereMonth('tanggal', date('m'))->whereYear('tanggal', date('Y'))->whereKeterangan('masuk')->count();
        $telat = Present::whereUserId(auth()->user()->id)->whereMonth('tanggal', date('m'))->whereYear('tanggal', date('Y'))->whereKeterangan('telat')->count();
        $cuti = Present::whereUserId(auth()->user()->id)->whereMonth('tanggal', date('m'))->whereYear('tanggal', date('Y'))->whereKeterangan('cuti')->count();
        $alpha = Present::whereUserId(auth()->user()->id)->whereMonth('tanggal', date('m'))->whereYear('tanggal', date('Y'))->whereKeterangan('alpha')->count();

        return view('bo.page.absen.datapresensi_personal', [
            "title" => "Presensi",
            "dropdown1" => "",
            "presents" => $presents,
            "masuk" => $masuk,
            "telat" => $telat,
            "cuti" => $cuti,
            "alpha" => $alpha,
        ]);
    }

    public function cariDaftarHadir(Request $request)
    {
        $request->validate([
            'bulan' => ['required']
        ]);
        $data = explode('-', $request->bulan);
        $presents = Present::whereUserId(auth()->user()->id)->whereMonth('tanggal', $data[1])->whereYear('tanggal', $data[0])->orderBy('tanggal', 'desc')->get();
        $masuk = Present::whereUserId(auth()->user()->id)->whereMonth('tanggal', $data[1])->whereYear('tanggal', $data[0])->whereKeterangan('masuk')->count();
        $telat = Present::whereUserId(auth()->user()->id)->whereMonth('tanggal', $data[1])->whereYear('tanggal', $data[0])->whereKeterangan('telat')->count();
        $cuti = Present::whereUserId(auth()->user()->id)->whereMonth('tanggal', $data[1])->whereYear('tanggal', $data[0])->whereKeterangan('cuti')->count();
        $alpha = Present::whereUserId(auth()->user()->id)->whereMonth('tanggal', $data[1])->whereYear('tanggal', $data[0])->whereKeterangan('alpha')->count();
        return view('bo.page.absen.datapresensi_personal', [
            "title" => "Presensi",
            "dropdown1" => "",
            "presents" => $presents,
            "masuk" => $masuk,
            "telat" => $telat,
            "cuti" => $cuti,
            "alpha" => $alpha,
        ]);
    }

    public function checkIn(Request $request)
    {
        $users = User::all();
        $data['jam_masuk']  = date('H:i:s');
        $data['tanggal']    = date('Y-m-d');
        $data['user_id']    = $request->user_id;

        if (date('l') == 'Saturday' || date('l') == 'Sunday') {
            return redirect()->back()->with('error', 'Hari Libur Tidak bisa Check In');
        }

        foreach ($users as $user) {
            $absen = Present::whereUserId($user->id)->whereTanggal($data['tanggal'])->first();
            if (!$absen) {
                if ($user->id != $data['user_id']) {
                    Present::create([
                        'keterangan'    => 'Alpha',
                        'tanggal'       => date('Y-m-d'),
                        'user_id'       => $user->id
                    ]);
                }
            }
        }

        if (strtotime($data['jam_masuk']) >= strtotime(config('absensi.jam_masuk') . ' -1 hours') && strtotime($data['jam_masuk']) <= strtotime(config('absensi.jam_masuk'))) {
            $data['keterangan'] = 'Masuk';
        } else if (strtotime($data['jam_masuk']) > strtotime(config('absensi.jam_masuk')) && strtotime($data['jam_masuk']) <= strtotime(config('absensi.jam_pulang'))) {
            $data['keterangan'] = 'Telat';
        } else {
            $data['keterangan'] = 'Alpha';
        }

        $present = Present::whereUserId($data['user_id'])->whereTanggal($data['tanggal'])->first();
        if ($present) {
            if ($present->keterangan == 'Alpha') {
                $present->update($data);
                return redirect()->back()->with('success', 'Check-in berhasil');
            } else {
                return redirect()->back()->with('error', 'Check-in gagal');
            }
        }

        Present::create($data);
        return redirect()->back()->with('success', 'Check-in berhasil');
    }

    public function checkOut(Request $request, Present $kehadiran)
    {
        $data['jam_keluar'] = date('H:i:s');
        $kehadiran->update($data);
        return redirect()->back()->with('success', 'Check-out berhasil');
    }

    public function rekap_harian()
    {
        $presents = Present::whereTanggal(date('Y-m-d'))->orderBy('jam_masuk', 'desc')->get();
        $masuk = Present::whereTanggal(date('Y-m-d'))->whereKeterangan('masuk')->count();
        $telat = Present::whereTanggal(date('Y-m-d'))->whereKeterangan('telat')->count();
        $cuti = Present::whereTanggal(date('Y-m-d'))->whereKeterangan('cuti')->count();
        $alpha = Present::whereTanggal(date('Y-m-d'))->whereKeterangan('alpha')->count();
        $rank = $presents->first();
        return view('bo.page.absen.datapresensi_harian', [
            "title" => "Rekap Harian",
            "dropdown1" => "Rekapitulasi",
            "presents" => $presents,
            "masuk" => $masuk,
            "telat" => $telat,
            "cuti" => $cuti,
            "alpha" => $alpha,
            "rank" => $rank,
        ]);
    }

    public function harian_search(Request $request)
    {
        $request->validate([
            'tanggal' => ['required']
        ]);
        $presents = Present::whereTanggal($request->tanggal)->orderBy('jam_masuk', 'desc')->get();
        $masuk = Present::whereTanggal($request->tanggal)->whereKeterangan('masuk')->count();
        $telat = Present::whereTanggal($request->tanggal)->whereKeterangan('telat')->count();
        $cuti = Present::whereTanggal($request->tanggal)->whereKeterangan('cuti')->count();
        $alpha = Present::whereTanggal($request->tanggal)->whereKeterangan('alpha')->count();
        $rank = $presents->first();
        return view('bo.page.absen.datapresensi_harian', [
            "title" => "Rekap Harian",
            "dropdown1" => "Rekapitulasi",
            "presents" => $presents,
            "masuk" => $masuk,
            "telat" => $telat,
            "cuti" => $cuti,
            "alpha" => $alpha,
            "rank" => $rank,
        ]);
    }

    public function excelUsers(Request $request)
    {
        // Memastikan bahwa $request->tanggal dan parameter kedua (misalnya, $user_id) tersedia
        $tanggal = $request->tanggal;

        // Memanggil UsersPresentExport dengan dua parameter
        return Excel::download(new UsersPresentExport( $tanggal), 'kehadiran-' . $tanggal . '.xlsx');
    }


}
