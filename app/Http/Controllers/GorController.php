<?php

namespace App\Http\Controllers;

use App\Models\Gor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gors = Gor::orderBy('created_at', 'desc')->get();
        return view('admin.gor.index', compact('gors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins = User::select(
            '*','users.id AS admin_id'
        )->where('users.role','admin')
        ->leftJoin("gors", "users.id", "=", "gors.admin_id")
        ->whereNull('gors.admin_id')
        ->orderBy('users.created_at', 'DESC')
        ->get();
        return view('admin.gor.add',compact('admins'));
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
            'admin_id' => ['required'],
            'nama_gor' => ['required', 'string', 'max:255'],
            'alamat' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('gor.create')->withErrors($validator)->withInput();
        }
        try {
            Gor::create([
                "admin_id" => $request->admin_id,
                "nama_gor" => $request->nama_gor,
                "alamat" => $request->alamat,
            ]);
            return redirect()->route('gor.index')->with('success', 'Berhasil tambah gor!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gor  $gor
     * @return \Illuminate\Http\Response
     */
    public function show(Gor $gor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gor  $gor
     * @return \Illuminate\Http\Response
     */
    public function edit(Gor $gor)
    {
        $currentAdminId = $gor->admin_id;
        $admins = User::select(
            '*',
            'users.id AS admin_id'
        )->where('users.role', 'admin')
        ->leftJoin("gors", "users.id", "=", "gors.admin_id")
        ->where(function ($query) use ($currentAdminId) {
            $query->whereNull('gors.admin_id')
            ->orWhere('users.id', $currentAdminId);
        })
        ->orderBy('users.created_at', 'DESC')
        ->get();
        return view('admin.gor.edit', compact('gor','admins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gor  $gor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gor $gor)
    {
        $validator = Validator::make($request->all(), [
            'admin_id' => ['required'],
            'nama_gor' => ['required', 'string', 'max:255'],
            'alamat' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('gor.edit', ['gor' => $gor->id])->withErrors($validator)->withInput();
        }

        try {
            $gor->update([
                "admin_id" => $request->admin_id,
                "nama_gor" => $request->nama_gor,
                "alamat" => $request->alamat,
            ]);
            return redirect()->route('gor.index')->with('success', 'Berhasil edit gor!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gor  $gor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gor $gor)
    {
        $gor->delete();
        return redirect()->back()->with('success', 'Gor berhasil dihapus!');
    }
}
