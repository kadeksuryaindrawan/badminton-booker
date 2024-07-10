<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UpdatePendingTransactions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Ambil waktu sekarang dan kurangi 30 menit
        $thresholdTime = Carbon::now()->subMinutes(30);

        // Perbarui transaksi yang melebihi batas waktu pembayaran
        DB::table('pemesanans')
        ->where('transaction_status', 'menunggu pembayaran')
        ->where('created_at', '<', $thresholdTime)
            ->update([
                'transaction_status' => 'dibatalkan',
                'keterangan' => 'melebihi batas waktu pembayaran',
                'updated_at' => Carbon::now(),
            ]);

        return $next($request);
    }
}
