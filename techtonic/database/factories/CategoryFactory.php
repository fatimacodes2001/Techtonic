<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(5),
            'pic_path' => 'categories/IKX4ufAcXsJ4iZYqgzDvX5WKlG6UnHIc1hbgqHbt.jpg',
        ];
    }
}
