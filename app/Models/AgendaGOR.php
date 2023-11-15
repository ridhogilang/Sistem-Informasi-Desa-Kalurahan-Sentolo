<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaGOR extends Model
{
    use HasFactory;
    protected $table = 'agendagor';
    protected $fillable = [
        'kegiatan',
        'tanggal',
        'waktu',
        'koordinator',
    ];
}
