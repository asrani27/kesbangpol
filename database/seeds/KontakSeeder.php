<?php

use Illuminate\Database\Seeder;
use App\Kontak;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_encode([
            'judul' => 'Kontak Kami',
            'instansi' => 'instansi',
            'alamat' => 'alamat',
            'telp' => 'telp',
            'fax' => 'fax',
            'email' => 'email'
        ]);
        
        $s = new Kontak;
        $s->data = $data;
        $s->save();
    }
}
