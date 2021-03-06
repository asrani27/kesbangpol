<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProfilSeeder::class);
        $this->call(KontakSeeder::class);
        $this->call(BerandaSeeder::class);
        $this->call(BackgroundSeeder::class);
    }
}
