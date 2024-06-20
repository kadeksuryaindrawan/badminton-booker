<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'gor_id',
        'nama_lapangan',
        'harga',
    ];

    public function gor()
    {
        return $this->belongsTo(Gor::class, 'gor_id');
    }
}
