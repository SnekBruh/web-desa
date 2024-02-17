@php
    $desa = App\Desa::find(1);
@endphp
<!--

=========================================================
* Argon Dashboard - v1.1.2
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2020 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('') }}">

    <!-- SEO Management-->
    <meta name="author" content="Ksatria Akbar">
    <meta name="keywords" content="">

    <title>@yield('title')</title>

    <!-- Favicon -->
    <link href="{{ asset(Storage::url($desa->logo)) }}" rel="icon" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet">
    <link href="{{ asset('/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- CSS Files -->
    <link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet">

    <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script-->

    @yield('styles')
    <style>
        .logo-desa {
            width: 30px;
            length: 30px;
            margin-right: 5px;
        }

        .h1 {
            margin-right: 10px;
            }

        .navbar-brand {
            margin-left: 10%;
        }
        .navbar-nav.flex-row > .nav-item:not(:last-child) {
            margin-right: 10px; /* Adjust the value as needed */
        }
        .container-content{
            padding: 100px;
            margin-top: 0px;
        }
        .container-carousel{
            padding: 0;
            margin: 0;
            width: 100%;
        }
        .logo-desa{
            width: 50px;
            length: 50px;
            margin-right: 10px;
        }
        .h1{
            margin-right: 350px;
        }
        .container d-flex.flex-row.justify-content-between.align-items-center {
            position: relative; /* Add this line to make it relative */
        }
        .navbar-brand {
            position: absolute;
            margin-left: 27%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
        }
        .navbar-nav.flex-row {
            display: flex;
            align-items: center;
        }
        .bg-footer {
            background-color: #1171e6 /* Change to the desired color code for black */
        }
        .bg-content {
            background-color: #1f3749;
            background-image: linear-gradient(#0d3152,rgba(255, 255, 255, 0.69));
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
    </style>
</head>

<body class="bg-content">
    <div class="main-content">
        <!-- Navbar -->
        <!-- Fixed Top Bar -->
        <div style="position: fixed; top: 0; width: 100%; background-color: #1171e6; padding: 10px 0; z-index: 100;">
            <div class="container d-flex flex-row justify-content-between align-items-center">
                <img src="{{ asset(Storage::url($desa->logo)) }}" alt="Desa Logo" class="logo-desa">
                <a class="navbar-brand" href="{{ url('') }}">
                    <h2 class="h1 text-white"><b>Desa {{ $desa->nama_desa }}</b></h2>
                </a>
                <ul class="navbar-nav flex-row">
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon text-white" href="{{ route('home.index') }}">
                            <i class="fas fa-home"></i>
                            <span class="nav-link-inner--text">Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-icon text-white" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                            <span class="nav-link-inner--text">Profil Desa</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right py-0 overflow-hidden">
                            <a class="dropdown-item" href="{{ route('profil-kepala-desa') }}">
                                <i class="fas fa-fw fa-user text-blue"></i> Profil Kepala Desa
                            </a>
                            <a class="dropdown-item" href="{{ route('struktur-organisasi') }}">
                                <i class="fas fa-fw fa-sitemap text-orange"></i> Struktur Organisasi Desas
                            </a>
                            <a class="dropdown-item" href="{{ route('visi-misi-desa') }}">
                                <i class="fas fa-fw fa-eye text-green"></i> Visi dan Misi Desa
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('about') }}">
                            <i class="fas fa-fw fa-exclamation-circle text-white"></i>
                            <span class="nav-link-inner--text">About</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-icon text-white" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bars"></i> <span class="nav-link-inner--text">Menu Lainnya</span>
                        </a>
                            <div class="dropdown-menu dropdown-menu-right py-0 overflow-hidden">
                                <a class="dropdown-item @if (Request::segment(1) == 'layanan-surat') active @endif" href="{{ route('layanan-surat') }}">
                                    <i class="fas fa-fw fa-file-alt text-yellow"></i>
                                    <span class="nav-link-inner--text">Layanan Surat</span>
                                </a>
                                <a class="dropdown-item @if (Request::segment(1) == 'pemerintahan-desa') active @endif" href="{{ route('pemerintahan-desa') }}">
                                    <i class="fas fa-fw fa-atlas text-success"></i>
                                    <span class="nav-link-inner--text">Pemerintahan Desa</span>
                                </a>
                                <a class="dropdown-item @if (Request::segment(1) == 'berita') active @endif" href="{{ route('berita') }}">
                                    <i class="fas fa-fw fa-newspaper text-cyan"></i>
                                    <span class="nav-link-inner--text">Berita</span>
                                </a>
                                <a class="dropdown-item @if (Request::segment(1) == 'gallery') active @endif" href="{{ route('gallery') }}">
                                    <i class="fas fa-fw fa-images text-orange"></i>
                                    <span class="nav-link-inner--text">Gallery</span>
                                </a>
                                <a class="dropdown-item @if (Request::segment(1) == 'statistik-penduduk') active @endif" href="{{ route('statistik-penduduk') }}">
                                    <i class="fas fa-fw fa-chart-pie text-info"></i>
                                    <span class="nav-link-inner--text">Statistik Penduduk</span>
                                </a>
                                <a class="dropdown-item @if (Request::segment(1) == 'laporan-apbdes') active @endif" href="{{ route('laporan-apbdes') }}">
                                    <i class="fas fa-fw fa-money-check-alt text-success"></i>
                                    <span class="nav-link-inner--text">Laporan APBDes</span>
                                </a>
                            </div>
                        </li>
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-link-icon text-white" href="#" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bars"></i> <span class="nav-link-inner--text">Menu Admin</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right py-0 overflow-hidden">
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                                        <i class="fas fa-fw fa-tachometer-alt text-blue"></i> Dashboard
                                    </a>
                                    <a class="dropdown-item" href="{{ route('penduduk.index') }}">
                                        <i class="fas fa-fw fa-users text-info"></i> Kelola Penduduk
                                    </a>
                                    <a class="dropdown-item" href="{{ route('dusun.index') }}">
                                        <i class="fas fa-fw fa-map-marker-alt text-yellow"></i> Kelola Dusun
                                    </a>
                                    <a class="dropdown-item" href="{{ url('anggaran-realisasi?jenis=pendapatan&tahun='.date('Y')) }}">
                                        <i class="fas fa-fw fa-coins text-success"></i> Kelola APBDes
                                    </a>
                                    <a class="dropdown-item" href="{{ route('surat.index') }}">
                                        <i class="fas fa-fw fa-file-alt text-primary"></i> Kelola Surat
                                    </a>
                                    <a href="{{ route('pemerintahan-desa.index') }}" class="dropdown-item">
                                        <i class="fas fa-fw fa-atlas text-success"></i> Kelola Informasi Pemerintahan Desa
                                    </a>
                                    <a href="{{ route('berita.index') }}" class="dropdown-item">
                                        <i class="fas fa-fw fa-newspaper text-cyan"></i> Kelola Berita
                                    </a>
                                    <a class="dropdown-item" href="{{ route('gallery.index') }}">
                                        <i class="fas fa-fw fa-images text-orange"></i> Kelola Gallery
                                    </a>
                                    <a class="dropdown-item" href="{{ route('slider.index') }}">
                                        <i class="fas fa-fw fa-images text-purple"></i> Kelola Slider
                                    </a>
                                    <a class="dropdown-item" href="{{ route('profil-desa') }}">
                                        <i class="fas fa-fw fa-users text-info"></i> Profil Desa
                                    </a>
                                    <a class="dropdown-item" href="{{ route('profil-kepala-desa.index') }}">
                                        <i class="fas fa-fw fa-user text-blue"></i> Profil Kepala Desa
                                    </a>
                                    <a class="dropdown-item" href="{{ route('profil') }}">
                                        <i class="fas fa-fw fa-user text-yellow"></i> Profil Saya
                                    </a>
                                    <hr class="m-0">
                                    <a class="dropdown-item" href="{{ route('keluar') }}" onclick="event.preventDefault(); document.getElementById('form-keluar').submit();">
                                        <i class="fas fa-fw fa-sign-out-alt"></i> Keluar
                                    </a>
                                    <form id="form-keluar" action="{{ route('keluar') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <!--li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('about') }}">
                                <i class="fas fa-fw fa-exclamation-circle text-white"></i>
                                <span class="nav-link-inner--text">Login Admin</span>
                            </a>
                        </li-->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header and Carousel -->
        <div class="header-carousel-container position-relative">
            <!-- Carousel -->
            <div class="container-carousel p-0 position-absolute mt-5 top-0 start-0 end-0">
                @yield('carousel')
            </div>

            <!-- Header -->
            <div class="container-fluid position-relative z-index-1">
                <div class="header py-7 py-lg-7">
                    <div class="container">
                        <div class="header-body text-center">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 col-md-6">
                                    @yield('header')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-content mt--8 pb-1">
            @yield('content-beranda')
        </div>

        <div class="container">
            @yield('content')
        </div>

        <!--Footer-->
        <footer class="py-5 bg-footer text-footer fixed-footer">
            <div class="container">
                <div class="row align-items-center justify-content-xl-between">
                    <div class="col-xl-6">
                        <div class="copyright text-center text-xl-left text-white">
                            © {{ date('Y') }} <a href="{{ url('') }}" class="font-weight-bold ml-1 link-white" target="_blank">Desa {{ $desa->nama_desa }}</a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="copyright text-center text-xl-right text-white">
                            Powered By <a href="https://github.com/SnekBruh" class="font-weight-bold ml-1 link-white" target="_blank">Akbar KKN</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!--   Core   -->
    <script src="{{ url('/js/plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!--   Optional JS   -->

    <!--   Argon JS   -->
    <script src="{{ url('/js/argon-dashboard.min.js?v=1.1.2') }}"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
        const baseURL = $('meta[name="base-url"]').attr('content');
        window.TrackJS &&
            TrackJS.install({
                token: "ee6fab19c5a04ac1a32a645abde4613a",
                application: "argon-dashboard-free"
            });
    </script>
    @stack('scripts')
</body>

</html>
