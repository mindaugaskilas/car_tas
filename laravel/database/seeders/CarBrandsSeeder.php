<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CarBrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('car_brands')->truncate();
        CarBrand::factory(10)->create();
        Schema::enableForeignKeyConstraints();
    }
}
