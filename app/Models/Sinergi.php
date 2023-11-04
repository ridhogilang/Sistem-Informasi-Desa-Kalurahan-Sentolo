<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sinergi extends Model
{
    use HasFactory;
    protected $table = 'sinergi';
    protected $fillable = [
        'nama',
        'link',
        'gambar',
    ];
}
