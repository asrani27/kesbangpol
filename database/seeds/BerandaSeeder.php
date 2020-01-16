<?php

use Illuminate\Database\Seeder;
use App\Beranda;

class BerandaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s = new Beranda;
        $s->judul = 'Selamat Datang Di 
        Badan Kesatuan Bangsa Dan Politik';
        $s->deskripsi = 'Layanan Pendaftaran Berbasis Online';
        $s->save();
    }
}
