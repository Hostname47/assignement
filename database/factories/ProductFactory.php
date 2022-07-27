<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'price' => $this->faker->randomDigit(),
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl($width = 200, $height = 200),
        ];
    }
}
