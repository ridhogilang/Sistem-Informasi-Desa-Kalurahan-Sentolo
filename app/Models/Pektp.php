<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pektp extends Model
{
    use HasFactory;
    protected $table = 'pektp';
    protected $casts = ['id' => 'string'];
    protected $fillable = ['id','nomor_surat', 'nama', 'nik', 'tempat_lahir', 'tanggal_lahir','jenis_kelamin', 'pekerjaan', 'agama', 'alamat', 'deskripsi', 'jenis_pektp', 'status_surat'];

}
