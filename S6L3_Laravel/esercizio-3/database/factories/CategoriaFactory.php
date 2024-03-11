<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['Horror', 'Fantasy', 'Fiction', 'Romance', 'Mystery', 'History'];
        return [
            'name' => fake()->randomElement($categories),
            'created_at' => fake()->datetime()
        ];
    }
}
