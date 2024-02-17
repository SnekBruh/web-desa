<?php

use App\Desa;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Desa::create([
            'nama_desa'         => 'Gendoang',
            'nama_kecamatan'    => 'Moga',
            'nama_kabupaten'    => 'Pemalang',
            'alamat'            => 'Karanganyar, Gendowang, Kec. Moga, Kabupaten Pemalang, Jawa Tengah 52354',
            'nama_kepala_desa'  => "Nur Aufa Sidiq",
            'alamat_kepala_desa'=> "Karanganyar, Gendowang, Kec. Moga, Kabupaten Pemalang, Jawa Tengah 52354",
            'logo'              => "logo.png",
        ]);
    }
}
