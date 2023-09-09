<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spbm extends Model
{
    use HasFactory;
    protected $table = 'spbm';
    protected $casts = ['id' => 'string'];
    protected $fillable = ['id','nomor_surat', 'nama','nik', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'agama', 'pekerjaan', 'alamat', 'deskripsi', 'jenis_spbm', 'status_surat'];
}
