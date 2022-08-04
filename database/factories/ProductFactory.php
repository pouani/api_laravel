<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'description'=>$this->faker->sentence(),
            'min_qt'=>$this->faker->numberBetween(1,20),
            'note'=>$this->faker->numberBetween(1,5),
            'cost'=>$this->faker->numberBetween(500,5000),
        ];
    }
}
