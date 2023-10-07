<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailDisposisiSurat extends Model
{
    use HasFactory;
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'id_surat',
        'id_user',
        'jabatan_user',
        'diterima_dari_disposisi',
        'tgl_diterima_dari_disposisi',
        'dilanjutkan_ke_disposisi',
        'tgl_dilanjutkan_ke_disposisi',
        'jenis_disposisi',
        'status_disposisi',
        'catatan',
    ];

    public function pamongDPSS(){
      return $this->hasOne(User::class, 'id', 'id_user');   
    }
}
