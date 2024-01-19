<?php

namespace Database\Seeders;

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
        $this->call(CarBrandsSeeder::class);
        $this->call(CarModelsSeeder::class);
        $this->call(CarsSeeder::class);
        $this->command->info('Tables seeded!');
    }
}
