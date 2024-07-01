<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DetailOrder;
use App\Models\Lapangan;
use App\Models\Pemesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('user.checkout', compact('carts', 'count_cart', 'total_cart', 'user'));
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

            return redirect()->back()->with('success', 'Sukses checkout! Silahkan menunggu konfirmasi admin!');

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
