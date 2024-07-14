<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenghapusanPenduduk extends Model
{
    use HasFactory;
    protected $table = 'penghapusan_penduduk';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'id_penduduk',
        'delete_by',
        'catatan',
        'dokumen',
    ];
}
