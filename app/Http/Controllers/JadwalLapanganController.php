<?php

namespace App\Http\Controllers;

use App\Models\JadwalLapangan;
use App\Models\Lapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JadwalLapanganController extends Controller
{
    public function index($lapangan_id)
    {
        $jadwals = JadwalLapangan::where('lapangan_id',$lapangan_id)->orderBy('jadwal','asc')->get();
        $lapangan = Lapangan::find($lapangan_id);
        return view('admin.jadwal.index',compact('jadwals','lapangan'));
    }

    public function tambah($lapangan_id)
    {
        $lapangan = Lapangan::find($lapangan_id);
        return view('admin.jadwal.add', compact('lapangan'));
    }

    public function add(Request $request, $lapangan_id)
    {
        $validator = Validator::make($request->all(), [
            'jadwal' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('tambah-jadwal',$lapangan_id)->withErrors($validator)->withInput();
        }
        try {
            JadwalLapangan::create([
                "lapangan_id" => $lapangan_id,
                "jadwal" => $request->jadwal,
            ]);
            return redirect()->route('daftar-jadwal',$lapangan_id)->with('success', 'Berhasil tambah jadwal!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit($id)
    {
        $jadwal = JadwalLapangan::find($id);
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = JadwalLapangan::find($id);
        $validator = Validator::make($request->all(), [
            'jadwal' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('edit-lapangan', $id)->withErrors($validator)->withInput();
        }
        try {
            $jadwal->update([
                "jadwal" => $request->jadwal,
            ]);

            return redirect()->route('daftar-jadwal',$jadwal->lapangan_id)->with('success', 'Berhasil edit jadwal!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function hapus($id)
    {
        $jadwal = JadwalLapangan::find($id);
        $jadwal->delete();
        return redirect()->back()->with('success', 'Jadwal berhasil dihapus!');
    }
}
