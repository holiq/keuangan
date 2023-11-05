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
        $categoryId = Category::query()->pluck('id')->toArray();

        return [
            'name' => $this->faker->words(1, true),
            'category_id' => $this->faker->randomElement($categoryId),
            'qty' => $this->faker->numberBetween(1, 100),
            'price' => $this->faker->numberBetween(20000, 120000),
        ];
    }
}