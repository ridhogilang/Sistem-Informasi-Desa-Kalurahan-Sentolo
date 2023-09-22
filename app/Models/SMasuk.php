<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMasuk extends Model
{
    use HasFactory;
    protected $table = 's_masuk';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'nomor_surat',
        'tanggal_surat',
        'kepada',
        'keperluan',
        'tanggal_kegiatan',
        'catatan',
        'lampiran',
        'dokumen',
        'disposisi',
        'jenis_surat'
    ];
}
