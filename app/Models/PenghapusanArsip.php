<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenghapusanArsip extends Model
{
    use HasFactory;
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'delete_by',
        'waktu_penghapusan',
        'document',
        'link',
    ];
    public function pamonghps()
    {
      return $this->hasOne(User::class, 'id', 'delete_by');   
    }
}
