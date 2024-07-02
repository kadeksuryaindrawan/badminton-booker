@extends('layouts.admin')

@section('content')

        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
                            <div class="card-body py-5">
                                <h3>Selamat datang di dashboard BADMINTON BOOKER, <span class="text-primary">{{ Auth::user()->nama }}</span></h3>
                                <a href="{{ route('profile-admin',Auth::user()->id) }}"><button class="btn btn-primary mt-2">Profile</button></a>
                            </div>
                        </div>
					</div>

				</div>
            </div>
        </div>

@endsection
