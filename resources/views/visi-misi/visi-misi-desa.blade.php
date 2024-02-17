@extends('layouts.layout')

@section('title', 'Visi dan Misi Desa Gendoang')

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
        background-color: #1e33cf;
    }

    /* Text color for footer */
    .bg-footer {
        background-color: #446d92
    }
    .link-white {
        color: white;
        text-decoration: none;
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
    .vision-mission {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .vision-mission h4 {
        font-size: 18px;
        color: #333;
    }

    .vision-mission p {
        font-size: 16px;
        color: #666;
    }
</style>

@section('content')
<div class="container">
    <h1 class="text-center text-white mb-5" style="margin-bottom 20%;">Visi dan Misi Desa Gendoang</h1>

    <div class="row">
        <div class="col-md-4">
            <!-- Tampilkan logo desa -->
            <img src="{{ asset(Storage::url($desa->logo)) }}" alt="Desa Logo" class="img-fluid rounded">
        </div>
        <div class="col-md-7">
            <h3 class="mb-3 text-white">Desa {{ $desa->nama_desa }}</h3>
            <div class="vision-mission">
                <h4>Visi:</h4>
                <p class="font-italic">{{ $desa->visi }}</p>
                <h4>Misi:</h4>
                <p class="font-italic">{{ $desa->misi }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/jquery.fancybox.js') }}"></script>
@endpush
