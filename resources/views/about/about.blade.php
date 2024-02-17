@extends('layouts.layout')

@section('title', 'About Desa Gendoang')

<style>
    .animate-up:hover {
        top: -5px;
    }
    /* Background color for content */
    .bg-content {
        background-color: blue;
        background-image: linear-gradient(#0b2843,rgb(188, 165, 165));
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
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        z-index: 1000;
    }
    .about {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>

@section('content')
    <div class="container">
        <h1 class="text-center text-white mb-5" style="margin-bottom 20%;">About Desa Gendowang</h1>

        <div class="row">
            <div class="col-md-4">
                <!-- Tampilkan logo desa -->
                <img src="{{ asset(Storage::url($desa->logo)) }}" alt="Desa Logo" class="img-fluid rounded">
            </div>
            <div class="col-md-7">
                <h3 class="text-white mb-3">Desa {{ $desa->nama_desa }}</h3>
                <div class="about">
                    <p><strong>Location:</strong> Kec. {{ $desa->nama_kecamatan }}, Kab. {{ $desa->nama_kabupaten }}</p>
                    <p><strong>Alamat:</strong> {{ $desa->alamat }}</p>
                    <p><strong>Nama Kepala Desa:</strong> {{ $desa->nama_kepala_desa }}</p>
                    <p><strong>Alamat Kepala Desa:</strong> {{ $desa->alamat_kepala_desa }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{ asset('js/jquery.fancybox.js') }}"></script>
@endpush
