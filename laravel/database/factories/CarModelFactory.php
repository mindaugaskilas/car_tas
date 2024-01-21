<?php

namespace Database\Factories;

use App\Models\CarBrand;
use Faker\Provider\Fakecar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarModel>
 */
class CarModelFactory extends Factory
{
    public function definition()
    {
        $this->faker->addProvider(new Fakecar($this->faker));

        return [
            'name' => $this->faker->vehicleModel(),
            'car_brand_id' => CarBrand::all()->random()->id,
        ];
    }
}
