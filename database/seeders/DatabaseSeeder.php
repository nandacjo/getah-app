<?php

namespace Database\Seeders;

use App\Models\Getah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();
        Getah::factory(20)->create();
    }
}
