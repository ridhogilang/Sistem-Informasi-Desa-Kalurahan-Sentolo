<?php

namespace App\Models;

use App\Models\Berita;
use App\Models\Artikel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriBerita extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori',
    ];

    public function berita()
    {
        return $this->hasMany(Berita::class);
    }

    public function artikel()
    {
        return $this->hasMany(Artikel::class);
    }
}
