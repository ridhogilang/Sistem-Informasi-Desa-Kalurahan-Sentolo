<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    protected $table = 'komentar';
    protected $fillable = [
        'berita_id',
        'kategoriberita_id',
        'komentar',
        'nama',
        'email',
        'nohp',
        'captha',
        'status',
        'active',
    ];

    public function berita()
    {
        return $this->belongsTo(Berita::class, 'berita_id');
    }
    
}
