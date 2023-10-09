<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMasuk extends Model
{
    use HasFactory;
    protected $table = 's_masuk';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'nomor_surat',
        'judul_surat',
        'tanggal_surat',
        'kepada_id_user',
        'kepada_jabatan',
        'keperluan',
        'tanggal_kegiatan',
        'catatan',
        'lampiran',
        'dokumen',
        'link',
        'disposisi',
        'jenis_surat',
        'status_surat',
        'is_arsip',
    ];

    public function kepada_detil()
    {
        return $this->hasOne(User::class, 'id', 'kepada_id_user');
    }

    public function detilDisposisi()
    {
        return $this->hasMany(DetailDisposisiSurat::class, 'id_surat', 'id');
    }

}
