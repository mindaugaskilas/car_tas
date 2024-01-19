<?php

namespace Database\Factories;

use App\Models\CarBrand;
use Faker\Provider\Fakecar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker->addProvider(new Fakecar($this->faker));
        $brand = CarBrand::all()->random();

        return [
            'car_number' => $this->faker->vehicleRegistration(),
            'fuel_tank_capacity' => $this->faker->numberBetween(40, 120),
            'average_fuel_consumption' => $this->faker->randomFloat(1, 5, 30),
            'car_brand_id' => $brand->id,
            'car_model_id' => $brand->carModels->random()->id,
        ];
    }
}
