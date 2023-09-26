<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spk extends Model
{
    use HasFactory;
    protected $table = 'spk';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'nomor_surat',
        'nama',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'kewarganegaraan',
        'agama',
        'status_perkawinan',
        'alamat',
        'tanggal_awal',
        'tanggal_akhir',
        'jenis_surat',
        'status_surat'
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
