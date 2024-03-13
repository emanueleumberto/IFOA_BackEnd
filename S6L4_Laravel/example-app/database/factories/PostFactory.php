<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
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
            'description' => fake()->text(100),
            'post_thumb' => 'https://picsum.photos/id/'.fake()->randomNumber(2).'/200/300',
            'user_id' => User::get()->random()->id,
            'created_at' => fake()->datetime()
        ];
    }
}
