<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use Illuminate\Http\Request;
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
        $lapangans = Lapangan::orderBy('created_at', 'desc')->get();
        return view('admin.lapangan.index', compact('lapangans'));
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
            'foto' => ['required', 'file', 'mimes:jpg,jpeg,png'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('lapangan.create')->withErrors($validator)->withInput();
        }
        try {
            if ($request->hasFile('foto')) {
                $file = md5(time()) . '_Foto_Lapangan_' . $request->file('foto')->getClientOriginalName();
                $path = $request->file('foto')->storeAs('public/lapangan', $file);
                Lapangan::create([
                    "nama_lapangan" => $request->nama_lapangan,
                    "harga" => $request->harga,
                    "foto" => $file,
                ]);
            } else {
                Lapangan::create([
                    "nama_lapangan" => $request->nama_lapangan,
                    "harga" => $request->harga,
                    "foto" => '',
                ]);
            }

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
        if ($request->hasFile('foto')) {
            $validator = Validator::make($request->all(), [
                'nama_lapangan' => ['required', 'string', 'max:255'],
                'harga' => ['required', 'numeric'],
                'foto' => ['required', 'file', 'mimes:jpg,jpeg,png'],
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'nama_lapangan' => ['required', 'string', 'max:255'],
                'harga' => ['required', 'numeric'],
            ]);
        }

        if ($validator->fails()) {
            return redirect()->route('lapangan.edit', ['lapangan' => $lapangan->id])->withErrors($validator)->withInput();
        }
        try {
            if ($request->hasFile('foto')) {
                unlink(storage_path('app/public/lapangan/' . $lapangan->foto));
                $file = md5(time()) . '_Foto_Lapangan_' . $request->file('foto')->getClientOriginalName();
                $path = $request->file('foto')->storeAs('public/lapangan', $file);
                $lapangan->update([
                    "nama_lapangan" => $request->nama_lapangan,
                    "harga" => $request->harga,
                    "foto" => $file,
                ]);
            } else {
                $lapangan->update([
                    "nama_lapangan" => $request->nama_lapangan,
                    "harga" => $request->harga,
                ]);
            }

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
        unlink(storage_path('app/public/lapangan/' . $lapangan->foto));
        $lapangan->delete();
        return redirect()->back()->with('success', 'Lapangan berhasil dihapus!');
    }
}
