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
            'name' => fake()->name(),
            'description' => fake()->text(),
            'price' => fake()->randomNumber(5, true),
            'discounted_price' => fake()->randomNumber(5, true),
            'stock' => fake()->randomNumber(3, true),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function ($product) {
            $product->categories()->attach(
                Category::inRandomOrder()->limit(rand(1, 3))->pluck('id')
            );
        });
    }
}
