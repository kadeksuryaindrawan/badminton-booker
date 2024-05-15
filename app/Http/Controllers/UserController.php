<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at','desc')->get();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'no_hp' => ['required'],
            'jenis_kelamin' => ['required'],
            'role' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.create')->withErrors($validator)->withInput();
        }
        try {
            User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'password' => Hash::make($request->password),
                'jenis_kelamin' => $request->jenis_kelamin,
                'role' => $request->role,
            ]);
            return redirect()->route('user.index')->with('success', 'Berhasil tambah user!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($user->email == $request->email) {
            $validator = Validator::make($request->all(), [
                'nama' => ['required', 'string', 'max:255'],
                'alamat' => ['required'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'no_hp' => ['required'],
                'jenis_kelamin' => ['required'],
                'role' => ['required'],
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'nama' => ['required', 'string', 'max:255'],
                'alamat' => ['required'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'no_hp' => ['required'],
                'jenis_kelamin' => ['required'],
                'role' => ['required'],
            ]);
        }

        if ($validator->fails()) {
            return redirect()->route('user.edit', ['user' => $user->id])->withErrors($validator)->withInput();
        }
        try {
            if ($request->password == NULL) {
                $user->update([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'alamat' => $request->alamat,
                    'no_hp' => $request->no_hp,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'role' => $request->role,
                ]);
            } else {
                Validator::make($request->all(), [
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                    'role' => ['required']
                ]);
                $user->update([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'alamat' => $request->alamat,
                    'no_hp' => $request->no_hp,
                    'password' => Hash::make($request->password),
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'role' => $request->role,
                ]);
            }
            return redirect()->route('user.index')->with('success', 'Berhasil edit user!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User berhasil dihapus!');
    }
}
