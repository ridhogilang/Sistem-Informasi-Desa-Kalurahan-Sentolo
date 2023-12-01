<?php

namespace App\Imports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\ToModel;

class PendudukImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Penduduk([
            'nik' => $row[1],
            'nama' => $row[2],
            'jenis_kelamin' => $row[3],
            'tempat_lahir' => $row[4],
            'tanggal_lahir' => $row[5],
            'agama' => $row[6],
            'status_perkawinan' => $row[7],
            'alamat' => $row[8],
            'kewarganegaraan' => $row[9],
            'pekerjaan' => $row[10],
            'pendidikan_terakhir' => $row[11],
            'nomor_telepon' => $row[12],
            'penghasilan' => $row[13],
            'foto_penduduk' => $row[14],
            'nomor_kk' => $row[15],
            'nomor_ktp' => $row[16],
            'status_nyawa' => $row[17],
            'keterangan_kematian' => $row[18],
            'kontak_darurat' => $row[19],
            'status_migrasi' => $row[20],
            'status_pajak' => $row[21],
            'is_active' => $row[22],
        ]);
    }
}
