@extends('layouts.user')

@section('content')

    <!--==============================
	  Hero area Start
	==============================-->
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('/landing') }}/img/breadcumb/breadcumb-bg.jpg">
        <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Profile</h1>
            <div class="breadcumb-menu-wrap">
            <ul class="breadcumb-menu">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Profile</li>
            </ul>
            </div>
        </div>
        </div>
    </div>
    <!--==============================
        Hero Area End
        ==============================-->

    <!--==============================
        Checkout Area Start
        ==============================-->
    <section class="vs-checkout-wrapper space">
        <div class="container">
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
            </div>
            <div class="row ">
            <div class="col-lg-12">
                <h2 class="h4">Profile</h2>
                <form action="{{ route('profile-edit',$user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-6 form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}" required>
                            @error('email')
                                <p class="text-danger text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-6 form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="{{ $user->nama }}" required>
                            @error('nama')
                                <p class="text-danger text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                            @error('password')
                                <p class="text-danger text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label">Password Confirmation</label>
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                        <div class="col-6 form-group">
                            <label for="">No Hp</label>
                            <input type="number" name="no_hp" class="form-control" placeholder="No Hp" value="{{ $user->no_hp }}" required>
                            @error('no_hp')
                                <p class="text-danger text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-6 form-group">
                            <label for="">Jenis Kelamin</label>
                            <select class="form-select" name="jenis_kelamin" required>
                                <option selected disabled>- Pilih Jenis Kelamin -</option>
                                @php
                                    $jenis_kelamin = ['laki-laki', 'perempuan'];
                                @endphp
                                @foreach ($jenis_kelamin as $jenis_kelamin)
                                    <option value="{{ $jenis_kelamin }}" {{ ($user->jenis_kelamin == $jenis_kelamin) ? 'selected' : ''; }}>{{ ucwords($jenis_kelamin) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{ $user->alamat }}" required>
                            @error('alamat')
                                <p class="text-danger text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="vs-btn style4" type="submit">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </section>
    <!--==============================
        Checkout Area End
        ==============================-->

@endsection
