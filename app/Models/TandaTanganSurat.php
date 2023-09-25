<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TandaTanganSurat extends Model
{
    use HasFactory;
    protected $table = 'tanda_tangan_surats';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'id_surat',
        'nomor_surat',
        'jenis_surat',
        'id_user',
        'nama_user',
        'jabatan_user',
        'created_at',
        'updated_at',
    ];
}
