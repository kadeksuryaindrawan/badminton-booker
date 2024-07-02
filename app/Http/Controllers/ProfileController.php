<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile_admin($id)
    {
        $user = User::find($id);
        return view('admin.profile.index', compact('user'));
    }

    public function profile_user($id)
    {
        if (Auth::check() == true) {
            $count_cart = Cart::where('user_id', Auth::user()->id)->count();
        } else {
            $count_cart = 0;
        }
        $user = User::find($id);
        return view('user.profile', compact('user','count_cart'));
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        if ($user->email == $request->email) {
            $rules = [
                'nama' => ['required', 'string', 'max:255'],
                'alamat' => ['required'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'no_hp' => ['required'],
                'jenis_kelamin' => ['required'],
            ];
        } else {
            $rules = [
                'nama' => ['required', 'string', 'max:255'],
                'alamat' => ['required'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'no_hp' => ['required'],
                'jenis_kelamin' => ['required'],
            ];
        }

        if ($request->filled('password')) {
            $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            if (Auth::user()->role == 'user') {
                return redirect()->route('profile-user', $id)->withErrors($validator)->withInput();
            } else {
                return redirect()->route('profile-admin', $id)->withErrors($validator)->withInput();
            }
        }
        try {
            $data = [
                'nama' => $request->nama,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'jenis_kelamin' => $request->jenis_kelamin,
            ];

            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }

            $user->update($data);
            return redirect()->back()->with('success', 'Berhasil edit profile!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
