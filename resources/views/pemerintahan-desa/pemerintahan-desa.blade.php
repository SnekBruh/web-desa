@extends('layouts.layout')
@section('title', 'Website Resmi Pemerintah Desa '. $desa->nama_desa . ' - Pemerintahan Desa')

@section('styles')
<meta name="description" content="Macam-macam sejarah Desa {{ $desa->nama_desa }}, Kecamatan {{ $desa->nama_kecamatan }}, Kabupaten {{ $desa->nama_kabupaten }}.">

<style>
    .animate-up:hover {
        top: -5px;
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
        margin-top:20%;
        bottom: 0;
        width: 100%;
        z-index: 1000; /* Adjust the z-index as needed to ensure it's above other elements */
        }
    .card-data{
        background-color: white;
    }
</style>
@endsection

@section('header')
<h1 class="text-white">PEMERINTAHAN DESA</h1>
<p class="text-white">Pemerintahan Desa {{ $desa->nama_desa }}, masyarakat dapat dengan mudah mengetahui informasi seputar pemerintahan desa {{ $desa->nama_desa }}.</p>
@endsection

@section('content')
<div class="row justify-content-center">

    @forelse ($pemerintahan_desa as $item)
        <div class="col-lg-4 col-md-6 mb-3">
            <div class="card animate-up shadow">
                <a href="{{ route('pemerintahan-desa.show', ['pemerintahan_desa' => $item, 'slug' => Str::slug($item->judul)]) }}">
                    <div class="card-img" style="background-image: url('{{ $item->gambar ? url(Storage::url($item->gambar)) : url(Storage::url('noimage.jpg')) }}'); background-size: cover; height: 200px;"></div>
                </a>
                <div class="card-body text-center">
                    <a href="{{ route('pemerintahan-desa.show', ['pemerintahan_desa' => $item, 'slug' => Str::slug($item->judul)]) }}">
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
            <div class="card-data">
                <div class="card-body text-center" style="margin-bottom:20%;">
                    <h3>Data belum tersedia</h3>
                </div>
            </div>
        </div>
    @endforelse
    <div class="col-12">
        {{ $pemerintahan_desa->links() }}
    </div>
</div>
@endsection