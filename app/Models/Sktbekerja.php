<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sktbekerja extends Model
{
    use HasFactory;
    protected $table = 'ktbekerja';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'nomor_surat',
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'warga_negara',
        'alamat',
        'jenis_ktbekerja',
        'status_surat'
    ];
}
