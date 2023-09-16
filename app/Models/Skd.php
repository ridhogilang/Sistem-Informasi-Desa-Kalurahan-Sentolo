<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skd extends Model
{
    use HasFactory;
    protected $table = 'skd';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'nomor_surat',
        'nama',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'kewarganegaraan',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'alamat',
        'deskripsi',
        'jenis_surat',
        'status_surat'
    ];
}
