<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SktmSatu extends Model
{
    use HasFactory;
    protected $table = 'sktm_satu';
    protected $casts = ['id' => 'string'];
    protected $fillable = ['id','nomor_surat', 'nama', 'nik', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'agama', 'status_perkawinan', 'pekerjaan', 'alamat', 'deskripsi', 'jenis_sktm', 'status_surat'];
}
