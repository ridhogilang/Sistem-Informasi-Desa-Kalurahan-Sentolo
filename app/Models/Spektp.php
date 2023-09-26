<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spektp extends Model
{
    use HasFactory;
    protected $table = 'pektp';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'nomor_surat',
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'pekerjaan',
        'agama',
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
