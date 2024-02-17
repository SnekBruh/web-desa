@extends('layouts.layout')
@section('title', 'Website Resmi Pemerintah Desa '. $desa->nama_desa . ' - Struktur Organisasi Desa')

@section('styles')
<meta name="description" content="Struktur Organisasi Desa Gendoang">

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
        left: 0;
        bottom: 0;
        width: 100%;
        z-index: 1000;
    }
</style>
@endsection

@section('header')
<h1 class="text-white">Struktur Organisasi Desa</h1>
<p class="text-white">Struktur Organisasi Desa {{ $desa->nama_desa }} Tahun 2023/2024</p>
@endsection

@section('content')
<div class="row justify-content-center mb-9">
    @forelse ($struktur_organisasi as $item)
        <div class="col-lg-4 col-md-6 mb-3">
            <div class="card animate-up shadow">
                <a href="{{ route('struktur-organisasi.show', ['struktur_organisasi' => $item, 'slug' => Str::slug($item->judul)]) }}">
                    <div class="card-img" style="background-image: url('{{ $item->gambar ? url(Storage::url($item->gambar)) : url(Storage::url('noimage.jpg')) }}'); background-size: cover; height: 200px;"></div>
                </a>
                <div class="card-body text-center">
                    <a href="{{ route('struktur-organisasi.show', ['struktur_organisasi' => $item, 'slug' => Str::slug($item->judul)]) }}">
                        <h3>{{ $item->judul }}</h3>
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col">
            <div class="card">
                <div class="card-body text-center">
                    <h3>Data belum tersedia</h3>
                </div>
            </div>
        </div>
    @endforelse
</div>
@endsection
