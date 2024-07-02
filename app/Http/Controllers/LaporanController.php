<?php

namespace App\Http\Controllers;

use App\Exports\ExportAllExcel;
use App\Exports\ExportFilterExcel;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class LaporanController extends Controller
{
    public function daftar_all_laporan()
    {
        if (Auth::user()->role == 'super admin') {
            $pemesanans = Pemesanan::where('transaction_status','terbayar')->orderBy('created_at', 'desc')->get();
        } else {
            $pemesanans = Pemesanan::where('transaction_status', 'terbayar')->where('admin_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        }
        return view('admin.laporan.index', compact('pemesanans'));
    }

    public function daftar_filter_laporan(Request $request)
    {
        $dari = $request->dari;
        $sampai = $request->sampai;
        $sampai_carbon = Carbon::parse($sampai)->endOfDay();
        if (Auth::user()->role == 'super admin') {
            $pemesanans = Pemesanan::whereBetween('created_at', [$dari, $sampai_carbon])->where('transaction_status', 'terbayar')->orderBy('created_at', 'desc')->get();
        } else {
            $pemesanans = Pemesanan::whereBetween('created_at', [$dari, $sampai_carbon])->where('transaction_status', 'terbayar')->where('admin_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        }
        return view('admin.laporan.index', compact('pemesanans','dari','sampai'));
    }

    public function export_all_pdf()
    {
        if (Auth::user()->role == 'super admin') {
            $pemesanans = Pemesanan::where('transaction_status', 'terbayar')->orderBy('created_at', 'desc')->get();
            $total = Pemesanan::where('transaction_status', 'terbayar')->orderBy('created_at', 'desc')->sum('total');
        } else {
            $pemesanans = Pemesanan::where('transaction_status', 'terbayar')->where('admin_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
            $total = Pemesanan::where('transaction_status', 'terbayar')->where('admin_id', Auth::user()->id)->orderBy('created_at', 'desc')->sum('total');
        }

        $pdfOptions = [
            'isRemoteEnabled' => true,
        ];

        $pdf = PDF::loadView('admin.laporan.pdfview', [
            'pemesanans' =>  $pemesanans,
            'total' => $total,
        ], $pdfOptions)
            ->setPaper('a4', 'portrait');

        return $pdf->download('all-laporan-pemesanan.pdf');
    }

    public function export_filter_pdf(Request $request)
    {
        $dari = $request->dari;
        $sampai = $request->sampai;
        $sampai_carbon = Carbon::parse($sampai)->endOfDay();

        if (Auth::user()->role == 'super admin') {
            $pemesanans = Pemesanan::whereBetween('created_at', [$dari, $sampai_carbon])->where('transaction_status', 'terbayar')->orderBy('created_at', 'desc')->get();
            $total = Pemesanan::whereBetween('created_at', [$dari, $sampai_carbon])->where('transaction_status', 'terbayar')->orderBy('created_at', 'desc')->sum('total');
        } else {
            $pemesanans = Pemesanan::whereBetween('created_at', [$dari, $sampai_carbon])->where('transaction_status', 'terbayar')->where('admin_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
            $total = Pemesanan::whereBetween('created_at', [$dari, $sampai_carbon])->where('transaction_status', 'terbayar')->where('admin_id', Auth::user()->id)->orderBy('created_at', 'desc')->sum('total');
        }

        $pdfOptions = [
            'isRemoteEnabled' => true,
        ];

        $pdf = PDF::loadView('admin.laporan.pdfview', [
            'pemesanans' =>  $pemesanans,
            'total' => $total,
        ], $pdfOptions)
            ->setPaper('a4', 'portrait');

        return $pdf->download('laporan-pemesanan-'.$dari.'-sampai-'.$sampai.'.pdf');
    }

    public function export_all_excel()
    {
        return Excel::download(new ExportAllExcel(), 'all-laporan-pemesanan.xlsx');
    }

    public function export_filter_excel(Request $request)
    {
        $dari = $request->dari;
        $sampai = $request->sampai;
        $sampai_carbon = Carbon::parse($sampai)->endOfDay();
        return Excel::download(new ExportFilterExcel($dari,$sampai_carbon), 'laporan-pemesanan-' . $dari . '-sampai-' . $sampai . '.xlsx');
    }
}
