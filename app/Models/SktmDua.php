<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SktmDua extends Model
{
    use HasFactory;
    protected $table = 'sktm_dua';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'nomor_surat',
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'pekerjaan',
        'alamat',
        'hubungan',
        'nama_dua',
        'nik_dua',
        'tempat_lahir_dua',
        'tanggal_lahir_dua',
        'agama_dua',
        'pekerjaan_dua',
        'alamat_dua',
        'deskripsi',
        'jenis_surat',
        'status_surat',
        'is_arsip'
    ];

    public function tandatangan()
    {
        return $this->hasMany(TandaTanganSurat::class, 'id_surat', 'id');
    }
    
    public function MengetahuiVerifikasiSurat()
    {
        return $this->hasMany(MengetahuiVerifikasiSurat::class, 'id_surat', 'id');
    }
}
