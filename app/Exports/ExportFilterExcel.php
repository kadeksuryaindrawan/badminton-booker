<?php

namespace App\Exports;

use App\Models\Pemesanan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportFilterExcel implements FromCollection, WithHeadings, WithStyles, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $dari,$sampai_carbon;

    public function __construct($dari,$sampai_carbon)
    {
        $this->dari = $dari;
        $this->sampai_carbon = $sampai_carbon;
    }
    public function collection()
    {
        if (Auth::user()->role == 'super admin') {
            return Pemesanan::whereBetween('created_at', [$this->dari, $this->sampai_carbon])->where('transaction_status', 'terbayar')->orderBy('created_at', 'desc')->get();
        } else {
            return Pemesanan::whereBetween('created_at', [$this->dari, $this->sampai_carbon])->where('transaction_status', 'terbayar')->where('admin_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        }
    }

    public function map($pemesanan): array
    {
        return [
            $pemesanan->created_at->format('Y-m-d H:i:s'),
            $pemesanan->transaction_id,
            $pemesanan->user->nama,
            $pemesanan->nama_bank,
            $pemesanan->transaction_status,
            $pemesanan->total

        ];
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Transaction ID',
            'Nama Pelanggan',
            'Nama Bank Pelanggan',
            'Status',
            'Total',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getColumnDimension('A')->setWidth(25);
        $sheet->getColumnDimension('B')->setWidth(25);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(15);
        $sheet->getColumnDimension('E')->setWidth(15);
        $sheet->getColumnDimension('F')->setWidth(25);
        $sheet->getStyle('A:F')->getAlignment()->setWrapText(true);
        $sheet->getStyle('A:F')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A:F')->getAlignment()->setVertical('center');
    }
}
