@extends('layouts.layout')
@section('title', 'Desa ' . $desa->nama_desa . ' - Struktur Organisasi ' . $struktur_organisasi->judul)

@section('styles')
<meta name="description" content="'Struktur Organisasi' {{ $struktur_organisasi->judul }} Desa {{ $desa->nama_desa }}, Kecamatan {{ $desa->nama_kecamatan }}, Kabupaten {{ $desa->nama_kabupaten }}.">

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
        background-color: #1e33cf; /* Change to the desired color code for black */
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
        left: 0;
        bottom: 0;
        width: 100%;
        z-index: 1000;
    }
</style>
@endsection

@section('header')
<h2 class="text-white text-sm text-muted">STRUKTUR ORGANISASI DESA</h2>
<h1 class="text-white">{{ $struktur_organisasi->judul }}</h1>
@endsection

@section('content')
@if ($struktur_organisasi->gambar)
    <div class="row mb-5">
        <div class="col-md text-center">
            <img class="mw-100" src="{{ url(Storage::url($struktur_organisasi->gambar)) }}" alt="Gambar Struktur Organisasi Desa {{ $struktur_organisasi->judul }}">
        </div>
    </div>
@endif
<div class="card">
    <div class="card-body">
        {!! $struktur_organisasi->konten !!}
    </div>
</div>

@if ($structures->count() > 0)
    <h2 class="text-lead text-dark text-center mt-5">Struktur Organisasi Lainnya</h2>
@endif
<div class="row justify-content-center mt-3">
    @foreach ($structures as $item)
        <div class="col-lg-4 col-md-6 mb-3">
            <div class="card animate-up">
                @if ($item->gambar)
                    <a href="{{ route('struktur-organisasi.show', ['struktur_organisasi' => $item, 'slug' => Str::slug($item->judul)]) }}">
                        <div class="card-img" style="background-image: url('{{ url(Storage::url($item->gambar)) }}'); background-size: cover; height: 200px;">
                        </div>
                    </a>
                @endif
                <div class="card-body text-center">
                    <a href="{{ route('struktur-organisasi.show', ['struktur_organisasi' => $item, 'slug' => Str::slug($item->judul)]) }}">
                        <h3>{{ $item->judul }}</h3>
                        <p class="text-sm text-muted"><i class="fas fa-clock-o"></i> {{ $item->created_at->diffForHumans() }}</p>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
