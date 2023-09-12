<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skkematian extends Model
{
    use HasFactory;
    protected $table = 'kkematian';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'nomor_surat',
        'nama',
        'nik',
        'jenis_kelamin',
        'umur',
        'pekerjaan',
        'agama',
        'kewarganegaraan',
        'status_perkawinan',
        'deskripsi',
        'jenis_kkematian',
        'status_surat'
    ];
}
