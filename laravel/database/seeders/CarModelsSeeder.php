<?php

namespace Database\Seeders;

use App\Models\CarModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CarModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('car_models')->truncate();
        CarModel::factory(50)->create();
        Schema::enableForeignKeyConstraints();
    }
}
