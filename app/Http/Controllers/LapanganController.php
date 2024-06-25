<?php

namespace App\Http\Controllers;

use App\Models\Gor;
use App\Models\JadwalLapangan;
use App\Models\Lapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin_id = Auth::user()->id;
        $gor = Gor::where('admin_id',$admin_id)->first();
        if($gor == NULL){
            $gor_id = NULL;
        }
        else{
            $gor_id = $gor->id;
        }
        $lapangans = Lapangan::where('gor_id', $gor_id)->orderBy('created_at', 'desc')->get();
        return view('admin.lapangan.index', compact('lapangans','gor_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lapangan.add');
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
            'nama_lapangan' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('lapangan.create')->withErrors($validator)->withInput();
        }
        try {
            $admin_id = Auth::user()->id;
            $gor = Gor::where('admin_id', $admin_id)->first();
            $gor_id = $gor->id;
            Lapangan::create([
                "gor_id" => $gor_id,
                "nama_lapangan" => $request->nama_lapangan,
                "harga" => $request->harga,
            ]);
            return redirect()->route('lapangan.index')->with('success', 'Berhasil tambah lapangan!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lapangan  $lapangan
     * @return \Illuminate\Http\Response
     */
    public function show(Lapangan $lapangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lapangan  $lapangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Lapangan $lapangan)
    {
        return view('admin.lapangan.edit', compact('lapangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lapangan  $lapangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lapangan $lapangan)
    {
        $validator = Validator::make($request->all(), [
            'nama_lapangan' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('lapangan.edit', ['lapangan' => $lapangan->id])->withErrors($validator)->withInput();
        }
        try {
            $lapangan->update([
                "nama_lapangan" => $request->nama_lapangan,
                "harga" => $request->harga,
            ]);

            return redirect()->route('lapangan.index')->with('success', 'Berhasil edit lapangan!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lapangan  $lapangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lapangan $lapangan)
    {
        JadwalLapangan::where('lapangan_id',$lapangan->id)->delete();
        $lapangan->delete();
        return redirect()->back()->with('success', 'Lapangan berhasil dihapus!');
    }
}
