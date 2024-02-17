@extends('layouts.layout')
@section('title', 'Website Resmi Pemerintah Desa '. $desa->nama_desa . ' - Berita')

@section('styles')
<meta name="description" content="Macam-macam berita Desa {{ $desa->nama_desa }}, Kecamatan {{ $desa->nama_kecamatan }}, Kabupaten {{ $desa->nama_kabupaten }}.">

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
        left: 0;
        bottom: 0;
        width: 100%;
        z-index: 1000;
    }
</style>
@endsection

@section('header')
<h1 class="text-white">BERITA GENDOANG</h1>
<p class="text-light">Berita Desa {{ $desa->nama_desa }}, masyarakat dapat dengan mudah mengetahui informasi seputar berita desa {{ $desa->nama_desa }}</p>
@endsection

@section('content')
<div class="row justify-content-center">
    @forelse ($berita as $item)
        <div class="col-lg-4 col-md-6 mb-3">
            <div class="card animate-up shadow">
                <a href="{{ route('berita.show', ['berita' => $item, 'slug' => Str::slug($item->judul)]) }}">
                    <div class="card-img" style="background-image: url('{{ $item->gambar ? url(Storage::url($item->gambar)) : url(Storage::url('noimage.jpg')) }}'); background-size: cover; height: 200px;"></div>
                </a>
                <div class="card-body text-center">
                    <a href="{{ route('berita.show', ['berita' => $item, 'slug' => Str::slug($item->judul)]) }}">
                        <h3>{{ $item->judul }}</h3>
                        <div class="mt-3 d-flex justify-content-between text-sm text-muted">
                            <i class="fas fa-clock"> {{ $item->created_at->diffForHumans() }}</i>
                            <i class="fas fa-eye"> {{ $item->dilihat }} Kali Dibaca</i>
                        </div>
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
