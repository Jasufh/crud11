<?php

namespace Database\Factories;

use App\Models\Category;
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
    public function definition(): array
    {
        return [
            'category_id' => Category::all()->random()->id,
            'product_name' => fake()->word(),
            'color' => fake()->colorName(),
            'price' => fake()->randomNumber(),
            'cantidad_disponible' => fake()->randomNumber(),
            'img' => fake()->image(),
        ];
    }
}
