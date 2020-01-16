<?php

use Illuminate\Database\Seeder;
use App\Background;

class BackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $b = new background;
        $b->background = 'home.JPG';
        $b->save();
    }
}
