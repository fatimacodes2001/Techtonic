<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'text' => $this->faker->text(),
            'rating' => $this->faker->numberBetween(0, 5),
            'customer_email' => "fatima@abc.com",
        ];
    }
}
