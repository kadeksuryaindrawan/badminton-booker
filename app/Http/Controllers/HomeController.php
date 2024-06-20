<?php

namespace App\Http\Controllers;

use App\Models\Gor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'super admin' || Auth::user()->role == 'admin') {
            return view('admin.dashboard.index');
        }
        else{
            $gors = Gor::orderBy('created_at', 'desc')->get();
            return view('index',compact('gors'));
        }

    }
}
