@extends('layouts.user')

@section('content')

    <!--==============================
	  Hero area Start
	==============================-->
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('landing') }}/img/breadcumb/breadcumb-bg.jpg">
        <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Detail Lapangan</h1>
            <div class="breadcumb-menu-wrap">
            <ul class="breadcumb-menu">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Detail Lapangan</li>
            </ul>
            </div>
        </div>
        </div>
    </div>
    <!--==============================
        Hero Area End
        ==============================-->

    <!--==============================
        Shop Details Start
        ==============================-->
    <section class="vs-product-wrapper space">
        <div class="container">
        <div class="product-details">
            <div class="row gx-60">
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
            <div class="col-lg-5">
                <div class="product-big-img">
                    <div class="img"><img style="width: 100%; height: 500px; object-fit:cover;" src="{{ asset('storage/gor/'.$lapangan->gor->foto) }}" alt="Product Image"></div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="product-about">
                    <h2 class="product-title">
                        {{ ucwords($lapangan->nama_lapangan) }}
                    </h2>
                    <h3 class="product-text">
                        {{ ucwords($lapangan->gor->nama_gor) }}
                    </h3>
                    <p class="product-price">Rp.{{ number_format($lapangan->harga,0,",",".") }}/Jam</p>

                    <form action="{{ route('add-cart') }}" method="POST">
                        @csrf
                        <label for="tanggal">Pilih Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" class="form-control" required><br>
                        <input type="hidden" name="lapangan_id" id="lapangan_id" value="{{ $lapangan->id }}">
                        <div id="jadwal">

                        </div>

                        <button  type="submit" class="vs-btn style4 mt-4">Add to cart</button>
                    </form>

                </div>
            </div>
            </div>
        </div>
        </div>
        </div>
    </section>
    <!--==============================
        Shop Details End
        ==============================-->

    <script>
        $(document).ready(function() {
            $('#tanggal').on('change', function() {
                var selectedDate = $(this).val();
                var lapanganId = $('#lapangan_id').val();
                if (selectedDate) {
                    $.ajax({
                        url: '{{ route('get-jam') }}',
                        type: 'GET',
                        data: {
                            tanggal: selectedDate,
                            lapanganId: lapanganId
                        },
                        success: function(data) {
                            var jadwal = $('#jadwal');
                            jadwal.empty();
                            jadwal.append(data);
                        },
                        error: function(xhr) {
                            console.error('Error:', xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>

@endsection
