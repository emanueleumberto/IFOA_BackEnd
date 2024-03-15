<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $priorities = ['very low', 'low', 'medium', 'high', 'very high'];
        $start_date = fake()->date();
        $end_date = fake()->dateTimeBetween($start_date, '+1 month');
        return [
            'title' => fake()->text(30),
            'description' => fake()->text(200),
            'priority' => fake()->randomElement($priorities),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'projects_id' => Project::get()->random()->id,
        ];
    }
}
