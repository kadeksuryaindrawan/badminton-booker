<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gor extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'nama_gor',
        'alamat',
        'link_maps',
        'foto'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function lapangan()
    {
        return $this->hasMany(Lapangan::class);
    }
}
