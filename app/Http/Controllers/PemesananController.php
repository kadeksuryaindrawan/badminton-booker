<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DetailOrder;
use App\Models\Lapangan;
use App\Models\Pemesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PemesananController extends Controller
{
    public function index()
    {
        if (Auth::check() == true) {
            $count_cart = Cart::where('user_id', Auth::user()->id)->count();
        } else {
            $count_cart = 0;
        }

        $carts = Cart::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $total_cart = Cart::where('user_id', Auth::user()->id)->sum('total');
        $user = User::where('id', Auth::user()->id)->first();
        if($carts->isNotEmpty()){
            return view('user.checkout', compact('carts', 'count_cart', 'total_cart', 'user'));
        }else{
            return back();
        }
    }

    public function checkout_process(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required'],
            'nama_bank' => ['required', 'string', 'max:255'],
            'no_bank' => ['required', 'numeric'],
            'pemilik_bank' => ['required', 'string', 'max:255'],
            'bukti_bayar' => ['required', 'file', 'mimes:jpg,jpeg,png'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $carts = Cart::orderBy('created_at', 'desc')->where('user_id', Auth::user()->id)->get();

            $ordered = DetailOrder::all();
            $ordered = DB::table('detail_orders')
            ->join('pemesanans', 'detail_orders.pemesanan_id', '=', 'pemesanans.id')
            ->where('pemesanans.transaction_status', '!=', 'pembayaran ditolak')
            ->select('detail_orders.*')
            ->get();

            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 5; $i++) {
                $randomString .= $characters[random_int(0, $charactersLength - 1)];
            }
            $transaction_id = date('d') . str_pad(date('m'), 2, '0', STR_PAD_LEFT) . date('Y') . $randomString;
            $conflictedLapangans = [];
            foreach($carts as $cart){
                foreach($ordered as $order){
                    if($cart->lapangan_id == $order->lapangan_id && $cart->tanggal == $order->tanggal && $cart->jadwal == $order->jadwal){
                        $conflictedLapangans[] = $cart->lapangan_id;
                    }
                }
            }
            if (!empty($conflictedLapangans)) {
                $lapanganDetails = Lapangan::with('gor')
                ->whereIn('id', $conflictedLapangans)
                ->get()
                ->map(function ($lapangan) {
                    return $lapangan->nama_lapangan . ' (GOR: ' . $lapangan->gor->nama_gor . ')';
                })
                ->toArray();

                $lapanganDetailsString = implode(', ', $lapanganDetails);

                return redirect()->back()->with('error', 'Gagal checkout! Lapangan berikut sudah dibooking: ' . $lapanganDetailsString . ' di tanggal dan jadwal yang sama. Silahkan ubah pesanan Anda di cart!');
            }
            if ($request->hasFile('bukti_bayar')) {
                $file = md5(time()) . '_Bukti_Bayar_'. $transaction_id . '_' . $request->file('bukti_bayar')->getClientOriginalName();
                $path = $request->file('bukti_bayar')->storeAs('public/bukti_bayar', $file);
                $pemesanan = Pemesanan::create([
                    "user_id" => Auth::user()->id,
                    "admin_id" => $cart->admin_id,
                    "transaction_id" => $transaction_id,
                    "total" => $request->total,
                    "transaction_status" => 'menunggu konfirmasi',
                    "nama_bank" => $request->nama_bank,
                    "no_bank" => $request->no_bank,
                    "pemilik_bank" => $request->pemilik_bank,
                    "bukti_bayar" => $file,
                    "tanggal_bayar" => now(),
                ]);
            } else {
                $pemesanan = Pemesanan::create([
                    "user_id" => Auth::user()->id,
                    "admin_id" => $cart->admin_id,
                    "transaction_id" => $transaction_id,
                    "total" => $request->total,
                    "transaction_status" => 'menunggu konfirmasi',
                    "nama_bank" => $request->nama_bank,
                    "no_bank" => $request->no_bank,
                    "pemilik_bank" => $request->pemilik_bank,
                    "bukti_bayar" => '',
                    "tanggal_bayar" => now(),
                ]);
            }

            foreach ($carts as $cart) {
                DetailOrder::create([
                    "pemesanan_id" => $pemesanan->id,
                    "lapangan_id" => $cart->lapangan_id,
                    "tanggal" => $cart->tanggal,
                    "jadwal" => $cart->jadwal,
                    "total" => $cart->total,
                ]);
            }

            Cart::where('user_id', Auth::user()->id)->delete();

            return redirect()->route('histori-transaksi')->with('success', 'Sukses checkout! Silahkan menunggu konfirmasi admin!');

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function daftar_pemesanan()
    {
        if(Auth::user()->role == 'super admin'){
            $pemesanans = Pemesanan::orderBy('created_at', 'desc')->get();
        }else{
            $pemesanans = Pemesanan::where('admin_id',Auth::user()->id)->orderBy('created_at', 'desc')->get();
        }
        return view('admin.pemesanan.index',compact('pemesanans'));
    }

    public function detail_pemesanan($id)
    {
        $pemesanan = Pemesanan::find($id);
        if (Auth::user()->role != 'super admin') {
            if ($pemesanan->admin_id != Auth::user()->id) {
                return back();
            }
        }
        $detail_orders = DetailOrder::where('pemesanan_id',$id)->orderBy('created_at','desc')->get();
        return view('admin.pemesanan.detail', compact('pemesanan','detail_orders'));
    }

    public function pay_accept($id)
    {
        $pemesanan = Pemesanan::find($id);
        if (Auth::user()->role != 'super admin') {
            if ($pemesanan->admin_id != Auth::user()->id) {
                return back();
            }
        }
        try {
            Pemesanan::where('id', $id)->update([
                'transaction_status' => 'terbayar',
            ]);

            return redirect()->route('daftar-pemesanan')->with('success', 'Berhasil terima pembayaran!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function pay_reject(Request $request, $id)
    {
        $pemesanan = Pemesanan::find($id);
        if (Auth::user()->role != 'super admin') {
            if ($pemesanan->admin_id != Auth::user()->id) {
                return back();
            }
        }
        $validator = Validator::make($request->all(), [
            'keterangan' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('detail-pemesanan', $id)->withErrors($validator)->withInput();
        }
        try {
            $keterangan = $request->keterangan;

            Pemesanan::where('id', $id)->update([
                'keterangan' => $keterangan,
                'transaction_status' => 'pembayaran ditolak',
            ]);

            return redirect()->route('daftar-pemesanan')->with('success', 'Berhasil tolak pembayaran!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function pemesanan_delete($id)
    {
        $pemesanan = Pemesanan::find($id);
        if (Auth::user()->role != 'super admin') {
            if ($pemesanan->admin_id != Auth::user()->id) {
                return back();
            }
        }
        DetailOrder::where('pemesanan_id', $id)->delete();
        unlink(storage_path('app/public/bukti_bayar/' . $pemesanan->bukti_bayar));
        $pemesanan->delete();
        return redirect()->back()->with('success', 'Order berhasil dihapus!');
    }
}
