<?php

namespace Database\Factories;

use App\Models\Data;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataFactory extends Factory
{
    protected $model = Data::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->numberBetween(100000, 999999),
            'bedrooms' => $this->faker->numberBetween(1, 5),
            'bathrooms' => $this->faker->numberBetween(1, 3),
            'storeys' => $this->faker->numberBetween(1, 3),
            'garages' => $this->faker->numberBetween(1, 3),
        ];
    }
}
