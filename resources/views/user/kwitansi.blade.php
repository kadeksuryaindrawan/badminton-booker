<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kwitansi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h3.text-center {
            text-align: center;
        }
        .d-flex {
            display: flex;
            justify-content: space-between;
        }
        .justify-content-between {
            justify-content: space-between;
        }
        .mb-3 {
            margin-bottom: 1rem;
        }
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }
        .cart_table {
            width: 100%;
            border-collapse: collapse;
        }
        .cart_table th, .cart_table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .cart_table th {
            background-color: #f2f2f2;
            text-align: left;
        }
        .cart_totals {
            width: 100%;
            border-collapse: collapse;
        }
        .cart_totals td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .summary-title {
            margin-top: 20px;
        }
        .amount {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h3 class="text-center">KWITANSI {{ $pemesanan->transaction_id }}</h3>
    <div class="d-flex justify-content-between mb-3">
        <div>
            <p>Nama Pemesan : {{ ucwords($pemesanan->user->nama) }}</p>
            <p>Transaction ID : <strong>{{ $pemesanan->transaction_id }}</strong></p>
            <p>Tanggal Pemesanan : {{ date("d M Y H:i:s", strtotime($pemesanan->created_at)) }}</p>
            <p>Status : <span style="font-weight: 600; color:green;">{{ strtoupper($pemesanan->transaction_status) }}</span>
            </p>

        </div>
        {{-- <div>
            p>Nama Bank Pelanggan : {{ $pemesanan->nama_bank }}</p>
            p>No Rekening Pelanggan : {{ $pemesanan->no_bank }}</p>
            p>Pemilik Rekening : {{ $pemesanan->pemilik_bank }}</p>
            p>Tanggal Transfer : {{ date("d M Y H:i:s", strtotime($pemesanan->tanggal_bayar)) }}</p>
        </div> --}}
    </div>
    <div class="table-responsive">
        <table class="cart_table">
            <thead>
                <tr>
                    <th class="cart-col-gor">Gor</th>
                    <th class="cart-col-productname">Lapangan</th>
                    <th class="cart-col-price">Tanggal Booking</th>
                    <th class="cart-col-quantity">Jadwal</th>
                    <th class="cart-col-total">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail_orders as $detail_order)
                    <tr class="detail_order_item">
                        <td data-title="gor">
                            <span>{{ ucwords($detail_order->lapangan->gor->nama_gor) }}</span>
                        </td>
                        <td data-title="lapangan">
                            {{ ucwords($detail_order->lapangan->nama_lapangan) }}
                        </td>
                        <td data-title="tanggal">
                            <span class="tanggal">{{ date("d M Y", strtotime($detail_order->tanggal)) }}</span>
                        </td>
                        <td data-title="jadwal">
                            <span class="jadwal">{{ $detail_order->jadwal }}</span>
                        </td>
                        <td data-title="Total">
                            <span class="amount">Rp. {{ number_format($detail_order->total, 0, ",", ".") }}</span>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4">Total</td>
                    <td data-title="Cart Total">
                        <span class="amount">Rp. {{ number_format($total, 0, ",", ".") }}</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
