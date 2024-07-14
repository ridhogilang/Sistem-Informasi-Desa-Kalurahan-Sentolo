<?php

namespace App\Exports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;

class PendudukExport implements FromCollection, WithHeadings, WithColumnFormatting, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Penduduk::all();
    // }
    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_NUMBER,
            'C' => NumberFormat::FORMAT_NUMBER,
        ];
    }
    public function headings(): array
    {
        return [
            'No',
            'NO KK',
            'NO NIK',
            'JENIS KELAMIN',
            'NAMA',
            'TEMPAT LAHIR',
            'TANGGAL LAHIR',
            'AGAMA',
            'UMUR',
            'STATUS PERKAWINAN',
            'PENDIDIKAN',
            'PEKERJAAN',
            'STATUS HUBUNGAN KELUARGA',
            'NAMA IBU',
            'NAMA AYAH',
            'ALAMAT',
            'RT',
            'RW',
            'is_active',
        ];
    }
    public function map($penduduk): array
    {
        return [
            $penduduk->id,
            $penduduk->nomor_kk,
            $penduduk->nik,
            $penduduk->jenis_kelamin,
            $penduduk->nama,
            $penduduk->tempat_lahir,
            date('d/m/Y', strtotime($penduduk->tanggal_lahir)),
            $penduduk->agama,
            $penduduk->umur,
            $penduduk->status_perkawinan,
            $penduduk->pendidikan,
            $penduduk->pekerjaan,
            $penduduk->status_hubungan_kel,
            $penduduk->nama_ibu,
            $penduduk->nama_ayah,
            $penduduk->alamat,
            $penduduk->rt,
            $penduduk->rw,
            $penduduk->is_active,
        ];
    }
    public function collection()
    {
        return Penduduk::where('is_active', 1)->get();
    }
}
