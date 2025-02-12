<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skduda extends Model
{
    use HasFactory;
    protected $table = 'skduda';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'nomor_surat',
        'nama',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'status_cerai',
        'status_perkawinan',
        'pekerjaan',
        'alamat',
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
