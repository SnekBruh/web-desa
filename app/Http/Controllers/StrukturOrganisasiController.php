<?php

namespace App\Http\Controllers;

use App\StrukturOrganisasi;
use App\Desa;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class StrukturOrganisasiController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $struktur_organisasi = StrukturOrganisasi::orderBy('id','desc')->paginate(12);

        if ($request->cari) {
            $struktur_organisasi = StrukturOrganisasi::where('judul','like',"%{$request->cari}%")
            ->orderBy('id','desc')->paginate(12);
        }

        $struktur_organisasi->appends($request->only('cari'));
        return view('struktur-organisasi.index', compact('struktur_organisasi'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function StrukturOrganisasi(Request $request)
    {
        $struktur_organisasi = StrukturOrganisasi::orderBy('id','desc')->paginate(12);
        $desa = Desa::find(1);

        if ($request->cari) {
            $berita = StrukturOrganisasi::where('judul','like',"%{$request->cari}%")
            ->orderBy('id','desc')->paginate(12);
        }

        $struktur_organisasi->appends($request->only('cari'));
        return view('struktur-organisasi.struktur-organisasi', compact('struktur_organisasi','desa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('struktur-organisasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'judul'     => ['required','string','max:191'],
            'gambar'    => ['nullable','image','max:2048'],
        ]);

        if ($request->gambar) {
            $data['gambar'] = $request->gambar->store('public/gallery');
        }

        StrukturOrganisasi::create($data);

        return redirect()->route('struktur-organisasi.index')->with('success','Struktur Organisasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StrukturOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function show(StrukturOrganisasi $struktur_organisasi, $slug)
    {
        $desa = Desa::find(1);
        $structures = StrukturOrganisasi::where('id','!=', $struktur_organisasi->id)->inRandomOrder()->limit(3)->get();
        if ($slug != Str::slug($struktur_organisasi->judul)) {
            return abort(404);
        }
        return view('struktur-organisasi.show', compact('struktur_organisasi','desa','structures'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StrukturOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(StrukturOrganisasi $struktur_organisasi)
    {
        return view('struktur-organisasi.edit', compact('struktur_organisasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StrukturOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StrukturOrganisasi $struktur_organisasi)
    {
        $data = $request->validate([
            'judul'     => ['required','string','max:191'],
            'gambar'    => ['nullable','image','max:2048'],
        ]);

        if ($request->gambar) {
            if ($struktur_organisasi->gambar) {
                File::delete(storage_path('app/' . $struktur_organisasi->gambar));
            }
            $data['gambar'] = $request->gambar->store('public/gallery');
        }

        $struktur_organisasi->update($data);

        return back()->with('success','Struktur Organisasi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StrukturOrganisasi  $beritum
     * @return \Illuminate\Http\Response
     */
    public function destroy(StrukturOrganisasi $struktur_organisasi)
    {
        $struktur_organisasi->delete();
        return back()->with('success','Struktur Organisasi berhasil dihapus');
    }
}
