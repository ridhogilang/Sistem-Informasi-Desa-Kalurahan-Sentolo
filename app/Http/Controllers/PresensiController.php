<?php

namespace App\Http\Controllers;

use App\Exports\UsersPresentExport;
use App\Exports\BulananPresentExport;
use App\Models\PerizinanAbsen;
use App\Models\Present;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class PresensiController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }

    public function index()
    {
        $presents = Present::whereUserId(auth()->user()->id)->whereYear('tanggal', date('Y'))->whereMonth('tanggal', date('m'))->whereDate('tanggal', '<=', now())->orderBy('tanggal', 'desc')->get();
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
        $presents = Present::whereUserId(auth()->user()->id)->whereMonth('tanggal', $data[1])->whereYear('tanggal', $data[0])->whereDate('tanggal', '<=', now())->orderBy('tanggal', 'desc')->get();
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
        $users = User::where('is_pamong', '1')->get();
        $data['jam_masuk']  = date('H:i:s');
        $data['tanggal']    = date('Y-m-d');
        $data['user_id']    = $request->user_id;
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();
        $ipAddress = $request->ip();

        $latitudekantor = -7.8367103481447264;
        $longitudekantor = 110.2184030826265;
        $lokasi = $request->input('lokasi');
        $lokasiuser = explode(",", $lokasi);
        $latitudeuser = $lokasiuser[0];
        $longitudeuser = $lokasiuser[1];

        $jarak = $this->distance($latitudekantor, $longitudekantor, $latitudeuser, $longitudeuser);
        $radius = round($jarak["meters"]);
        // dd($ipAddress);

        if (date('l') == 'Saturday' || date('l') == 'Sunday') {
            return redirect()->back()->with('error', 'Hari Libur Tidak bisa Check In');
        }

        if ($radius <= 500) {
            foreach ($users as $user) {
                // Loop melalui setiap tanggal dalam rentang waktu satu bulan
                for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
                    $absen = Present::whereUserId($user->id)->whereTanggal($date->toDateString())->first();

                    // Jika tidak ada absen untuk tanggal tersebut, dan bukan user yang sedang login, buat entri absensi
                    if (!$absen) {
                        Present::create([
                            'keterangan' => 'Alpha',
                            'tanggal' => $date->toDateString(),
                            'user_id' => $user->id
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
        } else {
            return redirect()->back()->with('error', 'Anda Tidak Berada di Area Kalurahan');
        }

        // $ipSegments = implode('.', array_slice(explode('.', $ipAddress), 0, 3));

        // if (
        //     $ipSegments == implode('.', array_slice(explode('.', config('absensi.ip_address')), 0, 3)) ||
        //     $ipSegments == implode('.', array_slice(explode('.', config('absensi.ip_address_2')), 0, 3)) ||
        //     $ipSegments == implode('.', array_slice(explode('.', config('absensi.ip_address_local')), 0, 3))
        // ) {
        //     foreach ($users as $user) {
        //         // Loop melalui setiap tanggal dalam rentang waktu satu bulan
        //         for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
        //             $absen = Present::whereUserId($user->id)->whereTanggal($date->toDateString())->first();

        //             // Jika tidak ada absen untuk tanggal tersebut, dan bukan user yang sedang login, buat entri absensi
        //             if (!$absen) {
        //                 Present::create([
        //                     'keterangan' => 'Alpha',
        //                     'tanggal' => $date->toDateString(),
        //                     'user_id' => $user->id
        //                 ]);
        //             }
        //         }
        //     }

        //     if (strtotime($data['jam_masuk']) >= strtotime(config('absensi.jam_masuk') . ' -1 hours') && strtotime($data['jam_masuk']) <= strtotime(config('absensi.jam_masuk'))) {
        //         $data['keterangan'] = 'Masuk';
        //     } else if (strtotime($data['jam_masuk']) > strtotime(config('absensi.jam_masuk')) && strtotime($data['jam_masuk']) <= strtotime(config('absensi.jam_pulang'))) {
        //         $data['keterangan'] = 'Telat';
        //     } else {
        //         $data['keterangan'] = 'Alpha';
        //     }

        //     $present = Present::whereUserId($data['user_id'])->whereTanggal($data['tanggal'])->first();
        //     if ($present) {
        //         if ($present->keterangan == 'Alpha') {
        //             $present->update($data);
        //             return redirect()->back()->with('success', 'Check-in berhasil');
        //         } else {
        //             return redirect()->back()->with('error', 'Check-in gagal');
        //         }
        //     }

        //     Present::create($data);
        //     return redirect()->back()->with('success', 'Check-in berhasil');
        // } else {
        //     return redirect()->back()->with('error', 'Anda Tidak Berada di Area Kalurahan');
        // }
    }

    public function checkOut(Request $request, Present $kehadiran)
    {
        $data['jam_keluar'] = date('H:i:s');
        $latitudekantor = -7.8367103481447264;
        $longitudekantor = 110.2184030826265;
        $lokasi = $request->input('lokasi');
        $lokasiuser = explode(",", $lokasi);
        $latitudeuser = $lokasiuser[0];
        $longitudeuser = $lokasiuser[1];

        $jarak = $this->distance($latitudekantor, $longitudekantor, $latitudeuser, $longitudeuser);
        $radius = round($jarak["meters"]);

        if ($radius <= 500) {
            $kehadiran->update($data);
            return redirect()->back()->with('success', 'Check-out berhasil');
        } else {
            return redirect()->back()->with('error', 'Anda Tidak Berada di Area Kalurahan');

        }
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

    public function rekap_bulanan()
    {
        $presents = Present::whereYear('tanggal', date('Y'))->whereMonth('tanggal', date('m'))->orderBy('tanggal', 'desc')->get();
        $dates = Present::whereYear('tanggal', date('Y'))->whereMonth('tanggal', date('m'))->pluck('tanggal')->unique();
        $userIds = Present::pluck('user_id')->unique();
        $users = User::whereIn('id', $userIds)->get();
        $masuk = Present::whereTanggal(date('m'))->whereKeterangan('masuk')->count();
        $telat = Present::whereTanggal(date('m'))->whereKeterangan('telat')->count();
        $cuti = Present::whereTanggal(date('m'))->whereKeterangan('cuti')->count();
        $alpha = Present::whereTanggal(date('m'))->whereKeterangan('alpha')->count();
        $rank = $presents->first();
        return view('bo.page.absen.datapresensi_bulanan', [
            "title" => "Rekap Bulanan",
            "dropdown1" => "Rekapitulasi",
            "presents" => $presents,
            "masuk" => $masuk,
            "telat" => $telat,
            "cuti" => $cuti,
            "alpha" => $alpha,
            "rank" => $rank,
            "dates" => $dates,
            "users" => $users,
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

    public function bulanan_search(Request $request)
    {
        $request->validate([
            'bulan' => ['required']
        ]);
        $data = explode('-', $request->bulan);
        $presents = Present::whereMonth('tanggal', $data[1])->whereYear('tanggal', $data[0])->orderBy('tanggal', 'desc')->get();
        $dates = Present::whereMonth('tanggal', $data[1])->whereYear('tanggal', $data[0])->pluck('tanggal')->unique();
        $userIds = Present::pluck('user_id')->unique();
        $users = User::whereIn('id', $userIds)->get();
        $masuk = Present::whereTanggal($request->bulan)->whereKeterangan('masuk')->count();
        $telat = Present::whereTanggal($request->bulan)->whereKeterangan('telat')->count();
        $cuti = Present::whereTanggal($request->bulan)->whereKeterangan('cuti')->count();
        $alpha = Present::whereTanggal($request->bulan)->whereKeterangan('alpha')->count();
        $rank = $presents->first();
        return view('bo.page.absen.datapresensi_bulanan', [
            "title" => "Rekap Harian",
            "dropdown1" => "Rekapitulasi",
            "presents" => $presents,
            "masuk" => $masuk,
            "telat" => $telat,
            "cuti" => $cuti,
            "alpha" => $alpha,
            "rank" => $rank,
            "dates" => $dates,
            "users" => $users,
        ]);
    }

    public function excelUsers(Request $request)
    {
        // Memastikan bahwa $request->tanggal dan parameter kedua (misalnya, $user_id) tersedia
        $tanggal = $request->tanggal;

        // Memanggil UsersPresentExport dengan dua parameter
        return Excel::download(new UsersPresentExport($tanggal), 'kehadiran-' . $tanggal . '.xlsx');
    }

    public function excelBulanan(Request $request)
    {
        $bulan = $request->input('bulan', date('Y-m'));

        list($tahun, $bulan) = explode('-', $bulan);

        $startDate = Carbon::create($tahun, $bulan, 1)->startOfMonth();
        $endDate = $startDate->copy()->endOfMonth();

        $absensi = Present::with('user')
            ->whereBetween('tanggal', [$startDate, $endDate])
            ->get();


        return Excel::download(new BulananPresentExport($absensi), 'rekap_absen_' . $startDate->format('Y-m') . '.xlsx');
    }

    public function perizinan(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'nama' => 'required',
            'tanggal' => 'required',
            'jenis' => 'required',
            'alasan' => 'required',
        ]);

        // dd($validatedData);

        PerizinanAbsen::create($validatedData);

        return redirect()->back()->with('success', 'Berhasil Mengajukan Perizinan');
    }

    public function show_perizinan()
    {
        $bulan_ini = Carbon::now()->month;
        $izin = PerizinanAbsen::where('setuju', false)->get();

        $izinsebulan = PerizinanAbsen::where('setuju', true)->whereMonth('tanggal', $bulan_ini)->get();

        return view('bo.page.absen.perizinan_absen', [
            "title" => "Perizinan Absensi",
            "dropdown1" => "",
            "izin" => $izin,
            "izinsebulan" => $izinsebulan,
        ]);
    }

    public function updatePerizinan(Request $request, $user_id)
    {
        // Update PresentModel
        $presentModel = Present::where('user_id', $user_id)
            ->where('tanggal', $request->taggal)
            ->first();

        if (!$presentModel) {
            // Jika $presentModel belum ada, buat entri baru
            $presentModel = new Present([
                'user_id' => $user_id,
                'tanggal' => $request->taggal,
                'keterangan' => $request->jenis,
            ]);

            $presentModel->save();
        } else {
            // Jika $presentModel sudah ada, update keterangan sesuai dengan jenis
            $presentModel->keterangan = $request->jenis;
            $presentModel->save();
        }

        // Update PerizinanAbsen
        $perizinanAbsen = PerizinanAbsen::where('id', $request->id)
            ->where('tanggal', $request->taggal)
            ->first();

        if ($perizinanAbsen) {
            // Setuju menjadi true
            $perizinanAbsen->setuju = true;
            $perizinanAbsen->save();
        }

        // Redirect atau tampilkan halaman lain sesuai kebutuhan
        return redirect()->back()->with('success', 'Perizinan berhasil diupdate');
    }

    public function updateLuar(Request $request, $id)
    {
        // Validasi request jika diperlukan
        // Add your validation logic here

        // Mendapatkan data PresentModel berdasarkan id
        $presentModel = Present::find($id);

        // Cek apakah data PresentModel ditemukan
        if ($presentModel) {
            // Consolidate conditions for readability
            if ($presentModel->keterangan == 'Masuk' || $presentModel->keterangan == 'Telat') {
                // Update keterangan menjadi "Diluar"
                $presentModel->keterangan = 'Diluar';
            } elseif ($presentModel->keterangan == 'Diluar' && $presentModel->jam_masuk > config('absensi.jam_masuk')) {
                // Update keterangan menjadi "Telat"
                $presentModel->keterangan = 'Telat';
            } elseif ($presentModel->keterangan == 'Diluar' && $presentModel->jam_masuk <= config('absensi.jam_masuk')) {
                // Update keterangan menjadi "Masuk"
                $presentModel->keterangan = 'Masuk';
            } else {
                // Keterangan saat ini bukan "Masuk" atau "Telat", mungkin sudah "Diluar"
                return redirect()->back()->with('error', 'Update gagal, keterangan saat ini bukan "Masuk" atau "Telat"');
            }

            // Save the changes
            $presentModel->save();

            // Redirect atau tampilkan halaman lain sesuai kebutuhan
            return redirect()->back()->with('success', 'Update berhasil');
        }

        // User tidak ditemukan dalam data PresentModel
        return redirect()->back()->with('error', 'User tidak ditemukan');
    }

    public function update_absensi(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'keterangan' => 'required',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required',
        ]);

        $absen = Present::find($id);

        $absen->keterangan = $request->input('keterangan');
        $absen->jam_masuk = $request->input('jam_masuk');
        $absen->jam_keluar = $request->input('jam_keluar');
        $absen->save();

        return redirect()->back()->with('toast_success', 'Data Absensi Berhasil di Update!');
    }

    public function rekapizin_personal()
    {
        $userId = auth()->id();
        $bulan_ini = Carbon::now()->month;
        $izin = PerizinanAbsen::where('user_id', $userId)->whereMonth('tanggal', $bulan_ini)->get();

        return view('bo.page.absen.dataizin_personal', [
            "title" => "Riwayat Pengajuan Izin",
            "dropdown1" => "",
            "izin" => $izin,
        ]);
    }

    public function izinpersonal_edit(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'jenis' => 'required',
            'alasan' => 'required',
        ]);

        $izin = PerizinanAbsen::find($id);

        if (!$izin) {
            return redirect()->back()->with('toast_error', 'Data Perizinan tidak ditemukan.');
        }

        $izin->tanggal = $request->input('tanggal');
        $izin->jenis = $request->input('jenis');
        $izin->alasan = $request->input('alasan');
        $izin->save();

        return redirect()->back()->with('toast_success', 'Data Perizinan Berhasil diubah!');
    }

    public function delete_izin(string $id)
    {
        $izin = PerizinanAbsen::find($id);

        if (!$izin) {
            return redirect()->back()->with('toast_error', 'Data Perizinan tidak ditemukan.');
        }

        $izin->delete();

        return redirect()->back()->with('toast_success', 'Data Perizinan Berhasil dihapus!');
    }

    function distance($lat1, $lon1, $lat2, $lon2)
    {
        $theta = $lon1 - $lon2;
        $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
        $miles = acos($miles);
        $miles = rad2deg($miles);
        $miles = $miles * 60 * 1.1515;
        $feet = $miles * 5280;
        $yards = $feet / 3;
        $kilometers = $miles * 1.609344;
        $meters = $kilometers * 1000;
        return compact('meters');
    }
}
