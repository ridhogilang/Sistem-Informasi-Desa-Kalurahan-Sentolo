<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skpenghasilan extends Model
{
    use HasFactory;
    protected $table = 'skpenghasilan';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'nomor_surat',
        'nama',
        'nik',
        'umur',
        'jenis_kelamin',
        'pekerjaan',
        'penghasilan',
        'kewarganegaraan',
        'alamat',
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
