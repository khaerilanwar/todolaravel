<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->sentence(4),
            "description" => fake()->paragraph(),
            "deadline" => fake()->dateTimeBetween('+1 week', '+3 weeks'),
            "status" => fake()->randomElement([0, 1])
        ];
    }
}
