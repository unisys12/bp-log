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
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'weight' => $this->faker->numberBetween(100, 300),
            'systolic' => $this->faker->numberBetween(90, 180),
            'diastolic' => $this->faker->numberBetween(60, 120),
            'pulse' => $this->faker->numberBetween(60, 100),
            'notes' => $this->faker->sentence(),
        ];
    }
}
