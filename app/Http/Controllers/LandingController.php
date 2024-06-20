<?php

namespace App\Http\Controllers;

use App\Models\Gor;
use App\Models\Lapangan;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $gors = Gor::orderBy('created_at','desc')->get();
        return view('index',compact('gors'));
    }

    public function about()
    {
        return view('about');
    }

    public function gor()
    {
        $gors = Gor::orderBy('created_at', 'desc')->get();
        return view('gor', compact('gors'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function lapangan($id)
    {
        $gor = Gor::find($id);
        $lapangans = Lapangan::where('gor_id',$id)->orderBy('created_at','desc')->get();
        return view('lapangan', compact('lapangans','gor'));
    }

    public function detail_lapangan($id)
    {
        $lapangan = Lapangan::find($id);
        return view('detail-lapangan', compact('lapangan'));
    }
}
