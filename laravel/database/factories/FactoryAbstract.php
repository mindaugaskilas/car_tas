<?php

namespace Database\Factories;

use Faker\Provider\Fakecar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 */
abstract class FactoryAbstract extends Factory
{
    public function __construct()
    {
        $this->faker->addProvider(new Fakecar($this->faker));
    }
}
