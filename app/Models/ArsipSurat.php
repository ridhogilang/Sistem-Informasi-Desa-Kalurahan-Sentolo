<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipSurat extends Model
{
    use HasFactory;
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'id_surat',
        'nomor_surat',
        'jenis_surat',
        'jenis_surat_2',
        'surat_penghapusan',
        'status_riwayat_surat',
        'is_delete',
        'created_at',
        'updated_at',
    ];

    public function detilDisposisi()
    {
        return $this->hasMany(DetailDisposisiSurat::class, 'id_surat', 'id_surat');
    }

    public function dtlSuratMasuk()
    {
      return $this->hasOne(SMasuk::class, 'id', 'id_surat');   
    }

    public function dtlVerifikasiKeluar()
    {
      return $this->hasMany(MengetahuiVerifikasiSurat::class, 'id_surat', 'id_surat');   
    }

    public function dtlPenghapusan()
    {
      return $this->hasOne(PenghapusanArsip::class, 'id', 'surat_penghapusan');   
    }
}
