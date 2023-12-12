<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buatsurat extends Model
{
    use HasFactory;
    protected $table = 'buatsurat';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'nik',
        'nama',
        'tanggal_blanko',
        'foto_ktp',
        'foto_kk',
        'foto_akta_lahir',
        'foto_surat_keterangan_dokter',
        'jenis_surat',
        'status_blanko',
        'dokumen',
    ];
}
