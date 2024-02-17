@extends('layouts.layout')
@section('title', 'Website Resmi Pemerintah Desa '. $desa->nama_desa  .' - Beranda')

@section('styles')
<meta name="description" content="Website Resmi Pemerintah Desa {{ $desa->nama_desa }}, Kecamatan {{ $desa->nama_kecamatan }}, Kabupaten {{ $desa->nama_kabupaten }}. Melayani pembuatan surat keterangan secara online">

<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
<link rel="stylesheet" href="{{ asset('/css/style.css') }}" >
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Signika' rel='stylesheet'>
<style>
    .ikon {
        font-family: fontAwesome;
    }
    .card-carousel h1{
        font-size: 40px;
        text-align: center;
        font-weight: bold;
    }
    .progress-label > span {
        color: white;
    }

    .progress-percentage > span {
        color: white;
    }

    .judul {
        color: white;
    }

    .animate-up:hover {
        top: -5px;
    }

    /* Text color for top bar */
    .text-topbar {
        color: #ffffff; /* Change to the desired text color code for white */
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
    #owl-one {
        width: 100%;
        margin: 0;
        padding: 0;
        z-index: 0;
    }
    .owl-carousel {
        width: 100%;
    }
    .container-judul{
        width: 400px;
        text-align: center;
        padding: 10px;
        border: 2px solid;
        outline-color: #ffffff;

    }
    .container-map{
        width: 400px;
        text-align: center;
        justify-content: center;
        padding: 10px;
        margin: 0 auto;
        margin-bottom: 10px;
        border: 2px solid;
        outline-color: #ffffff;
    }
    .penjelasan{
        font-weight: bold;
    }
    .text-con{
        width: 400px;
        text-align: center;
        margin-top: 20px;
        text-shadow: 3px 2px 1px #959090
    }
    .h1{
        font-weight: bold;
    }
    .selamat{
        font-weight: bold;
        font-family: roboto slab;
        margin-top: 0;
        opacity: 1;
    }
    .ket{
        font-weight: bold;
        font-family: Signika;
        font-size: 25px;
        text-shadow: 3px 2px 1px grey;
        opacity: 1;
    }
    .border-bottom{
        margin-right: 150px;
    }
</style>
@endsection

@section('header')
<div class="card-carousel">
    <div class="selamat">
        <h1 class="text-white mt-7" style="text-shadow: 3px 2px 1px grey;font-size: 40px; text-align:center;">SELAMAT DATANG DI WEBSITE RESMI DESA GENDOWANG</h1>
    </div>
    <div class="ket">
        <h2 class="text-lead text-light">DESA {{ Str::upper($desa->nama_desa) }} , KECAMATAN {{ Str::upper($desa->nama_kecamatan) }} , KABUPATEN {{ Str::upper($desa->nama_kabupaten) }}</h2>
    </div>
</div>
@endsection

@section('carousel')
<div class="row" style="">
    <div class="col-xl">
        <div class="owl-carousel owl-theme" id="owl-one" style="z-index: 0">
            @foreach($gallery as $key => $item)
                <div class="item">
                    <a class="text-center" href="{{ asset(Storage::url($item->gallery)) }}" data-caption="{{ $item->caption }}" data-fancybox>
                        <img src="{{ asset(Storage::url($item->gallery)) }}" alt="Slide Show {{ $key }}" style="height:100vh; max-width:100%; object-fit: relative; background-image: cover; filter: brightness(50%);">
                        <!--p class="text-center text-dark mt-2">{{ $item->caption }}</p-->
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('content-beranda')
@if ($surat->count() > 0)
<!--section class="mb-5">
    <div class="row">
        <div class="col-md">
            <div class="header-body text-center mt-5 mb-3">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 border-bottom">
                        <h2 class="text-dark">LAYANAN SURAT</h2>
                        <p class="penjelasan text-dark text-con">Dengan menggunakan layanan surat website Desa {{ $desa->nama_desa }}, masyarakat dapat dengan mudah membuat beberapa surat keterangan berikut ini secara online.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4 justify-content-center">
        @foreach ($surat as $item)
            <div class="col-lg-4 col-md-6 surats">
                <div class="single-service bg-white rounded shadow p-3 animate-up">
                    <a href="{{ route('buat-surat', ['id' => $item->id,'slug' => Str::slug($item->nama)]) }}">
                        <i class="fas {{ $item->icon }} ikon fa-5x mb-3"></i>
                        <h4>{{ $item->nama }}</h4>
                    </a>
                    <p>{{ $item->deskripsi }}</p>
                </div>
            </div>
        @endforeach
        @if (App\Surat::count() > 3)
            <a href="{{ route('layanan-surat') }}" class="btn btn-primary">Lebih Banyak Surat</a>
        @endif
    </div>
</section-->
@endif
<!--div class="card shadow h-100 mb-5" style="margin-top:100px">
    <div class="card-header">
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
            <div class="mb-1">
                <h2 class="mb-0">Grafik Pelaksanaan APBDes</h2>
            </div>
            <div class="mb-1">
                Tahun : <input type="number" name="tahun-apbdes" id="tahun-apbdes" class="form-control-sm" value="{{ date('Y') }}" style="width:80px">
                <img id="loading-tahun" src="{{ asset(Storage::url('loading.gif')) }}" alt="Loading" height="20px" style="display: none">
            </div>
        </div>
    </div>
    <div class="card-body bg-default text-white">
        @include('anggaran-realisasi.grafik-apbdes')
    </div>
</div-->
@if ($berita->count() > 0)
    <section class="mb-3 mt-7">
        <div class="row" style="margin-top: 35%; margin-left: 140px">
            <div class="col-md">
                <div class="header-body text-center mt-5 mb-3">
                    <div class="row justify-content-center">
                        <div class="border-bottom">
                            <h2 class="container-judul text-white bg-primary">Berita</h2>
                            <p class="penjelasan text-white text-con">Berita Desa {{ $desa->nama_desa }}, masyarakat dapat dengan mudah mengetahui informasi seputar berita desa {{ $desa->nama_desa }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($berita as $item)
                <div class="col-lg-3 col-md-6 mb-3">
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
            @endforeach
        </div>
        @if (App\Berita::count() > 3)
            <div class="text-center">
                <a href="{{ route('berita') }}" class="btn btn-primary">Lebih Banyak Berita</a>
            </div>
        @endif
    </section>
@endif
@if ($pemerintahan_desa->count() > 0)
    <section class="mb-5">
        <div class="row" style="margin-left: 125px">
            <div class="col-md">
                <div class="header-body text-center mb-3">
                    <div class="row justify-content-center">
                        <div class="border-bottom">
                            <h2 class="container-judul text-white bg-primary">Pemerintahan Desa</h2>
                            <p class="penjelasan text-white text-con">Pemerintahan Desa {{ $desa->nama_desa }}, masyarakat dapat dengan mudah mengetahui informasi seputar pemerintahan desa {{ $desa->nama_desa }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($pemerintahan_desa as $item)
                <div class="col-lg-3 col-md-6 mb-3">
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
            @endforeach
        </div>
        @if (App\PemerintahanDesa::count() > 3)
            <div class="text-center">
                <a href="{{ route('pemerintahan-desa') }}" class="btn btn-primary">Lebih Banyak Informasi Pemerintahan Desa</a>
            </div>
        @endif
    </section>
@endif
@if (count($galleries) > 0)
    <section class="mb-5">
        <div class="row" style="margin-left: 150px">
            <div class="col-md">
                <div class="header-body text-center mt-3 mb-3">
                    <div class="row justify-content-center">
                        <div class="border-bottom">
                            <h2 class="container-judul text-white bg-primary">Gallery</h2>
                            <p class="penjelasan text-white text-con">Gallery Desa {{ $desa->nama_desa }}, masyarakat dapat dengan mudah mengetahui gallery desa {{ $desa->nama_desa }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($galleries as $key => $item)
                @if ($key < 3)
                    @if ($item['jenis'] == 1)
                        <div class="col-lg-3 col-md-6 mb-3 img-scale-up">
                            <a href="{{ url(Storage::url($item['gambar'])) }}" data-fancybox data-caption="{{ $item['caption'] }}">
                                <img class="mw-100" src="{{ url(Storage::url($item['gambar'])) }}" alt="">
                            </a>
                        </div>
                    @else
                        <div class="col-lg-4 col-md-6 mb-3 img-scale-up">
                            <a href="https://www.youtube.com/watch?v={{ $item['id'] }}" data-fancybox data-caption="{{ $item['caption'] }}">
                                <i class="fas fa-play fa-2x" style="position: absolute; top:43%; left:46%;"></i>
                                <img class="mw-100" src="{{ $item['gambar'] }}" alt="">
                            </a>
                        </div>
                    @endif
                @endif
            @endforeach
        </div>
        @if (count($galleries) > 3)
            <div class="text-center">
                <a href="{{ route('gallery') }}" class="btn btn-primary">Lebih Banyak Gallery</a>
            </div>
        @endif
    </section>
@endif
<!--iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31599.41679812257!2d113.7189174164237!3d-8.108905637778197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6953778add047%3A0x71944989e3c29684!2sArjasa%2C%20Kabupaten%20Jember%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1596496940461!5m2!1sid!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe-->
<div style="text-align:center;">
    <h2 class="container-map text-white bg-primary">Map Gendowang</h2>
    <iframe class="pb-2" width="400" height="400" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!11583672765817996!2d109.22298329853865!3d-7.1049048863746425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6feb7f24c718e9%3A0x7bb12d5505955eac!2sGendowang%2C%20Moga%2C%20Pemalang%20Regency%2C%20Central%20Java!5e0!3m2!1sen!2sid!4v1705237489217!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('js/apbdes.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#owl-one').owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            smartSpeed: 1000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
    });

</script>
@endpush
