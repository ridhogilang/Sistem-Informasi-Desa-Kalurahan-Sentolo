<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubHeader extends Model
{
    use HasFactory;

    protected $fillable = [
        'subheader',
        'link',
        'urutan',
        'header_id'
    ];

    public function header()
    {
        return $this->belongsTo(Header::class);
    }
}
