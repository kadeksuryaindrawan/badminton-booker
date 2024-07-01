<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'admin_id',
        'lapangan_id',
        'tanggal',
        'jadwal',
        'total',
    ];

    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class, 'lapangan_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
