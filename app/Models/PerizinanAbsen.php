<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerizinanAbsen extends Model
{
    use HasFactory;

    protected $table = 'perizinan_absen';

    protected $fillable = [
        'user_id',
        'nama',
        'tanggal',
        'jenis',
        'alasan',
        'setuju',
    ];
}
