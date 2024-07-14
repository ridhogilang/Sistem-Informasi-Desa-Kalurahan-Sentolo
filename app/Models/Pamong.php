<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pamong extends Model
{
    use HasFactory;
    protected $table = 'pamong';
    protected $fillable = [
        'user_id',
        'nama',
        'jabatan',
        'gambar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function present()
    {
        return $this->hasOne(Present::class, 'user_id');
    }
}
