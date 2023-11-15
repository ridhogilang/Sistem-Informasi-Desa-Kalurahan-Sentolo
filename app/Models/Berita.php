<?php

namespace App\Models;

use App\Models\KategoriBerita;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Berita extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'slug',
        'penulis',
        'ringkasan',
        'tanggal',
        'gambar',
        'kategoriberita_id',
        'link',
        'kategori_link',
        'artikel',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategoriberita_id');
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['cari'] ?? false, function ($query, $cari) {
            return $query->where('judul', 'like', '%' . $cari . '%')
                ->orWhere('artikel', 'like', '%' . $cari . '%');
        });
    }
}
