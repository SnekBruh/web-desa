<?php

namespace App\Http\Controllers;

use App\Desa;

class AboutController extends Controller
{
    public function index()
    {
        $desa = Desa::find(1); // Sesuaikan dengan logika untuk mengambil data desa
        return view('about.about', compact('desa'));
    }
    public function showSidebar()
    {
        $desa = Desa::find(1); // Ganti ini dengan cara mendapatkan objek Desa sesuai kebutuhan
        return view('layouts.components.sidebar', ['desa' => $desa]);
    }
}
