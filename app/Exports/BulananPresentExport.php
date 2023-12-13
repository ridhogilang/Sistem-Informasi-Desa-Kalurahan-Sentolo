<?php

namespace App\Exports;

use App\Models\Present;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Fromview;
use Carbon\Carbon;


class BulananPresentExport implements Fromview
{
    protected $bulan;

    public function __construct($bulan)
    {
        $this->bulan = $bulan;
    }

    public function view(): View
    {
        $bulan = Carbon::parse($this->bulan)->format('m');
        $tahun = Carbon::parse($this->bulan)->format('Y');

        $dataAbsensi = Present::with('user')
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->get();

        $exportData = [];
        $header = ['Nama'];
        $tanggalAwal = Carbon::createFromDate(null, $bulan, 1)->format('Y-m-d');
        $tanggalAkhir = Carbon::createFromDate(null, $bulan, 1)->endOfMonth()->format('Y-m-d');

        for ($tanggal = $tanggalAwal; $tanggal <= $tanggalAkhir; $tanggal = date('Y-m-d', strtotime($tanggal . ' + 1 day'))) {
            $header[] = $tanggal . ' Jam Masuk';
            $header[] = $tanggal . ' Jam Keluar';
        }

        $exportData[] = $header;

        foreach ($dataAbsensi as $absensi) {
            $rowData = [$absensi->user->name];
            $tanggalAwal = Carbon::createFromDate(null, $bulan, 1)->format('Y-m-d');
            $tanggalAkhir = Carbon::createFromDate(null, $bulan, 1)->endOfMonth()->format('Y-m-d');

            for ($tanggal = $tanggalAwal; $tanggal <= $tanggalAkhir; $tanggal = date('Y-m-d', strtotime($tanggal . ' + 1 day'))) {
                $jamMasuk = $absensi->where('tanggal', $tanggal)->pluck('jam_masuk')->first();
                $jamKeluar = $absensi->where('tanggal', $tanggal)->pluck('jam_keluar')->first();

                $rowData[] = $jamMasuk;
                $rowData[] = $jamKeluar;
            }

            $exportData[] = $rowData;
        }

        return view('bo.page.absen.excel_bulanan', [
            'data' => $exportData,
        ]);
    }
}
