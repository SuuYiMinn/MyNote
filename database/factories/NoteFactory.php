<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->name(),
            "description" => fake()->sentence($nbWords = 6, $variableNbWords = true),
            "status" => fake()->numberBetween($min = 0, $max = 1)
        ];
    }
}
