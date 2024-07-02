<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pemesanan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .badge-warning {
            color: #856404;
            background-color: #fff3cd;
            padding: 3px 7px;
            border-radius: 5px;
        }
        .badge-success {
            color: #155724;
            background-color: #d4edda;
            padding: 3px 7px;
            border-radius: 5px;
        }
        .badge-danger {
            color: #721c24;
            background-color: #f8d7da;
            padding: 3px 7px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center">Laporan Semua Pemesanan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Transaction ID</th>
                <th>Nama Pelanggan</th>
                <th>Nama Bank Pelanggan</th>
                <th>Status</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($pemesanans as $pemesanan)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ date("d M Y H:i:s", strtotime($pemesanan->created_at)) }}</td>
                    <td>{{ ucwords($pemesanan->transaction_id) }}</td>
                    <td>{{ ucwords($pemesanan->user->nama) }}</td>
                    <td>{{ strtoupper($pemesanan->nama_bank) }}</td>
                    <td>
                        @if ($pemesanan->transaction_status == 'menunggu konfirmasi')
                            <span class="badge badge-warning">{{ $pemesanan->transaction_status }}</span>
                        @elseif($pemesanan->transaction_status == 'terbayar')
                            <span class="badge badge-success">{{ $pemesanan->transaction_status }}</span>
                        @else
                            <span class="badge badge-danger">{{ $pemesanan->transaction_status }}</span>
                        @endif
                    </td>
                    <td>Rp. {{ number_format($pemesanan->total, 0, ",", ".") }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="6">Total</td>
                <td>Rp. {{ number_format($total, 0, ",", ".") }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
