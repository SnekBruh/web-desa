<?php

namespace App\Http\Controllers;

use App\ProfilKepalaDesa;
use App\Desa;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProfilKepalaDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $profil_kepala_desa = ProfilKepalaDesa::orderBy('id','desc')->paginate(12);

        if ($request->cari) {
            $profil_kepala_desa = ProfilKepalaDesa::where('judul','like',"%{$request->cari}%")
            ->orderBy('id','desc')->paginate(12);
        }

        $profil_kepala_desa->appends($request->only('cari'));
        return view('profil-kepala-desa.index', compact('profil_kepala_desa'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ProfilKepalaDesa(Request $request)
    {
        $profil_kepala_desa = ProfilKepalaDesa::orderBy('id','desc')->paginate(12);
        $desa = Desa::find(1);

        if ($request->cari) {
            $profil_kepala_desa = ProfilKepalaDesa::where('judul','like',"%{$request->cari}%")
            ->orderBy('id','desc')->paginate(12);
        }

        $profil_kepala_desa->appends($request->only('cari'));
        return view('profil-kepala-desa.profil-kepala-desa', compact('profil_kepala_desa','desa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profil-kepala-desa.create');
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

        ProfilKepalaDesa::create($data);

        return redirect()->route('profil-kepala-desa.index')->with('success','Profil berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProfilKepalaDesa  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(ProfilKepalaDesa $profil_kepala_desa, $slug)
    {
        $desa = Desa::find(1);
        $profiles = ProfilKepalaDesa::where('id','!=', $profil_kepala_desa->id)->inRandomOrder()->limit(3)->get();
        if ($slug != Str::slug($profil_kepala_desa->judul)) {
            return abort(404);
        }
        return view('profil-kepala-desa.show', compact('profil_kepala_desa','desa','profiles'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProfilKepalaDesa  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfilKepalaDesa $profil_kepala_desa)
    {
        return view('profil-kepala-desa.edit', compact('profil_kepala_desa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProfilKepalaDesa   $profilupd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfilKepalaDesa $profil_kepala_desa)
    {
        $data = $request->validate([
            'judul'     => ['required','string','max:191'],
            'gambar'    => ['nullable','image','max:2048'],
        ]);

        if ($request->gambar) {
            if ($profil_kepala_desa->gambar) {
                File::delete(storage_path('app/' . $profil_kepala_desa->gambar));
            }
            $data['gambar'] = $request->gambar->store('public/gallery');
        }

        $profil_kepala_desa->update($data);

        return back()->with('success','Profil berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProfilKepalaDesa $beritum
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfilKepalaDesa $profil_kepala_desa)
    {
        $profil_kepala_desa->delete();
        return back()->with('success','Profil berhasil dihapus');
    }
}
