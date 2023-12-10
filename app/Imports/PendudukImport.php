<?php

namespace App\Imports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PendudukImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $tanggal_lahir = \Carbon\Carbon::createFromFormat('d/m/Y', $row['tanggal_lahir'])->format('Y-m-d');

        return new Penduduk([
            'nomor_kk' => $row['no_kk'],
            'nik' => $row['no_nik'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'nama' => $row['nama'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $tanggal_lahir,
            'agama' => $row['agama'],
            'umur' => $row['umur'],
            'status_perkawinan' => $row['status_perkawinan'],
            'pendidikan' => $row['pendidikan'],
            'pekerjaan' => $row['pekerjaan'],
            'status_hubungan_kel' => $row['status_hubungan_keluarga'],
            'nama_ibu' => $row['nama_ibu'],
            'nama_ayah' => $row['nama_ayah'],
            'alamat' => $row['alamat'],
            'rt' => $row['rt'],
            'rw' => $row['rw'],
            'is_active' => $row['is_active'],
        ]);
    }
}
