<?php

use Illuminate\Database\Seeder;
use App\Profil;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s = new Profil;
        $s->judul = 'Profil Kami';
        $s->Isi = 'Deskripsi';
        $s->save();
    }
}
