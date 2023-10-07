<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisposisiSurat extends Model
{
    use HasFactory;
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'id_surat',
        'id_user',
        'jabatan_user',
        'is_arsip',
    ];

    public function suratMasuk(){
      return $this->hasOne(SMasuk::class, 'id', 'id_surat');   
    }

    public function detilDisposisi()
    {
        return $this->hasMany(DetailDisposisiSurat::class, 'id_surat', 'id_surat');
    }
}
