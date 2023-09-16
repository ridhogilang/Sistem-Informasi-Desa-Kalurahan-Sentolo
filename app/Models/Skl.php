<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skl extends Model
{
    use HasFactory;
    protected $table = 'skl';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
    'id',
    'nomor_surat',
    'nama',
    'status_hubungan',
    'kalurahan',
    'kecamatan',
    'kabupaten',
    'provinsi',
    'tempat_lahir',
    'tanggal_lahir',
    'jenis_kelamin',
    'anak_ke',
    'agama',
    'nama_ayah',
    'nik_ayah',
    'tempat_lahir_ayah',
    'tanggal_lahir_ayah',
    'agama_ayah',
    'pekerjaan_ayah',
    'alamat_ayah',
    'nama_ibu',
    'nik_ibu',
    'tempat_lahir_ibu',
    'tanggal_lahir_ibu',
    'agama_ibu',
    'pekerjaan_ibu',
    'alamat_ibu',
    'jenis_surat',
    'status_surat',

    ];
}
