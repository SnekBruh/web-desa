@extends('layouts.layout')
@section('title', 'Website Resmi Pemerintah Desa '. App\Desa::find(1)->nama_desa . ' - Statistik Penduduk')

@section('styles')
<meta name="description" content="Statistik Penduduk Desa {{ App\Desa::find(1)->nama_desa }}, Kecamatan {{ App\Desa::find(1)->nama_kecamatan }}, Kabupaten {{ App\Desa::find(1)->nama_kabupaten }}.">
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/accessibility.js"></script>
@endsection

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
        bottom: 0;
        width: 100%;
        z-index: 1000; /* Adjust the z-index as needed to ensure it's above other elements */
    }
</style>

@section('header')
<h1 class="text-white">STATISTIK PENDUDUK</h1>
<p class="text-white">Statistik Penduduk Desa {{ $desa->nama_desa }}, masyarakat dapat dengan mudah mengetahui informasi mengenai statistik penduduk desa {{ $desa->nama_desa }}.</p>
@endsection

@section('content')
<div class="row">
    @include('statistik-penduduk.card')
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/statistik-penduduk.js') }}"></script>
@endpush
