<?php

namespace Database\Factories;

use Faker\Provider\Fakecar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarBrand>
 */
class CarBrandFactory extends Factory
{
    public function definition()
    {
        $this->faker->addProvider(new Fakecar($this->faker));

        return [
            'name' => $this->faker->vehicleBrand(),
        ];
    }
}
