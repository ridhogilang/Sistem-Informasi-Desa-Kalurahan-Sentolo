<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skkematian extends Model
{
    use HasFactory;
    protected $table = 'kkematian';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'nomor_surat',
        'nama',
        'nik',
        'jenis_kelamin',
        'umur',
        'pekerjaan',
        'agama',
        'kewarganegaraan',
        'status_perkawinan',
        'tanggal_meninggal',
        'waktu',
        'alamat',
        'tempat_pemakaman',
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
