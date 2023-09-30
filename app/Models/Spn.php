<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spn extends Model
{
    use HasFactory;
    protected $table = 'spn';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'nomor_surat',
        'deskripsi1',
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'alamat',
        // Ayah
        'namaayah',
        'nikayah',
        'tempat_lahirayah',
        'tanggal_lahirayah',
        'jenis_kelaminayah',
        'agamaayah',
        'pekerjaanayah',
        'alamatayah',
        // Ibu
        'namaibu',
        'nikibu',
        'tempat_lahiribu',
        'tanggal_lahiribu',
        'jenis_kelaminibu',
        'agamaibu',
        'pekerjaanibu',
        'alamatibu',
        'deskripsi2',
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
