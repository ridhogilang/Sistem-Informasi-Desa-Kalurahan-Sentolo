<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengantarskck extends Model
{
    use HasFactory;
    protected $table = 'pskck';
    protected $casts = ['id' => 'string'];
    protected $fillable = ['id','nomor_surat', 'nama', 'nik', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'agama', 'status_perkawinan', 'pekerjaan', 'alamat', 'deskripsi', 'jenis_skck', 'status_surat'];
}
