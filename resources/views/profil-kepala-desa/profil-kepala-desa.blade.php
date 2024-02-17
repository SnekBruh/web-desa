@extends('layouts.layout')
@section('title', 'Website Resmi Pemerintah Desa '. $desa->nama_desa . ' - Profil Kepala Desa dan Dusun/Dukuh')

@section('styles')
<meta name="description" content="Profil Kepala Desa dan Dusun/Dukuh Gendoang">

<style>
    .animate-up:hover {
        top: -5px;
    }
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
<h1 class="text-white">Profil Kepala Desa dan Dusun/Dukuh</h1>
<p class="text-white">Profil Kepala Desa dan Kepala Dusun/Dukuh {{ $desa->nama_desa }} Tahun 2023/2024</p>
@endsection

@section('content')
<div class="row justify-content-center mb-7">
    @forelse ($profil_kepala_desa as $item)
        <div class="col-lg-4 col-md-6 mb-3">
            <div class="card animate-up shadow">
                <a href="{{ route('profil-kepala-desa.show', ['profil_kepala_desa' => $item, 'slug' => Str::slug($item->judul)]) }}">
                    <div class="card-img" style="background-image: url('{{ $item->gambar ? url(Storage::url($item->gambar)) : url(Storage::url('noimage.jpg')) }}'); background-size: cover; height: 200px;"></div>
                </a>
                <div class="card-body text-center">
                    <a href="{{ route('profil-kepala-desa.show', ['profil_kepala_desa' => $item, 'slug' => Str::slug($item->judul)]) }}">
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
