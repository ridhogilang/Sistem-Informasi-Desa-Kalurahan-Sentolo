<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scstm extends Model
{
    use HasFactory;
    protected $table = 'scstm';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'nomor_surat',
        'judulsurat',
        'tanggalsurat',
        // Penerima surat
        'penerimasurat',
        'jabatanpenerima',
        'alamatpenrima',
        'kotapenerima',
        // Salam Pembuka
        'salampembuka',
        // Isi Surat
        'paragrafpembuka',
        'paragraf1',
        'paragraf2',
        'nama',
        'nik',
        'jenis_kelamin',
        'hari',
        'tanggal',
        'alamat',
        'agama',
        'pekerjaan',
        'waktu' => 'required|min:16',
        'acara',
        // Paragraf Penutup
        'paragrafpenutup',
        'kalimatpenutup',
        'namattd',
        'jenis_surat',
        'status_surat',
    ];
}
