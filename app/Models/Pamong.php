<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pamong extends Model
{
    use HasFactory;
    protected $table = 'pamong';
    protected $fillable = [
        'nama',
        'jabatan',
        'gambar',
    ];
}
