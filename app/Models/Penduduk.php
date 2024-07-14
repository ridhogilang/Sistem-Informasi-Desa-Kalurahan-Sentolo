<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;
    protected $table = 'penduduk';
    protected $fillable = [
        'nomor_kk',
        'nik',
        'jenis_kelamin',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'umur',
        'status_perkawinan',
        'pendidikan',
        'pekerjaan',
        'status_hubungan_kel',
        'nama_ibu',
        'nama_ayah',
        'alamat',
        'rt',
        'rw',
        'is_active',
    ];
}
