<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;

    protected $fillable = [
        'header',
        'link',
        'urutan',
    ];

    public function subheader()
    {
        return $this->hasMany(SubHeader::class);
    }
}