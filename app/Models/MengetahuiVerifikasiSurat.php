<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MengetahuiVerifikasiSurat extends Model
{
    use HasFactory;
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'id_surat',
        'nomor_surat',
        'jenis_surat',
        'id_user',
        'nama_user',
        'jabatan_user',
        'status',
        'created_at',
        'updated_at',
    ];
}
