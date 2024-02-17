<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilKepalaDesa extends Model
{
    protected $table = 'profil_kepala_desa';
    protected $fillable = ['judul', 'gambar'];
    protected $guarded = [];
}
