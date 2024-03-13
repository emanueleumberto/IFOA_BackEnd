<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->text(20),
            'pages' => fake()->numberBetween(100, 680),
            'year' => fake()->numberBetween(1960, 2023),
            'author_id' => Author::get()->random()->id,
            'category_id' => Category::get()->random()->id,
            'created_at' => fake()->datetime()
        ];
    }
}
