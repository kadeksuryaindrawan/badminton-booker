<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DetailOrder;
use App\Models\Gor;
use App\Models\JadwalLapangan;
use App\Models\Lapangan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class LandingController extends Controller
{
    public function count_cart()
    {
        if (Auth::check() == true) {
            $count_cart = Cart::where('user_id', Auth::user()->id)->count();
        } else {
            $count_cart = 0;
        }
        return $count_cart;
    }

    public function index()
    {
        $count_cart = $this->count_cart();
        $gors = Gor::orderBy('created_at', 'desc')->get();
        return view('index', compact('gors','count_cart'));
    }

    public function about()
    {
        $count_cart = $this->count_cart();
        return view('about',compact('count_cart'));
    }

    public function gor()
    {
        $count_cart = $this->count_cart();
        $gors = Gor::orderBy('created_at', 'desc')->get();
        return view('gor', compact('gors', 'count_cart'));
    }

    public function contact()
    {
        $count_cart = $this->count_cart();
        return view('contact',compact('count_cart'));
    }

    public function lapangan($id)
    {
        $count_cart = $this->count_cart();
        $gor = Gor::find($id);
        $lapangans = Lapangan::where('gor_id', $id)->orderBy('created_at', 'desc')->get();
        return view('lapangan', compact('lapangans','gor', 'count_cart'));
    }

    public function detail_lapangan($id)
    {
        $count_cart = $this->count_cart();
        $lapangan = Lapangan::find($id);
        return view('detail-lapangan', compact('lapangan', 'count_cart'));
    }

    public function cart()
    {
        $count_cart = $this->count_cart();
        $carts = Cart::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        $total_cart = Cart::where('user_id', Auth::user()->id)->sum('total');
        return view('user.cart',compact('carts','total_cart', 'count_cart'));
    }

    public function getJam(Request $request)
    {
        $tanggal = $request->tanggal;

        $lapangan_id = $request->lapanganId;

        $ordered = DB::table('detail_orders')
        ->join('pemesanans', 'detail_orders.pemesanan_id', '=', 'pemesanans.id')
        ->where('detail_orders.tanggal', $tanggal)
        ->where('detail_orders.lapangan_id', $lapangan_id)
        ->whereNotIn('pemesanans.transaction_status', ['pembayaran ditolak', 'dibatalkan'])
        ->select('detail_orders.jadwal')
        ->get();

        $jadwals = JadwalLapangan::where('lapangan_id',$lapangan_id)->orderBy('jadwal','asc')->get();

        $availableJadwals = $jadwals->filter(function ($jadwal) use ($ordered) {
            foreach ($ordered as $order) {
                if ($order->jadwal == $jadwal->jadwal) {
                    return false;
                }
            }
            return true;
        });

        ?>
                <label for="jadwal">Jam Tersedia</label>
                <select name="jadwal" name="jadwal" class="form-select" required>
                    <option value="" selected disabled>--Pilih Jam--</option>
                    <?php
                    foreach ($availableJadwals as $jadwal) {
                    ?>
                        <option value="<?= $jadwal->jadwal ?>"><?= $jadwal->jadwal ?></option>
                    <?php
                    }
                    ?>
                </select>
        <?php
    }

    public function histori_transaksi()
    {
        $count_cart = $this->count_cart();
        $pemesanans = Pemesanan::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $total_cart = Cart::where('user_id', Auth::user()->id)->sum('total');
        return view('user.historitransaksi', compact('pemesanans', 'total_cart', 'count_cart'));
    }

    public function detail_histori($id)
    {
        $count_cart = $this->count_cart();
        $detail_orders = DetailOrder::where('pemesanan_id', $id)->orderBy('created_at', 'desc')->get();
        $pemesanan = Pemesanan::find($id);
        $total = $pemesanan->total;
        return view('user.detailhistori', compact('detail_orders', 'pemesanan', 'total', 'count_cart'));
    }

    public function cetak_kwitansi($id)
    {
        $detail_orders = DetailOrder::where('pemesanan_id', $id)->orderBy('created_at', 'desc')->get();
        $pemesanan = Pemesanan::find($id);
        $total = $pemesanan->total;

        $pdfOptions = [
            'isRemoteEnabled' => true,
        ];

        $pdf = PDF::loadView('user.kwitansi', [
            'detail_orders' => $detail_orders,
            'pemesanan' =>  $pemesanan,
            'total' => $total,
        ], $pdfOptions)
            ->setPaper('a4', 'portrait');

        return $pdf->download('kwitansi-' . $pemesanan->transaction_id .'.pdf');
    }
}
