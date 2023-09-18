<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spbbekerja extends Model
{
    use HasFactory;
    protected $table = 'spbbekerja';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'nomor_surat',
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'jenis_kelamin',
        'alamat',
        'deskripsi',
        'jenis_surat',
        'status_surat'
    ];
}
