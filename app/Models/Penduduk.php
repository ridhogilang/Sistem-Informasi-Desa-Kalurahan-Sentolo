<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;
    protected $table = 'penduduk';
    protected $fillable = [
        'nik',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'status_perkawinan',
        'alamat',
        'kewarganegaraan',
        'pekerjaan',
        'pendidikan_terakhir',
        'nomor_telepon',
        'penghasilan',
        'foto_penduduk',
        'nomor_kk',
        'nomor_ktp',
        'status_nyawa',
        'keterangan_kematian',
        'kontak_darurat',
        'status_migrasi',
        'status_pajak',
    ];
}
