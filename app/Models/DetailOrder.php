<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'pemesanan_id',
        'lapangan_id',
        'tanggal',
        'jadwal',
        'total',
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'pemesanan_id');
    }

    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class, 'lapangan_id');
    }
}
