<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Record>
 */
class RecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['duvida', 'sugestao', 'denuncia']),
            'message' => $this->faker->paragraph,
            'is_identified' => $this->faker->boolean,
            'whistleblower_name' => $this->faker->name,
            'whistleblower_birth' => $this->faker->date,
            'created_at' => $this->faker->dateTimeThisYear,
            'deleted' => $this->faker->boolean,
        ];
    }
}
