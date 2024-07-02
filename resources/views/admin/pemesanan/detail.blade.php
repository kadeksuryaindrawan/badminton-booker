@extends('layouts.admin')

@section('content')

        <div class="content-body">
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        @if(session('success'))
                        <div class="alert alert-success solid" role="alert">
                            {{session('success')}}
                        </div>
                        @endif

                        @if(session('error'))
                        <div class="alert alert-danger solid" role="alert">
                            {{session('error')}}
                        </div>
                        @endif
                    </div>
                    <div class="col-xl-12 col-lg-12">
                        <div class="card card-bx">
                            <div class="card-header">
                                <h4 class="title">Detail Pemesanan {{ $pemesanan->transaction_id }}</h4>
                            </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <h5 class="card-title">Data Pemesanan</h5>
                                            <p>Transaction ID : <strong>{{ $pemesanan->transaction_id }}</strong></p>
                                            <p>Tanggal Pemesanan : {{ date("d M Y H:i:s",strtotime($pemesanan->created_at)) }}</p>
                                            <p>Status :
                                                @if ($pemesanan->transaction_status == 'menunggu konfirmasi')
                                                    <span class="badge badge-warning">{{ $pemesanan->transaction_status }}</span>
                                                @elseif($pemesanan->transaction_status == 'terbayar')
                                                    <span class="badge badge-success">{{ $pemesanan->transaction_status }}</span>
                                                @else
                                                    <span class="badge badge-danger">{{ $pemesanan->transaction_status }}</span>
                                                @endif
                                            </p>
                                            <p>Total : Rp. {{ number_format($pemesanan->total,0,",",".") }}</p>
                                            <p>Keterangan :
                                                @if ($pemesanan->keterangan == null)
                                                    -
                                                @else
                                                    {{ $pemesanan->keterangan }}
                                                @endif
                                            </p>
                                            <p>Nama Bank Pelanggan : {{ $pemesanan->nama_bank }}</p>
                                            <p>No Rekening Pelanggan : {{ $pemesanan->no_bank }}</p>
                                            <p>Pemilik Rekening : {{ $pemesanan->pemilik_bank }}</p>
                                            <p>Tanggal Transfer : {{ date("d M Y",strtotime($pemesanan->tanggal_bayar)) }}</p>
                                            <p>Bukti Transfer :
                                                <a class="example-image-link" href="{{ asset('storage/bukti_bayar/'.$pemesanan->bukti_bayar) }}" data-lightbox="example-1">
                                                    <img style="width: 100px; height: 80px; object-fit:cover;" src="{{ asset('storage/bukti_bayar/'.$pemesanan->bukti_bayar) }}" alt="">
                                                </a>
                                            </p>
                                        </div>
                                        <div class="col-lg-8">
                                            <h5 class="card-title">Data Lapangan</h5>
                                            <div class="row">
                                                @foreach ($detail_orders as $detail_order)
                                                    <div class="col-lg-6 mb-4">
                                                        <div class="d-flex justify-content-start align-items-center">
                                                            <div>
                                                                <a class="example-image-link" href="{{ asset('storage/gor/'.$detail_order->lapangan->gor->foto) }}" data-lightbox="example-1">
                                                                    <img style="width: 100px; height: 110px; object-fit:cover;" src="{{ asset('storage/gor/'.$detail_order->lapangan->gor->foto) }}" alt="">
                                                                </a>
                                                            </div>
                                                            <div style="margin-left: 10px;">
                                                                <h5 class="product-name">{{ ucwords($detail_order->lapangan->gor->nama_gor) }} - {{ ucwords($detail_order->lapangan->nama_lapangan) }}</h5>
                                                                <p style="margin-top: -5px;">Tanggal : {{ date("d M Y",strtotime($detail_order->tanggal)) }}</p>
                                                                <p style="margin-top: -15px;">Jadwal : {{ $detail_order->jadwal }}</p>
                                                                <p style="margin-top: -15px;">Total : Rp. {{ number_format($detail_order->total,0,",",".") }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <a href="{{ route('daftar-pemesanan') }}"><button class="btn btn-secondary">Kembali</button></a>
                                            @if ($pemesanan->transaction_status == 'menunggu konfirmasi')
                                                <a href="{{ route('pay-accept',$pemesanan->id) }}" onclick="return confirm('Yakin terima pembayaran?')"><button class="btn btn-success">Terima Pembayaran</button></a>
                                                <a onclick="openCatatanModal()"><button class="btn btn-danger">Tolak Pembayaran</button></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                    <!-- Modal Catatan -->
                    <div class="modal fade" id="catatan-modal" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-lg d-flex justify-content-center">
                            <div class="modal-content w-75">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Keterangan</h5>
                                    <a onclick="closeCatatanModal()" style="cursor: pointer;"><i class="fas fa-times"></i></a>
                                </div>
                                <div class="modal-body p-4">
                                    <form method="POST" action="{{ route('pay-reject',$pemesanan->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="keterangan">Alasan Tolak</label>
                                            <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="10" required></textarea>
                                        </div>

                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->

                    <script>
                        function openCatatanModal(){
                            $('#catatan-modal').modal('show');
                        }
                        function closeCatatanModal(){
                            $('#catatan-modal').modal('hide');
                        }
                    </script>
@endsection
