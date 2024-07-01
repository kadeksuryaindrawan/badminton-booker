<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'admin_id',
        'transaction_id',
        'total',
        'transaction_status',
        'nama_bank',
        'no_bank',
        'pemilik_bank',
        'bukti_bayar',
        'tanggal_bayar',
        'keterangan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function detail_order()
    {
        return $this->hasMany(DetailOrder::class);
    }
}
