<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisposisiSurat extends Model
{
    use HasFactory;
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'id_surat',
        'nomor_surat',
        'tanggal_kegiatan',
        'id_user',
        'jabatan_user',
        'is_arsip',
    ];
}
