<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Lapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lapangan_id' => ['required', 'numeric'],
            'tanggal' => ['required'],
            'jadwal' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {

            $user_id = Auth::user()->id;
            $lapangan = Lapangan::where('id', $request->lapangan_id)->first();
            $total = $lapangan->harga;

            $admin_id = $lapangan->gor->admin_id;
            $cart_user = Cart::where('user_id', Auth::user()->id)->first();

            if($cart_user !== null){
                $cart_admin = Cart::where('user_id', Auth::user()->id)->where('admin_id', $admin_id)->first();
                if($cart_admin == null){
                    return redirect()->back()->with('error', 'Gagal memasukkan lapangan ke cart! Silahkan checkout terlebih dahulu pesanan anda yang di '.$cart_user->lapangan->gor->nama_gor.'!');
                }else{
                    $cart = Cart::where('user_id', $user_id)->where('lapangan_id', $request->lapangan_id)->where('tanggal', $request->tanggal)->where('jadwal', $request->jadwal)->first();

                    if ($cart == NULL) {
                        Cart::create([
                            "user_id" => $user_id,
                            "admin_id" => $admin_id,
                            "lapangan_id" => $request->lapangan_id,
                            "tanggal" => $request->tanggal,
                            "jadwal" => $request->jadwal,
                            "total" => $total,
                        ]);

                        return redirect()->back()->with('success', 'Lapangan berhasil dipesan, silahkan cek cart dan lakukan pembayaran!');
                    } else {
                        return redirect()->back()->with('error', 'Lapangan dengan tanggal dan jadwal yang sama sudah ada di cart!');
                    }
                }
            }else{
                $cart = Cart::where('user_id', $user_id)->where('lapangan_id', $request->lapangan_id)->where('tanggal', $request->tanggal)->where('jadwal', $request->jadwal)->first();

                if ($cart == NULL) {
                    Cart::create([
                        "user_id" => $user_id,
                        "admin_id" => $admin_id,
                        "lapangan_id" => $request->lapangan_id,
                        "tanggal" => $request->tanggal,
                        "jadwal" => $request->jadwal,
                        "total" => $total,
                    ]);

                    return redirect()->back()->with('success', 'Lapangan berhasil dipesan, silahkan cek cart dan lakukan pembayaran!');
                } else {
                    return redirect()->back()->with('error', 'Lapangan dengan tanggal dan jadwal yang sama sudah ada di cart!');
                }
            }






        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        Cart::find($id)->delete();
        return redirect()->back()->with('success', 'Lapangan berhasil dihapus dari cart!');
    }
}
