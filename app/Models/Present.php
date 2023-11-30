<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Present extends Model
{
    use HasFactory;
    protected $table = 'present';

    protected $fillable = [
        'user_id', 'tanggal', 'keterangan', 'jam_masuk', 'jam_keluar'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
