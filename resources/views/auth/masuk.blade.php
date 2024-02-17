@extends('layouts.layout')

@section('title', 'Masuk')

@section('header')
    <!--h1 class="text-primary">Masuk</h1>
    <--p class="text-lead text-dark">Silahkan Masuk Terlebih Dahulu</p-->
@endsection

@section('styles')

<style>
    .animate-up:hover {
        top: -5px;
    }
    /* Background color for content */
    .bg-content {
        background-color: #ffffff; /* Change to the desired color code for white */
    }

    /* Background color for footer */
    .bg-footer {
        background-color: #446d92 /* Change to the desired color code for black */
    }

    /* Text color for footer */
    .text-footer {
        color: #ffffff; /* Change to the desired text color code for white */
    }
    .link-white {
        color: white;
        text-decoration: none; /* Remove underlines from links */
    }

    .link-white:hover {
        color: rgb(21, 21, 71);
    }
    .fixed-footer {
        bottom: 0;
        width: 100%;
        z-index: 1000; /* Adjust the z-index as needed to ensure it's above other elements */
        margin-top: 100px;
    }
    .card{
        color:rgb(21, 21, 71);
    }
</style>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
        <div class="card bg-primary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-white mb-4">
                    <h2 class="text-white">Selamat Datang di Web Desa Gendoang</h2>
                </div>
                <div class="text-center mb-4">
                    <img height="150px" src="{{ url('/storage/logo.png') }}" alt="logo">
                </div>
                <form role="form" action="{{ route('masuk') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                            </div>
                            <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email" type="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                            </div>
                            <input class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" type="password" value="{{ old('password') }}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success my-4">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $(document).on("submit","form", function () {
            $(this).find("button:submit").attr('disabled','disabled');
            $(this).find("button:submit").html(`<img height="20px" src="{{ url('/storage/loading.gif') }}" alt=""> Loading ...`);
        });
    });
</script>
@endpush
