<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipSurat extends Model
{
    use HasFactory;
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'id_surat',
        'nomor_surat',
        'jenis_surat',
        'jenis_surat_2',
        'surat_penghapusan',
        'is_delete',
        'created_at',
        'updated_at',
    ];
}
