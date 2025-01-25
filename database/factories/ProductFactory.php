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
    public function definition(): array
    {
        return [
            'category_id' => rand(1, 4),
            'name' => [
                'uz' => $this->faker->word(),
                'ru' => $this->faker->word(),
            ],
            'description' => [
                'uz' => $this->faker->paragraph(5),
                'ru' => $this->faker->paragraph(5),
            ],
            'price' => rand(10000, 1000000),
        ];
    }
}
