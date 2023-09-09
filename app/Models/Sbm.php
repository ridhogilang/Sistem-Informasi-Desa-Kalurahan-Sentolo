<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sbm extends Model
{
    use HasFactory;
    protected $table = 'skbm';
    protected $casts = ['id' => 'string'];
    protected $fillable = ['id','nomor_surat', 'nama', 'nik', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'agama', 'pekerjaan', 'alamat', 'deskripsi', 'jenis_skbm', 'status_surat'];

}
