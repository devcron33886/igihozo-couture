<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
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
        $name = fake()->name();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'price' => fake()->numberBetween(15000, 60000),
            'size' => fake()->realText(10),
            'stock' => fake()->numberBetween(10, 100),
            'status' => fake()->realText(10),
            'description' => fake()->realText(2000),
            'category_id' => fake()->numberBetween(1, 3),
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null,
        ];
    }
}
