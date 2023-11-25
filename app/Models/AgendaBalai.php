<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaBalai extends Model
{
    use HasFactory;
    protected $table = 'agenda_balai';
    protected $fillable = [
        'kegiatan',
        'tanggal',
        'waktu',
        'selesai',
        'koordinator',
        'nomorhp',
    ];
}
